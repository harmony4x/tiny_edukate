-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2022 lúc 01:38 PM
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
(4, 'Lập trình website', 'lap-trinh-website', 1, '2022-09-07 02:12:24', '2022-09-07 02:12:24'),
(6, 'Tin học văn phòng', 'tin-hoc-van-phong', 1, '2022-10-15 08:19:31', '2022-10-15 08:19:31'),
(7, 'Thiết kế đồ họa', 'thiet-ke-do-hoa', 1, '2022-10-15 08:38:55', '2022-10-15 08:38:55'),
(8, 'Ngôn ngữ lập trình', 'ngon-ngu-lap-trinh', 1, '2022-10-15 08:43:07', '2022-10-15 08:43:07');

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
(1, 'thanhb1812302@gmail.com', 'Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ', '0922100166', '<iframe src=\"https://www.google.com/maps/d/embed?mid=1bhL0QOJQMXNfXtZ60fZ-mn4CfoA&ehbc=2E312F\" width=\"100%\" height=\"480\"></iframe>', '2022-09-08 07:32:06', '2022-09-08 07:32:06');

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
(11, 'Lập trình web cơ bản với HTML&CSS', 'lap-trinh-web-co-ban-voi-htmlcss', '<p><br><strong>Bạn sẽ học được gì</strong></p><p>Sử dụng được HTML và CSS để thiết kế giao diện các trang Web</p><p>Sử dụng được các media query để làm cho trang web trở nên responsive (khả năng đáp ứng với các thiết bị khác nhau)</p><p>Nắm được các khái niệm liên quan CSS Flexbox và CSS Grid</p><p>Tự tin thiết kế landing page thông qua project.</p><p><strong>Giới thiệu khóa học</strong></p><p>Trong khóa học này, bạn sẽ học cách sử dụng HTML&amp;CSS để tạo một trang web chuyên nghiệp, responsive được thiết kế cho cả máy tính để bàn và điện thoại di động. Bắt đầu với hiểu biết cơ bản về vai trò của HTML và CSS trong phát triển web, bạn sẽ học cách tạo biểu mẫu để thu thập thông tin của người dùng, cách hiển thị dữ liệu bằng bảng và các nguyên tắc thiết kế web responsive.<br><i><strong>Tại sao việc học HTML lại quan trọng như vậy?</strong></i><br>Học HTML và CSS là những bước đầu tiên tuyệt vời trên con đường dẫn trở thành nhà phát triển phần mềm chuyên nghiệp.<br>Nó sẽ cung cấp cho bạn các kỹ năng để làm việc hiệu quả hơn và giao tiếp đúng cách với các nhà phát triển (ngay cả khi bản thân bạn không muốn trở thành một lập trình viên chuyên nghiệp)<br>Thật vô cùng thú vị khi có thể tự tạo các trang web, ứng dụng di động và trò chơi của riêng bạn.<br>Những gì bạn sẽ học trong khóa học này:</p><ul><li>Các thẻ HTML để tạo các trang web tĩnh đẹp mắt với các liên kết và hình ảnh</li><li>Thẻ tạo danh sách HTML để tạo các danh sách có hoặc không có thứ tự</li><li>Sử dụng table để trình bày nội dung và form để tạo biểu mẫy thu thập thông tin từ người dùng.</li><li>Lựa chọn và sửa đổi các phần tử bằng CSS</li><li>Sắp xếp nội dung của bạn với CSS Box Model</li><li>Kiểu chữ và Phông chữ Google để tạo các trang web chuyên nghiệp</li><li>Thực hiện tạo một Landing page sử dụng HTML&amp;CSS</li><li>Media query để tạo các trang web responsive.</li><li>CSS Flexbox</li><li>CSS Grid</li></ul>', 'CT11', 30, 0, 4, 1, '2022-10-15 08:16:08', '2022-10-15 08:23:20'),
(12, 'Lập trình Web tốc độ cao, thời gian thực với NodeJS', 'lap-trinh-web-toc-do-cao-thoi-gian-thuc-voi-nodejs', '<p>Kết thúc khóa học lập trình Nodejs bạn sẽ nắm được cách cài đặt NodeJS trên mọi môi trường</p><p>Biết cách sử dụng NPM để quản lý thư viện cho ứng dụng NodeJS</p><p>Biết cách làm việc với NodeJS và logic phía Server</p><p>Viết được Web Server và ứng dụng Web cơ bản với NodeJS</p><p>Xây dựng BLOG cá nhân, tạo được ứng dụng CHAT web</p><p>Biết cách triển khai ứng dụng NODEJS trên Internet</p><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Bạn có biết:</strong></i></p><p>Node.js là 1 nền tảng phát triển ứng dụng phía server. Nó sử dụng ngôn ngữ lập trình JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho phép hàng chục nghìn user truy cập cùng lúc và tốc độ thì cực nhanh.&nbsp;</p><p>NodeJS hiện đang là 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản và thư viện hỗ trợ phong phú.&nbsp;</p><p><i><strong>Tuy nhiên:</strong></i></p><p>❓ Bạn đang gặp phải thắc mắc về việc tự <i><strong>học công nghệ thông tin</strong></i> và tự theo đuổi con đường lập trình. Bạn nhận thấy việc tự học không có thầy rất khó.</p><p>❓ Bạn không biết NodeJS làm việc như thế nào, không biết cách tạo một webservice cơ bản</p><p>❓ Bạn đang vật lộn trong việc xây dựng và thiết kế cơ sở dữ liệu</p><p>❓ Bạn đang xây dựng trang quản trị CSM cho blog, xây dựng API xóa bài viết nhưng vẫn loay hoay chưa biết cách xử lý như nào?</p><p>❓ Bạn không có một lộ trình học lập trình web online bài bản và đầy đủ.</p><p>Tất cả những vấn đề trên đều được giải quyết trong 6 giờ 10 phút với khóa học “<i><strong>Lập trình Web tốc độ cao, thời gian thực với NodeJS</strong></i>” của giảng viên Bá Ngọc Cương trên UNICA để được hướng dẫn bạn từng bước để xây dựng các ứng dụng Web thời gian thực, tốc độ cao: BLOG cá nhân, CHAT nhóm,..</p><p>Khóa học&nbsp;học Nodejs online bao gồm 52 bài giảng và được chia làm 9 nội dung học cụ thể như sau:</p><p>- Phần 1: Giới thiệu và cài đặt môi trường&nbsp;- Phần 2: Làm việc với NodeJS</p><p>- Phần 3: Làm việc với ExpressJS Framework</p><p>- &nbsp;Phần 4: Cài đặt và kết nối CSDL MySQL</p><p>- Phần 5: Xây dựng module Đăng Ký và Đăng nhập</p><p>-&nbsp; Phần 6: Xây dựng trang quản trị CMS cho BLOG</p><p>- &nbsp;Phần 7: Xây dựng BLOG cá nhân</p><p>- Phần 8: Xây dựng ứng dụng CHAT thời gian thực với NodeJS và Socket.IO</p><p>- &nbsp;Phần 9: Triển khai ứng dụng NodeJS trên Server</p><p>Vậy còn chần chờ gì nữa mà không&nbsp; đăng ký ngay khóa học Nodejs \"<i><strong>Lập trình Web tốc độ cao, thời gian thực với NodeJS</strong></i>\"&nbsp; ngay hôm nay để Update xu thế! &nbsp;</p>', 'CT12', 30, 0, 4, 1, '2022-10-15 08:18:50', '2022-10-15 10:46:44'),
(13, 'Trình chiếu chuyên nghiệp với PowerPoint', 'trinh-chieu-chuyen-nghiep-voi-powerpoint', '<p><strong>Bạn sẽ học được gì</strong></p><p>Làm chủ PowerPoint, hoàn thiện kĩ năng làm bài thuyết trình từ cơ bản đến nâng cao.</p><p>Áp dụng vào việc thuyết trình, dạy học, thuyết trình giới thiệu sản phẩm, minh hoạ ý tưởng, làm hoạt hình</p><p>Làm chủ được kĩ năng sử dụng phần mềm PowerPoint cũng như các phần mềm thuyết trình tương tự khác.</p><p>Tự tin khi đi xin việc hoặc tự tin thuyết trình với bài thuyết trình powerpoint hoàn hảo của mình</p><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Powerpoint là gì ?&nbsp;</strong></i></p><p>PowerPoint là một phần mềm trình chiếu trong bộ công cụ&nbsp;Microsoft Office&nbsp;đông đảo học sinh, giáo viên hay giới văn phòng sử dụng cho những bài thuyết trình của mình. Cùng với Microsoft Word và Microsoft Excel, Microsoft PowerPoint đã trở thành một thiết bị<i>&nbsp;</i>không thể thiếu. Bởi vậy mà việc&nbsp;học tin học văn phòng&nbsp;là rất cần thiết</p><p>Phần mềm Microsoft PowerPoint ra đời với mục đích chính là phục vụ các buổi thuyết trình, thay thế cho bảng và phấn. Nó cho phép người dùng tạo ra những Slide để thể hiện những thông điệp với các hiệu ứng xuyên suốt.</p><p><i><strong>Lợi ích khi sử dụng Powerpoint</strong></i></p><p>✔️ PowerPoint là công cụ vô cùng hữu ích khi được sử dụng rộng rãi và có nhiều công dụng tuyệt vời.</p><p>✔️ Giúp các doanh nghiệp tạo các bài thuyết trình cho sản phẩm và dịch vụ của mình.</p><p>✔️ Giúp các tổ chức giáo dục tạo bài giảng trực quan cho lớp học.</p><p>✔️ Sử dụng với mục đích cá nhân như lập bản đồ tư duy hay trình chiếu ảnh gia đình.</p><p>✔️ Tạo tài liệu bán hàng, tiếp thị.</p><p>✔️ Tạo bài trình bày trong những sự kiện như đám cưới, lễ kỷ niệm hay cuộc họp mặt gia đình.</p><p>✔️ Tạo bài thuyết trình cho các dự án, ngân sách và tài chính.</p><p>✔️ Tạo chứng chỉ, lịch, báo cáo, sơ đồ, biểu đồ cho bất kỳ ngành nào.</p><p>✔️ Bạn có thể tạo hầu hết mọi loại hình ảnh trong PowerPoint.</p><p><i><strong>Khóa học Trình chiếu chuyên nghiệp với PowerPoint có tại Unica.vn</strong></i></p><p>Khóa học được biên soạn bởi giảng viên <i><strong>Nguyễn&nbsp;Đức Thanh </strong></i>có 43 bài giảng, bao gồm 7 phần học chính như sau:</p><p>Phần 1: Giới thiệu tổng quan</p><p>Phần 2: Các thao tác cơ bản với slides và bài thuyết trình</p><p>Phần 3: Các thành phần của bài thuyết trình</p><p>Phần 4: Hiệu ứng trong PowerPoint</p><p>Phần 5: Thêm các thành phần đa phương tiện vào trong slides</p><p>Phần 6: Các thành phần điều khiển, slide master trong PowerPoint</p><p>Phần 7: Addin office mix tăng tính tương tác cho bài thuyết trình powerpoint</p><p>Khóa học sẽ giúp các học viên nắm được kiến thức cơ bản và nâng cao về cách sử dụng phần mềm PowerPoint, hoàn thiện kỹ năng làm bài thuyết trình và học thuyết trình online&nbsp;ở mức độ cơ bản tới&nbsp;nâng cao.&nbsp;</p><p>Nếu bạn muốn có một bài thuyết trình đầy ấn tượng và chuyên nghiệp thì hãy nhanh tay đăng ký khóa học <i><strong>Trình chiếu chuyên nghiệp với PowerPoint</strong></i> có trên Tiny Edukate nhé !</p>', 'CT13', 30, 0, 6, 1, '2022-10-15 08:21:37', '2022-10-15 10:48:16'),
(14, 'Làm chủ Word 2016 từ cơ bản đến nâng cao', 'lam-chu-word-2016-tu-co-ban-den-nang-cao', '<p><strong>Bạn sẽ học được gì</strong></p><p>Làm chủ phần mềm Word 2016 nhanh chóng và chi tiết nhất</p><p>Có thể áp dụng ngay vào công việc và học tập thi cử</p><p>Nắm được các bước xây dựng, soạn thảo&nbsp;văn bản và chỉnh sửa hợp lý và nhanh chóng, đúng quy trình.</p><p>Biết cách thiết kế, thiết lập văn bản, chỉnh sửa, bảo mật văn bản word dể ứng dụng vào hợp đồng, báo cáo,&nbsp;các tài liệu văn phòng, chứng từ cụ thể,...</p><p>Được trau dồi kiến thức nâng cao ứng dụng vào công việc thêm tối ưu và hiệu quả</p><p>Tự tin nâng cao trình độ để thi chứng chỉ tin học văn phòng</p><p><strong>Giới thiệu khóa học</strong></p><p>Microsoft Word đã trở nên vô cùng quen thuộc với tất cả mọi người, đặc biệt là đối với dân văn phòng và bất cứ công việc nào cần phải soạn thảo văn bản. Phát hành lần đầu tiên năm 1983, đến nay Word đã được cập nhật rất nhiều tính năng và công cụ thông minh mới, hỗ trợ ngày càng đắc lực cho người soạn thảo văn bản có được những bản word tốt nhất.</p><p>Cũng bởi có rất nhiều tính năng được cập nhật trong Microsoft Word mà không ít người vì đã quen sử dụng phiên bản cũ đã không bắt kịp tốc độ cập nhật của Word, dẫn đến khó khăn trong quá trình làm việc với công cụ soạn thảo này. Ngoài ra đối với những người mới tiếp xúc đến Word như sinh viên cũng sẽ khó mà ngay lập tức sử dụng tốt và thành thạo công cụ Word nếu không có một lộ trình học word cơ bản phù hợp và chi tiết.</p><p>Đó là lý do khóa học<i><strong>&nbsp;\"Làm chủ Word 2016 từ cơ bản đến nâng cao\"</strong></i>&nbsp;được ra đời!</p><p>Khóa học <i><strong>Làm chủ Word 2016 từ cơ bản đến nâng cao </strong></i>của&nbsp;giảng viên Đỗ Trung Thành phù hợp với tất cả các đối tượng, đặc biệt dành cho các bạn có nhu cầu học tin học văn phòng&nbsp;đặc biệt&nbsp;về Word từ những bước đi đầu tiên; những bạn cần nâng cao trình độ về công cụ tin học văn phòng; hay chuẩn bị thi các loại chứng chỉ tin học…&nbsp;</p><p>Khóa học gồm hơn 40 bài giảng bằng video, được xây dựng theo lộ trình từ cơ bản đến nâng cao về Word với phiên bản mới nhất hiện tại (Office 2016), với đầy đủ các nội dung:</p><p>- Cách định dạng văn bản</p><p>- Cách chèn và định dạng các đối tượng</p><p>- Các thiết lập cho văn bản</p><p>Với quan điểm \"Học đi đôi với hành\", trong từng nội dung của bài học sẽ có phần thực hành trực tiếp để học viên có thể hiểu và làm theo các hướng dẫn chi tiết của giảng viên.</p><p>Đặc biệt khi sở hữu khóa học trực tuyến tại Unica bạn sẽ nhận được những ưu đãi vô cùng đặc biệt chỉ có tại đây:</p><p>+ Mua một lần học MÃI MÃI</p><p>+ Không giới hạn thời gian học tập</p><p>+ Được hỗ trợ 24/7 từ đội ngũ chuyên viên nhiệt tình chuyên nghiệp</p><p>+ Cấp chứng nhận hoàn thành khóa học sau khi học xong tất cả</p><p>Đừng bỏ lỡ cơ hội sở hữu khóa học&nbsp;<i><strong>\"Làm chủ Word 2016 từ cơ bản đến nâng cao\"</strong></i>&nbsp;cùng với hàng loạt những ưu đãi lớn!</p>', 'CT14', 30, 0, 6, 1, '2022-10-15 08:38:21', '2022-10-15 08:38:21'),
(15, 'Thiết kế đồ hoạ 2D chuyên nghiệp với Adobe Illustrator', 'thiet-ke-do-hoa-2d-chuyen-nghiep-voi-adobe-illustrator', '<p><strong>Bạn sẽ học được gì</strong></p><p>Dễ dàng lên được ý tưởng thiết kế cho name card, logo, banner….</p><p>Biết cách phối màu hệ thống trong AI cho ra sản phẩm với màu sắc trung thực bắt mắt</p><p>Phóng to thu nhỏ kích thước mà không ảnh hưởng đến chất lượng hình ảnh</p><p>Hiểu rõ quy trình&nbsp;thiết kế:<strong> </strong>1.Ý tưởng &gt; 2.Thiết kế &gt; 3.Gửi khách hàng xem mẫu &gt; 4. Duyệt và xuất in</p><p>Hiểu ra cách quản lý thông số màu&nbsp;Hệ thống màu trong Ai&nbsp;&nbsp;từ đó đưa ra màu sắc trung thực nhất trên sản phẩm trong Ai</p><p>Phóng to và thu nhỏ kích thước sẽ không làm ảnh hưởng đến chất lượng&nbsp;&nbsp;File thiết kế trong Ai</p><p>Vẽ được các hình ảnh Vector in lên \" Decal - PP - Hiflex - Backlit film...\"&nbsp;</p><p>Tự tin ứng tuyển vào các vị trí thiết kế 2D tại các doanh nghiệp hoặc tự mở dịch vụ thiết kế - in ấn tại nhà với mức thu nhập tốt</p><p><strong>Giới thiệu khóa học</strong></p><p><i><strong>Quảng cáo và xu hướng thị trường quảng cáo 2D ngày nay</strong></i></p><p><i><strong>Quảng cáo</strong></i> ngày nay đang là xu hướng tiếp cận khách hàng nhanh và hiệu quả nhất đã có từ rất lâu đời. Cùng với sự phát triển của công nghệ số, các công cụ thiết kế ra đời đã nâng quảng cáo lên một tầm cao mới vượt trội phạm vi có thể trải khắp thế giới. Bạn sẽ nhìn thấy rõ nhất trong các&nbsp;siêu thị, trung tâm mua sắm, các buổi hội thảo hoặc trong các cuộc triễn lãm, hội chợ trưng bày sản phẩm. Các hình thức quảng cáo được hiện thực hóa bằng&nbsp;banner, poster, tờ gấp, backdrop, logo, card.... vô cùng ấn tượng và hấp dẫn dù chúng chỉ là 2D.</p><p>Việc có thể thiết kế nên một banner, hay poster 2D với sức hút khiến người nhìn&nbsp;\"yêu từ cái nhìn đầu tiên\" phụ thuộc rất nhiều vào tư duy thiết kế và cách bạn sử dụng công cụ thiết kế đó như thế nào.</p><p>Nếu trước đây bạn phải đi tìm những trung tâm học tập với chi phí đắt đỏ thì nay bạn chỉ cần có một lộ trình học thiết kế&nbsp;chi tiết, hiệu quả và đầy đủ, một giảng viên có nhiều kinh nghiệm trong nghề cùng với đội ngũ hỗ trợ 24/7 luôn sẵn sàng hỗ trợ và giải đáp mọi thắc mắc của bạn thì bạn vẫn hoàn toàn có thể trở thành một nhà thiết kế chuyên nghiệp ngay tại nhà!</p><p>Tham gia ngay khóa học trực tuyến <i><strong>\"Thiết kế đồ hoạ 2D chuyên nghiệp với Adobe Illustrator\" </strong></i>của giảng viên - chuyên gia đồ họa Nguyễn Đức Minh để hiện thực hóa mọi sự sáng tạo của bạn với công cụ thiết kế&nbsp;Adobe Illustrator.</p><p><i><strong>Khóa học có gì cho bạn?</strong></i></p><p><i><strong>&nbsp; &nbsp; &nbsp;✔️&nbsp;</strong></i>Những bí mật và tuyệt chiêu để bạn trở thành một Desgin tự do chuyên nghiệp.</p><p>&nbsp; &nbsp; &nbsp;✔️ Được cung cấp, bổ sung và trau dồi kiến thức về thiết kế, tư duy thiết kế và thao tác, kỹ thuật&nbsp;thực hiện thiết kế bằng Ai</p><p>&nbsp; &nbsp; &nbsp;✔️ Các nội dung học tập được phân chia thành các phần tương ứng để học viên nắm được tiến độ học tập của mình và nhanh chóng làm chủ được Ai</p><p>&nbsp; &nbsp; &nbsp;✔️ Rất nhiều bài tập thực hành thiết kế từ vẽ tay đến thiết kế bằng các tính năng trong Ai giúp học viên vừa nắm được lý thuyết vừa ứng dụng thực tế vào bài tập&nbsp;nhanh chóng..</p><p>Qua khóa học này, bạn hoàn toàn có thể tự mình lên ý tưởng và tự tay thiết kế Banner, Tờ gấp, Backdrop, Poster, Card, Logo, Banner Facebook, Banner Web.... một cách nhanh chóng, chuyên nghiệp và hấp dẫn;&nbsp;Đủ trình độ kỹ năng thiết kế hình ảnh quảng cáo trên các trang mạng xã hội, trang điện tử để tự kinh doanh, mở công ty quảng cáo, in ấn thiết kế đồ họa trên mọi chất liệu máy in Kỹ thuật số. Một nghề cực&nbsp;HOT và hái ra tiền rất nhiều!</p><p>Còn chờ đợi gì nữa, tham gia khóa học <i><strong>\"Thiết kế đồ hoạ 2D chuyên nghiệp với Adobe Illustrator\"&nbsp;</strong></i>ngay hôm nay thôi!</p>', 'CT15', 30, 0, 7, 1, '2022-10-15 08:40:22', '2022-10-15 08:40:22'),
(16, 'Học thiết kế đồ hoạ chuyên nghiệp với Photoshop', 'hoc-thiet-ke-do-hoa-chuyen-nghiep-voi-photoshop', '<p><strong>Bạn sẽ học được gì</strong></p><p>Sử dụng thành thao phần mềm photoshop</p><p>Nhanh chóng bổ sung, trau dồi, củng cố kiến thức và&nbsp;mở rộng hiểu biết cho bất cứ ai học khóa học thiết kế này</p><p>Sử dụng thành thạo phần mềm thiết kế chuyên nghiệp Illustrator</p><p>Nắm vững kiến thức về màu sắc, bố cục trong thiết kế</p><p>Hiểu được quy trình thiết kế sản phẩm</p><p>Tự tay tạo ra những sản phẩm sáng tạo tuyệt vời từ các ấn phẩm truyền thông, ảnh cưới&nbsp;cho tới các hình vẽ chuyên nghiệp...</p><p>Tăng thêm cơ hội về nghề nghiệp cũng như thu nhập để trở thành chuyên gia thiết kế mức lương 8 chữ số</p><p><strong>Giới thiệu khóa học</strong></p><h3><i><strong>Nếu bạn là...</strong></i></h3><ul><li>Người có đam mê thiết kế đồ họa, muốn trở thành nhà thiết kế đồ họa chuyên nghiệp, muốn học thiết kế, mở rộng hiểu biết &amp; phát triển kỹ năng</li><li>Nhà thiết kế quảng cáo, website, in ấn và truyền thông...</li><li>Nhiếp ảnh gia, chuyên viên chỉnh sửa ảnh tại các studio, ảnh viện áo cưới.</li><li>Và bất cứ ai đang đi tìm cho mình một hướng đi phát triển cả sáng tạo và thu nhập cao.</li><li>Bạn đang tìm kiếm một Khoá học đồ hoạ online phù hợp với yêu cầu cá nhân?</li></ul><p>vậy thì bạn nhất định không nên bỏ qua khóa học thiết kế đỉnh cao: \"<i><strong>Học thiết kế đồ hoạ chuyên nghiệp\"</strong></i>&nbsp;tại Unica!</p><p>Khóa học \"<i><strong>Học thiết kế đồ hoạ chuyên nghiệp\"</strong></i>&nbsp;do giảng viên Bùi Thanh Tùng hướng dẫn sẽ dẫn dắt bạn từ không biết hoặc mơ hồ về kiến thức dần tiếp thu và thực hành được một cách thực tế nhất các phần mềm thiết kế đồ họa,&nbsp;thành thạo xử lý hình ảnh, thiết kế với phần mềm Photoshop và Illustrator - bộ đôi công cụ thiết kế đỉnh caomaf bất cứ nhà thiết kế chuyên nghiệp nào cũng phải biết.</p><p>Phương thức giảng dạy chủ yếu là quay màn hình các thao tác thực hiện của giảng viên, vừa giảng dạy vừa thao tác trực tiếp, giúp bạn dễ hình dùng và làm theo. Giảng viên&nbsp;làm việc chuyên nghiệp và thực tế giúp bạn có&nbsp;được trải nghiệm chính xác nhất về môi trường&nbsp;làm việc.</p><h3><i><strong>Nội dung Khoá học đồ hoạ online cụ thể:</strong></i></h3><p><i>&nbsp; &nbsp; Phần 1: Chỉnh sửa hình ảnh chuyên nghiệp với Photoshop</i></p><p><i>&nbsp; &nbsp; Phần 2: Màu sắc trong photoshop</i></p><p><i>&nbsp; &nbsp; Phần 3: Chỉnh sửa hình ảnh và retouch</i></p><p><i>&nbsp; &nbsp; Phần 4: Tạo mockup và trải nghiệm video trong photoshop</i></p><p><i>&nbsp; &nbsp; Phần 5: Phần mềm thiết kế chuyên nghiệp Illustrator</i></p><p><i>&nbsp; &nbsp; Phần 6: Các công cụ thiết kế nâng cao trong illustrator</i></p><p><i>&nbsp; &nbsp; Phần 7: Hiểu tận gốc màu sắc trong thiết kế</i></p><p><i>&nbsp; &nbsp; Phần 8: Tư duy bố cục trong thiết kế</i></p><p><i>&nbsp; &nbsp; Phần 9: Các bước để thiết kế sản phẩm</i></p><p><i>&nbsp; &nbsp; hần 10: Xuất file in và đóng gói học liệu</i></p><p>Vậy còn chờ gì nữa, trở thành nhà thiết kế đỉnh cao ngay tại nhà với bộ đôi công cụ thiết kế Photoshop và Illustrator ngay hôm nay với một khóa học duy nhất&nbsp;\"<i><strong>Học thiết kế đồ hoạ chuyên nghiệp\"</strong></i></p>', 'CT16', 30, 0, 7, 1, '2022-10-15 08:42:02', '2022-10-15 08:42:02'),
(17, 'Học lập trình JAVASCRIPT', 'hoc-lap-trinh-javascript', '<p><strong>Bạn sẽ học được gì</strong></p><p>Nắm chắc kiến thức lập trình Javascript bài bản và đầy đủ nhất từ số 0</p><p>Tiếp xúc và thực hành ngay qua các bài tập thực tế tại các website hàng đầu như kenh14.vn, facebook.com</p><p>Nhanh chóng thành thạo các kỹ năng, thao tác làm việc với web bằng Javascript&nbsp;</p><p>Được tham khảo thêm nội dung bài học chi tiết phần TAB nội dung bài học để nắm được khóa học.</p><p>Biết cách ứng dụng cho lập trình back-end với các ngôn ngữ đang lên rất mạnh là React JS, NodeJS.</p><p>Có nền tảng vững chắc về Frontend và sớm trở thành một lập trình viên Frontend tự do chuyên nghiệp</p><p><strong>Giới thiệu khóa học</strong></p><p>Như các bạn cũng đã biết, khi học công nghệ thông tin nói chung và học về lập trình Frontend nói riêng thì bắt buộc bạn phải <i><strong>học Javascript</strong></i>, bởi một website thiếu Javascript thì sẽ trở nên cộc cằn, chức năng không đẹp và không thân thiện với người dùng. Vì vậy nếu không thật sự am hiểu về Javascript thì đó quả là một sai lầm và lạc hậu về công nghệ.</p><p>Với mong muốn trang bị những kiến thức cơ bản nhất liên quan đến lập trình và hỗ trợ học viên từ những bước đầu tiên khi làm quen với công việc lập trình, giảng viên <i><strong>Đặng Văn Lel</strong></i> hợp tác cùng Unica xuất bản khóa học “&nbsp;<i><strong>Học lập trình JAVASCRIPT&nbsp;</strong></i>”. Khóa học này là series tổng hợp các thủ thuật khi lập trình với Javascript, các thủ thuật này cũng có thể coi là các mẹo nhỏ giúp bạn xử lý code ngắn gọn và tối ưu hơn. Học viên có thể viết được các thư viện Javascript cho Website thay cho các thư viện có sẵn là jquery đang sử dụng.&nbsp;</p><p>Lộ trình khóa học có 18 bài giảng, tham gia khóa học này sẽ giúp bạn đặt những viên gạch đầu tiên trên con đường lập trình Website với những kiến thức căn bản nhất liên quan đến Javascript như: tạo chương trình Javascript đầu tiên, các vấn đề liên quan đến hàm hỗ trợ xử lý chuỗi, DOM và kỹ thuật thao túng nội dung trang HTML... Vì thế mà con đường trở thành lập trình viên thực thụ của bạn sẽ trở nên đơn giản hơn nhất nhiều.&nbsp;</p><p>Sau khi kết thúc khóa học này, bạn sẽ được làm việc với BIẾN và DOM, thiết lập môi trường chạy Javascript, làm việc với biến thành thạo, sử dụng linh hoạt toán tử, lệnh điều khiển trong vòng lặp, biết khai báo và sử dụng hàm trong Javascript.&nbsp;</p><p>Khác với các khóa <i><strong>học lập trình Javascript</strong></i> khác, nếu như bạn phải mất 1 - 2 tháng để học &nbsp;mới có thể hiểu hết được khía cạnh của nó thì với khóa học này, tất cả đã được tổng hợp lại kiến thức trong quá trình làm việc, và các giáo trình chuẩn quốc tế từ các nước như Mỹ, Úc, Ấn Độ, do đó bạn hoàn toàn có thể học ngôn ngữ lập trình và nắm rõ Javascript trong lòng bàn tay chỉ trong vòng 2-3 tuần học.</p><p>Đặc biệt với rất nhiều bài tập thực hành thực tế, chi tiết được kết hợp linh hoạt giữa các kiến thức lý thuyết các hiệu ứng từ các website nổi tiếng như Kenh14, Facebook để lập trình các chức năng tương tác với Frontend, ví dụ: giỏ hàng, các tính năng view ảnh, notification trên facebook... sẽ giúp học viên rất nhanh chóng làm quen và thành thạo Javascript thông qua những bài tập thực hành sát với thực tế nhất.</p><p>Thêm một điểm đặc biệt nữa của khóa học là ngoài việc tập trung xây dựng các kiến thức liên quan đến ngôn ngữ Javascript, giảng viên còn khéo léo đan xen những phần giải thuật cơ bản giúp học viên vừa có thể tự mình trang bị được kiến thức về Javascript vừa có kiến thức về lập trình cơ bản, từ đó tự tin nâng cao khả năng của bản thân khi làm việc với các ngôn ngữ lập trình khác nhau.&nbsp;</p><p>Khóa học được thiết kế để phù hợp với các đối tượng học viên là:<br>- Học viên &nbsp;mới tìm hiểu về lập trình, đặc biệt là mảng Frontend.<br>- Học viên đã và đang học Javascript nhưng chưa thành thạo<br>- Học viên có mong muốn trở thành một lập trình viên Frontend tự do chuyên nghiệp trong tương lai.&nbsp;<br>Với những kiến thức mà Unica đã chia sẻ về khóa học, vậy còn chờ đợi gì mà không nhanh tay đăng ký để có cơ hội sở hữu khóa học “<i><strong>Học lập trình Javascript</strong></i>” ngay hôm nay!&nbsp;</p>', 'CT17', 30, 0, 8, 1, '2022-10-15 08:45:50', '2022-10-15 08:45:50'),
(18, 'Lập Trình Python Từ Zero - Hero', 'lap-trinh-python-tu-zero-hero', '<p><strong>Bạn sẽ học được gì</strong></p><p>Kiến thức nền tảng nhất về ngôn ngữ lập trình Python cho đến ứng dụng Python nâng cao vào các tình huống thực tế</p><p>Tiếp cận làm việc và thực hành&nbsp;với Python từ con số 0</p><p>Nắm được các kiến thức có trong khóa học&nbsp;lập trình Python: biểu thức trong Python, đối tượng&nbsp;String,&nbsp;List, Tuples, Sets và Dictionary, hàm tự định nghĩa, module trong Python...&nbsp;</p><p>Xây dựng Website, Game, Application hoặc Automation bằng&nbsp;Python</p><p>Tự ôn tập và nâng cao kỹ năng lập trình Python với các bài tập và tình huống thực có trong quá trình làm việc của lập trình viên</p><p>Nhanh chóng thành thạo các thao tác làm việc và áp dụng vào công việc lập trình</p><p>Tự tin phỏng vấn vào các công ty, doanh nghiệp với mức lương cao</p><p><strong>Giới thiệu khóa học</strong></p><p>Thế giới ngày nay có rất rất nhiều ngôn ngữ lập trình được sử dụng phổ biến, trong đó phải kể đến các ngôn ngữ&nbsp;C++, C#, Java, Python,&nbsp;PHP,... Đặc biệt, Python đang là ngôn ngữ lập trình mà những người mới học công nghệ thông tin&nbsp;tìm học nhiều nhất. Cho đến nay những lập trình viên Python vẫn luôn được các nhà tuyển dụng tại các doanh nghiệp lớn nhỏ chiêu mộ với những ưu ái cực tốt với mức thu nhập xếp vào loại cao nhất.</p><p><i><strong>Những lý do bạn nên học Python bên cạnh các ngôn ngữ lập trình khác:&nbsp;</strong></i></p><p>✔️ Lý do 1: Python là ngôn ngữ mới và dễ học hơn bất kì ngôn ngữ nào</p><p>✔️ Lý do 2: Python là ngôn ngữ hàng đầu tại các đất nước trên thế giới nhất là Châu Âu. Và bạn cũng đã biết tương lai Việt Nam sẽ được hội nhập với các nước trên thế giới vậy cho nên nguồn lực cho mã nguồn Python là cực kì nhiều.Vì đa phần các nước châu Âu họ đều sài Python thay cho C.</p><p>✔️ Lý do 3: Python là ngôn ngữ giúp bạn viết được trên đa nền tảng nên ví dụ như lập trình website, lập trình di động và cả lập trình game thì Python đều có thể làm được.</p><p>✔️ Lý do 4: Đảm bảo đây là nội dung đầy đủ và kỹ càng nhất về ngôn ngữ lập trình Python để từ đó bạn có thể áp dụng Python vào các công việc bạn muốn hướng tới hoặc tạo thêm nhiều cơ hội việc làm cho bạn.</p><p>Hãy tham gia khóa học lập trình web trực tuyến&nbsp;<i><strong>\"Lập Trình Python Từ Zero - Hero\"</strong></i>&nbsp;của giảng viên Vũ Quốc Tuấn để nhanh chóng trở&nbsp;thành chuyên gia lập trình ngay tại khóa học Python này</p>', 'CT18', 30, 0, 8, 1, '2022-10-15 08:47:29', '2022-10-15 08:47:29'),
(19, 'Lập trình Java trong 4 tuần', 'lap-trinh-java-trong-4-tuan', '<p><strong>Bạn sẽ học được gì</strong></p><p>Cung cấp kiến thức toàn diện nhất về ngôn ngữ lập trình Java</p><p>Nền tảng lập trình Java để ứng dụng tính toán và xử lý dữ liệu&nbsp;trong Java</p><p>Có khả năng tiếp cận lập trình Android một cách dễ dàng</p><p>Có thể lập trình cơ sở dữ liệu&nbsp;</p><p>Viết phần mềm quản lí cho khách hàng bằng ngôn ngữ của Java</p><p>Học và rèn luyện hiệu quả thông qua rất nhiều bài tập rèn luyện để nâng cao kiến thức và kỹ năng lập trình Java hiệu quả</p>', 'CT19', 20, 12, 8, 1, '2022-10-15 08:48:58', '2022-10-15 20:48:20'),
(20, 'Microsoft Excel 2013', 'microsoft-excel-2013', '<p><strong>Bạn sẽ học được gì</strong></p><p>Kiến thức về các thủ thuật nâng cao trong Microsoft Excel 2013</p><p>Hàm tính toán - thống kê nâng cao, định dạng dữ liệu và ràng buộc dữ liệu nâng cao trong Excel 2013</p><p>Cách lên một bảng hệ thống thống kê số liệu, thông tin, sổ sách, kế toán... khoa học, nhanh chóng và hiệu quả</p><p>Ứng dụng Excel nâng cao để tự động hóa công việc tốt nhất</p><p>Tối ưu thời gian, bảo vệ dữ liệu và tăng năng suất công việc hơn lên gấp 5 lần</p><p>Ứng dụng thực tiễn các kiến thức vào công việc cụ thể trong cuộc sống, tính toán, thống kê</p><p><strong>Giới thiệu khóa học</strong></p><p>Microsoft Excel được coi là một trong những công cụ tin học văn phòng mạnh mẽ và phổ biến nhất toàn cầu hiện nay, bằng các công cụ và tính năng làm việc gần gũi với người dùng, Excel giúp người dùng thực hiện và tối ưu công việc một cách hiệu quả và năng suất nhất.</p><p>Theo thời gian nhu cầu tìm khóa học tin học văn phòng, công cụ Excel của người dùng ngày càng nhiều, đòi hỏi cao hơn những kiến thức phổ biến hiện nay. Và đó là lý do khóa học <i><strong>Microsoft Excel 2013 nâng cao</strong></i> được ra đời.</p><p>Khóa học <i><strong>Microsoft Excel 2013 nâng cao</strong></i> là khóa học chuyên sâu kiến thức và cách sử dụng các hàm công thức nâng cao trong công cụ tin học Excel phiên bản 2013 do giảng viên - chuyên gia đầu ngành Nguyễn Quang Vinh hướng dẫn. Đồng thời anh cũng là giảng viên đứng Top các từ khóa về đào tạo tin học trên Google, Youtube như: Đào tạo tin học AB, Đào tạo tin học A, Đào tạo tin học B, video tin học B văn phòng, …</p><p>Khóa học được phân tách thành các phần học cụ thể theo từng chức năng các hàm như Các thủ thuật nâng cao trong Excel, các kiểu định dạng hàm, ứng dụng hàm nâng cao vào công việc... giúp học viên có thể theo dõi và nắm được lộ trình học chi tiết và đầy đủ nhất.</p><p>Học viên sau khi hoàn thành khóa học sẽ có thể:</p><ul><li>Hướng dẫn ứng dụng Excel hiệu quả trong công việc. Tăng năng suất làm việc lên 5 lần nhờ việc rút gọn thời gian làm nhờ các quy tắc tự động của Excel.</li><li>Tự tay tạo lên hệ thống thống kê, sổ sách bằng Excel 2013 với số lượng sheet làm việc lớn thay thế cho các phần mềm quản lý phức tạp, chi phí cao.</li><li>Khóa học Excel Online giúp tìm hiểu và sử dụng các kiến thức nâng cao như bảo vệ nội dung, đặt tên – liên kết vùng dữ liệu, thành thạo conditional formatting</li><li>Lập biểu mẫu khoa học dễ hiểu, dễ tìm – tham chiếu dữ liệu, đồng thời học cách sử dụng hàm hợp lý tính toán nhanh.</li></ul><p>Đăng ký khóa học ngay hôm nay để gấp 5 hiệu suất công việc với khóa học <i><strong>Microsoft Excel 2013</strong></i></p>', 'CT20', 20, 19, 8, 1, '2022-10-15 08:51:30', '2022-10-21 05:19:10');

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
  `end_day` date DEFAULT NULL,
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

