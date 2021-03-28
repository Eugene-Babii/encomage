<?php
include_once('functions.php');
editUser($_POST['first_name'], $_POST['last_name'], $_POST['email']);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;


// (isset($ _ POST['delcountry']){
// foreach ($ _ POST as $k => $v) {
// if (substr($k,0,2)=="cb"){
// $idc=substr($k,2);
// $del='delete from countries where
// id='.$idc;
// mysql _ query($del);
// }
// }
// echo "<script>";
// echo "window.location=document.URL;";
// echo "</script>";