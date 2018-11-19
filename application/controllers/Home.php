<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->model('Home_model');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
    }
    public function index(){
        $data['posts']=$this->Home_model->select();
        $this->load->view('Home_view',$data);
    }
}