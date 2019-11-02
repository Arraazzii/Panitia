<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'landingPage/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Errors
$route['error/404'] = 'errors/pageNotFound';

// Landing Page
$route['index'] = 'landingPage/index';
$route['event_now'] = 'landingPage/event_now';
$route['upcoming'] = 'landingPage/upcoming';
$route['login'] = 'landingPage/login';
$route['proses_login'] = 'landingPage/loginProses';
$route['register'] = 'landingPage/register';
$route['registerEo'] = 'landingPage/registerEo';
$route['registerPeserta'] = 'landingPage/registerPeserta';
$route['register/verificationPeserta/(:any)'] = 'landingPage/verificationPeserta/$1';
$route['register/verificationEo/(:any)'] = 'landingPage/verificationEo/$1';
$route['logout_peserta'] = 'landingPage/logoutPeserta';
$route['logout_eo'] = 'landingPage/logoutEo';

// Event Organizer
$route['event_organizer/dashboard'] = 'eo/Dashboard/index';

// crud events
$route['event_organizer/events'] = 'eo/Event/events';
// $route['event_organizer/events/(:any)'] = 'eo/Event/events/$1';
$route['event_organizer/add_events'] = 'eo/Event/tambah_events';
$route['proses_tambah_event'] = 'eo/Event/prosesTambahEvents';
$route['detail_event/(:any)'] = 'eo/Event/detailEvent/$1';
$route['delete_event/(:any)'] = 'eo/Event/deleteEvent/$1';
$route['nonaktifkan_event/(:any)'] = 'eo/Event/nonAktifkanEvent/$1';
$route['aktifkan_event/(:any)'] = 'eo/Event/AktifkanEvent/$1';
$route['edit_event/(:any)'] = 'eo/Event/editEvent/$1';
$route['proses_edit_event'] = 'eo/Event/prosesEditEvent';


$route['daftar_event/(:any)'] = 'peserta/Dashboard/DaftarEvent/$1';
$route['konfirmasi_pendaftaran'] = 'peserta/Dashboard/KonfirmasiPendaftaran';

$route['event_organizer/profile'] = 'eo/Dashboard/profile';

$route['event_organizer/register'] = 'eo/Dashboard/registerEo';

// Peserta
$route['peserta/dashboard'] = 'peserta/Dashboard/index';
$route['peserta/pembayaran/(:any)'] = 'peserta/Dashboard/DaftarEvent/$1';
$route['peserta/profile'] = 'peserta/Dashboard/profile';
$route['peserta/proses_daftar'] = 'peserta/Dashboard/ProsesDaftar';
$route['peserta/upcoming'] = 'landingPage/upcoming';
$route['peserta/event_now'] = 'landingPage/event_now';
$route['peserta/upload_pembayaran/(:any)'] = 'peserta/Dashboard/uploadPembayaran/$1';
$route['ubah_password'] = 'landingPage/UpdatePassword';

// Event Organizer
$route['daftar_peserta/(:any)'] = 'eo/Dashboard/DaftarPeserta/$1';
$route['get_list_daftar'] = 'eo/Dashboard/get_list_daftar';

$route['event_organizer/pembayaran/(:any)'] = 'eo/Dashboard/pembayaran/$1';
$route['get_list_pembayaran'] = 'eo/Dashboard/get_list_pembayaran';
$route['pembayaran/clicked_list'] = 'eo/Dashboard/getListClickked';

$route['event_organizer/invoice'] = 'eo/Dashboard/invoice';
$route['event_organizer/add_invoice'] = 'eo/Dashboard/tambah_invoice';
$route['proses_tambah_invoice'] = 'eo/Dashboard/ProsesTambahInvoice';
$route['get_list_invoice'] = 'eo/Dashboard/get_list_invoice';
$route['delete_invoice/(:any)'] = 'eo/Dashboard/deleteInvoice/$1';

$route['Konfirmasi_pembayaran/(:any)'] = 'eo/Dashboard/Konfirmasi_pembayaran/$1';
$route['update_profile'] = 'eo/Dashboard/UpdateProfile';
