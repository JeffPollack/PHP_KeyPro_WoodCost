<?php
/*
 * Homework  10 (included homework 3)
 * Jeff Pollack
 * Time logged on assignemt: hours 5
 * SQL CREATE syntax in users.sql file
 * to log in can use: username: jeff  password:pass
 * or create your own loging!
 */
session_start();
include_once 'db_connect.php';
// Reference for project:
// http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html

// checking session, if someone is logged in, direct to the home page.
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}

// Checking the login info...
if (isset($_POST['login'])) {
    
    $uname = $_POST['uname'];
    $upass = $_POST['pass'];
    
    $salt = "H+pW2Kc(f73s9";
    $securePass = hash("sha256",$salt . $upass);
    
    $sql_user = "SELECT * FROM users WHERE username='$uname'";
    $res = $pdo->query($sql_user);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    // If password matches the user name, direct to the home page, else alert and remain on login page.
    if ($row['password'] == $securePass) {
        $_SESSION['user'] = $row['username'];
        header("Location: home.php");
    } else {
        ?>
        <script>alert('Wrong Password and/or Username');</script>
        <?php
    }
}
// Display stuff
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login to Homework 10</title>
</head>
<body>
<center>
    <div id="login-form">
        <form method="post">
            <table align="center" width="30%" border="0">
                <tr>
                    <td><input type="text" name="uname" placeholder="User Name" required /></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="Your Password" required /></td>
                </tr>
                <tr>
                    <td><button type="submit" name="login">Sign In</button></td>
                </tr>
                <tr>
                    <td><a href="register.php">Sign Up Here</a></td>
                </tr>
            </table>
        </form>
    </div>
</center>
</body>
