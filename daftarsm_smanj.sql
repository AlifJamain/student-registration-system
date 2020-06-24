-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2019 at 09:11 AM
-- Server version: 10.3.18-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarsm_smanj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_koko`
--

CREATE TABLE `daftar_koko` (
  `IdKoko` int(255) NOT NULL,
  `TahunKoko1` varchar(255) DEFAULT NULL,
  `SekolahKoko1` varchar(255) DEFAULT NULL,
  `KelabPersatuanKoko1` varchar(255) DEFAULT NULL,
  `JawatanKoko1` varchar(255) DEFAULT NULL,
  `TahunKoko2` varchar(255) DEFAULT NULL,
  `SekolahKoko2` varchar(255) DEFAULT NULL,
  `KelabPersatuanKoko2` varchar(255) DEFAULT NULL,
  `JawatanKoko2` varchar(255) DEFAULT NULL,
  `TahunKoko3` varchar(255) DEFAULT NULL,
  `SekolahKoko3` varchar(255) DEFAULT NULL,
  `KelabPersatuanKoko3` varchar(255) DEFAULT NULL,
  `JawatanKoko3` varchar(255) DEFAULT NULL,
  `TahunKoko6` varchar(255) DEFAULT NULL,
  `AcaraKoko1` varchar(255) DEFAULT NULL,
  `PencapaianKoko1` varchar(255) DEFAULT NULL,
  `TahunKoko7` varchar(255) DEFAULT NULL,
  `AcaraKoko2` varchar(255) DEFAULT NULL,
  `PencapaianKoko2` varchar(255) DEFAULT NULL,
  `TahunKoko8` varchar(255) DEFAULT NULL,
  `AcaraKoko3` varchar(255) DEFAULT NULL,
  `PencapaianKoko3` varchar(255) DEFAULT NULL,
  `pemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_koko`
--

INSERT INTO `daftar_koko` (`IdKoko`, `TahunKoko1`, `SekolahKoko1`, `KelabPersatuanKoko1`, `JawatanKoko1`, `TahunKoko2`, `SekolahKoko2`, `KelabPersatuanKoko2`, `JawatanKoko2`, `TahunKoko3`, `SekolahKoko3`, `KelabPersatuanKoko3`, `JawatanKoko3`, `TahunKoko6`, `AcaraKoko1`, `PencapaianKoko1`, `TahunKoko7`, `AcaraKoko2`, `PencapaianKoko2`, `TahunKoko8`, `AcaraKoko3`, `PencapaianKoko3`, `pemid`) VALUES
(1, '2019', 'SK POLIS KEM', 'KELAB AGAMA ISLAM', 'BENDAHARI', '2019', 'SK POLIS KEM', 'KADET REMAJA SEKOLAH', 'AHLI', '2019', 'SK POLIS KEM', 'RAGBI', 'AHLI', '2019', 'BERZANJI', 'NAIB JOHAN', '2019', 'NASYID', 'JOHAN', '2019', 'TILAWAH AL QURAN', 'KETIGA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_muatnaik`
--

