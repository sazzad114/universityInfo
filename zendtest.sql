-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2010 at 12:35 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zendtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `artist`, `title`) VALUES
(16, 'sazzad', 'sazzad'),
(13, 'sazzad', 'sazzad'),
(15, 'sazzad', 'sazzad'),
(4, 'Andre Rieu', 'Forever Vienna'),
(14, 'sazzad', 'ami'),
(7, 'faisal', 'amar ami'),
(28, 'sazzad', 'sazzad'),
(17, 'sazzad', 'sazzad'),
(24, 'sazzad', 'sazzad'),
(23, 'sazzad', 'sazzad'),
(25, 'sazzad', 'sazzad'),
(26, 'sazzad', 'sazzad'),
(27, 'sazzad', 'sazzad'),
(29, 'sazzad', 'kisu na');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `commenttext` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `news_id`, `commenter_id`, `commenttext`) VALUES
(29, 5, 1, 'this is a good site... :)'),
(32, 7, 2, 'hello'),
(33, 4, 1, 'this is another comment'),
(34, 1, 1, 'Its a good news.. :)'),
(35, 3, 1, 'industrial performance'),
(36, 6, 2, 'hello'),
(37, 7, 2, 'hello'),
(38, 1, 2, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contacttext` text NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `FirstName`, `LastName`, `email`, `contacttext`) VALUES
(34, 'Sazzadur', 'Rahaman', 'sazzad14@yahoo.com', 'You people should do better next time..'),
(35, 'Ahmed', 'Shayer', 'murid_jas@yahoo.com', 'site ta khub akta valo hoy nai...'),
(36, 'Asif', 'Salekin', 'asalekin@yahoo.com', 'abcdefgh');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `departmentname` varchar(200) NOT NULL,
  `shortdes` text NOT NULL,
  `testtype` varchar(200) NOT NULL,
  `testscore` float NOT NULL,
  `cgpa_wanted` float DEFAULT NULL,
  `admissionInfo` text,
  `aluminfo` text,
  `DeadlineTOApply` date DEFAULT NULL,
  `TermStarts` date DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `faculty_id`, `departmentname`, `shortdes`, `testtype`, `testscore`, `cgpa_wanted`, `admissionInfo`, `aluminfo`, `DeadlineTOApply`, `TermStarts`) VALUES
(1, 1, 'Computer Science and Engineering', 'This is one of the largest Department of BUET with over 150 faculty members and two department.This is one of the largest Department of BUET with over 300 faculty members and two department.This is one of the largest faculty of Dhaka university with over 300 faculty members and two department.', 'GRE', 1200, 3.5, 'admission will soon start.', 'alumni association of 2000 will arrange a reunion party soon', '2011-10-10', '2012-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_id` int(11) NOT NULL,
  `faculty_name` varchar(200) NOT NULL,
  `shortdes` text NOT NULL,
  `faculty_state` varchar(200) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `uni_id`, `faculty_name`, `shortdes`, `faculty_state`) VALUES
