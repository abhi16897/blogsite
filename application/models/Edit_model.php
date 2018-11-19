<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_model extends CI_Model{
    public function insertpost($title,$content,$image){
        $date=date("Y-m-d");
        $user=$this->session->userdata('userid');
        $this->db->query("insert into posts (title,content,image,blog_date,user) values ('$title','$content','$image','$date','$user')");
    }
    public function delete($id){
        $this->db->query("delete from posts where id='$id'");
    }
    public function fetch($id){
       $query=$this->db->query("select * from posts where id='$id'");
       if($query->num_rows()>0){
        return $query->result();
    }else{
        return false;
    }
    }
    public function updatepost($title,$content,$image,$id){
        $this->db->query("update posts set title='$title',content='$content',image='$image' where id='$id'");
    }
    public function fetchcomment($id){
        $query=$this->db->query("select * from comments where id='$id'");
        if($query->num_rows()>0){
         return $query->result();
     }else{
         return false;
     }
     }
     public function commentdelete($id){
        $query=$this->db->query("delete from comments where c_id='$id'");

     }
     public function fetchc($id){
        $query=$this->db->query("select * from comments where c_id='$id'");
        if($query->num_rows()>0){
         return $query->result();
     }else{
         return false;
     }
     }
    }