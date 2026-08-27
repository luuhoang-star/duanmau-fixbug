<?php
/**
 * ============================================================================
 * MODEL: QUẢN LÝ TÀI KHOẢN & NGƯỜI DÙNG (USERS / ACCOUNTS)
 * ============================================================================
 * Chứa các hàm xác thực, đăng nhập, đăng ký và cập nhật hồ sơ người dùng
 */

/**
 * Kiểm tra tài khoản và mật khẩu khi đăng nhập
 * @param string $user Tên đăng nhập
 * @param string $pass Mật khẩu
 * @return array|false Thông tin tài khoản hoặc false nếu sai thông tin
 */
function checkuser($user, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE user = ? AND pass = ?";
    return pdo_query_one($sql, $user, $pass);
}

/**
 * Kiểm tra email có tồn tại trong hệ thống (phục vụ tính năng quên mật khẩu)
 * @param string $email
 * @return array|false
 */
function checkemail($email) {
    $sql = "SELECT * FROM taikhoan WHERE email = ?";
    return pdo_query_one($sql, $email);
}

/**
 * Đăng ký tài khoản mới (Mặc định role = 0: Khách hàng)
 * @param string $email
 * @param string $user
 * @param string $pass
 */
function insert_taikhoan($email, $user, $pass) {
    $sql = "INSERT INTO taikhoan (email, user, pass, role) VALUES (?, ?, ?, 0)";
    pdo_execute($sql, $email, $user, $pass);
}

/**
 * Cập nhật thông tin hồ sơ tài khoản
 * @param int $id
 * @param string $user
 * @param string $pass
 * @param string $email
 * @param string $address
 * @param string $tel
 */
function update_taikhoan($id, $user, $pass, $email, $address, $tel) {
    $sql = "UPDATE taikhoan SET user = ?, pass = ?, email = ?, address = ?, tel = ? WHERE id = ?";
    pdo_execute($sql, $user, $pass, $email, $address, $tel, $id);
}

/**
 * Thực hiện đăng nhập và lưu session người dùng
 * @param string $user
 * @param string $pass
 * @return bool True nếu đăng nhập thành công, False nếu thất bại
 */
function dangnhap($user, $pass) {
    $taikhoan = checkuser($user, $pass);
    if (is_array($taikhoan) && !empty($taikhoan)) {
        $_SESSION['user'] = $taikhoan;
        return true;
    }
    return false;
}

/**
 * Đăng xuất tài khoản người dùng khỏi phiên làm việc hiện tại
 */
function dangxuat() {
    unset($_SESSION['user']);
}
?>
