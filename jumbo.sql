-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 11:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jumbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `Item` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Serial` varchar(255) NOT NULL,
  `Net_worth` varchar(255) NOT NULL,
  `P_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Department` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `Item`, `Model`, `Serial`, `Net_worth`, `P_date`, `Department`, `Status`) VALUES
(1, 'Desktop Computer', 'Hp 400', 'CDFR4325J', '35,000', '2022-11-07 21:00:00', 'Ict', 'Functional');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Id_number` int(11) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Residence` varchar(100) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `Loan_type` varchar(255) NOT NULL,
  `Req_amount` varchar(100) NOT NULL,
  `Pay_period` int(11) NOT NULL,
  `Pay_Schedule` varchar(100) NOT NULL,
  `App_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Guarantor1` varchar(255) NOT NULL,
  `G1_id` int(11) NOT NULL,
  `Guarantor2` varchar(255) NOT NULL,
  `G2_id` int(11) NOT NULL,
  `App_status` varchar(255) NOT NULL,
  `Disb_amount` varchar(255) NOT NULL,
  `Installment` varchar(255) NOT NULL,
  `Paid` int(11) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `Names`, `Id_number`, `Contact`, `Residence`, `Occupation`, `Loan_type`, `Req_amount`, `Pay_period`, `Pay_Schedule`, `App_date`, `Guarantor1`, `G1_id`, `Guarantor2`, `G2_id`, `App_status`, `Disb_amount`, `Installment`, `Paid`, `Balance`) VALUES
(1, 'Bernard Muli', 37078569, 798928733, 'Embu-dallas', 'Bussinessman', 'Biashara boost', '100,000', 12, 'Monthly', '2024-01-21 14:42:32', 'Admin admin', 12345678, 'Brandon Brandley', 6352410, 'Approved', '100000', '9416.67', 10000, 90000),
(2, 'Admin admin', 12345678, 712345678, 'Nairobi', 'Secretary', 'Salary Advance', '30,000', 2, 'Monthly', '2024-01-21 10:01:20', 'Bernard Muli', 37078569, 'Brandon Brandley', 6352410, 'Declined', '0', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Unq_number` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `M_no` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `Tax_pin` varchar(100) NOT NULL,
  `Kin` varchar(255) NOT NULL,
  `Kin_R` varchar(100) NOT NULL,
  `Kin_contact` int(12) NOT NULL,
  `M_image` longblob NOT NULL,
  `M_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `Names`, `Unq_number`, `email`, `M_no`, `DOB`, `Age`, `Telephone`, `gender`, `Tax_pin`, `Kin`, `Kin_R`, `Kin_contact`, `M_image`, `M_form`) VALUES
(1, 'Bernard Muli', 37078569, 'ben@embu.go.ke', '', '0000-00-00', 0, 798928733, 'Male', 'A00000000X', 'Lavender', '', 798928733, '', ''),
(2, 'Admin admin', 12345678, 'admin@gmail.com', '', '0000-00-00', 0, 712345678, 'Female', 'A00000001X', 'Administrator', '', 787654321, '', ''),
(3, 'Brandon Brandley', 6352410, 'info@gmail.com', '', '0000-00-00', 0, 736541278, 'Male', 'A000145756L', 'James Brandley', '', 725416387, '', ''),
(4, 'Jane  Doe', 14785296, 'Jdoe@gmail.com', 'JB#123', '1999-07-07', 25, 78546123, 'Female', 'A0124563S', 'John Doe', 'Husband', 2147483647, 0x494d472d32303234303231302d5741303035352e6a7067, 'OpticalPowerMeterData.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Interest_rate` varchar(255) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `Description`, `Interest_rate`, `Duration`, `Amount`) VALUES
(1, 'Salary Advance', 'Loan taken by members who use the Sacco account to receive their salary. It is taken within the month and deducted in the salary once he/she is paid by employer.', '1.5%', '1 Month', '5000'),
(2, 'Biashara boost', 'Loan taken by business enterprises and enterprenuers to boost and grow their business.', '13%', '12 Months', '50,000');

-- --------------------------------------------------------

--
-- Table structure for table `regfee`
--

CREATE TABLE `regfee` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Reference` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Mode` varchar(100) NOT NULL,
  `Reference` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `Names`, `Mode`, `Reference`, `Amount`, `CreatedBy`, `Date`) VALUES
(1, 'Admin admin', 'Mpesa', 'SAJ9GBAVKV', 16000, '', '0000-00-00 00:00:00'),
(2, 'Bernard Muli', 'Cash', 'CASH', 27000, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Mode` varchar(100) NOT NULL,
  `Reference` varchar(255) NOT NULL,
  `Shares` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Id_number` int(11) NOT NULL,
  `SDOB` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Telephone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `Tax_pin` varchar(255) NOT NULL,
  `E_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Designation` varchar(255) NOT NULL,
  `E_type` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `S_image` blob NOT NULL,
  `S_letter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `Names`, `email`, `Id_number`, `SDOB`, `Age`, `Telephone`, `gender`, `Tax_pin`, `E_date`, `Designation`, `E_type`, `Department`, `S_image`, `S_letter`) VALUES
(1, 'Samuel Nyachae', 'samnyachae@gmail.com', 87456321, '0000-00-00', 0, '072345678', 'Male', 'A00001478K', '2024-01-22 08:21:04', 'Driver', 'Contract', 'Operations', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Mode` varchar(255) NOT NULL,
  `Reference` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `Names`, `Mode`, `Reference`, `Amount`, `Date`, `Category`) VALUES
(2, 'Admin admin', 'Cash', 'CASH', '5,000', '2024-01-19 21:00:00', ' = Savings'),
(3, 'Admin admin', 'Bank', 'KCB0001', '2000', '2024-01-19 21:00:00', ' = Savings'),
(4, 'Bernard Muli', 'Cash', 'CASH', '10000', '2024-01-19 21:00:00', 'savings'),
(6, 'Bernard Muli', 'Cash', 'Cash', '10000', '2024-01-20 21:00:00', 'Loan Repayment'),
(7, 'Admin admin', 'Mpesa', 'SAHTF454R', '4000', '2024-01-21 21:00:00', 'savings');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `Names`, `Username`, `Email`, `Password`) VALUES
(1, 0, 'Administrator', 'Admin', 'Admin@gmail.com', 'Admin'),
(2, 0, 'Bernard', 'Ben', 'Benmuli54@gmail.com', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regfee`
--
ALTER TABLE `regfee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regfee`
--
ALTER TABLE `regfee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
