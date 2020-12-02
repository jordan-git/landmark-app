-- Delete database if it exists, create fresh database and use it for following queries
DROP DATABASE IF EXISTS `landmark-app`;

CREATE DATABASE `landmark-app`;

-- Create landmark table
CREATE TABLE `landmark-app`.`landmarks` (
  landmark_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  landmark_name VARCHAR (50) NOT NULL,
  landmark_lat FLOAT NOT NULL,
  landmark_lon FLOAT NOT NULL,
  landmark_desc VARCHAR(40) NOT NULL,
  landmark_audio VARCHAR(40) NOT NULL
);

-- Insert a test value
INSERT INTO `landmark-app`.`landmarks` (landmark_name, landmark_lat, landmark_lon, landmark_desc, landmark_audio)
VALUES ('Spire of Dublin', 53.349796, -6.260265, 'spire.txt', 'spire.mp3');
