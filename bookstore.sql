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


INSERT INTO users(`first_name`, `last_name`, `username`, `password`, `email`, `mobile_no`) VALUES('test', 'test', 'admin', '123', '123@abc.com', '1234567890');

INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Lonely Planet Australia (Travel Guide)',10,136,'Lonely Planet','Travel','image/travel.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Crew Resource Management, Second Edition',10,599,'Barbara Kanki','Technical','image/technical.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Easy Vegetarian Slow Cooker Cookbook',10,75.9,'Rockridge Press','Food','image/food.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('The Alchemist',10,150,'Paulo Coelho','Fantasy','image/ALCHEMIST.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Hamnet, Third Edition',10,399,'Maggie O Farrell','Fiction','image/HAMNET.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Harry Potter',10,800,'J. K. Rowling','Fantasy','image/HARRYPOTTER.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Notes on a Silencing: A Memoir',10,440,'Lacy Crawford','Drama','image/NOTES.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Da Vinci Code',10,200,'Dan Brown','Mystery','image/THEDAVINCICODE.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Twilight Mind',10,575.99,'Julie-Anne','Thriller','image/THETWILIGHTSAGA.jpg');