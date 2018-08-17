<body class="fix-header fix-sidebar card-no-border">
<?php 
$uid2 = $this->Flash->render();
if(isset($uid2)){ 
    if($uid3['element'] === 'Flash/error'){?>
    <div class="col-12">
        <div class="alert alert-danger">
            <h3 class="text"><?php echo $uid2;?></h3>
        </div>  
    </div>
    <?php }else{ ?>
    <div class="col-12">
        <div class="alert alert-info">
            <h3 class="text-dark"><?php echo $uid2;?></h3>
        </div>  
    </div>
    <?php } ?>
<?php } ?>
<div id="main-wrapper">
    <div>
        <div class="container-fluid">
<!-- Start Page Content -->
                <div class="row">
                           <!-- column -->
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
<table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
    <thead>
    <tr>
        <th>Ações</th>
        <th>Matrícula</th>
        <th>Nome</th>
        <th>Cargo</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
<?php foreach($usuarios as $usuario): ?>
    <tr>
        <td>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-address-card text-inverse m-l-5', 'title' => 'Visualizar Normas')),
                array('controller' => 'normas', 'action' => 'edit', 'user', $usuario['Usuario']['nome']),
                array('escape' => false)
            ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-pencil text-inverse m-l-5', 'title' => 'Editar Usuário')),
                array('action' => 'editor', $usuario['Usuario']['id']),
                array('escape' => false)
            ); ?>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-close text-danger','data-original-title'=>'Finalizar', 'title' => 'Excluir Usuário')),
                        array('action' => 'delete', $usuario['Usuario']['id']),
                        array('escape'=>false),
                        __('Você realmente deseja deletar este Usuário?'),
                       array('class' => 'btn btn-mini')
                        ); ?></td>
        
        <td>
            <?php echo $usuario['Usuario']['matricula']; ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['nome']; ?>
        </td>
        <td>
            <?php echo $usuario['Cargo']['nome']; ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['email']; ?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
                                   </div>
                           </div>
                       </div>
                       <!-- column -->
                </div>

<?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>
            </div>
         
         
        </div>
</div>

<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Novo Usuário</h4>
                                                <?php echo $this->Form->create('Tipo', array('type' => 'post')); ?>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <?php echo $this->Form->create('Usuario'); ?>
                                                    <label class="control-label">Nome</label>
                                                    <?php echo $this->Form->input('nome', array(
                                                                'label' => '',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Matrícula</label>
                                                    <?php echo $this->Form->input('matricula', array(
                                                                'label' => '',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">email</label>
                                                    <?php echo $this->Form->email('email', array(
                                                                'label' => '',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Senha</label>
                                                    <?php echo $this->Form->input('senha', array(
                                                        'label' => '',
                                                        'type' => 'password',
                                                                'class'=>'form-control')); ?>
                                                    <label class="control-label">Confirmar Senha</label>
                                                    <?php echo $this->Form->input('confirm_password',array(
                                                        'label' => '',
                                                           'type'  =>  'password',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <label class="control-label">Cargo</label>
                                                    <?php 
                                                    echo $this->Form->input('cargo_id', array(
                                                        'label' => '',
                                                        'options' => $cargos,
                                                        'class'=>'form-control'));?>
                                                </div>
                                            <div class="modal-footer">
                                                <?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')) ?>
                                                <?php echo $this->Form->end();?>
                                                    <a href="./gerenciar" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
    
    

</body>