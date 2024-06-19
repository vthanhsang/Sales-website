<?php



$connect = mysqli_connect('localhost', 'root', '', 'account') or die('Không thể kết nối tới database');
mysqli_set_charset($connect, 'UTF8');

if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$product = mysqli_query($connect, "SELECT * FROM sanpham");
$row = mysqli_fetch_assoc($product);
$imageFilename = $row['hinhanh'];
// xóa
if (isset($_POST['delete'])) {
  $idsanphamToDelete = $_POST['idsanpham'];
  
 
  $deleteQuery = "DELETE FROM sanpham WHERE idsanpham = '$idsanphamToDelete'";
  if (mysqli_query($connect, $deleteQuery)) {
    echo '<script>alert("Bạn đã xóa thành công sản phẩm có ID: ' . $idsanphamToDelete . '");</script>';
    
  } else {
      echo '<script>alert(" Xoá không thành công đã xãy ra lỗi ' . mysqli_error($connect) . '");</script>';
  }
}




// timkiem

if (isset($_POST['timkiem'])){
  $text_id = addslashes($_POST['text_id']);
  $sql = "SELECT * FROM sanpham WHERE idsanpham = '$text_id'";
  $result = mysqli_query($connect, $sql);
  // Kiểm tra nếu có kết quả
  if ($result) {
    $productList = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
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
 <div id="header">
   <div class="logo">
    <div class="SPORTIFY">
        <a onclick="redirectToIndex()" style="text-decoration: none; color: #f7f9fd;"><h1 data-text="SPORTIFY">SPORTIFY</h1></a> 
      </div>
   </div>

   <div class="find">
    <div class="group">
        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24" name="search">
            <g>
                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
            </g>
        </svg>
        <input placeholder="Search" type="search" class="input">
    </div>
   </div>

   <div class="menu">
    <div id="backmenu">
      <nav>
          <ul>
            <li class="A"><a ><b>Đồ Thể Thao Nam <i class="fa-solid fa-person"></i></b></a>
              <ul>
                <li class="QA"><a href="/PROJECT/quanaonam.htm" ><b><h3>Áo <i class="fa-sharp fa-solid fa-shirt"></i></h3></b></a></li>
                <li><a href="/PROJECT/quannam.htm"><b><h3>Quần </h3></b></a></li>
                
                <li><a href="/PROJECT/giaynam.htm"><b><h3>Giày <i class="fa-solid fa-shoe-prints"></i></h3></b></a></li>
                
                <li><a href="/PROJECT/phukien.htm"><b><h3>Phụ Kiện</h3></b></a></li>
              </ul>
            </li>
            <li class="A"><a href="#"><b>Đồ Thể Thao Nữ <i class="fa-solid fa-person-dress"></i></b></a>
              <ul>
                <li><a href="/PROJECT/quanaonu.htm" ><b><h3>Áo <i class="fa-sharp fa-solid fa-shirt"></i></h3></b></a></li>
                <li><a href="/PROJECT/quannu.htm"><b><h3>Quần</h3></b></a></li>
                <li><a href="/PROJECT/giaynu.htm"><b><h3>Giày <i class="fa-solid fa-shoe-prints"></i></h3></b></a></li>
                
                <li><a href="/PROJECT/phukiennu.htm"><b><h3>Phụ Kiện</h3></b></a></li>
              </ul>
            </li>
            <li class="A"><a href="#"><b>Dụng Cụ Thể Thao <i class="fa-solid fa-toolbox"></i></b></a>
              <ul>
                <li><a href="/PROJECT/bongda.htm" ><b><h3>Bóng Đá <i class="fa-solid fa-futbol"></i></h3></b></a></li>
                <li><a href="/PROJECT/quanvot.htm"><b><h3>Quần Vợt <i class="fa-sharp fa-solid fa-racquet"></i></h3></b></a></li>
                <li><a href="/PROJECT/dienkinh.htm"><b><h3>Điền Kinh <i class="fa-solid fa-person-running"></i></h3></b></a></li>
                <li><a href="/PROJECT/boi.htm"><b><h3>Bơi <i class="fa-solid fa-person-swimming"></i></h3></b></a></li>
              </ul>
            </li>
            <li class="A"><a href="#content-spgg-slider"><b>Khuyến Mãi <i class="fa-slolid fa-rectangle-ad"></i></b></a>
            </li>
                         
            <li class="A"><a href="#item-hot"><b>Sản Phẩm Nổi Bật <i class="fa-solid fa-fire"></i></b></a>
        
            </li>
          
          </ul>
        </nav>
  </div>

  <label class="burger" for="burger">
    <input type="checkbox" id="burger">
    <span></span>
    <span></span>
    <span></span>
  </label>
  
   </div>

   <div class="header-icon">
   <a onclick="redirectToIndex();"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a> 
        <a><i class="fa-solid fa-cart-shopping" style="color: #f7f9fd;" onclick="toggleForm()"></i></a>
       <a onclick="dangnhap()"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a> 
   </div>
 </div>


 <div class="Quanlisanpham">

     <h2 >Quản lí sản phẩm </h2>

<div class="table-sanpham">
 <table>
     <tr>
         <th>STT</th>
         <th>ID sản phẩm</th>
         <th>Hình ảnh </th>
         <th>Tên sản phẩm</th>
         <th>Đơn giá</th>
         <!-- <th>Thông tin sản phẩm </th> -->
         <th>Xóa</th>
     </tr>


     <?php foreach ($product as $key => $value): ?>
<tr>
    <td><?php echo $key + 1 ?></td>
    <td><?php echo $value['idsanpham']; ?></td>
    <td><img width="100px" height="100px" src="../picture/<?php echo $value['hinhanh']; ?>" alt=""></td>
    <td><?php echo $value['tensanpham']; ?></td>
    <td><?php echo $value['dongia']; ?></td>
    <!-- <td><?php echo $value['thongtinsanpham']; ?></td> -->

    <td>
                <form method="post" action="">
                    <input type="hidden" name="idsanpham" value="<?php echo $value['idsanpham']; ?>">
                    <input type="submit" name="delete" value="Xóa">
                </form>
     </td>
</tr> 
<?php endforeach; ?>
  


     </table>
     <hr style="position: relative;">

     <div class="thanhtoan">
        <input onclick="themsanpham()"  class="thanhtoan-button"  type="button" value="THÊM SẢN PHẨM">
        <input class="thanhtoan-button"  type="submit" value="Tìm kiếm " onclick="toggleForm()" >
        <input class="thanhtoan-button"  type="submit" value="Cập Nhật" name="" >
   
     </div>
</div>
 
</div>
</div>

<div class="overlay" id="myOverlay"></div>
   
<div class="form" id="myForm">
 <div class="Tengiohang">
     <h2>Muốn tìm kiếm cái gì? </h2>
  <button onclick="hideForm()">Đóng</button>

 </div>
 <hr>
 <form action="" method="post" > 
  <label>Nhập ID </label>
  <input type="text" name="text_id" >
  <input type="submit" name="timkiem" value="tìm kiếm ngay" >
 </form>
<div class="table">
 <table>
     <tr>
         <th>STT</th>
         <th>ID san pham</th>
         <th>Hình</th>
         <th>Tên sản phẩm</th>
         <th>Đơn giá</th>
         <th>Xóa</th>
     </tr>
     <?php foreach ($productList as $key => $value): ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value['idsanpham']; ?></td>
                <td><img width="100px" height="100px" src="../picture/<?php echo $value['hinhanh']; ?>" alt=""></td>
                <td><?php echo $value['tensanpham']; ?></td>
                <td><?php echo $value['dongia']; ?></td>
                <td>
                    <input type="checkbox" name="delete[]" value="<?php echo $value['idsanpham']; ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    
     </table>
     <hr style="position: relative;">

     <div class="thanhtoan">
         <input  class="thanhtoan-button"   type="submit" value="Thanh Toán" name="thanhtoan">
     </div>
</div>
 
</div>

 

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

    <!--  -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js" ></script>
    <!--  -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./java.js"></script>

    <script>
      function redirectToIndex() {
          window.location.href = "../Font-end/main.php";
      }
      </script>
      <script>
      function dangnhap() {
          window.location.href = "../Font-end/dangnhap.php";
      }
      </script>

<script>
      function themsanpham() {
          window.location.href = "../Font-end/themsp.php";
      }
      </script>




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

</body>
</html>