<?php
class Savingsmodel extends CI_Model{
    function __construct() {
		// Call the Model constructor
      parent::__construct();
      $this->load->database();
    }
    
    function index(){
        
    }
    function showSavingsList(){
        // 현재 등록된 needs 
        $this->needs=$this->session->userdata('Needs');

        if(!$this->session->userdata('AdminType')){ //아이일 때
            $this->writerid=$this->session->userdata('AdminId');
        }else{ // 부모일 때
            $this->writerid=$this->session->userdata('AdminPtn');
        }
        $this->bid=$this->session->userdata('AdminBid');

        $this->sQuery="SELECT distinct * from tbl_needs where writerid='".$this->writerid."'";
        $this->savingList=$this->db->query($this->sQuery)->result_array();
        $savingList['savingList']=$this->savingList;

        $this->sQuery="SELECT price from tbl_needs where writerid='".$this->writerid."'";
        $this->needsPrice=$this->db->query($this->sQuery)->row();
        if($this->needsPrice){
            $this->sQuery="SELECT price as p from tbl_needs where writerid='".$this->writerid."'";
            $this->needsPrice=$this->db->query($this->sQuery)->row()->p;
        }

        $this->sQuery="SELECT walletbalance as wb from tbl_user where userid='".$this->writerid."'";
        $this->wBalance=$this->db->query($this->sQuery)->row()->wb;
        $savingList['wBalance']=$this->wBalance;

        //저금통에 있는 돈
        // $this->sQuery="SELECT sum(p.bbalance) as sum01 from tbl_piggybank as p join tbl_needs as n on p.bid=n.bid where p.bid = '".$this->bid."' and p.regdate > n.regdate";
        // $this->pb= $this->db->query($this->sQuery)->row()->sum01;
        // $savingList['bBalance']=$this->pb; // 저금통에 있는 돈
        if(empty($this->session->userdata('Needs'))){ // needs가 등록되기 전
            $this->bbalance=0;
        }else if(!empty($this->session->userdata('Needs'))){
            $this->sQuery="SELECT bbalance as bb from tbl_piggybank where bid='".$this->bid."' and nidx='".$this->needs."'";
            $this->bbalance=$this->db->query($this->sQuery)->row()->bb;
            
        }
        $savingList['bBalance']=$this->bbalance;
        
        /*
        piggybank대신 sTransaction을 이용한다. (두 테이블의 내용이 일치한다.) -> 아니지, 그냥 피기뱅크에서 값만 가져오면된다.
        그리고 위의 쿼리문을 돌리고 난 후 바로 bBalance를 piggybank에 update하기로한다.
        (즉, wallet과 piggybank는 update를 이용해서 무조건 한 값만 가지고 있고, savingTransaction과 pinmoneyTransaction 이 모든 내역을 가지고 있는것으로!)
        */

        // if(empty($this->bbalacne)){
        //     $savingList['bBalance']=0;
        // }else{
        //     $savingList['bBalance']=$this->bbalance; // 저금통에 있는 돈
        // }


        $savingList['isDone']=FALSE;
        if($this->needsPrice==$this->bbalance){
            $savingList['isDone']=TRUE;
        }else{
            $savingList['isDone']=FALSE;
        }
        $savingList['page']=2;
        return $savingList;        
    }

    function saveMoney(){
    
        $this->pinmoney=$this->input->post('pinmoney');
        // $this->wBalance=$this->input->post('wBalance');
        $this->bid=$this->session->userdata('AdminBid');
        $this->cid=$this->session->userdata('AdminId');
        $this->pid=$this->session->userdata('AdminPtn');
        $this->nidx=$this->session->userdata('Needs');
        // $this->cwalletBalance=$this->wBalance-$this->pinmoney;

// 여기가 뱌껴야한다. 저금을 하는 기능이니까 sTransaction에 추가를 먼저 한다. 그리고 거기 있는 것을 sum(amount)해서 update해버린다.(-1000가능) 
        // 지갑에 있는 돈 빼기

 
        $this->sQuery1="UPDATE tbl_user SET walletbalance = walletbalance-'".$this->pinmoney."' where userid='".$this->cid."' and walletbalance='".$this->pinmoney."'";
        $this->sQuery2="UPDATE tbl_piggybank SET bbalance = bbalance+'".$this->pinmoney."' where bid='".$this->bid."' and nidx='".$this->nidx."'";
        $this->sQuery="UPDATE tbl_totalsavings SET bbalance = bbalance+'".$this->pinmoney."' where bid='".$this->bid."'";
        $this->sQuery3="INSERT INTO tbl_transactions(cid,pid,bid,amount,types,nidx) values ('".$this->cid."', '".$this->pid."', '".$this->bid."', '".$this->pinmoney."', 1, '".$this->nidx."')";
        // $this->sQuery1="UPDATE tbl_user set walletbalance='".$this->cwalletBalance."' where userid='".$this->cid."'";
        // $this->sQuery2="INSERT INTO tbl_piggybank(bid,bbalance) values('".$this->bid."', '".$this->pinmoney."')";
        // $this->sQuery3="INSERT INTO tbl_transactions(tfrom,tto,amount) values('".$this->cid."', '".$this->bid."', '".$this->pinmoney."')";
        // $this->db->trans_start();
        // if($this->cwalletBalance >= 0){
          $this->db->query($this->sQuery1);
          $this->db->query($this->sQuery2);
          $this->db->query($this->sQuery);
          $this->db->query($this->sQuery3);
        // }
        // $this->db->trans_complete();
        $this->sQuery="SELECT bbalance from tbl_totalsavings where bid='".$this->bid."'";
        $ts=$this->db->query($this->sQuery)->row();
        $this->sQuery="SELECT bbalance from tbl_user join tbl_piggybank on bankid=bid where usertype=0 and userid='".$this->cid."'";
        $bb=$this->db->query($this->sQuery)->row();
        if(empty($bb->bbalance)){
            $newdata=array('TotalSavings'=>$ts->bbalance,'TotalBalance'=>'');
        }else{
            $newdata=array('TotalSavings'=>$ts->bbalance,'TotalBalance'=>$bb->bbalance);
        }
        $this->session->set_userdata($newdata);
    
        redirect('/Main2/savings','refresh');
    }

    function badgeSaving(){
        $this->nidx=$this->session->userdata("Needs");
        $this->sQuery="SELECT count(*) as sc from tbl_transactions where  types=0 and date > (SELECT date from tbl_transactions where nidx='".$this->nidx."' and types=1 order by date DESC limit 1)";
        $this->savingCount=$this->db->query($this->sQuery)->row()->sc;
        return $this->savingCount;
    }
    
    function updateNeedsInPiggy(){
        $this->nidx=$this->session->userdata('Needs');
        $this->bid=$this->session->userdata('AdminBid');
        $this->sQuery="UPDATE tbl_piggybank set nidx=0, bbalance=0 where bid='".$this->bid."'";
        $this->db->query($this->sQuery);
        // $this->ts=$this->session->userdata('TotalBalance');
        // $this->sQuery="UPDATE tbl_totalsavings set bbalance+='".$this->ts."' where bid='".$this->bid."'";
        // $this->db->query($this->sQuery);
        $this->sQuery="SELECT bbalance from tbl_totalsavings where bid='".$this->bid."'";
        $ts=$this->db->query($this->sQuery)->row();
        $newdata=array('TotalSavings'=>$ts->bbalance, 'TotalBalance'=>0);
        $this->session->set_userdata($newdata);
    }
}