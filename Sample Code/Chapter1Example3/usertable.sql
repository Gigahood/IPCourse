USE mydb;

CREATE TABLE Authorized_Users (
  username VARCHAR(16) NOT NULL PRIMARY KEY,
  passwd CHAR(40) NOT NULL
);