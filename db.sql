-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2021 at 11:25 AM
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
-- Table structure for table `main_page`
--

DROP TABLE IF EXISTS `main_page`;
CREATE TABLE IF NOT EXISTS `main_page` (
  `parallax_path_0` varchar(64) NOT NULL,
  `parallax_path_1` varchar(64) NOT NULL,
  `ethan_description` text NOT NULL,
  `noah_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_page`
--

INSERT INTO `main_page` (`parallax_path_0`, `parallax_path_1`, `ethan_description`, `noah_description`) VALUES
('img/banner1.jpg', 'img/banner2.jpg', '<p>My name is Ethan Joachim Gabin and in this year 2021 I turned 18 years old.</p> <br><p>After having passed my first and terminal classes with mathematics and NSI specialties, I left high school with a minimum of computer knowledge.</p> <br><p>I am currently in Lyon in a specialized school in video games, the Gaming Campus, to train as a video game developer.</p> <br><p>This web page is a presentation of joint or personal projects. This website itself is also a project.</p>', '<p>My name is WIART Noah. I am currently 18 years old and I am studying at Gaming Campus in Lyon.</p> <br><p>I discovered computer programming when I was 11, and since then, I have learned C++ by myself.</p> <br><p>I worked on several personal projects while I was in school, notably on the game \"Roll-A-Ball!\". This game also runs using a custom game engine that I have made myself as well.</p> <br><p>These personal projects have allowed me to discover game programming and improve my knowledge on the used softwares and languages. I have also gained experience on the versioning software Git and on Unreal Engine 4.</p>');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `path`, `description`, `placement`) VALUES
(1, 'rb', 'img/rb/rb_splash.jpg', 'Something', 0),
(2, 'rb', 'img/rb/rb_mainmenu.jpg', '', 1),
(3, 'rb', 'img/rb/rb_levels.jpg', '', 2),
(4, 'rb', 'img/rb/rb_island.jpg', '', 3),
(5, 'rb', 'img/rb/rb_lava.jpg', '', 4),
(6, 'rb', 'img/rb/rb_freakout.jpg', '', 5),
(7, 'ug-editor', 'img/ug-editor/ed_mainwindow.png', '', 0),
(8, 'ug-editor', 'img/ug-editor/ed_openproject.png', '', 1),
(9, 'ug-editor', 'img/ug-editor/ed_aboutwindow.png', '', 2),
(10, 'pong', 'img/pong/pongtitle.png', '', 0),
(11, 'pong', 'img/pong/pong_zero.png', '', 1),
(12, 'pong', 'img/pong/pong_highscores.png', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_paragraphs`
--

DROP TABLE IF EXISTS `project_paragraphs`;
CREATE TABLE IF NOT EXISTS `project_paragraphs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paragraph_id` varchar(32) NOT NULL,
  `project_id` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `square_image` varchar(64) NOT NULL COMMENT 'This is the path of the square image that will show next to the paragraph.',
  `parallax_image` varchar(64) NOT NULL COMMENT 'This is the path to the parallax image that will be shown under the paragraph block.',
  `placement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_paragraphs`
--

INSERT INTO `project_paragraphs` (`id`, `paragraph_id`, `project_id`, `title`, `content`, `square_image`, `parallax_image`, `placement`) VALUES
(3, 'desc', 'rb', 'Description', '<p>Roll-A-Ball! is a 3D platformer game driven by one crucial gameplay rule : you control a ball with your mouse. The faster you move your mouse, the faster the ball will roll.</p><p>The game is divided into many levels, each with a finish zone. The only goal is to complete all levels as quickly as possible.</p><p>This project was made by Noah during highschool.</p>', '', '', 0),
(1, 'history', 'rb', 'Development phases', '<p>The first version of Roll-A-Ball! Alpha was released in 2019. The game included basic levels made out of platforms, custom levels, challenges, etc...</p><p>Beta\'s major change was supposed to be the addition of a multiplayer mode, but the development of a correct networking API struggled for a long time. The last Beta version has not made it past the \"work-in-progress\" state and was originally scheduled for July 2020.</p><p>Past this date, development was abandoned.</p>', '', '', 1),
(4, 'desc', 'ug-editor', 'Description', '<p>UGE Editor is a level designer for the Ultra Game Engine (UGE). It is currently in alpha and only bares the minimum of what a typical level editor can do.</p><p>UGE (or the \"Ultra Game Engine\") is a game engine project made by me (Noah). This project began near the end of middle school, and since, it kept growing with new features being added, slowly but surely.</p><p>The engine currently supports a world / entity / component system, a Direct3D 9 rendering engine, a physics engine relying on Havok Physics 2014, a sound system, as well as a class reflection system coupled with serialization.</p>', '', '', 0),
(5, 'features', 'ug-editor', 'Features', '<p>The current available features are listed below :</p><ul class=\"custom-list\"><li>A \"main\" window acting as the level editor, containing a viewport, an asset view and a list of all the entities in the current scene.</li><li>General level editing actions, such as placing, moving, renaming and deleting entities from the world.</li><li>A mesh \"importer\", which is able to convert FBX files to a proprietary 3D mesh format being UGM (UGE Mesh).</li><li>A \"Entity properties\" panel allowing to modify an entity\'s values. This uses UGE\'s reflection system.</li></ul>', '', '', 1),
(6, 'history', 'pong', 'History', '<p>Created by Allan Alcorn in 1972, Pong revolutionized the era of video games. During a project at Gaming Campus, we had to create our copy of the world\'s first arcade game. To find out how and what felt Allan Alcorn during the development, my teammate and me decided to recreate this famous game while adding our personal touch of course. So we recreated the original pong game with just new colors : a gray background, blue elements (racket, middle line), and a red ball.</p>', '', '', 0),
(7, 'dev_gameplay', 'pong', 'Development & Gameplay', '<p>Our version of Pong was made to run on Linux. It was programmed using the C language and with the help of the SDL2 windowing library.</p><p>A ball moves across the screen and bounces off the top and bottom edges. The two players control a racket, represented by a vertical line at the left and right sides of the court. The players move their racket vertically by using the assigned keyboard controls. If the ball hits the racket, it bounces back to the other player. If it misses the racket, the opponent scores a point.</p>', '', '', 0);

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
  `is_disabled` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `email`, `password`, `is_admin`, `is_disabled`) VALUES
('admin', 'random.dude@example.com', 'b80ac32edc1a3cdc9483d522be3f010f0e3f5b2f', 1, 0),
('david73', 'nwiart@gaming.tech', '85f8e5ee55ed8f4ecab2fe9ba99109a1ae5ec4dd', 0, 0),
('lgdsh', 'pfdpng@foindf.com', 'f12da8c2e4b05997897c91a54c062f3b5ce6e508', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
