CREATE DATABASE `dbexo`;
USE `dbexo`;

CREATE TABLE `pengurus` (
  `idpengurus` int NOT NULL AUTO_INCREMENT,
  `namapengurus` varchar(50) NOT NULL,
  `pwd` varchar(12) NOT NULL,
  PRIMARY KEY (`idpengurus`)
);

CREATE TABLE `pengguna` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `emel` varchar(60) NOT NULL,
  `notel` varchar(11) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  PRIMARY KEY (`userid`)
);

CREATE TABLE `wayang` (
  `idwyg` int NOT NULL AUTO_INCREMENT,
  `tajuk` varchar(60) NOT NULL,
  `pengkelasan` varchar(5) NOT NULL,
  `sinopsis` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `hall` varchar(10) NOT NULL,
  `masatayangan` varchar(30) NOT NULL,
  `harga` double(5,2) NOT NULL,
  PRIMARY KEY (`idwyg`)
);

CREATE TABLE `tempahan` (
  `notetempahan` varchar(10) NOT NULL,
  `idwyg` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tarikhtayangan` date NOT NULL,
  `biljualan` int(2) NOT NULL,
  `jumbyrn` double(5,2) NOT NULL,
  PRIMARY KEY (`notetempahan`)
); 