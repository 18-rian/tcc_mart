<?php 
    session_start();

    $cnpj = $_POST["cnpj"];
    include("conexao.php");
    
    $SELECT = "SELECT 
                nome
            FROM 
                grupos_itinerantes
            WHERE 
                cnpj_itine = $cnpj;
            ";
            
    $query = mysqli_query($db, $SELECT);
    
    while($registros = mysqli_fetch_assoc($query))
    {
        $nome = $registros["nome"];
    }


    $_SESSION["cnpj_temp"] = $cnpj;
    $_SESSION["nome"] = $nome;

    mysqli_close($db);

    header("Location: negoc.php");
?>