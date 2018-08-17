    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
class NormasController extends AppController{
    
    //vê normas
    public function index(){
        $this->Paginator->settings = array(
            'order' => array('id' => 'desc')
    );
        $posts = $this->Paginator->paginate('Norma', array('Norma.criador' => $this->Auth->user('nome')));
        $this->set('normas', $posts);
    }
    
    //registra nova norma
    public function add(){
        $tipos = $this->Norma->Tipo->find('list', array('fields' => array('Tipo.nome')));
        $this->set('tipos', $tipos);
        
        $niveis = $this->Norma->Nivel->find('list', array(
        'fields' => array('Nivel.nome')));
        $this->set('niveis', $niveis);
        if ($this->request->is('post')) {
            $this->Norma->create();
            $this->request->data['Norma']['ano'] = $this->request->data['Norma']['data'];
            $this->request->data['Norma']['criador'] = $this->Auth->user('nome');
            $this->request->data['Norma']['numero'] = str_replace(".", "", $this->request->data['Norma']['numero']);
            $this->request->data['Norma']['doe_num'] = str_replace(".", "", $this->request->data['Norma']['doe_num']);
            
            //adiciona o pdf
            //tamanho limitado pelo apache, no xampp alterar o valor de upload_max_filesize no arquivo php.ini
            if(!empty($this->request->data['Norma']['upload']['name'])){
                $file = $this->request->data['Norma']['upload']; //put the data into a var for easy use
                
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                if($ext === 'pdf'){
                    $arr_ext = array('pdf'); //set allowed extensions
                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)){
                            //do the actual uploading of the file. First arg is the tmp name, second arg is 
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files\pdf\\'  . strtolower ($tipos[$this->request->data['Norma']['tipo_id']]) . strtolower ($niveis[$this->request->data['Norma']['nivel_id']]) . $this->request->data['Norma']['numero'] . '.pdf');
                            //prepare the filename for database entry
                            //$this->request->data['Usuario']['imagem'] = $file['name'];
                    }
                }
            }
            
