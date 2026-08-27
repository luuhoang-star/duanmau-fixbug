<?php
/**
 * ============================================================================
 * MODEL: QUẢN LÝ BÌNH LUẬN (COMMENTS)
 * ============================================================================
 * Chứa các hàm thêm và tải bình luận cho từng sản phẩm
 */

/**
 * Thêm mới một bình luận cho sản phẩm
 * @param int $idpro Mã sản phẩm
 * @param string $noidung Nội dung bình luận
 */
function insert_binhluan($idpro, $noidung) {
    $ngaybinhluan = date('Y-m-d H:i:s');
    $iduser = isset($_SESSION['user']['id']) ? (int)$_SESSION['user']['id'] : 0;
    
    $sql = "INSERT INTO binhluan (noidung, iduser, idpro, ngaybinhluan) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $noidung, $iduser, $idpro, $ngaybinhluan);
}

/**
 * Lấy danh sách tất cả bình luận của một sản phẩm (Kèm tên tài khoản người bình luận)
 * @param int $idpro Mã sản phẩm
 * @return array
 */
function load_binhluan($idpro) {
    $sql = "SELECT bl.*, tk.user 
            FROM binhluan bl 
            LEFT JOIN taikhoan tk ON bl.iduser = tk.id 
            WHERE bl.idpro = ? 
            ORDER BY bl.id DESC";
    return pdo_query($sql, $idpro);
}
?>