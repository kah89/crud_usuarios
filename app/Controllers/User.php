<?php

namespace App\Controllers;

use App\Models\userModel;
use CodeIgniter\Controller;
use Tests\Support\Models\UserModel as ModelsUserModel;
use Exception;

class User extends Controller
{
    public function index()
    {
        
        $model = new userModel();
        $data = [
            'user' => $model->getUser()
        ];
        // var_dump($model);die;
        echo view('templates/header',);
        echo view('pages/home' , $data);
        echo view('templates/footer', );
    }

    public function create(){
        helper('form');

        echo view('templates/header',);
        echo view('pages/form' );
        echo view('templates/footer', );
    }

    public function store(){
        helper('form');

        $model = new userModel();
        $rules = [
            'NomeCompleto' =>'required|min_length[6]|max_length[100]|',
            'Email' => 'required|min_length[6]|max_length[100]|valid_email'
        ];

        if($this->validate($rules)){
            $model->save([
                'ID' => $this->request->getVar('id'), 
                'NomeCompleto' => $this->request->getVar('NomeCompleto'),
                'Email' => $this->request->getVar('Email'),
            ]);
        

        echo view('templates/header');
        echo view('pages/success' );
        } else {
            echo view('templates/header',);
            echo view('pages/form' );
            echo view('templates/footer', );
        }
    }

    // public function editar($id = null){
    //     helper('form');
    //     $model = new userModel();

    //     $data['user'] = $model->getUser($id);
    
    //     if(empty($data['user'])){
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('não encontrei este usuário');
    //         // throw new \CodeIgniter\Exceptions\ConfigException('não encontrei este usuário');
            
    //     };

    //     $data = [
    //         'ID' => $data['user']['ID'],
    //         'NomeCompleto' => $data['user']['NomeCompleto'],
    //         'Email' => $data['user']['Email'],
    //     ];
   
    //     echo view('templates/header',);
    //     echo view('pages/editForm', $data );
    //     echo view('templates/footer', );
        
        
    // }

    public function editar($id = null)
    {
            $uri = current_url(true);
            $usuario_id = $uri->getSegment(4);
            $model = new userModel();
            $result = $model->find($usuario_id);

            // var_dump($model['ID']);die;

            $data = [
                'user' => $model->getUser()
            ];
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'NomeCompleto' =>'required|min_length[6]|max_length[100]|',
                    'Email' => 'required|min_length[6]|max_length[100]|valid_email'
                ];


                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $newData = [
                        'ID' => $this->request->getVar('ID'), 
                        'NomeCompleto' => $this->request->getVar('NomeCompleto'),
                        'Email' => $this->request->getVar('Email'),
                    ];
                }
                if ($model->save($newData)) {
                        if ( isset($id) ) {
                            return redirect()->to('./user/create');
                        } else {
                            return redirect()->to('./ci4/public/user');
                        }
                    } else {
                        echo "Erro ao salvar";
                        exit;
                    }
            }
            echo view('templates/header', );
            echo view('pages/editForm', $result );
            echo view('templates/footer', );
        }
    

    public function delete($id = null){
        $model = new userModel();
        $model->delete($id);

        echo view('templates/header');
        echo view('pages/delete_success' );
    }
}