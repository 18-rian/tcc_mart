<?php session_start(); ?>

<!DOCTYPE html>

<html>
  <head>
      <title>Menu - Negócios</title>
      <meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
          function lista_con(id)
          {
              
              $(document).ready(function()
              {
                 $.ajax
                 ({
                      url: 'situacao.php',
                      method: 'POST',
                      data: {id: id},
                      success: function(back)
                      {
                          $('#lisedi').html(back);
                      }
                 });
              });
          }
          function lista_edital()
          {
              $(document).ready(function()
              {
                //Fazer o listamento
                $.ajax
                 ({
                      url: 'lis_edi.php',
                      method: 'POST',
                      data: {},
                      success: function(volt)
                      {
                          $('#lisedi').html(volt);
                      }
                 });
              });
          }
      </script>
  </head>
  <body>
      
    <?php include("../menu_empresa/barra_one.php"); ?>
    
    
    <center>
      <h1>Página de realização de contratação de grupos itinerantes</h1>
      <div id = "area_1" class = "card" style="width:30%; margin-top: 2%;">
        <div class="card-title"><h3>Editais e conversas</h3></div>
        <div class = "card-body">
          <a href = "editais/armazenamento_editais.php"><button class="btn btn-white">Públicar edital cultural!</button></a>
          <a href = "contratacao/contrato.php"><button class="btn btn-white">Realizar negociação direta com grupos itinerantes</button></a>
        </div>
      </div>
      



      <div id = "area_2" class = "card" style="width:30%; margin-top: 1%;">
        <div class="card-title"><h3>Processos andando</h3></div>
        <div class = "card-body">
          <a><?php print '<button class="btn btn-white" onclick = "lista_con('.$_SESSION["id_evento"].');">Andamento das conversas</button>'; ?></a>
          <a><button onclick = "lista_edital();" class="btn btn-white">Lista de editais públicados</button></a>
        </div>
      </div>
      
      <a id = "lisedi"></a>
    </center>
    
    <!--Lista de editais -->
    <br />
    <br />
       
    
  </body>
</html>
