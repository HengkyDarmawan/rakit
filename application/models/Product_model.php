<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    protected $table = 'products';

    /*
    |--------------------------------------------------------------------------
    | GET ALL PRODUCTS (With Full Join)
    |--------------------------------------------------------------------------
    */

    public function get_all()
    {
        $this->db->select("
            p.*,
            c.name as category_name,
            b.name as brand_name,
            s.name as socket_name,
            rt.name as ram_type_name,
            rs.speed_mhz as ram_speed_mhz,
            ch.name as chipset_name,
            ff.name as form_factor_name,
            st.name as storage_type_name,
            ct.name as cooler_type_name,
            ft.name as fan_type_name
        ");

        $this->db->from($this->table . ' p');

        $this->join_master();

        $this->db->order_by('p.id', 'DESC');

        return $this->db->get()->result();
    }

    /*
    |--------------------------------------------------------------------------
    | GET SINGLE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function get_by_id($id)
    {
        $this->db->select("
            p.*,
            c.name as category_name,
            b.name as brand_name,
            s.name as socket_name,
            rt.name as ram_type_name,
            rs.speed_mhz as ram_speed_mhz,
            ch.name as chipset_name,
            ff.name as form_factor_name,
            st.name as storage_type_name,
            ct.name as cooler_type_name,
            ft.name as fan_type_name
        ");

        $this->db->from($this->table . ' p');
        $this->db->where('p.id', $id);

        $this->join_master();

        return $this->db->get()->row();
    }

    /*
    |--------------------------------------------------------------------------
    | INSERT PRODUCT
    |--------------------------------------------------------------------------
    */

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function update($id, $data)
    {
        return $this->db->where('id', $id)
                        ->update($this->table, $data);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        return $this->db->where('id', $id)
                        ->delete($this->table);
    }

    /*
    |--------------------------------------------------------------------------
    | GET PRODUCTS BY CATEGORY (For Builder Step)
    |--------------------------------------------------------------------------
    */

    public function get_by_category($category_id)
    {
        $this->db->where('p.category_id', $category_id);
        $this->db->where('p.is_active', 1);
        $this->db->from($this->table . ' p');

        $this->join_master();

        return $this->db->get()->result();
    }

    /*
    |--------------------------------------------------------------------------
    | GET PRODUCTS BY SOCKET (CPU ↔ MOTHERBOARD FILTER)
    |--------------------------------------------------------------------------
    */

    // public function get_by_socket($socket_id, $category_id)
    // {
    //     $this->db->where('p.socket_id', $socket_id);
    //     $this->db->where('p.category_id', $category_id);
    //     $this->db->where('p.is_active', 1);
    //     return $this->db->get($this->table . ' p')->result();
    // }

    public function get_by_socket($socket_id, $category_id)
    {
        $this->db->from($this->table . ' p');
        $this->db->where('p.socket_id', $socket_id);
        $this->db->where('p.category_id', $category_id);
        $this->db->where('p.is_active', 1);

        $this->join_master();

        return $this->db->get()->result();
    }
    
    /*
    |--------------------------------------------------------------------------
    | HELPER: JOIN ALL MASTER TABLES
    |--------------------------------------------------------------------------
    */

    private function join_master()
    {
        $this->db->join('categories c', 'c.id = p.category_id', 'left');
        $this->db->join('brands b', 'b.id = p.brand_id', 'left');
        $this->db->join('sockets s', 's.id = p.socket_id', 'left');
        $this->db->join('ram_types rt', 'rt.id = p.ram_type_id', 'left');
        $this->db->join('ram_speeds rs', 'rs.id = p.ram_speed_id', 'left');
        $this->db->join('chipsets ch', 'ch.id = p.chipset_id', 'left');
        $this->db->join('form_factors ff', 'ff.id = p.form_factor_id', 'left');
        $this->db->join('storage_types st', 'st.id = p.storage_type_id', 'left');
        $this->db->join('cooler_types ct', 'ct.id = p.cooler_type_id', 'left');
        $this->db->join('fan_types ft', 'ft.id = p.fan_type_id', 'left');
    }

    /*
    |--------------------------------------------------------------------------
    | HITUNG PROFIT
    |--------------------------------------------------------------------------
    */

    public function calculate_profit($product)
    {
        return $product->selling_price - $product->cost_price;
    }

}