<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Buku_Model');
      $this->load->model('Kategori_Model');
   }

   public function index()
    {
      $data =
      [
          'title'=> 'Dashboard',
          'sub_title' =>'Buku',
          'content' => 'buku/index',
          'show' => $this->Buku_Model->index()->result()
      ];
        $this->load->view('template/my_template', $data);
    
} 
/* fungsi add untuk memanggil form input data buku*/
    public function add()
{
    $data=
    [
        'title' => 'Buku',
        'sub_title' => 'Tambah Buku',
        'content' => 'buku/add',
        'show_kategori' => $this->Kategori_Model->index()->result()
    ];
    $this->load->view('template/my_template', $data);
}
    public function create()
{
          $judul_buku = $this->input->post('judul_buku');
          $id_kategori = $this->input->post('id_kategori');
          $Pengarang = $this->input->post('Pengarang');
          $thn_terbit = $this->input->post('thn_terbit');
          $Penerbit = $this->input->post('Penerbit');
          $isbn = $this->input->post('isbn');
          $jumlah_buku = $this->input->post('jumlah_buku');
          $Lokasi = $this->input->post('Lokasi');
          
          $data =array (
            'judul_buku' => $judul_buku,
            'id_kategori' => $id_kategori,
            'Pengarang' => $Pengarang,
            'thn_terbit' => $thn_terbit,
            'Penerbit' => $Penerbit,
            'isbn' => $isbn,
            'jumlah_buku' => $jumlah_buku,
            'Lokasi' => $Lokasi
          );

          $create = $this->Buku_Model->create ($data);

          if($create){
            $this->session->set_flashdata('pesan_create', true);
            redirect('buku');
          }else{
            $this->session->set_flashdata('pesan_create', false);
            redirect('buku');
          }
}
    public function edit($id)
{
    $data=
    [
        'title' => 'Buku',
        'sub_title' => 'Edit Buku',
        'content' => 'buku/edit',
        'show' => $this->Buku_Model->edit($id)->row(),
        'show_kategori' => $this->Kategori_Model->index()->result()
    ];
    $this->load->view('template/my_template', $data);
   }
   
   public function update()
  {
          $id_buku = $this->input->post('id_buku');
          $judul_buku = $this->input->post('judul_buku');
          $id_kategori = $this->input->post('id_kategori');
          $Pengarang = $this->input->post('Pengarang');
          $thn_terbit = $this->input->post('thn_terbit');
          $Penerbit = $this->input->post('Penerbit');
          $isbn = $this->input->post('isbn');
          $jumlah_buku = $this->input->post('jumlah_buku');
          $Lokasi = $this->input->post('Lokasi');
          
          $data =array (
            'judul_buku' => $judul_buku,
            'id_kategori' => $id_kategori,
            'Pengarang' => $Pengarang,
            'thn_terbit' => $thn_terbit,
            'Penerbit' => $Penerbit,
            'isbn' => $isbn,
            'jumlah_buku' => $jumlah_buku,
            'Lokasi' => $Lokasi
          );

          $update = $this->Buku_Model->update($data, $id_buku);

          if($update){
            $this->session->set_flashdata('pesan_create', true);
            redirect('buku');
          }else{
            $this->session->set_flashdata('pesan_create', false);
            redirect('buku');
          }

    }

    public function delete($id)
    {
      $data = array(
        'deleted_at' => date('Y-m-d H:i:s', time())
      );

      $delete = $this->Buku_Model->delete($data, $id);

      if($delete){
        $this->session->set_flashdata('pesan_hapus', true);
        redirect('buku');
      }else{
        $this->session->set_flashdata('pesan_hapus', false);
        redirect('buku');
      }
    }
}