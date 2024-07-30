CREATE TABLE employees (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) ,
Original_salary INT(20),
days_taken_off INT(3),
actual_salary INT(20)
);

INSERT INTO employees (name, salary, days_taken_off,) VALUES
('Waleed Ahmad', 5000, 5),
('Omar Ali', 6000, 3),
('Aseel Aburumman', 5500, 2),
('Tala Khaled', 7000, 0),
('Ahmad Ali', 620, 4);


-------------------------------------------------------------------------------------

Create a Trigger for Inserting Data:

DELIMITER //

<!-- DELIMITER //: This changes the delimiter from the default semicolon (;) to //. This is necessary because the trigger contains multiple SQL statements, and we need a way to define the end of the trigger's body. By changing the delimiter, we can include semicolons within the trigger without ending the entire statement. -->

CREATE TRIGGER calculate_actual_salary_before_insert
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
SET NEW.actual_salary = NEW.salary - (NEW.salary / 30 * NEW.days_taken_off);
END;

//

DELIMITER ;