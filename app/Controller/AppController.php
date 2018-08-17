<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public function beforeRender() {
            $uid3 = $this->Session->read('Message.flash');
            if(isset($uid3) && $uid3 != null){
                $this->Set('uid3', end($uid3));
            }
    }
    public $components = array(
        'Session',  
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 
                'normas', 
                'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'login',
            ),
            'loginAction' => array('controller' => 
                'usuarios','action' => 
                'login'),
            'authenticate' => array(                
                'Form' => array(
                    'userModel' => 'Usuario',
                    'passwordHasher' => 'Blowfish',
                    'fields' => array(
                        'username' => 'matricula', //Default is 'username' in the userModel
                        'password' => 'senha'  //Default is 'password' in the userModel
                    )
                )
            ),
            'authorize' => array('Controller'), // Added this line
            //'authError' => 'Im sorry david, Im afraid I cant do that'
        )
    );
    
    public function isAuthorized() {
        if($this->Auth->user('cargo_id') == 1 && $this->action === 'categoria'){
            return true;
        }
        if($this->Auth->user('cargo_id') == 1 && $this->action === 'gerenciar'){
            return true;
        }
        if($this->action === 'edit'){
            return true;
        }
        if($this->action === 'editor'){
            return true;
        }
        if($this->action === 'delete'){
            return true;
        }
        if($this->action === 'add'){
            return true;
        }
        if($this->action === 'logout'){
            return true;
        }
        if($this->action === 'index'){
            return true;
        }
        if($this->action === 'vis'){
            return true;
        }
        if($this->action === 'download'){
            return true;
        }
    }

    public function beforeFilter() {
        $this->Auth->allow('login', 'add', 'estadual', 'federal', 'download', 'vis');
    }
        

}