(1, 1, 'Electrical faculty', 'This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.', 'Dhaka'),
(2, 1, 'civil faculty', 'This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.', 'Dhaka'),
(3, 1, 'Architecture faculty', 'This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.This is one of the largest faculty of Bangladesh university of engineering technology with over 300 faculty members and two department.', 'Dhaka'),
(4, 2, 'Science faculty', 'This is one of the largest faculty of Dhaka universiy with over 300 faculty members and two department.This is one of the largest faculty of Dhaka Universiy with over 300 faculty members and two department.This is one of the largest faculty of Dhaka university with over 300 faculty members and two department.', 'Dhaka'),
(5, 2, 'Arts faculty', 'This is one of the largest faculty of Dhaka universiy with over 300 faculty members and two department.This is one of the largest faculty of Dhaka Universiy with over 300 faculty members and two department.This is one of the largest faculty of Dhaka university with over 300 faculty members and two department.', 'Dhaka'),
(6, 2, 'Comerce faculty', 'This is one of the largest faculty of Dhaka universiy with over 300 faculty members and two department.This is one of the largest faculty of Dhaka Universiy with over 300 faculty members and two department.This is one of the largest faculty of Dhaka university with over 300 faculty members and two department.', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `facultymembers`
--

CREATE TABLE IF NOT EXISTS `facultymembers` (
  `FacultyMemberID` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `uniname` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `age` int(5) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `shortdes` text,
  `Post` varchar(200) NOT NULL,
  `Degree` varchar(200) NOT NULL,
  `StudentUnder` int(11) DEFAULT NULL,
  `Publications` varchar(200) DEFAULT NULL,
  `profRate` float NOT NULL,
  `total_voted` float NOT NULL,
  PRIMARY KEY (`FacultyMemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `facultymembers`
--

INSERT INTO `facultymembers` (`FacultyMemberID`, `department_id`, `uniname`, `Name`, `age`, `country`, `shortdes`, `Post`, `Degree`, `StudentUnder`, `Publications`, `profRate`, `total_voted`) VALUES
(1, 1, 'Bangladesh University of Engineering Technology.', 'Md. Kaykobad', 55, 'Bangladesh', 'Dr. Md kaykobad is one of the most popular teacher in BUET. His field of interest is algorithm, statistics, linear optimization and many other theoretical computer science. He has done some extra ordinary research work in MPTOH.', 'Professor', 'Ph. D', 150, '50', 43.6667, 3),
(2, 1, 'Bangladesh University of Engineering Technology.', 'Md. Saidur Rahaman', 45, 'Bangladesh', 'Dr. Md Saidur Rahaman is one of the most popular teacher in BUET. His field of interest is algorithm, Graph theory and many other theoretical computer science. He has done some extra ordinary research work in my fields of Graph theory.', 'Professor', 'Ph. D', 160, '55', 48, 4),
(3, 1, 'Bangladesh University of Engineering Technology.', 'Md. Sohel Rahaman', 35, 'Bangladesh', 'Dr. Md Sohel Rahaman is one of the most popular teacher in BUET. His field of interest is algorithm, networking, bio-informatics, computer architecture and many other theoretical computer science. He has done some extra ordinary research work in through out his career.', 'Assist. Professor', 'Ph. D', 160, '40', 22.6667, 3);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` blob NOT NULL,
  `name` varchar(200) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `image`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `shortnews` text NOT NULL,
  `detailnews` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `added_by` varchar(200) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `shortnews`, `detailnews`, `publish_time`, `added_by`) VALUES
(1, 'Web site open now', '<p>The official site for cse festival 2010 is now open.</p>\r\n\r\n', '<p>CSE department fo Bangladesh University of Engineering and Technology (BUET) launches the official site for CSE festival 2010. The chief moderator Dr. Sohel Rahman yesterday officially launched the CSE festival 2010 site at BKIAC yesterday.</p>', '2010-10-21 17:15:00', 'andalib'),
(2, 'Bustani seminars focus on Mideast', '<p>The Emile Bustani Middle East Seminar at MIT will celebrate its 25th anniversary with two lectures this fall on contemporary Middle Eastern affairs</p>\r\n', '<p>On Oct. 26, Dr. Augustus Richard Norton, professor of international relations and anthropology at Boston University, will discuss “Lebanon: Consensus in Times of Enmity.”\r\n\r\nOn Nov. 16, Dr. Michaelle Browers, associate professor of political science at Wake Forest University, will present “What Happened to the End of Ideology and the Triumph of Liberalism in the Arab World?”\r\n\r\nIn addition, Dr. Andrew Bacevich, professor of international relations and history at Boston University, will speak on March 1, 2011; and British writer and historian Dr. Malise Ruthven will speak on April 5, 2011.\r\nThe seminar is funded by the Bustani family of Beirut, Lebanon, in memory of the late Emile M. Bustani, who received the SB in civil engineering from MIT in 1933.</p>', '2010-05-24 00:00:00', 'andalib'),
(3, 'Industrial performance', '<p>The Industrial Performance Center (IPC) is an MIT-wide research unit, based in the School of Engineering.</p>\r\n', '<p>The interdisciplinary teams observe, analyze and report on strategic, technological, and organizational developments in a broad range of industries and examine the implications for society and the global economy.</p>', '2010-05-24 00:00:00', 'asif salekin'),
(4, '2010 Roundtable at Stanford', '<p>From family dynamics to the global economy, the graying of the boomer generation will impact every aspect of society.</p>\r\n', '<p>What is next for boomers and the generations that follow in their wake? As the planet’s population surges towards 9 billion in 2050, our sheer numbers will exert tremendous pressure on resources, infrastructures and the ability of leaders to address the issues of the massive shift in demographics. Living longer and better may be the biggest challenge any individual boomer faces, but the global implications of an aging world population are equally daunting. Few issues are as universal and compelling in the world and in one’s own life. Join moderator Tom Brokaw and a distinguished panel of leaders for the fifth Roundtable at Stanford University.</p>', '2009-05-24 00:00:00', 'asif salekin'),
(5, 'Launch of Oxford Centre', '<p>Oxford University is to launch a new centre to study the archaeological and cultural heritage of Asia.</p>\r\n', '<p>On 21 October, the Oxford Centre for Asian Archaeology, Art and Culture, based in the University’s School of Archaeology, will officially open to become the only Asia-specialist centre of archaeological research and teaching in Europe.\r\n\r\nAlthough Asia has some of the world’s richest archaeological and artistic forms of heritage, surprisingly little is known or taught about this period in Britain.\r\n\r\nResearch and teaching will encompass all areas of Asia and cover the Palaeolithic (Old Stone Age) through to the historical period.\r\n\r\nAsia celebrates a huge diversity of cultures but less research has been conducted into how the different cultures are related. The new Centre will look at how the cultural influences, both within the region and in the wider world beyond, might be connected. The research will not only draw on archaeology but also other disciplines, such as anthropology, art history, linguistics, molecular genetics, the earth sciences and geography.\r\n\r\nAs from October 2011 the Centre will offer a new Asia-specific Master’s degree stream and new courses in the Archaeology of Asia, Chinese Archaeology and in the Palaeolithic of Asia.  \r\n\r\nCentre Co-director Professor Chris Gosden said: ‘Asian archaeology and heritage studies are enormously important for understanding how the modern world was shaped, and there is a growing need for world-class expertise in this area. The Oxford Centre for Asian Archaeology, Art and Culture has been developed to support research and training in various areas of Asian archaeology and heritage studies, and to offer opportunities for scholarly discussion, networking and collaboration.’</p>', '2006-05-24 00:00:00', 'rashed'),
(6, '2010 Beckman Symposium', '<p>Diseases of the nervous system are common, costly, and often devastating..</p>\r\n', '<p> For most neurological and psychiatric disorders, few if any treatments are available.  In this symposium we bring together some of the world''s foremost researchers to discuss what causes these diseases, and how they can be better diagnosed and treated.</p>', '2010-05-24 00:00:00', 'sazzad'),
(7, 'university archaeology!!', '<p>The archaeology and history of East Oxford, including Roman settlements, a medieval leper hospital and the growth of the modern town, will be the subject of collaboration between Oxford academics, local schools and community members thanks to the University’s Department for Continuing Education. </p>\r\n', '<p>The wide-ranging project, called East Oxford – One History or Many?  formally launched on 19 October with an event attended by the University’s Vice-Chancellor. The project is to be led by Oxford University''s Department for Continuing Education, and will include partnerships with University museums and the School of Archaeology.\r\n\r\nThe project aims to explore the often overlooked archaeology of East Oxford, and will involve volunteers, schools and members of the community in hands-on investigation of the local landscape.\r\n\r\nProject leader David Griffiths of the Department for Continuing Education said: ‘East Oxford is a surprisingly fascinating and diverse historic landscape, with exciting potential for new investigations in green areas and in built-up places. It’s the story of the community - which I am part of myself - that most interests me, and this is why we want to get local people involved in the project''.\r\n\r\nLocal history societies, community organisations and many individual volunteers are keen to discover more about the heritage of their neighbourhoods. The Blackbird Leys estate, for example, is built in an area where a major pottery industry flourished in Roman times. Archaeologists and historians will run training workshops to enable volunteers of all ages and backgrounds to get involved in researching their own areas, dig test pits and take part in archaeological excavations. Finds will be documented and reports written up, and the discoveries will also used to inspire a range of books, articles, podcasts, programmes and displays as well as art and drama.\r\n\r\nStuart McLeod, Head of the Heritage Lottery Fund for South East England, said: ‘This project seeks to connect local residents with a history of their neighbourhoods that few can have imagined. In so doing, it turns them into landscape detectives, provides skills training and gives them a stake in preserving their heritage</p>', '2010-05-24 00:00:00', 'jahid');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `Dateofbirth` date DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `religion` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `undergradeUni` varchar(200) DEFAULT NULL,
  `undergradeSub` varchar(200) DEFAULT NULL,
  `ugcgpa` float DEFAULT NULL,
  `ugpassyear` int(5) DEFAULT NULL,
  `gradeUni` varchar(200) DEFAULT NULL,
  `gradeSub` varchar(200) DEFAULT NULL,
  `gpassyear` int(5) DEFAULT NULL,
  `test` varchar(200) DEFAULT NULL,
  `testpassdate` date DEFAULT NULL,
  `testscore` float DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `Dateofbirth`, `age`, `religion`, `country`, `state`, `city`, `undergradeUni`, `undergradeSub`, `ugcgpa`, `ugpassyear`, `gradeUni`, `gradeSub`, `gpassyear`, `test`, `testpassdate`, `testscore`) VALUES
(1, '1987-11-14', 23, 'Islam', 'Bangladesh', 'Dhaka', 'Mirpur', 'Bangladesh University of Engineering Technology', 'Computer Science and Engineering', 3.53, 2012, '', '', 2017, 'GRE', '2010-11-14', 1400),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `university_id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_name` varchar(200) NOT NULL,
  `shortdes` text NOT NULL,
  `uni_link` varchar(200) NOT NULL,
  `uni_country` varchar(200) NOT NULL,
  `uni_state` varchar(200) NOT NULL,
  `uni_rank` float NOT NULL,
  `total_voted` int(15) NOT NULL,
  PRIMARY KEY (`university_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `uni_name`, `shortdes`, `uni_link`, `uni_country`, `uni_state`, `uni_rank`, `total_voted`) VALUES
(1, 'Bangladesh University of Engineering Technology.(BUET)', '<p>\r\nBangladesh University of Engineering and Technology, abbreviated as BUET, is one of the most prestigious institutions for higher studies in the country. About 5500 students are pursuing undergraduate and postgraduate studies in engineering, architecture, planning and science in this institution. At present, BUET has sixteen teaching departments under five faculties and it has three institutes. Every year the intake of undergraduate students is around 900, while the intake of graduate students in Masters and PhD programs is around 1000. A total of about five hundred teachers are teaching in these departments and institutes. There are additional teaching posts like Dr. Rashid Professor, Professor Emeritus and Supernumerary Professors.\r\n</p>\r\n \r\n<p>\r\nThe BUET campus is in the heart of Dhaka, the capital city of Bangladesh. It has a compact campus with halls of residence within walking distances of the academic buildings. The physical expansion of the University over the last three decades has been impressive with construction of new academic buildings, auditorium complex, halls of residence, etc </p>', 'http://www.buet.ac.bd', 'Bangladesh', 'Dhaka', 36.655, 2),
(2, 'Dhaka University', '<p>\r\nThe University of Dhaka (commonly referred to as Dhaka University or just DU is the oldest and the largest university in Bangladesh with more than 32,000 students and 1,600 teachers. The University of Dhaka is a public university situated in the heart of Dhaka city, the capital of Bangladesh.\r\n</p>\r\n<p>\r\nThe University of Dhaka demonstrated an inherent strength in its activities during its eventful and often critical existence since it was established in 1921. Today, the university provides trained human resources of Bangladesh engaged in education, science and technology, administration, diplomacy, mass communication, politics, trade and commerce, and industrial enterprises in all sectors.\r\n</p>', 'http://www.univdhaka.edu/', 'Bangladesh', 'Dhaka', 2.3, 1),
(3, 'Stanford University', '<p>\r\nLeland and Jane Stanford founded the University to "promote the public welfare by exercising an influence on behalf of humanity and civilization." Stanford opened its doors in 1891, and more than a century later, it remains dedicated to finding solutions to the great challenges of the day and to preparing our students for leadership in today''s complex world\r\n</p>', 'http://www.stanford.edu/', 'United States', 'between San Francisco and San Jose', 4.8, 1),
(4, 'Oxford University', '<p>The University of Oxford (informally Oxford University, or simply Oxford) is a university located in Oxford, United Kingdom. It is the third oldest surviving university and the oldest university in the English-speaking world.Although the exact date of foundation remains unclear, there is evidence of teaching there as far back as the 11th century. The University grew rapidly from 1167 when Henry II banned English students from attending the University of Paris. In post-nominals the University of Oxford was historically abbreviated as Oxon. (from the Latin Oxoniensis), although Oxf is nowadays used in official University publications</p>\r\n<p>\r\nMost undergraduate teaching at Oxford is organised around weekly essay-based tutorials  at self-governing colleges and halls, supported by lectures and laboratory classes organised by University faculties and departments. League tables consistently list Oxford as one of the UK''s best universities, and Oxford consistently ranks in the world''s top 10\r\n</p>', 'http://www.ox.ac.uk/', 'United Kingdom', 'Oxford', 4.2, 1),
(5, 'North South University', '<p>North South University (NSU), the first private university in Bangladesh, was established by North South University Foundation (NSUF) more than 17 years ago as a non-profit university. The NSUF was created by a group of philanthropists, industrialists, bureaucrats and academics. The founders of NSU have proved that high quality higher education can be provided in the private sector and public private partnership would meet the national demand for higher education much faster and more effectively. The government of Bangladesh approved the establishment of North South University in 1992 under the Private University Act (PUA) 1992. President of the People''s Republic of Bangladesh is the Chancellor of NSU. The university started its classes in January 1993 with 139 students in 3 degree programs, namely, Business Administration, Computer Science and Economics. The university follows American system with all its distinctive features-semesters, credit hours, letter grades, credit transfer, one examiner system and so on. Its curricula, when first introduced, were reviewed by the relevant departments of University of Illinois, Urbana Champaign, and University of California, Berkeley, USA. The university and its programs are duly accredited by the University Grants Commission on behalf of the government of Bangladesh. Currently it has about 9000 students in 26 degree programs, 16 Bachelor''s and 10 Master''s. Among the private universities it stands out and it has established itself as a center of excellence in higher education.\r\n</p>', 'http://www.northsouth.edu/', 'Bangladesh', 'Dhaka', 4.8, 1),
(6, 'Khulna University', '<p>\r\nKhulna University was established at 1991. Ther are 5 schools and 18 disciplines under these schools. The most promising characterstic of this university is that it is free from student politics. No session jam in academic activities. A big number of professors, associate professors and assisstant professors are working as faculty member of various disciplines. Many national and international research projects are on going. Student accomodation facility is very well. There are two halls for male students and one hall for female students. Library and laboratory facility is also of high quality. Students and stuffs are provided with transport facility. Overall student quality of this university is very satisfying. Graduates of this university are working all over the world with a lot of fame.\r\n</p>', 'http://www.ku.ac.bd/', 'Bangladesh', 'Khulna', 37.6, 2),
(7, 'University of Cambridge', '<p>\r\nThe University of Cambridge is rich in history - its famous Colleges and University buildings attract visitors from all over the world. But the University''s museums and collections also hold many treasures which give an exciting insight into some of the scholarly activities, both past and present, of the University''s academics and students.</p><p>\r\nThe University of Cambridge is one of the oldest universities in the world and one of the largest in the United Kingdom. Its reputation for outstanding academic achievement is known world-wide and reflects the intellectual achievement of its students, as well as the world-class original research carried out by the staff of the University and the Colleges. Its reputation is endorsed by the Quality Assurance Agency and by other external reviewers of learning and teaching, such as External Examiners.</p><p>\r\nThese high standards are the result of both the learning opportunities offered at Cambridge and by its extensive resources, including libraries, museums and other collections. Teaching consists not only of lectures, seminars and practical classes led by people who are world experts in their field, but also more personalised teaching arranged through the Colleges. Many opportunities exist for students to interact with scholars of all levels, both formally and informally.\r\n</p><p>\r\nThere are 31 Colleges in Cambridge. Three are for women (New Hall, Newnham and Lucy Cavendish) and two admit only graduates (Clare Hall and Darwin). The remainder house and teach all students enrolled in courses of study or research at the University\r\nEach College is an independent institution with its own property and income. The Colleges appoint their own staff and are responsible for selecting students, in accordance with University regulations. The teaching of students is shared between the Colleges and University departments. Degrees are awarded by the University.\r\nWithin each College, staff and students of all disciplines are brought together. This cross-fertilisation has encouraged the free exchange of ideas which has led to the creation of a number of new companies. Trinity and St John''s have also established science parks, providing facilities for start-ups, and making a significant contribution to the identification of Cambridge as a centre of innovation and technology.\r\nIn addition to the collections on display in the University''s libraries & museums, there is a wealth of sporting and cultural activity at the University of Cambridge, much of it organised by individual clubs and societies run by staff and students. Although the University does not offer courses in the creative arts or sport, there is a strong tradition of achievement in these fields, with many former students going on to gain international standing as artists, performers and athletes. Initiatives ensure that aspiring performers enrich their education with a high level of activity outside the lecture\r\n</p>', 'http://www.cam.ac.uk/', 'United Kingdom', 'Cambridge', 30, 1),
(8, 'Harvard University', '<p>The University of Cambridge is rich in history - its famous Colleges and University buildings attract visitors from all over the world. But the University''s museums and collections also hold many treasures which give an exciting insight into some of the scholarly activities, both past and present, of the University''s academics and students.\r\nThe University of Cambridge is one of the oldest universities in the world and one of the largest in the United Kingdom. Its reputation for outstanding academic achievement is known world-wide and reflects the intellectual achievement of its students, as well as the world-class original research carried out by the staff of the University and the Colleges. Its reputation is endorsed by the Quality Assurance Agency and by other external reviewers of learning and teaching, such as External Examiners.\r\nThese high standards are the result of both the learning opportunities offered at Cambridge and by its extensive resources, including libraries, museums and other collections. Teaching consists not only of lectures, seminars and practical classes led by people who are world experts in their field, but also more personalised teaching arranged through the Colleges. Many opportunities exist for students to interact with scholars of all levels, both formally and informally.\r\n</p><p>\r\nThere are 31 Colleges in Cambridge. Three are for women (New Hall, Newnham and Lucy Cavendish) and two admit only graduates (Clare Hall and Darwin). The remainder house and teach all students enrolled in courses of study or research at the University\r\nEach College is an independent institution with its own property and income. The Colleges appoint their own staff and are responsible for selecting students, in accordance with University regulations. The teaching of students is shared between the Colleges and University departments. Degrees are awarded by the University.\r\nWithin each College, staff and students of all disciplines are brought together. This cross-fertilisation has encouraged the free exchange of ideas which has led to the creation of a number of new companies. Trinity and St John''s have also established science parks, providing facilities for start-ups, and making a significant contribution to the identification of Cambridge as a centre of innovation and technology.\r\nIn addition to the collections on display in the University''s libraries & museums, there is a wealth of sporting and cultural activity at the University of Cambridge, much of it organised by individual clubs and societies run by staff and students. Although the University does not offer courses in the creative arts or sport, there is a strong tradition of achievement in these fields, with many former students going on to gain international standing as artists, performers and athletes. Initiatives ensure that aspiring performers enrich their education with a high level of activity outside the lecture.</p>', 'http://www.harvard.edu/', 'United States', 'Cambridge', 29, 1),
(9, 'Yale University', '<p>Yale University was founded in 1701 as the Collegiate School in the home of Abraham Pierson, its first rector, in Killingworth, Connecticut. In 1716 the school moved to New Haven and, with the generous gift by Elihu Yale of nine bales of goods, 417 books, and a portrait and arms of King George I, was renamed Yale College in 1718.\r\n</p><p>\r\nYale embarked on a steady expansion, establishing the Medical Institution (1810), Divinity School (1822), Law School (1843), Graduate School of Arts and Sciences (1847), the School of Fine Arts (1869), and School of Music (1894). In 1887 Yale College became Yale University. It continued to add to its academic offerings with the School of Forestry & Environmental Studies (1900), School of Nursing (1923), School of Drama (1955), School of Architecture (1972), and School of Management (1974).\r\n</p><p>\r\nAs Yale enters its fourth century, it''s goal is to become a truly global university?educating leaders and advancing the frontiers of knowledge not simply for the United States, but for the entire world. Richard C. Levin, the president of Yale University, says: ?The globalization of the University is in part an evolutionary development. Yale has drawn students from outside the United States for nearly two centuries, and international issues have been represented in its curriculum for the past hundred years and more. But creating the global university is also a revolutionary development?signaling distinct changes in the substance of teaching and research, the demographic characteristics of students, the scope and breadth of external collaborations, and the engagement of the University with new audiences</p>', 'http://www.yale.edu/', 'United States', 'New Haven', 28, 1),
(10, 'Massachusetts Institute of Technology', '<p>The mission of MIT is to advance knowledge and educate students in science, technology, and other areas of scholarship that will best serve the nation and the world in the 21st century.\r\n</p><p>\r\nThe Institute is committed to generating, disseminating, and preserving knowledge, and to working with others to bring this knowledge to bear on the world''s great challenges. MIT is dedicated to providing its students with an education that combines rigorous academic study and the excitement of discovery with the support and intellectual stimulation of a diverse campus community. We seek to develop in each member of the MIT community the ability and passion to work wisely, creatively, and effectively for the betterment of humankind.\r\n</p><p>\r\nThe Institute admitted its first students in 1865, four years after the approval of its founding charter. The opening marked the culmination of an extended effort by William Barton Rogers, a distinguished natural scientist, to establish a new kind of independent educational institution relevant to an increasingly industrialized America. Rogers stressed the pragmatic and practicable. He believed that professional competence is best fostered by coupling teaching and research and by focusing attention on real-world problems. Toward this end, he pioneered the development of the teaching laboratory.\r\n</p><p>\r\nToday MIT is a world-class educational institution. Teaching and research-with relevance to the practical world as a guiding principle-continue to be its primary purpose. MIT is independent, coeducational, and privately endowed. Its five schools and one college encompass 34 academic departments, divisions, and degree-granting programs, as well as numerous interdisciplinary centers, laboratories, and programs whose work cuts across traditional departmental boundaries</p>', 'http://web.mit.edu/', 'United States', 'Massachusetts', 27, 1),
(11, 'University College London', '<p>\r\nDescribed by The Sunday Times as ''an intellectual powerhouse with a world-class reputation'', UCL is consistently ranked as one of the top three multifaculty universities in the UK and features in the top 5 universities worldwide.\r\n</p><p>\r\nUCL is a multidisciplinary university with an international reputation for the quality of its research and teaching across the academic spectrum, with subjects spanning the sciences, arts, social sciences and biomedicine. In the 2008 Research Assessment Exercise (RAE) UCL was rated the best research university in London, and third in the UK overall, for the number of its submissions which were considered of world-leading quality. The RAE confirmed UCL as multidisciplinary research strength with outstanding results achieved across the subjects, ranging from Biomedicine, Science and Engineering, and the Built Environment to Laws, Social Sciences, Arts and Humanities.\r\n</p><p>\r\nTeaching at UCL is ''research-led'', meaning that the programmes we offer reflect the very latest research and are often taught by academic staff members who are world-leaders in their fields. UCL has one of the best staff-student ratios in the UK and places a strong emphasis on small group teaching.\r\n</p><p>\r\nAs well as being dynamic and intellectually challenging, UCL offers a very cosmopolitan and international environment in which to study. Over 30% of our students are from outside the UK, coming from nearly 140 different countries. UCL also attracts academic staff from around the globe, and international staff and students alike are welcomed for the different perspectives and diversity they bring to teaching and learning at UCL.\r\n</p><p>\r\nThe university is located on a compact site in the very heart of London and is surrounded by the greatest concentration of libraries, museums, archives, cultural institutions and professional bodies in Europe. \r\n</p>', 'http://www.ucl.ac.uk/', 'United Kingdom', 'London', 27.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `upload`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `FirstName`, `LastName`, `sex`, `email`, `password`) VALUES
(1, 'sazzadur', 'Rahaman', '0', 'sazzad14@yahoo.com', '123456'),
(2, 'Asif', 'Salekin', '0', 'asalekin@yahoo.com', 'salekin'),
(4, 'Tasmiha', 'Salam', '1', 'shadownight@yahoo.com', '123456'),
(5, 'andalib', 'ahmed', '0', 'andalib@live.com', '123456'),
(6, 'zahid', 'buffon', '0', 'bl@yahoo.com', '123456'),
(7, 'Rashed', 'muhammad', '0', 'rashed.muhammad@yahoomail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `zendlogin`
--

CREATE TABLE IF NOT EXISTS `zendlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `zendlogin`
--

INSERT INTO `zendlogin` (`id`, `email`, `password`) VALUES
(1, 'sazzad@yahoo.com', 'sazzad'),
(2, 'andalib@yahoo.com', 'anda'),
(3, 'anik@yahoo.com', 'anik'),
(4, 'jahid@yahoo.com', 'jahid'),
(5, 'Rashed@yahoo.com', 'rashed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
