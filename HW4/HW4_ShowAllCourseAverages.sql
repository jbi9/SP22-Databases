-- Joanna Bi jbi9
-- ShowAllCourseAverages.sql
-- Shows All Course Averages

DELIMITER //

DROP PROCEDURE IF EXISTS ShowAllCourseAverages //

CREATE PROCEDURE ShowAllCourseAverages(IN pwd VARCHAR(15))
BEGIN
   IF EXISTS(SELECT * FROM HW4_Password WHERE CurPasswords = pwd) THEN
        SELECT * FROM HW4_Password;
   END IF;
END; //

DELIMITER ;
