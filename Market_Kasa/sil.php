<?php
require 'baglan.php';

$sil=$db->prepare("DELETE FROM urunler");
$delete=$sil->execute();
if($delete){
    echo "Sıfırlandı";
    header("Refresh:1;kasa.php");
}
else{
    echo "Hata";
}
?>