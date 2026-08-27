# 🛒 Website Bán Hàng Công Nghệ (PHP MVC)

Website bán hàng trực tuyến (Laptop, Điện thoại) viết bằng **PHP thuần & MySQL (PDO)** theo mô hình **MVC**.

---

## ⚡ Cài đặt & Chạy nhanh

1. **Import CSDL:** Tạo database `duanmau` và import file [`duanmau.sql`](duanmau.sql).
2. **Cấu hình DB:** Sửa user/pass kết nối trong [`model/pdo.php`](model/pdo.php) (nếu cần).
3. **Truy cập:**
   - **Trang chủ (Client):** `http://localhost/duanmau-fixbug/`
   - **Quản trị (Admin):** `http://localhost/duanmau-fixbug/admin/`

---

## 🔑 Tài khoản mẫu

| Quyền | Tài khoản | Mật khẩu | Ghi chú |
| :--- | :--- | :--- | :--- |
| **Admin** | `Admin` | `123456` | Toàn quyền quản trị hệ thống |
| **Khách hàng** | `User` | `123456` | Mua hàng, bình luận |

---

## 🚀 Tính năng chính

### 👤 Phía Khách hàng (Client)
- Xem sản phẩm mới nhất, Top 10 sản phẩm xem nhiều.
- Lọc theo danh mục, tìm kiếm theo tên.
- Xem chi tiết sản phẩm, gợi ý sản phẩm cùng loại.
- Gửi bình luận đánh giá dưới từng sản phẩm.
- Đăng ký, đăng nhập, đổi thông tin cá nhân & quên mật khẩu.

### 🛠 Phía Quản trị (Admin)
- **Dashboard:** Thống kê tổng quan số liệu.
- **Danh mục:** Thêm / Sửa / Xóa danh mục.
- **Sản phẩm:** Quản lý sản phẩm, upload ảnh, bật/tắt hiển thị.
- **Báo cáo:** Thống kê số lượng, giá min/max/avg và biểu đồ tròn trực quan.

---

## 📁 Cấu trúc thư mục tóm tắt

```text
├── admin/          # Giao diện & router quản trị (Dashboard, Danh mục, Sản phẩm, Thống kê)
├── model/          # Tầng xử lý CSDL qua PDO (pdo.php, danhmuc.php, sanpham.php,...)
├── view/           # Giao diện người dùng (Trang chủ, Chi tiết SP, Đăng nhập/Đăng ký)
├── upload/         # Thư mục chứa ảnh sản phẩm
├── index.php       # Controller chính Client
├── global.php      # Hàm dùng chung & khởi tạo session
└── duanmau.sql     # File CSDL mẫu
```

---

## 🛠 Công nghệ
- **Backend:** PHP 7.4+ / 8.x, PDO Prepared Statements (chống SQL Injection).
- **Database:** MySQL / MariaDB.
- **Frontend:** HTML5, CSS3, JavaScript, Google Charts.
