<?php
if (isset($sanpham) && is_array($sanpham)) {
    extract($sanpham);
}
$hinh = get_img_url($img ?? '');
$has_real_img = (!empty($img) && file_exists(__DIR__ . '/../../upload/' . $img));
?>
<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-pen-to-square"></i> CẬP NHẬT SẢN PHẨM</h1>
        <a href="index.php?act=listsp" class="btn btn-secondary" style="padding: 6px 14px; font-size: 13px;"><i class="fa-solid fa-list"></i> Quay lại danh sách</a>
    </div>

    <div class="form_content">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 20px;">
                <!-- CỘT TRÁI: THÔNG TIN CƠ BẢN -->
                <div>
                    <div class="form_content_container">
                        <label><i class="fa-solid fa-layer-group"></i> Danh mục sản phẩm</label>
                        <select name="iddm" required style="width: 100%;">
                            <?php foreach ($listdanhmuc as $value): ?>
                                <option value="<?=$value['id']?>" <?=(isset($iddm) && $iddm == $value['id']) ? 'selected' : ''?>>
                                    <?=$value['name']?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form_content_container">
                        <label><i class="fa-solid fa-tag"></i> Tên sản phẩm</label>
                        <input type="text" name="tensp" value="<?=$name ?? ''?>" required placeholder="Nhập tên sản phẩm...">
                    </div>

                    <div class="form_content_container">
                        <label><i class="fa-solid fa-money-bill-wave"></i> Đơn giá (VNĐ)</label>
                        <input type="number" name="giasp" value="<?=$price ?? 0?>" required min="0" placeholder="Nhập giá bán...">
                    </div>
                </div>

                <!-- CỘT PHẢI: HÌNH ẢNH SẢN PHẨM -->
                <div>
                    <label><i class="fa-solid fa-image"></i> Hình ảnh sản phẩm</label>
                    <div style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 15px; text-align: center; background: #f8fafc; margin-bottom: 12px;">
                        <img src="<?=$hinh?>" alt="<?=$name ?? ''?>" style="max-width: 100%; max-height: 140px; object-fit: contain; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <?php if ($has_real_img): ?>
                            <p style="font-size: 12px; color: #64748b; margin-top: 8px;">File hiện tại: <strong><?=$img?></strong></p>
                        <?php else: ?>
                            <p style="font-size: 12px; color: #94a3b8; margin-top: 8px;">(Chưa có file ảnh thực tế)</p>
                        <?php endif; ?>
                    </div>
                    <label style="font-size: 13px; color: #64748b; font-weight: 500;">Chọn hình ảnh mới để thay thế:</label>
                    <input type="file" name="hinh" accept="image/*" style="font-size: 13px; padding: 8px; background: #fff;">
                </div>
            </div>

            <!-- HÀNG DƯỚI: MÔ TẢ -->
            <div class="form_content_container">
                <label><i class="fa-solid fa-align-left"></i> Mô tả chi tiết sản phẩm</label>
                <textarea name="mota" rows="5" placeholder="Nhập mô tả thông tin sản phẩm..."><?=$mota ?? ''?></textarea>
            </div>

            <!-- NÚT HÀNH ĐỘNG -->
            <div style="display: flex; gap: 12px; margin-top: 10px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <input type="hidden" name="id" value="<?=$id ?? ''?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT SẢN PHẨM" style="padding: 11px 24px;">
                <input type="reset" value="NHẬP LẠI" style="padding: 11px 20px;">
                <a href="index.php?act=listsp" class="btn btn-secondary" style="padding: 11px 20px;">DANH SÁCH</a>
            </div>

            <?php if (!empty($thongbao)): ?>
                <div style="background: #e8f8f5; border: 1px solid #2ecc71; color: #27ae60; padding: 12px 15px; border-radius: 6px; margin-top: 15px; font-weight: bold;">
                    ✓ <?=$thongbao?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>