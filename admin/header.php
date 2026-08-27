<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Trị - SIÊU THỊ TRỰC TUYẾN</title>
    <!-- GOOGLE FONTS & FONTAWESOME CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- LOCAL CSS (Đường dẫn tuyệt đối từ root) -->
    <link rel="stylesheet" href="/css/css.css?v=<?=time()?>">
</head>
<body>
    <div class="boxcenter">
        <!-- BEGIN HEADER ADMIN -->
        <header>
            <div class="header_admin">
                <h1><i class="fa-solid fa-gauge-high"></i> HỆ THỐNG QUẢN TRỊ</h1>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-size: 13.5px; opacity: 0.9; color: #cbd5e1;"><i class="fa-solid fa-user-shield" style="color: #10b981;"></i> Quản trị viên: <strong style="color: #fff;"><?=htmlspecialchars(is_array($_SESSION['user'] ?? null) ? $_SESSION['user']['user'] : ($_SESSION['user'] ?? 'Admin'))?></strong></span>
                    <a href="/admin/index.php?act=dangxuat" style="background: rgba(239, 68, 68, 0.2); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.4); padding: 6px 14px; border-radius: 6px; font-size: 13px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="/admin/index.php"><i class="fa-solid fa-chart-pie"></i> Bảng điều khiển</a></li>
                    <li><a href="/admin/index.php?act=listdm"><i class="fa-solid fa-layer-group"></i> Danh mục</a></li>
                    <li><a href="/admin/index.php?act=listsp"><i class="fa-solid fa-box-open"></i> Hàng hóa</a></li>
                    <li><a href="/admin/index.php?act=thongke"><i class="fa-solid fa-chart-line"></i> Thống kê</a></li>
                    <li style="margin-left: auto;"><a href="/index.php" target="_blank" style="background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3);"><i class="fa-solid fa-arrow-up-right-from-square"></i> Xem Website &rarr;</a></li>
                </ul>
            </div>
        </header>
        <!-- END HEADER ADMIN -->