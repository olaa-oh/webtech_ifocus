-- Drop the database if it exists
DROP DATABASE IF EXISTS IFOCUSDB;

-- Create the database
CREATE DATABASE IF NOT EXISTS IFOCUSDB;

-- Use the database
USE IFOCUSDB;

-- Table for users
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (username),
    UNIQUE (email)
);

-- Table for todos
CREATE TABLE IF NOT EXISTS todos (
    todo_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    task VARCHAR(255) NOT NULL,
    todo_status ENUM('Pending', 'Completed', 'Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Table for notes
CREATE TABLE IF NOT EXISTS notes (
    note_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    note_title VARCHAR(255) NOT NULL,
    note_content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Indexes for frequently queried columns
CREATE INDEX idx_todo_status ON todos(todo_status);
CREATE INDEX idx_created_at ON todos(created_at);
CREATE INDEX idx_updated_at ON todos(updated_at);
CREATE INDEX idx_created_at_notes ON notes(created_at);
CREATE INDEX idx_updated_at_notes ON notes(updated_at);
