<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author athos.almeida
 */
App::uses('AppController', 'Controller');
class UsuariosController extends AppController{
    
    public function isAuthorized(){
        if($this->action === 'editor' && ($this->params['pass'][0] == $this->Auth->user('id') || $this->Auth->user('cargo_id') == 1)){
            return true;
        }
        if(($this->action === 'gerenciar' || $this->action === 'delete') && $this->Auth->user('cargo_id') == 1){
            return true;
        }
        
        return parent::isAuthorized($user);
        
    }
    //registra novo usuário
    public function add(){
        $this->set('cargos', $this->Usuario->Cargo->find('list', array(
        'fields' => array('Cargo.nome'))));
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('Usuario registrado'));
                return $this->redirect(array(
                    'controller' => 'normas',
                    'action' => 'index'));
            }
            $this->Flash->error(
                __('Erro ao registrar Usuario')
            );
            
        }
    }

    
    public function login() {
        
        if ($this->request->is('post')) {
            
            if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'normas','action' => 'index'));
            } else {
            $this->Flash->error(__('Matrícula ou senha inválida'));
            }
            
        }
        
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function gerenciar(){

        $this->set('usuarios', $this->Usuario->find('all', array('conditions' => array('Usuario.id !=' => $this->Auth->user('id')))));
        
        
        $this->set('cargos', $this->Usuario->Cargo->find('list', array(
        'fields' => array('Cargo.nome'))));
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('Usuário registrado'));
                return $this->redirect(array(
                    'controller' => 'usuarios',
                    'action' => 'gerenciar'));
            }
            $this->Flash->error(
                __('Erro ao registrar Usuário')
            );
            
        }
    }
    
    
    public function editor($id){
        $this->set('id', $id);
        $this->set('cargos', $this->Usuario->Cargo->find('list', array(
        'fields' => array('Cargo.nome'))));
        $this->Usuario->id = $id;
        
        if (!$id) {
            throw new NotFoundException(__('Invalido'));
        };
        $usuario = $this->Usuario->findById($id);
        if (!$usuario) {
            throw new NotFoundException(__('Usuário não existe'));
        }

        if ($this->request->is(array('Usuario', 'put'))) {
            $this->Usuario->id = $id;
            if ($this->Usuario->save($this->request->data)) {
              $this->Flash->success(__('Usuário editado com sucesso'));
                return $this->redirect(array('controller' => 'Normas',
                    'action' => 'index'));
            }
            $this->Flash->error(__('erro ao editar usuário'));
            return $this->redirect(array(
                    'action' => 'gerenciar'));
        }

        if (!$this->request->data) {
            $this->request->data = $usuario;
        }
        
        
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Usuario->delete($id)) {
            $this->Flash->success(
                __('Usuário com id %s foi deletado.', h($id))
            );
        } else {
            $this->Flash->error(
                __('Usuário com id %s não pode ser deletado.', h($id))
            );
        }

        return $this->redirect(array('action' => 'gerenciar'));
        
    }
}
