-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2019 pada 14.48
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_panitia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_event`
--

CREATE TABLE `form_event` (
  `KODE_EVENTS` varchar(50) NOT NULL,
  `IS_DELETED` int(11) DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `JUDUL_ACARA` varchar(100) DEFAULT NULL,
  `DETAIL_ACARA` text,
  `WEBSITE` varchar(50) DEFAULT NULL,
  `LOKASI` varchar(100) DEFAULT NULL,
  `WAKTU_MULAI` datetime DEFAULT NULL,
  `WAKTU_AKHIR` datetime DEFAULT NULL,
  `AGENDA` text,
  `NAMA_CP` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `NOHP` bigint(13) UNSIGNED ZEROFILL DEFAULT NULL,
  `STATUS_EVENT` enum('FREE','PAID') DEFAULT NULL,
  `HARGA` int(11) DEFAULT '0',
  `NAMA_BANK` varchar(50) DEFAULT NULL,
  `NAMA_REKENING` varchar(100) DEFAULT NULL,
  `NOMOR_REKENING` int(11) DEFAULT NULL,
  `ID_MINAT` int(11) NOT NULL,
  `FLAYER` text,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_event`
--

INSERT INTO `form_event` (`KODE_EVENTS`, `IS_DELETED`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `JUDUL_ACARA`, `DETAIL_ACARA`, `WEBSITE`, `LOKASI`, `WAKTU_MULAI`, `WAKTU_AKHIR`, `AGENDA`, `NAMA_CP`, `EMAIL`, `NOHP`, `STATUS_EVENT`, `HARGA`, `NAMA_BANK`, `NAMA_REKENING`, `NOMOR_REKENING`, `ID_MINAT`, `FLAYER`, `STATUS`) VALUES
('EVT0000', 0, 1, '2019-11-01 20:23:40', NULL, NULL, 'BCI EQUINOX JAKARTA 2019', '<p>To see what BCI Equinox is like,&nbsp;<a href=\"https://www.youtube.com/watch?v=lOYG_AMXuLo\" target=\"_blank\">click here</a>&nbsp;to see our time lapse video from an Equinox event in Asia.</p>\r\n\r\n<p>Registration is free and easy - simply click on the Register button and follow the prompts<strong>.</strong></p>\r\n', 'https://bit.ly/326JJxk', 'The Hall\r\nSenayan City 8th Floor\r\nJl. Asia Afrika Lot 19\r\nJakarta 10270', '2019-11-22 06:00:01', '2019-11-22 10:00:01', 'https___cdn_evbuc_com_images_72532059_183430307547_1_original.jpg', 'Noor Alizah', 'nooralizahar@gmail.com', 0008946543434, 'FREE', 0, '', '', 0, 3, 'eqjktverticalposter01.jpg', 1),
('EVT0001', 0, 1, '2019-11-01 20:30:52', 1, '2019-11-01 20:33:09', 'DevSecOps Professional Course - Practical DevSecOps', '<p><strong>Practical DevSecOps&#39;s DevSecOps Expert course</strong></p>\r\n\r\n<p>Duration</p>\r\n\r\n<p>3 days, 8 hours of training per day</p>\r\n\r\n<p>Objective</p>\r\n\r\n<p>We all have heard about DevSecOps, Shifting Left, Rugged DevOps but there are no clear examples or frameworks available for security professionals to implement in their organization. This hands-on course will teach you exactly that, tools and techniques to embed security as part of DevOps pipeline. We will learn how unicorns like Google, Facebook, Amazon, Etsy handle security at scale and what we can learn from them to mature our security programs.</p>\r\n\r\n<p>Abstract</p>\r\n\r\n<p>Ever wondered how to handle deluge of security issues and reduce cost of fixing before software goes to production ? How unicorns like Google, Facebook, Amazon, Etsy handle security at scale? In Practical DevSecOps training you will learn how to handle security at scale using DevSecOps practices. We will start o? with the basics of the DevOps, DevSecOps and move towards advanced concepts such as Security as Code, Compliance as Code, Con?guration management, Infrastructure as code etc.,</p>\r\n\r\n<p>The training will be based on DevSecOps Studio, a distribution for DevSecOps enthusiasts. We will cover real-world DevSecOps tools and practices in order to obtain an in-depth understanding of the concepts learnt as part of the course.</p>\r\n\r\n<p>We will also cover how to use static analysis (SAST), Dynamic Analysis (DAST), OS hardening and Security Monitoring as part of the Secure SDLC and how to select tools which fit your organization needs and culture. After the training, the students will be able to successfully hack and secure applications before hackers do.</p>\r\n\r\n<p>Syllabus</p>\r\n\r\n<ol>\r\n	<li>Overview of DevSecOps</li>\r\n	<li>Overview to the Tools of the trade</li>\r\n	<li>Overview SDLC and CI/CD pipeline</li>\r\n	<li>Security Requirements and Threat Modelling (TM)</li>\r\n	<li>Static Analysis(SAST) in CI/CD pipeline</li>\r\n	<li>Dynamic Analysis(DAST) in CI/CD pipeline</li>\r\n	<li>Runtime Analysis(RASP/IAST) in CI/CD pipeline</li>\r\n	<li>Infrastructure as Code(IaC) and Its Security</li>\r\n	<li>Container (Docker) Security</li>\r\n	<li>Secrets management on mutable and immutable infra</li>\r\n	<li>Vulnerability Management with custom tools</li>\r\n</ol>\r\n\r\n<p>What students will be provided</p>\r\n\r\n<p>The students will be provided with</p>\r\n\r\n<ol>\r\n	<li>Training manuals and lab guide</li>\r\n	<li>Tools used during the course</li>\r\n	<li>30 days online lab setup</li>\r\n	<li>CDE certification attempt</li>\r\n	<li>Access to slack channel</li>\r\n</ol>\r\n\r\n<p>What will students learn</p>\r\n\r\n<ol>\r\n	<li>Start or mature your application security program using DevOps practices</li>\r\n	<li>Learn how to co-relate vulnerabilities to scale false positive analysis using automated tools.</li>\r\n	<li>Harden infrastructure using Infrastructure as Code and maintain compliance using Compliance as Code tools and techniques.</li>\r\n</ol>\r\n\r\n<p>Who should take this course</p>\r\n\r\n<p>This course is aimed at anyone who is looking to embed security as part of agile/cloud/DevOps environments:</p>\r\n\r\n<ol>\r\n	<li>Security Professionals</li>\r\n	<li>Penetration Testers</li>\r\n	<li>IT managers</li>\r\n	<li>Developers</li>\r\n	<li>DevOps Engineers</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Student Requirements</p>\r\n\r\n<ol>\r\n	<li>The student should have some knowledge of running basic linux commands like ls, cd, mkdir etc.,</li>\r\n	<li>The student should have some basic understanding of application Security practices like OWASP Top 10 though not a necessity.</li>\r\n</ol>\r\n\r\n<p>Software and Hardware Requirements</p>\r\n\r\n<ol>\r\n	<li>Our state of the lab is deployed on AWS so you would need the following to connect to the lab environment.</li>\r\n	<li>Laptop with decent specs atleast 4GB of RAM and a modern CPU to login into our lab VPN.</li>\r\n	<li>Administrator access to install software like VirtualBox, VPN client and change BIOS settings to enable virtualisation.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>About Trainer</p>\r\n\r\n<p>Mohammed A. &quot;secfigo&quot; Imran&nbsp;is the Founder of Practical DevSecOps, a DevSecOps Training and Certification company. He has extensive experience in building and improving multiple organization&#39;s Information Security Programs. He has a diverse background in R&amp;D, consulting and product-based industries with a passion to solve complex security programs. Imran is the founder of Null Singapore, the largest information security community in Singapore where he has organised more than 60 events &amp; workshops to spread security awareness. He was also nominated as a community star for being the go-to person in the community whose contribution and knowledge sharing has helped many professionals in the security industry. He is usually seen speaking in conferences like Blackhat, DevSecCon, Null and OWASP chapters</p>\r\n', 'https://www.practical-devsecops.com/certified-devs', 'JS Luwansa\r\nKav. C-22 Jalan Haji R. Rasuna Said\r\nKecamatan Setiabudi, Jakarta 12940', '2019-11-12 06:00:53', '2019-11-13 18:00:53', 'https___cdn_evbuc_com_images_72225711_333415064681_1_original.jpg', 'Noor Alizah', 'nooralizahar@gmail.com', 0008965463534, 'PAID', 12000000, 'BCA', 'NOOR ALIZAH', 43554354, 9, '714MiCqPUnL.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_invoice`
--

CREATE TABLE `form_invoice` (
  `ID_INVOICE` int(50) NOT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `KODE_EVENTS` varchar(10) DEFAULT NULL,
  `NILAI_INVOICE` bigint(20) DEFAULT NULL,
  `NAMA_BANK` varchar(20) DEFAULT NULL,
  `NAMA_REKENING` varchar(100) DEFAULT NULL,
  `NO_REKENING` bigint(20) DEFAULT NULL,
  `INVOICE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_invoice`
--

INSERT INTO `form_invoice` (`ID_INVOICE`, `CREATED_BY`, `CREATED_DATE`, `KODE_EVENTS`, `NILAI_INVOICE`, `NAMA_BANK`, `NAMA_REKENING`, `NO_REKENING`, `INVOICE`) VALUES
(1, 1, '2019-11-01 20:34:20', 'EVT0000', 120000000, 'BCA', 'NOOR ALIZAH', 654655, '5__Pengenalan_LINUX.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_minat`
--

CREATE TABLE `form_minat` (
  `ID_MINAT` int(11) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_minat`
--

INSERT INTO `form_minat` (`ID_MINAT`, `JUDUL`) VALUES
(1, 'Hiburan'),
(2, 'Teknologi'),
(3, 'Seminar'),
(4, 'Olahraga'),
(5, 'Hiburan'),
(6, 'Produk'),
(7, 'Jasa'),
(8, 'Olah raga'),
(9, 'Pendidikan'),
(10, 'Seminar'),
(11, 'Usaha'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pembayaran`
--

CREATE TABLE `form_pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `NAMA_BANK` varchar(50) DEFAULT NULL,
  `NO_REKENING` bigint(20) DEFAULT NULL,
  `NAMA_REKENING` varchar(100) DEFAULT NULL,
  `BUKTI_TRANSFER` text,
  `ID_PENDAFTARAN` int(11) DEFAULT NULL,
  `STATUS_PEMBAYARAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_pembayaran`
--

INSERT INTO `form_pembayaran` (`ID_PEMBAYARAN`, `NAMA_BANK`, `NO_REKENING`, `NAMA_REKENING`, `BUKTI_TRANSFER`, `ID_PENDAFTARAN`, `STATUS_PEMBAYARAN`) VALUES
(1, NULL, NULL, NULL, NULL, 1, '1'),
(2, 'BCA', 43554354, 'NOOR ALIZAH', 'cv3.PNG', 2, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pendaftaran`
--

CREATE TABLE `form_pendaftaran` (
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `ID_PESERTA` int(11) NOT NULL,
  `KODE_EVENTS` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_pendaftaran`
--

INSERT INTO `form_pendaftaran` (`ID_PENDAFTARAN`, `ID_PESERTA`, `KODE_EVENTS`, `STATUS`) VALUES
(1, 1, 'EVT0000', '1'),
(2, 1, 'EVT0001', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_eo`
--

CREATE TABLE `user_eo` (
  `ID_EO` int(11) NOT NULL,
  `NAMA_EO` varchar(100) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NAMA_CP` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NOHP` bigint(13) UNSIGNED ZEROFILL NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `IS_DELETED` int(11) DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_eo`
--

INSERT INTO `user_eo` (`ID_EO`, `NAMA_EO`, `ALAMAT`, `NAMA_CP`, `EMAIL`, `NOHP`, `USERNAME`, `PASSWORD`, `IS_DELETED`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Noor Alizah', 'Depok', 'Noor ALizah', 'nooralizahar@gmail.com', 0089382943988, 'nooralizahar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_participant`
--

CREATE TABLE `user_participant` (
  `ID_PESERTA` int(11) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NOHP` bigint(13) UNSIGNED ZEROFILL NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` text NOT NULL,
  `JENIS_KELAMIN` varchar(10) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `STATUS_PERNIKAHAN` varchar(50) DEFAULT NULL,
  `PEKERJAAN` varchar(100) DEFAULT NULL,
  `PENDAPATAN` varchar(100) DEFAULT NULL,
  `ID_MINAT` int(11) DEFAULT NULL,
  `IS_DELETED` int(11) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_participant`
--

INSERT INTO `user_participant` (`ID_PESERTA`, `NAMA`, `EMAIL`, `NOHP`, `USERNAME`, `PASSWORD`, `JENIS_KELAMIN`, `TGL_LAHIR`, `STATUS_PERNIKAHAN`, `PEKERJAAN`, `PENDAPATAN`, `ID_MINAT`, `IS_DELETED`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Noor Alizah', 'nooralizah25@gmail.com', 0089382949328, 'nooralizah25@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'P', '2000-09-25', 'Single', 'Lainnya', '> Rp 2.500.000', 1, 0, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form_event`
--
ALTER TABLE `form_event`
  ADD PRIMARY KEY (`KODE_EVENTS`),
  ADD KEY `ID_MINAT` (`ID_MINAT`);

--
-- Indeks untuk tabel `form_invoice`
--
ALTER TABLE `form_invoice`
  ADD PRIMARY KEY (`ID_INVOICE`),
  ADD KEY `ID_PEMBAYARAN` (`KODE_EVENTS`);

--
-- Indeks untuk tabel `form_minat`
--
ALTER TABLE `form_minat`
  ADD PRIMARY KEY (`ID_MINAT`);

--
-- Indeks untuk tabel `form_pembayaran`
--
ALTER TABLE `form_pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `ID_PENDAFTARAN` (`ID_PENDAFTARAN`);

--
-- Indeks untuk tabel `form_pendaftaran`
--
ALTER TABLE `form_pendaftaran`
  ADD PRIMARY KEY (`ID_PENDAFTARAN`);

--
-- Indeks untuk tabel `user_eo`
--
ALTER TABLE `user_eo`
  ADD PRIMARY KEY (`ID_EO`);

--
-- Indeks untuk tabel `user_participant`
--
ALTER TABLE `user_participant`
  ADD PRIMARY KEY (`ID_PESERTA`),
  ADD KEY `ID_MINAT` (`ID_MINAT`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_invoice`
--
ALTER TABLE `form_invoice`
  MODIFY `ID_INVOICE` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_minat`
--
ALTER TABLE `form_minat`
  MODIFY `ID_MINAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `form_pembayaran`
--
ALTER TABLE `form_pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `form_pendaftaran`
--
ALTER TABLE `form_pendaftaran`
  MODIFY `ID_PENDAFTARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_eo`
--
ALTER TABLE `user_eo`
  MODIFY `ID_EO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_participant`
--
ALTER TABLE `user_participant`
  MODIFY `ID_PESERTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
