<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeranjangController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array('Barang', 'Toko', 'Keranjang'));
        $this->load->library('form_validation');
        is_login();
        sales();
    }
    //
    public function index()
    {
        $id        = $this->session->userdata('id_user');
        $keranjang = $this->Keranjang->getAll($id)->result();
        $barang    = $this->Barang->getAll()->result();
        $toko      = $this->Toko->getByuser($id)->result();

        $data = [
            'folder'    => 'transaksi',
            'page'      => 'index',
            'title'     => 'Transaksi',
            'keranjang' => $keranjang,
            'barang'    => $barang,
            'toko'      => $toko
        ];

        $this->load->view('sales/templates/index', $data);
    }
    //
    public function store()
    {
    }
}
