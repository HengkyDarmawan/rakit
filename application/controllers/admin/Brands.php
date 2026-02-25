<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_model');
    }

    public function index()
    {
        $data['title'] = "Brands";
        $data['brands'] = $this->Brand_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/brands/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/brands/create');
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $name = $this->input->post('name');
        $slug = url_title($name, '-', TRUE);

        $data = [
            'name' => $name,
            'slug' => $slug,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Brand_model->insert($data);

        redirect('admin/brands');
    }

    public function edit($id)
    {
        $data['brand'] = $this->Brand_model->get_by_id($id);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/brands/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        $slug = url_title($name, '-', TRUE);

        $data = [
            'name' => $name,
            'slug' => $slug,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Brand_model->update($id, $data);

        redirect('admin/brands');
    }

    public function delete($id)
    {
        $this->Brand_model->delete($id);
        redirect('admin/brands');
    }
}