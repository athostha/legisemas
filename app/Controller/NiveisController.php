<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
class NiveisController extends AppController{
    public function niveis(){
        $this->set('niveis', $this->Nivel->find('all'));
    }
}