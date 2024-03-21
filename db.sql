CREATE DATABASE sanjivni;


CREATE TABLE bgproducts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bgname VARCHAR(100),
    bgid INT,
    proname VARCHAR(100),
    proprice DECIMAL(10, 2),
    proimg VARCHAR(255),
    date DATETIME
);


CREATE TABLE registered_bg (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bgname VARCHAR(100),
    nopeople INT,
    bgdesc TEXT,
    city VARCHAR(100),
    email VARCHAR(100),
    pass VARCHAR(255),
    poster VARCHAR(255),
    contactno VARCHAR(20),
    date DATETIME
);



CREATE TABLE userreg (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    mnum VARCHAR(20),
    username VARCHAR(50),
    pass VARCHAR(255)
);
