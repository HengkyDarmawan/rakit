<?php
class Builder_model extends CI_Model {

    public function getByCategorySlug($slug)
    {
        return $this->db
            ->select('p.*')
            ->from('products p')
            ->join('categories c','c.id = p.category_id')
            ->where('c.slug', $slug)
            ->where('p.is_active',1)
            ->order_by('p.stock','DESC')
            ->get()
            ->result();
    }

    public function getMotherboard($socket_id)
    {
        if(!$socket_id) return [];
        
        // Gunakan ID langsung jika ragu dengan slug, 
        // atau pastikan database lowercase: motherboard
        $cat_id = $this->getCategoryId('motherboard'); 
        
        return $this->db
            ->where('socket_id', $socket_id)
            ->where('category_id', $cat_id)
            ->where('is_active', 1)
            ->order_by('stock', 'DESC')
            ->get('products')
            ->result();
    }

    public function getRam($ram_type_id)
    {
        $cat_id = $this->getCategoryId('ram');
        
        if($ram_type_id) {
            $this->db->where('ram_type_id', $ram_type_id);
        }
        
        return $this->db
            ->where('category_id', $cat_id)
            ->where('is_active', 1)
            ->get('products')
            ->result();
    }

    public function getCooler($socket_id)
    {
        return $this->db
            ->select('p.*')
            ->from('products p')
            ->join('cooler_socket_supports css','css.product_id = p.id')
            ->where('css.socket_id',$socket_id)
            ->where('p.is_active',1)
            ->get()
            ->result();
    }

    public function getPsu($total_watt)
    {
        $recommended = ceil($total_watt * 1.3);

        return $this->db
            ->where('max_watt >=',$recommended)
            ->where('category_id',(int)$this->getCategoryId('psu'))
            ->get('products')
            ->result();
    }

    public function getVga($fan_support)
    {
        $cat_id = $this->getCategoryId('vga');
        
        // Jika fan_support casing tidak diset, tampilkan semua VGA
        if($fan_support > 0) {
            $this->db->where('fan_count <=', $fan_support);
        }

        return $this->db
            ->where('category_id', $cat_id)
            ->where('is_active', 1)
            ->get('products')
            ->result();
    }

    private function getCategoryId($slug)
    {
        // Gunakan LOWER untuk menghindari masalah Huruf Kapital di Database
        $row = $this->db
            ->where('LOWER(slug)', strtolower($slug))
            ->get('categories')
            ->row();

        return $row ? $row->id : 0;
    }
}