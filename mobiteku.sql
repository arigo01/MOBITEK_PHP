-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 12:16 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobiteku`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikuj_porositur`
--

CREATE TABLE `artikuj_porositur` (
  `id` int(11) NOT NULL,
  `porosi_id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `sasia` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artikuj_porositur`
--

INSERT INTO `artikuj_porositur` (`id`, `porosi_id`, `produkt_id`, `sasia`) VALUES
(19, 11, 56, 2),
(18, 11, 47, 1),
(17, 10, 56, 1),
(16, 10, 53, 2),
(15, 10, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `klientet`
--

CREATE TABLE `klientet` (
  `id` int(11) NOT NULL,
  `emri_kli` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mbiemri_kli` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` text COLLATE utf8_unicode_ci NOT NULL,
  `krijuar` datetime NOT NULL,
  `modifikuar` datetime NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ketu jane klientet e regjistruar ne app';

--
-- Dumping data for table `klientet`
--

INSERT INTO `klientet` (`id`, `emri_kli`, `mbiemri_kli`, `email`, `tel`, `adresa`, `krijuar`, `modifikuar`, `password`, `hash`, `active`) VALUES
(2, 'User', 'Perdoruesi', 'user@eshop.com', '55555 55 ', 'Rruga : Haki Stermilli , Tirane', '2021-01-07 14:51:37', '2021-01-07 14:51:37', '$2y$10$H75p.1jXtqoxYf8WFzrVGOWUIX/XifPXdZal3zGCkYLvglsYZ/Kye', '0ff39bbbf981ac0151d340c9aa40e63e', '1'),
(16, 'arigo', 'vrenos', 'arigo@gmail.com', '1231213', 'rruga filani ', '2021-02-12 10:19:12', '2021-02-12 10:19:12', '$2y$10$K6GaSSHctmCSpB2gDw9sFusButRR/1ABVwkn1ICkOwDX6JJNs3vw2', '6da37dd3139aa4d9aa55b8d237ec5d4a', '1'),
(15, 'Admin', 'Manager', 'admin@eshop.com', '068898888', 'Sheshi Skenderbej', '2021-01-08 12:14:59', '2021-01-08 12:14:59', '$2y$10$H7HmMkSM6RFdIFJIOgdUR.ag.D/NFBASTi8BisqyDAhELjCwX8MLO', '08d98638c6fcd194a4b1e6992063e944', '1');

-- --------------------------------------------------------

--
-- Table structure for table `porosite`
--

CREATE TABLE `porosite` (
  `id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `cmimi_total` float(10,2) NOT NULL,
  `krijuar` datetime NOT NULL,
  `modifikuar` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porosite`
--

INSERT INTO `porosite` (`id`, `klient_id`, `cmimi_total`, `krijuar`, `modifikuar`, `status`) VALUES
(10, 2, 204700.00, '2021-02-08 13:11:11', '2021-02-08 13:11:11', '1'),
(11, 16, 179900.00, '2021-02-12 10:24:03', '2021-02-12 10:24:03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

CREATE TABLE `produktet` (
  `id` int(11) NOT NULL,
  `emertimi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pershkrimi` text COLLATE utf8_unicode_ci NOT NULL,
  `cmimi` float(10,2) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `marka` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `krijuar` datetime DEFAULT NULL,
  `modifikuar` datetime DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `specs` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produktet`
--

INSERT INTO `produktet` (`id`, `emertimi`, `pershkrimi`, `cmimi`, `img`, `marka`, `krijuar`, `modifikuar`, `status`, `specs`) VALUES
(46, 'Apple iPhone 11 Pro Max', 'Iphone i pare i fuqishem mjaftueshem per tu quajtur PRO.', 124500.00, 'uploads/6021245014e057.08745224.jpg', 'apple', '2021-02-08 12:45:20', '2021-02-08 12:45:20', '1', 'Ekrani:MBI 6\"<br>\r\nTipi i ekranit:Retina<br>\r\nRAM:4 GB<br>\r\nMemorja:64 GB<br>\r\nProcesori:HEXA-CORE<br>\r\nLloji i rrjetit:4G<br>\r\nPesha (g):194<br>\r\nKarta e memories:JO<br>'),
(47, 'Apple iPhone 12', 'Modeli me i ri nga Apple. Ekran i ri qe shkon deri ne limit te skajeve shoqeruar me mbrojtje qeramike.', 129900.00, 'uploads/60212536cb66e4.77711552.jpg', 'apple', '2021-02-08 12:49:10', '2021-02-08 12:49:10', '1', 'Ekrani:MBI 6\"<br>\r\nTipi i ekranit:Retina<br>\r\nRAM:4 GB<br>\r\nMemorja:64 GB<br>\r\nProcesori:HEXA-CORE<br>\r\nLloji i rrjetit:4G<br>\r\nPesha (g):194<br>\r\nKarta e memories:JO<br>'),
(48, 'Apple iPhone SE (2020)', 'Phone i ri SE 2020 eshte i pajisur me kamera me te perparuar 12MP.', 73500.00, 'uploads/6021257c025ed3.35570853.jpg', 'apple', '2021-02-08 12:50:20', '2021-02-08 12:50:20', '1', 'Ekrani:MBI 6\"<br>\r\nTipi i ekranit:Retina<br>\r\nRAM:4 GB<br>\r\nMemorja:64 GB<br>\r\nProcesori:HEXA-CORE<br>\r\nLloji i rrjetit:4G<br>\r\nPesha (g):194<br>\r\nKarta e memories:JO<br>'),
(49, 'Samsung Galaxy S21 Ultra 5G', 'Njihuni me Galaxy S21 Ultra. Me revolucionarin 8K Video Snap qe ndryshon menyren sesi kapni jo vetem videon, por edhe fotografine', 132500.00, 'uploads/602125e619ec58.32369072.jpg', 'samsung', '2021-02-08 12:52:06', '2021-02-08 12:52:06', '1', 'Ekrani:MBI 6\"<br>\r\nTipi i ekranit:Retina<br>\r\nRAM:4 GB<br>\r\nMemorja:64 GB<br>\r\nProcesori:HEXA-CORE<br>\r\nLloji i rrjetit:4G<br>\r\nPesha (g):194<br>\r\nKarta e memories:JO<br>'),
(50, 'Samsung 2', 'Kamera me 3 lente,  12MP + 64MP + 12MP   ', 1120.00, 'uploads/60264a1e645519.85525977.jpg', 'samsung', '2021-02-08 12:53:20', '2021-02-12 10:27:58', '1', 'Ekrani:MBI 6\"<br>\r\nTipi i ekranit:Retina<br>\r\nRAM:4 GB<br>\r\nMemorja:64 GB<br>\r\nProcesori:HEXA-CORE<br>\r\nLloji i rrjetit:4G<br>\r\nPesha (g):194<br>\r\nKarta e memories:JO<br>'),
(52, 'LG', 'Watch Movies¹, videos and sports while navigating, researching, \r\ncommunicating and more.', 122555.00, 'uploads/602128c698d2b9.95577415.jpg', 'lg', '2021-02-08 12:58:23', '2021-02-08 13:04:22', '1', 'Ultimate multi-tasking with the LG Dual Screen™ 6.8\" <br>\r\nOLED Display 8K Video RecordingTriple<br>\r\n Camera System: 64 MP Standard, <br>\r\n13 MP Ultra-Wide, Z-Camera All-Day<br>\r\n 5,000 mAh Battery 5G Connectivity<br>'),
(51, 'Samsung Galaxy S20 FE 5G', 'Ky telefon është për njerëzit që i duan të gjitha. Ky është telefoni i krijuar posaçërisht për çdo të apasionuar', 69900.00, 'uploads/6021264c1fce16.69145460.jpg', 'samsung', '2021-02-08 12:53:48', '2021-02-08 12:53:48', '1', 'Ekrani:MBI 6\"<br>\r\nTipi i ekranit:Retina<br>\r\nRAM:4 GB<br>\r\nMemorja:64 GB<br>\r\nProcesori:HEXA-CORE<br>\r\nLloji i rrjetit:4G<br>\r\nPesha (g):194<br>\r\nKarta e memories:JO<br>'),
(53, 'Airpods Pro', 'Anullim zhurme aktiv per eksperience te paharruar.', 24900.00, 'uploads/602127f3996da8.94283943.jpg', 'akseskore', '2021-02-08 13:00:51', '2021-02-08 13:00:51', '1', 'Transparency mode<br>\r\nAdaptive EQ<br>\r\nVent system for pressure equalization<br>\r\nCustom high-excursion Apple driver<br>\r\nCustom high dynamic range amplifier<br>\r\nSENSORS<br>\r\nDual beamforming microphones<br>\r\nInward-facing microphone<br>\r\nDual optical sensors<br>\r\n'),
(55, 'Asus Power Bank ', '10050mAh', 25000.00, 'uploads/602128b66b7165.03541661.jpg', 'aksesore', '2021-02-08 13:04:06', '2021-02-08 13:04:06', '1', 'Asus Power Bank 10050mAh\r\n'),
(54, 'Baseus SiliconeCase for Airpods', ' Protective Case', 1500.00, 'uploads/6021282dcf8ca3.15011178.jpg', 'aksesore', '2021-02-08 13:01:49', '2021-02-08 13:01:49', '1', 'Baseus Silicone Protective Case for Airpods\r\nBaseus Silicone Protective Case for Airpods\r\nBaseus Silicone Protective Case for Airpods'),
(56, 'Karikues per iPhone', 'Karikues Origjinal per iPhone (Koke+ Fishe Karikim) \r\n', 25000.00, 'uploads/6021298d3c8870.28677885.jpg', 'aksesore', '2021-02-08 13:07:41', '2021-02-08 13:07:41', '1', 'Model: Apple<br>\r\nWeight:0.00kg<br>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikuj_porositur`
--
ALTER TABLE `artikuj_porositur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`porosi_id`);

--
-- Indexes for table `klientet`
--
ALTER TABLE `klientet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porosite`
--
ALTER TABLE `porosite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`klient_id`);

--
-- Indexes for table `produktet`
--
ALTER TABLE `produktet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikuj_porositur`
--
ALTER TABLE `artikuj_porositur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `klientet`
--
ALTER TABLE `klientet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `porosite`
--
ALTER TABLE `porosite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produktet`
--
ALTER TABLE `produktet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
