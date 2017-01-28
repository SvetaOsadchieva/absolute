<?php
   include("connect.inc.php");
session_start();

$userinfo = array(
                'admin'=>'adminpass',
                'admin'=>'1234'
                );

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
        
        header("location: adminPage.php");
    }else {
        echo"<script>
function myFunction() {
    alert('Hello! I am an alert box!');
}
</script>";
    }
}


    include("headerLogin.php")
?>

    <div class="container-fluid login">
        <form action="" method="post" class="col-md-offset-4 col-md-4">
           <h2>Login</h2>
            <div class="form-group">
                <input type="text" placeholder="USERNAME" name="username">
            </div>
            <div class="form-group">
                <input type="password" placeholder="PASSWORD" name="password">
            </div>
            <input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
            <br />
        </form>
    </div>
</body>
</html>