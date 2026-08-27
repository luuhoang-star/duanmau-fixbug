<?php
/**
 * ============================================================================
 * ADMIN MAIN CONTROLLER & ROUTER
 * ============================================================================
 * Điều hướng toàn bộ các chức năng quản trị hệ thống (Admin Panel)
 */

require_once "../global.php";
require_once "../model/pdo.php";
require_once "../model/danhmuc.php";
require_once "../model/sanpham.php";
require_once "../model/taikhoan.php";
require_once "../model/thongke.php";

// ================= BẢO VỆ PHÂN QUYỀN TRUY CẬP (ACCESS CONTROL) =================
// Nếu chưa đăng nhập hoặc không phải tài khoản Quản trị viên (role != 1) -> Chuyển hướng sang trang đăng nhập Admin
if (!isset($_SESSION['user']) || (int)($_SESSION['user']['role'] ?? 0) !== 1) {
    header("Location: login.php");
    exit();
}

// Xử lý riêng tác vụ Đăng xuất Admin (không cần nạp header/footer)
$act = $_GET['act'] ?? 'home';

if ($act === 'dangxuat') {
    dangxuat();
    header("Location: login.php");
    exit();
}

// Nạp Header layout Admin
require_once "header.php";

switch ($act) {
    // ================= 1. DASHBOARD TỔNG QUAN =================
    case 'home':
        $tongquan = load_thongke_tongquan();
        include "home.php";
        break;

    // ================= 2. QUẢN LÝ DANH MỤC =================
    case 'adddm':
        if (isset($_POST['themmoi']) && !empty(trim($_POST['tenloai'] ?? ''))) {
            $tenloai = trim($_POST['tenloai']);
            insert_danhmuc($tenloai);
            $thongbao = "Thêm mới danh mục '{$tenloai}' thành công!";
        }
        include "danhmuc/add.php";
        break;

    case 'listdm':
        $listdanhmuc = loadall_danhmuc();
        include "danhmuc/list.php";
        break;

    case 'xoadm':
        if (isset($_GET['iddm']) && (int)$_GET['iddm'] > 0) {
            delete_danhmuc((int)$_GET['iddm']);
            $thongbao = "Xóa danh mục thành công!";
        }
        $listdanhmuc = loadall_danhmuc();
        include "danhmuc/list.php";
        break;

    case 'suadm':
        if (isset($_GET['iddm']) && (int)$_GET['iddm'] > 0) {
            $dm = loadone_danhmuc((int)$_GET['iddm']);
        }
        include "danhmuc/update.php";
        break;

    case 'updatedm':
        if (isset($_POST['capnhat'])) {
            $id = (int)$_POST['id'];
            $tenloai = trim($_POST['tenloai'] ?? '');
            update_danhmuc($id, $tenloai);
            $thongbao = "Cập nhật danh mục thành công!";
        }
        $listdanhmuc = loadall_danhmuc();
        include "danhmuc/list.php";
        break;

    // ================= 3. QUẢN LÝ HÀNG HÓA / SẢN PHẨM =================
    case 'addsp':
        if (isset($_POST['themmoi'])) {
            $iddm = (int)($_POST['iddm'] ?? 0);
            $tensp = trim($_POST['tensp'] ?? '');
            $giasp = (float)($_POST['giasp'] ?? 0);
            $mota = trim($_POST['mota'] ?? '');
            
            // Xử lý upload ảnh dùng helper chung
            $hinh = upload_image('hinh', '../upload/');

            insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
            $thanhcong = "Thêm mới sản phẩm '{$tensp}' thành công!";
        }
        $listdanhmuc = loadall_danhmuc();
        include "sanpham/add.php";
        break;

    case 'listsp':
        $keyw = $_POST['keyw'] ?? "";
        $iddm = (int)($_POST['iddm'] ?? 0);
        $listdanhmuc = loadall_danhmuc();
        $listsanpham = loadall_sanpham($keyw, $iddm);
        include "sanpham/list.php";
        break;

    case 'suasp':
        if (isset($_GET['idsp']) && (int)$_GET['idsp'] > 0) {
            $sanpham = loadone_sanpham((int)$_GET['idsp']);
        }
        $listdanhmuc = loadall_danhmuc();
        include "sanpham/update.php";
        break;

    case 'updatesp':
        if (isset($_POST['capnhat'])) {
            $id = (int)$_POST['id'];
            $iddm = (int)$_POST['iddm'];
            $tensp = trim($_POST['tensp'] ?? '');
            $giasp = (float)($_POST['giasp'] ?? 0);
            $mota = trim($_POST['mota'] ?? '');

            // Upload ảnh mới nếu có
            $hinh = upload_image('hinh', '../upload/');

            update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
            $thongbao = "Cập nhật sản phẩm thành công!";
        }
        $listdanhmuc = loadall_danhmuc();
        $listsanpham = loadall_sanpham("", 0);
        include "sanpham/list.php";
        break;

    case 'soft_delete':
        if (isset($_GET['idsp']) && (int)$_GET['idsp'] > 0) {
            soft_delete((int)$_GET['idsp']);
            $thongbao = "Xóa mềm sản phẩm #" . (int)$_GET['idsp'] . " thành công! (Sản phẩm đã được ẩn)";
        }
        $listdanhmuc = loadall_danhmuc();
        $listsanpham = loadall_sanpham("", 0);
        include "sanpham/list.php";
        break;

    case 'hard_delete':
        if (isset($_GET['idsp']) && (int)$_GET['idsp'] > 0) {
            hard_delete((int)$_GET['idsp']);
            $thongbao = "Xóa vĩnh viễn sản phẩm #" . (int)$_GET['idsp'] . " khỏi CSDL thành công!";
        }
        $listdanhmuc = loadall_danhmuc();
        $listsanpham = loadall_sanpham("", 0);
        include "sanpham/list.php";
        break;

    // ================= 4. THỐNG KÊ & BÁO CÁO =================
    case 'thongke':
        $dsthongke = load_thongke_sanpham_danhmuc();
        include "thongke/list.php";
        break;

    case 'bieudo':
        $dsthongke = load_thongke_sanpham_danhmuc();
        include "thongke/bieudo.php";
        break;

    // ================= MẶC ĐỊNH =================
    default:
        $tongquan = load_thongke_tongquan();
        include "home.php";
        break;
}

// Nạp Footer layout Admin
require_once "footer.php";
?>