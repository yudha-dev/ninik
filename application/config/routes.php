<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
//logout
$route['logout']                                   = 'Auth/logout';
//admin
$route['admin/beranda']                            = 'admin/DashboardController/index';
//kategori
$route['admin/kategori']                           = 'admin/KategoriController/index';
$route['admin/kategori/tambah_kategori']           = 'admin/KategoriController/tambahKategori';
$route['admin/kategori/store']                     = 'admin/KategoriController/store';
$route['admin/kategori/edit_kategori/(:any)']      = 'admin/KategoriController/edit/$1';
$route['admin/kategori/update']                    = 'admin/KategoriController/update';
$route['admin/kategori/hapus/(:any)']              = 'admin/KategoriController/delete/$1';
//wilayah
$route['admin/wilayah']                            = 'admin/WilayahController/index';
$route['admin/wilayah/tambah_wilayah']             = 'admin/WilayahController/tambahWilayah';
$route['admin/wilayah/store']                      = 'admin/WilayahController/store';
$route['admin/wilayah/edit_wilayah/(:any)']        = 'admin/WilayahController/edit/$1';
$route['admin/wilayah/update']                     = 'admin/WilayahController/update';
$route['admin/wilayah/hapus/(:any)']               = 'admin/WilayahController/delete/$1';
//sales
$route['admin/sales']                              = 'admin/SalesController/index';
$route['admin/sales/tambah_sales']                 = 'admin/SalesController/tambahSales';
$route['admin/sales/store']                        = 'admin/SalesController/store';
$route['admin/sales/edit_sales/(:any)']            = 'admin/SalesController/edit/$1';
$route['admin/sales/update']                       = 'admin/SalesController/update';
$route['admin/sales/hapus/(:any)']                 = 'admin/SalesController/delete/$1';
//toko
$route['admin/toko']                               = 'admin/TokoController/index';
$route['admin/toko/tambah_toko']                   = 'admin/TokoController/tambahToko';
$route['admin/toko/store']                         = 'admin/TokoController/store';
$route['admin/toko/edit_toko/(:any)']              = 'admin/TokoController/edit/$1';
$route['admin/toko/update']                        = 'admin/TokoController/update';
$route['admin/toko/hapus/(:any)']                  = 'admin/TokoController/delete/$1';
//barang
$route['admin/barang']                             = 'admin/BarangController/index';
$route['admin/barang/tambah_barang']               = 'admin/BarangController/tambahBarang';
$route['admin/barang/store']                       = 'admin/BarangController/store';
$route['admin/barang/edit_barang/(:any)']          = 'admin/BarangController/edit/$1';
$route['admin/barang/update']                      = 'admin/BarangController/update';
$route['admin/barang/hapus/(:any)']                = 'admin/BarangController/delete/$1';
//sales
$route['sales/beranda']                            = 'sales/DashboardController/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
