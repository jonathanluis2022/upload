
<?php
     
    if(isset($_FILES['arquivos'])) {
        $arquivo = $_FILES['arquivos'];

        $pasta = 'arquivo/'; //criar uma pasta que o arquivo vai dentro 
        $nomeDoArquivo = $arquivo['name']; //nome do arquivo
        $novoNomeDoArquivo = uniqid(); //gerar um novo nome aleatorio que nao vai repitir
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION)); 
        // tudo em minusculo
        // caminho do nome arquivo e sua extensao
        //condiçao 
        if($extensao != 'png' && $extensao != 'jpg')
            die('arquivo nao é compativel , precisa ser (png ou jpg)');
        
        $erro = $arquivo['error']; //erro ao enviar 
            if($erro)
            die('Falha ao enviar o arquivo');
        
        $size = $arquivo['size']; //tamanho do arquivo
            if($size > 2097152 ) 
            die ('arquivo muito grande Max:2MB');

        $nomeTmp = $arquivo["tmp_name"];

        $deu_certo = move_uploaded_file($nomeTmp, $pasta . $novoNomeDoArquivo . "." . $extensao);
        // deu certo salvar o tmp name dentro da pasta e nos concatena o nvnome e extensao  
          
        if($deu_certo)
             echo "Arquivo enviado com sucesso! Para acessa-lo , <a target='_blank' href='$pasta/$novoNomeDoArquivo.$extensao'> Clique aqui </a>";
         // si deu certo clicar no link ... que ira te jogar na pasta q la dentro da pasta tem o novonome e a extensao (_blank = para abrir em uma nova aba)
        else 
             echo "Falha ao enviar arquivo";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>

    <form enctype='multipart/form-data' action="" method="POST">
        <p><label for=""> Selecione um Aquivo</label>
        <input  name="arquivos" type="file"></p>
        <button name="upload" type='submit'> Enviar</button>
    </form>
    
</body>
</html>