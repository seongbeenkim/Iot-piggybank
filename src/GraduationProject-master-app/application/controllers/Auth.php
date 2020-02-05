<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('authmodel');
	}
	//index(login)
	public function index() {
		$this->authmodel->checkLoginAndGoToMainPage(); //지금은 무조건 페스되어서 비워놓음
		$loginInfo = $this->authmodel->index();
		$this->load->view('login/login2',$loginInfo);
	}
	//loginProc
	public function loginProc() {
		$retValue = $this->authmodel->loginProc(); // 로그인 여부만 메세지로 알려주는 느낌
		echo $retValue;
	}
	//logoutProc
	public function logoutProc() {
		$this->authmodel->logoutProc();
	}

	public function signUp(){
		$this->load->view('login/join','refresh');
	}

	public function join(){
		$this->authmodel->join();
		$this->load->view('login/login2','refresh');
	}
	
}
?>