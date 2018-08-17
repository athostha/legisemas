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
<div class="col-12">
                           <div class="card">
                               <div class="card-body">
                                 <table id="demo-foo-accordion" class="table table-hover toggle-arrow-tiny">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true"> Ações </th>
                                            <th> Id</th>
                                            <th> Nome da Categoria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tipos as $tipo): ?>
                                        <tr>
                                            <td class="text-nowrap">
                                                <?php echo $this->Form->postLink(
                                                        $this->Html->tag('i', '', array('class' => 'fa fa-close text-danger','data-original-title'=>'Finalizar', 'title' => 'Excluir Norma')),
                                                            array('action' => 'delete', $tipo['Tipo']['id']),
                                                            array('escape'=>false),
                                                            __('Você realmente deseja deletar esta Categoria?'),
                                                           array('class' => 'btn btn-mini')
                                                            ); ?>
                                            </td>
                                            <td><?php echo $tipo['Tipo']['id']?></td>
                                            <td><?php echo $tipo['Tipo']['nome']?></td>
                                        </tr>
                                        
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>        
                               </div>
                           </div>
                       </div>


<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Nova Categoria</h4>
                                                <?php echo $this->Form->create('Tipo', array('type' => 'post')); ?>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                      <label class="control-label">Categoria</label>
                                                      <?php echo $this->Form->input('Tipo.nome', array(
                                                        'label' => '',
                                                        'class' => 'form-control'
                                                        ));?>
                                                      </div>
                                            <div class="modal-footer">
                                                <?php echo $this->Form->button('Salvar', array('type'=>'submit', 'class'=>'btn waves-effect waves-light btn-danger pull-right')); ?>
                                                <?php echo $this->Form->end(); ?>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>