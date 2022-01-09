----------------
-- MOOD COACH --
----------------

-- UC: Engenharia de Sistemas de Informação (ESIN)
-- Mestrado em Bioengenharia | Engenharia Biomédica
-- Authors: Ana Marta Dias (up201806879)
--          Joana Martins (up201806234)
--          Pedro Sousa (up208106246)

-------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------

-- Dropping all Tables
PRAGMA foreign_keys = OFF;
DROP TABLE IF EXISTS Feedback;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Organization;
DROP TABLE IF EXISTS HealthProfessional;
DROP TABLE IF EXISTS Question;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Patient;
DROP TABLE IF EXISTS Test;

-------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------

-----------
-- SETUP --
-----------

PRAGMA foreign_keys = ON;
PRAGMA defer_foreign_keys = true;
.mode columns
.headers ON

/*
'cd sql' to access the sql folder
'.\sqlite3.exe moodCoach.db' will save our script into a Database (.db file)
'.read "sql_database.sql"' will read the script, finally creating a file and allowing us to debug
'.tables' will check for all existing Tables
*/

-------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------

--------------------
-- CLASS CREATION --
--------------------

-- User SuperClass
CREATE TABLE User (

    -- Primary Key is always unique, hence the use of the Citizen's Card Number
    cc_number INTEGER PRIMARY KEY,

    password_ TEXT NOT NULL,                -- A password needn't be unique, nor does a name
    name_ TEXT NOT NULL,
    phone_number INTEGER NOT NULL UNIQUE,   -- However, a phone number and an email must
    email TEXT NOT NULL UNIQUE
);

-- Health Professional SubClass
CREATE TABLE HealthProfessional (

    -- Primary Key referencing User Superclass  
    cc_number INTEGER PRIMARY KEY references User(cc_number),  
    
    license_id INTEGER NOT NULL UNIQUE,     -- For verification that the user is in fact an active Health Professional
    workplace_id INTEGER NOT NULL,          -- For the Professional to be active, they must be assigned to a Workplace
    patients_assigned INTEGER NOT NULL default 0 CHECK(patients_assigned >= 0 AND patients_assigned <= 5)
    -- The number of patients assigned to a Health Professional must never exceed 5 (or be negative for that matter)
);

-- Patient Subclass
CREATE TABLE Patient (

    -- Primary Key referencing User Superclass
    cc_number INTEGER PRIMARY KEY references User(cc_number),

    health_number INTEGER NOT NULL UNIQUE,
    date_birth TEXT NOT NULL,               -- Date in TEXT form will correspond to YYYY-MM-DD
    adress TEXT NOT NULL,

    -- Foreign Key referring to HealthProfessional (1 to Many)
    doctor INTEGER NOT NULL,                -- Cannot be UNIQUE, since more than one patient can have the same Doctor
    FOREIGN KEY (doctor) REFERENCES HealthProfessional(cc_number) ON DELETE CASCADE ON UPDATE CASCADE
    -- If the HealthProfessional is deleted, then this foreign key will automatically be deleted as well
);

-------------------------------------------------------------------------------------------------------------------------------

-- Test and Question Classes
CREATE TABLE Test (

    -- Test ID Primary Key
    test_id INTEGER PRIMARY KEY AUTOINCREMENT,

    date_ TEXT NOT NULL,                    -- Date in TEXT form will correspond to YYYY-MM-DD (only 1 Test a day)
    paper_doi TEXT NOT NULL,                -- Different tests can refer to the same Paper

    -- Foreign Key referring to HealthProfessional and Patient (1 to Many)
    health_professional INTEGER UNIQUE NOT NULL,    -- A Test will only exist if 1 and 1 Doctor only is responsible for it
    patient INTEGER,                                -- 0 or more patients can take the Test
    FOREIGN KEY (health_professional) references HealthProfessional(cc_number) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (patient) references Patient(cc_number) ON DELETE CASCADE ON UPDATE CASCADE,
    -- If the Patient or Health Professional are deleted, then this foreign key will automatically be deleted as well

    UNIQUE(patient, date_)
);


