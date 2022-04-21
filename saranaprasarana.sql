-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 04:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saranaprasarana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `id_guru`, `id_siswa`, `level`, `foto`) VALUES
(7, 'hanifanhidayatullah@gmail.com', '123', NULL, NULL, 'admin', NULL),
(8, 'hanifan1@gmail.com', '123', NULL, NULL, 'admin', 'C:/xampp/htdocs/LSP/src/img/'),
(9, 'BuMega@gmail.com', '123', 9, NULL, 'guru', '');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `ket_denda` varchar(50) DEFAULT NULL,
  `biaya_denda` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `ket_denda`, `biaya_denda`) VALUES
(0, 'Tepat waktu', 0),
(1, 'Telat 1 hari', 5000),
(2, 'Telat 2 hari', 10000),
(3, 'Telat 3 hari', 15000),
(4, 'Telat 4 hari', 20000),
(5, 'Telah 5 hari', 25000),
(6, 'Telat 6 hari', 30000),
(7, 'Telat 7 hari', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `nama_guru` varchar(25) DEFAULT NULL,
  `alamat_guru` varchar(25) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_jabatan`, `id_jadwal`, `id_peminjam`, `nik`, `nama_guru`, `alamat_guru`, `tgl_lahir_guru`) VALUES
(9, 1, 4, 9, '1234', 'bu Mega', 'adwa', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'kepala sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_pelajaran` int(11) DEFAULT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `id_kelas_siswa` int(11) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `semester` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_pelajaran`, `id_hari`, `id_kelas_siswa`, `jam_masuk`, `jam_keluar`, `semester`) VALUES
(4, 1, 1, 1, '06:30:00', '09:00:00', '1'),
(5, 2, 1, 1, '09:00:00', '11:00:00', '1'),
(6, 4, 1, 1, '11:00:00', '13:00:00', '1'),
(7, 2, 2, 1, '06:30:00', '09:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(2, 'coba'),
(3, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(25) DEFAULT NULL,
  `kode_jurusan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`) VALUES
(1, 'RPL', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'kategori1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) DEFAULT NULL,
  `kode_kelas` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode_kelas`) VALUES
(2, 'X', '1234'),
(3, 'XI', '12345'),
(4, 'XII', '48974');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_kelas_siswa` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_jurusan`, `id_kelas`, `nama_kelas_siswa`) VALUES
(1, 1, 4, '12 RPL');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(3, 'merk'),
(4, 'ab');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
(1, 'MTK'),
(2, 'B.INDONESIA'),
(4, 'PKN'),
(5, 'B.INGGRIS'),
(6, 'IPA'),
(7, 'IPS'),
(8, 'AGAMA'),
(9, 'OLAHRAGA');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  `status_pemesanan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_peminjam`, `tgl_pemesanan`, `status_pemesanan`) VALUES
(1, 4, '0000-00-00', 'Request'),
(2, 9, '2022-03-17', 'Request'),
(3, 9, '2022-03-17', 'Request');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_peralatan`
--

CREATE TABLE `pemesanan_peralatan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_peralatan`
--

INSERT INTO `pemesanan_peralatan` (`id_pemesanan`, `id_peralatan`) VALUES
(1, 9),
(2, 9),
(3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `status_peminjam` varchar(20) DEFAULT NULL,
  `keterangan_peminjam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `status_peminjam`, `keterangan_peminjam`) VALUES
