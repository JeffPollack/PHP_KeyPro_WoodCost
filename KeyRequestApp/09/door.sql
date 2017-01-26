/**
 * Author:  Jeff
 * Created: Apr 13, 2016
A1. The new table must contain at least one of each column type:(4pts)
Primary key-
Date
Varchar-
A2. The new table must contain at least 4 other columns of different types. Choose from the following:(4pts)
Double
Int-
TinyInt/Boolean-
Float-
Decimal
Enum
Text/MediumText/LongText-
Datetime
A3. Include the Create syntax of the new table in comments in your code.
 */
CREATE TABLE door (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
building VARCHAR(20) NOT NULL, 
doorNum INT(4) NOT NULL, 
hasCore TINYINT NOT NULL DEFAULT 0, 
core VARCHAR(7), 
serialNum FLOAT,
roomType TEXT);

INSERT INTO door (building, doorNum, hasCore, core, serialNum, roomType) VALUES ("Pollack Home", 1010, 1, "1GM125", 123.12, "This is the main office for the building. CEO suite");
INSERT INTO door (building, doorNum, hasCore, core, serialNum, roomType) VALUES ("Pollack Home", 1012, 1, "1AA15", 145.25, "This is a private bathroom owned by the king of the Orcs. Must remain locked");
INSERT INTO door (building, doorNum, hasCore, core, serialNum, roomType) VALUES ("Pollack Home", 1132, 1, "1GM15", 528.2, "Private Man Cave.");
INSERT INTO door (building, doorNum, hasCore, core, serialNum, roomType) VALUES ("Pollack Home", 2153, 1, "3AB125", 323.12, "Master bedroom for the owners of Pollack Home.");
INSERT INTO door (building, doorNum, roomType) VALUES ("Pollack Home", 2245, "Public bar for the workers of Pollack Home to relax, kick their feet up and enjoy some beer.");

