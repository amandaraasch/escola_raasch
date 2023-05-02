<?php
include ("conecta.php");

$matricula = $_POST["matricula"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];

//se clicou no botão inserir://
if (isset($_POST["inserir"]))

{
    $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula,'$nome',$idade)");
    $resultado = $comando->execute();
    //para voltar ao formulário//
    header("Location: cadastro.html");
}
if (isset($_POST["excluir"]))
{
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header("Location: cadastro.html");
}
if (isset($_POST["alterar"]))
{
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome',idade=$idade WHERE matricula=$matricula"); 
    $resultado = $comando->execute();
    header("Location: cadastro.html");
}
if (isset($_POST["listar"]))
{
    $comando = $pdo->prepare("SELECT * FROM alunos"); 
    $resultado = $comando->execute();

    while( $linhas = $comando->fetch()) 
        {
            $m = $linhas["matricula"]; //nome da coluna xampp
            $n = $linhas["nome"];
            $i = $linhas["idade"];

            echo("matricula: $m nome: $n idade: $i <br>");
        }
    
}






