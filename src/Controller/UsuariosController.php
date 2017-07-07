<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Table\OrgaosExpedidoresTable;
use Cake\Network\Exception\NotFoundException;

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
                $this->Flash->error(_('Preencha Todos os Campos!'));
            } else {
                $user = $this->Usuarios->getEmailSenha($email, $password);
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(_('Nome de Usuário ou Senha Incorretos'));
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

    public function cadastrar($id = null)
    {
        $this->loadModel('OrgaosExpedidores');
        $this->loadModel('EstadosCivis');
        $this->loadModel('Logradouros');
        $this->loadModel('Ufs');
        if ($this->request->is('post')) {
            $usuarios = $this->Usuarios->newEntity();
                if (!empty($this->request->data['nome'])) {
                    $usuarios = $this->request->data;
                    if ($this->Usuarios->salvarUsuarios($usuarios)) {
                        $this->Flash->success('Salvo com Sucesso');
                        return $this->redirect('/');
                    } else {
                        $this->Flash->success('Não pode ser Salvo...');
                    }
                } else {
                    $this->Flash->error(_('Preencha Todos os Campos!'));
                }
        } else {

            if (is_numeric($id) && !empty($id) && $id == 1) {
                $orgaos = $this->OrgaosExpedidores->getAllOrgaosExpedidores();
                $estCivil = $this->EstadosCivis->getAllEstadosCivis();
                $logradouros = $this->Logradouros->getAllLogradouros();
                $ufs = $this->Ufs->getAllUfs();
                $this->set(compact('orgaos', 'estCivil', 'logradouros', 'ufs'));
                $this->set('_serialize', ['orgaos', 'estCivil', 'logradouros', 'ufs']);
            } elseif (is_numeric($id) && !empty($id) && $id == 2) {


            } else {
                throw new NotFoundException('Página não encontrada');
            }
        }
        $orgaos = $this->OrgaosExpedidores->getAllOrgaosExpedidores();
        $estCivil = $this->EstadosCivis->getAllEstadosCivis();
        $logradouros = $this->Logradouros->getAllLogradouros();
        $ufs = $this->Ufs->getAllUfs();
        $this->set(compact('orgaos', 'estCivil', 'logradouros', 'ufs'));
        $this->set('_serialize', ['orgaos', 'estCivil', 'logradouros', 'ufs']);
    }
}
