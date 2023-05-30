-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2023 年 5 月 25 日 08:45
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `made`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(512) NOT NULL COMMENT 'コメント',
  `user_id` int(255) NOT NULL COMMENT 'ユーザーID',
  `room_id` int(255) NOT NULL COMMENT 'ルームID',
  `favorite_count` int(255) NOT NULL DEFAULT '0',
  `back_color` varchar(255) NOT NULL DEFAULT 'white',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `room_id`, `favorite_count`, `back_color`, `created_at`, `updated_at`) VALUES
(1, 'あ', 4, 2, 1, 'white', '2023-05-22 18:19:32', '2023-05-23 17:09:21'),
(2, '大きい建物を作りたい！', 4, 2, 4, 'white', '2023-05-22 18:24:00', '2023-05-24 14:53:39'),
(3, 'test', 6, 2, 1, 'white', '2023-05-22 19:17:43', '2023-05-24 16:26:38'),
(6, 'aaa', 5, 2, 0, 'white', '2023-05-22 20:08:55', '2023-05-24 20:23:05'),
(8, 'Twitterです', 4, 1, 1, 'white', '2023-05-23 10:08:44', '2023-05-23 17:14:38'),
(10, 'あああ', 4, 1, 0, 'white', '2023-05-23 17:16:25', '2023-05-24 10:10:08'),
(11, 'あ', 4, 1, 0, 'white', '2023-05-23 17:18:52', '2023-05-24 10:10:07'),
(12, 'aaaa', 4, 1, 0, 'white', '2023-05-23 17:19:19', '2023-05-24 10:10:05'),
(13, 'ああああああああ', 4, 1, 0, 'white', '2023-05-23 18:11:04', '2023-05-24 10:10:02'),
(15, 'テスト', 4, 1, 1, 'white', '2023-05-23 19:16:40', '2023-05-24 10:10:10'),
(16, 'minecraft', 9, 2, 1, 'white', '2023-05-24 11:45:37', '2023-05-24 16:24:30'),
(18, 'test\r\ntest', 4, 2, 1, 'white', '2023-05-24 14:35:01', '2023-05-24 16:16:14'),
(20, 'テスト', 4, 2, 1, 'white', '2023-05-24 14:54:22', '2023-05-24 14:54:28'),
(21, 'test', 4, 2, 2, 'white', '2023-05-24 14:56:03', '2023-05-24 22:41:32'),
(29, 'マインクラフトは楽しいゲームです', 10, 2, 1, 'white', '2023-05-24 22:41:02', '2023-05-24 22:50:49'),
(30, 'red\r\n\r\ntest', 4, 6, 1, 'red', '2023-05-24 22:52:32', '2023-05-24 22:59:35'),
(31, 'test', 4, 6, 1, 'white', '2023-05-24 22:52:39', '2023-05-24 23:00:45'),
(32, 'あああ', 4, 10, 0, 'white', '2023-05-25 11:09:23', '2023-05-25 11:09:23'),
(33, 'てっっっs', 4, 10, 0, 'white', '2023-05-25 11:09:26', '2023-05-25 11:09:26'),
(34, 'testt', 4, 10, 0, 'white', '2023-05-25 11:09:30', '2023-05-25 11:09:30'),
(35, '楽しいです', 9, 8, 0, 'white', '2023-05-25 11:11:54', '2023-05-25 11:11:54'),
(37, 'test', 4, 14, 1, 'red', '2023-05-25 12:14:21', '2023-05-25 12:16:08'),
(38, 'test\r\n\r\nあああ', 12, 6, 0, 'white', '2023-05-25 12:19:21', '2023-05-25 12:19:21'),
(39, 'test \r\n\r\n\r\nあああ', 14, 15, 2, 'white', '2023-05-25 12:23:07', '2023-05-25 12:39:20'),
(41, 'test', 4, 15, 0, 'yellow', '2023-05-25 12:26:05', '2023-05-25 12:26:05'),
(42, 'a', 9, 15, 0, 'white', '2023-05-25 12:41:44', '2023-05-25 12:41:44'),
(44, 'test', 15, 16, 0, 'white', '2023-05-25 17:05:25', '2023-05-25 17:05:55');

-- --------------------------------------------------------

--
-- テーブルの構造 `comment_favorites`
--

