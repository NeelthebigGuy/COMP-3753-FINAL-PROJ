-- CREATING DATABASE
CREATE DATABASE IF NOT EXISTS games_db;

-- SWITCHING TO DATABASE;
USE games_db;

-- CREATING USER
CREATE USER IF NOT EXISTS 'games_user'@'localhost' IDENTIFIED BY 'Coltini';
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'games_user'@'localhost';


--  CREATING GPU TABLE
CREATE TABLE IF NOT EXISTS `GPUdetails` (
    `GPU_Name` VARCHAR(26) CHARACTER SET utf8,
    `Brand` VARCHAR(6) CHARACTER SET utf8,
    `Video_RAM_GB` INT,
    `Strength` INT,
    `Generation` INT
);

--  INSERTING DATA INTO GPU TABLE
INSERT INTO `GPUdetails` VALUES ('GeForce GT 1010','Nvidia',2,1,1),
	('GeForce GT 1030','Nvidia',2,2,1),
	('GeForce GTX 1050','Nvidia',2,3,1),
	('GeForce GTX 1050 Ti','Nvidia',4,4,1),
	('GeForce GTX 1060','Nvidia',4,5,1),
	('GeForce GTX 1070','Nvidia',8,6,1),
	('GeForce GTX 1070 Ti','Nvidia',8,7,1),
	('GeForce GTX 1080','Nvidia',8,8,1),
	('GeForce GTX 1080 Ti','Nvidia',11,9,1),
	('TITAN X Pascal','Nvidia',12,10,1),
	('TITAN Xp','Nvidia',12,11,1),
	('Nvidia TITAN V','Nvidia',12,12,1),
	('Nvidia TITAN V CEO Edition','Nvidia',32,13,1),
	('GeForce GTX 1630','Nvidia',4,14,1),
	('GeForce GTX 1650','Nvidia',4,15,1),
	('GeForce GTX 1650 Super','Nvidia',4,16,1),
	('GeForce GTX 1660','Nvidia',6,17,1),
	('GeForce GTX 1660 Super','Nvidia',6,18,1),
	('GeForce GTX 1660 Ti','Nvidia',6,19,1),
	('GeForce RTX 2060','Nvidia',6,20,2),
	('GeForce RTX 2060 Super','Nvidia',8,21,2),
	('GeForce RTX 2070','Nvidia',8,22,2),
	('GeForce RTX 2070 Super','Nvidia',8,23,2),
	('GeForce RTX 2080','Nvidia',8,24,2),
	('GeForce RTX 2080 Super','Nvidia',8,25,2),
	('GeForce RTX 2080 Ti','Nvidia',11,26,2),
	('Nvidia TITAN RTX','Nvidia',24,27,2),
	('GeForce RTX 3050','Nvidia',6,28,3),
	('GeForce RTX 3060','Nvidia',8,29,3),
	('GeForce RTX 3060 Ti','Nvidia',8,30,3),
	('GeForce RTX 3070','Nvidia',8,31,3),
	('GeForce RTX 3070 Ti','Nvidia',8,32,3),
	('GeForce RTX 3080','Nvidia',10,33,3),
	('GeForce RTX 3080 Ti','Nvidia',12,34,3),
	('GeForce RTX 3090','Nvidia',24,35,3),
	('GeForce RTX 3090 Ti','Nvidia',24,36,3),
	('GeForce RTX 4060','Nvidia',8,37,4),
	('GeForce RTX 4060 Ti','Nvidia',8,38,4),
	('GeForce RTX 4070','Nvidia',12,39,4),
	('GeForce RTX 4070 Super','Nvidia',12,40,4),
	('GeForce RTX 4070 Ti','Nvidia',12,41,4),
	('GeForce RTX 4070 Super Ti','Nvidia',16,42,4),
	('GeForce RTX 4080','Nvidia',16,43,4),
	('GeForce RTX 4080 Super','Nvidia',16,44,4),
	('GeForce RTX 4090','Nvidia',24,45,4),
	('GeForce RTX 4090D','Nvidia',24,46,4),
	('Radeon R9 270X','AMD',2,2,1),
	('Radeon R9 280','AMD',3,3,1),
	('Radeon R9 380X','AMD',4,9,1),
	('Radeon RX 590','AMD',8,16,1),
	('Radeon RX 5700','AMD',8,18,2),
	('Radeon RX 6600','AMD',8,20,2),
	('Radeon RX 6600 XT','AMD',8,21,2),
	('Radeon RX 6700 XT','AMD',12,25,2),
	('Radeon RX 7700 XT','AMD',12,31,3),
	('Radeon RX 7800 XT','AMD',16,32,3),
	('Radeon RX 7900 XT','AMD',20,42,4),
	('Radeon RX 7900 XTX','AMD',24,44,4),
	('Arc A380','Intel',6,15,1),
	('Arc A580','Intel',8,28,3),
	('Arc A750','Intel',8,29,3);



-- SHOWING TABLE
SELECT * FROM GPUdetails;

-- DEBUGGER
SHOW DATABASES;
