<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewer extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form','file','cookie'));
        $this->load->database();
        $this->load->model('viewer_model');
        $this->load->library(array('form_validation','session'));
    }
    public function posts($user=NULL){
       $dat=$this->viewer_model->fetch($user);
       foreach($dat as $o){
       $userid= $o->username;   }
       $data['posts']=$this->viewer_model->fetchposts($userid);
       $this->load->view('viewer_view',$data);
    }
    public function readmore($id=NULL){
        $data['con']=$this->viewer_model->fetchpost($id);
        $data['com']=$this->viewer_model->fetchcomments($id);
        delete_cookie('url'); 
        $this->load->view('readpost_viewer',$data);
    }
    public function insertcomment($id=NULL){
        if(!$this->session->has_userdata('userid')){
            $url=$this->session->userdata('url');
            $this->input->set_cookie('url',$id,'36000');
            redirect(base_url());
        }
        else{
            delete_cookie('url'); 
        }
        $this->form_validation->set_rules('comment','comment','required');
        if($this->form_validation->run()==TRUE){
            $comment=$this->input->post('comment');
            $user=$this->session->userdata('userid');
            $this->viewer_model->commentinsert($comment,$user,$id);
            redirect(base_url().'Edit/readmore/'.$id);
        }else{
            echo "Form validation error";
        }
    }
}
?>