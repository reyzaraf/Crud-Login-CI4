<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    function __construct()
    {
        $this->userModels = new UserModel();
        $this->table = "users";
    }

    public function index()
    {
        // return view('welcome_message');
        $userModels = new UserModel();
        $data['theusers'] = $userModels->findAll();

        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('user/index', $data);
        echo view('partial/footer');
    }

    public function create()
    {
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('user/create');
        echo view('partial/footer');
    }
    public function save()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $userModels = new UserModel();
        $this->userModels->insert([
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('message', 'Tambah Data User Berhasil');
        return redirect()->to('user');
        // return redirect()->back();
    }

    
    function edit(int $id_user)
    {
        $userModels = new UserModel();
        $datauser = $this->userModels->find($id_user);
        if (empty($datauser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data['users'] = $datauser;
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('user/edit', $data);
        echo view('partial/footer');
    }
 
    public function update($id_user)
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'name' => [
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
        $userModels = new UserModel();
        $this->userModels->update($id_user, [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('message', 'Update Data user Berhasil');
        return redirect()->to('/user');
    }

    
    public function delete(int $id_user)
    {
        $userModels = new UserModel();
        $check = $userModels->find($id_user);
        if(empty($check)){
			return redirect()->to('/user')->with('message', 'Data User tidak ada');
		}else {
			$userModels->delete($id_user);
			return redirect()->to('/user')->with('message', 'berhasil delete data!');
		}
    }
}
