<div class="boxright">
             
             <div class="mb">
                <div class="box_title">TÀI KHOẢN</div>
                <?php if (!$_SESSION) { ?>
                <div class="box_content form_account">
                    <form action="index.php?act=dangnhap" method="POST"> <!-- đăng nhập-->
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user" id="">
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass" id=""><br>
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                   <br><input type="submit" value="Đăng nhập" name="dangnhap">
                   <br>
                   <?php if (isset ($loginMess) && $loginMess != '') {
                        echo $loginMess;
                   } ?>
                   </form>
                   <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                   <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                </div>
                <?php } else { ?>
                    <p>Hello <?=$_SESSION['user']?></p>  
                    <button><a href="index.php?act=dangxuat">Đăng xuất</a></button>
                <?php } ?>
              </div>
             <div class="mb">
                <div class="box_title">DANH MỤC</div>
                <div class="box_content2 product_portfolio">
                  <ul >
                     <?php
                     foreach ($dsdm as $dm){
                        extract($dm);
                        $linkdm = "index.php?act=sanpham&iddm=".$id;
                        echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                     } ?>
                    
                     <!-- <li><a href="">Đồng hồ </a></li>
                     <li><a href="">Laptop</a></li>
                     <li><a href="">Điện thoại</a></li>
                     <li><a href="">Ipad</a></li>
                     <li><a href="">Tivi</a></li> -->
                  </ul>
                </div>
                <div class="box_search">
                  <form action="#" method="POST">
                     <input type="text" name="" id="" placeholder="Từ khóa tìm kiếm">
                  </form>
                </div>
             </div>
             <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
             <div class="mb">
                <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
                <div class="box_content">
                     <?php
                         foreach ($dstop10 as $sp) {
                            extract($sp);
                            $linksp = "index.php?act=sanphamct&idsp=".$id;
                            $img = $img_path.$img;
                            echo '<div class="selling_products" style="width:100%;">
                            <img src="'.$img.'" alt="anh">
                            <a href="'.$linksp.'">'.$name.'</a>
                          </div>';
                         }
                     ?>
                           <!-- <div class="selling_products" style="width:100%;">  
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div> --> <!-- 1, vs 4 cái đéo dùng nữa lúc làm gui email-->
                <!-- <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div>
                <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div>
                <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div>
                <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div> -->
                </div>
             </div>
            </div>
