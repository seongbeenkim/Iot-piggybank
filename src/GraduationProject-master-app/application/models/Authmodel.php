<?php
class Authmodel extends CI_Model{
    function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
    }
    
    function index(){
        $this->AdminId=$this->input->cookie('AdminId',TRUE);
		if ($this->AdminId!="") {
			$arrData=array('AdminId'=>$this->AdminId,'SaveAdmin'=>'Y');
		} else {
			$arrData=array('AdminId'=>$this->AdminId,'SaveAdmin'=>'N');
		}
		return $arrData;
    }

    function loginProc() {
			$this->AdminId=addslashes(trim($this->input->post('AdminId')));
			$this->AdminPwd=addslashes(trim($this->input->post('AdminPwd')));
			$this->sQuery="SELECT * FROM tbl_user where userid='".$this->AdminId."'";
			$oResult = $this->db->query($this->sQuery)->row();

			
			if ($oResult) { // 정보가 일치해서 유저테이블에 값이 있으면 
				if ($oResult->userpwd==$this->AdminPwd) { // 패스워드 일치 여부 확인
					$this->sQuery="SELECT * FROM tbl_user JOIN tbl_needs on userid=writerid or partnerid=writerid where userid='".$this->AdminId."'";
					$nResult = $this->db->query($this->sQuery)->row();		
					if($nResult){
						$this->sQuery="SELECT bbalance as bb from tbl_user join tbl_piggybank on bankid=bid where usertype=0 and userid";
						$bResult = $this->db->query($this->sQuery)->row();
						
						$newdata = array('AdminLoginYn' =>true,'AdminIdx'=>$oResult->idx,'AdminName'=>$oResult->username, 'AdminId'=>$this->AdminId, 'AdminPwd'=>$this->AdminPwd, 'AdminType'=>$oResult->usertype, 'AdminPtn'=>$oResult->partnerid, 'AdminWallet'=>$oResult->walletid, 'AdminBid'=>$oResult->bankid,'Needs'=>$nResult->nidx,'AdminWbalance'=>$oResult->walletbalance);
					}else{
						$newdata = array('AdminLoginYn' =>true,'AdminIdx'=>$oResult->idx,'AdminName'=>$oResult->username, 'AdminId'=>$this->AdminId, 'AdminPwd'=>$this->AdminPwd, 'AdminType'=>$oResult->usertype, 'AdminPtn'=>$oResult->partnerid, 'AdminWallet'=>$oResult->walletid, 'AdminBid'=>$oResult->bankid,'Needs'=>'','AdminWbalance'=>$oResult->walletbalance);						
					}
					$this->session->set_userdata($newdata); // session값으로 위의 배열을 저장.
					$this->nidx=$this->session->userdata('Needs');
					if($this->session->userdata('AdminType')==1){
						$this->pid=$this->session->userdata('AdminId');
						$this->cid=$this->session->userdata('AdminPtn');
						$this->sQuery="SELECT midx from tbl_missions where nidx='".$this->nidx."' and state=0 order by regdate DESC limit 1";
						$m=$this->db->query($this->sQuery)->row();
						if(empty($m->midx)){
							$newdata=array('Mission'=>'');
						}else{
							$newdata=array('Mission'=>$m->midx);
						}
						$this->session->set_userdata($newdata);

						$this->sQuery="SELECT bbalance from tbl_user join tbl_piggybank on bankid=bid where usertype=0 and userid='".$this->cid."'";
						$bb=$this->db->query($this->sQuery)->row();
						if(empty($bb->bbalance)){
							$newdata=array('TotalBalance'=>'');
						}else{
							$newdata=array('TotalBalance'=>$bb->bbalance);
						}
						$this->session->set_userdata($newdata);

					}else{
						$this->pid=$this->session->userdata('AdminPtn');
						$this->cid=$this->session->userdata('AdminId');
						$this->sQuery="SELECT midx from tbl_missions where nidx='".$this->nidx."' and state=0 order by regdate DESC limit 1";
						$m=$this->db->query($this->sQuery)->row();
						if(empty($m->midx)){
							$newdata=array('Mission'=>'');
						}else{
							$newdata=array('Mission'=>$m->midx);
						}
						$this->session->set_userdata($newdata);

						$this->sQuery="SELECT bbalance from tbl_user join tbl_piggybank on bankid=bid where usertype=0 and userid='".$this->cid."'";
						$bb=$this->db->query($this->sQuery)->row();
						if(empty($bb->bbalance)){
							$newdata=array('TotalBalance'=>'');
						}else{
							$newdata=array('TotalBalance'=>$bb->bbalance);
						}
						$this->session->set_userdata($newdata);
                    }
                    $this->bid=$this->session->userdata('AdminBid');
                    $this->sQuery="SELECT * from tbl_totalsavings where bid='".$this->bid."'";
                    $ts=$this->db->query($this->sQuery)->row();
                    $newdata=array('TotalSavings'=>$ts->bbalance);
                    $this->session->set_userdata($newdata);
					// $arrRetMessage=array('sRetCode'=>'01','sMessage'=>' 로그인이 완료되었습니다.','sRetUrl'=>'/Auth');
					$arrRetMessage=array('sRetCode'=>'01','sMessage'=>'로그인이 완료되었습니다.','sRetUrl'=>'/Auth');
					// redirect('/Auth','refresh');
				} else {
					$arrRetMessage=array('sRetCode'=>'03','sMessage'=>'비밀번호가 틀립니다.');
				}
			} else { //회원이 아닐때
				$arrRetMessage=array('sRetCode'=>'02','sMessage'=>'회원정보를 찾을 수 없습니다.');
			}
			return json_encode($arrRetMessage);
	}

	function logOutProc() {
		$this->session->sess_destroy();
		redirect('/Auth','refresh');
	}

	function join(){
		$this->pname=$this->input->post('pname');
		$this->pid=$this->input->post('pid');
		$this->ppwd=$this->input->post('ppwd');
		$this->pwid=$this->input->post('pwid');
		$this->pwbalance=$this->input->post('pwbalance');
		$this->cname=$this->input->post('cname');
		$this->cid=$this->input->post('cid');
		$this->cpwd=$this->input->post('cpwd');
		$this->cwid=$this->input->post('cwid');
		$this->pbid=$this->input->post('pbid');

		$this->pQuery="INSERT INTO tbl_user(username, userid, userpwd, usertype, partnerid, walletid, walletbalance, bankid) values ('".$this->pname."', '".$this->pid."', '".$this->ppwd."', 1, '".$this->cid."', '".$this->pwid."', '".$this->pwbalance."', '".$this->pbid."')";
		$this->cQuery="INSERT INTO tbl_user(username, userid, userpwd, usertype, partnerid, walletid, bankid) values ('".$this->cname."', '".$this->cid."', '".$this->cpwd."', 0, '".$this->pid."', '".$this->cwid."', '".$this->pbid."')";
        $this->bQuery="INSERT INTO tbl_piggybank(bid) values ('".$this->pbid."')";
        $this->tsQuery="INSERT INTO tbl_totalsavings(bid,bbalance) values ('".$this->pbid."',0)";
		$this->db->query($this->pQuery);
		$this->db->query($this->cQuery);
        $this->db->query($this->bQuery);
        $this->db->query($this->tsQuery);
		redirect('/auth','refresh');

	}
	
	function checkLogin() { // 로그인 유지 확인하고 정상이면 사이드바 인자값들 넘긴다.
		// 로그인이 안되어 있을 때
		if (!$this->session->userdata("AdminLoginYn")) {
			redirect('/auth','refresh'); //auth->index()로 보내어 checkLogin02()하게 한다.
		}
		$this->loginId = $this->session->userdata("AdminId");
		$this->loginType = $this->session->userdata("AdminType");
		$loginInfo['loginId'] = $this->loginId;
		$loginInfo['loginType'] = $this->loginType; 
		return $loginInfo;
	}
    /*
    로그인 되어 있으면 메인페이지로 넘겨준다
    */
    function checkLoginAndGoToMainPage() { 
		if ($this->session->userdata("AdminLoginYn")) { 
			if($this->session->userdata("AdminType")){
				redirect('/Main2/missions','refresh');	
			}else{
				redirect('/Main2/needs','refresh');
			}
   		}
    }
    

}