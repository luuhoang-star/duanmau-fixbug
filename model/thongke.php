<?php
/**
 * ============================================================================
 * MODEL: THỐNG KÊ & BÁO CÁO (STATISTICS)
 * ============================================================================
 * Chứa các hàm tổng hợp dữ liệu thống kê phục vụ Dashboard và Biểu đồ Admin
 */

/**
 * Thống kê số lượng sản phẩm, giá min, max, avg theo từng danh mục
 * @return array
 */
function load_thongke_sanpham_danhmuc() {
    $sql = "SELECT dm.id, dm.name, 
                   COUNT(sp.id) AS soluong, 
                   IFNULL(MIN(sp.price), 0) AS gia_min, 
                   IFNULL(MAX(sp.price), 0) AS gia_max, 
                   IFNULL(AVG(sp.price), 0) AS gia_avg 
            FROM danhmuc dm 
            LEFT JOIN sanpham sp ON dm.id = sp.iddm AND sp.trangthai = 0 
            GROUP BY dm.id, dm.name 
            ORDER BY dm.id DESC";
    return pdo_query($sql);
}

/**
 * Lấy số liệu thống kê tổng quan toàn hệ thống cho Dashboard Admin
 * @return array Mảng chứa số lượng: count_dm, count_sp, count_tk, count_bl
 */
function load_thongke_tongquan() {
    return [
        'count_dm' => (int)pdo_query_value("SELECT COUNT(*) FROM danhmuc"),
        'count_sp' => (int)pdo_query_value("SELECT COUNT(*) FROM sanpham WHERE trangthai = 0"),
        'count_tk' => (int)pdo_query_value("SELECT COUNT(*) FROM taikhoan"),
        'count_bl' => (int)pdo_query_value("SELECT COUNT(*) FROM binhluan")
    ];
}
?>