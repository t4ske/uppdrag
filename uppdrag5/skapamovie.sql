<h1>Skapar tabellen Movie</h1>
<p>Med kommandot Create Table skapar man en tabell.</p>
<p>I den efterföljande parantesen anger man vilka fält(kolumner) man vill ha, deras namn, datatyp och inställningar</p>
<p>Som avslutning på kommandot (efter slutparentesen) kan man ange lagringsmotor och teckenkodning</p>
==******==
CREATE TABLE Movie
(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  title VARCHAR(100) NOT NULL,
  director VARCHAR(100),
  LENGTH INT DEFAULT NULL, -- Length in minutes
  YEAR INT NOT NULL DEFAULT 1900,
  plot TEXT, -- Short intro to the movie
  image VARCHAR(100) DEFAULT NULL, -- Link to an image
  subtext CHAR(3) DEFAULT NULL, -- swe, fin, en, etc
  speech CHAR(3) DEFAULT NULL, -- swe, fin, en, etc
  quality CHAR(3) DEFAULT NULL,
  format CHAR(3) DEFAULT NULL -- mp4, divx, etc
) ENGINE INNODB CHARACTER SET utf8;