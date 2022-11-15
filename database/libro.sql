-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 08:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libro`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `autores` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `autores`, `nacionalidad`) VALUES
(2, 'Alex Mirez', 'Venezuela'),
(3, 'Gabriel García Márquez', 'Colombia'),
(4, 'J.K Rowling', 'Reino Unido'),
(5, ' Rick Riordan', 'Estados Unidos'),
(6, 'Sebastian Fitzek', 'Alemania'),
(77, '', ''),
(78, '', ''),
(79, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id_libros` int(50) NOT NULL,
  `autores` varchar(200) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `categoria` varchar(1000) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `precio` varchar(30) NOT NULL,
  `id_autor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id_libros`, `autores`, `titulo`, `categoria`, `fecha`, `precio`, `id_autor`) VALUES
(10, 'Alex Mirez', 'Damian', 'Literatura Juvenil', '2022', '$8060', 2),
(11, 'Alex Mirez', 'Strange', 'Literatura Juvenil', '2021', '$4260', 2),
(12, 'Alex Mirez', 'Asfixia', 'Literatura Juvenil', '2018', '$5420', 2),
(13, 'Alex Mirez', 'Perfectos Mentirosos', 'Literatura Juvenil', '2021', '$3300', 2),
(14, 'Gabriel García Márquez', 'Crónica de una Muerte Anunciada', 'Ficción Urbana', '1981', '$4200', 3),
(15, 'Gabriel García Márquez', 'Cien Años de Soledad', 'Ficción Urbana', '1967', '$2650', 3),
(16, 'Gabriel García Márquez', 'Relato de un Náufrago', 'Ficción Urbana\r\n', '1955', '$2600', 3),
(17, 'J.K Rowling', 'Harry Potter y La Piedra Filosofal', 'Ficción Infantil', '1997', '$3100', 4),
(18, 'J.K Rowling', 'Harry Potter y La Cámara Secreta', 'Ficción Infantil', '1998', '$2300', 4),
(19, 'J.K Rowling', 'Harry Potter y El Prisionero de Azkaban', 'Ficción Infantil', '1999', '$2700', 4),
(20, 'J.K Rowling', 'Harry Potter y El Cáliz de Fuego', 'Ficción Infantil', '2000', '$3160', 4),
(21, 'J.K Rowling', 'Harry Potter y la Orden del Fénix ', 'Ficción Infantil', '2003', '$5000', 4),
(22, 'J.K Rowling', 'Harry Potter y El Misterio del Príncipe', 'Ficción Infantil', '2005', '$3400', 4),
(23, 'J.K Rowling', 'Harry Potter y Las Reliquias de la Muerte', 'Ficción Infantil', '2007', '$5400', 4),
(24, 'Rick Riordan', 'Percy Jackson Y El Ladrón del Rayo', 'Ficcion Infantil', '2005', '$3300', 5),
(25, 'Sebastian Fitzek', 'Terapia', 'Thriller/Suspense', '2006', '$3100', 6),
(26, 'Sebastian Fitzek', 'El Pasajero 23', 'Thriller/Suspense', '2014', '$4050', 6),
(82, '', '', '', '', '', 77);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'mai@admi.com', '$2a$12$SRq79vMbjhNkesbz1YLAo.uNASGQi9VAbOR6odiym9ejQqcHpOsJK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libros`),
  ADD KEY `fk_id_autor` (`id_autor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libros` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
