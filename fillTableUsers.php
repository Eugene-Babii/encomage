<!-- script for insert mockup row into table users -->

<?php
$dbHost = 'localhost';
$dbName = 'test_encomage_db';
$dbUser = 'root';
$dbPass = 'root';
$dbTable = 'users';

$conn = mysqli_connect($dbHost, $dbUser, $dbPass) or die('Error db connection' . mysqli_error($conn));
echo "Connected successfully\n";
mysqli_select_db($conn, $dbName) or die('DB open error');
mysqli_query($conn, 'set names "utf8"');

$query = "INSERT INTO $dbTable(first_name, last_name, email) values ( 'John', 'Doe', 'johndoe@gmail.com');";
mysqli_query($conn, $query);

$err = mysqli_errno($conn);
if ($err) {
    echo 'Fill table error:' . $err . '<br/>';
}
echo "Record added successfully\n";

mysqli_close($conn);
