<?php
  $env = parse_ini_file('.env');


  $host = $env['SISDAT_HOST'];
  $username = $env['SISDAT_USERNAME'];
  $password = $env['SISDAT_PASSWORD'];
  $database = $env['SISDAT_DATABASE'];

  $dsn = "mysql:host={$host};dbname={$database}";
  $options = array(
    PDO::MYSQL_ATTR_SSL_CA => 'ca-certificates.pem'
  );

  // Create a PDO instance representing a connection to a database
  $pdo = new PDO($dsn, $username, $password, $options);

  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>