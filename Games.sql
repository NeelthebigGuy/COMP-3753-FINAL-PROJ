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


--  CREATING GAME DETAILS TABLE
CREATE TABLE IF NOT EXISTS `Gamedetails` (
    `Game_Name` VARCHAR(25) CHARACTER SET utf8,
    `Space_Required_GB` INT,
    `Min_CPU_Str` INT,
    `Minimum_GPU_Str` INT,
    `Rec_CPU_Str` INT,
    `Rec_GPU_Str` INT
);

--  INSERTING DATA INTO GAME DETAILS
INSERT INTO `Gamedetails` VALUES ('Call of Duty: Warzone',125,5,1,6,5),
	('Helldivers 2',100,4,4,17,20),
	('Grand  Theft Auto V',72,1,1,2,2),
	('Red Dead Redemption 2',150,1,1,4,5),
	('Baldur''s Gate 3',150,3,1,14,21),
	('Cyberpunk 2077',70,7,5,28,21),
	('Elden Ring',60,13,5,14,6),
	('VALORANT',40,1,1,2,2),
	('Fortnite',30,1,1,1,1),
	('Palworld',40,3,3,18,22),
	('Counter-Strike 2',85,1,1,3,3),
	('Hogwarts Legacy',85,6,1,14,9),
	('Minecraft',3,1,1,3,3),
	('God of War',70,1,1,6,5),
	('League of Legends',16,1,1,1,1),
	('Starfield',125,7,7,20,24),
	('The Witcher 3: Wild Hunt',35,1,1,4,3),
	('Forza Horizon 5',110,3,1,13,6),
	('Apex Legends',56,5,1,7,2),
	('Genshin Impact',30,2,2,3,5),
	('Lethal Company',1,9,3,9,3),
	('The Sims 4',26,1,1,3,1),
	('Assassin''s Creed Valhalla',50,1,1,5,8),
	('Battlefield 2042',11,3,4,16,29),
	('Deep Rock Galactic',10,1,1,1,2),
	('Enter the Gungeon',2,1,1,1,1),
	('Lies of P',50,5,1,5,17),
	('The Finals',15,6,1,16,22),
	('Dragon''s Dogma 2',100,20,6,21,24),
	('Sons Of The Forest',20,13,5,14,9);


-- CREATING CPUdetails_1 TABLE
CREATE TABLE IF NOT EXISTS `CPUdetails_1` (
    `CPU_Name` VARCHAR(12) CHARACTER SET utf8,
    `Brand` VARCHAR(5) CHARACTER SET utf8,
    `Strength` INT,
    `Generation` INT
);

--  INSERTING VALUES INTO CPUdetails_1 TABLE
INSERT INTO `CPUdetails_1` VALUES ('Gen 4 i3','Intel',1,1),
	('Gen 5 i3','Intel',2,2),
	('Gen 5 i5','Intel',3,2),
	('Gen 5 i7','Intel',4,2),
	('Gen 6 i3','Intel',5,3),
	('Gen 6 i5','Intel',6,3),
	('Gen 6 i7','Intel',7,3),
	('Gen 7 i3','Intel',8,4),
	('Gen 7 i5','Intel',9,4),
	('Gen 7 i7','Intel',10,4),
	('Gen 7 i9','Intel',11,4),
	('Gen 8 i3','Intel',12,5),
	('Gen 8 i5','Intel',13,5),
	('Gen 8 i7','Intel',14,5),
	('Gen 9 i3','Intel',15,6),
	('Gen 9 i5','Intel',16,6),
	('Gen 9 i7','Intel',17,6),
	('Gen 9 i9','Intel',18,6),
	('Gen 10 i3','Intel',19,7),
	('Gen 10 i5','Intel',20,7),
	('Gen 10 i7','Intel',21,7),
	('Gen 10 i9','Intel',22,7),
	('Gen 11 i5','Intel',23,8),
	('Gen 11 i7','Intel',24,8),
	('Gen 11 i9','Intel',25,8),
	('Gen 12 i3','Intel',26,9),
	('Gen 12 i5','Intel',27,9),
	('Gen 12 i7','Intel',28,9),
	('Gen 12 i9','Intel',29,9),
	('Gen 13 i3','Intel',30,10),
	('Gen 13 i5','Intel',31,10),
	('Gen 13 i7','Intel',32,10),
	('Gen 13 i9','Intel',33,10),
	('Gen 14 i3','Intel',34,11),
	('Gen 14 i5','Intel',35,11),
	('Gen 14 i7','Intel',36,11),
	('Gen 14 i9','Intel',37,11),
	('Ryzen 1000 3','AMD',8,4),
	('Ryzen 1000 5','AMD',9,4),
	('Ryzen 1000 7','AMD',10,4),
	('Ryzen 2000 3','AMD',12,5),
	('Ryzen 2000 5','AMD',13,5),
	('Ryzen 3000 3','AMD',15,6),
	('Ryzen 3000 5','AMD',16,6),
	('Ryzen 4000 3','AMD',19,7),
	('Ryzen 4000 5','AMD',20,7),
	('Ryzen 4000 7','AMD',21,7),
	('Ryzen 5000 5','AMD',23,8),
	('Ryzen 5000 7','AMD',24,8),
	('Ryzen 5000 9','AMD',25,8),
	('Ryzen 7000 5','AMD',30,10),
	('Ryzen 7000 7','AMD',31,10),
	('Ryzen 7000 9','AMD',32,10),
	('Ryzen 8000 3','AMD',34,11),
	('Ryzen 8000 5','AMD',35,11),
	('Ryzen 8000 7','AMD',36,11);


-- SHOWING TABLE
SELECT * FROM GPUdetails;

-- DEBUGGER
SHOW DATABASES;
