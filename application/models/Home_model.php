<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{
        public function select(){
            $user=$this->session->userdata('userid');
            $query=$this->db->query("select * from posts where user='$user'");
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }

}