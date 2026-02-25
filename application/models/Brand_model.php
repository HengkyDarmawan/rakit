<?php
class Brand_model extends CI_Model {

    public function get_all()
    {
        return $this->db->order_by('id','DESC')
                        ->get('brands')
                        ->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('brands', ['id'=>$id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('brands', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id',$id)
                        ->update('brands',$data);
    }

    public function delete($id)
    {
        return $this->db->delete('brands',['id'=>$id]);
    }
}