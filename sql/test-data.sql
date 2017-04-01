insert into users (`Username`, `Email`, `Password`) values ('diana', 'diana@email.com', 12345);
insert into users (`Username`, `Email`, `Password`) values ('andra', 'andra@email.com', 12345);

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

insert into orders (`IdUser`, `IdProduct`) values (1, 2);
insert into orders (`IdUser`, `IdProduct`) values (1, 1);
insert into orders (`IdUser`, `IdProduct`) values (1, 3);