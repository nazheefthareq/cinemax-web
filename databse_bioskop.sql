/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - bioskop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bioskop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `bioskop`;

/*Table structure for table `kursi` */

DROP TABLE IF EXISTS `kursi`;

CREATE TABLE `kursi` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `waktu_tayang_id` int(100) DEFAULT NULL,
  `nomor_kursi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `waktu_tayang_id` (`waktu_tayang_id`),
  CONSTRAINT `kursi_ibfk_1` FOREIGN KEY (`waktu_tayang_id`) REFERENCES `waktu_tayang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kursi` */

insert  into `kursi`(`id`,`waktu_tayang_id`,`nomor_kursi`) values 
(1,1,'A1'),
(2,1,'A2'),
(3,1,'A3'),
(4,1,'A4'),
(5,1,'A5'),
(6,1,'B1'),
(7,1,'B2'),
(8,2,'A1'),
(9,2,'A2'),
(10,2,'B1'),
(11,2,'B2'),
(12,3,'C1'),
(13,3,'C2'),
(14,3,'D1'),
(15,3,'D2'),
(16,4,'A1'),
(17,4,'A2'),
(18,4,'A3'),
(19,4,'A4'),
(20,4,'B1'),
(21,4,'B2'),
(22,5,'A1'),
(23,5,'A2'),
(24,5,'B1'),
(25,5,'B2'),
(26,5,'C1'),
(27,5,'C2'),
(28,5,'D1'),
(29,5,'D2'),
(30,6,'A1'),
(31,6,'A2'),
(32,6,'A3'),
(33,6,'A4'),
(34,6,'B1'),
(35,7,'B2'),
(36,7,'A1'),
(37,7,'A2'),
(38,7,'B1'),
(39,8,'B2'),
(40,8,'C1'),
(41,8,'C2'),
(42,8,'D1'),
(43,8,'D2'),
(44,9,'A1'),
(45,9,'A2'),
(46,9,'A3'),
(47,9,'A4'),
(48,9,'B1'),
(49,10,'B2'),
(50,10,'A1'),
(51,10,'A2'),
(52,10,'B1'),
(53,11,'B2'),
(54,11,'C1'),
(55,11,'C2'),
(56,11,'D1'),
(57,11,'D2');

/*Table structure for table `movie` */

DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `durasi` int(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `movie` */

insert  into `movie`(`id`,`judul`,`poster`,`deskripsi`,`durasi`,`rating`) values 
(1,'Detective Conan: Black Iron Submarine','upload/poster1.jpeg','Film ini mengikuti petualangan Conan dan teman-temannya setelah mendapat informasi tentang ancaman baru dari Organisasi Hitam. Mereka harus mengungkap misteri yang melibatkan teknologi canggih dan intrik yang menegangkan di tengah tantangan berbahaya.',1,'8/10'),
(2,'Black Clover: Sword of the Wizard King','upload/poster2.jpeg','Asta, seorang bocah yang terlahir tanpa sihir, dan rivalnya Yuno, seorang penyihir berbakat. Bersama, mereka melawan musuh-musuh kuat untuk meraih gelar \"Raja Sihir.\" Namun, sebuah ancaman datang dari Conrad Leto yang ingin menghancurkan Kerajaan Clover d',1,'8/10'),
(3,'Rascal Does Not Dream of a Sister Venturing Out ','upload/poster3.jpeg','Kisahnya mengikuti Kaede Azusagawa yang pulih dari amnesia setelah bantuan saudara dan teman-teman. Namun, ia harus menghadapi kekosongan ingatan dan ketakutan akan pandangan orang lain terhadap dirinya.',1,'7.5/10'),
(4,'Psycho-Pass Providence ','upload/poster4.jpeg','Kapal Kementerian Luar Negeri yang membawa Profesor Milicia Stronskaya diserang oleh Peacebreakers, sebuah kelompok paramiliter. Mereka mencari riset berharga, Stronskaya papers, yang memicu konflik dengan Shinya Kogami dan Inspector Akane Tsunemori, sala',2,'7.5/10'),
(5,'Gridman Universe','upload/poster5.jpeg','Cerita film berfokus pada Yūta, Rikka, dan Utsumi yang, setelah selesai menyelamatkan dunia, menghadapi tantangan kehidupan normal. Ingatan Yūta terhapus akibat pengaruh Gridman, namun aktivitas normal mereka cepat terganggu ketika kaiju tiba-tiba muncul ',1,'7.4/10');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `movie_id` int(100) DEFAULT NULL,
  `waktu_tayang_id` int(100) DEFAULT NULL,
  `kursi_id` int(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `waktu_tayang_id` (`waktu_tayang_id`),
  KEY `kursi_id` (`kursi_id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`waktu_tayang_id`) REFERENCES `waktu_tayang` (`id`),
  CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`kursi_id`) REFERENCES `kursi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `payment` */

insert  into `payment`(`id`,`movie_id`,`waktu_tayang_id`,`kursi_id`,`tanggal`) values 
(1,1,2,11,'2025-03-23 09:02:07'),
(2,1,1,4,'2025-03-23 09:06:43');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`password`) values 
(1,'Willy','willy123'),
(2,'Toriq','toriq123'),
(3,'Dewangga','dewangga123'),
(4,'Amel','amel123'),
(5,'Icha','numby123');

/*Table structure for table `waktu_tayang` */

DROP TABLE IF EXISTS `waktu_tayang`;

CREATE TABLE `waktu_tayang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `movie_id` int(100) DEFAULT NULL,
  `studio` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `waktu_tayang_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `waktu_tayang` */

insert  into `waktu_tayang`(`id`,`movie_id`,`studio`,`date`,`time`) values 
(1,1,'Studio 1','2025-03-25','14:00:00'),
(2,1,'Studio 2','2025-03-25','16:30:00'),
(3,2,'Studio 1','2025-03-26','18:00:00'),
(4,2,'Studio 3','2025-03-26','20:30:00'),
(5,3,'Studio 2','2025-03-27','15:00:00'),
(6,3,'Studio 1','2025-03-27','19:00:00'),
(7,4,'Studio 2','2025-03-27','20:30:00'),
(8,4,'Studio 1','2025-03-27','19:00:00'),
(9,5,'Studio 2','2025-03-27','15:00:00'),
(10,5,'Studio 1','2025-03-27','16:30:00'),
(11,5,'Studio 3','2025-03-27','20:30:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
