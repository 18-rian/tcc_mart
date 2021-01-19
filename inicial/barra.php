<?php session_start(); ?>

<head>

    
    <script>
        $(document).ready(function(){
               $("#barra").on("input", function (){
                    var word = $("#barra").val();
                    $.ajax
                    ({
                        url: '../inicial/select.php',
                        method: 'POST',
                        data: {word: word},
                        success: function(retorno)
                        {
                            if(retorno == "foi")
                            {
                                
                                window.location.href = "../inicial/transicao_com.php";    
                                
                            }
                            else
                            {
                                $("#pes").html(retorno);    
                            }



                        }

                    });
                });
            });
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
<body>
    
	<div>
		
        <nav class="navbar navbar-expand-sm navbar-inverse" style="display: block; border-top: 1px solid black; border-bottom: 1px solid black; background-color: red; margin-bottom: 1%;">
            <div class="container-fluid">
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width:300px; height: 35px; display: inline-block; border-bottom: 8px solid black;">

                <datalist id = "pes">

                </datalist>
                </form>

                <a href="../inicial/pagina_inicial.php" class="navbar-center"> <img src="../logoti.png"  style = "width: 20%;"/></a>

                <ul class="nav navbar-nav navbar-right">

                    <div class="btn-group">
                        <button type="button" id = "click_login" class="btn" data-target="#modalPoll-1" data-toggle="modal" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                            Login
                        </button>
                        <div>
                                <?php include("../inicial/modal_form.php"); ?>
                        </div>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn dropdown-toggle"  data-toggle="dropdown" style="display: inline-block; border: 1px solid blue; background-color: white; width: 100%;">
                               Cadastra-se
                            </button>
                            <div class="dropdown-menu">
                              <a href = "../comum/cadastro.php" class="dropdown-item">Realizar cadastro comum</a>
                              <a class="dropdown-item" href="../empresa/form_empre.php">Realizar cadastro empresarial</a>
                            </div>
                        </div>
                    </div>
                </ul>

               
    				
    			
            </div>
		</nav>
            
    </div>
    <div class="container-fluid">
    </div>
</body>