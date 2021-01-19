<?php session_start(); ?>
<script src = "menu_empresa.js"></script>

    <nav class="navbar navbar-expand-md navbar-inverse" style="display: inline-block; border-top: 1px solid black; border-bottom: 1px solid black; background-color: red; margin-bottom: 1%; width: 100%;">
        <button class="navbar-toggler" data-toggle = "collapse" data-target = "#collapse_target">
            <span class="navbar-toggler-icon">Menu</span>
        </button>


        <div class="collapse navbar-collapse" id = "collapse_target">
            
            <center class="navbar">
                <a href = "../menu_empresa/menu.php" style="color: white; font-size: 200%;"> <img src="../logoti.png"  style = "width: 30%;"/> EMPRESARIAL</a>
            </center>
            <ul class="nav navbar-nav">

                <div class="btn-group">
                    <button type="button" id = "eventos" class="btn" data-target="#eventos" onClick = "meus_eventos();" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                        Criar eventos
                    </button>

                    <button type="button" id = "lista" class="btn" data-target="#eventos" onClick = "meus_eventos();" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                        Lista de eventos
                    </button>

                    <?php
                        //há de fazer a verificação se é ou não empresa itinerante
                        $localizacao = $_SESSION['localizacao'];
                        if($localizacao == "Itinerante")
                        {
                            //Depois há de criar um botão para receber as notificações de oferta de trabalho
                            //e dar a opção de escolha. 

                            ?> 

                            <button type="button" id = "listar" class="btn" data-target="#eventos" onClick = "meus_eventos();" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                                Notificações
                            </button>



                            <?php
                        }
                    ?>

                    <a href = "../menu_empresa/menu.php"><button type="button" id = "lista" class="btn" data-target="#eventos" onClick = "meus_eventos();" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                        Eventos da empresa
                    </button></a>
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle"  data-toggle="dropdown" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                         Conta  
                        </button>
                         <div class="dropdown-menu">
                            <a class="dropdown-item" href="../menu_empresa/empre_per.php">Perfil</a>
                            <a href = "../menu/logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
               </div>
            </ul>
            
        </div>
    </nav>


