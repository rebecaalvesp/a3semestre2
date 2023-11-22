<?php

session_start();
include('conexao.php');
include('funcoes.php'); 
$confirmarsenha= isset ($_POST['confirmarsenha']) ? $_POST['confirmarsenha'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if ($senha <> $confirmarsenha) {
    echo '<script>alert("Senha e confirmação diferentes");
			window.location="alterardados.php";
			</script>';
} else {
    $cpf = $_SESSION['cpf'];
    $senhacriptografada = criptografar($senha);
    $update = "UPDATE login SET senha = '$senhacriptografada' WHERE cpf = '$cpf'";
    $query = mysqli_query($conexao, $update);
    echo '<script>alert("Senha alterada com sucesso");
    window.location="alterardados.php";
    </script>';
}