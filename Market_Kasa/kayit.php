<?php
require 'baglan.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaydol</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/kayit.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="login">
        <div id="ilk-sutun">
            <img src="style/image/A-100000.png" id="logo">
        </div>
        <div class="login-screen">
            <div id="form-container">
            <p>Kayıt Yap</p>
            <form autocomplete="off" action="islem.php" method="POST">
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" autocomplete="off" name="username" class="login-field" placeholder="Kullanıcı Adı" id="login-name">
                        <label class="login-field-icon" for="login-name"></label>
                    </div>
                    <div class="control-group">
                        <input type="password" name="password" class="login-field" placeholder="Şifre" id="login-pass">
                        <label class="login-field-icon" for="login-pass"></label>
                    </div>
                    <button href="kayit.php" name="kayit" id="kaydol-btn" class="btn"></button>
                </div>
            </form>
            <a href="giris.php"><button href="main.php" id="giris-btn" class="btn"></button></a>
            </div>
        </div>
    </div>
</body>

</html>