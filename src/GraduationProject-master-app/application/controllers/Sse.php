<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sse extends CI_Controller {



	public function __construct() {
        parent::__construct();
        $this->load->model('authmodel');
		$this->load->model('needsmodel');
		$this->load->model('missionsmodel');
        $this->load->model('savingsmodel');
        $this->load->database();
	}
	//index(login)
	public function index() {

        $this->nidx=$this->session->userdata("Needs");
        $this->bid=$this->session->userdata('AdminBid');
        $this->sQuery="SELECT midx as m from tbl_missions where nidx='".$this->nidx."' and state=0 order by regdate DESC limit 1";
        $this->pre_midx=$this->db->query($this->sQuery)->row()->m;
        
        // $sse = new ServerSentEvents();
        // $sse->start();
        // $sse->join
       
        

        // $counter = rand(1, 10); // a random counter
        // while (1) {
        //     // 1 is always true, so repeat the while loop forever (aka event-loop)
        //     $curDate = date(DATE_ISO8601);
        //     echo "event: ping\n",
        //         'data: {"time": "' . $curDate . '"}', "\n\n";
            
        //         // Send a simple message at random intervals.
        //     $counter--;
        //     if (!$counter) {
        //         echo 'data: This is a message at time ' . $curDate, "\n\n";
        //         $counter = rand(1, 10); // reset random counter
        //     }
            
        //     // flush the output buffer and send echoed messages to the browser
        //     while (ob_get_level() > 0) {
        //         ob_end_flush();
        //     }
        //     flush();
        //     // break the loop if the client aborted the connection (closed the page)
            
        //     if ( connection_aborted() ) break;
        //     // sleep for 1 second before running the loop again
            
        //     sleep(1);
        // }
    }

public function saving(){
    header("Content-Type: text/event-stream");
    header('Cache-Control: no-cache');
    header("Connection", "keep-alive");
    // while(1){

        // $sCount = $this->savingsmodel->badgeSaving();
        $this->nidx=$this->session->userdata("Needs");
        $this->bid=$this->session->userdata('AdminBid');
        $this->uid=$this->session->userdata('AdminId');
        $this->sQuery="SELECT date from tbl_transactions where nidx='".$this->nidx."' and types=1 order by date DESC limit 1";
        $this->isFirstMission=$this->db->query($this->sQuery)->row();
        if(empty($this->isFirstMission)){
            $this->sQuery="SELECT midx from tbl_transactions where  bid='".$this->bid."' and types=0 and date > (SELECT regdate from tbl_needs where nidx='".$this->nidx."' order by regdate DESC limit 1)";
            $this->sCount=$this->db->query($this->sQuery)->result_array();
        }else{
            $this->sQuery="SELECT midx from tbl_transactions where  bid='".$this->bid."' and types=0 and date > (SELECT date from tbl_transactions where nidx='".$this->nidx."' and types=1 order by date DESC limit 1)";
            $this->sCount=$this->db->query($this->sQuery)->result_array();
        }
        $this->sQuery="SELECT nidx from tbl_needs where  bid='".$this->bid."'";
        $this->n=$this->db->query($this->sQuery)->row()->nidx;
        $sCount=json_encode($this->sCount);
        if(!empty($this->n)) {
            echo "data: {$sCount}\n\n";
        }
        
        flush();
        // while (ob_get_level() > 0) {
        //     ob_end_flush();
        // }
        

        // if ( connection_aborted() ) break;

        // sleep(1);
    // }
}
    public function mission(){
        header("Content-Type: text/event-stream");
        header('Cache-Control: no-cache');
        header("Connection", "keep-alive");
        // while(1){

            // $sCount = $this->savingsmodel->badgeSaving();
            $this->nidx=$this->session->userdata("Needs");
            $this->bid=$this->session->userdata('AdminBid');
            $this->sQuery="SELECT midx as m from tbl_missions where nidx='".$this->nidx."' and state=0 order by regdate DESC limit 1";
            $this->rec_midx=$this->db->query($this->sQuery)->row()->m;
            $this->m=$this->session->userdata('Mission');

            // 아무것도 없을 때는 아무런 푸시도 하지 않는다.
            // 미션이 등록되면
            // 먼저 session값에 mission이 등록된다.

            if(!empty($this->rec_midx)){
                // if(empty($this->session->userdata('Mission'))){
                //     $newdata=array('Mission'=>$this->rec_midx);
                //     $this->session->set_userdata($newdata);
                // }
                if($this->rec_midx > $this->session->userdata('Mission')){
                    // 알림이 울릴 조건 : pre_midx < rec_midx => count해서 보내자.
                    // $this->pre_midx=$this->rec_midx;
                    $newdata=array('Mission'=>$this->rec_midx);
                    $this->session->set_userdata($newdata);

                    $this->sQuery="SELECT nidx from tbl_needs where  bid='".$this->bid."'";
                     $this->n=$this->db->query($this->sQuery)->row()->nidx;

                    $rec_midx=json_encode($newdata);
                    if(!empty($this->n)){
                        echo "data: {$rec_midx}\n\n";
                    }
                    
                    flush();
                }else{
                    // $this->pre_midx=$this->db->query($this->sQuery)->row()->m;
                }
            }

    }
    public function missionCheckState(){
        header("Content-Type: text/event-stream");
        header('Cache-Control: no-cache');
        header("Connection", "keep-alive");
        $this->nidx=$this->session->userdata("Needs");
        $this->bid=$this->session->userdata('AdminBid');
        $this->sQuery="SELECT midx from tbl_missions where nidx='".$this->nidx."' and state=1";
        $midx1=$this->db->query($this->sQuery)->result_array();
        $midx=json_encode($midx1);
        echo "data: {$midx}\n\n";
        
        flush();

    }
    public function missionCheckState2(){
        header("Content-Type: text/event-stream");
        header('Cache-Control: no-cache');
        header("Connection", "keep-alive");
        $this->nidx=$this->session->userdata("Needs");
        $this->bid=$this->session->userdata('AdminBid');
        $this->sQuery="SELECT midx from tbl_missions where nidx='".$this->nidx."' and state=2";
        $this->midx=$this->db->query($this->sQuery)->result_array();
        $midx=json_encode($this->midx);
        echo "data: {$midx}\n\n";
        flush();

    }

    public function p_mission(){
        header("Content-Type: text/event-stream");
        header('Cache-Control: no-cache');
        // while(1){

            // $sCount = $this->savingsmodel->badgeSaving();
            $this->nidx=$this->session->userdata("Needs");
            $this->bid=$this->session->userdata('AdminBid');
            $this->sQuery="SELECT midx as m from tbl_missions where nidx='".$this->nidx."' and state=1 order by regdate DESC limit 1";
            $this->rec_midx=$this->db->query($this->sQuery)->row()->m;
            


            if(!empty($this->rec_midx)){
                if(empty($this->session->userdata('Mission'))){
                    $newdata=array('Mission'=>$this->rec_midx);
                    $this->session->set_userdata($newdata);
                }
                if($this->rec_midx > $this->session->userdata('Mission')){
                    // 알림이 울릴 조건 : pre_midx < rec_midx => count해서 보내자.
                    // $this->pre_midx=$this->rec_midx;
                    $newdata=array('Mission'=>$this->rec_midx);
                    $this->session->set_userdata($newdata);
                    echo "data: {$this->rec_midx}\n\n";
                    flush();
                }else{
                    // $this->pre_midx=$this->db->query($this->sQuery)->row()->m;
                }
            }else{
                // $this->pre_midx=$this->rec_midx;
            }

    }

}