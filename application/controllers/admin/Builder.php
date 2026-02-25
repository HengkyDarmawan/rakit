<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Builder extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Builder_model');
    }

    public function index()
    {
        $data['cpus'] = $this->Builder_model->getByCategorySlug('cpu');
        $data['casings'] = $this->Builder_model->getByCategorySlug('casing');

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/builder/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function get_motherboard()
    {
        $socket_id = $this->input->post('socket_id');
        echo json_encode($this->Builder_model->getMotherboard($socket_id));
    }

    public function get_ram()
    {
        $ram_type_id = $this->input->post('ram_type_id');
        echo json_encode($this->Builder_model->getRam($ram_type_id));
    }

    public function get_cooler()
    {
        $socket_id = $this->input->post('socket_id');
        echo json_encode($this->Builder_model->getCooler($socket_id));
    }

    public function get_psu()
    {
        $total_watt = $this->input->post('total_watt');
        echo json_encode($this->Builder_model->getPsu($total_watt));
    }

    public function get_vga()
    {
        $fan_support = $this->input->post('fan_support');
        echo json_encode($this->Builder_model->getVga($fan_support));
    }
}