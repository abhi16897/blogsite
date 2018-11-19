<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form','file'));
        $this->load->database();
        $this->load->model('settings_model');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        }  
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
    public function index(){
        $data['pic']=$this->settings_model->selectpic();
        $this->load->view('settings_view',$data);
    }
    public function picupload(){
        $image=$this->doupload();
        $data=$this->settings_model->selectpic();
        foreach($data as $d){
            $link=$d->image;
        }
        unlink('./images/'.$link);
        $this->settings_model->updatepic($image);
        redirect(base_url()."Settings");
    }
    public function userupdate(){
        $this->form_validation->set_rules('user','user','required');
        if($this->form_validation->run()==TRUE){
           $user= $this->input->post('user');
           $this->settings_model->updateuser($user);
           redirect(base_url()."Settings");

        }
    }
    public function passwordupdate(){
        $this->form_validation->set_rules('oldp','oldp','required');
        $this->form_validation->set_rules('newp','newp','required');
        if($this->form_validation->run()==TRUE){
            $oldp= $this->input->post('oldp');
            $newp= $this->input->post('newp');
            $data=$this->settings_model->selectpic();
            foreach($data as $d){
                $oldpass=$d->password;
            }
            if($oldpass==$oldp){
                $this->settings_model->updatepass($newp);
            }else{
                echo "miss match";
            }
        }else{
            echo "form validation error";
        }
        redirect(base_url()."Settings");


    }
    public function blogupdate(){
        $this->form_validation->set_rules('blog_id','blog_id','required');
        if($this->form_validation->run()==TRUE){
           $blogid= $this->input->post('blog_id');
           $this->settings_model->updateblog($blogid);
           redirect(base_url()."Settings");

        }
    }
}
?>