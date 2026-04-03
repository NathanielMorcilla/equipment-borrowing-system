-- Create Equipment Borrowing System Database
CREATE DATABASE IF NOT EXISTS equipment_db;
USE equipment_db;

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Equipment Table
CREATE TABLE IF NOT EXISTS equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    quantity INT DEFAULT 0,
    available INT DEFAULT 0,
    `condition` ENUM('good', 'fair', 'poor') DEFAULT 'good',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Borrowing Records Table
CREATE TABLE IF NOT EXISTS borrowings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    equipment_id INT NOT NULL,
    borrow_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    return_date DATETIME,
    returned_at DATETIME,
    status ENUM('borrowed', 'returned') DEFAULT 'borrowed',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (equipment_id) REFERENCES equipment(id)
);

-- Insert Sample Data
INSERT INTO users (username, email, password, role) VALUES
('admin', 'admin@equipment.local', MD5('admin123'), 'admin'),
('john', 'john@equipment.local', MD5('user123'), 'user');

INSERT INTO equipment (name, description, category, quantity, available, `condition`) VALUES
('Projector', 'High resolution projector', 'Electronics', 2, 2, 'good'),
('Laptop', 'Dell Latitude 5000', 'Computers', 5, 4, 'good'),
('Whiteboard', '4ft x 3ft interactive whiteboard', 'Furniture', 3, 3, 'good'),
('Video Camera', '4K video camera', 'Electronics', 1, 1, 'good');
