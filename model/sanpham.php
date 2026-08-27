<?php
/**
 * ============================================================================
 * MODEL: QUẢN LÝ SẢN PHẨM / HÀNG HÓA (PRODUCTS)
 * ============================================================================
 * Chứa toàn bộ các hàm thao tác CSDL với bảng `sanpham`
 */

/**
 * Lấy 9 sản phẩm mới nhất đang hoạt động (trangthai = 0) hiển thị tại Trang Chủ
 * @return array
 */
function loadall_sanpham_home() {
    $sql = "SELECT * FROM sanpham WHERE trangthai = 0 ORDER BY id DESC LIMIT 0, 9";
    return pdo_query($sql);
}

/**
 * Lấy Top 10 sản phẩm có lượt xem cao nhất hiển thị Sidebar
 * @return array
 */
function loadall_sanpham_top10() {
    $sql = "SELECT * FROM sanpham WHERE trangthai = 0 ORDER BY luotxem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

/**
 * Lấy danh sách sản phẩm theo từ khóa tìm kiếm và danh mục (Chỉ lấy sản phẩm chưa bị xóa mềm)
 * @param string $keyw Từ khóa tìm kiếm theo tên sản phẩm
 * @param int $iddm Mã danh mục lọc sản phẩm (0 là lấy tất cả)
 * @return array
 */
function loadall_sanpham($keyw = "", $iddm = 0) {
    $sql = "SELECT sp.*, dm.name as tendm 
            FROM sanpham sp 
            LEFT JOIN danhmuc dm ON sp.iddm = dm.id 
            WHERE sp.trangthai = 0";
    $params = [];

    if ($keyw != "") {
        $sql .= " AND sp.name LIKE ?";
        $params[] = "%" . $keyw . "%";
    }
    if ($iddm > 0) {
        $sql .= " AND sp.iddm = ?";
        $params[] = $iddm;
    }
    $sql .= " ORDER BY sp.id DESC";
    return pdo_query($sql, $params);
}

/**
 * Lấy thông tin chi tiết của 1 sản phẩm theo ID
 * @param int $id Mã sản phẩm
 * @return array|false
 */
function loadone_sanpham($id) {
    $sql = "SELECT * FROM sanpham WHERE id = ?";
    return pdo_query_one($sql, $id);
}

/**
 * Lấy danh sách sản phẩm cùng loại (Fallback tự động gợi ý sản phẩm nổi bật khác nếu danh mục chỉ có 1 sp)
 * @param int $id Mã sản phẩm hiện tại (để loại trừ khỏi danh sách)
 * @param int $iddm Mã danh mục
 * @return array
 */
function loadsp_cungloai($id, $iddm) {
    // 1. Tìm các sản phẩm cùng danh mục
    $sql = "SELECT * FROM sanpham WHERE iddm = ? AND id <> ? AND trangthai = 0 LIMIT 0, 6";
    $result = pdo_query($sql, $iddm, $id);

    // 2. Nếu danh mục không có thêm sản phẩm nào khác -> Gợi ý các sản phẩm nổi bật nhất
    if (empty($result)) {
        $sql_other = "SELECT * FROM sanpham WHERE id <> ? AND trangthai = 0 ORDER BY luotxem DESC LIMIT 0, 6";
        $result = pdo_query($sql_other, $id);
    }
    return $result;
}

/**
 * Tăng số lượt xem sản phẩm lên 1 khi người dùng truy cập trang chi tiết
 * @param int $id Mã sản phẩm
 */
function tang_luotxem($id) {
    $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = ?";
    pdo_execute($sql, $id);
}

/**
 * Thêm mới một sản phẩm vào CSDL
 * @param string $name Tên sản phẩm
 * @param float|int $price Giá bán
 * @param string $img Tên file ảnh
 * @param string $mota Mô tả chi tiết
 * @param int $iddm Mã danh mục chứa sản phẩm
 */
function insert_sanpham($name, $price, $img, $mota, $iddm) {
    $sql = "INSERT INTO sanpham (name, price, img, mota, iddm, trangthai) VALUES (?, ?, ?, ?, ?, 0)";
    pdo_execute($sql, $name, $price, $img, $mota, $iddm);
}

/**
 * Cập nhật thông tin sản phẩm (Nếu không tải ảnh mới thì giữ nguyên ảnh cũ)
 * @param int $id Mã sản phẩm
 * @param int $iddm Mã danh mục
 * @param string $name Tên sản phẩm
 * @param float|int $price Giá bán
 * @param string $mota Mô tả
 * @param string $img Tên file ảnh mới (nếu có)
 */
function update_sanpham($id, $iddm, $name, $price, $mota, $img = "") {
    if (!empty($img)) {
        $sql = "UPDATE sanpham SET iddm = ?, name = ?, price = ?, mota = ?, img = ? WHERE id = ?";
        pdo_execute($sql, $iddm, $name, $price, $mota, $img, $id);
    } else {
        $sql = "UPDATE sanpham SET iddm = ?, name = ?, price = ?, mota = ? WHERE id = ?";
        pdo_execute($sql, $iddm, $name, $price, $mota, $id);
    }
}

/**
 * XÓA MỀM sản phẩm (Chuyển trangthai = 1 để ẩn sản phẩm khỏi website mà không mất dữ liệu lịch sử)
 * @param int $id Mã sản phẩm
 */
function soft_delete($id) {
    $sql = "UPDATE sanpham SET trangthai = 1 WHERE id = ?";
    pdo_execute($sql, $id);
}

/**
 * XÓA CỨNG sản phẩm (Xóa vĩnh viễn sản phẩm và các bình luận liên quan khỏi CSDL)
 * @param int $id Mã sản phẩm
 */
function hard_delete($id) {
    // 1. Xóa bình luận liên quan của sản phẩm
    $sql_bl = "DELETE FROM binhluan WHERE idpro = ?";
    pdo_execute($sql_bl, $id);

    // 2. Xóa bản ghi sản phẩm
    $sql_sp = "DELETE FROM sanpham WHERE id = ?";
    pdo_execute($sql_sp, $id);
}
?>
