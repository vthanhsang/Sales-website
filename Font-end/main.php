<?php

$connect = mysqli_connect('localhost', 'root', '', 'account') or die('Không thể kết nối tới database');
mysqli_set_charset($connect, 'UTF8');

if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

$offset = ($current_page - 1) * $item_per_page;
$products = mysqli_query($connect, "SELECT * FROM sanpham ORDER BY idsanpham ASC LIMIT ".$item_per_page." OFFSET ".$offset." ");

$totalRecords = mysqli_query($connect,"SELECT * FROM sanpham" );
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);

?>

<?php

include("header.php");
?>

 <div id="intro">
  <div class="intro-picture" >
       <img src="../picture/intro.jpg" >
   <div class="text-description"> <h1>SPORTIFY</h1>
  <h5>Chúng tôi đưa đến cho bạn trải nghiệm tập luyện và thể thao tốt nhất! </h5>

  </div>

  <div class="intro-button">
    <button class="button-intro">Đảm Bảo</button>
    <button class="button-intro">Úy Tín</button>
    <button class="button-intro" >Chất Lượng</button>
   <a href="./quanlisanphamadmin.php"> <button class="button-intro button-admin">Quản Lí Admin </button></a>
  </div>
  
  </div>
 </div>

 <div id="content">
   <div class="content-icon">
     <div class="content-img">
    <img src="../picture/iconvanchuyen.png" alt="van chuyen">
    <b>Miễn phí vận chuyển</b>
    <p>với đơn hàng từ 200k</p>
  </div>
  <div class="content-img">
    <img src="../picture/iconlienhe.png">
    <b>Hỗ trợ 24/7</b>
    <p>Với đơn hàng từ 200k</p>
  </div>
  <div class="content-img">
    <img src="../picture/icondambaoo.png">
    <b>An toàn 100%</b>
    <p>Với đơn hàng từ 200k</p>
  </div>
  <div class="content-img">
    <img src="../picture/icondambao.png">
    <b>Ưu đãi hấp dẫn</b>
    <p>Với đơn hàng từ 200k</p>
  </div>
   </div>
 </div>


  <div id="content-spgg-slider">
    <div class="content-spgg-slider-decription">
    <a href=""><i class="fa-solid fa-heart" style="color: #e57124;"></i> Ưu đãi đặc biệt <i class="fa-solid fa-heart" style="color: #e57124;"></i></a>  
    </div>
      <div class="D4">
        <div class="D4-item">
            <div class="D4-image"  style="background-image: url(../img1/giay2.webp);"></div>
            <div class="D4-discount-badge">Giảm 40%</div>
            <div class="D4-info">
                <div class="D4-title">Áo Thun Thể Thao</div>
                <div class="D4-price"><strike>400.000 VND</strike></div>
                <div class="D4-price">199.000 VND</div>
                <button class="D4-add-to-cart">Mua Ngay</button>
                <button class="D4-add-to-cart">Thêm vào giỏ hàng</button>
            </div>
        </div>
        
        <div class="D4-item">
            <div class="D4-image"  style="background-image: url(../img1/ao1.webp);"></div>
            <div class="D4-discount-badge">Giảm 40%</div>
            <div class="D4-info">
                <div class="D4-title">Áo Thun Thể Thao</div>
                <div class="D4-price"><strike>400.000 VND</strike></div>
                <div class="D4-price">199.000 VND</div>
                <button class="D4-add-to-cart">Mua Ngay</button>
                <button class="D4-add-to-cart">Thêm vào giỏ hàng</button>
            </div>
        </div>
        
        <div class="D4-item">
         <a href="/PROJECT/aobalo.htm"> <div class="D4-image" style="background-image: url(../img1/a3.webp);"></div></a>
         <div class="D4-discount-badge">Giảm 50%</div>
          <div class="D4-info">
              <div class="D4-title">Áo 3 lỗ  </div>
              <div class="D4-price"><strike>300.000 VND</strike></div>
                <div class="D4-price">149.000 VND</div>
              <button class="D4-add-to-cart">Mua Ngay</button>
              <button class="D4-add-to-cart">Thêm vào giỏ hàng</button>
          </div>
      </div>
      <div class="D4-item">
        <div class="D4-image" style="background-image: url(../img1/ao3.webp);"></div>
        <div class="D4-discount-badge">Giảm 50%</div>
        <div class="D4-info">
            <div class="D4-title">Giày Goya Training 2023</div>
            <div class="D4-price"><strike>1.100.000 VND</strike></div>
                <div class="D4-price">549.000 VND</div>
            <button class="D4-add-to-cart">Mua Ngay</button>
            <button class="D4-add-to-cart">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <div class="D4-item">
      <div class="D4-image" style="background-image: url(../img1/a4.webp);"></div>
      <div class="D4-discount-badge">Giảm 50%</div>
     
      <div class="D4-info">
          <div class="D4-title">Quần Short</div>
          <div class="D4-price"><strike>190.000 VND</strike></div>
                <div class="D4-price">79.000 VND</div>
    
                  <button class="D4-add-to-cart">Mua Ngay</button>
          <button class="D4-add-to-cart">Thêm vào giỏ hàng</button>
      </div>
    </div>
    
    </div>
    
    
  </div>

  <div id="content-spnb">
     <div class="content-spnb-text"><h1><i class="fa-solid fa-heart" style="color: #e57124;"></i> Sản Phẩm Của Chúng Tôi <i class="fa-solid fa-heart" style="color: #e57124;"></i> </h1></div>
     <div class="asider-product">
    <aside class="aside">
     
      <select class="form-select" aria-label="Default select example" style="margin-bottom: 10px;">
        <option selected>Đồ thể thao nam</option>
        <option value="1">Giá 100.000 vnd - 200.000 vnd</option>
        <option value="2">Giá trên 200.000 vnd</option>
        <option value="3">Giá trên 500.000 vnd</option>
      </select>
      <select class="form-select" aria-label="Default select example" style="margin-bottom: 10px;">
        <option selected>Đồ thể thao nữ</option>
        <option value="1">Giá 100.000 vnd - 200.000 vnd</option>
        <option value="2">Giá trên 200.000 vnd</option>
        <option value="3">Giá trên 500.000 vnd</option>
      </select>
      <select class="form-select" aria-label="Default select example" style="margin-bottom: 10px;">
        <option selected>Phụ kiện</option>
        <option value="1">Giá 100.000 vnd - 200.000 vnd</option>
        <option value="2">Giá trên 200.000 vnd</option>
        <option value="3">Giá trên 500.000 vnd</option>
      </select>
      <select class="form-select" aria-label="Default select example" style="margin-bottom: 10px;">
        <option selected>Giày thể thao nam</option>
        <option value="1">Giá 100.000 vnd - 200.000 vnd</option>
        <option value="2">Giá trên 200.000 vnd</option>
        <option value="3">Giá trên 500.000 vnd</option>
      </select>
      <select class="form-select" aria-label="Default select example" style="margin-bottom: 10px;">
        <option selected>Giày thể thao nữ</option>
        <option value="1">Giá 100.000 vnd - 200.000 vnd</option>
        <option value="2">Giá trên 200.000 vnd</option>
        <option value="3">Giá trên 500.000 vnd</option>
      </select>
      
    </aside>
    <div class="content-sp">
    <div class="parent">
       <?php 
       while ($row = mysqli_fetch_array($products)){
       
       
       ?>
       
           <div class="sanpham">
             <div class="sanpham-thumbnail">
               <div class="sanpham-img">
                 <div class="sanpham-sale">  45%  </div>
                 <img src="../picture/<?=$row['hinhanh']?>" alt="Product Image">

                 <form  action="cart.php?action=add" method="POST">
                 <div class="sanpham-overlay">
                   <button class="Btn">
                     Mua Ngay
                     <svg class="svgIcon" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
                   </button>
                   <input type="submit" value=" Thêm Giỏ Hàng" name="addcart" class="Btn" > 

                        <div class="soluong">
                        <label for="quantity">Số lượng:</label><br>
                        <!-- <button onclick="decreaseQuantity5()">-</button> -->
                        <input name="quantity[<?=$row['idsanpham']?>]" type="text" id="quantity5" min="0" value="0" style="text-align: center;" >
                        <!-- <button onclick="increaseQuantity5()">+</button><br><br> -->
                        </div>
                 </div>
                </form>
               </div>
             </div>
             <div class="sanpham-info">
               <div class="sanpham-title"><?=$row['tensanpham']?></div>
               <div class="sanpham-price"><strike>400.000 VND</strike>  <?=number_format($row['dongia'], 0, ',', '.') ?> VND</div>
             </div>
           </div>
            <?php 
       }
      ?>
                <?php
                include './pagination.php';
                ?>
        </div>
     

        <!-- <div class="wrapper">
   
    // Hiển thị các nút trang
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?per_page=' . $item_per_page . '&page=' . $i . '">
                <div class="option">
                    <input class="option-input" type="radio" name="btn" value="option'.$i.'" '.($current_page == $i ? 'checked' : '').'>
                    <div class="button-wrapper">
                        <span class="option-span">'.$i.'</span>
                    </div>
                </div>
              </a>';
    }
  
