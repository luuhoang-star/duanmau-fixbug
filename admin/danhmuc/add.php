<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-folder-plus"></i> THÊM MỚI DANH MỤC</h1>
        <a href="index.php?act=listdm" class="btn btn-secondary" style="padding: 6px 14px; font-size: 13px;"><i class="fa-solid fa-list"></i> Quay lại danh sách</a>
    </div>

    <div class="form_content" style="max-width: 650px;">
        <form action="index.php?act=adddm" method="POST">
            <div class="form_content_container">
                <label><i class="fa-solid fa-hashtag"></i> Mã danh mục</label>
                <input type="text" name="maloai" placeholder="Mã tự động tăng theo hệ thống" disabled style="background: #f1f5f9; color: #94a3b8;">
            </div>

            <div class="form_content_container">
                <label><i class="fa-solid fa-layer-group"></i> Tên loại danh mục</label>
                <input type="text" name="tenloai" placeholder="Nhập tên loại danh mục (ví dụ: Đồng hồ, Laptop, Tai nghe...)" required>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 20px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <input type="submit" name="themmoi" value="THÊM MỚI" style="padding: 11px 24px;">
                <input type="reset" value="NHẬP LẠI" style="padding: 11px 20px;">
                <a href="index.php?act=listdm" class="btn btn-secondary" style="padding: 11px 20px;">DANH SÁCH</a>
            </div>

            <?php if (!empty($thongbao)): ?>
                <div style="background: #e8f8f5; border: 1px solid #2ecc71; color: #27ae60; padding: 12px 15px; border-radius: 6px; margin-top: 15px; font-weight: bold;">
                    ✓ <?=$thongbao?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
