<?php 


class User_model extends CI_Model {
    function insertUser ($data) {
        $this->db->insert('users',$data);

    }
    function  checkPassword($password , $email) {
        $query = $this->db->query("SELECT * from users WHERE email='$email' and password='$password' ");
         if($query->num_rows()==1){
            return $query->row();
         }else{
             return false;
         }
    }
}

?>