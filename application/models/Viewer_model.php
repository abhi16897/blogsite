<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewer_model extends CI_Model{
    public function fetch($user){
        $query=$this->db->query("select username from users where blog_id='$user'");
        if($query->num_rows()){
            return $query->result();
        }else{
            return false;
        }
    }
    public function fetchposts($user){
        $query=$this->db->query("select * from posts where user='$user'");
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function fetchpost($id){
        $query=$this->db->query("select * from posts where id='$id'");
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function fetchcomments($id){
        $query=$this->db->query("select * from comments where id='$id'");
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function commentinsert($comment,$user,$id){
        $data=date('d-m-y');
        $query=$this->db->query("insert into comments (comment,user,id,cm_date) values ('$comment','$user','$id','$data')");
    } 
}