<?php
class ActivitiesModel extends My_Model
{
    protected static $table = 'activities';
    function getTodays()
    {
        $query = $this->db->query("SELECT a.*,b.fullname,b.emailid,b.phone,b.address FROM `activities` a left join `customers` b on a.customer_id=b.id where DATE(next_time)='" . date('Y-m-d') . "'");
        $row = $query->result_array();
        return $row;
    }
}
