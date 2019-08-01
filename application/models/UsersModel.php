<?php
class UsersModel extends My_Model
{
    protected static $table = 'users';
    public function authenticate($username, $password)
    {
        $this->load->library("Bcrypt");
        $query = $this->db->select("emailid,password,id,fullname,phone")
            ->from($this::$table)
            ->where("emailid", $username)
            ->where("deleted", 0)
            ->limit(1)
            ->get();
        $data = $query->result();
        if (!empty($data)) {
            if ($this->bcrypt->check_password($password, $data[0]->password) == 1) {
                return array('status' => 1, 'rdata' => $data);
            } else {
            }
        } else {
        }
        return array('status' => 0);
    }
}
