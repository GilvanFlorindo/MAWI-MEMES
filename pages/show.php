<?php
    require_once("../src/db.php");

Function Verificar_db($pdo, $arquivo, $legenda, $id_usario){

    $query = "SELECT memes.*, usuario.nome FROM memes JOIN usuario ON memes.id_usuario = usuario.id ORDER BY memes.id DESC;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
</body>
</html>

