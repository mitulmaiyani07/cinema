-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 07:53 PM
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
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `theatre_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `tickets` int(4) NOT NULL,
  `date_time` datetime NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `total_amount` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(10) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `movie_image` varchar(200) DEFAULT NULL,
  `movie_desc` longtext DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `release_date` datetime NOT NULL,
  `is_released` tinyint(1) NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_name`, `movie_image`, `movie_desc`, `category_id`, `release_date`, `is_released`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'Tu Jhoothi Main Makkaar', './images/tjmm2023.jpg', '<p><strong>Mickey, a carefree businessman and womaniser, helps couples break up. However, things change for him when he falls for Tinni, a witty and beautiful chartered accountant.</strong></p>', 8, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-24 21:04:13', '2023-10-04 23:16:22', 1, 0),
(2, 'Jawan', './images/jawan2023.jpg', '<p><strong>An emotional journey of a man who is set to rectify the wrongs in the society, in an attempt to get even with his past, driven by a personal vendetta while keeping up to a promise made years ago. A high-octane action thriller where he is up against a dreadful monstrous outlaw who knows no fear and has caused extreme suffering to many. In the journey he will cross paths with a high-minded seasoned lady officer whose emotions might get the better of her as she gets involved in this battle. As his past catches up with him, to overcome the challenges and restore the harmony in their world, he will need all the firepower and intelligence to do so</strong></p>', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-24 22:45:06', '2023-09-28 23:20:51', 1, 0),
(3, 'Animal 2023', './images/animal2023.jpg', '<p><strong>Animal is&nbsp;the story of a son\'s obsessive love for his father. Often away due to work the father is unable to comprehend the intensity of his son\'s love. Ironically, this fervent love and admiration for his father and family creates conflict between the father and son.</strong></p>', 4, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-25 17:40:47', '2023-09-28 23:21:32', 1, 0),
(4, 'Tiger 3', './images/tiger3_2023.jpg', '<p><strong>Tiger (Salman Khan) and Zoya (Katrina Kaif) return to the big screen with action-packed sequences, in this third installment of their spy films that previously gave us Ek Tha Tiger and Tiger Zinda Hai.</strong></p>', 6, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 22:47:47', '2023-09-29 23:54:16', 1, 0),
(5, 'Omg 2', './images/omg2_2023.jpg', '<p><strong>OMG 2 is set in the backdrop of an Indian school where sex education is a taboo topic. Vivek, the protagonist, finds himself in trouble when his actions lead to a scandal that brings the issue of sex education to the forefront. The film explores the consequences Vivek faces and how he comes to terms with his mistakes.</strong></p>', 7, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:25:38', '2023-09-29 23:53:57', 1, 0),
(6, 'Gadar 2', './images/gadar2.jpg', '<p><strong>When Tara Singh goes missing during a skirmish and is believed to be captured in Pakistan, his son Jeete sets out to rescue him and enters a labyrinth from which they both must escape at all costs. Gadar II brings back India\'s most loved family of Tara, Sakeena and Jeete; 22 years after its predecessor.</strong></p>', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:28:20', '2023-09-29 23:53:37', 1, 0),
(7, 'Spy', './images/spy.jpg', '<p><strong>After receiving the news of the death of his elder brother Subash, who worked for R&amp;AW, Jay sets out on a mission to find out what happened leading him into a bigger conspiracy of a possible nuclear attack threat to the country.</strong></p>', 2, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:33:46', '2023-09-29 23:53:01', 1, 0),
(8, 'Satyaprem Ki Katha', './images/spkk.jpg', '<p><strong>A middle-class boy in Ahmedabad, Satyaprem falling in one-sided love with Katha, who is coping with her breakup with Tapan. Through the journey, they discover each other\'s life and complement in accomplishing what was left halfway.</strong></p>', 7, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:37:28', '2023-09-28 23:37:28', 1, 0),
(9, 'Pathan', './images/pathan2023.jpg', '<p><strong>Pathaan, an exiled RAW agent, works with ISI agent Rubina Mohsin to take down Jim, a former RAW agent, who plans to attack India with a deadly virus. Produced by Aditya Chopra of Yash Raj Films, the film began principal photography in November 2020 in Mumbai.</strong></p>', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:39:35', '2023-09-29 23:52:44', 1, 0),
(10, 'Bawaal', './images/bawaal.jpg', '<p><strong>A small-town man who falls in love with the most beautiful girl in town. He wants to marry her one day because marrying her can raise his social position. Every love story has its own war.</strong></p>', 8, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:42:11', '2023-09-29 23:52:21', 1, 0),
(11, 'IB71', './images/ib71.jpg', '<p><strong>IB71 is a 2023 Indian Hindi-language spy thriller film based on the 1971 Indian Airlines hijacking, written and directed by Sankalp Reddy. It stars Vidyut Jammwal, Vishal Jethwa and Faizan Khan, alongside Anupam Kher, Ashwath Bhatt, Danny Sura and Suvrat Joshi.</strong></p>', 2, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:45:13', '2023-09-28 23:45:13', 1, 0),
(12, 'Gumraah', './images/gumraah.jpg', '<p><strong>It revolves around a murder investigation which becomes complicated after the police discover two lookalike suspects.</strong></p>', 4, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-28 23:48:25', '2023-09-28 23:48:25', 1, 0),
(13, 'Bloody Daddy', './images/bloodydaddy.jpg', '<p><strong>A messed up, tenacious man faces off against cops and crime lords to save the one relationship that matters to him. A messed up, tenacious man faces off against cops and crime lords to save the one relationship that matters to him.</strong></p>', 2, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-29 23:37:51', '2023-09-29 23:37:51', 1, 0),
(14, 'Dasara', './images/dasara.jpg', '<p><strong>Dasara&nbsp;tells the story of Dharani who is in love with Vennela (Keerthy Suresh). But she and Dharani\'s best friend Suri are in love and as a child, Dharani &ldquo;sacrifises&rdquo; his love. Things take a turn for the worse when a bar and an evil Sarpanch get in the way and the two men turn towards politics.</strong></p>', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-29 23:41:52', '2023-09-29 23:41:52', 1, 0),
(15, 'Amigos', './images/amigos.jpg', '<p><strong>Three identical men befriend each other through a doppelganger-finding application and things go well until the criminal past of one amongst them emerges.</strong></p>', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-29 23:44:42', '2023-09-29 23:44:42', 1, 0),
(16, 'Chor Nikal Ke Bhaga', './images/cnkb.jpg', '<p><strong>A flight attendant and her boyfriend must steal a cache of diamonds to clear an old debt &mdash; but the plan spins into mayhem when the plane is hijacked</strong>.</p>', 2, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-29 23:57:21', '2023-09-29 23:57:21', 1, 0),
(17, 'Salaar: Part 1 – Ceasefire', './images/salaar.jpg', '<p><strong>A gang leader tries to keep a promise made to his dying friend and takes on the other criminal gangs. A gang leader tries to keep a promise made to his dying friend and takes on the other criminal gangs.</strong></p>', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-10-03 03:50:40', '2023-10-04 23:01:52', 1, 0),
(18, 'The Fighter (2024)', './images/thefighter2024.jpg', '', 3, '0000-00-00 00:00:00', 0, 1, 1, '2023-10-05 22:46:13', '2023-10-05 23:24:50', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` varchar(200) DEFAULT NULL,
  `cat_desc` longtext DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`id`, `cat_name`, `cat_image`, `cat_desc`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'Comedy', 'images/comedy.jpg', '<p><strong>A comedy film is&nbsp;a category of film which emphasizes on humor. These films are designed to make the audience laugh in amusement. Films in this style traditionally have a happy ending (dark comedy being an exception to this rule).</strong></p>', 1, 1, '2023-09-22 14:56:02', '2023-09-28 22:58:35', 1, 0),
(2, 'Thriller', 'images/thriller.jpg', '<p><strong>An atmosphere of menace and sudden violence, such as crime and murder, characterize thrillers. The tension usually arises when the character(s) is placed in a dangerous situation, or a trap from which escaping seems impossible.</strong></p>', 1, 1, '2023-09-23 16:21:42', '2023-09-28 23:00:27', 1, 0),
(3, 'Action', 'images/action.jpg', '<p><strong>Action film is&nbsp;a film genre in which the protagonist is thrust into a series of events that typically involve violence and physical feats.</strong></p>', 1, 1, '2023-09-23 16:42:16', '2023-09-28 23:02:06', 1, 0),
(4, 'Crime', 'images/crime.jpg', '<p><strong>Crime films, in the broadest sense, is&nbsp;a film genre inspired by and analogous to the crime fiction literary genre. Films of this genre generally involve various aspects of crime and its detection.</strong></p>', 1, 1, '2023-09-24 22:42:50', '2023-09-28 23:04:26', 1, 0),
(5, 'Horror', 'images/horror.jpg', '<p><strong>Horror films may incorporate incidents of physical violence and psychological terror; they may be studies of deformed, disturbed, psychotic, or evil characters; stories of terrifying monsters or malevolent animals; or mystery thrillers that use atmosphere to build suspense.</strong></p>', 1, 1, '2023-09-25 17:39:18', '2023-09-28 23:06:23', 1, 0),
(6, 'Mystery', 'images/mystery.jpg', '<p><strong>A mystery film is&nbsp;a genre of film that revolves around the solution of a problem or a crime. It focuses on the efforts of the detective, private investigator or amateur sleuth to solve the mysterious circumstances of an issue by means of clues, investigation, and clever deduction.</strong></p>', 1, 1, '2023-09-28 22:33:05', '2023-09-28 23:08:33', 1, 0),
(7, 'Drama', 'images/drama.jpg', '<p><strong>Drama Films are&nbsp;serious presentations or stories with settings or life situations that portray realistic characters in conflict with either themselves, others, or forces of nature. A dramatic film shows us human beings at their best, their worst, and everything in-between.</strong></p>', 1, 1, '2023-09-28 22:41:43', '2023-09-28 22:56:35', 1, 0),
(8, 'Romantic', './images/romantic.jpg', '<p><strong>Romance films involve romantic love stories recorded in visual media for broadcast in theatres or on television that focus on passion, emotion, and the affectionate romantic involvement of the main characters. Typically their journey through dating, courtship or marriage is featured.</strong></p>', 1, 1, '2023-09-28 23:10:06', '2023-09-28 23:10:06', 1, 0),
(9, 'Sci-Fi', './images/sci-fi.jpg', '<p><strong>Science fiction (or sci-fi) is&nbsp;a film genre that uses speculative, fictional science-based depictions of phenomena that are not fully accepted by mainstream science, such as extraterrestrial lifeforms, spacecraft, robots, cyborgs, dinosaurs, mutants, interstellar travel, time travel, or other technologies.</strong></p>', 1, 1, '2023-09-28 23:11:49', '2023-09-28 23:11:49', 1, 0),
(10, 'Family', './images/family.jpg', '<p><strong>A children\'s film, or family film, is&nbsp;a film genre that contains children or relates to them in the context of home and family. Children\'s films are made specifically for children and not necessarily for a general audience, while family films are made for a wider appeal with a general audience in mind.</strong></p>', 1, 1, '2023-09-28 23:13:06', '2023-09-28 23:13:06', 1, 0),
(11, 'Period', './images/period.jpg', '<p><strong>In the world of Hollywood, a period piece specifically refers to&nbsp;a film, TV series, or miniseries that is set during an earlier time. Period pieces often have high budgets and involve complex shoots, but the extra effort ensures that the audience is transported into a past era.</strong></p>', 1, 1, '2023-09-28 23:14:54', '2023-09-28 23:14:54', 1, 0),
(12, 'Political', './images/political.jpg', '<p><strong>Political cinema, in the narrow sense, refers to cinema products that portray events or social conditions, either current or historical, through a partisan perspective, with the intent of informing or agitating the spectator.</strong></p>', 1, 1, '2023-09-28 23:16:44', '2023-09-28 23:16:44', 1, 0),
(13, 'Psychological', './images/psychological.jpg', '<p><strong>Peter Hutchings states varied films have been labeled psychological thrillers, but it usually refers to \"narratives with domesticated settings in which action is suppressed and where thrills are provided instead via investigations of the psychologies of the principal characters.\" A distinguishing characteristic of a ...</strong></p>', 1, 1, '2023-09-28 23:19:26', '2023-09-28 23:19:26', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `id` int(10) NOT NULL,
  `theatre_name` varchar(100) NOT NULL,
  `theatre_image` varchar(200) DEFAULT NULL,
  `theatre_desc` longtext DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`id`, `theatre_name`, `theatre_image`, `theatre_desc`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'Rupali Cinema Surat', './images/Rupali Cinema Surat.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?sca_esv=571003301&amp;rlz=1C1CHBF_enIN1066IN1066&amp;cs=0&amp;q=rupali+cinema+surat+address&amp;ludocid=47764310654026592&amp;sa=X&amp;ved=2ahUKEwjWv6KYsd-BAxXB-jgGHSSrArsQ6BN6BAgTEAI\" data-ved=\"2ahUKEwjWv6KYsd-BAxXB-jgGHSSrArsQ6BN6BAgTEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Rander Rd, Rang Avadhut Society-1, Ramnagar, Sima Nagar, Surat, Gujarat 395005</span></strong></p>', 1, 1, '2023-10-05 22:50:13', '2023-10-05 23:16:08', 1, 0),
(2, 'PVR Rahul Raj Surat', './images/PVR Rahul Raj Surat.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?sca_esv=571003301&amp;rlz=1C1CHBF_enIN1066IN1066&amp;cs=0&amp;q=pvr+surat+address&amp;ludocid=4763180887078352650&amp;sa=X&amp;ved=2ahUKEwiipKW3td-BAxUI2DgGHYWdDrsQ6BN6BAgWEAI\" data-ved=\"2ahUKEwiipKW3td-BAxUI2DgGHYWdDrsQ6BN6BAgWEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Surat - Dumas Rd, Piplod, Surat, Gujarat 395007</span></strong></p>', 1, 1, '2023-10-05 22:51:29', '2023-10-05 23:15:48', 1, 0),
(3, 'Rupam Cinema', './images/Rupam Cinema.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571003301&amp;cs=0&amp;q=rupam+cinema+-+surat+address&amp;ludocid=4330718623670382357&amp;sa=X&amp;ved=2ahUKEwjpqY2quN-BAxVTSmwGHZ0GCokQ6BN6BAgYEAI\" data-ved=\"2ahUKEwjpqY2quN-BAxVTSmwGHZ0GCokQ6BN6BAgYEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Rupam Cinema Rd, Near Ratan Cinema, Behind, Salabatpura, Surat, Gujarat 395003</span></strong></p>', 1, 1, '2023-10-05 23:04:59', '2023-10-05 23:15:29', 1, 0),
(4, 'The Friday Cinema', 'images/The Friday Cinema.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571003301&amp;cs=0&amp;q=the+friday+cinema+address&amp;ludocid=7262959771928181102&amp;sa=X&amp;ved=2ahUKEwikn93xuN-BAxUUSWwGHeN7AY4Q6BN6BAgSEAI\" data-ved=\"2ahUKEwikn93xuN-BAxUUSWwGHeN7AY4Q6BN6BAgSEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Atlanta mall, Mota Varachha, Surat, Gujarat 394101</span></strong></p>\r\n<p>&nbsp;</p>', 1, 1, '2023-10-05 23:07:09', '2023-10-05 23:15:16', 1, 0),
(5, 'Valam Multiplex', './images/Valam Multiplex.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571003301&amp;cs=0&amp;q=valam+multiplex+address&amp;ludocid=17335845685265286648&amp;sa=X&amp;ved=2ahUKEwigsIG1ud-BAxWtTmwGHYTbAOEQ6BN6BAgQEAI\" data-ved=\"2ahUKEwigsIG1ud-BAxWtTmwGHYTbAOEQ6BN6BAgQEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">1, VALAM MULTIPLEX, Bombay Colony, Adarsh Society, Ram Nagar, Kapodra Patiya, Surat, Gujarat 395006</span></strong></p>', 1, 1, '2023-10-05 23:09:25', '2023-10-05 23:15:03', 1, 0),
(6, 'City Plus Multiplex', './images/City Plus Multiplex.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571003301&amp;cs=0&amp;q=city+plus+multiplex+address&amp;ludocid=9319845995877521606&amp;sa=X&amp;ved=2ahUKEwj9uaLeud-BAxWTSWwGHXN-BxMQ6BN6BAgUEAI\" data-ved=\"2ahUKEwj9uaLeud-BAxWTSWwGHXN-BxMQ6BN6BAgUEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Surat - Dumas Rd, Magdalla, Surat, Gujarat 395007</span></strong></p>', 1, 1, '2023-10-05 23:12:04', '2023-10-05 23:14:40', 1, 0),
(7, 'INOX Reliance Mall', './images/INOX Reliance Mall.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571003301&amp;cs=0&amp;q=inox+reliance+mall+address&amp;ludocid=15882465867447288574&amp;sa=X&amp;ved=2ahUKEwjY1LWput-BAxXszjgGHdqsBIYQ6BN6BAgUEAI\" data-ved=\"2ahUKEwjY1LWput-BAxXszjgGHdqsBIYQ6BN6BAgUEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">4th Floor Reliance Mega Mall, opp. to Apple Hospital, Udhana Darwaja, Surat, Gujarat 395001</span></strong></p>', 1, 1, '2023-10-05 23:14:27', '2023-10-06 22:15:58', 1, 0),
(8, 'Rajhans Cinemas', './images/Rajhans Cinemas.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?sca_esv=571003301&amp;rlz=1C1CHBF_enIN1066IN1066&amp;q=rajhans+cinemas+velanja+address&amp;ludocid=15780452646636304219&amp;sa=X&amp;ved=2ahUKEwj9jbquu9-BAxVS62EKHVmdCM8Q6BN6BAg2EAI\" data-ved=\"2ahUKEwj9jbquu9-BAxVS62EKHVmdCM8Q6BN6BAg2EAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">MTC Maruti Trade Center, Hazira Highway, near Rangoli Chowkdi, Velanja, Gujarat 394150</span></strong></p>', 1, 1, '2023-10-05 23:17:54', '2023-10-05 23:17:54', 1, 0),
(9, 'Cinepolis', './images/Cinepolis.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571003301&amp;cs=0&amp;q=cin%C3%A9polis+-+imperial+square+mall,+surat+address&amp;ludocid=9910646937706222424&amp;sa=X&amp;ved=2ahUKEwju2t3Wu9-BAxWoS2wGHbSjAvsQ6BN6BAgOEAI\" data-ved=\"2ahUKEwju2t3Wu9-BAxWoS2wGHbSjAvsQ6BN6BAgOEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Hazira - Adajan Rd, Hazira Rd, Guru Ram Pavan Bhumi, Adajan Gam, Surat, Gujarat 395009</span></strong></p>', 1, 1, '2023-10-05 23:19:09', '2023-10-05 23:19:09', 1, 0),
(10, 'Wonder Prime Cinema', './images/Wonder Prime Cinema.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571342877&amp;cs=0&amp;q=wonder+prime+cinema+address&amp;ludocid=795659937224104980&amp;sa=X&amp;ved=2ahUKEwicrrq_7-GBAxU31zgGHarCBVEQ6BN6BAgSEAI\" data-ved=\"2ahUKEwicrrq_7-GBAxU31zgGHarCBVEQ6BN6BAgSEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Rangeela Park Dindoli Kharwasa, Main Rd, Parvat Gam, Surat, Gujarat 394210</span></strong></p>', 1, 1, '2023-10-06 22:19:03', '2023-10-06 22:19:03', 1, 0),
(11, 'Triveni Cinema', './images/Triveni Cinema.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571342877&amp;cs=0&amp;q=triveni+cinema+address&amp;ludocid=17976696674275059484&amp;sa=X&amp;ved=2ahUKEwi7mo-p8OGBAxUcTGwGHdaYBVQQ6BN6BAgREAI\" data-ved=\"2ahUKEwi7mo-p8OGBAxUcTGwGHdaYBVQQ6BN6BAgREAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">12 - 13, Navagam - Dindoli Road, Bhiliya Nagar 2, Navagam, Surat, Gujarat 394210</span></strong></p>', 1, 1, '2023-10-06 22:20:02', '2023-10-06 22:20:02', 1, 0),
(12, 'CINE PLUS THEATRE', './images/CINE PLUS THEATRE.jpg', '<p><strong><span class=\"w8qArf\"><a class=\"fl\" href=\"https://www.google.com/search?rlz=1C1CHBF_enIN1066IN1066&amp;sca_esv=571342877&amp;cs=0&amp;q=cine+plus+theatre+address&amp;ludocid=14633161319039574142&amp;sa=X&amp;ved=2ahUKEwj0n_fa8OGBAxX2TWwGHQuJCTIQ6BN6BAgYEAI\" data-ved=\"2ahUKEwj0n_fa8OGBAxX2TWwGHQuJCTIQ6BN6BAgYEAI\">Address</a>:&nbsp;</span><span class=\"LrzXr\">Kohinoor Rd, near Diamond World, Opposite G.K. Chambers, Opposite Chine Plus Video, Mini Bazar, Kodiyar Nagar, Surat, Gujarat 395006</span></strong></p>', 1, 1, '2023-10-06 22:23:07', '2023-10-06 22:23:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `user_type_id` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `profile`, `password`, `phone_no`, `created_by`, `updated_by`, `user_type_id`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'Mitul Maiyani ', 'mitpatel0720@gmail.com', 'public/profiles/Default.jpg', '0720', '9409002090', NULL, 1, 1, '2023-09-20 21:16:14', '2023-10-05 16:01:31', 1, 0),
(2, 'Kevin Kotadiya', 'kevinkotadiya428@gmail.com', '', '999', '9510935250', NULL, 2, 1, '2023-09-21 22:11:48', '2023-09-22 10:16:24', 1, 0),
(3, 'test', 'test@gmail.com', 'public/profiles/Default.jpg', '12', 'test', 0, 3, 2, '2023-09-24 22:04:05', '2023-10-03 10:22:20', 1, 0),
(4, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:06:02', '2023-09-24 22:06:02', 1, 0),
(5, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:10:31', '2023-09-24 22:10:31', 1, 0),
(6, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:12:00', '2023-09-24 22:12:00', 1, 0),
(7, 'Mitul Maiyani', 'mitpatel0720@gmail.com', '', '9409', '9409002090', 0, 0, 3, '2023-09-30 21:16:51', '2023-09-30 21:16:51', 1, 0),
(8, 'test', 'test@gmail.com', '', '12', '95747545859', 0, 0, 3, '2023-09-30 21:21:20', '2023-09-30 21:21:20', 1, 0),
(9, 'test', 'test@gmail.com', 'public/profiles/Default.jpg', '34', '85843694349', 0, 9, 2, '2023-09-30 22:13:50', '2023-09-30 22:14:06', 1, 0),
(10, 'test', 'test@gmail.com', '', '23', '595854595', 0, 0, 3, '2023-09-30 22:14:52', '2023-09-30 22:14:52', 1, 0),
(11, 'test', 'test@gmail.com', '', '999', '9999566', 11, 11, 3, '2023-09-30 22:19:25', '2023-09-30 22:19:25', 1, 0),
(12, 'test', 'test@gmail.com', '', '11', '9409002090', 12, 12, 3, '2023-09-30 22:28:43', '2023-09-30 22:28:43', 1, 0),
(13, 'test', 'test@gmail.com', '', '11', '9409002090', 0, 0, 3, '2023-09-30 22:30:09', '2023-09-30 22:30:09', 1, 0),
(14, 'test', 'test@gmail.com', '', '11', '9409002090', 0, 0, 3, '2023-09-30 22:30:41', '2023-09-30 22:30:41', 1, 0),
(15, 'test', 'test@gmail.com', '', '11', '9409002090', 0, 0, 3, '2023-09-30 22:32:18', '2023-09-30 22:32:18', 1, 0),
(16, 'test', 'test@gmail.com', '', '34', '8565458687', 0, 0, 3, '2023-10-03 00:39:22', '2023-10-03 00:39:22', 1, 0),
(17, 'test', 'test@gmail.com', '', '56', '9956569', 0, 0, 2, '2023-10-03 12:24:25', '2023-10-03 12:24:25', 1, 0),
(18, 'test', 'test@gmail.com', '', '12', '9409002090', 0, 0, 3, '2023-10-03 12:43:06', '2023-10-03 12:43:06', 1, 0),
(19, 'test', 'test1@gmail.com', '', '123', '8585844559', 0, 0, 3, '2023-10-09 21:50:42', '2023-10-09 21:50:42', 1, 0),
(20, 'test2', 'test2@gmail.com', '', '123', '123467887', 0, 0, 3, '2023-10-11 15:58:53', '2023-10-11 15:58:53', 1, 0),
(21, 'test2', 'test2@gmail.com', '', '1234', '8565458687', 0, 0, 2, '2023-10-11 16:04:49', '2023-10-11 16:04:49', 1, 0),
(22, 'yash', 'yash123@gmail.com', '', '12', '12', 0, 0, 3, '2023-10-11 23:21:03', '2023-10-11 23:21:03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`) VALUES
(1, 'admin'),
(2, 'assistant'),
(3, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `theatre_id` (`theatre_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `fk_movie_category_id` FOREIGN KEY (`category_id`) REFERENCES `movie_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `fk_mc_create_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mc_update_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
