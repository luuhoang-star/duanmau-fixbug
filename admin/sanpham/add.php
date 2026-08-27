<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-plus-circle"></i> THÊM MỚI SẢN PHẨM</h1>
        <a href="index.php?act=listsp" class="btn btn-secondary" style="padding: 6px 14px; font-size: 13px;"><i class="fa-solid fa-list"></i> Quay lại danh sách</a>
    </div>

    <div class="form_content">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 20px;">
                <!-- CỘT TRÁI: THÔNG TIN CƠ BẢN -->
                <div>
                    <div class="form_content_container">
                        <label><i class="fa-solid fa-layer-group"></i> Danh mục sản phẩm</label>
                        <select name="iddm" required style="width: 100%;">
                            <option value="">-- Chọn danh mục sản phẩm --</option>
                            <?php foreach ($listdanhmuc as $danhmuc): ?>
                                <option value="<?=$danhmuc['id']?>"><?=$danhmuc['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form_content_container">
                        <label><i class="fa-solid fa-tag"></i> Tên sản phẩm</label>
                        <input type="text" name="tensp" placeholder="Nhập tên sản phẩm..." required>
                    </div>

                    <div class="form_content_container">
                        <label><i class="fa-solid fa-money-bill-wave"></i> Đơn giá (VNĐ)</label>
                        <input type="number" name="giasp" placeholder="Nhập giá bán..." required min="0">
                    </div>
                </div>

                <!-- CỘT PHẢI: HÌNH ẢNH SẢN PHẨM -->
                <div>
                    <label><i class="fa-solid fa-image"></i> Hình ảnh sản phẩm</label>
                    <div style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 25px 15px; text-align: center; background: #f8fafc; margin-bottom: 12px;">
                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 36px; color: #94a3b8; margin-bottom: 10px; display: block;"></i>
                        <span style="font-size: 13px; color: #64748b; display: block; margin-bottom: 10px;">Chọn file ảnh tải lên</span>
                        <input type="file" name="hinh" accept="image/*" style="font-size: 13px; padding: 6px; background: #fff;">
                    </div>
                </div>
            </div>

            <!-- HÀNG DƯỚI: MÔ TẢ -->
            <div class="form_content_container">
                <label><i class="fa-solid fa-align-left"></i> Mô tả chi tiết sản phẩm</label>
                <textarea name="mota" rows="5" placeholder="Nhập mô tả thông tin sản phẩm..."></textarea>
            </div>

            <!-- NÚT HÀNH ĐỘNG -->
            <div style="display: flex; gap: 12px; margin-top: 10px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <input type="submit" name="themmoi" value="THÊM MỚI SẢN PHẨM" style="padding: 11px 24px;">
                <input type="reset" value="NHẬP LẠI" style="padding: 11px 20px;">
                <a href="index.php?act=listsp" class="btn btn-secondary" style="padding: 11px 20px;">DANH SÁCH</a>
            </div>

            <?php if (!empty($thanhcong)): ?>
                <div style="background: #e8f8f5; border: 1px solid #2ecc71; color: #27ae60; padding: 12px 15px; border-radius: 6px; margin-top: 15px; font-weight: bold;">
                    ✓ <?=$thanhcong?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>