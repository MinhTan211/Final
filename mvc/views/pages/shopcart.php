<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else{
        if(!isset($_SESSION["Role"]))
            echo "<script type='text/javascript'>
                window.location = 'http://localhost/Final/Home/Login'
            </script>";
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../public/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../public/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="../public/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../public/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../public/css/style.css" type="text/css">
    <link rel="stylesheet" href="../public/css/index.css" type="text/css">

    <!--font mater-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
</head>


<body>
    <script LANGUAGE="JavaScript">
        function Remove(id){
            var agree = confirm("X??a s???n ph???m kh???i gi??? h??ng?");
            if(agree)
                location.href = 'cart?action=remove&id='+id;
            else
                return agree;
        }
        function clearcart(){
            var agree = confirm("L??m m???i to??n b??? gi??? h??ng?");
            if(agree)
                location.href = 'cart?action=delete';
            else
                return agree;
        }
        function ThanhToan(gia){
            var agree = confirm("T???ng ????n h??ng: "+gia+" b???n c?? mu???n thanh to??n");
            if(agree)
                location.href = 'Bill?Tong='+gia;
            else
                return agree;
        }
    </script>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu fixed-top" style="background-color:#fcc77b;">
                        <ul>
                            <li><a href="./index">Trang Ch???</a></li>
                            <li><a href="./trademark">Th????ng Hi???u</a></li>
                            <li><a href="./shop">?????t H??ng</a></li>
                            <?php
                                include 'ButtonLogout.php';
                                include 'ButtonCart.php';
                            ?>
                            <a href="./informationPersonal" style="padding-left: 20px;"><img src="../public/img/img_logo/logo1.png" style="height: 40px; width: 40px;"><label style="margin-left: 10px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white;">TT.LT</label></a>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <form></form>
                <div class="about__text">
                    <div class="section-title">
                        <span style="font-size: 50px;">GI??? H??NG C???A B???N</span>
                        <span>-------------------------------------------------------------------------------------------------</span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>S???n Ph???m</th>
                                    <th>S??? L?????ng</th>
                                    <th>Gi??</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $model = $this->model('ProductModel');
                                    if(!isset($_SESSION['cart']))
                                        echo '<tr><p>Kh??ng c?? s???n ph???m trong gi??? h??ng</p></tr>';
                                    else{
                                        foreach($_SESSION['cart'] as $id => $value){
                                            $row = $model->ChitietSP($id)->fetch_row();
                                            echo "<tr>
                                                <td class='product__cart__item>'
                                                    <div class='product__cart__item__pic'>
                                                        <img style='width: 80px; height: 80px;' src='../uploads/";echo $row[2]."' alt=''>
                                                    </div>
                                                    <div style ='margin-top: 10px' class='product__cart__item__text'>
                                                        <h6>";echo $row[1]."</h6>
                                                    </div>
                                                </td>
                                                <form action='cart' method ='GET'>
                                                <td class='quantity__item'>
                                                    <div class='quantity'>
                                                        <div class='pro-qty'>
                                                            <input type = 'hidden' name='action' value='edit'/>   
                                                            <input type = 'hidden' name='id' value='".$id."'/> 
                                                            <input name = 'SoLuong' type='text' value='";echo $_SESSION['cart'][$id]['SoLuong']."'>
                                                        </div>
                                                    </div>
                                                </td>
                                                </form>
                                                <td class='cart__price'>"; echo $row[9]*$_SESSION['cart'][$id]['SoLuong']."</td>
                                                <td class='cart__close'><button style ='margin-right: -50px; margin-bottom: 30px' onclick='return Remove(".$id.")'><span class='material-icons'>delete</span></button>
                                                <button type = 'submit' style='margin-right: -100px; padding-left: 40px'><span <span class='material-icons'>update</span></span></button></td>
                                            </tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a style="background-color: black; color: blanchedalmond;" href="./shop">Ti???p T???c Mua S???m</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button style="background-color: black; margin-right: 35px; margin-top: -5px;" type = "button" onclick="return clearcart()"><i class="fa fa-spinner"></i>L??m m???i gi??? h??ng</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Check Out-->
                <div class="col-lg-4">
                <form>
                    <div class="cart__total">
                        <h6 style="text-align: center; font-size: 25px;">H??a ????n</h6>
                        <ul>
                        <?php
                        $model = $this->model('ProductModel');        
                        echo "<li style ='text-align: center; margin-top: 10px; color: #914b19; font-size: 12px'>----------------------------------------------------------</li>";
                            if(!isset($_SESSION['cart']))
                                echo '<tr><p>Kh??ng c?? s???n ph???m trong gi??? h??ng</p></tr>';
                            else{
                                $Tong = 0;
                                foreach($_SESSION['cart'] as $id => $value){
                                    $row = $model->ChitietSP($id)->fetch_row();
                                    echo "<li>";echo $row[1] ."<span>".$row[9]*$_SESSION['cart'][$id]['SoLuong']." VN??</span></li>";
                                    $Tong += $row[9]*$_SESSION['cart'][$id++]['SoLuong'];
                                }
                                echo "<li style ='text-align: center; margin-top: 10px; color: #914b19; font-size: 12px'>----------------------------------------------------------</li>";
                                echo "<li>T???ng H??a ????n<span>";echo $Tong." VN??</span></li>";
                            }                        
                        ?>
                        </ul>
                    </div>
                    </form>
                    <button name="ThanhToan" style="width: 360px; background-color: black;" onclick = "return ThanhToan(<?php echo $Tong;?>)" type ="submit" class="primary-btn">Thanh To??n</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="../public/img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>KHUNG GI??? L??M VI???C</h6>
                        <ul>
                            <li>Th??? 2 - Th??? 6:&ensp; 08:00h &ensp; ??? &ensp;21:30h</li>
                            <li>Th??? 7:&ensp; 08:00h &ensp; ??? &ensp;16:00h</li>
                            <li>Ch??? Nh???t:&ensp; 10:00 am &ensp;??? &ensp;16:00 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="../public/img/img_logo/logo1.png" style="height: 150px; width: 150px;" alt=""></a>
                        </div>
                        <p>Ch??ng t??i cung c???p cho b???n v???i ngon th???c ??n nhanh v???i c??ng th???c n???u ??n c???a ri??ng ch??ng t??i, gi??p b???n th?????ng th???c nh???ng m??n ??n ngon nh???t.</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>????ng K??</h6>
                        <p>Nh???p ??u ????i V?? C???p Nh???t S???m Nh???t</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This template is made with
                            <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib & FF.TL</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="copyright__widget">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Fastfood@support.com</a></li>
                                <li><a href="#">08287584**</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="../public/js/jquery-3.3.1.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/jquery.nice-select.min.js"></script>
    <script src="../public/js/jquery.barfiller.js"></script>
    <script src="../public/js/jquery.magnific-popup.min.js"></script>
    <script src="../public/js/jquery.slicknav.js"></script>
    <script src="../public/js/owl.carousel.min.js"></script>
    <script src="../public/js/jquery.nicescroll.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>