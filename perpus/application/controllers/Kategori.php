<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	 public function __construct()
   {
      parent::__construct();
      $this->load->model('Kategori_Model');
   }

  public function index()
  {
  	$data =
  	[
        'title'=> 'Dashboard',
        'sub_title' =>'Kategori',
        'content' => 'kategori/index',
        'show' => $this->Kategori_Model->index()->result()
  	];
    $this->load->view('template/my_template', $data);
  }    

  public function add()
  {
      $data=
      [
          'title' => 'Kategori',
          'sub_title' => 'Tambah Kategori',
          'content' => 'kategori/add'
      ];
      $this->load->view('template/my_template', $data);
  }
  public function create()
  {
            $nama_kategori = $this->input->post('nama_kategori');
            
            
            $data =array (
              'nama_kategori' => $nama_kategori,
              
            );

            $create = $this->Kategori_Model->create ($data);

            if($create){
              $this->session->set_flashdata('pesan_create', true);
              redirect('kategori');
            }else{
              $this->session->set_flashdata('pesan_create', false);
              redirect('kateori');
            }
  }

  public function edit($id)
  {
      $data=
      [
          'title' => 'Kategori',
          'sub_title' => 'Edit Kategori',
          'content' => 'kategori/edit',
          'show' => $this->Kategori_Model->edit($id)->row()
      ];
      $this->load->view('template/my_template', $data);
  }

  public function update()
  {
    $id_kategori = $this->input->post('id_kategori');
    $nama_kategori = $this->input->post('nama_kategori');
    
    
    $data =array (
      'nama_kategori' => $nama_kategori,
      
    );

    $update = $this->Kategori_Model->update ($data, $id_kategori);

    if($update){
      $this->session->set_flashdata('pesan_create', true);
      redirect('kategori');
    }else{
      $this->session->set_flashdata('pesan_create', false);
      redirect('kateori');
    }
  }

  public function delete($id)
  {
    $data =array (
      'deleted_at' => date('Y-m-d H:i:s', time())
      
    );

    $delete = $this->Kategori_Model->delete($data, $id);

    if($delete){
      $this->session->set_flashdata('pesan_create', true);
      redirect('kategori');
    }else{
      $this->session->set_flashdata('pesan_create', false);
      redirect('kateori');
    }
  }

}