-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DELIMITER ;;

DROP PROCEDURE IF EXISTS `archive`;;
CREATE PROCEDURE `archive`(IN stat INT)
BEGIN
UPDATE `riskassessment` set status=3 WHERE (`createdDate` + INTERVAL `expiry_date` YEAR) < NOW();
END;;

DELIMITER ;

DROP TABLE IF EXISTS `actionofficer`;
CREATE TABLE `actionofficer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hazardid` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `actionofficer` (`id`, `hazardid`, `name`) VALUES
(476,	476,	''),
(477,	477,	''),
(478,	478,	''),
(479,	479,	''),
(480,	480,	''),
(481,	481,	''),
(482,	482,	''),
(483,	483,	''),
(484,	484,	''),
(485,	485,	'Billy Tan'),
(486,	485,	'Hong Ka Lim'),
(487,	485,	'Lee Hon Joo'),
(488,	486,	'Yu Hong Gu'),
(489,	487,	'Don Yeo'),
(490,	488,	''),
(491,	489,	''),
(492,	490,	''),
(493,	491,	''),
(494,	492,	''),
(495,	493,	'Billy Tan'),
(496,	493,	'Hong Ka Lim'),
(497,	493,	'Lee Hon Joo'),
(498,	494,	'Yu Hong Gu'),
(499,	495,	'Don Yeo'),
(500,	496,	'officer one'),
(501,	497,	'officer one'),
(502,	498,	'officer one'),
(503,	499,	'Billy Tan'),
(504,	499,	'Hong Ka Lim'),
(505,	499,	'Lee Hon Joo'),
(506,	500,	'Yu Hong Gu'),
(507,	501,	'Don Yeo'),
(508,	502,	'sdvdsvs'),
(509,	503,	'sdvdsvs'),
(510,	504,	'officer one'),
(511,	505,	''),
(512,	506,	''),
(513,	507,	''),
(514,	508,	'officer one'),
(515,	509,	'officer one'),
(516,	510,	'officer one'),
(517,	511,	'officer one'),
(518,	512,	''),
(519,	513,	''),
(520,	514,	'officer one'),
(521,	515,	'jangkoo'),
(522,	516,	''),
(523,	517,	''),
(524,	518,	'jangkoo'),
(525,	519,	'jangkoo'),
(526,	520,	'jangkoo'),
(527,	521,	'jangkoo'),
(528,	522,	'jangkoo'),
(529,	523,	'jangkoo'),
(530,	525,	'jangkoo'),
(531,	526,	'jangkoo'),
(532,	527,	'jangkoo'),
(533,	528,	'jangkoo'),
(534,	529,	'jangkoo'),
(535,	530,	'jangkoo'),
(536,	531,	'jangkoo'),
(537,	532,	'jangkoo'),
(538,	533,	'jangkoo'),
(539,	534,	'jangkoo'),
(540,	535,	'jangkoo'),
(541,	536,	'jangkoo'),
(542,	537,	'jangkoo'),
(543,	538,	'jangkoo'),
(544,	539,	'jangkoo'),
(545,	541,	''),
(546,	543,	''),
(547,	444,	''),
(548,	447,	'jangkoo'),
(549,	448,	'awf'),
(550,	449,	'Lee'),
(551,	450,	'jangkoo'),
(552,	451,	'jangkoo'),
(553,	452,	''),
(554,	453,	'adadadad'),
(555,	454,	''),
(556,	455,	''),
(557,	456,	'dada'),
(558,	545,	''),
(559,	458,	'177'),
(560,	458,	'177'),
(561,	458,	'181'),
(562,	546,	'177'),
(563,	548,	'177'),
(564,	549,	'177'),
(565,	550,	'177'),
(566,	551,	'177'),
(567,	552,	'177'),
(568,	553,	'177'),
(569,	554,	'177'),
(570,	555,	'177'),
(571,	556,	'179'),
(572,	557,	'177'),
(573,	558,	'179'),
(574,	559,	'177'),
(575,	560,	'179'),
(576,	561,	'184'),
(577,	562,	'182'),
(578,	563,	'177'),
(579,	564,	'178'),
(580,	565,	'181'),
(581,	566,	'179'),
(582,	567,	'177'),
(583,	568,	'177'),
(584,	569,	'180'),
(585,	570,	'177'),
(586,	571,	'177'),
(587,	572,	'177'),
(588,	573,	'177'),
(589,	574,	'177'),
(590,	575,	'177'),
(591,	576,	'177'),
(592,	577,	'177'),
(593,	578,	'177'),
(594,	579,	'177'),
(595,	580,	'177'),
(596,	581,	'177'),
(597,	582,	'177'),
(598,	582,	'179'),
(599,	583,	'177'),
(600,	585,	'177'),
(601,	585,	'177'),
(602,	586,	'177'),
(603,	587,	''),
(604,	590,	'177'),
(605,	590,	'180'),
(606,	593,	'178'),
(607,	594,	'177'),
(608,	595,	'177'),
(609,	595,	'177'),
(610,	596,	''),
(611,	597,	''),
(612,	598,	''),
(613,	599,	'177'),
(614,	599,	'179'),
(615,	601,	'177'),
(616,	601,	'177'),
(617,	602,	'177'),
(618,	602,	'182'),
(619,	602,	'177'),
(620,	603,	'177'),
(621,	604,	''),
(622,	605,	'177'),
(623,	605,	'180'),
(624,	610,	'177'),
(625,	611,	'177'),
(626,	611,	'177'),
(627,	612,	'177'),
(628,	613,	'177'),
(629,	614,	'177'),
(630,	615,	'177'),
(631,	616,	'177'),
(632,	617,	'177'),
(633,	618,	'177'),
(634,	619,	'177'),
(635,	620,	'177'),
(636,	621,	'177'),
(637,	622,	'177'),
(638,	623,	'177'),
(639,	627,	'177'),
(640,	627,	'177'),
(641,	631,	'177'),
(642,	635,	'179'),
(643,	642,	'177'),
(644,	644,	'177'),
(645,	645,	''),
(646,	646,	''),
(647,	647,	''),
(648,	648,	''),
(649,	649,	'177'),
(650,	650,	'177'),
(651,	651,	'177'),
(652,	652,	'177'),
(653,	653,	'177'),
(654,	654,	'177'),
(655,	655,	'177'),
(656,	656,	'177'),
(657,	657,	'177'),
(658,	658,	'177'),
(659,	659,	'177'),
(660,	660,	'177'),
(661,	661,	'177'),
(662,	662,	'177'),
(663,	663,	'177'),
(664,	664,	'177'),
(665,	665,	'177'),
(666,	666,	'177'),
(667,	667,	'177'),
(668,	668,	'177'),
(669,	669,	'177'),
(670,	670,	'177'),
(671,	685,	'Billy Tan'),
(672,	685,	'Hong Ka Lim'),
(673,	685,	'Lee Hon Joo'),
(674,	686,	'Yu Hong Gu'),
(675,	687,	'Don Yeo');

