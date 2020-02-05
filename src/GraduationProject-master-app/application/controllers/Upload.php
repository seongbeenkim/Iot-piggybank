<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1000;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['file_name']='needpic';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                

                

                if (!$this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('/needs/needList2', $error);
                }
                else
                {
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = '/upload/needpic.jpg';
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = 20;
                        $config['height'] = 40;
                        $this->load->library('image_lib', $config);

                        $this->image_lib->resize();

                        redirect('/Main2/needs','refresh');
                        // $data = array('upload_data' => $this->upload->data());
                        // $this->load->view('upload_success', $data);
                        

                }
        }
}
?>