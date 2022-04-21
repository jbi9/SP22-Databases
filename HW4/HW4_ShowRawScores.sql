-- Joanna Bi jbi9 
-- ShowRawScores.sql
-- Shows Raw Scores for a student specified by sid 

DELIMITER //

DROP PROCEDURE IF EXISTS ShowRawScores //

CREATE PROCEDURE ShowRawScores(IN id VARCHAR(4))
BEGIN
   IF EXISTS(SELECT * FROM HW4_Student WHERE SID = id) THEN
      	SELECT SID, LName, FName, Sec
      	FROM HW4_Student
      	WHERE SID = id;

	SELECT A.AName, R.Score
	FROM HW4_Assignment AS A LEFT OUTER JOIN (SELECT AName, Score FROM HW4_RawScore WHERE SID = id) AS R
	ON A.AName = R.AName;
   END IF;
END; //

DELIMITER ;
