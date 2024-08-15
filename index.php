<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "global.php";
include "view/header.php";
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch($act) {
        case "sanphamct":
            if(isset($_POST['guibinhluan'])){
                insert_binhluan($_POST['idpro'], $_POST['noidung']);
            }
            if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                $sp = loadone_sanpham($_GET['idsp']);
                $sp_cungloai = loadsp_cungloai($_GET['idsp'], $sp['iddm']);
                $binhluan = load_binhluan($_GET['idsp']);
                include "view/chitietsanpham.php";
            }
            break;
        case "dangky":
            if(isset($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass); 
                $thongbao = "Dang ky thanh cong";
            }
                include "view/login/dangky.php"; // dangky.php
                break;
        case "dangnhap":
            if (isset($_POST['dangnhap'])) {
                $loginMess = dangnhap($_POST['user'], $_POST['pass']); 
                include "view/home.php";        //boxright.php
            }
            break;
        case "dangxuat":
            dangxuat();
            include "view/home.php";  //.dựa vào case dang nhap có name user, để đăng xuất / boxright
            break;
        case "quenmk":
            if (isset($_POST['guiemail'])) {   // login/quenmk
                $email = $_POST['email'];
                sendMail($email);
                $sendMailMess = sendMail($email);  // gửi email để lấy mk
            }
            include "view/login/quenmk.php";
            break;
    
    
    
        }

} else {
    include "view/home.php";
}

include "view/footer.php";
?>
 
       
        
       