CREATE TABLE `comment_favorites` (
  `id` int(11) NOT NULL,
  `favorite` int(16) NOT NULL DEFAULT '1',
  `comment_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `comment_favorites`
--

INSERT INTO `comment_favorites` (`id`, `favorite`, `comment_id`, `user_id`) VALUES
(2, 1, 2, 5),
(18, 1, 1, 4),
(21, 1, 8, 4),
(46, 1, 14, 4),
(51, 1, 15, 4),
(52, 1, 2, 4),
(55, 0, 9, 4),
(56, 1, 9, 9),
(57, 1, 2, 9),
(58, 1, 16, 4),
(59, 1, 17, 4),
(60, 1, 18, 4),
(61, 1, 19, 4),
(62, 0, 6, 4),
(63, 1, 20, 4),
(64, 1, 21, 4),
(65, 1, 23, 4),
(66, 0, 24, 4),
(67, 1, 25, 4),
(68, 1, 26, 4),
(69, 1, 3, 4),
(70, 1, 21, 10),
(71, 1, 29, 10),
(72, 1, 30, 4),
(73, 1, 31, 4),
(74, 1, 36, 12),
(75, 1, 37, 12),
(76, 1, 39, 14),
(77, 1, 39, 4),
(78, 1, 43, 15),
(79, 0, 44, 15);

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `followers`
--

INSERT INTO `followers` (`id`, `follow_id`, `follower_id`, `created_at`) VALUES
(3, 4, 6, '2023-05-24 18:03:10'),
(5, 10, 4, '2023-05-24 22:49:57');

-- --------------------------------------------------------

--
-- テーブルの構造 `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `follow_id`, `created_at`) VALUES
(14, 6, 4, '2023-05-24 18:03:10'),
(16, 4, 10, '2023-05-24 22:49:57');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_13_175100_create_submission_table', 2),
(6, '2023_03_14_153349_add_new_column_to_table', 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('KUN@yahoo', '$2y$10$gqRErG3MjVRqgHLW3rq3ZepHX/g9n1X/wUNiM/EwULJItWjokrJAS', '2023-03-10 09:58:57'),
('ekkusu1108@icloud.com', '$2y$10$nfIudWduEYGHQqayC.p9u.N3j9auRwx6X3IKhkyAFwfuEG1A/mlQ2', '2023-03-13 05:28:01'),
('abc@def', '$2y$10$TRRQZhAoHBVYQYYqPo0rPOfqa.qQuvHuaVy6QDkfNahnnovmpEE32', '2023-05-01 11:11:58'),
('d@ya', '$2y$10$Ec3Xs4brLy7iwHYQS.NhC.S00b7PcOSDcyTp7nbcJtxVFtS0nBcoC', '2023-05-25 08:24:44');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `room_favorites`
--

CREATE TABLE `room_favorites` (
  `id` int(255) NOT NULL,
  `favorite` int(16) NOT NULL DEFAULT '1',
  `talkroom_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `room_favorites`
--

INSERT INTO `room_favorites` (`id`, `favorite`, `talkroom_id`, `user_id`) VALUES
(1, 1, 2, 4),
(2, 0, 3, 4),
(3, 0, 8, 4),
(4, 1, 2, 10),
(5, 0, 3, 10),
(6, 0, 6, 4),
(7, 1, 10, 4),
(8, 0, 14, 12),
(9, 0, 15, 14),
(10, 0, 15, 4),
(11, 0, 16, 15);

-- --------------------------------------------------------

--
-- テーブルの構造 `submission`
--

CREATE TABLE `submission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imgpath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `talkroom`
--

CREATE TABLE `talkroom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'タイトル名',
  `image` varchar(255) NOT NULL COMMENT 'サムネイル',
  `user_id` int(11) NOT NULL COMMENT 'ユーザーID',
  `del_flg` int(16) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `talkroom`
--

INSERT INTO `talkroom` (`id`, `name`, `image`, `user_id`, `del_flg`, `created_at`) VALUES
(3, 'valorant', '/storage/images/COZKmXrbv6S67Tu2NHaIcleiG5KbP61lsIFKRnTx.png', 4, 0, '2023-05-24 21:37:15'),
(4, 'DQ11', '/storage/images/m3xXnW6cM8oOusrUs1G7ChXpQLXnoanVblrgpJsY.jpg', 4, 0, '2023-05-24 21:39:48'),
(5, 'グラブル', '/storage/images/3hLCjOFrgLxRR3pQNXJsGVEHU6SoP5B3OnRJGVvk.jpg', 4, 1, '2023-05-24 21:40:05'),
(6, 'オメガストライカーズ', '/storage/images/sdZYVmnDdfQsfcomZbnSwhximpi7iYXcXNMQc4nP.jpg', 4, 0, '2023-05-24 21:45:22'),
(8, 'ARK', '/storage/images/s7pHRuMR3DJsmz6NFaZ1e4UB8tlJrZfU93h7CZmd.jpg', 4, 1, '2023-05-24 21:46:16'),
(15, '大乱闘スマッシュブラザーズ', '/storage/images/H3kBPgK4WuhCbszwAlaXqqJOeX1fnsQ29SFlhcm0.jpg', 14, 0, '2023-05-25 12:22:55'),
(16, '大乱闘スマッシュブラザーズ', '/storage/images/FGTuXHFwa7BykQ8r7neFIB1yRe9KJ1GLpUutYSgV.jpg', 15, 1, '2023-05-25 17:05:04'),
(17, 'test', '/storage/images/wXKEiXrQEvuZ7v38M0uNit7SOiiqRGcjFHGcsDDy.jpg', 4, 0, '2023-05-25 17:07:08');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/img/logo.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `explanation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '正常',
  `level` int(255) NOT NULL DEFAULT '1',
  `exp` int(255) NOT NULL DEFAULT '0',
  `name_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'black',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `icon`, `name`, `role`, `explanation`, `account_status`, `level`, `exp`, `name_color`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '/storage/images/FDxpLgWzHk6GRyLEEeXHS2oluAa2MIb0UDa1CeeQ.png', '管理者１', 0, 'test', '正常', 1, 0, 'black', 'd@ya', NULL, '$2y$10$im5biVsug0NWnWLm/zq50OXTInGoMMpvRN/GHt9lPObG7oy6o89CC', 'DvwDFrcfehlIvXbH3sDR6IDdMOtI7P2ppVbZcuq1fN296peEOZrihB2vri34', '2023-03-09 21:15:12', '2023-05-01 11:27:16'),
(4, '/storage/images/6pWiKeoTGzitzPeqNTP2p42clwPAwZuA7NvDS83J.png', 'moderator1', 0, 'test\r\n私は管理者です\r\nいろんなゲームをプレイしています', '正常', 52, 8, 'blue', 'abc@def', NULL, '$2y$10$0Tcieq9gnCSr7.cS4xEqlOMzNkrBtC6jCuDfx2EyZ0khFquruE9Va', '4TOEo3h5PtkAii2BxlyoqWXBibkDnRGR1O80TjosyKrfHixuSi8jpqtyqkRS', '2023-03-10 10:00:22', '2023-05-25 08:06:47'),
(5, '/img/logo.png', 'ユーザー１', 1, NULL, '正常', 1, 1, 'black', 'eee@eee.eee', NULL, '$2y$10$Dgn3ivaP/kF44YQ5sBBNZ.oVQ46AiUvE.WOyx./fkxwArsHUMGlWe', NULL, '2023-03-13 07:44:33', '2023-05-25 01:19:26'),
(6, '/storage/images/FRePogmsP8cqKctoilLMGlXSEsgYVFsDtATihfso.png', 'ユーザー2', 1, NULL, '永久停止', 1, 1, 'black', 'eee@eee', NULL, '$2y$10$eZgVQ14B48T9uHdb0oReQeR.KvkbQUeWpmqbyvPEK3RkuBxBjjMxu', 'MkcCtTpCxnvLg2Kr9GICVBZ7SW8wY7WEJGjse6t57nqyVHSdV9hGFTIdgW3g', '2023-03-13 07:47:37', '2023-05-24 07:26:38'),
(7, '/img/logo.png', 'ユーザー３', 1, NULL, '正常', 1, 0, 'black', 'user@3', NULL, '$2y$10$03/R6ZVdJsTouj1pr/9LnuLbis7NDs69x8CsE3CBAoSckWKVKKE6W', NULL, '2023-03-14 08:43:38', '2023-05-11 02:11:29'),
(8, '/img/logo.png', 'ユーザー４', 1, NULL, '正常', 1, 0, 'black', 'user@4', NULL, '$2y$10$.qUqeYlTEMJE5Tyh5pX92e9FSAU1T0vouxpqHqhjBs/ajuTczBmni', NULL, '2023-03-14 08:45:53', '2023-03-14 08:45:53'),
(9, '/img/logo.png', 'ゲーム', 1, 'aaa', '正常', 1, 6, 'black', 'Argentine@google.ar', NULL, '$2y$10$veM4PYLVJc7V3z0PFkx7a.7UjTFyMFJr6O7Y21lTB4jhVaU3CTARa', NULL, '2023-05-24 02:43:31', '2023-05-25 03:41:44'),
(10, '/img/logo.png', '江口', 1, NULL, '永久停止', 1, 2, 'black', 'eguti@jp', NULL, '$2y$10$35X2hmtLTd3kOfQ9fwfv0uaOHo.T5LC4KBmY1By.nYnYY.TlBHgHy', NULL, '2023-05-24 13:39:46', '2023-05-24 13:53:44'),
(11, '/img/logo.png', '一般ユーザー', 1, NULL, '正常', 1, 0, 'black', 'abcd@efg', NULL, '$2y$10$FpY64WojfXBbCMCIwwAGBuWaTysmYbK8V6gNM72C2kEmagcCCTeK.', NULL, '2023-05-25 03:03:20', '2023-05-25 03:03:20'),
(12, '/storage/images/VOll3DvcDT8oxPih6GaJ3Zky1hye8IrOC8qUoGJd.jpg', '一般ユーザー1', 1, '一般ユーザーです\r\nよろしくお願いします', '正常', 1, 3, 'black', 'abc@defg', NULL, '$2y$10$hWlYLL8Ze6SWKNLkbLj83e54rHpkhqnbFocI8xhN.52jxVIcHSgfu', NULL, '2023-05-25 03:10:26', '2023-05-25 03:19:21'),
(13, '/img/logo.png', '一般ユーザー２', 1, NULL, '正常', 1, 0, 'black', 'abcd@efgh', NULL, '$2y$10$afGgDCVLXnify1V4Hog60eCbD6tBiBkDP8GA6wRW5MVdNFX/3tAre', NULL, '2023-05-25 03:20:17', '2023-05-25 03:20:17'),
(14, '/storage/images/SX0cZZa4uQsd7smOgBiFNujmiHDDIvfPWko1MJUd.jpg', '一般ユーザー３', 1, '一般ユーザーです\r\nよろしくお願いします', '正常', 1, 4, 'black', 'ab@jp', NULL, '$2y$10$JW5chznq1xCVRHohuOYOtuN.jHcHUCiJXDa/eGFSR2hYPURfppZOC', NULL, '2023-05-25 03:22:38', '2023-05-25 03:39:20'),
(15, '/storage/images/QGHSyw25XMxF2jhB7hTlRIYk3mdLnClYLUVk1ivB.jpg', 'テストユーザー', 1, 'よろしくお願いします', '正常', 1, 4, 'black', 'test@test', NULL, '$2y$10$l/rrTKn3mgGRoyZvPRqNuezT.9mlz03vsAmvmodiTK7Sqmv.Iu44.', NULL, '2023-05-25 08:04:49', '2023-05-25 08:05:54'),
(16, '/img/logo.png', '管理者2', 0, NULL, '正常', 1, 0, 'black', 'admin@jp', NULL, '$2y$10$625Hz8odphujK7oV9YIFrexA3bI4QnLuoMa3f/pl8hsyXBKMlEdRe', NULL, '2023-05-25 08:29:57', '2023-05-25 08:29:57');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `comment_favorites`
--
ALTER TABLE `comment_favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`,`user_id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `room_favorites`
--
ALTER TABLE `room_favorites`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `talkroom`
--
ALTER TABLE `talkroom`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- テーブルの AUTO_INCREMENT `comment_favorites`
--
ALTER TABLE `comment_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `room_favorites`
--
ALTER TABLE `room_favorites`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `submission`
--
ALTER TABLE `submission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `talkroom`
--
ALTER TABLE `talkroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
