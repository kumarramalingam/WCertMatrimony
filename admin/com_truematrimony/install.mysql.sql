--
-- Table structure for table `#__truematrimony_addinfos`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_addinfos` (
  `truematrimony_addinfo_id` int(11) NOT NULL,
  `truematrimony_employedin_id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `truematrimony_height_id` int(11) NOT NULL,
  `truematrimony_highesteducation_id` int(11) NOT NULL,
  `truematrimony_monthlyincome_id` int(11) NOT NULL,
  `truematrimony_occupation_id` int(11) NOT NULL,
  `truematrimony_weight_id` int(11) NOT NULL,
  `truematrimony_bodytype_id` int(11) NOT NULL,
  `complexion` varchar(255) NOT NULL,
  `truematrimony_physicalstate_id` int(11) NOT NULL,
  `monthly_income` decimal(10,0) NOT NULL,
  `truematrimony_complexion_id` int(11) NOT NULL,
  PRIMARY KEY (`truematrimony_addinfo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `#__truematrimony_bodytypes`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_bodytypes` (
  `truematrimony_bodytype_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodytype_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_bodytype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_bodytypes`
--

INSERT INTO `#__truematrimony_bodytypes` (`truematrimony_bodytype_id`, `bodytype_name`) VALUES
(1, 'Slim'),
(2, 'Average'),
(3, 'Athaletic'),
(4, 'Heavy');


--
-- Table structure for table `#__truematrimony_castes`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_castes` (
  `truematrimony_caste_id` int(11) NOT NULL AUTO_INCREMENT,
  `caste_type` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_caste_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_castes`
--

INSERT INTO `#__truematrimony_castes` (`truematrimony_caste_id`, `caste_type`) VALUES
(1, 'Ad Dharmi'),
(2, 'Adi Andhra'),
(3, 'Adi Dravida'),
(4, 'Adi Karnataka'),
(5, 'Agarwal'),
(6, 'Agnikula'),
(7, 'Kshatriya'),
(8, 'Agni'),
(9, 'Ahom'),
(10, 'Ambalarasi'),
(11, 'Arekatica'),
(12, 'Arora'),
(13, 'Arunthathiyan'),
(14, 'Arya Vysya'),
(15, 'Ayyaraka'),
(16, 'Badaga'),
(17, 'Bagdi'),
(18, 'Baidya'),
(19, 'Baishnab'),
(20, 'Baishya'),
(21, 'Bajantri'),
(22, 'Balija'),
(23, 'Banayat Oriya'),
(24, 'Banik'),
(25, 'Baniya'),
(26, 'Baniya Bania'),
(27, 'Baniya Kumuti'),
(28, 'Banjara'),
(29, 'Barai'),
(30, 'Bari'),
(31, 'Baria'),
(32, 'Barujibi'),
(33, 'Besta'),
(34, 'Bhandari'),
(35, 'Bhatia'),
(36, 'Bhatraju'),
(37, 'Bharasar Kshatriya'),
(38, 'Bhoi'),
(39, 'Bhovi'),
(40, 'Bhoyar'),
(41, 'Billava'),
(42, 'Bishnoi / Vishnoi'),
(43, 'Bondili'),
(44, 'Boyar'),
(45, 'Brahmbatt'),
(46, 'Brahmin Anavil'),
(47, 'Brahmin Audichya'),
(48, 'Brahmin Barendra'),
(49, 'Brahmin Bhatt'),
(50, 'Brahmin Bhumihar'),
(51, 'Brahmin Daivadnya'),
(52, 'Brahmin Danua'),
(53, 'Brahmin Deshastha'),
(54, 'Brahmin Dhiman'),
(55, 'Brahmin Dravida'),
(56, 'Brahmin Embrandiri'),
(57, 'Brahmin Garhwali'),
(58, 'Brahmin Gaur'),
(59, 'Brahmin Goswami / Gosavi'),
(60, 'Brahmin Gujar Gaur'),
(61, 'Brahmin Gurukkal'),
(62, 'Brahmin Halua'),
(63, 'Brahmin Haryaka'),
(64, 'Brahmin Hoysala'),
(65, 'Brahmin Iyengar'),
(66, 'Brahmin Iyer'),
(67, 'Brahmin Jangid'),
(68, 'Brahmin Jhadua'),
(69, 'Brahmin Jyotish'),
(70, 'Brahmin Kanyakubj'),
(71, 'Brahmin Karhade'),
(72, 'Brahmin Khandelwal'),
(73, 'Brahmin Kokanastha'),
(74, 'Brahmin Kota'),
(75, 'Brahmin Kulin'),
(76, 'Brahmin Kumaoni'),
(77, 'Brahmin Madhwa'),
(78, 'Brahmin Maithili'),
(79, 'Brahmin Modh'),
(80, 'Brahmin Mohyal'),
(81, 'Brahmin Nagar'),
(82, 'Brahmin Namboodiri'),
(83, 'Brahmin Narmadiya'),
(84, 'Brahmin Niyogi'),
(85, 'Brahmin Other'),
(86, 'Brahmin Paliwal'),
(87, 'Brahmin Panda'),
(88, 'Brahmin Pandit'),
(89, 'Brahmin Paneeu'),
(90, 'Brahmin Pushkarna'),
(91, 'Brahmin Rarhi'),
(92, 'Brahmin Rigredi'),
(93, 'Brahmin Rudraj'),
(94, 'Brahmin Sakaldwipi'),
(95, 'Brahmin Sanadya'),
(96, 'Brahmin Sanketi'),
(97, 'Brahmin Saraswat'),
(98, 'Brahmin Saryuparin'),
(99, 'Brahmin Shivhalli'),
(100, 'Brahmin Shrimali'),
(101, 'Brahmin Sikhwal'),
(103, 'Brahmin Smartha'),
(104, 'Brahmin Sri Vaishnava'),
(105, 'Brahmin Stanika'),
(106, 'Brahmin Tyagi'),
(107, 'Brahmin Vaidiki'),
(108, 'Brahmin Vaikhanasa'),
(109, 'Brahmin Velanadu'),
(110, 'Brahmin Vyas'),
(111, 'Brajastha Maithil'),
(112, 'Bunt (Shetti)'),
(113, 'CKP'),
(114, 'Chalawadi & Holeya'),
(115, 'Chambhar'),
(116, 'Chandravanshi'),
(117, 'Kahar'),
(118, 'Chasa'),
(119, 'Chattada Sri Vaishnava'),
(120, 'Chaudary'),
(121, 'Chargasia'),
(122, 'Chennadasar'),
(123, 'Chettiar'),
(124, 'Chippolu (Mera)'),
(125, 'Loorgi'),
(126, 'Devadiga'),
(127, 'Devandra Kula Vellalar'),
(128, 'Devang Koshthi'),
(129, 'Devanga'),
(130, 'Devar / Thevar / Mukkularthor'),
(131, 'Devrukhe Brahmin'),
(132, 'Dhangar'),
(133, 'Dheevara'),
(134, 'Dhiman'),
(135, 'Dhoba'),
(136, 'Dhobi'),
(137, 'Dhor / Kakkayya'),
(138, 'Dommala'),
(139, 'Dumal'),
(140, 'Dusadh (Paswan)'),
(141, 'Ediga'),
(142, 'Ezhara'),
(143, 'Ezhuthachar'),
(144, 'Gabit'),
(145, 'Ganda'),
(146, 'Ganiga'),
(147, 'Garhwali'),
(148, 'Gatti'),
(149, 'Gavara'),
(150, 'Gawali'),
(151, 'Ghisadi'),
(152, 'Ghumar'),
(153, 'Goala'),
(154, 'Goan'),
(155, 'Gomantak'),
(156, 'Gondhali'),
(157, 'Goud'),
(158, 'Gounder'),
(159, 'Gowda'),
(160, 'Gramani'),
(161, 'Gudia'),
(162, 'Gujjar'),
(163, 'Gupta'),
(164, 'Guptan'),
(165, 'Gurav'),
(166, 'Gurjar'),
(167, 'Halba Kushti'),
(168, 'Helava'),
(169, 'Hugar (Jeer)'),
(170, 'Intercaste');



--
-- Table structure for table `#__truematrimony_complexions`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_complexions` (
  `truematrimony_complexion_id` int(11) NOT NULL,
  `complexion_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_complexion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_complexions`
--

INSERT INTO `#__truematrimony_complexions` (`truematrimony_complexion_id`, `complexion_name`) VALUES
(1, 'Very Fair'),
(2, 'Fair'),
(3, 'Wheatish'),
(4, 'Wheatish Brown'),
(5, 'Dark');



--
-- Table structure for table `#__truematrimony_countries`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_countries` (
  `truematrimony_country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_countries`
--

INSERT INTO `#__truematrimony_countries` (`truematrimony_country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'United Kindom'),
(3, 'Australia'),
(4, 'Singapore'),
(5, 'Canada'),
(6, 'Qatar');



--
-- Table structure for table `#__truematrimony_employedins`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_employedins` (
  `truematrimony_employedin_id` int(11) NOT NULL AUTO_INCREMENT,
  `employedin_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_employedin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_employedins`
--

INSERT INTO `#__truematrimony_employedins` (`truematrimony_employedin_id`, `employedin_name`) VALUES
(1, 'Government'),
(2, 'Private'),
(3, 'Business'),
(4, 'Defense'),
(5, 'Self Employee');


--
-- Table structure for table `#__truematrimony_heights`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_heights` (
  `truematrimony_height_id` int(11) NOT NULL AUTO_INCREMENT,
  `height_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_height_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_heights`
--

INSERT INTO `#__truematrimony_heights` (`truematrimony_height_id`, `height_name`) VALUES
(1, '137cm'),
(2, '138cm'),
(3, '139cm'),
(4, '140cm'),
(5, '141cm'),
(6, '142cm'),
(7, '143cm'),
(8, '144cm'),
(9, '145cm'),
(10, '146cm'),
(11, '147cm'),
(12, '148cm'),
(13, '149cm'),
(14, '150cm'),
(15, '151cm'),
(16, '152cm'),
(17, '153cm'),
(18, '154cm'),
(19, '155cm'),
(20, '156cm'),
(21, '157cm'),
(22, '158cm'),
(23, '159cm'),
(24, '160cm'),
(25, '161cm'),
(26, '162cm'),
(27, '163cm'),
(28, '164cm'),
(29, '165cm'),
(30, '166cm'),
(31, '167cm'),
(32, '168cm'),
(33, '169cm'),
(34, '170cm'),
(35, '171cm'),
(36, '172cm'),
(37, '173cm'),
(38, '174cm'),
(39, '175cm'),
(40, '176cm'),
(41, '177cm'),
(42, '178cm'),
(43, '179cm'),
(44, '180cm'),
(45, '181cm'),
(46, '182cm'),
(47, '183cm'),
(48, '184cm'),
(49, '185cm'),
(50, '186cm'),
(51, '187cm'),
(52, '188cm'),
(53, '189cm'),
(54, '190cm');


--
-- Table structure for table `#__truematrimony_highesteducations`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_highesteducations` (
  `truematrimony_highesteducation_id` int(11) NOT NULL AUTO_INCREMENT,
  `highesteducation_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_highesteducation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_highesteducations`
--

INSERT INTO `#__truematrimony_highesteducations` (`truematrimony_highesteducation_id`, `highesteducation_name`) VALUES
(1, 'Aeronautical Engineering'),
(2, 'B Arch'),
(3, 'BCA'),
(4, 'BE'),
(5, 'B Plan'),
(6, 'BSc IT / Computer Science'),
(7, 'B.Tech'),
(8, 'Other Bachlor Degree in Engineering / Computers'),
(9, 'M Arch'),
(10, 'MCA'),
(11, 'ME'),
(12, 'MSc IT / Computer Science'),
(13, 'M Tech'),
(14, 'PGDCA'),
(15, 'Other Masters Degree in Engineering / Computers'),
(16, 'Ariation Degree'),
(17, 'BA'),
(18, 'BCom'),
(19, 'B ED'),
(20, 'BFA'),
(21, 'BFT'),
(22, 'BLIS'),
(23, 'BMM (MASS MEDIA)'),
(24, 'BSc'),
(25, 'BSW'),
(26, 'B Phil'),
(27, 'Other Bachelor Degree in Arts and Science'),
(28, 'MA'),
(29, 'MCOM'),
(30, 'MED'),
(31, 'MLIS'),
(32, 'MSc'),
(33, 'M PHIL'),
(34, 'Other Master Degree in Arts / Science / Commerce'),
(35, 'BBA'),
(36, 'BFM (Financial Management)'),
(37, 'BHM (Hotel Management)'),
(38, 'Other Bachelor Degree in Management'),
(39, 'MBA'),
(40, 'MFM (Financial Management)'),
(41, 'MHM  (Hotel Management)'),
(42, 'MHRM (Human Resource Management)'),
(43, 'Other Master Degree  in Management'),
(44, 'BAMS'),
(45, 'BDS'),
(46, 'BHMS'),
(47, 'BSMS'),
(48, 'B Pharm'),
(49, 'BPT'),
(50, 'BUMS'),
(51, 'BVSC'),
(52, 'MBBS)'),
(53, 'BSc Nursing'),
(54, 'Other Bachelor Degree in Medicine'),
(55, 'Diploma'),
(56, 'Polytechnic'),
(57, 'Trade School'),
(58, 'Others in Diploma'),
(59, 'MBA'),
(60, 'MFM (Financial Management)'),
(61, 'Higher Secondary School / High School');

--
-- Table structure for table `#__truematrimony_mothertongues`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_mothertongues` (
  `truematrimony_mothertongue_id` int(11) NOT NULL AUTO_INCREMENT,
  `mothertongue_type` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_mothertongue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_mothertongues`
--

INSERT INTO `#__truematrimony_mothertongues` (`truematrimony_mothertongue_id`, `mothertongue_type`) VALUES
(1, 'Angika'),
(2, 'Arunachali'),
(3, 'Assamese'),
(4, 'Awadhi'),
(5, 'Bengali'),
(6, 'Bhojpuri'),
(7, 'Brij'),
(8, 'Bihari'),
(9, 'Badaga'),
(10, 'Chatisgarthi'),
(11, 'Dogri'),
(12, 'English'),
(13, 'French'),
(14, 'Garhwali'),
(15, 'Gano'),
(16, 'Gujarati'),
(17, 'Haryanri'),
(18, 'Himachali / Pahari'),
(19, 'Hindia'),
(20, 'Kanauji'),
(21, 'Kannada'),
(22, 'Kashmiri'),
(23, 'Khandesi'),
(24, 'Khasi'),
(25, 'Konkani'),
(26, 'Koshali'),
(27, 'Kumoani'),
(28, 'Kutchi'),
(29, 'Lepcha'),
(30, 'Ladacki'),
(31, 'Magahi'),
(32, 'Maithili'),
(33, 'Malayalam'),
(34, 'Manipuri'),
(35, 'Marathi'),
(36, 'Marwari'),
(37, 'Miji'),
(38, 'Mizo'),
(39, 'Monpa'),
(40, 'Nicobarese'),
(41, 'Nepali'),
(42, 'Oriya'),
(43, 'Punjabi'),
(44, 'Rajasthani'),
(45, 'Sanskrit'),
(46, 'Santhali'),
(47, 'Sindhi'),
(48, 'Sourashtra'),
(49, 'Tamil'),
(50, 'Telugu'),
(51, 'Tripuri'),
(52, 'Tulu'),
(53, 'Urdu');

--
-- Table structure for table `#__truematrimony_occupations`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_occupations` (
  `truematrimony_occupation_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_occupation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_occupations`
--

INSERT INTO `#__truematrimony_occupations` (`truematrimony_occupation_id`, `occupation_name`) VALUES
(1, 'Manager'),
(2, 'Supervisor Officer'),
(3, 'Administrative Professional'),
(4, 'Exective'),
(5, 'Cleark'),
(6, 'Human Resources Professional'),
(7, 'Agriculture & Farming Professional'),
(8, 'Pilot'),
(9, 'Air Hosters'),
(10, 'Airline Professional'),
(11, 'Architect'),
(12, 'Interior Designer'),
(13, 'Chartered Accountant'),
(14, 'Company Secretary'),
(15, 'Accounts / Finance Professional'),
(16, 'Auditor'),
(17, 'Financial Accountant'),
(18, 'Financial Analyst / Plamins'),
(19, 'Fashion Designer'),
(20, 'Beautician'),
(21, 'Civil Services (IAS/IPS/IRS/IES/IFS)'),
(22, 'Army'),
(23, 'Navy'),
(24, 'Airforce'),
(25, 'Professor / Lecturer'),
(26, 'Teaching / Academician'),
(27, 'Education Professional'),
(28, 'Hotel / Hospitality Professional'),
(29, 'Software Professional'),
(30, 'Hardware Professional'),
(31, 'Engineer - Non IT'),
(32, 'Designer'),
(33, 'Lawyer & Legal Professional'),
(34, 'Law Enforcement Officer'),
(35, 'Doctor'),
(36, 'Health Care Professional'),
(37, 'Paramedical Professional'),
(38, 'Nurse'),
(39, 'Marketing Professional'),
(40, 'Sales Professional'),
(41, 'Consultant'),
(42, 'Customer Care Professional'),
(43, 'Social Worker'),
(44, 'Sportsman'),
(45, 'Technician'),
(46, 'Arts & Craftsman'),
(47, 'Student'),
(48, 'Librarian'),
(49, 'Others'),
(50, 'Not working');

--
-- Table structure for table `#__truematrimony_physicalstates`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_physicalstates` (
  `truematrimony_physicalstate_id` int(11) NOT NULL,
  `physicalstate_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_physicalstate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_physicalstates`
--

INSERT INTO `#__truematrimony_physicalstates` (`truematrimony_physicalstate_id`, `physicalstate_name`) VALUES
(1, 'Normal'),
(2, 'Physically Challenged');


--
-- Table structure for table `#__truematrimony_profilerefers`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_profilerefers` (
  `profilerefer_id` int(11) NOT NULL,
  `profile_reference` varchar(255) NOT NULL,
  PRIMARY KEY (`profilerefer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_profilerefers`
--

INSERT INTO `#__truematrimony_profilerefers` (`profilerefer_id`, `profile_reference`) VALUES
(1, 'Myself'),
(2, 'Son'),
(3, 'Daughter'),
(4, 'Brother'),
(5, 'Sister'),
(6, 'Relative'),
(7, 'Friend');

--
-- Table structure for table `#__truematrimony_profiles`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_profiles` (
  `truematrimony_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `profilerefer_id` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `dob` date NOT NULL,
  `religion_id` int(11) NOT NULL,
  `mothertongue_id` int(11) NOT NULL,
  `caste_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `access` int(11) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `monthly_income` decimal(10,0) NOT NULL,
  `highesteducation_id` int(11) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `employedin_id` int(11) NOT NULL,
  `height_id` int(11) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `bodytype_id` int(11) NOT NULL,
  `complexion_id` int(11) NOT NULL,
  `physicalstate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`truematrimony_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `#__truematrimony_religions`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_religions` (
  `truematrimony_religion_id` int(11) NOT NULL,
  `religion_type` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_religion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `#__truematrimony_religions`
--

INSERT INTO `#__truematrimony_religions` (`truematrimony_religion_id`, `religion_type`) VALUES
(1, 'Hindu'),
(2, 'Muslim - Shia'),
(3, 'Muslim - Sunni'),
(4, 'Muslim - Others'),
(5, 'Christian -  Catholic'),
(6, 'Christian - Orthodox'),
(7, 'Christian - Protestant'),
(8, 'Christian - Others'),
(9, 'Sikh'),
(10, 'Jain -  Digambar'),
(11, 'Jain - Shwetamber'),
(12, 'Jain - Others'),
(13, 'Parsi'),
(14, 'Buddhist'),
(15, 'Inter - religion'),
(16, 'No - religious Belief');


--
-- Table structure for table `#__truematrimony_search`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_search` (
  `truematrimony_search_id` int(11) NOT NULL,
  `search_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `#__truematrimony_weights`
--

CREATE TABLE IF NOT EXISTS `#__truematrimony_weights` (
  `truematrimony_weight_id` int(11) NOT NULL AUTO_INCREMENT,
  `weight_name` varchar(255) NOT NULL,
  PRIMARY KEY (`truematrimony_weight_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrimony_truematrimony_weights`
--

INSERT INTO `#__truematrimony_weights` (`truematrimony_weight_id`, `weight_name`) VALUES
(1, '40kg'),
(2, '41kg'),
(3, '42kg'),
(4, '43kg'),
(5, '44kg'),
(6, '45kg'),
(7, '46kg'),
(8, '47kg'),
(9, '48kg'),
(10, '49kg'),
(11, '50kg'),
(12, '51kg'),
(13, '52kg'),
(14, '53kg'),
(15, '54kg'),
(16, '55kg'),
(17, '56kg'),
(18, '57kg'),
(19, '58kg'),
(20, '59kg'),
(21, '60kg'),
(22, '61kg'),
(23, '62kg'),
(24, '63kg'),
(25, '64kg'),
(26, '65kg'),
(27, '66kg'),
(28, '67kg'),
(29, '68kg'),
(30, '69kg'),
(31, '70kg'),
(32, '71kg'),
(33, '72kg'),
(34, '73kg'),
(35, '74kg'),
(36, '75kg'),
(37, '76kg'),
(38, '77kg'),
(39, '78kg'),
(40, '79kg'),
(41, '80kg'),
(42, '81kg'),
(43, '82kg'),
(44, '83kg'),
(45, '84kg'),
(46, '85kg'),
(47, '86kg'),
(48, '87kg'),
(49, '88kg'),
(50, '89kg'),
(51, '90kg'),
(52, '91kg'),
(53, '92kg'),
(54, '93kg'),
(55, '94kg'),
(56, '95kg'),
(57, '96kg'),
(58, '97kg'),
(59, '98kg'),
(60, '99kg'),
(61, '100kg');



