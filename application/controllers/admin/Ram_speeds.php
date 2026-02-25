<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ram_speeds extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ram_speed_model');
        $this->load->model('Ram_type_model'); // pastikan sudah ada
    }

    public function index()
    {
        $data['title'] = 'RAM Speeds';
        $data['ram_speeds'] = $this->Ram_speed_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/ram_speeds/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if ($this->input->post()) {

            $data = [
                'ram_type_id' => $this->input->post('ram_type_id'),
                'speed_mhz'   => $this->input->post('speed_mhz'),
                'created_at'  => date('Y-m-d H:i:s')
            ];

            $this->Ram_speed_model->insert($data);
            redirect('admin/ram_speeds');
        }

        $data['title'] = 'Tambah RAM Speed';
        $data['ram_types'] = $this->Ram_type_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/ram_speeds/create', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $ram_speed = $this->Ram_speed_model->get($id);
        if (!$ram_speed) show_404();

        if ($this->input->post()) {

            $data = [
                'ram_type_id' => $this->input->post('ram_type_id'),
                'speed_mhz'   => $this->input->post('speed_mhz')
            ];

            $this->Ram_speed_model->update($id, $data);
            redirect('admin/ram_speeds');
        }

        $data['title'] = 'Edit RAM Speed';
        $data['ram_speed'] = $ram_speed;
        $data['ram_types'] = $this->Ram_type_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/ram_speeds/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Ram_speed_model->delete($id);
        redirect('admin/ram_speeds');
    }
}