<?php

  // Variables de la base de datos
  $servername = "localhost:3306";
  $username = "root";
  $password = "MySqL1234.";
  $dbname = "dataenergy";

  // Creacion de la conexion
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Comprobar la conexion
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // ---- gasto TOTAL EN EL MES ACTUAL ----
  $gasto = array();
  for ($i = 1; $i <= 31; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE DAY(fecha) = '$i'";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto, $row["suma"]);
      }
    } else {
      array_push($gasto, 0);
    }
  }
  
  // ---- gasto TOTAL EN EL MES ACTUAL POR SALAS ----

  // ---- OFICINAS -----
  $gasto_salas_oficinas = array();
  for ($i = 1; $i <= 31; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE DAY(fecha) = '$i' AND sala_id in ( SELECT id FROM Salas WHERE tipo = 'Oficinas'";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto_salas_oficinas, $row["suma"]);
      }
    } else {
      array_push($gasto_salas_oficinas, 0);
    }
  }

    // ---- COMUNES -----
    $gasto_salas_comunes = array();
    for ($i = 1; $i <= 31; $i++) {
      $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE DAY(fecha) = '$i' AND sala_id in ( SELECT id FROM Salas WHERE tipo = 'Comunes'";
      $result = $conn->query($sql);  
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($gasto_salas_comunes, $row["suma"]);
        }
      } else {
        array_push($gasto_salas_comunes, 0);
      }
    }

      // ---- WORKSPACE -----
  $gasto_salas_workspace = array();
  for ($i = 1; $i <= 31; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE DAY(fecha) = '$i' AND sala_id in ( SELECT id FROM Salas WHERE tipo = 'Workspace'";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto_salas_workspace, $row["suma"]);
      }
    } else {
      array_push($gasto_salas_workspace, 0);
    }
  }

    // ---- REUNION -----
    $gasto_salas_reunion = array();
    for ($i = 1; $i <= 31; $i++) {
      $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE DAY(fecha) = '$i' AND sala_id in ( SELECT id FROM Salas WHERE tipo = 'Reunion'";
      $result = $conn->query($sql);  
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($gasto_salas_reunion, $row["suma"]);
        }
      } else {
        array_push($gasto_salas_reunion, 0);
      }
    }

  

  // ---- gasto MENSUAL EN CADA SALA ----
  $mes_actual = date("m");

  // ---- SALA 1 -----
  $gasto_sala_1 = array();  
  for ($i = 1; $i <= 12; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 0";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto_sala_1, $row["suma"]);
      }
    } else {
      array_push($gasto_sala_1, 0);
    }
  }

    // ---- SALA 2 -----
    $gasto_sala_2 = array();  
    for ($i = 1; $i <= 12; $i++) {
      $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 1";
      $result = $conn->query($sql);  
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($gasto_sala_2, $row["suma"]);
        }
      } else {
        array_push($gasto_sala_2, 0);
      }
    }

      // ---- SALA 3 -----
  $gasto_sala_3 = array();  
  for ($i = 1; $i <= 12; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 2";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto_sala_3, $row["suma"]);
      }
    } else {
      array_push($gasto_sala_3, 0);
    }
  }

    // ---- SALA 4 -----
    $gasto_sala_4 = array();  
    for ($i = 1; $i <= 12; $i++) {
      $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 3";
      $result = $conn->query($sql);  
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($gasto_sala_4, $row["suma"]);
        }
      } else {
        array_push($gasto_sala_4, 0);
      }
    }

      // ---- SALA 5 -----
  $gasto_sala_5 = array();  
  for ($i = 1; $i <= 12; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 4";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto_sala_5, $row["suma"]);
      }
    } else {
      array_push($gasto_sala_5, 0);
    }
  }

    // ---- SALA 6 -----
    $gasto_sala_6 = array();  
    for ($i = 1; $i <= 12; $i++) {
      $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 5";
      $result = $conn->query($sql);  
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($gasto_sala_6, $row["suma"]);
        }
      } else {
        array_push($gasto_sala_6, 0);
      }
    }

      // ---- SALA 7 -----
  $gasto_sala_7 = array();  
  for ($i = 1; $i <= 12; $i++) {
    $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 6";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($gasto_sala_7, $row["suma"]);
      }
    } else {
      array_push($gasto_sala_7, 0);
    }
  }

    // ---- SALA 8 -----
    $gasto_sala_8 = array();  
    for ($i = 1; $i <= 12; $i++) {
      $sql = "SELECT SUM(gasto) suma FROM Dispositivos WHERE MONTH(fecha) = '$i' AND YEAR(fecha) = 2023 AND sala_id = 7";
      $result = $conn->query($sql);  
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($gasto_sala_8, $row["suma"]);
        }
      } else {
        array_push($gasto_sala_8, 0);
      }
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
<title>Energy Dashboard</title>
<meta name="description" content="Our first page">
<meta name="keywords" content="html tutorial template">

