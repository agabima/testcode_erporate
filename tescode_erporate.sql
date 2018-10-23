/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.19-MariaDB : Database - tescode_erporate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tescode_erporate` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tescode_erporate`;

/*Table structure for table `hakuser` */

DROP TABLE IF EXISTS `hakuser`;

CREATE TABLE `hakuser` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `namauser` char(20) NOT NULL,
  `hak` char(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

/*Data for the table `hakuser` */

insert  into `hakuser`(`idx`,`namauser`,`hak`,`status`) values (1,'admin','loper',1),(2,'admin','toper',1),(3,'admin','uoper',1),(4,'','hoper',1),(81,'admin','hoper',1),(82,'admin','lbarang',0),(83,'admin','tbarang',0),(84,'admin','ubarang',0),(85,'admin','hbarang',0),(86,'admin','lsupp',0),(87,'admin','tsupp',0),(88,'admin','usupp',0),(89,'admin','hsupp',0),(90,'admin','lcus',0),(91,'admin','tcus',0),(92,'admin','ucus',0),(93,'admin','hcus',0),(94,'admin','lpem',0),(95,'admin','tpem',0),(96,'admin','upem',0),(97,'admin','hpem',0),(98,'admin','lpen',0),(99,'admin','tpen',0),(100,'admin','upen',0),(101,'admin','hpen',0),(102,'admin','hmak',1),(103,'admin','umak',1),(104,'admin','tmak',1),(105,'admin','lmak',1),(106,'admin','hmin',1),(107,'admin','umin',1),(108,'admin','tmin',1),(109,'admin','lmin',1),(110,'admin','hpesanan',1),(111,'admin','upesanan',1),(112,'admin','tpesanan',1),(113,'admin','lpesanan',1),(114,'kasir','loper',0),(115,'kasir','toper',0),(116,'kasir','uoper',0),(117,'kasir','hoper',0),(118,'kasir','hmak',0),(119,'kasir','umak',0),(120,'kasir','tmak',0),(121,'kasir','lmak',0),(122,'kasir','hmin',0),(123,'kasir','umin',0),(124,'kasir','tmin',0),(125,'kasir','lmin',0),(126,'kasir','hpesanan',1),(127,'kasir','upesanan',1),(128,'kasir','tpesanan',1),(129,'kasir','lpesanan',1);

/*Table structure for table `listhak` */

DROP TABLE IF EXISTS `listhak`;

CREATE TABLE `listhak` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idhak` char(10) NOT NULL,
  `namahak` char(40) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

/*Data for the table `listhak` */

insert  into `listhak`(`idx`,`idhak`,`namahak`) values (1,'loper','List User'),(2,'toper','User > Tambah'),(3,'uoper','User > Ubah'),(4,'hoper','User > Hapus'),(5,'hmak','Makanan > Hapus'),(6,'umak','Makanan > Ubah'),(7,'tmak','Makanan > Tambah'),(8,'lmak','List Makanan'),(9,'hmin','Minuman > Hapus'),(10,'umin','Minuman > Ubah'),(11,'tmin','Minuman > Tambah'),(12,'lmin','List Minuman'),(13,'hpesanan','Pesanan > Hapus'),(14,'upesanan','Pesanan > Ubah'),(15,'tpesanan','Pesanan > Tambah'),(16,'lpesanan','List > Pesanan');

/*Table structure for table `makanan` */

DROP TABLE IF EXISTS `makanan`;

CREATE TABLE `makanan` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `makanan` varchar(200) DEFAULT NULL,
  `harga_makanan` double DEFAULT NULL,
  `tglupdate` date DEFAULT NULL,
  `opupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `makanan` */

insert  into `makanan`(`idx`,`makanan`,`harga_makanan`,`tglupdate`,`opupdate`) values (1,'Nasi Goreng',15000,'2018-10-23','admin'),(2,'Bakso',20000,'2018-10-23','admin');

/*Table structure for table `minuman` */

DROP TABLE IF EXISTS `minuman`;

CREATE TABLE `minuman` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `minuman` varchar(50) DEFAULT NULL,
  `harga_minuman` double DEFAULT NULL,
  `tglupdate` date DEFAULT NULL,
  `opupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `minuman` */

insert  into `minuman`(`idx`,`minuman`,`harga_minuman`,`tglupdate`,`opupdate`) values (1,'Es Teh',3000,'2018-10-23','admin'),(2,'Lemon Tea',5000,'2018-10-23','admin');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `tglpesan` date DEFAULT NULL,
  `nopesanan` char(50) DEFAULT NULL,
  `idmakanan` int(11) DEFAULT NULL,
  `idminuman` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `statuspesanan` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `tglupdate` date DEFAULT NULL,
  `opupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`idx`,`tglpesan`,`nopesanan`,`idmakanan`,`idminuman`,`jumlah`,`statuspesanan`,`tglupdate`,`opupdate`) values (1,'2018-10-23','ERP23102018-001',1,1,50000,'Aktif','2018-10-23','admin');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tglupdate` date DEFAULT NULL,
  `waktuupdate` time DEFAULT NULL,
  `opupdate` varchar(50) DEFAULT NULL,
  `status` enum('Aktif') DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`idx`,`username`,`nama`,`jabatan`,`password`,`tglupdate`,`waktuupdate`,`opupdate`,`status`) values (1,'admin','Admin','Manager','47bce5c74f589f4867dbd57e9ca9f808','2018-10-23',NULL,'admin','Aktif'),(2,'kasir','vita','kasir','47bce5c74f589f4867dbd57e9ca9f808',NULL,NULL,NULL,'Aktif');

/*Table structure for table `xxtempzz` */

DROP TABLE IF EXISTS `xxtempzz`;

CREATE TABLE `xxtempzz` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `tglpesan` date DEFAULT NULL,
  `nopesanan` char(50) DEFAULT NULL,
  `idmakanan` int(11) DEFAULT NULL,
  `idminuman` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `statuspesanan` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `tglupdate` date DEFAULT NULL,
  `opupdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `xxtempzz` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
