<?php
require 'baglan.php';

if(isset($_POST)){
    $UrunAd=$_POST["UrunAd"];
    $UrunMiktar=$_POST["UrunMiktar"];
    $UrunFiyat=$_POST["UrunFiyat"];
    
    $ekle=$db->prepare("INSERT INTO urunler SET UrunAd=?,UrunMiktar=?,UrunFiyat=?");
    $insert=$ekle->execute(array($UrunAd,$UrunMiktar,$UrunFiyat));

    if($insert){
        echo "Ürün eklendi";
        header("Refresh:0.5;kasa.php");
    }
    else{
        echo "Hata";
    }
}
?>