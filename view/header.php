<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIÊU THỊ TRỰC TUYẾN - Mua Sắm Đồ Công Nghệ & Phụ Kiện Chính Hãng</title>
    <!-- GOOGLE FONTS & FONTAWESOME CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- LOCAL CSS (Đường dẫn tuyệt đối từ root) -->
    <link rel="stylesheet" href="/css/css.css?v=<?=time()?>">
</head>
<body>
    <div class="boxcenter">
        <!-- BEGIN HEADER -->
        <header>
            <div class="header">
                <h1><i class="fa-solid fa-store"></i> SIÊU THỊ TRỰC TUYẾN</h1>
                <p style="margin-top: 6px; font-size: 14px; opacity: 0.9; font-weight: 400; letter-spacing: 0.5px;">Hệ thống bán lẻ thiết bị công nghệ & phụ kiện uy tín hàng đầu</p>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="/index.php"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                    <li class="dropdown">
                        <a class="dropdownbtn" href="/index.php?act=sanpham"><i class="fa-solid fa-layer-group"></i> Danh mục <i class="fa-solid fa-chevron-down" style="font-size: 11px; margin-left: 3px;"></i></a>
                        <div class="dropdown_content">
                            <?php foreach ($dsdm as $dm): ?>
                                <a href="/index.php?act=sanpham&iddm=<?=$dm['id']?>"><?=$dm['name']?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li><a href="/index.php?act=sanpham"><i class="fa-solid fa-mobile-screen-button"></i> Sản phẩm</a></li>
                    <li><a href="#"><i class="fa-solid fa-circle-info"></i> Giới thiệu</a></li>
                    <li><a href="#"><i class="fa-solid fa-phone"></i> Liên hệ</a></li>
                    <li><a href="#"><i class="fa-solid fa-comments"></i> Góp ý</a></li>
                    <li><a href="#"><i class="fa-solid fa-circle-question"></i> Hỏi đáp</a></li>
                </ul>
            </div>
        </header>
        <!-- END HEADER -->