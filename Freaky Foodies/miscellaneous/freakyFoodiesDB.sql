Drop database freakyFoodies;

Create database freakyFoodies;

use freakyFoodies;

-- ---------------–------------ MAKE TABLES ------------------------------


CREATE TABLE Restaurants (
  restaurant_id INT AUTO_INCREMENT PRIMARY KEY,
  restaurant_name VARCHAR(255) NOT NULL,
  contact_number VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  rating DECIMAL(3, 2) DEFAULT 0.0,
  premium_status BOOLEAN DEFAULT FALSE
);

CREATE TABLE MenuItems (
  menu_item_id INT AUTO_INCREMENT PRIMARY KEY,
  restaurant_id INT NOT NULL,
  menu_item_name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (restaurant_id) REFERENCES Restaurants (restaurant_id)
);

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  role_id INT NOT NULL
);

CREATE TABLE Roles ( 
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  role VARCHAR(10) NOT NULL,
  CONSTRAINT FOREIGN KEY (username) REFERENCES users (useranme)
);

CREATE TABLE Reviews (
  review_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  menu_item_id INT NOT NULL,
  review_text TEXT NOT NULL,
  item_rating DECIMAL(2, 1) NOT NULL,
  review_date DATE NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users (user_id),
  FOREIGN KEY (menu_item_id) REFERENCES MenuItems (menu_item_id)
);


CREATE TABLE Followership (
  follower_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  restaurant_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users (user_id),
  FOREIGN KEY (restaurant_id) REFERENCES Restaurants (restaurant_id)
);

-- ------------------------- MOCK DATA INSERTS --------------------------- 

-- Roles
INSERT INTO Roles (role_name) VALUES
  ('Admin'),
  ('User'),
  ('Restaurant')
  ;

-- Restaurants
INSERT INTO Restaurants (restaurant_name, contact_number, address, rating, premium_status) VALUES
  ('Tasty Treats', '123-456-7890', '123 Main St', 4.5, TRUE),
  ('Cafe Delight', '987-654-3210', '456 Elm St', 3.8, FALSE),
  ('Pizza Palace', '555-555-5555', '789 Oak St', 4.2, TRUE);

INSERT INTO Restaurants (restaurant_name, contact_number, address, rating, premium_status) VALUES
('Restaurant D', '5551234567', '321 Lane, City D', 3.5, 0),
('Restaurant E', '8889990000', '654 Boulevard, City E', 4.7, 1),
('Restaurant F', '1112223333', '987 Road, City F', 4.2, 0);


-- MenuItems
INSERT INTO MenuItems (restaurant_id, menu_item_name, price) VALUES
  (1, 'Cheeseburger', 9.99),
  (1, 'French Fries', 3.99),
  (2, 'Espresso', 2.49),
  (2, 'Caesar Salad', 7.99),
  (3, 'Margherita Pizza', 12.99),
  (3, 'Garlic Bread', 4.99);

INSERT INTO MenuItems (restaurant_id, menu_item_name, price) VALUES
(1, 'Item B', 12.99),
(2, 'Item C', 8.99),
(3, 'Item D', 15.50),
(4, 'Item E', 9.99),
(5, 'Item F', 11.50);

-- Users
INSERT INTO Users (username, password, email, role_id) VALUES
  ('john_doe', 'password123', 'john@example.com', 1),
  ('jane_smith', 'abcd1234', 'jane@example.com', 2),
  ('mike_johnson', 'mikepass', 'mike@example.com', 2);

INSERT INTO Users (username, password, email, role_id) VALUES
('admin123', 'adminpass', 'admin@example.com', 1),
('customer1', 'customerpass', 'customer1@example.com', 2),
('customer2', 'customerpass', 'customer2@example.com', 2),
('manager1', 'managerpass', 'manager1@example.com', 3),
('manager2', 'managerpass', 'manager2@example.com', 3);

-- Reviews
INSERT INTO Reviews (user_id, menu_item_id, review_text, item_rating, review_date) VALUES
  (1, 1, 'The cheeseburger was amazing!', 4.5, '2023-07-10'),
  (1, 2, 'The fries were too salty.', 3.0, '2023-07-10'),
  (2, 3, 'Great espresso!', 4.8, '2023-07-09'),
  (2, 4, 'The Caesar salad lacked dressing.', 3.5, '2023-07-09'),
  (3, 5, 'Delicious pizza!', 4.2, '2023-07-08'),
  (3, 6, 'The garlic bread was a bit burnt.', 3.7, '2023-07-08');

INSERT INTO Reviews (user_id, menu_item_id, review_text, item_rating, review_date) VALUES
(2, 1, 'Great dish!', 4.5, '2023-07-11'),
(3, 1, 'Delicious!', 4.8, '2023-07-11'),
(2, 3, 'Good value for money.', 4.2, '2023-07-11'),
(4, 4, 'Tasty food!', 4.6, '2023-07-11'),
(5, 5, 'Excellent service!', 4.9, '2023-07-11');

-- Followership
INSERT INTO Followership (user_id, restaurant_id) VALUES
  (1, 1),
  (1, 2),
  (2, 3);

INSERT INTO Followership (user_id, restaurant_id) VALUES
(2, 1),
(3, 1),
(2, 2),
(4, 3),
(5, 3);




-- drop table roles;

-- create table roles (
--     role_id		SMALLINT AUTO_INCREMENT PRIMARY KEY,
--     username	VARCHAR(255) NOT NULL,
--     role		VARCHAR(10) NOT NULL,
--     CONSTRAINT FOREIGN KEY (username) REFERENCES users (username));

