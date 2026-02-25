<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            // nanti bisa tambah middleware login
        }

        public function index()
        {
            $data['title'] = "Admin Dashboard";

            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/layout/footer');
        }
    }
?>