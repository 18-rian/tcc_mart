<?php
/**
 * Quando você recebe um arquivo de um formulário, você recebe ele pela variável $_FILES.
 * É importante que no cabeçalho do form você defina o content-type como "várias partes de dados":
 * <form action="" method="post" enctype="multipart/form-data">
 * Isso garante que o envio do seu formulário pode enviar dados em formato texto (inputs, selects, textareas, etc)
 * e arquivos. 
 * quando este arquivo é recebido, ele fica em uma pasta temporária do servidor até que este script receptor
 *  termine de executar.
 * É importante que o script copie permanentemente este arquivo em uma pasta do seu diretório do site.
 *
*/

//Aqui defino qual a pasta que o arquivo será armazenado permanentemente
$diretorio_armazenamento = "img/";
/**
 * Aqui eu defino o caminho + nome do arquivo final que vou armazenar. Normalmente define-se um nome com
 * uma sequencia de ANO+MES+DIA+HORA+MINUTO+SEGUNDO+NOME_ARQUIVO.EXTENSAO 
 * Desta forma garanto que arquivos com o mesmo nome sejam sobrescritos. Por exemplo: foto.png de duas pessoas
 * diferentes ficariam: 20201008121121foto.png e20201008121125foto.png
 * Caso queira uma garantia maior ainda de que duas pessoas diferentes insiram um arquivo com o mesmo nome
 * no mesmo instante e a 2a sobrescreva o arquvio da 1a, acrescente no inicio algo como o id do usuario que 
 * está salvando a foto
**/
$nome = basename($_FILES['nome_arquivo_no_form']['name']);
$arquivo_a_armazenar = $diretorio_armazenamento . date("Ymdhis"). $nome;


//se move_upload_file (mover temporário para diretório definitivo arquivo_a_armazenar) for possível
//ou seja, não tenha havido nenhum problema de escrita no servidor de arquivos...
if (move_uploaded_file($_FILES['nome_arquivo_no_form']['tmp_name'], $arquivo_a_armazenar)) {
    //escreva...
    echo "Arquivo válido e enviado com sucesso.\n";
    echo $arquivo_a_armazenar;
    /** ou realize qualquer outra coisa que voce queira fazer com arquivo tenha recebido, tal como 
     *  Salvar o nome do arquivo em um Banco de dados para recupera-lo futuramente.
     * Exemplo: voce tem a tabela usuario (id_usuario,nome,email,foto). Neste ponto do código voce pode fazer
     * um insert ou upload da tabela usuario, colocando na coluna "foto" o valor da variavel $arquivo_a_armazenar.
     * Desta forma, quando voce precisar mostrar a foto, basta voce selecionar os dados da tabela usuario e montar
     * uma tag de imagem <img src='$linha["foto"]'/>, por exemplo.
    **/
    echo "<img src='$arquivo_a_armazenar' />";
} else {
    echo "Não foi possível receber o arquivo.";
    //ou qualquer outra mensagem de erro de upload.
}


?>