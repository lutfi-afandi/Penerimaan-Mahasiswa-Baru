-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2022 pada 05.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb_banner`
--

CREATE TABLE `pmb_banner` (
  `id_banner` int(11) NOT NULL,
  `file_gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pmb_banner`
--

INSERT INTO `pmb_banner` (`id_banner`, `file_gambar`) VALUES
(3, '2.2.jpg'),
(4, '3.1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb_carousel`
--

CREATE TABLE `pmb_carousel` (
  `id_carousel` int(11) NOT NULL,
  `file_gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pmb_carousel`
--

INSERT INTO `pmb_carousel` (`id_carousel`, `file_gambar`) VALUES
(7, 'qsq.jpg'),
(8, 'vs.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb_kelulusan`
--

CREATE TABLE `pmb_kelulusan` (
  `id_kelulusan` int(11) NOT NULL,
  `no_ujian` varchar(25) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `keterangan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pmb_kelulusan`
--

INSERT INTO `pmb_kelulusan` (`id_kelulusan`, `no_ujian`, `nama_siswa`, `nilai`, `keterangan`) VALUES
(91, '201150', 'Mega Indah Juliyani', 'VERY GOOD', 'LULUS'),
(92, '201129', 'Mirda Febriana', 'VERY GOOD', 'LULUS'),
(93, '201145', 'Risa Septiani', 'GOOD', 'LULUS'),
(94, '201131', 'Maria Goretti Ika Sulistianingrum', 'EXCELLENT', 'LULUS'),
(95, '21026', 'Renti Dian Neva', 'VERY GOOD', 'LULUS'),
(96, '201151', 'Wantoro', 'AWESOME', 'LULUS'),
(97, '201143', 'Risma indah sari', 'VERY GOOD', 'LULUS'),
(122, '4-19-12-01-0160-0001-8', 'ADELIA SUKMAWATI', '70', 'LULUS'),
(123, '4-19-12-01-0160-0002-7', 'AFIFA OCTIARA', '89', 'TIDAK LULUS'),
(124, '4-19-12-01-0160-0002-3', 'LUTFI AFANDI RIZAL', '98', 'LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb_mahasiswa`
--

CREATE TABLE `pmb_mahasiswa` (
  `id_pmb` int(11) NOT NULL,
  `no_pendaftaran` varchar(90) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `nik` varchar(75) DEFAULT NULL,
  `nisn` varchar(12) DEFAULT NULL,
  `jalur_pendaftaran` varchar(75) DEFAULT NULL,
  `kelas_pendaftaran` varchar(75) DEFAULT NULL,
  `cita_cita` varchar(165) DEFAULT NULL,
  `nama_siswa` varchar(300) DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(165) DEFAULT NULL,
  `tanggal_lahir` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `status_nikah` varchar(75) DEFAULT NULL,
  `alamat` varchar(465) DEFAULT NULL,
  `rt` varchar(12) DEFAULT NULL,
  `rw` varchar(12) DEFAULT NULL,
  `dusun` varchar(165) DEFAULT NULL,
  `kelurahan` varchar(165) DEFAULT NULL,
  `kabupaten` varchar(165) DEFAULT NULL,
  `kode_pos` varchar(45) DEFAULT NULL,
  `tempat_tinggal` varchar(165) DEFAULT NULL,
  `transportasi` varchar(45) DEFAULT NULL,
  `email` varchar(165) DEFAULT NULL,
  `kewarganegaraan` varchar(300) DEFAULT NULL,
  `tinggi_badan` varchar(9) DEFAULT NULL,
  `berat_badan` varchar(9) DEFAULT NULL,
  `jarak_ke_sekolah` varchar(12) DEFAULT NULL,
  `waktu_tempuh_ke_sekolah` varchar(12) DEFAULT NULL,
  `jumlah_saudara` varchar(6) DEFAULT NULL,
  `asal_sekolah` varchar(765) DEFAULT NULL,
  `tahun_lulus` varchar(15) DEFAULT NULL,
  `nama_ayah` varchar(165) DEFAULT NULL,
  `telp_ayah` varchar(45) DEFAULT NULL,
  `tahun_lahir_ayah` varchar(12) DEFAULT NULL,
  `pendidikan_ayah` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah` varchar(165) DEFAULT NULL,
  `penghasilan_ayah` varchar(165) DEFAULT NULL,
  `nama_ibu` varchar(165) DEFAULT NULL,
  `telp_ibu` varchar(45) DEFAULT NULL,
  `tahun_lahir_ibu` varchar(12) DEFAULT NULL,
  `pendidikan_ibu` varchar(45) DEFAULT NULL,
  `pekerjaan_ibu` varchar(165) DEFAULT NULL,
  `penghasilan_ibu` varchar(165) DEFAULT NULL,
  `nama_wali` varchar(165) DEFAULT NULL,
  `telp_wali` varchar(45) DEFAULT NULL,
  `tahun_lahir_wali` varchar(12) DEFAULT NULL,
  `pendidikan_wali` varchar(45) DEFAULT NULL,
  `pekerjaan_wali` varchar(165) DEFAULT NULL,
  `penghasilan_wali` varchar(150) DEFAULT NULL,
  `sumber_info` varchar(765) DEFAULT NULL,
  `foto` varchar(465) DEFAULT NULL,
  `bukti_bayar` varchar(465) DEFAULT NULL,
  `surat_kesehatan` varchar(465) DEFAULT NULL,
  `nilai_raport` varchar(465) DEFAULT NULL,
  `status` char(3) DEFAULT '0',
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `lengkap` int(11) DEFAULT 0,
  `ta_daftar` varchar(20) DEFAULT NULL,
  `username_cbt` varchar(50) DEFAULT NULL,
  `password_cbt` varchar(20) DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pmb_mahasiswa`
--

INSERT INTO `pmb_mahasiswa` (`id_pmb`, `no_pendaftaran`, `no_hp`, `nik`, `nisn`, `jalur_pendaftaran`, `kelas_pendaftaran`, `cita_cita`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_nikah`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kabupaten`, `kode_pos`, `tempat_tinggal`, `transportasi`, `email`, `kewarganegaraan`, `tinggi_badan`, `berat_badan`, `jarak_ke_sekolah`, `waktu_tempuh_ke_sekolah`, `jumlah_saudara`, `asal_sekolah`, `tahun_lulus`, `nama_ayah`, `telp_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `telp_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nama_wali`, `telp_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `sumber_info`, `foto`, `bukti_bayar`, `surat_kesehatan`, `nilai_raport`, `status`, `tanggal_daftar`, `password`, `lengkap`, `ta_daftar`, `username_cbt`, `password_cbt`) VALUES
(139, 'PMB.AKFAR.001', '085765842510', '111222333', '123', 'Reguler', NULL, NULL, 'Lutfi Afandi Rizal', 'Laki-Laki', 'Sekampung', '1997-05-08', 'Islam', 'Belum Menikah', 'in aja dulus', '007', '03', 'Dusun III', 'Sumbergede', 'Lampung timur', '34181', 'Kos', 'Kendaraan Pribadi', 'bejo@gmail.com', 'Warga Negara Indonesia (WNI)', '167', '65', '15', '15', '3', 'SMAN 1 BATANGHARI', '2014', 'Basiran', '085765842222', '1968', 'SMA Sederajat', 'Buruh', '1 Juta - 1.999.999 Juta', 'Suwartini', '0721', '1968', 'SMP Sederajat', 'Lainnya', '1 Juta - 1.999.999 Juta', 'Mulyono', '03333', '1968', 'SMA Sederajat', 'Wiraswasta', 'Lebih Dari 10 Juta', 'Instagram', 'alfinaaadeliap__76847155_371527363646807_6794157487927853056_n.jpg', '8e65a2fb-0951-4a97-84bf-5408362070bf.jpg', '89223a9b-6c33-4e26-8081-b28ebc9fcb62.jpg', 'WhatsApp Image 2021-10-13 at 19.35.06.jpeg', '1', '2022-01-26 03:57:27', '085765842510', 0, '2022/2023', 'PMB.AKFAR.001', '123456'),
(143, 'PMB.AKFAR.002', '123', NULL, NULL, 'Khusus', NULL, NULL, 'wati', 'Perempuan', 'lala', '2002-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SONO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '53cd6469fea0f9423529e11fbf9618f9_1.jpg', NULL, NULL, '1', '2022-01-26 04:11:48', '123', 0, '2022/2023', 'PMB.AKFAR.001', '123456'),
(144, 'PMB.AKFAR.003', '085269166401', '321321', NULL, 'Reguler', NULL, NULL, 'Basiran', 'Laki-Laki', 'Sekampung', '1999-06-02', 'Islam', 'Sudah Menikah', 'saaaa', '', '', '', '', '', '', 'Rumah Sendiri', 'Kendaraan Pribadi', 'c@gmail.com', 'Warga Negara Indonesia (WNI)', '180', '90', '10', '10', '1', 'SMAN 1 SEKAMPUNG', NULL, 'Sudrajat', '086655555', '1900', 'SD Sederajat', 'Buruh', '1 Juta - 1.999.999 Juta', 'Aci', '0899999', '1900', 'SD Sederajat', 'Buruh', '1 Juta - 1.999.999 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4.2.jpg', NULL, NULL, '1', '2022-01-26 03:59:43', '085269166401', 0, '2022/2023', 'PMB.AKFAR.001', '123456'),
(145, 'PMB.AKFAR.004', '08123123', NULL, NULL, 'Reguler', NULL, NULL, 'Heri', 'Laki-Laki', 'Metro', '1995-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMAN 3 METRO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8e65a2fb-0951-4a97-84bf-5408362070bf_1.jpg', NULL, NULL, '1', '2022-01-26 03:59:51', '08123123', 0, '2022/2023', 'PMB.AKFAR.004', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb_pengaturan`
--

CREATE TABLE `pmb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `tentang` text DEFAULT NULL,
  `prosedur` varchar(250) DEFAULT NULL,
  `pengumuman` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pmb_pengaturan`
--

INSERT INTO `pmb_pengaturan` (`id_pengaturan`, `tentang`, `prosedur`, `pengumuman`) VALUES
(1, '', '6.jpg', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmb_slideshow`
--

CREATE TABLE `pmb_slideshow` (
  `id_slideshow` int(11) NOT NULL,
  `file_gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pmb_slideshow`
--

INSERT INTO `pmb_slideshow` (`id_slideshow`, `file_gambar`) VALUES
(4, '3.3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppdb_kelulusan`
--

CREATE TABLE `ppdb_kelulusan` (
  `id_kelulusan` int(11) NOT NULL,
  `no_ujian` varchar(25) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `keterangan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ppdb_kelulusan`
--

INSERT INTO `ppdb_kelulusan` (`id_kelulusan`, `no_ujian`, `nama_siswa`, `nilai`, `keterangan`) VALUES
(89, '21023', 'Safira amanda', 'GOOD', 'LULUS'),
(90, '201128', 'Angela Dixie Ambarwati', 'EXCELLENT', 'LULUS'),
(91, '201150', 'Mega Indah Juliyani', 'VERY GOOD', 'LULUS'),
(92, '201129', 'Mirda Febriana', 'VERY GOOD', 'LULUS'),
(93, '201145', 'Risa Septiani', 'GOOD', 'LULUS'),
(94, '201131', 'Maria Goretti Ika Sulistianingrum', 'EXCELLENT', 'LULUS'),
(95, '21026', 'Renti Dian Neva', 'VERY GOOD', 'LULUS'),
(96, '201151', 'Wantoro', 'AWESOME', 'LULUS'),
(97, '201143', 'Risma indah sari', 'VERY GOOD', 'LULUS'),
(98, '201144', 'Ratna Dwi Hariyanti', 'GOOD', 'LULUS'),
(99, '201147', 'Dimas Saputra', 'GOOD', 'LULUS'),
(100, '21025', 'khoirunnisa', 'GOOD', 'LULUS'),
(101, '201136', 'Devi Meilia Sari', 'EXCELLENT', 'LULUS'),
(102, '201137', 'Betha Sri Andanie', 'EXCELLENT', 'LULUS'),
(103, '201138', 'Septia Kurnia Wati BR Siregar', 'EXCELLENT', 'LULUS'),
(104, '201134', 'Muhammad iksan asidik', 'GOOD', 'LULUS'),
(105, '201148', 'Karin Yhosi Novitania', 'VERY GOOD', 'LULUS'),
(106, '201139', 'Chantika Nur Putri', 'EXCELLENT', 'LULUS'),
(107, '201130', 'Mulia Veni', 'GOOD', 'LULUS'),
(108, '201132', 'Risa dini utami', 'GOOD', 'LULUS'),
(109, '201152', 'Janansah Abiandra Pratama', 'VERY GOOD', 'LULUS'),
(110, '201142', 'Inan Is Dayu', 'GOOD', 'LULUS'),
(111, '201133', 'Putri Arista Tefa Yusuf', 'Very good', 'LULUS'),
(112, '201149', 'Sintya Darmantika Lestari', 'Good', 'LULUS'),
(113, '21027', 'Ria Ernita Purba', 'Very Good', 'LULUS'),
(114, '21028', 'Fitri Yuni Sari', 'EXELLENT', 'LULUS'),
(115, '21036', 'Sofan Aruki', 'Excellent', 'LULUS'),
(116, '21035', 'Erika Safira Br Tarigan', ' Very Good', 'LULUS'),
(117, '21031', 'Hari Sandi', 'Very Good ', 'LULUS'),
(118, '21033', 'Desty Febriyanti', 'Good', 'LULUS'),
(119, '21034', 'Ninis Marysa', 'Very Good ', 'LULUS'),
(120, '21041', 'Mira Bella Apriance', 'Very Good', 'LULUS'),
(121, '21040', 'Sri Lestari Widiastuti', 'Excellent', 'LULUS'),
(122, '21045', 'Aurel Novadya Abidin', 'Very Good', 'LULUS'),
(123, '21049', 'Lisa Ariyanah', 'Good', 'LULUS'),
(124, '21043', 'Shalsabila Amelia', 'Good', 'LULUS'),
(125, '21044', 'Dhea Septi Permatasari', 'Good', 'LULUS'),
(126, '21056', 'Putri Fadillah Amanda', 'Very Good', 'LULUS'),
(127, '21054', 'Marina Saputri', 'Good', 'LULUS'),
(128, '21039', 'Khusnul Khotimah', 'Good', 'LULUS'),
(129, '21055', 'Citra Wati', 'Very Good', 'LULUS'),
(130, '21057', 'R. Y Galih Priambodho', 'Good', 'LULUS'),
(131, '21058', 'Diah Ayu Puspita Ningrum', 'Very Good', 'LULUS'),
(132, '21059', 'Shinta Febriyanti', 'GOOD', 'LULUS'),
(133, '21060', 'Zahra Saphira', 'GOOD', 'LULUS'),
(134, '21062', 'Wanda Nurbaiti', 'GOOD', 'LULUS'),
(135, '21063', 'Diska meisya sintina', 'Very Good', 'LULUS'),
(136, '21064', 'CICI SELVIA ANGGRAENI', 'Good', 'LULUS'),
(137, '21075', 'Hainaya Siti Purnawa', 'Good', 'LULUS'),
(138, '21076', 'Anisa Ocha Olivia', 'Good', 'LULUS'),
(139, '21071', 'Diva Dinda Zulya', 'Good', 'LULUS'),
(140, '21065', 'Hani Finanda Tri Susanti', 'GOOD', 'LULUS'),
(141, '21067', 'Wida Raulita', 'VERY GOOD', 'LULUS'),
(142, '21068', 'Fajri Nur Laili', 'GOOD', 'LULUS'),
(143, '21070', 'Sindi Sartika Dewi', 'GOOD', 'LULUS'),
(144, '21066', 'Tantri Nada Juliana', 'GOOD', 'LULUS'),
(145, '21077', 'Daffa Frilia Satiti', 'EXCELLENT', 'LULUS'),
(146, '21078', 'Ayu Novi Yani', 'GOOD', 'LULUS'),
(147, '21079', 'Romi Ulan Daril', 'Good', 'LULUS'),
(148, '21080', 'Suherman', 'Very Good', 'LULUS'),
(149, '21081', 'Nuraisyah Putri Isnaini', 'GOOD', 'LULUS'),
(150, '21082', 'Defana Dwi Utami', 'GOOD', 'LULUS'),
(151, '21083', 'Annisa Azzahro', 'Excellent', 'LULUS'),
(157, '21087', 'Sindi Sidabutar', 'Good', 'LULUS'),
(158, '21088', 'Jeliana Margareta Sibagariang', 'Good', 'LULUS'),
(159, '21089', 'Sahrul Sahrojo', 'Good', 'LULUS'),
(160, '21090', 'Tria Angelita', 'Very Good', 'LULUS'),
(161, '21091', 'Nurul Nadya Rizka Yudha', 'Very Good', 'LULUS'),
(162, '21084', 'Nabila Septiana Sari', 'GOOD', 'LULUS'),
(163, '21085', 'Putri Triya Salwa Zharifa', 'GOOD', 'LULUS'),
(166, '21093', 'Rahma Siti Pertiwi Husin', 'Excellent', 'LULUS'),
(167, '21094', 'Anin Dita Yulianti', 'Excellent', 'LULUS'),
(168, '21095', 'Reni Anggraeni', 'GOOD', 'LULUS'),
(169, '21096', 'Al Gibran', 'Excellent', 'LULUS'),
(170, '21099', 'M.Ilhaq Rohmat Fauzan', 'Very Good', 'LULUS'),
(171, '21100', 'Yeni Nizatun', 'Very Good', 'LULUS'),
(172, '21101', 'Cornelia Indra', 'Very Good', 'LULUS'),
(173, '21102', 'Dian Rasmania Putri', 'Excellent', 'LULUS'),
(174, '21111', 'Chairunnisa Dhearani', 'Excellent', 'LULUS'),
(175, '21098', 'Hoerul Nikmah', 'Good', 'LULUS'),
(176, '21112', 'Salsabila El Balqis', 'Very Good', 'LULUS'),
(177, '21113', 'Muhammad Mahdi Alaydrus', 'Excellent', 'LULUS'),
(178, '21116', 'Ayu Suryani', 'Very Good', 'LULUS'),
(179, '21117', 'Amirul Ardi', 'Awesome', 'LULUS'),
(180, '21114', 'Rafino Ditra Oktavian', 'Excellent', 'LULUS'),
(181, '21118', 'Andre Yansyah', 'GOOD', 'LULUS'),
(182, '21119', 'Dewi Ayu Septiani', 'Excellent', 'LULUS'),
(183, '21120', 'Ammirul Hilmi', 'GOOD', 'LULUS'),
(184, '21121', 'Heni Fitriya Dewi', 'Very Good', 'LULUS'),
(186, '21122', 'Diana Lidya Anggraini', 'GOOD', 'LULUS'),
(187, '21123', 'Juniar Eka Hadiyanti', 'Good', 'LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta`
--

CREATE TABLE `ta` (
  `id` int(11) NOT NULL,
  `tahun_akademik` varchar(20) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT 'tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ta`
--

INSERT INTO `ta` (`id`, `tahun_akademik`, `status`) VALUES
(2, '2021/2022', 'tidak aktif'),
(3, '2020/2021', 'tidak aktif'),
(4, '2022/2023', 'aktif'),
(5, '2023/2024', 'tidak aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','tes') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Lutfi Afandi', 'admin', '$2y$10$9IehySqqE5/oZOQ6MKJiUOZioEPZ1xiwcDDQsMwPIcvJdvZdQZp5a', 'admin'),
(3, 'Soimah', 'soimah', '$2y$10$rFe92vpc9aGfylJJHIzWKOM.3mtg8Ej5DYxemiYOB9bp.EeuzIVYm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pmb_banner`
--
ALTER TABLE `pmb_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `pmb_carousel`
--
ALTER TABLE `pmb_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indeks untuk tabel `pmb_kelulusan`
--
ALTER TABLE `pmb_kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indeks untuk tabel `pmb_mahasiswa`
--
ALTER TABLE `pmb_mahasiswa`
  ADD PRIMARY KEY (`id_pmb`);

--
-- Indeks untuk tabel `pmb_pengaturan`
--
ALTER TABLE `pmb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `pmb_slideshow`
--
ALTER TABLE `pmb_slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indeks untuk tabel `ppdb_kelulusan`
--
ALTER TABLE `ppdb_kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indeks untuk tabel `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pmb_banner`
--
ALTER TABLE `pmb_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pmb_carousel`
--
ALTER TABLE `pmb_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pmb_kelulusan`
--
ALTER TABLE `pmb_kelulusan`
  MODIFY `id_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `pmb_mahasiswa`
--
ALTER TABLE `pmb_mahasiswa`
  MODIFY `id_pmb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `pmb_pengaturan`
--
ALTER TABLE `pmb_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pmb_slideshow`
--
ALTER TABLE `pmb_slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ppdb_kelulusan`
--
ALTER TABLE `ppdb_kelulusan`
  MODIFY `id_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT untuk tabel `ta`
--
ALTER TABLE `ta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
