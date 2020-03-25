<?php
session_start();
$sess = $_SESSION;
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

if($sess['auth'] == 1){ 
    echo 'Авторизация, контент:'.'<br>'.'<br>'.'Auth: ';
    var_dump($sess['auth']);
    echo '<br> Content: ';
    var_dump($sess['content']);
    echo '<br>';
    echo 'Login:' . $sess['content']['login'].'<br>';
    echo 'Password:' . $sess['content']['password'].'<br>';
    echo 'Name:' . $sess['content']['name'].'<br>';
    echo 'Email:' . $sess['content']['email'].'<br>';
    echo 'Bday:' . $sess['content']['bdate'].'<br>';
    echo 'Country:' . $sess['content']['country'].'<br>';
    ?> <a href="/demo/obr.php?exit=1">LogOut</a> <?php
}else{
?>
    <section id="signinform">
        <form action="obr.php" method="post" class="the_form">
            <span>Login OR email:</span>
            <input type="text" name="log">
            <br>
            <span>Password: </span>
            <input type="password" name="pass">
            <br>
            <input type="email" name="mail" id="email">
            <input type="submit" value="Sign In" class="submit">
            <a href="#" class="regbutton" id="regB">Registration</a>
        </form>
    </section>
<?php  }?>
    <br>
    <section id="regform">
        <h1>REGISTRATION</h1>
        <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "regdata";
                    #
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    #
                    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
                    echo "Connected successfully";

                    $sql3 = "SELECT * FROM stranadb";
                    $query3 = mysqli_query($conn, $sql3);
                    while($res2[] = mysqli_fetch_assoc($query3)){
                            $ata = $res2; 
                        }
                    ?>
        <form action="regform.php" method="post" class="the_form">
            <span>Login: </span>
            <input type="text" name="newlog"><?php
            ?>
            <br>
            <span>Password: </span>
            <input type="password" name="newpass"><br>
            <span>email: </span>
            <input type="email" name="newmail"><br>
            <span>Name: </span>
            <input type="text" name="rname"><br>
            <span>Birth date: </span>
            <input type="date" name="rdate"><br>
            <span>Country: </span>
            <input list="newcountry" name="ccountry"><br>
                <datalist id="newcountry">
                <?php for($c = 0; $c <= 10; $c++){
                        echo '<option>' . $res2[$c]['country'] . '</option>';
                        }
                ?>  
                </datalist> 
            <input type="checkbox" name="terms" value="1"><span>Agree with terms and conditions</span> <br>
            <input type="submit" value="Registration" class="submit">
            <a href="#" id="back">Back</a>
        </form>    
    </section>

<script src="js/main.js"></script>
</body>
</html>






