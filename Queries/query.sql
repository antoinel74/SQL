/* Display all */
SELECT
students.*,
    school.school AS campus
FROM
    students
INNER JOIN school ON students.school = school.idschool;

/* Display only name  */
SELECT
    nom
FROM
    students
INNER JOIN school ON students.school = school.idschool;

/* Display birthday, name, firstname and school */
/* (have to rename school as campus because school is ambiguous due to identical table name) */
SELECT
students.nom,
students.prenom,
students.datenaissance,
    school.school AS campus
FROM
    students
INNER JOIN school ON students.school = school.idschool;

/* Display only woman */ 
SELECT
students.*,
    school.school AS campus
FROM
    students
INNER JOIN school ON students.school = school.idschool
WHERE genre = "F";

/* Display only the students that are in the same school as Addy */ 
SELECT
students.*,
    school.school AS campus
FROM
    students
INNER JOIN school ON students.school = school.idschool
WHERE 
students.school = (
SELECT school
FROM students
WHERE nom = "Addy");

/* Filter alphabetically  and limit the results with only 2*/ 
SELECT
    *
FROM
    students
INNER JOIN school ON students.school = school.idschool
ORDER BY nom DESC
LIMIT 2;

/* Add a student */ 
INSERT INTO students (nom, prenom, datenaissance, genre, school)
VALUES("Dalor", "Ginette", "1990-01-01", "F", "1");

/* Modify a student */ 
UPDATE
    students
SET
    prenom = "Omer",
    genre = "M"
WHERE nom = "Dalor";

/* Delete a row */ 
DELETE FROM students WHERE idStudent = 3;

/* Replace 2 by city name */ 
/* First I need to make a new column called school_name because school is an integer and school name is a string  */ 
UPDATE students
SET school_name = CASE 
    WHEN school = 1 THEN 'Bruxelles'
    WHEN school = 2 THEN 'Gent'
    WHEN school = 3 THEN 'Liège'
END;
