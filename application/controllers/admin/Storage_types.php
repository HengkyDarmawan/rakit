<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storage_types extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Storage_type_model');
    }

    public function index()
    {
        $data['title'] = 'Storage Types';
        $data['storage_types'] = $this->Storage_type_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/storage_types/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if ($this->input->post()) {

            $data = [
                'name'           => $this->input->post('name'),
                'interface_type' => $this->input->post('interface_type'),
                'created_at'     => date('Y-m-d H:i:s')
            ];

            $this->Storage_type_model->insert($data);
            redirect('admin/storage_types');
        }

        $data['title'] = 'Tambah Storage Type';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/storage_types/create');
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $storage = $this->Storage_type_model->get($id);
        if (!$storage) show_404();

        if ($this->input->post()) {

            $data = [
                'name'           => $this->input->post('name'),
                'interface_type' => $this->input->post('interface_type')
            ];

            $this->Storage_type_model->update($id, $data);
            redirect('admin/storage_types');
        }

        $data['title'] = 'Edit Storage Type';
        $data['storage'] = $storage;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/storage_types/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Storage_type_model->delete($id);
        redirect('admin/storage_types');
    }
}