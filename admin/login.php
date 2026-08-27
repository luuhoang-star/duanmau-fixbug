<?php
/**
 * ============================================================================
 * TRANG ĐĂNG NHẬP DÀNH RIÊNG CHO QUẢN TRỊ VIÊN (ADMIN LOGIN)
 * ============================================================================
 */

require_once "../global.php";
require_once "../model/pdo.php";
require_once "../model/taikhoan.php";

$error = "";

// Xử lý khi bấm nút Đăng nhập Admin
if (isset($_POST['admin_login'])) {
    $user = trim($_POST['user'] ?? '');
    $pass = trim($_POST['pass'] ?? '');

    if ($user !== "" && $pass !== "") {
        $taikhoan = checkuser($user, $pass);
        
        // Kiểm tra xem tài khoản có tồn tại và có quyền Admin (role = 1) hay không
        if (is_array($taikhoan) && !empty($taikhoan)) {
            if ((int)($taikhoan['role'] ?? 0) === 1) {
                $_SESSION['user'] = $taikhoan;
                header("Location: index.php");
                exit();
            } else {
                $error = "Tài khoản của bạn không có quyền truy cập vào Khu vực Quản trị!";
            }
        } else {
            $error = "Tên đăng nhập hoặc mật khẩu không chính xác!";
        }
    } else {
        $error = "Vui lòng nhập đầy đủ Tên đăng nhập và Mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quản Trị Viên (Admin Portal)</title>
    <!-- GOOGLE FONTS & FONTAWESOME CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/css/css.css">
</head>
<body style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">

    <div style="width: 100%; max-width: 440px; background: #ffffff; border-radius: 16px; padding: 40px 35px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4); border: 1px solid rgba(255,255,255,0.1);">
        <!-- LOGO / ICON ADMIN -->
        <div style="text-align: center; margin-bottom: 28px;">
            <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #4f46e5, #312e81); border-radius: 16px; display: inline-flex; align-items: center; justify-content: center; color: white; font-size: 26px; box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4); margin-bottom: 15px;">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin-bottom: 6px;">CỔNG QUẢN TRỊ VIÊN</h2>
            <p style="font-size: 13.5px; color: #64748b;">Đăng nhập để quản lý toàn bộ hệ thống</p>
        </div>

        <?php if (!empty($error)): ?>
            <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 12px 16px; border-radius: 8px; font-size: 13.5px; font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span><?=$error?></span>
            </div>
        <?php endif; ?>

        <!-- FORM ĐĂNG NHẬP -->
        <form action="login.php" method="POST">
            <div style="margin-bottom: 18px;">
                <label style="font-size: 13.5px; font-weight: 700; color: #334155; display: block; margin-bottom: 6px;"><i class="fa-solid fa-user" style="color: #4f46e5; margin-right: 6px;"></i> Tài khoản Quản trị:</label>
                <input type="text" name="user" required placeholder="Nhập tên tài khoản Admin..." value="<?=$user ?? ''?>" style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; background: #f8fafc; font-family: inherit;">
            </div>

            <div style="margin-bottom: 24px;">
                <label style="font-size: 13.5px; font-weight: 700; color: #334155; display: block; margin-bottom: 6px;"><i class="fa-solid fa-lock" style="color: #4f46e5; margin-right: 6px;"></i> Mật khẩu bảo mật:</label>
                <input type="password" name="pass" required placeholder="Nhập mật khẩu Admin..." style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; background: #f8fafc; font-family: inherit;">
            </div>

            <input type="submit" name="admin_login" value="ĐĂNG NHẬP HỆ THỐNG" style="width: 100%; padding: 13px; background: linear-gradient(135deg, #4f46e5, #4338ca); color: white; border: none; border-radius: 8px; font-size: 14.5px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35); transition: all 0.2s;">
        </form>

        <div style="text-align: center; margin-top: 24px; border-top: 1px solid #e2e8f0; padding-top: 18px;">
            <a href="/index.php" style="color: #64748b; font-size: 13px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 500;">
                <i class="fa-solid fa-arrow-left"></i> Quay lại trang chủ bán hàng
            </a>
        </div>
    </div>

</body>
</html>
