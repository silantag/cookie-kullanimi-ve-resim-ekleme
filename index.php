
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></head>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <body>
    <form action="result.php" method="POST" enctype="multipart/form-data">
  <div class="alan" style="margin:25px">
        <select name="kategori" id="kategori">
    <option value="Elektronik">Elektronik</option>
    <option value="Ev Esyaları">Ev Eşyaları</option>
    <option value="Tekstil">Tekstil</option>
  </select>
  <br>
  <br>
  <div class="form-group">
    <input type="file" class="form-control-file" name="resim">
    
  </div>
  <br>
  <div class="form-group form-check">
    <input type="checkbox" name="sec" class="form-check-input" >
    <label class="form-check-label">Cookilere izin ver!</label>
    <br>

  </div>
  <input type="submit" name="gonder" value="Gonder">
        </div>
        <div class="alert alert-danger">
<?php
if(isset($_POST["gonder"]) && isset($_POST["sec"])){
    echo "Cookilere izin verildi;";
}
else{
    echo "Cookilere izin verilmedi";
}
?>
</div>
</form>
</body>
</html>