<main class="catalog mb">
    <div class="boxleft">
        <!-- 1. CHI TIẾT SẢN PHẨM CHÍNH -->
        <div class="mb">
            <div class="box_title">
                <span style="font-size: 16px;"><i class="fa-solid fa-circle-info" style="color: var(--primary);"></i> CHI TIẾT SẢN PHẨM</span>
            </div>
            <div class="box_content" style="padding: 30px;">
                <?php
                $hinh = get_img_url($sp['img'] ?? '');
                ?>
                <div style="display: grid; grid-template-columns: 1fr 1.3fr; gap: 35px; align-items: start; margin-bottom: 25px;">
                    <!-- ẢNH LỚN -->
                    <div style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; text-align: center; background: #f8fafc; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                        <img src="<?=$hinh?>" alt="<?=$sp['name']?>" style="max-width: 100%; max-height: 320px; object-fit: contain;">
                    </div>

                    <!-- THÔNG TIN SẢN PHẨM -->
                    <div>
                        <h1 style="font-size: 22px; font-weight: 800; color: var(--dark); line-height: 1.4; margin-bottom: 12px;"><?=$sp['name']?></h1>
                        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 18px; font-size: 13.5px; color: #64748b;">
                            <span><i class="fa-solid fa-eye"></i> <?=$sp['luotxem']?> lượt xem</span>
                            <span>•</span>
                            <span style="color: var(--success); font-weight: 600;"><i class="fa-solid fa-circle-check"></i> Còn hàng</span>
                        </div>

                        <div style="background: #fff1f2; border: 1px solid #ffe4e6; border-radius: 8px; padding: 15px 20px; margin-bottom: 20px;">
                            <span style="font-size: 13px; color: #9f1239; font-weight: 600; display: block; margin-bottom: 2px;">Giá ưu đãi đặc biệt:</span>
                            <span style="font-size: 28px; font-weight: 800; color: var(--accent);"><?=format_currency($sp['price'])?></span>
                        </div>

                        <div style="font-size: 14.5px; color: #334155; line-height: 1.7; margin-bottom: 20px;">
                            <strong style="color: var(--dark); display: block; margin-bottom: 6px;"><i class="fa-solid fa-file-lines"></i> Đặc điểm nổi bật:</strong>
                            <p style="background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid #e2e8f0;"><?=$sp['mota']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. BÌNH LUẬN & ĐÁNH GIÁ -->
        <div class="mb">
            <div class="box_title">
                <span><i class="fa-solid fa-comments" style="color: var(--primary);"></i> BÌNH LUẬN & ĐÁNH GIÁ (<?=count($binhluan)?>)</span>
            </div>
            <div class="box_content2 product_portfolio binhluan" style="padding: 20px;">
                <?php if (!empty($binhluan)): ?>
                    <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px;">
                        <?php foreach ($binhluan as $bl): ?>
                            <div style="display: flex; gap: 14px; padding: 12px 16px; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0;">
                                <div style="width: 38px; height: 38px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;">
                                    <?=mb_substr($bl['user'] ?? 'U', 0, 1, 'UTF-8')?>
                                </div>
                                <div style="flex: 1;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                                        <strong style="font-size: 14px; color: var(--dark);"><?=$bl['user']?></strong>
                                        <span style="font-size: 12px; color: #94a3b8;"><?=date("d/m/Y", strtotime($bl['ngaybinhluan']))?></span>
                                    </div>
                                    <p style="font-size: 14px; color: #334155; margin: 0;"><?=$bl['noidung']?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p style="color: #94a3b8; padding: 15px 0; text-align: center;">Chưa có bình luận nào. Hãy là người đầu tiên để lại ý kiến!</p>
                <?php endif; ?>
            </div>

            <!-- FORM GỬI BÌNH LUẬN -->
            <div class="box_search" style="padding: 16px 20px; background: #ffffff; border: 1px solid var(--border); border-top: none;">
                <?php if (!empty($_SESSION['user'])): ?>
                    <form action="/index.php?act=sanphamct&idsp=<?=$sp['id']?>" method="POST" style="display: flex; gap: 12px; align-items: center;">
                        <input type="hidden" name="idpro" value="<?=$sp['id']?>">
                        <input type="text" name="noidung" placeholder="✍️ Viết cảm nghĩ hoặc câu hỏi của bạn về sản phẩm này..." required style="flex: 1; padding: 11px 16px; border: 1px solid var(--border); border-radius: 8px; font-size: 14px; margin-bottom: 0;">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận" class="btn btn-primary" style="padding: 11px 22px; font-size: 14px; margin-top: 0;">
                    </form>
                <?php else: ?>
                    <div style="display: flex; align-items: center; justify-content: space-between; background: #f8fafc; padding: 12px 18px; border-radius: 8px; border: 1px dashed #cbd5e1;">
                        <span style="font-size: 13.5px; color: #64748b;"><i class="fa-solid fa-lock" style="color: #f59e0b; margin-right: 6px;"></i> Vui lòng đăng nhập tài khoản để tham gia gửi bình luận.</span>
                        <a href="/index.php?act=dangnhap" class="btn btn-primary" style="padding: 6px 14px; font-size: 13px;">Đăng nhập ngay</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- 3. SẢN PHẨM CÙNG LOẠI & GỢI Ý -->
        <div class="mb">
            <div class="box_title">
                <span><i class="fa-solid fa-tags" style="color: var(--primary);"></i> SẢN PHẨM CÙNG LOẠI & GỢI Ý NỔI BẬT</span>
                <span style="font-size: 13px; font-weight: 500; color: #64748b;"><?=count($sp_cungloai)?> sản phẩm liên quan</span>
            </div>
            <div class="box_content" style="padding: 24px;">
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px;">
                    <?php if (!empty($sp_cungloai)): ?>
                        <?php foreach ($sp_cungloai as $cungloai): ?>
                            <?php
                            $hinh_cl = get_img_url($cungloai['img'] ?? '');
                            $link_cl = "/index.php?act=sanphamct&idsp=" . $cungloai['id'];
                            ?>
                            <div style="border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px; background: #fff; text-align: center; transition: all 0.3s; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
                                <div style="height: 130px; display: flex; align-items: center; justify-content: center; background: #f8fafc; border-radius: var(--radius-sm); margin-bottom: 12px; padding: 8px;">
                                    <a href="<?=$link_cl?>" style="display: block; max-height: 100%;"><img src="<?=$hinh_cl?>" alt="<?=$cungloai['name']?>" style="max-width: 100%; max-height: 115px; object-fit: contain;"></a>
                                </div>
                                <div>
                                    <a href="<?=$link_cl?>" style="color: var(--dark); font-weight: 700; font-size: 13.5px; text-decoration: none; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4; min-height: 38px;" title="<?=$cungloai['name']?>"><?=$cungloai['name']?></a>
                                    <span style="color: var(--accent); font-weight: 800; font-size: 15px; display: block; margin: 8px 0 10px;"><?=format_currency($cungloai['price'])?></span>
                                    <a href="<?=$link_cl?>" class="btn btn-primary" style="display: block; width: 100%; padding: 7px 0; font-size: 12.5px; text-align: center; border-radius: var(--radius-sm);"><i class="fa-solid fa-eye"></i> Xem ngay</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="color: #94a3b8; grid-column: span 3; text-align: center; padding: 20px;">Không có sản phẩm nào khác cùng danh mục.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SIDEBAR PHẢI -->
    <?php include "view/boxright.php"; ?>
</main>