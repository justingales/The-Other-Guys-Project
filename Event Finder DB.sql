BEGIN;
CREATE DATABASE IF NOT EXISTS EventFinder;
USE EventFinder;

CREATE TABLE EVENTS (
	EVENT_ID NUMERIC(10,0),
    EVENT_NAME VARCHAR(200),
    EVENT_DATE DATE,
    EVENT_TYPE VARCHAR(50),
    EVENT_TIME TIME,
    LOCATION_ID NUMERIC(10,0),
    TICKET_ID NUMERIC(10,0),
    PRIMARY KEY (EVENT_ID),
    FOREIGN KEY (LOCATION_ID) REFERENCES LOCATION(LOCATION_ID),
    FOREIGN KEY (TICKET_ID) REFERENCES TICKETS(TICKET_ID)
    );
    
/*EVENTS ROWS*/
INSERT INTO EVENTS VALUES (1,'Dominic Fike: Out of Order Tour','2022-12-09','Concert','19:00:00',1,1);

CREATE TABLE LOCATION (
LOCATION_ID NUMERIC(10,0),
EVENT_ID NUMERIC(10,0),
PRIMARY KEY (LOCATION_ID),
FOREIGN KEY (EVENT_ID) REFERENCES EVENTS(EVENT_ID)
);

/*LOCATION ROWS*/
INSERT INTO LOCATION VALUES (1,1);

CREATE TABLE EVENT_LOCATION (
ADDRESS VARCHAR(100),
CITY VARCHAR(100),
STATE VARCHAR(20),
ZIP NUMERIC(5,0),
LOCATION_ID NUMERIC(10,0),
FOREIGN KEY (LOCATION_ID) REFERENCES EVENT_LOCATION(LOCATION_ID)
);

/*EVENT_LOCATION ROWS*/
INSERT INTO EVENT_LOCATION VALUES ('2000 Brush St.','Detroit','MI',48226,1);

CREATE TABLE TICKETS (
	TICKET_ID NUMERIC(10,0),
	TICKET_PRICE NUMERIC(10,0),
	FREE_ADMISSION BOOL,
	TICKET_LINK NVARCHAR(10000)
);

/*TICKETS ROWS*/
INSERT INTO TICKETS VALUES (1,100,0,'https://concerts.livenation.com/dominic-fike-out-of-order-tour-detroit-michigan-12-09-2022/event/08005D34E86B5822?_ga=2.170296873.806699645.1669336699-480617479.1668720640');
