<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chipsets extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chipset_model');
    }

    public function index()
    {
        $data['title'] = 'Master Chipsets';
        $data['chipsets'] = $this->Chipset_model->get_all();

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/chipsets/index',$data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        if($this->input->post()){
            $this->Chipset_model->insert([
                'socket_id' => $this->input->post('socket_id'),
                'name' => $this->input->post('name'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('admin/chipsets');
        }

        $data['title'] = 'Tambah Chipset';
        $data['sockets'] = $this->Chipset_model->get_sockets();

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/chipsets/create',$data);
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        if($this->input->post()){
            $this->Chipset_model->update($id,[
                'socket_id' => $this->input->post('socket_id'),
                'name' => $this->input->post('name')
            ]);
            redirect('admin/chipsets');
        }

        $data['title'] = 'Edit Chipset';
        $data['chipset'] = $this->Chipset_model->get_by_id($id);
        $data['sockets'] = $this->Chipset_model->get_sockets();

        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/chipsets/edit',$data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->Chipset_model->delete($id);
        redirect('admin/chipsets');
    }
}