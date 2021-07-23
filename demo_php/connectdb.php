<?php
function db_connect() {

     if(!isset($connection)) {
        console.log("Ligado");
        $config = parse_ini_file('../private/config.ini'); 
        $connection = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname'],$config['port']);
    }

    if($connection === false) {
           
        return mysqli_connect_error(); 
    }
    return $connection;
}

// Connect to the database
$connection = db_connect();

// Check connection
if ($connection->connect_error) {
    echo "<script type='text/javascript'>
          alert('Erro na ligação à base de dados...');
          window.location.href='index.php';
          </script>";
    die("Connection failed: " . $connection->connect_error);
}
