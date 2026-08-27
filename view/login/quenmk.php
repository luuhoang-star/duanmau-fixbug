<main class="catalog mb">
    <div class="boxleft">
        <div class="box_title">
            <span style="font-size: 16px;"><i class="fa-solid fa-key" style="color: var(--primary);"></i> LẤY LẠI MẬT KHẨU</span>
        </div>
        <div class="box_content form_account" style="padding: 30px; max-width: 550px;">
            <form action="index.php?act=quenmk" method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="font-weight: 600; font-size: 14px; color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-envelope"></i> Email đã đăng ký:</label>
                    <input type="email" name="email" placeholder="Nhập địa chỉ email của bạn..." required style="width: 100%; padding: 11px 14px; border: 1px solid var(--border); border-radius: 6px; font-size: 14px; background: #f8fafc;">
                </div>
                <div style="display: flex; gap: 12px;">
                    <input type="submit" name="guiemail" value="GỬI YÊU CẦU" class="btn btn-primary" style="padding: 12px 24px; font-size: 14px; width: auto;">
                    <input type="reset" value="NHẬP LẠI" class="btn btn-secondary" style="padding: 12px 20px; font-size: 14px; width: auto;">
                </div>
            </form>
            <?php if (!empty($sendMailMess)): ?>
                <div style="margin-top: 20px; padding: 14px 18px; background: #fef3c7; border: 1px solid #f59e0b; color: #b45309; border-radius: 6px; font-size: 14px;">
                    <i class="fa-solid fa-circle-info" style="margin-right: 6px;"></i> <?=$sendMailMess?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- SIDEBAR PHẢI -->
    <?php include "view/boxright.php"; ?>
</main>