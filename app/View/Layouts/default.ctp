<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$sec = $this->Session->read('Auth.User');
if(isset($sec) && $sec != null && !isset($sec['redirect']) || $this->params['action']==='login'){
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'LEGISEMAS' ?>
	</title>
	<?php		              
                echo $this->element('head');
                echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');  
	?>
</head>

<body class="fix-header fix-sidebar card-no-border">

    <?php echo $this->element('preloader'); ?>  
<?php if($this->params['action']!='login'){ ?>
    <div id="main-wrapper">
 
       <?php echo $this->element('header'); ?>
    
        <!-- Menu Esquerdo Left Sidebar - style you can find in sidebar.scss  -->
        <?php echo $this->element('menu'); ?>  
        
        <div class="page-wrapper">
     
           <div class="container-fluid">
                <?php //echo debug($this->params); ?>
                <!-- Caminho de Pao -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <?php if($this->params['action'] !== 'index'){ ?>
                            <?php if($this->params['action'] === 'categoria'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Categoria de Norma' ?></h3>
                            <?php }else if($this->params['action'] === 'add'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Adicionar Norma' ?></h3>
                            <?php }else if($this->params['action'] === 'edit'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Editar Normas' ?></h3>
                            <?php }else if($this->params['action'] === 'gerenciar'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Gerenciar Usuários' ?></h3>
                            <?php }else if($this->params['action'] === 'editor' && $this->params['controller'] === 'usuarios'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Editar Usuário' ?></h3>
                            <?php }else if($this->params['action'] === 'editor' && $this->params['controller'] === 'normas'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Editar Norma' ?></h3>
                            <?php }else if($this->params['action'] === 'vis' && $this->params['controller'] === 'normas'){ ?>
                            <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Visualizar Norma' ?></h3>
                            <?php } ?>
                        <?php }else{ ?>
                        <h3 class="text-megna m-b-0 m-t-0"><?php echo 'Principal'; ?></h3>
                        <?php } ?>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/legisemas\Normas\index">Home</a></li>
                            <?php if($this->params['action'] === 'index'){ ?>
                            <?php }else if($this->params['action'] === 'categoria'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Categoria de Norma' ?></li>
                            <?php }else if($this->params['action'] === 'add'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Adicionar Norma' ?></li>
                            <?php }else if($this->params['action'] === 'edit'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Editar Normas' ?></li>
                            <?php }else if($this->params['action'] === 'gerenciar'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Gerenciar Usuários' ?></li>
                            <?php }else if($this->params['action'] === 'editor' && $this->params['controller'] === 'usuarios'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Editar Usuário' ?></li>
                            <?php }else if($this->params['action'] === 'editor' && $this->params['controller'] === 'normas'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Editar Norma' ?></li>
                            <?php }else if($this->params['action'] === 'vis' && $this->params['controller'] === 'normas'){ ?>
                            <li class="breadcrumb-item active"><?php echo 'Visualizar Norma' ?></li>
                            <?php } ?>
                        </ol>
                        
                    </div>
<?php if($this->params['action']=='estadual'||$this->params['action']=='federal'||$this->params['action']=='edit'){ ?>
    <div class="col-md-7 col-4 align-self-center">
    <button class="btn waves-effect waves-light btn-danger pull-right" type="button" data-toggle="modal" data-target="#modalAgenda" data-whatever="@agenda">
        Filtrar Norma</button></div>
<?php } ?>
<?php if($this->params['action']=='categoria'){ ?>
    <div class="col-md-7 col-4 align-self-center">
    <button class="btn waves-effect waves-light btn-danger pull-right" type="button" data-toggle="modal" data-target="#modalAgenda" data-whatever="@agenda">
    <span class="btn-label"><i class="fa fa-plus-circle"></i></span>Nova Categoria</button></div>
<?php } ?>
<?php if($this->params['action']=='gerenciar'){ ?>
    <div class="col-md-7 col-4 align-self-center">
    <button class="btn waves-effect waves-light btn-danger pull-right" type="button" data-toggle="modal" data-target="#modalAgenda" data-whatever="@agenda">
    Novo Usuário</button></div>
<?php } ?>
<?php if($this->params['action']=='vis'){ ?>
                        <div class="col-md-7 col-4 align-self-center">
                            <a href="../edit" class="btn waves-effect waves-light btn-secondary pull-right m-l-10"><i class="mdi mdi-keyboard-backspace"></i> Voltar</a>
                        </div>
<?php } ?>

                </div>
               
          <!-- Start Page Content -->
          <div class="row">
                 <?php echo $this->fetch('content'); ?>  
          </div>

            </div>
         
            <!-- footer -->
            <?php echo $this->element('footer'); ?>  
          <?php }else{ ?>
          <?php echo $this->fetch('content');} ?>
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    
    <!-- All Jquery -->
    <?php echo $this->element('scripts'); ?>  

</body>

</html>

<?php }else{ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        
        <title>           
            <?php echo $title_for_layout; ?>
        </title>

        <?php
        echo $this->fetch('meta');

        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            "/lib/bootstrap/css/bootstrap",
            "/lib/jquery-ui-1.10.1/css/smoothness/jquery-ui-1.10.1.custom.min",
            "/lib/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon",
            "estilo",
            "/lib/bootstrap/css/bootstrap-responsive",
            "/lib/lightbox/lightbox.css",
        )) . "\n";

        echo $this->Html->script(array(
            "/lib/jquery-ui-1.10.1/js/jquery-1.9.1",
            "/lib/bootstrap/js/bootstrap",
            "/lib/jquery-ui-1.10.1/js/jquery-ui-1.10.1.custom.min",
            "/lib/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon",
            "/lib/lightbox/lightbox.min.js",
            "/lib/app"
        )) . "\n";

        echo $this->fetch('css') . "\n";
        echo $this->fetch('script') . "\n";
        ?>
    </head>
    <body>
        <div class="row-fluid">
            
        </div>
        
        <div id="admin_container" class="container-fluid">
            <div class="row-fluid">                               
                <div id="content" class="span12">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </body>
</html>

<?php } ?>