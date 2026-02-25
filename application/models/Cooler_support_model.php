<?php
class Cooler_support_model extends CI_Model {

    public function getAll()
    {
        return $this->db
            ->select('p.id as cooler_id, p.name as cooler_name, GROUP_CONCAT(s.name ORDER BY s.name ASC) as socket_list')
            ->from('cooler_socket_supports css')
            ->join('products p', 'p.id = css.cooler_id')
            ->join('sockets s', 's.id = css.socket_id') // Join ke tabel sockets untuk ambil nama
            ->group_by('p.id, p.name')
            ->get()
            ->result();
    }

    public function getCoolers()
    {
        return $this->db
            ->where('category_id', (int)$this->getCategoryId('cpu-cooler'))
            ->where('is_active',1)
            ->get('products')
            ->result();
    }

    public function getSockets()
    {
        return $this->db->get('sockets')->result();
    }

    public function getSelectedSockets($cooler_id)
    {
        $rows = $this->db
            ->where('cooler_id',$cooler_id)
            ->get('cooler_socket_supports')
            ->result();

        return array_column($rows,'socket_id');
    }

    public function insert($cooler_id,$socket_ids)
    {
        foreach($socket_ids as $socket_id){
            $this->db->insert('cooler_socket_supports',[
                'cooler_id'=>$cooler_id,
                'socket_id'=>$socket_id,
                'created_at'=>date('Y-m-d H:i:s')
            ]);
        }
    }

    public function update($cooler_id,$socket_ids)
    {
        $this->db->where('cooler_id',$cooler_id)
                 ->delete('cooler_socket_supports');

        $this->insert($cooler_id,$socket_ids);
    }

    public function delete($cooler_id)
    {
        $this->db->where('cooler_id',$cooler_id)
                 ->delete('cooler_socket_supports');
    }

    private function getCategoryId($slug)
    {
        return $this->db->where('slug',$slug)
                        ->get('categories')
                        ->row()
                        ->id ?? 0;
    }
    public function getConfiguredCoolerIds() {
        $query = $this->db->select('cooler_id')->distinct()->get('cooler_socket_supports');
        return array_column($query->result_array(), 'cooler_id');
    }
}