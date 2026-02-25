<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chipset_model extends CI_Model {

    private $table = 'chipsets';

    public function get_all()
    {
        return $this->db
            ->select('chipsets.*, sockets.name as socket_name')
            ->join('sockets','sockets.id = chipsets.socket_id')
            ->order_by('chipsets.name','ASC')
            ->get($this->table)
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table,['id'=>$id])->row();
    }

    public function get_sockets()
    {
        return $this->db->order_by('name','ASC')->get('sockets')->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        return $this->db->update($this->table,$data,['id'=>$id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table,['id'=>$id]);
    }
}