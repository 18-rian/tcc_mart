<!DOCTYPE html>

<html lang = "pt-BR">
	<head>
		<title>Cadastrando</title>
		<meta charset = "UTF-8" />
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            form
             {
                display: inline-block;
                border: 1px solid black;
                
                padding: 2% 2% 2% 2%;
              }
            input
            {
                display: block;
            }
            
            h1
            {
                text-align: center;        
            }
        </style>
	</head>
	<body>

		<center><a href = "../inicial/pagina_inicial.php" style = "" class = "display-3">Bem vindo ao MART</a></center>
		<center>
		
		<form action = "../comum/processa.php" method = "POST" enctype="multipart/form-data">
            <h1>Seja um cliente MART</h1>
			<label>
				Nome:
			</label> 
            <input type = "text" name = "nome" value = "" required class = "btn-block"/>
			
			<label>
				Sobrenome:
			</label> <input type = "text" name = "sobrenome" value = "" required class = "btn-block"/>

			<br />
			
			<label>
				E-mail:
			</label> <input type = "text" name = "mail" value = "" required class = "btn-block"/>
			
			<label>
				Senha: 
			</label> <input type = "text" name = "senha" value = "" required class = "btn-block"/>
			
			<br />
			
			<label>
				Data de nascimento:
			</label> <input type = "date" name = "data" value = "" required class = "btn-block"/>
			
			<label>
				Cidade: 
			</label> <input type = "text" name = "city" value = "" required class = "btn-block"/>
			
			<br />
			
			<label>
				Deseja estar ciente sobre seleções de grupos artísticos ou a abertura de editais?
			</label> 
			<input type = "radio" name = "editais" value = "Sim" /> Sim
			<input type = "radio" name = "editais" value = "Nao" /> Não
			
			<br />
		
		    <label>
			    Foto de perfil:
		    </label>
		    
		    <input type="file" name="perfil" accept="image/*" class="form-control form-control-lg"/>
		    
		    <br />
		    
		    <label>
			    Foto de capa:
		    </label>
		    
		    <input type="file" name="capa" accept="image/*" class="form-control form-control-lg"/>
		    
			<br />
			
			<input type = "submit" name = "submeter" value = "Enviar" required class = "btn btn-success btn-block"/>
            <br /><br />
			<input type = "reset" name = "resetar" value = "Limpar" required class="btn btn-danger btn-block"/>
				
		</form>
		<br >
		</center>
	</body>

</html>
