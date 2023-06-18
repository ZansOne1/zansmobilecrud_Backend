/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 11.0.0-MariaDB-log : Database - db_ikanhias
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ikanhias` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_ikanhias`;

/*Table structure for table `tbl_ikan` */

DROP TABLE IF EXISTS `tbl_ikan`;

CREATE TABLE `tbl_ikan` (
  `id_ikan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ikan` varchar(20) NOT NULL,
  `nama_ikan` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_ikan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbl_ikan` */

insert  into `tbl_ikan`(`id_ikan`,`kode_ikan`,`nama_ikan`,`kategori`,`harga`) values 
(1,A0001,Arwana ,Big,500000),
(2,C001,Ikan Cupang,Big,500000),
(3,B001,Barakuda,Small,150000),
(6,P002,Lemon,Small,25000),
(7,N001,Nemo,Small,500000),
(8,Test002,Naga Palmas,Medium,300000),
(9,Cek001,Koi,Big,45000),
(10,A00002,Aligator,Big,2000000),
(11,A00003,Arapaima,Very Big,9999999999);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`iduser`,`password`,`username`,`email`) values 
(1,zans098932,$2y$10$T./PALi1OHGsDBEUT3hoOe4lmBD6vc4Ncr3zUqCYkx5kzv813zed6,zans01,zans@gmail.com);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
