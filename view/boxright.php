<div class="boxright">
    <!-- KHỐI TÀI KHOẢN -->
    <div class="mb">
        <div class="box_title">
            <span><i class="fa-solid fa-circle-user" style="color: var(--primary);"></i> TÀI KHOẢN</span>
        </div>
        <div class="box_content form_account">
            <?php if (empty($_SESSION['user'])): ?>
                <form action="/index.php?act=dangnhap" method="POST">
                    <h4>Tên đăng nhập</h4>
                    <input type="text" name="user" required placeholder="Tên đăng nhập">
                    <h4>Mật khẩu</h4>
                    <input type="password" name="pass" required placeholder="Mật khẩu">
                    
                    <div style="display: flex; align-items: center; gap: 6px; margin: 6px 0 10px;">
                        <input type="checkbox" name="remember" id="remember" style="margin: 0; cursor: pointer;">
                        <label for="remember" style="font-size: 13px; color: var(--text-muted); cursor: pointer;">Ghi nhớ tài khoản?</label>
                    </div>

                    <input type="submit" value="ĐĂNG NHẬP" name="dangnhap">
                    <?php if (!empty($loginMess)): ?>
                        <p style="color: var(--danger); font-size: 13px; margin-top: 8px; font-weight: 600;"><?=$loginMess?></p>
                    <?php endif; ?>
                </form>
                <div style="margin-top: 12px; border-top: 1px solid var(--border); padding-top: 10px;">
                    <li class="form_li"><a href="/index.php?act=quenmk"><i class="fa-solid fa-key" style="font-size: 12px;"></i> Quên mật khẩu?</a></li>
                    <li class="form_li"><a href="/index.php?act=dangky"><i class="fa-solid fa-user-plus" style="font-size: 12px;"></i> Đăng ký thành viên</a></li>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 10px 0 15px;">
                    <div style="width: 55px; height: 55px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 700; margin: 0 auto 10px; box-shadow: var(--shadow-sm);">
                        <?=mb_substr((is_array($_SESSION['user']) ? $_SESSION['user']['user'] : $_SESSION['user']), 0, 1, 'UTF-8')?>
                    </div>
                    <p style="font-size: 14px; color: var(--text-muted);">Xin chào,</p>
                    <h3 style="font-size: 16px; color: var(--dark); font-weight: 700;"><?=(is_array($_SESSION['user']) ? $_SESSION['user']['user'] : $_SESSION['user'])?></h3>
                </div>
                <div style="border-top: 1px solid var(--border); padding-top: 10px;">
                    <li class="form_li"><a href="/index.php?act=edit_taikhoan"><i class="fa-solid fa-id-card"></i> Cập nhật hồ sơ</a></li>
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 1): ?>
                        <li class="form_li"><a href="/admin/index.php" style="color: var(--accent); font-weight: 700; display: inline-block; margin-top: 6px;"><i class="fa-solid fa-gauge-high"></i> Trang Quản Trị (Admin) &rarr;</a></li>
                    <?php endif; ?>
                    <li class="form_li"><a href="/index.php?act=dangxuat" style="color: var(--text-muted);"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- KHỐI DANH MỤC -->
    <div class="mb">
        <div class="box_title">
            <span><i class="fa-solid fa-layer-group" style="color: var(--primary);"></i> DANH MỤC</span>
        </div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php foreach ($dsdm as $dm): ?>
                    <li><a href="/index.php?act=sanpham&iddm=<?=$dm['id']?>"><?=$dm['name']?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="box_search">
            <form action="/index.php?act=sanpham" method="POST">
                <input type="text" name="keyw" placeholder="🔍 Tìm kiếm sản phẩm..." required>
            </form>
        </div>
    </div>

    <!-- KHỐI TOP 10 SẢN PHẨM YÊU THÍCH -->
    <div class="mb">
        <div class="box_title">
            <span><i class="fa-solid fa-fire" style="color: var(--accent);"></i> TOP 10 YÊU THÍCH</span>
        </div>
        <div class="box_content">
            <?php $rank = 1; ?>
            <?php foreach ($dstop10 as $sp): ?>
                <?php 
                    $hinh = get_img_url($sp['img'] ?? '');
                    $linksp = "/index.php?act=sanphamct&idsp=" . $sp['id'];
                ?>
                <div class="selling_products" style="width:100%; position: relative;">
                    <span style="font-size: 11px; font-weight: 800; color: <?=($rank <= 3 ? 'var(--accent)' : '#94a3b8')?>; margin-right: 8px; min-width: 16px;">#<?=$rank++?></span>
                    <img src="<?=$hinh?>" alt="<?=$sp['name']?>">
                    <a href="<?=$linksp?>"><?=$sp['name']?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
