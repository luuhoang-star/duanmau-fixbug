<?php
/**
 * ============================================================================
 * CLIENT MAIN CONTROLLER & ROUTER
 * ============================================================================
 * Điều hướng toàn bộ các trang và chức năng phía người dùng (Client)
 */

require_once "global.php";
require_once "model/pdo.php";
require_once "model/danhmuc.php";
require_once "model/sanpham.php";
require_once "model/binhluan.php";
require_once "model/taikhoan.php";

// Tự động chuyển hướng nếu người dùng gõ URL không có đuôi .php (/admin/login hoặc /admin)
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
if (preg_match('#^/admin/login/?(\?.*)?$#i', $request_uri)) {
    header("Location: /admin/login.php");
    exit();
}
if (preg_match('#^/admin/?(\?.*)?$#i', $request_uri)) {
    header("Location: /admin/index.php");
    exit();
}

// Dữ liệu dùng chung hiển thị trên Menu và Sidebar
$dsdm = loadall_danhmuc();
$spnew = loadall_sanpham_home();
$dstop10 = loadall_sanpham_top10();

// Nạp Header giao diện
require_once "view/header.php";

// Lấy hành động yêu cầu từ URL (mặc định là trang chủ 'home')
$act = $_GET['act'] ?? 'home';

switch ($act) {
    // 1. TRANG DANH SÁCH SẢN PHẨM & TÌM KIẾM / LỌC DANH MỤC
    case 'sanpham':
        $keyw = $_POST['keyw'] ?? ($_GET['keyw'] ?? "");
        $iddm = isset($_GET['iddm']) ? (int)$_GET['iddm'] : (isset($_POST['iddm']) ? (int)$_POST['iddm'] : 0);
        
        if ($iddm > 0) {
            $tendm = load_ten_dm($iddm);
            $tieude = "DANH MỤC: " . mb_strtoupper($tendm, 'UTF-8');
        } elseif ($keyw != "") {
            $tieude = "KẾT QUẢ TÌM KIẾM: '" . htmlspecialchars($keyw) . "'";
        } else {
            $tieude = "TẤT CẢ SẢN PHẨM";
        }
        
        $dssp = loadall_sanpham($keyw, $iddm);
        include "view/sanpham.php";
        break;

    // 2. TRANG CHI TIẾT SẢN PHẨM & GỬI BÌNH LUẬN
    case 'sanphamct':
        if (isset($_POST['guibinhluan']) && !empty(trim($_POST['noidung']))) {
            $idpro = (int)$_POST['idpro'];
            $noidung = trim($_POST['noidung']);
            insert_binhluan($idpro, $noidung);
        }

        if (isset($_GET['idsp']) && (int)$_GET['idsp'] > 0) {
            $idsp = (int)$_GET['idsp'];
            tang_luotxem($idsp);
            $sp = loadone_sanpham($idsp);
            if ($sp) {
                $sp_cungloai = loadsp_cungloai($idsp, $sp['iddm']);
                $binhluan = load_binhluan($idsp);
                include "view/chitietsanpham.php";
                break;
            }
        }
        include "view/home.php";
        break;

    // 3. ĐĂNG KÝ THÀNH VIÊN
    case 'dangky':
        if (isset($_POST['dangky'])) {
            $email = trim($_POST['email'] ?? '');
            $user = trim($_POST['user'] ?? '');
            $pass = trim($_POST['pass'] ?? '');
            
            if ($email !== "" && $user !== "" && $pass !== "") {
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đăng ký tài khoản thành công! Bạn có thể đăng nhập ngay.";
            } else {
                $thongbao = "Vui lòng nhập đầy đủ các trường thông tin.";
            }
        }
        include "view/login/dangky.php";
        break;

    // 4. ĐĂNG NHẬP
    case 'dangnhap':
        if (isset($_POST['dangnhap'])) {
            $user = trim($_POST['user'] ?? '');
            $pass = trim($_POST['pass'] ?? '');
            if (!dangnhap($user, $pass)) {
                $loginMess = "Tên đăng nhập hoặc mật khẩu không chính xác!";
            }
        }
        include "view/home.php";
        break;

    // 5. ĐĂNG XUẤT
    case 'dangxuat':
        dangxuat();
        include "view/home.php";
        break;

    // 6. QUÊN MẬT KHẨU
    case 'quenmk':
        if (isset($_POST['guiemail'])) {
            $email = trim($_POST['email'] ?? '');
            $checkemail = checkemail($email);
            if (is_array($checkemail)) {
                $sendMailMess = "Mật khẩu của bạn là: <strong>" . htmlspecialchars($checkemail['pass']) . "</strong>";
            } else {
                $sendMailMess = "Email không tồn tại trong hệ thống!";
            }
        }
        include "view/login/quenmk.php";
        break;

    // 7. CẬP NHẬT HỒ SƠ TÀI KHOẢN
    case 'edit_taikhoan':
        if (isset($_POST['capnhat'])) {
            $id = (int)$_POST['id'];
            $user = trim($_POST['user'] ?? '');
            $pass = trim($_POST['pass'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $address = trim($_POST['address'] ?? '');
            $tel = trim($_POST['tel'] ?? '');

            update_taikhoan($id, $user, $pass, $email, $address, $tel);
            $_SESSION['user'] = checkuser($user, $pass);
            $thongbao = "Cập nhật hồ sơ tài khoản thành công!";
        }
        include "view/login/edit_taikhoan.php";
        break;

    // MẶC ĐỊNH: TRANG CHỦ
    default:
        include "view/home.php";
        break;
}

// Nạp Footer giao diện
require_once "view/footer.php";
?>