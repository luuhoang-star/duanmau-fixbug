<?php
/**
 * ============================================================================
 * GLOBAL CONFIGURATION & HELPER FUNCTIONS
 * ============================================================================
 * File chứa các cấu hình chung, khởi tạo session và các hàm tiện ích tái sử dụng
 */

// 1. Khởi tạo Session nếu chưa có
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Định nghĩa hằng số / biến đường dẫn
$img_path = "upload/";

/**
 * Định dạng số tiền thành chuỗi tiền tệ VNĐ (Ví dụ: 250000 -> "250.000 đ")
 * @param float|int $number
 * @return string
 */
function format_currency($number) {
    return number_format((float)$number, 0, ',', '.') . ' đ';
}

/**
 * Lấy đường dẫn ảnh hợp lệ (nếu không có hoặc file không tồn tại thì lấy ảnh mặc định)
 * @param string|null $img_name Tên file ảnh
 * @param string $path Thư mục chứa ảnh (mặc định là "upload/")
 * @return string Đường dẫn web có thể hiển thị
 */
function get_img_url($img_name, $path = "upload/") {
    $clean_path = rtrim($path, '/') . '/';
    $file_system_path = __DIR__ . '/' . $clean_path . $img_name;
    
    if (!empty($img_name) && file_exists($file_system_path)) {
        return '/' . $clean_path . $img_name;
    }
    return '/img/no-image.svg';
}

/**
 * Xử lý tải lên file hình ảnh lên server
 * @param string $input_name Tên trường file trong thẻ <input type="file" name="...">
 * @param string $target_dir Thư mục đích lưu ảnh
 * @return string Tên file ảnh đã upload (hoặc rỗng nếu không upload)
 */
function upload_image($input_name, $target_dir = "../upload/") {
    if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] === UPLOAD_ERR_OK) {
        $file_name = basename($_FILES[$input_name]['name']);
        $target_file = rtrim($target_dir, '/') . '/' . $file_name;
        
        if (move_uploaded_file($_FILES[$input_name]['tmp_name'], $target_file)) {
            return $file_name;
        }
    }
    return "";
}
?>