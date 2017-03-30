# table schema queries
CREATE DATABASE IF NOT EXISTS `sample_store`;

USE `sample_store`;

CREATE TABLE IF NOT EXISTS `users` (
	`IdUser` INT(11) NOT NULL AUTO_INCREMENT,
	`Username` VARCHAR(100) NOT NULL DEFAULT '',
	`Email` VARCHAR(100) NOT NULL DEFAULT '',
	`Password` VARCHAR(40) NOT NULL DEFAULT '' COMMENT 'SHA-1 algorithm.',
	PRIMARY KEY (`IdUser`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS `products` (
	`IdProduct` INT(11) NOT NULL AUTO_INCREMENT,
	`ProductName` VARCHAR(50) NOT NULL DEFAULT '',
	`Price` INT(5) NOT NULL,
	PRIMARY KEY (`IdProduct`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS `orders` (
	`IdOrder` INT(11) NOT NULL AUTO_INCREMENT,
	`Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`IdUser` INT(11) NOT NULL,
	`IdProduct` INT(11) NOT NULL,
	PRIMARY KEY (`IdOrder`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0;

insert into users (`Username`, `Email`, `Password`) values ('diana', 'diana@email.com', 12345);

insert into products (`ProductName`, `Price`) values ('product1', 12);
insert into products (`ProductName`, `Price`) values ('product2', 21);
insert into products (`ProductName`, `Price`) values ('product3', 43);
insert into products (`ProductName`, `Price`) values ('product4', 6);
insert into products (`ProductName`, `Price`) values ('product5', 34);
insert into products (`ProductName`, `Price`) values ('product6', 33);
insert into products (`ProductName`, `Price`) values ('product7', 31);
insert into products (`ProductName`, `Price`) values ('product8', 45);
insert into products (`ProductName`, `Price`) values ('product9', 13);
insert into products (`ProductName`, `Price`) values ('product10', 22);

insert into orders (`IdUser`, `IdProduct`) values (1, 2);
insert into orders (`IdUser`, `IdProduct`) values (1, 1);
insert into orders (`IdUser`, `IdProduct`) values (1, 3);