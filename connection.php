<?php
  $host = "aws.connect.psdb.cloud";
  $database = "vina-cloud";
  $username = "4hyadfj998qo322z8olj";
  $password = "pscale_pw_AqXf41ge1wyToejcUeqesdfbxEap7izxzlBaYIzsyQu";

  // $dsn = "mysql:host={$_ENV["HOST"]};dbname={$_ENV["DATABASE"]}";
  $dsn = "mysql:host={$host};dbname={$database}";
  $options = array(
    PDO::MYSQL_ATTR_SSL_CA => "ca-certificates.pem",
  );

  // Create a PDO instance representing a connection to a database
  // $pdo = new PDO($dsn, $_ENV["USERNAME"], $_ENV["PASSWORD"], $options);
  $pdo = new PDO($dsn, $username, $password, $options);

  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>