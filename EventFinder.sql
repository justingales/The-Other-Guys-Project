BEGIN;
CREATE DATABASE IF NOT EXISTS EventFinder;
USE EventFinder;

CREATE TABLE IF NOT EXISTS TICKETS (
	TICKET_ID INT NOT NULL AUTO_INCREMENT,
	TICKET_PRICE NUMERIC(10,0),
	TICKET_LINK NVARCHAR(10000),
    PRIMARY KEY (TICKET_ID)
);

CREATE TABLE IF NOT EXISTS LOCATION (
LOCATION_ID INT NOT NULL AUTO_INCREMENT,
ADDRESS VARCHAR(100),
CITY VARCHAR(100),
STATE VARCHAR(20),
ZIP NUMERIC(5,0),
PRIMARY KEY (LOCATION_ID)
);

CREATE TABLE IF NOT EXISTS EVENTS (
	EVENT_ID INT NOT NULL AUTO_INCREMENT,
    EVENT_NAME VARCHAR(200),
	EVENT_TYPE VARCHAR(50),
    EVENT_DATE DATE,
    EVENT_TIME TIME,
    LOCATION_ID INT,
    TICKET_ID INT,
    PRIMARY KEY (EVENT_ID),
    FOREIGN KEY (LOCATION_ID) REFERENCES LOCATION(LOCATION_ID),
	FOREIGN KEY (TICKET_ID) REFERENCES TICKETS(TICKET_ID)
    );

/*TICKETS ROWS*/
INSERT INTO TICKETS (TICKET_PRICE, TICKET_LINK) VALUES (100,'https://concerts.livenation.com/dominic-fike-out-of-order-tour-detroit-michigan-12-09-2022/event/08005D34E86B5822?_ga=2.170296873.806699645.1669336699-480617479.1668720640');

/*EVENT_LOCATION ROWS*/
INSERT INTO LOCATION (ADDRESS, CITY, STATE, ZIP) VALUES ('2000 Brush St.','Detroit','MI',48226);

/*EVENTS ROWS*/
INSERT INTO EVENTS (EVENT_NAME, EVENT_TYPE, EVENT_DATE, EVENT_TIME, LOCATION_ID, TICKET_ID) VALUES ('Dominic Fike: Out of Order Tour','Concert','2022-12-09','19:00:00', 1, 1);
