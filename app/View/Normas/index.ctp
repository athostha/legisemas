<?php $uid = $this->Session->read('Auth.User'); ?>  
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
<?php if(isset($uid)){ ?>
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center m-t-30"> <img src="/legisemas/assets/images/user-semas.png" alt="img" class="img-circle" width="150">
                                    <h4 class="card-title m-t-10"><?php echo $uid['nome'] ?></h4>
                                    <h6 class="card-subtitle"><?php echo $uid['Cargo']['nome']; ?></h6>
                                </div>
                            </div>
                            <div>
                            <hr> </div>
                            <div class="card-body"> 
                             
                               <h6 class="text-muted" style="margin-bottom: 0">Matrícula:</h6>
                               <h4><?php echo $uid['matricula'] ?></h4> 

                               <h6 class="text-muted p-t-10" style="margin-bottom: 0">Email:</h6>
                               <h4><?php echo $uid['email'] ?></h4>

                            </div>
                        </div>
                    
                    </div>

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                           <div class="card-body"> 
                            <h3 class="box-title">Últimas Publicações</h3>
                            <table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
    <thead>
    <tr>
        <th>Ações</th>
        <th>Tipo</th>
        <th data-toggle="true"> Número </th>
        <th> Data </th>
        <th> Ano </th>
        <th data-hide="all">Ementa</th>
        <th>Assunto</th>
<!--        <th>debug</th> -->
    </tr>
    </thead>
    <tbody>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php //debug($solicitacoes); ?>
<?php foreach ($normas as $norma): ?>
<?php
    $date = new DateTime($norma['Norma']['data']);
        $data = $date->format('d/m');
                                            ?>
    <tr>
        <td>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'fa fa-download text-inverse m-l-5','data-original-title'=>'Finalizar', 'title' => 'Download')),
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
        
        <td><?php echo $data; ?></td>
                
        
        <td><?php echo $norma['Norma']['ano']; ?></td>
        
        <td>
            <?php echo $norma['Norma']['ementa']; ?>   
        </td>
        <td>
            <?php echo $norma['Norma']['assunto']; ?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
                            </div>

                        </div>
                    </div>
<?php } ?>