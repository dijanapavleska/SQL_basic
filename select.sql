SELECT *
FROM `countries`
WHERE 1;

SELECT *
FROM `countries`
WHERE `population` > 20000000;

SELECT *
FROM `countries`
WHERE `population` > 20000000
ORDER BY `population`;

SELECT *
FROM `countries`
WHERE `population` > 20000000
ORDER BY `population`
LIMIT 10;

SELECT *
FROM `cities`
LIMIT 10;

--  Write a SQL query that would select 100 rows of the cities table with the best (biggest) population value.
SELECT *
FROM `cities`
ORDER BY `population` DESC
LIMIT 100;

SELECT *
FROM `cities`
ORDER BY `population` DESC
LIMIT 0, 20;