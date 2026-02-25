<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Builder_model extends CI_Model {

    // Ambil produk dasar yang tidak punya filter ketat ke atasnya
    public function get_products_by_category($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->where('is_active', 1);
        return $this->db->get('products')->result();
    }

    // Filter Motherboard berdasarkan Socket CPU
    public function get_motherboards_by_socket($socket_id) {
        $this->db->where('category_id', 2); // 2 = Motherboard
        $this->db->where('socket_id', $socket_id);
        $this->db->where('is_active', 1);
        return $this->db->get('products')->result();
    }

    // Filter RAM berdasarkan tipe RAM Motherboard (DDR4/DDR5)
    public function get_rams_by_type($ram_type_id) {
        $this->db->where('category_id', 3); // 3 = RAM
        $this->db->where('ram_type_id', $ram_type_id);
        $this->db->where('is_active', 1);
        return $this->db->get('products')->result();
    }

    // Filter Casing berdasarkan Form Factor Motherboard
    public function get_cases_by_form_factor($form_factor_id) {
        $this->db->where('category_id', 7); // 7 = Casing
        $this->db->where('is_active', 1);
        
        // Logic casing: Casing besar bisa memuat MB kecil
        // 1=ATX, 2=M-ATX, 3=ITX, 4=E-ATX
        $allowed_cases = [];
        if ($form_factor_id == 4) { $allowed_cases = [4]; } // E-ATX MB -> E-ATX Case
        if ($form_factor_id == 1) { $allowed_cases = [1, 4]; } // ATX MB -> ATX, E-ATX Case
        if ($form_factor_id == 2) { $allowed_cases = [1, 2, 4]; } // mATX MB -> ATX, mATX, E-ATX Case
        if ($form_factor_id == 3) { $allowed_cases = [1, 2, 3, 4]; } // ITX MB -> Semua Case bisa
        
        if (!empty($allowed_cases)) {
            $this->db->where_in('form_factor_id', $allowed_cases);
        }
        
        return $this->db->get('products')->result();
    }

    // Filter Cooler berdasarkan Socket CPU
    public function get_coolers_by_socket($socket_id)
    {
        // Validasi basic supaya tidak query kosong
        if (empty($socket_id)) {
            return [];
        }

        $this->db->select('p.id, p.name, p.selling_price, p.watt');
        $this->db->from('products p');
        
        // Join ke tabel pivot relasi cooler ↔ socket
        $this->db->join('cooler_socket_supports css', 'css.cooler_id = p.id');
        
        // Filter hanya CPU Cooler
        $this->db->where('p.category_id', 10);
        
        // Filter socket yang sesuai CPU
        $this->db->where('css.socket_id', $socket_id);
        
        // Hanya produk aktif
        $this->db->where('p.is_active', 1);

        // Hindari duplicate jika relasi dobel
        $this->db->group_by('p.id');

        // Optional: urutkan dari harga termurah
        $this->db->order_by('p.selling_price', 'ASC');

        return $this->db->get()->result();
    }

    // Simpan Draft Rakitan
    public function save_build($data, $items) {
        $this->db->trans_start();
        
        // Insert table builds
        $this->db->insert('builds', $data);
        $build_id = $this->db->insert_id();

        // Insert table build_items
        $insert_items = [];
        foreach ($items as $item) {
            $insert_items[] = [
                'build_id'      => $build_id,
                'product_id'    => $item['product_id'],
                'qty'           => 1,
                'cost_price'    => $item['cost_price'],
                'selling_price' => $item['selling_price'],
                'watt'          => $item['watt']
            ];
        }
        if (!empty($insert_items)) {
            $this->db->insert_batch('build_items', $insert_items);
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}