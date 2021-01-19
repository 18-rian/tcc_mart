<?php
    session_start();
    
?>
<!DOCTYPE html>

<html lang = "pt-BR">
    <head>
        <meta charset = "UTF-8" />
        <title><?php  echo $_SESSION['nome_empresa']; ?></title>
        
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
                         perfil_evento, capa_evento
                    FROM
                        eventos
                    WHERE
                        id_evento = '.$id_c.';';

            $query = mysqli_query($conexao, $SQL);

            while($registros = mysqli_fetch_assoc($query))
            {
                $foto = $registros["perfil_evento"];
                $capa = $registros["capa_evento"];
            }
            
            //print $foto;
            print '<div style = "position:relative; display: inline-block; border: 1px solid black; width: 100%;">
                        <img src= "../empresa/eventos/'.$foto.'" height= "400px" width="100%" style = "margin-top: 0%; filter: blur(4px); left:1px; z-index: 1;"/>
                        <div style = "position:absolute;"><img src= "../empresa/eventos/'.$foto.'" height= "250px" width="250px" style = "margin-top: -80%; margin-left: 2%; left:1px; z-index: 2;"/>
                        </div>
                    </div>';
            
            mysqli_close($conexao);

           
        ?>

        
    </body>
</html>
