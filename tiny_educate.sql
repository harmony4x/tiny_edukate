-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2022 lúc 06:35 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tiny_educate`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Ngôn ngữ lập trình', 'ngon-ngu-lap-trinh', 1, '2022-09-07 02:12:02', '2022-09-07 02:12:02'),
(4, 'Lập trình website', 'lap-trinh-website', 1, '2022-09-07 02:12:24', '2022-09-07 02:12:24'),
(5, 'Lập trình game', 'lap-trinh-game', 0, '2022-09-07 02:12:35', '2022-09-28 02:06:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `location`, `phone`, `google_map`, `created_at`, `updated_at`) VALUES
(1, 'tinyeducate@gmail.com', 'Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ', '0917138144', '<iframe src=\"https://www.google.com/maps/d/embed?mid=1bhL0QOJQMXNfXtZ60fZ-mn4CfoA&ehbc=2E312F\" width=\"100%\" height=\"480\"></iframe>', '2022-09-08 07:32:06', '2022-09-08 07:32:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `sold` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:ẩn, 1:hiện',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id`, `title`, `slug`, `description`, `course_code`, `quantity`, `sold`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Lập Trình python Từ Zero - Hero', 'lap-trinh-python-tu-zero-hero', '<p><strong>Bạn sẽ học được gì</strong></p><ul><li>Kiến thức nền tảng nhất về ngôn ngữ lập trình Python cho đến ứng dụng Python nâng cao vào các tình huống thực tế</li><li>Tiếp cận làm việc và thực hành&nbsp;với Python từ con số 0</li><li>Nắm được các kiến thức có trong khóa học&nbsp;lập trình Python: biểu thức trong Python, đối tượng&nbsp;String,&nbsp;List, Tuples, Sets và Dictionary, hàm tự định nghĩa, module trong Python...&nbsp;</li><li>Xây dựng Website, Game, Application hoặc Automation bằng&nbsp;Python</li><li>Tự ôn tập và nâng cao kỹ năng lập trình Python với các bài tập và tình huống thực có trong quá trình làm việc của lập trình viên</li><li>Nhanh chóng thành thạo các thao tác làm việc và áp dụng vào công việc lập trình</li><li>Tự tin phỏng vấn vào các công ty, doanh nghiệp với mức lương cao</li></ul><p><strong>Giới thiệu khóa học</strong></p><p>Thế giới ngày nay có rất rất nhiều ngôn ngữ lập trình được sử dụng phổ biến, trong đó phải kể đến các ngôn ngữ&nbsp;C++, C#, Java, Python,&nbsp;PHP,... Đặc biệt, Python đang là ngôn ngữ lập trình mà những người mới học công nghệ thông tin&nbsp;tìm học nhiều nhất. Cho đến nay những lập trình viên Python vẫn luôn được các nhà tuyển dụng tại các doanh nghiệp lớn nhỏ chiêu mộ với những ưu ái cực tốt với mức thu nhập xếp vào loại cao nhất.</p><p><i><strong>Những lý do bạn nên học Python bên cạnh các ngôn ngữ lập trình khác:&nbsp;</strong></i></p><p>✔️ Lý do 1: Python là ngôn ngữ mới và dễ học hơn bất kì ngôn ngữ nào</p><p>✔️ Lý do 2: Python là ngôn ngữ hàng đầu tại các đất nước trên thế giới nhất là Châu Âu. Và bạn cũng đã biết tương lai Việt Nam sẽ được hội nhập với các nước trên thế giới vậy cho nên nguồn lực cho mã nguồn Python là cực kì nhiều.Vì đa phần các nước châu Âu họ đều sài Python thay cho C.</p><p>✔️ Lý do 3: Python là ngôn ngữ giúp bạn viết được trên đa nền tảng nên ví dụ như lập trình website, lập trình di động và cả lập trình game thì Python đều có thể làm được.</p><p>✔️ Lý do 4: Đảm bảo đây là nội dung đầy đủ và kỹ càng nhất về ngôn ngữ lập trình Python để từ đó bạn có thể áp dụng Python vào các công việc bạn muốn hướng tới hoặc tạo thêm nhiều cơ hội việc làm cho bạn.</p><p>Hãy tham gia khóa học lập trình web trực tuyến&nbsp;<i><strong>\"Lập Trình Python Từ Zero - Hero\"</strong></i>&nbsp;của giảng viên Vũ Quốc Tuấn để nhanh chóng trở&nbsp;thành chuyên gia lập trình ngay tại khóa học Python này</p>', 'CT6', 40, 3, 5, 1, '2022-09-07 02:38:18', '2022-09-07 02:44:43'),
(7, 'Toàn tập ngôn ngữ lập trình C#', 'toan-tap-ngon-ngu-lap-trinh-c', '<p><strong>Bạn sẽ học được gì</strong></p><ul><li>Có được toàn bộ kiến thức về ngôn ngữ lập trình C# từ cơ bản đến chuyên sâu nhất để có thể tự tạo ra được&nbsp;một ứng dụng hoàn chỉnh từ C#</li><li>Nắm được những nội dung chính trong ngôn ngữ C#: kiến thức về hàm, cấu trúc trong C#, debug, xử lý chuỗi và&nbsp;mảng, xây dựng một project thực tế...&nbsp;</li><li>Có được kiến thức toàn diện đầy đủ về ngôn ngữ lập trình C#</li><li>Có khả năng phát triển phần mềm tương tác cơ sở dữ liệu bằng C#</li><li>Xây dựng được kiến trúc đa tầng trong C#, lập trình win form cơ bản trong C#</li><li>Là cơ sở để lập trình di động đa nền tảng với Xamarin...</li></ul><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Ngôn ngữ lập trình C#</strong></i></p><p>Hiện nay ngôn ngữ lập trình C# là một trong những ngôn ngữ được rất nhiều người sử dụng trong công việc lập trình của mình. Bởi đây là một trong những ngôn ngữ&nbsp;có cấu trúc rõ ràng, dễ hiểu và dễ học. Ngôn ngữ lập trình C# thừa hưởng những ưu việt từ ngôn ngữ lập trình Java, C và C++ cũng như có khả năng khắc phục được những điểm hạn chế của những ngôn ngữ trên, điều này đã tạo nên một ngôn ngữ C# với tính ưu việt gần như hoàn hảo nhất.</p><p>Và nếu bạn là người đang đi tìm cho mình một lộ trình học ngôn ngữ lập trình C# một cách bài bản, tối ưu chi phí và linh động thời gian học nhất thì bạn không nên bỏ qua khóa học&nbsp;<i><strong>\"Toàn tập ngôn ngữ lập trình C#\"</strong></i> của giảng viên đào tạo <i><strong>Trần Duy Thanh</strong></i>.</p><p>Khóa học lập trình C# được&nbsp;xem là cuốn cẩm nang cần thiết dành cho những ai đang có nhu cầu học ngôn ngữ&nbsp;C#, từ những khái niệm cơ bản đến các bài học lập trình C # cụ thể có tính ứng dụng cao. Khóa học&nbsp;sẽ trình bày các kiến thức về C#, đây là ngôn ngữ lập trình hướng đối tượng được phát triển bởi Microsoft, được xây dựng dựa trên C++ và Java.</p><p>Còn chần chờ gì nữa mà không đăng ký ngay khóa học<i><strong>\"Toàn tập ngôn ngữ lập trình C#\" </strong></i>của giảng viên đào tạo Trần Duy Thanh.</p>', 'CT7', 40, 5, 5, 1, '2022-09-07 02:40:24', '2022-09-09 07:26:25'),
(8, 'ASP.NET và Xây dựng hoàn chỉnh ứng dụng website động', 'aspnet-va-xay-dung-hoan-chinh-ung-dung-website-dong', '<p><strong>Bạn sẽ học được gì</strong></p><ul><li>Cung cấp cho bạn kiến thức nền tảng về ASP.NET WebForm.</li><li>Làm tiền đề cho bạn nếu muốn lập nghiệp và phát triển cơ hội bằng nền tảng .NET.</li><li>Tự tin xây dựng các ứng dụng website vừa, nhỏ và hệ thống ứng dụng WebPortal trong tương lai.</li><li>Tự tin ứng tuyển vào các Công ty đang làm về ASP.NET.</li><li>Có thêm các kiến thức về lập trình chuyên nghiệp.</li><li>Phát triển toàn diện sự nghiệp của các bạn muốn theo đuổi .NET.</li></ul><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Lập trình ASP.NET là gì?</strong></i></p><p>Nếu bạn đang ở trong vị trí công việc của một lập trình viên, một nhà phát triển web thì khái niệm ASP không còn xa lạ.</p><p>ASP là một giải pháp của Microsoft để sản xuất nội dung cho các trang web, nó là hệ thống dựa trên tập lệnh cho phép mã chương trình đơn giản vào trong tệp HTML.</p><p>ASP. NET là một khung ứng dụng web phía máy chủ nguồn, được thiết kế để phát triển web nhằm tạo ra một trang web động do Microsoft phát triển để cho phép các lập trình viên xây dựng các trang web, ứng dựng và dịch vụ.</p><p>Nhưng, làm sao có thể thành thạo và sử dụng được ASP.NET là cả một vấn đề, có người học lập trình web&nbsp;chỉ mất vài ngày, nhưng có người mất vài tháng, thậm chí cả năm. Chính vì thế, với khoá học \"<i><strong>ASP.NET và xây dựng hoàn chỉnh ứng dụng website động</strong></i>\" của giảng viên Trương Minh Tuấn trên UNICA, bạn sẽ được hướng dẫn triển khai từng bước để tạo một website hoàn chỉnh.</p><p><a href=\"https://inet.vn/hosting/web-hosting?affSource=INET-UNICA\"><i><strong>Tặng 01 tháng sử dụng hotsting tại iNET</strong></i></a></p><p><i><strong>Nội dung khóa&nbsp;học</strong></i></p><p>Khóa học bao gồm 60 bài giảng và thời lượng học là 10 giờ 22 phút. Với 11 phần nội dung đi từ theo lộ trình bài bản từ cơ bản đến nâng cao, từ việc làm quen cơ sở dữ liệu đến kiến trúc ADO. NET, cách làm việc với SQL Server, xây dựng hệ thống ứng dụng web...</p><p>Khóa học Asp.net từ cơ bản đến nâng cao&nbsp;cung cấp trọn bộ kiến thức từ cơ bản đến nâng cao của lập trình .NET trên nền tảng ASP.NET WebForm.</p><p>Với những kiến thức mang tính thực hành và sự hướng dẫn trực tuyến bằng Video, Học viên sẽ có thể áp dụng ngay những gì đã học vào thực tế;</p><p>Khóa họ̣c sử dụng công cụ Visual Studio, Framework mới nhất.</p><p>Làm tiền đề cho việc tự học nâng cao về .NET đặc biệt là ứng dụng ASP.NET MVC, ASP.NET Core hoặc các&nbsp;khóa học công nghệ thông tin&nbsp;chuyên sâu khác</p>', 'CT8', 40, 6, 3, 1, '2022-09-07 02:48:41', '2022-10-14 02:23:15'),
(9, 'Lập trình Restful Webservice trong 6 tuần', 'lap-trinh-restful-webservice-trong-6-tuan', '<p><strong>Bạn sẽ học được gì</strong></p><p>Có được kiến thức toàn diện về lập trình RESTful .net Webservice</p><p>Có kiến thức sử dụng Microsoft SQL Server</p><p>Nắm rõ kỹ thuật tương tác dữ liệu giữa Di động Android với Webservice</p><p>Kỹ thuật tương tác dữ liệu giữa Desktop application, javaScript, AngularJS với Webservice</p><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Lập trình Restful Webservice là gì?</strong></i></p><p>Restful Web service là các web Service được viết dựa trên kiến trúc REST. REST đã được sử dụng rộng rãi thay thế cho các Web Service dựa trên SOAP và WSDL. Lập trình Restful Webservice là gì nhẹ, dễ dàng mở rộng và bảo trì đơn giản.</p><p>REST định nghĩa các quy tắc kiến trúc để bạn thiết kế Web services, chú trọng vào tài nguyên hệ thống, bao gồm các trạng thái tài nguyên được định dạng như thế nào và được truyền tải qua HTTP, và được viết bởi nhiều ngôn ngữ khác nhau.</p><p><i><strong>Nhưng:</strong></i></p><p>Để <a href=\"https://unica.vn/tag/lap-trinh-web\">học lập trình web</a> Restful Web service này không phải đơn giản. Chính vì thế, khóa học <i><strong>Lập trình Restful Webservice trong 6 tuần</strong></i> của giảng viên <a href=\"https://unica.vn/teacher/tran-duy-thanh\"><i><strong>Trần Duy Thanh</strong></i></a> sẽ cung cấp trọn bộ kiến thức lập trình Web service để bạn nắm rõ cách thức cài đặt cấu hình IIS Webserver.</p><p>Khóa học bao gồm 53 bài giảng và thời lượng học là 16 giờ 48 phút.</p><p>Khóa học cung cấp trọn bộ kiến thức lập trình Webservice với&nbsp;Web API Restful, học viên có thể dễ dàng tương tác từ Di động Android, Desktop (Winform, Java Swing), JavaScript, AngularJS tới Webservice, có thể khai thác được Microsoft SQL Server cũng như Visual Studio hiệu quả và xin việc làm Backend cho Di động</p><p>Khóa họ̣c còn sử dụng những công cụ Framework mới nhất, tìm hiểu ngôn ngữ lập trình C#, LINQ to SQL, cung cấp những kiến thức lập trình .net Webservice,cung cấp cách thức cài đặt cấu hình IIS Webserver, cách thức cài đặt Webservice, cách thức tương tác dữ liệu từ Di động Android, Desktop (Winform, Java swing), JavaScript, AngularJS tới .net Webservicce</p><p>Tham gia khóa học \"<i><strong>Lập trình Restful Webservice trong 6 tuần</strong></i>\" ngay hôm nay. Ngoài ra còn rất nhiều điều bất ngờ trong các&nbsp;khóa học công nghệ thông tin&nbsp;trên UNICA&nbsp;về giá và có toàn bộ kiến thức về lập trình&nbsp;Restful đang chờ bạn khám phá đấy!</p>', 'CT9', 40, 40, 5, 1, '2022-09-07 02:50:30', '2022-09-25 03:48:41'),
(10, 'Lập trình game 3D với Unity', 'lap-trinh-game-3d-voi-unity', '<p><strong>Bạn sẽ học được gì</strong></p><ul><li>Được cung cấp kiến thức và kỹ năng lập trình game bằng Unity 3D</li><li>Tự lập trình được 1 game 3D theo hướng dẫn</li><li>Học được kiến thức lập trình game với Unity 3D</li><li>Cải thiện kỹ năng lập trình game với&nbsp;Unity 3D</li><li>Được cung cấp những kiến thức và kinh nghiệm lập trình thực tế bằng Unity 3D</li><li>Nâng cao cơ hội thăng tiến trong công việc lập trình</li></ul><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Có phải bạn là...&nbsp;</strong></i></p><ul><li>Yêu thích game và muốn trở thành người lập trình sáng tạo nên trò chơi của mình</li><li>Bạn là người đã có hiểu biết về Unity 3D và muốn nâng cao kỹ năng lập trình game.</li><li>Hay bạn chưa biết và mong&nbsp;muốn tìm hiểu về&nbsp;Unity 3D</li><li>Bạn đã có kiến thức lập trình, muốn học và trải nghiệm lập trình game 3D</li><li>Bạn yêu thích&nbsp;học công nghệ thông tin&nbsp;chuyên về lập trình</li></ul><p><i><strong>Chào mừng các bạn đã đến với khóa học \"Lập trình game 3D với Unity\",&nbsp;của giảng viên Trương Nguyễn Hoàng.&nbsp;</strong></i></p><p>Khóa học unity đặc biệt&nbsp;dành cho những người đã biết hoặc đã có những trải nghiệm nhất định về Unity - phần mềm làm game đa nền tảng phổ biến nhất, hay những người đã có kỹ năng lập trình và muốn chuyển sang mảng lập trình game.</p><p>Sau khóa học, bạn sẽ có kiến thức lập trình game với Unity 3D, cải thiện kỹ năng lập trình, và có thể tự tay lập trình được 1 game 3D theo hướng dẫn.</p><p><i><strong>Tham gia khóa&nbsp;học lập trình game unity bạn sẽ được thầy Hoàng hướng dẫn:</strong></i></p><p>&nbsp; &nbsp; &nbsp; ✔️ Kiến thức và những kỹ năng cơ bản đầu tiên cần có để bắt tay lập trình game</p><p>&nbsp; &nbsp; &nbsp; ✔️ Hướng dẫn thực hiện lập trình trnag thái game, chướng ngại vật và di chuyển nhân vật từ đơn giản cho đến mượt mà bằng camera</p><p>&nbsp; &nbsp; &nbsp; ✔️ Lập trình hiển thị màn hình game theo từng trường hợp: lúc vào game, game over, màn hình trong game,... và lập trình âm thanh Optimize</p><p>&nbsp; &nbsp; &nbsp; ✔️ Lập trình concept game: thông tin người chơi, điểm, nhiệm vụ...</p><p>&nbsp; &nbsp; &nbsp; ✔️ Hướng dẫn lập trình nhân vật, bối cảnh và tối ưu khung hình sao cho phù hợp: về màu sắc, ánh sáng, hiệu ứng, ... để game có độ chân thật cao hơn</p><p>&nbsp; &nbsp; &nbsp; ✔️ Cách kiểm thử game trên thiết bị thật, check lỗi và fix. Đồng thời hướng dẫn học viên đóng gói file cài đặt, up sản phẩm lên Google Play để công khai trò chơi.</p><p>Vậy còn chờ gì nữa, chinh phục khóa học <i><strong>\"Lập trình game 3D với Unity\"&nbsp;</strong></i>ngay hôm nay&nbsp;</p>', 'CT10', 40, 9, 5, 1, '2022-09-07 03:12:01', '2022-10-14 02:24:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_detail`
--

CREATE TABLE `course_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecture` int(11) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` date NOT NULL,
  `skill_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0:Basic, 1:Advance',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_detail`
--

INSERT INTO `course_detail` (`id`, `course_code`, `instructor`, `lecture`, `duration`, `start_day`, `skill_level`, `language`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 'CT6', 'Vũ Quốc Tuấn', 30, '15', '2022-09-10', '0', 'Python', 3200000, 'lap-trinh-python50.jpg', '2022-09-07 02:38:18', '2022-09-07 04:12:12'),
(3, 'CT7', 'Trần Duy Thanh', 45, '25', '2022-08-23', '1', 'C#', 3200000, 'imager_2_11736_70046.jpg', '2022-09-07 02:40:24', '2022-09-07 04:15:58'),
(4, 'CT8', 'Trương Minh Tuấn', 30, '25', '2022-10-15', '0', 'C#', 1450000, 'xay-dung-web-truong-minh-tuan_m82.jpg', '2022-09-07 02:48:41', '2022-09-07 04:11:45'),
(5, 'CT9', 'Trần Duy Toản', 25, '30', '2022-09-15', '0', 'PHP', 1550000, '1_VtzBqZ-yYr_c6DpJsQkiyA13.jpg', '2022-09-07 02:50:30', '2022-09-25 03:48:41'),
(6, 'CT10', 'Trương Thái', 45, '30', '2023-09-17', '1', 'C++', 870000, 'unity25.jpg', '2022-09-07 03:12:01', '2022-09-25 03:59:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_04_100058_create_categories_table', 2),
(6, '2022_09_04_100110_create_course_table', 2),
(7, '2022_09_04_154453_create_course_detail_table', 2),
(8, '2022_09_08_132447_create_contacts_table', 3),
(9, '2022_09_09_060337_create_contacts_table', 4),
(10, '2022_09_09_060728_create_testimonials_table', 4),
(11, '2022_10_14_083451_create_statistical_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `statistical`
--

CREATE TABLE `statistical` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_date` date NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statistical`
--

INSERT INTO `statistical` (`id`, `registration_date`, `total_cost`, `total_user`) VALUES
(1, '2022-10-13', '870000', '1'),
(2, '2022-10-14', '2320000', '2'),
(3, '2022-10-11', '870000', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `image`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tuyết Kỳ', 'Thật hữu ích với mọi người', '33497824_633795666973250_1315085180347613184_n-e1540892158500-150x15054.jpg', 10, 0, '2022-09-09 00:24:14', '2022-09-09 02:33:29'),
(2, 'Bảo Ngọc', 'Giảng viên tích cực giúp đỡ học viên trong vấn đề học tập', '25443034_1538624419591498_4978213829465901238_n-150x15074.jpg', 10, 1, '2022-09-09 00:29:38', '2022-09-09 02:33:37'),
(3, 'Thảo', 'Giảng viên tích cực giúp đỡ học viên trong vấn đề học tập', '44104229_2076448999333459_2495645426569445376_n-150x15076.jpg', 8, 1, '2022-09-09 02:24:41', '2022-09-09 02:24:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `course_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL COMMENT '0:chưa đóng tiền, 1:đã đóng tiền',
  `registration_date` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `id_student`, `name`, `email`, `phone`, `birthday`, `course_code`, `score`, `status`, `registration_date`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'B181', 'Nguyễn Tấn Thanh', 'thanh@gmail.com', '0963216453', '2000-06-14', 'CT8', 0, 1, '2022-10-13', NULL, NULL, NULL, '2022-09-28 02:02:18', '2022-09-30 02:37:40'),
(2, 'B182', 'Vinh', '0140asssw@gmail.com', '0917138144', '2022-09-23', 'CT8', 0, 1, '2022-10-13', NULL, NULL, NULL, '2022-09-28 02:45:35', '2022-09-28 03:52:25'),
(3, 'B183', 'Phan Trịnh Minh Vinh', 'vinh@gmail.com', '0917138144', '2022-09-30', 'CT10', 0, 1, '2022-10-11', NULL, NULL, NULL, '2022-09-28 03:51:35', '2022-10-14 02:24:57'),
(5, 'B185', 'Phan Trịnh Minh Vinh', 'vinh@gmail.com', '0917138144', '2022-09-15', 'CT8', 0, 1, '2022-10-13', NULL, NULL, NULL, '2022-09-28 08:26:31', '2022-09-30 02:37:29'),
(6, 'B186', 'Phan Trịnh Minh Vinh', 'vinh@gmail.com', '0917138144', '2000-10-13', 'CT10', 0, 1, '2022-10-14', NULL, NULL, NULL, '2022-10-13 09:29:59', '2022-10-14 02:21:05'),
(7, 'B187', 'Mass Effect 13Lbs', 'penhoxct741@gmail.com', '0963216453', '2022-09-28', 'CT8', 0, 1, '2022-10-14', NULL, NULL, NULL, '2022-10-14 02:22:06', '2022-10-14 02:23:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_title_unique` (`title`),
  ADD UNIQUE KEY `course_slug_unique` (`slug`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_2` (`course_code`),
  ADD KEY `course_code` (`course_code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_code` (`course_code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  ADD CONSTRAINT `course_detail_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