DROP TABLE IF EXISTS `approvingmanager`;
CREATE TABLE `approvingmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `designation` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `approvingmanager` (`id`, `name`, `email`, `designation`, `image`) VALUES
(7,	'Jangkoo',	'leejangkoo@gmail.com',	'Developer',	'no'),
(8,	'W C YOONG',	'yoong@thigrp.com.sg',	'Senior PM',	'yoong.png'),
(9,	'NIROSHA',	'nirosha@thigrp.com.sg',	'Project Manager',	'nirosha.png');

DROP TABLE IF EXISTS `hazard`;
CREATE TABLE `hazard` (
  `hazard_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `security` varchar(200) NOT NULL,
  `securitysecond` text NOT NULL,
  `accident` varchar(200) NOT NULL,
  `likehood` varchar(200) NOT NULL,
  `likehoodsecond` text NOT NULL,
  `risk_control` text NOT NULL,
  `risk_label` varchar(200) NOT NULL,
  `risk_additional` text NOT NULL,
  `action_officer` varchar(200) NOT NULL,
  `action_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`hazard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hazard_actionofficer`;
CREATE TABLE `hazard_actionofficer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hazardId` int(11) NOT NULL,
  `ramemberId` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `hazard_cause`;
CREATE TABLE `hazard_cause` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hazardId` int(10) NOT NULL,
  `cause` text NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ramember`;
CREATE TABLE `ramember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signature` varchar(100) NOT NULL DEFAULT 'florencio.png',
  `name` text NOT NULL,
  `stauts` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ramember` (`id`, `signature`, `name`, `stauts`, `designation`) VALUES
