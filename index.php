<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Ponto</title>
</head>
<body>
    <h1>Upload ponto</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <br>
        <input type="submit" value="Enviar">
    </form>

<?php
/**
 * Campos do arquivo enviado
 */
// $arquivo = (isset($_FILES['arquivo'])) ? $_FILES['arquivo'] : false;
if (isset($_FILES['arquivo']['name']) && !empty($_FILES['arquivo']['name'])) {
    $nome_arquivo = $_FILES['arquivo']['name'];
} else {
    $nome_arquivo = '';
}
if (isset($_FILES['arquivo']['type']) && !empty($_FILES['arquivo']['type'])) {
    $tipo_arquivo = $_FILES['arquivo']['type'];
} else {
    $tipo_arquivo = '';
}
if (isset($_FILES['arquivo']['tmp_name']) && !empty($_FILES['arquivo']['tmp_name'])) {
    $arquivo = $_FILES['arquivo']['tmp_name'];
} else {
    $arquivo = '';
}
if (isset($_FILES['arquivo']['error']) && !empty($_FILES['arquivo']['error'])) {
    $erro_arquivo = $_FILES['arquivo']['error'];
} else {
    $erro_arquivo = '';
}
if (isset($_FILES['arquivo']['size']) && !empty($_FILES['arquivo']['size'])) {
    $tamanho_arquivo = $_FILES['arquivo']['size'];
} else {
    $tamanho_arquivo = '';
}

/**
 * move e renomeia arquivo
 */
$dir = '';
$nome_novo_arquivo = date("YmdHis").'_'.$nome_arquivo;
move_uploaded_file($arquivo, $dir.$nome_novo_arquivo);

if ($arquivo!='') {
    // Lê todo o arquivo para um array
    $file = file($nome_novo_arquivo);

    // Lê todo o conteúdo de um arquivo para uma string
    $conteudo = file_get_contents($nome_novo_arquivo);
} else {
    $file = '';
    $conteudo = '';
}

echo '<br><br>';
echo 'Nome do arquivo: '.$nome_arquivo.'<br>';
echo 'Tipo: '.$tipo_arquivo.'<br>';
echo 'Arquivo: '.$arquivo.'<br>';
echo 'Código de erro:'.$erro_arquivo.'<br>';
echo 'Tamanho: '.$tamanho_arquivo.' bytes<br><br>'; 
echo 'Conteúdo array: ';
print_r($file);
echo '<br><br>';
echo 'Conteúdo string: ';
echo $conteudo;
?>
</body>
</html>