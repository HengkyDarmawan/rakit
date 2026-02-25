<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fan_types extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fan_type_model');
    }

    public function index()
    {
        $data['title'] = 'Fan Types';
        $data['fan_types'] = $this->Fan_type_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/fan_types/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if ($this->input->post()) {

            $data = [
                'name'       => $this->input->post('name'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Fan_type_model->insert($data);
            redirect('admin/fan_types');
        }

        $data['title'] = 'Tambah Fan Type';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/fan_types/create');
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $fan = $this->Fan_type_model->get($id);
        if (!$fan) show_404();

        if ($this->input->post()) {

            $data = [
                'name' => $this->input->post('name')
            ];

            $this->Fan_type_model->update($id, $data);
            redirect('admin/fan_types');
        }

        $data['title'] = 'Edit Fan Type';
        $data['fan'] = $fan;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/fan_types/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Fan_type_model->delete($id);
        redirect('admin/fan_types');
    }
}