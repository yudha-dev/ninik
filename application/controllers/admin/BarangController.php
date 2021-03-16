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
    //
    public function store()
    {
        //ambil data dari form
        $post = $this->input->post();
        $data = array(
            'id_kategori'   => $post['kategori'],
            'nama_barang'   => ucwords($post['nama_barang']),
            'harga_beli'    => preg_replace("/[^0-9]/", "", $post['harga_beli']),
            'harga_jual'    => preg_replace("/[^0-9]/", "", $post['harga_jual']),
            'stock'         => $post['stock'],
            'aktif'         => 1,
        );
        $this->Barang->save($data);
        redirect(site_url('admin/barang'));
    }
    //
    public function edit($id)
    {
        $kategori = $this->Kategori->getAll()->result();

        $data = [
            'barang'     =>  $this->Barang->getById($id)->row(),
            'folder'     => 'barang',
            'page'       => 'edit_barang',
            'title'      => 'Edit Data Barang',
            'kategori'   => $kategori
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //update data
    public function update()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $data = array(
            'id_kategori'   => $post['kategori'],
            'nama_barang'   => ucwords($post['nama_barang']),
            'harga_beli'    => preg_replace("/[^0-9]/", "", $post['harga_beli']),
            'harga_jual'    => preg_replace("/[^0-9]/", "", $post['harga_jual']),
            'stock'         => $post['stock'],
        );

        $this->Barang->update($data, $id);
        redirect(site_url('admin/barang'));
    }
    //delete data
    public function delete($id)
    {
        $this->Barang->delete($id);
        $this->session->set_flashdata('hapus', 'Data kategori berhasil dihapus');
        redirect(site_url('admin/barang'));
    }
}
