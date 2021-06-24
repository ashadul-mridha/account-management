

DROP TABLE IF EXISTS `action`;

CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(200) NOT NULL,
  `action_slug` varchar(100) NOT NULL,
  `id_module` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `action_slug` (`action_slug`),
  KEY `id_module` (`id_module`),
  CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `action` */

insert  into `action`(`id`,`action`,`action_slug`,`id_module`,`activation_status`) values 
  (1,'Add new complain','addComplain',1,'active'),
  (2,'Complain list','compList',1,'active'),
  (3,'Complain in progress','progComplain',1,'active'),
  (4,'Solved complains','solvedComplain',1,'active'),
  (6,'Users','users',3,'active'),
  (13,'User role','userRole',3,'active'),
  (14,'Role access','roleAccess',3,'active');

  /*Table structure for table `category` */

  DROP TABLE IF EXISTS `category`;

  CREATE TABLE `category` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `category` varchar(250) DEFAULT NULL,
    `activation_status` enum('Active','Inactive') DEFAULT 'Active',
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

  /*Data for the table `category` */

  insert  into `category`(`id`,`category`,`activation_status`) values 
    (1,'Category A','Active'),
    (2,'777','Active'),
    (3,'AAA Category','Active'),
    (4,'BBB','Active'),
    (5,'D','Active');

    /*Table structure for table `complains` */

    DROP TABLE IF EXISTS `complains`;

    CREATE TABLE `complains` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `district` varchar(100) NOT NULL,
      `complain_name` text,
      `unit_name` varchar(254) DEFAULT NULL,
      `year` int(11) NOT NULL,
      `section_no` varchar(254) NOT NULL,
      `amount` double(15,2) NOT NULL DEFAULT '0.00',
      `details` text NOT NULL,
      `status` enum('Pending','In progress','Solved','Rejected','Canceled') DEFAULT 'In progress',
      `activation_status` enum('deactive','active') DEFAULT 'active',
      `created_by` int(11) NOT NULL,
      `updated_by` int(11) DEFAULT NULL,
      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
      `complain_file` text,
      `assign_to` int(11) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

    /*Data for the table `complains` */

    insert  into `complains`(`id`,`district`,`complain_name`,`unit_name`,`year`,`section_no`,`amount`,`details`,`status`,`activation_status`,`created_by`,`updated_by`,`created_at`,`updated_at`,`complain_file`,`assign_to`) values 
      (1,'Bhola','WWE',NULL,2018,'889',48408.00,'effawaw','In progress','active',1,NULL,'2021-01-29 10:11:55','2021-02-10 07:17:03',NULL,1),
      (2,'Gazipur','ABC',NULL,2018,'889',62408.00,'effawaw','Solved','active',1,NULL,'2021-01-29 10:11:55','2021-02-10 08:11:16',NULL,51),
      (3,'Manikganj','ERT',NULL,2018,'889',55408.00,'effawaw','In progress','active',1,NULL,'2021-01-29 10:11:55','2021-02-10 08:11:21',NULL,51),
      (4,'Dhaka','Asdf',NULL,2021,'789',5000.00,'Nothing','In progress','active',1,NULL,'2021-02-01 22:19:13','2021-02-10 07:17:09',NULL,49),
      (5,'Dhaka','OOP',NULL,2021,'456',20000.00,'wdawd','In progress','active',1,NULL,'2021-02-01 22:20:37','2021-02-10 07:17:12',NULL,49),
      (6,'Feni','Nothing',NULL,2018,'88415',45000.00,'Nothing','In progress','active',1,NULL,'2021-02-01 22:20:59','2021-02-10 07:17:14',NULL,50),
      (7,'Dinajpur','File upload test',NULL,2020,'454',450000.00,'Batpar','In progress','active',1,NULL,'2021-02-09 00:20:42','2021-02-10 07:17:18','1612808442.PNG',50);

      /*Table structure for table `country` */

      DROP TABLE IF EXISTS `country`;

      CREATE TABLE `country` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(80) NOT NULL,
        `iso` char(2) DEFAULT NULL,
        `iso3` char(3) DEFAULT NULL,
        `numcode` smallint(6) DEFAULT NULL,
        `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

      /*Data for the table `country` */

      insert  into `country`(`id`,`name`,`iso`,`iso3`,`numcode`,`activation_status`) values 
        (1,'Afghanistan','AF','AFG',4,'active'),
        (2,'Albania','AL','ALB',8,'active'),
        (3,'Algeria','DZ','DZA',12,'active'),
        (4,'American Samoa','AS','ASM',16,'active'),
        (5,'Andorra','AD','AND',20,'active'),
        (6,'Angola','AO','AGO',24,'active'),
        (7,'Anguilla','AI','AIA',660,'active'),
        (8,'Antarctica','AQ',NULL,NULL,'active'),
        (9,'Antigua and Barbuda','AG','ATG',28,'active'),
        (10,'Argentina','AR','ARG',32,'active'),
        (11,'Armenia','AM','ARM',51,'active'),
        (12,'Aruba','AW','ABW',533,'active'),
        (13,'Australia','AU','AUS',36,'active'),
        (14,'Austria','AT','AUT',40,'active'),
        (15,'Azerbaijan','AZ','AZE',31,'active'),
        (16,'Bahamas','BS','BHS',44,'active'),
        (17,'Bahrain','BH','BHR',48,'active'),
        (18,'Bangladesh','BD','BGD',50,'active'),
        (19,'Barbados','BB','BRB',52,'active'),
        (20,'Belarus','BY','BLR',112,'active'),
        (21,'Belgium','BE','BEL',56,'active'),
        (22,'Belize','BZ','BLZ',84,'active'),
        (23,'Benin','BJ','BEN',204,'active'),
        (24,'Bermuda','BM','BMU',60,'active'),
        (25,'Bhutan','BT','BTN',64,'active'),
        (26,'Bolivia','BO','BOL',68,'active'),
        (27,'Bosnia and Herzegovina','BA','BIH',70,'active'),
        (28,'Botswana','BW','BWA',72,'active'),
        (29,'Bouvet Island','BV',NULL,NULL,'active'),
        (30,'Brazil','BR','BRA',76,'active'),
        (31,'British Indian Ocean Territory','IO',NULL,NULL,'active'),
        (32,'Brunei Darussalam','BN','BRN',96,'active'),
        (33,'Bulgaria','BG','BGR',100,'active'),
        (34,'Burkina Faso','BF','BFA',854,'active'),
        (35,'Burundi','BI','BDI',108,'active'),
        (36,'Cambodia','KH','KHM',116,'active'),
        (37,'Cameroon','CM','CMR',120,'active'),
        (38,'Canada','CA','CAN',124,'active'),
        (39,'Cape Verde','CV','CPV',132,'active'),
        (40,'Cayman Islands','KY','CYM',136,'active'),
        (41,'Central African Republic','CF','CAF',140,'active'),
        (42,'Chad','TD','TCD',148,'active'),
        (43,'Chile','CL','CHL',152,'active'),
        (44,'China','CN','CHN',156,'active'),
        (45,'Christmas Island','CX',NULL,NULL,'active'),
        (46,'Cocos (Keeling) Islands','CC',NULL,NULL,'active'),
        (47,'Colombia','CO','COL',170,'active'),
        (48,'Comoros','KM','COM',174,'active'),
        (49,'Congo','CG','COG',178,'active'),
        (50,'Congo, the Democratic Republic of the','CD','COD',180,'active'),
        (51,'Cook Islands','CK','COK',184,'active'),
        (52,'Costa Rica','CR','CRI',188,'active'),
        (53,'Cote D\'Ivoire','CI','CIV',384,'active'),
        (54,'Croatia','HR','HRV',191,'active'),
        (55,'Cuba','CU','CUB',192,'active'),
        (56,'Cyprus','CY','CYP',196,'active'),
        (57,'Czech Republic','CZ','CZE',203,'active'),
        (58,'Denmark','DK','DNK',208,'active'),
        (59,'Djibouti','DJ','DJI',262,'active'),
        (60,'Dominica','DM','DMA',212,'active'),
        (61,'Dominican Republic','DO','DOM',214,'active'),
        (62,'Ecuador','EC','ECU',218,'active'),
        (63,'Egypt','EG','EGY',818,'active'),
        (64,'El Salvador','SV','SLV',222,'active'),
        (65,'Equatorial Guinea','GQ','GNQ',226,'active'),
        (66,'Eritrea','ER','ERI',232,'active'),
        (67,'Estonia','EE','EST',233,'active'),
        (68,'Ethiopia','ET','ETH',231,'active'),
        (69,'Falkland Islands (Malvinas)','FK','FLK',238,'active'),
        (70,'Faroe Islands','FO','FRO',234,'active'),
        (71,'Fiji','FJ','FJI',242,'active'),
        (72,'Finland','FI','FIN',246,'active'),
        (73,'France','FR','FRA',250,'active'),
        (74,'French Guiana','GF','GUF',254,'active'),
        (75,'French Polynesia','PF','PYF',258,'active'),
        (76,'French Southern Territories','TF',NULL,NULL,'active'),
        (77,'Gabon','GA','GAB',266,'active'),
        (78,'Gambia','GM','GMB',270,'active'),
        (79,'Georgia','GE','GEO',268,'active'),
        (80,'Germany','DE','DEU',276,'active'),
        (81,'Ghana','GH','GHA',288,'active'),
        (82,'Gibraltar','GI','GIB',292,'active'),
        (83,'Greece','GR','GRC',300,'active'),
        (84,'Greenland','GL','GRL',304,'active'),
        (85,'Grenada','GD','GRD',308,'active'),
        (86,'Guadeloupe','GP','GLP',312,'active'),
        (87,'Guam','GU','GUM',316,'active'),
        (88,'Guatemala','GT','GTM',320,'active'),
        (89,'Guinea','GN','GIN',324,'active'),
        (90,'Guinea-Bissau','GW','GNB',624,'active'),
        (91,'Guyana','GY','GUY',328,'active'),
        (92,'Haiti','HT','HTI',332,'active'),
        (93,'Heard Island and Mcdonald Islands','HM',NULL,NULL,'active'),
        (94,'Holy See (Vatican City State)','VA','VAT',336,'active'),
        (95,'Honduras','HN','HND',340,'active'),
        (96,'Hong Kong','HK','HKG',344,'active'),
        (97,'Hungary','HU','HUN',348,'active'),
        (98,'Iceland','IS','ISL',352,'active'),
        (99,'India','IN','IND',356,'active'),
        (100,'Indonesia','ID','IDN',360,'active'),
        (101,'Iran, Islamic Republic of','IR','IRN',364,'active'),
        (102,'Iraq','IQ','IRQ',368,'active'),
        (103,'Ireland','IE','IRL',372,'active'),
        (104,'Israel','IL','ISR',376,'active'),
        (105,'Italy','IT','ITA',380,'active'),
        (106,'Jamaica','JM','JAM',388,'active'),
        (107,'Japan','JP','JPN',392,'active'),
        (108,'Jordan','JO','JOR',400,'active'),
        (109,'Kazakhstan','KZ','KAZ',398,'active'),
        (110,'Kenya','KE','KEN',404,'active'),
        (111,'Kiribati','KI','KIR',296,'active'),
        (112,'Korea, Democratic People\'s Republic of','KP','PRK',408,'active'),
        (113,'Korea, Republic of','KR','KOR',410,'active'),
        (114,'Kuwait','KW','KWT',414,'active'),
        (115,'Kyrgyzstan','KG','KGZ',417,'active'),
        (116,'Lao People\'s Democratic Republic','LA','LAO',418,'active'),
        (117,'Latvia','LV','LVA',428,'active'),
        (118,'Lebanon','LB','LBN',422,'active'),
        (119,'Lesotho','LS','LSO',426,'active'),
        (120,'Liberia','LR','LBR',430,'active'),
        (121,'Libyan Arab Jamahiriya','LY','LBY',434,'active'),
        (122,'Liechtenstein','LI','LIE',438,'active'),
        (123,'Lithuania','LT','LTU',440,'active'),
        (124,'Luxembourg','LU','LUX',442,'active'),
        (125,'Macao','MO','MAC',446,'active'),
        (126,'Macedonia, the Former Yugoslav Republic of','MK','MKD',807,'active'),
        (127,'Madagascar','MG','MDG',450,'active'),
        (128,'Malawi','MW','MWI',454,'active'),
        (129,'Malaysia','MY','MYS',458,'active'),
        (130,'Maldives','MV','MDV',462,'active'),
        (131,'Mali','ML','MLI',466,'active'),
        (132,'Malta','MT','MLT',470,'active'),
        (133,'Marshall Islands','MH','MHL',584,'active'),
        (134,'Martinique','MQ','MTQ',474,'active'),
        (135,'Mauritania','MR','MRT',478,'active'),
        (136,'Mauritius','MU','MUS',480,'active'),
        (137,'Mayotte','YT',NULL,NULL,'active'),
        (138,'Mexico','MX','MEX',484,'active'),
        (139,'Micronesia, Federated States of','FM','FSM',583,'active'),
        (140,'Moldova, Republic of','MD','MDA',498,'active'),
        (141,'Monaco','MC','MCO',492,'active'),
        (142,'Mongolia','MN','MNG',496,'active'),
        (143,'Montserrat','MS','MSR',500,'active'),
        (144,'Morocco','MA','MAR',504,'active'),
        (145,'Mozambique','MZ','MOZ',508,'active'),
        (146,'Myanmar','MM','MMR',104,'active'),
        (147,'Namibia','NA','NAM',516,'active'),
        (148,'Nauru','NR','NRU',520,'active'),
        (149,'Nepal','NP','NPL',524,'active'),
        (150,'Netherlands','NL','NLD',528,'active'),
        (151,'Netherlands Antilles','AN','ANT',530,'active'),
        (152,'New Caledonia','NC','NCL',540,'active'),
        (153,'New Zealand','NZ','NZL',554,'active'),
        (154,'Nicaragua','NI','NIC',558,'active'),
        (155,'Niger','NE','NER',562,'active'),
        (156,'Nigeria','NG','NGA',566,'active'),
        (157,'Niue','NU','NIU',570,'active'),
        (158,'Norfolk Island','NF','NFK',574,'active'),
        (159,'Northern Mariana Islands','MP','MNP',580,'active'),
        (160,'Norway','NO','NOR',578,'active'),
        (161,'Oman','OM','OMN',512,'active'),
        (162,'Pakistan','PK','PAK',586,'active'),
        (163,'Palau','PW','PLW',585,'active'),
        (164,'Palestinian Territory, Occupied','PS',NULL,NULL,'active'),
        (165,'Panama','PA','PAN',591,'active'),
        (166,'Papua New Guinea','PG','PNG',598,'active'),
        (167,'Paraguay','PY','PRY',600,'active'),
        (168,'Peru','PE','PER',604,'active'),
        (169,'Philippines','PH','PHL',608,'active'),
        (170,'Pitcairn','PN','PCN',612,'active'),
        (171,'Poland','PL','POL',616,'active'),
        (172,'Portugal','PT','PRT',620,'active'),
        (173,'Puerto Rico','PR','PRI',630,'active'),
        (174,'Qatar','QA','QAT',634,'active'),
        (175,'Reunion','RE','REU',638,'active'),
        (176,'Romania','RO','ROM',642,'active'),
        (177,'Russian Federation','RU','RUS',643,'active'),
        (178,'Rwanda','RW','RWA',646,'active'),
        (179,'Saint Helena','SH','SHN',654,'active'),
        (180,'Saint Kitts and Nevis','KN','KNA',659,'active'),
        (181,'Saint Lucia','LC','LCA',662,'active'),
        (182,'Saint Pierre and Miquelon','PM','SPM',666,'active'),
        (183,'Saint Vincent and the Grenadines','VC','VCT',670,'active'),
        (184,'Samoa','WS','WSM',882,'active'),
        (185,'San Marino','SM','SMR',674,'active'),
        (186,'Sao Tome and Principe','ST','STP',678,'active'),
        (187,'Saudi Arabia','SA','SAU',682,'active'),
        (188,'Senegal','SN','SEN',686,'active'),
        (189,'Serbia and Montenegro','CS',NULL,NULL,'active'),
        (190,'Seychelles','SC','SYC',690,'active'),
        (191,'Sierra Leone','SL','SLE',694,'active'),
        (192,'Singapore','SG','SGP',702,'active'),
        (193,'Slovakia','SK','SVK',703,'active'),
        (194,'Slovenia','SI','SVN',705,'active'),
        (195,'Solomon Islands','SB','SLB',90,'active'),
        (196,'Somalia','SO','SOM',706,'active'),
        (197,'South Africa','ZA','ZAF',710,'active'),
        (198,'South Georgia and the South Sandwich Islands','GS',NULL,NULL,'active'),
        (199,'Spain','ES','ESP',724,'active'),
        (200,'Sri Lanka','LK','LKA',144,'active'),
        (201,'Sudan','SD','SDN',736,'active'),
        (202,'Suriname','SR','SUR',740,'active'),
        (203,'Svalbard and Jan Mayen','SJ','SJM',744,'active'),
        (204,'Swaziland','SZ','SWZ',748,'active'),
        (205,'Sweden','SE','SWE',752,'active'),
        (206,'Switzerland','CH','CHE',756,'active'),
        (207,'Syrian Arab Republic','SY','SYR',760,'active'),
        (208,'Taiwan, Province of China','TW','TWN',158,'active'),
        (209,'Tajikistan','TJ','TJK',762,'active'),
        (210,'Tanzania, United Republic of','TZ','TZA',834,'active'),
        (211,'Thailand','TH','THA',764,'active'),
        (212,'Timor-Leste','TL',NULL,NULL,'active'),
        (213,'Togo','TG','TGO',768,'active'),
        (214,'Tokelau','TK','TKL',772,'active'),
        (215,'Tonga','TO','TON',776,'active'),
        (216,'Trinidad and Tobago','TT','TTO',780,'active'),
        (217,'Tunisia','TN','TUN',788,'active'),
        (218,'Turkey','TR','TUR',792,'active'),
        (219,'Turkmenistan','TM','TKM',795,'active'),
        (220,'Turks and Caicos Islands','TC','TCA',796,'active'),
        (221,'Tuvalu','TV','TUV',798,'active'),
        (222,'Uganda','UG','UGA',800,'active'),
        (223,'Ukraine','UA','UKR',804,'active'),
        (224,'United Arab Emirates','AE','ARE',784,'active'),
        (225,'United Kingdom','GB','GBR',826,'active'),
        (226,'United States','US','USA',840,'active'),
        (227,'United States Minor Outlying Islands','UM',NULL,NULL,'active'),
        (228,'Uruguay','UY','URY',858,'active'),
        (229,'Uzbekistan','UZ','UZB',860,'active'),
        (230,'Vanuatu','VU','VUT',548,'active'),
        (231,'Venezuela','VE','VEN',862,'active'),
        (232,'Viet Nam','VN','VNM',704,'active'),
        (233,'Virgin Islands, British','VG','VGB',92,'active'),
        (234,'Virgin Islands, U.s.','VI','VIR',850,'active'),
        (235,'Wallis and Futuna','WF','WLF',876,'active'),
        (236,'Western Sahara','EH','ESH',732,'active'),
        (237,'Yemen','YE','YEM',887,'active'),
        (238,'Zambia','ZM','ZMB',894,'active'),
        (239,'Zimbabwe','ZW','ZWE',716,'active');

        /*Table structure for table `district_comments` */

        DROP TABLE IF EXISTS `district_comments`;

        CREATE TABLE `district_comments` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `id_complain` int(11) NOT NULL,
          `chalan_no` varchar(100) NOT NULL,
          `the_date` date NOT NULL,
          `file` varchar(254) DEFAULT NULL,
          `comment` text,
          `created_by` int(11) DEFAULT NULL,
          `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          `amount` double(10,2) DEFAULT '0.00',
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

        /*Data for the table `district_comments` */

        insert  into `district_comments`(`id`,`id_complain`,`chalan_no`,`the_date`,`file`,`comment`,`created_by`,`created_at`,`amount`) values 
          (1,6,'123','2021-02-02','aa.jpg','Some comment',1,'2021-02-02 01:58:49',500.00),
          (2,6,'124','2021-02-02','aa.jpg','Some comment 2',1,'2021-02-02 01:58:52',600.00),
          (3,6,'125','2021-02-02','aa.jpg','Some comment 3',1,'2021-02-02 01:58:55',700.00),
          (4,5,'126','2021-02-02','aa.jpg','Some comment E',1,'2021-02-02 01:58:57',800.00),
          (5,4,'127','2021-02-02','','Some comment D',1,'2021-02-02 07:02:42',900.00),
          (6,3,'128','2021-02-02','aa.jpg','Some comment C',1,'2021-02-02 01:59:04',1000.00),
          (7,2,'129','2021-02-02','aa.jpg','Some comment B',1,'2021-02-02 01:59:07',1100.00),
          (8,1,'130','2021-02-02','aa.jpg','Some comment A',1,'2021-02-02 01:59:11',1200.00),
          (9,4,'7878','2021-01-31','1612230766.png','No comment',1,'2021-02-02 07:52:46',80808.00),
          (10,6,'4545','2021-01-27',NULL,'No file added',1,'2021-02-02 07:54:59',50000.00);

          /*Table structure for table `districts` */

          DROP TABLE IF EXISTS `districts`;

          CREATE TABLE `districts` (
            `id` int(2) NOT NULL AUTO_INCREMENT,
            `division_id` int(1) NOT NULL,
            `name` varchar(25) NOT NULL,
            `bn_name` varchar(25) NOT NULL,
            `lat` varchar(15) DEFAULT NULL,
            `lon` varchar(15) DEFAULT NULL,
            `url` varchar(50) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `division_id` (`division_id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

          /*Data for the table `districts` */

          insert  into `districts`(`id`,`division_id`,`name`,`bn_name`,`lat`,`lon`,`url`) values 
            (1,1,'Comilla','কুমিল্লা','23.4682747','91.1788135','www.comilla.gov.bd'),
            (2,1,'Feni','ফেনী','23.023231','91.3840844','www.feni.gov.bd'),
            (3,1,'Brahmanbaria','ব্রাহ্মণবাড়িয়া','23.9570904','91.1119286','www.brahmanbaria.gov.bd'),
            (4,1,'Rangamati','রাঙ্গামাটি',NULL,NULL,'www.rangamati.gov.bd'),
            (5,1,'Noakhali','নোয়াখালী','22.869563','91.099398','www.noakhali.gov.bd'),
            (6,1,'Chandpur','চাঁদপুর','23.2332585','90.6712912','www.chandpur.gov.bd'),
            (7,1,'Lakshmipur','লক্ষ্মীপুর','22.942477','90.841184','www.lakshmipur.gov.bd'),
            (8,1,'Chattogram','চট্টগ্রাম','22.335109','91.834073','www.chittagong.gov.bd'),
            (9,1,'Coxsbazar','কক্সবাজার',NULL,NULL,'www.coxsbazar.gov.bd'),
            (10,1,'Khagrachhari','খাগড়াছড়ি','23.119285','91.984663','www.khagrachhari.gov.bd'),
            (11,1,'Bandarban','বান্দরবান','22.1953275','92.2183773','www.bandarban.gov.bd'),
            (12,2,'Sirajganj','সিরাজগঞ্জ','24.4533978','89.7006815','www.sirajganj.gov.bd'),
            (13,2,'Pabna','পাবনা','23.998524','89.233645','www.pabna.gov.bd'),
            (14,2,'Bogura','বগুড়া','24.8465228','89.377755','www.bogra.gov.bd'),
            (15,2,'Rajshahi','রাজশাহী',NULL,NULL,'www.rajshahi.gov.bd'),
            (16,2,'Natore','নাটোর','24.420556','89.000282','www.natore.gov.bd'),
            (17,2,'Joypurhat','জয়পুরহাট',NULL,NULL,'www.joypurhat.gov.bd'),
            (18,2,'Chapainawabganj','চাঁপাইনবাবগঞ্জ','24.5965034','88.2775122','www.chapainawabganj.gov.bd'),
            (19,2,'Naogaon','নওগাঁ',NULL,NULL,'www.naogaon.gov.bd'),
            (20,3,'Jashore','যশোর','23.16643','89.2081126','www.jessore.gov.bd'),
            (21,3,'Satkhira','সাতক্ষীরা',NULL,NULL,'www.satkhira.gov.bd'),
            (22,3,'Meherpur','মেহেরপুর','23.762213','88.631821','www.meherpur.gov.bd'),
            (23,3,'Narail','নড়াইল','23.172534','89.512672','www.narail.gov.bd'),
            (24,3,'Chuadanga','চুয়াডাঙ্গা','23.6401961','88.841841','www.chuadanga.gov.bd'),
            (25,3,'Kushtia','কুষ্টিয়া','23.901258','89.120482','www.kushtia.gov.bd'),
            (26,3,'Magura','মাগুরা','23.487337','89.419956','www.magura.gov.bd'),
            (27,3,'Khulna','খুলনা','22.815774','89.568679','www.khulna.gov.bd'),
            (28,3,'Bagerhat','বাগেরহাট','22.651568','89.785938','www.bagerhat.gov.bd'),
            (29,3,'Jhenaidah','ঝিনাইদহ','23.5448176','89.1539213','www.jhenaidah.gov.bd'),
            (30,4,'Jhalakathi','ঝালকাঠি',NULL,NULL,'www.jhalakathi.gov.bd'),
            (31,4,'Patuakhali','পটুয়াখালী','22.3596316','90.3298712','www.patuakhali.gov.bd'),
            (32,4,'Pirojpur','পিরোজপুর',NULL,NULL,'www.pirojpur.gov.bd'),
            (33,4,'Barisal','বরিশাল',NULL,NULL,'www.barisal.gov.bd'),
            (34,4,'Bhola','ভোলা','22.685923','90.648179','www.bhola.gov.bd'),
            (35,4,'Barguna','বরগুনা',NULL,NULL,'www.barguna.gov.bd'),
            (36,5,'Sylhet','সিলেট','24.8897956','91.8697894','www.sylhet.gov.bd'),
            (37,5,'Moulvibazar','মৌলভীবাজার','24.482934','91.777417','www.moulvibazar.gov.bd'),
            (38,5,'Habiganj','হবিগঞ্জ','24.374945','91.41553','www.habiganj.gov.bd'),
            (39,5,'Sunamganj','সুনামগঞ্জ','25.0658042','91.3950115','www.sunamganj.gov.bd'),
            (40,6,'Narsingdi','নরসিংদী','23.932233','90.71541','www.narsingdi.gov.bd'),
            (41,6,'Gazipur','গাজীপুর','24.0022858','90.4264283','www.gazipur.gov.bd'),
            (42,6,'Shariatpur','শরীয়তপুর',NULL,NULL,'www.shariatpur.gov.bd'),
            (43,6,'Narayanganj','নারায়ণগঞ্জ','23.63366','90.496482','www.narayanganj.gov.bd'),
            (44,6,'Tangail','টাঙ্গাইল',NULL,NULL,'www.tangail.gov.bd'),
            (45,6,'Kishoreganj','কিশোরগঞ্জ','24.444937','90.776575','www.kishoreganj.gov.bd'),
            (46,6,'Manikganj','মানিকগঞ্জ',NULL,NULL,'www.manikganj.gov.bd'),
            (47,6,'Dhaka','ঢাকা','23.7115253','90.4111451','www.dhaka.gov.bd'),
            (48,6,'Munshiganj','মুন্সিগঞ্জ',NULL,NULL,'www.munshiganj.gov.bd'),
            (49,6,'Rajbari','রাজবাড়ী','23.7574305','89.6444665','www.rajbari.gov.bd'),
            (50,6,'Madaripur','মাদারীপুর','23.164102','90.1896805','www.madaripur.gov.bd'),
            (51,6,'Gopalganj','গোপালগঞ্জ','23.0050857','89.8266059','www.gopalganj.gov.bd'),
            (52,6,'Faridpur','ফরিদপুর','23.6070822','89.8429406','www.faridpur.gov.bd'),
            (53,7,'Panchagarh','পঞ্চগড়','26.3411','88.5541606','www.panchagarh.gov.bd'),
            (54,7,'Dinajpur','দিনাজপুর','25.6217061','88.6354504','www.dinajpur.gov.bd'),
            (55,7,'Lalmonirhat','লালমনিরহাট',NULL,NULL,'www.lalmonirhat.gov.bd'),
            (56,7,'Nilphamari','নীলফামারী','25.931794','88.856006','www.nilphamari.gov.bd'),
            (57,7,'Gaibandha','গাইবান্ধা','25.328751','89.528088','www.gaibandha.gov.bd'),
            (58,7,'Thakurgaon','ঠাকুরগাঁও','26.0336945','88.4616834','www.thakurgaon.gov.bd'),
            (59,7,'Rangpur','রংপুর','25.7558096','89.244462','www.rangpur.gov.bd'),
            (60,7,'Kurigram','কুড়িগ্রাম','25.805445','89.636174','www.kurigram.gov.bd'),
            (61,8,'Sherpur','শেরপুর','25.0204933','90.0152966','www.sherpur.gov.bd'),
            (62,8,'Mymensingh','ময়মনসিংহ',NULL,NULL,'www.mymensingh.gov.bd'),
            (63,8,'Jamalpur','জামালপুর','24.937533','89.937775','www.jamalpur.gov.bd'),
            (64,8,'Netrokona','নেত্রকোণা','24.870955','90.727887','www.netrokona.gov.bd');

            /*Table structure for table `failed_jobs` */

            DROP TABLE IF EXISTS `failed_jobs`;

            CREATE TABLE `failed_jobs` (
              `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
              `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
              `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
              `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
              `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
              `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

            /*Data for the table `failed_jobs` */

            /*Table structure for table `migrations` */

            DROP TABLE IF EXISTS `migrations`;

            CREATE TABLE `migrations` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `batch` int(11) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

            /*Data for the table `migrations` */

            insert  into `migrations`(`id`,`migration`,`batch`) values 
              (1,'2014_10_12_000000_create_users_table',1),
              (2,'2014_10_12_100000_create_password_resets_table',1),
              (3,'2019_08_19_000000_create_failed_jobs_table',1);

              /*Table structure for table `module` */

              DROP TABLE IF EXISTS `module`;

              CREATE TABLE `module` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `module` varchar(100) NOT NULL,
                `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

              /*Data for the table `module` */

              insert  into `module`(`id`,`module`,`activation_status`) values 
                (1,'Audit files','active'),
                (3,'User','active');

                /*Table structure for table `password_resets` */

                DROP TABLE IF EXISTS `password_resets`;

                CREATE TABLE `password_resets` (
                  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `created_at` timestamp NULL DEFAULT NULL,
                  KEY `password_resets_email_index` (`email`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                /*Data for the table `password_resets` */

                /*Table structure for table `role` */

                DROP TABLE IF EXISTS `role`;

                CREATE TABLE `role` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(250) NOT NULL,
                  `details` text,
                  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

                /*Data for the table `role` */

                insert  into `role`(`id`,`name`,`details`,`activation_status`) values 
                  (1,'Admin','Admin of the system','active'),
                  (2,'Manager','Manages the team','active');

                  /*Table structure for table `role_action` */

                  DROP TABLE IF EXISTS `role_action`;

                  CREATE TABLE `role_action` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `id_role` int(11) NOT NULL,
                    `id_action` int(11) NOT NULL,
                    `access_given_by` int(11) NOT NULL,
                    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
                    PRIMARY KEY (`id`),
                    KEY `id_action` (`id_action`),
                    KEY `id_role` (`id_role`),
                    KEY `access_given_by` (`access_given_by`),
                    CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`),
                    CONSTRAINT `role_action_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`),
                    CONSTRAINT `role_action_ibfk_3` FOREIGN KEY (`access_given_by`) REFERENCES `users` (`id`)
                  ) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

                  /*Data for the table `role_action` */

                  insert  into `role_action`(`id`,`id_role`,`id_action`,`access_given_by`,`created_at`,`updated_at`,`activation_status`) values 
                    (8,1,1,1,'2020-11-29 21:32:49','2020-11-29 21:32:49','active'),
                    (10,1,2,1,'2020-11-29 21:33:51','2020-11-29 21:33:51','active'),
                    (11,1,3,1,'2020-11-29 21:34:02','2020-11-29 21:34:02','active'),
                    (30,1,4,1,'2021-02-01 07:59:54','2021-02-01 07:59:54','active'),
                    (31,2,2,1,'2021-02-10 08:15:04','2021-02-10 08:15:04','active'),
                    (32,2,3,1,'2021-02-10 08:15:12','2021-02-10 08:15:12','active'),
                    (33,2,4,1,'2021-02-10 08:15:58','2021-02-10 08:15:58','active');

                    /*Table structure for table `role_user` */

                    DROP TABLE IF EXISTS `role_user`;

                    CREATE TABLE `role_user` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `id_role` int(11) NOT NULL,
                      `id_user` int(11) NOT NULL,
                      `created_by` int(11) NOT NULL,
                      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
                      PRIMARY KEY (`id`),
                      KEY `id_role` (`id_role`),
                      KEY `id_user` (`id_user`),
                      CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`),
                      CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

                    /*Data for the table `role_user` */

                    insert  into `role_user`(`id`,`id_role`,`id_user`,`created_by`,`created_at`,`updated_at`,`activation_status`) values 
                      (35,1,1,1,'2020-11-30 18:25:45',NULL,'active'),
                      (36,2,58,1,'2021-02-10 08:13:27',NULL,'active'),
                      (37,2,50,1,'2021-02-10 08:13:33',NULL,'active'),
                      (38,2,51,1,'2021-02-10 08:13:37',NULL,'active'),
                      (39,2,52,1,'2021-02-10 08:13:44',NULL,'active'),
                      (40,2,49,1,'2021-02-10 08:13:56',NULL,'active'),
                      (41,2,53,1,'2021-02-10 08:14:01',NULL,'active');

                      /*Table structure for table `sub_category` */

                      DROP TABLE IF EXISTS `sub_category`;

                      CREATE TABLE `sub_category` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `id_cat` int(11) DEFAULT NULL,
                        `subcategory` varchar(250) DEFAULT NULL,
                        `activation_status` enum('Active','Inactive') DEFAULT 'Active',
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

                      /*Data for the table `sub_category` */

                      insert  into `sub_category`(`id`,`id_cat`,`subcategory`,`activation_status`) values 
                        (1,1,'The subcat','Active'),
                        (2,1,'Sub cat 2','Active'),
                        (3,2,'AAA','Active');

                        /*Table structure for table `users` */

                        DROP TABLE IF EXISTS `users`;

                        CREATE TABLE `users` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `email_verified_at` timestamp NULL DEFAULT NULL,
                          `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `remark` text COLLATE utf8mb4_unicode_ci,
                          `created_by` int(11) NOT NULL,
                          `activation_status` enum('active','deactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
                          `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL,
                          `unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `id_district` int(11) NOT NULL,
                          `branch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `id_cat` int(11) DEFAULT NULL,
                          `id_subcat` int(11) DEFAULT NULL,
                          `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          PRIMARY KEY (`id`),
                          UNIQUE KEY `users_email_unique` (`email`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                        /*Data for the table `users` */

                        insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`mobile`,`image`,`remark`,`created_by`,`activation_status`,`remember_token`,`created_at`,`updated_at`,`unit`,`id_district`,`branch`,`id_cat`,`id_subcat`,`designation`) values 
                          (1,'Admin','admin@admin.com',NULL,'e10adc3949ba59abbe56e057f20f883e','01777684007','1612144824.png','',0,'active',NULL,NULL,NULL,'A',1,'X',1,1,'Admin'),
                          (49,'Musabbir','m@m.com',NULL,'e10adc3949ba59abbe56e057f20f883e','01726315133','1612144152.jpg','',1,'active',NULL,NULL,NULL,'B',1,'Y',1,1,'CTO'),
                          (50,'Parag','p@p.com',NULL,'e10adc3949ba59abbe56e057f20f883e','01759259529','1612144179.png','',1,'active',NULL,NULL,NULL,'C',2,'Z',1,1,'DM'),
                          (51,'Sohag','s@s.com',NULL,'e10adc3949ba59abbe56e057f20f883e','01789852989','1612144203.png','',1,'active',NULL,NULL,NULL,'D',3,'XX',2,2,'CEO'),
                          (52,'Rayan','r@r.com',NULL,'e10adc3949ba59abbe56e057f20f883e','017259890',NULL,'',1,'active',NULL,NULL,NULL,'Banani',47,'Banani',1,2,'Manager'),
                          (53,'Kalam','kalam@admin.com',NULL,'e10adc3949ba59abbe56e057f20f883e','017295096','1612814618.png','',1,'active',NULL,NULL,NULL,'1',22,'Somewhere',3,3,'Executive manager'),
                          (56,'ad','ad222min@admin.com',NULL,'e10adc3949ba59abbe56e057f20f883e','014880489','1612814841.jpg','',1,'active',NULL,NULL,NULL,'adawd',7,'wadawd',3,3,'Junior Executive'),
                          (57,'awd','addddmin@admin.com',NULL,'e10adc3949ba59abbe56e057f20f883e','0184180415','1612814991.png','',1,'active',NULL,NULL,NULL,'adwaw',17,'wadawd',3,3,'Senior Executive'),
                          (58,'Mamun','mamun@admin.com',NULL,'e10adc3949ba59abbe56e057f20f883e','01792598',NULL,'',1,'active',NULL,NULL,NULL,'OK',19,'Here',2,3,'Executive');

                          /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
                          /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
                          /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
                          /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
