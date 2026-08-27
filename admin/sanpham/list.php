<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-box-open"></i> DANH SÁCH HÀNG HÓA (SẢN PHẨM)</h1>
        <a href="index.php?act=addsp" class="btn btn-success" style="padding: 8px 16px; font-size: 13.5px;"><i class="fa-solid fa-plus"></i> Thêm sản phẩm mới</a>
    </div>

    <div class="form_content" style="padding: 15px;">
        <?php if (!empty($thongbao)): ?>
            <div style="background: #e8f8f5; border: 1px solid #2ecc71; color: #27ae60; padding: 12px 15px; border-radius: 6px; margin-bottom: 20px; font-weight: bold;">
                ✓ <?=$thongbao?>
            </div>
        <?php endif; ?>

        <!-- THANH CÔNG CỤ TÌM KIẾM & LỌC -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 15px; margin-bottom: 20px;">
            <form action="index.php?act=listsp" method="POST" style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 240px; margin-bottom: 0;">
                    <input type="text" name="keyw" placeholder="🔍 Tìm kiếm sản phẩm theo tên..." value="<?=$keyw ?? ''?>" style="margin-bottom: 0; background: #fff;">
                </div>
                <div style="min-width: 200px; margin-bottom: 0;">
                    <select name="iddm" style="margin-bottom: 0; background: #fff;">
                        <option value="0">Tất cả danh mục</option>
                        <?php foreach ($listdanhmuc as $danhmuc): ?>
                            <option value="<?=$danhmuc['id']?>" <?=(isset($iddm) && $iddm == $danhmuc['id']) ? 'selected' : ''?>>
                                <?=$danhmuc['name']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" name="clickOK" value="Tìm kiếm" class="btn btn-primary" style="padding: 10px 20px; font-size: 14px;">
            </form>
        </div>

        <!-- BẢNG DỮ LIỆU SẢN PHẨM -->
        <div class="formds_loai" style="margin-bottom: 0;">
            <table>
                <tr>
                    <th style="width: 40px; text-align: center;"><input type="checkbox" id="checkall"></th>
                    <th style="width: 70px;">MÃ</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th style="width: 140px;">ĐƠN GIÁ</th>
                    <th style="width: 110px; text-align: center;">HÌNH ẢNH</th>
                    <th style="width: 90px; text-align: center;">LƯỢT XEM</th>
                    <th style="width: 250px; text-align: center;">HÀNH ĐỘNG</th>
                </tr>
                <?php if (!empty($listsanpham)): ?>
                    <?php foreach ($listsanpham as $sanpham): ?>
                        <?php
                        $suasp = "index.php?act=suasp&idsp=" . $sanpham['id'];
                        $hard_delete = "index.php?act=hard_delete&idsp=" . $sanpham['id'];
                        $soft_delete = "index.php?act=soft_delete&idsp=" . $sanpham['id'];
                        $hinh = get_img_url($sanpham['img'] ?? '');
                        ?>
                        <tr>
                            <td style="text-align: center;"><input type="checkbox" name="check_item[]" value="<?=$sanpham['id']?>"></td>
                            <td><strong style="color: #64748b;">#<?=$sanpham['id']?></strong></td>
                            <td>
                                <strong style="font-size: 14.5px; color: var(--dark); display: block;"><?=$sanpham['name']?></strong>
                                <?php if (!empty($sanpham['tendm'])): ?>
                                    <span style="font-size: 12px; color: #64748b; background: #e2e8f0; padding: 2px 8px; border-radius: 12px; display: inline-block; margin-top: 4px;"><?=$sanpham['tendm']?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong style="color: var(--accent); font-size: 15px;"><?=format_currency($sanpham['price'])?></strong>
                            </td>
                            <td style="text-align: center;">
                                <img src="<?=$hinh?>" alt="<?=$sanpham['name']?>" style="width: 60px; height: 60px; object-fit: contain; border-radius: 6px; border: 1px solid #cbd5e1; background: #f8fafc; padding: 4px;">
                            </td>
                            <td style="text-align: center;">
                                <span style="font-weight: 600; color: #64748b;"><?=$sanpham['luotxem']?></span>
                            </td>
                            <td style="text-align: center;">
                                <div style="display: inline-flex; gap: 6px;">
                                    <a href="<?=$suasp?>" class="btn btn-primary" style="padding: 6px 12px; font-size: 13px;"><i class="fa-solid fa-pen"></i> Sửa</a>
                                    <a href="<?=$soft_delete?>" onclick="return confirm('Bạn có chắc chắn muốn XÓA MỀM sản phẩm này? (Sản phẩm sẽ bị ẩn khỏi danh sách)');" class="btn btn-warning" style="padding: 6px 12px; font-size: 13px;"><i class="fa-solid fa-eye-slash"></i> Xoá mềm</a>
                                    <a href="<?=$hard_delete?>" onclick="return confirm('Bạn có chắc chắn muốn XÓA VĨNH VIỄN sản phẩm này khỏi CSDL?');" class="btn btn-danger" style="padding: 6px 12px; font-size: 13px;"><i class="fa-solid fa-trash-can"></i> Xoá cứng</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" style="text-align: center; padding: 35px; color: #94a3b8;"><i class="fa-solid fa-box-open" style="font-size: 30px; margin-bottom: 10px; display: block;"></i>Không có sản phẩm nào phù hợp.</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>