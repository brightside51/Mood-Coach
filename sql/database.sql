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

    date_ TEXT,            -- Date in TEXT form will correspond to YYYY-MM-DD (only 1 Test a day)
    test_patientdate INTEGER,       -- To save information about the test, according to the patient and to the date        

    -- Foreign Key referring to HealthProfessional and Patient (1 to Many)
    health_professional INTEGER UNIQUE,    -- A Test will only exist if 1 and 1 Doctor only is responsible for it
    patient INTEGER,                                -- 0 or more patients can take the Test
    FOREIGN KEY (health_professional) references HealthProfessional(cc_number) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (patient) references Patient(cc_number) ON DELETE CASCADE ON UPDATE CASCADE,
    -- If the Patient or Health Professional are deleted, then this foreign key will automatically be deleted as well

    UNIQUE(patient, date_)
);


CREATE TABLE Question (
    
    -- Question ID Primary Key
    id INTEGER PRIMARY KEY,

    content TEXT NOT NULL,
    parameter TEXT CHECK(parameter = "Profound Sadness" OR parameter = "Fatigue" OR parameter = "Anxiety" OR parameter = "Difficulty Concentrating" OR parameter = "Worry and Fear" OR parameter = "Mood Swings" OR parameter = "Changes in Eating / Sleeping Habits" OR parameter = "Anger and Irritability"),

    answer TEXT,

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
    patient INTEGER,       -- More than 1 Patient can go through the same Test
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

--------------------------------------------------------------------------------

-- Insert Tests into the Database
INSERT INTO Test(test_id) VALUES (1);
INSERT INTO Test(test_id) VALUES (2);
INSERT INTO Test(test_id) VALUES (3);
INSERT INTO Test(test_id) VALUES (4);
INSERT INTO Test(test_id) VALUES (5);
INSERT INTO Test(test_id) VALUES (6);
INSERT INTO Test(test_id) VALUES (7);

-- Insert Questions into the Database (20 per Test)

-- Test 1: General Personality
INSERT INTO Question(id, content, test_id) VALUES (11, "I see myself as someone who can be moody", 1);
INSERT INTO Question(id, content, test_id) VALUES (21, "I see myself as someone who likes to reflect, play with ideas", 1);
INSERT INTO Question(id, content, test_id) VALUES (31, "I see myself as someone who remains calm in tense situations", 1);
INSERT INTO Question(id, content, test_id) VALUES (41, "I see myself as someone who can be cold and aloof", 1);
INSERT INTO Question(id, content, test_id) VALUES (51, "I see myself as someone who is a reliable worker", 1);
INSERT INTO Question(id, content, test_id) VALUES (61, "I see myself as someone who has few artistic interests", 1);
INSERT INTO Question(id, content, test_id) VALUES (71, "I see myself as someone who tends to be lazy", 1);
INSERT INTO Question(id, content, test_id) VALUES (81, "I see myself as someone who is talkative", 1);
INSERT INTO Question(id, content, test_id) VALUES (91, "I see myself as someone who is helpful and unselfish with others", 1);
INSERT INTO Question(id, content, test_id) VALUES (101, "I see myself as someone who is curious about many different things", 1);
INSERT INTO Question(id, content, test_id) VALUES (111, "I see myself as someone who can be somewhat careless", 1);
INSERT INTO Question(id, content, test_id) VALUES (121, "I see myself as someone who values artistic, aesthetic experiences", 1);
INSERT INTO Question(id, content, test_id) VALUES (131, "I see myself as someone who is ingenious, a deep thinker", 1);
INSERT INTO Question(id, content, test_id) VALUES (141, "I see myself as someone who is relaxed, handles stress well", 1);
INSERT INTO Question(id, content, test_id) VALUES (151, "I see myself as someone who gets nervous easily", 1);
INSERT INTO Question(id, content, test_id) VALUES (161, "I see myself as someone who tends to be disorganized", 1);
INSERT INTO Question(id, content, test_id) VALUES (171, "I see myself as someone who has an assertive personality", 1);
INSERT INTO Question(id, content, test_id) VALUES (181, "I see myself as someone who tends to be quiet", 1);
INSERT INTO Question(id, content, test_id) VALUES (191, "I see myself as someone who has an active imagination", 1);
INSERT INTO Question(id, content, test_id) VALUES (201, "I see myself as someone who has a forgiving nature", 1);

-- Test 2: Measures Depression Symptoms
INSERT INTO Question(id, content, test_id) VALUES (12, "I was bothered by things that usually don't bother me", 2);
INSERT INTO Question(id, content, test_id) VALUES (22, "I did not feel like eating", 2);
INSERT INTO Question(id, content, test_id) VALUES (32, "I felt that I could not shake off the blues even with help from my family and friends", 2);
INSERT INTO Question(id, content, test_id) VALUES (42, "I felt that I was just as good as other people", 2);
INSERT INTO Question(id, content, test_id) VALUES (52, "I had trouble keeping my mind on what I was doing", 2);
INSERT INTO Question(id, content, test_id) VALUES (62, "I felt depressed", 2);
INSERT INTO Question(id, content, test_id) VALUES (72, "I felt that everything I did was an effort", 2);
INSERT INTO Question(id, content, test_id) VALUES (82, "I felt hopeful about the future", 2);
INSERT INTO Question(id, content, test_id) VALUES (92, "I thought my life had been a failure", 2);
INSERT INTO Question(id, content, test_id) VALUES (102, "I felt fearful", 2);
INSERT INTO Question(id, content, test_id) VALUES (112, "My sleep was restless", 2);
INSERT INTO Question(id, content, test_id) VALUES (122, "I was happy", 2);
INSERT INTO Question(id, content, test_id) VALUES (132, "I talked less than usual", 2);
INSERT INTO Question(id, content, test_id) VALUES (142, "I felt lonely", 2);
INSERT INTO Question(id, content, test_id) VALUES (152, "People were unfriendly", 2);
INSERT INTO Question(id, content, test_id) VALUES (162, "I enjoyed life", 2);
INSERT INTO Question(id, content, test_id) VALUES (172, "I had crying spells", 2);
INSERT INTO Question(id, content, test_id) VALUES (182, "I felt sad", 2);
INSERT INTO Question(id, content, test_id) VALUES (192, "I felt that people disliked me", 2);
INSERT INTO Question(id, content, test_id) VALUES (202, "I could not get going", 2);

-- Test 3: Stress & Empathy
INSERT INTO Question(id, content, test_id) VALUES (13, "I sometimes find myself feeling the emotions of the people around me, even if I don't try to feel what they're feeling", 3);
INSERT INTO Question(id, content, test_id) VALUES (23, "I tend to make other people's suffering my own. That is, I take on other people's sadness and upset when faced with their suffering", 3);
INSERT INTO Question(id, content, test_id) VALUES (33, "When somebody tells me about a problem they are facing, I try to imagine how this person must feel with regard to their situation", 3);
INSERT INTO Question(id, content, test_id) VALUES (43, "I am often quite touched by things that I see happen", 3);
INSERT INTO Question(id, content, test_id) VALUES (53, "If I hear a story in which someone is scared, I will imagine how scared I would be in that situation", 3);
INSERT INTO Question(id, content, test_id) VALUES (63, "If I hear about someone very similar to me experiencing a tragedy, I automatically experience their sadness and suffering as my own", 3);
INSERT INTO Question(id, content, test_id) VALUES (73, "If I see someone fidgeting, I'll start feeling anxious too", 3);
INSERT INTO Question(id, content, test_id) VALUES (83, "Other people's sadness or upset is contagious for me", 3);
INSERT INTO Question(id, content, test_id) VALUES (93, "I often have tender, concerned feelings for people less fortunate than me", 3);
INSERT INTO Question(id, content, test_id) VALUES (103, "I often try to imagine how another person must feel with regard to what happened to them", 3);
INSERT INTO Question(id, content, test_id) VALUES (113, "When I see someone cry, I am very likely to cry with them", 3);
INSERT INTO Question(id, content, test_id) VALUES (123, "I would describe myself as a pretty soft-hearted person", 3);
INSERT INTO Question(id, content, test_id) VALUES (133, "When I hear about a terrible event that happened to someone else (e.g. in conversation, on the news, etc.) I immediately try to imagine how those affected must feel", 3);
INSERT INTO Question(id, content, test_id) VALUES (143, "When I see someone being taken advantage of, I feel kind of protective towards them", 3);
INSERT INTO Question(id, content, test_id) VALUES (153, "I often miss days of work for health reasons", 3);
INSERT INTO Question(id, content, test_id) VALUES (163, "I usually drink alcohol on the four weekdays (Monday through Thursday)", 3);
INSERT INTO Question(id, content, test_id) VALUES (173, "I get the social and emotional support I need", 3);
INSERT INTO Question(id, content, test_id) VALUES (183, "My health problems or illnesses keep me from doing my usual activities (e.g. self-care, recreation)", 3);
INSERT INTO Question(id, content, test_id) VALUES (193, "I have already been told by a doctor that I have high blood pressure (outside of pregnancy)", 3);
INSERT INTO Question(id, content, test_id) VALUES (203, "I am often angered because of things that are outside of my control", 3);

-- Test 4: Well-Being
INSERT INTO Question(id, content, test_id) VALUES (14, "In most ways, my life is close to my ideal", 4);
INSERT INTO Question(id, content, test_id) VALUES (24, "The conditions of my life are excellent", 4);
INSERT INTO Question(id, content, test_id) VALUES (34, "I am satisfied with my life.", 4);
INSERT INTO Question(id, content, test_id) VALUES (44, "So far I have gotten the important things I want in life", 4);
INSERT INTO Question(id, content, test_id) VALUES (54, "If I could live my life over, I would change almost nothing", 4);
INSERT INTO Question(id, content, test_id) VALUES (64, "In general, I feel very positive about myself", 4);
INSERT INTO Question(id, content, test_id) VALUES (74, "I am always optimistic about my future", 4);
INSERT INTO Question(id, content, test_id) VALUES (84, "I am free to decide for myself how to live my life", 4);
INSERT INTO Question(id, content, test_id) VALUES (94, "I generally feel that what I do in my life is worthwhile", 4);
INSERT INTO Question(id, content, test_id) VALUES (104, "Most days I get a sense of accomplishment from what I do", 4);
INSERT INTO Question(id, content, test_id) VALUES (114, "When things go wrong in my life it generally takes me a long time to get back to normal", 4);
INSERT INTO Question(id, content, test_id) VALUES (124, "Regardless of what I am doing, time passes very quickly", 4);
INSERT INTO Question(id, content, test_id) VALUES (134, "My life has a lasting meaning", 4);
INSERT INTO Question(id, content, test_id) VALUES (144, "I have spent a lot of time thinking about what life means and how I fit into its big picture", 4);
INSERT INTO Question(id, content, test_id) VALUES (154, "I am satisfied with my health", 4);
INSERT INTO Question(id, content, test_id) VALUES (164, "I am satisfied with my personal relationships", 4);
INSERT INTO Question(id, content, test_id) VALUES (174, "I am satisfied with the quality of my local environment", 4);
INSERT INTO Question(id, content, test_id) VALUES (184, "I am satisfied with the amount of time I have to do the things that I like to do", 4);
INSERT INTO Question(id, content, test_id) VALUES (194, "Overall, I was satisfied with my life 5 years ago", 4);
INSERT INTO Question(id, content, test_id) VALUES (204, "Overall, I expect to be satisfied with my life 5 years from now", 4);

-- Test 5: Depression Anxiety Stress Scales
INSERT INTO Question(id, content, test_id) VALUES (15, "I found myself getting upset by quite trivial things", 5);
INSERT INTO Question(id, content, test_id) VALUES (25, "I was aware of the dryness of my mouth", 5);
INSERT INTO Question(id, content, test_id) VALUES (35, "I could not seem to experience any positive feeling at all", 5);
INSERT INTO Question(id, content, test_id) VALUES (45, "I experienced breathing difficulty", 5);
INSERT INTO Question(id, content, test_id) VALUES (55, "I just could not seem to get going", 5);
INSERT INTO Question(id, content, test_id) VALUES (65, "I tended to overreact to situations", 5);
INSERT INTO Question(id, content, test_id) VALUES (75, "I had a feeling of shakiness", 5);
INSERT INTO Question(id, content, test_id) VALUES (85, "I found it difficult to relax", 5);
INSERT INTO Question(id, content, test_id) VALUES (95, "I found myself in situations that made me so anxious I was most relieved when they ended", 5);
INSERT INTO Question(id, content, test_id) VALUES (105, "I felt that I had nothing to look forward to", 5);
INSERT INTO Question(id, content, test_id) VALUES (115, "I found myself getting upset rather easily", 5);
INSERT INTO Question(id, content, test_id) VALUES (125, "I felt that I was using a lot of nervous energy", 5);
INSERT INTO Question(id, content, test_id) VALUES (135, "I felt sad and depressed", 5);
INSERT INTO Question(id, content, test_id) VALUES (145, "I found myself getting impatient when I was delayed in any way", 5);
INSERT INTO Question(id, content, test_id) VALUES (155, "I had a feeling of faintness", 5);
INSERT INTO Question(id, content, test_id) VALUES (165, "I felt that I had lost interest in just about everything", 5);
INSERT INTO Question(id, content, test_id) VALUES (175, "I felt I was not worth much as a person", 5);
INSERT INTO Question(id, content, test_id) VALUES (185, "I perspired noticeably in the absence of high temperatures or physical exertion", 5);
INSERT INTO Question(id, content, test_id) VALUES (195, "I felt scared without any good reason", 5);
INSERT INTO Question(id, content, test_id) VALUES (205, "I felt that life was not worthwhile", 5);

-- Test 6: Character Strengths
INSERT INTO Question(id, content, test_id) VALUES (16, "I find the world a very interesting place", 6);
INSERT INTO Question(id, content, test_id) VALUES (26, "I always go out of my way to attend educational events", 6);
INSERT INTO Question(id, content, test_id) VALUES (36, "I always identify the reasons for my actions", 6);
INSERT INTO Question(id, content, test_id) VALUES (46, "Being able to come up with new and different ideas is one of my strong points", 6);
INSERT INTO Question(id, content, test_id) VALUES (56, "I am very aware of my surroundings", 6);
INSERT INTO Question(id, content, test_id) VALUES (66, "I always have a broad outlook on what is going on", 6);
INSERT INTO Question(id, content, test_id) VALUES (76, "I have taken frequent stands in the face of strong opposition", 6);
INSERT INTO Question(id, content, test_id) VALUES (86, "I never quit a task before it is done", 6);
INSERT INTO Question(id, content, test_id) VALUES (96, "I always keep my promises", 6);
INSERT INTO Question(id, content, test_id) VALUES (106, "I am never too busy to help a friend", 6);
INSERT INTO Question(id, content, test_id) VALUES (116, "I am always willing to take risks to establish a relationship", 6);
INSERT INTO Question(id, content, test_id) VALUES (126, "I never miss group meetings or team practices", 6);
INSERT INTO Question(id, content, test_id) VALUES (136, "I always admit when I am wrong", 6);
INSERT INTO Question(id, content, test_id) VALUES (146, "In a group, I try to make sure everyone feels included", 6);
INSERT INTO Question(id, content, test_id) VALUES (156, "I have no trouble eating healthy foods", 6);
INSERT INTO Question(id, content, test_id) VALUES (166, "I have never deliberately hurt anyone", 6);
INSERT INTO Question(id, content, test_id) VALUES (176, "I always express my thanks to people who care about me", 6);
INSERT INTO Question(id, content, test_id) VALUES (186, "I always look on the bright side", 6);
INSERT INTO Question(id, content, test_id) VALUES (196, "I am a spiritual person", 6);
INSERT INTO Question(id, content, test_id) VALUES (206, "I want to fully participate in life, not just view it from the sidelines", 6);

-- Test 7: Compassionate Love Scale
INSERT INTO Question(id, content, test_id) VALUES (17, "When I see people I do not know feeling sad, I feel a need to reach out to them", 7);
INSERT INTO Question(id, content, test_id) VALUES (27, "I spend a lot of time concerned about the well-being of humankind", 7);
INSERT INTO Question(id, content, test_id) VALUES (37, "When I hear about someone (a stranger) going through a difficult time, I feel a great deal of compassion for him or her", 7);
INSERT INTO Question(id, content, test_id) VALUES (47, "It is easy for me to feel the pain (and joy) experienced by others, even though I do not know them", 7);
INSERT INTO Question(id, content, test_id) VALUES (57, "If I encounter a stranger who needs help, I would do almost anything I could to help him or her", 7);
INSERT INTO Question(id, content, test_id) VALUES (67, "I feel considerable compassionate love for people from everywhere", 7);
INSERT INTO Question(id, content, test_id) VALUES (77, "I would rather suffer myself than see someone else (a stranger) suffer", 7);
INSERT INTO Question(id, content, test_id) VALUES (87, "If given the opportunity, I am willing to sacrifice in order to let people from other places who are less fortunate achieve their goals", 7);
INSERT INTO Question(id, content, test_id) VALUES (97, "I tend to feel compassion for people, even though I do not know them", 7);
INSERT INTO Question(id, content, test_id) VALUES (107, "One of the activities that provides me with the most meaning to my life is helping others in the world when they need help", 7);
INSERT INTO Question(id, content, test_id) VALUES (117, "I would rather engage in actions that help others, even though they are strangers, than engage in actions that would help me", 7);
INSERT INTO Question(id, content, test_id) VALUES (127, "I often have tender feelings toward people (strangers) when they seem to be in need", 7);
INSERT INTO Question(id, content, test_id) VALUES (137, "I feel a selfless caring for most of humankind", 7);
INSERT INTO Question(id, content, test_id) VALUES (147, "I accept others whom I do not know even when they do things I think are wrong", 7);
INSERT INTO Question(id, content, test_id) VALUES (157, "If a person (a stranger) is troubled, I usually feel extreme tenderness and caring", 7);
INSERT INTO Question(id, content, test_id) VALUES (167, "I try to understand rather than judge people who are strangers to me", 7);
INSERT INTO Question(id, content, test_id) VALUES (177, "I try to put myself in a stranger shoes when he or she is in trouble", 7);
INSERT INTO Question(id, content, test_id) VALUES (187, "I feel happy when I see that others (strangers) are happy", 7);
INSERT INTO Question(id, content, test_id) VALUES (197, "Those whom I encounter through my work and public life can assume that I will be there if they need me", 7);
INSERT INTO Question(id, content, test_id) VALUES (207, "I want to spend time with people I do not know well so that I can find ways to help enrich their lives", 7);

-- Insert Feedback
INSERT INTO Feedback(diagnosis) VALUES ("None");
INSERT INTO Feedback(diagnosis, prescription, advice) VALUES ("Anxiety", "Xanax", "Exercise daily");
INSERT INTO Feedback(diagnosis, prescription, advice) VALUES ("Anxiety", "Prozac", "Avoid caffeine consumption");
INSERT INTO Feedback(diagnosis, prescription, advice) VALUES ("Bipolarity", "Lithobid", "Pay attention to your sleep");
INSERT INTO Feedback(diagnosis, prescription, advice) VALUES ("Bipolarity", "Depakene", "Avoid alcohol and drugs");
INSERT INTO Feedback(diagnosis, prescription, advice) VALUES ("Depression", "Celexa", "Develop good nutrition");
INSERT INTO Feedback(diagnosis, prescription, advice) VALUES ("Depression", "Luvox", "Reduce your stress levels");