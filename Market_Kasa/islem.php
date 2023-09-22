<?php
ob_start();
session_start();
require 'baglan.php';

try{
    if (isset($_POST['kayit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if (!$username) {
            echo "Kullanıcı adı giriniz!";
        } elseif (!$password) {
            echo "Lütfen şifre giriniz!";
        } else {
            $sorgu = $db->prepare('INSERT INTO calisan SET KullaniciAd=? ,Sifre=?');
            $ekle = $sorgu->execute([$username, $password]);
            if ($ekle) {
                echo "Kayıt başarılı, Yönlendiriliyorsunuz";
                header('Refresh:1;giris.php');
            } else {
                throw new Exception("Kullanıcı mevcut");
            }
        }
    }
}catch(Exception $e){
    echo $e -> getMessage();
}

if(isset($_POST['giris'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $_SESSION["Kullanici"] = $_POST['username'];
    if(!$username){
        echo "Kullanıcı adı giriniz!";
    }
    elseif(!$password){
        echo "Şifre giriniz!";
    }
    else{
        $kullanici_sor=$db->prepare('SELECT * FROM calisan WHERE KullaniciAd=? && Sifre=? ');
        $kullanici_sor -> execute([$username,$password]);

        
        $say=$kullanici_sor->rowCount();
        if($say>=1){
            $_SESSION['username']=$username;
            echo "başarıyla giriş yaptınız, Yönlendiriliyorsunuz.";
            header('Refresh:1;kasa.php');
        }
        else{
            echo "Kullanıcı adı veya Şifre hatalı";
            header('Refresh:1;giris.php');
        }
    }
}
?>