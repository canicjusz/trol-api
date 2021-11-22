CREATE TABLE `Posts` (
	`ID` int NOT NULL AUTO_INCREMENT,
	`Date` DATE NOT NULL,
	`Author` int NOT NULL,
	`Content` TEXT NOT NULL,
	`Content-shortened` TEXT NOT NULL,
	`Categories` TEXT NOT NULL,
	`Viewcount` int NOT NULL,
	PRIMARY KEY (`ID`)
);

CREATE TABLE `Categories` (
	`Name` TEXT NOT NULL,
	PRIMARY KEY (`Name`)
);

CREATE TABLE `Authors` (
	`ID` int NOT NULL AUTO_INCREMENT,
	`Name` TEXT NOT NULL,
	`Avatar` TEXT NOT NULL,
	`Bio` TEXT NOT NULL,
	`Posts` json NOT NULL,
	PRIMARY KEY (`ID`)
);

ALTER TABLE `Posts` ADD CONSTRAINT `Posts_fk0` FOREIGN KEY (`Author`) REFERENCES `Authors`(`ID`);

ALTER TABLE `Posts` ADD CONSTRAINT `Posts_fk1` FOREIGN KEY (`Categories`) REFERENCES `Categories`(`Name`);

ALTER TABLE `Authors` ADD CONSTRAINT `Authors_fk0` FOREIGN KEY (`Posts`) REFERENCES `Posts`(`ID`);