(9, 'Aktif', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `denda` float NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_peminjam`, `denda`, `tgl_peminjaman`, `tgl_kembali`, `tgl_pengembalian`, `status`) VALUES
(2, 6, 20000, '2022-03-07', '2022-03-05', '2022-03-09', 'kembali'),
(3, 6, 20000, '2022-03-07', '2022-03-05', '2022-03-09', 'kembali'),
(5, 4, 0, '2022-03-09', '2022-03-16', '0000-00-00', 'pinjam'),
(6, 5, 0, '2022-03-11', '2022-03-18', '2022-03-11', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_peralatan`
--

CREATE TABLE `peminjaman_peralatan` (
  `id_peminjaman` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_peralatan`
--

INSERT INTO `peminjaman_peralatan` (`id_peminjaman`, `id_peralatan`) VALUES
(2, 9),
(3, 14),
(5, 9),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_siswa`
--

CREATE TABLE `peminjaman_siswa` (
  `id_peminjaman_siswa` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `mata_pelajaran` varchar(25) DEFAULT NULL,
  `guru_pengajar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_peralatan` varchar(25) DEFAULT NULL,
  `tgl_beli_peralatan` date DEFAULT NULL,
  `status_peralatan` varchar(50) DEFAULT NULL,
  `jml_kerusakan_alat` int(11) DEFAULT NULL,
  `status_ketersediaan_alat` varchar(25) DEFAULT NULL,
  `aturan_service_alat` varchar(25) DEFAULT NULL,
  `image_peralatan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id_peralatan`, `id_jenis`, `id_merk`, `id_warna`, `id_kategori`, `nama_peralatan`, `tgl_beli_peralatan`, `status_peralatan`, `jml_kerusakan_alat`, `status_ketersediaan_alat`, `aturan_service_alat`, `image_peralatan`) VALUES
(9, 2, 3, 3, 3, 'obeng', '2022-02-04', 'bagus', 5, 'tersedia', 'gatau', 'hero_31.jpg'),
(14, 2, 4, 3, 3, 'paku', '2022-02-04', 'bagus', 5, 'tersedia', 'gatau', 'Test9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tgl_perbaikan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan_peralatan`
--

CREATE TABLE `perbaikan_peralatan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_kelas_siswa` int(11) DEFAULT NULL,
  `nama_siswa` varchar(25) DEFAULT NULL,
  `nis` int(11) NOT NULL,
  `alamat_siswa` varchar(50) DEFAULT NULL,
  `angkatan_siswa` varchar(25) DEFAULT NULL,
  `ket_siswa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `nama_warna` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `nama_warna`) VALUES
(3, 'putih1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `relationship_4_fk` (`id_jadwal`),
  ADD KEY `relationship_5_fk` (`id_jabatan`),
  ADD KEY `relationship_6_fk` (`id_peminjam`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `relationship_1_fk` (`id_pelajaran`),
  ADD KEY `relationship_2_fk` (`id_hari`),
  ADD KEY `relationship_3_fk` (`id_kelas_siswa`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`),
  ADD KEY `relationship_7_fk` (`id_kelas`),
  ADD KEY `relationship_8_fk` (`id_jurusan`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `relationship_15_fk` (`id_peminjam`);

--
-- Indexes for table `pemesanan_peralatan`
--
ALTER TABLE `pemesanan_peralatan`
  ADD PRIMARY KEY (`id_pemesanan`,`id_peralatan`),
  ADD KEY `relationship_21_fk` (`id_pemesanan`),
  ADD KEY `relationship_22_fk` (`id_peralatan`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `peminjaman_peralatan`
--
ALTER TABLE `peminjaman_peralatan`
  ADD PRIMARY KEY (`id_peminjaman`,`id_peralatan`),
  ADD KEY `relationship_26_fk` (`id_peminjaman`),
  ADD KEY `relationship_27_fk` (`id_peralatan`);

--
-- Indexes for table `peminjaman_siswa`
--
ALTER TABLE `peminjaman_siswa`
  ADD PRIMARY KEY (`id_peminjaman_siswa`),
  ADD KEY `relationship_10_fk` (`id_peminjaman`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`),
  ADD KEY `relationship_18_fk` (`id_jenis`),
  ADD KEY `relationship_19_fk` (`id_merk`),
  ADD KEY `relationship_23_fk` (`id_kategori`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `relationship_14_fk` (`id_guru`);

--
-- Indexes for table `perbaikan_peralatan`
--
ALTER TABLE `perbaikan_peralatan`
  ADD PRIMARY KEY (`id_perbaikan`,`id_peralatan`),
  ADD KEY `relationship_24_fk` (`id_perbaikan`),
  ADD KEY `relationship_25_fk` (`id_peralatan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `relationship_9_fk` (`id_kelas_siswa`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman_siswa`
--
ALTER TABLE `peminjaman_siswa`
  MODIFY `id_peminjaman_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_guru_relations_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `fk_guru_relations_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_relations_hari` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `fk_jadwal_relations_kelas_si` FOREIGN KEY (`id_kelas_siswa`) REFERENCES `kelas_siswa` (`id_kelas_siswa`),
  ADD CONSTRAINT `fk_jadwal_relations_pelajara` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`);

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `fk_kelas_si_relations_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `fk_kelas_si_relations_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
