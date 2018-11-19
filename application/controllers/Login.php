<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form','cookie'));
        $this->load->database();
      $this->load->model('Login_model');
        $this->load->library(array('form_validation','session')); 
    }

    public function index(){
        $this->load->view('Login_view');
    }
    public function register(){
        $this->load->view('Register_view');
    }
    public function login(){
        $this->form_validation->set_rules('username','username',"required");
        $this->form_validation->set_rules('password','password',"required|alpha_numeric");
        if($this->form_validation->run()==TRUE){
            $user=$this->input->post('username');
            $pass=$this->input->post('password');
            $data=$this->Login_model->checkdata($user);
            if(!empty($data)){
                if($data->password==$pass and $data->username==$user){
                    $this->session->set_userdata('userid',$data->username);
                    if (isset($_COOKIE["url"])) {
                        $p=$_COOKIE["url"];
                    redirect(base_url().'Viewer/readmore/'.$p);
                    } else 
                   redirect(base_url().'Home');   
                }
                else{
                    $this->session->set_flashdata('error','wrong email, password combination');
                    redirect(base_url());
                }
            }
            else{
               // $this->session->set_flashdata('error','wrong email, password combination');
                $this->load->view('Login_view');
            }
        }
        else{
            $this->load->view('Login_view');
        }
    }
    public function register_insert(){
        $this->form_validation->set_rules('username','username',"required");
        $this->form_validation->set_rules('email','email',"required|valid_email");
        $this->form_validation->set_rules('password','password',"required|alpha_numeric");
        $this->form_validation->set_rules('confirm_password','confirm_password',"required");
        if($this->form_validation->run()==TRUE){
            $user=$this->input->post('username');
            $pass=$this->input->post('password');
            $email=$this->input->post('email'); 
            $cpass=$this->input->post('confirm_password');
            if($pass==$cpass){
                $t=$this->Login_model->insert($user,$pass,$email);
                $this->session->set_flashdata('sucsess','Registration completed successfully!!!');
                redirect(base_url());
            }else{
                echo 'password mismatch';
            }
        }else{
            $this->load->view('register_view');
        }

    }
    public function logout(){
        $this->session->unset_userdata('userid');
        $this->session->sess_destroy();
        redirect(base_url().'Login');
    }
    public function forget(){
        $this->load->view('forget_view');
    }
    public function retain(){
        $id=$this->input->post('username');
        $config=Array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_port'=>'465',
            'smtp_user'=>'saiabhishek0@gmail.com',
            'smtp_pass'=>'mummydaddy',
        );
        $data=$this->Login_model->checkdat($id);
        if($data){
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from("",'Recovery email');
        $this->email->to($data->email);
        $this->email->subject("Email Recovery System...");
        $this->email->message("The recovery password is  : .$data->password");
        if($this->email->send()){
            $this->session->set_flashdata('emailsucsess','Email sent successfully sucsessfully!!!');
            $this->load->view('Forget_view');
        }else{
            $this->session->set_flashdata('emailerror','Unable to send email try again!!!');
            $this->load->view('Forget_view');
        }

    }else{
        $this->session->set_flashdata('emailerror','Unable to Fetch the Email you entered!!');
        $this->load->view('Forget_view');
    }
}


}
?>