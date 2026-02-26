<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compatibility extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Compatibility_model', 'Builder_model']); // Load model pendukung
    }

    public function index() {
        $data['rules'] = $this->Compatibility_model->get_all_rules();
        $data['chipsets'] = $this->db->get('chipsets')->result();
        $data['sockets'] = $this->db->get('sockets')->result();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/compatibility/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store() {
        $data = [
            'chipset_id' => $this->input->post('chipset_id'),
            'socket_id' => $this->input->post('socket_id')
        ];
        $this->Compatibility_model->add_rule($data);
        redirect('admin/compatibility');
    }
    public function manage($socket_id) {
        $data['socket'] = $this->db->get_where('sockets', ['id' => $socket_id])->row();
        $data['chipsets'] = $this->db->get('chipsets')->result();
        $data['selected'] = $this->Compatibility_model->get_selected_chipsets($socket_id);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/compatibility/manage', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($socket_id) {
        $chipset_ids = $this->input->post('chipset_ids');
        $this->Compatibility_model->update_rules($socket_id, $chipset_ids);
        redirect('admin/compatibility');
    }

    public function delete($id) {
        $this->Compatibility_model->delete_rule($id);
        redirect('admin/compatibility');
    }
}