<?php
$GLOBALS['z'] = array();
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "university";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die("Connection Failed:" . $conn->connect_error());
    }
    return $conn;
}

function CF1law($law) {
    if (gettype($law) != "array") {
        return 0;
    } else {
        //Tinh giá trị CF của nhánh if
        $cfIf = 1;
        $numberDK = 4;
        $cf = $law[6];
        for ($i = 0; $i <= $numberDK; $i++) {
            if ($law[$i] == NULL) {
                continue;
            } else {
                if (array_key_exists($law[$i], $GLOBALS['z'])) {
                    $cfIf = 0;
                    break;
                }
            }
        }
        return $cfIf * $cf; //Trả về CF của 1 trường DH đối với 1 luật
    }
}

function sumLaw($arrayCF) {
    if (gettype($arrayCF) != "array") {
        return 0;
    } else {
        $sum = 0;
        foreach ($arrayCF as $cf) {
            $sum = $sum + $cf - $sum * $cf;
        }
        return $sum; //Trả về giá trị CF theo công thức của tất cả luật có trong mảng luật nhập vào
    }
}


function CFlaws($ruleLaws) {
    $arrayCF = array();
    if (gettype($ruleLaws) != "array") {
        return 0;
    } else {
        foreach ($ruleLaws as $rule) {
            $temp = CF1law($rule);
            array_push($arrayCF, $temp);
        }
        return sumLaw($arrayCF); // Trả về giá trị CF của 1 trường DH đối với cả tập luật
    }
}

function analysis($finance, $gender_ratio, $major, $enviroment, $mark){
    $law = array();
    $conn = connectDB();
    $sql = "SELECT *
    FROM rule
    WHERE tai_chinh = $finance OR moi_truong = $enviroment OR gioi_tinh =$gender_ratio OR nganh = $major OR diem = $mark
    GROUP BY id
    ORDER BY truong ASC";
    
    $previousLaw = 1;

    $result = $conn->query($sql);
    if ($result->num_rows <= 0) {
        echo "No data";
        return 0;
    }
    
    $existMajor = array(); // kiểm tra mỗi trường được xét 1 lần
    $ruleLaws = array(); // chứa tất cả luật 1 trường
    $majors = array();
    $CFmajor = array(); //chứa từng ngành riêng biệt
    $top3 = array(); // chứa top 3 ngành
    while($row = $result->fetch_assoc()){
        ini_set('memory_limit', '-1');
        $law = array($row["tai_chinh"], $row["moi_truong"], $row["gioi_tinh"], $row["nganh"], $row['diem'],$row["truong"], $row["do_tin_cay"]);
        if (sizeof($existMajor) > 0) {
            if (in_array($row["truong"], $existMajor)) {
                array_push($ruleLaws, $law);
            } else {
                $majors[$previousLaw] = $ruleLaws;
                array_push($existMajor, $law[5]);
                $ruleLaws = array();
                array_push($ruleLaws, $law);
            }
        } else {
            array_push($existMajor, $row["truong"]);
            array_push($ruleLaws, $law);
        }
        $previousLaw = $law[5];
    }
    
    $majors[$law["5"]] = $ruleLaws;
//    print_r(sizeof($majors));
    //Trong mảng $marjors bây giờ mỗi phần tử là 1 mảng (1 mảng này là 1 mảng mà mỗi phần tử của mảng con này là 1 luật)
    foreach ($majors as $key => $value) {
        $CFmajor[$key] = CFlaws($value);
    }
    asort($CFmajor);
    $keys = array_keys($CFmajor);
    for($i = sizeof($keys)-1;$i>sizeof($keys)-4;$i--){
        $top3[$keys[$i]] = $CFmajor[$keys[$i]]  ;
    }
    foreach ($top3 as $key => $value) {
       $sql = "SELECT *
               FROM university_9
               WHERE ID = $key";
       $conn = connectDB();
       $conn->set_charset("utf8");
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
           echo '<div class="col-md-4 col-sm-4 col-xs-12 result">
                    <h3>'.$row["ten"].'</h3>
                    <p>'.$row["gioi_thieu"].'</p>
                    <span>Trang web của trường: </span><a target="blank" href="'.$row["website"].'">'.$row["website"].'</a>
                </div>';
         }
    }
    

}