</div> -->
    </div>
    </div>

  </div>
</div>

<div id="item-hot">
  
  <div class="item-hot-text">
    <h3>Sản phẩm đặc biệt</h3>
  </div>

  <div class="item-hot-box">
  <div class="item-box">
    <div class="item-box-img">
      <img src="../picture/aomu.jpg">
    </div>
    <div class="item-box-text">
      <h4>

      </h4>
    </div>
  </div>

  <div class="item-box">
    <div class="item-box-img">
      <img src="../picture/aomc.jpg">
    </div>
    <div class="item-box-text">
      <h4>

      </h4>
    </div>
  </div>
  <div class="item-box">
    <div class="item-box-img">
      <img src="../picture/aomia.jpg">
    </div>
    <div class="item-box-text">
      <h4>

      </h4>
    </div>
  </div>

  </div>

  
 
</div>
 
<div id="content-news">
  <div class="content-newtext"><i class="fa-regular fa-star" style="color: #d87518;"></i><a>NHỮNG BÀI VIẾT MỚI </a> <i class="fa-regular fa-star" style="color: #d87518;"></i></div>
  <div class="box">
  <div class="content-newimg">
    <div class="img-content">
      <img src="../picture/foden.jpg" >
    </div>
    <div class="img-content-text"><p>
      <h5>Chính thức ra mắt áo Manchester City sân khách mùa giải 23/24</h5>
      <h7>Trang phục thi đấu sân khách của Manchester City sẽ được debut chính thức trong [...]</h7>
    </p></div>
   
  </div>
  <div class="content-newimg">
    <div class="img-content">
      <img src="../picture/chesea.jpg" >
    </div>
    <div class="img-content-text"><p>
      <h5>Chính thức ra mắt áo Manchester City sân khách mùa giải 23/24</h5>
      <h7>Trang phục thi đấu sân khách của Manchester City sẽ được debut chính thức trong [...]</h7>
    </p></div>
  </div>
  <div class="content-newimg">
    <div class="img-content">
      <img src="../picture/aomu.jpg" > 
    </div>
    <div class="img-content-text"><p>
      <h5>Chính thức ra mắt áo Manchester City sân khách mùa giải 23/24</h5>
      <h7>Trang phục thi đấu sân khách của Manchester City sẽ được debut chính thức trong [...]</h7>
    </p></div>
  </div>
  <div class="content-newimg">
    <div class="img-content">
      <img src="../picture/aomc.jpg" >
    </div>
    <div class="img-content-text"><p>
      <h5>Chính thức ra mắt áo Manchester City sân khách mùa giải 23/24</h5>
      <h7>Trang phục thi đấu sân khách của Manchester City sẽ được debut chính thức trong [...]</h7>
    </p></div>
  </div>
</div>
</div>


<div id="register-infor">
 <div class="infor">
  <div class="infor-text">
    <i class="fa-regular fa-paper-plane"></i>
    <h4>Tham Gia Bản Tin Của Chúng Tôi Ngay Bây Giờ</h4>
  </div>
  <div class="infor-register">
    <div class="input-container">
      <input required="" placeholder="Email Address" type="email">
      <button class="invite-btn" type="button">
        Đăng Kí
      </button>
     
    </div>
  </div>
 </div>
</div>


<?php
include("footer.php");

?>

 <footer id="copyright">
<h7>@copyright Thanh Sang</h7>
 </footer>

</div>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

    <!--  -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js" ></script>
    <!--  -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./java.js"></script>


</body>
</html>