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
DROP TABLE IF EXISTS SupportLine;

-------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------

-----------
-- SETUP --
-----------

PRAGMA foreign_keys = ON;
--PRAGMA defer_foreign_keys = true;
.mode columns
.headers ON

/*
'cd sql' to access the sql folder
'.\sqlite3.exe moodCoach.db' will save our script into a Database (.db file)
'.read "database.sql"' will read the script, finally creating a file and allowing us to debug
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
    email TEXT NOT NULL UNIQUE,
    usertype INTEGER NOT NULL CHECK(usertype = 0 OR usertype = 1)
    -- User Type: 0 for Patient and 1 for HealthProfessional
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
    address_ TEXT NOT NULL,

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

    given_answer TEXT NOT NULL,

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
    name_  TEXT PRIMARY KEY,

    website URL UNIQUE NOT NULL,                -- The Organization's website must be unique
    contact_email TEXT UNIQUE NOT NULL,         -- The Organization's contact email must be unique
    contact_tel1 INTEGER UNIQUE CHECK(contact_tel1 > 200000000), -- The Organization's support line must be unique and a phone number
    contact_tel2 INTEGER UNIQUE CHECK(contact_tel2 > 200000000),
    contact_tel3 INTEGER UNIQUE CHECK(contact_tel3 > 200000000)
);

CREATE TABLE SupportLine (

    -- Support Lines Name Primary Key
    name_  TEXT PRIMARY KEY,

    website URL UNIQUE NOT NULL,                
    schedule TEXT,        
    contact_tel1 INTEGER UNIQUE CHECK(contact_tel1 > 200000000), 
    contact_tel2 INTEGER UNIQUE CHECK(contact_tel2 > 200000000),
    contact_tel3 INTEGER UNIQUE CHECK(contact_tel3 > 200000000)
);

-------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------

----------------
-- DATA INPUT --
----------------

-- HardCoded Admin Data (Gregory House / cc_number = 12345678 ; password = "admin")
INSERT INTO User (cc_number, password_, name_, phone_number, email, usertype) VALUES (12345678,  "d033e22ae348aeb5660fc2140aec35850c4da997", "Gregory House", 911223344, "house_greg@gmail.com", 1);
INSERT INTO HealthProfessional (cc_number, license_id, workplace_id, patients_assigned) VALUES (12345678, 12345678, 1, 0);

-- INSERT INTO User (cc_number, password_, name_, phone_number, email, usertype) VALUES (15325711, "brightside51", "admin", 935071209, "up201806246@fe.up.pt", 1);
-- INSERT INTO HealthProfessional (cc_number, license_id, workplace_id, patients_assigned) VALUES (15325711, 15325711, 0, 0);
-- INSERT INTO User (cc_number, password_, name_, phone_number, email) VALUES (11000000, "japmartins", "admin", 916237581, "up208106246@fe.up.pt");
-- INSERT INTO User (cc_number, password_, name_, phone_number, email) VALUES (10000000, "amartadias", "admin", 929187541, "up201806879@fe.up.pt");

INSERT INTO Organization (name_, website, contact_email, contact_tel1) VALUES ("FNERDM", "http://www.fnerdm.pt/", "geral@fnerdm.pt", 939564509);
INSERT INTO Organization (name_, website, contact_email, contact_tel1, contact_tel2) VALUES ("ENCONTRAR+SE", "https://www.encontrarse.pt/", "geral@encontrarse.pt", 935592507, 220101417);
INSERT INTO Organization (name_, website, contact_email, contact_tel1, contact_tel2, contact_tel3) VALUES ("ADEB", "https://www.adeb.pt/", "adeb@adeb.pt", 218540740, 218540744, 218540745);

INSERT INTO SupportLine (name_, website, schedule, contact_tel1, contact_tel2, contact_tel3) VALUES ("SOS Voz Amiga", "https://www.sosvozamiga.org/", "15h30 - 00h30", 213544546, 912802669, 963524660);
INSERT INTO SupportLine (name_, website, schedule, contact_tel1) VALUES ("Vozes Amigas de Esperança de Portugal", "https://www.voades.pt/quem-somos", "16:00 - 22:00", 222030707);
INSERT INTO SupportLine (name_, website, schedule, contact_tel1) VALUES ("TELEFONE DA AMIZADE", "http://www.telefone-amizade.pt/site/", "16:00 - 23:00", 222080707);
INSERT INTO SupportLine (name_, website, schedule, contact_tel1) VALUES ("Voz de Apoio", "https://www.vozdeapoio.pt/", "21h00 - 24h00", 225506070);
-- INSERT INTO User (cc_number, password_, name_, phone_number, email) VALUES (11000000, "japmartins", "admin", 916237581, "up208106246@fe.up.pt");
-- INSERT INTO User (cc_number, password_, name_, phone_number, email) VALUES (10000000, "amartadias", "admin", 929187541, "up201806879@fe.up.pt");

