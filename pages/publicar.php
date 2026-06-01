<?php
    require_once("../src/db.php");

    session_start();
    $user_id = $_SESSION["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!is_dir("../uploads")){
        mkdir("../uploads");
    }

    $legenda = $_POST["legenda"];

    $file = $_FILES["arquivo"]["tmp_name"];
    // caminho do arquivo
    $arquivo = $_FILES["arquivo"]["name"];
    $destino = "../uploads/" . $arquivo;

    if (move_uploaded_file($file, $destino)) {
        $query = "INSERT INTO memes(arquivo, legenda, id_usuario) VALUES('$destino', '$legenda', $user_id)";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        header("location: home.php");
    } else {
        echo "falha no upload";
    }
}
