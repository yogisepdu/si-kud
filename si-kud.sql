-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 09:04 PM
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
  `nama_kebun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `anggotas` (`id`, `user_id`, `no_anggota`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `jenis_petani`, `luas_lahan`, `nama_kebun`, `blok_kebun`, `tanggal_bergabung`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, '012', '1502056452251515', 'Riau', '2000-02-06', 'Laki-laki', 'Kampar', '082254655852', 'Plasma', '20.00', NULL, '14', '2026-06-13', NULL, 'Aktif', '2026-06-13 13:35:42', '2026-06-13 13:52:46'),
(3, 11, 'A011', '15020564522124', 'Tebangan', '2003-09-28', 'Perempuan', 'Jambi', '085236459878', 'Plasma', '10000.00', NULL, '15', '2026-06-15', NULL, 'Aktif', '2026-06-15 13:49:23', '2026-06-15 13:50:41');

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
(1, 4, 1, '2026-07-14', '1400000.00', '2026-06-14', 'angsuran/01KV3J401S69R24A6EV4X07MMK.pdf', 'dibayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-15 12:13:45', NULL, NULL),
(2, 4, 2, '2026-08-14', '1400000.00', '2026-06-15', 'angsuran/01KV6BWFNTD3BXNXRNHYAZMTZ0.pdf', 'dibayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-15 12:50:10', NULL, NULL),
(3, 4, 3, '2026-09-14', '1400000.00', '2026-06-15', 'angsuran/01KV6GGB75HFZWCB6GERZBZJXE.pdf', 'menunggu_verifikasi', NULL, NULL, '2026-06-14 08:32:48', '2026-06-15 13:45:25', NULL, NULL),
(4, 4, 4, '2026-10-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(5, 4, 5, '2026-11-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(6, 4, 6, '2026-12-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(7, 4, 7, '2027-01-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(8, 4, 8, '2027-02-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(9, 4, 9, '2027-03-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(10, 4, 10, '2027-04-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(11, 4, 11, '2027-05-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(12, 4, 12, '2027-06-14', '1400000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-14 08:32:48', '2026-06-14 08:32:48', NULL, NULL),
(14, 6, 1, '2026-07-15', '1120000.00', '2026-06-15', 'angsuran/01KV6HF4DN0VHB91KWN2F2WWYD.pdf', 'dibayar', NULL, NULL, '2026-06-15 14:00:49', '2026-06-15 14:02:38', NULL, NULL),
(15, 6, 2, '2026-08-15', '1120000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-15 14:00:49', '2026-06-15 14:00:49', NULL, NULL),
(16, 6, 3, '2026-09-15', '1120000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-15 14:00:49', '2026-06-15 14:00:49', NULL, NULL),
(17, 6, 4, '2026-10-15', '1120000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-15 14:00:49', '2026-06-15 14:00:49', NULL, NULL),
(18, 6, 5, '2026-11-15', '1120000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-15 14:00:49', '2026-06-15 14:00:49', NULL, NULL),
(19, 6, 6, '2026-12-15', '1120000.00', NULL, NULL, 'belum_bayar', NULL, NULL, '2026-06-15 14:00:49', '2026-06-15 14:00:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `slug`, `gambar`, `tanggal`, `ringkasan`, `isi`, `is_publish`, `created_at`, `updated_at`, `views`) VALUES
(2, 'berita-01-baru', 'berita-01-baru', 'berita/01KTHJ5MYNQBK4G6BG3KABYZ5W.jpg', '2026-06-08', 'ini jadwal imsakiyah', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem facilis consectetur voluptatibus reiciendis voluptatem, perspiciatis accusamus enim aut quo ratione nam architecto expedita quae modi quia. Optio esse, explicabo incidunt nihil eaque deserunt dolorum omnis molestias voluptas placeat, nulla quasi quos quis ipsam inventore blanditiis minus similique. Illum rem eius natus corporis voluptatem quae, aperiam amet ipsam temporibus tempora esse voluptas nemo magnam labore dolore, voluptatum consectetur maiores laboriosam mollitia veritatis. Nobis facilis doloremque hic nisi. Voluptatibus accusantium earum qui! Magnam, iure reprehenderit molestias quas distinctio accusamus et voluptatibus repudiandae veritatis modi corporis voluptate nulla inventore dignissimos architecto doloremque reiciendis provident corrupti natus omnis, enim illum nemo repellendus.</p><p>Ducimus, numquam aperiam optio molestias doloribus consequuntur sunt accusamus laborum quae incidunt dignissimos tempora consequatur aliquid illum adipisci assumenda ex, neque quos. Placeat fugiat quis fuga blanditiis beatae dicta consectetur. Molestias, ea labore nesciunt sit mollitia aperiam animi saepe veniam corrupti eos quae sed ipsa autem fugit omnis suscipit ratione molestiae in nemo veritatis deserunt? Temporibus labore, inventore quisquam molestias laboriosam voluptas iure reprehenderit rerum commodi magnam non suscipit cumque enim laudantium quia? Alias cumque repellendus provident facere delectus nihil, rerum reiciendis voluptas dolorem voluptates quasi quod, pariatur cum laboriosam dignissimos fuga ullam ratione aliquam laudantium! Vitae eum inventore repudiandae labore culpa eius fugiat esse! Neque ipsam blanditiis doloribus error enim, et reiciendis in laborum exercitationem quibusdam quidem porro natus eaque, quam nulla sed, expedita magni iusto unde impedit repellat. Totam voluptate nulla pariatur unde mollitia, nostrum accusamus laborum, nesciunt rem ullam perspiciatis ut perferendis, harum adipisci. Molestiae voluptatibus tempore perspiciatis soluta consequuntur! Commodi earum nobis qui beatae necessitatibus fuga assumenda consectetur debitis illo aut voluptate ut, dolore dolor minima, magni ullam. Sit, quos! Magnam quisquam totam porro repellendus obcaecati ex eum aliquam. Earum ut asperiores eaque aperiam alias pariatur? Facere, commodi?</p>', 1, '2026-06-07 10:30:29', '2026-06-07 10:30:29', 0),
(3, 'berita-02-baru', 'berita-02-baru', 'berita/01KTHPR7DAQJP9TMBT0DN29NHW.png', '2026-06-08', 'berita kedua siang ini', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, ratione quia doloremque sunt sint inventore, veniam, repellendus sit obcaecati eligendi ducimus ipsam doloribus voluptas similique corrupti voluptate odit sapiente consectetur eveniet commodi laborum. Voluptates sint veniam eos distinctio corporis temporibus quas autem inventore accusamus, omnis molestias saepe nesciunt enim beatae placeat eveniet deserunt.</p><p>Accusamus ut praesentium, repudiandae itaque aperiam autem, veniam provident unde iure voluptas tempore, rerum inventore maxime distinctio blanditiis temporibus corrupti impedit est iste. Consequatur quos nesciunt et, recusandae debitis, magni delectus nam possimus harum praesentium suscipit incidunt odio rerum porro asperiores libero doloribus voluptate ipsum beatae eos?</p>', 0, '2026-06-07 11:50:32', '2026-06-07 11:50:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-17ba0791499db908433b80f37c5fbc89b870084b', 'i:2;', 1781557341),
('laravel-cache-17ba0791499db908433b80f37c5fbc89b870084b:timer', 'i:1781557341;', 1781557341),
('laravel-cache-b1d5781111d84f7b3fe45a0852e59758cd7a87e5', 'i:1;', 1781556383),
('laravel-cache-b1d5781111d84f7b3fe45a0852e59758cd7a87e5:timer', 'i:1781556383;', 1781556383);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Galleri-1', 'gallery/01KTF5V25A2F5PNF8HKSYH11C3.png', 1, 1, '2026-06-06 12:16:30', '2026-06-06 12:16:30'),
(2, 'Galleri-2', 'gallery/01KTF5VKYCSFAVH50VEXFBP5HF.png', 2, 1, '2026-06-06 12:16:48', '2026-06-06 12:16:48'),
(5, 'Galleri-3', 'gallery/01KTF6BFKYZQD08AMBJAPFKVE2.png', 3, 1, '2026-06-06 12:25:28', '2026-06-06 12:25:28');

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
(5, '2026_06_05_192731_create_sliders_table', 2),
(6, '2026_06_06_172353_create_profiles_table', 3),
(7, '2026_06_06_175345_add_structure_image_to_profiles_table', 4),
(8, '2026_06_06_180446_create_produks_table', 5),
(9, '2026_06_06_182140_create_pengumumen_table', 6),
(10, '2026_06_06_191004_create_galleries_table', 7),
(11, '2026_06_07_080342_create_beritas_table', 8),
(12, '2026_06_07_181848_add_views_to_beritas_table', 9),
(13, '2026_06_08_073345_add_role_to_users_table', 10),
(16, '2026_06_13_200241_create_anggotas_table', 11),
(21, '2026_06_13_204557_create_pinjamen_table', 12),
(22, '2026_06_13_204607_create_angsurans_table', 12),
(23, '2026_06_14_092356_create_simpanans_table', 12),
(24, '2026_06_14_113943_add_dokumen_to_pinjamen_table', 13),
(25, '2026_06_14_172843_add_slip_to_angsurans_table', 14),
(26, '2026_06_15_184742_add_alasan_penolakan_to_angsurans_table', 15);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `title`, `description`, `image`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Loker APRIL 2026', 'ini adalah lowongan loker april 2026', 'pengumuman/01KTF59M7NPDR5GYQDK65QK7C4.jpeg', 1, 1, '2026-06-06 12:06:59', '2026-06-06 12:06:59');

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
(4, 2, 'PJM-20260614-00001', '2026-06-14', '15000000.00', 12, '12.00', '1800000.00', '16800000.00', '1400000.00', 'beli mobil pajero', 'disetujui', 2, '2026-06-14 07:51:39', NULL, '2026-06-14 06:23:22', '2026-06-14 07:51:39', '082254655852', 'yogi@yogi123.com', 'satu buah sertifikat shm kebun sawit 2 hektar', 'pinjaman/ktp/01KV34T68P1CX51VNQDZ0CERRV.pdf', 'pinjaman/kk/01KV34T693SVK3YYXWKW7VEK0V.pdf', 'pinjaman/penghasilan/01KV34T698PVHR9A9VYNPNC8VZ.pdf', 'pinjaman/agunan/01KV34T69CJXG3TXMM59291QRJ.pdf', 'pinjaman/pendukung/01KV34T69GZK3VKAP5CNHKJJ74.pdf'),
(6, 3, 'PJM-20260615-00002', '2026-06-15', '6000000.00', 6, '12.00', '720000.00', '6720000.00', '1120000.00', 'Beli HP', 'disetujui', 2, '2026-06-15 14:00:49', NULL, '2026-06-15 14:00:23', '2026-06-15 14:00:49', '085236459878', 'retno@retno.com', 'Satu Buah Jalan Lintas Rokan Hulu', 'pinjaman/ktp/01KV6HBQPTSX5NA53BSKM4N7ZH.pdf', 'pinjaman/kk/01KV6HBQQ0BX26WJHWV4T3XFGY.pdf', 'pinjaman/penghasilan/01KV6HBQQ4X0PTXNT50K3ZZ6GF.pdf', 'pinjaman/agunan/01KV6HBQQ9B8Q6VEYCJK767DPF.pdf', 'pinjaman/pendukung/01KV6HBQQC7KSJTN5E77X1SPNJ.pdf');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `type`, `title`, `content`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'pupuk', 'ini layanan PUPUK', '<p>baik ini adalah untuk layanan PUPUK, jadi semua nya harus bersiap-siap dengan..</p><ol start=\"1\"><li><p>ya satu</p></li><li><p>dua</p></li><li><p>tiga</p></li><li><p>saja</p></li></ol>', 1, '2026-06-06 11:11:08', '2026-06-06 11:11:08'),
(2, 'tbs', 'Layanan TBS', '<h2>OKE BAIK INI LAYANAN TBS</h2><p></p><ol start=\"1\"><li><p>ini layanan tbs ya kawan-kawan</p></li><li><p>coba layanan ini</p></li></ol>', 1, '2026-06-06 11:15:57', '2026-06-06 11:15:57'),
(3, 'simpan_pinjam', 'Layanan Simpan-Pinjam', '<p>ini layanan simpan-pinjam, jadi simpan dan pinjam.</p><p></p><ol start=\"1\"><li><p>simpan</p></li><li><p>pinjam</p></li></ol>', 1, '2026-06-06 11:16:47', '2026-06-06 11:16:47');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `title`, `history`, `vision`, `mission`, `structure_image`, `created_at`, `updated_at`) VALUES
(2, 'Sejarah KUD Kampar', '<h2>ini sejarah ya</h2>', '<p>ini adalah visi dari kud</p>', '<p>ini misi nya :</p><ol start=\"1\"><li><p>satu</p></li><li><p>dua</p></li><li><p>tiga</p></li></ol>', 'profiles/01KTF1CBSA1YMZ4CP6ARV79NTS.jpeg', '2026-06-06 10:52:29', '2026-06-06 10:58:34');

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
('2f8fD8P7zGFeSnYpdBhkzD9SYSLewytFI3KJESgK', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI0cDJXMmtLY2NyRjk5ZkNLYkN4UGpEMkVkTE9YbjJSdzdWRHFjM1dmIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYW5nZ290YSJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FuZ2dvdGFcL2FuZ3N1cmFucyIsInJvdXRlIjoiZmlsYW1lbnQuYW5nZ290YS5yZXNvdXJjZXMuYW5nc3VyYW5zLmluZGV4In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxMSwicGFzc3dvcmRfaGFzaF93ZWIiOiJmMTEwZGYwMDIyNWViNTdmOWZiYWQxMjI3NDY1YzYzNDJjNzZlMGJlZDQ2M2I5NGQzNDU2ZDFkMWQ4Njg3N2Q3IiwidGFibGVzIjp7ImIyNDBiOGI4N2E3OGQzMmRmZjdhMTA5N2FiYzgyMmM4X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoia29kZV9waW5qYW1hbiIsImxhYmVsIjoiTm8uIFBpbmphbWFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRhbmdnYWxfcGVuZ2FqdWFuIiwibGFiZWwiOiJUYW5nZ2FsIFBlbmdhanVhbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqdW1sYWhfcGluamFtYW4iLCJsYWJlbCI6Ikp1bWxhaCBQaW5qYW1hbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJhbmdzdXJhbl9wZXJfYnVsYW4iLCJsYWJlbCI6IkFuZ3N1cmFuIFwvIEJ1bGFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImphbmdrYV93YWt0dSIsImxhYmVsIjoiVGVub3IiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic3RhdHVzIiwibGFiZWwiOiJTdGF0dXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sImI1ZDE1Nzk3MjUzYTQ1ZWNiMDk5NWEwYWE3NzQ5MmM1X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoicGluamFtYW4ua29kZV9waW5qYW1hbiIsImxhYmVsIjoiS29kZSBQaW5qYW1hbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJwaW5qYW1hbi5hbmdnb3RhLnVzZXIubmFtZSIsImxhYmVsIjoiQW5nZ290YSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJhbmdzdXJhbl9rZSIsImxhYmVsIjoiQW5nc3VyYW4ga2UtIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImphdHVoX3RlbXBvIiwibGFiZWwiOiJKYXR1aCBUZW1wbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJub21pbmFsIiwibGFiZWwiOiJKdW1sYWggQW5nc3VyYW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGFuZ2dhbF9iYXlhciIsImxhYmVsIjoiVGFuZ2dhbCBCYXlhciIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJzdGF0dXMiLCJsYWJlbCI6IlN0YXR1cyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9XX0sImZpbGFtZW50IjpbXX0=', 1781557334),
('JoxkPNs9YQK5fAP9jtATahlayv9OHhjx99H0yZYN', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', 'eyJfdG9rZW4iOiJNemMxTWpHMml2YjNLN1N6VkdCZWdLdkJoQ3JuTk04aFV1UUZHNEYwIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW4ifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9waW1waW5hblwvYW5nZ290YXMiLCJyb3V0ZSI6ImZpbGFtZW50LnBpbXBpbmFuLnJlc291cmNlcy5hbmdnb3Rhcy5pbmRleCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MiwicGFzc3dvcmRfaGFzaF93ZWIiOiIwOTU4Zjg5YWUwZmY3M2ExYThkZWUzODhmZDVlNzc0OTc0ZTdjZDlmMzI1YzhjOGYxYTM3ODFlNGQwOTQzNmJiIiwidGFibGVzIjp7ImIyNDBiOGI4N2E3OGQzMmRmZjdhMTA5N2FiYzgyMmM4X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoia29kZV9waW5qYW1hbiIsImxhYmVsIjoiTm8uIFBpbmphbWFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRhbmdnYWxfcGVuZ2FqdWFuIiwibGFiZWwiOiJUYW5nZ2FsIFBlbmdhanVhbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqdW1sYWhfcGluamFtYW4iLCJsYWJlbCI6Ikp1bWxhaCBQaW5qYW1hbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJhbmdzdXJhbl9wZXJfYnVsYW4iLCJsYWJlbCI6IkFuZ3N1cmFuIFwvIEJ1bGFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImphbmdrYV93YWt0dSIsImxhYmVsIjoiVGVub3IiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic3RhdHVzIiwibGFiZWwiOiJTdGF0dXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sImY2N2I4ZmJlYmQ1ZjNjNWQxOTE3MzA4MGIzN2Q1ODVlX2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibm9fYW5nZ290YSIsImxhYmVsIjoiTm8uIEFuZ2dvdGEiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidXNlci5uYW1lIiwibGFiZWwiOiJOYW1hIEFuZ2dvdGEiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibmlrIiwibGFiZWwiOiJOSUsiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiamVuaXNfcGV0YW5pIiwibGFiZWwiOiJKZW5pcyBQZXRhbmkiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiYmxva19rZWJ1biIsImxhYmVsIjoiQmxvayBLZWJ1biIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJsdWFzX2xhaGFuIiwibGFiZWwiOiJMdWFzIExhaGFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vX2hwIiwibGFiZWwiOiJOby4gSFAiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic3RhdHVzIiwibGFiZWwiOiJTdGF0dXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sIjMyMzFkM2Y2NjgyMTJkYzA1YTNlM2ZlZTA0YjA1MmQ4X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoia29kZV9waW5qYW1hbiIsImxhYmVsIjoiS29kZSBQaW5qYW1hbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqdW1sYWhfcGluamFtYW4iLCJsYWJlbCI6Ikp1bWxhaCBQaW5qYW1hbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqYW5na2Ffd2FrdHUiLCJsYWJlbCI6IlRlbm9yIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFuZ3N1cmFuX3Blcl9idWxhbiIsImxhYmVsIjoiQW5nc3VyYW5cL0J1bGFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InN0YXR1cyIsImxhYmVsIjoiU3RhdHVzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dLCJjMzQzZTM0ODJlMDMxMjdmZWIxNjllZDc3YTE2OWUzNF9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InBpbmphbWFuLmtvZGVfcGluamFtYW4iLCJsYWJlbCI6IktvZGUgUGluamFtYW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiYW5nc3VyYW5fa2UiLCJsYWJlbCI6IkFuZ3N1cmFuIEtlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImphdHVoX3RlbXBvIiwibGFiZWwiOiJKYXR1aCBUZW1wbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJub21pbmFsIiwibGFiZWwiOiJOb21pbmFsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRhbmdnYWxfYmF5YXIiLCJsYWJlbCI6IlRhbmdnYWwgQmF5YXIiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic3RhdHVzIiwibGFiZWwiOiJTdGF0dXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV19fQ==', 1781557480);

-- --------------------------------------------------------

--
-- Table structure for table `simpanans`
--

CREATE TABLE `simpanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `kode_simpanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('pokok','wajib','sukarela') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','terverifikasi','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'bg-1', 'background-1', 'sliders/01KTEZ3CAQEGB81QKRND1TZ3DH.png', 1, 1, '2026-06-06 10:18:43', '2026-06-06 10:18:43'),
(2, 'bg-2', 'background-2', 'sliders/01KTEZ8ES685PGVNACSV5K253P.png', 2, 1, '2026-06-06 10:21:29', '2026-06-06 10:21:29');

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
(1, 'Administrator', 'admin@admin.com', NULL, '$2y$12$q97ytu1sKTExpyJYdvGIT.QcVBMhOcH7DzlLRtQx1dBnAPtKeV1M6', 'ST00wrXwQjH4cFbnVVdKae5VAuM6z563kfe481j3TQSpT3FBC6AcD2t1Fsts', '2026-06-05 08:43:48', '2026-06-05 08:43:48', 'administrator'),
(2, 'yogi', 'yogi@yogi.com', NULL, '$2y$12$KtGBLtOJMy2DeXMsn54rXOK9HWKtg7qi.v3kRQpRIO8Rguwfux./i', NULL, '2026-06-08 09:33:39', '2026-06-13 13:51:17', 'pimpinan'),
(10, 'yogi', 'yogi@yogi123.com', NULL, '$2y$12$I5j1XLkDkQvpZxsPERP7ZuWBz/h3JBfkB7j6kGkOfAe/4SzAaxsJy', NULL, '2026-06-13 13:35:42', '2026-06-13 13:52:46', 'anggota'),
(11, 'Retno', 'retno@retno.com', NULL, '$2y$12$KoCswC.YXqcJiBFpBwHxG.Zs5wb09YzJaTzntvMpFrSjeva3UfFv.', NULL, '2026-06-15 13:49:23', '2026-06-15 13:51:03', 'anggota');

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
  ADD KEY `angsurans_pinjaman_id_foreign` (`pinjaman_id`),
  ADD KEY `angsurans_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `simpanans`
--
ALTER TABLE `simpanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `simpanans_kode_simpanan_unique` (`kode_simpanan`),
  ADD KEY `simpanans_anggota_id_foreign` (`anggota_id`),
  ADD KEY `simpanans_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angsurans`
--
ALTER TABLE `angsurans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjamen`
--
ALTER TABLE `pinjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simpanans`
--
ALTER TABLE `simpanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for table `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD CONSTRAINT `pinjamen_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pinjamen_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `simpanans`
--
ALTER TABLE `simpanans`
  ADD CONSTRAINT `simpanans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `simpanans_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
