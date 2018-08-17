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
                           <div class="col-12">
                           <div class="card">
                               <div class="card-body">
<table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
    <thead>
    <tr>
        <th>Ações</th>
        <th>Categoria</th>
        <th data-toggle="true">Número</th>
        <th>Data</th>
        <th>Ano</th>
        <th>Assunto</th>
        <th data-hide="all">Ementa</th>
        <th data-hide="all">Uploader</th>
        <th>Tipo</th>
<!--        <th>debug</th> -->
    </tr>
    </thead>
    <tbody>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php foreach ($normas as $norma): ?>

                                            <?php
                                            $date = new DateTime($norma['Norma']['data']);
                                            $dia = $date->format('d');
                                            $mes = $date->format('m');
                                            $ano = $date->format('Y');
                                            $data = $date->format('d/m/Y');
                                            ?>
<?php
if($mes==='01'){
    $m = 'janeiro';
}if($mes==='02'){
    $m = 'fevereiro';
}if($mes==='03'){
    $m = 'MARÇO';
}if($mes==='04'){
    $m = 'abril';
}if($mes==='05'){
    $m = 'maio';
}if($mes==='06'){
    $m = 'junho';
}if($mes==='07'){
    $m = 'julho';
}if($mes==='08'){
    $m = 'agosto';
}if($mes==='09'){
    $m = 'setembro';
}if($mes==='10'){
    $m = 'outubro';
}if($mes==='11'){
    $m = 'novembro';
}if($mes==='12'){
    $m = 'dezembro';
}
?>
    <tr>
        <td>
            
                                                            <?php
                                            $datedoe = new DateTime($norma['Norma']['doe_data']);
                                            $diadoe = $date->format('d');
                                            $mesdoe = $date->format('m');
                                            $anodoe = $date->format('Y');
                                            ?>
            <a href="http://www.ioepa.com.br/pages/<?php echo $anodoe ?>/<?php echo $anodoe ?>.<?php echo $mesdoe ?>.<?php echo $diadoe ?>.DOE.pdf"><i class="fa fa-newspaper-o text-inverse m-l-5" title="DOE"></i></a>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-pencil text-inverse m-l-5', 'title' => 'Editar Norma')),
                array('action' => 'editor', $norma['Norma']['id']),
                array('escape' => false)
            ); ?>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-close text-danger','data-original-title'=>'Finalizar', 'title' => 'Excluir Norma')),
                        array('action' => 'delete', $norma['Norma']['id']),
                        array('escape'=>false),
                        __('Você realmente deseja deletar esta Norma?'),
                       array('class' => 'btn btn-mini')
                        ); ?>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-download text-inverse m-l-5','data-original-title'=>'Finalizar', 'title' => 'Visualizar PDF')),
                        array('action' => 'download', strtolower($norma['Tipo']['nome']).strtolower($norma['Nivel']['nome']).$norma['Norma']['numero']),
                        array('escape'=>false)
                        ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-search text-inverse m-l-5', 'title' => 'Visualizar')),
                array('action' => 'vis', $norma['Norma']['id']),
                array('escape' => false)
            ); ?>
            </td>
        <td class="text-nowrap">
            <?php echo $norma['Tipo']['nome']; ?>
        </td>
        <td>
            <?php echo number_format($norma['Norma']['numero'], 0, '', '.' ); ?>
        </td>
        
        <td><?php echo strtoupper($dia.' de '.$m); ?></td>
                
        
        <td><?php echo $norma['Norma']['ano']; ?></td>
        
        <td>
            <?php echo $norma['Norma']['assunto']; ?>   
        </td>
        <td>
            <?php echo $norma['Norma']['ementa']; ?>
        </td>
        <td>
            <?php echo $norma['Norma']['criador']; ?>
        </td>
        <td>
            <?php echo $norma['Nivel']['nome']; ?>
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
                                                <h4 class="modal-title" id="exampleModalLabel1">Pesquisa</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body"><?php echo $this->Form->create('Norma', array('url' => array('controller' => 'normas', 'action' => 'edit'))); ?>
                                                    <div class="form-group">
                                                      <label class="control-label">Tipo</label>
                                                      <?php
                                                        $niveis[0] = 'Todos';
                                                        echo $this->Form->input('nivel_id', array(
                                                            'label' => '',
                                                            'options' => $niveis,
                                                            'class' => 'form-control',
                                                            'value' => 0));?>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="control-label">Especificação de busca</label>
                                                            <?php echo $this->Form->input('_busca', array(
                                                                'label' => '',
                                                                    'class' => 'form-control'));?>
                                                    </div>
                                            <div class="modal-footer">
                                                <?php echo $this->Form->button('Buscar', array('type'=>'submit', 'class'=>'btn waves-effect waves-light btn-danger pull-right'));
                                                echo $this->Form->end(); ?>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</body>

        




        


