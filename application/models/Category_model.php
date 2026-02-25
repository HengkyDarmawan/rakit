<?php
class Category_model extends CI_Model {

    public function get_all()
    {
        return $this->db->order_by('id','DESC')
                        ->get('categories')
                        ->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('categories', ['id'=>$id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('categories', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id',$id)
                        ->update('categories',$data);
    }

    public function delete($id)
    {
        return $this->db->delete('categories',['id'=>$id]);
    }
}