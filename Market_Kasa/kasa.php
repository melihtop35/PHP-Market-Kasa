<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "market";
$conn = new mysqli($servername, $username, $password, $db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/kasa.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="ilk-sutun">
        <div id="Kasiyer">
        Kasiyer: 
        <?php 
        session_start();
        echo $_SESSION["Kullanici"];
        ?>
        </div>
        <a href="giris.php" id="cikis"></a>
    </div>
    <div id="form-container">
    <form id="form1" autocomplete="off" action="urunKayıt.php" method="post">
        <label class="login-field-icon">Ürün Adı</label> <br>
        <input autocomplete="off" type="text" name="UrunAd" class="login-field" placeholder=""> <br>
        <label class="login-field-icon">Ürün Miktarı</label> <br>
        <input autocomplete="off" type="text" name="UrunMiktar" class="login-field" placeholder=""> <br>
        <label class="login-field-icon">Ürün Fiyatı</label> <br>
        <input autocomplete="off" type="text" name="UrunFiyat" class="login-field" placeholder=""> <br>
        <input type="submit" name="button" id="ekle" class="btn" value="">
    </form>
    
    </div>
    <div id="son-sutun">
    <?php
    function tr_strtoupper($text)
    {
        $search=array("ç","i","ı","ğ","ö","ş","ü");
        $replace=array("Ç","İ","I","Ğ","Ö","Ş","Ü");
        $text=str_replace($search,$replace,$text);
        $text=strtoupper($text);
        return $text;
    }


    $bul = "SELECT * FROM urunler";
    $kayit = $conn->query($bul);

    echo "<table>";
        echo "<tr id='Tr-Baslik'>";
        echo"<td>"."Ürün"."</td>";
        echo"<td>"."Miktar"."</td>";
        echo"<td>"."Fiyat"."</td>";
        echo"</tr>";


    if ($kayit->num_rows > 0) {
        
        while ($satir = $kayit->fetch_assoc()) {
            echo "<tr>";
            echo"<td>".tr_strtoupper($satir["UrunAd"])."</td>";
            echo"<td>".$satir["UrunMiktar"]."</td>";
            echo"<td>".$satir["UrunFiyat"]." ₺"."</td>";
            echo"</tr>";
        }
        echo "</table>";
    }
    ?>
    <div id="toplam">
    <?php
    $topla = "SELECT  SUM(UrunFiyat*UrunMiktar) from urunler";
    $result = $conn->query($topla);
    while ($row = mysqli_fetch_array($result)) {
        
        echo" Toplam Fiyat : " . $row['SUM(UrunFiyat*UrunMiktar)']." ₺";
        
    }
    ?>
    </div>
    <form id="form2" action="sil.php" method="post">
        <input type="submit" class="btn" id="bitir" name="delete" value="">
    </form>
    </div>
</body>

</html>