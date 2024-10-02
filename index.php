<?php 
session_start(); 

if(isset($_POST['logoutBtn'])) { 
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="index.php" method="POST">
            <div class="form-group">
                <h2>USERNAME:</h2>
                <input type="text" placeholder="Username here" name="userName">
            </div>
            <div class="form-group">
                <h2>PASSWORD:</h2>
                <input type="password" placeholder="Password here" name="passWord">
            </div>
            <p><input type="submit" value="Login" name="loginBtn"></p>
            <p><input type="submit" value="Logout" name="logoutBtn"></p>
        </form>
    </div>
    
    <?php 
    if (isset($_SESSION['userName'])) {
        echo "<h2>".$_SESSION['userName'] . " is already logged in. Wait for them to log out.</h2>";    
        exit();
    }

    if(isset($_POST['loginBtn'])) {
        $userName = $_POST['userName'];
        $passWord = md5($_POST['passWord']);
        $_SESSION['userName'] = $userName;
        $_SESSION['passWord'] = $passWord;
        echo "<h2>User logged in: " . $_SESSION['userName'] . "</h2>"; 
        echo "<h2>User password: " . $_SESSION['passWord'] . "</h2>";
    }
    ?>
</body>
</html>

