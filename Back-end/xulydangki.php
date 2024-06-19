
<?php
$errors = array();
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'account') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangki'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);



if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($email)) {
array_push($errors, "Email is required"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="../Font-end/dangki2.php";</script>';

// Dừng chương trình
die ();
}
else {
    $stmt = mysqli_prepare($conn, "INSERT INTO member (email, username, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $password);
    if (mysqli_stmt_execute($stmt)) {
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="../Font-end/dangki2.php";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../Font-end/dangki2.php";</script>';
    }
}
}
?>