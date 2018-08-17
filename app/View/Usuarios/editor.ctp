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
<?php  //echo debug($this->request->data); ?>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php echo $this->Form->create('Usuario'); ?>
                                                    <legend><?php echo __('Dados do Usuário'); ?></legend>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nome</label>
                                                    <?php echo $this->Form->input('nome', array(
                                                                'label' => '',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Matrícula</label>
                                                    <?php echo $this->Form->input('matricula', array(
                                                                'label' => '',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">email</label>
                                                    <?php echo $this->Form->input('email', array(
                                                                'label' => '',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <?php
                                            $uid = $this->Session->read('Auth.User');
                                            if($uid['cargo_id'] == 1 && $uid['id'] != $id){ ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Cargo</label>
                                                    <?php 
                                                    echo $this->Form->input('cargo_id', array(
                                                        'label' => '',
                                                        'options' => $cargos,
                                                        'class'=>'form-control'));?>
                                                </div>
                                            </div>
                                            <?php } ?>
<div class="form-actions">
<?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')) ?>
<?php echo $this->Form->end();?>
    <a href="index.php" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
	                                    </div>

	                                </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php echo $this->Form->create('Usuario'); ?>
                                                    <legend><?php echo __('Mudar Senha'); ?></legend>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
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
                                            </div>
<div class="form-actions">
<?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')) ?>
<?php echo $this->Form->end();?>
    <a href="index.php" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
	                                    </div>

	                                </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>