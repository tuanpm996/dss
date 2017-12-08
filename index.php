<?php
require 'law.php';
$conn = connectDB();
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
                            <form class="form-horizontal" method="post" action="result.php">
                                <div class="form-group col-sm-3"></div>
                                <div class="form-group col-sm-6 list-option">
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <span class="title-select">Ngành học ưa thích:</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php
                                                $sql_major = "SELECT id, nganh FROM major_7";
                                                $result = mysqli_query($conn, $sql_major);
                                                if (mysqli_num_rows($result) > 0) {
                                                    ?>
                                                        <select name="major" class="form-control font-select">
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
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <span class="title-select">Môi trường ưa thích:</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php
                                            $sql_interested_enviroment= "SELECT id, ten FROM work_environment_2";
                                            $result = mysqli_query($conn, $sql_interested_enviroment);
                                            if (mysqli_num_rows($result) > 0) {
                                                ?>
                                                    <select name="enviroment" class="form-control font-select">
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
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <span class="title-select">Điểm thi thử đại học:</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php
                                        $sql_mark= "SELECT id, diem FROM mark_6";
                                        $result = mysqli_query($conn, $sql_mark);
                                        if (mysqli_num_rows($result) > 0) {
                                            ?>
                                                <select name="mark" class="form-control font-select">
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
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <span class="title-select">Tỉ lệ nam/nữ mong muốn:</span>
                                        </div>
                                        <div class="col-sm-6">
                                             <?php
                                                $sql_gender = "SELECT id, ten FROM gender_3";
                                                $result = mysqli_query($conn, $sql_gender);
                                                if (mysqli_num_rows($result) > 0) {
                                                    ?>
                                                    <select name="gender_ratio" class="form-control font-select">
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
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <span class="title-select">Tình trạng tài chính:</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php
                                            $sql_finance = "SELECT id, ten FROM finance_1";
                                            $result = mysqli_query($conn, $sql_finance);
                                            if (mysqli_num_rows($result) > 0) {
                                                ?>
                                                <select name="finance" class="form-control font-select">
                                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <option value= <?php echo $row["id"] ?>><?php echo $row["ten"] ?></option>
                                                            <?php
                                                    }
                                                } else {
                                                    echo "Không có record nào";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="xac-nhan btn btn-primary btn-lg" type="submit" name="save-session" value="Xác nhận thông tin">
                                </div>
                            </form>
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
