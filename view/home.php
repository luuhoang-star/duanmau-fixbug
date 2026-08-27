<main class="catalog mb">
    <div class="boxleft">
        <!-- BANNER SLIDESHOW -->
        <div class="banner">
            <img id="banner" src="/img/anh0.jpg" alt="Banner khuyến mãi sự kiện công nghệ">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>

        <!-- TIÊU ĐỀ SECTION SẢN PHẨM MỚI -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 20px; font-weight: 800; color: var(--dark); display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-bolt" style="color: #f59e0b;"></i> SẢN PHẨM MỚI NHẤT
            </h2>
            <a href="/index.php?act=sanpham" style="color: var(--primary); font-size: 13.5px; font-weight: 600; text-decoration: none;">Xem tất cả &rarr;</a>
        </div>

        <!-- DANH SÁCH SẢN PHẨM MỚI NHẤT -->
        <div class="items">
            <?php foreach ($spnew as $sp): ?>
                <?php
                $hinh = get_img_url($sp['img'] ?? '');
                $link = "/index.php?act=sanphamct&idsp=" . $sp['id'];
                ?>
                <div class="box_items">
                    <div class="box_items_img">
                        <a href="<?=$link?>"><img src="<?=$hinh?>" alt="<?=$sp['name']?>"></a>
                        <a class="add" href="<?=$link?>"><i class="fa-solid fa-eye"></i> XEM CHI TIẾT</a>
                    </div>
                    <a class="item_name" href="<?=$link?>" title="<?=$sp['name']?>"><?=$sp['name']?></a>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-top: 10px;">
                        <span class="price"><?=format_currency($sp['price'])?></span>
                        <span style="font-size: 12px; color: #94a3b8;"><i class="fa-solid fa-eye"></i> <?=$sp['luotxem']?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- SIDEBAR PHẢI -->
    <?php include "view/boxright.php"; ?>
</main>