<!-- css style -->
<link href="../css/gasto_style.css" rel="stylesheet" />

<!-- js scripts -->
<script src="../js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="../js/canvasjs.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <svg style="display:none;">
        <symbol id="logo" viewBox="0 0 140 59">
          <g>
            <path d="M6.8 57c0 .4-.1.7-.2.9-.1.2-.3.4-.4.5-.1.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2 0-.4-.2-.5-.4-.1-.2-.2-.5-.2-.9V44.7h-2c-.3 0-.6-.101-.8-.2-.2-.1-.3-.2-.5-.4s-.2-.3-.2-.4v-.4c0-.1 0-.2.1-.399 0-.2.1-.301.2-.4.1-.1.3-.3.5-.4.1 0 .4-.1.7-.1h2.1v-3.5c0-1 .1-1.9.3-2.7C4.1 35 4.5 34.3 5 33.7c.5-.6 1.1-1.1 1.9-1.4.8-.3 1.7-.5 2.7-.5.9 0 1.5.101 1.8.4.3.3.5.6.5 1.1 0 .3-.1.601-.3.9-.2.3-.6.4-1.2.4h-.6c-.6 0-1.1.101-1.5.301-.4.199-.7.5-.9.8C7.2 36 7 36.5 7 37c-.1.5-.1 1-.1 1.6V42h2.7c.3 0 .6.1.8.2.2.1.3.2.5.399.1.101.2.301.2.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.399-.2.101-.5.2-.8.2H6.8V57z" />
            <path d="M30.4 50.2c0 1.3-.2 2.5-.7 3.5-.5 1.1-1.1 2-1.9 2.8-.8.8-1.8 1.4-2.8 1.8-1.1.4-2.3.601-3.5.601-1.3 0-2.4-.2-3.5-.601-1.1-.399-2-1-2.8-1.8-.8-.8-1.4-1.7-1.9-2.8-.5-1.101-.7-2.2-.7-3.5s.2-2.4.7-3.5c.5-1.101 1.1-2 1.9-2.7.8-.8 1.7-1.4 2.8-1.8 1.1-.4 2.3-.601 3.5-.601 1.3 0 2.4.2 3.5.601 1.1.399 2 1 2.8 1.8.8.8 1.4 1.7 1.9 2.7.5 1.1.7 2.3.7 3.5zm-3.4 0c0-.8-.1-1.5-.4-2.3-.2-.7-.6-1.4-1.1-1.9s-1-1-1.7-1.3c-.7-.3-1.5-.5-2.4-.5s-1.7.2-2.4.5-1.3.8-1.7 1.3c-.5.5-.8 1.2-1.1 1.9-.2.699-.4 1.5-.4 2.3s.1 1.5.4 2.3c.2.7.6 1.4 1.1 1.9.5.6 1 1 1.7 1.3s1.5.5 2.4.5 1.7-.2 2.4-.5 1.3-.8 1.7-1.3c.5-.601.8-1.2 1.1-1.9.3-.7.4-1.5.4-2.3z" />
            <path d="M38.1 44.8h.1c.4-.899 1-1.7 1.9-2.3s1.8-.9 2.9-.9c.5 0 1 .101 1.3.301.4.199.6.6.6 1.1 0 .6-.2 1-.6 1.2-.4.2-.8.3-1.4.3h-.2c-1.3 0-2.4.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.4.5-.2.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.1-.2-.3-.301-.4-.5C35 57.7 35 57.4 35 57V43.5c0-.4.1-.7.2-.9.1-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .4.101.2 0 .3.1.5.199.2.101.3.301.4.5.1.2.2.5.2.9v1.3z" />
            <path d="M49.2 51.3c0 .7.2 1.4.5 2 .3.601.7 1.2 1.2 1.601.5.5 1.1.8 1.7 1.1s1.3.4 2 .4c1 0 1.8-.2 2.5-.5.7-.4 1.2-.801 1.8-1.2.2-.2.4-.3.6-.4.2-.301.3-.301.5-.301.4 0 .7.1 1 .4.3.199.4.6.4 1 0 .1 0 .3-.1.5s-.2.4-.4.7c-1.6 1.7-3.7 2.5-6.3 2.5-1.3 0-2.4-.199-3.5-.6s-2-1-2.8-1.8c-.8-.8-1.4-1.7-1.8-2.7-.4-1.1-.7-2.3-.7-3.6 0-1.301.2-2.5.6-3.5.4-1.101 1-2 1.8-2.801.8-.8 1.7-1.399 2.7-1.8 1-.399 2.2-.6 3.4-.6 2.1 0 3.8.6 5.2 1.8s2.3 2.9 2.6 5.2c0 .3.1.5.1.6v.5c0 1.101-.6 1.7-1.7 1.7H49.2V51.3zm9.9-2.5c0-.7-.1-1.3-.3-1.8-.2-.6-.5-1.1-.9-1.5s-.9-.7-1.4-1c-.6-.2-1.2-.4-2-.4-.7 0-1.4.101-2 .4-.6.2-1.2.6-1.6 1-.5.4-.8.9-1.1 1.5-.3.6-.5 1.2-.5 1.8h9.8z" />
            <path d="M77.9 55.1c.399-.3.8-.5 1.199-.5.4 0 .7.101 1 .4.2.3.4.6.4.9 0 .199 0 .5-.1.699a1.856 1.856 0 01-.599.701c-.7.5-1.399.9-2.3 1.2s-1.8.4-2.7.4c-1.3 0-2.5-.2-3.5-.601-1.1-.399-2-1-2.8-1.8s-1.4-1.7-1.8-2.7c-.4-1.1-.7-2.3-.7-3.6s.2-2.5.7-3.601c.4-1.1 1.1-2 1.8-2.8.8-.8 1.7-1.399 2.8-1.8 1.101-.4 2.2-.6 3.5-.6.9 0 1.7.1 2.601.399C78.2 42 79 42.4 79.6 43l.7.7c.101.2.2.5.2.7 0 .399-.1.8-.4 1-.3.3-.6.399-1 .399-.199 0-.399 0-.5-.1-.2-.099-.4-.199-.7-.499-.301-.3-.7-.5-1.2-.7s-1-.3-1.7-.3c-.9 0-1.6.2-2.3.5s-1.2.8-1.7 1.3-.8 1.2-1.1 1.9c-.2.699-.4 1.5-.4 2.3s.1 1.5.3 2.2c.2.699.6 1.3 1 1.899.5.5 1 1 1.7 1.3.7.301 1.4.5 2.3.5.7 0 1.3-.1 1.8-.3.4-.099.9-.299 1.3-.699z" />
            <path d="M94.6 56.2h-.1c-.6.899-1.4 1.6-2.3 2.1-.9.5-2 .7-3.3.7-.7 0-1.301-.1-2-.3-.7-.2-1.4-.5-1.9-.9-.6-.399-1.1-.899-1.4-1.6-.4-.7-.6-1.5-.6-2.4 0-1.3.3-2.2 1-3 .7-.7 1.6-1.3 2.7-1.7 1.1-.399 2.3-.6 3.7-.699 1.399-.101 2.8-.2 4.199-.2v-.5c0-1.2-.399-2.101-1.1-2.7s-1.7-.9-3-.9c-.7 0-1.4.101-2 .301-.6.199-1.3.5-1.9 1-.3.199-.699.3-1 .3-.3 0-.6-.101-.899-.4-.2-.2-.4-.6-.4-.899 0-.2.101-.5.2-.7s.3-.4.6-.601c.7-.5 1.601-1 2.5-1.3 1-.3 2-.5 3.2-.5s2.2.2 3.101.5c.899.3 1.6.8 2.199 1.4.601.6 1 1.3 1.301 2.1.3.8.399 1.601.399 2.5V56.9c0 .3-.1.6-.2.899-.1.201-.2.401-.4.501-.2.101-.3.2-.5.2s-.3.1-.4.1c-.1 0-.3 0-.399-.1-.2 0-.301-.1-.5-.2-.201-.1-.301-.3-.401-.5s-.2-.5-.2-.899v-.7h-.2zm-.9-5.5c-.8 0-1.7 0-2.5.1-.9.101-1.7.2-2.4.4s-1.3.5-1.8.9-.7 1-.7 1.7c0 .5.101.9.3 1.2.2.3.5.6.801.8.3.2.699.4 1.1.4.4.1.8.1 1.2.1 1.5 0 2.7-.5 3.5-1.399.8-.9 1.2-2.101 1.2-3.5v-.9h-.7v.199z" />
            <path d="M111.4 45.4c-.5-.5-1-.801-1.5-1-.5-.2-1.101-.301-1.601-.301-.399 0-.7 0-1.1.101-.4.1-.7.2-1 .399-.3.2-.5.4-.7.7s-.3.601-.3 1c0 .7.3 1.2.899 1.601.601.3 1.601.6 2.801.899.8.2 1.5.4 2.199.7.7.3 1.301.6 1.801 1s.899.8 1.199 1.4c.301.5.4 1.199.4 1.899 0 1-.2 1.8-.6 2.5-.4.7-.9 1.2-1.5 1.7-.601.4-1.301.7-2.101.9-.8.199-1.6.3-2.399.3-1 0-2-.2-2.9-.5-1-.3-1.8-.8-2.5-1.4-.3-.3-.5-.5-.6-.7-.098-.198-.098-.398-.098-.598 0-.4.101-.8.4-1 .3-.3.6-.4 1-.4.399 0 .8.2 1.2.5.5.5 1.1.801 1.699 1.101.601.3 1.2.399 1.9.399.4 0 .8 0 1.2-.1.399-.1.7-.2 1-.4.3-.199.6-.399.8-.699.2-.301.3-.7.3-1.2 0-.8-.399-1.3-1.1-1.7s-1.8-.7-3.2-1c-.6-.1-1.1-.3-1.7-.5-.6-.2-1.1-.5-1.6-.8s-.8-.8-1.101-1.3c-.3-.5-.399-1.2-.399-2 0-.9.2-1.601.5-2.301.401-.6.801-1.2 1.401-1.6.601-.4 1.2-.7 2-.9.7-.199 1.5-.3 2.301-.3.899 0 1.699.101 2.6.4.8.3 1.6.7 2.2 1.2.3.3.5.5.6.699.101.2.101.4.101.601 0 .399-.101.7-.4 1s-.6.399-1 .399c-.402-.199-.802-.399-1.102-.699z" />
            <path d="M126 58.4c-.6.3-1.3.399-2.1.399-1.601 0-2.801-.399-3.601-1.3s-1.2-2.2-1.2-3.9v-9H117.2c-.3 0-.601 0-.8-.1-.2-.1-.4-.2-.5-.3-.101-.101-.2-.3-.2-.4 0-.2-.101-.3-.101-.399 0-.101 0-.2.101-.4 0-.2.1-.3.2-.4.1-.1.3-.3.5-.399.199-.101.5-.2.8-.2h1.899v-3.2c0-.399.101-.7.2-.899.101-.2.3-.4.4-.601.2-.1.399-.2.5-.3.2 0 .3-.1.5-.1.1 0 .3 0 .5.1.2 0 .3.1.5.3.2.101.3.3.399.601.101.199.2.6.2.899V42h3.2c.3 0 .6.1.8.2.2.1.3.2.5.399.102.101.202.301.202.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.3-.2.1-.5.1-.8.1h-3.2V53.2c0 1 .2 1.7.5 2.1.4.4.8.601 1.4.601.2 0 .5 0 .7-.101.199-.1.399-.1.6-.1.4 0 .7.1.9.399.199.301.3.601.3.9s-.101.5-.2.7c0 .401-.2.601-.5.701z" />
            <path d="M133.2 44.8h.1c.4-.899 1-1.7 1.9-2.3.899-.6 1.8-.9 2.899-.9.5 0 1 .101 1.301.301.4.199.6.599.6 1.099 0 .6-.2 1-.6 1.2-.4.2-.801.3-1.4.3h-.2c-1.3 0-2.399.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.399.5-.101.1-.4.199-.5.3-.2 0-.3.1-.5.1-.101 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2-.101-.3-.301-.4-.5-.1-.2-.2-.5-.2-.9V43.5c0-.4.101-.7.2-.9.101-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .399.101.2 0 .301.1.5.199.2.101.301.301.4.5.1.2.2.5.2.9v1.3z" />
          </g>
          <g>
            <g>
              <path fill="#08A6DF" d="M70 32.9c-9.1 0-16.5-7.4-16.5-16.5 0-4.8 2.1-9.3 5.7-12.4.5-.4 1.2-.4 1.6.1.4.5.4 1.2-.1 1.6-3.1 2.7-4.9 6.6-4.9 10.7 0 7.8 6.4 14.2 14.2 14.2s14.2-6.4 14.2-14.2c0-7.8-6.4-14.1-14.2-14.1-1.9 0-3.7.4-5.4 1.1-.6.2-1.3 0-1.5-.6-.2-.6 0-1.3.6-1.5C65.7.4 67.8 0 70 0c9.1 0 16.5 7.4 16.5 16.5S79.1 32.9 70 32.9z" />
            </g>
            <g>
              <path fill="#7C2A8A" d="M70 28.4c-6.6 0-11.9-5.4-11.9-11.9 0-6.6 5.4-11.9 11.9-11.9 5 0 9.5 3.2 11.2 7.9.5 1.3.7 2.6.7 4 0 .6-.5 1.1-1.101 1.1-.6 0-1.1-.5-1.1-1.1 0-1.1-.2-2.2-.601-3.3-1.399-3.8-5-6.4-9.1-6.4-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6c.6 0 1.1.5 1.1 1.1.002.8-.498 1.3-1.098 1.3z" />
            </g>
            <g>
              <path fill="#EC1848" d="M70 23.9c-4.1 0-7.4-3.3-7.4-7.4s3.3-7.4 7.4-7.4c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-2.8 0-5.1 2.3-5.1 5.1s2.3 5.1 5.1 5.1 5.1-2.3 5.1-5.1c0-.6.5-1.1 1.101-1.1.6 0 1.1.5 1.1 1.1.099 4.2-3.201 7.5-7.301 7.5z" />
            </g>
          </g>
        </symbol>
        <symbol id="users" viewBox="0 0 16 16">
          <path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
        </symbol>
        <symbol id="charts" viewBox="0 0 16 16">
          <polygon points="0.64 7.38 -0.02 6.63 2.55 4.38 4.57 5.93 9.25 0.78 12.97 4.37 15.37 2.31 16.02 3.07 12.94 5.72 9.29 2.21 4.69 7.29 2.59 5.67 0.64 7.38" />
          <rect y="9" width="2" height="7" />
          <rect x="12" y="8" width="2" height="8" />
          <rect x="8" y="6" width="2" height="10" />
          <rect x="4" y="11" width="2" height="5" />
        </symbol>
        <symbol id="pages" viewBox="0 0 16 16">
          <rect x="4" width="12" height="12" transform="translate(20 12) rotate(-180)" />
          <polygon points="2 14 2 2 0 2 0 14 0 16 2 16 14 16 14 14 2 14" />
        </symbol>
        <symbol id="trends" viewBox="0 0 16 16">
          <polygon points="0.64 11.85 -0.02 11.1 2.55 8.85 4.57 10.4 9.25 5.25 12.97 8.84 15.37 6.79 16.02 7.54 12.94 10.2 9.29 6.68 4.69 11.76 2.59 10.14 0.64 11.85" />
        </symbol>
        <symbol id="options" viewBox="0 0 16 16">
          <path d="M8,11a3,3,0,1,1,3-3A3,3,0,0,1,8,11ZM8,6a2,2,0,1,0,2,2A2,2,0,0,0,8,6Z" />
          <path d="M8.5,16h-1A1.5,1.5,0,0,1,6,14.5v-.85a5.91,5.91,0,0,1-.58-.24l-.6.6A1.54,1.54,0,0,1,2.7,14L2,13.3a1.5,1.5,0,0,1,0-2.12l.6-.6A5.91,5.91,0,0,1,2.35,10H1.5A1.5,1.5,0,0,1,0,8.5v-1A1.5,1.5,0,0,1,1.5,6h.85a5.91,5.91,0,0,1,.24-.58L2,4.82A1.5,1.5,0,0,1,2,2.7L2.7,2A1.54,1.54,0,0,1,4.82,2l.6.6A5.91,5.91,0,0,1,6,2.35V1.5A1.5,1.5,0,0,1,7.5,0h1A1.5,1.5,0,0,1,10,1.5v.85a5.91,5.91,0,0,1,.58.24l.6-.6A1.54,1.54,0,0,1,13.3,2L14,2.7a1.5,1.5,0,0,1,0,2.12l-.6.6a5.91,5.91,0,0,1,.24.58h.85A1.5,1.5,0,0,1,16,7.5v1A1.5,1.5,0,0,1,14.5,10h-.85a5.91,5.91,0,0,1-.24.58l.6.6a1.5,1.5,0,0,1,0,2.12L13.3,14a1.54,1.54,0,0,1-2.12,0l-.6-.6a5.91,5.91,0,0,1-.58.24v.85A1.5,1.5,0,0,1,8.5,16ZM5.23,12.18l.33.18a4.94,4.94,0,0,0,1.07.44l.36.1V14.5a.5.5,0,0,0,.5.5h1a.5.5,0,0,0,.5-.5V12.91l.36-.1a4.94,4.94,0,0,0,1.07-.44l.33-.18,1.12,1.12a.51.51,0,0,0,.71,0l.71-.71a.5.5,0,0,0,0-.71l-1.12-1.12.18-.33a4.94,4.94,0,0,0,.44-1.07l.1-.36H14.5a.5.5,0,0,0,.5-.5v-1a.5.5,0,0,0-.5-.5H12.91l-.1-.36a4.94,4.94,0,0,0-.44-1.07l-.18-.33L13.3,4.11a.5.5,0,0,0,0-.71L12.6,2.7a.51.51,0,0,0-.71,0L10.77,3.82l-.33-.18a4.94,4.94,0,0,0-1.07-.44L9,3.09V1.5A.5.5,0,0,0,8.5,1h-1a.5.5,0,0,0-.5.5V3.09l-.36.1a4.94,4.94,0,0,0-1.07.44l-.33.18L4.11,2.7a.51.51,0,0,0-.71,0L2.7,3.4a.5.5,0,0,0,0,.71L3.82,5.23l-.18.33a4.94,4.94,0,0,0-.44,1.07L3.09,7H1.5a.5.5,0,0,0-.5.5v1a.5.5,0,0,0,.5.5H3.09l.1.36a4.94,4.94,0,0,0,.44,1.07l.18.33L2.7,11.89a.5.5,0,0,0,0,.71l.71.71a.51.51,0,0,0,.71,0Z" />
        </symbol>
      </svg>
      <header class="page-header">
        <nav>
          <center><img src="../img/logo.png" width="100" height="100"></center>
          <ul class="admin-menu">
            <li class="menu-heading">
              <h3>Menu</h3>
            </li>
            <li>
              <a href="../index.php">
                <svg>
                  <use xlink:href="#pages"></use>
                </svg>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="gasto.php">
                <svg>
                  <use xlink:href="#charts"></use>
                </svg>
                <span>gasto</span>
              </a>
            </li>
            <li>
              <a href="gastos.php">
                <svg>
                  <use xlink:href="#trends"></use>
                </svg>
                <span>Gastos</span>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <section class="page-content">
      <h1>Gastos</h1>
      <br>
        <section class="grid2">  
        <article><canvas id="line-chart" width="620" height="300"></canvas>

