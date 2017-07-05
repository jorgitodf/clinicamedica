<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Table\OrgaosExpedidoresTable;

class UsuariosController extends AppController
{

    /*Este método libera o acesso a determinado action sem estar logado e autenticado*/
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);
        $this->Auth->allow(['logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $email = $this->request->data['email'];
            $password = $this->request->data['password'];
            if (empty($email) || empty($password)) {
                $this->Flash->error('Preencha Todos os Campos!');
            } else {
                $user = $this->Usuarios->getEmailSenha($email, $password);
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error('Nome de Usuário ou Senha Incorretos');
                }
            }
        }
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['action' => 'login']);
    }

    public function index()
    {

    }

    public function add()
    {
        $users = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //$users->nome = $this->request->data['nome'];
            //$users->nome = $this->request->data['sobrenome'];
            $users = $this->Users->patchEntity($users, $this->request->data);
            if ($this->Users->save($users)) {
                echo 'Salvo com Sucesso';
                $this->Flash->success('Salvo com Sucesso');
            } else {
                echo 'Não pode ser Salvo...';
                $this->Flash->success('Não pode ser Salvo...');
            }
        }
        $this->set(compact('users'));
    }

    public function cadastrar()
    {
        $oexp = new OrgaosExpedidoresTable();
        $orgaos = $oexp->getAllOrgaosExpedidores();
        debug($orgaos);exit;
    }
}
