USE sample_store;

insert into users (Username, Email, Password) values ('diana', 'diana@yahoo.com', 12345);
insert into users (`Username`, `Email`, `Password`) values ('andra', 'andra@yahoo.com', 12345);

insert into products (`ProductName`, `Price`, `Currency`) values ('product1', 12, 'RON');
insert into products (`ProductName`, `Price`, `Currency`) values ('product2', 21, 'RON');
insert into products (`ProductName`, `Price`, `Currency`) values ('product3', 43, 'USD');
insert into products (`ProductName`, `Price`, `Currency`) values ('product4', 6, 'USD');
insert into products (`ProductName`, `Price`, `Currency`) values ('product5', 34, 'EUR');
insert into products (`ProductName`, `Price`, `Currency`) values ('product6', 33, 'EUR');
insert into products (`ProductName`, `Price`, `Currency`) values ('product7', 31, 'EUR');
insert into products (`ProductName`, `Price`, `Currency`) values ('product8', 45, 'RON');
insert into products (`ProductName`, `Price`, `Currency`) values ('product9', 13, 'RON');
insert into products (`ProductName`, `Price`, `Currency`) values ('product10', 22, 'RON');

insert into orders (`IdUser`, `IdProduct`, `Date`) values (1, 2, '2017-01-02 14:00:10');
insert into orders (`IdUser`, `IdProduct`, `Date`) values (1, 1, '2017-02-03 18:07:00');
insert into orders (`IdUser`, `IdProduct`, `Date`) values (1, 3, '2017-03-14 19:54:00');

INSERT INTO `user_credentials` (`ClientId`, `SecretKey`, `Email`, `AddDate`) VALUES ('Andra_ID19', 'Andra_TEST', 'andra@yahoo.com', NOW()),
  ('Diana_ID10', 'Diana_TEST', 'diana@yahoo.com', NOW());
