-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Mar 2015 pada 08.14
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it-corner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `kategori_artikel` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `username`, `judul_artikel`, `isi_artikel`, `kategori_artikel`, `tanggal`, `status`) VALUES
(3, 'fariz', 'asa', 'saassa', 'software', '2015-03-15 23:15:29', '2'),
(8, 'tyler', 'OwnCloud : Cloud Storage Server yang mudah dan handal', 'OwnCloud adalah Aplikasi open source dan aplikasi web yang kuat untuk sinkronisasi data, file sharing, dan penyimpanan remote file. OwnCloud ditulis dalam bahasa PHP / JavaScript. Hal ini dirancang untuk bekerja dengan beberapa sistem manajemen database, termasuk MySQL, MariaDB, SQLite, Oracle Database, dan PostgreSQL. Selain itu ownCloud dapat digunakan pada semua platform yang dikenal yaitu., Linux, Macintosh, Windows dan Android. Singkatnya itu adalah kuat, platform yang Independent, fleksibel dalam hal konfigurasi dan mudah digunakan karna Aplikasi open source.', 'software', '2015-03-16 08:51:36', '1'),
(9, 'kania', 'Pengertian dan Kegunaan XAMPP', 'Kali ini di artikel pusatdesainweb.com akan membahas mengenai XAMPP yang mrupakan salah satu aplikasi untuk membangun aplikasi website dinamis di lokalhost atau yang belum terkoneksi dengan internet. Sebenarnya ada beberapa aplikasi untuk membangun website di lokalhost seperti MAMP, LAMP, dan WAMP, namun dari ke empat aplikasi tersebut menurut pusatdesainweb.com yang paling mudah digunakan dan dari segi interface yang paling baik adalah XAMPP.\r\n\r\nXAMPP adalah software web server apache yang di dalamnya tertanam server MySQL yang didukung dengan bahasa pemrograman PHP untuk membuat website yang dinamis. XAMPP sendiri mendukung dua system operasi yaitu windows dan Linux. Untuk linux dalam proses penginstalanny menggunakan command line sedangkan untuk windows dalam proses penginstalannya menggunakan interface grafis sehingga lebih mudah dalam penggunaaan XAMPP di Windows di banding dengan Linux.\r\n\r\nSebelum kita membahas cara mengenai penginstalan dan penggunaan dasar XAMPP alangkah lebih baiknya jika kita mengetahui terlebih dahulu aplikasi apa yang ada di dalam XAMPP yang merupakan aplikasi vital bagi berjalannya XAMPP dengan baik. DIdalam XAMPP ada 3 komponen utama yang di tanam di dalamnya yaitu web server Apache, PHP, dan MySQL\r\n\r\n<b>Apache</b>\r\n\r\nApache merupakan web server yang digunakan untuk menampilkan website di internet seperti menggunakan Mozilla fire fox, Google Crome, IE, Safari, dll berdasarkan kode-kode yang di tulis di dalam website tersebut baik menggunakan bahasa pemrograman HTML maupun PHP yang mengambil suatu database yang dibangun di MySQL, sehingga terbentuklah sebuah website yang dapat di lihat di Mozilla fire fox dan kawan-kawannya. Apache sendiri bersifat opensource sehingga dapat digunakan oleh siapa saja dan dikembangkan oleh siapa saj tentunya bagi yang mampu mengembagkannya.\r\n\r\n<b>PHP</b>\r\n\r\nPHP meupakan bahasa pemrograman yang di digunakan untuk membuat website dinamis yang memungkinkan kita melakukan update website setiap saat. Berbeda dengan HTML yang source kodenya di tampilkan di website, source code PHP tidak di tampikan di halaman muka suatu website karena PHP di olah dan dip roses di server, PHP bersifat server-side scripting yang mampu berjalan di brbagai system operasi seperti windows, Linux, Mac OS, dll.\r\n\r\nPHP memiliki kedinamisa dalam hal database yang bisa dihubungkan dengan PHP seperti MySQL, Oracle, MS Access, PostgreSQL. Namun untuk pemrograman website yang paling digunakan adalah MySQL. PHP sendiri sampai sekarang sudah mengalami perkembangan yang pesat dan sudah mencapai PHP 5.5. untuk mengawali kode dalam PHP menggunakan kode <? Dan diakhiri tanda ?>.\r\n\r\n<b>MySQL</b>\r\n\r\nMySQL dapat digunakan untuk membuat dan mengola database beserta isinya. Kita dapat memanfaatkan MySQL untuk menambahkan, mengubah dan menghapus data yang berada dalam database. MySQL merupakan sisitem manajemen database yang bersifat at relational. Artinya data-data yang dikelola dalam database akan diletakkan pada beberapa tabel yang terpisah sehingga manipulasi data akan menjadi jauh lebih cepat.\r\nMySQL dapat digunakan untuk mengelola database mulai dari yang kecil sampai dengan yang sangat besar. MySQL juga dapat menjalankan perintah-perintah Structured Query Language (SQL) untuk mengelola database-database yang ada di dalamnya. Hingga kini, MySQL sudah berkembang hingga versi 5. MySQL 5 sudah mendukung trigger untuk memudahkan pengelolaan tabel dalam database.\r\n\r\n<b>PHPMyAdmin</b>\r\n\r\nMySQL merupakan sebuah database yang dalam membuat perintah perintahnya menggunakan command line yang menyusahkan dalam proses input, delete, update database. Di dalam XAMPP terdapat sebuah apliaksi yang dinamakan PHPMy Admin yang digunakan untuk membuat pengetikan kode-kode MySQL yang tadinya harus di ketik di command line bisa di olah menggunakan interface grafis sehingga memudahkan dalam pengelolaan database MySQL.\r\n\r\nBagaimana? Siap membuat website sendiri? Yuk download XAMPP sekarang di <a href="http://downloads.sourceforge.net/project/xampp/XAMPP%20Windows/1.8.2/xampp-win32-1.8.2-5-VC9-installer.exe">sini</a>.', 'software', '2015-03-16 08:55:32', '2'),
(10, 'kania', 'Pengertian dan Kegunaan XAMPP', 'Kali ini saya akan membahas mengenai XAMPP yang mrupakan salah satu aplikasi untuk membangun aplikasi website dinamis di lokalhost atau yang belum terkoneksi dengan internet. Sebenarnya ada beberapa aplikasi untuk membangun website di lokalhost seperti MAMP, LAMP, dan WAMP, namun dari ke empat aplikasi tersebut menurut saya yang paling mudah digunakan dan dari segi interface yang paling baik adalah XAMPP.<br />\r\n<br />\r\nXAMPP adalah software web server apache yang di dalamnya tertanam server MySQL yang didukung dengan bahasa pemrograman PHP untuk membuat website yang dinamis. XAMPP sendiri mendukung dua system operasi yaitu windows dan Linux. Untuk linux dalam proses penginstalanny menggunakan command line sedangkan untuk windows dalam proses penginstalannya menggunakan interface grafis sehingga lebih mudah dalam penggunaaan XAMPP di Windows di banding dengan Linux.<br />\r\n<br />\r\nSebelum kita membahas cara mengenai penginstalan dan penggunaan dasar XAMPP alangkah lebih baiknya jika kita mengetahui terlebih dahulu aplikasi apa yang ada di dalam XAMPP yang merupakan aplikasi vital bagi berjalannya XAMPP dengan baik. DIdalam XAMPP ada 3 komponen utama yang di tanam di dalamnya yaitu web server Apache, PHP, dan MySQL<br />\r\n<br />\r\n<b>Apache</b><br />\r\n<br />\r\nApache merupakan web server yang digunakan untuk menampilkan website di internet seperti menggunakan Mozilla fire fox, Google Crome, IE, Safari, dll berdasarkan kode-kode yang di tulis di dalam website tersebut baik menggunakan bahasa pemrograman HTML maupun PHP yang mengambil suatu database yang dibangun di MySQL, sehingga terbentuklah sebuah website yang dapat di lihat di Mozilla fire fox dan kawan-kawannya. Apache sendiri bersifat opensource sehingga dapat digunakan oleh siapa saja dan dikembangkan oleh siapa saj tentunya bagi yang mampu mengembagkannya.<br />\r\n<br />\r\n<b>PHP</b><br />\r\n<br />\r\nPHP meupakan bahasa pemrograman yang di digunakan untuk membuat website dinamis yang memungkinkan kita melakukan update website setiap saat. Berbeda dengan HTML yang source kodenya di tampilkan di website, source code PHP tidak di tampikan di halaman muka suatu website karena PHP di olah dan dip roses di server, PHP bersifat server-side scripting yang mampu berjalan di brbagai system operasi seperti windows, Linux, Mac OS, dll.<br />\r\n<br />\r\nPHP memiliki kedinamisa dalam hal database yang bisa dihubungkan dengan PHP seperti MySQL, Oracle, MS Access, PostgreSQL. Namun untuk pemrograman website yang paling digunakan adalah MySQL. PHP sendiri sampai sekarang sudah mengalami perkembangan yang pesat dan sudah mencapai PHP 5.5. untuk mengawali kode dalam PHP menggunakan kode <? Dan diakhiri tanda ?>.<br />\r\n<br />\r\n<b>MySQL</b><br />\r\n<br />\r\nMySQL dapat digunakan untuk membuat dan mengola database beserta isinya. Kita dapat memanfaatkan MySQL untuk menambahkan, mengubah dan menghapus data yang berada dalam database. MySQL merupakan sisitem manajemen database yang bersifat at relational. Artinya data-data yang dikelola dalam database akan diletakkan pada beberapa tabel yang terpisah sehingga manipulasi data akan menjadi jauh lebih cepat.<br />\r\nMySQL dapat digunakan untuk mengelola database mulai dari yang kecil sampai dengan yang sangat besar. MySQL juga dapat menjalankan perintah-perintah Structured Query Language (SQL) untuk mengelola database-database yang ada di dalamnya. Hingga kini, MySQL sudah berkembang hingga versi 5. MySQL 5 sudah mendukung trigger untuk memudahkan pengelolaan tabel dalam database.<br />\r\n<br />\r\n<b>PHPMyAdmin</b><br />\r\n<br />\r\nMySQL merupakan sebuah database yang dalam membuat perintah perintahnya menggunakan command line yang menyusahkan dalam proses input, delete, update database. Di dalam XAMPP terdapat sebuah apliaksi yang dinamakan PHPMyAdmin yang digunakan untuk membuat pengetikan kode-kode MySQL yang tadinya harus di ketik di command line bisa di olah menggunakan interface grafis sehingga memudahkan dalam pengelolaan database MySQL.<br />\r\n<br />\r\nBagaimana? Siap membuat web? Yuk download XAMPP di <a href="http://downloads.sourceforge.net/project/xampp/XAMPP%20Windows/1.8.2/xampp-win32-1.8.2-5-VC9-installer.exe">sini</a>.', 'software', '2015-03-16 09:00:27', '1'),
(11, 'fariz', 'Memilih Smartphone Android yang Tepat Untuk Kebutuhan Anda', 'Ada sangat banyak tipe dan merk smartphone android yang beredar dipasaran, tentunya ini akan membuat kita bingung jika ingin membeli sebuah smartphone yang sesuai dengan kebutuhan dan keuangan kita. Jika kita mengetahui perbedaan-perbedaan setiap spesifikasi smartphone, tentu kita dapat menemukan smartphone yang kita butuhkan namun dengan tidak terlalu memboroskan banyak uang karena salah dalam membeli smartphone.<br />\r\n<br />\r\nBerikut Tips Cara memilih Smartphone Android Agar Sesuai Dengan Kebutuhan:<br />\r\n<br />\r\n- Jika anda adalah seorang yang menggemari games dan ingin membeli smartphone hanya untuk games, maka pilihlah smartphone dengan prosesor dual core dan ram minimal sebesar 1Gb. Selain itu yang perlu anda perhatikan adalah kapasitas memori internal minimal adalah 8Gb.<br />\r\n- Jika anda penggemar jejaring sosial maka anda dapat membeli smartphone dengan spesifikasi menengah ataupun lebih baik menggunakan yang berspesifikasi tinggi. Namun sebenarnya smartphone dengan ram sebesar 512 dan prosesor 1Ghz saja sudah cukup. Yang perlu anda perhatikan adalah pastikan smartphone yang anda gunakan mempunyai kecepatan akses internet yang baik dan kencang.<br />\r\n- Jika anda adalah penggemar film dan anda menginginkan tampilan grafis sebuah smartphone yang jernih, pilihlah smartphone yang memiliki kerapatan pixel kurang lebih 300ppi. Anda dapat melihat spesifikasi kerapatan pixel ini di website review smartphone seperti GSMArena.<br />\r\n- Jika anda adalah seorang penikmat musik dan cenderung mendengarkan musik menggunakan smartphone anda, pilihlah smartphone dengan kualitas speaker yang baik. Anda juga harus melihat handsfree bawaan smartphone tersebut apakah memiliki kualitas suara yang baik atau tidak. Rata-rata smartphone dengan spesifikasi ini dimiliki oleh produsen asal jepang Sony.<br />\r\n- Jika anda adalah seseorang yang sering bekerja di luar dan pekerjaan anda bersifat mobile, pilihlah smartphone yang kuat dan tahan banting dan memiliki baterai berkapasitas di atas 2000Mah. Anda juga harus menghindari smartphone yang memakai lapisan Gorilla Glass, sebab Gorila Glass sangat rawan terhadap benturan.<br />\r\n- Jika anda adalah seorang buissiness man dan menggunakan smartphone anda untuk pekerjaan pilihlah smartphone kelas premium yang dibekali dengan stylus pen agar dapat mempermudah pekerjaan anda.<br />\r\n- Jika anda adalah seorang yang suka berfoto ria dan bepergian untuk berlibur, pilihlah smartphone dengan kualitas kamera 8MP dan kapasitas baterai di atas 2000Mah.<br />\r\n<br />\r\n<br />\r\nDemikian tadi artikel mengenai Cara memilih Smartphone Android Berdasarkan Kebutuhan. Semoga artikel tersebut dapat membantu anda dalam memilih sebuah smartphone android yang pas dengan karakteristik dan keuangan anda. Ada banyak sekali website-website yang menyediakan spesifikasi smartphone-smartphone android di pasaran seprti GSMArena dan lain-lain.', 'Hardware', '2015-03-16 09:29:26', '1'),
(12, 'nicko', 'Komputer atau PC Mati Sendiri? Inilah Penyebabnya', 'Apakah anda mengalami komputer mati sendiri secara tiba-tiba tanpa peringatan sebelumnya?, jika iya, silahkan simak artikel berikut baik-baik. Komputer mati sendiri secara tiba-tiba disebabkan oleh beberapa hal, namun, yang paling sering adalah karena suhu pada kompouter yang terlalu panas, ini disebabkan power supply yang bermasalah ataupun fan yang tidak berfungsi dengan benar. Selain itu, ada penyebab-penyebab lainnya yang dapat menyebabkan komputer mati mendadak. Berikut adalah beberapa penyebab komputer mati sendiri secara tiba-tiba.<br />\r\n<br />\r\n1. PC Terlalu Panas<br />\r\nKomputer akan mati sendiri secara tiba-tiba untuk melakukan upaya pencegahan komponen yang rusak karena terlalu panas. Cara untuk menanganinya adalah dengan mencari penyebab suhu yang terlalu panas tersebut.<br />\r\n- Buka PC anda, perhatikan putaran Fan pada CPU dan PSU, pastikan tidak ada yang bermasalah<br />\r\n- Pastikan tidak ada benda apapun yang menghalangi sirkulasi udara pada PC<br />\r\n- Bersihkan debu-debu yang menempel pada PC.<br />\r\n<br />\r\n2. Hardware Error<br />\r\nCoba anda pinjam hardware pc milik teman, coba ganti satu persatu sampai menemukan masalahnya. Atau jika anda baru saja membeli hardware baru dan memasangkannya, coba untuk melepaskan terlebih dahulu untuk memastikan bukan hardware tersebut penyebabnya.<br />\r\n<br />\r\n3. Virus<br />\r\nCoba gunkan antivirus yang selalu update untuk mencegah serangan virus.<br />\r\n<br />\r\n4. Instal Ulang<br />\r\nJika masalah tetap muncul, coba untuk melakukan Install Ulang OS PC Anda.<br />\r\n<br />\r\nDemikian artikel dari saya. Semoga membantu..', 'Hardware', '2015-03-16 09:31:54', '1'),
(13, 'nicko', 'Konsultasi Khusus Laptop (Semua Masalah Laptop)', 'Melihat laptop menjadi telah kebutuhan sehari-hari bagi agan2 smua, Thread ini ditujukan hanya utk mendiskusikan masalah sehari-hari yang sering terjadi, khusus laptop . Hal-hal yang di bahas dapat berupa semua masalah yang terjadi pada laptop agan dan dapat berupa software yang berkaitan dengan hardware. Disini lah tempat kita saling sharing ya gan, tulis di komentar, saling menambah pengetahuan, semoga bermanfaat dan bisa membantu kita semua. Aminn..', 'Hardware', '2015-03-16 09:34:33', '1'),
(16, 'ratihayu', 'Coba bikin', 'Hahahaha aku bikin artikel', 'Software', '2015-03-21 14:07:55', '2'),
(17, 'tyler', 'Cara Mengatasi Laptop Yang Cepat Panas Kemudian Mati', 'Pada kesempatan kali ini saya akan berbagi trik lagi tentang masalah di dunia komputer, khususnya untuk laptop. Dan triknya adalah tentang laptop yang panas kemudian mati sendiri. Jika sobat mengalami masalah seperti yang pernah saya alami, yaitu laptop sering mati secara tiba-tiba di karenakan panas. Sobat tidak usah bingung, sebab disini saya akan kasih trik untuk cara mengatasinya.<br />\r\n<br />\r\nSedikit pencerahan dan pengetahuan untuk sobat, pada semua perangkat komputer dan laptop pasti memiliki sistem pembuangan panas yang dihasilkan oleh prosesor. Karena sistem pembuangan panas ini sangat penting agar prosesor bisa selalu berjalan dengan normal. Namun jika sistem pada pendingin ini tidak bisa bekerja dengan baik, maka hawa panas pada prosesor akan bisa mencapai pada titik yang kritis atau Over Heating, dan akibatnya komputer atau laptop sobat akan eror atau hang bahkan bisa mati secara tiba-tiba. Bila hal ini sering terjadi pada komputer atau laptop sobat, maka akibatnya akan bisa memperpendek lifetime prosesor dan daya dari baterai laptop cepat habis.<br />\r\n', 'Hardware', '2015-03-21 22:04:28', '1'),
(19, 'fariz', 'linux', '<b>linux ubuntu</b>', 'Software', '2015-03-23 11:32:32', '2'),
(20, 'tyler', 'asa', 'asa', 'Software', '2015-03-23 22:44:50', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
`id_jawaban` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `isi_jawaban` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `isi_jawaban`, `nama`, `tanggal`) VALUES
(1, 15, 'Iya gan.. pake ubuntu aja. Itu ringan bahkan bisa dijalankan pada komputer lama sekalipun.', 'Atika Farahdina Randa', '2015-03-16 09:45:26'),
(2, 15, 'Saya setuju dengan atas saya. Ubuntu paling ringan, selain ringan juga banyak kustomisasinya..', 'Claudia Primasiwi', '2015-03-16 09:47:41'),
(4, 14, 'WD tuh bagus gan. Harga mahal tapi sepadan sama kualitasnya.', 'Hanif Fermanda Putra', '2015-03-16 10:00:50'),
(8, 15, 'kunyi', 'Adam Tyler', '2015-03-23 20:11:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(10) NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `isi_komentar` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `isi_komentar`, `nama`, `tanggal`) VALUES
(1, 13, 'Tolongin saya.. Laptop saya kena virus worm dan kuda troya. Antivirus saya tiap kali merespon adanya virus tersebut. Tapi dia tidak bisa menghapus virus yang terdeteksi. Mohon pencerahannya..', 'Claudia Primasiwi', '2015-03-16 09:49:07'),
(2, 12, 'Mantap gan! Saya jadi tahu kenapa laptop saya sering mati sendiri. Terima kasih ya..', 'Uti Solichah', '2015-03-16 09:49:54'),
(3, 13, 'Yaah kadang laptop saya gabisa masuk windows. Layarnya item terus ga masuk desktop. Itu kenapa ya gan? Tolong saya plis..', 'Biandina Meidyani', '2015-03-16 09:55:56'),
(4, 13, '@Claudia : Wah kok bisa gitu? Solusi terakhir adalah install ulang. Jangan simpan data-data pada lokasi C karena kemungkinan datanya sudah terinfeksi oleh virus tersebut. Pada saat install ulang, format disk C: dan lakukan install ulang pada C: Semoga membantu :)<br />\r\n@Biandina : Coba masuk safe mode apakah bisa masuk sampai desktop. Caranya tahan tombol F8 saat awal booting atau pada tampilan logo bios. Akan ada opsi untuk memilih safe mode. Pilihlah safe mode dan tunggu hasilnya. Semoga membantu :)', 'Nicko Rahmadano', '2015-03-16 09:59:06'),
(5, 12, 'Mantap.. Terima kasih atas informasinya!', 'Hanif Fermanda Putra', '2015-03-16 10:01:12'),
(11, 10, 'Wah keren!', 'Ratih Ayu Indraswari', '2015-03-21 14:04:48'),
(12, 10, '<b>Coba bold</b>', 'Ratih Ayu Indraswari', '2015-03-21 14:05:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
`id_pertanyaan` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul_pertanyaan` varchar(100) NOT NULL,
  `isi_pertanyaan` text NOT NULL,
  `kategori_pertanyaan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `username`, `judul_pertanyaan`, `isi_pertanyaan`, `kategori_pertanyaan`, `tanggal`, `status`) VALUES
(8, 'fariz', 'wala', 'wala', 'Software', '2015-03-15 01:00:05', '2'),
(12, 'fariz', 'walawala', 'waljinah', 'Hardware', '2015-03-15 01:38:40', '2'),
(13, 'kania', 'Ada yang bisa menjelaskan kepada saya mengapa MS word 2013 tidak bisa dibuka?', 'Tadi malam, saya mencoba membuka aplikasi word processor, Microsoft Word 2013. Namun, setelah klik pada ikon MS word, aplikasi tidak merespon. Pada sebelumnya tidak ada masalah pada MS word saya. Ada yang pernah mengalami demikian? Jika ada, bagaimana solusinya? Terima kasih...', 'Software', '2015-03-16 09:10:13', '1'),
(14, 'nicko', 'Saya membutuhan sebuah harddisk external. Merek apa yang agan recommend?', 'Harddisk external yang 500GB tapi kualitas maksimal apa ya gan? Maaf gan, nubi gatau nih hehe. Sekalian kasih kisaran harganya gan ye.. Makasih IT Corner..', 'Hardware', '2015-03-16 09:33:08', '1'),
(15, 'tyler', 'Linux Ringan yang Cocok Untuk Netbook', 'Sebelumnya ane sudah cari2 tret buat nanya2 tapi ga ketemu, jadi ane putuskan buat new thread untuk nanya ini.<br />\r\n<br />\r\nGan ane lagi ada rencana pake linux, rencana linux ini akan diinstall ke netbook yang specnya juga ga terlalu bagus, kurang lebih specnya seperti ini:<br />\r\nIntel Atom Processor N455<br />\r\n1 GB DDR3 memory, 250 GB HDD storage<br />\r\n<br />\r\nada rekomendasi linux yang ringan yang dapat jalan lancar jaya di spec notebook di atas?<br />\r\n<br />\r\nRekomendasi dari agan:<br />\r\nLubuntu<br />\r\nUbuntu 12.04 LTS<br />\r\n<br />\r\nTerima kasih ', 'Hardware', '2015-03-16 09:36:11', '1'),
(16, 'hanif', 'Gan.. Dimana ya cari driver laptop acer?', 'Jadi saya abis install ulang. Saya kehilangan CD driver saya. Dimanakah saya bisa download driver untuk laptop saya saya?<br />\r\n<br />\r\nModel laptop saya adalah ACER 4555G<br />\r\nMakasih..', 'Software', '2015-03-16 10:04:06', '1'),
(17, 'tyler', 'Harddisk saya mengalami bad sector. Apa yang harus saya lakukan?', 'Waktu kemarin malam, harddisk internal PC saya mengalami bad sector, hingga akhirnya pagi tadi tidak bisa masuk ke windows saat booting. Apa yang harus saya lakukan untuk menyelamatkan data pada harddisk dan memperbaiki bad sector? Terima kasih...', 'Hardware', '2015-03-21 22:02:14', '0'),
(21, 'fariz', 'ayam', 'ayam', 'Software', '2015-03-29 11:54:04', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `email`, `jenis_user`) VALUES
('admin', 'Admin', 'admin', 'admin@gmail.com', 'admin'),
('atika', 'Atika Farahdina Randa', 'atika', 'atika@yahoo.co.id', 'user'),
('biandina', 'Biandina Meidyani', 'biandina', 'biandina@gmail.com', 'user'),
('clau', 'Claudia Primasiwi', 'clau', 'clau@gmail.com', 'user'),
('fariz', 'Fariz Aulia Pradipta', 'fariz', 'fariz', 'user'),
('hanif', 'Hanif Fermanda Putra', 'hanif', 'hnfmnd@gmail.com', 'user'),
('kania', 'Kania Fariza', 'kania', 'kaniafariza@gmail.com', 'user'),
('kevin', 'Kevin Torres', '123', 'makanan', 'user'),
('nicko', 'Nicko Rahmadano', 'nicko', 'nicko@gmail', 'user'),
('ratihayu', 'Ratih Ayu Indraswari', 'ratih', 'ratihayuratih@gmail.com', 'user'),
('tyler', 'Adam Tyler', 'tyler', 'adamtyler@gmail.com', 'user'),
('user', 'user user', 'user', 'user', 'user'),
('uti', 'Uti Solichah', 'uti', 'uti@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`), ADD KEY `username` (`username`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
 ADD PRIMARY KEY (`id_jawaban`), ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`), ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
 ADD PRIMARY KEY (`id_pertanyaan`), ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`);

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
