<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-chart-line"></i> BÁO CÁO THỐNG KÊ SẢN PHẨM THEO DANH MỤC</h1>
        <a href="index.php?act=bieudo" class="btn btn-primary" style="padding: 8px 18px; font-size: 13.5px; background: linear-gradient(135deg, #8b5cf6, #6d28d9);"><i class="fa-solid fa-chart-pie"></i> Xem biểu đồ 3D</a>
    </div>

    <div class="form_content" style="padding: 15px;">
        <div class="formds_loai" style="margin-bottom: 0;">
            <table>
                <tr>
                    <th style="width: 80px;">MÃ LOẠI</th>
                    <th>TÊN DANH MỤC</th>
                    <th style="width: 140px; text-align: center;">SỐ LƯỢNG SP</th>
                    <th style="width: 160px;">GIÁ THẤP NHẤT</th>
                    <th style="width: 160px;">GIÁ CAO NHẤT</th>
                    <th style="width: 160px;">GIÁ TRUNG BÌNH</th>
                </tr>
                <?php if (!empty($dsthongke)): ?>
                    <?php foreach ($dsthongke as $tk): ?>
                        <tr>
                            <td><strong style="color: #64748b;">#<?=$tk['id']?></strong></td>
                            <td><strong style="font-size: 14.5px; color: var(--dark);"><?=$tk['name']?></strong></td>
                            <td style="text-align: center;">
                                <span style="background: #eef2ff; color: var(--primary); font-weight: 700; padding: 4px 12px; border-radius: 12px; font-size: 13px;"><?=$tk['soluong']?> sản phẩm</span>
                            </td>
                            <td><strong style="color: var(--success);"><?=number_format($tk['gia_min'], 0, ',', '.')?> đ</strong></td>
                            <td><strong style="color: var(--accent);"><?=number_format($tk['gia_max'], 0, ',', '.')?> đ</strong></td>
                            <td><strong style="color: var(--primary);"><?=number_format($tk['gia_avg'], 0, ',', '.')?> đ</strong></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" style="text-align: center; padding: 30px; color: #94a3b8;">Không có dữ liệu thống kê.</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>