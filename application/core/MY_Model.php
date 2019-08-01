<?php
class MY_Model extends CI_Model
{
    public function save($data, $logindata)
    {
        // Prepare the data array
        $cols = $this->get_structure();
        $data_array = array();
        foreach ($cols as $col) {
            if ($col != 'id' && $col != '') {
                if (array_key_exists($col, $data)) {
                    $data_array[$col] = $data[$col];
                } else {
                    $data_array[$col] = '';
                }
            }
        }

        if ($data['id'] != '' || $data['id'] != null) {
            $data_array['modified_on'] = FULLDATE;
            $data_array['modified_by'] = $logindata;
            $this->db->where('id', $data['id']);
            $this->db->update(static::$table, $data_array);
            return $data['id'];
        } else {
            $data_array['created_on'] = FULLDATE;
            $data_array['created_by'] = $logindata;
            $this->db->insert(static::$table, $data_array);
            $insertid = $this->db->insert_id();
            return $insertid;
        }
        return false;
    }
    public function get_table()
    {
        $fields = $this->db->list_fields(static::$table);
        $f_array = array();
        foreach ($fields as $field) {
            $f_array[$field] = '';
        }
        return $f_array;
    }

    public function get_structure()
    {
        $fields = $this->db->list_fields(static::$table);
        $f_array = array();
        foreach ($fields as $field) {
            $f_array[] = $field;
        }
        return $f_array;
    }
    public function get_by_id($id)
    {
        $q = $this->db->select('*')
            ->from(static::$table)
            ->where('id', $id)
            ->get();
        $data = $q->result_array();
        if (!empty($data)) {
            return $data[0];
        }
        return false;
    }
    function check_exists($arr = array())
    {
        if (!empty($arr)) {
            $q = $this->db->select('*')
                ->from(static::$table)
                ->or_where($arr)
                ->get();
            return $data = $q->result_array();
        }
        return array();
    }
    function countData()
    {
        $qrty = $this->db->select('*')
            ->from(static::$table)
            ->where('deleted', 0)
            ->count_all_results();
        return $qrty;
    }
    function getAll($select, $limit = array(10, 0), $where = array(), $cond = "and", $order = array('id', 'DESC'), $deleted = 0)
    {
        if (!empty($select)) {
            $select = implode(', ', $select);
        } else {
            $select = '*';
        }
        $this->db->select($select);
        $this->db->from(static::$table);

        $this->db->where('deleted', $deleted);

        // Set order by 
        if (empty($order)) {
            $order = array('id', 'DESC');
        }

        $this->db->order_by($order[0], $order[1]);

        // set offset and limit
        if (empty($limit)) {
            $limit = array(10, 0);
        }
        $this->db->limit($limit[0], $limit[1]);

        $q = $this->db->get();
        // var_dump($this->db->last_query());
        return $q->result_array();
    }
    public function get_by_where($arr)
    {
        $q = $this->db->select('*')
            ->from(static::$table)
            ->where($arr)
            ->get();
        $arr = $q->result_array();
        return $arr;
    }
}