-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 12:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'محمد العربي', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(2, 'هيثم طلعت', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(3, 'د.أياد قنديبي', 'د.أياد قنديبي د.أياد قنديبيد.أياد قنديبي د.أياد قنديبي', '2023-03-12 11:04:46', '2023-06-08 09:43:38'),
(4, 'ياسر سلامة', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(5, 'هاشم سليم', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(6, 'فاطمة حيشية', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `publisher_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `publish_year` bigint UNSIGNED DEFAULT NULL,
  `number_of_pages` bigint UNSIGNED NOT NULL,
  `number_of_copies` bigint UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `publisher_id`, `title`, `isbn`, `description`, `publish_year`, `number_of_pages`, `number_of_copies`, `price`, `cover_image`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'دليلك لاحتراف العمل الحر', '100000000001', 'يضع هذا الكتاب المُوجز القارئ على أعتاب عالم تصميم تجربة المُستخدمين UX، وهو علم له قواعده وأصوله وأدواته، ويهدف إلى تعريف القارئ المُبتدئ بأساس هذا العلم وكيف يُطبّق على المُنتجات الرّقمية من مواقع ويب خدميّة وتطبيقات على الأجهزة الذّكية وصولًا إلى التّصميم الأمثل الّذي يُوفِّق بين هدف المُستخدم أوّلًا وهدف الخدمة التّجاريّ، الأمر الّذي يعني منتجًا ناجحًا. ', NULL, 288, 300, '22.00', 'images/covers/2.png', '2023-03-12 11:04:47', '2023-03-12 11:04:47'),
(3, 3, 1, 'دليلك المختصر لبيع المنتجات الرقمية', '100000000002', 'هل لديك وظيفة ولكن طموحك يمنعك من الاعتماد على الوظيفة فقط وأردت أن تبدأ عملك الحر لتحقق المزيد من الدخل والاستقلالية، فأنا ادعوك لقراءة هذا الدليل المختصر بتمعن لتتعرف على المنتجات الرقمية وكيف يمكنك البدء ببيعها، والمفاجأة السارة أنه يمكنك أن تبدأ بالعمل من دون رأس مال في كثير من الأحيان، فكل ما تحتاج إليه لتتمكن من البدء جهاز كمبيوتر وخط اتصال بالإنترنت بالإضافة إلى العمل الجاد والرغبة بالنجاح.\n            إذا كنت لا تؤمن بهذا النوع من الأعمال وتعتقد أنها غير مجدية، فأنا أدعوك لأن لا تتعجل، فسأطلعك على قصص نجاح ستغير دون شك من هذا الاعتقاد ولكن بعد أن نستعرض بشكل مختصر بعد المحطات الرئيسية لتطور العملية التجارية في شبكة الإنترنت، بالإضافة إلى لمحة عن وضع الشراء الإلكتروني في العالم العربي.\n            أنصحك بالابتعاد عن مصادر الإزعاج وإعداد كوب من القهوة لتبدأ عملك بكل نشاط وتركيز وتكون قادرا على البدء في بناء مستقبلك', NULL, 288, 300, '18.00', 'images/covers/3.png', '2023-03-12 11:04:47', '2023-03-12 11:04:47'),
(4, 2, 1, 'دليلك المختصر لبدء العمل عبر الإنترنت', '100000000003', 'تحية إلى كل الأحرار … لا، هذه ليست دعوة ثورية ضد نظام الحكم للأسف كما قد يخطر ببالك، ولكنها دعوة إلى الثورة على نمط الحياة الممل الذي يحياه معظمنا.\n            دعوة إلى الحياة بحرية أكبر خارج دائرة مثل \"لقمة العيش\" و \"الحمار المربوط في الساقية\" و \"عبد المأمور\" و \"اربط الحمار في المكان الذي يريده صاحبه\"، مثل هذه المفاهيم وأكثر كانت -وما زالت- سبب في تأخر أمة بأكملها.\n            أوصاني أستاذي باستذكار دروسي جيداً حتى أحصل على شهادة جامعية تؤهلني لوظيفة محترمة، مسكين أستاذي، تُرى ماذا سيقول إذا علم أن أشخاص مثل \"ستيف جوبز\" و \"مارك زوكربيرج\" و \"بيل جيتس\" لم يكملوا تعليمهم.\n            هذه المفاهيم يجب أن تتحطم، وأكثر مفهوم سيسعى هذا الكتاب إلى تحطيمه هو أنه يجب عليك أن تذهب إلى العمل كل يوم.\n            في هذا الكفاية، افتح الباب الآن، وانظر إلى ما سيفاجئك به عالم اليوم.', NULL, 288, 300, '12.00', 'images/covers/4.png', '2023-03-12 11:04:47', '2023-03-12 11:04:47'),
(5, 4, 1, 'الدليل المختصر لصفحات الهبوط', '100000000004', 'صفحات الهبوط أو Landing Pages أصبحت الآن من الثوابت في عالم التسويق الإلكتروني لكل من يرغب في بناء قائمة بريدية ثرية من العملاء المستهدفين، الذين يمثلون أعلى عائد على الاستثمار ROI (اختصارًا لـ Return On Investment) إذا تم استغلالها بالشكل الصحيح.\n            ولكن ما هي صفحات الهبوط؟ وإلى أي مدى يمكن تحقيق استفادة استثنائية منها في مشروعك أو شركتك؟\n            في هذا الدليل المختصر نستعرض ماهية صفحات الهبوط، أهميتها، كيفية صناعتها، وما هي أفضل الممارسات التي تحقق بها أعلى استفادة من استخدامها.', NULL, 288, 300, '24.00', 'images/covers/5.png', '2023-03-12 11:04:47', '2023-03-12 11:04:47'),
(6, 5, 1, 'دليلك المختصر للعمل كمطور ويب', '100000000005', 'مرّت علي حتى كتابة هذه السّطور (1/2015) 3 سنوات تماما في العمل المُستقل من البيت، جرّبت خلال هذه الفترة العديد من الأفكار والمشاريع التي أخفق كثيرٌ منها ونجح بعضها نجاحًا نسبيا، فيما لا أزال رغم تحديّات العمل من البيت  أشعر بمُتعة الاستقلالية واتخاذ القرارات والتألق أكثر في عالم الأعمال أون لاين الذي يُعلّمني الكثير كل يوم.\n\n            كنت ولا زلت أستخدم مهاراتي الفنية لطلب الرّزق من العمل المُستقل عبر الإنترنت كعمل أساسي أعتمد عليه، تطلّب مني هذا العمل أن أطوّر نفسي بشكل مُستمر وسريع، وأن أقرأ بنَهَم كل ما تقع عليه عيني من مقالات علمية في مجال التسويق والمبيعات. فبالإضافة إلى تقديمي خدمات مُتخصّصة كالتصميم والكتابة التسويقية وخدمات التسويق الإلكتروني لعُملائي، صمّمت -بالاعتماد على عدد من المُستقلين الآخرين- مُنتجات رقمية عربية وأجنبية حقّقتُ من خلالها مبالغ جيّدة حقّقت لي شُعورًا لم أجده في بيع الخدمات.', NULL, 288, 300, '20.00', 'images/covers/6.png', '2023-03-12 11:04:47', '2023-03-12 11:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`id`, `author_id`, `book_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL),
(5, 5, 5, NULL, NULL),
(6, 6, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_user`
--

CREATE TABLE `book_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `number_of_copies` bigint UNSIGNED NOT NULL DEFAULT '1',
  `bought` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_user`
--

INSERT INTO `book_user` (`id`, `user_id`, `book_id`, `number_of_copies`, `bought`, `price`, `created_at`, `updated_at`) VALUES
(17, 1, 3, 1, 1, '18.00', '2023-03-16 07:10:51', NULL),
(18, 1, 3, 3, 1, '18.00', '2023-03-16 07:16:59', NULL),
(19, 1, 3, 1, 1, '18.00', '2023-03-16 07:36:13', NULL),
(22, 1, 3, 3, 1, '18.00', '2023-03-18 07:09:59', NULL),
(23, 2, 3, 4, 1, '18.00', '2023-05-03 03:43:46', NULL),
(24, 2, 6, 1, 1, '20.00', '2023-05-03 03:43:46', NULL),
(25, 1, 2, 1, 1, '22.00', '2023-03-18 07:09:59', NULL),
(26, 1, 2, 1, 1, '22.00', '2023-06-08 08:12:08', NULL),
(27, 2, 3, 4, 1, '18.00', '2023-05-03 03:45:30', NULL),
(28, 2, 4, 3, 1, '12.00', '2023-05-03 04:30:53', NULL),
(29, 2, 6, 7, 1, '20.00', '2023-05-03 04:37:37', NULL),
(31, 2, 3, 2, 1, '18.00', '2023-05-10 08:31:17', NULL),
(32, 2, 3, 2, 1, '18.00', '2023-05-10 08:34:59', NULL),
(33, 2, 2, 3, 1, '22.00', '2023-05-10 08:39:14', NULL),
(34, 2, 3, 3, 1, '18.00', '2023-05-10 08:40:08', NULL),
(35, 2, 3, 2, 0, '0.00', NULL, NULL),
(36, 1, 2, 1, 1, '22.00', '2023-06-08 08:24:15', NULL),
(37, 1, 2, 2, 1, '22.00', '2023-06-08 09:17:30', NULL),
(38, 1, 6, 1, 1, '20.00', '2023-06-08 09:19:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ريادة أعمال', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(2, 'العمل الحر', 'العمل الحر العمل الحر العمل الحر العمل الحر', '2023-03-12 11:04:46', '2023-06-08 09:42:19'),
(3, 'تسويق ومبيعات', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(4, 'تصميم', NULL, '2023-03-12 11:04:46', '2023-03-12 11:04:46'),
(5, 'برمجة معدل', NULL, '2023-03-12 11:04:46', '2023-03-14 04:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_06_084523_create_sessions_table', 1),
(7, '2023_03_07_075622_create_authors_table', 1),
(8, '2023_03_07_075747_create_publishers_table', 1),
(9, '2023_03_07_075958_create_categories_table', 1),
(10, '2023_03_07_080114_create_books_table', 1),
(11, '2023_03_07_083006_create_book_author_table', 1),
(12, '2023_03_07_083213_create_book_user_table', 1),
(13, '2023_03_07_083944_create_ratings_table', 1),
(14, '2019_05_03_000001_create_customer_columns', 2),
(15, '2019_05_03_000002_create_subscriptions_table', 2),
(16, '2019_05_03_000003_create_subscription_items_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'أحمد جمال', 'موزانبيق, كوالالامبور, الدقي', '2023-03-12 11:04:46', '2023-06-08 09:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `value` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `book_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, '2023-03-15 07:48:59', '2023-03-18 03:41:47'),
(2, 1, 4, 5, '2023-03-15 07:49:30', '2023-03-15 09:49:25'),
(3, 1, 5, 1, '2023-03-15 09:42:17', '2023-03-15 09:42:17'),
(4, 1, 6, 4, '2023-03-16 05:34:08', '2023-03-16 05:34:08'),
(5, 1, 2, 4, '2023-04-23 02:24:03', '2023-06-08 09:14:35'),
(6, 2, 3, 4, '2023-05-03 03:51:04', '2023-05-03 03:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nwO3H2ZnXPoSRBxFokNiMoOTNJARYhipkconK6Oc', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQTRDUzBHRHI1YkJwUFZQNW1IbnpRdWRKVTZxYlNtQkl4ZnViTjZFdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9ib29rc3RvcmUubG9jYWxob3N0L2FkbWluL2FsbC1wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1686228404);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint UNSIGNED NOT NULL,
  `subscription_id` bigint UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `administration_level` bigint UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `administration_level`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'ahmed super admin', 'ahmed2@gmail.com', NULL, '$2y$10$k843uf1nM3GUzXqwjnSM5eMzdjQZC0AS/stPlmNY/tRiNZOwUhwfy', NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-03-12 12:11:28', '2023-06-08 08:12:02', 'cus_NXHOdOoELgn5Fo', 'visa', '4242', NULL),
(2, 'ahmed normal admin', 'ahmed1@gmail.com', NULL, '$2y$10$nvehIHMIiRQLTdp5wy1LCu0ws5L4ghnvQeW6ALL12xpjhBYdXi.CC', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-03-14 05:54:53', '2023-05-03 03:42:27', 'cus_NpDqz3FkcpQ9oo', 'visa', '4242', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_author_author_id_foreign` (`author_id`),
  ADD KEY `book_author_book_id_foreign` (`book_id`);

--
-- Indexes for table `book_user`
--
ALTER TABLE `book_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_user_user_id_foreign` (`user_id`),
  ADD KEY `book_user_book_id_foreign` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_book_id_foreign` (`book_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_user`
--
ALTER TABLE `book_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_author_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_user`
--
ALTER TABLE `book_user`
  ADD CONSTRAINT `book_user_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
