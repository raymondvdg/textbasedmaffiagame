SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `acctbl` (
  `IDMAFFIA` int(11) NOT NULL,
  `killskill` int(11) NOT NULL,
  `protection` int(11) NOT NULL,
  `lifehealth` int(11) NOT NULL,
  `thieving` int(11) NOT NULL,
  `drugs` int(11) NOT NULL,
  `familyID` int(11) NOT NULL,
  `fatique` int(11) NOT NULL,
  `weapons` int(11) NOT NULL,
  PRIMARY KEY (`IDMAFFIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `equiptbl` (
  `IDMAFFIA` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `itemID` int(11) NOT NULL,
  `equip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `familytbl` (
  `familyID` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(140) NOT NULL,
  `rank1` varchar(25) NOT NULL,
  `rank2` int(11) NOT NULL,
  `rank3` int(11) NOT NULL,
  `rank4` int(11) NOT NULL,
  `rank5` int(11) NOT NULL,
  `rank6` int(11) NOT NULL,
  `policeinfluence` int(11) NOT NULL,
  `armorboost` int(11) NOT NULL,
  `weaponboost` int(11) NOT NULL,
  `compspot1` int(11) NOT NULL,
  `compspot2` int(11) NOT NULL,
  `compspot3` int(11) NOT NULL,
  `compspot4` int(11) NOT NULL,
  `compspot5` int(11) NOT NULL,
  `compspot6` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `creationdate` date NOT NULL,
  PRIMARY KEY (`familyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `friendstbl` (
  `IDMAFFIA` int(11) NOT NULL,
  `IDFRIEND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `itemtbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `value` int(25) NOT NULL,
  `strength` int(25) NOT NULL,
  `accuracy` int(25) NOT NULL,
  `protection` int(25) NOT NULL,
  `requiredlvl` int(25) NOT NULL,
  `skill` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `usrtbl` (
  `IDMAFFIA` int(11) NOT NULL AUTO_INCREMENT,
  `nameMAFFIA` varchar(12) NOT NULL,
  `passMAFFIA` varchar(100) NOT NULL,
  `emailMAFFIA` varchar(25) NOT NULL,
  `ipMAFFIA` varchar(25) NOT NULL,
  `registerMAFFIA` varchar(25) NOT NULL,
  `lastloginMAFFIA` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`IDMAFFIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

CREATE TABLE IF NOT EXISTS `wealthtbl` (
  `IDMAFFIA` int(11) NOT NULL,
  `moneyInv` int(11) NOT NULL,
  `moneySafe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
