-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 30 Novembre 2015 à 09:02
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_limonade`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ddn_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel_mobile` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `courriel` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL,
  `promo` varchar(256) COLLATE utf8_bin NOT NULL,
  `libelle` varchar(256) COLLATE utf8_bin NOT NULL,
  `fichier` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=56 ;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id`, `rang`, `promo`, `libelle`, `fichier`) VALUES
(1, 5, 'CIR_BREST_A1', 'Intégration', 'A12/CIR1B_CIR1R_CSI1_Courrier-integration-1.pdf'),
(2, 5, 'CIR_RENNES_A1', 'Intégration', 'A12/CIR1B_CIR1R_CSI1_Courrier-integration-1.pdf'),
(3, 5, 'CSI_A1', 'Intégration', 'A12/CIR1B_CIR1R_CSI1_Courrier-integration-1.pdf'),
(4, 5, '', 'Offre banque BNP', 'BNP_Flyer_Rentree_2015.pdf'),
(5, 6, '', 'Offre banque CMB', 'CMB_Flyers_Rentree_2015.pdf'),
(6, 7, '', 'Offre banque Société Générale', 'SOCIETE GENERALE_Flyer_Rentree_2015.pdf'),
(7, 3, 'CSI_A1', 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable-2015-CSI-CIPA.pdf'),
(8, 3, 'CSI_A3', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable-2015-CSI-CIPA.pdf'),
(9, 2, 'CIPA_A3', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable-2015-CSI-CIPA.pdf'),
(10, 4, 'CSI_A1', 'Dossier ordinateur portable', 'A12/acquisitionPortable-2015-CSI-CIPA.pdf'),
(11, 4, 'CSI_A3', 'Dossier ordinateur portable', 'A345/acquisitionPortable-2015-CSI-CIPA.pdf'),
(12, 3, 'CIPA_A3', 'Dossier ordinateur portable', 'A345/acquisitionPortable-2015-CSI-CIPA.pdf'),
(13, 1, 'CIPA_A3', 'Calendrier CIPA3', 'A345/CIPA3Calendrier1516.pdf'),
(14, 1, 'CIPA_A4', 'Calendrier CIPA4', 'A345/CIPA4Calendrier1516.pdf'),
(15, 1, 'CIPA_A5', 'Calendrier CIPA5', 'A345/CIPA5Calendrier1516.pdf'),
(16, 1, 'CSI_A3', 'Calendrier CSI3', 'A345/CSI3Calendrier1516.pdf'),
(17, 1, 'CIR_A3_NONALT', 'Calendrier CIR3 non alternant', 'A345/CIR3nonAlternantCalendrier1516.pdf'),
(18, 3, 'CIR_A3_NONALT', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable-2015-CSI-CIPA.pdf'),
(19, 4, 'CIR_A3_NONALT', 'Dossier ordinateur portable', 'A345/acquisitionPortable-2015-CSI-CIPA.pdf'),
(20, 1, 'CIR_A3_ALT', 'Calendrier CIR3 alternant', 'A345/CIR3AlternantCalendrier1516.pdf'),
(21, 3, 'CIR_A3_ALT', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable-2015-CSI-CIPA.pdf'),
(22, 4, 'CIR_A3_ALT', 'Dossier ordinateur portable', 'A345/acquisitionPortable-2015-CSI-CIPA.pdf'),
(23, 1, 'M_A4', 'Calendrier M1', 'A345/M1Calendrier1516.pdf'),
(24, 3, 'M_A4', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable-2015-CSI-CIPA.pdf'),
(25, 4, 'M_A4', 'Dossier ordinateur portable', 'A345/acquisitionPortable-2015-CSI-CIPA.pdf'),
(26, 3, 'CIR_BREST_A1', 'Annonce ordinateur portable', 'A12/courrierAnnonce2015CIR1.pdf'),
(27, 4, 'CIR_BREST_A1', 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDisposition2015CIR1.pdf'),
(28, 3, 'CIR_RENNES_A1', 'Annonce ordinateur portable', 'A12/courrierAnnonce2015CIR1.pdf'),
(29, 4, 'CIR_RENNES_A1', 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDisposition2015CIR1.pdf'),
(30, 1, 'CSI_A1', 'Calendrier Classes Préparatoires', 'A12/CSI1_CSI2calendrier2015.2016.pdf'),
(31, 1, 'CSI_A2', 'Calendrier Classes Préparatoires', 'A12/CSI1_CSI2calendrier2015.2016.pdf'),
(32, 2, 'CSI_A1', 'Informations pratiques', 'A12/CSI1_CSI2infospratiques.pdf'),
(33, 2, 'CSI_A2', 'Informations pratiques', 'A12/CSI1_CSI2infospratiques.pdf'),
(34, 1, 'CIR_BREST_A1', 'Calendrier CIR', 'A12/CIR1_CIR2calendrier2015.2016.pdf'),
(35, 2, 'CIR_BREST_A1', 'Informations pratiques', 'A12/CIR1_CIR2infospratiques.pdf'),
(36, 1, 'CIR_RENNES_A1', 'Calendrier CIR', 'A12/CIR1_CIR2calendrier2015.2016.pdf'),
(37, 2, 'CIR_RENNES_A1', 'Informations pratiques', 'A12/CIR1_CIR2infospratiques.pdf'),
(38, 1, 'CIR_BREST_A2', 'Calendrier CIR', 'A12/CIR1_CIR2calendrier2015.2016.pdf'),
(39, 2, 'CIR_BREST_A2', 'Informations pratiques', 'A12/CIR1_CIR2infospratiques.pdf'),
(40, 1, 'CIR_RENNES_A2', 'Calendrier CIR', 'A12/CIR1_CIR2calendrier2015.2016.pdf'),
(41, 2, 'CIR_RENNES_A2', 'Informations pratiques', 'A12/CIR1_CIR2infospratiques.pdf'),
(42, 1, 'BTSPREPA_A1', 'Calendrier BTS PREPA', 'A12/BTS1_BTS2Brestcalendrier2015.2016.pdf'),
(43, 1, 'BTSPREPA_A2', 'Calendrier BTS PREPA', 'A12/BTS1_BTS2Brestcalendrier2015.2016.pdf'),
(44, 2, '', 'Sécurité Sociale étudiante mode d''emploi', 'mode_emploi_secu_sociale_15-16.pdf'),
(45, 4, '', 'SMEBA', 'SMEBA.pdf'),
(46, 1, 'M_A5_ALT', 'Calendrier M2 alternant', 'A345/M2AlternantCalendrier1516.pdf'),
(47, 1, 'M_A5_NONALT', 'Calendrier M2 non alternant', 'A345/M2nonAlternantCalendrier1516.pdf'),
(48, 1, '', 'Dates des rentrées à l''ISEN', 'Calendriersrentree1516.pdf'),
(49, 2, 'CSI_A3', 'Informations pratiques', 'A345/rentreepratiqueinge1516.pdf'),
(50, 2, 'CIR_A3_NONALT', 'Informations pratiques', 'A345/rentreepratiqueinge1516.pdf'),
(51, 2, 'CIR_A3_ALT', 'Informations pratiques', 'A345/rentreepratiqueinge1516.pdf'),
(52, 2, 'M_A4', 'Informations pratiques', 'A345/rentreepratiqueinge1516.pdf'),
(53, 2, 'M_A5_ALT', 'Informations pratiques', 'A345/rentreepratiqueinge1516.pdf'),
(54, 2, 'M_A5_NONALT', 'Informations pratiques', 'A345/rentreepratiqueinge1516.pdf'),
(55, 3, '', 'LMDE', 'LMDE.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `libelle` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `promotions`
--

INSERT INTO `promotions` (`id`, `libelle`) VALUES
('BTSPREPA_A1', '1&#x02B3;&#x1D49; année, BTS Prépa'),
('BTSPREPA_A2', '2&#x1D49; année, BTS Prépa'),
('CIPA_A3', '3&#x1D49; année, Cycle Ingénieur Par l''Apprentissage'),
('CIPA_A4', '4&#x1D49; année, Cycle Ingénieur Par l''Apprentissage'),
('CIPA_A5', '5&#x1D49; année, Cycle Ingénieur Par l''Apprentissage'),
('CIR_A3_ALT', '3&#x1D49; année, Cycle Informatique et Réseaux (alternant)'),
('CIR_A3_NONALT', '3&#x1D49; année, Cycle Informatique et Réseaux (non alternant)'),
('CIR_BREST_A1', '1&#x02B3;&#x1D49; année, Cycle Informatique et Réseaux (Brest)'),
('CIR_BREST_A2', '2&#x1D49; année, Cycle Informatique et Réseaux (Brest)'),
('CIR_RENNES_A1', '1&#x02B3;&#x1D49; année, Cycle Informatique et Réseaux (Rennes)'),
('CIR_RENNES_A2', '2&#x1D49; année, Cycle Informatique et Réseaux (Rennes)'),
('CSI_A1', '1&#x02B3;&#x1D49; année, Cycle Sciences de l''Ingénieur'),
('CSI_A2', '2&#x1D49; année, Cycle Sciences de l''Ingénieur'),
('CSI_A3', '3&#x1D49; année, Cycle Sciences de l''Ingénieur'),
('M_A4', '4&#x1D49; année, Majeure - M1'),
('M_A5_ALT', '5&#x1D49; année, Majeure - M2 (alternant)'),
('M_A5_NONALT', '5&#x1D49; année, Majeure - M2 (non alternant)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