CREATE TABLE Question (
    
    -- Question ID Primary Key
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    content TEXT NOT NULL,
    parameter TEXT NOT NULL CHECK(parameter = "Profound Sadness" OR parameter = "Fatigue" OR parameter = "Anxiety" OR parameter = "Difficulty Concentrating" OR parameter = "Worry and Fear" OR parameter = "Mood Swings" OR parameter = "Changes in Eating / Sleeping Habits" OR parameter = "Anger and Irritability"),
    answer TEXT NOT NULL CHECK(answer = "Strongly Disagree" OR answer = "Disagree" OR answer = "Neutral" OR answer = "Agree" OR answer = "Strongly Agree"),

    -- Foreign Key referring to Test (Composition)
    test_id INTEGER NOT NULL references Test(test_id)
    -- Various questions can belong to the same Test. Since it is a composition, if a question is deleted, the Test won't be
);

-------------------------------------------------------------------------------------------------------------------------------

-- Health Professional Feedback Class
CREATE TABLE Feedback (

    -- Test ID Primary Key
    test_id INTEGER PRIMARY KEY references Test(test_id),

    diagnosis TEXT NOT NULL CHECK(diagnosis = "Bipolarity" OR diagnosis = "Depression" OR diagnosis = "Anxiety" OR diagnosis = "None"),
    prescription TEXT,
    advice TEXT,

    -- Foreign Key referring to the Patient who will be submitted through the Test
    patient INTEGER NOT NULL,       -- More than 1 Patient can go through the same Test
    FOREIGN KEY (patient) references Patient(cc_number) ON DELETE CASCADE ON UPDATE CASCADE
    -- If the Patient is deleted, then this foreign key will automatically be deleted as well
);

-------------------------------------------------------------------------------------------------------------------------------

-- Forum Classes
CREATE TABLE Post (
    
    -- Post ID Primary Key
    post_id INTEGER PRIMARY KEY AUTOINCREMENT,

    text_ TEXT NOT NULL,        -- A Post cannot be empty

    -- Foreign Key referring to the User who creates the post
    user INTEGER NOT NULL,          -- Any type of User can create a Post
    FOREIGN KEY (user) references User(cc_number) ON DELETE CASCADE ON UPDATE CASCADE
    -- If the User is deleted, then this foreign key will automatically be deleted as well
);

CREATE TABLE Comment (
    
    -- Comment ID Primary Key
    comment_id INTEGER PRIMARY KEY AUTOINCREMENT,

    text_ TEXT NOT NULL,        -- A Comment on a Post cannot be empty

    -- Foreign Keys referring to the Post and the User who commented
    user INTEGER NOT NULL,          -- Any type of User can create a Comment
    post_id INTEGER NOT NULL,       -- More than 1 Comment can be published on the same Post
    FOREIGN KEY (user) references User(cc_number) ON DELETE CASCADE ON UPDATE CASCADE
    FOREIGN KEY (post_id) references Post(post_id) ON DELETE CASCADE ON UPDATE CASCADE
    -- If the User or Post are deleted, then this foreign key will automatically be deleted as well
);

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE Organization (

    -- Organization Name Primary Key
    name_ TEXT PRIMARY KEY,

    website URL UNIQUE NOT NULL,                -- The Organization's website must be unique
    contact_email TEXT UNIQUE NOT NULL,         -- The Organization's contact email must be unique
    support_line INTEGER UNIQUE CHECK(support_line > 253000000),
    aid_project TEXT                            -- The Organization's support line must be unique and a phone number
);

-------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------

----------------
-- DATA INPUT --
----------------




/*
-- Relevant Functionalities

Composite Key - https://www.javatpoint.com/sql-composite-key
LIKE Clause - https://www.javatpoint.com/sqlite-like-clause
W3Schools SQL Lessons - https://www.w3schools.com/sql/sql_constraints.asp
Automatic UML to SQL - https://sparxsystems.com/products/ea/trial/request.html
*/