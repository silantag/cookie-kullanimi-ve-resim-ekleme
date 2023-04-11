<?php 
if(isset($_FILES['resim']) && isset($_POST['gonder'])){
    $takeFile=$_FILES['resim'];
    $fileName=$takeFile['name'];
    $fileName=uniqid()."_".$fileName;
    $fileType=$takeFile['type'];
    $fileSize=$takeFile['size'];
    $fileTempName=$takeFile['tmp_name'];
    $fileError=$takeFile['error'];
    $filePath="uploads/".$fileName;
}
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="resim" style="background-image= $filePath ">

<br>
<?php

$cookie_name = "kategori";
$cookie_value = $_POST["kategori"];
$cookie2_name = "Resim";
$cookie2_value = $fileName;
setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");
setcookie($cookie2_name, $cookie2_value, time() + (86400 * 1), "/");


if(isset($_COOKIE[$cookie_name]) && isset($_COOKIE[$cookie2_name])) {
  echo "Category: '" . $cookie_value . "' is  selected!"."<br>";
  echo "Image: '" . $cookie2_value . "' is  selected!"."<br>";
} else {
    echo "cookie seçilmedi";
}


?>
    
    
<br>



<?php
                if($fileError == 4){
                    echo "Bir Dosya Seçiniz <br>";
                    exit();
                }else{
                    if($fileError!=0 && $fileError!=4){
                        echo "Yüklediğiniz dosyada bir hatsa bulunmaktadır. <br>";
                        exit();
                    }
                    else{
                        if(file_exists($filePath)){
                            echo "Bu isimde dosya mevcut, değiştirerek tekrar yükleme yapın.";
                            exit();
                        }
                        else{
                            if($fileSize > 1000000){
                                echo "dosya boyutunuz 1 mb'dan fazla olamaz!!";
                                exit();
                            }
                            else{
                                $look=getimagesize($fileTempName);
                                if($look === false){
                                    echo "Yüklemeye çalıştığınız dosya resim formatında değil.";
                                    exit();
                                }
                                else{
                                $fileExtension=strtolower(pathinfo($filePath,PATHINFO_EXTENSION));
                                $allowed=array("png","jpg", "jpeg");
                                if(!in_array($fileExtension, $allowed)){
                                    echo "Yalnızca PNG, JPG ve JPEG dosyaları yükleyebilirsiniz.";
                                    exit();
                                }
                                else{
                   if(move_uploaded_file($fileTempName, $filePath)){
                    echo "Dosya Başarıyla Yüklendi <br>";
                    echo "Dosya adı: $fileName <br>";
                    echo "Dosya tipi: $fileType <br>";
                    echo "Dosya Boyutu: $fileSize <br>";
                    echo "<img src='$filePath'>";
                    
                }
                else{
                 echo "Dosya Yüklenirken Hata Oluştu <br>";
                }     }}}}}}
                   ?>

       

</div>


</body>
</html>