<?php
require 'law.php';
$conn = connectDB();
$finance = $_POST['finance'];
$gender_ratio = $_POST['gender_ratio'];
$major = $_POST['major'];
$enviroment = $_POST['enviroment'];
$mark = $_POST['mark'];
array_push($GLOBALS['z'], $finance);
array_push($GLOBALS['z'], $gender_ratio);
array_push($GLOBALS['z'], $major);
array_push($GLOBALS['z'], $enviroment);    
array_push($GLOBALS['z'], $mark);    

analysis($finance, $gender_ratio, $major, $enviroment, $mark);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

