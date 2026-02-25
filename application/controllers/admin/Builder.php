<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Builder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Builder_model');
        // $this->load->library('session'); // Pastikan library ini aktif
    }

    public function create() {
        // Ambil data dasar yang tidak butuh filter
        $data['cpus']     = $this->Builder_model->get_products_by_category(1);
        $data['vgas']     = $this->Builder_model->get_products_by_category(4);
        $data['storages'] = $this->Builder_model->get_products_by_category(6);
        $data['psus']     = $this->Builder_model->get_products_by_category(5);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/builder/create', $data);
        $this->load->view('admin/layout/footer');
    }

    // --- AJAX ENDPOINTS --- //

    public function ajax_get_motherboards() {
        $socket_id = $this->input->post('socket_id');
        $data = $this->Builder_model->get_motherboards_by_socket($socket_id);
        echo json_encode($data);
    }

    public function ajax_get_rams() {
        $ram_type_id = $this->input->post('ram_type_id');
        $data = $this->Builder_model->get_rams_by_type($ram_type_id);
        echo json_encode($data);
    }

    public function ajax_get_cases() {
        $form_factor_id = $this->input->post('form_factor_id');
        $data = $this->Builder_model->get_cases_by_form_factor($form_factor_id);
        echo json_encode($data);
    }

    public function ajax_get_coolers() {
        $socket_id = $this->input->post('socket_id');
        $data = $this->Builder_model->get_coolers_by_socket($socket_id);
        echo json_encode($data);
    }

    public function ajax_save_draft() {
        $post = $this->input->post();
        
        if(empty($post['customer_name'])) {
            echo json_encode(['status' => 'error', 'msg' => 'Nama Customer harus diisi!']);
            return;
        }

        $items = [];
        $total_cost = 0;
        $total_price = 0;
        $total_watt = 0;

        // Kumpulkan ID komponen dari form
        $component_ids = [
            $post['cpu_id'], $post['mobo_id'], $post['ram_id'], 
            $post['vga_id'], $post['storage_id'], $post['psu_id'], 
            $post['case_id'], $post['cooler_id']
        ];

        foreach ($component_ids as $id) {
            if (!empty($id)) {
                $product = $this->db->get_where('products', ['id' => $id])->row();
                if($product) {
                    $items[] = [
                        'product_id'    => $product->id,
                        'cost_price'    => $product->cost_price,
                        'selling_price' => $product->selling_price,
                        'watt'          => $product->watt
                    ];
                    $total_cost += $product->cost_price;
                    $total_price += $product->selling_price;
                    $total_watt += $product->watt;
                }
            }
        }

        $build_data = [
            'code'                 => 'BLD-'.time(),
            'customer_name'        => $post['customer_name'],
            'total_cost'           => $total_cost,
            'total_price'          => $total_price,
            'total_watt'           => $total_watt,
            'recommended_psu_watt' => $total_watt + 150, // Buffer aman
            'estimated_profit'     => $total_price - $total_cost,
            'status'               => 'draft',
            'created_at'           => date('Y-m-d H:i:s')
        ];

        $save = $this->Builder_model->save_build($build_data, $items);

        if ($save) {
            echo json_encode(['status' => 'success', 'msg' => 'Draft Rakitan Berhasil Disimpan!']);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Gagal menyimpan database']);
        }
    }
}