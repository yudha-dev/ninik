<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Sales');
        $this->load->library('form_validation');
        is_login();
        admin();
    }
    //
    public function index()
    {
        $sales = $this->Sales->getAll()->result();

        $data = [
            'folder'    => 'sales',
            'page'      => 'index',
            'title'     => 'Data Sales',
            'sales'     => $sales
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function tambahsales()
    {
        $data = [
            'folder'            => 'sales',
            'page'              => 'tambah_sales',
            'title'             => 'Tambah Sales',
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function store()
    {
        //ambil data dari form
        $post = $this->input->post();
        //
        $upload_image = $_FILES['foto_profil']['name'];

        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024;
        $config['upload_path']          = './assets/media/avatars/';

        $this->load->library('upload', $config);

        $this->upload->initialize($config);
        $this->upload->do_upload('foto_profil');
        $gambar = $this->upload->data('file_name');
        $data = array(
            'username'      => $post['username'],
            'password'      => password_hash($post['password'], PASSWORD_DEFAULT),
            'nama_lengkap'  => ucwords($post['nama_lengkap']),
            'alamat'        => $post['alamat'],
            'no_hp'         => $post['no_hp'],
            'aktif'         => 1,
            'jabatan'       => 'sales',
        );
        if ($gambar != '') {
            $data['foto_profil'] = $upload_image;
        }
        $this->Sales->save($data);
        redirect(site_url('admin/sales'));
    }
    //
    public function edit($id)
    {
        $data = [
            'sales'      =>  $this->Sales->getById($id)->row(),
            'folder'     => 'sales',
            'page'       => 'edit_sales',
            'title'      => 'Edit Data Sales'
        ];

        $this->load->view('admin/templates/index', $data);
    }
    //
    public function update()
    {
        //ambil data dari form
        $post = $this->input->post();
        //
        $upload_image = $_FILES['foto_profil']['name'];

        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024;
        $config['upload_path']          = './assets/media/avatars/';

        $this->load->library('upload', $config);

        $this->upload->initialize($config);
        $this->upload->do_upload('foto_profil');
        $gambar = $this->upload->data('file_name');
        $id = $post['id'];
        $data = array(
            'username'      => $post['username'],
            'password'      => password_hash($post['password'], PASSWORD_DEFAULT),
            'nama_lengkap'  => ucwords($post['nama_lengkap']),
            'alamat'        => $post['alamat'],
            'no_hp'         => $post['no_hp'],
            'jabatan'       => 'sales',
        );
        if ($gambar != '') {
            $data['foto_profil'] = $upload_image;
        }
        $this->Sales->update($data, $id);
        redirect(site_url('admin/sales'));
    }
    //
    public function delete($id)
    {
        $this->Sales->delete($id);
        redirect(site_url('admin/sales'));
    }
}
