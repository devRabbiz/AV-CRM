-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2017 at 07:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'adi', 'adi');

-- --------------------------------------------------------

--
-- Table structure for table `admin_jobs`
--

CREATE TABLE `admin_jobs` (
  `def` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `meet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `def` int(11) NOT NULL,
  `operator` text NOT NULL,
  `id` int(11) NOT NULL,
  `nointeres` int(11) NOT NULL DEFAULT '0',
  `done` int(11) NOT NULL DEFAULT '1',
  `notdone` int(11) NOT NULL DEFAULT '1',
  `meet` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `def` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`def`, `id`, `admin`, `date`, `note`) VALUES
(12, 146, 'admin', '2017-02-02 12:55:50', 'hahah'),
(13, 146, 'admin', '2017-02-02 12:55:57', 'e dyta'),
(14, 146, 'admin', '2017-02-02 12:56:01', 'e fundit'),
(15, 146, 'admin', '2017-02-02 12:56:10', 'ok'),
(16, 146, 'admin', '2017-02-02 12:56:17', 'prove'),
(17, 146, 'admin', '2017-02-02 12:56:23', 'sa '),
(18, 146, 'admin', '2017-02-02 12:56:29', 'me'),
(19, 146, 'admin', '2017-02-02 12:56:32', 'shume'),
(20, 146, 'admin', '2017-02-02 12:56:37', 'takim'),
(21, 146, 'admin', '2017-02-02 12:56:43', 'ok'),
(22, 146, 'admin', '2017-02-02 12:56:46', 'tani'),
(23, 146, 'admin', '2017-02-02 12:56:50', 's'),
(24, 146, 'admin', '2017-02-02 12:56:53', 'prov'),
(25, 146, 'admin', '2017-02-02 12:56:56', 'provew'),
(26, 146, 'admin', '2017-02-02 12:56:59', 'ok'),
(27, 146, 'admin', '2017-02-02 12:57:03', 'sdsd'),
(28, 146, 'admin', '2017-02-02 12:57:06', '1'),
(29, 146, 'admin', '2017-02-02 12:57:10', 'dfsdfdsfdsfdf'),
(30, 146, 'admin', '2017-02-02 12:57:16', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddssssssssssssssssssssssssssssssssssssssss'),
(31, 146, 'admin', '2017-02-02 12:58:55', 'rt'),
(32, 146, 'admin', '2017-02-02 13:11:43', 'fgh'),
(33, 197, 'adi', '2017-02-02 13:40:06', 'by adi'),
(34, 1011, 'adi', '2017-02-02 13:42:54', 'adm2'),
(35, 1011, 'adi', '2017-02-02 13:47:28', '12'),
(36, 1011, 'adi', '2017-02-02 14:00:34', 'f'),
(37, 1011, 'adi', '2017-02-02 14:05:47', 'asdasd '),
(38, 284, 'adi', '2017-02-02 14:14:56', 'hello'),
(39, 1011, 'adi', '2017-02-02 14:16:22', 'f'),
(40, 284, 'adi', '2017-02-02 14:25:41', '2'),
(41, 284, 'adi', '2017-02-02 14:28:45', 'rtretertertretertertertertertertertertrtert'),
(42, 1011, 'adi', '2017-02-02 14:34:17', 'fdgasdgdfgyerdcffdftddferwwewrweeeeroieoiioioioiopp[po[[popeee[poiwerii[i[port'),
(43, 146, 'adi', '2017-02-02 15:01:18', 's'),
(44, 1011, 'adi', '2017-02-02 15:27:10', 'fund'),
(45, 759, 'admin', '2017-02-02 15:33:22', 'prove'),
(46, 759, 'admin', '2017-02-02 15:33:34', 'new'),
(47, 1011, 'admin', '2017-02-02 16:29:44', '5'),
(48, 284, 'adi', '2017-02-02 16:50:22', 'dsfjdfsdfsdfsd'),
(49, 284, 'adi', '2017-02-02 16:50:25', 'admin'),
(50, 284, 'adi', '2017-02-02 16:50:46', ''),
(51, 146, 'adi', '2017-02-02 17:13:18', 'new'),
(52, 321, 'adi', '2017-02-02 18:25:09', 'new note'),
(53, 321, 'adi', '2017-02-02 18:25:19', 'new'),
(54, 146, 'admin', '2017-02-03 11:21:54', '1'),
(55, 146, 'op2', '2017-02-03 11:44:51', '1'),
(56, 146, 'op2', '2017-02-03 11:47:58', '2'),
(57, 146, 'admin', '2017-02-03 11:48:07', 'a'),
(58, 146, 'op2', '2017-02-03 11:49:46', 'new'),
(59, 146, 'op2', '2017-02-03 11:52:03', 'note'),
(60, 146, 'op2', '2017-02-03 12:11:55', 'sdsd'),
(61, 1011, 'op2', '2017-02-03 12:15:52', '1321'),
(62, 562, 'op2', '2017-02-03 12:21:13', 'note'),
(63, 562, 'op2', '2017-02-03 12:25:10', 'note'),
(64, 562, 'op2', '2017-02-03 12:26:06', '1'),
(65, 1011, 'op2', '2017-02-03 12:34:23', '1'),
(66, 146, 'op2', '2017-02-03 12:42:06', '2154'),
(67, 146, 'op2', '2017-02-03 12:42:10', '24'),
(68, 562, 'admin', '2017-02-03 12:56:16', 'adlaenv'),
(69, 284, 'admin', '2017-02-03 12:56:34', 'asdasdasd'),
(70, 284, 'admin', '2017-02-03 12:56:39', 'asdsadasd'),
(71, 284, 'admin', '2017-02-03 12:56:42', '2323'),
(72, 284, 'admin', '2017-02-03 12:56:48', 'eee'),
(73, 284, 'admin', '2017-02-03 12:56:50', 'erer'),
(74, 284, 'admin', '2017-02-03 12:56:51', 'erer'),
(75, 871, 'admin', '2017-02-03 13:00:51', 'a'),
(76, 871, 'op2', '2017-02-03 13:02:51', '545'),
(77, 562, 'op2', '2017-02-03 13:03:59', '5'),
(78, 100, 'op2', '2017-02-03 13:05:04', 'kkkkkkfd'),
(79, 871, 'op2', '2017-02-03 13:29:02', 'fg'),
(80, 871, 'op2', '2017-02-03 13:29:05', 'g'),
(81, 871, 'op2', '2017-02-03 13:29:07', 'g'),
(82, 871, 'op2', '2017-02-03 13:29:10', 'g'),
(83, 871, 'op2', '2017-02-03 13:29:12', 'g'),
(84, 871, 'op2', '2017-02-03 13:29:14', 'g'),
(85, 871, 'op2', '2017-02-03 13:29:16', 'g'),
(86, 146, 'admin', '2017-02-03 13:59:01', 'asdsd'),
(87, 1, 'admin', '2017-02-03 14:15:53', '1'),
(88, 1, 'admin', '2017-02-03 14:36:27', '2'),
(89, 2, 'admin', '2017-02-03 14:39:25', 'nuk prgjigjet mungojne dokumentat'),
(90, 3, 'admin', '2017-02-03 14:50:09', 'ka ber 10k ke tix janar'),
(91, 4, 'admin', '2017-02-03 14:50:48', 'ha gia fatto parlato di soldi ma vuole andare avanti con questo che ha non riesce ad acedere .non risponde 12.14.'),
(92, 5, 'admin', '2017-02-03 14:54:57', 'ka shum lek por don te kuptoje me ngadale janar 4k  ishte smure do filoje '),
(93, 6, 'admin', '2017-02-03 14:55:32', 'mai fatto trading ha anche 2 figlie pausa lavoro 14.00PM'),
(94, 7, 'admin', '2017-02-03 14:58:17', 'mai fatto interessa  e curioso I fola me te paren per lek se ka problem thot dua te kuptoj , non e sposato e giovane 31 anni '),
(95, 8, 'admin', '2017-02-03 14:59:54', '13.30 alle 14,30-45. dalle 3 e sempre in ufficio  do fusi nga dal thot ka lek'),
(96, 9, 'admin', '2017-02-03 15:02:23', 'Registration successfull, with  id:  Eugenio Tamai'),
(97, 9, 'admin', '2017-02-03 15:04:13', 'ka sbllokuar 10k .deposit 3k 03.02.17 limite carta 3k .'),
(98, 10, 'admin', '2017-02-03 15:05:50', 'nuk fut per momentin  lek'),
(99, 11, 'admin', '2017-02-03 15:06:46', 'ka futur 200+200'),
(100, 12, 'admin', '2017-02-03 15:07:38', 'e buono vuole capire ha soldi  dice voglio capire vive a roma puo metere soldi con il tempo'),
(101, 13, 'admin', '2017-02-03 15:09:48', 'do fusi 5k te henet do i trasferoi ke conto i sandros dhe do sbllokoj 7k gruaja qe do ja kaloj prap ke konto i sandros fixfx.com 06.02.17'),
(102, 14, 'admin', '2017-02-03 15:10:54', 'fola do nisi dok'),
(103, 15, 'admin', '2017-02-03 15:13:49', 'ka kerkuar prelievo 200 euro dhe thot pastaj do fus nese terhiqen leket'),
(104, 16, 'admin', '2017-02-03 15:16:07', 'ha soldi ma vuole capire.. manda la mail  fatto operare'),
(105, 17, 'admin', '2017-02-03 15:17:54', '390124325363 dice piu avanti detto di acumulare un capitili me e futur ke tix.com ne fund te shkurtit'),
(106, 18, 'admin', '2017-02-03 15:18:30', 'vuole capire tanto ha tanti soldi .manda dokumento via email'),
(107, 19, 'admin', '2017-02-03 15:19:12', 'ha soldi dice ho perso 500k tentato di fare discorso di aumentare il capitale dice devo rifletere minimo 50k lunedi mi dice se parte o no con capitali .da chiamare domani ha persso tot 600k dice on arrivo con 50k e kam len me risultat'),
(108, 20, 'admin', '2017-02-03 15:20:08', 'vuole fare da solo sa fare ma non ascolta'),
(109, 21, 'admin', '2017-02-03 15:20:45', 'futi 2500 total nuk ka deshir te fusi me ka frik nga nusja se e mer vesh'),
(110, 21, 'admin', '2017-02-03 15:21:25', 'finisc'),
(111, 22, 'admin', '2017-02-03 15:22:01', 'ka sbllokuar 5k i thash te sbllokoje te gjithe rreth 40k thot te henen duhetr ti vijne 5k me e cuar ke tixfx i fola per spred te ulet'),
(112, 22, 'admin', '2017-02-03 15:23:01', 'parlato di tixfx.com '),
(113, 23, 'admin', '2017-02-03 15:24:00', 'humbi leket thot do mbledh na nje lek dhe do filloj me kohen te bej prap'),
(114, 25, 'admin', '2017-02-03 15:25:47', 'esht toc nuk pergjigjet  domani 12.00'),
(115, 24, 'admin', '2017-02-03 15:26:02', 'do sjelli email '),
(116, 26, 'admin', '2017-02-03 15:26:44', 'e ka pasur erindi ska dokumentat te gjitha'),
(117, 27, 'admin', '2017-02-03 15:27:20', 'gestisce luigi'),
(118, 28, 'admin', '2017-02-03 15:28:04', 'gestisce luigi 100k'),
(119, 29, 'admin', '2017-02-03 15:29:23', 'venerdi 2 o 2:30 i dergoi dokumentat'),
(120, 27, 'admin', '2017-02-03 15:30:18', 'ciao'),
(121, 31, 'admin', '2017-02-03 15:30:45', 'e un vecchio ka lek don te mesoje do fusi ka banco posta + giorno 20.02.17  800'),
(122, 30, 'admin', '2017-02-03 15:30:58', 'sta sera alle 18.30'),
(123, 16, 'admin', '2017-02-03 15:58:55', 'e lento con il pc'),
(124, 31, 'admin', '2017-02-03 16:04:19', '17.15pm'),
(125, 23, 'admin', '2017-02-03 16:05:02', 'finish'),
(126, 1, 'admin', '2017-02-03 16:32:40', 'e'),
(127, 1, 'admin', '2017-02-03 16:32:41', 'w'),
(128, 1, 'admin', '2017-02-03 16:32:43', 'q'),
(129, 1, 'admin', '2017-02-03 16:32:46', 'e'),
(130, 1, 'admin', '2017-02-03 16:32:48', 'q'),
(131, 1, 'admin', '2017-02-03 16:32:51', 'e'),
(132, 1, 'admin', '2017-02-03 16:32:52', 'q'),
(133, 1, 'admin', '2017-02-03 16:32:54', 'e'),
(134, 31, 'admin', '2017-02-03 17:19:27', 'era occupato con il lavoro . mi dice di sentirci lunedi alle 17.00'),
(135, 31, 'admin', '2017-02-03 17:20:57', '16.30 pm'),
(136, 31, 'admin', '2017-02-03 17:22:14', 'martedi 16.30 pm'),
(137, 1, '<br />\r\n<b>Notice</b>:  Undefined index: admin_username in <b>C:xampphtdocsview_user.php</b> on line <b>81</b><br />\r\n', '2017-02-03 18:06:15', 'w'),
(138, 1, 'admin', '2017-02-06 11:21:27', 'b'),
(139, 29, 'admin', '2017-02-06 11:29:31', 'da rimandare il modulo , che deve compilarlo e spedirlo 06.02.17'),
(140, 19, 'admin', '2017-02-06 11:31:49', 'non risponde e 42 euro +'),
(141, 9, 'admin', '2017-02-06 11:42:48', 'telefono spento fatto 10k '),
(142, 30, 'admin', '2017-02-06 13:18:25', 'dice ho perso da darli una mano a recuperare'),
(143, 30, 'admin', '2017-02-06 13:19:01', 'chiama'),
(144, 2, 'admin', '2017-02-06 13:27:33', 'era senza internet adesso e pronta e un puo lenta '),
(145, 1, 'admin', '2017-02-06 13:30:32', 'adalen'),
(146, 8, 'admin', '2017-02-06 13:31:11', 'non risponde mi sembra che ha mandato la documentazione'),
(147, 8, 'admin', '2017-02-06 13:31:42', 'non risp..'),
(148, 16, 'admin', '2017-02-06 13:48:05', 'e fuori . fa  l insegnante . aveva una societa che per via del internet tecnologia ha falito'),
(149, 24, 'admin', '2017-02-06 14:30:31', 'clonato la carta .la prossima settimana da farli vedere tixfx..100 bonus don'),
(150, 24, 'admin', '2017-02-06 14:30:33', 'clonato la carta .la prossima settimana da farli vedere tixfx..100 bonus don'),
(151, 18, 'admin', '2017-02-06 15:52:43', 'era occupato chiamami alle 5'),
(152, 1, 'adi', '2017-02-06 16:32:27', 'hello viewers'),
(153, 1, 'adi', '2017-02-06 16:32:41', 'whats up'),
(154, 9, 'admin', '2017-02-06 17:57:45', 'non risp '),
(155, 1, 'adi', '2017-02-06 18:13:06', 'o and'),
(156, 26, 'admin', '2017-02-06 18:22:31', 'dice verso fine mese ha perso 35k xtrade.com ');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `username`, `password`) VALUES
(1, 'operator1', 'password1'),
(2, 'op2', 'op22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone_no` text NOT NULL,
  `checked_by_admin` int(11) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `download` int(11) NOT NULL DEFAULT '1',
  `sendto` text,
  `meet` datetime DEFAULT NULL,
  `note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `phone_no`, `checked_by_admin`, `date`, `download`, `sendto`, `meet`, `note`) VALUES
(1, 'Adalen Vladi', '', 'adalenvladi@gmail.com', '0683546168', 1, '2017-02-03 14:15:01', 1, 'operator1 ', NULL, ''),
(2, 'paoletta colacelli', '', 'colacelli@libero.it', '9393339654880', 1, '2017-02-03 14:39:03', 1, NULL, NULL, ''),
(3, 'Graziella Antonello', '', 'graziellaantonello1951@gmail.com', '390118111552 9393405573240', 1, '2017-02-03 14:47:16', 1, NULL, '2017-02-07 14:05:00', ''),
(4, '	Silvano Marangon', '', 'silvanomarangon@email.it', '	9393381716281', 1, '2017-02-03 14:47:56', 1, NULL, NULL, ''),
(5, 'giovanni masessa de dovitiis', '', 'gomadedo@gmail.com', '9393284158991', 1, '2017-02-03 14:48:37', 1, NULL, NULL, ''),
(6, 'Rosa Intonato', '', 'rosy.toretto@alice.it', '	9393209664247', 1, '2017-02-03 14:49:00', 1, NULL, NULL, ''),
(7, 'Roberto ronzani', '', 'ronzaniroberto@tiscali.it', '9393404068804', 1, '2017-02-03 14:58:05', 1, NULL, NULL, ''),
(8, 'Vito Marzano', '', 'vito.marzano@uniba.it', '9393895345803', 1, '2017-02-03 14:59:38', 1, NULL, '2017-02-07 14:30:00', ''),
(9, 'Eugenio Tamai', '', 'euge72@iol.it', '9393200514841', 1, '2017-02-03 15:02:05', 1, NULL, NULL, ''),
(10, 'Rosanna Faleschini', '', 'rosanna.faleschini@alice.it', '9393479059698', 1, '2017-02-03 15:05:36', 1, NULL, NULL, ''),
(11, 'Silvana Zamberlan', '', 'Silvanazamberlan@gmail.com', '9393200478462', 1, '2017-02-03 15:06:16', 1, NULL, NULL, ''),
(12, 'Giovanni Fusco', '', 'giovanni.fus@gmail.com', '9393771607872', 1, '2017-02-03 15:07:25', 1, NULL, NULL, ''),
(13, 'sandro montanaro', '', 'sandro.1963@alice.it', '9393336615945 0804302661', 1, '2017-02-03 15:09:36', 1, NULL, '2017-02-07 10:10:00', ''),
(14, 'Jessica Ciarciello', '', 'jess.ciarciello@zoho.com', '9393272910498', 1, '2017-02-03 15:10:42', 1, NULL, NULL, ''),
(15, 'Francesco Petrone', '', 'motista@icloud.com', '9393391234534', 1, '2017-02-03 15:13:34', 1, NULL, NULL, ''),
(16, 'Rocco Schiavone', '', 'schiavonerocco@tiscalinet.it', '9390835527113  9393284731390', 1, '2017-02-03 15:15:44', 1, NULL, '2017-02-07 18:30:00', ''),
(17, 'Giacomo Guglielmetti', '', 'giacomo.guglielmetti@alice.it', '9393496739911', 1, '2017-02-03 15:17:46', 1, NULL, NULL, ''),
(18, 'Massimo Tempesti', '', 'massimotempesti69@virgilio.it', '9393355759550', 1, '2017-02-03 15:18:21', 1, NULL, NULL, ''),
(19, 'Franco Dallavalle', '', 'politecna10fdv@tiscali.it', '9393358252147', 1, '2017-02-03 15:18:56', 1, NULL, NULL, ''),
(20, 'Salvatore Messina', '', 'subay@hotmail.it', '9393281923297', 1, '2017-02-03 15:19:57', 1, NULL, NULL, ''),
(21, 'Francesco Ventura', '', 'Ventura21@hotmail.it', '9393383774457', 1, '2017-02-03 15:20:34', 1, NULL, NULL, ''),
(22, 'Claudio Colombo', '', 'ba.skylive@gmail.com', '9393382094430', 1, '2017-02-03 15:21:52', 1, NULL, NULL, ''),
(23, 'Vanuccio Carlini', '', 'nuccio66@interfree.it', '9393471602751', 1, '2017-02-03 15:23:51', 1, NULL, NULL, ''),
(24, 'mario andrea marino', '', 'amariom@libero.it', '9393475739332', 1, '2017-02-03 15:24:32', 1, NULL, '2017-02-13 14:20:00', ''),
(25, 'Severino Pivetta ', '', 'severinopivetta1@tin.it', '393358173848', 1, '2017-02-03 15:25:38', 1, NULL, NULL, ''),
(26, 'Adriano Braido', '', 'adriano.braido@libero.it', '9393478610108', 1, '2017-02-03 15:26:32', 1, NULL, '2017-02-20 12:20:00', ''),
(27, 'Silvano Ballota', '', 'silvano.ballota@gmail.com', '9393452446007', 1, '2017-02-03 15:27:11', 1, NULL, NULL, ''),
(28, 'Silvano Sala ', '', 'silvano-sala@libero.it', '393479185614', 1, '2017-02-03 15:27:50', 1, NULL, NULL, ''),
(29, 'SPAGNA SERGIO', '', 'sergio.spagna@libero.it', '393388533888', 1, '2017-02-03 15:28:28', 1, NULL, '2017-02-06 19:05:00', ''),
(30, 'Lucio Mastrangelo', '', 'mastrolu40@gmail.com', '393204412816', 1, '2017-02-03 15:28:53', 1, NULL, NULL, ''),
(31, 'mario perri', '', 'p.mario2001@libero.it', '9393496736570', 1, '2017-02-03 15:30:02', 1, NULL, '2017-02-07 16:40:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_jobs`
--
ALTER TABLE `admin_jobs`
  ADD PRIMARY KEY (`def`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`def`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`def`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_jobs`
--
ALTER TABLE `admin_jobs`
  MODIFY `def` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `def` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `def` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
