<?php
class Missionsmodel extends CI_Model{
    function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
    }
    
    function index(){
        
    }

    function showMissionsList(){
      $this->bid=$this->session->userdata('AdminBid');
      if($this->session->userdata('AdminType')){ // 부모일 때
        $this->writerid=$this->session->userdata('AdminId');
        $this->ptn=$this->session->userdata('AdminPtn');
        $this->sQuery="SELECT walletbalance as wb from tbl_user where bankid='".$this->bid."' and usertype=1";
          $this->wBalance=$this->db->query($this->sQuery)->row()->wb;

      }else{ // 아이일 때
          $this->writerid=$this->session->userdata('AdminPtn');
          $this->ptn=$this->session->userdata('AdminId');
          $this->sQuery="SELECT walletbalance as wb from tbl_user where bankid='".$this->bid."' and usertype=0";
          $this->wBalance=$this->db->query($this->sQuery)->row()->wb;
      }
      $this->bid=$this->session->userdata("AdminBid");
      // $this->sQuery="SELECT regdate as rd from tbl_needs where writerid='".$this->writerid."'";
      // $this->nregdate=$this->db->query($this->sQuery)->row()->rd;
      //and regdate > ".$this->nregdate." 
      $this->sQuery="SELECT nidx from tbl_needs where writerid='".$this->ptn."'";
      $this->nidx=$this->db->query($this->sQuery)->row();
      if($this->nidx){
        $this->sQuery="SELECT nidx as n from tbl_needs where writerid='".$this->ptn."'";
        $this->nidx=$this->db->query($this->sQuery)->row()->n;
      }
      //needs보다 늦게 등록된 미션들을 뽑아서 보여준다. -> tbl_missions애 nidx있으니 그걸로 판단.
      $this->sQuery="SELECT * from tbl_missions where writerid='".$this->writerid."' and nidx='".$this->nidx."' order by state asc, regdate desc";
      $this->mList=$this->db->query($this->sQuery)->result_array();
      $this->sQuery="SELECT * from tbl_missions where writerid='".$this->writerid."' and nidx='".$this->nidx."' order by FIELD(state, 1, 0, 2), regdate desc";
      $this->mList_p=$this->db->query($this->sQuery)->result_array();
      // $this->sQuery="SELECT distinct * from tbl_missions where writerid='".$this->writerid."' and nidx='".$this->nidx."' order by regdate desc";
      // $this->missionsList=$this->db->query($this->sQuery)->result_array();
      // $missionsList['missionsList']=$this->missionsList;
      //상대방이 처음으로 미션을 등록했을 때
      if(empty($this->session->userdata('Needs'))){
        $this->sQuery="SELECT nidx as n from tbl_needs where bid='".$this->bid."'";
        $nidx=$this->db->query($this->sQuery)->row();
        if(!empty($this->nidx)){
            $newdata=array('Needs'=>$nidx->n);
            $this->session->set_userdata($newdata);
        }
      }
      $newdata=array('AdminWbalance'=>$this->wBalance);
      $this->session->set_userdata($newdata);
      $missionsList['missionsList']=$this->mList;      
      $missionsList['missionsList_p']=$this->mList_p;      
      $this->sQuery="SELECT * from tbl_needs where writerid='".$this->ptn."'";
      $this->n=$this->db->query($this->sQuery)->result_array();
      $missionsList['nidx']=$this->n;
      $missionsList['page']=1;
      return $missionsList;  
    }

    function addMissions(){
        
        $this->contents=$this->input->post('contents');
        $this->price=$this->input->post('price');
        $this->writerid=$this->session->userdata('AdminId');
        $this->ptn=$this->session->userdata('AdminPtn');
        $this->missionPrice=$this->input->post('missionPrice');

        // if ($this->price >= $this->missionPrice) {
        //   $arrRetMessage=array('sRetCode'=>'01','sMessage'=>'미션이 등록되었습니다.','sRetUrl'=>'/Main2/missions');
        // } else {
        //   $arrRetMessage=array('sRetCode'=>'02','sMessage'=>'지급 가능한 용돈을 초과했습니다.');
        // }
        $this->sQuery="SELECT nidx as n from tbl_needs where writerid='".$this->ptn."'";
        $this->nidx=$this->db->query($this->sQuery)->row()->n;
        if($this->writerid){
          // $this->sQuery="SELECT nidx as n from tbl_needs where writerid='".$this->ptn."'";
          // $this->nidx=$this->db->query($this->sQuery)->row()->n;
          $this->sQuery="INSERT into tbl_missions(contents, price, writerid, nidx) values ('".$this->contents."', '".$this->price."', '".$this->writerid."', '".$this->nidx."')";
          $this->db->query($this->sQuery);  
        }
        
        // return json_encode($arrRetMessage);
        redirect('/Main2/missions','refresh');
    }

    // 무조건 missionList를 보기 위해서는 missionState()를 거쳐야함.
    // 처음 미션을 등록할 때는 0짜리 미션하나가 만들어진다.
    // 아이가 다했어요를 누르게되면 0인 상태로 이 함수로 넘어올 것이다.
    function missionState(){ // 이 함수 자체가 버튼을 눌렀을 때 tbl_mission의 state를 바꿔주는 함수이다.
                            // 그러니까 상태가 변할 필요가 있을 때만 이 함수가 호출되면 되는 것
      $this->state=$this->input->get('state');
      $this->midx=$this->input->get('midx');
      $this->pinmoney=$this->input->get('mprice');
      $this->userid=$this->session->userdata('AdminId');
      $this->ptn=$this->session->userdata('AdminPtn');
      $this->bid=$this->session->userdata('AdminBid');
      $this->nidx=$this->session->userdata('Needs');

      if($this->state==0){ // 0인 상태에서 넘어오는 경우는 
        $this->sQuery="UPDATE tbl_missions SET state=1 where midx='".$this->midx."'";
        $this->db->query($this->sQuery);
      }else if($this->state==1){
        $this->sQuery="UPDATE tbl_missions SET state=2 where midx='".$this->midx."'";
        $this->db->query($this->sQuery);
        $this->sQuery1="UPDATE tbl_user SET walletbalance = walletbalance-'".$this->pinmoney."' where userid='".$this->userid."'";
        $this->sQuery2="UPDATE tbl_user SET walletbalance = walletbalance+'".$this->pinmoney."' where userid='".$this->ptn."'";
        $this->sQuery3="INSERT INTO tbl_transactions(cid,pid,bid,amount,types,nidx,midx) values ('".$this->ptn."', '".$this->userid."', '".$this->bid."', '".$this->pinmoney."', 0, '".$this->nidx."', '".$this->midx."')";
        // $this->sQuery3="INSERT INTO tbl_transactions  cid='".$this->ptn."', pid='".$this->userid."', bid='".$this->bid."', amount='".$this->price."', types=0, nidx='".$this->nidx."'";
        $this->db->query($this->sQuery1);
        $this->db->query($this->sQuery2);
        $this->db->query($this->sQuery3);
        $this->sQuery="SELECT walletbalance from tbl_user where userid='".$this->userid."'";
        $wb=$this->db->query($this->sQuery)->row();
        $newdata=array('AdminWbalance'=>$wb->walletbalance);
      }else if($this->state==2){
      }

    }
    
    function missionPrice(){
      $this->ptn=$this->session->userdata('AdminPtn');
      $this->sQuery="SELECT sum(m.price) as mp from tbl_needs as n JOIN tbl_missions as m on n.nidx=m.nidx where n.writerid='".$this->ptn."'";
      $this->missionPrice=$this->db->query($this->sQuery)->row()->mp;
      $this->sQuery="SELECT price as np from tbl_needs as n where n.writerid='".$this->ptn."'";
      $this->needsPrice=$this->db->query($this->sQuery)->row()->np;
      $missionPrice['missionPrice']=$this->missionPrice;
      $missionPrice['needsPrice']=$this->needsPrice;
      return $missionPrice;
    }

    function checkNeedsExist(){
      $this->ptn=$this->session->userdata("AdminPtn");
      $this->sQuery="SELECT * from tbl_needs where writerid='".$this->ptn."'";
      $this->isEmpty=$this->db->query($this->sQuery)->result_array();
      return $this->isEmpty;
    }

    function deleteMissions(){
      $this->midx=$this->input->post('midx');
      $this->sQuery="DELETE from tbl_missions where midx='".$this->midx."'";
      $this->db->query($this->sQuery);
      redirect('/Main2/missions','refresh');
    }
    
    function deleteAllMissions(){
        $this->nidx=$this->session->userdata('Needs');
        $this->sQuery="DELETE from tbl_missions where nidx='".$this->nidx."'";
        $this->db->query($this->sQuery);
        $this->sQuery="DELETE from tbl_transactions where nidx='".$this->nidx."'";
        $this->db->query($this->sQuery);

    }

}