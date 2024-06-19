<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dangki2.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/LAB5/img.png/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/LAB5/img.png/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/LAB5/img.png/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body >
<form method="post" action="dangki2.php" >
    <div class="container">
        <div class="card">
     
            <a class="singup">Đăng Kí</a>
            <div class="inputBox1">
                <input type="text" name="email" required="required">
                <span class="user">Email</span>
            </div>

            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Tài Khoản</span>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Mật Khẩu</span>
            </div>

            <div class="inputBox">
                <input type="password" name="again-password" required="required">
                <span>Nhập Lại Mật Khẩu</span>
            </div>
      <div class="DK">
           <button class="enter" name="dangki" >Đăng Kí Ngay </button>
           <button type="button" onclick="window.location.href='dangnhap.php'" class="enter"> Quay lại Đăng nhập</button>
        </div>
    </div>
    </div>
    <?php require '../Back-end/xulydangki.php'; ?>
    </form>
  
</body>
</html>