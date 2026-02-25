<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['title'] = "Categories";
        $data['categories'] = $this->Category_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/categories/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/categories/create');
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

        $this->Category_model->insert($data);

        redirect('admin/categories');
    }

    public function edit($id)
    {
        $data['category'] = $this->Category_model->get_by_id($id);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/categories/edit', $data);
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

        $this->Category_model->update($id, $data);

        redirect('admin/categories');
    }

    public function delete($id)
    {
        $this->Category_model->delete($id);
        redirect('admin/categories');
    }
}