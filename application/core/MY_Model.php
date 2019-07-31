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
            return $this->db->affected_rows();
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
}