<?php

namespace App\Controllers;
use App\Models\BukuModel;
use Config\Validation;

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct(){
        $this->bukuModel = new BukuModel();
    }
    

    public function index()
    {
       $buku = $this->bukuModel->getBuku();
        $data = [
            'buku' => $buku,
            'active' => 'Buku',
            'title' => 'Daftar Buku'
        ];
        echo view('buku/index', $data);
    }

    public function detail($idbuku)
    {
        $data = [
            'buku' => $this->bukuModel->getBuku($idbuku),
            'active' => 'Buku',
            'title' => 'Detail Buku'
        ];
        echo view('buku/detail', $data);
    }

    public function tambah()
    {
     
        $data = [
            'title' => 'Form Tambah Data Buku',
            'active' => 'Buku',
        ];

        return view('buku/tambah', $data);
    }

    public function simpan(){
        $validation = \Config\Services::validation();
        $validation->setRules([
                'judul' => [
                    'label' => 'Judul',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                        ]
                ],
                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'tahun_terbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'sampul' => [
                    'label' => 'Sampul',
                    'rules' => 'uploaded[sampul]|max_size[sampul,1000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Gambar wajib dipilih!',
                        'max_size' => 'Ukuran gambar terlalu besar!',
                        'is_image' => 'File Wajib Gambar!',
                        'mime_in' => 'Tipe File Gambar Tidak Sesuai!'
                    ]
                ]
            ]);
            $data = $this->request->getVar();
            if (!$validation->run($data)) {
                $errors = $validation->getErrors();
                return redirect()->to('/buku/tambah')->withInput()->with('validation', $errors);
            }
        $filesampul = $this->request->getFile('sampul');
        $filesampul->move('img');
        $nsampul = $filesampul->getName();

        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul' => $nsampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/buku');
    }


    public function hapus($idbuku){
        $this->bukuModel->delete($idbuku);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/buku');
    }

    public function ubah($idbuku){
        
        $data = [
            'buku' => $this->bukuModel->getBuku($idbuku),
            'validation' => \Config\Services::validation(),
            'active' => 'Buku',
            'title' => 'Form Ubah Buku'
        ];
        return view('buku/ubah', $data);
    }

    public function update($idbuku){
        $validation = \Config\Services::validation();
        $validation->setRules([
                'judul' => [
                    'label' => 'Judul',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                        ]
                ],
                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'tahun_terbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
            ]);
            $data = $this->request->getVar();
            if (!$validation->run($data)) {
                $errors = $validation->getErrors();
                return redirect()->to('/buku/ubah/'.$idbuku)->withInput()->with('validation', $errors);
            }
        // ambil gambar
        $filesampul = $this->request->getFile('sampul');
        if($filesampul->getError() == 4){
            $nsampul = $this->request->getVar('sampulLama');
        }else{
            $nsampul = $filesampul->getName();
            $filesampul->move('img', $nsampul);
        }

        $this->bukuModel->save([
            'id_buku' => $idbuku,
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul' => $nsampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/buku');
    }
}
