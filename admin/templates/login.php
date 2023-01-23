<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/node_modules/bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/app.css">
    <title>Document</title>
</head>
<body>
    <div class="login-form-block"><br>
        <h1> Login </h1>
        
        <?php # pour cryptage ou asharge mot de pass
        #echo password_hash('root123@', PASSWORD_BCRYPT); ?>
        
        <?php if(isset($alert)){echo alertMessage($alert);} ?>

        <form method="POST" action=""><br><br>
            <input type="text" name="username" placeholder="@blog.com" class="form form-control" required="" ><br><br>
            <input type="password" name="password" placeholder="password" class="form form-control"  required="" ><br><br>
            <input type="submit" name="submit" value="login" class="btn btn-primary btn-block"    ><br>
            <a href="#">register</a>
        </form>
    </div>
</body>
</html>