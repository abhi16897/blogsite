<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form','file','html'));
        $this->load->database();
      $this->load->model('Edit_model');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
    }
    public function newpost(){
        $this->load->view('newpost_view');
    }
    public function doupload(){
        $username=$this->session->userdata('userid');
        $this->load->helper('file');
        $config['upload_path']='./images/';
        $config['allowed_types']='jpg|jpeg|png|gif';
        $config['file_name']=time().$username;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload()){
            echo $this->upload->display_errors();
        }else{
            $file_data=$this->upload->data();
            return $file_data['file_name'];
        }
    }
    public function insertpost(){
        $image=$this->doupload();
        $this->form_validation->set_rules('title','title','required');
        $this->form_validation->set_rules('content','content','required');
        if($this->form_validation->run()==TRUE){
        $title=$this->input->post('title');
        $content=$this->input->post('content');
        $this->Edit_model->insertpost($title,$content,$image);
        redirect(base_url().'Home');
        }

    }
    public function delete($id=NULL){
        $this->Edit_model->delete($id);
        redirect(base_url().'Home');
    }
    public function edit($id=NULL){
        $data['edit']=$this->Edit_model->fetch($id);
        $this->load->view('postedit_view',$data);
    }
    public function update($id=NULL){
        $data=$this->Edit_model->fetch($id);
        foreach($data as $d){
            $link=$d->image;
        }
        unlink('./images/'.$link);
        $image=$this->doupload();
        $this->form_validation->set_rules('title','title','required');
        $this->form_validation->set_rules('content','content','required');
        if($this->form_validation->run()==TRUE){
        $title=$this->input->post('title');
        $content=$this->input->post('content');
        $this->Edit_model->updatepost($title,$content,$image,$id);
        redirect(base_url().'Home');
        }
    }
    public function readmore($id=NULL){
     //   $data['ftc']=$this->Edit_model->fetchc($id);
        $data['con']=$this->Edit_model->fetch($id);
        $data['com']=$this->Edit_model->fetchcomment($id);
        $this->load->view('readpost_view',$data);

    }

    public function deletecomment($id=NULL){
        $this->Edit_model->commentdelete($id);
        $postid=$this->session->userdata('postid');
        redirect(base_url().'Edit/readmore/'.$postid);
    }

 
}