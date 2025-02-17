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
  landmark_links VARCHAR(40) NOT NULL,
  landmark_audio VARCHAR(40) NOT NULL,
  landmark_image VARCHAR(40) NOT NULL
);

-- Insert a test value
INSERT INTO `landmark-app`.`landmarks` (landmark_name, landmark_lat, landmark_lon, landmark_desc, landmark_links, landmark_audio, landmark_image)
VALUES ('Spire of Dublin', 53.349796, -6.260265, 'spire-desc.txt', 'spire-links.txt', 'spire.mp3', 'spire.jpg'),
('Poolbeg Lighthouse', 53.342006999999995, -6.151676999999999, 'poolbeg-desc.txt', 'poolbeg-links.txt', 'poolbeg.mp3', 'poolbeg.jpg'),
('General Post Office', 53.349369, -6.260251, 'gpo-desc.txt', 'gpo-links.txt', 'gpo.mp3', 'gpo.jpg'),
('Newgrange', 53.69453399784049, -6.475217, 'newgrange-desc.txt', 'newgrange-links.txt', 'newgrange.mp3', 'newgrange.jpg');
