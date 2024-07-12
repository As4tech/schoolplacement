-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 10:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admt`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptance`
--

CREATE TABLE `acceptance` (
  `id` int(32) NOT NULL,
  `schlname` varchar(50) DEFAULT NULL,
  `accletter` varchar(50) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acceptance`
--

INSERT INTO `acceptance` (`id`, `schlname`, `accletter`, `tdate`) VALUES
(2, 'STEM SENIOR HIGH SCHOOL- KPASENKPE', 'kpastem-acceplet.pdf', '2023-11-19'),
(3, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'lansec_acceptance_rules&regulations.pdf', '2023-11-19'),
(4, 'Yagaba Senior High/Technical School', 'yabsectech_acceptance_letter.pdf', '2023-11-19'),
(5, 'Wulugu Senior High School', 'wulsec_acceptance_letter.pdf', '2023-11-19'),
(6, 'BUNKPURUGU SENIOR HIGH/ TECHNICAL SCHOOL', 'bunkpurugu_acceptance&code_of_conduct.pdf', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE `accesslevel` (
  `id` int(32) NOT NULL,
  `levelname` varchar(32) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL,
  `time` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `levelname`, `tdate`, `time`) VALUES
(1, 'Admin', '2023-08-03', 'time'),
(3, 'Super Admin', '2023-08-03', '21:25');

-- --------------------------------------------------------

--
-- Table structure for table `admisletter`
--

CREATE TABLE `admisletter` (
  `id` int(32) NOT NULL,
  `schoolname` varchar(50) DEFAULT NULL,
  `letter` varchar(3000) DEFAULT NULL,
  `headname` varchar(32) DEFAULT NULL,
  `headsign` varchar(100) DEFAULT NULL,
  `refrence` varchar(100) DEFAULT NULL,
  `letterhead` varchar(100) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admisletter`
--

INSERT INTO `admisletter` (`id`, `schoolname`, `letter`, `headname`, `headsign`, `refrence`, `letterhead`, `tdate`) VALUES
(21, 'STEM SENIOR HIGH SCHOOL- KPASENKPE', '        ADMISSION NUMBER: admnumb/2023 \r\n1.      NAME: #name INDEX NO: #index\r\n        I am pleased to inform you that you have been offered admission into STEM Senior High School-   \r\n        Kpasenkpe for the 2023/2024 Academic year to read #programme\r\n       You have been placed in #house House as a #status Student.\r\n\r\n2.    Attached is the unified code of discipline for Senior High/Technical Schools which you are expected to \r\n       observe throughout your stay in the school. Also attached are a personal record form and the school’s \r\n        prospectus.\r\n\r\n3.    The reporting date is 4th December, 2023. \r\n\r\n4.     On reporting, you will be required to present your completed Personal Record form to the Office of the  \r\n        Assistant Headmaster Administration for filing\r\n        \r\n5.     You will be given further instructions on arrival.\r\n         Congratulations\r\n', 'AMADU MAMUDU TIMBILLA ', 'kpastemhsign.jpeg', 'OFFER OF ADMISSION – 2023/2024 ACADEMIC YEAR', 'wulsecletterheadnew.jpg', '2023-11-19'),
(22, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'NAME: #name   .................................................................. ADMISSION NO: admnumb/2023\r\nPROGRAMME: #programme\r\nHOUSE: #house ................................................................. STATUS: #status\r\nAs a result of your success in the 2023 BECE, you have been offered admission into the first year of this school and details of your admission are stated below\r\ni.	Reporting date for first students admitted into this school for the 2023/2024 academic year is 4th December, 2023.\r\nii.	Find attached to the admission document, the following:\r\na.	The school’s kit list\r\nb.	Personal record form\r\nc.	The unified Code of Discipline for Senior High School/Technical Institutes\r\niii.	Parents should read and understand the unified code of discipline for students in the presence of their wards and sign the acceptance form\r\niv.	On reporting, you will be required to present your completed personal record form to the headmaster’s office.\r\nAccept my congratulations for your success in the BECE and subsequent admission into this school.\r\n\r\n', 'DANIEL A. BUKARI', 'lansechsign.jpeg', 'ADMISSION OF FIRST YEAR STUDENTS\r\nFOR 2023/2024 ACADEMIC YEAR', 'lanseclethead.jpeg', '2023-11-19'),
(23, 'Yagaba Senior High/Technical School', 'NAME:#name\r\nINDEX NUMBER: #index\r\nSTATUS: #status\r\nHOUSE: #house\r\nFollowing your success in the Basic Education Certificate Examination (B.E.C.E), \r\nyou have been offered admission into first year in Yagaba Senior High/Technical School. \r\nThe program you have been offered is AGRICULTURE. \r\nYou are to report on................2023.\r\nYou will provide the basic items on the kit list for your own use on arrival. \r\nAccept my congratulations. \r\nAll the items will be inspected on arrival by the Senior Housemaster/Mistress before you are fully \r\naccepted into the Boarding House. \r\nAll Boarders should produce their Health Insurance Cards to the Senior Housemaster for inspection. \r\nNo Student will be admitted without a Health Insurance Card. \r\nThe acceptance and personal particulars forms should be filled and submitted to the Assistant \r\nHeadmaster for Administration on the day of arrival.\r\n', 'ALHAJI YUSSIF ABDUL-AZIZ', 'yabsectech_headsign.jpg', 'ADMISSION OF STUDENTS FOR 2023 ACADEMIC YEAR', 'yabsectechletterhead.jpg', '2023-11-19'),
(25, 'Wulugu Senior High School', '1. I am pleased to inform you that you have been offered admission into SHS1 in Wulugu \r\nSenior High School for the  2023 academic year to pursue a 3-year Senior High School course\r\n in #programme programme.\r\n     \r\n2. Wulugu Senior High School is a Boarding/Day school.  You are admitted as a #status student.  \r\nYour admission number is: admnumb\r\n\r\n3. You are expected to report by 4:00 pm on ………………………… If you fail to report to \r\nschool a week after the reporting date, your place will be offered to another candidate on the \r\nwaiting list.\r\n\r\n4. Attached to this admission letter are copies of the Code of Conduct for students, prospectus \r\nand student kit.\r\n\r\n5.   Your House of residence is #house\r\n\r\n6. Accept my congratulation on your admission into Wulugu Senior High School.\r\n', 'ZAKARI MOHAMMED ADAMS', 'wulsec_headsign.jpeg', 'OFFER OF ADMISSION INTO \r\nSENIOR HIGH SCHOOL 2023 ACADEMIC YEAR.\r\n', 'wulsecletterhead.jpg', '2023-11-19'),
(26, 'BUNKPURUGU SENIOR HIGH/ TECHNICAL SCHOOL', 'NAME: #name INDEX NO: #index\r\nOF #jhsname JHS\r\nI am pleased to offer you admission into Bunkpurugu Senior High/Technical School to read\r\n#programme Programme in the 2022/2024 Academic Year.\r\nYou are admitted into the school as a #status\r\n\r\nYour House of residence is #house\r\n\r\nREPORTING DATE: \r\nReporting date for First Year Students admitted into this School for the 2022/2023 Academic Year is 04th December, 2023.\r\nREMEMBER THAT YOUR WARD IS ADMITTED FREE WITHOUT THE PAYMENT OF FEES.\r\n\r\nKIT LIST AND PERSONAL PARTICULARS FORM:\r\nFind attached the School’s Kit List and Personal Particulars Form for your ward to fill and return to the school when he/she finally reports to school.\r\nAlso enclosed is the Uniform Code of Discipline for Senior High Schools/Technical Institutes for your ward to observe when he/she reports to school.\r\nNB: THE USE OF MOBILE PHONES BY STUDENTS ON CAMPUS IS PROHIBITED.\r\nAccept my congratulations for your ward’s success in the B.E.C.E and his/her subsequent admission into this school.', 'SOLOMON SANDOW YAKUBU', 'bkpshs.jpg', 'ADMISSION INTO SENIOR HIGH SCHOOL (FREE SHS) – 2023 ACADEMIC YEAR', 'bunkplethead.jpeg', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(32) NOT NULL,
  `region` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `region`, `district`, `tdate`) VALUES
(201, 'Ahafo Region', 'Asunafo South', '2023-10-30'),
(202, 'Ahafo Region', 'Asutifi North', '2023-10-30'),
(203, 'Ahafo Region', 'Asutifi South', '2023-10-30'),
(204, 'Ahafo Region', 'Tano North', '2023-10-30'),
(205, 'Ahafo Region', 'Tano South', '2023-10-30'),
(206, 'Ashanti Region', 'Adansi Asokwa', '2023-10-30'),
(207, 'Ashanti Region', 'Adansi North', '2023-10-30'),
(208, 'Ashanti Region', 'Adansi South', '2023-10-30'),
(209, 'Ashanti Region', 'Afigya-Kwabre North', '2023-10-30'),
(210, 'Ashanti Region', 'Afigya-Kwabre South', '2023-10-30'),
(211, 'Ashanti Region', 'Ahafo-Ano North', '2023-10-30'),
(212, 'Ashanti Region', 'Ahafo-Ano South East', '2023-10-30'),
(213, 'Ashanti Region', 'Ahafo-Ano South West', '2023-10-30'),
(214, 'Ashanti Region', 'Akrofuom', '2023-10-30'),
(215, 'Ashanti Region', 'Amansie Central', '2023-10-30'),
(216, 'Ashanti Region', 'Amansie West', '2023-10-30'),
(217, 'Ashanti Region', 'Amansie South', '2023-10-30'),
(218, 'Ashanti Region', 'Asante-Akim Central', '2023-10-30'),
(219, 'Ashanti Region', 'Asante-Akim North', '2023-10-30'),
(220, 'Ashanti Region', 'Asante-Akim South', '2023-10-30'),
(221, 'Ashanti Region', 'Asokore-Mampong', '2023-10-30'),
(222, 'Ashanti Region', 'Asokwa', '2023-10-30'),
(223, 'Ashanti Region', 'Atwima-Kwanwoma', '2023-10-30'),
(224, 'Ashanti Region', 'Atwima-Mponua', '2023-10-30'),
(225, 'Ashanti Region', 'Atwima-Nwabiagya', '2023-10-30'),
(226, 'Ashanti Region', 'Atwima-Nwabiagya North', '2023-10-30'),
(227, 'Ashanti Region', 'Bekwai', '2023-10-30'),
(228, 'Ashanti Region', 'Bosome Freho', '2023-10-30'),
(229, 'Ashanti Region', 'Bosomtwe', '2023-10-30'),
(230, 'Ashanti Region', 'Ejisu', '2023-10-30'),
(231, 'Ashanti Region', 'Ejura/Sekyedumase', '2023-10-30'),
(232, 'Ashanti Region', 'Juaben', '2023-10-30'),
(233, 'Ashanti Region', 'Kumasi', '2023-10-30'),
(234, 'Ashanti Region', 'Kwabre East', '2023-10-30'),
(235, 'Ashanti Region', 'Kwadaso', '2023-10-30'),
(236, 'Ashanti Region', 'Mampong', '2023-10-30'),
(237, 'Ashanti Region', 'Obuasi East', '2023-10-30'),
(238, 'Ashanti Region', 'Obuasi', '2023-10-30'),
(239, 'Ashanti Region', 'Offinso', '2023-10-30'),
(240, 'Ashanti Region', 'Offinso North', '2023-10-30'),
(241, 'Ashanti Region', 'Oforikrom', '2023-10-30'),
(242, 'Ashanti Region', 'Old Tafo', '2023-10-30'),
(243, 'Ashanti Region', 'Sekyere Afram Plains', '2023-10-30'),
(244, 'Ashanti Region', 'Sekyere Central', '2023-10-30'),
(245, 'Ashanti Region', 'Sekyere East', '2023-10-30'),
(246, 'Ashanti Region', 'Sekyere Kumawu', '2023-10-30'),
(247, 'Ashanti Region', 'Sekyere South', '2023-10-30'),
(248, 'Ashanti Region', 'Suame', '2023-10-30'),
(249, 'Bono Region', 'Banda', '2023-10-30'),
(250, 'Bono Region', 'Berekum East', '2023-10-30'),
(251, 'Bono Region', 'Berekum West', '2023-10-30'),
(252, 'Bono Region', 'Dormaa Central', '2023-10-30'),
(253, 'Bono Region', 'Dormaa East', '2023-10-30'),
(254, 'Bono Region', 'Dormaa West', '2023-10-30'),
(255, 'Bono Region', 'Jaman North', '2023-10-30'),
(256, 'Bono Region', 'Jaman South', '2023-10-30'),
(257, 'Bono Region', 'Sunyani', '2023-10-30'),
(258, 'Bono Region', 'Sunyani West', '2023-10-30'),
(259, 'Bono Region', 'Tain', '2023-10-30'),
(260, 'Bono Region', 'Wenchi', '2023-10-30'),
(261, 'Bono East Region', 'Atebubu-Amantin', '2023-10-30'),
(262, 'Bono East Region', 'Kintampo North', '2023-10-30'),
(263, 'Bono East Region', 'Kintampo South', '2023-10-30'),
(264, 'Bono East Region', 'Nkoranza North', '2023-10-30'),
(265, 'Bono East Region', 'Nkoranza South', '2023-10-30'),
(266, 'Bono East Region', 'Pru East', '2023-10-30'),
(267, 'Bono East Region', 'Pru West', '2023-10-30'),
(268, 'Bono East Region', 'Sene East', '2023-10-30'),
(269, 'Bono East Region', 'Sene West', '2023-10-30'),
(270, 'Bono East Region', 'Techiman', '2023-10-30'),
(271, 'Bono East Region', 'Techiman North', '2023-10-30'),
(272, 'Central Region', 'Abura/Asebu/Kwamankese', '2023-10-30'),
(273, 'Central Region', 'Agona East', '2023-10-30'),
(274, 'Central Region', 'Agona West Municipal', '2023-10-30'),
(275, 'Central Region', 'Ajumako/Enyan/Essiam', '2023-10-30'),
(276, 'Central Region', 'Asikuma Odoben Brakwa', '2023-10-30'),
(277, 'Central Region', 'Assin Central', '2023-10-30'),
(278, 'Central Region', 'Assin North', '2023-10-30'),
(279, 'Central Region', 'Assin South', '2023-10-30'),
(280, 'Central Region', 'Awutu Senya East', '2023-10-30'),
(281, 'Central Region', 'Awutu Senya West', '2023-10-30'),
(282, 'Central Region', 'Cape Coast', '2023-10-30'),
(283, 'Central Region', 'Effutu', '2023-10-30'),
(284, 'Central Region', 'Ekumfi', '2023-10-30'),
(285, 'Central Region', 'Gomoa East', '2023-10-30'),
(286, 'Central Region', 'Gomoa Central', '2023-10-30'),
(287, 'Central Region', 'Gomoa West', '2023-10-30'),
(288, 'Central Region', 'Komenda/Edina/Eguafo/Abirem', '2023-10-30'),
(289, 'Central Region', 'Mfantsiman', '2023-10-30'),
(290, 'Central Region', 'Twifo Atti Morkwa', '2023-10-30'),
(291, 'Central Region', 'Twifo/Hemang/Lower Denkyira', '2023-10-30'),
(292, 'Central Region', 'Upper Denkyira East', '2023-10-30'),
(293, 'Central Region', 'Upper Denkyira West', '2023-10-30'),
(294, 'Eastern Region', 'Abuakwa North', '2023-10-30'),
(295, 'Eastern Region', 'Abuakwa South', '2023-10-30'),
(296, 'Eastern Region', 'Achiase', '2023-10-30'),
(297, 'Eastern Region', 'Akuapim North', '2023-10-30'),
(298, 'Eastern Region', 'Akuapim South', '2023-10-30'),
(299, 'Eastern Region', 'Akyemansa', '2023-10-30'),
(300, 'Eastern Region', 'Asene Manso Akroso', '2023-10-30'),
(301, 'Eastern Region', 'Asuogyaman', '2023-10-30'),
(302, 'Eastern Region', 'Atiwa East', '2023-10-30'),
(303, 'Eastern Region', 'Atiwa West', '2023-10-30'),
(304, 'Eastern Region', 'Ayensuano', '2023-10-30'),
(305, 'Eastern Region', 'Birim Central', '2023-10-30'),
(306, 'Eastern Region', 'Birim North', '2023-10-30'),
(307, 'Eastern Region', 'Birim South', '2023-10-30'),
(308, 'Eastern Region', 'Denkyembour', '2023-10-30'),
(309, 'Eastern Region', 'Fanteakwa North', '2023-10-30'),
(310, 'Eastern Region', 'Fanteakwa South', '2023-10-30'),
(311, 'Eastern Region', 'Kwaebibirem', '2023-10-30'),
(312, 'Eastern Region', 'Kwahu Afram Plains North', '2023-10-30'),
(313, 'Eastern Region', 'Kwahu Afram Plains South', '2023-10-30'),
(314, 'Eastern Region', 'Kwahu East', '2023-10-30'),
(315, 'Eastern Region', 'Kwahu South', '2023-10-30'),
(316, 'Eastern Region', 'Kwahu West', '2023-10-30'),
(317, 'Eastern Region', 'Lower Manya Krobo', '2023-10-30'),
(318, 'Eastern Region', 'New Juaben North', '2023-10-30'),
(319, 'Eastern Region', 'New Juaben South', '2023-10-30'),
(320, 'Eastern Region', 'Nsawam Adoagyire', '2023-10-30'),
(321, 'Eastern Region', 'Okere', '2023-10-30'),
(322, 'Eastern Region', 'Suhum', '2023-10-30'),
(323, 'Eastern Region', 'Upper Manya Krobo', '2023-10-30'),
(324, 'Eastern Region', 'Upper West Akim', '2023-10-30'),
(325, 'Eastern Region', 'West Akim', '2023-10-30'),
(326, 'Eastern Region', 'Yilo-Krobo', '2023-10-30'),
(327, 'Greater Accra Region', 'Ablekuma Central', '2023-10-30'),
(328, 'Greater Accra Region', 'Ablekuma North', '2023-10-30'),
(329, 'Greater Accra Region', 'Ablekuma West', '2023-10-30'),
(330, 'Greater Accra Region', 'Accra', '2023-10-30'),
(331, 'Greater Accra Region', 'Ada East', '2023-10-30'),
(332, 'Greater Accra Region', 'Ada West', '2023-10-30'),
(333, 'Greater Accra Region', 'Adenta', '2023-10-30'),
(334, 'Greater Accra Region', 'Ashaiman', '2023-10-30'),
(335, 'Greater Accra Region', 'Ayawaso Central', '2023-10-30'),
(336, 'Greater Accra Region', 'Ayawaso East', '2023-10-30'),
(337, 'Greater Accra Region', 'Ayawaso North', '2023-10-30'),
(338, 'Greater Accra Region', 'Ayawaso West', '2023-10-30'),
(339, 'Greater Accra Region', 'Ga Central', '2023-10-30'),
(340, 'Greater Accra Region', 'Ga East', '2023-10-30'),
(341, 'Greater Accra Region', 'Ga North', '2023-10-30'),
(342, 'Greater Accra Region', 'Ga South', '2023-10-30'),
(343, 'Greater Accra Region', 'Ga West', '2023-10-30'),
(344, 'Greater Accra Region', 'Korle-Klottey', '2023-10-30'),
(345, 'Greater Accra Region', 'Kpone-Katamanso', '2023-10-30'),
(346, 'Greater Accra Region', 'Krowor', '2023-10-30'),
(347, 'Greater Accra Region', 'La-Dade-Kotopon', '2023-10-30'),
(348, 'Greater Accra Region', 'La-Nkwantanang-Madina', '2023-10-30'),
(349, 'Greater Accra Region', 'Ledzokuku', '2023-10-30'),
(350, 'Greater Accra Region', 'Ningo-Prampram', '2023-10-30'),
(351, 'Greater Accra Region', 'Okaikwei North', '2023-10-30'),
(352, 'Greater Accra Region', 'Shai-Osudoku', '2023-10-30'),
(353, 'Greater Accra Region', 'Tema Metropolitan', '2023-10-30'),
(354, 'Greater Accra Region', 'Tema West', '2023-10-30'),
(355, 'Greater Accra Region', 'Weija Gbawe', '2023-10-30'),
(356, 'Northern Region', 'Gushegu Municipal', '2023-10-30'),
(357, 'Northern Region', 'Karaga', '2023-10-30'),
(358, 'Northern Region', 'Kpandai', '2023-10-30'),
(359, 'Northern Region', 'Kumbungu', '2023-10-30'),
(360, 'Northern Region', 'Mion', '2023-10-30'),
(361, 'Northern Region', 'Nanton', '2023-10-30'),
(362, 'Northern Region', 'Nanumba North Municipal', '2023-10-30'),
(363, 'Northern Region', 'Nanumba South', '2023-10-30'),
(364, 'Northern Region', 'Saboba', '2023-10-30'),
(365, 'Northern Region', 'Sagnarigu Municipal', '2023-10-30'),
(366, 'Northern Region', 'Savelugu Municipal', '2023-10-30'),
(367, 'Northern Region', 'Tamale Metropolitan', '2023-10-30'),
(368, 'Northern Region', 'Tatale Sanguli', '2023-10-30'),
(369, 'Northern Region', 'Tolon', '2023-10-30'),
(370, 'Northern Region', 'Yendi Municipal', '2023-10-30'),
(371, 'Northern Region', 'Zabzugu', '2023-10-30'),
(372, 'North East Region', 'Bunkpurugu Nyankpanduri', '2023-10-30'),
(373, 'North East Region', 'Chereponi', '2023-10-30'),
(374, 'North East Region', 'East Mamprusi', '2023-10-30'),
(375, 'North East Region', 'Mamprugu Moagduri', '2023-10-30'),
(376, 'North East Region', 'West Mamprusi', '2023-10-30'),
(377, 'North East Region', 'Yunyoo-Nasuan', '2023-10-30'),
(378, 'Oti Region', 'Biakoye', '2023-10-30'),
(379, 'Oti Region', 'Jasikan', '2023-10-30'),
(380, 'Oti Region', 'Kadjebi', '2023-10-30'),
(381, 'Oti Region', 'Krachi East', '2023-10-30'),
(382, 'Oti Region', 'Krachi Nchumuru', '2023-10-30'),
(383, 'Oti Region', 'Krachi West', '2023-10-30'),
(384, 'Oti Region', 'Nkwanta North', '2023-10-30'),
(385, 'Oti Region', 'Nkwanta South', '2023-10-30'),
(386, 'Savannah Region', 'Bole', '2023-10-30'),
(387, 'Savannah Region', 'Central Gonja', '2023-10-30'),
(388, 'Savannah Region', 'East Gonja Municipal', '2023-10-30'),
(389, 'Savannah Region', 'North Gonja', '2023-10-30'),
(390, 'Savannah Region', 'North East Gonja', '2023-10-30'),
(391, 'Savannah Region', 'Sawla-Tuna-Kalba', '2023-10-30'),
(392, 'Savannah Region', 'West Gonja', '2023-10-30'),
(393, 'Upper East Region', 'Bawku Municipal', '2023-10-30'),
(394, 'Upper East Region', 'Bawku West', '2023-10-30'),
(395, 'Upper East Region', 'Binduri', '2023-10-30'),
(396, 'Upper East Region', 'Bolgatanga East', '2023-10-30'),
(397, 'Upper East Region', 'Bolgatanga Municipal', '2023-10-30'),
(398, 'Upper East Region', 'Bongo', '2023-10-30'),
(399, 'Upper East Region', 'Builsa North Municipal', '2023-10-30'),
(400, 'Upper East Region', 'Builsa South', '2023-10-30'),
(401, 'Upper East Region', 'Garu', '2023-10-30'),
(402, 'Upper East Region', 'Kassena-Nankana Municipal', '2023-10-30'),
(403, 'Upper East Region', 'Kassena-Nankana West', '2023-10-30'),
(404, 'Upper East Region', 'Nabdam', '2023-10-30'),
(405, 'Upper East Region', 'Pusiga', '2023-10-30'),
(406, 'Upper East Region', 'Talensi', '2023-10-30'),
(407, 'Upper East Region', 'Tempane', '2023-10-30'),
(408, 'Upper West Region', 'Daffiama Bussie Issa', '2023-10-30'),
(409, 'Upper West Region', 'Jirapa Municipal', '2023-10-30'),
(410, 'Upper West Region', 'Lambussie Karni', '2023-10-30'),
(411, 'Upper West Region', 'Lawra Municipal', '2023-10-30'),
(412, 'Upper West Region', 'Nadowli-Kaleo', '2023-10-30'),
(413, 'Upper West Region', 'Nandom Municipal', '2023-10-30'),
(414, 'Upper West Region', 'Sissala East Municipal', '2023-10-30'),
(415, 'Upper West Region', 'Sissala West', '2023-10-30'),
(416, 'Upper West Region', 'Wa East', '2023-10-30'),
(417, 'Upper West Region', 'Wa Municipal', '2023-10-30'),
(418, 'Upper West Region', 'Wa West', '2023-10-30'),
(419, 'Volta Region', 'Adaklu District', '2023-10-30'),
(420, 'Volta Region', 'Afadzato South', '2023-10-30'),
(421, 'Volta Region', 'Agotime Ziope', '2023-10-30'),
(422, 'Volta Region', 'Akatsi North', '2023-10-30'),
(423, 'Volta Region', 'Akatsi South', '2023-10-30'),
(424, 'Volta Region', 'Anloga', '2023-10-30'),
(425, 'Volta Region', 'Central Tongu', '2023-10-30'),
(426, 'Volta Region', 'Guan', '2023-10-30'),
(427, 'Volta Region', 'Ho Municipal', '2023-10-30'),
(428, 'Volta Region', 'Ho West', '2023-10-30'),
(429, 'Volta Region', 'Hohoe Municipal', '2023-10-30'),
(430, 'Volta Region', 'Keta Municipal', '2023-10-30'),
(431, 'Volta Region', 'Ketu North Municipal', '2023-10-30'),
(432, 'Volta Region', 'Ketu South Municipal', '2023-10-30'),
(433, 'Volta Region', 'Kpando Municipal', '2023-10-30'),
(434, 'Volta Region', 'North Dayi', '2023-10-30'),
(435, 'Volta Region', 'North Tongu', '2023-10-30'),
(436, 'Volta Region', 'South Dayi', '2023-10-30'),
(437, 'Volta Region', 'South Tongu', '2023-10-30'),
(438, 'Western Region', 'Ahanta West', '2023-10-30'),
(439, 'Western Region', 'Amenfi Central', '2023-10-30'),
(440, 'Western Region', 'Amenfi West', '2023-10-30'),
(441, 'Western Region', 'Effia Kwesimintsim Municipal', '2023-10-30'),
(442, 'Western Region', 'Ellembelle', '2023-10-30'),
(443, 'Western Region', 'Jomoro', '2023-10-30'),
(444, 'Western Region', 'Mpohor', '2023-10-30'),
(445, 'Western Region', 'Nzema East Municipal', '2023-10-30'),
(446, 'Western Region', 'Prestea-Huni Valley Municipal', '2023-10-30'),
(447, 'Western Region', 'Sekondi Takoradi Metropolitan', '2023-10-30'),
(448, 'Western Region', 'Shama', '2023-10-30'),
(449, 'Western Region', 'Tarkwa-Nsuaem Municipal', '2023-10-30'),
(450, 'Western Region', 'Wassa Amenfi East', '2023-10-30'),
(451, 'Western Region', 'Wassa East', '2023-10-30'),
(452, 'Western North Region', 'Aowin', '2023-10-30'),
(453, 'Western North Region', 'Bia East', '2023-10-30'),
(454, 'Western North Region', 'Bia West', '2023-10-30'),
(455, 'Western North Region', 'Bibiani Anhwiaso Bekwai', '2023-10-30'),
(456, 'Western North Region', 'Bodi', '2023-10-30'),
(457, 'Western North Region', 'Juaboso', '2023-10-30'),
(458, 'Western North Region', 'Sefwi Akontombra', '2023-10-30'),
(459, 'Western North Region', 'Sefwi-Wiawso', '2023-10-30'),
(460, 'Western North Region', 'Suaman', '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(32) NOT NULL,
  `schlname` varchar(100) DEFAULT NULL,
  `hsename` varchar(50) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `schlname`, `hsename`, `tdate`) VALUES
(5, 'Wulugu Senior High School', 'Nkrumah', '2023-11-10'),
(6, 'Yagaba Senior High/Technical School', 'Illiasu', '2023-11-10'),
(7, 'Wulugu Senior High School', 'Zaami', '2023-11-12'),
(8, 'Wulugu Senior High School', 'Nachinaa', '2023-11-12'),
(9, 'KPASENKPE STERM SENIOR HIGH SCHOOL', 'PROF NABILA', '2023-11-14'),
(10, 'KPASENKPE STERM SENIOR HIGH SCHOOL', 'SEBIYAM', '2023-11-14'),
(11, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'House 1', '2023-11-19'),
(12, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'House 2', '2023-11-19'),
(13, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'House 3', '2023-11-19'),
(14, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'House 4', '2023-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(32) NOT NULL,
  `program` varchar(32) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `program`, `tdate`) VALUES
(2, 'GENERAL ARTS', '2023-08-10'),
(3, 'BUSINESS', '2023-08-10'),
(4, 'HOME ECONOMICS', '2023-08-10'),
(5, 'VISUAL ARTS', '2023-08-10'),
(6, 'AGRICULTURE', '2023-08-10'),
(7, 'TECHNICAL STUDIES', '2023-08-10'),
(8, 'APPLIED ELECTRICITY', '2023-08-10'),
(9, 'AUTO MECHANIC ENGINEERING', '2023-08-10'),
(10, 'BUILDING CONSTRUCTION TECHNOLOGY', '2023-08-10'),
(11, 'CARPENTERY AND JOINERY', '2023-08-10'),
(12, 'CATERING', '2023-08-10'),
(13, 'ELECTRICAL INSTALLATION WORK', '2023-08-10'),
(14, 'ELECTRONICS', '2023-08-10'),
(15, 'FASHION AND DESIGN', '2023-08-10'),
(16, 'GENERAL TEXTILES', '2023-08-10'),
(17, 'INDUSTRIAL MECHANICSMECHANICAL E', '2023-08-10'),
(18, 'METAL WORK', '2023-08-10'),
(19, 'PHOTOGRAPHY', '2023-08-10'),
(20, 'PLUMBING CRAFT', '2023-08-10'),
(21, 'PRINTING CRAFT', '2023-08-10'),
(22, 'WELDING AND FABRICATION', '2023-08-10'),
(23, 'WOOD WORK', '2023-08-10'),
(25, 'GENERAL SCIENCE', '2023-10-26'),
(27, 'AVIATION', '2023-11-14'),
(28, 'ROBOTICS', '2023-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `prospectus`
--

CREATE TABLE `prospectus` (
  `id` int(32) NOT NULL,
  `prospectus` varchar(100) DEFAULT NULL,
  `schoolname` varchar(50) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prospectus`
--

INSERT INTO `prospectus` (`id`, `prospectus`, `schoolname`, `tdate`) VALUES
(7, 'lansec_prospectus.pdf', 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', '2023-11-19'),
(8, 'kpastem-PROSPECTUS.pdf', 'STEM SENIOR HIGH SCHOOL- KPASENKPE', '2023-11-19'),
(9, 'yabsectech_PROSPECTUS.pdf', 'Yagaba Senior High/Technical School', '2023-11-19'),
(10, 'wulsec_prospectus.pdf', 'Wulugu Senior High School', '2023-11-19'),
(12, 'myResults.pdf', 'BUNKPURUGU SENIOR HIGH/ TECHNICAL SCHOOL', '2023-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(32) NOT NULL,
  `region` varchar(32) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL,
  `rdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region`, `tdate`, `rdate`) VALUES
(1, 'Ashanti Region', '', '2023-08-06'),
(2, 'Bono Region', '', '2023-08-06'),
(3, 'Bono East Region', '', '2023-08-06'),
(4, 'Central Region', '', '2023-08-06'),
(5, 'Eastern Region', '', '2023-08-06'),
(6, 'Greater Accra Region', '', '2023-08-06'),
(7, 'Northern Region', '', '2023-08-06'),
(8, 'North East Region', '', '2023-08-06'),
(9, 'Oti Region', '', '2023-08-06'),
(10, 'Savannah Region', '', '2023-08-06'),
(11, 'Upper East Region', '', '2023-08-06'),
(12, 'Upper West Region', '', '2023-08-06'),
(13, 'Volta Region', '', '2023-08-06'),
(14, 'Western Region', '', '2023-08-06'),
(15, 'Western North Region', '', '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `id` int(32) NOT NULL,
  `schoolname` varchar(100) DEFAULT NULL,
  `abreviatedname` varchar(32) DEFAULT NULL,
  `schlcode` varchar(32) DEFAULT NULL,
  `schoollogo` varchar(100) DEFAULT NULL,
  `sstat` int(16) NOT NULL DEFAULT 0,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolinfo`
--

INSERT INTO `schoolinfo` (`id`, `schoolname`, `abreviatedname`, `schlcode`, `schoollogo`, `sstat`, `tdate`) VALUES
(14, 'SCHOOL OF ADMINISTRATION', 'SADMIN', '000111', 'admin_logo.webp', 1, '2023-10-24'),
(19, 'STEM SENIOR HIGH SCHOOL- KPASENKPE', 'KPASTEM', '0080508', 'kpastem.jpeg', 0, '2023-11-19'),
(21, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'LANSEC', '0080507', 'lanseclogo.jpeg', 0, '2023-11-19'),
(22, 'Yagaba Senior High/Technical School', 'Yabsectech', '0080606', 'yabsecteclogo.jpg', 0, '2023-11-19'),
(23, 'Wulugu Senior High School', 'WULSEC', '0080602', 'wulseclogo.jpg', 0, '2023-11-19'),
(24, 'BUNKPURUGU SENIOR HIGH/ TECHNICAL SCHOOL', 'BUNKPURSEC', '0008001', 'bunkpurugseclogo.jpg', 0, '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(32) NOT NULL,
  `schlname` varchar(50) DEFAULT NULL,
  `studentindex` varchar(32) DEFAULT NULL,
  `studname` varchar(32) DEFAULT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `aaggregate` varchar(32) DEFAULT NULL,
  `programme` varchar(32) DEFAULT NULL,
  `track` varchar(32) DEFAULT NULL,
  `sstatus` varchar(32) DEFAULT NULL,
  `house` varchar(32) DEFAULT NULL,
  `tid` varchar(32) DEFAULT NULL,
  `paystatus` varchar(1) NOT NULL DEFAULT '0',
  `dob` varchar(32) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL,
  `district` varchar(32) DEFAULT NULL,
  `enrollcode` varchar(32) DEFAULT NULL,
  `codepic` varchar(100) DEFAULT NULL,
  `jhsname` varchar(155) DEFAULT NULL,
  `jhsaddress` varchar(65) DEFAULT NULL,
  `pname` varchar(32) DEFAULT NULL,
  `pcontact` varchar(32) DEFAULT NULL,
  `paynum` varchar(32) DEFAULT NULL,
  `hseaddress` varchar(100) DEFAULT NULL,
  `admstatus` varchar(1) NOT NULL DEFAULT '0',
  `admnum` int(32) DEFAULT NULL,
  `admrdate` varchar(32) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `schlname`, `studentindex`, `studname`, `gender`, `aaggregate`, `programme`, `track`, `sstatus`, `house`, `tid`, `paystatus`, `dob`, `religion`, `region`, `district`, `enrollcode`, `codepic`, `jhsname`, `jhsaddress`, `pname`, `pcontact`, `paynum`, `hseaddress`, `admstatus`, `admnum`, `admrdate`, `tdate`) VALUES
(1, 'Yagaba Senior High/Technical School', '0010202122', 'Amina Abdulai', 'Female', '20', 'AGRICULTURE', 'SINGLE', 'Boarding', 'Zaami', '1110', '1', '2023-11-17', 'Islam', 'Greater Accra Region', 'Amansie West', 'Mmu@33', '0010202122WIN_20200121_07_32_24_Pro.jpg', NULL, 'NHGFH', 'Alhassan Amidu', '0202212511', NULL, 'NJGHJ', '1', 1, '2023-11-17', '2023-11-17'),
(2, 'Wulugu Senior High School', '0012021252', 'Asamiu Arimiyaw', 'Male', '9', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Nachinaa', '1211', '1', '2023-11-17', 'Other', 'Eastern Region', 'Amansie Central', 'Ww2@11', '0018055021WIN_20200121_07_32_24_Pro.jpg', NULL, 'dedce', 'Alhassan Amidu', '0202212511', NULL, 'ddd', '1', 0, '2023-11-17', '2023-11-17'),
(3, 'Yagaba Senior High/Technical School', '0001478545', 'Amina Ainu', 'Female', '13', 'VISUAL ARTS', 'SINGLE', 'Boarding', 'Illiasu', '9999', '1', '2023-11-17', 'Other', 'Eastern Region', 'Asutifi South', 'Mm1233234244', '0001001212WIN_20200121_07_32_24_Pro.jpg', NULL, 'deeee', 'Alhassan Amidu', '0202212511', NULL, 'ssdsd', '1', 2, '2023-11-18', '2023-11-17'),
(4, 'Yagaba Senior High/Technical School', '1887858551', 'Rukaya Adam', 'Female', '23', 'GENERAL ARTS', 'SINGLE', 'Day', 'Nachinaa', '1021', '1', '2023-11-17', 'Islam', 'Oti Region', 'Ahafo-Ano North', 'Er@221', '1887858551WIN_20200121_07_32_24_Pro.jpg', NULL, 'dsesf', 'Alhassan Amidu', '0202212511', NULL, 'esdfdf', '1', 3, '2023-11-17', '2023-11-17'),
(5, 'Wulugu Senior High School', '1818788542', 'rau issah', 'Male', '18', 'GENERAL ARTS', 'SINGLE', 'Boarding', 'Nachinaa', '1140', '1', '2023-11-18', NULL, 'Savannah Region', 'Amansie Central', 'Rr@e34', '1818788542WIN_20200121_07_32_24_Pro.jpg', NULL, 'ghsns', 'Alhassan Amidu', '0202212511', NULL, 'dfbsdhgv', '1', 4, '2023-11-18', '2023-11-17'),
(6, 'Wulugu Senior High School', '0020212552', 'ASA  ALOeed', 'Male', '13', 'AUTO MECHANIC ENGINEERING', 'SINGLE', 'Boarding', 'Zaami', '1200', '1', '2023-11-18', NULL, 'Northern Region', 'Adansi South', 'Bw@331', '0020212552WIN_20200121_07_32_24_Pro.jpg', NULL, 'fnhjrbewu', 'Alhassan Amidu', '0202212511', NULL, 'fdfrewr', '1', NULL, '2023-11-18', '2023-11-17'),
(7, 'Wulugu Senior High School', '1312222120', 'Alhassan Kojo', 'Male', '17', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Zaami', '1515', '1', '2023-11-18', NULL, 'Greater Accra Region', 'Ahafo-Ano South East', 'Mmi@12', '1312222120WIN_20200121_07_32_24_Pro.jpg', NULL, 'fghjj', 'Alhassan Amidu', '0202212511', NULL, 'bgd', '1', NULL, NULL, '2023-11-18'),
(8, 'Yagaba Senior High/Technical School', '8878858525', 'Ali Bugri', 'Male', '14', 'VISUAL ARTS', 'SINGLE', 'Boarding', 'Zaami', '2021', '1', '2023-11-18', NULL, 'Northern Region', 'Adansi South', 'Rd@331', '8878858525WIN_20200121_07_32_24_Pro.jpg', NULL, 'fdserayjfg', 'Alhassan Amidu', '0202212511', NULL, 'ffdfd', '1', 5, '2023-11-18', '2023-11-18'),
(9, 'Yagaba Senior High/Technical School', '1112225545', 'Adam Esi', 'Female', '15', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Zaami', '1016', '1', '2023-11-18', NULL, 'Greater Accra Region', 'Adansi South', 'Hg@200', '1112225545WIN_20200121_07_32_24_Pro.jpg', NULL, 'ggtrhg', 'Alhassan Amidu', '0202212511', NULL, 'ggfftr', '1', 4, '2023-11-18', '2023-11-18'),
(10, 'Wulugu Senior High School', '9800012021', 'Wahab Aku', 'Female', '31', 'GENERAL ARTS', 'SINGLE', 'Boarding', 'Nkrumah', '2022', '1', '2023-11-18', NULL, 'Volta Region', 'Ahafo-Ano South East', 'Rd@331', '9800012021WIN_20200121_07_32_24_Pro.jpg', NULL, 'drefs', 'Alhassan Amidu', '0202212511', NULL, 'lddmdd', '1', 5, '2023-11-18', '2023-11-18'),
(11, 'Wulugu Senior High School', '0101002121', 'Hakim Ali', 'Male', '16', 'METAL WORK', 'SINGLE', 'Boarding', 'SEBIYAM', '2011', '1', '2023-11-18', NULL, 'Savannah Region', 'Afigya-Kwabre South', 'Ll!223', '0101002121WIN_20200121_07_32_24_Pro.jpg', NULL, 'dfdsfd', 'Alhassan Amidu', '0202212511', NULL, 'sdss', '1', 6, '2023-11-18', '2023-11-18'),
(12, 'Yagaba Senior High/Technical School', '0102021254', 'Mohammed Baako', 'Male', '8', 'VISUAL ARTS', 'SINGLE', 'Boarding', 'PROF NABILA', '8799', '1', '2023-11-18', NULL, 'Greater Accra Region', 'Afigya-Kwabre North', 'Ll!221', '0102021254WIN_20200121_07_32_24_Pro.jpg', NULL, 'asadde', 'Alhassan Amidu', '0202212511', NULL, 'asaseere', '1', 6, '2023-11-18', '2023-11-18'),
(13, 'Yagaba Senior High/Technical School', '0001001212', 'Esi Kojo', 'Female', '16', 'GENERAL ARTS', 'SINGLE', 'Boarding', 'SEBIYAM', '30', '1', '2016-12-31', NULL, 'Northern Region', 'Kumbungu', 'mS@212', '0001001212WIN_20200121_07_32_24_Pro.jpg', 'WALEWALE L/A JHS', 'dedre', 'Alhassan Amidu', '0202212511', NULL, 'DFD', '1', 7, '2023-11-18', '2023-11-18'),
(14, 'Wulugu Senior High School', '0815252410', 'Abram Amoa', 'Male', '14', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Nachinaa', '2016', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2023-11-18'),
(15, 'Langbinsi Senior High Technical School', '0087487447', 'Alhassan Imoro', 'Male', '14', 'BUSINESS', 'SINGLE', 'Boarding', 'Nkrumah', '2014', '1', '2016-12-31', 'Islam', 'Oti Region', 'Tano North', 'mmnr3', '0087487447WIN_20200121_07_32_24_Pro.jpg', 'lflf', 'fsfd', 'Alhassan Amidu', '0202212511', NULL, 'dfvs', '1', 1, '2023-11-18', '2023-11-18'),
(16, 'Yagaba Senior High/Technical School', '0502125414', 'Irene Asa', 'Male', '12', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Nachinaa', '902', '1', '2016-12-31', 'Christianity', 'Northern Region', 'Ahafo-Ano North', 'klA21', '0502125414WIN_20200121_07_32_24_Pro.jpg', 'gosf', 'gghd', 'Alhassan Amidu', '0202212511', NULL, 'ghsc', '1', 8, '2023-11-18', '2023-11-18'),
(17, 'Yagaba Senior High/Technical School', '08754525447', 'Amos Stephen', 'Male', '16', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Zaami', '8518', '1', '2016-12-01', 'Islam', 'Central Region', 'Adansi Asokwa', 'Brws21', '08754525447WIN_20200121_07_32_24_Pro.jpg', 'dsdfs', 'ddewr', 'Ali Godwin', '0200619222', NULL, 'dd12', '1', 9, '2023-11-18', '2023-11-18'),
(18, 'Wulugu Senior High School', '0080505254', 'Issah Ahmad', 'Male', '21', 'AGRICULTURE', 'SINGLE', 'Boarding', 'SEBIYAM', '6121', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2023-11-18'),
(19, 'Yagaba Senior High/Technical School', '0012021252', 'Ali Bugri', 'Male', '13', 'VISUAL ARTS', 'SINGLE', 'Boarding', 'Zaami', '7751', '1', '2016-12-08', 'Islam', 'Ashanti Region', 'Adansi North', 'Kk!0021', '0012021252WIN_20200121_07_32_24_Pro.jpg', 'WALEWALE L/A JHS', 'L/A JHS\r\nP.O.BOX 13\r\nWALEWALE N/R', 'Musah Abiba', '02021252125', '0543963092', 'ww21', '1', 10, '2023-11-19', '2023-11-18'),
(20, 'Yagaba Senior High/Technical School', '0796585214', 'Inusah Ibrahim', 'Male', '20', 'BUSINESS', 'SINGLE', 'Boarding', 'Nachinaa', '999', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(21, 'Wulugu Senior High School', '0202587415', 'Wundow Hakim', 'Male', '17', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'PROF NABILA', '4400', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(22, 'Wulugu Senior High School', '0882025214', 'Issiu Abu', 'Male', '14', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Nachinaa', '853', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(23, 'Wulugu Senior High School', '0080507021', 'Waga Aku', 'Male', '17', 'GENERAL ARTS', 'SINGLE', 'Boarding', 'Zaami', '1673', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(24, 'Wulugu Senior High School', '0060652542', 'Idi Amin', 'Male', '10', 'HOME ECONOMICS', 'SINGLE', 'Boarding', 'Nachinaa', '6793', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(25, 'Wulugu Senior High School', '0055252125', 'Kojo Abigail', 'Female', '11', 'AGRICULTURE', 'SINGLE', 'Boarding', 'Nkrumah', '1090', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(26, 'Wulugu Senior High School', '0080502245', 'Lumasha Ali', 'Male', '13', 'APPLIED ELECTRICITY', 'SINGLE', 'Boarding', 'Nachinaa', '8032', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0543963092', NULL, '0', NULL, NULL, '2023-11-18'),
(27, 'STEM SENIOR HIGH SCHOOL- KPASENKPE', '0090989595', 'Fatima Mohammed', 'Female', '13', 'AGRICULTURE', 'SINGLE', 'Boarding', 'PROF NABILA', '2221', '1', '2015-10-08', 'Islam', 'Central Region', 'Adansi North', 'Mf9098', '0090989595WIN_20200121_07_32_24_Pro.jpg', 'Bunkpurugu R/C JHS', 'Bunkpurugu R/C JHS\r\nP.O.BOX14\r\nBUNKPRUGU\r\nNE/R\r\n12-10-2023', 'Mohammed', '0242528521', NULL, 'bbu33', '1', 1, '2023-11-19', '2023-11-19'),
(28, 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', '0812027006', 'Kwame Desmond', 'Male', '11', 'ELECTRONICS', 'SINGLE', 'Boarding', 'House 1', '1357', '1', '2013-02-01', 'Christianity', 'North East Region', 'West Mamprusi', 'Qm4er%', '0812027006B fuseini.png', 'ZAAMI DA JHS', 'ZAAMI DA JHS\r\nPO BOX 13\r\nWULUGU', 'BAako Yakubu', '0205514002', NULL, 'WA 08', '1', 2, '2023-11-19', '2023-11-19'),
(29, 'BUNKPURUGU SENIOR HIGH/ TECHNICAL SCHOOL', '00875452132', 'Issahaku Hawa', 'Female', '15', 'BUSINESS', 'SINGLE', 'Day', 'House 2', '1440', '1', '2016-12-01', 'Islam', 'North East Region', 'West Mamprusi', 'mJ9909', '00875452132DSC00238.jpg', 'WALEWALE L/A JHS', 'P.O.BOX 13\r\nWALEWALE NE/R\r\n12-11-2023', 'MOHAMMED', '0558587854', NULL, 'RR54', '1', 1, '2023-11-20', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(32) NOT NULL,
  `uname` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `gender` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `uname`, `password`, `email`, `gender`) VALUES
(1, '', '123455t', NULL, NULL),
(2, 'Your chosen file is not a valid ', '123455t', NULL, NULL),
(3, 'success', '123455t', NULL, NULL),
(4, 'success', '123455t', NULL, NULL),
(5, '', '123455t', NULL, NULL),
(6, 'FB_IMG_1623322793241.jpg', '123455t', NULL, NULL),
(7, 'munta', '$1111', 'issahmutaka179@gmail.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `schoolcode` varchar(32) DEFAULT NULL,
  `schoolname` varchar(100) DEFAULT NULL,
  `fullname` varchar(32) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `ulevel` varchar(32) DEFAULT NULL,
  `upassword` varchar(255) DEFAULT NULL,
  `tdate` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `schoolcode`, `schoolname`, `fullname`, `phone`, `username`, `ulevel`, `upassword`, `tdate`) VALUES
(25, '0080602', 'Wulugu Senior High School', 'Issahaku Mutaka', '0543963092', 'ismunta', 'Admin', 'rp40ofueSi7RAE+gs30qXbLlPrhFKKHkAvQXpnP+68dmgEZTsP8X0nsqlgH+OJ6StcOTKS3lFBrt3Cf5zS2nXVZQnQrORM0by5D9QsHPT8eDdTlAv0EyGXmUWJHJckIe', '2023-10-24'),
(26, '000111', 'SCHOOL OF ADMINISTRATION', 'Admin', '0543963092', 'admin', 'Super Admin', 'MiFKgcRNjy8i7R093LrRNopwt0StCmoadezuQcSYNjwZgFuGxsiWQwEtTX2BsUo04LfcI7Z5wpXC9LEnJPwtBI1MxRLobd0V1btXCCht1y7T6UWegsEhrVJZKiIGHoFF', '2023-10-24'),
(27, '0080601', 'Yagaba Senior High/Technical School', 'Baako Mohammed', '0202122525', 'isbaako', 'Admin', 'YHnubu0rJwVXnxKNsQ1m6D6PjFnaBZmo4VtNFgOtDIHx1pKyietkRrWngYNlsAIT3U4Cl6ZESM2H0x+fFbBwz6XIe9FugIh/Kg7zyO4IlZuNP31943GvKdrp8IhyM7TM', '2023-11-10'),
(28, '0080609', 'KPASENKPE STERM SENIOR HIGH SCHOOL', 'Baako Abdul-Basit', '0205514002', '0080609', 'Admin', 'WlJyh5gqDhux1jg2TCWtnPT4OpvbhI5ZrCewwziVR6CAPl8fDzIqwSFQRAYeQ3rrwGAfCb5dUAC/V9mW5ANDNzuyGAyzoO9lVloENjC+/sNxK/IMQLdDzg9HZ99R1ScQ', '2023-11-14'),
(29, '0080507', 'LANGBINSI SENIOR HIGH TECHNICAL SCHOOL', 'RASHID SAA', '0243516188', 'Itlansec', 'Admin', '/E3SEjobLCtxpHl54KWTGv7cX2BeOgn3W/41wCzmVg697NOjHr8N+f7e9zrSgOsIOmTjceV8AiShvtXfPPXrz2Duc77+xgbDfvo2wE902ZU9jnxddEmULKc5XDzIrZip', '2023-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptance`
--
ALTER TABLE `acceptance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admisletter`
--
ALTER TABLE `admisletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectus`
--
ALTER TABLE `prospectus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tid` (`tid`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptance`
--
ALTER TABLE `acceptance`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admisletter`
--
ALTER TABLE `admisletter`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prospectus`
--
ALTER TABLE `prospectus`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
