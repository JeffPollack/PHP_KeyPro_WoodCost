<?php
session_start();
include ('db_connect.php');

// session check
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}

// passing the user login information and checking success.
if (isset($_POST['signup'])) {
    $uname = $_POST['uname'];
    $upass = $_POST['pass'];
    
    $salt = "H+pW2Kc(f73s9";
    $securePass = hash("sha256",$salt . $upass);

    if ($pdo->query("INSERT INTO users(username,password) VALUES('$uname','$securePass')")) {
        ?>
        <script>alert('successfully registered ');</script>
        <?php
    } else {
        ?>
        <script>alert('error while registering you...');</script>
        <?php
    }
    //print_r($securePass);
    //header("Location: index.php");
    
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register/Login to Homework 10</title>
    <link rel="stylesheet" href="style.css" type="text/css" />

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
                    <td><button type="submit" name="signup">Sign Me Up</button></td>
                </tr>
                <tr>
                    <td><a href="index.php">Sign In Here</a></td>
                </tr>
            </table>
        </form>
    </div>
</center>
</body>
