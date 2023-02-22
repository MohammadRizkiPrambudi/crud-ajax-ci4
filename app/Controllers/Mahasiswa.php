<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel;
    }
    public function index()
    {
        $data = [
            'menu-mahasiswa' => 'active',
            'title' => 'Mahasiwa'
        ];
        return view('mahasiswa/show');
    }

    public function GetMahasiswa()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'mahasiswa' => $this->MahasiswaModel->findAll(),
            ];
            $msg = [
                'data' => view('mahasiswa/data_mahasiswa', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak dapat diproses');
        }
    }
    public function TambahMahasiswa()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('mahasiswa/add')
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak dapat diproses');
        }
    }
    public function InsertData()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Mahasiswa Tidak Boleh Kosong'
                    ]
                ],
                'nim' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIM Mahasiswa Tidak Boleh Kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'nim' => $validation->getError('nim')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $this->MahasiswaModel->save([
                    'nama' => $this->request->getVar('nama'),
                    'nim' => $this->request->getVar('nim'),
                    'tempat' => $this->request->getVar('tempat'),
                    'tgl' => $this->request->getVar('tanggal'),
                    'jenkel' => $this->request->getVar('jenkel'),
                ]);
                $msg = [
                    'sukses' => 'Data Mahasiswa Berhasil Ditambahkan'
                ];
                echo json_encode($msg);
            }
        } else {
            exit('Tidak dapat diproses');
        }
    }
    public function EditData()
    {
        if ($this->request->isAJAX()) {
            $id_mahasiswa = $this->request->getVar('id_mahasiswa');
            $row = $this->MahasiswaModel->where('id_mahasiswa', $id_mahasiswa)->first();
            $data = [
                'id_mahasiswa' => $row['id_mahasiswa'],
                'nim' => $row['nim'],
                'nama' => $row['nama'],
                'tempat' => $row['tempat'],
                'tgl' => $row['tgl'],
                'jenkel' => $row['jenkel'],
            ];

            $msg = [
                'sukses' => view('mahasiswa/edit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function UpdateData()
    {
        if ($this->request->isAJAX()) {
            $this->MahasiswaModel->save([
                'id_mahasiswa' => $this->request->getVar('id_mahasiswa'),
                'nama' => $this->request->getVar('nama'),
                'nim' => $this->request->getVar('nim'),
                'tempat' => $this->request->getVar('tempat'),
                'tgl' => $this->request->getVar('tanggal'),
                'jenkel' => $this->request->getVar('jenkel'),
            ]);
            $msg = [
                'sukses' => 'Data Mahasiswa Berhasil Diubah'
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak dapat diproses');
        }
    }

    public function DeleteData()
    {
        if ($this->request->isAJAX()) {
            $this->MahasiswaModel->delete([
                'id_mahasiswa' => $this->request->getVar('id_mahasiswa'),
            ]);
            $msg = [
                'sukses' => 'Data Mahasiswa Berhasil Dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak dapat diproses');
        }
    }
}
