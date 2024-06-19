<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dangnhap2.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/LAB5/img.png/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/LAB5/img.png/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/LAB5/img.png/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

</head>
<body style="background-image: url(../img1/cris.jpg);">
<form action='dangnhap.php' class="dangnhap" method='POST'> 
    <div class="container">
        <div class="card">
            <a class="login">Đăng Nhập</a>
            <div class="inputBox">
                <input type="text"  name='username' required="required">
                <span class="user">Tài Khoản</span>
            </div>

            <div class="inputBox">
                <input type="password" name='password' required="required">
                <span>Mật Khẩu</span>
            </div>
             
            <div class="QMK"><a>Quên mật khẩu?</a>
            
            </div>
            <div class="DN">
          <button class="enter" name="dangnhap">Đăng Nhập</button>
          <button type="button" onclick="window.location.href='dangki2.php'" class="enter" >Tạo tài khoản</button>
            </div>
            <div class="FB">
            <p class="mb-0 mt-4 text-center">Đăng Nhập :<a href="https://www.facebook.com/" style="text-decoration: none;" class="link"><img src="/LAB7/image/fb1.png" style="color: blanchedalmond;" width="40px" >  <a href="https://www.google.com/?hl=vi" style="text-decoration: none;"><img src="/LAB7/image/gg.png" width="25px"></a>   </a></p>
        </div>
    </div>
</div>
<?php require '../Back-end/xuli.php';?> 
</form>



</body>
</html>