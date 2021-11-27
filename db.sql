-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2021 at 02:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet5-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

DROP TABLE IF EXISTS `deleted_users`;
CREATE TABLE IF NOT EXISTS `deleted_users` (
  `login` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`login`, `email`, `password`, `is_admin`) VALUES
('ducon', 'du@con.fr', 'd9089f056712e0471d5338a63710330b3958920d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`) VALUES
('rb', 'Roll-A-Ball!'),
('ug-editor', 'UGE Editor'),
('pong', 'Pong');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

DROP TABLE IF EXISTS `project_images`;
CREATE TABLE IF NOT EXISTS `project_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` varchar(32) NOT NULL,
  `path` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `placement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `path`, `description`, `placement`) VALUES
(1, 'rb', 'img/rb/rb_splash.jpg', 'Something', 0),
(2, 'rb', 'img/rb/rb_mainmenu.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_paragraphs`
--

DROP TABLE IF EXISTS `project_paragraphs`;
CREATE TABLE IF NOT EXISTS `project_paragraphs` (
  `id` varchar(32) NOT NULL,
  `project_id` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `square_image` varchar(64) NOT NULL COMMENT 'This is the path of the square image that will show next to the paragraph.',
  `parallax_image` varchar(64) NOT NULL COMMENT 'This is the path to the parallax image that will be shown under the paragraph block.',
  `placement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_paragraphs`
--

INSERT INTO `project_paragraphs` (`id`, `project_id`, `title`, `content`, `square_image`, `parallax_image`, `placement`) VALUES
('desc', 'rb', 'Description', '<p>Roll-A-Ball! is a 3D platformer game driven by one crucial gameplay rule : you control a ball with your mouse. The faster you move your mouse, the faster the ball will roll.</p><p>The game is divided into many levels, each with a finish zone. The only goal is to complete all levels as quickly as possible.</p><p>This project was made by Noah during highschool.</p>', '', '', 0),
('history', 'rb', 'Development phases', '<p>The first version of Roll-A-Ball! Alpha was released in 2019. The game included basic levels made out of platforms, custom levels, challenges, etc...</p><p>Beta\'s major change was supposed to be the addition of a multiplayer mode, but the development of a correct networking API struggled for a long time. The last Beta version has not made it past the \"work-in-progress\" state and was originally scheduled for July 2020.</p><p>Past this date, development was abandoned.</p>', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
CREATE TABLE IF NOT EXISTS `team_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `picture_path` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `email`, `password`, `is_admin`) VALUES
('admin', 'random.dude@example.com', 'b80ac32edc1a3cdc9483d522be3f010f0e3f5b2f', 1),
('david73', 'nwiart@gaming.tech', '85f8e5ee55ed8f4ecab2fe9ba99109a1ae5ec4dd', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
