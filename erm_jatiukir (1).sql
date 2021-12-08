-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2021 pada 18.50
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erm_jatiukir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrean`
--

CREATE TABLE `antrean` (
  `id_antrean` varchar(15) NOT NULL,
  `id_pemeriksaan` varchar(15) DEFAULT NULL,
  `antreana` varchar(4) DEFAULT NULL,
  `antreanb` varchar(4) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `dokter` varchar(15) NOT NULL,
  `spesialis` varchar(15) NOT NULL,
  `pasien` varchar(20) NOT NULL,
  `Status` enum('Menunggu','Proses','Selesai') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrean`
--

INSERT INTO `antrean` (`id_antrean`, `id_pemeriksaan`, `antreana`, `antreanb`, `tanggal`, `dokter`, `spesialis`, `pasien`, `Status`, `created_at`, `updated_at`) VALUES
('2021121201', '211206007', 'A01', NULL, '2021-12-06', '211120006', '1', '3203071005970008', 'Proses', '2021-12-06 15:34:08', '2021-12-06 15:57:18'),
('2112060202', '211208008', 'A02', NULL, '2021-12-06', '211120006', '1', '1', 'Selesai', '2021-12-06 15:34:37', '2021-12-08 13:57:00'),
('2112060203', NULL, 'A03', NULL, '2021-12-06', '211120006', '1', '2', 'Proses', '2021-12-06 15:35:23', '2021-12-08 14:10:30'),
('2112060204', '2112060029', NULL, 'B01', '2021-12-06', '211120006', '2', '12', 'Selesai', '2021-12-06 15:58:13', '2021-12-06 16:04:17'),
('2112070205', '2112070032', NULL, 'B02', '2021-12-07', '211120006', '2', '3203012406920004', 'Selesai', '2021-12-07 16:11:11', '2021-12-07 16:50:36'),
('2112070206', NULL, NULL, 'B03', '2021-12-07', '211120006', '2', '32000000', 'Proses', '2021-12-07 16:55:29', '2021-12-07 16:57:18'),
('2112070207', NULL, 'A04', NULL, '2021-12-07', '211120006', '1', '33', 'Menunggu', '2021-12-07 18:12:28', '2021-12-07 18:12:28'),
('2112080208', NULL, NULL, 'B04', '2021-12-08', '211120006', '2', '320088571750', 'Selesai', '2021-12-08 14:05:56', '2021-12-08 14:13:58'),
('2112080209', NULL, 'A05', NULL, '2021-12-08', '211120006', '1', '39', 'Menunggu', '2021-12-08 15:00:49', '2021-12-08 15:00:49'),
('2112080210', NULL, 'A06', NULL, '2021-12-08', '211120006', '1', '1231', 'Menunggu', '2021-12-08 15:02:07', '2021-12-08 15:02:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_pemeriksaan_jiwa`
--

CREATE TABLE `detil_pemeriksaan_jiwa` (
  `id_detil_pemeriksaan` varchar(15) NOT NULL,
  `id_pem_fisik` varchar(50) DEFAULT NULL,
  `id_pem_psik` varchar(50) DEFAULT NULL,
  `id_pem_tambahan` varchar(50) DEFAULT NULL,
  `id_status_medis` varchar(50) DEFAULT NULL,
  `id_rawat_inap` varchar(50) DEFAULT NULL,
  `id_staus_pekerjaan` varchar(50) DEFAULT NULL,
  `id_jenis_penyakit` varchar(50) DEFAULT NULL,
  `id_pgnn_narkoba` varchar(50) DEFAULT NULL,
  `id_status_legal` varchar(50) DEFAULT NULL,
  `id_riwayat_keluarga` varchar(50) DEFAULT NULL,
  `id_status_psikiatris` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detil_pemeriksaan_jiwa`
--

INSERT INTO `detil_pemeriksaan_jiwa` (`id_detil_pemeriksaan`, `id_pem_fisik`, `id_pem_psik`, `id_pem_tambahan`, `id_status_medis`, `id_rawat_inap`, `id_staus_pekerjaan`, `id_jenis_penyakit`, `id_pgnn_narkoba`, `id_status_legal`, `id_riwayat_keluarga`, `id_status_psikiatris`, `created_at`, `updated_at`) VALUES
('2112040010', '2112040010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-04 05:51:11', '2021-12-04 05:51:11'),
('2112050012', '2112050012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:29:45', '2021-12-05 09:29:45'),
('2112050013', '2112050013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:47:52', '2021-12-05 09:47:52'),
('2112050014', '2112050014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:49:32', '2021-12-05 09:49:32'),
('2112050015', '2112050015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:52:26', '2021-12-05 09:52:26'),
('2112050016', '2112050016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:53:18', '2021-12-05 09:53:18'),
('2112050017', '2112050017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:56:36', '2021-12-05 09:56:36'),
('2112050018', '2112050018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 09:56:51', '2021-12-05 09:56:51'),
('2112050020', '2112050020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 14:26:16', '2021-12-05 14:26:16'),
('2112050021', '2112050021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 14:30:32', '2021-12-05 14:30:32'),
('2112050022', '2112050022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 14:32:47', '2021-12-05 14:32:47'),
('2112050023', '2112050023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:48:13', '2021-12-05 15:48:13'),
('2112050024', '2112050024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('2112060025', '2112060025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:56:54', '2021-12-06 09:56:54'),
('2112060026', '2112060026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('2112060027', '2112060027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('2112060028', '2112060028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 15:59:07', '2021-12-06 15:59:07'),
('2112060029', '2112060029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 16:04:16', '2021-12-06 16:04:16'),
('2112070030', '2112070030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:34:34', '2021-12-07 16:34:34'),
('2112070031', '2112070031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:37:30', '2021-12-07 16:37:30'),
('2112070032', '2112070032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:38:31', '2021-12-07 16:38:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_penyakit`
--

CREATE TABLE `jenis_penyakit` (
  `id_jenis_penyakit` varchar(15) NOT NULL,
  `jenis_penyakit` varchar(50) DEFAULT NULL,
  `dari` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_31_134020_user', 2),
(6, '2021_11_04_014458_obat', 3),
(7, '2021_11_09_160517_add_role_column_to_users_table', 4),
(8, '2021_11_11_080632_add_updated_at_to_users', 5),
(9, '2021_11_11_080752_add_updated_at_to_obat', 5),
(10, '2021_11_11_081034_add_created_at_to_obat', 6),
(11, '2021_11_11_081306_obat', 7),
(12, '2021_11_13_011408_tabel_user', 8),
(13, '2021_11_13_023759_pendaftaran', 8),
(14, '2021_11_13_033648_pendaftaran', 9),
(15, '2021_11_13_034733_pendaftaran', 10),
(16, '2021_11_15_105246_antrean', 11),
(17, '2021_11_15_145744_tabel_spesialis', 12),
(18, '2021_11_16_160318_tabel_antrean', 13),
(19, '2021_11_16_160643_antrean', 14),
(20, '2021_12_02_182203_pemeriksaan_pasien', 15),
(21, '2021_12_02_182227_p_umum', 16),
(22, '2021_12_04_020836_pemeriksaan_fisik', 17),
(23, '2021_12_04_021217_pemeriksaan_psikiatrik', 18),
(24, '2021_12_04_021426_pemeriksaan_tambahan', 18),
(25, '2021_12_04_021723_status_medis', 19),
(26, '2021_12_04_021859_rawat_inap', 20),
(27, '2021_12_04_022135_status_pekerjaan', 21),
(28, '2021_12_04_024453_jenis_penyakit', 21),
(29, '2021_12_04_024852_penggunaan_narkotika', 22),
(30, '2021_12_04_025338_status_legal', 22),
(31, '2021_12_04_030307_riwayat_keluarga', 23),
(32, '2021_12_04_030801_status_psikiatris', 23),
(33, '2021_12_04_050144_detil_pemeriksaan_jiwa', 24),
(34, '2021_12_05_082352_pemeriksaan_kejiwaan', 25),
(35, '2021_12_06_040008_tebus_obat', 26),
(36, '2021_12_06_112536_pemeriksaan_umum', 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `dosis` varchar(5) NOT NULL,
  `satuan` enum('mg','gr') NOT NULL DEFAULT 'mg',
  `jenis_obat` enum('Set','Pil','Tablet','Botol') NOT NULL DEFAULT 'Set',
  `qty` int(3) NOT NULL DEFAULT 0,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `dosis`, `satuan`, `jenis_obat`, `qty`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
('1111210001', 'etaflusin', '0.5mg', 'gr', 'Set', 1, 1231, 1231, '2021-11-20 13:37:45', '2021-11-20 13:37:45'),
('1111210002', 'Parasetamol', '0.5mg', 'mg', 'Set', 1, 1, 1, '2021-11-20 19:35:41', '2021-11-20 19:35:41'),
('1111210003', 'kalmitason', '0.5mg', 'mg', 'Set', 1, 1, 1, '2021-11-20 19:46:10', '2021-11-20 19:46:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` bigint(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pola_pekerjaan` varchar(255) NOT NULL,
  `keterampilan_teknis` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `status_perkawinan` enum('Belum Menikah','Menikah','Duda/Janda') NOT NULL DEFAULT 'Belum Menikah',
  `pendidikan_terakhir` enum('Tidak Sekolah/Tidak Tamat','Lulus SD','Lulus SLTP','Lulus SLTA','Lulus Akademi','Lulus PT') DEFAULT 'Tidak Sekolah/Tidak Tamat',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik`, `nama_pasien`, `foto_ktp`, `foto_pasien`, `tempat_lahir`, `tanggal_lahir`, `jk`, `pekerjaan`, `pola_pekerjaan`, `keterampilan_teknis`, `alamat`, `nohp`, `status_perkawinan`, `pendidikan_terakhir`, `created_at`, `updated_at`) VALUES
(21112903, '12', 'deni', '21112905.jpg', '21112906.jpg', 'ubud bali', '2021-01-31', 'Laki-laki', 'Software Developer', '', '', 'cianjur', '08531618894', 'Duda/Janda', '', '2021-11-29 12:50:38', '2021-11-29 12:50:38'),
(21120504, 'q', 'q', '21120507.jpg', '21120508.jpg', 'Cianjur', '2021-01-01', 'Laki-laki', 'lkj', '', '', 'pio', '09', 'Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-05 10:14:31', '2021-12-05 10:14:31'),
(21120505, '1', '1', '21120509.jpg', '211205010.jpg', '1', '2021-01-01', 'Laki-laki', 'lkj', '', '', 'qwe', '1', 'Belum Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-05 10:19:19', '2021-12-05 10:19:19'),
(21120506, '2', 'u', '21120509.jpg', '211205010.jpg', 'u', '2021-01-01', 'Laki-laki', 'lkj', '', '', 'lkj', '098', 'Belum Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-05 10:20:17', '2021-12-05 10:20:17'),
(21120706, '32000000', 'Fajar', '21120709.jpg', '211207010.jpg', 'Cianjur', '1992-07-01', 'Laki-laki', 'Wiraswasta', '', '', 'Negeri Dongeng', '085723541860', 'Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-07 16:55:29', '2021-12-07 16:55:29'),
(21120707, '33', 'q', '211207011.jpg', '211207012.jpg', 'Cianjur', '2021-12-31', 'Perempuan', 'lkj', '', '', 'oiuio', '08531618894', 'Belum Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-07 18:12:27', '2021-12-07 18:12:27'),
(21120807, '320088571750', 'Ujang Ngadianto', '211208013.PNG', '211208014.JPG', 'Pontianak', '1990-08-17', 'Laki-laki', 'Ngusep', '', '', 'Jln Geger kalong no 69 Bandung', '08577777205', 'Duda/Janda', 'Tidak Sekolah/Tidak Tamat', '2021-12-08 14:05:56', '2021-12-08 14:05:56'),
(21120808, '39', 'q', '211208015.jpg', '211208016.jpg', 'Cianjur', '2013-12-31', 'Laki-laki', 'Software Developer', '', '', 'awe', '08531618894', 'Belum Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-08 15:00:49', '2021-12-08 15:00:49'),
(21120809, '1231', 'Ridwan', '211208017.jpg', '211208018.jpg', 'Cianjur', '2020-12-31', 'Laki-laki', 'lkj', '', '', 'LKASJD', '1', 'Belum Menikah', 'Tidak Sekolah/Tidak Tamat', '2021-12-08 15:02:07', '2021-12-08 15:02:07'),
(2111110001, '3203071005970008', 'Syamsy Wiguna Putra Dwi Raksa', '21112803.jpg', '21112502.jpg', 'Cianjur', '1997-12-31', 'Laki-laki', 'Software Developer', '', '', 'Kp. Bojong Ds. Bojong RT\\RW 01\\13 Kec. KArangtengah Kab. Cianjur', '08531618894', 'Belum Menikah', '', '2021-11-25 01:46:18', '2021-11-28 15:43:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` varchar(15) NOT NULL,
  `jenis_konsultasi` varchar(16) NOT NULL,
  `id_antrean` varchar(15) NOT NULL,
  `id_pasien` varchar(15) NOT NULL,
  `id_RO` varchar(15) NOT NULL,
  `biaya_pemeriksaan` float NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `jenis_konsultasi`, `id_antrean`, `id_pasien`, `id_RO`, `biaya_pemeriksaan`, `created_at`, `updated_at`) VALUES
('211206007', '211206001', '2021121201', '2111110001', '21120507\n', 1, '2021-12-06', '2021-12-06 15:57:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_fisik`
--

CREATE TABLE `pemeriksaan_fisik` (
  `id_pem_fisik` varchar(15) NOT NULL,
  `T` varchar(50) NOT NULL,
  `N` varchar(50) NOT NULL,
  `RR` varchar(50) NOT NULL,
  `SB` varchar(50) NOT NULL,
  `penampilan` varchar(15) NOT NULL,
  `cara_berjalan` varchar(15) NOT NULL,
  `cara_bicara` varchar(15) NOT NULL,
  `konjungtiva` varchar(15) NOT NULL,
  `bekas_suntikan` varchar(15) NOT NULL,
  `tremor` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_fisik`
--

INSERT INTO `pemeriksaan_fisik` (`id_pem_fisik`, `T`, `N`, `RR`, `SB`, `penampilan`, `cara_berjalan`, `cara_bicara`, `konjungtiva`, `bekas_suntikan`, `tremor`, `created_at`, `updated_at`) VALUES
('2112050023', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-05 15:48:13', '2021-12-05 15:48:13'),
('2112050024', '2', '2', '2', '2', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('PF2112060025', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-06 09:56:54', '2021-12-06 09:56:54'),
('PF2112060026', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('PF2112060027', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('PF2112060028', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-06 15:59:07', '2021-12-06 15:59:07'),
('PF2112060029', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('PF2112070030', '12', '30', '11', '12', 'KR', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-07 16:34:34', '2021-12-07 16:34:34'),
('PF2112070031', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-07 16:37:30', '2021-12-07 16:37:30'),
('PF2112070032', '1', '1', '1', '1', 'R', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-07 16:50:33', '2021-12-07 16:50:33'),
('PF2112070033', 'h', 'h', 'h', 'h', 'KR', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-07 17:05:28', '2021-12-07 17:05:28'),
('PF2112080035', '200', '76', '54', '354', 'KR', 'Sempoyongan', 'Pelo/Cadel', 'Kemerahan', 'Ada', 'Ada', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_kejiwaan`
--

CREATE TABLE `pemeriksaan_kejiwaan` (
  `id_pemeriksaan` varchar(15) NOT NULL,
  `id_antrean` varchar(20) NOT NULL,
  `id_pem_fisik` varchar(50) DEFAULT NULL,
  `id_pem_psik` varchar(50) DEFAULT NULL,
  `id_pem_tambahan` varchar(50) DEFAULT NULL,
  `id_status_medis` varchar(50) DEFAULT NULL,
  `id_rawat_inap` varchar(50) DEFAULT NULL,
  `id_status_pekerjaan` varchar(50) DEFAULT NULL,
  `id_jenis_penyakit` varchar(50) DEFAULT NULL,
  `id_pgnn_narkoba` varchar(50) DEFAULT NULL,
  `id_status_legal` varchar(50) DEFAULT NULL,
  `id_riwayat_keluarga` varchar(50) DEFAULT NULL,
  `id_status_psikiatris` varchar(50) DEFAULT NULL,
  `id_RO` varchar(16) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_kejiwaan`
--

INSERT INTO `pemeriksaan_kejiwaan` (`id_pemeriksaan`, `id_antrean`, `id_pem_fisik`, `id_pem_psik`, `id_pem_tambahan`, `id_status_medis`, `id_rawat_inap`, `id_status_pekerjaan`, `id_jenis_penyakit`, `id_pgnn_narkoba`, `id_status_legal`, `id_riwayat_keluarga`, `id_status_psikiatris`, `id_RO`, `created_at`, `updated_at`) VALUES
('2112050023', '21112905', 'PF2112050023', 'PP2112050023', 'PT2112050023', 'SM2112050023', 'RI2112050023', 'SPK2112050023', 'JP2112050023', 'PGN2112050023', 'SL2112050023', 'RK2112050023', 'SPS2112050023', '', '2021-12-05 15:48:13', '2021-12-05 15:48:13'),
('2112050024', '21120507', 'PF2112050024', 'PP2112050024', 'PT2112050024', 'SM2112050024', 'RI2112050024', 'SPK2112050024', 'JP2112050024', 'PGN2112050024', 'SL2112050024', 'RK2112050024', 'SPS2112050024', '', '2021-12-05 15:50:02', '2021-12-05 15:50:02'),
('2112060025', '21120602', 'PF2112060025', 'PP2112060025', 'PT2112060025', 'SM2112060025', 'RI2112060025', 'SPK2112060025', 'JP2112060025', 'PGN2112060025', 'SL2112060025', 'RK2112060025', 'SPS2112060025', '21120602', '2021-12-06 09:56:54', '2021-12-06 09:56:54'),
('2112060026', '21120602', 'PF2112060026', 'PP2112060026', 'PT2112060026', 'SM2112060026', 'RI2112060026', 'SPK2112060026', 'JP2112060026', 'PGN2112060026', 'SL2112060026', 'RK2112060026', 'SPS2112060026', '21120602', '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('2112060027', '21120602', 'PF2112060027', 'PP2112060027', 'PT2112060027', 'SM2112060027', 'RI2112060027', 'SPK2112060027', 'JP2112060027', 'PGN2112060027', 'SL2112060027', 'RK2112060027', 'SPS2112060027', '21120602', '2021-12-06 10:01:01', '2021-12-06 10:01:01'),
('2112060028', '2112060204', 'PF2112060028', 'PP2112060028', 'PT2112060028', 'SM2112060028', 'RI2112060028', 'SPK2112060028', 'JP2112060028', 'PGN2112060028', 'SL2112060028', 'RK2112060028', 'SPS2112060028', '21120604', '2021-12-06 15:59:07', '2021-12-06 15:59:07'),
('2112060029', '2112060204', 'PF2112060029', 'PP2112060029', 'PT2112060029', 'SM2112060029', 'RI2112060029', 'SPK2112060029', 'JP2112060029', 'PGN2112060029', 'SL2112060029', 'RK2112060029', 'SPS2112060029', '21120604', '2021-12-06 16:04:16', '2021-12-06 16:04:16'),
('2112070030', '2112070205', 'PF2112070030', 'PP2112070030', 'PT2112070030', 'SM2112070030', 'RI2112070030', 'SPK2112070030', 'JP2112070030', 'PGN2112070030', 'SL2112070030', 'RK2112070030', 'SPS2112070030', '21120705', '2021-12-07 16:34:34', '2021-12-07 16:34:34'),
('2112070031', '2112070205', 'PF2112070031', 'PP2112070031', 'PT2112070031', 'SM2112070031', 'RI2112070031', 'SPK2112070031', 'JP2112070031', 'PGN2112070031', 'SL2112070031', 'RK2112070031', 'SPS2112070031', '21120706', '2021-12-07 16:48:11', '2021-12-07 16:48:11'),
('2112070032', '2112070205', 'PF2112070032', 'PP2112070032', 'PT2112070032', 'SM2112070032', 'RI2112070032', 'SPK2112070032', 'JP2112070032', 'PGN2112070032', 'SL2112070032', 'RK2112070032', 'SPS2112070032', '21120706', '2021-12-07 16:50:33', '2021-12-07 16:50:33'),
('2112070033', '2112070206', 'PF2112070033', 'PP2112070033', 'PT2112070033', 'SM2112070033', 'RI2112070033', 'SPK2112070033', 'JP2112070033', 'PGN2112070033', 'SL2112070033', 'RK2112070033', 'SPS2112070033', '21120707', '2021-12-07 17:05:28', '2021-12-07 17:05:28'),
('2112080034', '2112070206', 'PF2112080034', 'PP2112080034', 'PT2112080034', 'SM2112080034', 'RI2112080034', 'SPK2112080034', 'JP2112080034', 'PGN2112080034', 'SL2112080034', 'RK2112080034', 'SPS2112080034', '21120807', '2021-12-08 07:04:22', '2021-12-08 07:04:22'),
('2112080035', '2112080208', 'PF2112080035', 'PP2112080035', 'PT2112080035', 'SM2112080035', 'RI2112080035', 'SPK2112080035', 'JP2112080035', 'PGN2112080035', 'SL2112080035', 'RK2112080035', 'SPS2112080035', '21120809', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_pasien`
--

CREATE TABLE `pemeriksaan_pasien` (
  `id_pemeriksaan` varchar(15) NOT NULL,
  `id_antrean` varchar(15) NOT NULL,
  `id_detil_pemeriksaan` varchar(15) NOT NULL,
  `jenis_konsultasi` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_psikiatrik`
--

CREATE TABLE `pemeriksaan_psikiatrik` (
  `id_pem_psik` varchar(15) NOT NULL,
  `pembicaraan` varchar(20) NOT NULL,
  `waham` varchar(20) NOT NULL,
  `halusinasi` varchar(20) NOT NULL,
  `akustik` varchar(50) DEFAULT NULL,
  `visual` varchar(50) DEFAULT NULL,
  `lain_lain` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_psikiatrik`
--

INSERT INTO `pemeriksaan_psikiatrik` (`id_pem_psik`, `pembicaraan`, `waham`, `halusinasi`, `akustik`, `visual`, `lain_lain`, `created_at`, `updated_at`) VALUES
('2112050023', '0', '0', 'A', NULL, NULL, NULL, '2021-12-05 15:48:13', '2021-12-05 15:48:13'),
('2112050024', '0', '0', 'A', NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('PP2112060025', '1', '0', 'A', NULL, NULL, NULL, '2021-12-06 09:56:54', '2021-12-06 09:56:54'),
('PP2112060026', '1', '0', 'A', NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('PP2112060027', '1', '0', 'A', NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('PP2112060028', '0', '0', 'A', NULL, NULL, NULL, '2021-12-06 15:59:07', '2021-12-06 15:59:07'),
('PP2112060029', '0', '0', 'A', NULL, NULL, NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('PP2112070030', '1', '4', 'A', 'iya', 'tidur', 'sempoyonan terus', '2021-12-07 16:34:34', '2021-12-07 16:34:34'),
('PP2112070031', '0', '0', 'A', NULL, NULL, NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('PP2112070032', '0', '0', 'A', NULL, NULL, NULL, '2021-12-07 16:50:33', '2021-12-07 16:50:33'),
('PP2112070033', '1', '0', 'A', 'gitar', 'paradigm', 'ok', '2021-12-07 17:05:28', '2021-12-07 17:05:28'),
('PP2112080035', '2', '0', 'A', 'jazz', 'ada', 'banyak', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_tambahan`
--

CREATE TABLE `pemeriksaan_tambahan` (
  `id_pem_tambahan` varchar(15) NOT NULL,
  `benzodiazepine` varchar(20) DEFAULT 'Tidak',
  `cocaine` varchar(20) DEFAULT 'Tidak',
  `amphetamin` varchar(20) DEFAULT 'Tidak',
  `cthc_marijuana` varchar(20) DEFAULT 'Tidak',
  `methaphetamine` varchar(20) DEFAULT 'Tidak',
  `morphin` varchar(20) DEFAULT 'Tidak',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_tambahan`
--

INSERT INTO `pemeriksaan_tambahan` (`id_pem_tambahan`, `benzodiazepine`, `cocaine`, `amphetamin`, `cthc_marijuana`, `methaphetamine`, `morphin`, `created_at`, `updated_at`) VALUES
('2112050023', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:48:13', '2021-12-05 15:48:13'),
('2112050024', NULL, 'Cocaine', NULL, NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('PT2112060025', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:56:55', '2021-12-06 09:56:55'),
('PT2112060026', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('PT2112060027', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('PT2112060028', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 15:59:07', '2021-12-06 15:59:07'),
('PT2112060029', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('PT2112070030', NULL, 'Cocaine', NULL, NULL, NULL, NULL, '2021-12-07 16:34:34', '2021-12-07 16:34:34'),
('PT2112070031', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('PT2112070032', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:50:33', '2021-12-07 16:50:33'),
('PT2112070033', 'Benzodiazepine', 'Cocaine', NULL, NULL, NULL, NULL, '2021-12-07 17:05:29', '2021-12-07 17:05:29'),
('PT2112080035', NULL, NULL, NULL, NULL, NULL, 'Morphin', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_umum`
--

CREATE TABLE `pemeriksaan_umum` (
  `id_pemeriksaan` varchar(16) NOT NULL,
  `tekanan_darah` varchar(3) NOT NULL,
  `suhu` varchar(3) NOT NULL,
  `test_urine` varchar(20) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosis` varchar(25) NOT NULL,
  `biaya_pemeriksaan` varchar(7) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_umum`
--

INSERT INTO `pemeriksaan_umum` (`id_pemeriksaan`, `tekanan_darah`, `suhu`, `test_urine`, `keluhan`, `diagnosis`, `biaya_pemeriksaan`, `created_at`, `updated_at`) VALUES
('211206001', '1', '1', 'Negatif', 'w', 'w', '1', '2021-12-06 15:57:18', '2021-12-06 15:57:18'),
('211208002', '1', '1', 'Negatif', 'qwe', 'qwe', '190901', '2021-12-08 13:51:26', '2021-12-08 13:51:26'),
('211208003', '1', '1', 'Negatif', 'awe', 'eq', '190901', '2021-12-08 13:56:59', '2021-12-08 13:56:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_narkotika`
--

CREATE TABLE `penggunaan_narkotika` (
  `id_pgnn_narkotika` varchar(15) NOT NULL,
  `alkohol` varchar(50) DEFAULT NULL,
  `analgesik` varchar(1) DEFAULT NULL,
  `kokain` varchar(1) DEFAULT NULL,
  `halusinogen` varchar(1) DEFAULT NULL,
  `heroin` varchar(1) DEFAULT NULL,
  `barbibutat` varchar(1) DEFAULT NULL,
  `amfetamin` varchar(1) DEFAULT NULL,
  `inhalan` varchar(1) DEFAULT NULL,
  `metadon` varchar(1) DEFAULT NULL,
  `sedaptif_hipnotik` varchar(1) DEFAULT NULL,
  `kanabis` varchar(1) DEFAULT NULL,
  `empat_zat` varchar(1) DEFAULT NULL,
  `zat_lain_isi` varchar(30) DEFAULT NULL,
  `zat_lain` varchar(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggunaan_narkotika`
--

INSERT INTO `penggunaan_narkotika` (`id_pgnn_narkotika`, `alkohol`, `analgesik`, `kokain`, `halusinogen`, `heroin`, `barbibutat`, `amfetamin`, `inhalan`, `metadon`, `sedaptif_hipnotik`, `kanabis`, `empat_zat`, `zat_lain_isi`, `zat_lain`, `created_at`, `updated_at`) VALUES
('2112050023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:48:14', '2021-12-05 15:48:14'),
('2112050024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('2112060026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('2112060027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('2112060029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('2112070031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('2112070032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:50:34', '2021-12-07 16:50:34'),
('2112070033', '2', '3', '2', '4', '2', '3', '3', '3', '3', '2', '3', '3', 'besi', '1', '2021-12-07 17:05:29', '2021-12-07 17:05:29'),
('2112080035', '1', '3', '2', '2', '3', '5', '3', '5', '4', '2', '4', '4', 'sinte', '5', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_rawat_inap` varchar(20) DEFAULT NULL,
  `jenis_penyakit` varchar(50) DEFAULT NULL,
  `dari` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_rawat_inap`, `jenis_penyakit`, `dari`, `sampai`, `created_at`, `updated_at`) VALUES
('RI2112050025', '1', '2021-01-02', '2021-01-01', '2021-12-05 23:56:40', '2021-12-05 23:56:40'),
('RI2112060025', 'hhjk', '2021-12-31', '2021-12-31', '2021-12-06 16:56:54', '2021-12-06 16:56:54'),
('RI2112060025', 'hhjk', '2021-12-31', '2021-12-31', '2021-12-06 16:57:13', '2021-12-06 16:57:13'),
('RI2112060026', 'lkj', '2021-12-31', '2021-12-31', '2021-12-06 16:57:50', '2021-12-06 16:57:50'),
('RI2112060026', 'lkj', '2021-12-31', '2021-12-31', '2021-12-06 16:58:34', '2021-12-06 16:58:34'),
('RI2112060027', 'qwq', '2021-12-31', '2021-12-31', '2021-12-06 17:01:01', '2021-12-06 17:01:01'),
('RI2112060028', 'h', '2021-12-31', '2021-12-31', '2021-12-06 22:59:07', '2021-12-06 22:59:07'),
('RI2112060029', '12', '2021-12-30', '2021-12-31', '2021-12-06 23:04:16', '2021-12-06 23:04:16'),
('RI2112060029', '12', '2021-12-30', '2021-12-31', '2021-12-06 23:05:04', '2021-12-06 23:05:04'),
('RI2112070030', 'sakau', '2017-07-28', '2021-12-07', '2021-12-07 23:34:34', '2021-12-07 23:34:34'),
('RI2112070030', 'sakau', '2017-07-28', '2021-12-07', '2021-12-07 23:35:40', '2021-12-07 23:35:40'),
('RI2112070031', 'qweq', '2021-12-31', '2021-12-31', '2021-12-07 23:37:30', '2021-12-07 23:37:30'),
('RI2112070031', 'qweq', '2021-12-31', '2021-12-31', '2021-12-07 23:37:47', '2021-12-07 23:37:47'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:38:30', '2021-12-07 23:38:30'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:39:46', '2021-12-07 23:39:46'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:40:35', '2021-12-07 23:40:35'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:40:53', '2021-12-07 23:40:53'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:41:14', '2021-12-07 23:41:14'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:41:33', '2021-12-07 23:41:33'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:41:52', '2021-12-07 23:41:52'),
('RI2112070031', 'w', '2021-12-31', '2021-12-31', '2021-12-07 23:44:53', '2021-12-07 23:44:53'),
('RI2112070031', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:46:15', '2021-12-07 23:46:15'),
('RI2112070031', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:48:11', '2021-12-07 23:48:11'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:48:58', '2021-12-07 23:48:58'),
('RI2112070032', 'qwe', '2021-12-31', '2021-12-31', '2021-12-07 23:50:33', '2021-12-07 23:50:33'),
('RI2112070033', 'jiwa', '2021-12-01', '2021-12-07', '2021-12-08 00:05:28', '2021-12-08 00:05:28'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:50:11', '2021-12-08 12:50:11'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:50:35', '2021-12-08 12:50:35'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:51:53', '2021-12-08 12:51:53'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:52:18', '2021-12-08 12:52:18'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:52:26', '2021-12-08 12:52:26'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:52:33', '2021-12-08 12:52:33'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:52:38', '2021-12-08 12:52:38'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:52:47', '2021-12-08 12:52:47'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:53:12', '2021-12-08 12:53:12'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 12:53:26', '2021-12-08 12:53:26'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:00:32', '2021-12-08 13:00:32'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:02:09', '2021-12-08 13:02:09'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:09:17', '2021-12-08 13:09:17'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:10:57', '2021-12-08 13:10:57'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:11:18', '2021-12-08 13:11:18'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:11:51', '2021-12-08 13:11:51'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:12:28', '2021-12-08 13:12:28'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:12:37', '2021-12-08 13:12:37'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:12:58', '2021-12-08 13:12:58'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:15:19', '2021-12-08 13:15:19'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:15:48', '2021-12-08 13:15:48'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:16:32', '2021-12-08 13:16:32'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:16:48', '2021-12-08 13:16:48'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:17:13', '2021-12-08 13:17:13'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:17:27', '2021-12-08 13:17:27'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:17:44', '2021-12-08 13:17:44'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:20:04', '2021-12-08 13:20:04'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:20:52', '2021-12-08 13:20:52'),
('RI2112080034', 'qwe', '2020-12-31', '2021-12-31', '2021-12-08 13:21:08', '2021-12-08 13:21:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_RO` varchar(15) NOT NULL,
  `id_obat` varchar(15) NOT NULL,
  `aturan_pakai` varchar(100) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`id_RO`, `id_obat`, `aturan_pakai`, `jumlah`, `created_at`, `updated_at`) VALUES
('21120507', '1111210001', '6x1 setelah makan', 21, '2021-12-08 14:15:33', '2021-12-08 14:15:33'),
('21120808', '1111210002', '6x1 setelahmakan', 1, '2021-12-08 20:57:00', '2021-12-08 20:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_keluarga`
--

CREATE TABLE `riwayat_keluarga` (
  `id_riwayat_keluarga` varchar(15) NOT NULL,
  `kondisi_hidup` varchar(50) DEFAULT NULL,
  `hidup_dgn_pgn_zat` varchar(1) DEFAULT NULL,
  `ayah_ibu` varchar(1) DEFAULT NULL,
  `saudara_kandung_tiri` varchar(1) DEFAULT NULL,
  `om_tante` varchar(1) DEFAULT NULL,
  `teman` varchar(1) DEFAULT NULL,
  `pasangan` varchar(1) DEFAULT NULL,
  `lainnya_isi` varchar(30) DEFAULT NULL,
  `lainya` varchar(1) DEFAULT NULL,
  `konf_ibu` varchar(2) DEFAULT NULL,
  `konf_adik_kakak` varchar(2) DEFAULT NULL,
  `konf_pasangan` varchar(2) DEFAULT NULL,
  `konf_anak` varchar(2) DEFAULT NULL,
  `konf_kel_lain_isi` varchar(50) DEFAULT NULL,
  `konf_kel_lain` varchar(2) DEFAULT NULL,
  `konf_teman_akrab` varchar(2) DEFAULT NULL,
  `konf_tetangga` varchar(2) DEFAULT NULL,
  `konf_teman_kerja` varchar(2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesialis`
--

CREATE TABLE `spesialis` (
  `kode_spesialis` varchar(2) NOT NULL,
  `spesialis_kedokteran` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spesialis`
--

INSERT INTO `spesialis` (`kode_spesialis`, `spesialis_kedokteran`, `created_at`, `updated_at`) VALUES
('1', 'Umum', '2021-11-15 16:00:32', '2021-11-15 16:00:32'),
('2', 'Kejiwaan', '2021-11-15 16:00:32', '2021-11-15 16:00:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_legal`
--

CREATE TABLE `status_legal` (
  `id_status_legal` varchar(15) NOT NULL,
  `mencuri_vandalisme` varchar(50) DEFAULT NULL,
  `pemalsuan` varchar(1) DEFAULT NULL,
  `perampokan` varchar(1) DEFAULT NULL,
  `pemerkosaan` varchar(1) DEFAULT NULL,
  `melecehkan_pengadilan` varchar(1) DEFAULT NULL,
  `pbb_mp` varchar(1) DEFAULT NULL,
  `penyerangan_bersenjata` varchar(1) DEFAULT NULL,
  `penyerangan` varchar(1) DEFAULT NULL,
  `pembunuhan` varchar(1) DEFAULT NULL,
  `masalah_narkoba` varchar(1) DEFAULT NULL,
  `pembobolan_pencurian` varchar(1) DEFAULT NULL,
  `pembakaran_rumah` varchar(1) DEFAULT NULL,
  `pelacuran` varchar(1) DEFAULT NULL,
  `SL_lain_isi` varchar(20) DEFAULT NULL,
  `SL_lain` varchar(2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_legal`
--

INSERT INTO `status_legal` (`id_status_legal`, `mencuri_vandalisme`, `pemalsuan`, `perampokan`, `pemerkosaan`, `melecehkan_pengadilan`, `pbb_mp`, `penyerangan_bersenjata`, `penyerangan`, `pembunuhan`, `masalah_narkoba`, `pembobolan_pencurian`, `pembakaran_rumah`, `pelacuran`, `SL_lain_isi`, `SL_lain`, `created_at`, `updated_at`) VALUES
('2112050023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:48:14', '2021-12-05 15:48:14'),
('2112050024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('2112060026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('2112060027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('2112060029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('2112070031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('2112070032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:50:34', '2021-12-07 16:50:34'),
('2112070033', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'seksual', '1', '2021-12-07 17:05:30', '2021-12-07 17:05:30'),
('2112080035', '1', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', 'penipuan status', '1', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_medis`
--

CREATE TABLE `status_medis` (
  `id_status_medis` varchar(15) NOT NULL,
  `id_jenis_penyakit` varchar(50) DEFAULT NULL,
  `riwayat_p_kronis` varchar(50) DEFAULT NULL,
  `riwayat_jenis_penyakit` varchar(50) DEFAULT NULL,
  `terapi_medis` varchar(50) DEFAULT NULL,
  `hiv` varchar(50) DEFAULT NULL,
  `hepatitisb` varchar(50) DEFAULT NULL,
  `hepatitisc` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_medis`
--

INSERT INTO `status_medis` (`id_status_medis`, `id_jenis_penyakit`, `riwayat_p_kronis`, `riwayat_jenis_penyakit`, `terapi_medis`, `hiv`, `hepatitisb`, `hepatitisc`, `created_at`, `updated_at`) VALUES
('2112050023', '2112050023', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-05 15:48:13', '2021-12-05 15:48:13'),
('2112050024', '2112050024', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('SM2112060025', 'JP2112060025', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-06 09:56:55', '2021-12-06 09:56:55'),
('SM2112060026', 'JP2112060026', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('SM2112060027', 'JP2112060027', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('SM2112060028', 'JP2112060028', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-06 15:59:08', '2021-12-06 15:59:08'),
('SM2112060029', 'JP2112060029', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('SM2112070030', 'JP2112070030', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-07 16:34:34', '2021-12-07 16:34:34'),
('SM2112070031', 'JP2112070031', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('SM2112070032', 'JP2112070032', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-07 16:50:34', '2021-12-07 16:50:34'),
('SM2112070033', 'JP2112070033', NULL, NULL, '0', NULL, NULL, NULL, '2021-12-07 17:05:29', '2021-12-07 17:05:29'),
('SM2112080035', 'JP2112080035', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pekerjaan`
--

CREATE TABLE `status_pekerjaan` (
  `id_stt_pekerjaan` varchar(15) NOT NULL,
  `id_pasien` varchar(25) NOT NULL,
  `pola_pekerjaan` varchar(50) DEFAULT NULL,
  `kode_pekerjaan` varchar(50) DEFAULT NULL,
  `keterampilan_teknis` varchar(50) DEFAULT NULL,
  `dukungan_hidup` varchar(50) DEFAULT NULL,
  `pemberi_dukungan` varchar(50) DEFAULT NULL,
  `finansial` varchar(50) DEFAULT NULL,
  `tempat_tinggal` varchar(50) DEFAULT NULL,
  `makan` varchar(50) DEFAULT NULL,
  `pgbtn_prwtn` varchar(50) DEFAULT NULL,
  `rwyt_pnykt_kronis` varchar(50) DEFAULT NULL,
  `jenis_penyakit` varchar(50) DEFAULT NULL,
  `terapi_medis` varchar(50) DEFAULT NULL,
  `jenis_terapi` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pekerjaan`
--

INSERT INTO `status_pekerjaan` (`id_stt_pekerjaan`, `id_pasien`, `pola_pekerjaan`, `kode_pekerjaan`, `keterampilan_teknis`, `dukungan_hidup`, `pemberi_dukungan`, `finansial`, `tempat_tinggal`, `makan`, `pgbtn_prwtn`, `rwyt_pnykt_kronis`, `jenis_penyakit`, `terapi_medis`, `jenis_terapi`, `created_at`, `updated_at`) VALUES
('2112050023', '21112903', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-05 15:48:14', '2021-12-05 15:48:14'),
('2112050024', '21120505', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('2112060026', '2111110001', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('2112060027', '2111110001', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('2112060029', '12', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('2112070031', '3203012406920004', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('2112070032', '3203012406920004', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-07 16:50:34', '2021-12-07 16:50:34'),
('2112070033', '32000000', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, '0', NULL, '2021-12-07 17:05:29', '2021-12-07 17:05:29'),
('2112080035', '320088571750', '2', NULL, NULL, 'tidak', 'sepi', '1', '0', '1', '1', NULL, NULL, NULL, NULL, '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_psikiatris`
--

CREATE TABLE `status_psikiatris` (
  `id_status_psikiatris` varchar(15) NOT NULL,
  `depresi_serius` varchar(1) DEFAULT NULL,
  `halusinasi` varchar(1) DEFAULT NULL,
  `perilaku_kasar` varchar(1) DEFAULT NULL,
  `berusaha_bundir` varchar(1) DEFAULT NULL,
  `cemas_gelisah` varchar(1) DEFAULT NULL,
  `sulit_mengingat` varchar(1) DEFAULT NULL,
  `pikiran_utk_bundir` varchar(1) DEFAULT NULL,
  `menerima_pengobatan` varchar(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_psikiatris`
--

INSERT INTO `status_psikiatris` (`id_status_psikiatris`, `depresi_serius`, `halusinasi`, `perilaku_kasar`, `berusaha_bundir`, `cemas_gelisah`, `sulit_mengingat`, `pikiran_utk_bundir`, `menerima_pengobatan`, `created_at`, `updated_at`) VALUES
('2112050023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:48:14', '2021-12-05 15:48:14'),
('2112050024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 15:50:03', '2021-12-05 15:50:03'),
('2112060026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 09:57:50', '2021-12-06 09:57:50'),
('2112060027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 10:01:02', '2021-12-06 10:01:02'),
('2112060029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 16:04:17', '2021-12-06 16:04:17'),
('2112070031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:37:31', '2021-12-07 16:37:31'),
('2112070032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 16:50:34', '2021-12-07 16:50:34'),
('2112070033', '2', '1', '2', '1', '2', '1', '1', '1', '2021-12-07 17:05:30', '2021-12-07 17:05:30'),
('2112080035', '2', '2', '2', '2', '2', '2', '2', '2', '2021-12-08 14:38:42', '2021-12-08 14:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tebus_obat`
--

CREATE TABLE `tebus_obat` (
  `id_tebus_obat` varchar(255) NOT NULL,
  `id_resep_obat` varchar(50) DEFAULT NULL,
  `jumlah_beli` varchar(50) DEFAULT NULL,
  `sub_total` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tebus_obat`
--

INSERT INTO `tebus_obat` (`id_tebus_obat`, `id_resep_obat`, `jumlah_beli`, `sub_total`, `created_at`, `updated_at`) VALUES
('20211208052926', '21120809', '1', '1231', '2021-12-09 00:29:27', '2021-12-09 00:29:27'),
('20211208053205', '21120809', '2', '2462', '2021-12-09 00:32:05', '2021-12-09 00:32:05'),
('211206001', '21120602', '3', '3693', '2021-12-06 12:39:55', '2021-12-06 12:39:55'),
('211206002', '21120602', '1', '1231', '2021-12-06 14:04:42', '2021-12-06 14:04:42'),
('211206003', '21120602', '1', '', '2021-12-06 15:05:29', '2021-12-06 15:05:29'),
('211206004', '21120602', '1', '1231', '2021-12-06 16:44:21', '2021-12-06 16:44:21'),
('211207005', '21120707', '1', '', '2021-12-08 00:28:39', '2021-12-08 00:28:39'),
('21120800010', '21120809', '1', '1231', '2021-12-08 23:40:01', '2021-12-08 23:40:01'),
('2112080010', '21120809', '8', '9848', '2021-12-08 21:46:47', '2021-12-08 21:46:47'),
('211208006', '21120808', '1', '1231', '2021-12-08 17:36:44', '2021-12-08 17:36:44'),
('211208007', '21120809', '1', '1231', '2021-12-08 21:31:58', '2021-12-08 21:31:58'),
('211208008', '21120809', '1', '1231', '2021-12-08 21:32:11', '2021-12-08 21:32:11'),
('211208009', '21120809', '1', '1231', '2021-12-08 21:32:57', '2021-12-08 21:32:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dokter_spesialis` varchar(30) DEFAULT NULL,
  `jk` varchar(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `hak_akses`, `username`, `password`, `dokter_spesialis`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(211111001, 'Admin', 'Admin Apotek', 'admin', '$2y$10$ojOoXqKvevMhgvSkTTXMkeD5laTDsVX5/ZVF56pDlL0qB.09ou6RW', NULL, 'L', 'Cianjur', '2021-01-01', 'asd', '123', '2021-11-20 15:54:42', '2021-11-20 15:54:42'),
(211120002, 'Syamsy Wiguna Putra Dwi Raksa', 'Admin Pendaftaran', 'pendaftaran', '$2y$10$z2wFtnDN9hnIat2r91dsiO8xCSrOU4a0uVVROZdJ/.yJsTSBK2v5.', NULL, 'L', 'Cianjur', '1997-05-10', 'Cianjur', '08531618894', '2021-11-20 16:19:33', '2021-11-20 16:19:33'),
(211120005, 'q', 'Admin Pendaftaran', 'q', '$2y$10$z2lNu1XVmgTxaiNJTnnlSe5lSRXBICJfOaA/Cfv0uwghGllWIn982', NULL, 'L', 'q', '2021-01-01', 'asd', '123', '2021-11-20 16:28:14', '2021-11-20 16:28:14'),
(211120006, 'Putra', 'Perawat', 'dokter', '$2y$10$/YKJvkqXCf4Decv15.h6...m7ozSOzeSalafR0PLCS8Ix5NuGeGZC', 'Dokter Umum', 'L', 'Cianjur', '2021-01-01', 'qw', '123', '2021-11-20 16:51:56', '2021-11-20 16:51:56'),
(211120007, 'qwe', 'Apoteker', 'apoteker', '$2y$10$1v0SI9A1La4UulED9gqGG.2KJtZ84hpPkING7uCp0izcmg5fnCEbu', NULL, 'L', 'Cianjur', '2021-01-01', 'asd', '123', '2021-11-20 16:52:21', '2021-11-20 16:52:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin Apotek','Pendaftaran','Dokter','Apoteker') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendaftaran',
  `dokter_spesialis` enum('Dokter Umum','Dokter Jiwa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `dokter_spesialis`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Syamsy', 'syamsy.wiguna.sw@gmail.com', NULL, '$2y$10$iJrtQ1yA7dx8aiWpx2oDXOmqOnYFduHhTDxOepgWYffuGm.UWh9WW', 'Admin Apotek', 'Dokter Umum', NULL, '2021-11-12 20:25:43', '2021-11-12 20:25:43'),
(2, 'Syamsy', 'sss@gmail.com', NULL, '$2y$10$2YT.a5Mhk5fuGmyTNLkpzuMdstgkp6GnAEJatBBowed32NvCZVgpS', 'Pendaftaran', 'Dokter Umum', NULL, '2021-11-20 08:50:15', '2021-11-20 08:50:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrean`
--
ALTER TABLE `antrean`
  ADD PRIMARY KEY (`id_antrean`);

--
-- Indeks untuk tabel `detil_pemeriksaan_jiwa`
--
ALTER TABLE `detil_pemeriksaan_jiwa`
  ADD PRIMARY KEY (`id_detil_pemeriksaan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `NIK` (`nik`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indeks untuk tabel `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  ADD PRIMARY KEY (`id_pem_fisik`);

--
-- Indeks untuk tabel `pemeriksaan_kejiwaan`
--
ALTER TABLE `pemeriksaan_kejiwaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indeks untuk tabel `pemeriksaan_pasien`
--
ALTER TABLE `pemeriksaan_pasien`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indeks untuk tabel `pemeriksaan_psikiatrik`
--
ALTER TABLE `pemeriksaan_psikiatrik`
  ADD PRIMARY KEY (`id_pem_psik`);

--
-- Indeks untuk tabel `pemeriksaan_tambahan`
--
ALTER TABLE `pemeriksaan_tambahan`
  ADD PRIMARY KEY (`id_pem_tambahan`);

--
-- Indeks untuk tabel `pemeriksaan_umum`
--
ALTER TABLE `pemeriksaan_umum`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indeks untuk tabel `penggunaan_narkotika`
--
ALTER TABLE `penggunaan_narkotika`
  ADD PRIMARY KEY (`id_pgnn_narkotika`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `riwayat_keluarga`
--
ALTER TABLE `riwayat_keluarga`
  ADD PRIMARY KEY (`id_riwayat_keluarga`);

--
-- Indeks untuk tabel `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`kode_spesialis`);

--
-- Indeks untuk tabel `status_legal`
--
ALTER TABLE `status_legal`
  ADD PRIMARY KEY (`id_status_legal`);

--
-- Indeks untuk tabel `status_medis`
--
ALTER TABLE `status_medis`
  ADD PRIMARY KEY (`id_status_medis`);

--
-- Indeks untuk tabel `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  ADD PRIMARY KEY (`id_stt_pekerjaan`);

--
-- Indeks untuk tabel `status_psikiatris`
--
ALTER TABLE `status_psikiatris`
  ADD PRIMARY KEY (`id_status_psikiatris`);

--
-- Indeks untuk tabel `tebus_obat`
--
ALTER TABLE `tebus_obat`
  ADD PRIMARY KEY (`id_tebus_obat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21111500011;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2111110002;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
