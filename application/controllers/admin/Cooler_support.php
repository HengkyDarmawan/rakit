<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cooler_support extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cooler_support_model');
    }

    public function index()
    {
        $data['supports'] = $this->Cooler_support_model->getAll();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/cooler_support/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        // Di dalam function create() dan edit()
        $data['configured_ids'] = $this->Cooler_support_model->getConfiguredCoolerIds();
        $data['coolers'] = $this->Cooler_support_model->getCoolers();
        $data['sockets'] = $this->Cooler_support_model->getSockets();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/cooler_support/create', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $this->Cooler_support_model->insert(
            $this->input->post('cooler_id'),
            $this->input->post('socket_ids')
        );

        redirect('admin/cooler_support');
    }

    public function edit($cooler_id)
    {
        // Di dalam function create() dan edit()
        $data['configured_ids'] = $this->Cooler_support_model->getConfiguredCoolerIds();
        $data['coolers'] = $this->Cooler_support_model->getCoolers();
        $data['sockets'] = $this->Cooler_support_model->getSockets();
        $data['selected'] = $this->Cooler_support_model->getSelectedSockets($cooler_id);
        $data['cooler_id'] = $cooler_id;

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/cooler_support/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($cooler_id)
    {
        $this->Cooler_support_model->update(
            $cooler_id,
            $this->input->post('socket_ids')
        );

        redirect('admin/cooler_support');
    }

    public function delete($cooler_id)
    {
        $this->Cooler_support_model->delete($cooler_id);
        redirect('admin/cooler_support');
    }
}