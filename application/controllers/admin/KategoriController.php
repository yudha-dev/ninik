<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Kategori');
        $this->load->library('form_validation');
        is_login();
        admin();
    }

    public function index()
    {
        $kategori = $this->Kategori->getAll()->result();

        $data = [
            'folder'    => 'kategori',
            'page'      => 'index',
            'title'     => 'Data Kategori',
            'kategori'  => $kategori
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //get view tambah kategori
    public function tambahKategori()
    {
        $data = [
            'folder'            => 'kategori',
            'page'              => 'tambah_kategori',
            'title'             => 'Tambah Kategori',
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
        $validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]', array('required' => '%s wajib diisi', 'is_unique' => '%s sudah terdaftar'));
        if ($validation->run() == false) {
            return $this->tambahKategori();
        } else {
            $data = array(
                'nama_kategori' => ucwords($post['nama_kategori']),
                'aktif'         => 1
            );
            $this->Kategori->save($data);
            $this->session->set_flashdata('simpan', 'Tambah data kategori berhasil');
            redirect(site_url('admin/kategori'));
        }
    }
    //
    public function edit($id)
    {
        $data = [
            'kategori'   =>  $this->Kategori->getById($id)->row(),
            'folder'     => 'kategori',
            'page'       => 'edit_kategori',
            'title'      => 'Edit Data Kategori'
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //update data
    public function update()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $validation = $this->form_validation;
        $validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s wajib diisi'));
        if ($validation->run() == false) {
            return $this->edit($id);
        } else {
            $data = array(
                'nama_kategori'             => $post['nama_kategori']
            );
            $this->Kategori->update($data, $id);
            $this->session->set_flashdata('update', 'Edit data kategori berhasil');
            redirect(site_url('admin/kategori'));
        }
    }
    //delete data
    public function delete($id)
    {
        $this->Kategori->delete($id);
        $this->session->set_flashdata('hapus', 'Data kategori berhasil dihapus');
        redirect(site_url('admin/kategori'));
    }
}
