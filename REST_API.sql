-- CreateTable
CREATE TABLE `Authors` (
    `ID` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
    `Name` VARCHAR(100) NOT NULL,
    `Avatar` VARCHAR(100) NOT NULL,
    `Bio` TEXT NOT NULL,

    PRIMARY KEY (`ID`)
);

-- CreateTable
CREATE TABLE `Categories` (
    `ID` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
    `Name` TEXT NOT NULL,

    PRIMARY KEY (`ID`)
);

-- CreateTable
CREATE TABLE `Posts` (
    `ID` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
    `Date` DATE NOT NULL,
    `Content` TEXT NOT NULL,
    `Content_shortened` VARCHAR(200) NOT NULL,
    `CategoryID` INTEGER NOT NULL,
    `Viewcount` INTEGER UNSIGNED NOT NULL,

    PRIMARY KEY (`ID`)
);

-- CreateTable
CREATE TABLE `_AuthorsToPosts` (
    `Authors` INTEGER NOT NULL,
    `Posts` INTEGER NOT NULL,

    UNIQUE INDEX `_AuthorsToPosts_AuthorsPosts_unique`(`Authors`, `Posts`),
    INDEX `_AuthorsToPosts_Posts_index`(`Posts`)
);

-- CreateTable
CREATE TABLE `_CategoriesToPosts` (
    `Categories` INTEGER NOT NULL,
    `Posts` INTEGER NOT NULL,

    UNIQUE INDEX `_CategoriesToPosts_CategoriesPosts_unique`(`Categories`, `Posts`),
    INDEX `_CategoriesToPosts_Posts_index`(`Posts`)
);

-- AddForeignKey
ALTER TABLE `_AuthorsToPosts` ADD FOREIGN KEY (`Authors`) REFERENCES `Authors`(`ID`);

-- AddForeignKey
ALTER TABLE `_AuthorsToPosts` ADD FOREIGN KEY (`Posts`) REFERENCES `Posts`(`ID`);

-- AddForeignKey
ALTER TABLE `_CategoriesToPosts` ADD FOREIGN KEY (`Categories`) REFERENCES `Categories`(`ID`);

-- AddForeignKey
ALTER TABLE `_CategoriesToPosts` ADD FOREIGN KEY (`Posts`) REFERENCES `Posts`(`ID`);
