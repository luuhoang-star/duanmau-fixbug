<?php
/**
 * ============================================================================
 * MODEL: QUẢN LÝ DANH MỤC (CATEGORIES)
 * ============================================================================
 * Chứa toàn bộ các hàm thao tác CSDL với bảng `danhmuc`
 */

/**
 * Lấy tất cả danh mục sắp xếp theo ID giảm dần
 * @return array
 */
function loadall_danhmuc() {
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
    return pdo_query($sql);
}

/**
 * Lấy thông tin 1 danh mục theo ID
 * @param int $id Mã danh mục
 * @return array|false
 */
function loadone_danhmuc($id) {
    $sql = "SELECT * FROM danhmuc WHERE id = ?";
    return pdo_query_one($sql, $id);
}

/**
 * Lấy tên danh mục theo ID
 * @param int $iddm Mã danh mục
 * @return string Tên danh mục (hoặc rỗng nếu không tìm thấy)
 */
function load_ten_dm($iddm) {
    if ($iddm > 0) {
        $sql = "SELECT name FROM danhmuc WHERE id = ?";
        $dm = pdo_query_one($sql, $iddm);
        return $dm ? $dm['name'] : "";
    }
    return "";
}

/**
 * Thêm mới một danh mục
 * @param string $name Tên danh mục mới
 */
function insert_danhmuc($name) {
    $sql = "INSERT INTO danhmuc (name) VALUES (?)";
    pdo_execute($sql, $name);
}

/**
 * Cập nhật tên danh mục
 * @param int $id Mã danh mục cần sửa
 * @param string $name Tên mới của danh mục
 */
function update_danhmuc($id, $name) {
    $sql = "UPDATE danhmuc SET name = ? WHERE id = ?";
    pdo_execute($sql, $name, $id);
}

/**
 * Xóa danh mục (Tự động xóa bình luận và sản phẩm con để tránh lỗi khóa ngoại Foreign Key)
 * @param int $id Mã danh mục cần xóa
 */
function delete_danhmuc($id) {
    // 1. Xóa các bình luận của sản phẩm thuộc danh mục này
    $sql_bl = "DELETE FROM binhluan WHERE idpro IN (SELECT id FROM sanpham WHERE iddm = ?)";
    pdo_execute($sql_bl, $id);

    // 2. Xóa các sản phẩm thuộc danh mục này
    $sql_sp = "DELETE FROM sanpham WHERE iddm = ?";
    pdo_execute($sql_sp, $id);

    // 3. Xóa danh mục
    $sql_dm = "DELETE FROM danhmuc WHERE id = ?";
    pdo_execute($sql_dm, $id);
}
?>
