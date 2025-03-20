-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS qlhoctap;
USE qlhoctap;

-- Tạo bảng Người dùng (users)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,    -- Tài khoản
    password VARCHAR(255) NOT NULL,           -- Mật khẩu
    role ENUM('student', 'teacher', 'admin') NOT NULL,   -- Vai trò (Sinh viên, Giáo viên, Quản trị viên)
    full_name VARCHAR(100),                   -- Họ và tên
    phone VARCHAR(15),                        -- Số điện thoại
    email VARCHAR(100),                       -- Email
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP   -- Ngày tạo tài khoản
);

-- Tạo bảng Khóa học (courses)
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    teacher_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Tạo bảng Bài tập (assignments)
CREATE TABLE assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    title VARCHAR(100),
    description TEXT,
    due_date DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Tạo bảng Điểm (grades)
CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    assignment_id INT,
    grade DECIMAL(5, 2),
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE
);

-- Tạo bảng Tham gia khóa học (course_enrollments)
CREATE TABLE course_enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    user_id INT,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tạo chỉ mục để tối ưu hóa truy vấn
CREATE INDEX idx_username ON users(username);
CREATE INDEX idx_course_id ON assignments(course_id);
CREATE INDEX idx_user_id ON grades(user_id);
