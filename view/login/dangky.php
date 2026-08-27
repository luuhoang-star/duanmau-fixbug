<main class="catalog mb">
    <div class="boxleft">
        <div class="box_title">
            <span style="font-size: 16px;"><i class="fa-solid fa-user-plus" style="color: var(--primary);"></i> ĐĂNG KÝ THÀNH VIÊN MỚI</span>
        </div>
        <div class="box_content form_account" style="padding: 30px; max-width: 550px;">
            <form action="index.php?act=dangky" method="POST">
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-envelope"></i> Địa chỉ Email:</label>
                    <input type="email" name="email" placeholder="example@domain.com" required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-user"></i> Tên đăng nhập:</label>
                    <input type="text" name="user" placeholder="Nhập tên tài khoản của bạn" required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-lock"></i> Mật khẩu bảo mật:</label>
                    <input type="password" name="pass" placeholder="Nhập mật khẩu..." required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="display: flex; gap: 12px; margin-top: 10px;">
                    <input type="submit" name="dangky" value="ĐĂNG KÝ TÀI KHOẢN" class="btn btn-primary" style="padding: 12px 24px; font-size: 14px; width: auto;">
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