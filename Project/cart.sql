-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 12:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci330`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) DEFAULT NULL,
  `Movie_Title` varchar(87) CHARACTER SET utf8 DEFAULT NULL,
  `Genres` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `Content_Rating` varchar(9) CHARACTER SET utf8 DEFAULT NULL,
  `Duration` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `Year` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `Director` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `IMDB_Link` varchar(52) CHARACTER SET utf8 DEFAULT NULL,
  `Critical_Rating` decimal(2,1) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `NumOrders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `Movie_Title`, `Genres`, `Content_Rating`, `Duration`, `Year`, `Director`, `IMDB_Link`, `Critical_Rating`, `Price`, `Stock`, `NumOrders`) VALUES
(1, 'Avatar ', 'Action|Adventure|Fantasy|Sci-Fi', 'PG-13', '178', '2009', 'James Cameron', 'http://www.imdb.com/title/tt0499549/?ref_=fn_tt_tt_1', '7.9', 20, 9, 0),
(2, 'Pirates of the Caribbean: At World\'s End ', 'Action|Adventure|Fantasy', 'PG-13', '169', '2007', 'Gore Verbinski', 'http://www.imdb.com/title/tt0449088/?ref_=fn_tt_tt_1', '7.1', 20, 7, 0),
(3, 'Spectre ', 'Action|Adventure|Thriller', 'PG-13', '148', '2015', 'Sam Mendes', 'http://www.imdb.com/title/tt2379713/?ref_=fn_tt_tt_1', '6.8', 15, 13, 0),
(4, 'The Dark Knight Rises ', 'Action|Thriller', 'PG-13', '164', '2012', 'Christopher Nolan', 'http://www.imdb.com/title/tt1345836/?ref_=fn_tt_tt_1', '8.5', 20, 13, 0),
(5, 'Star Wars: Episode VII - The Force Awakens             ', 'Documentary', 'N/A', 'N/A', 'N/A', 'Doug Walker', 'http://www.imdb.com/title/tt5289954/?ref_=fn_tt_tt_1', '7.1', 20, 18, 0),
(6, 'John Carter ', 'Action|Adventure|Sci-Fi', 'PG-13', '132', '2012', 'Andrew Stanton', 'http://www.imdb.com/title/tt0401729/?ref_=fn_tt_tt_1', '6.6', 15, 7, 0),
(7, 'Spider-Man 3 ', 'Action|Adventure|Romance', 'PG-13', '156', '2007', 'Sam Raimi', 'http://www.imdb.com/title/tt0413300/?ref_=fn_tt_tt_1', '6.2', 15, 13, 0),
(8, 'Tangled ', 'Adventure|Animation|Comedy|Family|Fantasy|Musical|Romance', 'PG', '100', '2010', 'Nathan Greno', 'http://www.imdb.com/title/tt0398286/?ref_=fn_tt_tt_1', '7.8', 20, 19, 0),
(9, 'Avengers: Age of Ultron ', 'Action|Adventure|Sci-Fi', 'PG-13', '141', '2015', 'Joss Whedon', 'http://www.imdb.com/title/tt2395427/?ref_=fn_tt_tt_1', '7.5', 20, 18, 0),
(10, 'Harry Potter and the Half-Blood Prince ', 'Adventure|Family|Fantasy|Mystery', 'PG', '153', '2009', 'David Yates', 'http://www.imdb.com/title/tt0417741/?ref_=fn_tt_tt_1', '7.5', 20, 15, 0),
(11, 'Batman v Superman: Dawn of Justice ', 'Action|Adventure|Sci-Fi', 'PG-13', '183', '2016', 'Zack Snyder', 'http://www.imdb.com/title/tt2975590/?ref_=fn_tt_tt_1', '6.9', 15, 8, 0),
(12, 'Superman Returns ', 'Action|Adventure|Sci-Fi', 'PG-13', '169', '2006', 'Bryan Singer', 'http://www.imdb.com/title/tt0348150/?ref_=fn_tt_tt_1', '6.1', 15, 12, 0),
(13, 'Quantum of Solace ', 'Action|Adventure', 'PG-13', '106', '2008', 'Marc Forster', 'http://www.imdb.com/title/tt0830515/?ref_=fn_tt_tt_1', '6.7', 15, 12, 0),
(14, 'Pirates of the Caribbean: Dead Man\'s Chest ', 'Action|Adventure|Fantasy', 'PG-13', '151', '2006', 'Gore Verbinski', 'http://www.imdb.com/title/tt0383574/?ref_=fn_tt_tt_1', '7.3', 20, 4, 0),
(15, 'The Lone Ranger ', 'Action|Adventure|Western', 'PG-13', '150', '2013', 'Gore Verbinski', 'http://www.imdb.com/title/tt1210819/?ref_=fn_tt_tt_1', '6.5', 15, 0, 0),
(16, 'The Shawshank Redemption ', 'Crime|Drama', 'R', '142', '1994', 'Frank Darabont', 'http://www.imdb.com/title/tt0111161/?ref_=fn_tt_tt_1', '9.3', 30, 16, 0),
(17, 'The Dark Knight Rises ', 'Action|Thriller', 'PG-13', '164', '2012', 'Christopher Nolan', 'http://www.imdb.com/title/tt1345836/?ref_=fn_tt_tt_1', '8.5', 20, 13, 0),
(18, 'Spirited Away', 'Adventure|Animation|Family|Fantasy', 'PG', '125', '2001', 'Hayao Miyazaki', 'http://www.imdb.com/title/tt0245429/?ref_=fn_tt_tt_1', '8.6', 30, 13, 0),
(19, 'Apocalypse Now', 'Drama|War', 'R', '289', '1979', 'Francis Ford Coppola', 'http://www.imdb.com/title/tt0078788/?ref_=fn_tt_tt_1', '8.5', 20, 11, 0),
(20, 'The Godfather: Part II', 'Crime|Drama', 'R', '220', '1974', 'Francis Ford Coppola', 'http://www.imdb.com/title/tt0071562/?ref_=fn_tt_tt_1', '9.0', 30, 15, 0),
(21, 'Fight Club', 'Drama', 'R', '151', '1999', 'David Fincher', 'http://www.imdb.com/title/tt0137523/?ref_=fn_tt_tt_1', '8.8', 30, 15, 0),
(22, 'The Lord of the Rings: The Two Towers', 'Action|Adventure|Drama|Fantasy', 'PG-13', '172', '2002', 'Peter Jackson', 'http://www.imdb.com/title/tt0167261/?ref_=fn_tt_tt_1', '8.7', 30, 1, 0),
(23, 'The Lord of the Rings: The Fellowship of the Ring', 'Action|Adventure|Drama|Fantasy', 'PG-13', '171', '2001', 'Peter Jackson', 'http://www.imdb.com/title/tt0120737/?ref_=fn_tt_tt_1', '8.8', 30, 10, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
