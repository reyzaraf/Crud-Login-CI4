<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PreloveBookModels;


class PreloveBook extends BaseController
{
    function __construct()
    {
        $this->prebookModel = new PreloveBookModels();
        $this->table = "prelovebook";
    }

    public function index()
    {
        // return view('welcome_message');
        $prebookModel = new PreloveBookModels();
        $data['prelovebooks'] = $prebookModel->findAll();

        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('prelovebook/index', $data);
        echo view('partial/footer');
    }

    public function create()
    {
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('prelovebook/create');
        echo view('partial/footer');
    }
    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',

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
        $prebookModel = new PreloveBookModels();
        $fileImage = $this->request->getFile('file');
        $fileName = $fileImage->getName();
        $this->prebookModel->insert([
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'image' => $fileName,
        ]);
        $fileImage->move(ROOTPATH . 'public/uploads/images/users', $fileName);
        session()->setFlashdata('message', 'Tambah Data PreloveBook Berhasil');
        return redirect()->to('/prelovebook');
        // return redirect()->back();
    }
    function edit(int $id_prebook)
    {
        $dataPrelovebook = $this->prebookModel->find($id_prebook);
        if (empty($dataPrelovebook)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Buku Tidak ditemukan !');
        }
        $data['prelovebooks'] = $dataPrelovebook;
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('prelovebook/edit', $data);
        echo view('partial/footer');
    }
 
    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',

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
        $prebookModel = new PreloveBookModels();
        $fileImage = $this->request->getFile('file');
        $oldFile = $this->request->getPost('image');
        $fileName = $fileImage->getName();
        if ($fileImage != "") {
            // echo $fileImage;
            // echo "ada file";
            
            $this->prebookModel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'pengarang' => $this->request->getPost('pengarang'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'image' => $fileName,
            ]);
            
            $fileImage->move(ROOTPATH . 'public/uploads/images/users', $fileName);
            // session()->setFlashdata('error', $this->validator->listErrors());    

        }else{
            // echo $fileImage;
            // echo "dsadasdasdasdasda";
            // $oldFile = $this->request->getPost('image');
            // echo $oldFile;
            // echo "file kosong";
            $this->prebookModel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'pengarang' => $this->request->getPost('pengarang'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'image' => $oldFile,
            ]);
        }
        
        
        session()->setFlashdata('message', 'Update Data PreloveBook Berhasil');
        return redirect()->to('/prelovebook');
    }

    
    public function delete(int $id_prebook)
    {
        $prebookModel = new PreloveBookModels();
        $check = $prebookModel->find($id_prebook);
        if(empty($check)){
			return redirect()->to('/prelovebook')->with('message', 'Data buku tidak ada');
		}else {
			$prebookModel->delete($id_prebook);
			return redirect()->to('/prelovebook')->with('message', 'berhasil delete data!');
		}
    }
}
