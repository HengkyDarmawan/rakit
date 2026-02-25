<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data['title'] = 'Products';
        $data['products'] = $this->Product_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/products/index', $data);
        $this->load->view('admin/layout/footer');
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $data['title'] = 'Tambah Product';

        $this->_load_master($data);

        if ($this->input->post()) {

            $insert = $this->_collect_input();
            $insert['created_at'] = date('Y-m-d H:i:s');

            $this->Product_model->insert($insert);

            redirect('admin/products');
        }

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/products/create', $data);
        $this->load->view('admin/layout/footer');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $data['title'] = 'Edit Product';
        $data['product'] = $this->Product_model->get_by_id($id);

        if (!$data['product']) {
            show_404();
        }

        $this->_load_master($data);

        if ($this->input->post()) {

            $update = $this->_collect_input();
            $update['updated_at'] = date('Y-m-d H:i:s');

            $this->Product_model->update($id, $update);

            redirect('admin/products');
        }

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/products/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        $this->Product_model->delete($id);
        redirect('admin/products');
    }

    /*
    |--------------------------------------------------------------------------
    | PRIVATE: LOAD MASTER DATA
    |--------------------------------------------------------------------------
    */

    private function _load_master(&$data)
    {
        $data['categories']    = $this->db->get('categories')->result();
        $data['brands']        = $this->db->get('brands')->result();
        $data['sockets']       = $this->db->get('sockets')->result();
        $data['ram_types']     = $this->db->get('ram_types')->result();
        $data['ram_speeds']    = $this->db->get('ram_speeds')->result();
        $data['chipsets']      = $this->db->get('chipsets')->result();
        $data['form_factors']  = $this->db->get('form_factors')->result();
        $data['storage_types'] = $this->db->get('storage_types')->result();
        $data['cooler_types']  = $this->db->get('cooler_types')->result();
        $data['fan_types']     = $this->db->get('fan_types')->result();
    }

    /*
    |--------------------------------------------------------------------------
    | PRIVATE: COLLECT INPUT
    |--------------------------------------------------------------------------
    */

    private function _collect_input()
    {
        return [
            'category_id'     => $this->input->post('category_id'),
            'brand_id'        => $this->input->post('brand_id'),
            'name'            => $this->input->post('name'),
            'slug'            => url_title($this->input->post('name'), '-', TRUE),
            'sku'             => $this->input->post('sku'),
            'barcode'         => $this->input->post('barcode'),

            'cost_price'      => $this->input->post('cost_price'),
            'selling_price'   => $this->input->post('selling_price'),
            'discount_price'  => $this->input->post('discount_price'),
            'stock'           => $this->input->post('stock'),
            'budget'          => $this->input->post('budget'),

            'socket_id'       => $this->input->post('socket_id') ?: NULL,
            'ram_type_id'     => $this->input->post('ram_type_id') ?: NULL,
            'ram_speed_id'    => $this->input->post('ram_speed_id') ?: NULL,
            'chipset_id'      => $this->input->post('chipset_id') ?: NULL,
            'form_factor_id'  => $this->input->post('form_factor_id') ?: NULL,
            'storage_type_id' => $this->input->post('storage_type_id') ?: NULL,
            'cooler_type_id'  => $this->input->post('cooler_type_id') ?: NULL,
            'fan_type_id'     => $this->input->post('fan_type_id') ?: NULL,

            'nvme_slot'         => $this->input->post('nvme_slot') ?: NULL,
            'sata_port'         => $this->input->post('sata_port') ?: NULL,
            'mb_fan_header'     => $this->input->post('mb_fan_header') ?: NULL,
            'case_fan_support'  => $this->input->post('case_fan_support') ?: NULL,
            'fan_count'         => $this->input->post('fan_count') ?: NULL,
            'psu_certification' => $this->input->post('psu_certification') ?: NULL,
            'psu_modular_type'  => $this->input->post('psu_modular_type') ?: NULL,

            // 'ram_speed'       => $this->input->post('ram_speed'),
            'watt'            => $this->input->post('watt') ?: 0,
            'max_watt'        => $this->input->post('max_watt'),

            'description'     => $this->input->post('description'),
            'is_active'       => $this->input->post('is_active') ? 1 : 0,
            'updated_at'      => date('Y-m-d H:i:s')
        ];
    }

}