<?php
    session_start();
    $_SESSION['content'] = 'Login:'.'Password:'.'email:'.'Name:'.'BDate:'.'Country:';
    error_reporting(E_ALL & ~E_NOTICE);
    if(!empty($_GET['exit'])){
        unset($_SESSION['auth']);
        header('Location: /demo/index.php', true, 301);
        exit;
    }else{
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
#
$siLogin = $_POST['log'];

$siPassword = $_POST['pass'];
#
$rLogin = $_POST['newlog'];
$rPass = $_POST['newpass'];
$rEmail = $_POST['newmail'];
$rName = $_POST['rname'];
$rBDay = $_POST['rdate'];
$rCountry = $_POST['rcountry'];
$rTerms = $_POST['terms'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regdata";
#
$conn = mysqli_connect($servername, $username, $password, $dbname);
#
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
    }
echo "Connected successfully";
#
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM testdb";
$query = mysqli_query($conn, $sql);
while($res[] = mysqli_fetch_assoc($query)){
        $ata = $res; 
    }
echo '<br>'.'<br>';
$yes = '<span style="color: green; font-size: 20px;"> V </span>';
$no = '<span style="color: red; font-size: 10px;"> X </span>';
echo "Login: $siLogin, Password: $siPassword <br><br> ";

    foreach ($res as $i =>$array) {
        ${"array{$i}"} = $array; 
        echo "<br>";
    }
    for($ii = 0; $ii <= 100; $ii++){
        if(  ($res[$ii]['login'] == $siLogin || $res[$ii]['email'] == $siLogin)  && $res[$ii]['password'] == $siPassword){
            echo '<br>';
            $_SESSION['auth'] = 1;
            $_SESSION['content'] = $res[$ii];        
            
        }else{
            $_SESSION['errorSi'] = 'Неверный логин или пароль';
        }
    }

    if($_SESSION['auth'] == 1){
        echo 'BINGO!';
        header('Location: /demo/index.php', true, 301);
        exit;
    }else{
        unset($_SESSION['auth']);
        echo '<br>'.$_SESSION['errorSi'];
        header('Location: /demo/index.php', true, 301);
        exit;
    }
    echo 'Auth:';
    var_dump($_SESSION['auth']);
    echo '<br>Content: ';
    var_dump($_SESSION['content']);

mysqli_close($conn);
}
?>
    
</body>
</html>