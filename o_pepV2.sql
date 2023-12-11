-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:5307
-- Generation Time: Dec 04, 2023 at 10:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `o'pep`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `textArticle` varchar(255) NOT NULL,
  `titreArticle` varchar(255) NOT NULL,
  `imageArticle` varchar(255) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articletag`
--

CREATE TABLE `articletag` (
  `idArticleTag` int(11) NOT NULL,
  `tagID` int(11) DEFAULT NULL,
  `ArticleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCateorie` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCateorie`) VALUES
(1, 'vivaces'),
(2, 'Arbres '),
(3, 'ornementales '),
(4, 'médicinales '),
(5, 'aquatiques '),
(7, 'aromatiques ');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `numCommande` int(11) NOT NULL,
  `idPivotfk` int(11) NOT NULL,
  `dateC` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `numCommande`, `idPivotfk`, `dateC`) VALUES
(1, 8278, 7, '2023-12-04'),
(2, 4445, 9, '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `textCommentaire` varchar(255) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`idPanier`, `idUser`) VALUES
(4, 28),
(15, 29),
(16, 30),
(17, 31),
(18, 32),
(19, 33),
(20, 34),
(21, 34),
(22, 35),
(23, 36),
(24, 37),
(25, 38),
(26, 39);

-- --------------------------------------------------------

--
-- Table structure for table `panierplante`
--

CREATE TABLE `panierplante` (
  `idPivot` int(11) NOT NULL,
  `plante_id` int(11) NOT NULL,
  `panier_id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panierplante`
--

INSERT INTO `panierplante` (`idPivot`, `plante_id`, `panier_id`, `quantite`, `status`) VALUES
(4, 36, 18, 1, 0),
(5, 24, 18, 1, 0),
(7, 32, 18, 1, 0),
(9, 14, 18, 2, 1),
(10, 25, 18, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plante`
--

CREATE TABLE `plante` (
  `idPlante` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prix` double NOT NULL,
  `image` text NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plante`
--

INSERT INTO `plante` (`idPlante`, `nom`, `prix`, `image`, `idCategorie`) VALUES
(14, 'Pivoine', 90, '../images/Échinacée.jpg', 1),
(24, 'aaaaa', 123, 'IMG-656d243c065413.37797324.png', 2),
(25, 'b', 13, 'IMG-65622e514be8f2.15108678.jpg', 1),
(26, '1d', 23, 'IMG-65622e5a324dd7.11738812.jpg', 1),
(27, 'qdwq', 1212, 'IMG-65623280533019.38072701.jpg', 3),
(29, 'xx312', 2, 'IMG-6562328e387360.42381116.jpg', 1),
(31, 'fdwe', 23, 'IMG-65625bd204c423.43908846.jpg', 4),
(32, 'pop', 23, 'IMG-6569ae35c9d242.24555617.jpg', 1),
(36, 'test', 213, 'IMG-6564601fc85251.94752618.jpg', 4),
(37, 'PQPPQ', 2323, 'IMG-6564762cd191d8.16509205.jpg', 1),
(39, 'asda', 321, 'IMG-6567a313eb06d8.67449868.jpg', 2),
(41, 'wew', 12, 'IMG-656d244c4d5266.57554353.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL CHECK (`type` in ('client','admin','superAdmin'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `type`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `textTag` varchar(255) NOT NULL,
  `themeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `idTheme` int(11) NOT NULL,
  `nomTheme` varchar(255) NOT NULL,
  `imageTheme` varchar(255) NOT NULL,
  `descriptionTheme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwordUser` varchar(255) DEFAULT NULL,
  `idRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `email`, `passwordUser`, `idRole`) VALUES
(1, 'soufiane', 'soufian.bouanani2013@gmai', '$2y$10$xkRTq9yLQZOMxDt1IDdY3uFEAaMUERMeMlMBHxazxGwSOwBbwzBey', NULL),
(2, 'soufiane', 'soufiane098@proton.me', '$2y$10$9DSnnp4F5XXE9O0s/jmrq.KDipACPpOhCIMuVPLU8sneAxmcg9Icy', 1),
(3, 'soufiane', 'soufiane098@proton.meww', '$2y$10$jWLsm7MB1nKLmfRNx0jbAuCst9sSLxoQWOP5aprrdPNSMmKqCCrni', 1),
(4, 'sanaa', 'sanaa@test.com', '$2y$10$YQ8R7nQ2nxQ24oNJ5bKBp.IS76xPCkmmhFAr6/28JMS57MLrIUMri', 1),
(5, 'dasdas', 'soufian.bouanani2013@gmai', '$2y$10$kCeQo5xTV.RdAbvc79K30.zFdfHgBA8yXvtSw86oxLOcu0el7Jn4q', 2),
(6, 'dasdas', 'soufian.bouanani2013@gmai', '$2y$10$xp7RznV41EflXueNWYU9fOwJ/SWN3mYeHgQ/wMIxUKmRTnDdqYP.u', 1),
(7, 'soufiane', 'soufiane098@proton.mes', '$2y$10$HhZY1xhGJVzklylaOYOV4uhp4JhnTgmHX88sGL5Ok69vO4Nc7FpPK', 2),
(8, 'soufiane', 'caveyik822@iucake.com', '$2y$10$gy04t2op0Faws3g7WfL/ZedCXM7NEYy9RF6W9AiUeY4IJ2exZ0zUO', 1),
(9, 'soufiane123', 'soufiane123@test.com', '$2y$10$IppiU.XAoOziUSVWqwZNeeKRTsD4ipCdxLB52nd8sRT2mbxd/j5ei', 2),
(10, 'soufiane', 'bouananisfn@gmail.coms', '$2y$10$WXhxNQcf2gBzte3qnCUCcOsLnc0edqZChXiU6WFuioxyhhqUk14/q', 1),
(11, 'soufiane', 'soufiane098@proton.mee', '$2y$10$/B9h0qwOgcLRsP6cRrmRIO7mpRIBgbgdaoKgLWU0cDNmfSnJRMTgW', NULL),
(12, 'soufiane', 'soufiane098@proton.meey', '$2y$10$dvcZJFS5Iy1.l4qE/d3yruDCv1gBK7XIklh2T.Oqa/mC4go1tOZ06', NULL),
(13, 'as', 'as@x.com', '$2y$10$zbCfRdnXggGrmq8cGLPfL.XHe3VebI8tawNyZQAELjx3T/Wx2tcca', 1),
(14, 'san3ae', 'ass@x.com', '$2y$10$7h5m3Wkh1JOSHKa3/M5GBepYXjgdPTvk9r9zXzpk11esFnG.oZ/8C', 1),
(15, 'da', 'asdasd@dijasd.com', '$2y$10$LQJvp/iP6gE1lnXkrljMXO/G89PKUj.Mu317v8MkCSSOoI5BYqm12', 1),
(16, 'iujnjnjk', 'soufiane098@proton.mea', '$2y$10$M8WlrySTkQIDzK0DUJDOwusEKEPX1Xj3mF49ogQaaPlKODpLfDyXS', 1),
(17, 'aaa', 'soufianeq098@proton.me', '$2y$10$Y8AWRP2GJndTN78bSP/rguu5HMl5jo0hQDaXUCj/AinWZjvTPfvee', 2),
(18, 'qwd', 'bouananisfn@gmail.com', '$2y$10$aanVUUeOoYJvgkiye0xl4uT3qAxVUYJAItICxCuNdaAgpaPelE0wG', 1),
(19, 'soufiane', 'soufiane@test.ma', '$2y$10$8nLmzjoDBafhNj9yZeNyMuEs60JYUB.H/nSUUkGuKqKyujcGqkOui', 2),
(20, 'soufiane', 'dasda@ads.com', '$2y$10$Zsv2FPB9u.yb.A5nZ526k.HXxydqQ/rs/9peuWJufEHcq6ctp0tgy', 1),
(21, 'soufiane', 'soufiaane098@proton.me', '$2y$10$NJONZcsSZ/1WFK4Swn7oGuzYXOaqSA6NRUGquqNIchdKlIA5Ryh2a', 1),
(22, 'soufiane098', 'ss98@proton.mee', '$2y$10$Q8A1nVSO.7E0qBbLgXIUlOa4.2so8EKcp9IqUvGmd.nN2Ql.gBFmq', 1),
(23, 'adasd', 'soufiassssne098@proton.me', '$2y$10$RSHcaAwwVpq44ggt9yf9Nelzo9qkA87yjJ9aHDVIzmsT0xXjIwbIa', 1),
(24, 'soufiane', 'soasdaufiane098@proton.me', '$2y$10$Yshm8WAPWGzIxJxGaKrXse58ZvlBhmfQ4xx2Ck6l7FK2f6XA8DDea', 2),
(25, 'soufiane', 'soufian.bossssssuanani201', '$2y$10$1jJ6RTWLSZTUESNW0nhVzePHXA35QoaPOKZU4XxbdfmrQY1zTm/Mu', 2),
(26, 'souf', 'soufisasdan.bouanani2013@', '$2y$10$E5e6pLT88OIcH3iNw.FNzeOny64OKZj8a0BaSVQZVHD8yduMjnyai', 2),
(27, 'dasd', 'qdqwd@ajdas.com', '$2y$10$H1/wneqELyhgWusVlDfI5upvYYOaZEnYwkd.HKhE0jizCG4vhQSxO', 2),
(28, 'sdasd', 'asdsadasdasd@dijasd.com', '$2y$10$2B8r.7Oc2Fb5aeXISx6uOO9e5bU6c4fb0noW4Cx/dTAx53Sj14Bj.', 2),
(29, 'sdasd', 'bouananisasdsasdfn@gmail.', '$2y$10$eL1LELT/jTqY7HdiAM1ysOcN.fzF4VDP4Q/NrWXIT21jRZBPDTMn6', 2),
(30, 'soufiane', 'soufiaSSSSSSSSSSSSSSSSSSSSSSSne098@proton.me', '$2y$10$cFG.iNfJ262F2LYamR8zTuMTqnJJJJqCZmrOgNhi6KIuxlgL2EBNK', 2),
(31, 'aaaaa', 'soufian.bosasxxuanani2013@gmail.com', '$2y$10$vwpEGbkCVwgT9UAfhN4c0.hx6SEkeRb8QdKKb.HEc3zXCCn.PgAMy', 2),
(32, 'soula', 'soula@gmail.com', '$2y$10$R80UzmP/flzgppsSseW3MOAmQttm.mOmOQ0AsHob7VWYwc0f/ZipG', 2),
(33, 'fsasf', 'bouanansfafdafaisfn@gmail.com', '$2y$10$9eY9.jObapNlCtjHV25yoecd.glsPNkJe/f6TMfSb0C0EUm.tC19q', 2),
(34, 'sdds', 'bouanansfafdafaisfns@gmail.com', '$2y$10$37Zu4RZ/ewoij/rouzbBYu7VUycbHU8mQ2Mx4fxjnZMB6RDkqIVju', 2),
(35, 'sdsad', 'soufiaasddasdasdasde098@proton.me', '$2y$10$ERVLbMabgK3fyLqM2Z30Te9SnplhpmAOm.8O5RVvJOjrajiXvL1eW', 2),
(36, 'dsadas', 'asa1dsadasdasd@dijasd.com', '$2y$10$Ow17UK1z9dUcKWbGbcSJjuI.uKQuwguGttNlcYJ7mT9gsykApwPxa', 2),
(37, 'asdasd', 'asdaa3sd@dijasd.com', '$2y$10$j0gz7PmqCwmzEQjR.syX3.U4juBa.ieVpyTM9WNd2PfUxI0mve6m2', 2),
(38, 'sadasd', 'bouanaasdccccfn@gmail.com', '$2y$10$/Qs1eHW6aNPKb.eG8Sjs1uzwD/xQZqSldTTH.coYlMNYmNDt/Lo4C', 2),
(39, 'soufiane', 'aaaaaaaaaouananisfn@gmail.com', '$2y$10$WCAO99hRBg3r/NgGW1JStOBjoaHZB3GJoFJ.JhUj72.mxeVu2J5PW', 2),
(40, 'osad', 'sousd398@proton.me', '$2y$10$NaUYd6m5VXwoyBAsSQBSTeVyDi0jL9pWUkulhMVLJpkaN2KyF.ylu', NULL),
(41, 'sadasd', 'soufoooo@proton.me', '$2y$10$9eiBC5usxUTIKz8nk.01auFjrf1MlCE9wB/6B/XAIm23TxZ0PTUxu', 1),
(42, 'czx65465', 'soufiane098@proton.messssss', '$2y$10$h9307z9rL2MHG.FaFH7ZdeEFCMCjiNFwd4CsPYc9gY9/gU.GEsBf6', NULL),
(43, 'szads', 'soufiane098@proton.messssssx', '$2y$10$7y/6R8wVSrt66eafI6HEVuvlMHJkEVlnSpJP1TiQUdTIsxW5T5uGu', 1),
(44, 'asas', 'soufiane@example.org', '$2y$10$lzpWBFMcYRMPeavqKPcwa.V8DJ2sq9GkdIqkdmYc3ZHGoukczxRtC', 2),
(45, 'dasd', 'bouanancccisfn@gmail.com', '$2y$10$liwrv3LfOMCRk0itRfx56u7SpV31UspIPRMeG2Fen2gaEyRgHp1Oy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `articletag`
--
ALTER TABLE `articletag`
  ADD PRIMARY KEY (`idArticleTag`),
  ADD KEY `tagID` (`tagID`),
  ADD KEY `ArticleID` (`ArticleID`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `pivotFK` (`idPivotfk`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `panierplante`
--
ALTER TABLE `panierplante`
  ADD PRIMARY KEY (`idPivot`),
  ADD KEY `plante_id` (`plante_id`),
  ADD KEY `panier_id` (`panier_id`);

--
-- Indexes for table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`idPlante`),
  ADD KEY `fk_categorie` (`idCategorie`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`),
  ADD KEY `themeFK` (`themeID`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`idTheme`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articletag`
--
ALTER TABLE `articletag`
  MODIFY `idArticleTag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `panierplante`
--
ALTER TABLE `panierplante`
  MODIFY `idPivot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plante`
--
ALTER TABLE `plante`
  MODIFY `idPlante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `idTheme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utilisateur` (`idUser`);

--
-- Constraints for table `articletag`
--
ALTER TABLE `articletag`
  ADD CONSTRAINT `articletag_ibfk_1` FOREIGN KEY (`tagID`) REFERENCES `tag` (`idTag`),
  ADD CONSTRAINT `articletag_ibfk_2` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`idArticle`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `pivotFK` FOREIGN KEY (`idPivotfk`) REFERENCES `panierplante` (`idPivot`) ON DELETE CASCADE;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utilisateur` (`idUser`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Constraints for table `panierplante`
--
ALTER TABLE `panierplante`
  ADD CONSTRAINT `panierplante_ibfk_1` FOREIGN KEY (`plante_id`) REFERENCES `plante` (`idPlante`),
  ADD CONSTRAINT `panierplante_ibfk_2` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`idPanier`);

--
-- Constraints for table `plante`
--
ALTER TABLE `plante`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE,
  ADD CONSTRAINT `plante_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `themeFK` FOREIGN KEY (`themeID`) REFERENCES `theme` (`idTheme`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
