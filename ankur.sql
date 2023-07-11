
create database police_management_system;
use police_management_system;

CREATE TABLE admin (
  id INT PRIMARY KEY AUTO_INCREMENT,
  admin_name VARCHAR(255) NOT NULL,
  admin_password VARCHAR(255) NOT NULL
);


CREATE TABLE city (
  CtCode int NOT NULL AUTO_INCREMENT,
  CityName VARCHAR(255) NOT NULL,
  PRIMARY KEY (CtCode)
);

CREATE TABLE contacts (
  contact_id INT(11) AUTO_INCREMENT PRIMARY KEY,
  contact_name VARCHAR(255) NOT NULL,
  contact_no VARCHAR(255) NOT NULL,
  issue VARCHAR(255) NOT NULL
);


CREATE TABLE fir (
  fir_no int  AUTO_INCREMENT PRIMARY KEY,
  user_id int NOT NULL,
  date_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  particulars VARCHAR(255) NOT NULL,
  suspect_name VARCHAR(255),
  suspect_phone_no VARCHAR(55),
  suspect_address VARCHAR(255),
  fir_status TINYINT(1) NOT NULL
);


CREATE TABLE officer_type_master (
  officer_type_id int  AUTO_INCREMENT PRIMARY KEY,
  officer_type VARCHAR(255) NOT NULL
);

CREATE TABLE area (
  AreaCode int NOT NULL AUTO_INCREMENT,
  CtCode int NOT NULL,
  AreaName VARCHAR(255) NOT NULL,
  PRIMARY KEY (AreaCode),
  FOREIGN KEY (CtCode) REFERENCES city(CtCode) ON UPDATE RESTRICT ON DELETE RESTRICT
);


CREATE TABLE user (
  user_id int  AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(255) NOT NULL,
  user_image VARCHAR(255) NOT NULL,
  user_email VARCHAR(255) NOT NULL,
  user_dob DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  user_gender TINYINT(1) NOT NULL,
  user_password VARCHAR(20) NOT NULL,
  user_address VARCHAR(255) NOT NULL,
  user_phone_no VARCHAR(55) NOT NULL
);

CREATE TABLE station_master (
  station_id int  AUTO_INCREMENT PRIMARY KEY,
  station_name VARCHAR(255) NOT NULL,
  AreaCode int NOT NULL,
  CtCode int NOT NULL,
  FOREIGN KEY (AreaCode) REFERENCES area(AreaCode) ON UPDATE RESTRICT ON DELETE RESTRICT,
  FOREIGN KEY (CtCode) REFERENCES city(CtCode) ON UPDATE RESTRICT ON DELETE RESTRICT
);


CREATE TABLE officer (
  officer_id int  AUTO_INCREMENT PRIMARY KEY,
  officer_name VARCHAR(255) NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  officer_email VARCHAR(255) NOT NULL,
  officer_password VARCHAR(255) NOT NULL,
  officer_dob DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  officer_gender TINYINT(1) NOT NULL,   
  officer_address VARCHAR(255) NOT NULL,
  officer_phone_no VARCHAR(55) NOT NULL,
  officer_date_of_joining DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  station_id int,
  officer_type_id int,
  FOREIGN KEY (station_id) REFERENCES station_master(station_id) ,
  FOREIGN KEY (officer_type_id) REFERENCES officer_type_master(officer_type_id)
  on delete cascade
  on update cascade
  );

CREATE TABLE leave_request (
  leave_id int  AUTO_INCREMENT PRIMARY KEY, 
  officer_id int  NOT NULL,
  leave_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  no_of_days int NOT NULL,
  reason VARCHAR(255) NOT NULL,
  FOREIGN KEY (officer_id) REFERENCES officer(officer_id) ON UPDATE RESTRICT ON DELETE RESTRICT
);