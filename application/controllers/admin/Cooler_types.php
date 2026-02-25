<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cooler_types extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cooler_type_model');
    }

    public function index()
    {
        $data['title'] = 'Cooler Types';
        $data['cooler_types'] = $this->Cooler_type_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/cooler_types/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if ($this->input->post()) {

            $data = [
                'name'       => $this->input->post('name'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Cooler_type_model->insert($data);
            redirect('admin/cooler_types');
        }

        $data['title'] = 'Tambah Cooler Type';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/cooler_types/create');
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $cooler = $this->Cooler_type_model->get($id);
        if (!$cooler) show_404();

        if ($this->input->post()) {

            $data = [
                'name' => $this->input->post('name')
            ];

            $this->Cooler_type_model->update($id, $data);
            redirect('admin/cooler_types');
        }

        $data['title'] = 'Edit Cooler Type';
        $data['cooler'] = $cooler;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/cooler_types/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Cooler_type_model->delete($id);
        redirect('admin/cooler_types');
    }
}