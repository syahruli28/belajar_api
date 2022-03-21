<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Mahasiswa_model');

        // untuk membatasi penggunaan API selama 1 jam berdasarkan per KEYnya
        $this->methods['index_get']['limit'] = 100;
    }


    // route untuk menampilkan(get)
    // nama fungsi index_get, _get sudah sesuai dengan method dari librarynya
    public function index_get()
    {
        // buat variabel id dari method get yang dikirimkan
        $id = $this->get('id');

        // cek apakah variabel id kosong atau tidak
        if($id === null){
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa();
        }else{
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa($id);
        }

        if($mahasiswa) { // bila kondisi tercapai
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], RestController::HTTP_OK);
        }else{ // bila kondisi tidak tercapai
            $this->response([
                'status' => false,
                'message' => 'id not found.'
            ], RestController::HTTP_NOT_FOUND);
        }

    }

    // route untuk menghapus(delete)
    public function index_delete()
    {
        $id = $this->delete('id');

        // cek apakah variabel id ada isinya
        if($id===null){ // kondisi kalau variabel id kosong
            $this->response([
                'status' => false,
                'message' => 'provide an id.'
            ], RestController::HTTP_BAD_REQUEST);
        } else { // kondisi kalau variabel id ada, tapi ada pengkondisian tambahan
            if ($this->Mahasiswa_model->deleteMahasiswa($id) > 0) { // cek apakah ada baris pada tabel yang berubah
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'mahasiswa has been deleted.'
                ], RestController::HTTP_OK);
            } else { // cek apakah id yang diberikan ada
                $this->response([
                    'status' => false,
                    'message' => 'id not found.'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }

    }

    // route untuk menghapus(post)
    public function index_post()
    {

        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->Mahasiswa_model->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been added.'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to added new data.'
            ], RestController::HTTP_BAD_REQUEST);
        }

    }

    // route untuk mengubah(put)
    public function index_put()
    {

        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->Mahasiswa_model->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'mahasiswa has been updated.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to updated data.'
            ], RestController::HTTP_BAD_REQUEST);
        }        

    }

}