<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR Code Generator</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container align-items-center p-2" style="width: 350px;">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-center"><b>Cara Membuat QR Code Dengan PHP</b></p>
                    <form method="post" class="text-center">
                        <div class="input-group mb-3">
                            <input type="text" name="teks_qr" id="teks_qr" minlength="3" required value="<?php $val=isset($_POST['generate']) ? $_POST['teks_qr'] : ""; echo $val; ?>">
                            <button type="submit" name="generate" class="btn btn-primary ml-3">Generate</button>
                        <?php
                        if (isset($_POST['generate'])){
                            include "php-qrcode-library/qrlib.php"; 
                            /*create folder*/
                            $tempdir="img-qrcode/";
                            if (!file_exists($tempdir))
                            mkdir($tempdir, 0755);
                            $file_name=date("Ymd").rand().".png";	
                            $file_path = $tempdir.$file_name;
                            
                            QRcode::png($_POST['teks_qr'], $file_path, "H", 10, 2);
                            
                            echo "<p>Hasil Generate :</p>";
                            echo "<p><img src='".$file_path."' /></p>";
                        }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>