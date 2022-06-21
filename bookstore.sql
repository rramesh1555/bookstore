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
)


INSERT INTO users(`first_name`, `last_name`, `username`, `password`, `email`, `mobile_no`) VALUES('test', 'test', 'admin', '123', '123@abc.com', '1234567890');

INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Lonely Planet Australia (Travel Guide)',10,136,'Lonely Planet','Travel','image/travel.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Crew Resource Management, Second Edition',10,599,'Barbara Kanki','Technical','image/technical.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('CCNA Routing and Switching 200-125 Official Cert Guide Library',10,329,'Cisco Press ','Technology','image/technology.jpg');
INSERT INTO `bookinventory`(`title`, `quantity`, `price`, `author`, `type`, `image`) VALUES ('Easy Vegetarian Slow Cooker Cookbook',10,75.9,'Rockridge Press','Food','image/food.jpg');



-- CREATE TABLE cart(
-- 	cart_id int not null AUTO_INCREMENT,
--     user_id int,
--     book_id int,
--     price double(12,2),
--     quantity int,
--     total_price double(12,2),
--     PRIMARY KEY (cart_id),
--     CONSTRAINT FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE SET NULL ON UPDATE CASCADE,
--     CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL ON UPDATE CASCADE
-- );