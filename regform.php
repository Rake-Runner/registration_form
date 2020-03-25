<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body class="body">

<?php
$servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sonic";
// // Create connection
// $conn = mysqli_connect($servername, $username, $password);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
// #Создаём БД
//         $sql = "CREATE DATABASE sonic";
//         if (mysqli_query($conn, $sql)) {
//             echo "Database created successfully";
//         } else {
//             echo "Error creating database: " . mysqli_error($conn);
//         }
//         mysqli_close($conn);
//         #Создаём таблицы
//         // sql to create table
//         $conn = mysqli_connect($servername, $username, $password, $dbname);
// # Создаём таблицы
// $sql1 = "CREATE TABLE stranadb (
//     country VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci)";
    
// if (mysqli_query($conn, $sql1)) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }
// mysqli_close($conn);

// # Заполняем таблицу стран
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// $sql = "INSERT INTO stranadb (country)
// VALUES ('Discworld')";
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
// $sql2 = "INSERT INTO stranadb (country) VALUES ('Middle-earth')";
// mysqli_query($conn, $sql2);
// $sql2 = "INSERT INTO stranadb (country) VALUES ('Skyrim')";
// mysqli_query($conn, $sql2);
// $sql2 = "INSERT INTO stranadb (country) VALUES ('Vesteros')";
// mysqli_query($conn, $sql2);
// $sql2 = "INSERT INTO stranadb (country) VALUES ('Narnia')";
// mysqli_query($conn, $sql2);
// $sql2 = "INSERT INTO stranadb (country) VALUES ('Malazan')";
// mysqli_query($conn, $sql2);
// $sql2 = "INSERT INTO stranadb (country) VALUES ('Oz')";
// mysqli_query($conn, $sql2);
// mysqli_close($conn);





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regdata";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
# "Connected successfully";
$typeinerror = $_SESSION['typeinerror'] = 'Все поля должны быть заполнены';

if(!empty($_POST['newlog'])){   $rLogin = $_POST['newlog'];}else{$typeinerror;}
if(!empty($_POST['newpass'])){  $rPass = $_POST['newpass'];}else{$typeinerror;}
if(!empty($_POST['newmail'])){  $rEmail = $_POST['newmail'];}else{$typeinerror;}
if(!empty($_POST['rname'])){    $rName = $_POST['rname'];}else{$typeinerror;}
if(!empty($_POST['rdate'])){    $rBDay = $_POST['rdate'];}else{$typeinerror;}
if(!empty($_POST['ccountry'])){ $cCountry = $_POST['ccountry'];}else{$typeinerror;}
if(!empty($_POST['terms'])){    $rTerms = $_POST['terms'];}else{$typeinerror;}

$yes = '<span style="color: green; font-size: 20px;"> V </span>';
$no = '<span style="color: red; font-size: 10px;"> X </span>';

$sql2 = "SELECT * FROM testdb";
$query2 = mysqli_query($conn, $sql2);
while($res[] = mysqli_fetch_assoc($query2)){
        $ata = $res; 
    }
    echo "<br> Не забывайте свой логин и пароль";
    echo "<br><br>Login: $rLogin ";
    echo "<br>Email: $rEmail <br><br> ";

for($ri = 0; $ri <= 10; $ri++){
    if ($res[$ri]['login'] == $rLogin || $res[$ri]['email'] == $rEmail){
        header('Location: /demo/index.php', true, 301);
        exit;        
    }
}
$conn->close();

$conn = mysqli_connect($servername, $username, $password, $dbname);
#
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
#
$sql = "INSERT INTO testdb (id, login, email, password, name, bdate, country)
VALUES ('', '$rLogin', '$rEmail', '$rPass', '$rName', '$rBDay', '$cCountry')";

if ($conn->query($sql) === TRUE) {
    echo "Реристрация прошла успешно <br>";
    echo '<a href="/demo/index.php">Back</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<script src="js/main.js"></script>
</body>
</html> 

