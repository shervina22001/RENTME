<?php

  $dsn = "mysql:host={$_ENV["HOST"]};dbname={$_ENV["DATABASE"]}";
  $options = array(
    PDO::MYSQL_ATTR_SSL_CA => "ca-certificates.pem",
  );

  // Create a PDO instance representing a connection to a database
  $pdo = new PDO($dsn, $_ENV["USERNAME"], $_ENV["PASSWORD"], $options);

  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>