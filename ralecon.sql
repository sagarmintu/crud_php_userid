-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 07:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ralecon`
--

-- --------------------------------------------------------

--
-- Table structure for table `crudtable`
--

CREATE TABLE `crudtable` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crudtable`
--

INSERT INTO `crudtable` (`id`, `user_id`, `firstname`, `lastname`, `email`, `mobile`, `file`) VALUES
(1, 1, 'Sagar', 'Behera', 'sagarskbehera1996@gmail.com', '9632587419', ''),
(2, 1, 'prabhudutta', 'Rout', 'prabhu123@google.com', '9632587415', ''),
(3, 2, 'manish', 'chand', 'manish123@gmail.com', '7893214568', ''),
(4, 2, 'Rutuparna', 'Aanda', 'Rutu1999@gmail.com', '9632587418', ''),
(5, 3, 'Ritu', 'Das', 'ritudas123@yahoo.com', '9632587419', ''),
(6, 5, 'dfg', 'asdef', 'asd@gmail.com', '9632587419', ''),
(7, 4, 'Jaysmita', 'Dash', 'jaysmitadash123@google.com', '9871236540', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `cpassword`) VALUES
(1, 'Sagar Behera', 'mintu', 'sagar123@yahoo.com', '$2y$10$8TfSSFKo1au0t5P8Usza4O3Hoq7R6d4xZ9kWnW4qXTzdKJw2Y..ky', '$2y$10$7RkzUcM9r7suuN5nSkhLy.yaNL7eHKhnWt7EeXC3qu99krWaMnfFS'),
(2, 'Prabhudutta Rout', 'sipun', 'prbhu123@google.com', '$2y$10$lAuEt4aMU4ze5/IGa2qIBu84LW.5bv94h12.3kaqaDv6p8L9bu2Di', '$2y$10$O//96k5ZrY.ZCBoRmrmINeyFYv3/.Cw3TiUh0584QSoylJdStNlrW'),
(3, 'Rutuparna Panda', 'rutu', 'rutu12@yahoo.com', '$2y$10$3Ab9KLloFf14C20hUZ3NfOZ6uOOwtFU1euAPQnt30EsjMhcha8mnu', '$2y$10$3r0L4z4lhGOiRD7fof0JmeRVMtw3ZgS./iigCth16pUifnIvaqOT2'),
(4, 'Ritu Das', 'ritu', 'ritudas12@gmail.com', '$2y$10$1lxhFDUctm7ojsPQiPY3U.gFMI1UwsWLsJ7rZTVfbmJJwzUb9xrIq', '$2y$10$gmJeO2JdM.cO/gvoJ2xUGusDLIMjdpUFua2u0Jx1Wd4ddXSVyMUCu'),
(5, 'sidhant Ray', 'bunty', 'sidhant123@gmail.com', '$2y$10$DsOwH1gNiXL4vGIUJETalOdHOX9AmBWrBpAw3fgoE8ccAlFxg9LOC', '$2y$10$stc9op6QhkUCybm9RuVS5OhyogmkcNOdJ/vgBSdhmpDul1ArSARuG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crudtable`
--
ALTER TABLE `crudtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crudtable`
--
ALTER TABLE `crudtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
