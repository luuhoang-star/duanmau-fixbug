<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-layer-group"></i> DANH SÁCH LOẠI HÀNG HÓA (DANH MỤC)</h1>
        <a href="index.php?act=adddm" class="btn btn-success" style="padding: 8px 16px; font-size: 13.5px;"><i class="fa-solid fa-plus"></i> Thêm danh mục mới</a>
    </div>

    <div class="form_content" style="padding: 15px;">
        <?php if (!empty($thongbao)): ?>
            <div style="background: #e8f8f5; border: 1px solid #2ecc71; color: #27ae60; padding: 12px 15px; border-radius: 6px; margin-bottom: 20px; font-weight: bold;">
                ✓ <?=$thongbao?>
            </div>
        <?php endif; ?>

        <div class="formds_loai" style="margin-bottom: 0;">
            <table>
                <tr>
                    <th style="width: 50px; text-align: center;"><input type="checkbox" id="checkall"></th>
                    <th style="width: 100px;">MÃ LOẠI</th>
                    <th>TÊN DANH MỤC</th>
                    <th style="width: 180px; text-align: center;">HÀNH ĐỘNG</th>
                </tr>
                <?php if (!empty($listdanhmuc)): ?>
                    <?php foreach ($listdanhmuc as $danhmuc): ?>
                        <?php
                        $suadm = "index.php?act=suadm&iddm=" . $danhmuc['id'];
                        $xoadm = "index.php?act=xoadm&iddm=" . $danhmuc['id'];
                        ?>
                        <tr>
                            <td style="text-align: center;"><input type="checkbox" name="check_item[]" value="<?=$danhmuc['id']?>"></td>
                            <td><strong style="color: #64748b;">#<?=$danhmuc['id']?></strong></td>
                            <td>
                                <strong style="font-size: 15px; color: var(--dark);"><?=$danhmuc['name']?></strong>
                            </td>
                            <td style="text-align: center;">
                                <div style="display: inline-flex; gap: 6px;">
                                    <a href="<?=$suadm?>" class="btn btn-primary" style="padding: 6px 12px; font-size: 13px;"><i class="fa-solid fa-pen"></i> Sửa</a>
                                    <a href="<?=$xoadm?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');" class="btn btn-danger" style="padding: 6px 12px; font-size: 13px;"><i class="fa-solid fa-trash-can"></i> Xóa</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align: center; padding: 30px; color: #94a3b8;">Chưa có danh mục nào được tạo.</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
