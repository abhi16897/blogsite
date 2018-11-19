<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model{
        public function selectpic(){
            $user=$this->session->userdata('userid');
            $query=$this->db->query("select * from users where username='$user'");
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return FALSE;
            }
        }
        public function updatepic($image){
            $user=$this->session->userdata('userid');
        $this->db->query("update users set image='$image' where username='$user'");
        
        }
        public function updateuser($user){
            $oluser=$this->session->userdata('userid');
            $this->db->query("update users set username='$user' where username='$oluser'");  
            $this->db->query("update posts set user='$user' where user='$oluser'");  
            $this->session->set_userdata('userid',$user);
        }
        public function updatepass($newp){
            $oluser=$this->session->userdata('userid');
            $this->db->query("update users set password='$newp' where username='$oluser'");  
        }
        public function updateblog($blogid){
           $query=$this->db->query("select * from users where blog_id='$blogid'");
           if($query->num_rows()>0){
            $this->session->set_flashdata('blogid','Blog id already exits try another');
            redirect(base_url().'Settings');
           }else{
            $oluser=$this->session->userdata('userid');
            $this->db->query("update users set blog_id='$blogid' where username='$oluser'");  
           }
        }
}