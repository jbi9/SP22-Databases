-- Joanna Bi jbi9
-- ShowAllRawScores.sql
-- Shows All Raw SCores

DELIMITER //

DROP PROCEDURE IF EXISTS ShowAllRawScores //

CREATE PROCEDURE ShowAllRawScores(IN pwd VARCHAR(15))
BEGIN
   IF EXISTS(SELECT * FROM HW4_Password WHERE CurPasswords = pwd) THEN
        SELECT * FROM HW4_Password;
   END IF;
END; //

DELIMITER ;