INSERT INTO `course_detail` (`id`, `course_code`, `instructor`, `lecture`, `duration`, `start_day`, `end_day`, `skill_level`, `language`, `price`, `image`, `created_at`, `updated_at`) VALUES
(7, 'CT11', 'Nguyễn Tấn Thanh', 41, '10', '2022-10-28', NULL, '0', 'HTML, CSS', 246000, 'html-va-css62.jpg', '2022-10-15 08:16:08', '2022-10-15 08:24:47'),
(8, 'CT12', 'Bá Ngọc Cương', 30, '12', '2022-10-31', NULL, '0', 'NodeJs', 699000, 'image-168-1024x57641.png', '2022-10-15 08:18:50', '2022-10-15 08:25:10'),
(9, 'CT13', 'Nguyễn Đức Thanh', 30, '8', '2022-10-31', NULL, '0', 'Không', 499000, 'unnamed61.png', '2022-10-15 08:21:37', '2022-10-15 08:25:00'),
(10, 'CT14', 'Đỗ Trung Thành', 43, '6', '2022-12-01', NULL, '0', 'Không', 399000, 'unnamed (1)18.png', '2022-10-15 08:38:21', '2022-10-15 08:38:21'),
(11, 'CT15', 'Nguyễn Đức Minh', 49, '12', '2022-10-31', NULL, '0', 'Không', 699000, 'AI-2022-196.jpg', '2022-10-15 08:40:22', '2022-10-15 08:40:22'),
(12, 'CT16', 'Bùi Thanh Tùng', 35, '10', '2022-10-25', NULL, '0', 'Không', 599000, '194.png', '2022-10-15 08:42:02', '2022-10-15 08:42:02'),
(13, 'CT17', 'Đặng Văn Lel', 18, '10', '2022-11-03', NULL, '0', 'Javascript', 599000, 'Moralis-Blogpost-JavaScript-Explained-07272021-V1234.png', '2022-10-15 08:45:50', '2022-10-15 08:45:50'),
(14, 'CT18', 'Vũ Quốc Tuấn', 89, '20', '2022-10-29', NULL, '0', 'Python', 799000, 'python-la-gi8.png', '2022-10-15 08:47:29', '2022-10-15 08:47:29'),
(15, 'CT19', 'Vũ Duy Thanh', 90, '20', '2022-10-26', NULL, '0', 'Java', 799000, '16-thang-4-1953.jpg', '2022-10-15 08:48:58', '2022-10-15 08:48:58'),
(16, 'CT20', 'Nguyễn Quang Vinh', 19, '4', '2022-10-19', '2022-11-16', '0', 'Không', 250000, 'excel-la-gi-tam-quan-trong-cua-excel-trong-cong-v-333.jpg', '2022-10-15 08:51:30', '2022-10-21 05:27:38');

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
(10, '2022-10-16', '15387000', '33');

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
(1, 'Tuyết Kỳ', 'Thật hữu ích với mọi người', '33497824_633795666973250_1315085180347613184_n-e1540892158500-150x15054.jpg', 11, 0, '2022-09-09 00:24:14', '2022-09-09 02:33:29'),
(2, 'Bảo Ngọc', 'Giảng viên tích cực giúp đỡ học viên trong vấn đề học tập', '25443034_1538624419591498_4978213829465901238_n-150x15074.jpg', 11, 1, '2022-09-09 00:29:38', '2022-09-09 02:33:37'),
(3, 'Thảo', 'Giảng viên tích cực giúp đỡ học viên trong vấn đề học tập', '44104229_2076448999333459_2495645426569445376_n-150x15076.jpg', 11, 1, '2022-09-09 02:24:41', '2022-09-09 02:24:41');

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
  `score` int(11) DEFAULT NULL,
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
(31, 'B1831', 'Tăng Quan Khải', 'khaib1823536@student.ctu.edu.vn', '0946684368', '2000-08-09', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:08:00', '2022-10-15 20:11:34'),
(32, 'B1832', 'Phùng Sơn Minh Khoa', 'khoab18237643@student.ctu.edu.vn', '0975893468', '2000-07-09', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:08:49', '2022-10-15 20:11:42'),
(33, 'B1833', 'Đào Thì Phương Thanh', 'thanhb18567395@student.ctu.edu.vn', '0954873658', '2000-09-08', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:09:57', '2022-10-15 20:11:57'),
(34, 'B1834', 'Văn Thùy Trâm', 'tramb1812335@student.ctu.edu.vn', '0976485614', '2000-08-04', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:11:12', '2022-10-15 20:12:11'),
(35, 'B1835', 'Phạm Thanh Danh', 'danhb187452@student.ctu.edu.vn', '0981237654', '2000-07-05', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:13:00', '2022-10-15 20:13:00'),
(36, 'B1836', 'Lư Huỳnh Công Khanh', 'khanhb1816734@student.ctu.edu.vn', '0975831256', '2000-02-28', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:14:13', '2022-10-15 20:14:13'),
(37, 'B1837', 'Lương Thanh Lan', 'Lanb1823753@student.ctu.edu.vn', '0985435675', '2000-02-04', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:14:52', '2022-10-15 20:14:52'),
(38, 'B1838', 'Nguyễn Thì Phương Linh', 'linhb1264562@student.ctu.edu.vn', '0957385632', '2000-03-04', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:16:07', '2022-10-15 20:16:07'),
(39, 'B1839', 'Trần Đoàn Bảo Thiên', 'thienb7548651@student.ctu.edu.vn', '0956839642', '2000-04-07', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:16:54', '2022-10-15 20:16:54'),
(40, 'B1840', 'Đào Quốc An', 'anb7569384@student.ctu.edu.vn', '0946372845', '2000-02-12', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:18:45', '2022-10-15 20:18:45'),
(41, 'B1841', 'Phan Duy Anh', 'anhb8754619@student.ctu.edu.vn', '094729543', '2000-02-22', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:20:38', '2022-10-15 20:20:38'),
(42, 'B1842', 'Liên Chí Bảo', 'baob7854219@student.ctu.edu.vn', '093447832', '2000-04-05', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:21:22', '2022-10-15 20:21:22'),
(43, 'B1843', 'Lê Duy', 'duyb7385432@student.ctu.edu.vn', '094325645', '2000-06-07', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:21:52', '2022-10-15 20:21:52'),
(44, 'B1844', 'Trần Bảo Duy', 'duyb4325343@student.ctu.edu.vn', '097423165', '2000-05-06', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:25:57', '2022-10-15 20:25:57'),
(45, 'B1845', 'Lâm Thái Hải Đăng', 'dangb4325731@student.ctu.edu.vn', '0946732812', '2000-04-30', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:27:33', '2022-10-15 20:27:33'),
(46, 'B1846', 'Nguyễn Hữu Đăng', 'dangb2552663@student.ctu.edu.vn', '0946371824', '2000-06-07', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:28:58', '2022-10-15 20:28:58'),
(47, 'B1847', 'Trần Bùi Lý Đức', 'ducb1364363@student.ctu.edu.vn', '09543532', '2000-04-05', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:29:50', '2022-10-15 20:29:50'),
(48, 'B1848', 'Dương Trung Hiền', 'hienb4325461@student.ctu.edu.vn', '054326532', '2000-05-06', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:30:59', '2022-10-15 20:30:59'),
(49, 'B1849', 'Huỳnh Văn Khôi', 'khoib1256547@student.ctu.edu.vn', '095432524', '2000-07-06', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:31:56', '2022-10-15 20:31:56'),
(50, 'B1850', 'Nguyễn Quốc Kiệt', 'kietb5432634@student.ctu.edu.vn', '095643674', '2000-05-05', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:33:33', '2022-10-15 20:33:33'),
(51, 'B1851', 'Tăng Lê Phi Long', 'longb1875433@student.ctu.edu.vn', '095432626', '2000-04-05', 'CT19', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:34:22', '2022-10-15 20:34:22'),
(52, 'B1852', 'Võ Ngọc Long', 'longb432522@student.ctu.edu.vn', '095432623', '2000-04-05', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:36:22', '2022-10-15 20:36:22'),
(53, 'B1853', 'Nguyễn Tấn Pil', 'pilb5435543@student.ctu.edu.vn', '0954326354', '2000-03-04', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:36:50', '2022-10-15 20:36:50'),
(54, 'B1854', 'Lê Đặng Ngọc Quyên', 'quyenb4325634@student.ctu.edu.vn', '095432654', '2000-04-05', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:37:33', '2022-10-15 20:37:33'),
(55, 'B1855', 'Nguyễn Thành Tâm', 'tamb4532564@student.ctu.edu.vn', '098543563', '2000-05-04', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:38:05', '2022-10-15 20:38:05'),
(56, 'B1856', 'Trần Hải Thịnh', 'thinhb4535224@student.ctu.edu.vn', '095432634', '2000-04-05', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:39:19', '2022-10-15 20:39:19'),
(57, 'B1857', 'Mai Hữu Thuận', 'thuanb436543@student.ctu.edu.vn', '0976573212', '2000-05-06', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:39:51', '2022-10-15 20:39:51'),
(58, 'B1858', 'Lê Phú Tuyền', 'tuyenb54365212@student.ctu.edu.vn', '0954326542', '2000-06-07', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:40:26', '2022-10-15 20:40:26'),
(59, 'B1859', 'Huỳnh Thu Uyên', 'uyenb432525@student.ctu.edu.vn', '095643624', '2000-06-07', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:41:48', '2022-10-15 20:41:48'),
(60, 'B1860', 'Phan Trịnh Minh Vinh', 'vinhb4325433@student.ctu.edu.vn', '0956465645', '2000-04-07', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:42:53', '2022-10-15 20:42:53'),
(61, 'B1861', 'Phạm Hoàng Phương Vy', 'vyb5435432@student.ctu.edu.vn', '0965465434', '2000-04-05', 'CT20', NULL, 1, '2022-10-16', NULL, NULL, NULL, '2022-10-15 20:43:56', '2022-10-15 20:43:56');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_date` (`registration_date`);

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
  ADD KEY `course_code` (`course_code`),
  ADD KEY `registration_date` (`registration_date`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
