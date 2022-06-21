CREATE DATABASE bookstore;
USE bookstore;

CREATE TABLE users(
    user_id int not null AUTO_INCREMENT,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    username varchar(50) not null,
    password varchar(50) not null,
    email varchar(128) not null,
    mobile_no bigint not null,
    PRIMARY KEY (user_id)
);

CREATE TABLE books(
    book_id int not null AUTO_INCREMENT,
	title varchar(200),
    isbn varchar(20),
    price double(12,2),
    author varchar(128),
    type varchar(128),
    image varchar(128),
    PRIMARY KEY (book_id)
);

CREATE TABLE cart(
	cart_id int not null AUTO_INCREMENT,
    user_id int,
    book_id int,
    price double(12,2),
    quantity int,
    total_price double(12,2),
    PRIMARY KEY (cart_id),
    CONSTRAINT FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL ON UPDATE CASCADE
);

INSERT INTO users(`first_name`, `last_name`, `username`, `password`, `email`, `mobile_no`) VALUES('test', 'test', 'admin', '123', '123@abc.com', '1234567890');

INSERT INTO `books`(`title`, `isbn`, `price`, `author`, `type`, `image`) VALUES ('Lonely Planet Australia (Travel Guide)','123-456-789-1',136,'Lonely Planet','Travel','image/travel.jpg');
INSERT INTO `books`(`title`, `isbn`, `price`, `author`, `type`, `image`) VALUES ('Crew Resource Management, Second Edition','123-456-789-2',599,'Barbara Kanki','Technical','image/technical.jpg');
INSERT INTO `books`(`title`, `isbn`, `price`, `author`, `type`, `image`) VALUES ('CCNA Routing and Switching 200-125 Official Cert Guide Library','123-456-789-3',329,'Cisco Press ','Technology','image/technology.jpg');
INSERT INTO `books`(`title`, `isbn`, `price`, `author`, `type`, `image`) VALUES ('Easy Vegetarian Slow Cooker Cookbook','123-456-789-4',75.9,'Rockridge Press','Food','image/food.jpg');



