-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

CREATE DATABASE cms;
USE cms;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'bootstrap'),
(2, 'javascript'),
(3, 'PHP'),
(4, 'Python'),
(5, 'SQL'),
(6, 'Typescript');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(16) NOT NULL,
  `comment_post_id` int(16) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(64) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(16) NOT NULL,
  `in_response_to_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `in_response_to_id`) VALUES
(8, 1, '2021-08-10', 'robert', 'long@bottems.nz', 'he\'s from down under in his down unders', 'denied', 0),
(9, 1, '2021-08-10', 'myself', 'myemail@emailgeneric.co', 'here is another generic comment', 'approved', 1),
(10, 1, '2021-08-10', 'myself', 'myemail@emailgeneric.co', 'here is another generic comment', 'approved', 1),
(11, 1, '2021-08-10', 'randomNPC', 'no_reply@beepboop.biz', 'beep, bop, boop', 'approved', 1),
(12, 15, '2021-08-10', 'bob the fish', 'fishy@bob.com', 'this guy is very fishy', 'approved', 15),
(13, 17, '2021-08-19', 'somedude', 'somedude@somemail.go', 'example comment\r\n', 'approved', 17),
(15, 17, '2021-08-19', 'jose', 'jose@canyousee.la', 'this is some text', 'pending', 17),
(16, 15, '2021-08-21', 'bruce', 'almighty@godmail.god', 'does it increment?', 'approved', 15),
(17, 15, '2021-08-21', 'another_dude', 'dude@thismail.com', 'another comment, did it increment again?', 'approved', 15),
(18, 15, '2021-08-21', 'commenter', 'com@ment.com', 'here is a comment, is it refreshing?', 'approved', 15),
(21, 15, '2021-08-21', 'com', 'ment@com.com', 'compy com com', 'approved', 15),
(22, 16, '2021-08-27', 'Bob', 'bob@bob.com', 'this is a comment\r\n', 'approved', 16);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(16) NOT NULL,
  `post_cat_id` int(16) NOT NULL,
  `post_category` varchar(64) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(16) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_category`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, '', 'Creating a Twitter clone with HTML, CSS, and Javascript.', 'Bob Langsley', '', '2022-01-11', 'anton-chernyavskiy-8AiNrx44cEQ-unsplash (1).jpg', 'now it has some text.                                                                ', 'javascript, js, html, css, twitter, project, tutorial, bob, langsley, course, api, chat, social, media', 0, 'published', 0),
(16, 1, '', 'New one', 'Someone', '', '2022-01-11', 'rishi-mohan-IsSAx1usTIo-unsplash.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia?                 ', 'done', 5, 'published', 0),
(17, 4, '', 'another new one', 'someauthor', '', '2021-08-06', 'lalit-gupta-s3kayw3MtI4-unsplash.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? \r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio qui, cum incidunt ullam, possimus commodi numquam quisquam nulla eligendi expedita corrupti accusamus saepe consequatur, itaque iure autem dicta officia?         ', 'done, python', 4, 'derp', 0),
(19, 1, '', 'Bob Barker was a ladies man', 'bigladyfrom theaudience', '', '2022-01-11', 'david-clode-Gv-Cx3_clZ4-unsplash.jpg', '        Here she comes down the isle        ', 'javascript, php', 4, 'denied', 0),
(20, 1, '', 'Peanuts parading perilously', 'Mr. Peanut', '', '2022-01-11', 'anton-chernyavskiy-8AiNrx44cEQ-unsplash (1).jpg', 'fishy fish fishies        this has been edited                        ', 'Angular, peanuts, Mr. Peanut', 4, 'draft', 0),
(21, 1, '', 'asdfasdf', 'asdfasdfasd', '', '2021-08-11', 'david-clode-QK-wGoXoojA-unsplash.jpg', '        asdfasdfasdfafeqwf2', 'php', 4, 'asdfasdfasdfasdfas', 0),
(22, 1, '', 'Mikey is 31', 'mikey\'s brother', '', '2021-08-11', 'sara-kurfess-0LnSDQu5T5M-unsplash.jpg', 'he is getting so damn old    ', 'sql', 4, 'pending', 0),
(23, 1, '', 'Is it refreshing?', 'so refreshed', '', '2021-08-21', 'zhengtao-tang-V7SKRhXskv8-unsplash.jpg', 'this is content              adsfasdfasdf          ', 'fish, PHP, batman', 0, 'Approved', 0),
(26, 1, '', 'Tested Title', 'myself', '', '2021-08-30', 'zhengtao-tang-V7SKRhXskv8-unsplash.jpg', 'this is some content, blahahaha                                ', 'php', 0, 'denied', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_firstname` varchar(64) NOT NULL,
  `user_lastname` varchar(64) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(64) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL,
  `user_date` date NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(32) NOT NULL,
  `user_post_count` int(255) NOT NULL,
  `user_comment_count` varchar(32) NOT NULL,
  `user_views_count` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`, `user_date`, `user_status`, `user_post_count`, `user_comment_count`, `user_views_count`) VALUES
(3, 'Teemo', '123', 'teemo', 'mosburgs', 'teemo@angelhost.co', 'teemo.png', 'admin', '', '2021-08-22', 'approved', 3, '', 0),
(6, 'BobbyBarker', '123456', 'Robert', 'Barker', 'bigbob@bouncingbobs.com', 'lalit-gupta-s3kayw3MtI4-unsplash.jpg', 'author', '', '2021-08-22', 'approved', 0, '', 0),
(7, 'Liz', '12345', 'Lizbert', 'ferguson', 'fergy@turgy.net', 'teemo.png', 'author', '', '2021-08-23', 'approved', 0, '', 0),
(8, 'SomeGoober', '123', 'dude', 'perfect', 'perfect@dude.net', '', 'subscriber', '', '2021-08-30', 'approved', 0, '', 0),
(9, 'sumyunguy', '123', 'guy', 'fart', 'farting@guy.com', '', 'subscriber', '', '2021-08-30', 'approved', 0, '', 0),
(10, 'diditsave', '123', 'didit', 'idunno', 'farting@guy.com', '', 'subscriber', '', '2021-08-30', 'approved', 0, '', 0),
(11, 'denieddude', '123', 'hey', 'iamdenied', 'denied@deny.gov', 'anton-chernyavskiy-8AiNrx44cEQ-unsplash (1).jpg', 'Subscriber', '', '2021-08-30', 'approved', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
