<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sockets extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Socket_model');
    }

    public function index()
    {
        $data['title'] = 'Master Sockets';
        $data['sockets'] = $this->Socket_model->get_all();

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/sockets/index',$data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if($this->input->post()){
            $this->Socket_model->insert([
                'name' => $this->input->post('name'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('admin/sockets');
        }

        $data['title'] = 'Tambah Socket';

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/sockets/create',$data);
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        if($this->input->post()){
            $this->Socket_model->update($id,[
                'name' => $this->input->post('name')
            ]);
            redirect('admin/sockets');
        }

        $data['title'] = 'Edit Socket';
        $data['socket'] = $this->Socket_model->get_by_id($id);

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/sockets/edit',$data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Socket_model->delete($id);
        redirect('admin/sockets');
    }
}