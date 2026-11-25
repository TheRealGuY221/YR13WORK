-- Example schema for a NEW database. Do not overwrite your existing tables.
CREATE DATABASE IF NOT EXISTS farmshop;
USE farmshop;
CREATE TABLE IF NOT EXISTS user (UserID INT AUTO_INCREMENT PRIMARY KEY, Email VARCHAR(255) UNIQUE NOT NULL, Password VARCHAR(255) NOT NULL, Fname VARCHAR(100), Sname VARCHAR(100), Address VARCHAR(255), signuptime DATETIME, PhoneNumber VARCHAR(30)) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS Products (ProductID INT AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(100) NOT NULL, description TEXT, Price DECIMAL(10,2) NOT NULL, Supplier INT, Addedon DATE, imagename VARCHAR(255), dailyStock INT NOT NULL) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS Orders (OrderID INT AUTO_INCREMENT PRIMARY KEY, UserID INT NOT NULL, Total DECIMAL(12,2) NOT NULL, OrderedOn DATETIME DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY(UserID) REFERENCES user(UserID)) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS OrderItems (OrderID INT NOT NULL, ProductID INT NOT NULL, Quantity INT NOT NULL, UnitPrice DECIMAL(10,2) NOT NULL, PRIMARY KEY(OrderID,ProductID), FOREIGN KEY(OrderID) REFERENCES Orders(OrderID), FOREIGN KEY(ProductID) REFERENCES Products(ProductID)) ENGINE=InnoDB;
-- Optional sample data for a fresh test database only:
-- INSERT INTO Products (Name,description,Price,dailyStock) VALUES ('Milk','Fresh milk',1.50,10),('Eggs','Free range eggs',2.80,15);
