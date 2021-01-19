<?php 
	
	/*//Conectar com o software de banco de dados
	//MySQL
	
	$conexao = mysqli_connect("localhost", "root", "");

	if(!$conexao)
	{
		print "<h1>Erro</h1>";

		print mysqli_connect_error($conexao). "<br>";
		exit();
	}
	
	
	//selecionando a base de dados
	$db = mysqli_select_db($conexao, "mart_banco_new");
	
	if(!$db)
	{
		print "a";
		print "Erro";
		print mysqli_error($db)."<br>";
		exit();
	}*/

	
?>

<?php

	//local no qual o banco de dados est� instalado
	$local = "uranus.ignitionserver.net:3306";
	$usuario = "bsts_mart";
	$senha_bd = "beatlesstrawberry";
	$bd = "bsts_mart";

	$db = mysqli_connect($local,$usuario,$senha_bd,$bd) 
					or die("ERRO");
	mysqli_set_charset($db,"utf8");

?>
