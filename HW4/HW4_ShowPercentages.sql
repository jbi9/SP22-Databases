-- Joanna Bi jbi9
-- ShowPercentages.sql
-- Shows Percentages for a student specified by sid 

DELIMITER //

DROP PROCEDURE IF EXISTS ShowRawScores //

CREATE PROCEDURE ShowRawScores(IN id VARCHAR(4))
BEGIN
   IF EXISTS(SELECT * FROM HW4_Student WHERE SID = id) THEN
        DROP VIEW IF EXISTS Pct;

        CREATE VIEW Pct AS 
        SELECT A.AName, A.AType, R.Score / A.PtsPoss * 100 AS 'Percentage'
        FROM HW4_Assignment AS A LEFT OUTER JOIN (SELECT AName, Score FROM HW4_RawScore WHERE SID = id) AS R 
        ON A.AName = R.AName;

        WITH Quiz AS (
            SELECT 0.4 * SUM(P.Percentage / 4) AS qWeight
            FROM HW4_Assignment AS A, Pct AS P
            WHERE A.AType = 'QUIZ' AND A.AName = P.AName),
        Exam AS (
            SELECT 0.6 * SUM(P.Percentage / 3) AS eWeight
            FROM HW4_Assignment AS A, Pct AS P
            WHERE A.AType = 'EXAM' AND A.AName = P.AName)
        SELECT S.SID, S.LName, S.FName, S.Sec, CAST(Q.qWeight + E.eWeight AS DECIMAL(4, 2)) AS WeightedAvg
        FROM HW4_Student AS S, Pct AS P, Quiz AS Q, Exam AS E
        WHERE S.SID = id;
   END IF;
END; //

DELIMITER ;
