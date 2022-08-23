Create database Trees;

use Trees;

create table Categories
(
    CategoryID int(10) primary key,
    CategoryName varchar(50) not null,
    CategoryNote varchar(30) not null
);

create table Origins
(
    OriginID int(10) primary key,
    OriginName varchar(50) not null,
	OriginDetail varchar(30) not null
);


create table Products
(
    ProductID int(10) primary key,
    ProductName varchar(50) not null,
    ProductPrice int not null,
    ProductImage varchar(30) not null,
    CategoryID int(10) not null,
    OriginID int(10) not null,
    constraint foreign key (CategoryID) references Categories(CategoryID),
    constraint foreign key (OriginID) references Origins(OriginID)

);
create table Details
(
    DetailID int(10) primary key,
    DetailAge int (10) not null,
    DetailSize int(10) not null,
    DetailImage1 varchar(30) not null,
    DetailImage2 varchar(30) default null,
    DetailImage3 varchar(30) default null,
    ProductID int(10) not null,
    constraint foreign key (ProductID) references Products(ProductID)
);


create table Admins
(
    AdminID varchar(10) not null primary key,
    AdminPassword varchar(200) not null,
    AdminFullName varchar(50) not null,
    AdminEmail varchar(50) not null,
    AdminPhone varchar(20) not null,
    AdminAddress varchar(500) not null
);

create table Customers
(	
	CustomerID varchar(10) not null primary key,
    CustomerPass varchar(200) not null,
    CustomerFullname varchar(50) not null,
    CustomerAddress varchar(100) null,
    CustomerEmail varchar(50) null,
    CustomerPhoto varchar(50) null,
    CustomerPhone varchar(12) null
);





