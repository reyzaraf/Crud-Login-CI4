<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaurUlangModels;

class DaurUlang extends BaseController
{
    function __construct()
    {
        $this->daurulangModel = new DaurUlangModels();
        $this->table = "daur_ulang";
    }

    public function index()
    {
        // return view('welcome_message');
        $daurulangModel = new DaurUlangModels();
        $data['daurulangs'] = $daurulangModel->findAll();

        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daurulang/index', $data);
        echo view('partial/footer');
    }

    public function create()
    {
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daurulang/create');
        echo view('partial/footer');
    }
    public function save()
    {
        if (!$this->validate([
            'batch' => [
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
					'max_size' => 'Ukuran File Maksimal 20 MB'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        
        $daurulangModel = new DaurUlangModels();
        $fileImage = $this->request->getFile('file');
        $fileName = $fileImage->getName();
        $this->daurulangModel->insert([
            'batch' => $this->request->getPost('batch'),
            'alamat' => $this->request->getPost('alamat'),
            'keterangan' => $this->request->getPost('keterangan'),
            'image' => $fileName,
        ]);

        $fileImage->move(ROOTPATH . 'public/uploads/images/users', $fileName);
        session()->setFlashdata('message', 'Tambah Data Daur ulang Berhasil');
        return redirect()->to('daur_ulang');
        // return redirect()->back();
    }

    
    function edit(int $id_daur_ulang)
    {
        $daurulangModel = new DaurUlangModels();
        $dataDaurUlang = $this->daurulangModel->find($id_daur_ulang);
        if (empty($dataDaurUlang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Daur Ulang Tidak ditemukan !');
        }
        $data['daurulangs'] = $dataDaurUlang;
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daurulang/edit', $data);
        echo view('partial/footer');
    }
 
    public function update($id_daur_ulang)
    {
        if (!$this->validate([
            'batch' => [
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
        $daurulangModel = new DaurUlangModels();
        $fileImage = $this->request->getFile('file');
        $oldFile = $this->request->getPost('image');
        $fileName = $fileImage->getName();
        if ($fileImage != "") {
            // echo $fileImage;
            // echo "ada file";
            
            $this->daurulangModel->update($id_daur_ulang, [
                'batch' => $this->request->getPost('batch'),
                'alamat' => $this->request->getPost('alamat'),
                'keterangan' => $this->request->getPost('keterangan'),
                'image' => $fileName,
            ]);
            
            $fileImage->move(ROOTPATH . 'public/uploads/images/users', $fileName);
            // session()->setFlashdata('error', $this->validator->listErrors());    

        }else{
            $this->daurulangModel->update($id, [
                'batch' => $this->request->getPost('batch'),
                'alamat' => $this->request->getPost('alamat'),
                'keterangan' => $this->request->getPost('keterangan'),
                'image' => $oldFile,
            ]);
        }
        
        
        session()->setFlashdata('message', 'Update Data Daur Ulang Berhasil');
        return redirect()->to('/daur_ulang');
    }

    
    public function delete(int $id_daur_ulang)
    {
        $daurulangModel = new DaurUlangModels();
        $check = $daurulangModel->find($id_daur_ulang);
        if(empty($check)){
			return redirect()->to('/daur_ulang')->with('message', 'Data buku tidak ada');
		}else {
			$daurulangModel->delete($id_daur_ulang);
			return redirect()->to('/daur_ulang')->with('message', 'berhasil delete data!');
		}
    }
}