(177,	'florencio.png',	'FLORENCIO',	0,	'SITE ENGINEER'),
(178,	'ranjan.png',	'RANJAN',	0,	'SITE ENGINEER'),
(179,	'ryaan.png',	'RYAAN',	0,	'SITE ENGINEER'),
(180,	'kumar.png',	'RETHINA KUMAR',	0,	'SITE SUPERVISOR'),
(181,	'doss.png',	'DOSS',	0,	'SITE SUPERVISOR'),
(182,	'ripon.png',	'RIPON',	0,	'SITE SUPERVISOR'),
(183,	'sathish.png',	'SATHISH KUMAR',	0,	'SITE SUPERVISOR'),
(184,	'suresh.png',	'SURESH',	0,	'SITE SUPERVISOR');

DROP TABLE IF EXISTS `riskassessment`;
CREATE TABLE `riskassessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdBy` int(11) NOT NULL,
  `location` longtext NOT NULL,
  `process` longtext NOT NULL,
  `createdDate` datetime NOT NULL,
  `approveDate` datetime DEFAULT NULL,
  `revisionDate` datetime DEFAULT NULL,
  `approveBy` int(11) DEFAULT NULL,
  `approverEmail` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 outstanding 1 for draft 2 approved 3 archive',
  `NotifySignatureAdded` int(11) NOT NULL DEFAULT '0',
  `whenViewed` int(11) NOT NULL DEFAULT '0',
  `whenSignatureAdded` int(11) NOT NULL DEFAULT '0',
  `asTemplate` int(11) NOT NULL,
  `sendAttachment` int(11) NOT NULL DEFAULT '0',
  `signingReminders` int(11) NOT NULL DEFAULT '0',
  `sendReminder` int(11) NOT NULL DEFAULT '0',
  `afterFirstReminder` int(11) NOT NULL DEFAULT '0',
  `ecpireReminder` int(11) NOT NULL DEFAULT '0',
  `project_title` varchar(300) NOT NULL,
  `expiry_date` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `risk_ramemeber`;
CREATE TABLE `risk_ramemeber` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `riskId` int(10) NOT NULL,
  `ramemberId` int(10) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `signing`;
