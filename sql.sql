CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);






use login;

drop table bookings;
drop table equipments;



CREATE TABLE equipments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO equipments (name) VALUES
('hc-hrms'),
('nmr'),
('xband');

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    time VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    equipment_id INT,
    status VARCHAR(255) DEFAULT 'pending',
    UNIQUE (date, time, equipment_id),
    FOREIGN KEY (equipment_id) REFERENCES equipments(id)
);

TRUNCATE table bookings;