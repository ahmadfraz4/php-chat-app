-- creating database
CREATE DATABASE `chat-app`;

-- creating USER table


use `test-1`;

CREATE TABLE user (
    id INT(11) AUTO_INCREMENT NOT NULL,
    unique_id INT(11) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(70) NOT NULL,
    password VARCHAR(225) NOT NULL,
    image VARCHAR(225) NOT NULL UNIQUE,
    status VARCHAR(40),
    primary key(id)
);


-- creating chat table
CREATE TABLE chat (
    cid INT(11) AUTO_INCREMENT NOT NULL,
    incoming_id INT(11) NOT NULL,
    outgoing_id INT(11) NOT NULL,
    message VARCHAR(1000),
    primary key(cid)
);
