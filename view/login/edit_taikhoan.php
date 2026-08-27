<main class="catalog mb">
    <div class="boxleft">
        <div class="box_title">
            <span style="font-size: 16px;"><i class="fa-solid fa-user-gear" style="color: var(--primary);"></i> CẬP NHẬT HỒ SƠ CÁ NHÂN</span>
        </div>
        <div class="box_content form_account" style="padding: 30px; max-width: 600px;">
            <?php
            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
            }
            ?>
            <form action="index.php?act=edit_taikhoan" method="POST">
                <input type="hidden" name="id" value="<?=$id ?? ''?>">
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-envelope"></i> Email tài khoản:</label>
                    <input type="email" name="email" value="<?=$email ?? ''?>" required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-user"></i> Tên đăng nhập:</label>
                    <input type="text" name="user" value="<?=$user ?? ''?>" required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-lock"></i> Mật khẩu đăng nhập:</label>
                    <input type="password" name="pass" value="<?=$pass ?? ''?>" required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-location-dot"></i> Địa chỉ nhận hàng:</label>
                    <input type="text" name="address" value="<?=$address ?? ''?>" placeholder="Nhập địa chỉ nhà, số đường, quận huyện..." style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-phone"></i> Số điện thoại:</label>
                    <input type="text" name="tel" value="<?=$tel ?? ''?>" placeholder="Nhập số điện thoại liên hệ..." style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="display: flex; gap: 12px;">
                    <input type="submit" name="capnhat" value="LƯU THAY ĐỔI" class="btn btn-primary" style="padding: 12px 24px; font-size: 14px; width: auto;">
                    <input type="reset" value="NHẬP LẠI" class="btn btn-secondary" style="padding: 12px 20px; font-size: 14px; width: auto;">
                </div>
            </form>
            <?php if (!empty($thongbao)): ?>
                <div style="margin-top: 20px; padding: 12px 16px; background: #e8f8f5; border: 1px solid #2ecc71; color: #27ae60; border-radius: 6px; font-weight: 600;">
                    ✓ <?=$thongbao?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- SIDEBAR PHẢI -->
    <?php include "view/boxright.php"; ?>
</main>
