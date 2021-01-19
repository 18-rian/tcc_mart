<?php

    session_start();

    echo '<center><div class = "jumbotron display-2">Organize seu evento!</div></center>';
    echo '<center><form action = "../empresa/eventos/processa_eventos.php" method = "POST" class="form" enctype="multipart/form-data" style = "display: inline-block; border-radius: 5%; border: 3px solid red; padding: 5%; margin-top: 2%; margin-bottom: 3%;">
            <div class = "form-group">
                <label>
                    Nome do evento:
                </label>
                <input type = "text" name = "nome" value = "" required  class="form-control form-control-sm"/>
            </div>
            <br />

            <div class = "form-group">
                <label for="comment">
                    Descrição do evento:
                </label>
                <textarea id =  "descri" name = "descricao" class="form-control" rows="5">

                </textarea>
            </div>

            <br />
            <div class = "form-group">
                <label>
                    Cidade:
                </label>
                <input type = "text" name = "cidade" value = "" required class="form-control form-control-sm"/>
            </div>
            <br />

            <div class = "form-group">
                <label>
                    Local físico do evento:
                </label>
                <input type = "text" name = "endereco" value = "" required class="form-control form-control-sm"/>
            </div>
            <br />

            <div class = "form-group">
                <label>
                    Horário do evento:
                </label>
                <input type="datetime-local" name="data_hora" value="" class="form-control"/>

                <label>
                    CNPJ:
                </label>
                <input type = "text" name = "cnpj" value = "'.$_SESSION["cnpj"].'" class = "form-control form-control-sm" />
            </div>
            <br />

            <div class = "form-group">
                <label>
                    URL(endereço do evento online):
                </label>
                <input type = "url" name = "url" value = "" class = "form-control form-control-sm"/>
            </div>
            <br />

            <div class = "form-group">
                <label>
    			    Foto de perfil do evento:
                </label>
                
                <input type="file" name="perfil" accept="image/*" class="form-control form-control-lg"/>
            </div>
            <br />
            
            <div class = "form-group">
                <label>
                    Foto de capa do evento:
                </label>
                
                <input type="file" name="capa" accept="image/*" class="form-control form-control-lg"/>
            </div> 
            <br />

            <input type = "submit" name = "submeter" value = "ENVIAR" class="form-control"/>
            <input type = "reset" name = "resetar" value = "LIMPAR" class="form-control"/>

        </form></center>';

?>
