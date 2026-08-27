<main class="catalog mb">
    <div class="boxleft">
        <div class="box_title">
            <span style="font-size: 16px;"><i class="fa-solid fa-filter" style="color: var(--primary); margin-right: 6px;"></i> <?=$tieude?></span>
            <span style="font-size: 13px; font-weight: 500; color: #64748b;"><?=count($dssp)?> sản phẩm</span>
        </div>

        <div class="items" style="margin-top: 20px;">
            <?php if (!empty($dssp)): ?>
                <?php foreach ($dssp as $sp): ?>
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
            <?php else: ?>
                <div style="grid-column: span 3; text-align: center; padding: 40px 20px; background: #fff; border-radius: 8px; border: 1px dashed #cbd5e1;">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 36px; color: #94a3b8; margin-bottom: 12px; display: block;"></i>
                    <h3 style="font-size: 16px; color: #64748b;">Không tìm thấy sản phẩm nào phù hợp.</h3>
                    <p style="font-size: 13px; color: #94a3b8; margin-top: 5px;">Vui lòng thử lại với từ khóa hoặc danh mục khác.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- SIDEBAR PHẢI -->
    <?php include "view/boxright.php"; ?>
</main>
