<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->table = "users";
    }

    public function index()
    {
        // helper(['form']);
        // echo view('partial/header',$header);
        // return view('dashboard');
        // echo view('partial/footer');
        $header['title']='Dashboard';
        helper(['form']);
        echo view('partial/header',$header);
        echo view('login');
        echo view('partial/footer');
        } 
 
        public function process()
        {
            $users = new UserModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $dataUser = $users->where([
                'username' => $username,
            ])->first();
            
            if ($dataUser) {
                
                $cekpass = $dataUser['password'];
                if ($password == $cekpass) {
                    session()->set([
                        'username' => $dataUser["username"],
                        'name' => $dataUser["name"],
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to('/prelovebook');
                } else {

                    session()->setFlashdata('error', 'Username & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
