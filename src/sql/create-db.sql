-- Delete database if it exists, create fresh database and use it for following queries
DROP DATABASE IF EXISTS `landmark-app`;

CREATE DATABASE `landmark-app`;

-- Create landmark table
CREATE TABLE `landmark-app`.`landmarks` (
  landmark_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  landmark_desc VARCHAR (50) NOT NULL,
  landmark_coords VARCHAR (50) NOT NULL
);

-- Insert a test value
INSERT INTO `landmark-app`.`landmarks` (landmark_desc, landmark_coords)
VALUES ('test1', 'test2');
