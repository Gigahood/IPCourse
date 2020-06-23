USE sample_DB;

CREATE TABLE Products ( 
  ProductID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ProductName CHAR(50) NOT NULL,
  Price FLOAT(5,2) 
);

INSERT INTO Products VALUES
  (1, 'Table', 20.00),
  (2, 'Chair', 5.00),
  (3, 'Tent', 50.00);