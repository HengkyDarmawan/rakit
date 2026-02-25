<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_factors extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_factor_model');
    }

    public function index()
    {
        $data['title'] = 'Master Form Factors';
        $data['form_factors'] = $this->Form_factor_model->get_all();

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/form_factors/index',$data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if($this->input->post()){
            $this->Form_factor_model->insert([
                'name' => $this->input->post('name'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('admin/form_factors');
        }

        $data['title'] = 'Tambah Form Factor';

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/form_factors/create',$data);
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        if($this->input->post()){
            $this->Form_factor_model->update($id,[
                'name' => $this->input->post('name')
            ]);
            redirect('admin/form_factors');
        }

        $data['title'] = 'Edit Form Factor';
        $data['form_factor'] = $this->Form_factor_model->get_by_id($id);

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/form_factors/edit',$data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Form_factor_model->delete($id);
        redirect('admin/form_factors');
    }
}