CREATE TABLE `signing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `riskid` int(11) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `email` text NOT NULL,
  `signature` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `signing` (`id`, `riskid`, `name`, `designation`, `email`, `signature`) VALUES
(8,	5,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(14,	8,	'mrphpguru',	'manager',	'mrphpguru@gmail.com',	'sign.png'),
(17,	9,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(24,	10,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(26,	11,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(30,	13,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(31,	12,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(33,	14,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(35,	15,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(37,	16,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(38,	6,	'mrphpguru',	'manager',	'mrphpguru@gmail.com',	'sign.png'),
(39,	17,	'mrphpguru',	'manager',	'',	'sign.png'),
(41,	18,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(42,	19,	'julius',	'manager',	'',	'julius.png'),
(43,	20,	'julius',	'manager',	'',	'julius.png'),
(44,	21,	'julius',	'manager',	'',	'julius.png'),
(45,	22,	'mrphpguru',	'manager',	'',	'sign.png'),
(48,	23,	'mrphpguru',	'manager',	'mrphpguru@gmail.com',	'sign.png'),
(49,	24,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(50,	25,	'Julius Lim',	'manager',	'',	'julius.png'),
(51,	26,	'Julius Lim',	'manager',	'',	'julius.png'),
(52,	27,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(54,	28,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(55,	29,	'Julius Lim',	'manager',	'',	'julius.png'),
(56,	30,	'suraj prakash',	'tester',	'',	'suraj.png'),
(57,	31,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(58,	32,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(59,	1,	'julius',	'manager',	'julius@qe.com.sg',	'julius.png'),
(60,	7,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(62,	33,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(64,	3,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(65,	35,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(66,	36,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(67,	42,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(68,	2,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(69,	43,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(73,	44,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(76,	46,	'julius',	'manager',	'',	'julius.png'),
(79,	48,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(81,	34,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(83,	50,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(87,	47,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(88,	4,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(89,	49,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(90,	45,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(91,	51,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(92,	52,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(95,	53,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(97,	55,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(101,	57,	'suraj prakash',	'tester',	'suraj@awwws.com',	'suraj.png'),
(103,	54,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(104,	60,	'suraj prakash',	'tester',	'',	'suraj.png'),
(107,	61,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(108,	58,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(111,	0,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(112,	63,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(117,	64,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(118,	65,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(119,	67,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(120,	68,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(121,	69,	'Julius Lim',	'manager',	'Julius@qe.com.sg',	'julius.png'),
(122,	73,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(123,	74,	'W C YOONG',	'Senior PM',	'yoong@thigrp.com.sg',	'yoong.png'),
(124,	0,	'Julius Lim',	'manager',	'',	'julius.png'),
(125,	75,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(126,	76,	'W C YOONG',	'Senior PM',	'yoong@thigrp.com.sg',	'yoong.png'),
(127,	0,	'suraj prakash',	'tester',	'',	'suraj.png'),
(132,	56,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(137,	79,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(138,	81,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(144,	77,	'NIROSHA',	'Project Manager',	'nirosha@thigrp.com.sg',	'nirosha.png'),
(145,	0,	'Julius Lim',	'manager',	'',	'julius.png'),
(146,	89,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no'),
(147,	0,	'Jangkoo',	'Developer',	'',	'no'),
(148,	119,	'Jangkoo',	'Developer',	'leejangkoo@gmail.com',	'no');

DROP TABLE IF EXISTS `staff_login`;
CREATE TABLE `staff_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` text NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `signature` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `staff_login` (`id`, `email`, `password`, `name`, `designation`, `age`, `sex`, `signature`) VALUES
(1,	'mrphpguru@gmail.com',	'password123',	'Suraj Prakash',	'project manager',	0,	'',	'signature.jpg'),
(14,	'citrus1982@gmail..com',	'colintan',	'Colin Tan',	'Manager',	0,	'',	'signature.jpg'),
(15,	'colintan@rocketiva.com',	'colintan',	'Michael Ong',	'Manager',	0,	'',	'signature.jpg'),
(16,	'citrus1982@gmail.com',	'Vo*q',	'Colin Tan',	'',	0,	'',	'signature.jpg'),
(17,	'rajesh@awwws.com',	'password',	'Rajesh kumar',	'Developer',	26,	'male',	'signature.jpg'),
(21,	'suraj@awwws.com',	'Mw1I',	'suraj',	'',	0,	'',	'signature.jpg'),
(23,	'Julius@qe.com.sg',	'Qesafety123',	'rajesh',	'',	0,	'',	'Julius.png'),
(24,	'surajprakash1603@gmail.com',	'o!CJ',	'suraj prakash',	'',	0,	'',	'signature.jpg'),
(25,	'julius@qe.com.sg',	'Qesafety123',	'Julius Lim',	'Manager',	0,	'',	'Julius.png'),
(26,	'safety@qe.com.sg',	'Qesafety123',	'James',	'RA Leader',	0,	'',	'james.png'),
(27,	'leejangkoo@gmail.com',	'123456',	'Jangkoo',	'Manager',	69,	'M',	'james.png'),
(28,	'azhar@thigrp.com.sg',	'123456',	'AZHAR',	'RA Leader',	40,	'Male',	'azhar.png'),
(29,	'yoong@thigrp.com.sg',	'123456',	'W C YOONG',	'Senior PM',	50,	'M',	'yoong.png'),
(30,	'nirosha@thigrp.com.sg',	'123456',	'NIROSHA',	'Project Manager',	50,	'M',	'nirosha.png'),
(31,	'faisal@thigrp.com.sg',	'123456',	'FAISAL',	'WSHC',	50,	'M',	'faisal.png');

DROP TABLE IF EXISTS `workactivity`;
CREATE TABLE `workactivity` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `riskId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-09-30 06:12:35
