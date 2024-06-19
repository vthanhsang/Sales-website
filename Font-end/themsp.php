<?php
$file_name = '';
$connect = mysqli_connect('localhost', 'root', '', 'account') or die('Không thể kết nối tới database');
mysqli_set_charset($connect, 'UTF8');

if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Lấy giá trị lớn nhất của idsanpham từ CSDL
$query_max_id = "SELECT MAX(idsanpham) AS max_id FROM sanpham";
$result_max_id = mysqli_query($connect, $query_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id = $row_max_id['max_id'];

// Tăng giá trị lớn nhất lên 1 để sử dụng cho sản phẩm mới
$new_id = $max_id + 1;









if (isset($_POST['themsanpham'])) {
    $idsanpham = addslashes($_POST['idsanpham']);
    $tensanpham = addslashes($_POST['tensanpham']);
    $dongia = addslashes($_POST['dongia']);
    $hinhanh = $_FILES['hinhanh'];
    $thongtinsanpham = addslashes($_POST['thongtinsanpham']);

    if(isset($_FILES['hinhanh'])){
      $file = $_FILES['hinhanh'];
      $file_name = $file['name'];
      $upload_directory = '../picture/';
      $upload_path = $upload_directory . $file_name;
      move_uploaded_file($file['tmp_name'], $upload_path);
  }

    $sql = "INSERT INTO sanpham(idsanpham, tensanpham, dongia, hinhanh, thongtinsanpham)
            VALUES ('$idsanpham', '$tensanpham', '$dongia', '$file_name', '$thongtinsanpham')";

    if (mysqli_query($connect, $sql)) {
        echo '<script>alert(" Thêm sản phẩm thành công.");</script>';
    } else {
        echo '<script>alert("Lỗi ' . $sql . '. ' . mysqli_error($connect) . '");</script>';
    }

    mysqli_close($connect);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop bán đồ thể thao</title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/LAB5/img.png/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/LAB5/img.png/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/LAB5/img.png/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
 <div id="main">
<div class="favi-icon">
  <a href="https://maps.app.goo.gl/TKzF5cy371R16cRc8"><i class="fa-solid fa-location-pin fa-shake fa-2xl" style="color: #f21707;"></i></a>
 <a href="https://www.facebook.com/profile.php?id=100035082763253"> <i class="fa-brands fa-facebook fa-shake fa-2xl" style="color: #111ed4;"></i></a>
  <a href="tel:+84388223198"><i class="fa-solid fa-phone fa-shake fa-2xl" style="color: #0df828;"></i></a>
    <a href="mailto:sangvt.22ce@vku.udn.vn?subject=Sang dep trai vai l"><i class="fa-solid fa-envelope fa-shake fa-2xl" style="color: #000000;"></i></a>

</div>



 <div class="main-admin">
<form class="form-admin" action="" method="POST" enctype="multipart/form-data">
  <label>ID SP </label>

  <input type="text" class="input-sp" value="<?php echo $new_id; ?>" name="idsanpham" readonly>
<label>Ten SP </label>

<input type="text" class="input-sp" value="" name="tensanpham">
<label>Gia SP </label>

<input type="text" class="input-sp" value="" name="dongia">
<label>Hinh Anh </label>

<input type="file" class="input-sp" name="hinhanh">

<label>thong tin sp </label>

<input type="text" class="input-sp" value="" name="thongtinsanpham">

<input type="submit" value="Thêm sản phẩm" name="themsanpham" class="themsp">
<a href="quanlisanphamadmin.php">
  <button type="button" class="themsp" onclick="location.href='quanlisanphamadmin.php';">
    Quay lại quản lý
  </button>
</a>

</form>

 </div>




</div>


   



<script>
function toggleForm() {
     var form = document.getElementById('myForm');
     var overlay = document.getElementById('myOverlay');
     var otherElements = document.getElementsByClassName('notFormElements');

     if (form.style.display === 'none' || form.style.display === '') {
         form.style.display = 'block';
         overlay.style.display = 'block';

         // Adjust the opacity of other elements
         for (var i = 0; i < otherElements.length; i++) {
             otherElements[i].style.opacity = '0.3'; // Adjust the opacity value as needed
         }
     } else {
         form.style.display = 'none';
         overlay.style.display = 'none';

         // Reset the opacity of other elements
         for (var i = 0; i < otherElements.length; i++) {
             otherElements[i].style.opacity = '1';
         }
     }
 }

 function hideForm() {
     document.getElementById('myForm').style.display = 'none';
     document.getElementById('myOverlay').style.display = 'none';
 }
</script>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

    <!--  -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js" ></script>
    <!--  -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./java.js"></script>

    <script>
      function redirectToIndex() {
          window.location.href = "../Font-end/indeex.php";
      }
      </script>
      <script>
      function dangnhap() {
          window.location.href = "../Font-end/dangnhap.php";
      }
      </script>











</body>
</html>