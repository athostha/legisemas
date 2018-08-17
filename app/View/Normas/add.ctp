<?php echo $this->Html->script('ckeditor/ckeditor');?>
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
                                                    <?php echo $this->Form->create('Norma', array('type'=>'post','enctype' => 'multipart/form-data', 'id' => 'contact')); ?>
                                                    <label class="control-label">Tipo</label>
                                                    <?php 
                                                            echo $this->Form->input('nivel_id', array(
                                                                'label' => '',
                                                                'options' => $niveis,
                                                                'class'=>'form-control'));?>
                                                    <label class="control-label">Categoria</label>
                                                            <?php echo $this->Form->input('tipo_id', array(
                                                                'label' => '',
                                                                'options' => $tipos,
                                                                'class'=>'form-control'));?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Número</label>
                                                    <?php echo $this->Form->input('numero',array('label' => '',
                                                                'class'=>'form-control', 
                                                                'rows'=>'1',
                                                                'formnovalidate' => true)); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Data</label>
                                                    <?php echo $this->Form->date('data', array('type' => 'date',
                                                        'dateFormat' => 'DMY',
                                                                'class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Observação</label>
                                                    <?php echo $this->Form->input('comentario',array('label' => '',
                                                                'class'=>'form-control', 
                                                                'rows'=>'1')); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                                <label class="control-label">DOE</label>
                                                <div class="form-group">
                                                    <label class="control-label">Número</label>
                                                    <?php echo $this->Form->input('doe_num',array('label' => '',
                                                                'class'=>'form-control', 
                                                                'rows'=>'1',
                                                                'formnovalidate' => true)); ?>
                                                    <label class="control-label">Data</label>
                                                    <?php echo $this->Form->date('doe_data', array('type' => 'date',
                                                        'dateFormat' => 'DMY',
                                                                'class'=>'form-control')); ?>
                                                </div><hr>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Assunto</label>
                                                    <?php echo $this->Form->input('assunto',array('label' => '',
                                                                'class'=>'form-control', 
                                                                'rows'=>'1')); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Ementa</label>
                                                    <?php echo $this->Form->input('ementa',array('label' => '',
                                                                'class'=>'form-control', 
                                                                'rows'=>'1')); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Corpo</label>
                                                    <?php echo $this->Form->textarea('corpo',array('class'=>'ckeditor'))?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Arquivo PDF</label>
<?php echo $this->Form->input('upload', array('type' => 'file', 'label' => '')); ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>   
<div class="form-actions">
<?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn btn-info')) ?>
<?php echo $this->Form->end();?>
    <a href="index" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</a>
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