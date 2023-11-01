<?php

namespace App\Controllers;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;
    public function __construct(){
        $this->anggotaModel = new AnggotaModel();
    }
    

    public function index()
    {
       $anggota = $this->anggotaModel->getAnggota();
        $data = [
            'anggota' => $anggota,
            'active' => 'Anggota',
            'title' => 'Daftar Anggota'
        ];
        echo view('anggota/index', $data);
    }

    public function detail($idanggota)
    {
        $data = [
            'anggota' => $this->anggotaModel->getAnggota($idanggota),
            'active' => 'Anggota',
            'title' => 'Detail Anggota'
        ];
        echo view('anggota/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Anggota',
            'validation' => \Config\Services::validation(),
            'active' => 'Anggota',
            'title' => 'Form Tambah Anggota'
        ];

        return view('anggota/tambah', $data);
    }

    public function simpan(){
        $validation = \Config\Services::validation();
        $validation->setRules([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                        ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'no' => [
                    'label' => 'No. Telpon',
                    'rules' => 'required|numeric',
                    'errors' => ['required' => '{field} harus diisi',
                    'numeric' => '{field} hanya boleh berupa angka']
                ],
            ]);
            $data = $this->request->getVar();
            if (!$validation->run($data)) {
                $errors = $validation->getErrors();
                return redirect()->to('/anggota/tambah')->withInput()->with('validation', $errors);
            }

        $this->anggotaModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('no'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/anggota');
    }


    public function hapus($idanggota){
        $this->anggotaModel->delete($idanggota);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/anggota');
    }

    public function ubah($idanggota){
        $data = [
            'validation' => \Config\Services::validation(),
            'anggota' => $this->anggotaModel->getAnggota($idanggota),
            'active' => 'Anggota',
            'title' => 'Form Ubah Anggota'
        ];
        return view('anggota/ubah', $data);
    }

    public function update($idanggota){
        $validation = \Config\Services::validation();
        $validation->setRules([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                        ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'no' => [
                    'label' => 'No. Telpon',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
            ]);
            $data = $this->request->getVar();
            if (!$validation->run($data)) {
                $errors = $validation->getErrors();
                return redirect()->to('/anggota/ubah/'.$idanggota)->withInput()->with('validation', $errors);
            }
        

        $this->anggotaModel->save([
            'id_anggota' => $idanggota,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('no'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/anggota');
    }
}
