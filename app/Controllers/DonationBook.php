<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DonationBookModels;

class DonationBook extends BaseController
{
    function __construct()
    {
        $this->donationBookModels = new DonationBookModels();
        $this->table = "donasi";
    }

    public function index()
    {
        // return view('welcome_message');
        $donationBookModels = new DonationBookModels();
        $data['donations'] = $donationBookModels->findAll();

        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('donasi/index', $data);
        echo view('partial/footer');
    }

    public function create()
    {
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('donasi/create');
        echo view('partial/footer');
    }
    public function save()
    {
        if (!$this->validate([
            'nama_donasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]|max_size[file,20048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 20  MB'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $donationBookModels = new DonationBookModels();
        $fileImage = $this->request->getFile('file');
        $fileName = $fileImage->getName();
        $this->donationBookModels->insert([
            'nama_donasi' => $this->request->getPost('nama_donasi'),
            'alamat' => $this->request->getPost('alamat'),
            'keterangan' => $this->request->getPost('keterangan'),
            'image' => $fileName,
        ]);
        $fileImage->move(ROOTPATH . 'public/uploads/images/users', $fileName);
        session()->setFlashdata('message', 'Tambah Data Donasi Berhasil');
        return redirect()->to('donasi');
        // return redirect()->back();
    }

    
    function edit(int $id_donasi)
    {
        $donationBookModels = new DonationBookModels();
        $datadonasi = $this->donationBookModels->find($id_donasi);
        if (empty($datadonasi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data['donations'] = $datadonasi;
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('donasi/edit', $data);
        echo view('partial/footer');
    }
 
    public function update($id)
    {
        if (!$this->validate([
            'nama_donasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            
            // 'image' => [
            //     'rules' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]|max_size[file,20048]',
            //     'errors' => [
            //         'uploaded' => 'Harus Ada File yang diupload',
			// 		'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
			// 		'max_size' => 'Ukuran File Maksimal 20  MB'
            //     ]
            // ],

        ])) {
            
            return redirect()->back()->withInput();
        }
        $donationBookModels = new DonationBookModels();
        $fileImage = $this->request->getFile('file');
        $oldFile = $this->request->getPost('image');
        $fileName = $fileImage->getName();
        if ($fileImage != "") {
            // echo $fileImage;
            // echo "ada file";
            
            $this->donationBookModels->update($id, [
                'nama_donasi' => $this->request->getPost('nama_donasi'),
                'alamat' => $this->request->getPost('alamat'),
                'keterangan' => $this->request->getPost('keterangan'),
                'image' => $fileName,
            ]);
            
            $fileImage->move(ROOTPATH . 'public/uploads/images/users', $fileName);
            // session()->setFlashdata('error', $this->validator->listErrors());    

        }else{
            $this->donationBookModels->update($id, [
                'nama_donasi' => $this->request->getPost('nama_donasi'),
                'alamat' => $this->request->getPost('alamat'),
                'keterangan' => $this->request->getPost('keterangan'),
                'image' => $oldFile,
            ]);
        }
        
        
        session()->setFlashdata('message', 'Update Data Donasi Berhasil');
        return redirect()->to('/donasi');
    }

    
    public function delete(int $id_donasi)
    {
        $donationBookModels = new DonationBookModels();
        $check = $donationBookModels->find($id_donasi);
        if(empty($check)){
			return redirect()->to('/donasi')->with('message', 'Data buku tidak ada');
		}else {
			$donationBookModels->delete($id_donasi);
			return redirect()->to('/donasi')->with('message', 'berhasil delete data!');
		}
    }
}
