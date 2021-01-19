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
  </head>

  <body>
      <?php
        session_start();

        include("conexao.php");

        $SQL = 'INSERT INTO editais
                            (nome_edital, data_de_publicacao, publico_alvo, arquivo, empresa_cnpj, descricao_edital)
                        VALUES ("'.$_POST["name_edital"].'", "'.$_POST["data_edital"].'", "'.$_POST["alvo"].'", "'.$_POST["arquivo"].'",'.$_SESSION["cnpj"].', "'.$_POST["descricao"].'")';

        $query = mysqli_query($conexao, $SQL);



        print "<h1>Edital publicado</h1>";
        print '<br /><a href = "armazenamento_editais.php">Voltar</a>';


      ?>

     
  </body>

</html>

