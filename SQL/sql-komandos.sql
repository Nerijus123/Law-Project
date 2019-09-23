CREATE DATABASE lawProject;

-- primary key uzdeda id ant stulpelio , AUTO_INCREMENT  - automatinis didejimas
CREATE TABLE IF NOT EXISTS atsiliepimai (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  atsiliepimas VARCHAR(60) not NULL,
  vardas VARCHAR(60) not NULL
);

--PASITIKRINTI
show tables;

  INSERT INTO atsiliepimai VALUES ("", "", "");
  INSERT INTO atsiliepimai VALUES ("", "", "");
  INSERT INTO atsiliepimai VALUES ("", "", "");

  SELECT * FROM atsiliepimai;
--==============================================================================================
  CREATE TABLE IF NOT EXISTS about (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    aprasimas VARCHAR(700) not NULL
  );
  INSERT INTO about VALUES ("", "1 aprasimas Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
  INSERT INTO about VALUES ("", "2 aprasimas Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
--PASITIKRINTI
show tables;

--==================================================================================================
CREATE TABLE IF NOT EXISTS darbai (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  aprasimas VARCHAR(700) not NULL
);

INSERT INTO darbai VALUES ("", "1 darbas Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
INSERT INTO darbai VALUES ("", "2 darbas Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
-- login komandos db


CREATE TABLE users1 (
  user_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  user_first varchar(256) NOT NULL,
  user_last varchar(256) NOT NULL,
  user_email varchar(256) NOT NULL,
  user_uid varchar(256) NOT NULL,
  user_pwd varchar(256) NOT NULL
);
