<aside class="left-sidebar">
   <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php $uid = $this->Session->read('Auth.User'); ?>
                <!-- Menu do servidor -->
                <?php if(isset($uid)){ ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="\legisemas\normas\index" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <?php if($uid['cargo_id'] == 1){ ?>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\tipos\categoria" aria-expanded="false"><i class="mdi mdi-google-circles-extended"></i><span class="hide-menu">Categorias de Norma</span></a>
                        </li>
                        <?php } ?>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\normas\add" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">Adicionar Norma</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\normas\edit\new" aria-expanded="false"><i class="mdi mdi-scale-balance"></i><span class="hide-menu">Editar Normas</span></a>
                        </li>
                        <?php if($uid['cargo_id'] == 1){ ?>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\usuarios\gerenciar" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Gerenciar Usuários</span></a>
                        </li>
                        <?php } ?>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\usuarios\editor\<?php echo $uid['id']; ?>" aria-expanded="false"><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Meu Cadastro</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/legisemas/usuarios/logout" aria-expanded="false"><i class="mdi mdi-power"></i><span class="hide-menu">Sair</span></a>
                        </li>
                    </ul>
                </nav>
                <?php }else{ ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="\legisemas\normas\index" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\normas\federal\new" aria-expanded="false"><i class="mdi mdi-flag-variant"></i><span class="hide-menu">Legislação Federal</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="\legisemas\normas\estadual\new" aria-expanded="false"><i class="mdi mdi-star"></i><span class="hide-menu">Legislação Estadual</span></a>
                        </li>
                
                    </ul>
                </nav>
                <?php } ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
             
            <div class="sidebar-footer">
                <img src="/facilita/assets/images/logo_semas.png" alt="Semas" />
            </div>

</aside>