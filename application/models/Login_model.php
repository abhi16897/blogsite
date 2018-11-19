<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
public function checkdata($username){
    $result=$this->db->query("select * from users where username='$username'");
    if($result->num_rows()==1){
        return $result->row_object();
    }else{
        return FALSE;
    }
}
public function checkdat($email){
    $result=$this->db->query("select * from users where email='$email'");
    if($result->num_rows()==1){
        return $result->row_object();
    }else{
        return FALSE;
    }
}
public function insert($username,$password,$email){
    $query=$this->db->query("insert into users(username,password,blog_id,email)values('$username','$password','$username','$email')");

}
}
?>