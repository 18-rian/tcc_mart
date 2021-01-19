<!DOCTYPE html>

<html lang = "pt-BR">
    <head>
        <title>Menu</title>

        <meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
			function eve(id_evento)
			{
				
				$.ajax
                ({
                    url: '../inicial/transicao.php',
                    method: 'POST',
                    data: {id_evento:id_evento},
                    success: function(get_back)
                    {
                         $("#data").html(get_back);
                         $("#modal_repre").modal('show');
                    }
				});
            }
            $(document).ready(function()
            {
                $("#table").on("input", function ()
                {
                    var word_two = $("#table").val();
                    $.ajax
                    ({
                        url: '../inicial/select_two.php',
                        method: "POST",
                        data: {word_two: word_two},
                        success: function(retorna)
                        {
                            
                            $("#area_alvo").html(retorna);    
                            
                        }
                    });
                })
            });
		</script>
        
    
    </head>
    <body class =  ".display-3">
        
        <center>
		    <a href = "../menu/menu.php"><img src = "../mart.png" style = "margin-top: 5%;"/></a>
            <h2 style = "margin-bottom: 0%;">ACOMPANHE OS EVENTOS QUE RODAM A SUA REGIÃO</h2>
        </center>
        <?php include("barra_usu.php"); ?>
        <section class = "area_eventos" style = "margin-top: 5%; margin-left: 10%; margin-right: 10%;">

            <div>
                <?php include("../inicial/slides.php"); ?>
        
            </div>
         </section>

        <section class = "jumbotron" style = "margin-left: 1%; margin-top: 5%;">
            <input type = "search" class="form-control mr-sm-2" style = "width: 100%; height: 35px; border-radius: 6px; border: none; border-bottom: 5px solid black;" placeholder="Digite o nome da cidade ou o nome do evento" id = "table"/> <!--Pesquisar o nome do evento -->
            
            <hr />
			<?php
                include("../base_de_dados/conexao.php");

                $SQL = "SELECT 
                             id_evento, nome, descricao, local, data_horario, perfil_evento, capa_evento, cidade
                        FROM
                            eventos";

                $query = mysqli_query($conexao, $SQL);

                if(mysqli_num_rows($query) > 0) //Se verdadeiro
                {
                    $count = 0;
                    print '<div class="row" id = "area_alvo">';
                    while($registros = mysqli_fetch_assoc($query))
                    {
                        if($registros["data_horario"] >= date("Y-m-d H:i:s"))
                        {
                            print '

                                    <div class="card mb-3" style="margin-right: 0.1%; max-width: 33%; min-width: 33%; min-height: 5%; max-height: 5%;">
                                      <div class="row no-gutters">
                                        <div class="col-md-3">
                                          <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 15%; max-height: 100%; min-height: 100%;">
                                        </div>
                                        <div class="col-md-8">
                                          <div class="card-body">
                                            <h5 class="card-title">'.$registros["nome"].'</h5>
                                            <p class="card-text">'.$registros["descricao"].'</p>
                                            <p class="card-text"><small class="text-muted">Cidade: '.$registros["cidade"].'</small></p>
                                            <p>
                                                <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" data-toggle="modal" data-target="#modal_repre" onClick = "eve('.$registros['id_evento'].');">
                                                    Acessar evento
                                                </button>        
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                
                                    <!--<div class="card" style="width: 20%; margin: 20px 0px 100px 120px; background-color: black;">
                                        <div class = "container">
                                            <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 40%; max-height: 220px; min-height: 220px;">
                                            <div class="overlay">
                                                <div class="text">
                                                    <div class="card-body" style = "color: white;">
                                                        <h5 class="card-title">'.$registros["nome"].'</h5>
                                                        <a>
                                                            <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" data-toggle="modal" data-target="#modal_repre" onClick = "eve('.$registros['id_evento'].');">
                                                                Acessar evento
                                                            </button>
                                                        </a>
                                                </div>
                                            </div>
                                            
                                        </div>  
                                    </div>
                                    <p class="card-text" style = "font-family: arial; margin-top: 5%; background-color: white; text-align: center; height: 30%;">'.$registros["nome"].'<br />'.$registros["cidade"].'</p>
                                   
                                    </div>-->

                                    <div class = "modal fade bd-example-modal-xl" id = "modal_repre" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id = "nome_evento">Detalhes do evento</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body" style = "overflow: scroll;">
                                                    <a id = "data"></a>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                
                                ';

                            $matriz[$count] = $registros["capa_evento"];

                            $count = $count + 1;
                            
                        }

                      }
                        print '</div>';
                }

                mysqli_close($conexao);
            ?>
		</section>
    
    </body>
</hmtl>

