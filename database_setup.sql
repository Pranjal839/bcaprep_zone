-- Database setup for BCA Prep_Zone Contact Form
-- Run this in your MySQL/phpMyAdmin to create the database

-- Create database
CREATE DATABASE IF NOT EXISTS bca_prepzone;

-- Use the database
USE bca_prepzone;

-- Create contact_messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO contact_messages (name, email, phone, subject, message) VALUES
('John Doe', 'john@example.com', '1234567890', 'Question about BCA papers', 'Hi, I would like to know more about the question papers available.'),
('Jane Smith', 'jane@example.com', '9876543210', 'Feedback', 'Great website! Very helpful for BCA students.'); 