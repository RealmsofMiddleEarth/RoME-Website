DROP DATABASE IF EXISTS rome;
CREATE DATABASE rome;
USE rome;


CREATE TABLE user_logins (
    email VARCHAR(320) NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    PRIMARY KEY (email)
);


CREATE TABLE characters (
    email VARCHAR(320) NOT NULL,
    forename NVARCHAR(32) NOT NULL,
    surname NVARCHAR(32) NOT NULL,
    age INTEGER NOT NULL,
    gender ENUM('male', 'female', 'genderfluid') NOT NULL,
    race ENUM('hobbit', 'elf', 'dwarf', 'human') NOT NULL,
    power SMALLINT NOT NULL DEFAULT 0,
    will SMALLINT NOT NULL DEFAULT 0,
    agility INTEGER NOT NULL DEFAULT 0,
    avatar VARCHAR(50),
    PRIMARY KEY (email, forename, surname),
    FOREIGN KEY (email) REFERENCES user_logins(email)
);
-- email - the email they signed up with 
-- forename/surname - the name they're using for their character 
-- age - the age of their character 
-- gender - the gender of their character 
-- race - the race of their character 
-- power/will/agility - the stats of their character 
-- avatar - the url of the character's avatar

