DROP TABLE  IF  EXISTS  heos.146eee176vimal71 ;
 CREATE TABLE  `146eee176vimal71`  (   `recordId`  bigint ( 3 )  NOT  NULL  auto_increment ,   `studentid`  varchar ( 20 )  default  NULL ,   `studentname`  varchar ( 75 )  default  NULL ,   `Test`  int ( 3 )  default  NULL ,   `total`  int ( 4 )  default  NULL ,   ` status `  varchar ( 6 )  default  NULL ,   PRIMARY KEY   ( `recordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
INSERT INTO heos.146eee176vimal71 VALUES (1, 'Aug2008EEE62', 'Mr.Alex Pandien', 0, 0, 'Pass');
INSERT INTO heos.146eee176vimal71 VALUES (2, 'Aug2008EEE67', 'Mr.Justin Doss', 43, 43, 'Pass');
INSERT INTO heos.146eee176vimal71 VALUES (3, 'Aug2008EEE57', 'Mr.Karthik Vimalraj', 27, 27, 'Pass');
 DROP TABLE  IF  EXISTS  heos.agentmaster ;
 CREATE TABLE  `agentmaster`  ( `AgentId`  bigint ( 20 )  NOT  NULL  auto_increment , `AgentCode`  varchar ( 5 )  NOT  NULL  default  '' , `AgentName`  varchar ( 50 )  default  NULL , `AgentCategory`  varchar ( 25 )  default  NULL , `MainAgentCode`  varchar ( 5 )  default  NULL , `AgentAddress`  varchar ( 250 )  NOT  NULL  default  '' , `AgentMailId`  varchar ( 50 )  default  NULL , `AgentPhNo`  varchar ( 50 )  default  NULL , `AgentMobileNo`  varchar ( 50 )  default  NULL , `AgentFaxNo`  varchar ( 50 )  default  NULL , `AgentCommission`  double  default  NULL , `AgentAccountNo`  varchar ( 50 )  default  NULL , `AgentModeOfPayment`  varchar ( 50 )  NOT  NULL  default  '' , `PaymentDurationNo`  int ( 10 )  NOT  NULL  default  '0' , `PaymentDuration`  varchar ( 30 )  default  NULL ,  PRIMARY KEY   ( `AgentId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.agentmaster VALUES (139, 'MUK01', 'Karthik', 'Main Agent', 'Main', 'No 1 Esplanade Police lane, Near Chennai House,  Chennai 108+++', 'as@sd.com', '4343334', '55', '', 12, '2345', 'Account Transaction', 12, 'Week once');
INSERT INTO heos.agentmaster VALUES (141, 'SSM58', 'Jeppiaar', 'Main Agent', 'Main', 'Chennai+++', 'ssm581@yahoo.com', '323', '9884221384', '323', 56, '602201198626', 'Account Transaction', 23, 'Month Once');
INSERT INTO heos.agentmaster VALUES (165, 'SDF23', 'Wenki', 'Sub Agent', 'SDF23', '7,chinna street,vizag nagar,\\r\\nchennai-88', 'sdf5@yahoo.com', '234432', '9988445566', '91442343434', 66, '', 'Cash', 6666, 'Month Once');
INSERT INTO heos.agentmaster VALUES (163, 'SWE45', 'Sekar', 'Sub Agent', 'SSM58', '34,raja street,park lane,\\r\\nchennai-90', 'swe55@yahoo.com', '2223455', '9955667722', '9144222334455', 55, '', 'Account Transaction', 5500, 'Month Once');
INSERT INTO heos.agentmaster VALUES (192, 'KAR05', 'Karthik', 'Sub Agent', 'DSDS', '30/21, brindavan,4th st chetpet chennai', 'kartyvimy@gmail.com', '30920921', '9884926974', '5463365698', 12, '123365546689', 'Cash', 22, 'Month Once');
INSERT INTO heos.agentmaster VALUES (166, 'FGH76', 'Ffff', 'Sub Agent', 'Main', '34,krish kar street,single line,\\r\\nchennai-08', 'fer54@yahoo.com', '2345678', '9988223344', '914433333333', 59, '03456', 'Cheque', 333, 'Week once');
INSERT INTO heos.agentmaster VALUES (167, 'DER56', 'Shikar', 'Sub Agent', 'MANI5', '44,manlore street,shimoga cott,chennai-7', 'der45@yahoo.co.in', '0442234456', '9876543210', '91442345666', 32, '2233', 'Account Transaction', 666, 'Week once');
INSERT INTO heos.agentmaster VALUES (211, 'MANI5', 'Baska', 'Sub Agent', 'DSDS', 'vb', 'dad@as.com', '423433', '333', '', 89, '2334', 'Account Transaction', 123, 'Days');
INSERT INTO heos.agentmaster VALUES (218, 'SRINI', 'Srini', 'Sub Agent', 'DSDS', 'chennai', 'srini@yaho.com', '23233', '9884027580', '', 45, '32343', 'Account Transaction', 20, 'Week once');
INSERT INTO heos.agentmaster VALUES (224, 'DSDS', 'SawEA.          SAV', 'Sub Agent', 'SWE45', 'ssss Aas', 'Dss@xs.co.in', '3233', '23234', '232435', 43, '32323', 'Account Transaction', 343, '--Select--');
 DROP TABLE  IF  EXISTS  heos.applicantdetails ;
 CREATE TABLE  `applicantdetails`  ( `recordid`  bigint ( 5 )  NOT  NULL  auto_increment , `title`  varchar ( 8 )  default  NULL , `firstname`  varchar ( 30 )  default  NULL , `middlename`  varchar ( 30 )  default  NULL , `lastname`  varchar ( 30 )  default  NULL , `intake`  varchar ( 15 )  default  NULL , `levelofeducation`  varchar ( 10 )  default  NULL , `experience`  tinyint ( 2 )  NOT  NULL  default  '0' , `course`  varchar ( 50 )  NOT  NULL  default  '' , `mailid`  varchar ( 80 )  NOT  NULL  default  '' , `applicantid`  varchar ( 25 )  default  NULL , ` password `  varchar ( 20 )  default  NULL , `countryresidence`  varchar ( 30 )  default  NULL , `ipaddress`  varchar ( 15 )  default  NULL , `address`  varchar ( 225 )  default  NULL , `postcode`  varchar ( 8 )  default  NULL , `citizenof`  varchar ( 8 )  default  NULL , `phonenumber`  varchar ( 30 )  default  NULL , `mobilenumber`  varchar ( 25 )  default  NULL , `faxnumber`  varchar ( 30 )  default  NULL , `dateofbirth`  date  default  NULL , `passportnumber`  varchar ( 30 )  default  NULL , `passportcopy`  varchar ( 30 )  default  NULL , `photocopy`  varchar ( 30 )  default  NULL , `course1`  varchar ( 50 )  default  NULL , `institute1`  varchar ( 50 )  default  NULL , `duration1`  int ( 2 )  default  NULL , `grade1`  char ( 2 )  default  NULL , `course2`  varchar ( 50 )  default  NULL , `institute2`  varchar ( 50 )  default  NULL , `duration2`  int ( 2 )  default  NULL , `grade2`  char ( 2 )  default  NULL , `employer1`  varchar ( 50 )  default  NULL , `designation1`  varchar ( 45 )  default  NULL , `startdate1`  date  default  NULL , `enddate1`  date  default  NULL , `employer2`  varchar ( 50 )  default  NULL , `designation2`  varchar ( 45 )  default  NULL , `startdate2`  date  default  NULL , `enddate2`  date  default  NULL , `refname1`  varchar ( 50 )  default  NULL , `refoccupation1`  varchar ( 45 )  default  NULL , `refinstitution1`  varchar ( 50 )  default  NULL , `refrelationship1`  varchar ( 45 )  default  NULL , `refphonenumber1`  varchar ( 30 )  default  NULL , `refemail1`  varchar ( 80 )  default  NULL , `refname2`  varchar ( 50 )  default  NULL , `refoccupation2`  varchar ( 45 )  default  NULL , `refinstitution2`  varchar ( 50 )  default  NULL , `refrelationship2`  varchar ( 45 )  default  NULL , `refphonenumber2`  varchar ( 30 )  default  NULL , `refemail2`  varchar ( 80 )  default  NULL , ` STATUS `  tinyint ( 2 )  default  NULL , `visa`  tinyint ( 2 )  default  NULL , `appfill`  tinyint ( 2 )  default  '0' , PRIMARY KEY   ( `recordid` , `mailid` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.applicantdetails VALUES (49, 'Mr', 'karthik', '', 'Ramalingam', 'Aug2008', 'Level1', 0, 'MECH', 'karthikfriend@gmail.com', 'Aug2008MECH2', 'ZiKDsqk', 'IND', '192.168.15.38', 'Old Mahabalipuram road,\\r\\nJeppiaar Nagr,\\r\\nChennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (50, 'Mr', 'Karthik', '', 'Vimalraj', 'Aug2008', 'Level1', 1, 'EEE', 'karthi@gmail.com', 'Aug2008EEE3', 'nMj0HPVR', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (51, 'Mr', 'Daniel', '', 'Samraj', 'Aug2008', 'Level1', 1, 'ECE', 'danie@gmail.com', 'Aug2008ECE4', 'ZcL8QKw', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (52, 'Mr', 'Omkarnath', '', 'Tiwary', 'Aug2008', 'Level2', 0, 'IT', 'omkarnat@gmail.com', 'Aug2008IT5', '8bC3h6U', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (53, 'Mr', 'Tarun', '', 'Kumar', 'Aug2008', 'Level2', 1, 'MCA', 'taru@gmail.com', 'Aug2008MCA6', 'gueBORsy', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (54, 'Mr', 'Mahesh', '', '', 'Aug2008', 'Level1', 0, 'MECH', 'karthikfrien@gmail.com', 'Aug2008MECH7', 'ZiKDsqk', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (55, 'Mr', 'Alex', '', 'Pandien', 'Aug2008', 'Level1', 1, 'EEE', 'karth@gmail.com', 'Aug2008EEE8', 'nMj0HPVR', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (56, 'Mr', 'Srijith', '', '', 'Aug2008', 'Level1', 1, 'ECE', 'dani@gmail.com', 'Aug2008ECE9', 'ZcL8QKw', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (57, 'Mr', 'Senthil', '', 'Kumar', 'Aug2008', 'Level2', 0, 'IT', 'omkarna@gmail.com', 'Aug2008IT10', '8bC3h6U', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (58, 'Mr', 'Sahji', '', '', 'Aug2008', 'Level2', 1, 'MCA', 'tar@gmail.com', 'Aug2008MCA11', 'gueBORsy', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (59, 'Mr', 'Manika', '', 'Sudar', 'Aug2008', 'Level1', 0, 'MECH', 'karthikfrie@gmail.com', 'Aug2008MECH12', 'ZiKDsqk', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (60, 'Mr', 'Justin', '', 'Doss', 'Aug2008', 'Level1', 1, 'EEE', 'kart@gmail.com', 'Aug2008EEE13', 'nMj0HPVR', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (61, 'Mr', 'Ramesh', '', '', 'Aug2008', 'Level1', 1, 'ECE', 'dan@gmail.com', 'Aug2008ECE14', 'ZcL8QKw', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (62, 'Mr', 'Babu', '', '', 'Aug2008', 'Level2', 0, 'IT', 'omkarn@gmail.com', 'Aug2008IT15', '8bC3h6U', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
INSERT INTO heos.applicantdetails VALUES (63, 'Mr', 'John', '', 'Berkman', 'Aug2008', 'Level2', 1, 'MCA', 'ta@gmail.com', 'Aug2008MCA16', 'gueBORsy', 'IND', '192.168.15.38', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'Sunset1.jpg', 'Winter.jpg', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 0, 0, 1);
 DROP TABLE  IF  EXISTS  heos.arreardetails ;
 CREATE TABLE  `arreardetails`  (   `RecordId`  int ( 10 )  NOT  NULL  auto_increment ,   `Intake`  varchar ( 50 )  default  NULL ,   `CourseCode`  varchar ( 50 )  default  NULL ,   `Term`  int ( 5 )  default  NULL ,   `SubjectCode`  varchar ( 50 )  default  NULL ,   `NoOfStudents`  int ( 10 )  default  NULL ,   `Criteria`  varchar ( 50 )  default  NULL ,   `ExamNameId`  int ( 5 )  default  NULL ,   `SectionId`  int ( 5 )  default  NULL ,   PRIMARY KEY   ( `RecordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.arreardetails VALUES (78, 'Aug2008', 'NAT', 3, 'MAT03', 1, 'Assestment1', 1, 42);
INSERT INTO heos.arreardetails VALUES (77, 'Aug2008', 'sci14', 1, 'C', 1, 'Assestment1', 4, 43);
INSERT INTO heos.arreardetails VALUES (2, 'Aug2008', 'sci14', 1, 'C', 3, 'Assestment1', 32, 50);
INSERT INTO heos.arreardetails VALUES (65, 'Aug2008', 'MCA02', 2, 'Java', 1, 'Sam', 32, 51);
INSERT INTO heos.arreardetails VALUES (69, 'Aug2008', 'sci14', 1, 'C', 3, 'Sam', 33, 52);
INSERT INTO heos.arreardetails VALUES (81, 'Aug2008', 'IT', 1, 'ENG104', 3, 'Sam', 34, 44);
INSERT INTO heos.arreardetails VALUES (74, 'Aug2008', 'sci14', 1, 'C', 1, 'Sam', 32, 71);
INSERT INTO heos.arreardetails VALUES (79, 'Aug2008', 'sci14', 1, 'OOPS', 1, 'Sam', 4, 46);
 DROP TABLE  IF  EXISTS  heos.assestmentdetails ;
 CREATE TABLE  `assestmentdetails`  (   `AssestmenId`  int ( 10 )  NOT  NULL  auto_increment ,   `Criteria`  varchar ( 50 )  default  NULL ,   `AssestmentType`  varchar ( 50 )  default  NULL ,   `Marks`  int ( 3 )  NOT  NULL  default  '0' ,   `DefaultMark`  int ( 3 )  NOT  NULL  default  '0' ,   PRIMARY KEY   ( `AssestmenId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.assestmentdetails VALUES (64, 'Vimal', 'Test', 45, 0);
INSERT INTO heos.assestmentdetails VALUES (61, 'Sam', 'Assignment', 5, 0);
INSERT INTO heos.assestmentdetails VALUES (57, 'Sam', 'Theory', 75, 0);
INSERT INTO heos.assestmentdetails VALUES (59, 'Sam', 'Practical', 20, 0);
INSERT INTO heos.assestmentdetails VALUES (12, 'Assestment1', 'Presentation', 35, 25);
INSERT INTO heos.assestmentdetails VALUES (56, 'Saas', 'Qw3', 43, 0);
INSERT INTO heos.assestmentdetails VALUES (15, 'Sam', 'Performance', 25, 0);
INSERT INTO heos.assestmentdetails VALUES (16, 'karthik', 'Assignment', 20, 0);
INSERT INTO heos.assestmentdetails VALUES (17, 'karthik', 'Theory', 60, 0);
INSERT INTO heos.assestmentdetails VALUES (55, 'karthik', 'Practical', 20, 0);
INSERT INTO heos.assestmentdetails VALUES (65, 'Assestment1', 'Practical', 40, 30);
 DROP TABLE  IF  EXISTS  heos.aug2008_level1_eee_1_eee601_sam ;
 CREATE TABLE  `aug2008_level1_eee_1_eee601_sam`  (   `RecordId`  bigint ( 50 )  NOT  NULL  auto_increment ,   `UniversityName`  varchar ( 50 )  default  NULL ,   `studentid`  varchar ( 50 )  default  NULL ,   `studentname`  varchar ( 50 )  default  NULL ,   `Theory`  bigint ( 50 )  default  NULL ,   `Practical`  bigint ( 50 )  default  NULL ,   `Assignment`  bigint ( 50 )  default  NULL ,   `Total`  bigint ( 50 )  default  NULL ,   `Pass`  varchar ( 20 )  default  NULL ,   PRIMARY KEY   ( `RecordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level1_eee_1_eee601_sam VALUES (1, 'Anna university', 'Aug2008EEE57', 'Mr.Karthik Vimalraj', 25, 15, 11, 51, 'pass');
INSERT INTO heos.aug2008_level1_eee_1_eee601_sam VALUES (2, 'Anna university', 'Aug2008EEE62', 'Mr.Alex Pandien', 25, 15, 13, 53, 'pass');
INSERT INTO heos.aug2008_level1_eee_1_eee601_sam VALUES (3, 'Anna university', 'Aug2008EEE67', 'Mr.Justin Doss', 25, 15, 14, 54, 'pass');
 DROP TABLE  IF  EXISTS  heos.aug2008_level1_eee_a_1_midterm ;
 CREATE TABLE  `aug2008_level1_eee_a_1_midterm`  (   `ExamId`  bigint ( 20 )  NOT  NULL  auto_increment ,   `Section`  varchar ( 5 )  default  NULL ,   `TermNo`  varchar ( 50 )  default  NULL ,   `NameOfTheExam`  varchar ( 50 )  default  NULL ,   `SubjectCode`  varchar ( 50 )  default  NULL ,   ` Day `  varchar ( 50 )  default  NULL ,   `SlotName`  varchar ( 50 )  default  NULL ,   `Arrear`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `ExamId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level1_eee_a_1_midterm VALUES (1, 'A', '1', 'MidTerm', 'EEE03', '2008-08-13', 'Morning', '1');
INSERT INTO heos.aug2008_level1_eee_a_1_midterm VALUES (2, 'A', '1', 'MidTerm', 'EEE02', '2008-08-13', 'Evening', '1');
INSERT INTO heos.aug2008_level1_eee_a_1_midterm VALUES (3, 'A', '1', 'MidTerm', 'EEE601', '2008/08/13', 'Morning', '1');
 DROP TABLE  IF  EXISTS  heos.aug2008_level1_mech_2_eee503_assestment1 ;
 CREATE TABLE  `aug2008_level1_mech_2_eee503_assestment1`  (   `RecordId`  bigint ( 3 )  NOT  NULL  auto_increment ,   `UniversityName`  varchar ( 50 )  default  NULL ,   `studentid`  varchar ( 50 )  default  NULL ,   `studentname`  varchar ( 50 )  default  NULL ,   `Theory`  bigint ( 50 )  default  NULL ,   `Practical`  bigint ( 50 )  default  NULL ,   `Assignment`  bigint ( 50 )  default  NULL ,   `Total`  bigint ( 50 )  default  NULL ,   `Pass`  varchar ( 20 )  default  NULL ,   PRIMARY KEY   ( `RecordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level1_mech_2_eee503_assestment1 VALUES (1, 'Hghh', 'Aug2008MECH56', 'Mr.karthik Ramalingam', 35, 35, 3, 73, 'pass');
INSERT INTO heos.aug2008_level1_mech_2_eee503_assestment1 VALUES (2, 'Hghh', 'Aug2008MECH61', 'Mr.Mahesh', 35, 35, 35, 105, 'pass');
INSERT INTO heos.aug2008_level1_mech_2_eee503_assestment1 VALUES (3, 'Hghh', 'Aug2008MECH66', 'Mr.Manika Sudar', 35, 3, 38, 76, 'pass');
 DROP TABLE  IF  EXISTS  heos.aug2008_level2_it_1_eee601_saas ;
 CREATE TABLE  `aug2008_level2_it_1_eee601_saas`  (   `RecordId`  bigint ( 50 )  NOT  NULL  auto_increment ,   `UniversityName`  varchar ( 50 )  default  NULL ,   `studentid`  varchar ( 50 )  default  NULL ,   `studentname`  varchar ( 50 )  default  NULL ,   `Theory`  bigint ( 50 )  default  NULL ,   `Practical`  bigint ( 50 )  default  NULL ,   `Assignment`  bigint ( 50 )  default  NULL ,   `Total`  bigint ( 50 )  default  NULL ,   `Pass`  varchar ( 20 )  default  NULL ,   PRIMARY KEY   ( `RecordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level2_it_1_eee601_saas VALUES (1, 'Birla university', 'Aug2008IT59', 'Mr.Omkarnath Tiwary', 43, 43, 43, 129, 'pass');
INSERT INTO heos.aug2008_level2_it_1_eee601_saas VALUES (2, 'Birla university', 'Aug2008IT64', 'Mr.Senthil Kumar', 43, 43, 43, 129, 'pass');
INSERT INTO heos.aug2008_level2_it_1_eee601_saas VALUES (3, 'Birla university', 'Aug2008IT69', 'Mr.Babu', 43, 43, 43, 129, 'pass');
INSERT INTO heos.aug2008_level2_it_1_eee601_saas VALUES (4, 'Birla university', 'Aug2008IT59', 'Mr.Omkarnath Tiwary', 43, 43, 43, 129, 'pass');
INSERT INTO heos.aug2008_level2_it_1_eee601_saas VALUES (5, 'Birla university', 'Aug2008IT64', 'Mr.Senthil Kumar', 43, 43, 43, 129, 'pass');
INSERT INTO heos.aug2008_level2_it_1_eee601_saas VALUES (6, 'Birla university', 'Aug2008IT69', 'Mr.Babu', 43, 43, 43, 129, 'pass');
 DROP TABLE  IF  EXISTS  heos.aug2008_level2_it_2_mf331_sam ;
 CREATE TABLE  `aug2008_level2_it_2_mf331_sam`  (   `RecordId`  bigint ( 50 )  NOT  NULL  auto_increment ,   `UniversityName`  varchar ( 50 )  default  NULL ,   `studentid`  varchar ( 50 )  default  NULL ,   `studentname`  varchar ( 50 )  default  NULL ,   `Theory`  bigint ( 50 )  default  NULL ,   `Practical`  bigint ( 50 )  default  NULL ,   `Assignment`  bigint ( 50 )  default  NULL ,   `Total`  bigint ( 50 )  default  NULL ,   `Pass`  varchar ( 20 )  default  NULL ,   PRIMARY KEY   ( `RecordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level2_it_2_mf331_sam VALUES (1, 'Annamalai University', 'Aug2008IT59', 'Mr.Omkarnath Tiwary', 25, 25, 5, 55, 'pass');
INSERT INTO heos.aug2008_level2_it_2_mf331_sam VALUES (2, 'Annamalai University', 'Aug2008IT64', 'Mr.Senthil Kumar', 25, 25, 5, 55, 'pass');
INSERT INTO heos.aug2008_level2_it_2_mf331_sam VALUES (3, 'Annamalai University', 'Aug2008IT69', 'Mr.Babu', 25, 25, 5, 55, 'pass');
 DROP TABLE  IF  EXISTS  heos.aug2008_level2_it_a_2_midterm ;
 CREATE TABLE  `aug2008_level2_it_a_2_midterm`  (   `ExamId`  bigint ( 20 )  NOT  NULL  auto_increment ,   `Section`  varchar ( 5 )  default  NULL ,   `TermNo`  varchar ( 50 )  default  NULL ,   `NameOfTheExam`  varchar ( 50 )  default  NULL ,   `SubjectCode`  varchar ( 50 )  default  NULL ,   ` Day `  varchar ( 50 )  default  NULL ,   `SlotName`  varchar ( 50 )  default  NULL ,   `Arrear`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `ExamId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level2_it_a_2_midterm VALUES (3, 'A', '2', 'MidTerm', 'C206', '2008-09-10', 'Morning', '2');
INSERT INTO heos.aug2008_level2_it_a_2_midterm VALUES (2, 'A', '2', 'MidTerm', 'ENG104', '2008-08-13', 'Morning', '1');
 DROP TABLE  IF  EXISTS  heos.aug2008_level2_it_b_2_midterm ;
 CREATE TABLE  `aug2008_level2_it_b_2_midterm`  (   `ExamId`  bigint ( 20 )  NOT  NULL  auto_increment ,   `Section`  varchar ( 5 )  default  NULL ,   `TermNo`  varchar ( 50 )  default  NULL ,   `NameOfTheExam`  varchar ( 50 )  default  NULL ,   `SubjectCode`  varchar ( 50 )  default  NULL ,   ` Day `  varchar ( 50 )  default  NULL ,   `SlotName`  varchar ( 50 )  default  NULL ,   `Arrear`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `ExamId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.aug2008_level2_it_b_2_midterm VALUES (1, 'B', '2', 'MidTerm', 'C206', '2008-08-13', 'Morning', '2');
 DROP TABLE  IF  EXISTS  heos.balance ;
 CREATE TABLE  `balance`  (   `recordid`  bigint ( 10 )  NOT  NULL  auto_increment ,   `accountnumber`  bigint ( 25 )  NOT  NULL  default  '0' ,   `accountname`  varchar ( 80 )  default  NULL ,   `bankname`  varchar ( 100 )  default  NULL ,   `branchname`  varchar ( 50 )  default  NULL ,   `total`  double  default  NULL ,   `balance`  double  NOT  NULL  default  '0' ,   ` curdate `  date  default  NULL ,   `lastbalance`  double  NOT  NULL  default  '0' ,   `lastdate`  date  default  NULL ,   `tablename`  varchar ( 80 )  default  NULL ,   PRIMARY KEY   ( `recordid` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.balance VALUES (33, 101, 'Srinivasan', 'ICICI', 'Adyar', -188, 20000, '2006-05-11 00:00:00', 20000, '2006-05-11 00:00:00', 'ICICI101');
INSERT INTO heos.balance VALUES (46, 110, 'ramalingam', 'SBI', 'Chennai', 6000, 6000, '2008-09-10 00:00:00', 6000, '2008-09-10 00:00:00', 'SBI110');
INSERT INTO heos.balance VALUES (48, 1000, 'sundar', 'Stand', 'Cee', 1000, 1000, '2008-09-12 00:00:00', 1000, '2008-09-12 00:00:00', 'Stand1000');
 DROP TABLE  IF  EXISTS  heos.bankdetails ;
 CREATE TABLE  `bankdetails`  (   `recordid`  bigint ( 100 )  unsigned zerofill NOT  NULL  auto_increment ,   `accountnumber`  bigint ( 20 )  default  NULL ,   `accountname`  varchar ( 75 )  default  NULL ,   `balance`  double  default  NULL ,   `bankname`  varchar ( 80 )  default  NULL ,   `branchname`  varchar ( 80 )  default  NULL ,   `sortcode`  varchar ( 20 )  default  NULL ,   `branchaddress`  varchar ( 250 )  NOT  NULL  default  '' ,   `opendate`  date  default  NULL ,   `contactperson`  varchar ( 80 )  default  NULL ,   `phonenumber`  varchar ( 50 )  default  NULL ,   `faxnumber`  varchar ( 50 )  default  NULL ,   `website`  varchar ( 80 )  default  NULL ,   `BalanceDate`  date  default  NULL ,   PRIMARY KEY   ( `recordid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.bankdetails VALUES (60, 101, 'Srinivasan', 20000, 'ICICI', 'Adyar', '12-34-56', '21/4 Sathyabama Univ,\\r\\nChennai 119.', '2006-05-11 00:00:00', 'Sam', '323', '343434', 'www.g.com', '2008-06-18 00:00:00');
INSERT INTO heos.bankdetails VALUES (132, 110, 'ramalingam', 6000, 'SBI', 'Chennai', '12-34-56', 'Jeppiaar tech', '2008-09-10 00:00:00', 'Suresh', '24500640', '24500640', 'www.sbi.com', '2008-09-10 00:00:00');
INSERT INTO heos.bankdetails VALUES (138, 1000, 'sundar', 1000, 'Stand', 'Cee', '12-12-12', 'bang', '2008-09-12 00:00:00', '', '', '', '', '2008-09-13 00:00:00');
 DROP TABLE  IF  EXISTS  heos.billdetails ;
 CREATE TABLE  `billdetails`  (   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,   `invoicenumber`  varchar ( 50 )  default  NULL ,   `quantity1`  int ( 5 )  default  NULL ,   `particular1`  varchar ( 150 )  default  NULL ,   `price1`  double  default  NULL ,   `amount1`  double  default  NULL ,   `quantity2`  int ( 5 )  default  NULL ,   `particular2`  varchar ( 150 )  default  NULL ,   `price2`  double  default  NULL ,   `amount2`  double  default  NULL ,   `quantity3`  int ( 5 )  default  NULL ,   `particular3`  varchar ( 150 )  default  NULL ,   `price3`  double  default  NULL ,   `amount3`  double  default  NULL ,   `quantity4`  int ( 5 )  default  NULL ,   `particular4`  varchar ( 150 )  default  NULL ,   `price4`  double  default  NULL ,   `amount4`  double  default  NULL ,   `quantity5`  int ( 5 )  default  NULL ,   `particular5`  varchar ( 150 )  default  NULL ,   `price5`  double  default  NULL ,   `amount5`  double  default  NULL ,   `quantity6`  int ( 5 )  default  NULL ,   `particular6`  varchar ( 150 )  default  NULL ,   `price6`  double  default  NULL ,   `amount6`  double  default  NULL ,   `quantity7`  int ( 5 )  default  NULL ,   `particular7`  varchar ( 150 )  default  NULL ,   `price7`  double  default  NULL ,   `amount7`  double  default  NULL ,   `quantity8`  int ( 5 )  default  NULL ,   `particular8`  varchar ( 150 )  default  NULL ,   `price8`  double  default  NULL ,   `amount8`  double  default  NULL ,   `quantity9`  int ( 5 )  default  NULL ,   `particular9`  varchar ( 150 )  default  NULL ,   `price9`  double  default  NULL ,   `amount9`  double  default  NULL ,   `quantity10`  int ( 5 )  default  NULL ,   `particular10`  varchar ( 150 )  default  NULL ,   `price10`  double  default  NULL ,   `amount10`  double  default  NULL ,   `quantity11`  int ( 5 )  default  NULL ,   `particular11`  varchar ( 150 )  default  NULL ,   `price11`  double  default  NULL ,   `amount11`  double  default  NULL ,   `quantity12`  int ( 5 )  default  NULL ,   `particular12`  varchar ( 150 )  default  NULL ,   `price12`  double  default  NULL ,   `amount12`  double  default  NULL ,   `quantity13`  int ( 5 )  default  NULL ,   `particular13`  varchar ( 150 )  default  NULL ,   `price13`  double  default  NULL ,   `amount13`  double  default  NULL ,   `quantity14`  int ( 5 )  default  NULL ,   `particular14`  varchar ( 150 )  default  NULL ,   `price14`  double  default  NULL ,   `amount14`  double  default  NULL ,   `quantity15`  int ( 5 )  default  NULL ,   `particular15`  varchar ( 150 )  default  NULL ,   `price15`  double  default  NULL ,   `amount15`  double  default  NULL ,   `quantity16`  int ( 5 )  default  NULL ,   `particular16`  varchar ( 150 )  default  NULL ,   `price16`  double  default  NULL ,   `amount16`  double  default  NULL ,   `quantity17`  int ( 5 )  default  NULL ,   `particular17`  varchar ( 150 )  default  NULL ,   `price17`  double  default  NULL ,   `amount17`  double  default  NULL ,   `quantity18`  int ( 5 )  default  NULL ,   `particular18`  varchar ( 150 )  default  NULL ,   `price18`  double  default  NULL ,   `amount18`  double  default  NULL ,   `quantity19`  int ( 5 )  default  NULL ,   `particular19`  varchar ( 150 )  default  NULL ,   `price19`  double  default  NULL ,   `amount19`  double  default  NULL ,   `quantity20`  int ( 5 )  default  NULL ,   `particular20`  varchar ( 150 )  default  NULL ,   `price20`  double  default  NULL ,   `amount20`  double  default  NULL ,   `others`  double  default  NULL ,   `taxamount`  double  default  NULL ,   `total`  double  default  NULL ,   PRIMARY KEY   ( `recordid` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.billdetails VALUES (1, '201', 1, 'Laptop', 100, 100, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 100);
INSERT INTO heos.billdetails VALUES (2, '2544', 1, 'Periparals', 1500, 1500, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 1500);
INSERT INTO heos.billdetails VALUES (3, '8987897978', 1, '', 4545, 4545, 2, '', 433, 866, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 12.5, 45.12, 5468.62);
 DROP TABLE  IF  EXISTS  heos.bookissue ;
 CREATE TABLE  `bookissue`  (   `IssueId`  bigint ( 30 )  NOT  NULL  auto_increment ,   `UserId`  varchar ( 50 )  default  NULL ,   `BookCode`  varchar ( 50 )  default  NULL ,   `dateofissue`  date  default  NULL ,   `dateofexpiry`  date  default  NULL ,   PRIMARY KEY   ( `IssueId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.bookissue VALUES (149, 'Aug2008ECE68', 'SAM02', '2008-10-04 00:00:00', '2008-10-18 00:00:00');
INSERT INTO heos.bookissue VALUES (148, 'Aug2008IT59', 'mat05', '2008-10-04 00:00:00', '2008-10-18 00:00:00');
INSERT INTO heos.bookissue VALUES (147, 'Aug2008MECH56', 'oops', '2008-10-03 00:00:00', '2008-10-17 00:00:00');
 DROP TABLE  IF  EXISTS  heos.bookmaster ;
 CREATE TABLE  `bookmaster`  (   `BookNo`  bigint ( 30 )  NOT  NULL  auto_increment ,   `BookCode`  varchar ( 50 )  default  NULL ,   `Title`  varchar ( 100 )  NOT  NULL  default  '' ,   `Author`  varchar ( 150 )  NOT  NULL  default  '' ,   `PublicationId`  int ( 10 )  NOT  NULL  default  '0' ,   `IsbnNo`  bigint ( 30 )  default  NULL ,   `NoofCopy`  bigint ( 20 )  default  NULL ,   `Price`  double  default  NULL ,   `RackNoId`  int ( 10 )  NOT  NULL  default  '0' ,   `CheckCD`  int ( 1 )  NOT  NULL  default  '0' ,   `ReferenceBook`  int ( 1 )  NOT  NULL  default  '0' ,   PRIMARY KEY   ( `BookNo` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.bookmaster VALUES (1, 'OOPS', 'Object oriented', 'Balaguru swamy', 2, 90897969, 35, 200, 5, 1, 0);
INSERT INTO heos.bookmaster VALUES (2, 'MAT05', 'Mathematics 5th Sem', 'John Joseph', 4, 7695585, 50, 500, 2, 0, 1);
INSERT INTO heos.bookmaster VALUES (3, 'SAM02', 'Solid Mechanics', 'Bohre', 5, 4564478, 65, 566, 4, 1, 0);
INSERT INTO heos.bookmaster VALUES (4, 'JAV01', 'Complete Reference Java', 'Daniel Samraj', 2, 7869756565, 600, 600, 2, 1, 1);
 DROP TABLE  IF  EXISTS  heos.cohortdetails ;
 CREATE TABLE  `cohortdetails`  (   `CohortID`  bigint ( 100 )  NOT  NULL  auto_increment ,   `Intake`  varchar ( 100 )  NOT  NULL  default  '0' ,   `StartDate`  date  default  NULL ,   `ExtensionDate1`  date  default  NULL ,   `ExtensionDate2`  date  default  NULL ,   PRIMARY KEY   ( `CohortID` , `Intake` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.cohortdetails VALUES (46, 'Aug2008', '2008-08-03 00:00:00', '2008-08-05 00:00:00', '2008-08-23 00:00:00');
INSERT INTO heos.cohortdetails VALUES (29, 'Feb2009', '2008-05-22 00:00:00', '2008-05-30 00:00:00', '2008-05-31 00:00:00');
INSERT INTO heos.cohortdetails VALUES (30, 'May2009', '2008-02-13 00:00:00', '2008-05-23 00:00:00', '2008-05-24 00:00:00');
 DROP TABLE  IF  EXISTS  heos.collegedetails ;
 CREATE TABLE  `collegedetails`  (   `Collegeid`  bigint ( 100 )  NOT  NULL  auto_increment ,   `Collegename`  varchar ( 100 )  NOT  NULL  default  '' ,   `Collegelogo`  text ,   `Templatedesign`  text ,   `Letterheaddimensions`  text  NOT  NULL ,   `Location`  varchar ( 200 )  default  NULL ,   `Address`  varchar ( 200 )  default  NULL ,   `CountryID`  int ( 20 )  default  NULL ,   `faxno`  decimal ( 20 , 0 )  default  NULL ,   `phoneno`  varchar ( 20 )  NOT  NULL  default  '0' ,   `email`  varchar ( 100 )  NOT  NULL  default  '' ,   `website`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `Collegeid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.collegedetails VALUES (193, 'Srr Engineering College', 'SRR ENGINEERING COLLEGE.JPG', 'Template1', 'A4', 'Chennai', 'Sam1+Sam2+Sam3+Sam4', 23, 34455, '982829', 'dsa@Srr.org', 'www.srr.in');
INSERT INTO heos.collegedetails VALUES (173, 'Panimalar Engineering College', 'SAMRAJ.JPG', 'Template1', 'A4', 'Chennai', 'ddd+aaa+sss+ffff', 4, 2323, '45454', 'fdf@f.com', 'eee@g.vcom');
INSERT INTO heos.collegedetails VALUES (192, 'SRM', 'SRM.JPG', 'Template1', 'A4', 'station', 'CHENNAI+++', 19, 434534, '87383744', 'ssm581@yahoo.com', 'www.sa.com');
INSERT INTO heos.collegedetails VALUES (195, 'Jeppiaar Engineering College', 'JEPPIAAR ENGINEERING COLLEGE.JPG', 'Template4', 'A4', 'Chennai', 'JprNgr1+JprNgr2+JprNgr3+JprNgr4', 23, 21941, '98404', 'dsam@g.org', 'www.je.org');
INSERT INTO heos.collegedetails VALUES (197, 'St Joseph', 'ST JOSEPH.JPG', 'Template2', 'A4', 'Chennai', 'jpr ngr1+jpr ngr2+jpr ngr3+jpr ngr4', 23, 323, '55555', 'as@g.com', 'www.stjoseph.com');
INSERT INTO heos.collegedetails VALUES (198, 'Hindustan Engineering College', 'SAM.JPG', 'Template2', 'A4', 'aa', 'aa+aa+aa+aa', 4, 232, '3232', 'web@g.com', 'www.sa.com');
INSERT INTO heos.collegedetails VALUES (199, 'MNM Jain College', 'AS.JPG', 'Template1', 'A4', 'as', 'sas+sa+as+asa', 4, 2323, '323', 'we@sd.com', 'www.sas.com');
INSERT INTO heos.collegedetails VALUES (200, 'Stella Marys', 'SAMD.JPG', 'Template1', 'A4', 'sa', 'sas+sas+sa+sa', 35, 132, '31232', 'a2@d.com', 'www.ss.com');
INSERT INTO heos.collegedetails VALUES (204, 'Infant Jesus', 'INFANT JESUS.JPG', 'Template1', 'A4', 'Chennai', 'No 1 Esplanade   police lane,\\r\\nNear Chennai House,\\r\\nChennai 600108', 34, 3443, '3434', 'jesus@god.com', 'www.IJesus.com');
INSERT INTO heos.collegedetails VALUES (202, 'Queen Marys', 'WER.JPG', 'Template1', 'A3', 'er', 'er+we+we+we', 13, 2354, '34534', 'wer', 'wer');
INSERT INTO heos.collegedetails VALUES (205, 'AMET', 'AMET.JPG', 'Template1', 'A4', 'Chennai', 'No1 East Cost Road,\\r\\nChennai 600108', 8, 222, '42323', 'dsa@gmail.com', 'www.Sam.com');
INSERT INTO heos.collegedetails VALUES (206, 'Sathyabama', 'SAA.JPG', 'Template2', 'A3', 'aaaaaaaaaa', 'aaa', 1, 323, '12323', 'zs@w.com', 'www.fd.com');
 DROP TABLE  IF  EXISTS  heos.countdetails ;
 CREATE TABLE  `countdetails`  (   `intake`  varchar ( 40 )  NOT  NULL  default  '' ,   `application`  int ( 3 )  default  '0' ,   `student`  int ( 5 )  default  '0' ,   `staff`  int ( 4 )  NOT  NULL  default  '0' )  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.countdetails VALUES ('Nov2008', 121, 83, 21);
INSERT INTO heos.countdetails VALUES ('Aug2008', 16, 71, 15);
INSERT INTO heos.countdetails VALUES ('Feb2009', 22, 34, 23);
INSERT INTO heos.countdetails VALUES ('staff', 0, 0, 12);
 DROP TABLE  IF  EXISTS  heos.countrydepositdetails ;
 CREATE TABLE  `countrydepositdetails`  (   `CountryDepositDetailsId`  int ( 11 )  NOT  NULL  auto_increment ,   `CountryId`  int ( 20 )  NOT  NULL  default  '0' ,   `CourseId`  int ( 20 )  NOT  NULL  default  '0' ,   `Deposit`  double  default  NULL ,   `Fees`  double  default  NULL ,   PRIMARY KEY   ( `CountryDepositDetailsId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.countrydepositdetails VALUES (37, 1, 71, 100, 100);
INSERT INTO heos.countrydepositdetails VALUES (38, 4, 44, 125, 255);
INSERT INTO heos.countrydepositdetails VALUES (29, 19, 71, 60000, 70000);
INSERT INTO heos.countrydepositdetails VALUES (36, 14, 74, 2312312, 12122);
INSERT INTO heos.countrydepositdetails VALUES (35, 19, 83, 3232, 32323);
INSERT INTO heos.countrydepositdetails VALUES (34, 23, 83, 1223232, 323123);
INSERT INTO heos.countrydepositdetails VALUES (32, 5, 52, 2333, 3232);
INSERT INTO heos.countrydepositdetails VALUES (40, 5, 45, 5000, 4000);
INSERT INTO heos.countrydepositdetails VALUES (39, 10, 71, 23000, 2350);
INSERT INTO heos.countrydepositdetails VALUES (41, 4, 45, 3545, 345345);
INSERT INTO heos.countrydepositdetails VALUES (42, 3, 71, 5000, 2000);
INSERT INTO heos.countrydepositdetails VALUES (43, 5, 44, 3333, 44444);
INSERT INTO heos.countrydepositdetails VALUES (44, 11, 74, 454554545, 454545545);
INSERT INTO heos.countrydepositdetails VALUES (45, 6, 45, 233232, 323232);
INSERT INTO heos.countrydepositdetails VALUES (46, 2, 95, 3434, 4343);
INSERT INTO heos.countrydepositdetails VALUES (47, 39, 74, 232, 323);
INSERT INTO heos.countrydepositdetails VALUES (49, 0, 0, 0, 0);
INSERT INTO heos.countrydepositdetails VALUES (50, 4, 0, 0, 0);
INSERT INTO heos.countrydepositdetails VALUES (51, 0, 44, 0, 0);
INSERT INTO heos.countrydepositdetails VALUES (52, 5, 0, 0, 0);
INSERT INTO heos.countrydepositdetails VALUES (53, 11, 71, 564, 4545);
 DROP TABLE  IF  EXISTS  heos.countrydetails ;
 CREATE TABLE  `countrydetails`  (   `CountryId`  bigint ( 50 )  NOT  NULL  auto_increment ,   `Countrycode`  varchar ( 5 )  NOT  NULL  default  '' ,   `CountryName`  varchar ( 50 )  default  NULL ,   `Nationality`  varchar ( 50 )  NOT  NULL  default  '' ,   PRIMARY KEY   ( `CountryId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.countrydetails VALUES (35, 'RUS', 'Russia', 'Russian');
INSERT INTO heos.countrydetails VALUES (4, 'JA', 'Japan', 'Japaneses');
INSERT INTO heos.countrydetails VALUES (5, 'US', 'United States', 'American');
INSERT INTO heos.countrydetails VALUES (34, 'ISR', 'Israel', 'Israielians');
INSERT INTO heos.countrydetails VALUES (32, 'CH', 'Chinna', 'Chineses');
INSERT INTO heos.countrydetails VALUES (19, 'AUS', 'Australia', 'Australia');
INSERT INTO heos.countrydetails VALUES (23, 'IND', 'India', 'Indians');
INSERT INTO heos.countrydetails VALUES (41, 'JM', 'Jajajaja', 'Jajajajaians');
INSERT INTO heos.countrydetails VALUES (36, 'EUR', 'Europe', 'Europian');
INSERT INTO heos.countrydetails VALUES (1, 'AF', 'Afghanistan', 'Afghanistanis');
INSERT INTO heos.countrydetails VALUES (2, 'AL', 'Albania', 'Albanian');
INSERT INTO heos.countrydetails VALUES (3, 'AG', 'Algeria', 'Algerian');
INSERT INTO heos.countrydetails VALUES (6, 'AS', 'American Samoa', 'American Samoani');
INSERT INTO heos.countrydetails VALUES (7, 'AN', 'Andorra', 'Andorran');
INSERT INTO heos.countrydetails VALUES (8, 'AO', 'Angola', 'Angolian');
INSERT INTO heos.countrydetails VALUES (9, 'AI', 'Anguilla', 'Anguillan');
INSERT INTO heos.countrydetails VALUES (10, 'AT', 'Antarctica', 'Antarctican');
INSERT INTO heos.countrydetails VALUES (11, 'AB', 'Antigua and Barbuda', 'Barbudan');
INSERT INTO heos.countrydetails VALUES (12, 'AR', 'Argentina', 'Argentinan');
INSERT INTO heos.countrydetails VALUES (13, 'AM', 'Armenia', 'Armenian');
INSERT INTO heos.countrydetails VALUES (14, 'AU', 'Aruba', 'Aruban');
INSERT INTO heos.countrydetails VALUES (15, 'AA', 'Australia', 'Australian');
INSERT INTO heos.countrydetails VALUES (16, 'AUU', 'Austria', 'Austrian');
INSERT INTO heos.countrydetails VALUES (17, 'AZ', 'Azerbaijan', 'Azerbaijanian');
INSERT INTO heos.countrydetails VALUES (18, 'BA', 'Bahamas', 'Bahamasan');
INSERT INTO heos.countrydetails VALUES (20, 'BH', 'Bahrain', 'Bahrainian');
INSERT INTO heos.countrydetails VALUES (21, 'BG', 'Bangladesh', 'Bangladeshian');
INSERT INTO heos.countrydetails VALUES (22, 'BR', 'Barbados', 'Barbadosan');
INSERT INTO heos.countrydetails VALUES (38, 'MDR', 'Madagaskar', 'Madagaskarian');
 DROP TABLE  IF  EXISTS  heos.coursedetails ;
 CREATE TABLE  `coursedetails`  (   `CourseId`  bigint ( 50 )  NOT  NULL  auto_increment ,   `CourseCode`  varchar ( 10 )  NOT  NULL  default  '' ,   `CourseName`  varchar ( 50 )  default  NULL ,   `CourseDuration`  varchar ( 10 )  NOT  NULL  default  '0' ,   `ModeOfCourse`  varchar ( 50 )  NOT  NULL  default  '0' ,   `UniversityId`  int ( 11 )  NOT  NULL  default  '0' ,   `MarkSchemeId`  int ( 11 )  NOT  NULL  default  '0' ,   `Scholarship`  varchar ( 50 )  default  NULL ,   `DefaultDeposit`  double  default  NULL ,   `DefaultFees`  double  default  NULL ,   `NoOfSubjects`  int ( 5 )  default  NULL ,   `LevelOfTheCourse`  varchar ( 50 )  default  NULL ,   `MaximumInstalments`  int ( 5 )  default  NULL ,   `NoOfTerms`  int ( 3 )  NOT  NULL  default  '0' ,   `experience`  tinyint ( 2 )  NOT  NULL  default  '0' ,   PRIMARY KEY   ( `CourseId` ),   KEY  `UniversityId`  ( `UniversityId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.coursedetails VALUES (44, 'EEE', 'Electricals And Electronics', '35 Months', 'Part Time', 1, 69, 'No', 35435, 67, 34, 'Level1', 88, 8, 0);
INSERT INTO heos.coursedetails VALUES (45, 'MECH', 'Mechanical Engineering', '4 Years', 'Part Time', 96, 55, 'Yes', 100, 450, 4, 'Level1', 4, 8, 0);
INSERT INTO heos.coursedetails VALUES (74, 'ECE', 'Electronics And Communication Engineering', '34 Months', 'Full Time', 96, 55, 'Yes', 3000, 4.7, 2, 'Level1', 2, 8, 0);
INSERT INTO heos.coursedetails VALUES (71, 'MCA', 'Master of Computer Applicaion', '2 Years', 'Part Time', 6, 70, 'Yes', 450000, 20000, 45, 'Level2', 6, 6, 1);
INSERT INTO heos.coursedetails VALUES (52, 'IT', 'Information Technology', '36 Months', 'Part Time', 6, 68, 'Yes', 30000, 23, 2, 'Level2', 30000, 8, 0);
INSERT INTO heos.coursedetails VALUES (83, 'MSESE', 'Software Engineering', '4 Years', 'Full Time', 96, 0, 'Yes', 90000, 9000, 89, 'Level3', 76, 5, 1);
INSERT INTO heos.coursedetails VALUES (94, 'BECSE', 'Computer Science And Engineering', '4 Years', 'Part Time', 99, 69, 'Yes', 100000, 10, 50, 'Level3', 10, 10, 1);
INSERT INTO heos.coursedetails VALUES (95, 'MBA', 'Master Of Bussiness Administration', '2 Years', 'Full Time', 1, 68, 'Yes', 2305, 5000, 23, 'Level4', 5, 4, 0);
INSERT INTO heos.coursedetails VALUES (96, 'NAT', 'Aeronautical Engineering', '23 Months', 'Full Time', 1, 1, 'Yes', 35000, 3000, 35, 'Level5', 3, 8, 1);
 DROP TABLE  IF  EXISTS  heos.customerdetails ;
 CREATE TABLE  `customerdetails`  (   `recordid`  bigint ( 50 )  NOT  NULL  auto_increment ,   `customerid`  varchar ( 50 )  NOT  NULL  default  '' ,   `customername`  varchar ( 50 )  default  NULL ,   `customeraddress`  varchar ( 160 )  default  NULL ,   `contactperson`  varchar ( 50 )  default  NULL ,   `phonenumber`  varchar ( 50 )  default  NULL ,   `faxnumber`  varchar ( 50 )  default  NULL ,   `emailid`  varchar ( 50 )  default  NULL ,   `accountnumber`  varchar ( 50 )  default  NULL ,   `bankname`  varchar ( 50 )  default  NULL ,   `branchname`  varchar ( 50 )  default  NULL ,   `ProductDetails`  varchar ( 250 )  default  NULL ,   PRIMARY KEY   ( `recordid` , `customerid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.customerdetails VALUES (71, 'CH01', 'Chidambaram', 'No 21 VRD Nagar,\\r\\nNear Puthukoil, Madhavaram,\\r\\nChennai 600060', 'Chidambranar', '743843', '473749', 'chid@gmail.com', '768283', 'Indian', 'Chid', 'Water Bottles');
INSERT INTO heos.customerdetails VALUES (72, 'DA05', 'Daniel', 'No 21 VRD Nagar,\\r\\nMadhavaram,\\r\\nNear Moolakadai,\\r\\nChennai 600060', 'DanielSamraj', '938484', '03445', 'dan@gmail.com', '63383', 'ICICI', 'Parrys', '');
INSERT INTO heos.customerdetails VALUES (61, 'Vel01', 'vel', 'sd1+++', 'sahana', '22222', '234234', 'sd2@gmail.com', '234234', 'sdsad', 'seres', NULL);
INSERT INTO heos.customerdetails VALUES (73, 'MA04', 'Mahendran', 'No:19,Sivan Koil Street,\\r\\nKodambakkam,\\r\\nChennai-600024', 'Banu', '9884221384', '2412', 'ssm581@yahoo.com', '602201198626', 'HDFC', 'Chennai', 'Chicken Supplier');
INSERT INTO heos.customerdetails VALUES (74, 'ED05', 'Paul edward', 'sd+sd+sd+ds', 'Steve edward', '9876', '6565', 'asd@g.com', '6565', 'sad', 'Esa', 'Books');
INSERT INTO heos.customerdetails VALUES (79, 'S', 'Yrty', 'cf', 'Tytry', '5654', '565', 'y54ytr', '78678', 'yugtjugtjy', 'Ghjtgjgtj', 'Tytryty');
 DROP TABLE  IF  EXISTS  heos.deposit ;
 CREATE TABLE  `deposit`  (   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,   `depositamount`  double  default  NULL ,   `depositaccount`  int ( 50 )  default  NULL ,   `depositby`  varchar ( 100 )  default  NULL ,   `reference`  varchar ( 150 )  default  NULL ,   `mode`  varchar ( 40 )  default  NULL ,   `number`  int ( 20 )  default  NULL ,   `dddate`  date  default  NULL ,   `bankname`  varchar ( 50 )  default  NULL ,   `branch`  varchar ( 50 )  default  NULL ,   `ddto`  varchar ( 150 )  default  NULL ,   PRIMARY KEY   ( `recordid` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.deposit VALUES (1, 50000, 2147483647, 'senthil', 'kumar', 'Cash', 0, '2008-05-07 00:00:00', '', '', 'daniel');
INSERT INTO heos.deposit VALUES (2, 100, 9883, 'Balaji', 'Srini', 'Cash', 0, '2008-05-23 00:00:00', '', '', 'JET SOFT');
INSERT INTO heos.deposit VALUES (3, 15000, 102, 'Balaji', 'Srini', 'Cash', 0, '2008-05-23 00:00:00', '', '', 'Jetsoft');
INSERT INTO heos.deposit VALUES (4, 10000, 101, 'Karthik', 'Karthik', 'Cheque', 12577, '2008-04-26 00:00:00', '', '', 'Karthik');
INSERT INTO heos.deposit VALUES (5, 9, 101, 'gfhdf', '564ty56', 'Cash', 0, '2008-07-02 00:00:00', '', '', '3463trt');
INSERT INTO heos.deposit VALUES (6, 2000, 9894, 'srinilinux', 'srinilinux', 'Cheque', 12345, '2008-07-26 00:00:00', '', '', 'srinilinux');
INSERT INTO heos.deposit VALUES (7, 2000, 9894, 'srinilinux', 'srinilinux', 'Cash', 0, '2008-07-22 00:00:00', '', '', 'srinilinux');
INSERT INTO heos.deposit VALUES (8, 8000, 987, 'Mr.X', 'Y to A', 'Cash', 0, '2008-08-26 00:00:00', '', '', 'Sba');
INSERT INTO heos.deposit VALUES (9, 10000, 9875, 'Srini', 'Mahi', 'Cash', 0, '2008-09-01 00:00:00', '', '', 'Chennai');
INSERT INTO heos.deposit VALUES (10, 10000, 987, 'dsa', 'sss', 'Cheque', 2147483647, '2008-09-24 00:00:00', '', '', '322');
INSERT INTO heos.deposit VALUES (11, 220, 101, 'srinivasan', 'srinivasan', 'Cheque', 987654321, '2008-09-11 00:00:00', '', '', 'srinivasan');
 DROP TABLE  IF  EXISTS  heos.embassyaddress ;
 CREATE TABLE  `embassyaddress`  (   `EmbassyAddressId`  int ( 30 )  NOT  NULL  auto_increment ,   `CountryId`  int ( 50 )  default  NULL ,   `EmbassyCode`  varchar ( 30 )  NOT  NULL  default  '' ,   `Address`  varchar ( 250 )  NOT  NULL  default  '' ,   PRIMARY KEY   ( `EmbassyAddressId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.embassyaddress VALUES (2, 23, 'IndChennai', 'No 1 Esplanade Police Lane,\\r\\nNear Chennai House,\\r\\nChennai 600108');
INSERT INTO heos.embassyaddress VALUES (3, 4, 'JaCohima', 'No 21 VRD Nagar,\\r\\nMadhavaram,\\r\\nNear Puthu Koil,\\r\\nChennai 600060.');
INSERT INTO heos.embassyaddress VALUES (4, 5, 'ICH', 'No 24/7 Naramudi street,\\r\\nECR Road,\\r\\nChennai 600118');
INSERT INTO heos.embassyaddress VALUES (5, 19, 'ECH', 'No 45, Rajiv Gandhi Roan,\\r\\nSydney,\\r\\nKanchipuram dist,\\r\\nAustralia 45');
INSERT INTO heos.embassyaddress VALUES (6, 8, 'JES', 'No 235, Pondicherry road,\\r\\nVen Kustam Street,\\r\\nAngola 129');
INSERT INTO heos.embassyaddress VALUES (7, 10, 'PEN', '245 Penguin Market,\\r\\nPenguin Street,\\r\\nAntartica 235');
 DROP TABLE  IF  EXISTS  heos.examnames ;
 CREATE TABLE  `examnames`  (   `ExamName`  varchar ( 30 )  default  NULL ,   `ExamNameId`  int ( 5 )  NOT  NULL  auto_increment ,   PRIMARY KEY   ( `ExamNameId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.examnames VALUES ('Midterm', 1);
INSERT INTO heos.examnames VALUES ('Public', 4);
INSERT INTO heos.examnames VALUES ('Final', 3);
 DROP TABLE  IF  EXISTS  heos.examttslot ;
 CREATE TABLE  `examttslot`  (   `SlotId`  int ( 50 )  NOT  NULL  auto_increment ,   `ExamNameId`  int ( 5 )  NOT  NULL  default  '0' ,   `SlotName`  varchar ( 50 )  default  NULL ,   `FromTime`  varchar ( 20 )  default  NULL ,   `ToTime`  varchar ( 20 )  default  NULL ,   PRIMARY KEY   ( `SlotId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.examttslot VALUES (1, 1, 'Morning', '1:00', '3:00');
INSERT INTO heos.examttslot VALUES (4, 3, 'Morning', '0:40', '1:30');
INSERT INTO heos.examttslot VALUES (32, 3, 'Afternoon', '1:15', '4:15');
INSERT INTO heos.examttslot VALUES (33, 3, 'Evening', '10:00', '1:00');
INSERT INTO heos.examttslot VALUES (34, 4, 'Afternoon', '0:15', '0:45');
INSERT INTO heos.examttslot VALUES (35, 1, 'Evening', '0:35', '0:25');
INSERT INTO heos.examttslot VALUES (36, 4, 'Morning', '0:20', '1:10');
 DROP TABLE  IF  EXISTS  heos.feb2009_level1_eee_1_eee601_vimal ;
 CREATE TABLE  `feb2009_level1_eee_1_eee601_vimal`  (   `RecordId`  bigint ( 50 )  NOT  NULL  auto_increment ,   `UniversityName`  varchar ( 50 )  default  NULL ,   `studentid`  varchar ( 50 )  default  NULL ,   `studentname`  varchar ( 50 )  default  NULL ,   `Theory`  bigint ( 50 )  default  NULL ,   `Practical`  bigint ( 50 )  default  NULL ,   `Assignment`  bigint ( 50 )  default  NULL ,   `Total`  bigint ( 50 )  default  NULL ,   `Pass`  varchar ( 20 )  default  NULL ,   PRIMARY KEY   ( `RecordId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.feb2009_level1_eee_a_3_midterm ;
 CREATE TABLE  `feb2009_level1_eee_a_3_midterm`  (   `ExamId`  bigint ( 20 )  NOT  NULL  auto_increment ,   `Section`  varchar ( 5 )  default  NULL ,   `TermNo`  varchar ( 50 )  default  NULL ,   `NameOfTheExam`  varchar ( 50 )  default  NULL ,   `SubjectCode`  varchar ( 50 )  default  NULL ,   ` Day `  varchar ( 50 )  default  NULL ,   `SlotName`  varchar ( 50 )  default  NULL ,   `Arrear`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `ExamId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.firstyear_be_aug2008_a ;
 CREATE TABLE  `firstyear_be_aug2008_a`  (   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,   `timetablename`  varchar ( 50 )  default  NULL ,   `coursecode`  varchar ( 50 )  default  NULL ,   `term`  varchar ( 50 )  default  NULL ,   `todaydate`  date  default  NULL ,   ` day `  varchar ( 50 )  default  NULL ,   ` week `  varchar ( 50 )  default  NULL ,   `slot`  varchar ( 50 )  default  NULL ,   `subject`  varchar ( 50 )  default  NULL ,   `staff`  varchar ( 50 )  default  NULL ,   `roomno`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `timetableid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.firstyear_sci14_aug2008_b ;
 CREATE TABLE  `firstyear_sci14_aug2008_b`  ( `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment , `timetablename`  varchar ( 50 )  default  NULL , `coursecode`  varchar ( 50 )  default  NULL , `term`  varchar ( 50 )  default  NULL , ` day `  varchar ( 50 )  default  NULL , ` week `  varchar ( 50 )  default  NULL , `slot`  varchar ( 50 )  default  NULL , `subject`  varchar ( 50 )  default  NULL , `staff`  varchar ( 50 )  default  NULL , `roomno`  varchar ( 50 )  default  NULL , PRIMARY KEY   ( `timetableid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (1, 'FIRSTYEAR', 'Sci14', 'Aug2008', '1', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (2, 'FIRSTYEAR', 'Sci14', 'Aug2008', '1', '1', '2', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (3, 'FIRSTYEAR', 'Sci14', 'Aug2008', '1', '1', '3', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (4, 'FIRSTYEAR', 'Sci14', 'Aug2008', '2', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (5, 'FIRSTYEAR', 'Sci14', 'Aug2008', '2', '1', '2', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (6, 'FIRSTYEAR', 'Sci14', 'Aug2008', '2', '1', '3', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (7, 'FIRSTYEAR', 'Sci14', 'Aug2008', '3', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (8, 'FIRSTYEAR', 'Sci14', 'Aug2008', '3', '1', '2', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (9, 'FIRSTYEAR', 'Sci14', 'Aug2008', '3', '1', '3', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (10, 'FIRSTYEAR', 'Sci14', 'Aug2008', '4', '1', '1', '', '', '');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (11, 'FIRSTYEAR', 'Sci14', 'Aug2008', '4', '1', '1', '', '', '');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (12, 'FIRSTYEAR', 'Sci14', 'Aug2008', '4', '1', '1', '', '', '');
INSERT INTO heos.firstyear_sci14_aug2008_b VALUES (13, 'firstyear', 'Sci14', 'Aug2008', '4', '1', '1', 'ObjectOrientedprg', 'eree', 'studio');
 DROP TABLE  IF  EXISTS  heos.firstyearsci14aug2008b ;
 CREATE TABLE  `firstyearsci14aug2008b`  ( `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment , `timetablename`  varchar ( 50 )  default  NULL , `coursecode`  varchar ( 50 )  default  NULL , `term`  varchar ( 50 )  default  NULL , ` day `  varchar ( 50 )  default  NULL , ` week `  varchar ( 50 )  default  NULL , `slot`  varchar ( 50 )  default  NULL , `subject`  varchar ( 50 )  default  NULL , `staff`  varchar ( 50 )  default  NULL ,   `roomno`  varchar ( 50 )  default  NULL , PRIMARY KEY   ( `timetableid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.firstyearsci14aug2008b VALUES (1, 'firstyear', 'sci14', 'Aug2008', '1', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (2, 'firstyear', 'sci14', 'Aug2008', '1', '1', '2', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (3, 'firstyear', 'sci14', 'Aug2008', '1', '1', '3', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (4, 'firstyear', 'sci14', 'Aug2008', '2', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (5, 'firstyear', 'sci14', 'Aug2008', '2', '1', '2', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (6, 'firstyear', 'sci14', 'Aug2008', '2', '1', '3', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (7, 'firstyear', 'sci14', 'Aug2008', '3', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (8, 'firstyear', 'sci14', 'Aug2008', '3', '1', '2', 'NA', 'NA', 'NA');
INSERT INTO heos.firstyearsci14aug2008b VALUES (9, 'firstyear', 'sci14', 'Aug2008', '3', '1', '3', 'NA', 'NA', 'NA');
 DROP TABLE  IF  EXISTS  heos.icici101 ;
 CREATE TABLE  `icici101`  ( `recordid`  bigint ( 100 )  unsigned NOT  NULL  auto_increment , `crdr`  varchar ( 50 )  default  NULL , `remarks`  varchar ( 200 )  default  NULL , `currentdate`  date  default  NULL , `amount`  double  default  NULL , `balance`  double  default  NULL , PRIMARY KEY   ( `recordid` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.icici101 VALUES (1, 'Dr', 'Pettycash', '2008-05-23 00:00:00', 11, 9989);
INSERT INTO heos.icici101 VALUES (4, 'Dr', 'may', '2008-05-23 00:00:00', 1300, 8689);
INSERT INTO heos.icici101 VALUES (6, 'Dr', 'Refund', '2008-05-23 00:00:00', 100, 8589);
INSERT INTO heos.icici101 VALUES (7, 'Dr', 'Daniel', '2008-05-24 00:00:00', 10, 8579);
INSERT INTO heos.icici101 VALUES (8, 'Dr', 'Daniel', '2008-05-23 00:00:00', 10, 8569);
INSERT INTO heos.icici101 VALUES (9, 'Dr', 'Pettycash', '2008-05-27 00:00:00', 1000, 9000);
INSERT INTO heos.icici101 VALUES (10, 'Dr', 'Pettycash', '2008-05-27 00:00:00', 1000, 8000);
INSERT INTO heos.icici101 VALUES (11, 'Dr', 'Pettycash', '2008-08-26 00:00:00', 100, 19872);
INSERT INTO heos.icici101 VALUES (12, 'Dr', 'Pettycash', '2008-08-26 00:00:00', 250, 19622);
INSERT INTO heos.icici101 VALUES (13, 'Dr', 'Pettycash', '2008-08-26 00:00:00', 150, 19472);
 DROP TABLE  IF  EXISTS  heos.icici_pro6022 ;
 CREATE TABLE  `icici_pro6022`  ( `recordid`  bigint ( 100 )  unsigned NOT  NULL  auto_increment , `crdr`  varchar ( 50 )  default  NULL , `remarks`  varchar ( 200 )  default  NULL , `currentdate`  date  default  NULL , `amount`  double  default  NULL , `balance`  double  default  NULL , PRIMARY KEY   ( `recordid` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.infrastructuredetails ;
 CREATE TABLE  `infrastructuredetails`  ( `HallIId`  bigint ( 20 )  NOT  NULL  auto_increment , `HallName`  varchar ( 50 )  default  NULL , `HallCapacity`  int ( 10 )  default  NULL , `ComputerFacility`  int ( 2 )  default  NULL , PRIMARY KEY   ( `HallIId` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.infrastructuredetails VALUES (33, 'Old', 7, 1);
INSERT INTO heos.infrastructuredetails VALUES (32, 'studio', 10, 0);
INSERT INTO heos.infrastructuredetails VALUES (35, 'A1', 5, 1);
INSERT INTO heos.infrastructuredetails VALUES (38, 'SAT100', 2, 1);
INSERT INTO heos.infrastructuredetails VALUES (39, 'SAM007', 5, 0);
INSERT INTO heos.infrastructuredetails VALUES (40, 'Sam23', 3, 1);
INSERT INTO heos.infrastructuredetails VALUES (43, 'Auditorium', 21, 0);
INSERT INTO heos.infrastructuredetails VALUES (44, 'New Block', 80, 0);
INSERT INTO heos.infrastructuredetails VALUES (53, 'Gdfg', 5, 1);
 DROP TABLE  IF  EXISTS  heos.karthik_be_may2008_a ;
 CREATE TABLE  `karthik_be_may2008_a`  ( `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment , `timetablename`  varchar ( 50 )  default  NULL , `coursecode`  varchar ( 50 )  default  NULL , `term`  varchar ( 50 )  default  NULL , `todaydate`  date  default  NULL , ` day `  varchar ( 50 )  default  NULL , ` week `  varchar ( 50 )  default  NULL , `slot`  varchar ( 50 )  default  NULL , `subject`  varchar ( 50 )  default  NULL , `staff`  varchar ( 50 )  default  NULL , `roomno`  varchar ( 50 )  default  NULL , PRIMARY KEY   ( `timetableid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.karthik_be_may2008_a VALUES (1, 'KARTHIK', 'be', 'May2008', '2008-05-01 00:00:00', '4', '1', '1', 'Holiday', 'Holiday', 'Holiday');
INSERT INTO heos.karthik_be_may2008_a VALUES (2, 'KARTHIK', 'be', 'May2008', '2008-05-01 00:00:00', '4', '1', '3', 'Holiday', 'Holiday', 'Holiday');
INSERT INTO heos.karthik_be_may2008_a VALUES (3, 'KARTHIK', 'be', 'May2008', '2008-05-02 00:00:00', '4', '1', '2', 'Holiday', 'Holiday', 'Holiday');
 DROP TABLE  IF  EXISTS  heos.khus_sci14_aug2008_b ;
 CREATE TABLE  `khus_sci14_aug2008_b`  (   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,   `timetablename`  varchar ( 50 )  default  NULL ,   `coursecode`  varchar ( 50 ) default  NULL ,   `term`  varchar ( 50 )  default  NULL ,   `todaydate`  date  default  NULL ,   ` day `  varchar ( 50 )  default  NULL ,   ` week `  varchar ( 50 )  default  NULL ,   `slot`  varchar ( 50 )  default  NULL ,   `subject`  varchar ( 50 )  default  NULL ,   `staff`  varchar ( 50 )  default  NULL ,   `roomno`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `timetableid` ))  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.khus_sci14_aug2008_b VALUES (1, 'khus', 'sci14', 'Aug2008', '2008-07-10 00:00:00', '4', '1', '1', 'Holiday', 'Holiday', 'Holiday');
INSERT INTO heos.khus_sci14_aug2008_b VALUES (2, 'khus', 'sci14', 'Aug2008', '2008-07-10 00:00:00', '4', '1', '2', 'Holiday', 'Holiday', 'Holiday');
 DROP TABLE  IF  EXISTS  heos.leavemaster ;
 CREATE TABLE  `leavemaster`  (   `LeaveId`  bigint ( 20 )  NOT  NULL  auto_increment ,   `TypeofLeave`  varchar ( 50 )  default  NULL ,   `Intake`  varchar ( 50 )  default  NULL ,   `Course`  varchar ( 50 )  default  NULL ,   `Section`  char ( 1 )  default  NULL ,   `Date1`  date  default  NULL ,   `Date2`  date  default  NULL ,   `Slot`  tinyint ( 2 )  default  NULL ,   `LeaveReason`  varchar ( 50 )  default  NULL ,   PRIMARY KEY   ( `LeaveId` ))  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.leavemaster VALUES (9, 'General', 'May2008', 'be', 'B', '2008-04-28 00:00:00', '2008-04-30 00:00:00', 0, 'Sam Birth day');
INSERT INTO heos.leavemaster VALUES (10, 'Slot', 'May2008', 'be', 'A', '2008-05-02 00:00:00', '2008-05-02 00:00:00', 2, 'Chumma');
INSERT INTO heos.leavemaster VALUES (11, 'Slot', 'May2008', 'be', 'A', '2008-05-01 00:00:00', '2008-05-01 00:00:00', 3, 'www');
INSERT INTO heos.leavemaster VALUES (12, 'Slot', 'May2008', 'be', 'A', '2008-05-01 00:00:00', '2008-05-01 00:00:00', 1, 'www');
INSERT INTO heos.leavemaster VALUES (13, 'partial', 'May2008', 'be', 'A', '2008-05-07 00:00:00', '2008-05-07 00:00:00', 0, 'www');
INSERT INTO heos.leavemaster VALUES (14, 'General', 'May2008', 'be', 'B', '2008-06-07 00:00:00', '2008-06-08 00:00:00', 0, 'EEE');
INSERT INTO heos.leavemaster VALUES (15, 'Slot', 'May2008', 'be', 'A', '2008-06-05 00:00:00', '2008-06-05 00:00:00', 3, 'ghj');
INSERT INTO heos.leavemaster VALUES (16, 'Slot', 'May2008', 'be', 'B', '2008-05-07 00:00:00', '2008-05-07 00:00:00', 2, 'Chumma');
INSERT INTO heos.leavemaster VALUES (17, 'Slot', 'May2008', 'be', 'A', '2008-05-06 00:00:00', '2008-05-06 00:00:00', 2, 'Chumma');
INSERT INTO heos.leavemaster VALUES (18, 'Slot', 'May2008', 'be', 'A', '2008-05-08 00:00:00', '2008-05-08 00:00:00', 1, 'Sam Birth day');
INSERT INTO heos.leavemaster VALUES (19, 'Slot', 'May2008', 'be', 'A', '2008-05-10 00:00:00', '2008-05-10 00:00:00', 3, 'Sam Birth day');
INSERT INTO heos.leavemaster VALUES (20, 'Slot', 'May2008', 'be', 'A', '2008-05-09 00:00:00', '2008-05-09 00:00:00', 2, 'Slot');
INSERT INTO heos.leavemaster VALUES (21, 'Slot', 'May2008', 'be', 'B', '2008-05-01 00:00:00', '2008-05-01 00:00:00', 2, 'uuuu');
INSERT INTO heos.leavemaster VALUES (22, 'General', 'Aug2008', 'sci14', 'b', '2008-07-10 00:00:00', '2008-07-10 00:00:00', 0, 'jgftftyftyf');
INSERT INTO heos.leavemaster VALUES (23, 'Slot', 'Aug2008', 'EEE', 'A', '2008-08-18 00:00:00', '2008-08-18 00:00:00', 2, 'BD');
INSERT INTO heos.leavemaster VALUES (24, 'Partial', 'Feb2009', 'EEE', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '');
 DROP TABLE  IF  EXISTS  heos.markschemedetails ;
 CREATE TABLE  `markschemedetails`  (`MarkSchemeId`  int ( 11 )  NOT  NULL  auto_increment ,`MarkSchemeName`  varchar ( 50 )  default  NULL ,`MarkSchemeCycleNo`  bigint ( 20 )  default  NULL ,`Upperlimit1`  float  default  NULL ,`Symbol1`  varchar ( 30 )  default  NULL ,`Lowerlimit1`  float  default  NULL ,`Grade1`  varchar ( 5 )  default  NULL ,`Upperlimit2`  float  default  NULL ,`Symbol2`  varchar ( 30 )  default  NULL ,`Lowerlimit2`  float  default  NULL ,`Grade2`  varchar ( 5 )  default  NULL ,`Upperlimit3`  float  default  NULL ,`Symbol3`  varchar ( 30 )  default  NULL ,`Lowerlimit3`  float  default  NULL ,`Grade3`  varchar ( 5 )  default  NULL ,`Upperlimit4`  float  default  NULL ,`Symbol4`  varchar ( 30 )  default  NULL ,`Lowerlimit4`  float  default  NULL ,`Grade4`  varchar ( 5 )  default  NULL ,`Upperlimit5`  float  default  NULL ,`Symbol5`  varchar ( 30 )  default  NULL ,`Lowerlimit5`  float  default  NULL ,`Grade5`  varchar ( 5 )  default  NULL ,`Upperlimit6`  float  default  NULL ,`Symbol6`  varchar ( 30 )  default  NULL ,`Lowerlimit6`  float  default  NULL ,`Grade6`  varchar ( 5 )  default  NULL ,`Upperlimit7`  float  default  NULL ,`Symbol7`  varchar ( 30 )  default  NULL ,`Lowerlimit7`  float  default  NULL ,`Grade7`  varchar ( 5 )  default  NULL ,`Upperlimit8`  float  default  NULL ,`Symbol8`  varchar ( 30 )  default  NULL ,`Lowerlimit8`  float  default  NULL ,`Grade8`  varchar ( 5 )  default  NULL ,`Upperlimit9`  float  default  NULL ,`Symbol9`  varchar ( 30 )  default  NULL ,`Lowerlimit9`  float  default  NULL ,`Grade9`  varchar ( 5 )  default  NULL ,`Upperlimit10`  float  default  NULL ,
   `Symbol10`  varchar ( 30 )  default  NULL ,
   `Lowerlimit10`  float  default  NULL ,
   `Grade10`  varchar ( 5 )  default  NULL ,
   `Upperlimit11`  float  default  NULL ,
   `Symbol11`  varchar ( 30 )  default  NULL ,
   `Lowerlimit11`  float  default  NULL ,
   `Grade11`  varchar ( 5 )  default  NULL ,
   `Upperlimit12`  float  default  NULL ,
   `Symbol12`  varchar ( 30 )  default  NULL ,
   `Lowerlimit12`  float  default  NULL ,
   `Grade12`  varchar ( 5 )  default  NULL ,
   `Upperlimit13`  float  default  NULL ,
   `Symbol13`  varchar ( 30 )  default  NULL ,
   `Lowerlimit13`  float  default  NULL ,
   `Grade13`  varchar ( 5 )  default  NULL ,
   `Upperlimit14`  float  default  NULL ,
   `Symbol14`  varchar ( 30 )  default  NULL ,
   `Lowerlimit14`  float  default  NULL ,
   `Grade14`  varchar ( 5 )  default  NULL ,
   `Upperlimit15`  float  default  NULL ,
   `Symbol15`  varchar ( 30 )  default  NULL ,
   `Lowerlimit15`  float  default  NULL ,
   `Grade15`  varchar ( 5 )  default  NULL ,
   `Upperlimit16`  float  default  NULL ,
   `Symbol16`  varchar ( 30 )  default  NULL ,
   `Lowerlimit16`  float  default  NULL ,
   `Grade16`  varchar ( 5 )  default  NULL ,
   `Upperlimit17`  float  default  NULL ,
   `Symbol17`  varchar ( 30 )  default  NULL ,
   `Lowerlimit17`  float  default  NULL ,
   `Grade17`  varchar ( 5 )  default  NULL ,
   `Upperlimit18`  float  default  NULL ,
   `Symbol18`  varchar ( 30 )  default  NULL ,
   `Lowerlimit18`  float  default  NULL ,
   `Grade18`  varchar ( 5 )  default  NULL ,
   `Upperlimit19`  float  default  NULL ,
   `Symbol19`  varchar ( 30 )  default  NULL ,
   `Lowerlimit19`  float  default  NULL ,
   `Grade19`  varchar ( 5 )  default  NULL ,
   `Upperlimit20`  float  default  NULL ,
   `Symbol20`  varchar ( 30 )  default  NULL ,
   `Lowerlimit20`  float  default  NULL ,
   `Grade20`  varchar ( 5 )  default  NULL ,
   PRIMARY KEY   ( `MarkSchemeId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.markschemedetails VALUES (1, 'Percentage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO heos.markschemedetails VALUES (55, 'ssm', 2, 3, 'LessThan', 5, 'f', 2, 'LessThanEqualto', 1, 'e', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA');
INSERT INTO heos.markschemedetails VALUES (68, 'MarSch', 2, 23, 'LessThan', 45, 'A', 45, 'LessThan', 100, 'B', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA');
INSERT INTO heos.markschemedetails VALUES (69, 'MARSCHE', 2, 50, 'LessThan', 80, 'A', 80, 'LessThan', 100, 'B', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA');
INSERT INTO heos.markschemedetails VALUES (70, 'srinivasan', 4, 0, 'LessThan', 40, 'Fail', 40, 'LessThan', 60, 'seocn', 60, 'LessThan', 75, 'first', 75, 'LessThanEqualto', 100, 'Fisrt', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA');
INSERT INTO heos.markschemedetails VALUES (82, 'Karthik', 2, 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA', 0, 'NA');
 DROP TABLE  IF  EXISTS  heos.menumaster ;
 CREATE TABLE  `menumaster`  (
   `MenuId`  int ( 20 )  NOT  NULL  auto_increment ,
   `MenuName`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `MenuId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.menumaster VALUES (1, 'Masters');
INSERT INTO heos.menumaster VALUES (2, 'Timetable');
INSERT INTO heos.menumaster VALUES (3, 'Attendance');
INSERT INTO heos.menumaster VALUES (4, 'Finance');
INSERT INTO heos.menumaster VALUES (5, 'Library');
INSERT INTO heos.menumaster VALUES (6, 'ExamTimetable');
INSERT INTO heos.menumaster VALUES (7, 'StudentDetails');
INSERT INTO heos.menumaster VALUES (8, 'StaffDetails');
 DROP TABLE  IF  EXISTS  heos.menurights ;
 CREATE TABLE  `menurights`  (
   `UserId`  int ( 11 )  default  NULL ,
   `UserType`  varchar ( 50 )  default  NULL ,
   `MenuId`  int ( 11 )  default  NULL
 )  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.menurights VALUES (1, 'Admin', 3);
INSERT INTO heos.menurights VALUES (1, 'Admin', 4);
INSERT INTO heos.menurights VALUES (1, 'Admin', 1);
INSERT INTO heos.menurights VALUES (1, 'Admin', 2);
INSERT INTO heos.menurights VALUES (1, 'Admin', 6);
INSERT INTO heos.menurights VALUES (1, 'Admin', 5);
INSERT INTO heos.menurights VALUES (1, 'Admin', 8);
INSERT INTO heos.menurights VALUES (1, 'Admin', 7);
 DROP TABLE  IF  EXISTS  heos.omkar_be_may2009_a ;
 CREATE TABLE  `omkar_be_may2009_a`  (
   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `timetablename`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `term`  varchar ( 50 )  default  NULL ,
   `todaydate`  date  default  NULL ,
   ` day `  varchar ( 50 )  default  NULL ,
   ` week `  varchar ( 50 )  default  NULL ,
   `slot`  varchar ( 50 )  default  NULL ,
   `subject`  varchar ( 50 )  default  NULL ,
   `staff`  varchar ( 50 )  default  NULL ,
   `roomno`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `timetableid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.omkarbemay2009a ;
 CREATE TABLE  `omkarbemay2009a`  (
   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `timetablename`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `term`  varchar ( 50 )  default  NULL ,
   ` day `  varchar ( 50 )  default  NULL ,
   ` week `  varchar ( 50 )  default  NULL ,
   `slot`  varchar ( 50 )  default  NULL ,
   `subject`  varchar ( 50 )  default  NULL ,
   `staff`  varchar ( 50 )  default  NULL ,
   `roomno`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `timetableid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.omkarbemay2009a VALUES (1, 'OMKAR', 'be', 'May2009', '1', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.omkarbemay2009a VALUES (2, 'OMKAR', 'be', 'May2009', '2', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.omkarbemay2009a VALUES (3, 'OMKAR', 'be', 'May2009', '3', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.omkarbemay2009a VALUES (4, 'OMKAR', 'be', 'May2009', '4', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.omkarbemay2009a VALUES (5, 'OMKAR', 'be', 'May2009', '5', '1', '1', 'NA', 'NA', 'NA');
INSERT INTO heos.omkarbemay2009a VALUES (6, 'OMKAR', 'be', 'May2009', '6', '1', '1', 'NA', 'NA', 'NA');
 DROP TABLE  IF  EXISTS  heos.paymentdetails ;
 CREATE TABLE  `paymentdetails`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `amount`  double  default  NULL ,
   `accountnumber`  varchar ( 50 )  default  NULL ,
   `description`  varchar ( 70 )  default  NULL ,
   `paymode`  varchar ( 50 )  default  NULL ,
   `cdnumber`  int ( 40 )  default  NULL ,
   `cddate`  date  default  NULL ,
   `bankname`  varchar ( 50 )  default  NULL ,
   `branch`  varchar ( 50 )  default  NULL ,
   `towhom`  varchar ( 50 )  default  NULL ,
   `done`  varchar ( 6 )  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.paymentdetails VALUES (1, 20000, '602201198626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO heos.paymentdetails VALUES (2, 10000, '101', 'Deposit', 'Cheque', 12577, '2008-04-26 00:00:00', '', '', 'Karthik', 'no');
INSERT INTO heos.paymentdetails VALUES (3, 2000, '9894', 'Deposit', 'Cheque', 12345, '2008-07-26 00:00:00', '', '', 'srinilinux', 'no');
INSERT INTO heos.paymentdetails VALUES (4, 28, '101', 'Pendings', 'Cheque', 10001, '2008-08-26 00:00:00', '', '', 'DA05', 'no');
INSERT INTO heos.paymentdetails VALUES (5, 10000, '987', 'Deposit', 'Cheque', 2147483647, '2008-09-24 00:00:00', '', '', '322', 'no');
INSERT INTO heos.paymentdetails VALUES (6, 220, '101', 'Deposit', 'Cheque', 987654321, '2008-09-11 00:00:00', '', '', 'srinivasan', 'no');
 DROP TABLE  IF  EXISTS  heos.paythis ;
 CREATE TABLE  `paythis`  (
   `recordid`  bigint ( 20 )  default  NULL ,
   `onoff`  varchar ( 10 )  default  NULL
 )  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.paythis VALUES (2, 'off');
INSERT INTO heos.paythis VALUES (3, 'off');
INSERT INTO heos.paythis VALUES (4, 'off');
INSERT INTO heos.paythis VALUES (5, 'off');
INSERT INTO heos.paythis VALUES (6, 'off');
 DROP TABLE  IF  EXISTS  heos.persondetails ;
 CREATE TABLE  `persondetails`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `personid`  varchar ( 50 )  default  NULL ,
   `personname`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.persondetails VALUES (1, 'ACCSC12', 'William');
INSERT INTO heos.persondetails VALUES (2, 'ACECE45', 'Jackson');
INSERT INTO heos.persondetails VALUES (3, 'ACCS23', 'Roy');
 DROP TABLE  IF  EXISTS  heos.pettycash ;
 CREATE TABLE  `pettycash`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `persionid`  varchar ( 50 )  NOT  NULL  default  '' ,
   `personname`  varchar ( 30 )  default  NULL ,
   `accountnumber`  int ( 50 )  default  NULL ,
   `pettyamount`  double  default  NULL ,
   `pettydate`  date  default  NULL ,
   `pettycarry`  double  default  NULL ,
   PRIMARY KEY   ( `recordid` , `persionid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.pettycash VALUES (1, '23', 'sam', 9883, NULL, NULL, NULL);
INSERT INTO heos.pettycash VALUES (2, 'ACCSC12', 'William', 101, 11, '2008-05-23 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (3, 'ACCSC12', 'William', 101, 1000, '2008-05-27 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (4, 'ACCSC12', 'William', 101, 1000, '2008-05-27 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (5, 'ACECE45', 'Jackson', 9894, 1100, '2008-08-26 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (6, 'ACCS23', 'Roy', 101, 100, '2008-08-26 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (7, 'ACCSC12', 'William', 101, 250, '2008-08-26 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (8, 'ACECE45', 'Jackson', 101, 150, '2008-08-26 00:00:00', 0);
INSERT INTO heos.pettycash VALUES (9, 'ACCS23', 'Roy', 9894, 150, '2008-08-26 00:00:00', 0);
 DROP TABLE  IF  EXISTS  heos.publicationdetails ;
 CREATE TABLE  `publicationdetails`  (
   `PublicationNameId`  int ( 5 )  NOT  NULL  auto_increment ,
   `PublicationName`  varchar ( 100 )  NOT  NULL  default  '' ,
   PRIMARY KEY   ( `PublicationNameId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.publicationdetails VALUES (5, 'Tata');
INSERT INTO heos.publicationdetails VALUES (2, 'Mc Graw');
INSERT INTO heos.publicationdetails VALUES (4, 'Osborne');
 DROP TABLE  IF  EXISTS  heos.purchase ;
 CREATE TABLE  `purchase`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `invoicenumber`  varchar ( 50 )  default  NULL ,
   `customerid`  varchar ( 50 )  default  NULL ,
   `customername`  varchar ( 80 )  default  NULL ,
   `billamount`  double  default  NULL ,
   `billdate`  date  default  NULL ,
   `paidamount`  double  NOT  NULL  default  '0' ,
   `paydate`  date  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.purchase VALUES (2, '201', 'DA05', 'Daniel', 100, '2008-03-20 00:00:00', 100, '0000-00-00 00:00:00');
INSERT INTO heos.purchase VALUES (3, '2544', 'Vel01', 'vel', 1500, '2008-04-23 00:00:00', 0, '2008-04-24 00:00:00');
INSERT INTO heos.purchase VALUES (4, '8987897978', 'S', 'Yrty', 5468, '2008-09-04 00:00:00', 0, '2008-09-05 00:00:00');
 DROP TABLE  IF  EXISTS  heos.rack ;
 CREATE TABLE  `rack`  (
   `RackId`  int ( 50 )  NOT  NULL  auto_increment ,
   `RackNo`  varchar ( 20 )  NOT  NULL  default  '' ,
   `NoofBooks`  int ( 10 )  NOT  NULL  default  '0' ,
   PRIMARY KEY   ( `RackId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.rack VALUES (4, 'AC', 100);
INSERT INTO heos.rack VALUES (2, 'AB', 1000);
INSERT INTO heos.rack VALUES (5, 'AA', 50);
 DROP TABLE  IF  EXISTS  heos.random ;
 CREATE TABLE  `random`  (
   `sno`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `recordid`  int ( 100 )  default  NULL ,
   `invoicenumber`  varchar ( 30 )  default  NULL ,
   `whichdue`  int ( 1 )  default  NULL ,
   `dueamount`  double  default  NULL ,
   `ckbx`  varchar ( 5 )  default  NULL ,
   `accountnumber`  int ( 50 )  default  NULL ,
   PRIMARY KEY   ( `sno` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.refund ;
 CREATE TABLE  `refund`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `studentid`  varchar ( 80 )  NOT  NULL  default  '' ,
   `paidamount`  double  default  NULL ,
   `refundamount`  double  default  NULL ,
   `accountnumber`  bigint ( 20 )  default  NULL ,
   `mode`  varchar ( 50 )  default  NULL ,
   `cdnumber`  int ( 50 )  default  '0' ,
   `dddate`  date  default  NULL ,
   `bankname`  varchar ( 50 )  default  NULL ,
   `branch`  varchar ( 50 )  default  NULL ,
   `towhom`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.refund VALUES (3, '1', 1000, 100, 101, 'Cash', 0, '2008-05-23 00:00:00', '', '', '1');
 DROP TABLE  IF  EXISTS  heos.registrationfeesdetails ;
 CREATE TABLE  `registrationfeesdetails`  (
   `RegistrationFeesId`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `RegistrationFees`  bigint ( 20 )  NOT  NULL  default  '0' ,
   `LibraryFine`  bigint ( 20 )  default  NULL ,
   PRIMARY KEY   ( `RegistrationFeesId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.registrationfeesdetails VALUES (1, 1, 20);
INSERT INTO heos.registrationfeesdetails VALUES (2, 0, NULL);
 DROP TABLE  IF  EXISTS  heos.salary ;
 CREATE TABLE  `salary`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `salarymonth`  varchar ( 30 )  default  NULL ,
   `accountnumber`  int ( 50 )  default  NULL ,
   `salarytotal`  double  default  NULL ,
   `mode`  varchar ( 20 )  default  NULL ,
   `cdnumber`  int ( 20 )  default  NULL ,
   `cdbankname`  varchar ( 50 )  default  NULL ,
   `cdbranch`  varchar ( 50 )  default  NULL ,
   `cddate`  date  default  NULL ,
   `cdto`  varchar ( 150 )  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.salary VALUES (4, 'may', 101, 1300, 'Cash', 0, '', '', '2008-05-23 00:00:00', 'may');
INSERT INTO heos.salary VALUES (5, '', 0, 0, 'Cash', 0, '', '', '0000-00-00 00:00:00', '');
 DROP TABLE  IF  EXISTS  heos.sbnm1515 ;
 CREATE TABLE  `sbnm1515`  (
   `recordid`  bigint ( 100 )  unsigned NOT  NULL  auto_increment ,
   `crdr`  varchar ( 50 )  default  NULL ,
   `remarks`  varchar ( 200 )  default  NULL ,
   `currentdate`  date  default  NULL ,
   `amount`  double  default  NULL ,
   `balance`  double  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.screenmaster ;
 CREATE TABLE  `screenmaster`  (
   `ScreenId`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `ScreenName`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `ScreenId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.screenmaster VALUES (21, 'AgentDetails');
INSERT INTO heos.screenmaster VALUES (2, 'BankDetails');
INSERT INTO heos.screenmaster VALUES (3, 'AssestmentDetails');
INSERT INTO heos.screenmaster VALUES (4, 'CohortDetails');
INSERT INTO heos.screenmaster VALUES (6, 'CollegeDetails');
INSERT INTO heos.screenmaster VALUES (7, 'CountryDepositDetails');
INSERT INTO heos.screenmaster VALUES (8, 'CountryDetail');
INSERT INTO heos.screenmaster VALUES (9, 'CourseDetails');
INSERT INTO heos.screenmaster VALUES (10, 'EmbassyAddress');
INSERT INTO heos.screenmaster VALUES (11, 'ExaminationTimeTable');
INSERT INTO heos.screenmaster VALUES (12, 'ExamTTSlot');
INSERT INTO heos.screenmaster VALUES (13, 'InfrastructureDetails');
INSERT INTO heos.screenmaster VALUES (14, 'MarkSchemeDetails');
INSERT INTO heos.screenmaster VALUES (15, 'RegistrationFeesDetails');
INSERT INTO heos.screenmaster VALUES (16, 'ScreenMaster');
INSERT INTO heos.screenmaster VALUES (17, 'SectionMaster');
INSERT INTO heos.screenmaster VALUES (18, 'SubjectCreditDetails');
INSERT INTO heos.screenmaster VALUES (19, 'SupplierDetails');
INSERT INTO heos.screenmaster VALUES (20, 'UniversityDetails');
INSERT INTO heos.screenmaster VALUES (22, 'ExamName');
INSERT INTO heos.screenmaster VALUES (23, 'BookDetails');
INSERT INTO heos.screenmaster VALUES (24, 'MenuMaster');
INSERT INTO heos.screenmaster VALUES (25, 'MenuRights');
INSERT INTO heos.screenmaster VALUES (26, 'PublicationDetails');
INSERT INTO heos.screenmaster VALUES (27, 'RackDetails');
INSERT INTO heos.screenmaster VALUES (28, 'ScreenRights');
INSERT INTO heos.screenmaster VALUES (29, 'UserCreation');
INSERT INTO heos.screenmaster VALUES (30, 'UserTypeMaster');
 DROP TABLE  IF  EXISTS  heos.screenrights ;
 CREATE TABLE  `screenrights`  (
   `UserId`  int ( 11 )  default  NULL ,
   `UserType`  varchar ( 50 )  default  NULL ,
   `ScreenId`  int ( 11 )  default  NULL
 )  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.screenrights VALUES (2, 'Agent', 17);
INSERT INTO heos.screenrights VALUES (2, 'Agent', 18);
INSERT INTO heos.screenrights VALUES (2, 'Agent', 19);
INSERT INTO heos.screenrights VALUES (2, 'Agent', 20);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 21);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 3);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 2);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 4);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 6);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 7);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 8);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 9);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 10);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 11);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 12);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 13);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 14);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 15);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 16);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 17);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 18);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 19);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 20);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 23);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 22);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 24);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 25);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 26);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 27);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 28);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 29);
INSERT INTO heos.screenrights VALUES (1, 'Admin', 30);
 DROP TABLE  IF  EXISTS  heos.sectionmaster ;
 CREATE TABLE  `sectionmaster`  (
   `SectionId`  int ( 50 )  NOT  NULL  auto_increment ,
   `Intake`  varchar ( 50 )  default  NULL ,
   `CourseCode`  varchar ( 50 )  default  NULL ,
   `LevelOfCourse`  varchar ( 50 )  default  NULL ,
   `Section`  varchar ( 10 )  default  NULL ,
   PRIMARY KEY   ( `SectionId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.sectionmaster VALUES (42, 'Aug2008', 'MECH', 'Level1', 'D');
INSERT INTO heos.sectionmaster VALUES (69, 'May2009', 'IT', 'Level2', 'A');
INSERT INTO heos.sectionmaster VALUES (43, 'Aug2008', 'IT', 'Level2', 'A');
INSERT INTO heos.sectionmaster VALUES (52, 'Aug2008', 'IT', 'Level2', 'B');
INSERT INTO heos.sectionmaster VALUES (51, 'Aug2008', 'EEE', 'Level1', 'B');
INSERT INTO heos.sectionmaster VALUES (50, 'Aug2008', 'MSESE', 'Level3', 'F');
INSERT INTO heos.sectionmaster VALUES (44, 'Aug2008', 'MBA', 'Level4', 'A');
INSERT INTO heos.sectionmaster VALUES (71, 'Aug2008', 'EEE', 'Level1', 'A');
INSERT INTO heos.sectionmaster VALUES (45, 'Aug2008', 'NAT', 'Level5', 'A');
INSERT INTO heos.sectionmaster VALUES (46, 'Aug2008', 'MCA', 'Level2', 'A');
INSERT INTO heos.sectionmaster VALUES (47, 'Aug2008', 'MECH', 'Level1', 'A');
INSERT INTO heos.sectionmaster VALUES (72, 'Nov2008', 'IT', 'Level2', 'E');
INSERT INTO heos.sectionmaster VALUES (54, 'Aug2008', 'BECSE', 'Level3', 'B');
INSERT INTO heos.sectionmaster VALUES (55, 'Aug2008', 'MBA', 'Level4', 'B');
INSERT INTO heos.sectionmaster VALUES (57, 'Aug2008', 'MCA', 'Level2', 'B');
INSERT INTO heos.sectionmaster VALUES (58, 'Aug2008', 'MECH', 'Level1', 'B');
INSERT INTO heos.sectionmaster VALUES (59, 'Aug2008', 'ECE', 'Level1', 'A');
INSERT INTO heos.sectionmaster VALUES (61, 'Aug2008', 'IT', 'Level2', 'C');
INSERT INTO heos.sectionmaster VALUES (63, 'Aug2008', 'BECSE', 'Level3', 'C');
INSERT INTO heos.sectionmaster VALUES (64, 'Aug2008', 'MBA', 'Level4', 'C');
INSERT INTO heos.sectionmaster VALUES (65, 'Aug2008', 'NAT', 'Level5', 'C');
INSERT INTO heos.sectionmaster VALUES (66, 'Aug2008', 'MCA', 'Level2', 'C');
INSERT INTO heos.sectionmaster VALUES (67, 'Aug2008', 'MECH', 'Level1', 'E');
INSERT INTO heos.sectionmaster VALUES (68, 'Aug2008', 'ECE', 'Level1', 'B');
INSERT INTO heos.sectionmaster VALUES (75, 'Feb2009', 'EEE', 'Level1', 'A');
 DROP TABLE  IF  EXISTS  heos.slotrepeat ;
 CREATE TABLE  `slotrepeat`  (
   ` week `  int ( 2 )  NOT  NULL  default  '0' ,
   `boolean`  tinyint ( 2 )  NOT  NULL  default  '0' ,
   PRIMARY KEY   ( ` week ` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.slotrepeat VALUES (1, 0);
INSERT INTO heos.slotrepeat VALUES (2, 0);
INSERT INTO heos.slotrepeat VALUES (3, 0);
INSERT INTO heos.slotrepeat VALUES (4, 0);
INSERT INTO heos.slotrepeat VALUES (5, 0);
INSERT INTO heos.slotrepeat VALUES (6, 0);
INSERT INTO heos.slotrepeat VALUES (7, 0);
INSERT INTO heos.slotrepeat VALUES (8, 0);
INSERT INTO heos.slotrepeat VALUES (9, 0);
INSERT INTO heos.slotrepeat VALUES (10, 0);
INSERT INTO heos.slotrepeat VALUES (11, 0);
INSERT INTO heos.slotrepeat VALUES (12, 0);
INSERT INTO heos.slotrepeat VALUES (13, 0);
INSERT INTO heos.slotrepeat VALUES (14, 0);
INSERT INTO heos.slotrepeat VALUES (15, 0);
INSERT INTO heos.slotrepeat VALUES (16, 0);
INSERT INTO heos.slotrepeat VALUES (17, 0);
INSERT INTO heos.slotrepeat VALUES (18, 0);
INSERT INTO heos.slotrepeat VALUES (19, 0);
INSERT INTO heos.slotrepeat VALUES (20, 0);
INSERT INTO heos.slotrepeat VALUES (21, 0);
INSERT INTO heos.slotrepeat VALUES (22, 0);
INSERT INTO heos.slotrepeat VALUES (23, 0);
INSERT INTO heos.slotrepeat VALUES (24, 0);
INSERT INTO heos.slotrepeat VALUES (25, 0);
INSERT INTO heos.slotrepeat VALUES (26, 0);
INSERT INTO heos.slotrepeat VALUES (27, 0);
INSERT INTO heos.slotrepeat VALUES (28, 0);
INSERT INTO heos.slotrepeat VALUES (29, 0);
INSERT INTO heos.slotrepeat VALUES (30, 0);
INSERT INTO heos.slotrepeat VALUES (31, 0);
INSERT INTO heos.slotrepeat VALUES (32, 0);
 DROP TABLE  IF  EXISTS  heos.srini_eee_aug2008_a ;
 CREATE TABLE  `srini_eee_aug2008_a`  (
   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `timetablename`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `term`  varchar ( 50 )  default  NULL ,
   `todaydate`  date  default  NULL ,
   ` day `  varchar ( 50 )  default  NULL ,
   ` week `  varchar ( 50 )  default  NULL ,
   `slot`  varchar ( 50 )  default  NULL ,
   `subject`  varchar ( 50 )  default  NULL ,
   `staff`  varchar ( 50 )  default  NULL ,
   `roomno`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `timetableid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.srini_eee_aug2008_a VALUES (3, 'SRINI', 'EEE', 'Aug2008', '2008-08-27 00:00:00', '3', '2', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (4, 'SRINI', 'EEE', 'Aug2008', '2008-09-03 00:00:00', '3', '3', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (5, 'SRINI', 'EEE', 'Aug2008', '2008-09-10 00:00:00', '3', '4', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (6, 'SRINI', 'EEE', 'Aug2008', '2008-09-17 00:00:00', '3', '5', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (7, 'SRINI', 'EEE', 'Aug2008', '2008-09-24 00:00:00', '3', '6', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (8, 'SRINI', 'EEE', 'Aug2008', '2008-10-01 00:00:00', '3', '7', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (9, 'SRINI', 'EEE', 'Aug2008', '2008-10-08 00:00:00', '3', '8', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (10, 'SRINI', 'EEE', 'Aug2008', '2008-10-15 00:00:00', '3', '9', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (11, 'SRINI', 'EEE', 'Aug2008', '2008-10-22 00:00:00', '3', '10', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (12, 'SRINI', 'EEE', 'Aug2008', '2008-10-29 00:00:00', '3', '11', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (13, 'SRINI', 'EEE', 'Aug2008', '2008-11-05 00:00:00', '3', '12', '1', 'ENG107', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (14, 'SRINI', 'EEE', 'Aug2008', '2008-11-12 00:00:00', '3', '13', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (15, 'SRINI', 'EEE', 'Aug2008', '2008-11-19 00:00:00', '3', '14', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (16, 'SRINI', 'EEE', 'Aug2008', '2008-11-26 00:00:00', '3', '15', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (17, 'SRINI', 'EEE', 'Aug2008', '2008-12-03 00:00:00', '3', '16', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (18, 'SRINI', 'EEE', 'Aug2008', '2008-12-10 00:00:00', '3', '17', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (19, 'SRINI', 'EEE', 'Aug2008', '2008-12-17 00:00:00', '3', '18', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (20, 'SRINI', 'EEE', 'Aug2008', '2008-12-24 00:00:00', '3', '19', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (21, 'SRINI', 'EEE', 'Aug2008', '2008-12-31 00:00:00', '3', '20', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (22, 'SRINI', 'EEE', 'Aug2008', '2009-01-07 00:00:00', '3', '21', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (23, 'SRINI', 'EEE', 'Aug2008', '2009-01-14 00:00:00', '3', '22', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (24, 'SRINI', 'EEE', 'Aug2008', '2009-01-21 00:00:00', '3', '23', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (25, 'SRINI', 'EEE', 'Aug2008', '2009-01-28 00:00:00', '3', '24', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (26, 'SRINI', 'EEE', 'Aug2008', '2009-02-04 00:00:00', '3', '25', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (27, 'SRINI', 'EEE', 'Aug2008', '2009-02-11 00:00:00', '3', '26', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (28, 'SRINI', 'EEE', 'Aug2008', '2009-02-18 00:00:00', '3', '27', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (29, 'SRINI', 'EEE', 'Aug2008', '2009-02-25 00:00:00', '3', '28', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (30, 'SRINI', 'EEE', 'Aug2008', '2009-03-04 00:00:00', '3', '29', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (31, 'SRINI', 'EEE', 'Aug2008', '2009-03-11 00:00:00', '3', '30', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (32, 'SRINI', 'EEE', 'Aug2008', '2009-03-18 00:00:00', '3', '31', '1', 'ENG105', 'syam', 'h2');
INSERT INTO heos.srini_eee_aug2008_a VALUES (33, 'SRINI', 'EEE', 'Aug2008', '2009-03-25 00:00:00', '3', '32', '1', 'ENG105', 'syam', 'h2');
 DROP TABLE  IF  EXISTS  heos.srini_mech_aug2008_a ;
 CREATE TABLE  `srini_mech_aug2008_a`  (
   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `timetablename`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `term`  varchar ( 50 )  default  NULL ,
   `todaydate`  date  default  NULL ,
   ` day `  varchar ( 50 )  default  NULL ,
   ` week `  varchar ( 50 )  default  NULL ,
   `slot`  varchar ( 50 )  default  NULL ,
   `subject`  varchar ( 50 )  default  NULL ,
   `staff`  varchar ( 50 )  default  NULL ,
   `roomno`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `timetableid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.srini_mech_aug2008_b ;
 CREATE TABLE  `srini_mech_aug2008_b`  (
   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `timetablename`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `term`  varchar ( 50 )  default  NULL ,
   `todaydate`  date  default  NULL ,
   ` day `  varchar ( 50 )  default  NULL ,
   ` week `  varchar ( 50 )  default  NULL ,
   `slot`  varchar ( 50 )  default  NULL ,
   `subject`  varchar ( 50 )  default  NULL ,
   `staff`  varchar ( 50 )  default  NULL ,
   `roomno`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `timetableid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.srini_mech_aug2008_b VALUES (1, 'SRINI', 'MECH', 'Aug2008', '2008-08-21 00:00:00', '4', '1', '3', '', '', '');
INSERT INTO heos.srini_mech_aug2008_b VALUES (2, 'SRINI', 'MECH', 'Aug2008', '2008-10-02 00:00:00', '4', '7', '3', '', '', '');
INSERT INTO heos.srini_mech_aug2008_b VALUES (3, 'SRINI', 'MECH', 'Aug2008', '2008-10-30 00:00:00', '4', '11', '3', '', '', '');
INSERT INTO heos.srini_mech_aug2008_b VALUES (4, 'SRINI', 'MECH', 'Aug2008', '2008-11-27 00:00:00', '4', '15', '3', '', '', '');
INSERT INTO heos.srini_mech_aug2008_b VALUES (5, 'SRINI', 'MECH', 'Aug2008', '2008-12-25 00:00:00', '4', '19', '3', '', '', '');
INSERT INTO heos.srini_mech_aug2008_b VALUES (6, 'SRINI', 'MECH', 'Aug2008', '2009-02-05 00:00:00', '4', '25', '3', '', '', '');
INSERT INTO heos.srini_mech_aug2008_b VALUES (7, 'SRINI', 'MECH', 'Aug2008', '2009-03-12 00:00:00', '4', '30', '3', '', '', '');
 DROP TABLE  IF  EXISTS  heos.srinimca02may2008a ;
 CREATE TABLE  `srinimca02may2008a`  (
   `timetableid`  bigint ( 20 )  NOT  NULL  auto_increment ,
   `timetablename`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `term`  varchar ( 50 )  default  NULL ,
   ` day `  varchar ( 50 )  default  NULL ,
   ` week `  varchar ( 50 )  default  NULL ,
   `slot`  varchar ( 50 )  default  NULL ,
   `subject`  varchar ( 50 )  default  NULL ,
   `staff`  varchar ( 50 )  default  NULL ,
   `roomno`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `timetableid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.staffattendence ;
 CREATE TABLE  `staffattendence`  (
   `attendenceid`  int ( 50 )  NOT  NULL  auto_increment ,
   `staffid`  varchar ( 50 )  default  NULL ,
   `department`  varchar ( 50 )  default  NULL ,
   `attendancedate`  date  default  NULL ,
   `attendancestatus`  varchar ( 50 )  default  NULL ,
   `reason`  varchar ( 50 )  NOT  NULL  default  '' ,
   `present`  text ,
   PRIMARY KEY   ( `attendenceid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.staffattendence VALUES (48, '23', 'IT', '2008-08-07 00:00:00', 'A', '-', '*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (46, '23', 'IT', '2008-08-04 00:00:00', 'A', '-', '*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (47, '22', 'IT', '2008-08-07 00:00:00', 'A', '-', '*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (51, '35', 'IT', '2008-08-31 00:00:00', 'A', '-', '*22*23*24*25*26*27*28*29*30*31*32*33*');
INSERT INTO heos.staffattendence VALUES (50, '34', 'IT', '2008-08-31 00:00:00', 'A', '-', '*22*23*24*25*26*27*28*29*30*31*32*33*');
INSERT INTO heos.staffattendence VALUES (49, '24', 'IT', '2008-08-07 00:00:00', 'A', '-', '*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (38, 'AP', 'IT', '2008-07-31 00:00:00', 'AP', '-', '*22sit227*44sit224*34sit225***Dr*Dr*Mr*Mr*Mr*Mr*Mr*');
INSERT INTO heos.staffattendence VALUES (39, '22', 'IT', '2008-08-01 00:00:00', 'A', '-', '*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (40, '23', 'IT', '2008-08-01 00:00:00', 'A', '-', '*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (43, '22', 'IT', '2008-08-02 00:00:00', 'A', '-', '*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (42, 'AP', 'IT', '2008-08-06 00:00:00', 'AP', '-', '*22*23*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (44, '23', 'IT', '2008-08-02 00:00:00', 'A', '-', '*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (45, '22', 'IT', '2008-08-04 00:00:00', 'A', '-', '*24*25*26*27*28*29*30*31*32*33*34*35*36*');
INSERT INTO heos.staffattendence VALUES (52, '36', 'IT', '2008-08-31 00:00:00', 'A', '-', '*22*23*24*25*26*27*28*29*30*31*32*33*');
 DROP TABLE  IF  EXISTS  heos.staffattendencemark ;
 CREATE TABLE  `staffattendencemark`  (
   `attendenceid`  int ( 50 )  NOT  NULL  auto_increment ,
   `staffinformationid`  int ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  default  NULL ,
   `present`  varchar ( 200 )  default  NULL ,
   `absent`  varchar ( 200 )  default  NULL ,
   `leavereason`  text  NOT  NULL ,
   ` date `  date  default  NULL ,
   PRIMARY KEY   ( `attendenceid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.staffattendencemark VALUES (61, 0, 'EEE', '*EEE9*EEE8*EEE2*', '*EEE10*EEE11*EEE7*EEE6*', '*2*1*1*2*', '2008-08-25 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (56, 0, 'IT', '*IT5*IT16*', '*IT4*IT3*', '*1*3*', '2008-08-29 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (59, 0, 'EEE', '*EEE8*', '*EEE10*EEE11*EEE9*EEE7*EEE6*EEE2*', '*1*1*4*2*3*', '2008-08-01 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (60, 0, 'IT', '*IT5*IT16*', '*IT4*IT3*', '*1*2*', '2008-08-01 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (62, 0, 'EEE', '*EEE8*', '*EEE10*EEE11*EEE9*EEE7*EEE6*EEE2*', '*1*1*4*2*3*', '2008-08-01 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (63, 0, 'EEE', '*EEE10*EEE8*EEE7*EEE6*EEE2*', '*EEE10*EEE11*EEE9*EEE8*EEE7*EEE6*EEE2*', '*1*3*', '2008-09-09 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (70, 0, 'EEE', '*EEE9*EEE8*EEE7*', '*EEE10*EEE11*EEE6*EEE2*', '*2*3*2*3*', '2008-09-10 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (69, 0, 'IT', '*IT3*IT16*', '*IT5*IT4*', '*1*2*', '2008-09-10 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (71, 0, 'EEE', '*EEE10*EEE8*EEE6*', '*EEE11*EEE9*EEE7*EEE2*', '*1*1*2*3*4*', '2008-09-14 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (72, 0, 'EEE', '*EEE11*EEE8*EEE6*', '*EEE10*EEE9*EEE7*EEE2*', '*1*3*3*4*', '2008-09-13 00:00:00');
INSERT INTO heos.staffattendencemark VALUES (74, 0, 'EEE', '238*237*232*239*241', '236*240', '2*3', '2008-09-20 00:00:00');
 DROP TABLE  IF  EXISTS  heos.staffavailabilitytimetable ;
 CREATE TABLE  `staffavailabilitytimetable`  (
   `staffavailabilityid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `staffid`  varchar ( 35 )  NOT  NULL  default  '' ,
   `coursecode`  varchar ( 25 )  default  NULL ,
   `subjectcode`  varchar ( 25 )  default  NULL ,
   `availability`  varchar ( 20 )  default  NULL ,
   PRIMARY KEY   ( `staffavailabilityid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.staffavailabilitytimetable VALUES (342, 'EEE7', 'IT', 'ENG107', '1.2.3.4.5.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (344, 'EEE11', 'MECH', 'ME338', '1.2.3.4.');
INSERT INTO heos.staffavailabilitytimetable VALUES (345, 'EEE10', 'EEE', 'EEE702', '1.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (346, 'EEE10', 'EEE', 'EEE601', '1.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (347, 'EEE10', 'EEE', 'EEE801', '1.2.3.4.5.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (348, 'EEE10', 'EEE', 'EEE502', '1.2.3.4.5.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (355, 'IT4', 'IT', 'IT082', '1.');
INSERT INTO heos.staffavailabilitytimetable VALUES (350, 'EEE10', 'MECH', 'MF331', '1.2.3.4.5.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (351, 'EEE10', 'MECH', 'ME331', '1.2.3.4.5.6.7.');
INSERT INTO heos.staffavailabilitytimetable VALUES (352, 'EEE10', 'EEE', 'EEE502', '1.2.3.');
INSERT INTO heos.staffavailabilitytimetable VALUES (353, 'EEE10', 'EEE', 'EEE805', '1.2.3.');
INSERT INTO heos.staffavailabilitytimetable VALUES (356, 'IT4', 'IT', 'IT072', '1.');
INSERT INTO heos.staffavailabilitytimetable VALUES (366, 'EEE9', 'EEE', 'EEE703', '1.3.5.7');
INSERT INTO heos.staffavailabilitytimetable VALUES (367, 'EEE9', 'EEE', 'EEE502', '1.3.5.7');
 DROP TABLE  IF  EXISTS  heos.staffpersonalinformation ;
 CREATE TABLE  `staffpersonalinformation`  (
   `staffinformationid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `staffid`  varchar ( 50 )  NOT  NULL  default  '' ,
   `name`  varchar ( 50 )  default  NULL ,
   `designation`  varchar ( 50 )  default  NULL ,
   `typeofjob`  varchar ( 50 )  default  NULL ,
   `gender`  varchar ( 50 )  default  NULL ,
   `boodgroup`  varchar ( 50 )  default  NULL ,
   `age`  int ( 3 )  default  NULL ,
   `maritalstatus`  varchar ( 50 )  default  NULL ,
   `dateofbirth`  date  default  NULL ,
   `dateofjoining`  date  default  NULL ,
   `mailid`  varchar ( 50 )  default  NULL ,
   ` password `  varchar ( 20 )  default  NULL ,
   `presentaddress`  varchar ( 50 )  default  NULL ,
   `permanentaddress`  varchar ( 50 )  default  NULL ,
   `mobileno`  varchar ( 50 )  default  NULL ,
   `phoneno`  varchar ( 50 )  default  NULL ,
   `religion`  varchar ( 50 )  default  NULL ,
   `community`  varchar ( 50 )  default  NULL ,
   `degree`  varchar ( 50 )  default  NULL ,
   `specification`  varchar ( 50 )  default  NULL ,
   `institutename`  varchar ( 100 )  default  NULL ,
   `universityname`  varchar ( 100 )  default  NULL ,
   `duration`  varchar ( 10 )  default  NULL ,
   `percentage`  bigint ( 10 )  default  NULL ,
   `degree1`  varchar ( 50 )  default  NULL ,
   `specification1`  varchar ( 100 )  default  NULL ,
   `institutename1`  varchar ( 50 )  default  NULL ,
   `universityname1`  varchar ( 50 )  default  NULL ,
   `duration1`  varchar ( 10 )  default  NULL ,
   `percentage1`  bigint ( 10 )  default  NULL ,
   `compname`  varchar ( 50 )  NOT  NULL  default  '' ,
   `subject`  varchar ( 50 )  default  NULL ,
   `compdesignation`  varchar ( 50 )  default  NULL ,
   `years`  tinyint ( 10 )  default  NULL ,
   `rewards`  varchar ( 50 )  default  NULL ,
   `reference`  varchar ( 50 )  default  NULL ,
   `address`  varchar ( 50 )  default  NULL ,
   `compname1`  varchar ( 50 )  default  NULL ,
   `subject1`  varchar ( 30 )  default  NULL ,
   `compdesignation1`  varchar ( 50 )  default  NULL ,
   `years1`  tinyint ( 10 )  default  NULL ,
   `rewards1`  varchar ( 50 )  default  NULL ,
   `reference1`  varchar ( 50 )  default  NULL ,
   `address1`  varchar ( 50 )  default  NULL ,
   `department`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `staffinformationid` , `staffid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.staffpersonalinformation VALUES (240, 'EEE10', 'tarun', 'Lecturer', 'Permanent', 'Male', 'none', 25, 'Married', '2003-08-16 00:00:00', '0000-00-00 00:00:00', 's@yahoo.co.in', 'XnndS', 'sfsfs', 'fsfsf', '7575', '757575', 'hi', 'm', 'B.TECH', 'csc', 'sathyaba', 'deemed', '4', 78, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (241, 'EEE11', 'syam', 'Professor', 'Permanent', 'Male', 'none', 24, 'Unmarried', '1998-08-21 00:00:00', '0000-00-00 00:00:00', 's@gmail.com', 'EuyUP', 'erere', 'ere', '6866', '8686', 'hindu', 'fe', 'b.tech', 'it', 'sathyabama', 'deemed', '4', 78, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (239, 'EEE9', 'srini', 'Professor', 'Permanent', 'Male', 'none', 23, 'Unmarried', '1999-08-12 00:00:00', '0000-00-00 00:00:00', 's1@gmail.com', 'vkDiA', 'hfh', 'fhfhf', '676868', '6868686', 'hindu', 'hhf', 'Btech', 'mca', 'sathyaba', 'deemed', '4', 67, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (238, 'EEE8', 'karthick', 'Professor', 'Permanent', 'Male', 'none', 24, 'Married', '1985-08-16 00:00:00', '0000-00-00 00:00:00', 's@gmail.com', 'zRmH', 'sfsfs', 'sfsfs', '9575575757', '57757575', 'hin', 'yad', 'mba', 'mba', 'sathyabama', 'demmwed', '2', 80, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (237, 'EEE7', 'sita', 'Lecturer', 'Permanent', 'Female', 'none', 25, 'Unmarried', '2002-08-03 00:00:00', '0000-00-00 00:00:00', 's@gmail.com', 'ZTVsP', 'ghhfh', 'hfh', '788242422', '242454546', 'hindu', 'bra', 'b.tech', 'CSC', 'sathy', 'demmed', '4', 70, '', '', '', '', '', 0, 'sathyabama', 'math,phy', 'lect', 2, '', '', '', '', '', '', 0, '', '', '', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (236, 'EEE6', 'omkar', 'Professor', 'Permanent', 'Male', 'none', 25, 'Unmarried', '1992-08-21 00:00:00', '0000-00-00 00:00:00', 's@gmail.com', 'AwYnx', 'plot.176', 'ara,', '9884277243', '062424424', 'hindu', 'brahmin', 'b.tech', 'IT', 'sathyabama', 'deemed', '4', 69, '', '', '', '', '', 0, 'srm', 'english', 'lect', 2, 'dggd', 'mr karthick', 'adyar', '', '', '', 0, '', '', '', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (235, 'IT5', 'hari', 'Lecturer', 'none', 'Male', 'AB+', 0, 'Married', '2008-08-05 00:00:00', '0000-00-00 00:00:00', '', 'avmJt', '', '-do-', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'IT');
INSERT INTO heos.staffpersonalinformation VALUES (234, 'IT4', 'omkar', 'none', 'none', 'Male', 'O+', 25, 'none', '2008-08-15 00:00:00', '0000-00-00 00:00:00', 's@gmail.com', 'NnjII', '', '-do-', '8878', '8787', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'IT');
INSERT INTO heos.staffpersonalinformation VALUES (233, 'IT3', 'SHYAM', 'Lecturer', 'Permanent', 'Male', 'none', 25, 'Unmarried', '2008-08-10 00:00:00', '0000-00-00 00:00:00', 'S@GMAO.COM', 'EhWev', 'ghghg', 'ghghg', '949664564', '464646446', 'HI', 'hghg', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'IT');
INSERT INTO heos.staffpersonalinformation VALUES (232, 'EEE2', 'sonu', 'Professor', 'Permanent', 'Male', 'none', 24, 'Unmarried', '2008-08-06 00:00:00', '0000-00-00 00:00:00', 's@gmail.com', 'MrhvI', 'plot no.175', 'ggf', '9884277243', '565657', 'hindu', 'brahmin', 'b.tech', 'IT', 'SATHYABAMA', 'SATHYABAMA', '4', 67, 'b.tech', 'CSC', 'SATHYABAMA', 'SATHYABAMA', '2', 67, 'JEPP', 'JAVA', 'LECT', 2, 'HHF', 'FHFH', 'FHFHFHF', 'JEPP', 'JAVA', 'LECT', 2, 'HGF', 'GFHFH', 'FHFHJFH', 'EEE');
INSERT INTO heos.staffpersonalinformation VALUES (231, 'IT16', 'sila', 'none', 'none', 'Male', 'none', 0, 'none', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'AwfXs', '', '-do-', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 'IT');
 DROP TABLE  IF  EXISTS  heos.staffqualificationdetails ;
 CREATE TABLE  `staffqualificationdetails`  (
   `degree`  varchar ( 50 )  default  NULL ,
   `staffid`  varchar ( 20 )  NOT  NULL  default  '' ,
   `specification`  varchar ( 100 )  default  NULL ,
   `institutename`  varchar ( 100 )  default  NULL ,
   `universityname`  varchar ( 100 )  default  NULL ,
   `duration`  varchar ( 50 )  NOT  NULL  default  '' ,
   `percentage`  bigint ( 10 )  default  NULL ,
   `degree1`  varchar ( 50 )  default  NULL ,
   `specification1`  varchar ( 100 )  default  NULL ,
   `institutename1`  varchar ( 100 )  default  NULL ,
   `universityname1`  varchar ( 100 )  default  NULL ,
   `duration1`  varchar ( 50 )  NOT  NULL  default  '' ,
   `percentage1`  bigint ( 10 )  default  NULL ,
   `name`  varchar ( 50 )  NOT  NULL  default  '' ,
   `subject`  varchar ( 50 )  NOT  NULL  default  '' ,
   `designation`  varchar ( 50 )  NOT  NULL  default  '' ,
   `years`  tinyint ( 10 )  NOT  NULL  default  '0' ,
   `rewards`  varchar ( 50 )  NOT  NULL  default  '' ,
   `reference`  varchar ( 50 )  NOT  NULL  default  '' ,
   `address`  varchar ( 50 )  NOT  NULL  default  '' ,
   `name1`  varchar ( 50 )  NOT  NULL  default  '' ,
   `subject1`  varchar ( 50 )  NOT  NULL  default  '' ,
   `designation1`  varchar ( 50 )  NOT  NULL  default  '' ,
   `years1`  tinyint ( 10 )  NOT  NULL  default  '0' ,
   `rewards1`  varchar ( 50 )  NOT  NULL  default  '' ,
   `reference1`  varchar ( 50 )  NOT  NULL  default  '' ,
   `address1`  varchar ( 50 )  NOT  NULL  default  ''
 )  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.staffqualificationdetails VALUES ('ghgh', '', 'hfhghg', 'hghjhjh', 'gjgjg', '45', 56, 'ghggh', 'dddd', 'dadad', 'ddadada', '67', 53, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '', 'hghg', 'ghghg', 'ghghg', '8', 566, 'fgfg', 'gfgfg', 'gfgf', 'gfgfg', '2', 34, 'fdfd', 'dd', 'ffdfd', 2, 'dffd', 'fdf', 'dfdfd', 'fdfd', 'fdfd', 'fdfd', 2, 'fdfdfd', 'fdggf', 'fggf');
INSERT INTO heos.staffqualificationdetails VALUES ('b.tech', '', 'tyy', 'yttyt', 'yty', '34', 56, 'b.tfd', 'jj', 'hjh', 'jhj', '78', 78, 'b.tech', 'hg', 'hgh', 1, 'ff', 'fd', 'dfdfd', 'bd', 'dffd', 'fdfd', 3, 'dsds', 'sdfsf', 'fsf');
INSERT INTO heos.staffqualificationdetails VALUES ('b.tech', '', 'ghh', 'hghg', 'ghghg', '2', 78, 'hgd', 'iiy', 'iyi', 'iyi', '4', 89, 'tiwary', 'gdgd', 'ggd', 2, 'gg', 'gfgf', 'gfgf', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('b', '', 'thghg', 'ghghg', 'hghg', '2', 78, 'bhu', 'jjgj', 'gjgj', 'gjgj', '1', 89, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('b', '', 'ggf', 'fgfg', 'gfgf', '1', 89, 'n', 'hghg', 'hghg', 'ghghg', '2', 90, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('b.tech', '', 'ggf', 'gfg', 'gfg', '3', 89, 'df', 'jjhj', 'jhj', 'hjhj', '8', 90, '', '', 'fgfg', 3, 'gdg', 'dgdg', 'dgdgd', 'ggd', 'dgdg', 'dgdg', 3, 'dggdgd', 'gdg', 'dgdgdg');
INSERT INTO heos.staffqualificationdetails VALUES ('b.tech', '', 'ggf', 'gfg', 'gfg', '3', 89, 'df', 'jjhj', 'jhj', 'hjhj', '8', 90, 'fhfhf', 'fhfh', 'fgfg', 3, 'gdg', 'dgdg', 'dgdgd', 'ggd', 'dgdg', 'dgdg', 3, 'dggdgd', 'gdg', 'dgdgdg');
INSERT INTO heos.staffqualificationdetails VALUES ('b.tech', '', 'grr', 'trtrtr', 'rtrtr', '2', 89, 'b.tech', 'gfgfg', 'gfgf', 'fgfg', '1', 80, 'ffdfd', 'fdfd', 'dfdfd', 2, 'dsdfsf', 'rwwrrw', 'rwrw', 'wrrwrw', 'rwrwr', 'rrw', 4, 'gfgg', 'grrrtr', 'rtrtrt');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('gfg', '22sit224', 'jgjgj', 'jgjg', 'gjgj', '6', 78, 'hfhf', 'ghjkghjkh', 'hkhkh', 'hkhkh', '1', 90, 'ggdfg', 'gdgd', 'gdgd', 4, 'gdgdg', 'dgdgd', 'gdgd', 'dgdgd', 'gddgd', 'dgdg', 8, 'fhhf', 'hffhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('b.tech', '22sit226', 'hjhjh', 'hjhjh', 'jhjh', '6', 89, 'hffh', 'hfhf', 'hfhf', 'fhfhfh', '1', 89, 'sdsds', 'sdsds', 'sdsd', 2, 'daq', 'eqeq', 'eqeq', 'eqeq', 'eqeq', 'eq', 3, 'eqereq', 'qeqeq', 'eqqqeq');
INSERT INTO heos.staffqualificationdetails VALUES ('', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('rte', '', '543srt', 'yyhrtyrty', 'ryeryertert', '4', 45, 'trert', '765grthy', 'tytytry', 'yhtrytytry', '6', 45, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('br', '34sit225', 'g', 'gfgfg', 'fgfg', '1', 67, 'fg', 'hgh', 'hgh', 'hgh', '3', 56, 'gg', 'fg', 'fgf', 4, '3', 'hth', 'hfhf', 'hff', 'fhff', 'fhfhf', 4, '5', 'ghfhf', 'fhfhf');
INSERT INTO heos.staffqualificationdetails VALUES ('', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
INSERT INTO heos.staffqualificationdetails VALUES ('', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', 0, '', '', '');
 DROP TABLE  IF  EXISTS  heos.stand1000 ;
 CREATE TABLE  `stand1000`  (
   `recordid`  bigint ( 100 )  unsigned NOT  NULL  auto_increment ,
   `crdr`  varchar ( 50 )  default  NULL ,
   `remarks`  varchar ( 200 )  default  NULL ,
   `currentdate`  date  default  NULL ,
   `amount`  double  default  NULL ,
   `balance`  double  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 DROP TABLE  IF  EXISTS  heos.studattendencemark ;
 CREATE TABLE  `studattendencemark`  (
   `attendenceid`  int ( 50 )  NOT  NULL  auto_increment ,
   `intake`  text  NOT  NULL ,
   `coursecode`  varchar ( 50 )  NOT  NULL  default  '' ,
   `present`  text  NOT  NULL ,
   `absent`  text  NOT  NULL ,
   `leavereason`  text  NOT  NULL ,
   ` date `  date  default  NULL ,
   `subjectcode`  varchar ( 50 )  default  NULL ,
   `section`  varchar ( 10 )  default  NULL ,
   PRIMARY KEY   ( `attendenceid` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.studattendencemark VALUES (41, 'Aug2008', 'EEE', '*Aug2008EEE67*', '*Aug2008EEE57*', '*1*', '2008-09-03 00:00:00', 'ENG105', 'A');
INSERT INTO heos.studattendencemark VALUES (40, 'Aug2008', 'EEE', '*Aug2008EEE57*', '*Aug2008EEE67*', '*1*', '2008-08-27 00:00:00', 'ENG105', 'A');
INSERT INTO heos.studattendencemark VALUES (65, 'Aug2008', 'EEE', '15*25', '*', '*', '2008-09-17 00:00:00', 'ENG107', 'A');
 DROP TABLE  IF  EXISTS  heos.student ;
 CREATE TABLE  `student`  (
   `recordid`  bigint ( 5 )  NOT  NULL  auto_increment ,
   `studentid`  varchar ( 20 )  NOT  NULL  default  '' ,
   `studentpwd`  varchar ( 20 )  default  NULL ,
   `studentname`  varchar ( 50 )  default  NULL ,
   `intake`  varchar ( 15 )  default  NULL ,
   `nextintake`  varchar ( 10 )  default  NULL ,
   `levelofeducation`  varchar ( 30 )  default  NULL ,
   `mailid`  varchar ( 50 )  default  NULL ,
   `coursecode`  varchar ( 50 )  NOT  NULL  default  '' ,
   `section`  char ( 1 )  default  NULL ,
   `countryresidence`  varchar ( 30 )  default  NULL ,
   `addreassline1`  varchar ( 220 )  default  NULL ,
   `addressline2`  varchar ( 220 )  default  NULL ,
   `postcode`  varchar ( 8 )  default  NULL ,
   `citizenof`  varchar ( 8 )  default  NULL ,
   `phonenumber`  varchar ( 30 )  default  NULL ,
   `mobilenumber`  varchar ( 25 )  default  NULL ,
   `faxnumber`  varchar ( 30 )  default  NULL ,
   `dateofbirth`  date  default  NULL ,
   `passportnumber`  varchar ( 30 )  default  NULL ,
   `course1`  varchar ( 50 )  default  NULL ,
   `institute1`  varchar ( 50 )  default  NULL ,
   `duration1`  int ( 2 )  default  NULL ,
   `grade1`  char ( 2 )  default  NULL ,
   `course2`  varchar ( 50 )  default  NULL ,
   `institute2`  varchar ( 50 )  default  NULL ,
   `duration2`  int ( 2 )  default  NULL ,
   `grade2`  char ( 2 )  default  NULL ,
   `employer1`  varchar ( 50 )  default  NULL ,
   `designation1`  varchar ( 45 )  default  NULL ,
   `startdate1`  date  default  NULL ,
   `enddate1`  date  default  NULL ,
   `employer2`  varchar ( 50 )  default  NULL ,
   `designation2`  varchar ( 45 )  default  NULL ,
   `startdate2`  date  default  NULL ,
   `enddate2`  date  default  NULL ,
   `refname1`  varchar ( 50 )  default  NULL ,
   `refoccupation1`  varchar ( 45 )  default  NULL ,
   `refinstitution1`  varchar ( 50 )  default  NULL ,
   `refrelationship1`  varchar ( 45 )  default  NULL ,
   `refphonenumber1`  varchar ( 30 )  default  NULL ,
   `refemail1`  varchar ( 80 )  default  NULL ,
   `refname2`  varchar ( 50 )  default  NULL ,
   `refoccupation2`  varchar ( 45 )  default  NULL ,
   `refinstitution2`  varchar ( 50 )  default  NULL ,
   `refrelationship2`  varchar ( 45 )  default  NULL ,
   `refphonenumber2`  varchar ( 30 )  default  NULL ,
   `refemail2`  varchar ( 80 )  default  NULL ,
   `transferbranch`  varchar ( 15 )  default  NULL ,
   `courseamount`  double  default  NULL ,
   `feepaid`  double  default  NULL ,
   `fine`  double  default  NULL ,
   `examfee`  double  default  NULL ,
   `visa`  tinyint ( 2 )  default  NULL ,
   `englishclass`  tinyint ( 2 )  default  NULL ,
   `discontinued`  tinyint ( 2 )  default  NULL ,
   `agentid`  varchar ( 15 )  default  NULL ,
   PRIMARY KEY   ( `recordid` , `studentid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.student VALUES (14, 'Aug2008MECH56', 'x4TQEB', 'Mr.karthik Ramalingam', 'Aug2008', 'Aug2008', 'Level1', 'karthikfriend@gmail.com', 'MECH', 'A', 'IND', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'MECH', 450, 420, 0, 0, 1, 0, 1, 'SA');
INSERT INTO heos.student VALUES (15, 'Aug2008EEE57', 'w9Iajb', 'Mr.Karthik Vimalraj', 'Aug2008', 'Aug2008', 'Level1', 'karthi@gmail.com', 'EEE', 'A', 'IND', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'EEE', 67, 67, 0, 0, 1, 0, 1, 'MUK01');
INSERT INTO heos.student VALUES (16, 'Aug2008ECE58', 'iKCKPK', 'Mr.Daniel Samraj', 'Aug2008', 'Aug2008', 'Level1', 'danie@gmail.com', 'ECE', 'A', 'IND', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'IND', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'ECE', 4.7, 4.7, 0, 0, 1, 0, 1, 'JAN14');
INSERT INTO heos.student VALUES (17, 'Aug2008IT59', 'k2n00Q', 'Mr.Omkarnath Tiwary', 'Aug2008', 'Aug2008', 'Level2', 'omkarnat@gmail.com', 'IT', 'A', 'AF', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'AF', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'IT', 23, 22, 0, 0, 1, 0, 1, 'SSM58');
INSERT INTO heos.student VALUES (18, 'Aug2008MCA60', '6IFPYN', 'Mr.Tarun Kumar', 'Aug2008', 'Aug2008', 'Level2', 'taru@gmail.com', 'MCA', 'A', 'AN', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'AN', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'MCA', 20000, 19000, 0, 0, 1, 0, 1, 'FGH76');
INSERT INTO heos.student VALUES (19, 'Aug2008MECH61', 'dOYyqo', 'Mr.Mahesh', 'Aug2008', 'Aug2008', 'Level1', 'karthikfrien@gmail.com', 'MECH', 'A', 'BG', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'BG', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'MECH', 450, 450, 0, 0, 1, 0, 1, 'SWE45');
INSERT INTO heos.student VALUES (20, 'Aug2008EEE62', 'kakv4u', 'Mr.Alex Pandien', 'Aug2008', 'Aug2008', 'Level1', 'karth@gmail.com', 'EEE', 'A', 'DN', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'DN', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'EEE', 67, 66, 0, 0, 1, 0, 1, 'MUK01');
INSERT INTO heos.student VALUES (21, 'Aug2008ECE63', 'pRdiXY', 'Mr.Srijith', 'Aug2008', 'Aug2008', 'Level1', 'dani@gmail.com', 'ECE', 'A', 'GA', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'GA', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'ECE', 4.7, 4.7, 0, 0, 1, 0, 1, 'MAH14');
INSERT INTO heos.student VALUES (22, 'Aug2008IT64', 'DS5JuR', 'Mr.Senthil Kumar', 'Aug2008', 'Aug2008', 'Level2', 'omkarna@gmail.com', 'IT', 'A', 'KAZ', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'KAZ', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'IT', 23, 23, 0, 0, 1, 0, 1, 'DER56');
INSERT INTO heos.student VALUES (23, 'Aug2008MCA65', 'nioFfL', 'Mr.Sahji', 'Aug2008', 'Aug2008', 'Level2', 'tar@gmail.com', 'MCA', 'A', 'VAT', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'VAT', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'MCA', 20000, 20000, 0, 0, 1, 0, 1, 'FGH76');
INSERT INTO heos.student VALUES (24, 'Aug2008MECH66', '83VmL0', 'Mr.Manika Sudar', 'Aug2008', 'Aug2008', 'Level1', 'karthikfrie@gmail.com', 'MECH', 'A', 'SKN', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'SKN', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'MECH', 450, 450, 0, 0, 1, 0, 1, 'JAN14');
INSERT INTO heos.student VALUES (25, 'Aug2008EEE67', 'TromQh', 'Mr.Justin Doss', 'Aug2008', 'Aug2008', 'Level1', 'kart@gmail.com', 'EEE', 'A', 'TI', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'TI', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'EEE', 67, 67, 0, 0, 1, 0, 1, 'SWE45');
INSERT INTO heos.student VALUES (26, 'Aug2008ECE68', 'dvwd5d', 'Mr.Ramesh', 'Aug2008', 'Aug2008', 'Level1', 'dan@gmail.com', 'ECE', 'A', 'LOA', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'LOA', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'ECE', 4.7, 4.7, 0, 0, 1, 0, 1, 'MUK01');
INSERT INTO heos.student VALUES (27, 'Aug2008IT69', 'ruQVbX', 'Mr.Babu', 'Aug2008', 'Aug2008', 'Level2', 'omkarn@gmail.com', 'IT', 'A', 'CM', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'CM', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'IT', 23, 23, 0, 0, 1, 0, 1, 'SSM58');
INSERT INTO heos.student VALUES (28, 'Aug2008MCA70', 'Ypvi7Y', 'Mr.John Berkman', 'Aug2008', 'Aug2008', 'Level2', 'ta@gmail.com', 'MCA', 'A', 'GA', 'Old Mahabalipuram road, Jeppiaar Nagr, Chennai', '', '600119', 'GA', '24500640', '9888844444', '24500640', '1982-02-08 00:00:00', 'PASS789', 'SSLC', 'Govt.Hr.Sec School', 10, 'B', '+2', 'Govt.Hr.Sec School', 10, 'B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paul Edward', 'Employee', 'Jeppiaar Technologies', 'Friends', '9888855555', 'paul@gmail.com', '', '', '', '', '', '', 'MCA', 20000, 20000, 0, 0, 1, 0, 1, 'MUK01');
 DROP TABLE  IF  EXISTS  heos.studentfinanace ;
 CREATE TABLE  `studentfinanace`  (
   `recordid`  bigint ( 100 )  NOT  NULL  auto_increment ,
   `studentid`  varchar ( 50 )  default  NULL ,
   `registrationid`  varchar ( 50 )  default  NULL ,
   `studentname`  varchar ( 50 )  default  NULL ,
   `branchname`  varchar ( 50 )  default  NULL ,
   `intake`  varchar ( 50 )  default  NULL ,
   `totalfeeamount`  float  default  NULL ,
   `initialdeposit`  float  default  NULL ,
   `nextpaydate`  date  default  NULL ,
   `dueamount`  float  default  NULL ,
   `balance`  float  default  NULL ,
   `fineamount`  float  default  NULL ,
   `exambookfee`  float  default  NULL ,
   `transferofbranch`  varchar ( 50 )  default  NULL ,
   `discontinued`  varchar ( 10 )  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.studentfinanace VALUES (11, '1', '1', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 5000, '0000-00-00 00:00:00', 20000, 20000, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (12, '2', '1', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 10000, '0000-00-00 00:00:00', 15000, 15000, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (13, '9', '8', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 4350, '0000-00-00 00:00:00', 20650, 20650, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (14, '10', '9', 'Mr.omkar nath tiwary', 'UG', '2008-02-26', 25000, 5600, '0000-00-00 00:00:00', 19400, 19400, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (15, '11', '10', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 11000, '0000-00-00 00:00:00', 14000, 14000, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (16, '12', '11', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 1000, '0000-00-00 00:00:00', 24000, 24000, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (17, '13', '12', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 20000, '0000-00-00 00:00:00', 5000, 5000, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (18, '18', '7', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 1100, '0000-00-00 00:00:00', 23900, 23900, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (19, '19', '8', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 1100, '0000-00-00 00:00:00', 23900, 23900, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (20, '20', '9', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, 'no', 'no');
INSERT INTO heos.studentfinanace VALUES (21, '1', '1', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (22, '2', '1', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (23, '9', '8', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (24, '10', '9', 'Mr.omkar nath tiwary', 'UG', '2008-02-26', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (25, '11', '10', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (26, '12', '11', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (27, '13', '12', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (28, '18', '7', 'Mr.balaji Ram Ram', 'UG', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (29, '19', '8', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (30, '20', '9', 'Mr.balaji Ram Ram', 'matric', '2008-02-08', 25000, 0, '0000-00-00 00:00:00', 25000, 25000, 0, 0, '', 'no');
INSERT INTO heos.studentfinanace VALUES (31, '21', '10', '.', '', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'no', '0');
INSERT INTO heos.studentfinanace VALUES (32, '22', '11', 'Mr.sonu nath tiwary', 'IT', '2008-02-11', 15000, 3400, '0000-00-00 00:00:00', 11600, 11600, 0, 0, 'yes', '0');
 DROP TABLE  IF  EXISTS  heos.studentsubject ;
 CREATE TABLE  `studentsubject`  (
   `recordid`  bigint ( 6 )  NOT  NULL  auto_increment ,
   `studentid`  varchar ( 15 )  default  NULL ,
   `subjectcode`  varchar ( 15 )  default  NULL ,
   `termno`  int ( 2 )  default  NULL ,
   `mark`  int ( 3 )  default  NULL ,
   `reason`  varchar ( 150 )  default  NULL ,
   PRIMARY KEY   ( `recordid` )
)  ENGINE = InnoDB  DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.studentsubject VALUES (6, 'Aug2008ECE58', 'ENG103', 2, 91, 'ECE');
INSERT INTO heos.studentsubject VALUES (7, 'Aug2008EEE62', 'EEE601', 1, 71, 'EEE');
 DROP TABLE  IF  EXISTS  heos.subjectcreditdetails ;
 CREATE TABLE  `subjectcreditdetails`  (
   `SubjectCreditId`  int ( 11 )  NOT  NULL  auto_increment ,
   `SubjectCode`  varchar ( 20 )  NOT  NULL  default  '' ,
   `SubjectName`  varchar ( 100 )  default  NULL ,
   `NormalCredit`  int ( 10 )  NOT  NULL  default  '0' ,
   `EctsCredit`  int ( 10 )  default  NULL ,
   `CourseCode`  varchar ( 10 )  NOT  NULL  default  '' ,
   `TermNumber`  int ( 5 )  NOT  NULL  default  '0' ,
   PRIMARY KEY   ( `SubjectCreditId` , `SubjectCode` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.subjectcreditdetails VALUES (74, 'EEE502', '', 2, 10, 'ECE', 1);
INSERT INTO heos.subjectcreditdetails VALUES (75, 'EEE503', 'Field Theory', 4, 3, 'EEE', 2);
INSERT INTO heos.subjectcreditdetails VALUES (76, 'EEE601', 'Analog & Digital Electronics', 45, 2, 'EEE', 1);
INSERT INTO heos.subjectcreditdetails VALUES (77, 'EEE604', 'Electrical Energy Systems', 5, 3, 'EEE', 6);
INSERT INTO heos.subjectcreditdetails VALUES (78, 'EEE702', 'Power Electronics', 5, 3, 'EEE', 7);
INSERT INTO heos.subjectcreditdetails VALUES (79, 'EEE703', 'Control Systems', 5, 4, 'EEE', 7);
INSERT INTO heos.subjectcreditdetails VALUES (80, 'EEE801', 'Industrial Engineering', 10, 5, 'EEE', 8);
INSERT INTO heos.subjectcreditdetails VALUES (81, 'EEE805', 'CAD/CAM', 5, 3, 'EEE', 8);
INSERT INTO heos.subjectcreditdetails VALUES (82, 'ME331', 'Design of Machine Elements', 2, 4, 'MECH', 1);
INSERT INTO heos.subjectcreditdetails VALUES (83, 'ME335', 'Computer Aided Design', 4, 23, 'MECH', 1);
INSERT INTO heos.subjectcreditdetails VALUES (84, 'MF331', 'Engineering Metrology', 45, 2, 'MECH', 2);
INSERT INTO heos.subjectcreditdetails VALUES (85, 'ME336', 'Dynamics Lab', 5, 0, 'MECH', 2);
INSERT INTO heos.subjectcreditdetails VALUES (86, 'ME337', 'Thermal Engineering Laboratory I', 5, 3, 'MECH', 3);
INSERT INTO heos.subjectcreditdetails VALUES (87, 'ME338', 'Computer Aided Manufacturing', 5, 4, 'MECH', 3);
INSERT INTO heos.subjectcreditdetails VALUES (88, 'ME339', 'Design of Jigs, Fixtures and Press Tools', 10, 5, 'MECH', 4);
INSERT INTO heos.subjectcreditdetails VALUES (89, 'ME340', 'Heat and Mass Transfer', 5, 3, 'MECH', 4);
INSERT INTO heos.subjectcreditdetails VALUES (90, 'ME341', 'Hydraulic and Pneumatic Controls', 2, 4, 'MECH', 5);
INSERT INTO heos.subjectcreditdetails VALUES (91, 'ME342', 'Design of Transmission Systems', 4, 23, 'MECH', 5);
INSERT INTO heos.subjectcreditdetails VALUES (92, 'ME343', 'CAM Laboratory', 45, 2, 'MECH', 6);
INSERT INTO heos.subjectcreditdetails VALUES (93, 'ME344', 'Thermal Engineering Laboratory II', 5, 0, 'MECH', 6);
INSERT INTO heos.subjectcreditdetails VALUES (94, 'CE071', 'Principles of Environmental Science and Engineering', 5, 3, 'MECH', 7);
INSERT INTO heos.subjectcreditdetails VALUES (95, 'GE035', 'Power Plant Engineering', 5, 4, 'MECH', 7);
INSERT INTO heos.subjectcreditdetails VALUES (96, 'ME433', 'Mechatronics', 10, 5, 'MECH', 8);
INSERT INTO heos.subjectcreditdetails VALUES (97, 'ME434', 'Microprocessor Lab', 5, 3, 'MECH', 8);
INSERT INTO heos.subjectcreditdetails VALUES (98, 'ENG103', 'Engineering Mechanics', 2, 4, 'ECE', 1);
INSERT INTO heos.subjectcreditdetails VALUES (99, 'ENG104', 'Engineering Graphics', 4, 23, 'ECE', 1);
INSERT INTO heos.subjectcreditdetails VALUES (100, 'ENG106', 'Engineering Physics', 45, 2, 'ECE', 2);
INSERT INTO heos.subjectcreditdetails VALUES (101, 'ENG107', 'Engineering Chemistry', 5, 0, 'ECE', 2);
INSERT INTO heos.subjectcreditdetails VALUES (102, 'ECE302', 'Electrical Circuits and Network Theory', 5, 3, 'ECE', 3);
INSERT INTO heos.subjectcreditdetails VALUES (103, 'ECE305', 'Solid State Devices', 5, 4, 'ECE', 3);
INSERT INTO heos.subjectcreditdetails VALUES (104, 'ECE403', 'Electronic Circuits', 10, 5, 'ECE', 4);
INSERT INTO heos.subjectcreditdetails VALUES (105, 'ECE405', 'Digital Electronics', 5, 3, 'ECE', 4);
INSERT INTO heos.subjectcreditdetails VALUES (106, 'ECE503', 'Linear Integrated Circuits', 2, 4, 'ECE', 5);
INSERT INTO heos.subjectcreditdetails VALUES (107, 'ECE504', 'Electromagnetic Theory', 4, 23, 'ECE', 5);
INSERT INTO heos.subjectcreditdetails VALUES (108, 'ECE603', 'Integrated Circuit Technology', 45, 2, 'ECE', 6);
INSERT INTO heos.subjectcreditdetails VALUES (109, 'ECE604', 'Microwave Engineering', 5, 0, 'ECE', 6);
INSERT INTO heos.subjectcreditdetails VALUES (110, 'ECE702', 'Radiation and Propagation', 5, 3, 'ECE', 7);
INSERT INTO heos.subjectcreditdetails VALUES (111, 'ECE704', 'Electronic Instrumentation', 5, 4, 'ECE', 7);
INSERT INTO heos.subjectcreditdetails VALUES (112, 'ECE802', 'Modern Communication Systems', 10, 5, 'ECE', 8);
INSERT INTO heos.subjectcreditdetails VALUES (113, 'ECE803', 'Radar and Navigation Aids', 5, 3, 'ECE', 8);
INSERT INTO heos.subjectcreditdetails VALUES (114, 'MA533', 'Mathematical Foundations of Computer Science', 2, 4, 'MCA', 1);
INSERT INTO heos.subjectcreditdetails VALUES (115, 'MC503', 'Data Structures', 4, 23, 'MCA', 1);
INSERT INTO heos.subjectcreditdetails VALUES (116, 'MC502', 'Data Communication and Networking', 45, 2, 'MCA', 2);
INSERT INTO heos.subjectcreditdetails VALUES (117, 'MC506', 'Operating System', 5, 0, 'MCA', 2);
INSERT INTO heos.subjectcreditdetails VALUES (118, 'MC601', 'Data Base System Concepts', 5, 3, 'MCA', 3);
INSERT INTO heos.subjectcreditdetails VALUES (119, 'MC605', 'Software Engineering', 5, 4, 'MCA', 3);
INSERT INTO heos.subjectcreditdetails VALUES (120, 'MC602', 'Unix and Network Programming', 10, 5, 'MCA', 4);
INSERT INTO heos.subjectcreditdetails VALUES (121, 'MC608', 'Multimedia Systems', 5, 3, 'MCA', 4);
INSERT INTO heos.subjectcreditdetails VALUES (122, 'MC701', 'Programming in ASP .Net', 2, 4, 'MCA', 5);
INSERT INTO heos.subjectcreditdetails VALUES (123, 'MC703', 'Distributed Date Base Systems', 4, 23, 'MCA', 5);
INSERT INTO heos.subjectcreditdetails VALUES (124, 'MC705', 'Web Technology', 45, 2, 'MCA', 6);
INSERT INTO heos.subjectcreditdetails VALUES (125, 'MC606', 'Advanced Java Programming', 5, 0, 'MCA', 6);
INSERT INTO heos.subjectcreditdetails VALUES (126, 'C107', 'ENGINEERING DRAWING', 2, 4, 'IT', 1);
INSERT INTO heos.subjectcreditdetails VALUES (127, 'C108', 'WORKSHOP PRACTICE', 4, 23, 'IT', 1);
INSERT INTO heos.subjectcreditdetails VALUES (128, 'C206', 'ENGINEERING MECHANICS', 45, 2, 'IT', 2);
INSERT INTO heos.subjectcreditdetails VALUES (129, 'IT033', 'Data structures & Algorithms', 5, 0, 'IT', 2);
INSERT INTO heos.subjectcreditdetails VALUES (130, 'IT034', 'Digital Techniques', 5, 3, 'IT', 3);
INSERT INTO heos.subjectcreditdetails VALUES (131, 'IT031', 'Discrete mathematics', 5, 4, 'IT', 3);
INSERT INTO heos.subjectcreditdetails VALUES (132, 'IT041', 'Numerical Techniques', 10, 5, 'IT', 4);
INSERT INTO heos.subjectcreditdetails VALUES (133, 'IT045', 'Database Management System', 5, 3, 'IT', 4);
INSERT INTO heos.subjectcreditdetails VALUES (134, 'IT051', 'Probability Theory & its application', 2, 4, 'IT', 5);
INSERT INTO heos.subjectcreditdetails VALUES (135, 'IT056', 'Software Engineering', 4, 23, 'IT', 5);
INSERT INTO heos.subjectcreditdetails VALUES (136, 'IT061', 'Data Communication', 45, 2, 'IT', 6);
INSERT INTO heos.subjectcreditdetails VALUES (137, 'IT062', 'Computer Graphics', 5, 0, 'IT', 6);
INSERT INTO heos.subjectcreditdetails VALUES (138, 'IT071', 'Engineering Economics & Management', 2, 4, 'IT', 7);
INSERT INTO heos.subjectcreditdetails VALUES (139, 'IT072', 'Graph Theory & Applications', 4, 23, 'IT', 7);
INSERT INTO heos.subjectcreditdetails VALUES (140, 'IT081', 'High speed Networks', 45, 2, 'IT', 8);
INSERT INTO heos.subjectcreditdetails VALUES (141, 'IT082', 'Distributed Computing', 5, 0, 'IT', 8);
INSERT INTO heos.subjectcreditdetails VALUES (144, 'DSA', 'Gf', 4, 34, 'NAT', 0);
 DROP TABLE  IF  EXISTS  heos.timetablesettings ;
 CREATE TABLE  `timetablesettings`  (
   `SettingsId`  int ( 11 )  NOT  NULL  auto_increment ,
   `TimeTableName`  varchar ( 30 )  default  NULL ,
   `Intake`  varchar ( 50 )  default  NULL ,
   `CourseCode`  varchar ( 20 )  NOT  NULL  default  '' ,
   `FromDate`  date  default  NULL ,
   `ToDate`  date  default  NULL ,
   `FromDay`  varchar ( 30 )  default  NULL ,
   `ToDay`  varchar ( 30 )  default  NULL ,
   `NumberOfSlots`  int ( 3 )  NOT  NULL  default  '0' ,
   `FromTime1`  varchar ( 50 )  default  NULL ,
   `ToTime1`  varchar ( 50 )  default  NULL ,
   `FromTime2`  varchar ( 50 )  default  NULL ,
   `ToTime2`  varchar ( 50 )  default  NULL ,
   `FromTime3`  varchar ( 50 )  default  NULL ,
   `ToTime3`  varchar ( 50 )  default  NULL ,
   `FromTime4`  varchar ( 50 )  default  NULL ,
   `ToTime4`  varchar ( 50 )  default  NULL ,
   `FromTime5`  varchar ( 50 )  default  NULL ,
   `ToTime5`  varchar ( 50 )  default  NULL ,
   `FromTime6`  varchar ( 50 )  default  NULL ,
   `ToTime6`  varchar ( 50 )  default  NULL ,
   `FromTime7`  varchar ( 50 )  default  NULL ,
   `ToTime7`  varchar ( 50 )  default  NULL ,
   `FromTime8`  varchar ( 50 )  default  NULL ,
   `ToTime8`  varchar ( 50 )  default  NULL ,
   `FromTime9`  varchar ( 50 )  default  NULL ,
   `ToTime9`  varchar ( 50 )  default  NULL ,
   `FromTime10`  varchar ( 50 )  default  NULL ,
   `ToTime10`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `SettingsId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.timetablesettings VALUES (90, 'SRINI', 'Aug2008', 'MECH', '2008-08-20 00:00:00', '2009-03-20 00:00:00', 'Monday', 'Saturday', 3, '8:00', '8:45', '9:00', '9:45', '10:00', '10:45', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO heos.timetablesettings VALUES (89, 'SRINI', 'Aug2008', 'EEE', '2008-08-20 00:00:00', '2009-03-20 00:00:00', 'Monday', 'Saturday', 3, '8:00', '8:45', '9:00', '9:45', '10:00', '10:45', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
 DROP TABLE  IF  EXISTS  heos.universitydetails ;
 CREATE TABLE  `universitydetails`  (
   `UniversityId`  int ( 11 )  NOT  NULL  auto_increment ,
   `UniversityCode`  varchar ( 5 )  NOT  NULL  default  '' ,
   `UniversityName`  varchar ( 100 )  default  NULL ,
   `UniversityAddress`  varchar ( 250 )  NOT  NULL  default  '' ,
   `UniversityState`  varchar ( 50 )  default  NULL ,
   `CountryId`  int ( 10 )  NOT  NULL  default  '0' ,
   `UniversityPincode`  varchar ( 50 )  default  NULL ,
   `UniversityPhoneNumber`  varchar ( 50 )  default  NULL ,
   `UniversityFaxNumber`  varchar ( 50 )  default  NULL ,
   `UniversityMailId`  varchar ( 50 )  default  NULL ,
   `UniversityWebsiteName`  varchar ( 50 )  default  NULL ,
   `ContactPersonName`  varchar ( 50 )  default  NULL ,
   `ContactPersonMailId`  varchar ( 50 )  default  NULL ,
   `ContactPersonPhoneNumber`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `UniversityId` ),
   KEY  `UniversityName`  ( `UniversityName` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.universitydetails VALUES (124, 'SSM58', 'MADRAS UNIVERSITY', 'CHENNAI', 'Fg', 23, '7676', '5554', '445', 'ssmQ@yaho.com', 'www.maduniv.com', 'Kk', 'sdas@jdf.vnv', '988989898');
INSERT INTO heos.universitydetails VALUES (125, 'SATHY', 'ST MARY', 'CHENNA', 'TAMILNAD', 23, '60011', '83839', '838839', 'SATHYAB@SATY.COM', 'www.google.co.in', 'Prabaka', 'PRAB@AS.CO', '839390');
INSERT INTO heos.universitydetails VALUES (99, 'ANAU', 'Anna university', 'main street+++', 'TN', 5, '23123123', '2321312', '32222', 'anna@yahoo.com', 'www.anna.com', 'ravi', 'anna@yahoo.com', '2131231');
INSERT INTO heos.universitydetails VALUES (1, 'UKU', 'UK University', 'Sam1+Sam2+Sam3+Sam4', 'TN', 23, '613501', '2321312', '32222', 'uk@yahoo.com', 'www.uk.com', 'Samraj', 'Sam@g.com', '9876543');
INSERT INTO heos.universitydetails VALUES (6, 'SATU', 'Sathyabama University', 'line1+line2+line3+line4', 'TN', 4, '613501', '67890', '999', 'Sat@yah.com', 'www.Sat.com', 'Samraj', 'Sam@g.com', '9876543');
INSERT INTO heos.universitydetails VALUES (96, 'ANLU', 'Annamalai University', 'Sam1+Sam2+Sam3+Sam4', 'TamilNadu', 19, '600012', '67890', '67890', 'Sam@g.com', 'www.sa.com', 'Samraj', 'Sam@g.com', '9876543');
 DROP TABLE  IF  EXISTS  heos.usercreation ;
 CREATE TABLE  `usercreation`  (
   `UserId`  int ( 50 )  NOT  NULL  auto_increment ,
   `UserName`  varchar ( 50 )  default  NULL ,
   ` Password `  varchar ( 50 )  default  NULL ,
   `UserType`  int ( 3 )  NOT  NULL  default  '0' ,
   PRIMARY KEY   ( `UserId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.usercreation VALUES (1, 'sam', 'sam', 1);
INSERT INTO heos.usercreation VALUES (2, 'srini', 'srini', 1);
INSERT INTO heos.usercreation VALUES (4, 'karthi', 'karthi', 1);
INSERT INTO heos.usercreation VALUES (5, 'rkarthi', 'rkarthi', 3);
INSERT INTO heos.usercreation VALUES (6, 'tiwary', 'tiwary', 1);
INSERT INTO heos.usercreation VALUES (7, 'raj', 'raj', 2);
 DROP TABLE  IF  EXISTS  heos.usertypemaster ;
 CREATE TABLE  `usertypemaster`  (
   `UserId`  int ( 50 )  NOT  NULL  auto_increment ,
   `UserType`  varchar ( 50 )  default  NULL ,
   PRIMARY KEY   ( `UserId` )
)  ENGINE = MyISAM DEFAULT  CHARSET = latin1 ;
 INSERT INTO heos.usertypemaster VALUES (1, 'Admin');
INSERT INTO heos.usertypemaster VALUES (2, 'Agent');
INSERT INTO heos.usertypemaster VALUES (3, 'Student');
INSERT INTO heos.usertypemaster VALUES (5, 'Aplicant');
INSERT INTO heos.usertypemaster VALUES (6, 'Staff');
