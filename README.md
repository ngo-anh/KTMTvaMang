# Website tuyển dụng việc làm

## Công nghệ và ngôn ngữ:

-   Laravel >= 8.x
-   MySQL 8.0
-   Bootstrap 4

## Thiết kế giao diện :

-   Trình bày trang nhã, thân thiện
-   Màu sắc đơn giản

## Authentication

-   User

    -   Chức năng **_public_**
    -   Cho phép đăng kí, đăng nhập
    -   Cho phép chỉnh sửa thông tin profile, chỉnh sửa mật khẩu
    -   Khi đăng ký bắt buộc các thông tin:
        -   Email
        -   Password
        -   Tên
        -   Số Điện Thoại
        -   Địa Chỉ

-   Admin
    -   Chức năng private
    -   Quản lý tài khoản user
    -   Quản lý job của user

## Module Ứng viên (Người tìm việc)

-   Profile:

    -   Ảnh đại diện
    -   Thông tin cá nhân (giống như khi đăng kí)

-   Job:
    -   Thay đổi thông tin cá nhân
    -   Thay đổi mật khẩu
    -   Tạo hồ sơ dự tuyển (CV):
        -   CV gồm các thông tin:
            -   Vị trí apply (dạng text)
            -   Kinh nghiệm làm việc (dạng text)
    -   Cho phép tìm kiếm thông tin việc làm.

## Module Tuyển Dụng (Nhà Tuyển Dụng)

-   Profile:
    -   Ảnh công ty
    -   Infomation sẽ có thêm:
        -   Giới thiệu về công ty (text)
    -   Thay đổi thông tin cá nhân
    -   Thay đổi mật khẩu
-   Job:
    -   Vị trí cần tuyển
    -   Mô tả công việc
    -   Mức Lương

## Page Chính Trên Home (Yêu cầu Auth)

-   User

    -   Ứng Viên
        -   Profile
        -   Tạo CV
        -   Tìm Kiếm Việc (chỉ theo tên)
    -   Nhà Tuyển Dụng
        -   Profile
        -   Tạo danh sách việc cần tuyển

-   Admin
    -   Page quản lý user
        -   Hiển thị toàn bộ các tài khoản user
        -   Cho phép tìm kiếm thông tin user theo email
        -   Khi click vào một user chuyển page
            -   Ứng Viên
                -   Hiển thị profile ứng viên
                -   Hiển thị sơ các CV của ứng viên
                    -   Khi click vào từng CV mới hiện chi tiết
            -   Nhà tuyển dụng
                -   Hiển thị profile
                -   Hiển thị các công việc cần tuyển dạng sơ
                    -   Khi click vào từng công việc sẽ hiển thị chi tiét
