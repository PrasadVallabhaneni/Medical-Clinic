-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 03:52 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE IF NOT EXISTS `disease` (
  `Did` varchar(15) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `symptom` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `flag` int(10) NOT NULL,
  PRIMARY KEY (`Did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`Did`, `disease`, `symptom`, `type`, `flag`) VALUES
('10001', 'Coronary Artery Disease', 'shortness of breath,palpitations,faster heartbeat,weakness,nausea,sweating', 'Heart', 0),
('10002', 'Heart Attack', 'discomfort,pressure,heaviness,chest pain,discomfort,fullness,indigestion,sweating,nausea,extreme weakness,irregular heartbeat', 'Heart', 0),
('10003', 'Arrhythmias', 'palpitations,chest pounding,dizziness,shortness of breath,fainting', 'Heart', 0),
('10004', 'Heart Valve Disease', 'shortness of breath,weakness,dizziness,palpitations,irregular heartbeat', 'Heart', 0),
('10005', 'Pericarditis', 'sharp chest pain,low grade fever,increased heart rate', 'Heart', 0),
('10006', 'Osteoporosis', 'rounded upper back,height loss', 'Bone', 0),
('10007', 'Osteomyelitis', 'fever,rednedd over infected area,swelling,stiffness', 'Bone', 0),
('10008', 'Hypercalcemia', 'excessive thirst,excessive urination,nausea,abdominal pain,decreased appetite,constipation,weakness', 'Bone', 0),
('10009', 'Rickets', 'skeletal deformities,muscle cramps,bone fractures,impaired growth,tender bones,increased tooth cavities', 'Bone', 0),
('10010', 'Pagetâ€™s Disease', 'bone pain,joint stiffness,bone fractures,hearing loss,skeletal deformities', 'Bone', 0),
('10011', 'AIDS', 'fever,large tender lymph nodes,throat inflammation,headache,rashes', 'Infection', 0),
('10012', 'Amoebiasis', 'diarreah,severe dysentery', 'Infection', 0),
('10013', 'Pneumonia', 'fever,rigors,cough,runny nose,chest pain,shortness of breath', 'Infection', 0),
('10014', 'Diphtheria', 'chills,fatigue,bluish skin,coloration,sore throat,hoarseness,cough,headache,difficulty swallowing,painful swallowing,difficulty breathing', 'Infection', 0),
('10015', 'Dengue', 'fever,headache,joint pains,measel like rashes', 'Infection', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `did` varchar(15) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `address`, `mob`, `category`) VALUES
('101', 'Avadhut', 'borivali', '9167105523', 'Infection'),
('102', 'Seema', 'Pune', '9167109545', 'Bone'),
('103', 'Ram', 'mumbai', '9594686566', 'Heart'),
('104', 'Shrikant', 'goregaon', '9594686566', 'Heart');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `pid` varchar(15) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `feed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`pid`, `pname`, `feed`) VALUES
('101', 'amit', 'Nice system Prediction'),
('101', 'amit', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE IF NOT EXISTS `final` (
  `pid` varchar(15) NOT NULL,
  `sym` varchar(100) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`pid`, `sym`, `disease`, `type`, `date`) VALUES
('101', 'chest pain,fullness,increased heart rate', 'Heart Attack', 'Heart', '2017-04-01 09:29:00'),
('101', 'headache,rashes,fever', 'Dengue, \n', 'Infection, \n', '2017-04-01 09:30:00'),
('101', 'headache,joint pains', 'Dengue, \n', 'Infection, \n', '2017-04-01 09:30:00'),
('101', 'headache,fever', 'AIDS, \nDengue, \n', 'Infection, \nInfection, \n', '2017-04-01 09:31:00'),
('101', 'fever', 'Pericarditis, \nOsteomyelitis, \nAIDS, \nPneumonia, \nDengue, \n', 'Heart, \nBone, \nInfection, \nInfection, \nInfection, \n', '2017-04-01 09:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `word` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `pid` varchar(15) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `address`, `mob`, `user`, `pass`) VALUES
('101', 'amit', 'goregaon mumbai', '9167107564', 'amit', 'amit'),
('102', 'Esha', 'mumbai', '9756438945', 'esha', 'esha');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `disease` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
