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
?>                                            <?php
                                            $dated = new DateTime($norma['Norma']['doe_data']);
                                            $diad = $date->format('d');
                                            $mesd = $date->format('m');
                                            $anod = $date->format('Y');
                                            $datad = $date->format('d/m/Y');
                                            ?>
<?php
if($mesd==='01'){
    $md = 'janeiro';
}if($mesd==='02'){
    $md = 'fevereiro';
}if($mesd==='03'){
    $md = 'MARÇO';
}if($mesd==='04'){
    $md = 'abril';
}if($mesd==='05'){
    $md = 'maio';
}if($mesd==='06'){
    $md = 'junho';
}if($mesd==='07'){
    $md = 'julho';
}if($mesd==='08'){
    $md = 'agosto';
}if($mesd==='09'){
    $md = 'setembro';
}if($mesd==='10'){
    $md = 'outubro';
}if($mesd==='11'){
    $md = 'novembro';
}if($mesd==='12'){
    $md = 'dezembro';
}
?>
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
<div>
<div class="container-fluid">
<?php  //echo debug($this->request->data); ?>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <h2><?php echo strtoupper($norma['Tipo']['nome']); ?> Nº <?php echo number_format($norma['Norma']['numero'], 0, '', '.' ); ?>, DE <?php echo strtoupper($dia.' de '.$m.' de '.$ano); ?>. Publicado no DOE Nº <?php echo number_format($norma['Norma']['doe_num'], 0, '', '.' ); ?>, DE <?php echo strtoupper($diad.' de '.$md.' de '.$anod); ?>. </h2>
                <p>Data: <?php echo $data; ?></p>
                <p><?php echo $norma['Norma']['ementa']; ?></p>
                <?php echo $norma['Norma']['corpo']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>