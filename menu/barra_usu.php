

<?php session_start(); ?>
<head>
    <!--<meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    <script>
        function meus_eventos()
        {
            //selecionar os eventos que irá comparecer. 
            $(document).ready(function ()
            {
                $.ajax
                    ({
                        url: '../menu/listar_eventos.php',
                        method: 'POST',
                        data: {},
                        success: function(get_back)
                        {
                             //$("#eventos").html(get_back);
                             
                             $("#lista").html(get_back);
                             $("#eventos").modal('show');
                        }
				    });   
            });
        }
        function acesse(evento_id)
        {
            
            $(document).ready(function ()
            {	
                $.ajax
                ({
                    url: '../inicial/transicao.php',
                    method: 'POST',
                    data: {id_evento: evento_id},
                    success: function(back)
                    {
                         
                         $("#lista_es").html(back);
                         $("#evento_especi").modal('show');
                    }
                });
            });
        }
        function editais()
        {
            $(document).ready(function ()
            {
                $.ajax
                ({
                    url: '../menu/editais_publicados.php',
                    method: 'POST',
                    data: {},
                    success: function(volta)
                    {
                         $("#edital").html(volta);
                         $("#edi").modal('show');
                    }
                });
            });
        }
       $(document).ready(function(){
       $("#barra").on("input", function () {
            var word = $("#barra").val();
            $.ajax
            ({
                url: '../inicial/select.php',
                method: 'POST',
                data: {word: word},
                success: function(retorno)
                {
                    if(retorno == "foi")
                    {
                        
                        window.location.href = "../inicial/transicao_com.php";    
                        
                    }
                    else
                    {
                        $("#pes").html(retorno);    
                    }



                }

            });
        });
    });
        
    </script>
</head>


    <nav class="navbar navbar-expand-md navbar-inverse" style="display: block; border-top: 1px solid black; border-bottom: 1px solid black; background-color: red; margin-bottom: 1%; width: 100%;">
        <button class="navbar-toggler" data-toggle = "collapse" data-target = "#collapse_target">
            <span class="navbar-toggler-icon">Menu</span>
        </button>


        <div class="collapse navbar-collapse" id = "collapse_target">
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width: 450px; height: 35px; display: inline-block; border-bottom: 8px solid black;">

            <datalist id = "pes">

            </datalist>
            </form>
            <center class="navbar-center">
                <a href="../inicial/pagina_inicial.php"> <img src="../logoti.png"  style = "width: 30%;"/></a>
            </center>
            <ul class="nav navbar-nav navbar-right">

                <div class="btn-group">
                    <button type="button" id = "click_login" class="btn" data-target="#eventos" onClick = "meus_eventos();" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                        Eventos marcados
                    </button>

                    <?php
                        if ($_SESSION['editais_s_n'] == "Sim")
                        {
                            print '<button type="button" onClick = "editais();" id = "click_login" class="btn" data-target="#editais" data-toggle="modal" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                                    Editais publicados 
                                </button>';    
                        }
                        
                    ?>

                    <div class="btn-group dropleft">
                        <button type="button" class="btn dropdown-toggle"  data-toggle="dropdown" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                         Conta  
                        </button>
                         <div class="dropdown-menu">
                            <a class="dropdown-item" href="../menu/perfil_usua.php">Perfil</a>
                            <a href = "../menu/logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
               </div>
            </ul>
            
        </div>
    </nav>





    <div class = "modal fade bd-example-modal-lg" id = "eventos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_evento">Lista de eventos</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "lista"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
    

    <div class = "modal fade bd-example-modal-lg" id = "evento_especi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_edital">Detalhes do evento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "lista_es"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class = "modal fade bd-example-modal-lg" id = "edi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_edital">Lista de editais</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "edital"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </div>

    
            
