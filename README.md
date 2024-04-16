# SMART-HOMEWORK-PLANNER

CREATE TABLE `smarthomework`.`planner` (
    `id` INT(50) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `confirmpassword` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;






CREATE TABLE `smarthomework`.`planning` (
    `id` INT(50) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `subject` VARCHAR(10000) NOT NULL,
    `message` VARCHAR(10000) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;