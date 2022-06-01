<?php


class User_model extends CI_Model
{
    function insertUser($data)
    {
        $email = $data['email'];
        $query = $this->db->query("SELECT * from users WHERE email='$email'");
        if ($query->num_rows() == 1) {
            return 0;
        } else {
            $this->db->insert('users', $data);
            return 1;
        }
    }
    function  checkPassword($password, $email)
    {
        $query = $this->db->query("SELECT * from users WHERE email='$email' and password='$password' ");
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
