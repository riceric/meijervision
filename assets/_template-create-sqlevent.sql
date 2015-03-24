--SHOW PROCESSLIST;

--SET GLOBAL event_scheduler = ON;

DELIMITER $$
CREATE
	EVENT `update_storehours`
	AT `2013-04-18 00:00.00`
	DO BEGIN
		--Update store hours for DEWITT
		UPDATE  `vcmeijer`.`location` SET  `hours` =  'Mon, Wed 9:30am - 6pm; Tue, Thu 11am - 7pm; Fri 9am - 5pm; Sat 8am - 3pm' WHERE  `location`.`id` =2009;
	END;/$$
DELIMITER ;