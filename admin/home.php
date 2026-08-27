<div style="width: 100%; clear: both; margin: 0 auto;">
    <!-- TIÊU ĐỀ DASHBOARD -->
    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 15px 20px; margin-bottom: 25px;">
        <h1 style="font-size: 20px; color: #1e293b; font-weight: 700; margin: 0;">TỔNG QUAN HỆ THỐNG QUẢN TRỊ</h1>
    </div>

    <!-- CÁC THẺ THỐNG KÊ NHANH -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; width: 100%; box-sizing: border-box;">
        <div style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 22px 15px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
            <h3 style="font-size: 15px; margin-bottom: 8px; letter-spacing: 0.5px; opacity: 0.95;">DANH MỤC</h3>
            <span style="font-size: 32px; font-weight: bold; display: block; line-height: 1.2;"><?=$tongquan['count_dm'] ?? 0?></span>
            <div style="margin-top: 10px;"><a href="index.php?act=listdm" style="color: #ffffff; text-decoration: underline; font-size: 13px;">Chi tiết &rarr;</a></div>
        </div>

        <div style="background: linear-gradient(135deg, #2ecc71, #27ae60); color: white; padding: 22px 15px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
            <h3 style="font-size: 15px; margin-bottom: 8px; letter-spacing: 0.5px; opacity: 0.95;">HÀNG HÓA</h3>
            <span style="font-size: 32px; font-weight: bold; display: block; line-height: 1.2;"><?=$tongquan['count_sp'] ?? 0?></span>
            <div style="margin-top: 10px;"><a href="index.php?act=listsp" style="color: #ffffff; text-decoration: underline; font-size: 13px;">Chi tiết &rarr;</a></div>
        </div>

        <div style="background: linear-gradient(135deg, #e67e22, #d35400); color: white; padding: 22px 15px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
            <h3 style="font-size: 15px; margin-bottom: 8px; letter-spacing: 0.5px; opacity: 0.95;">KHÁCH HÀNG</h3>
            <span style="font-size: 32px; font-weight: bold; display: block; line-height: 1.2;"><?=$tongquan['count_tk'] ?? 0?></span>
            <div style="margin-top: 10px;"><span style="color: rgba(255,255,255,0.8); font-size: 13px;">Thành viên</span></div>
        </div>

        <div style="background: linear-gradient(135deg, #9b59b6, #8e44ad); color: white; padding: 22px 15px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
            <h3 style="font-size: 15px; margin-bottom: 8px; letter-spacing: 0.5px; opacity: 0.95;">BÌNH LUẬN</h3>
            <span style="font-size: 32px; font-weight: bold; display: block; line-height: 1.2;"><?=$tongquan['count_bl'] ?? 0?></span>
            <div style="margin-top: 10px;"><span style="color: rgba(255,255,255,0.8); font-size: 13px;">Tương tác</span></div>
        </div>
    </div>

    <!-- PHÍM TẮT NHANH -->
    <div style="background: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #e2e8f0; width: 100%; box-sizing: border-box;">
        <h3 style="margin-bottom: 15px; color: #1e293b; font-size: 16px;">Lối tắt tác vụ nhanh:</h3>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <a href="index.php?act=addsp"><input type="button" value="+ Thêm sản phẩm mới" style="background: #27ae60; color: white; border: none; padding: 10px 18px; border-radius: 6px; cursor: pointer; font-weight: 500;"></a>
            <a href="index.php?act=adddm"><input type="button" value="+ Thêm danh mục mới" style="background: #2980b9; color: white; border: none; padding: 10px 18px; border-radius: 6px; cursor: pointer; font-weight: 500;"></a>
            <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ thống kê" style="background: #8e44ad; color: white; border: none; padding: 10px 18px; border-radius: 6px; cursor: pointer; font-weight: 500;"></a>
            <a href="../index.php" target="_blank"><input type="button" value="Trang bán hàng Client &rarr;" style="background: #34495e; color: white; border: none; padding: 10px 18px; border-radius: 6px; cursor: pointer; font-weight: 500;"></a>
        </div>
    </div>
</div>