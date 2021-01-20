<?php
    session_start();
    
?>
<!DOCTYPE html>

<html lang = "pt-BR">
    <head>
        <title><?php  echo $_SESSION['nome_empresa']; ?></title>
         <meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src = "menu_empresa.js"></script>
        <script>
            $(document).ready(function ()
            {
                $("#listar").click(function()
                {
                    $.ajax
                    ({
                        url: 'lista_soli.php',
                        method: 'POST',
                        data: {},
                        success: function(voltar)
                        {
                            $('#area').html(voltar);
                        }
                    });
                });

                
            });            


            function editar(id_evento)
            {
                $(document).ready(function()
                {
                    
                    $.ajax
                    ({
                        url: "auto.php",
                        method: "POST",
                        data: {id_evento: id_evento},
                        success: function(get_back)
                        {
                            window.location.href = "perfil_evento.php";
                            //$("body").html(get_back);

                        }
                    });    
                });
                
            }

        </script>
    </head>

    <body id = "perfil">
        
        <center>
            <a href = "../menu_empresa/menu.php" style = "margin-bottom: 5%; margin-top: 30%;"><img src = "../mart.png"/></a>

        </center>
        <div class="sticky-top">
            <?php include("../menu_empresa/barra.php"); ?>
        </div>
        <br />
        
        
        <section id = "area">
            
            
            <section class = "jumbotron" style = "margin-top: 5%;">
            <h2>Eventos da empresa</h2>
            <?php
				include("../base_de_dados/conexao.php");

				 $SQL = 'SELECT
                        id_evento, nome, descricao, local, data_horario, perfil_evento, cidade
                    FROM
                        eventos
                    WHERE
                        cnpj_empresa = '. $_SESSION["cnpj"].'';

				$query = mysqli_query($db, $SQL);
				if(mysqli_num_rows($query) > 0) //Se verdadeiro
				{
                    $count = 0;
                    print '<div class="row">';
					while($registros = mysqli_fetch_assoc($query))
					{
                        print '<div class="card mb-3" style="margin-right: 0.1%; max-width: 33%; min-width: 33%; min-height: 5%; max-height: 5%;">
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
                                                <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" data-toggle="modal" data-target="#modal_repre" onClick = "editar('.$registros["id_evento"].');">
                                                    Acessar evento
                                                </button>        
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>';

                       

						//print '<tr><td>'.$count.'</td>';
						//print '<td></td>';
						//print '<td>'.$registros["local"].'</td>';
						//print '<td></td>';
						//print '<td><button class=""  onClick = eve('.$registros["id_evento"].');>Acesse o evento</button></td></tr>';

                       



                        $matriz[$count] = $registros["capa_evento"];

                        $count = $count + 1;
                        
                    }

                    
                    print '</div>';
				}

                mysqli_close($db);
			?>
            </section>
            
            
        </section>
        
        
        
    </body>
</html>
