<?php
session_start();
?>

<?php
       $connect = mysqli_connect('localhost', 'root', '', 'account') or die('Không thể kết nối tới database');
       mysqli_set_charset($connect, 'UTF8');
       
       if ($connect === false) {
           die("ERROR: Could not connect. " . mysqli_connect_error());
       }
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        $error = false;
        $success = false;
        if (isset($_GET['action'])) {

            function update_cart($add = false) {
                global $connect;
                foreach ($_POST['quantity'] as $idsanpham => $quantity) {
                    if ($quantity == 0) {
                        unset($_SESSION["cart"][$idsanpham]);
                    } else {
                        if ($add) {
                            $_SESSION["cart"][$idsanpham] += $quantity;
                        } else {
                            $_SESSION["cart"][$idsanpham] = $quantity;
                          
                        }
                    }
                }
            }
            

            switch ($_GET['action']) {
                case "add":
                    update_cart(true);
                    header("Location: ./cart.php");
                    break;

                    case "delete":
                        if (isset($_GET['idsanpham'])) {
                            unset($_SESSION["cart"][$_GET['idsanpham']]);
                        }
                        header('Location: ./cart.php');
                        break;
                
                    case "submit":
                        if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                            update_cart();
                            header('Location: ./cart.php');
                        } elseif ($_POST['order_click']) { //Đặt hàng sản phẩm
                            if (empty($_POST['hoten'])) {
                                $error = "Bạn chưa nhập tên của người nhận";
                            } elseif (empty($_POST['diachi'])) {
                                $error = "Bạn chưa nhập số điện thoại người nhận";
                            } elseif (empty($_POST['dienthoai'])) {
                                $error = "Bạn chưa nhập địa chỉ người nhận";
                            } elseif (empty($_POST['quantity'])) {
                                $error = "Giỏ hàng rỗng";
//                           
                            }
                            if ($error == false && !empty($_POST['quantity'])) {
                              

                                $products = mysqli_query($connect, "SELECT * FROM `sanpham` WHERE `idsanpham` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                                $total = 0;
                                $orderProducts = array();
                                while ($row = mysqli_fetch_array($products)){
                                    $orderProducts[] = $row;
                                    $total += $row['dongia'] * $_POST['quantity'][$row['idsanpham']];
                                }
                                $insertOrder = mysqli_query($connect, "INSERT INTO `thongtin` (`id`, `ten`, `diachi`, `email`, `tongtien`) VALUES ('" . $_SESSION['id']  . "', '" . $_POST['hoten'] . "', '" . $_POST['diachi'] . "', '" . $_POST['email'] . "', '" . $total . "')");
                                $insertString = ""; // Initialize $insertString outside the loop

                                foreach ($orderProducts as $key => $product) {
                                    $insertString .= " ('" . $_SESSION['id'] . "', '" . $product['idsanpham'] . "', '" . $product['tensanpham'] . "', '" . $product['dongia'] . "', '" . $_POST['quantity'][$product['idsanpham']] . "')";

                                    if ($key != count($orderProducts) - 1) {
                                        $insertString .= ",";
                                    }
                                }

                                if (!empty($insertString)) {
                                    $insertOrder = mysqli_query($connect, "INSERT INTO `giohang` (`id`, `idsanpham`, `tensanpham`, `gia`, `soluong`) VALUES " . $insertString . ";");
                                    if ($insertOrder) {
                                        $success = "Đặt hàng thành công";
                                        unset($_SESSION['cart']);
                                    } else {
                                        echo "Error: " . mysqli_error($connect);
                                    }
                                }
                            }



                        }
                        break;
            }
        }
        if (!empty($_SESSION["cart"])) {
            $products = mysqli_query($connect, "SELECT * FROM `sanpham` WHERE `idsanpham` IN (".implode(",", array_keys($_SESSION["cart"])).")");
        }




?>



<?php 
include("header.php");
?>

 <div class="boxcenter">
        <div class="row mb ">
        <?php if (!empty($error)) { ?> 
                <div id="notify-msg">
                    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
                </div>
            <?php } else if (!empty($success)) { ?>
                <div id="notify-msg">
                    <?= $success ?>. <a href="main.php">Tiếp tục mua hàng</a>
                </div>
            <?php } else { ?>
            <form action="cart.php?action=submit" method="POST">
            <div class="boxtrai mr" id="bill">
                <div class="table" style="width: 140%;">
                    <h1>GIỎ HÀNG</h1>

                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền ($)</th>
                            <th>Xóa</th>
                        </tr>
                       
                        <?php 
                            if(!empty($products)){

                        $num = 1;
                        $totalAmount = 0;
                        while ($row = mysqli_fetch_array($products)){
                                
                        ?>
                        <tr>
                            <td><?=$num++;?></td>
                            <td><img src="../picture/<?=$row['hinhanh']; ?>  " alt=""></td>
                            <td><?=$row['tensanpham']?></td>
                            <td><?=number_format($row['dongia'], 0, ',', '.') ?> VND</td>
                            <td><input class="soluong" width="10px" type="text" value="<?=$_SESSION["cart"][$row['idsanpham']] ?>" name="quantity[<?=$row['idsanpham']?>]"  ></input></td>
                            <td>
                            <div><?=number_format($row['dongia'] * $_SESSION["cart"][$row['idsanpham']], 0, ',', '.') ?> VND</div>

                            <?php 
                                $totalAmount += $row['dongia'] * $_SESSION["cart"][$row['idsanpham']];
                              ?>
                        
                        </td>
                        <td><a href="cart.php?action=delete&idsanpham=<?= $row['idsanpham'] ?>"> XÓA</a></td>
                        </tr>


                          <?php  
                             }
                         ?>

                             <tr>
                                <th colspan="5">Tổng đơn hàng</th>
                                <th>
                                <div><?=number_format($totalAmount, 0, ',', '.')?> VND</div>
                                </th>
                             </tr>   
                             
                             <?php 
                            }
                             ?>

                    </table>
                </div>
                <div class="row" >
                    <h1>THÔNG TIN NHẬN HÀNG</h1>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="hoten" required></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi" required></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td> 
                            <td><input type="text" name="dienthoai" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                    </table>
                </div>

                <div class="row mb"  >
                    <input type="submit" value="ĐẶT HÀNG" name="order_click">
                    <a ><input type="submit" value="Cập Nhật" name="update_click"></a>
                </div>
           
            </div>
            </form>
            <?php } ?>
        </div>
       
    </div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>