<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array('Barang', 'Kategori'));
        $this->load->library('form_validation');
        is_login();
        admin();
    }
    //
    public function index()
    {
        $barang = $this->Barang->getAll()->result();

        $data = [
            'folder'    => 'barang',
            'page'      => 'index',
            'title'     => 'Data Barang',
            'barang'    => $barang
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function tambahBarang()
    {
        $kategori = $this->Kategori->getAll()->result();

        $data = [
            'folder'    => 'barang',
            'page'      => 'tambah_barang',
            'title'     => 'Tambah Barang',
            'kategori'  => $kategori
        ];

        $this->load->view('admin/templates/index', $data);
    }
}
