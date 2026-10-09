-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2026 at 02:24 PM
-- Server version: 5.7.39
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-kud`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_petani` enum('Plasma','Swadaya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_lahan` decimal(8,2) DEFAULT NULL,
  `blok_kebun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_bergabung` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `user_id`, `no_anggota`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `jenis_petani`, `luas_lahan`, `blok_kebun`, `tanggal_bergabung`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'A-01', '151512141214', 'Pekanbaru', '2000-09-25', 'Laki-laki', 'Suka Damai', '081204050401', 'Plasma', '5.00', '12', '2026-07-02', NULL, 'Aktif', '2026-07-02 07:29:02', '2026-07-02 07:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `angsurans`
--

CREATE TABLE `angsurans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinjaman_id` bigint(20) UNSIGNED NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum_bayar','menunggu_verifikasi','dibayar','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_bayar',
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slip_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_penolakan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `angsurans`
--

INSERT INTO `angsurans` (`id`, `pinjaman_id`, `angsuran_ke`, `jatuh_tempo`, `nominal`, `tanggal_bayar`, `bukti_bayar`, `status`, `verified_by`, `verified_at`, `created_at`, `updated_at`, `slip_pembayaran`, `alasan_penolakan`) VALUES
(1, 1, 1, '2026-08-02', '1250000.00', '2026-07-02', 'angsuran/01KWHR9VXW713BN3WCVH5JFEWZ.png', 'menunggu_verifikasi', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 08:49:02', NULL, NULL),
(2, 1, 2, '2026-09-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(3, 1, 3, '2026-10-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(4, 1, 4, '2026-11-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(5, 1, 5, '2026-12-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(6, 1, 6, '2027-01-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(7, 1, 7, '2027-02-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(8, 1, 8, '2027-03-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(9, 1, 9, '2027-04-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(10, 1, 10, '2027-05-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(11, 1, 11, '2027-06-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL),
(12, 1, 12, '2027-07-02', '1250000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-07-02 07:31:19', '2026-07-02 07:31:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `website_id`, `slug`, `gambar`, `tanggal`, `ringkasan`, `isi`, `is_publish`, `created_at`, `updated_at`, `deleted_at`, `views`) VALUES
(1, 'berita-01', 1, 'berita-01', 'berita/01KWFK3DFW2RQVFR47RMS8GE48.jpg', '2026-07-02', 'ini adalah berita satu jadi mohon bersar', '<p>dari tadi kita sudah menunjukkan hal yang sanagat luat biasa sekali untuk menjelaskan</p>', 1, '2026-07-01 12:39:39', '2026-07-02 08:32:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`, `website_id`) VALUES
(1, 'galeri 01', 'gallery/01KWFKAJ41VJNHMRMNXDQDHKS4.jpg', 1, 1, '2026-07-01 12:43:33', '2026-07-01 12:43:33', 1),
(2, 'galeri 02', 'gallery/01KWHQWHCQGPNW52XXRH78MXVA.png', 2, 1, '2026-07-02 08:41:45', '2026-07-02 08:41:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kritik_sarans`
--

CREATE TABLE `kritik_sarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `balasan` text COLLATE utf8mb4_unicode_ci,
  `dibalas_pada` timestamp NULL DEFAULT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kritik_sarans`
--

INSERT INTO `kritik_sarans` (`id`, `nama`, `email`, `judul`, `pesan`, `balasan`, `dibalas_pada`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 'Yogi Sepdu Dehiya', 'admin@gmail.com', 'ini percobaan ke empat yah', 'oke deh', NULL, NULL, 0, '2026-07-08 11:26:49', '2026-07-08 11:26:49'),
(2, 'Yogi Sepdu Dehiya', 'yogisepdu@gmail.com', 'Kritik Pelayanan', 'halo, ini saya mau kritik yah..', 'halo,\nterimakasih sudah memberikan saya kritikan dan sarannya kepada saya, sehingga saya bisa melaksanakan yang bisa', '2026-07-08 12:42:54', 1, '2026-07-08 12:21:10', '2026-07-08 12:42:54'),
(3, 'meldi', 'meldi@gmail.com', 'ini saya coba tes', 'oke', NULL, NULL, 0, '2026-10-09 07:23:39', '2026-10-09 07:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_03_184019_create_websites_table', 1),
(5, '2026_06_05_192731_create_sliders_table', 1),
(6, '2026_06_06_172353_create_profiles_table', 1),
(7, '2026_06_06_175345_add_structure_image_to_profiles_table', 1),
(8, '2026_06_06_180446_create_produks_table', 1),
(9, '2026_06_06_182140_create_pengumumen_table', 1),
(10, '2026_06_06_191004_create_galleries_table', 1),
(11, '2026_06_07_080342_create_beritas_table', 1),
(12, '2026_06_07_181848_add_views_to_beritas_table', 1),
(13, '2026_06_08_073345_add_role_to_users_table', 1),
(14, '2026_06_13_200241_create_anggotas_table', 1),
(15, '2026_06_13_204557_create_pinjamen_table', 1),
(16, '2026_06_13_204607_create_angsurans_table', 1),
(17, '2026_06_14_092356_create_simpanans_table', 1),
(18, '2026_06_14_113943_add_dokumen_to_pinjamen_table', 1),
(19, '2026_06_14_172843_add_slip_to_angsurans_table', 1),
(20, '2026_06_15_184742_add_alasan_penolakan_to_angsurans_table', 1),
(21, '2026_06_22_141055_add_slip_pdf_to_simpanans_table', 1),
(22, '2026_06_22_145024_create_simpanan_items_table', 1),
(23, '2026_06_25_160032_create_penarikans_table', 1),
(24, '2026_06_27_173155_add_verification_columns_to_penarikans_table', 1),
(25, '2026_06_29_092833_create_user_profiles_table', 1),
(26, '2026_07_01_162553_create_settings_table', 1),
(27, '2026_07_01_184323_add_website_id_to_sliders_table', 1),
(28, '2026_07_01_184442_add_website_id_to_profiles_table', 1),
(29, '2026_07_01_184452_add_website_id_to_produks_table', 1),
(30, '2026_07_01_184504_add_website_id_to_pengumumen_table', 1),
(31, '2026_07_01_184525_add_website_id_to_galleries_table', 1),
(32, '2026_07_08_092656_create_kritik_sarans_table', 2),
(33, '2026_07_08_190525_add_balasan_to_kritik_sarans_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penarikans`
--

CREATE TABLE `penarikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `kode_penarikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penarikan` date NOT NULL,
  `jumlah_penarikan` decimal(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penarikans`
--

INSERT INTO `penarikans` (`id`, `anggota_id`, `kode_penarikan`, `tanggal_penarikan`, `jumlah_penarikan`, `keterangan`, `status`, `verified_by`, `verified_at`, `slip`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'TRK/2026/07/00001', '2026-07-02', '1000000.00', 'BIAYA LAINNYA', 'disetujui', 2, '2026-07-02 08:44:50', NULL, 1, '2026-07-02 08:39:07', '2026-07-02 08:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `title`, `description`, `image`, `is_active`, `sort_order`, `created_at`, `updated_at`, `website_id`) VALUES
(1, 'ini pengumuman pertama', 'jadi ini adalah pengumuman yang di lakukan untuk menyelesaikan', 'pengumuman/01KWHJH8FE7R6ED9VYW49NXMXP.png', 1, 1, '2026-07-01 12:45:33', '2026-07-02 07:08:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjamen`
--

CREATE TABLE `pinjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `kode_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jumlah_pinjaman` decimal(15,2) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `persentase_bunga` decimal(5,2) NOT NULL,
  `total_bunga` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_pinjaman` decimal(15,2) NOT NULL DEFAULT '0.00',
  `angsuran_per_bulan` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tujuan_pinjaman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','menunggu','disetujui','ditolak','lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `catatan_pimpinan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jaminan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_bukti_penghasilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_agunan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_dokumen_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjamen`
--

INSERT INTO `pinjamen` (`id`, `anggota_id`, `kode_pinjaman`, `tanggal_pengajuan`, `jumlah_pinjaman`, `jangka_waktu`, `persentase_bunga`, `total_bunga`, `total_pinjaman`, `angsuran_per_bulan`, `tujuan_pinjaman`, `status`, `approved_by`, `approved_at`, `catatan_pimpinan`, `created_at`, `updated_at`, `no_hp`, `email`, `jaminan`, `file_ktp`, `file_kk`, `file_bukti_penghasilan`, `file_agunan`, `file_dokumen_pendukung`) VALUES
(1, 1, 'PJM-20260702-00001', '2026-07-02', '15000000.00', 12, '0.00', '0.00', '15000000.00', '1250000.00', 'Biaya Pupuk', 'disetujui', 2, '2026-07-02 07:31:19', NULL, '2026-07-02 07:30:21', '2026-07-02 07:31:19', '081204050401', 'alfi@kud.com', 'SHM Tanah', 'pinjaman/ktp/01KWHKSSBEGZ5G79TAY4ZTJN8E.pdf', 'pinjaman/kk/01KWHKSSBJJ64D77401JQXTYNG.pdf', 'pinjaman/penghasilan/01KWHKSSBPP46YFT963TQ9BEP7.pdf', 'pinjaman/agunan/01KWHKSSBTNNFTC5E5CSXVB2AV.pdf', 'pinjaman/pendukung/01KWHKSSBY5W9MMTQVVT385SZY.pdf'),
(2, 1, 'PJM-20260702-00002', '2026-07-02', '15000000.00', 24, '8.00', '1200000.00', '16200000.00', '675000.00', 'BIaya Pupuk', 'menunggu', NULL, NULL, NULL, '2026-07-02 08:47:43', '2026-07-02 08:48:21', '081204050401', 'alfi@kud.com', 'SHM Kebun', 'pinjaman/ktp/01KWHR7EX35N8V4CKBJQ0C7TAQ.pdf', 'pinjaman/kk/01KWHR7EX8RM30QQPDB6RZ4ZA9.pdf', 'pinjaman/penghasilan/01KWHR7EXRZBHX72VYZET1Y4H3.pdf', 'pinjaman/agunan/01KWHR7EY2Z1JME6QKHP96MS6C.pdf', 'pinjaman/pendukung/01KWHR7EY877HDN0G44MAG5JTG.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('pupuk','tbs','simpan_pinjam') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `type`, `title`, `content`, `is_active`, `created_at`, `updated_at`, `website_id`) VALUES
(1, 'pupuk', 'PUPUK PESTISIDA', '<p>ini layanan pupuk pestisida ya :<br></p><p>keterangan.....</p><table><tbody><tr><th rowspan=\"1\" colspan=\"1\"><p>H</p></th><th rowspan=\"1\" colspan=\"1\"><p>U</p></th><th rowspan=\"1\" colspan=\"1\"><p>B</p></th><th rowspan=\"1\" colspan=\"1\"><p>Harga</p></th></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>ini</p></td><td rowspan=\"1\" colspan=\"1\"><p>adalah</p></td><td rowspan=\"1\" colspan=\"1\"><p>hari yang sangat</p></td><td rowspan=\"1\" colspan=\"1\"><p>ABC</p></td></tr></tbody></table>', 1, '2026-07-01 12:48:06', '2026-07-02 08:41:18', 1),
(2, 'tbs', 'TBS', '<p><strong>HARGA TBS :</strong><br><br></p><table><tbody><tr><th rowspan=\"1\" colspan=\"1\"><p>TGL</p></th><th rowspan=\"1\" colspan=\"1\"><p>HARGA</p></th><th rowspan=\"1\" colspan=\"1\"><p>KILO</p></th></tr><tr><td rowspan=\"1\" colspan=\"1\"><p>01 JUNI 2026</p></td><td rowspan=\"1\" colspan=\"1\"><p>Rp. 25.000,-</p></td><td rowspan=\"1\" colspan=\"1\"><p>1</p></td></tr></tbody></table>', 1, '2026-07-01 12:49:09', '2026-07-01 12:49:09', 1),
(3, 'simpan_pinjam', 'Pinjam', '<p>ayo lah pinjam di sini dong</p>', 1, '2026-07-01 12:49:27', '2026-07-01 12:49:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SEJARAH KUD KAMPAR',
  `history` longtext COLLATE utf8mb4_unicode_ci,
  `vision` longtext COLLATE utf8mb4_unicode_ci,
  `mission` longtext COLLATE utf8mb4_unicode_ci,
  `structure_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `title`, `history`, `vision`, `mission`, `structure_image`, `created_at`, `updated_at`, `website_id`) VALUES
(1, 'SEJARAH KUD', '<p>INI SEJARA KUD YAH</p>', '<p>VISI KUD MENCERDASKAN BANGSA</p>', '<ol start=\"1\"><li><p>SATU</p></li><li><p>DUA</p></li><li><p>TIGA</p></li></ol>', 'profiles/01KWHQTC8ZWP5HXNSVATHVWX36.jpg', '2026-07-01 12:51:42', '2026-07-02 08:40:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('79aBypoQm2UfyQBbgpohIV1lX36wBAqWN9GAZwT5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'eyJfdG9rZW4iOiJSZGVoVFJBcjM3ME93RkR4MlNaNExZaTU5YVQwVmlFdW45QUpCR3I3IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW4ifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJpbmRleCJ9fQ==', 1791555819),
('i474f1qbMouAJDsjb5XW4FW9JJqp0yY3iLqyTD1k', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJyQXpNZDd2VnQ4b1VXNlNrREFPajJ5NHA2NFFpdWhLZDRsRU1adWNUIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJpbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1783538470),
('p5zXSOwe0s05thNJEMLQp0Gbn1p9FB28iNfYkVah', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'eyJfdG9rZW4iOiJVRWdjY2s0WWdUcWxrSmJiQlNqSmR2b0V0Qjg1YUYwVWNGcDZCSVVIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwva3JpdGlrLXNhcmFuc1wvMlwvZWRpdCIsInJvdXRlIjoiZmlsYW1lbnQuYWRtaW4ucmVzb3VyY2VzLmtyaXRpay1zYXJhbnMuZWRpdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJwYXNzd29yZF9oYXNoX3dlYiI6IjU2ZWUxMGI3NzkyYTM0MGI0NTBhMDJlMzZiN2YxYmEyOGM3MGJkNTc1NDZiMDBhZmY4Nzc4MWUwM2M2YzgwZTciLCJ0YWJsZXMiOnsiYTQ5YTI5ZTNkNDhmNDExMDdlY2M4ZWI0ZjE4ZmE5MzlfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJuYW1hIiwibGFiZWwiOiJOYW1hIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImVtYWlsIiwibGFiZWwiOiJFbWFpbCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqdWR1bCIsImxhYmVsIjoiSnVkdWwiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoicGVzYW4iLCJsYWJlbCI6IlBlc2FuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImRpYmFjYSIsImxhYmVsIjoiU3RhdHVzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImRpYmFsYXNfcGFkYSIsImxhYmVsIjoiRGliYWxhcyBQYWRhIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImNyZWF0ZWRfYXQiLCJsYWJlbCI6IlRhbmdnYWwgTWFzdWsiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sImZkYjM0Y2U0ZTg0YzM3OGFmM2FiOGQ1NGQ0MzM1OGViX2NvbHVtbnMiOltdLCIxNmUzZjgwZjUwOWQxNmI4YmJjNzgxNDNlOTUzNDliYl9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImltYWdlIiwibGFiZWwiOiJHYW1iYXIiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGl0bGUiLCJsYWJlbCI6Ikp1ZHVsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InNvcnRfb3JkZXIiLCJsYWJlbCI6IlVydXRhbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJpc19hY3RpdmUiLCJsYWJlbCI6IlN0YXR1cyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJEaWJ1YXQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sImQxOGM4NTI3NDgwMDI1NGY1MGIzMTM0OTJlZTMwMmY0X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGl0bGUiLCJsYWJlbCI6Ikp1ZHVsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Imhpc3RvcnkiLCJsYWJlbCI6IlNlamFyYWgiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidmlzaW9uIiwibGFiZWwiOiJWaXNpIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InN0cnVjdHVyZV9pbWFnZSIsImxhYmVsIjoiU3RydWt0dXIiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY3JlYXRlZF9hdCIsImxhYmVsIjoiRGlidWF0IiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dLCI4MzZlZDE3MWUwODdkY2U5OGEzNmE4Y2Y0YmU1ZGU4M19jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InR5cGUiLCJsYWJlbCI6IkplbmlzIExheWFuYW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGl0bGUiLCJsYWJlbCI6Ikp1ZHVsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImlzX2FjdGl2ZSIsImxhYmVsIjoiSXMgYWN0aXZlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dfSwiZmlsYW1lbnQiOltdfQ==', 1783539853),
('yqYi1SyJWY91aRjL5DyVQZsc6pVqH69HKLRcFPy0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'eyJfdG9rZW4iOiJ3NE9Ub0tiZ1dQVWt5WWk0Wkp5ekpBNjBzV1RRbnZzWkxvSHZoekpwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJpbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1791296597),
('ZMjXKIYsY1mgaa6S7AcpYBXD5ZOgJVYwiUyo2DBf', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIxblVJVmZ2bXBhQ1ZFNUpHRFBadk1EMjMzUmNEbFA4OHhrYTlwVkpTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hbmdnb3RhIiwicm91dGUiOiJmaWxhbWVudC5hbmdnb3RhLnBhZ2VzLmRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo0LCJwYXNzd29yZF9oYXNoX3dlYiI6ImUyZTg2ZGYyMGYyMmFjMzQxOGU2YTkxZDJkNTQ2ZjVhNDExOTdkMDE4NDI3YTkyOWY0M2NjMDdjMjJiNmEzYTUiLCJ0YWJsZXMiOnsiNGIwMTk5Nzk1OTI4OWVjOTVmMTBlZWY2MDY1NTBiNDZfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJwaW5qYW1hbi5rb2RlX3BpbmphbWFuIiwibGFiZWwiOiJLb2RlIFBpbmphbWFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFuZ3N1cmFuX2tlIiwibGFiZWwiOiJBbmdzdXJhbiBLZSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJub21pbmFsIiwibGFiZWwiOiJOb21pbmFsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImphdHVoX3RlbXBvIiwibGFiZWwiOiJKYXR1aCBUZW1wbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ0YW5nZ2FsX2JheWFyIiwibGFiZWwiOiJUYW5nZ2FsIEJheWFyIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InN0YXR1cyIsImxhYmVsIjoiU3RhdHVzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dfX0=', 1783539304);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'bunga_pinjaman', '8', '2026-07-02 08:35:42', '2026-07-02 08:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `simpanans`
--

CREATE TABLE `simpanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `kode_simpanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','terverifikasi','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `slip_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpanans`
--

INSERT INTO `simpanans` (`id`, `anggota_id`, `kode_simpanan`, `tanggal`, `keterangan`, `status`, `verified_by`, `verified_at`, `slip_pdf`, `created_at`, `updated_at`) VALUES
(1, 1, 'SIM000001', '2026-07-02', 'Set By Alfi', 'terverifikasi', 2, '2026-07-02 07:32:52', NULL, '2026-07-02 07:32:39', '2026-07-02 07:32:52'),
(2, 1, 'SIM000002', '2026-07-02', 'Set Biaya ADM', 'terverifikasi', 2, '2026-07-02 08:44:27', NULL, '2026-07-02 08:38:03', '2026-07-02 08:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_items`
--

CREATE TABLE `simpanan_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `simpanan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` enum('pokok','wajib','sukarela','berjangka','pendidikan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpanan_items`
--

INSERT INTO `simpanan_items` (`id`, `simpanan_id`, `jenis`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 'pokok', 10000000, '2026-07-02 07:32:39', '2026-07-02 07:32:39'),
(2, 1, 'wajib', 5000000, '2026-07-02 07:32:39', '2026-07-02 07:32:39'),
(3, 1, 'sukarela', 2500000, '2026-07-02 07:32:39', '2026-07-02 07:32:39'),
(4, 2, 'wajib', 100000, '2026-07-02 08:38:03', '2026-07-02 08:38:03'),
(5, 2, 'sukarela', 5000, '2026-07-02 08:38:03', '2026-07-02 08:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`, `website_id`) VALUES
(1, 'slider-1', 'ini slider 01 ya', 'sliders/01KWFKWAEJPWMZ98GBDW6GNKYW.png', 1, 1, '2026-07-01 12:53:15', '2026-07-01 12:53:15', 1),
(2, 'slider-2', 'ini slider 2', 'sliders/01KWFKXE27FKS32E5HNQXPSXBV.png', 2, 1, '2026-07-01 12:53:51', '2026-07-01 12:53:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anggota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Administrator', 'admin@kud.com', NULL, '$2y$12$r4BMQuDdQBYY726hJtTY9eL0vckEozvjRcepC5O.JkRROC0/JD.Jq', NULL, '2026-07-01 12:38:03', '2026-07-01 12:38:03', 'administrator'),
(2, 'Pimpinan KUD', 'pimpinan@kud.com', NULL, '$2y$12$/Mye.u68n2Q/XSYYhISsROxPSUPzpzoEsEfReJ.LLEKlUifGil.Qa', NULL, '2026-07-01 12:38:04', '2026-07-01 12:38:04', 'pimpinan'),
(4, 'Alfi', 'alfi@kud.com', NULL, '$2y$12$CqN8yB52SDEw0nNf/MqWqerau/ExDeqcJJ/m1PVaRNlsNEkmedBN6', NULL, '2026-07-02 07:29:02', '2026-07-02 07:29:02', 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `avatar`, `position`, `bio`, `created_at`, `updated_at`) VALUES
(1, 2, 'avatars/01KWHRTT3BQTG6NMYPDKWG4217.jpg', NULL, NULL, '2026-07-02 08:58:17', '2026-07-02 08:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Website KUD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Website KUD', '2026-07-01 12:38:33', '2026-07-01 12:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggotas_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `anggotas_no_anggota_unique` (`no_anggota`),
  ADD UNIQUE KEY `anggotas_nik_unique` (`nik`),
  ADD KEY `anggotas_status_index` (`status`);

--
-- Indexes for table `angsurans`
--
ALTER TABLE `angsurans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `angsurans_pinjaman_id_angsuran_ke_unique` (`pinjaman_id`,`angsuran_ke`),
  ADD KEY `angsurans_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`),
  ADD KEY `beritas_website_id_foreign` (`website_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_website_id_foreign` (`website_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kritik_sarans`
--
ALTER TABLE `kritik_sarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penarikans`
--
ALTER TABLE `penarikans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penarikans_kode_penarikan_unique` (`kode_penarikan`),
  ADD KEY `penarikans_anggota_id_foreign` (`anggota_id`),
  ADD KEY `penarikans_user_id_foreign` (`user_id`),
  ADD KEY `penarikans_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumumen_website_id_foreign` (`website_id`);

--
-- Indexes for table `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pinjamen_kode_pinjaman_unique` (`kode_pinjaman`),
  ADD KEY `pinjamen_anggota_id_foreign` (`anggota_id`),
  ADD KEY `pinjamen_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_website_id_foreign` (`website_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_website_id_foreign` (`website_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `simpanans`
--
ALTER TABLE `simpanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `simpanans_kode_simpanan_unique` (`kode_simpanan`),
  ADD KEY `simpanans_anggota_id_foreign` (`anggota_id`),
  ADD KEY `simpanans_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `simpanan_items`
--
ALTER TABLE `simpanan_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simpanan_items_simpanan_id_foreign` (`simpanan_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_website_id_foreign` (`website_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `angsurans`
--
ALTER TABLE `angsurans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kritik_sarans`
--
ALTER TABLE `kritik_sarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `penarikans`
--
ALTER TABLE `penarikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjamen`
--
ALTER TABLE `pinjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simpanans`
--
ALTER TABLE `simpanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simpanan_items`
--
ALTER TABLE `simpanan_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `angsurans`
--
ALTER TABLE `angsurans`
  ADD CONSTRAINT `angsurans_pinjaman_id_foreign` FOREIGN KEY (`pinjaman_id`) REFERENCES `pinjamen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `angsurans_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penarikans`
--
ALTER TABLE `penarikans`
  ADD CONSTRAINT `penarikans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penarikans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penarikans_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD CONSTRAINT `pengumumen_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD CONSTRAINT `pinjamen_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pinjamen_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `simpanans`
--
ALTER TABLE `simpanans`
  ADD CONSTRAINT `simpanans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `simpanans_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `simpanan_items`
--
ALTER TABLE `simpanan_items`
  ADD CONSTRAINT `simpanan_items_simpanan_id_foreign` FOREIGN KEY (`simpanan_id`) REFERENCES `simpanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
