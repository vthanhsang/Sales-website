<?php
// Khai báo sử dụng session
session_start();
// Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
// Xử lý đăng nhập


if (isset($_POST['dangnhap'])) {
    // Kết nối tới database
    include('connect.php');

    // Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    // Kiểm tra đã nhập đủ tên đăng nhập và mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // Kiểm tra tên đăng nhập có tồn tại không
    $query = "SELECT id,username, password FROM member WHERE username='$username'";
    $result = mysqli_query($connect, $query);

 

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // So sánh mật khẩu văn bản thô
        if ($password === $row['password']) {

            // Lưu tên đăng nhập
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];

           
            echo "Xin chào <b>" .  $username  . "</b>. Bạn đã đăng nhập thành công.";
            echo "<script>alert('Xin chào " .  $username  . ". Bạn đã đăng nhập thành công hãy mua sắm theo ý của bạn :((.'); window.location.href = '../Font-end/main.php';</script>";
        } else {
            echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại.');</script>";
            echo "<script>history.go(-1);</script>";
        } 
    } else {
        echo "<script>alert('Tên đăng nhập không tồn tại.');</script>";
        echo "<script>history.go(-1);</script>";
    }
    $connect->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-message {
    position: absolute;
    top: 77%; /* Điều chỉnh top theo nhu cầu của bạn */
    left: 43%; /* Điều chỉnh left theo nhu cầu của bạn */
    color: red;
    text-decoration: none;
}
    </style>
</head>
<body>
    
</body>
</html>
