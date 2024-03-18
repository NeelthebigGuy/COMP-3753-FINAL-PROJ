-- CREATING DATABASE
CREATE DATABASE IF NOT EXISTS games_db;

-- SWITCHING TO DATABASE;
USE games_db;

-- CREATING USER
CREATE USER IF NOT EXISTS 'games_user'@'localhost' IDENTIFIED BY 'Coltini';
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'games_user'@'localhost';

-- CREATING GPU TABLE
CREATE TABLE IF NOT EXISTS gpu (
    vram int NOT NULL,
    gpuName VARCHAR(30) NOT NULL,
    price DECIMAL(6,2)
);

INSERT INTO gpu (vram, gpuName, price) VALUES 
    (8, 'rtx3060', 499.99);

-- SHOWING TABLE
SELECT * FROM gpu;

-- DEBUGGER
SHOW DATABASES;