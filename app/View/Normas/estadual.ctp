
<div class="row-fluid">  
    <div class="span12">
            <form class="navbar-form pull-right" action="/legisemas/normas/estadual" id="LicitacaoPesquisaPublicaForm" method="post" accept-charset="utf-8">
		<div class="input-prepend">
			<div class="btn-group">

				<button class="btn dropdown-toggle" data-toggle="dropdown">
					Modalidade
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<?php $tips[1000] = array(
		'Tipo' => array(
			'id' => '0',
			'nome' => 'Todos'
		)
	); ?>
					<?php foreach ($tips as $t_licitacao) { ?>
					<li><a href="/legisemas/normas/estadual/tipo:<?php echo $t_licitacao['Tipo']['id']; ?>"><?php echo $t_licitacao['Tipo']['nome']; ?></a></li>
					<?php } ?>
				</ul>

			</div>  
            <input class="input-xlarge" type="text" placeholder="Digite o número da licitação" name="Norma[_busca]" id="LicitacaoNumero">&nbsp;&nbsp;<button type="submit" class="btn">Pesquisar!</button>
		</div>
            </form>
       <div class="box-top">                    
            <?php echo $this->element('lista_paginacao') ?>
        </div>
        
        <table class="table user-tbl table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Número</th>
                    <th>Ementa</th>
                    <th>Data</th>
                    <th>Ano</th>
                    <th>Assunto</th>

                    <th width="13%">Ações</th>

                </tr>
            </thead>
            <tbody>
                
                <?php $nc=0; foreach ($normas as $licitacao) { ?>                                
                    <tr>
                        <td> 
                            <?php $x = $licitacao['Norma']['tipo_id']; echo $tipos[$x] ?>
                        </td>
                        <td> 
                            <?php echo number_format($licitacao['Norma']['numero'], 0, '', '.' ); ?>
                        </td>  
                        <td> 
                            <?php echo $licitacao['Norma']['ementa']; ?>
                        </td> 
                        
                        
                        
                        
                                            <?php
                                            $date = new DateTime($licitacao['Norma']['data']);
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
                        <td><?php echo strtoupper($dia.' de '.$m); ?></td>
                
                        <td><?php echo $licitacao['Norma']['ano']; ?></td> 
                            
                        <td> 
                            <?php echo $licitacao['Norma']['assunto']; ?>
                        </td>

                        
        <td align='center'>
            
                                                            <?php
                                            $datedoe = new DateTime($licitacao['Norma']['doe_data']);
                                            $diadoe = $date->format('d');
                                            $mesdoe = $date->format('m');
                                            $anodoe = $date->format('Y');
                                            ?>
            <a class="btn btn btn-mini btn-info" href="http://www.ioepa.com.br/pages/<?php echo $anodoe ?>/<?php echo $anodoe ?>.<?php echo $mesdoe ?>.<?php echo $diadoe ?>.DOE.pdf" target="_blank"><i class="icon-file icon-white"></i> Visualizar DOE</a>
            <?php echo $this->Form->postLink(
                    $this->Html->tag('i','<i class="icon-file icon-white"></i>Visualizar PDF', array('class' => 'btn btn btn-mini btn-info','data-original-title'=>'Finalizar')),
                        array('action' => 'download', strtolower($licitacao['Tipo']['nome']).strtolower($licitacao['Nivel']['nome']).$licitacao['Norma']['numero']),
                        array('escape'=>false)
                        ); ?>
            <?php echo $this->Html->link(
                $this->Html->tag('i','<i class="icon-file icon-white"></i>Visualizar Norma', array('class' => 'btn btn btn-mini btn-info')),
                array('action' => 'vis', $licitacao['Norma']['id']),
                array('escape' => false)
            ); ?>
            </td>
                    </tr>  
                <?php $nc++; } ;  ?>
            </tbody>
        </table>
        <div class="box-bottom">                    
            <?php echo $this->element('lista_paginacao');?>
        </div>
    </div>
</div>



