<section id="wrapper">
        <div class="login-register" style="background-color: #eef5f9;">        
            <div class="login-box m-b-20"><img class="logo" src="/legisemas/assets/images/logo-legi-color.png" alt="logo" />  
            </div>
            <div class="login-box card">
                <div class="card-body">
                    <?php echo $this->Form->create('Usuario', array('class'=>'form-horizontal', 'id'=>'loginform')); ?>
                        <h3 class="box-title m-b-20">Acesse o Sistema</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label class="control-label">Matricula</label>
                                <?php echo $this->Form->input('matricula', array('class'=>'form-control', 'label'=>'')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                            <label class="control-label">Senha</label>
                                <?php    echo $this->Form->password('senha', array('class'=>'form-control', 'label'=>''));?>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <?php echo $this->Form->button('Entrar', array('class'=>'btn btn-semas btn-lg btn-block text-uppercase waves-effect waves-light', 'type'=>'submit')); ?>
                                <label class="control-label"><?php echo $this->Flash->render();?></label>
                            </div>
                        </div>
                    
                        <div class="form-group m-b-0" style="font-size: 13px;">
                            <div class="col-sm-12 text-center">
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>

            </div>
            
            
            <div class="login-box m-t-40" style="font-size: 13px; text-align:center">
                 <p>SEMAS - Secretaria de Estado de Meio Ambiente e Sustentabilidade © 2018. <br>
                Núcleo de Estudos Legislativos – NEL: 3184­-3364
                </p>
            </div>

        </div>

        </div>
        
    </section>