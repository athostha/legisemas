<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
class TiposController extends AppController{
    public function isAuthorized(){
        if($this->Auth->user('cargo_id') == 1){
            return true;
        }
    }
    public function categoria(){
        $this->set('tipos', $this->Tipo->find('all'));
        if ($this->request->is('post')) {
            if ($this->Tipo->save($this->request->data)) {
                $this->Flash->success(__('Categoria Registrada'));
                return $this->redirect(array(
                'action' => 'categoria'));
            }
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Tipo->delete($id)) {
            $this->Flash->success(
                __('Categoria com id %s foi deletada.', h($id))
            );
        } else {
            $this->Flash->error(
                __('Categoria com id %s não pode ser deletada.', h($id))
            );
        }

        return $this->redirect(array('action' => 'categoria'));
        
    }
}