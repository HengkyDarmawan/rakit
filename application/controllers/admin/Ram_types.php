<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ram_types extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ram_type_model');
    }

    public function index()
    {
        $data['title'] = 'Master RAM Types';
        $data['ram_types'] = $this->Ram_type_model->get_all();

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/ram_types/index',$data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if($this->input->post()){
            $this->Ram_type_model->insert([
                'name' => $this->input->post('name'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('admin/ram_types');
        }

        $data['title'] = 'Tambah RAM Type';

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/ram_types/create',$data);
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        if($this->input->post()){
            $this->Ram_type_model->update($id,[
                'name' => $this->input->post('name')
            ]);
            redirect('admin/ram_types');
        }

        $data['title'] = 'Edit RAM Type';
        $data['ram_type'] = $this->Ram_type_model->get_by_id($id);

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/ram_types/edit',$data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Ram_type_model->delete($id);
        redirect('admin/ram_types');
    }
}