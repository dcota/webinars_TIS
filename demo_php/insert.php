<?php

require_once('connectdb.php');

$pnome = $_POST['primnome'];
echo $pnome + "\n";
$unome = $_POST['ultnome'];
echo $unome;
$morada = $_POST['morada'];
echo $morada;
$datanasc = $_POST['datanasc'];
echo $datanasc;
$telemovel = (int) $_POST['telemovel'];
echo $telemovel;
$genero = $_POST['genero'];
echo $genero;

$stmt = $connection->prepare("INSERT INTO aluno (primnome,ultnome,morada,datanascimento,telemovel,genero) VALUES (?,?,?,?,?,?)");
$stmt->bind_param('ssssis', $pnome, $unome, $morada, $datanasc, $telemovel, $genero);

$stmt->execute();

if ($stmt) {
    echo "<script type='text/javascript'>
          alert('Aluno inserido com sucesso!');
          window.location.href='index.php';
          </script>";

    die();
} else {
    echo "<script type='text/javascript'>
          alert('Ocorreu um problema!');
          window.location.href='index.php';
          </script>";
    die();
}
