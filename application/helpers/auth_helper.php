<?php
function is_login()
{
    $get = get_instance();
    //cek
    if (!$get->session->userdata('id_user')) {
        redirect('auth');
    }
    //
    function admin()
    {
        $get = get_instance();
        //jika jabatan tidak sesuai kembalikan ke login
        if ($get->session->userdata('jabatan') != 'admin') {
            redirect('auth');
        }
    }
    //
    function sales()
    {
        $get = get_instance();
        //jika jabatan tidak sesuai kembalikan ke login
        if ($get->session->userdata('jabatan') != 'sales') {
            redirect('auth');
        }
    }
}
