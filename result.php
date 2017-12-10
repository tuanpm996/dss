<?php
  require 'law.php';
  $conn = connectDB();
  $finance = $_POST['finance'];
  $gender_ratio = $_POST['gender_ratio'];
  $major = $_POST['major'];
  $enviroment = $_POST['enviroment'];
  $mark = $_POST['mark'];
  array_push($GLOBALS['z'], $finance);
  array_push($GLOBALS['z'], $enviroment);
  array_push($GLOBALS['z'], $gender_ratio);
  array_push($GLOBALS['z'], $major);
  array_push($GLOBALS['z'], $mark);
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Aerial by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script>
      $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 5
        });
    </script>

  </head>
  <body class="loading">
    <div id="wrapper">
      <div id="bg"></div>
      <div id="overlay"></div>
      <div id="main">
      <a href="index.php"><button type="button" style="margin-top: -750px;" class="btn btn-primary btn-lg">Quay lại</button></a>
        <!-- Header -->
          <header id="header">
            <h1 class="header-text">Kết quả</h1>
            <div class="col-sm-12" style="display: table;">
              <?php
                analysis($finance, $gender_ratio, $major, $enviroment, $mark);
              ?>
            </div>
          </header>

        <!-- Footer -->
          <footer id="footer">
            <span class="copyright">&copy; Sản phẩm của <b style="font-weight: bolder;">nhóm 1</b>.</span>
          </footer>

      </div>
    </div>
    <script>
      window.onload = function() { document.body.className = ''; }
      window.ontouchmove = function() { return false; }
      window.onorientationchange = function() { document.body.scrollTop = 0; }
    </script>
  </body>
</html>
