CREATE DATABASE bookstore;
USE bookstore;

CREATE TABLE users(
    user_id int not null AUTO_INCREMENT,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    username varchar(50) not null unique,
    password varchar(50) not null,
    email varchar(128) not null unique,
    mobile_no bigint not null,
    PRIMARY KEY (user_id)
);

CREATE TABLE bookinventory(
    book_id int not null AUTO_INCREMENT,
	title varchar(200),
    quantity int,
    price double(12,2),
    author varchar(128),
    type varchar(128),
    image varchar(128),
    PRIMARY KEY (book_id)
);

CREATE TABLE bookinventoryorder (
    order_id int not null AUTO_INCREMENT,
    book_id int,
    user_id int,
    customer_name varchar(100),
    quantity int,
    order_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (order_id)
);