            if($this->request->data['Norma']['upload']['error'] == 0 && $ext === 'pdf'){
                if ($this->Norma->save($this->request->data)) {
                    $this->Flash->success(__('Norma registrada com sucesso.'));
                    return $this->redirect(array(
                        'controller' => 'normas',
                        'action' => 'index'));
                }
                $this->Flash->error(
                    __('Erro ao registrar do norma')
                );
            }else{
                $this->Flash->error(
                    __('Erro ao fazer upload do PDF')
                );
            }
            
        }
    }
    
    
    public $components = array('Paginator');

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Post.id' => 'asc'
        )
    );
    
    public function federal($new = null, $user = null){
        if($new == 'new'){
            $this->Session->delete('tipo_id');
            $this->Session->delete('busca');
            $this->Session->delete('busca_');
            $this->Session->delete('tipo_id');
        }
        if(isset($this->params['named']['tipo']) && $this->params['named']['tipo'] != 0){
            $this->Session->write('tipo_id',$this->params['named']['tipo']);
        }else{
            $this->Session->delete('tipo_id');
        }
        if($new == 'user'){
            $this->Session->write('busca_', $user);
        }
        $this->set('tipos', $this->Norma->Tipo->find('list', array(
        'fields' => array('Tipo.nome'))));
        $this->set('tips', $this->Norma->Tipo->find('all'));
        //$this->set('normas', $this->Norma->find('all', array('conditions' => array('Norma.nivel_id' => 2))));
        $this->Paginator->settings = $this->paginate;
        $config['nivel_id'] = 1;
        if($this->request->is('post')){
            
            if($this->request->data['Norma']['_busca'] === ''){
                $this->Session->delete('busca');
            }
            
            $parts = explode(' ', $this->request->data['Norma']['_busca']);
            
            if(isset($this->request->data['Norma']['_busca']) && $this->request->data['Norma']['_busca'] !=''){
                $this->Session->write('busca',$this->request->data['Norma']['_busca']);
            }
        }
        
        if($this->Session->check('busca_')){
            $config['AND']['criador'] = $this->Session->read('busca_');
        }
        
        if($this->Session->check('busca')){
            $parts = explode(' ', $this->Session->read('busca'));
            $tipos = $this->Norma->Tipo->find('all');
            $q = array();
            foreach($parts as $part):
                foreach($tipos as $tipo):
                    if(strtolower($tipo['Tipo']['nome']) ===  strtolower($part)){
                        $config['tipo_id'] = $tipo['Tipo']['id'];
                        break;
                    }
                endforeach;
                if(is_numeric($part)){
                    $part1 = str_replace(".", "", $part);
                    $config['AND']['OR']['numero'] = $part1;
                    $config['AND']['OR']['ano'] = $part1;
                    $config['AND']['OR']['doe_num'] = $part1;
                }
                    if(strtolower($tipo['Tipo']['nome']) !=  strtolower($part)){
                        $config['OR'][] = array('Norma.corpo LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.assunto LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.ementa LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.comentario LIKE' => '%'.$part.'%');
                }
                
            endforeach;
        }
        if($this->Session->check('nivel_id')){
            $config['nivel_id'] = $this->Session->read('nivel_id');
        }
        if($this->Session->check('tipo_id')){
            $config['tipo_id'] = $this->Session->read('tipo_id');
        }
        $posts = $this->Paginator->paginate('Norma',
            $config);
        $this->set('normas', $posts);
    }
    
    
    public function estadual($new = null, $user = null){
        if($new == 'new'){
            $this->Session->delete('tipo_id');
            $this->Session->delete('busca');
            $this->Session->delete('busca_');
            $this->Session->delete('tipo_id');
        }
        if(isset($this->params['named']['tipo']) && $this->params['named']['tipo'] != 0){
            $this->Session->write('tipo_id',$this->params['named']['tipo']);
        }else{
            $this->Session->delete('tipo_id');
        }
        if($new == 'user'){
            $this->Session->write('busca_', $user);
        }
        $this->set('tipos', $this->Norma->Tipo->find('list', array(
        'fields' => array('Tipo.nome'))));
        $this->set('tips', $this->Norma->Tipo->find('all'));
        //$this->set('normas', $this->Norma->find('all', array('conditions' => array('Norma.nivel_id' => 2))));
        $this->Paginator->settings = $this->paginate;
        $config['nivel_id'] = 2;
        if($this->request->is('post')){
            
            if($this->request->data['Norma']['_busca'] === ''){
                $this->Session->delete('busca');
            }
            
            $parts = explode(' ', $this->request->data['Norma']['_busca']);
            
            if(isset($this->request->data['Norma']['_busca']) && $this->request->data['Norma']['_busca'] !=''){
                $this->Session->write('busca',$this->request->data['Norma']['_busca']);
            }
        }
        
        if($this->Session->check('busca_')){
            $config['AND']['criador'] = $this->Session->read('busca_');
        }
        
        if($this->Session->check('busca')){
            $parts = explode(' ', $this->Session->read('busca'));
            $tipos = $this->Norma->Tipo->find('all');
            $q = array();
            foreach($parts as $part):
                foreach($tipos as $tipo):
                    if(strtolower($tipo['Tipo']['nome']) ===  strtolower($part)){
                        $config['tipo_id'] = $tipo['Tipo']['id'];
                        break;
                    }
                endforeach;
                if(is_numeric($part)){
                    $part1 = str_replace(".", "", $part);
                    $config['OR']['numero'] = $part1;
                    $config['OR']['ano'] = $part1;
                    $config['OR']['doe_num'] = $part1;
                }
                    if(strtolower($tipo['Tipo']['nome']) !=  strtolower($part)){
                        $config['OR'][] = array('Norma.corpo LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.assunto LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.ementa LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.comentario LIKE' => '%'.$part.'%');
                }
                
            endforeach;
        }
        if($this->Session->check('nivel_id')){
            $config['nivel_id'] = $this->Session->read('nivel_id');
        }
        if($this->Session->check('tipo_id')){
            $config['tipo_id'] = $this->Session->read('tipo_id');
        }
        $posts = $this->Paginator->paginate('Norma',
            $config);
        $this->set('normas', $posts);
    }
    
    
    
    public function vis($id = null){
        $this->set('norma', $this->Norma->find('first', array('conditions' => array('Norma.id' => $id))));
    }
    
    public function edit($new = null, $user = null){
        if($new == 'new'){
            $this->Session->delete('tipo_id');
            $this->Session->delete('nivel_id');
            $this->Session->delete('busca');
            $this->Session->delete('busca_');
        }
        if($new == 'user'){
            $this->Session->write('busca_', $user);
        }
        $this->set('tipos', $this->Norma->Tipo->find('list', array(
        'fields' => array('Tipo.nome'))));
        $this->set('niveis', $this->Norma->Nivel->find('list', array(
        'fields' => array('Nivel.nome'))));
        //$this->set('normas', $this->Norma->find('all', array('conditions' => array('Norma.nivel_id' => 2))));
        $this->Paginator->settings = $this->paginate;
        $config = array();
        if($this->request->is('post')){
            
            if($this->request->data['Norma']['_busca'] === ''){
                $this->Session->delete('busca');
            }
            if(isset($this->request->data['Norma']['nivel_id'])){
                if($this->request->data['Norma']['nivel_id']!=0){
                    $this->Session->write('nivel_id',$this->request->data['Norma']['nivel_id']);
                }else{
                    $this->Session->delete('nivel_id');
                }
            }
            
            $parts = explode(' ', $this->request->data['Norma']['_busca']);
            
            if(isset($this->request->data['Norma']['_busca']) && $this->request->data['Norma']['_busca'] !=''){
                $this->Session->write('busca',$this->request->data['Norma']['_busca']);
            }
        }
        
        if($this->Session->check('busca_')){
            $config['AND']['criador'] = $this->Session->read('busca_');
        }
        
        if($this->Session->check('busca')){
            $parts = explode(' ', $this->Session->read('busca'));
            $tipos = $this->Norma->Tipo->find('all');
            $q = array();
            foreach($parts as $part):
                foreach($tipos as $tipo):
                    if(strtolower($tipo['Tipo']['nome']) ===  strtolower($part)){
                        $config['tipo_id'] = $tipo['Tipo']['id'];
                        break;
                    }
                endforeach;
                if(is_numeric($part)){
                    $part1 = str_replace(".", "", $part);
                    $config['OR']['numero'] = $part1;
                    $config['OR']['ano'] = $part1;
                    $config['OR']['doe_num'] = $part1;
                }
                    if(strtolower($tipo['Tipo']['nome']) !=  strtolower($part)){
                        $config['OR'][] = array('Norma.corpo LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.assunto LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.ementa LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.comentario LIKE' => '%'.$part.'%');
                        $config['OR'][] = array('Norma.criador LIKE' => '%'.$part.'%');
                }
                
            endforeach;
        }
        if($this->Session->check('nivel_id')){
            $config['nivel_id'] = $this->Session->read('nivel_id');
        }
        $posts = $this->Paginator->paginate('Norma',
            $config);
        $this->set('normas', $posts);
    }
    
    public function delete($id) {
//        if ($this->request->is('get')) {
//            throw new MethodNotAllowedException();
//        }
//
//        if ($this->Norma->delete($id)) {
//            $this->Flash->success(
//                __('Lei com id %s foi deletada.', h($id))
//            );
//        } else {
//            $this->Flash->error(
//                __('Lei com id %s não pode ser deletada.', h($id))
//            );
//        }

        return $this->redirect(array('action' => 'edit'));
        
    }
    public function editor($id){
        $this->set('tipos', $this->Norma->Tipo->find('list', array(
        'fields' => array('Tipo.nome'))));
        $this->set('niveis', $this->Norma->Nivel->find('list', array(
        'fields' => array('Nivel.nome'))));
        $norma = $this->Norma->find('first', array('conditions' => array('Norma.id' => $id)));
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Norma->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Norma->id = $id;
            
            //adiciona o pdf
            //tamanho limitado pelo apache, no xampp alterar o valor de upload_max_filesize no arquivo php.ini
            if(!empty($this->request->data['Norma']['upload']['name'])){
                $file = $this->request->data['Norma']['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                echo debug($ext);
                $arr_ext = array('pdf'); //set allowed extensions
                
                //only process if the extension is valid
                if(in_array($ext, $arr_ext)){
                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files\pdf\\'  . strtolower($norma['Tipo']['nome']).strtolower($norma['Nivel']['nome']).$norma['Norma']['numero'] . '.pdf');
                        //prepare the filename for database entry
                        //$this->request->data['Usuario']['imagem'] = $file['name'];
                }
            }
            if ($this->Norma->save($this->request->data)) {
              $this->Flash->success(__('Norma editada com sucesso.'));
                return $this->redirect(array('action' => 'edit'));
            }
            $this->Flash->error(__('Erro ao realizar edição.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
        
    }
    
    
    
    
    
    public function download($id) {
        $this->viewClass = 'Media';
        $path =  'webroot/files/pdf/';
        // in this example $path should hold the filename but a trailing slash
        $params = array(
            'id' => $id.'.pdf',
            'name' => $id,
            'download' => true,
            'extension' => 'pdf',
            'path' => $path
        );
        $this->set($params);
    }
}
