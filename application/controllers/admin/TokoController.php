<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TokoController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array('toko', 'wilayah'));
        $this->load->library('form_validation');
        is_login();
        admin();
    }

    public function index()
    {
        $toko = $this->toko->getAll()->result();

        $data = [
            'folder'    => 'toko',
            'page'      => 'index',
            'title'     => 'Data Toko',
            'toko'      => $toko,
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function tambahToko()
    {
        $wilayah = $this->wilayah->getAll()->result();

        $data = [
            'folder'            => 'toko',
            'page'              => 'tambah_toko',
            'title'             => 'Tambah Toko',
            'wilayah'           => $wilayah
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function store()
    {
        //ambil data dari form
        $post = $this->input->post();
        // vaidasi form
        $validation = $this->form_validation;
        $validation->set_rules('nama_toko', 'Nama Toko', 'required|is_unique[toko.nama_toko]', array('required' => '%s wajib diisi', 'is_unique' => '%s sudah terdaftar'));
        $validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array('required' => '%s wajib diisi'));
        if ($validation->run() == false) {
            return $this->tambahToko();
        } else {
            $data = array(
                'id_wilayah'    => $post['wilayah'],
                'nama_toko'     => ucwords($post['nama_toko']),
                'alamat_toko'   => ucwords($post['alamat_toko']),
                'nama_pemilik'  => ucwords($post['nama_pemilik']),
                'no_telp'       => $post['no_telp'],
                'aktif'         => 1
            );
            $this->toko->save($data);
            redirect(site_url('admin/toko'));
        }
    }
    //
    public function edit($id)
    {
        $wilayah = $this->wilayah->getAll()->result();
        $data = [
            'toko'       =>  $this->toko->getById($id)->row(),
            'folder'     => 'toko',
            'page'       => 'edit_toko',
            'title'      => 'Edit Data Toko',
            'wilayah'    => $wilayah
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //update data
    public function update()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $data = array(
            'id_wilayah'    => $post['wilayah'],
            'nama_toko'     => ucwords($post['nama_toko']),
            'alamat_toko'   => ucwords($post['alamat_toko']),
            'nama_pemilik'  => ucwords($post['nama_pemilik']),
            'no_telp'       => $post['no_telp'],
        );
        $this->toko->update($data, $id);
        $this->session->set_flashdata('update', 'Edit data kategori berhasil');
        redirect(site_url('admin/toko'));
    }
    //delete data
    public function delete($id)
    {
        $this->toko->delete($id);
        $this->session->set_flashdata('hapus', 'Data kategori berhasil dihapus');
        redirect(site_url('admin/toko'));
    }
}
