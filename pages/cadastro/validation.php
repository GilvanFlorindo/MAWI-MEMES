<?php
     require_once("../../src/db.php");

    if(isset($_POST["email"]) && isset($_POST["nome"]) && isset($_POST["senha"])  && !empty($_POST["email"])  && !empty($_POST["nome"])  && !empty($_POST["senha"])){

        $nome = htmlspecialchars($_POST["nome"]);
        $email = htmlspecialchars($_POST["email"]);
        $senha = htmlspecialchars($_POST["senha"]);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: cadastro.php?Email inválido");
            exit();
        }

        if(strlen($senha) < 8) {
            header("location: cadastro.php?senha Tem que ter 8 ou mais caracteres");
            exit();
        }

        Cadastrar($pdo, $nome, $email, $senha);
        header("location: ../login.php");

    }else {
        header("location: cadastro.php?erro");
        exit();
    }

    function Cadastrar($pdo, $nome, $email, $senha) {

    $senhaHash = password_hash(
        $senha,
        PASSWORD_DEFAULT
    );
        $query = "INSERT INTO usuario (nome,email, senha) VALUES ('$nome', '$email', '$senhaHash')";

        // statement, prepare statement
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }
?>