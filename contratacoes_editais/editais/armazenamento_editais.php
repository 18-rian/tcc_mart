<!DOCTYPE html>

<html lang="pt-BR">
  <head>
    <title>Armazenando editais</title>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function()
      {
        $("#create").click(function()
        {
          $.ajax
          ({
              url: 'create_form.php',
              method: 'POST',
              data: {},
              success: function(back)
              {
                  $('#create_new_edital').html(back);
              }
          });
        });
        $("#list").click(function()
        {
          $.ajax
          ({
              url: 'list_form.php',
              method: 'POST',
              data: {},
              success: function(voltar)
              {
                  $('#list_all_editais').html(voltar);
              }
          });
        });
      });

    </script>
  </head>

  <body>
      
      <?php include("barra.php"); ?>
    <center>
      <h2>Públicação de editais</h2>
      <div style = "display: inline-block; border: 1px solid black; padding-right: 10%;" class = "jumbotron">
          <button id = "create" class="btn btn-dark" >Criar novo edital</button>
          <section id = "create_new_edital">
              <p style = "margin-bottom: 15%; margin-top: 15%;">Caso você deseja publicar<br /> algum edital de eventos<br /> culturais nas redes, <br />para atrair a possibilidade<br /> grupos artistícos, é só clicar.</p>
          </section>
            <br />
          <button id = "list" class="btn btn-dark" style = "margin-top: 10%; margin-bottom: 15%;">Visualizar editais da empresa</button>
          <section id = "list_all_editais" style = " margin-top: 5%;">
              <p style = "margin-bottom: 35%;">Visualizar os editais públicados <br />pela empresa</p>
          </section>
      </div>
      <br />
      </center>
  </body>

</html>
