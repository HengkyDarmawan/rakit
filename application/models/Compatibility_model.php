<?php
class Compatibility_model extends CI_Model {

    public function get_all_rules() {
        $this->db->select('csr.*, c.name as chipset_name, s.name as socket_name');
        $this->db->from('chipset_socket_rules csr');
        $this->db->join('chipsets c', 'c.id = csr.chipset_id');
        $this->db->join('sockets s', 's.id = csr.socket_id');
        return $this->db->get()->result();
    }

    public function add_rule($data) {
        return $this->db->insert('chipset_socket_rules', $data);
    }

    public function delete_rule($id) {
        return $this->db->delete('chipset_socket_rules', ['id' => $id]);
    }
    public function get_selected_chipsets($socket_id) {
        $rows = $this->db->where('socket_id', $socket_id)->get('chipset_socket_rules')->result();
        return array_column($rows, 'chipset_id');
    }

    public function update_rules($socket_id, $chipset_ids) {
        // Hapus aturan lama untuk socket ini agar tidak duplikat
        $this->db->where('socket_id', $socket_id)->delete('chipset_socket_rules');
        
        // Input aturan baru
        if(!empty($chipset_ids)) {
            foreach($chipset_ids as $cid) {
                $this->db->insert('chipset_socket_rules', [
                    'socket_id' => $socket_id,
                    'chipset_id' => $cid
                ]);
            }
        }
    }
}