</article> 
        <script type="text/javascript">
          const gasto_total = <?php echo json_encode($gasto) ?>;
          new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
              labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "1", "12","13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24","25", "26", "27", "28", "29", "30"],
              datasets: [{ 
                  data: gasto_total,
                  borderColor: "#3e95cd",
                  fill: false
                }
              ]
            },
            options: {
              legend: { display: false },
              plugins: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: 'GASTO ENERGÉTICO TOTAL EN MAYO 2023 (€)',
                  padding: {
                  top: 10,
                  bottom: 30
                  }
                }
              }
            }
          });

          </script>
        <article><canvas id="myChart4"></canvas>
</article> 
        <script type="text/javascript">
          const gasto_ofi = <?php echo json_encode($gasto_salas_oficinas) ?>;
          const gasto_com = <?php echo json_encode($gasto_salas_comunes) ?>;
          const gasto_work = <?php echo json_encode($gasto_salas_workspace) ?>;
          const gasto_reun = <?php echo json_encode($gasto_salas_reunion) ?>;
            var ctx = document.getElementById("myChart4");
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "1", "12","13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24","25", "26", "27", "28", "29", "30"],
                datasets: [{
                  label: 'Oficinas',
                  backgroundColor: "#caf270",
                  data: gasto_ofi,
                }, {
                  label: 'Comunes',
                  backgroundColor: "#45c490",
                  data: gasto_com,
                }, {
                  label: 'Workspace',
                  backgroundColor: "#008d93",
                  data: gasto_work,
                }, {
                  label: 'Reunion',
                  backgroundColor: "#2e5468",
                  data: gasto_reun,
                }],
              },
            options: {
              plugins: {
                title: {
                  display: true,
                  text: 'GASTO TOTAL POR SALAS (€)'
                },
              },
              responsive: true,
              scales: {
                x: {
                  stacked: true,
                },
                y: {
                  stacked: true
                }
              }
            }
            });
          </script>
        </section>
        <br>
        <br>
      <h3>gasto por salas</h3>
      <br>
      <div class="buttons">
        <button data-id="sala1" class="button">Sala 1</button>
        <button data-id="sala2" class="button">Sala 2</button>
        <button data-id="sala3" class="button">Sala 3</button>
        <button data-id="sala4" class="button">Sala 4</button>
        <button data-id="sala5" class="button">Sala 5</button>
        <button data-id="sala6" class="button">Sala 6</button>
        <button data-id="sala7" class="button">Sala 7</button>
        <button data-id="sala8" class="button">Sala 8</button>
      </div>
      <br>
        <section class="grid">  
          <div class="panel" id="sala1"><canvas id="mixed-chart"></canvas></div>
          <script type="text/javascript">
            const gasto_s1 = <?php echo json_encode($gasto_sala_1) ?>;   
            new Chart(document.getElementById("mixed-chart"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s1,
                      fill: false
                    }, {
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s1,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 1 (€)',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala2"><canvas id="mixed-chart2"></canvas></div>
<script type="text/javascript">
  const gasto_s2 = <?php echo json_encode($gasto_sala_2) ?>; 
            new Chart(document.getElementById("mixed-chart2"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s2,
                      fill: false
                    }, {
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s2,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 2',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala3"><canvas id="mixed-chart3"></canvas></div>
<script type="text/javascript">
  const gasto_s3 = <?php echo json_encode($gasto_sala_3) ?>; 
            new Chart(document.getElementById("mixed-chart3"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      label: "Europe",
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s3,
                      fill: false
                    }, {
                      label: "Europe",
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s3,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 3',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala4"><canvas id="mixed-chart4"></canvas>></div>
<script type="text/javascript">
  const gasto_s4 = <?php echo json_encode($gasto_sala_4) ?>; 
            new Chart(document.getElementById("mixed-chart4"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      label: "Europe",
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s4,
                      fill: false
                    }, {
                      label: "Europe",
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s4,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 4',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala5"><canvas id="mixed-chart5"></canvas></div>
<script type="text/javascript">
  const gasto_s5 = <?php echo json_encode($gasto_sala_5) ?>; 
            new Chart(document.getElementById("mixed-chart5"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      label: "Europe",
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s5,
                      fill: false
                    }, {
                      label: "Europe",
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s5,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 5',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala6"><canvas id="mixed-chart6"></canvas></div>
<script type="text/javascript">
  const gasto_s6 = <?php echo json_encode($gasto_sala_6) ?>; 
            new Chart(document.getElementById("mixed-chart6"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      label: "Europe",
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s6,
                      fill: false
                    }, {
                      label: "Europe",
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s6,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 6',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala7"><canvas id="mixed-chart7"></canvas></div>
<script type="text/javascript">
  const gasto_s7 = <?php echo json_encode($gasto_sala_7) ?>; 
            new Chart(document.getElementById("mixed-chart7"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      label: "Europe",
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s7,
                      fill: false
                    }, {
                      label: "Europe",
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s7,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 7',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<div class="panel" id="sala8"><canvas id="mixed-chart8"></canvas></div>
<script type="text/javascript">
  const gasto_s8 = <?php echo json_encode($gasto_sala_8) ?>; 
            new Chart(document.getElementById("mixed-chart8"), {
                type: 'bar',
                data: {
                  labels:  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  datasets: [{
                      label: "Europe",
                      type: "line",
                      borderColor: "#8e5ea2",
                      data: gasto_s8,
                      fill: false
                    }, {
                      label: "Europe",
                      type: "bar",
                      backgroundColor: "rgba(0,0,0,0.2)",
                      data: gasto_s8,
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  plugins: {
                    legend: {
                      display: false
                    },
                    title: {
                      display: true,
                      text: 'GASTO ENERGÉTICO SALA 8',
                      padding: {
                      top: 10,
                      bottom: 30
                      }
                    }
                  }
                }
            });
          </script>
<script type="text/javascript">
        // Cache out buttons container, and all of the panels
        const buttons = document.querySelector('.buttons');
        const panels = document.querySelectorAll('.panel');

        // Add an event listener to the buttons container
        buttons.addEventListener('click', handleClick);

        // When a child element of `buttons` is clicked
        function handleClick(e) {
        
          // Check to see if its a button
          if (e.target.matches('button')) {

            // For every element in the `panels` node list use `classList`
            // to remove the show class
            panels.forEach(panel => panel.classList.remove('show'));

            // "Destructure" the `id` from the button's data set
            const { id } = e.target.dataset;

            // Create a selector that will match the corresponding
            // panel with that id. We're using a template string to
            // help form the selector. Basically it says find me an element
            // with a "panel" class which also has an id that matches the id of
            // the button's data attribute which we just retrieved.
            const selector = `.panel[id="${id}"]`;

            // Select the `div` and, using classList, again add the
            // show class
            document.querySelector(selector).classList.add('show');
          }
        };
      </script>
      <div class="panel2"><div class="flexWrapper"><canvas id="doughnut-chart" width="350" height="350"></canvas></div></div>
      <script type="text/javascript">
            const gasto_s1 = <?php echo json_encode($gasto_sala_1) ?>; 
            const gasto_s2 = <?php echo json_encode($gasto_sala_2) ?>; 
            const gasto_s3 = <?php echo json_encode($gasto_sala_3) ?>; 
            const gasto_s4 = <?php echo json_encode($gasto_sala_4) ?>; 
            const gasto_s5 = <?php echo json_encode($gasto_sala_5) ?>; 
            const gasto_s6 = <?php echo json_encode($gasto_sala_6) ?>; 
            const gasto_s7 = <?php echo json_encode($gasto_sala_7) ?>; 
            const gasto_s8 = <?php echo json_encode($gasto_sala_8) ?>; 
            const sum1 = gasto_s1.reduce(function(a, b){
                  return a + b;
                });
            const sum2 = gasto_s2.reduce(function(a, b){
              return a + b;
            });
            const sum3 = gasto_s3.reduce(function(a, b){
              return a + b;
            });
            const sum4 = gasto_s4.reduce(function(a, b){
              return a + b;
            });
            const sum5 = gasto_s5.reduce(function(a, b){
              return a + b;
            });
            const sum6 = gasto_s6.reduce(function(a, b){
              return a + b;
            });
            const sum7 = gasto_s7.reduce(function(a, b){
              return a + b;
            });
            const sum8 = gasto_s8.reduce(function(a, b){
              return a + b;
            });
            new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
              labels: ["Sala 1", "Sala 2", "Sala 3","Sala 4", "Sala 5", "Sala 6","Sala 7", "Sala 8"],
              datasets: [
                {
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                  data: [sum1,sum2,sum3,sum4,sum5,sum6,sum7,sum8]
                }
              ]
              },
              options: {
                plugins: {
                  title: {
                    display: true,
                    text: 'GASTO TOTAL POR SALAS'
                  }
                }
              }
            });
          </script>
        </section>
        <footer class="page-footer">
        </footer>
      </section>      
    
</body>

</html>
