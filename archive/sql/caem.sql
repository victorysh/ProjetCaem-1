-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2017 at 10:20 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caem`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caem_type_activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `caem_user`
--

CREATE TABLE `caem_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `familly_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caem_city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `famillies`
--

CREATE TABLE `famillies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formulae`
--

CREATE TABLE `formulae` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formula_activities`
--

CREATE TABLE `formula_activities` (
  `id` int(11) NOT NULL,
  `caem_activity_id` int(11) DEFAULT NULL,
  `caem_formula_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `caem_city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `caem_people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_activities`
--

CREATE TABLE `member_activities` (
  `id` int(11) NOT NULL,
  `caem_activity_id` int(11) DEFAULT NULL,
  `caem_people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL,
  `caem_type_payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments_details`
--

CREATE TABLE `payments_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `caem_activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments_people`
--

CREATE TABLE `payments_people` (
  `id` int(11) NOT NULL,
  `caem_payment_id` int(11) DEFAULT NULL,
  `caem_people_id` int(11) DEFAULT NULL,
  `caem_produit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `tel_fix` varchar(255) DEFAULT NULL,
  `tel_mob` varchar(255) DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `image_right` tinyint(1) NOT NULL,
  `observation` text,
  `caem_city_id` int(11) DEFAULT NULL,
  `caem_district_id` int(11) DEFAULT NULL,
  `caem_familly_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_instruments`
--

CREATE TABLE `people_instruments` (
  `id` int(11) NOT NULL,
  `caem_people_id` int(11) DEFAULT NULL,
  `caem_instrument_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_types_people`
--

CREATE TABLE `people_types_people` (
  `id` int(11) NOT NULL,
  `caem_people_id` int(11) NOT NULL,
  `caem_type_people_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person_people`
--

CREATE TABLE `person_people` (
  `id` int(11) NOT NULL,
  `caem_people_id` int(11) DEFAULT NULL,
  `caem_people_link_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plm_activities`
--

CREATE TABLE `plm_activities` (
  `id` int(11) NOT NULL,
  `hour_start` time NOT NULL,
  `hour_end` time NOT NULL,
  `date` date NOT NULL,
  `observation` text NOT NULL,
  `caem_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plm_activities_people`
--

CREATE TABLE `plm_activities_people` (
  `id` int(11) NOT NULL,
  `caem_plm_activity_id` int(11) DEFAULT NULL,
  `caem_member_activity_id` int(11) DEFAULT NULL,
  `caem_prof_activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `caem_activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers_activities`
--

CREATE TABLE `teachers_activities` (
  `id` int(11) NOT NULL,
  `caem_activity_id` int(11) DEFAULT NULL,
  `caem_people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types_activities`
--

CREATE TABLE `types_activities` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_payments`
--

CREATE TABLE `type_payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_people`
--

CREATE TABLE `type_people` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caem_people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_peoples`
--

CREATE TABLE `users_peoples` (
  `id` int(11) NOT NULL,
  `caem_user_id` int(11) DEFAULT NULL,
  `caem_people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_type_activite` (`caem_type_activity_id`);

--
-- Indexes for table `caem_user`
--
ALTER TABLE `caem_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_ville` (`caem_city_id`);

--
-- Indexes for table `famillies`
--
ALTER TABLE `famillies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `formulae`
--
ALTER TABLE `formulae`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formula_activities`
--
ALTER TABLE `formula_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_activite` (`caem_activity_id`),
  ADD KEY `ID_formule` (`caem_formula_id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_ville` (`caem_city_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_personne` (`caem_people_id`);

--
-- Indexes for table `member_activities`
--
ALTER TABLE `member_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_activite` (`caem_activity_id`),
  ADD KEY `ID_personne` (`caem_people_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`),
  ADD KEY `ID_type` (`caem_type_payment_id`);

--
-- Indexes for table `payments_details`
--
ALTER TABLE `payments_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_activite` (`caem_activity_id`);

--
-- Indexes for table `payments_people`
--
ALTER TABLE `payments_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_paiement` (`caem_payment_id`),
  ADD KEY `ID_personne` (`caem_people_id`),
  ADD KEY `ID_Produit` (`caem_produit_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_ville` (`caem_city_id`),
  ADD KEY `ID_quartier` (`caem_district_id`),
  ADD KEY `ID_famille` (`caem_familly_id`);

--
-- Indexes for table `people_instruments`
--
ALTER TABLE `people_instruments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_personne` (`caem_people_id`),
  ADD KEY `ID_instrument` (`caem_instrument_id`);

--
-- Indexes for table `people_types_people`
--
ALTER TABLE `people_types_people`
  ADD KEY `caem_people_id` (`caem_people_id`),
  ADD KEY `caem_type_people_id` (`caem_type_people_id`);

--
-- Indexes for table `person_people`
--
ALTER TABLE `person_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_personne` (`caem_people_id`),
  ADD KEY `ID_personne_rattache` (`caem_people_link_id`);

--
-- Indexes for table `plm_activities`
--
ALTER TABLE `plm_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_lieu` (`caem_location_id`);

--
-- Indexes for table `plm_activities_people`
--
ALTER TABLE `plm_activities_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_plm_activite` (`caem_plm_activity_id`),
  ADD KEY `ID_membre_activite` (`caem_member_activity_id`),
  ADD KEY `ID_prof_activite` (`caem_prof_activity_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_activite` (`caem_activity_id`);

--
-- Indexes for table `teachers_activities`
--
ALTER TABLE `teachers_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_activite` (`caem_activity_id`),
  ADD KEY `ID_personne` (`caem_people_id`);

--
-- Indexes for table `types_activities`
--
ALTER TABLE `types_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_payments`
--
ALTER TABLE `type_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_people`
--
ALTER TABLE `type_people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `ID_personne` (`caem_people_id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `users_peoples`
--
ALTER TABLE `users_peoples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caem_user_id` (`caem_user_id`),
  ADD KEY `caem_people_id` (`caem_people_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `caem_user`
--
ALTER TABLE `caem_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `famillies`
--
ALTER TABLE `famillies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `formulae`
--
ALTER TABLE `formulae`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `formula_activities`
--
ALTER TABLE `formula_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_activities`
--
ALTER TABLE `member_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments_details`
--
ALTER TABLE `payments_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments_people`
--
ALTER TABLE `payments_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `people_instruments`
--
ALTER TABLE `people_instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person_people`
--
ALTER TABLE `person_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plm_activities`
--
ALTER TABLE `plm_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plm_activities_people`
--
ALTER TABLE `plm_activities_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers_activities`
--
ALTER TABLE `teachers_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types_activities`
--
ALTER TABLE `types_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_payments`
--
ALTER TABLE `type_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_people`
--
ALTER TABLE `type_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_peoples`
--
ALTER TABLE `users_peoples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`caem_type_activity_id`) REFERENCES `types_activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`caem_city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `formula_activities`
--
ALTER TABLE `formula_activities`
  ADD CONSTRAINT `formula_activities_ibfk_1` FOREIGN KEY (`caem_activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `formula_activities_ibfk_2` FOREIGN KEY (`caem_formula_id`) REFERENCES `formulae` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`caem_city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_activities`
--
ALTER TABLE `member_activities`
  ADD CONSTRAINT `member_activities_ibfk_1` FOREIGN KEY (`caem_activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_activities_ibfk_2` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`caem_type_payment_id`) REFERENCES `type_payments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments_details`
--
ALTER TABLE `payments_details`
  ADD CONSTRAINT `payments_details_ibfk_1` FOREIGN KEY (`caem_activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments_people`
--
ALTER TABLE `payments_people`
  ADD CONSTRAINT `payments_people_ibfk_1` FOREIGN KEY (`caem_payment_id`) REFERENCES `payments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `payments_people_ibfk_2` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `payments_people_ibfk_3` FOREIGN KEY (`caem_produit_id`) REFERENCES `produits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`caem_city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `people_ibfk_2` FOREIGN KEY (`caem_district_id`) REFERENCES `districts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `people_ibfk_3` FOREIGN KEY (`caem_familly_id`) REFERENCES `famillies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `people_instruments`
--
ALTER TABLE `people_instruments`
  ADD CONSTRAINT `people_instruments_ibfk_1` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `people_instruments_ibfk_2` FOREIGN KEY (`caem_instrument_id`) REFERENCES `instruments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `people_types_people`
--
ALTER TABLE `people_types_people`
  ADD CONSTRAINT `people_types_people_ibfk_1` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `people_types_people_ibfk_2` FOREIGN KEY (`caem_type_people_id`) REFERENCES `type_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_people`
--
ALTER TABLE `person_people`
  ADD CONSTRAINT `person_people_ibfk_1` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `person_people_ibfk_2` FOREIGN KEY (`caem_people_link_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plm_activities`
--
ALTER TABLE `plm_activities`
  ADD CONSTRAINT `plm_activities_ibfk_1` FOREIGN KEY (`caem_location_id`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plm_activities_people`
--
ALTER TABLE `plm_activities_people`
  ADD CONSTRAINT `plm_activities_people_ibfk_1` FOREIGN KEY (`caem_plm_activity_id`) REFERENCES `plm_activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plm_activities_people_ibfk_2` FOREIGN KEY (`caem_member_activity_id`) REFERENCES `member_activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plm_activities_people_ibfk_3` FOREIGN KEY (`caem_prof_activity_id`) REFERENCES `teachers_activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`caem_activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teachers_activities`
--
ALTER TABLE `teachers_activities`
  ADD CONSTRAINT `teachers_activities_ibfk_1` FOREIGN KEY (`caem_activity_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `teachers_activities_ibfk_2` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `type_people`
--
ALTER TABLE `type_people`
  ADD CONSTRAINT `type_people_ibfk_1` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_peoples`
--
ALTER TABLE `users_peoples`
  ADD CONSTRAINT `users_peoples_ibfk_1` FOREIGN KEY (`caem_user_id`) REFERENCES `caem_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_peoples_ibfk_2` FOREIGN KEY (`caem_people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
