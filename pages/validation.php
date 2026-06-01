<?php
    require_once("../src/db.php");

    session_start();

    if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["senha"])){

        $email = $_POST["email"];
        $senha = htmlspecialchars($_POST["senha"]);

        Verificar_db($pdo, $email, $senha);
        
    }else {
        header("location: login.php?aqui");
    }

    Function Verificar_db($pdo, $email, $senha){

        $query = "select id, nome, senha from usuario where email = '$email'";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($senha, $usuario["senha"])) {
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["email"] = $email;
            
            header("location: home.php");
            exit();
        }else{
            header("location: login.php?credenciais invalidas");
        }

    }
?>