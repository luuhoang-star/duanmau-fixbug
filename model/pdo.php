<?php
/**
 * ============================================================================
 * DATABASE ACCESS LAYER (PDO HELPER)
 * ============================================================================
 * Lớp xử lý kết nối và thực thi các truy vấn CSDL an toàn bằng Prepared Statements
 */

/**
 * Tạo và lấy kết nối PDO đến cơ sở dữ liệu MySQL
 * @return PDO
 */
function pdo_get_connection() {
    $dburl = "mysql:host=localhost;dbname=duanmau;charset=utf8mb4";
    $username = 'root';
    $password = '123456';
    try {
        $conn = new PDO($dburl, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $conn;
    } catch (PDOException $e) {
        die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
    }
}

/**
 * Thực thi câu lệnh SQL thao tác dữ liệu: INSERT, UPDATE, DELETE
 * @param string $sql Câu lệnh SQL chứa các dấu ?
 * @param mixed ...$args Các tham số truyền vào tương ứng với dấu ?
 * @return string ID của bản ghi vừa thêm mới (nếu là câu lệnh INSERT)
 */
function pdo_execute($sql, ...$args) {
    if (isset($args[0]) && is_array($args[0])) {
        $args = $args[0];
    }
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL truy vấn và trả về DANH SÁCH nhiều bản ghi (SELECT ALL)
 * @param string $sql Câu lệnh SQL
 * @param mixed ...$args Các tham số truyền vào
 * @return array Mảng chứa các bản ghi (mỗi bản ghi là 1 mảng kết hợp)
 */
function pdo_query($sql, ...$args) {
    if (isset($args[0]) && is_array($args[0])) {
        $args = $args[0];
    }
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL truy vấn và trả về 1 BẢN GHI duy nhất (SELECT ONE)
 * @param string $sql Câu lệnh SQL
 * @param mixed ...$args Các tham số truyền vào
 * @return array|false Mảng dữ liệu của bản ghi hoặc false nếu không tìm thấy
 */
function pdo_query_one($sql, ...$args) {
    if (isset($args[0]) && is_array($args[0])) {
        $args = $args[0];
    }
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetch();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL truy vấn trả về 1 GIÁ TRỊ ĐƠN (COUNT, SUM, MAX, MIN, AVG)
 * @param string $sql Câu lệnh SQL
 * @param mixed ...$args Các tham số truyền vào
 * @return mixed Giá trị đơn lẻ của cột đầu tiên
 */
function pdo_query_value($sql, ...$args) {
    if (isset($args[0]) && is_array($args[0])) {
        $args = $args[0];
    }
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
?>