-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2017 pada 00.54
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `proyek_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_surat`
--

CREATE TABLE IF NOT EXISTS `berkas_surat` (
  `idSurat` int(11) NOT NULL AUTO_INCREMENT,
  `alamatOrangTua` varchar(100) NOT NULL,
  `kotaOrangTua` varchar(200) NOT NULL,
  `hariPertemuan` varchar(10) NOT NULL,
  `jamPertemuan` varchar(25) NOT NULL,
  `tanggalPertemuan` date NOT NULL,
  `idSiswa` varchar(20) NOT NULL,
  `berkas` varchar(300) NOT NULL,
  `tanggalSurat` date NOT NULL,
  PRIMARY KEY (`idSurat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `berkas_surat`
--

INSERT INTO `berkas_surat` (`idSurat`, `alamatOrangTua`, `kotaOrangTua`, `hariPertemuan`, `jamPertemuan`, `tanggalPertemuan`, `idSiswa`, `berkas`, `tanggalSurat`) VALUES
(35, ' Jln. Telekomunikasi No. 1', 'Bandung', 'kamis', '10:00', '2017-07-20', '670111', '', '0000-00-00'),
(36, ' Jln. Telekomunikasi No. 1', 'Bandung', 'Rabu', '10:00', '2017-07-19', '670111', '', '0000-00-00'),
(39, ' Jln. Telekomunikasi No. 1', 'Bandung', 'kamis', '19:00', '2017-07-13', '670111', '', '2017-07-07'),
(40, ' Jln. Telekomunikasi No. 1', 'Bandung', 'kamis', '10:00', '2017-07-13', '670111', '', '2017-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `idTamu` int(11) NOT NULL AUTO_INCREMENT,
  `namaTamu` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggalTamu` date NOT NULL,
  `jamTamu` time NOT NULL,
  `hubunganTamu` varchar(25) NOT NULL,
  `namaSiswa` varchar(100) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `keperluan` text NOT NULL,
  PRIMARY KEY (`idTamu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`idTamu`, `namaTamu`, `alamat`, `tanggalTamu`, `jamTamu`, `hubunganTamu`, `namaSiswa`, `kelas`, `keperluan`) VALUES
(3, 'Faisal Ahmad Nurseno', 'Jln. Nusantara 1/7, Juanda - Sidoarjo', '2017-05-17', '00:00:00', 'Ayah', 'Ibnu Fanhar Nur Fadhillah', 'X MIA 1', 'Panggilan orang tua karena keterlambatan\r\n\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_orangtua`
--

CREATE TABLE IF NOT EXISTS `data_orangtua` (
  `idOrangTua` int(11) NOT NULL AUTO_INCREMENT,
  `namaOrangTua` varchar(100) NOT NULL,
  `idSiswa` varchar(20) NOT NULL,
  `alamatOrangTua` varchar(100) NOT NULL,
  `kotaOrangTua` varchar(50) NOT NULL,
  `provinsiOrangTua` varchar(50) NOT NULL,
  `noTlpOrangTua` varchar(20) NOT NULL,
  `noHpOrangTua` varchar(20) NOT NULL,
  PRIMARY KEY (`idOrangTua`),
  KEY `idSiswa` (`idSiswa`),
  KEY `idSiswa_2` (`idSiswa`),
  KEY `namaOrangTua` (`namaOrangTua`),
  KEY `noHpOrangTua` (`noHpOrangTua`),
  KEY `idSiswa_3` (`idSiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data untuk tabel `data_orangtua`
--

INSERT INTO `data_orangtua` (`idOrangTua`, `namaOrangTua`, `idSiswa`, `alamatOrangTua`, `kotaOrangTua`, `provinsiOrangTua`, `noTlpOrangTua`, `noHpOrangTua`) VALUES
(42, 'Parto', '670112', 'Jln. Telekomunikasi No. 2', 'bandung', 'Jawa Barat', '81227288299', '81223944'),
(43, 'Suep', '670113', 'Jln. Telekomunikasi No. 3', 'bandung', 'Jawa Barat', '81227288299', '81223944'),
(44, 'Suhartini', '670114', 'Jln. Telekomunikasi No. 4', 'bandung', 'Jawa Barat', '81227288299', '81223944'),
(45, 'Abdul Ghani', '670115', 'Jln. Telekomunikasi No. 5', 'bandung', 'Jawa Barat', '81227288299', '81223944'),
(46, 'Atep', '670111', ' Jln. Telekomunikasi No. 1', 'Bandung', 'Jawa Barat', '031967899', '+6282233559499');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggaran`
--

CREATE TABLE IF NOT EXISTS `data_pelanggaran` (
  `idPelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `idSiswa` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jenisPelanggaran` varchar(25) NOT NULL,
  `jamPelanggaran` time NOT NULL,
  `tanggalPelanggaran` date NOT NULL,
  `deskripsiPelanggaran` text NOT NULL,
  `poinPelanggaran` int(10) NOT NULL,
  PRIMARY KEY (`idPelanggaran`),
  KEY `idSiswa` (`idSiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `data_pelanggaran`
--

INSERT INTO `data_pelanggaran` (`idPelanggaran`, `idSiswa`, `kelas`, `jenisPelanggaran`, `jamPelanggaran`, `tanggalPelanggaran`, `deskripsiPelanggaran`, `poinPelanggaran`) VALUES
(26, '670111', '', 'Larangan Siswa', '06:54:49', '2017-06-20', 'Menyerang atau memukul guru dan atau karyawan sekolah', 40),
(27, '670112', '', 'Kerajinan', '08:33:12', '2017-06-20', 'Datang terlambat > 30 menit', 2),
(29, '670111', '', 'Kerapihan', '10:49:10', '2017-06-20', 'Bentuk seragam tidak sesuai aturan sekolah / aturan yang di tentukan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurubk`
--

CREATE TABLE IF NOT EXISTS `gurubk` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gurubk`
--

INSERT INTO `gurubk` (`username`, `password`, `nama`) VALUES
('gurubk', 'gurubk', 'Yanie Soesanti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `idHistory` int(20) NOT NULL AUTO_INCREMENT,
  `idSiswa` varchar(20) NOT NULL,
  `idPelanggaran` int(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jenisPelanggaran` varchar(25) NOT NULL,
  `jamPelanggaran` time NOT NULL,
  `tanggalPelanggaran` date NOT NULL,
  `deskripsiPelanggaran` text NOT NULL,
  `poinPelanggaran` int(10) NOT NULL,
  PRIMARY KEY (`idHistory`),
  KEY `idSiswa` (`idSiswa`),
  KEY `idPelanggaran` (`idPelanggaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`idHistory`, `idSiswa`, `idPelanggaran`, `kelas`, `jenisPelanggaran`, `jamPelanggaran`, `tanggalPelanggaran`, `deskripsiPelanggaran`, `poinPelanggaran`) VALUES
(12, '670111', 0, '', 'Larangan Siswa', '06:54:49', '2017-06-20', 'Menyerang atau memukul guru dan atau karyawan sekolah', 40),
(13, '670112', 0, '', 'Kerajinan', '08:33:12', '2017-06-20', 'Datang terlambat > 30 menit', 2),
(14, '670111', 0, '', 'Larangan Siswa', '10:20:08', '2017-06-20', 'Berkelahi di lingkungan sekolah, terlibat tawuran antar sekolah, main hakim sendiri antar sesama teman', 70),
(15, '670111', 0, '', 'Kerapihan', '10:49:10', '2017-06-20', 'Bentuk seragam tidak sesuai aturan sekolah / aturan yang di tentukan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `katagori`
--

CREATE TABLE IF NOT EXISTS `katagori` (
  `idKatagori` int(11) NOT NULL AUTO_INCREMENT,
  `namaKatagori` varchar(50) NOT NULL,
  PRIMARY KEY (`idKatagori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `katagori`
--

INSERT INTO `katagori` (`idKatagori`, `namaKatagori`) VALUES
(1, 'Kerapihan'),
(2, 'Kerajinan'),
(3, 'Larangan Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idkelas` int(50) NOT NULL AUTO_INCREMENT,
  `namaKelas` varchar(10) NOT NULL,
  `waliKelas` varchar(100) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`idkelas`),
  KEY `namaKelas` (`namaKelas`),
  KEY `namaKelas_2` (`namaKelas`),
  KEY `namaKelas_3` (`namaKelas`),
  KEY `waliKelas` (`waliKelas`),
  KEY `namaKelas_4` (`namaKelas`),
  KEY `jabatan` (`jabatan`),
  KEY `jabatan_2` (`jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namaKelas`, `waliKelas`, `jabatan`, `password`) VALUES
(16, 'X MIA 1', 'Endang Djayati', 'Walikelas', '2222'),
(26, 'Bukan Wali', 'Yannie Soesanti', 'Guru Kelas', ''),
(27, 'XII IIS 1', 'Sri Utami ', 'Walikelas', '1111'),
(28, 'XI IIS 2', 'Sri Winarti', 'Walikelas', ''),
(29, 'X MIA 2', 'Soetji Sri Handajani', 'Walikelas', '2121'),
(30, 'X MIA 3', 'Sri Wachjuni', 'Walikelas', ''),
(31, 'X MIA 4', 'Ika Mustikawati', 'Walikelas', ''),
(32, 'X MIA 5', 'Enny Sjofinar Joesoef', 'Walikelas', ''),
(33, 'X MIA 6', 'Suryati', 'Walikelas', ''),
(34, 'X IIS 2', 'Endah Herawati', 'Walikelas', ''),
(35, 'XI IIS 1', 'Munawaroh', 'Walikelas', ''),
(36, 'XI MIA 1', 'Agus Triyono', 'Walikelas', ''),
(37, 'XI MIA 2', 'Yuti Rahinawati', 'Walikelas', ''),
(38, 'X IIS 1', 'Dyah Retnowati', 'Walikelas', ''),
(39, 'XI MIA 3', 'Endang Megawati', 'Walikelas', ''),
(40, 'XI MIA 4', 'Samsul Arifin', 'Walikelas', ''),
(41, 'XI MIA 5', 'Winarni', 'Walikelas', ''),
(42, 'XI MIA 6', 'Herri Zumidar Halim', 'Walikelas', ''),
(43, 'XII MIA 1', 'Aries Prasetyo', 'Walikelas', ''),
(44, 'XII MIA 2', 'Emmy Padmi', 'Walikelas', ''),
(45, 'XII MIA 3', 'Sri Handayani', 'Walikelas', ''),
(46, 'XII MIA 4', 'Hari Indarjoko', 'Walikelas', ''),
(47, 'XII MIA 5', 'Misriyanto', 'Walikelas', ''),
(48, 'XII MIA 6', 'Agus Widoyono', 'Walikelas', ''),
(49, 'XII IIS 2', 'Irfa Rochimah Alfi', 'Walikelas', ''),
(50, 'Bukan Wali', 'Soleman', 'Guru Kelas', ''),
(51, 'Bukan Wali', 'Widianto Riyadi', 'Guru Kelas', ''),
(52, 'Bukan Wali', 'Sugiarti', 'Guru Kelas', ''),
(53, 'Bukan Wali', 'Cicik Kurniasih', 'Guru Kelas', ''),
(54, 'Bukan Wali', 'Endah Suryani', 'Guru Kelas', ''),
(55, 'Bukan Wali', 'Sri Bintang', 'Guru Kelas', ''),
(56, 'Bukan Wali', 'Ummu Hani', 'Guru Kelas', ''),
(57, 'Bukan Wali', 'Sri Wahjuni', 'Guru Kelas', ''),
(58, 'Bukan Wali', 'Yannie Soesanti', 'Guru Kelas', ''),
(59, 'Bukan Wali', 'Yeni Hidayat', 'Guru Kelas', ''),
(60, 'Bukan Wali', 'Yoyok Prasmono', 'Guru Kelas', ''),
(61, 'Bukan Wali', 'Mardiyanto', 'Guru Kelas', ''),
(62, 'Bukan Wali', 'Emmililiana Sri Setiti', 'Guru Kelas', ''),
(63, 'Bukan Wali', 'I Ketut Artha', 'Guru Kelas', ''),
(64, 'Bukan Wali', 'Lukas Yanuar ', 'Guru Kelas', ''),
(65, 'Bukan Wali', 'Munif Musthofa', 'Guru Kelas', ''),
(66, 'Bukan Wali', 'Mohammad Rendik Widiyanto', 'Guru Kelas', ''),
(67, 'Bukan Wali', 'Azward Annas ', 'Guru Kelas', ''),
(68, 'Bukan Wali', 'Evie Rakhmalia', 'Guru Kelas', ''),
(69, 'Bukan Wali', 'Dian Ariani', 'Guru Kelas', ''),
(70, 'Bukan Wali', 'Sri Suratni', 'Guru Kelas', ''),
(71, 'Bukan Wali', 'Mochamad Sobani', 'Guru Kelas', ''),
(72, 'Bukan Wali', 'Djoko Prasitimoro', 'Guru Kelas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturanlarangansiswa`
--

CREATE TABLE IF NOT EXISTS `peraturanlarangansiswa` (
  `idLaranganSiswa` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsiLaranganSiswa` text NOT NULL,
  `poinLaranganSiswa` int(10) NOT NULL,
  `tanggalBerlaku` date NOT NULL,
  PRIMARY KEY (`idLaranganSiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `peraturanlarangansiswa`
--

INSERT INTO `peraturanlarangansiswa` (`idLaranganSiswa`, `deskripsiLaranganSiswa`, `poinLaranganSiswa`, `tanggalBerlaku`) VALUES
(2, 'Tidur, sikap acuh tak acuh, bicara sendiri, meninggalkan kelas / sekolah tanpa izin dari guru BK, guru pengajar, guru piket dan kepala sekolah', 10, '2017-07-09'),
(3, 'Membeli makanan / minuman, nongkrong di kantin sekolah / warung luar sekolah pada jam pelajaran berlangsung', 10, '0000-00-00'),
(4, 'Memakai perhiasan yang berlebihan serta berdandan yang tidak sesuai dengan situasi sekolah dan kepribadian bangsa (kuku panjang, berambut panjang untuk siswa)', 5, '0000-00-00'),
(5, 'Menganggu jalannya pelajaran di kelas atau kelas laiinya', 5, '0000-00-00'),
(7, 'Bermain-main atau duduk-duduk di tempat kendaraan dan meletakkan kendaraan bukan pada tempat parkir', 5, '0000-00-00'),
(8, 'Memalsukan surat keterangan dari orang tua/ wali/ dokter', 10, '0000-00-00'),
(9, 'Melakukan bullying teman yang ulang tahun (misal : melempar ke kolam / sungai, saling melempar telur)', 10, '0000-00-00'),
(10, 'Membuang sampah sembarangan', 10, '0000-00-00'),
(11, 'Merokok di dalam kelas / lingkungan sekolah', 30, '0000-00-00'),
(12, 'Berkelahi di lingkungan sekolah, terlibat tawuran antar sekolah, main hakim sendiri antar sesama teman', 70, '0000-00-00'),
(13, 'Meminjam minjamkan kendaraan bermotor kepada sesama siswa tanpa sepengetahuan sekolah', 25, '0000-00-00'),
(14, 'Melanggar ada di masjid atau tempat ibadah di lingkungan sekolah', 35, '0000-00-00'),
(15, 'Membawa / mengedarkan / meminum miras, obat terlarang, buku porno / gambar asusila, VCD porno di sekolah', 50, '0000-00-00'),
(16, 'Menyalahgunakan uang iuran BP-3 (SPP), mencuri barang milik orang lain / sekolah', 30, '0000-00-00'),
(17, 'Merusak sarana dan prasarana sekolah (Mencoret meja / ruang / gedung sekolah)', 45, '0000-00-00'),
(18, 'Membawa dan menyembunyikan petasan, senjata api, senjata tajam atau benda yang membahayakan orang lain', 35, '0000-00-00'),
(19, 'Melakukan pemerasan terhadap teman di dalam / di luar lingkungan sekolah', 40, '0000-00-00'),
(20, 'Bertindak tidak sopan terhadap guru atau karyawan sekolah', 40, '0000-00-00'),
(21, 'Menyerang atau memukul guru dan atau karyawan sekolah', 20, '0000-00-00'),
(22, 'Melakukan tindakan asusila (bermesraan, berciuman, berhubungan seksual) di dalam lingkungan sekolah', 90, '0000-00-00'),
(23, 'Menjadi anggota perkumpulan anak-anak nakal / metal / geng terlarang', 35, '0000-00-00'),
(24, 'Bertindak tidak senonoh / pelecehan terhadap teman (mencolek, meraba ) bagian vital', 40, '0000-00-00'),
(25, 'Bermain HP pada saat jam pelajaran berlangsung', 25, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan_kerajinan`
--

CREATE TABLE IF NOT EXISTS `peraturan_kerajinan` (
  `idKerajinan` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsiKerajinan` text NOT NULL,
  `poinKerajinan` int(10) NOT NULL,
  `tanggalBerlaku` date NOT NULL,
  PRIMARY KEY (`idKerajinan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `peraturan_kerajinan`
--

INSERT INTO `peraturan_kerajinan` (`idKerajinan`, `deskripsiKerajinan`, `poinKerajinan`, `tanggalBerlaku`) VALUES
(2, 'Terlambat (10 Menit)', 2, '2017-07-07'),
(3, 'Datang terlambat (11 - 30 Menit)', 2, '2017-07-07'),
(4, 'Datang terlambat > 30 menit', 2, '2017-07-07'),
(5, 'Tidak mengikuti upacara tanpa izin', 8, '2017-07-07'),
(6, 'Tidak masuk tanpa izin', 10, '2017-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan_kerapian`
--

CREATE TABLE IF NOT EXISTS `peraturan_kerapian` (
  `idKerapian` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsiKerapian` text NOT NULL,
  `poinKerapian` int(10) NOT NULL,
  `tanggalBerlaku` date NOT NULL,
  PRIMARY KEY (`idKerapian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `peraturan_kerapian`
--

INSERT INTO `peraturan_kerapian` (`idKerapian`, `deskripsiKerapian`, `poinKerapian`, `tanggalBerlaku`) VALUES
(2, 'Seragam sekolah tidak lengkap', 10, '2017-07-07'),
(3, 'Tidak memasukan baju pada celana / rok', 5, '2017-07-07'),
(4, 'Berambut gondrong', 5, '2017-07-07'),
(5, 'Menggunakan pewarna rambut', 10, '2017-07-07'),
(6, 'Berpakaian atau berdandan berlebihan', 10, '2017-07-07'),
(7, 'Tidak memakai sepatu hitam', 5, '2017-07-07'),
(8, 'Tidak memakai kaos kaki sesuai seragam', 5, '2017-07-07'),
(9, 'Tidak memakai ikat pinggang', 5, '2017-07-07'),
(10, 'Bentuk seragam tidak sesuai aturan sekolah / aturan yang di tentukan', 5, '2017-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `idSiswa` varchar(20) NOT NULL,
  `tahunAjaran` varchar(100) NOT NULL,
  `namaSiswa` varchar(100) NOT NULL,
  `kelasSiswa` varchar(15) NOT NULL,
  `jenisKelamin` varchar(15) NOT NULL,
  `alamatSiswa` varchar(100) NOT NULL,
  `noHpSiswa` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`idSiswa`),
  KEY `kelasSiswa` (`kelasSiswa`),
  KEY `namaSiswa` (`namaSiswa`),
  KEY `namaOrangTua` (`tahunAjaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `tahunAjaran`, `namaSiswa`, `kelasSiswa`, `jenisKelamin`, `alamatSiswa`, `noHpSiswa`, `status`) VALUES
('670111', '2017/2018', 'Uray Jordi Lasardi', 'X MIA 1', 'Laki', 'Jln. Telekomunikasi No. 1', '81227299288', ''),
('670112', '2017/2018', 'Jauza Cheorun Nisa', 'X MIA 1', 'Perempuan', 'Jln. Telekomunikasi No. 2', '81227299289', ''),
('670113', '2017/2018', 'Andira Nugroho', 'X MIA 1', 'Laki - Laki', 'Jln. Telekomunikasi No. 3', '81227299290', ''),
('670114', '2017/2018', 'Febriansyah Andhika', 'X MIA 1', 'Laki - Laki', 'Jln. Telekomunikasi No. 4', '81227299291', ''),
('670115', '2017/2018', 'Vanny Agatha', 'X MIA 1', 'Perempuan', 'Jln. Telekomunikasi No. 5', '81227299292', ''),
('670116', '2017/2018', 'Wilna Maulani', 'X MIA 2', 'Perempuan', 'Jln. Telekomunikasi No. 6', '81227299293', ''),
('670117', '2017/2018', 'M.Idris Ginting', 'X MIA 2', 'Laki - Laki', 'Jln. Telekomunikasi No. 7', '81227299294', ''),
('670118', '2017/2018', 'Fariz ', 'X MIA 2', 'Laki - Laki', 'Jln. Telekomunikasi No. 8', '81227299295', ''),
('670119', '2017/2018', 'Eki Rifaldi', 'X MIA 2', 'Laki - Laki', 'Jln. Telekomunikasi No. 9', '81227299296', ''),
('670120', '2017/2018', 'Agiel Vandhora', 'X MIA 2', 'Laki - Laki', 'Jln. Telekomunikasi No. 10', '81227299297', ''),
('670121', '2017/2018', 'M. Iqbar Prasamia', 'X MIA 3', 'Laki - Laki', 'Jln. Telekomunikasi No. 11', '81227299298', ''),
('670122', '2017/2018', 'Hafiya Nurul F', 'X MIA 3', 'Perempuan', 'Jln. Telekomunikasi No. 12', '81227299299', ''),
('670123', '2017/2018', 'Faiz Hafizhin Ari', 'X MIA 3', 'Laki - Laki', 'Jln. Telekomunikasi No. 13', '81227299300', ''),
('670124', '2017/2018', 'Haristo Rahmadian', 'X MIA 3', 'Laki - Laki', 'Jln. Telekomunikasi No. 14', '81227299301', ''),
('670125', '2017/2018', 'Yunara Wulaningtyas', 'X MIA 3', 'Perempuan', 'Jln. Telekomunikasi No. 15', '81227299302', ''),
('670126', '2017/2018', 'Zahara Firdausi F.H.S', 'X MIA 4', 'Perempuan', 'Jln. Telekomunikasi No. 16', '81227299303', ''),
('670127', '2017/2018', 'M. Rizky Pahlawan', 'X MIA 4', 'Laki - Laki', 'Jln. Telekomunikasi No. 17', '81227299304', ''),
('670128', '2017/2018', 'M. Rachmad Irsad', 'X MIA 4', 'Laki - Laki', 'Jln. Telekomunikasi No. 18', '81227299305', ''),
('670129', '2017/2018', 'Rasyida Segara', 'X MIA 4', 'Perempuan', 'Jln. Telekomunikasi No. 19', '81227299306', ''),
('670130', '2017/2018', 'Qorry Oktaviani', 'X MIA 4', 'Perempuan', 'Jln. Telekomunikasi No. 20', '81227299307', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `idTahunAjaran` int(11) NOT NULL AUTO_INCREMENT,
  `tahunAjaran` varchar(20) NOT NULL,
  PRIMARY KEY (`idTahunAjaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`idTahunAjaran`, `tahunAjaran`) VALUES
(1, '2017/2018'),
(2, '2018/2019'),
(3, '2019/2020'),
(4, '2020/2021');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_orangtua`
--
ALTER TABLE `data_orangtua`
  ADD CONSTRAINT `data_orangtua_ibfk_2` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  ADD CONSTRAINT `data_pelanggaran_ibfk_1` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`kelasSiswa`) REFERENCES `kelas` (`namaKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
