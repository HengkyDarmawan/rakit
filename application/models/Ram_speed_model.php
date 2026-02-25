<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ram_speed_model extends CI_Model {

    private $table = 'ram_speeds';

    public function get_all()
    {
        $this->db->select('ram_speeds.*, ram_types.name as ram_type_name');
        $this->db->from('ram_speeds');
        $this->db->join('ram_types', 'ram_types.id = ram_speeds.ram_type_id');
        $this->db->order_by('ram_types.name', 'ASC');
        $this->db->order_by('ram_speeds.speed_mhz', 'ASC');
        return $this->db->get()->result();
    }

    public function get($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}