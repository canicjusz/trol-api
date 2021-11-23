-- CreateTable
CREATE TABLE `Authors` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(100) NOT NULL,
    `Avatar` VARCHAR(100) NOT NULL,
    `Bio` TEXT NOT NULL,

    PRIMARY KEY (`ID`)
);

-- CreateTable
CREATE TABLE `Categories` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Name` TEXT NOT NULL,

    PRIMARY KEY (`ID`)
);

-- CreateTable
CREATE TABLE `Posts` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Date` DATE NOT NULL,
    `Content` TEXT NOT NULL,
    `Content-shortened` VARCHAR(200) NOT NULL,
    `categoryID` INTEGER NOT NULL,
    `Viewcount` INTEGER UNSIGNED NOT NULL,

    PRIMARY KEY (`ID`)
);

-- CreateTable
CREATE TABLE `_AuthorsToPosts` (
    `A` INTEGER NOT NULL,
    `B` INTEGER NOT NULL,

    UNIQUE INDEX `_AuthorsToPosts_AB_unique`(`A`, `B`),
    INDEX `_AuthorsToPosts_B_index`(`B`)
);

-- AddForeignKey
ALTER TABLE `Posts` ADD CONSTRAINT `Posts_categoryID_fkey` FOREIGN KEY (`categoryID`) REFERENCES `Categories`(`ID`);

-- AddForeignKey
ALTER TABLE `_AuthorsToPosts` ADD FOREIGN KEY (`A`) REFERENCES `Authors`(`ID`);

-- AddForeignKey
ALTER TABLE `_AuthorsToPosts` ADD FOREIGN KEY (`B`) REFERENCES `Posts`(`ID`);
