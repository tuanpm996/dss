<?php
require 'law.php';
$conn = connectDB();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
        <section  class="main-content">
        <div class="container">
            <div class="row wow rotateIn">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="title">Website gợi ý chọn trường thi đại học</h1>
                    <h1 class="title-main-content">Mời các bạn chọn thông tin</h1>
                    <form class="form-horizontal" method="post" action="result.php">
                        <table class="table">
                            <tr>
                                <th>Tình trạng tài chính:</th>
                                <td>
                                    <?php
                                    $sql_finance = "SELECT id, ten FROM finance_1";
                                    $result = mysqli_query($conn, $sql_finance);
                                    if (mysqli_num_rows($result) > 0) {
                                        ?>
                                        <select name="finance">
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <option value= <?php echo $row["id"] ?>><?php echo $row["ten"] ?></option>
                                                    <?php
                                            }
                                        } else {
                                            echo "Không có record nào";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Tỉ lệ nam nữ mong muốn:</th>
                                <td>
                                    <?php
                                    $sql_gender = "SELECT id, ten FROM gender_3";
                                    $result = mysqli_query($conn, $sql_gender);
                                    if (mysqli_num_rows($result) > 0) {
                                        ?>
                                        <select name="gender_ratio">
                                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value= <?php echo $row["id"] ?>> <?php echo $row["ten"] ?></option>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Không có record nào";
                                                }
                                                ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Ngành học ưa thích:</th>
                                <td>
                                <?php
                                $sql_major = "SELECT id, nganh FROM major_7";
                                $result = mysqli_query($conn, $sql_major);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                        <select name="major">
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <option value= <?php echo $row["id"] ?>>
                                                    <?php echo $row
                                                    ["nganh"]
                                                    ?></option>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Không có record nào";
                                                }
                                            ?>
                                        </select>

                                </td>
                            </tr>

                            <tr>
                                <th>Môi trường ưa thích:</th>
                                <td>
                                <?php
                                $sql_interested_enviroment= "SELECT id, ten FROM work_environment_2";
                                $result = mysqli_query($conn, $sql_interested_enviroment);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                        <select
                                            name="enviroment">
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <option
                                                    value= <?php echo $row["id"]
                                            ?>><?php echo $row["ten"] ?> </option>

                                                    <?php
                                                }
                                            } else {
                                                echo "Không có record nào";
                                            }
                                            ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Điểm thi thử đại học:</th>
                                <td>
                                <?php
                                $sql_mark= "SELECT id, diem FROM mark_6";
                                $result = mysqli_query($conn, $sql_mark);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                        <select
                                            name="mark">
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <option
                                                    value= <?php echo $row["id"]
                                            ?>><?php echo $row["diem"] ?> </option>

                                                    <?php
                                                }
                                            } else {
                                                echo "Không có record nào";
                                            }
                                            ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="xac-nhan btn btn-primary btn-lg" type="submit" name="save-session" value="Xác nhận thông tin">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>


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
                <!-- Header -->
                    <header id="header">
                        <h1 style="text-shadow: 1 1 5px #000000;">Hệ thống tư vấn trường đại học</h1>
                        <div class="input-text col-sm-12">
                            <p>Mời chọn thông tin: </p>
                            <div class="form-group col-sm-3"></div>
                            <div class="form-group col-sm-6 list-option">
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-6">
                                        <span class="title-select">Ngành học ưa thích:</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control font-select">
                                            <option>Công nghệ thông tin</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-6">
                                        <span class="title-select">Môi trường ưa thích:</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control font-select">
                                            <option>Phong trào đoàn đội</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-6">
                                        <span class="title-select">Điểm thi thử đại học:</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control font-select">
                                            <option>18 -> 20</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-6">
                                        <span class="title-select">Tỉ lệ nam/nữ mong muốn:</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control font-select">
                                            <option>Nam trội</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-6">
                                        <span class="title-select">Tình trạng tài chính:</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control font-select">
                                            <option>< 5 triệu/tháng</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-lg">Gửi thông tin</button>
                            </div>
                            <div class="form-group col-sm-3"></div>
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
