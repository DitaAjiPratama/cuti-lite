-- Adminer 4.6.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jatah_cuti_per_tahun` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `karyawan_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `karyawan` (`id`, `nama`, `divisi`, `jatah_cuti_per_tahun`, `username`) VALUES
(1,	'Ibu HRD',	'HRD',	20,	'admin');

DROP TABLE IF EXISTS `status_cuti`;
CREATE TABLE `status_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jenis_cuti` varchar(140) NOT NULL,
  `keterangan_cuti` varchar(140) NOT NULL,
  `status_pengajuan` varchar(10) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `status_cuti_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `status_cuti` (`id`, `tanggal_mulai`, `tanggal_selesai`, `jenis_cuti`, `keterangan_cuti`, `status_pengajuan`, `id_karyawan`) VALUES
(1,	'2018-06-12',	'2018-06-13',	'Cuti Bersama',	'Cuti Bersama Idul Fitri (Lebaran Mudik)',	'Di Terima',	1),
(2,	'2018-12-26',	'2018-12-28',	'Cuti Bersama',	'Cuti Bersama Hari Natal',	'Di Terima',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(200) NOT NULL,
  `password` varchar(600) NOT NULL,
  `level` varchar(8) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`username`, `password`, `level`) VALUES
('admin',	'password',	'admin');

-- 2018-06-12 21:38:19