CREATE TABLE `daftar_muatnaik` (
  `IdMuatNaik` int(255) NOT NULL,
  `PemAsrama` varchar(5) DEFAULT NULL,
  `JarakAsrama` varchar(255) DEFAULT NULL,
  `pemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_muatnaik`
--

INSERT INTO `daftar_muatnaik` (`IdMuatNaik`, `PemAsrama`, `JarakAsrama`, `pemid`) VALUES
(1, 'Ya', 'Lebih 10KM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pemohon`
--

CREATE TABLE `daftar_pemohon` (
  `IdDaftar` int(255) NOT NULL,
  `finalTahun` varchar(255) DEFAULT NULL,
  `finalBacaan` varchar(10) DEFAULT NULL,
  `finalHafazan` varchar(10) DEFAULT NULL,
  `finalTauhid` varchar(10) DEFAULT NULL,
  `finalIbadat` varchar(10) DEFAULT NULL,
  `finalAkhlak` varchar(10) DEFAULT NULL,
  `finalSirah` varchar(10) DEFAULT NULL,
  `finalArab` varchar(10) DEFAULT NULL,
  `finalTajwid` varchar(10) DEFAULT NULL,
  `finalTafsir` varchar(10) DEFAULT NULL,
  `finalMuamalat` varchar(10) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `upkkTahun` varchar(255) DEFAULT NULL,
  `upkkAngka` varchar(10) DEFAULT NULL,
  `upkkAmaliSolat` varchar(10) DEFAULT NULL,
  `upkkCaraHidup` varchar(10) DEFAULT NULL,
  `upkkQuran` varchar(10) DEFAULT NULL,
  `upkkSirah` varchar(10) DEFAULT NULL,
  `upkkAkhlak` varchar(10) DEFAULT NULL,
  `upkkSyariah` varchar(10) DEFAULT NULL,
  `upkkJawi` varchar(10) DEFAULT NULL,
  `upkkLughatul` varchar(10) DEFAULT NULL,
  `pemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_pemohon`
--

INSERT INTO `daftar_pemohon` (`IdDaftar`, `finalTahun`, `finalBacaan`, `finalHafazan`, `finalTauhid`, `finalIbadat`, `finalAkhlak`, `finalSirah`, `finalArab`, `finalTajwid`, `finalTafsir`, `finalMuamalat`, `output`, `upkkTahun`, `upkkAngka`, `upkkAmaliSolat`, `upkkCaraHidup`, `upkkQuran`, `upkkSirah`, `upkkAkhlak`, `upkkSyariah`, `upkkJawi`, `upkkLughatul`, `pemid`) VALUES
(1, '2019', '60', '40', '100', '100', '100', '100', '100', '100', '100', '100', '100.0', '2018', 'JC102K2014', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penjaga`
--

CREATE TABLE `daftar_penjaga` (
  `IdPenjaga` int(255) NOT NULL,
  `KhatamQuran` varchar(5) DEFAULT NULL,
  `BilJuzukQuran` varchar(255) DEFAULT NULL,
  `BilSurahQuran` varchar(255) DEFAULT NULL,
  `NamaPenjaga` varchar(255) DEFAULT NULL,
  `KadPengenalanPenjaga` varchar(12) DEFAULT NULL,
  `TelefonPenjaga` varchar(12) DEFAULT NULL,
  `AlamatPenjaga` varchar(255) DEFAULT NULL,
  `pemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penjaga`
--

INSERT INTO `daftar_penjaga` (`IdPenjaga`, `KhatamQuran`, `BilJuzukQuran`, `BilSurahQuran`, `NamaPenjaga`, `KadPengenalanPenjaga`, `TelefonPenjaga`, `AlamatPenjaga`, `pemid`) VALUES
(1, 'Ya', '2', '21', 'JAMAIN BIN SAIKON ', '650226015489', '0177842821', 'C18, JALAN KIAMBANG, KAMPUNG RAHMAT, 81030, KULAI, JOHOR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelayakan`
--

CREATE TABLE `kelayakan` (
  `IdKelayakan` int(255) NOT NULL,
  `upsrTahun` varchar(4) DEFAULT NULL,
  `upsrAngka` varchar(255) DEFAULT NULL,
  `PPSR` varchar(255) DEFAULT NULL,
  `upsrPemahamanBM` varchar(1) DEFAULT NULL,
  `upsrPenulisanBM` varchar(1) DEFAULT NULL,
  `upsrPemahamanBI` varchar(1) DEFAULT NULL,
  `upsrPenulisanBI` varchar(1) DEFAULT NULL,
  `upsrMath` varchar(1) DEFAULT NULL,
  `upsrSains` varchar(1) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `SekolahKelayakan1` varchar(255) DEFAULT NULL,
  `SekolahKelayakan2` varchar(255) DEFAULT NULL,
  `TemudugaKelayakan` varchar(255) DEFAULT NULL,
  `TarikhTemuduga` varchar(255) DEFAULT NULL,
  `HariTemuduga` varchar(255) DEFAULT NULL,
  `pemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelayakan`
--

INSERT INTO `kelayakan` (`IdKelayakan`, `upsrTahun`, `upsrAngka`, `PPSR`, `upsrPemahamanBM`, `upsrPenulisanBM`, `upsrPemahamanBI`, `upsrPenulisanBI`, `upsrMath`, `upsrSains`, `output`, `SekolahKelayakan1`, `SekolahKelayakan2`, `TemudugaKelayakan`, `TarikhTemuduga`, `HariTemuduga`, `pemid`) VALUES
(1, '2019', 'JJ021K113', '6A', '5', '5', '5', '5', '5', '5', '30', 'SMA Kerajaan Johor, Kluang', 'Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)', 'SMA Kerajaan Johor, Kluang', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `markah`
--

CREATE TABLE `markah` (
  `IdMarkah` int(255) NOT NULL,
  `HafazanMarkah` varchar(255) DEFAULT NULL,
  `BertulisMarkah` varchar(255) DEFAULT NULL,
  `LisanMarkah` varchar(255) DEFAULT NULL,
  `QuranMarkah` varchar(255) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `pemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markah`
--

INSERT INTO `markah` (`IdMarkah`, `HafazanMarkah`, `BertulisMarkah`, `LisanMarkah`, `QuranMarkah`, `output`, `pemid`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `IdPemohon` int(255) NOT NULL,
  `NamaPemohon` varchar(255) NOT NULL,
  `KadPengenalanPemohon` varchar(12) NOT NULL,
  `KataLaluanPemohon` varchar(8) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`IdPemohon`, `NamaPemohon`, `KadPengenalanPemohon`, `KataLaluanPemohon`, `Status`) VALUES
(1, 'MUHAMMAD ALIF FARIQ BIN JAMAIN', '961213235085', 'ALIF1996', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` int(255) NOT NULL,
  `NamaPengguna` varchar(255) NOT NULL,
  `KataLaluanPengguna` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `NamaPengguna`, `KataLaluanPengguna`, `Role`, `Status`) VALUES
(1, 'Maahad Tahfiz Negeri Johor', 'Maahad Tahfiz Negeri Johor', 'Maahad Tahfiz Negeri Johor', 1),
(3, 'SMA Kerajaan Johor, Kluang', 'SMA Kerajaan Johor, Kluang', 'SMA Kerajaan Johor, Kluang', 1),
(4, 'Maahad Johor Lilbanat (SMAKJ)', 'Maahad Johor Lilbanat (SMAKJ)', 'Maahad Johor Lilbanat (SMAKJ)', 1),
(5, 'SMA Parit Raja', 'SMA Parit Raja', 'SMA Parit Raja', 1),
(6, 'Maahad Pontian', 'Maahad Pontian', 'Maahad Pontian', 1),
(7, 'SMA Bugisiah, Tampok', 'SMA Bugisiah, Tampok', 'SMA Bugisiah, Tampok', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `daftar_koko`
--
ALTER TABLE `daftar_koko`
  ADD PRIMARY KEY (`IdKoko`);

--
-- Indexes for table `daftar_muatnaik`
--
ALTER TABLE `daftar_muatnaik`
  ADD PRIMARY KEY (`IdMuatNaik`);

--
-- Indexes for table `daftar_pemohon`
--
ALTER TABLE `daftar_pemohon`
  ADD PRIMARY KEY (`IdDaftar`);

--
-- Indexes for table `daftar_penjaga`
--
ALTER TABLE `daftar_penjaga`
  ADD PRIMARY KEY (`IdPenjaga`);

--
-- Indexes for table `kelayakan`
--
ALTER TABLE `kelayakan`
  ADD PRIMARY KEY (`IdKelayakan`);

--
-- Indexes for table `markah`
--
ALTER TABLE `markah`
  ADD PRIMARY KEY (`IdMarkah`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`IdPemohon`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_koko`
--
ALTER TABLE `daftar_koko`
  MODIFY `IdKoko` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_muatnaik`
--
ALTER TABLE `daftar_muatnaik`
  MODIFY `IdMuatNaik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_pemohon`
--
ALTER TABLE `daftar_pemohon`
  MODIFY `IdDaftar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_penjaga`
--
ALTER TABLE `daftar_penjaga`
  MODIFY `IdPenjaga` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `IdKelayakan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `markah`
--
ALTER TABLE `markah`
  MODIFY `IdMarkah` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `IdPemohon` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `IdPengguna` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
