<?php 
$config = parse_ini_file(__DIR__."/config.ini", true);
$dsn = "mysql:host={$config['database']['hostname']};dbname={$config['database']['database']}";

// Create PDO Instance
$db_user = $config['database']['username'];
$db_pw = $config['database']['password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/logo.png"/>

  <title>TopTrivia</title>
</head>
<body style="background-color: #5CDB95; color: #05386B;">
  <!-- <nav class="navbar bg-body-tertiary"> -->
  <nav class="navbar">
    <div class="container">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="36px" height="36px">
      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>

      <h3 class="mt-1 ml-2">Top Trivia</h3>
    </div>
  </nav>