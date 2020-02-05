<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main2 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('authmodel');
		$this->load->model('needsmodel');
		$this->load->model('missionsmodel');
		$this->load->model('savingsmodel');
	}

	public function index()
	{
		redirect('/Main2/start','refresh');	
		
	}

	public function start()
	{
		$this->load->view('login/startpage2');
		// $this->load->view('include/header3');
	}


	public function needs(){
		$topBar=$this->authmodel->checkLogin();
		$arrData=$this->needsmodel->showNeedsList();
		$this->load->view('include/header3',$topBar);
		$this->load->view('needs/needList2',$arrData);
		$this->load->view('include/footer2');
	}

	public function addNeeds(){
		$arrData=$this->needsmodel->addNeeds();
	}

	public function deleteNeeds(){
		$this->needsmodel->deleteNeeds();
	}

	public function missions(){
		$topBar=$this->authmodel->checkLogin();
		$arrData=$this->missionsmodel->showMissionsList();
		$this->load->view('include/header3',$topBar);
		$this->load->view('missions/missionList2',$arrData);
		$this->load->view('include/footer2');
	}

	public function addMissions(){
		$retValue = $this->missionsmodel->addMissions();
		// echo $retValue;
	}

	public function goToAddMissions(){
		
		if(!$this->missionsmodel->checkNeedsExist()){
		// if($this->session->userdata('Needs')==''){
			redirect('/Main2/missions','refresh');
		}else{
			$topBar=$this->authmodel->checkLogin();
			$arrData=$this->missionsmodel->missionPrice();
			$this->load->view('include/header3',$topBar);
			$this->load->view('missions/addMission',$arrData);
			$this->load->view('include/footer2');
		}
	}

	public function missionState(){
		$this->missionsmodel->missionState();
		redirect('/Main2/missions','refresh');
	}
	public function savings(){
		$topBar=$this->authmodel->checkLogin();
		$arrData=$this->savingsmodel->showSavingsList();
		$this->load->view('include/header3',$topBar);
		$this->load->view('saving/SaveMoney2',$arrData);
		$this->load->view('include/footer2');
	}

	public function saveMoney(){
		$this->savingsmodel->saveMoney();
	}
	public function deleteMissions(){
		$this->missionsmodel->deleteMissions();
    }
    
    public function clearAll(){
        $this->missionsmodel->deleteAllMissions();
        $this->savingsmodel->updateNeedsInPiggy();
        $this->needsmodel->deleteNeeds();
        
        redirect('/Main2/needs','refresh');

    }
}
