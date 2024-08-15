<?php
    session_start();
    function insert_taikhoan($email, $user , $pass) {
        $sql = "INSERT INTO `taikhoan` (`user`, `pass`, `email`) VALUES ('$user', '$pass','$email'); ";
        pdo_execute($sql);
    }

     function dangnhap($user,$pass) {
        $sql="SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
        $taikhoan = pdo_query_one($sql);

        if ($taikhoan != false) {
            $_SESSION['user'] = $user;
        } else {
            return "Thông tin tài khoản sai";
        }
    }

    function dangxuat() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    function sendMail($email) {
        $sql="SELECT * FROM taikhoan WHERE email='$email'";
        $taikhoan = pdo_query_one($sql);

        if ($taikhoan != false) {
            return "gui email thanh cong";
        } else {
            return "Email bạn nhập ko có trong hệ thống";
        }
    }


?>
