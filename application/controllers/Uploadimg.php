<?php

class Uploadimg extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('muploadimg');
        }

        public function index()
        {

        }

        public function do_upload()
        {
                $newname                        = "summernote-".$this->mfunction->seo($_FILES['image']['name']);
                $config['file_name']            = $newname;
                $config['upload_path']          = './assets/images/summernote/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                        $data = array(
                          'name' => $this->upload->file_name,
                          'type' => $this->upload->file_type,
                          'size' => $this->upload->file_size,
                          'date' => $this->mfunction->now()
                        );
                        $this->muploadimg->save($data);
                        echo base_url()."assets/images/summernote/".$this->upload->file_name;
                }
        }
}
?>
