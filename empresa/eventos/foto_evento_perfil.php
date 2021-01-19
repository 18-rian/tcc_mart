<?php
    session_start();
    
?>
<!DOCTYPE html>

<html lang = "pt-BR">
    <head>
        <meta charset = "UTF-8" />
        <title><?php  echo $_SESSION['nome_empresa']; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>

    <body>
        <?php 
            include("../base_de_dados/conexao.php");
            

            if($_SESSION["id_evento"] == NULL)
            {
                $id_c = $_POST["id"];
            }
            else
            {
                $id_c = $_SESSION["id_evento"];
            }


            $SQL = 'SELECT
                         nome, data_horario, local, perfil_evento, capa_evento
                    FROM
                        eventos
                    WHERE
                        id_evento = '.$id_c.';';

            $query = mysqli_query($conexao, $SQL);

            while($registros = mysqli_fetch_assoc($query))
            {
                $nome = $registros["nome"];
                $data = $registros["data_horario"];
                $local = $registros["local"];
                $foto = $registros["perfil_evento"];
                $capa = $registros["capa_evento"];
            }
            
            //print $foto;
            print '<div style = "display: block; border: 1px solid black; position: relative;"><img src= "../empresa/eventos/'.$foto.'" height= "400px" width="100%" style = "filter: blur(4px); left:1px; top:1px; z-index: 1;" class = "img-responsive" />';
            print '<div style = "position:absolute;"><img src= "../empresa/eventos/'.$foto.'" class = "img-responsive" height= "250px" width="250px" style = "margin-top: -100%; margin-left: 2%; left:1px; top:1px; z-index: 2;"/></div></div>

                <div style = "margin-top: 5%; display: inline-block; width: 99%;"><p>
                <h5 style = "letter-spacing: 3px; font-family: arial"><span style="font-weight:bold; margin-left: 20%; height: 400px;">'.$nome.' - </span><a style = "font-family: arial;"><img class = "img-responsive" src = "../inicial/icons.png" height = "25px" widht = "25px" style = "margin-right: 2%;">'.$data.'</a><a style = "font-family: arial; margin-left: 1%;"><img src = "../inicial/globo.png" class = "img-responsive" height = "25px" widht = "25px" style = "margin-right: 2%;">'.$local.'</a></h5></p>';

            print '<hr style = "border: 8px solid black; background-color: black;"/> </div></div>';
           //<br /><br /><br /><br />
            mysqli_close($conexao);

        ?>

        
    </body>
</html>
