<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WilayahController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('wilayah');
        $this->load->library('form_validation');
        is_login();
        admin();
    }
    //
    public function index()
    {
        $wilayah = $this->wilayah->getAll()->result();

        $data = [
            'folder'    => 'wilayah',
            'page'      => 'index',
            'title'     => 'Data Wilayah',
            'wilayah'   => $wilayah
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function tambahWilayah()
    {
        $data = [
            'folder'            => 'wilayah',
            'page'              => 'tambah_wilayah',
            'title'             => 'Tambah Wilayah',
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
        $validation->set_rules('nama_kota', 'Nama Wilayah', 'required|is_unique[wilayah.nama_kota]', array('required' => '%s wajib diisi', 'is_unique' => '%s sudah terdaftar'));
        if ($validation->run() == false) {
            return $this->tambahWilayah();
        } else {
            $data = array(
                'nama_kota'     => ucwords($post['nama_kota']),
                'aktif'         => 1
            );
            $this->wilayah->save($data);
            redirect(site_url('admin/wilayah'));
        }
    }
    //
    public function edit($id)
    {
        $data = [
            'wilayah'    =>  $this->wilayah->getById($id)->row(),
            'folder'     => 'wilayah',
            'page'       => 'edit_wilayah',
            'title'      => 'Edit Data Wilayah'
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //update data
    public function update()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $validation = $this->form_validation;
        $validation->set_rules('nama_kota', 'Nama Kota', 'required', array('required' => '%s wajib diisi'));
        if ($validation->run() == false) {
            return $this->edit($id);
        } else {
            $data = array(
                'nama_kota'      => $post['nama_kota']
            );
            $this->wilayah->update($data, $id);
            redirect(site_url('admin/wilayah'));
        }
    }
    //delete data
    public function delete($id)
    {
        $this->wilayah->delete($id);
        $this->session->set_flashdata('hapus', 'Data kategori berhasil dihapus');
        redirect(site_url('admin/wilayah'));
    }
}
