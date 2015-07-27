-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2014 at 02:05 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(2) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(30) NOT NULL,
  `caver_album` text NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `caver_album`) VALUES
(24, 'album2', 'cat-2.png'),
(26, 'album1', 'cat-11.png'),
(27, 'album1', 'cat-5.png');

-- --------------------------------------------------------

--
-- Table structure for table `foto_album`
--

CREATE TABLE IF NOT EXISTS `foto_album` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(2) NOT NULL,
  `foto_thumb` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `foto_album`
--

INSERT INTO `foto_album` (`id_foto`, `album_id`, `foto_thumb`, `foto`) VALUES
(4, 23, 'cat-6.png', 'cat-6.png'),
(7, 24, 'project_1.jpg', 'project_1.jpg'),
(8, 24, 'project_3.jpg', 'project_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE IF NOT EXISTS `tblbanner` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`id`, `nama`, `foto`, `tanggal`, `waktu`) VALUES
(6, 'tes1', 'blog-s3-3.jpg', '2014-09-06', '18:37:01'),
(7, 'tes2', 'blog-s3-1.jpg', '2014-09-09', '05:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblberita`
--

CREATE TABLE IF NOT EXISTS `tblberita` (
  `id_berita` int(3) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(3) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `counter` int(3) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tblberita`
--

INSERT INTO `tblberita` (`id_berita`, `id_kategori`, `judul_berita`, `isi`, `gambar`, `tanggal`, `waktu`, `counter`) VALUES
(1, 1, 'Corei3, Corei5, dan Corei7 Keluarga Baru Dari Intel', 'Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are. Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are. Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are. Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are', 'core.png', '2014-07-24', '16:06:04', 27),
(2, 2, 'iPhone Banyak Menuai Kecaman', 'iPhone 4 is a GSM cell phone with a high-resolution display, FaceTime \r\nvideo calling, HD video recording, a 5-megapixel camera, and more.iPhone\r\n4 is a GSM cell phone with a high-resolution display, FaceTime video \r\ncalling, HD video recording, a 5-megapixel camera, and more.iPhone 4 is a\r\nGSM cell phone with a high-resolution display, FaceTime video calling, \r\nHD video recording, a 5-megapixel camera, and more.iPhone 4 is a GSM \r\ncell phone with a high-resolution display, FaceTime video calling, HD \r\nvideo recording, a 5-megapixel camera, and more.', 'iphone.png', '2014-08-24', '07:09:35', 82),
(6, 1, 'Digerus Firefox, IE Makin Melempem', 'Browser Mozilla Firefox sepertinya makin berkibar. Berdasarkan data terbaru dari biro penelitian Net Applications, Firefox menapak naik dengan menguasai 20,78 persen pangsa pasar browser pada bulan November, naik dari angka 19,97 persen di bulan Oktober.\r\n\r\nDikutip detikINET dari Afterdawn, Selasa (2/1/2/2008), Firefox kemungkinan sukses menggaet user yang sebelumnya mengandalkan browser Internet Explorer (IE) besutan Microsoft. Pasalnya, masih menurut data Net Applications, pangsa pasar IE kini menurun di bawah 70 persen untuk kali pertama sejak tahun 1998. IE sekarang menguasai 69,8 persen pangsa pasar dari sebelumnya 71,3 persen di bulan Oktober.\r\n\r\nPadahal di masa jayanya di tahun 2003, IE pernah begitu dominan dengan menguasai 95 persen pasaran browser. Penurunan pangsa pasar IE ini disinyalir juga terkait musim liburan di AS di mana banyak perusahaan libur. Padahal browser IE banyak dipakai oleh kalangan perusahaan.\r\n\r\nAdapun produk browser lainnya menunjukkan tren peningkatan. Apple Safari kini punya pangsa 7,13 persen dan Google Chrome sebesar 0,83 persen dari yang sebelumnya 0,74 persen. Sementara pangsa pasar Opera mengalami penurunan dari yang sebelumnya 0,75 persen menjadi 0,71 persen saja. ', '47firefox.jpg', '2014-08-20', '20:30:09', 31),
(7, 1, 'Foxconn Kembangkan Motherboard AMD', 'JAKARTA  - Produsen motherboard Foxconn Technology meluncurkan motherboard terbarunya, seri A88GM. Seri terbaru ini memiliki chipset terkini AMD 880G+SB850, mendukung platform DDR3 dan AM3, serta Phenom II X6 CPU yang hemat daya dan tangguh.\r\n\r\nMotherboard Foxconn seri A88GM dilengkapi dengan 100 persen kapasitor-kapasitor tunggal yang dirancang oleh perusahaan jepang terkemuka, yaitu Fujitsu. Dengan umur pakai rata-rata 50.000 jam, kapasitor tunggal ini memberikan kestabilan, daya tahan dan umur yang panjang yang sangat penting untuk memenuhi kebutuhan daya prosesor high-end dan komponen lain yang ada saat ini sangat diperuntukkan untuk penggunaan banyak aplikasi dan games.\r\n\r\nSelain itu, dalam keterangan resminya, Rabu (28/7/2010), dibandingkan dengan pembengkakan dan kebocoran kapasitor yang dapat merusak motherboard secara lengkap, adanya 100 persen kapasitor tunggal membuat tidak adanya komponen cair, sehingga tidak bocor atau dapat meledak. Sebagai tambahan, kemampuan mereka untuk mentolerir kondisi ekstrim dan ketahanan secara keseluruhan membuat mereka lebih cocok untuk lingkungan operasional yang ekstrim.\r\n\r\nDalam rangka memenuhi kebutuhan konsumen dalam hal kenyamanan dan fitur lengkap multimedia, motherboard A88GM dilengkapi dengan berbagai macam pilihan konektivitas termasuk D-sub, juga digital video interface (DVI) untuk tampilan video digital dan High definition multimedia interface (HDMI) untuk video digital dan output audio guna membantu konsumen dalam memudahkan koneksi kabel. Berkat desain ini, konsumen dapat menikmati video berdefinisi tinggi dan audio pada saat yang sama untuk sepenuhnya memenuhi permintaan HD multimedia generasi berikutnya.\r\n\r\nFitur lain yang ditemukan pada motherboard Foxconn A88GM adalah 4+1 Power Phases, desain ini menggabungkan kekuatan menjamin pengiriman lebih stabil dan dukungan cepat kepada CPU selama bekerja dalam beban berat atau overclocking. Selain itu, 1 phase untuk Northbridge dan 1 phase untuk memori memungkinkan pengguna untuk melakukan banyak tugas secara mendadak dengan performa yang lebih baik dan mengurangi konsumsi daya. Juga, desain thermalnya memungkinkan pengguna untuk menikmati masa pakai suatu komponen lebih lama melalui suhu yang lebih rendah dan tanpa bising dikombinasikan dengan kinerja thermal tertinggi pada chipset, komponen daya CPU dan PCB. (srn)', 'foxcon.jpg', '2014-08-20', '16:13:00', 156),
(8, 1, 'Agresif, AMD Mulai Kejar Nvidia', 'Jakarta - Dominasi kubu hijau Nvidia dalam menggelontorkan produk-produk grafisnya, kini mendapat reaksi agresif dari AMD. Si kubu merah dilaporkan telah melampaui pengkapalan produk grafis Nvidia, selama kuartal dua 2010.\n\nLaporan yang dikutip detikINET dari Cnet, Jumat (30/7/2010) lalu mengatakan bahwa AMD lebih unggul 51 persen dalam pengkapalan produknya, dibanding Nvidia yang hanya 49 persen. Jika dibanding tahun lalu, jumlah ini begitu signifikan.\n\nDi tahun 2009 pada kuartal yang sama, posisi pun terbalik dengan kubu AMD yang hanya menguasai 41 persen pengkapalan produk-produknya, jika dibanding Nvidia. Keagresifan AMD membuat pertumbuhan grafis mereka meningkat 10 persen di tahun ini pada kuartal yang sama.\n\nNvidia sendiri sedikit ''kelabakan'' dengan melesetnya prediksi mereka, bahwa sang kompetitor kini terasa lebih agresif.\n\nSebagai informasi, AMD telah mengkapalkan setidaknya 16 juta kartu grafis DirectX 11 mereka sejak 9 bulan lalu. Perusahaan tersebut dipandang cukup sukses dengan menghadirkan grafis seri 5800. ', 'amd-ati.jpg', '2014-08-11', '10:21:18', 437),
(9, 2, 'Ponsel Android Bisa Nyalakan Mobil  ', 'Jakarta - Bertambah satu lagi daya tarik dari smartphone berbasis Android. Dengan sebuah aplikasi khusus, smartphone Android seperti Motorola Droid atau HTC Evo 4G bisa digunakan untuk menyalakan mesin mobil.\r\n\r\nSeperti diketahui, smartphone Android saat ini memang tengah naik daun dan menarik perhatian khalayak. Sebuah lelucon bahkan mengatakan, menggenggam smartphone Android dipercaya bisa membuat siapapun terlihat lebih menarik. Dengan kemampuan bisa menyalakan mobil, tentunya membuat smartphone Android dan penggunanya nampak lebih keren.\r\n\r\nLalu bagaimana caranya agar smartphone bisa berfungsi untuk menyalakan mobil? Sangat mudah, pengguna hanya perlu mengunduh aplikasi Android gratis bernama Viper SmartStart dan menginstal beberapa hardware tambahan untuk melengkapi mobil.\r\n\r\nDikutip detikINET dari TG Daily, Jumat (30/7/2010), jika sudah terpasang, aplikasi ini bisa digunakan untuk menyalakan atau mengontrol mobil secara virtual dari mana saja.\r\n\r\nTak hanya itu, Viper SmartStart juga memungkinkan pengguna mengunci mobil, membuka bagasi dan mendapat peringatan bahaya jika terjadi sesuatu pada mobil, melalui ponsel mereka. Pengguna bahkan bisa mengontrol beberapa mobil dari satu smartphone.', 'motorola-droid.jpg', '2014-08-06', '11:24:40', 10),
(10, 2, 'Google Masih Mungkin Merilis Nexus Two', 'Jakarta - Beredar rumor, Google masih mungkin merilis ponsel mereka Nexus Two. Padahal, sebelumnya Eric Schmidt sang CEO Google jelas-jelas mengatakan takkan ada lagi lanjutan Nexus One.\r\n\r\nRumor sedikit miring tersebut didapat detikINET dari Neowin, Jumat (30/7/2010). Berdasar sumber internal Google, Neowin mengatakan sebenarnya Google tengah membuat suksesor Nexus One yang disebut Nexus Two.\r\n\r\nWalau tak ada informasi detail mengenai hal ini, sang sumber mengatakan bulan depan ponsel tersebut bakal dirilis, dengan Android 3.0.\r\n\r\nSementara beberapa saat lalu, Nexus One dipastikan tak akan punya penerus. CEO Google Eric Schmidt mengisyaratkan perusahaannya tak akan memproduksi Nexus Two. Bahkan Nexus One mungkin akan jadi satu-satunya ponsel yang dibuat Google.\r\n\r\nSchmidt berkilah bahwa produknya tersebut sudah sukses di pasaran dan perusahaannya tak perlu untuk membuat penerusnya.', 'nexus-one.jpg', '2014-08-11', '09:26:20', 20),
(11, 2, 'Pemilik iPad Kaya dan Egois?  ', 'Jakarta - Sebuah studi yang dilakukan sebuah perusahaan di New Jersey, Amerika Serikat (AS) bernama MyType, menyimpulkan bahwa pemilik iPad merupakan sekelompok kalangan elit yang egois dan kurang ramah. \r\n\r\nStudi ini memang terdengar lucu dan mengada-mengada. Percaya atau tidak, yang jelas hasil survei MyType tersebut menyatakan pemilik iPad rata-rata enam kali lebih kaya ketimbang mereka yang tidak memiliki komputer tablet tersebut.\r\n\r\nPernyataan tersebut nampaknya cukup masuk akal mengingat iPad memang tergolong produk premium. Maka tak heran jika ada yang beranggapan, iPad bisa meningkatkan gengsi pemiliknya.\r\n\r\nSurvei ini juga menemukan bahwa pemilik iPad rata-rata kurang menyukai hal berbau seni dan musik melainkan lebih tertarik dengan video games, elektronik, sains, internet, finansial dan bisnis.\r\n\r\n"Ciri-ciri tersebut cocok dengan karakter orang-orang egois yang pernah kami teliti sebelumnya. Orang-orang dengan ciri-ciri seperti itu enam kali lebih mungkin membeli iPad daripada orang rata-rata," kata CEO MyType Tim Koelkebeck seperti dikutip detikINET dari IT Pro Portal, Jumat (30/7/2010).\r\n \r\nMyType merupakan perusahaan software yang menciptakan aplikasi tes kepribadian  di platform jejaring sosial seperti Facebook. Dalam survei ini, MyType menggunakan tes online berisi 50 pertanyaan yang berdasarkan fakta psikologis, serta teori dan riset modern. ', 'ipad-egois.jpg', '2014-08-21', '07:29:30', 51),
(12, 3, 'Siapa Jawara Open Source Indonesia?  ', 'Jakarta - Pemerintah, lewat Kementerian Pendayagunaan Aparatur Negara, telah meminta agar instansi pemerintah memanfaatkan piranti lunak Open Source pada 2011. Siapa yang paling jago? Akan terbukti dalam ajang bernama Indonesia Open Source Award (IOSA) 2010.\r\n\r\nIOSA 2010 akan digelar di Hotel Bidakara, Jakarta, pada Rabu, 28 Juli 2010. Seperti dikutip detikINET dari keterangan yang diterima, Selasa (27/7/2010), ajang tersebut juga akan digunakan untuk memantau kesiapan institusi pemerintahan untuk beralih ke Open Source.\r\n\r\nAcara tersebut diselenggarakan bersama-sama oleh Kementerian Komunikasi dan Informatika , Kementerian Riset dan Teknologi, Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi, Asosiasi Open Source Indonesia (AOSI), serta Komunitas Open Source.\r\n\r\nSelain penganugerahan, acara itu juga akan menampilkan workshop dan seminar. Termasuk di dalamnya, workshop yang terkait industri kreatif seperti pemanfaatan GIMP dan Blender, maupun sistem operasi Android yang sedang naik daun.\r\n\r\nSedangkan Seminarnya akan membahas topik kreativitas dengan memanfaatkan Open Source. Pembicara seperti Nukman Luthfie, Kak Seto hingga Indra Utoyo akan hadir di seminar tersebut. ', 'iosa-award.jpg', '2014-08-09', '08:35:18', 12),
(13, 3, 'Lembaga Pemerintah Sudah Harus Cicipi Open Source', 'Jakarta - Pemerintah kian memantapkan langkah untuk bermigrasi ke penggunaan software Open Source. Tahun 2011 dijadikan target titik baliknya. Pada saat itu, seluruh institusi pemerintah diharapkan sudah harus be legal, terutama berbasis Open Source.\r\n\r\nDemikian dikatakan Kemal Prihatman, Asisten Deputi Urusan Pengembangan dan Pemanfaatan TI Ristek dalam jumpa pers yang berlangsung di gedung BPPT, Jakarta, Kamis (5/6/2009).\r\n\r\nMenurutnya, target ini merupakan bagian dari isi surat edaran dari Menteri Pemberdayaan Aparatur Negara pada 5 April lalu yang isinya mewajibkan seluruh lembaga pemerintah untuk menggunakan software legal di seluruh jajarannya.\r\n\r\n"Namun kami dari Ristek dengan alasan efisiensi anggaran jelas menyarankan be legal dengan Open Source. Tak hanya sistem operasinya, tapi juga aplikasi pendukung lainnya," tegasnya.\r\n\r\nKemal memprediksi, jumlah komputer yang digunakan seluruh institusi pemerintah di seluruh Indonesia mencapai 800 ribu unit. Nah dari jumlah tersebut, ia tak berani memastikan bahwa seluruhnya sudah legal menggunakan software proprietary. "Mungkin sistem operasinya sudah legal tapi aplikasi yang lainnya belum," imbuhnya.\r\n\r\nRistek sendiri bersama dengan Asosiasi Open Source Indonesia (AOSI) pada tahun 2009 ini menargetkan akan membantu setidaknya 10 lembaga pemerintah untuk melakukan migrasi ke Open Source.\r\n\r\n"Kami lakukan secara bertahap, saat ini kita sedang membantu Depdiknas dan Kementerian PAN," tandasnya.', 'linux-tux.jpg', '2014-08-13', '13:37:28', 57),
(14, 4, 'Unggah Video di YouTube Kini 15 Menit  ', 'Jakarta - Mengunggah video di YouTube akan semakin mengasyikkan. YouTube kini memperpanjang surasi video yang diunggah dari sepuluh menit menjadi 15 menit.\r\n\r\nDalam postingan blognya, Joshua Siegel selaku product manager unggah dan pengaturan video YouTube menyebutkan, perpanjangan durasi video sudah lama menjadi permintaan sebagian besar pengguna YouTube.\r\n\r\nLangkah ini pun diambil YouTube karena yakin teknologi ''Content ID'' pada situsnya dapat bekerja baik. Content ID merupakan teknologi yang secara otomatis menghapus pelanggaran hak cipta oleh penyaringan secara digital melalui arsip di situs tersebut.\r\n\r\n"Karena keberhasilan upaya teknologi yang sedang berlangsung, kami bisa meningkatkan batas durasi unggah video," tulis Siegel seperti dilansir eWeek, dan dikutip detikINET, Jumat (30/7/2010). \r\n\r\nYouTube, menurut Siegel, terutama mengalamatkan penambahan durasi ini pada kemampuan situsnya untuk melindungi hak cipta dari setiap video yang diunggah. ', 'youtube.jpg', '2014-08-14', '14:40:18', 29),
(15, 2, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta  ', 'Jakarta - Jika di negara asalnya paket Xbox 360 slim beserta Kinect dibanderol pada kisaran harga USD 299 (sekitar Rp 2,7 juta), maka gamer di Indonesia harus merogoh kocek lebih dalam. Pasalnya, harga konsol berserta kendali berbasis kamera tersebut bakal melambung ketika sampainya di Tanah Air.\r\n\r\nBerdasarkan pengamatan detikINET, Jumat (30/7/2010), di pusat perbelanjaan konsol game di kawasan Mangga 2 Mall, beberapa toko sudah ada yang mulai menjajakan Xbox 360 slim berwarna hitam dengan kapasitas hardisk 250GB.\r\n\r\n"Di sini kami menjual Xbox 360 Slim seharga Rp 3,4. Itu hanya konsolnya saja belum termasuk Kinect dan game," ujar Merry, salah satu pemilik toko game yang telah menjual konsol tersebut.\r\n\r\nMeski dibanderol pada kisaran harga yang lebih mahal dari rilis resmi, namun Mery mengakui konsol teranyar besutan Microsoft tersebut tetap laris dan banyak diminati.\r\n\r\n"Kami baru mendatangkan 10 unit Xbox 360 slim langsung dari Amerika, dan semuanya sudah habis terjual," tambah Merry.\r\n\r\nXbox 360 slim memang merupakan salah satu konsol game yang paling dinanti saat ini. Kabarnya, konsol tersebut memiliki beberapa perbaikan dari seri terdahulu seperti dengan hadirnya Wi-Fi, kapasitas hardisk yang lebih besar, atau pun daya tahan terhadap panas yang diklaim lebih baik.', 'xbox-slim.jpg', '2014-08-15', '14:44:10', 8),
(16, 2, 'Xbox 360 Slim Belum Bisa Mainkan Game Bajakan  ', 'Jakarta - Selain membenahi beberapa kekurangan pada seri terdahulu, Microsoft juga mengubah Xbox 360 Slim menjadi lebih ''aman''. Kabarnya, konsol yang dibanderol Rp 3,4 Juta ini belum bisa memainkan game bajakan.\r\n\r\nHal tersebut diutarakan salah satu penjual konsol game yang menjajakan Xbox 360 Slim, "Kalau dibandingkan sama Xbox 360, selain spesifikanya yang beda Xbox 360 Slim juga belum bisa memainkan game bajakan," ujarnya.\r\n\r\nPun demikian, konsol tersebut masih tetap diminati oleh para gamer Tanah Air. Bahkan yang lebih mengherankan, kebanyakan para pembeli Xbox 360 Slim merupakan para gamer yang justru sudah memiliki Xbox 360.\r\n\r\n"Biasanya yang beli Xbox 360 Slim itu, justru orang yang sudah punya Xbox 360," ujar Merry, salah satu penjual konsol game di kawasan Mangga 2 Mall, kepada detikINET, Jumat (30/7/2010).\r\n\r\nMeryy juga memperkirakan hal tersebut dikarenakan para gamer Xbox 360 ingin memainkan game mereka secara online.\r\n\r\n"Mereka beli biasanya hanya untuk memainkan game secara online, kan kalau online pakai konsol yang sudah di-patch bisa langsung di-banned oleh Microsoft," tambah penjual yang akrab disapa Ci'' Meryy ini.\r\n\r\nBisa dibilang, besarnya pengguna Xbox 360 di Indonesia bisa jadi karena konsol tersebut bisa memainkan game bajakan. Tidak seperti PlayStation 3 yang hingga kini masih kebal dari tangan jahil para pembajak. Lalu apakah hal ini bakal menyurutkan penjualan Xbox 360 Slim?\r\n\r\n"Kalau dibilang bakal sepi pembeli sepertinya tidak, gamer di Indonesia juga banyak loh yang mau membeli game original. Dan kalau masalah memainkan game bajakan di Xbox 360 Slim, sepertinya hanya masalah waktu," pungkas Merry.\r\n', 'xbox-slim-non-bajak.jpg', '2014-08-18', '11:49:18', 54),
(17, 3, 'Pengembang Linux Kolaborasi Bikin OS', 'SAN FRANSISCO - Maraknya penyebaran smarphone di dunia menarik dua perusahaan pengembang Linux untuk membuat sistem operasi mobile.\r\n\r\nKedua perusahaan tersebut adalah LiMo Foundation dan GNOME Foundation. Mereka sepakat untuk bekerja sama membuat inovasi di dunia open source, khususnya di pasar sistem operasi untuk ponsel.\r\n\r\nSelain itu, dalam waktu dekat, LiMo Foundation akan menjadi bagian dari anggota dewan penasehat GNOME Foundation, sebaliknya GNOME akan menjadi Industry Liaison Partner untuk LiMo Foundation.\r\n\r\nDilansir melalui Cellular News, Senin (26/7/2010), pengembangan ini merepresentasikan formalisasi alami berdasarkan penggunaan komponen software GNOME Mobile yang signifikan dengan platform LiMo Release 2 dan Release 3.\r\n\r\nPlatform LiMo sendiri merupakan platform perangkat mobile berbasis Linux, termasuk komponen multi dari proyek GNOME Mobile seperti Glib, GTK+, D-Bus, GStreamer dan BlueZ, serta lainnya.\r\n\r\n"Tujuan dari GNOME Mobile adalah untuk menyediakan sebuah platform ke tahap berikutnya dari komputasi klien. Kami berkomitmen untuk membawa kualitas dan kebebasan kepada pengguna GNOME pada platform mobile," ujar Direktur Eksekutif Yayasan GNOME Stormy Peters.\r\n\r\n"Kami sangat bersemangat untuk bekerja sama dengan mitra komersial seperti LiMo Foundation untuk memastikan bahwa GNOME Mobile teknologi yang tersedia pada perangkat mobile yang terhubung dan menggabungkan platform LiMo," tandasnya.', 'tux-duduk.jpg', '2014-08-16', '10:08:10', 101),
(18, 2, 'Microsoft Kerja Keras Jegal iPad Apple', 'Jakarta - Menyaingi Apple jadi prioritas utama Microsoft saat ini. Sang \r\nCEO, Steve Ballmer mengungkapkan, bahwa perusahaannya sedang bekerja \r\nkeras menciptakan komputer tablet yang bisa menjegal laju iPad.\r\nDisebutkan oleh sang penerus tahta Bill Gates, Microsoft dalam \r\nmengembangkan komputer bergaya tabletnya ini bekerja sama dengan \r\nsejumlah vendor hardware kenamaan seperti Hewlett-Packard (HP), Lenovo, \r\nAsus, Dell dan Toshiba.\r\n&quot;Kami harus membuat hal ini terjadi pada tablet Windows 7. Ini harus \r\ndisegerakan dan bekerja keras dengan partner kami,&quot; ungkap Ballmer dalam\r\nsebuah pertemuan yang berlangsung di kantor pusat Microsoft, seperti \r\ndetikINET kutip dari Telegraph, Sabtu (31/7/2010).\r\n&quot;Jika sudah siap nanti, produk itu akan segera dikapalkan. Kami ingin \r\nmenghadirkan produk yang benar-benar diinginkan konsumen,&quot; tambahnya.\r\nMicrosoft pun membentuk tim khusus untuk menggarap prototip komputer \r\ntablet baru yang kini dijaga ketat dan sangat rahasia. \r\nDalam kesempatan yang sama, Microsoft juga kembali menegaskan tidak akan\r\nmeneruskan proyek Courier, yakni proyek penggarapan komputer tablet \r\nsebelumnya yang disebut-sebut akan bersaing ketat dengan iPad dan telah \r\nbocor di YouTube.\r\nBallmer beralasan, Courier hanya salah satu dari banyak ide Microsoft \r\ndan tidak ada rencana untuk membuatnya saat itu.\r\n', 'ipad-mikocok.jpg', '2014-08-14', '15:38:20', 48),
(19, 2, 'Samsung Tablet Coba Jadi Alternatif', '<p>Jakarta - Menyaingi Apple jadi prioritas utama Microsoft saat ini. Sang CEO, Steve Ballmer mengungkapkan, bahwa perusahaannya sedang bekerja keras menciptakan komputer tablet yang bisa menjegal laju iPad.  Disebutkan oleh sang penerus tahta Bill Gates, Microsoft dalam mengembangkan komputer bergaya tabletnya ini bekerja sama dengan sejumlah vendor hardware kenamaan seperti Hewlett-Packard (HP), Lenovo, Asus, Dell dan Toshiba.  "Kami harus membuat hal ini terjadi pada tablet Windows 7. Ini harus disegerakan dan bekerja keras dengan partner kami," ungkap Ballmer dalam sebuah pertemuan yang berlangsung di kantor pusat Microsoft, seperti detikINET kutip dari Telegraph, Sabtu (31/7/2010).  "Jika sudah siap nanti, produk itu akan segera dikapalkan. Kami ingin menghadirkan produk yang benar-benar diinginkan konsumen," tambahnya.  Microsoft pun membentuk tim khusus untuk menggarap prototip komputer tablet baru yang kini dijaga ketat dan sangat rahasia.   Dalam kesempatan yang sama, Microsoft juga kembali menegaskan tidak akan meneruskan proyek Courier, yakni proyek penggarapan komputer tablet sebelumnya yang disebut-sebut akan bersaing ketat dengan iPad dan telah bocor di YouTube.  Ballmer beralasan, Courier hanya salah satu dari banyak ide Microsoft dan tidak ada rencana untuk membuatnya saat itu <span >Saya adalah seorang yang sangat<span > mencintai keluarga saya..</span></span></p>', 'axio.jpg', '2014-08-10', '15:48:20', 190),
(51, 4, 'asd', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'pem.jpg', '2014-09-13', '09:00:00', 13),
(52, 4, 'asd', 'asdasd', 'pem.jpg', '2014-09-13', '09:05:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldetail_komentarberita`
--

CREATE TABLE IF NOT EXISTS `tbldetail_komentarberita` (
  `id_detailkomentarberita` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `id_berita` int(2) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id_detailkomentarberita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbldetail_komentarberita`
--

INSERT INTO `tbldetail_komentarberita` (`id_detailkomentarberita`, `nama`, `komentar`, `email`, `nama_kategori`, `tanggal`, `waktu`, `id_berita`, `status`) VALUES
(35, 'tes1', 'tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1tes1', 'tes1yoy@yahoo.com', 'Teknologi', '2014-09-09', '04:52:00', 7, 'T'),
(36, 'tes2', 'tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2', 'tes2yoy@yahoo.com', 'Teknologi', '2014-09-09', '04:52:00', 7, 'F'),
(37, 'tes2', 'tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2tes2', 'tes2yoy@yahoo.com', 'Gadget', '2014-09-13', '10:43:00', 2, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE IF NOT EXISTS `tblkategori` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Gadget'),
(3, 'Open Source'),
(4, 'Internet');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategoritutorial`
--

CREATE TABLE IF NOT EXISTS `tblkategoritutorial` (
  `id_kategori_tutorial` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori_tutorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblkategoritutorial`
--

INSERT INTO `tblkategoritutorial` (`id_kategori_tutorial`, `nama_kategori`) VALUES
(1, 'Pemrograman'),
(2, 'Desain Grafis'),
(3, 'Maintenance PC'),
(4, 'Desain Web'),
(5, 'Tips Trik Linux');

-- --------------------------------------------------------

--
-- Table structure for table `tblkomentarberita`
--

CREATE TABLE IF NOT EXISTS `tblkomentarberita` (
  `id_komen_berita` int(3) NOT NULL AUTO_INCREMENT,
  `id_berita` varchar(30) NOT NULL,
  `judul_berita` varchar(30) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `num` int(2) NOT NULL,
  `id_detailkomentarberita` int(2) NOT NULL,
  PRIMARY KEY (`id_komen_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `tblkomentarberita`
--

INSERT INTO `tblkomentarberita` (`id_komen_berita`, `id_berita`, `judul_berita`, `nama_kategori`, `num`, `id_detailkomentarberita`) VALUES
(90, '7', 'Foxconn Kembangkan Motherboard', 'Teknologi', 0, 0),
(91, '2', 'iPhone Banyak Menuai Kecaman', 'Gadget', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblkontak`
--

CREATE TABLE IF NOT EXISTS `tblkontak` (
  `id_kontak` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblkontak`
--

INSERT INTO `tblkontak` (`id_kontak`, `nama`, `email`, `isi`, `tanggal`) VALUES
(5, 'tio', 'tioreza97@yahoo.com', 'tes', '2014-08-25'),
(6, 'asdas', 'd@yahoo.com', 'asdsa', '2014-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `username` varchar(100) NOT NULL,
  `psw` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`username`, `psw`, `nama`, `status`) VALUES
('tio', 'tioo', 'tio', 'admin'),
('oon', 'oonn', 'oon123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbltutorial`
--

CREATE TABLE IF NOT EXISTS `tbltutorial` (
  `id_tutorial` int(3) NOT NULL AUTO_INCREMENT,
  `id_kategori_tutorial` int(3) NOT NULL,
  `judul_tutorial` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `author` varchar(20) NOT NULL,
  `counter` int(3) NOT NULL,
  PRIMARY KEY (`id_tutorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tbltutorial`
--

INSERT INTO `tbltutorial` (`id_tutorial`, `id_kategori_tutorial`, `judul_tutorial`, `isi`, `gambar`, `tanggal`, `waktu`, `author`, `counter`) VALUES
(1, 1, 'Membuat Script Program Posting ke Twitter dengan PHP', 'Kamu punya account di Twitter dan kebetulan seorang programming? Anda baca di artikel yang tepat. Sebenarnya walaupun kamu bukan seorang programmer pun, kamu pasti akan mengerti beberapa potong baris kode PHP ini karena sangat mudah dimengerti dan diterapkan.\r\n\r\nSyarat untuk menjalankan program ini hanya cukup mempunyai satu server, baik server gratisan maupun server milik pribadi ataupun localhost asalkan ada Apache / IIS. Di bawah ini, saya akan berikan script php program untuk memposting / mengupdate aktivitas anda ke Twitter dengan PHP, gantikan saja username dan password serta message sesuai dengan apa yang kamu kehendaki:\r\n\r\nJika program ini berhasil dijalankan, maka postingan anda akan tampil di timeline Twitter kamu dan akan muncul pesan success, dan jika gagal, akan muncul pesan kesalahan. Hati-hati jika kamu mengcopy baris program php ini, terutama pada bagian quote (?). Jika ingin copy paste kode php ini, setelah kamu copy, periksa tanda tersebut, biasanya akan muncul kesalahan, jadi lebih baik untuk ketik ulang sesuai dengan baris diatas. Silahkan coba dijalankan atau dimodifikasi sehingga program ini akan lebih fleksibel dan mudah dipakai. Cara ini akan membuka wawasanmu betapa mudahnya bikin program untuk akses ke Twitter karena Twitter memang menyediakan API yang memudahkan user untuk melakukan login ke account secara gampang.\r\n', 'php-logo.jpg', '2014-08-05', '00:00:00', 'rudi', 5),
(2, 3, 'Mempercepat Dan Mengoptimalkan Proses Komputer Kita', 'Tidak ada salahnya menggunakan komputer apa adanya. Tentu saja, ada risikonya. Misalnya, komputer kian hari kian lambat. Padahal perawatan sudah dijalankan. Baik meng-update driver, menghapus file sampah, dan beragam perawatan rutin lain.Atau mungkin komputer berjalan stabil, namun suara yang ditimbulkannya sangat mengganggu. Masalah burn CD kadang juga membuat jengkel. Apalagi misalnya, CD tersebut hendak digunakan pada audio di mobil.Sebel memang jika PC tidak menuruti kemauan kita sebagai pemiliknya. Semua masalah yang mungkin timbul seperti di atas disebabkan PC yang liar. Seperti kuda dari padang rumput, sebelum digunakan harus dijinakkan terlebih dahulu. Agar kita terhindar dari ketidaknyamanan menungganginya.Berikut ini akan dijelaskan bagaimana cara menanggulangi berbagai permasalahan saat menggunakan PC, baik di rumah maupun di tempat kerja. Kami juga menambahkan cara penyelamatan data e-mail. Selamat mencoba!.\r\n\r\n<b>1. Percepat Booting dan Ringankan beban CPU</b>\r\nSeiring dengan waktu, lama kelamaan PC terasa makin lambat dan ?berat?. Apa saja yang dapat dilakukan untuk menanggulanginya?\r\nLangkah pertama mempercepat boot via BIOS. Untuk keterangan selengkapnya, Anda dapat melihatnya pada ?Menguak Tabir BIOS? di PC Media 04/2004 yang lalu.? Selanjutnya mulai ke area operating system. Untuk Windows XP, mulai dengan membuka System Configuration Utility. Pada tab BOOT.INI, beri tanda (P) pada ?/NOGUIBOOT?. Ini akan mempersingkat waktu boot dengan menghilangkan Windows startup screen. Pada tab Startup, seleksi ulang seminimal mungkin item yang sangat dibutuhkan. Hal yang sama juga dilakukan pada service yang dijalankan. Usahakan jumlah service yang ter-load tidak lebih dari 25.\r\n\r\n<b>2. Overclock</b>\r\nIni bagian yang paling menarik. Pada bagian ini kami akan memandu overclocking, dengan mengandalkan beberapa software yang bisa di-download gratis dari internet.\r\n\r\nOverclock Motheboard\r\nUntuk melakukan overclock terhadap motherboard sedikit berbeda. Anda harus menyesuaikan aplikasi sesuai dengan chipset motherboard. Di sini kami mengambil contoh overclocking dua buah motherboard. Pertama adalah motherboard dengan chipset nForce2.\r\n\r\n<b>3. Upgrade Processor</b>\r\nSebelum membeli sebuah processor baru, pastikan bahwa motherboard yang Anda miliki mampu mendukung calon processor baru Anda (lihat tabel ?Chipset dan Processor Support?). Selain itu, pastikan juga maksimum FSB untuk processor yang mampu didukung motherboard Anda. Hal ini juga berhubungan banyak dengan chipset yang digunakan pada motherboard Anda.\r\n\r\nSebagai contoh untuk processor Intel. Chipset Intel seri 845 hanya memiliki bus maksimal 533 MHz. Berbeda dengan chipset Intel 848 ataupun 875P yang sudah mampu bekerja dengan processor dengan bus 800 MHz.\r\n\r\nHal ini juga berlaku untuk processor AMD. Seperti VIA KT400 yang belum bisa bekerja dengan bus processor 400 MHz. Berbeda dengan KT600 yang sudah mampu bekerja pada bus processor 400 MHz.\r\n\r\nAda baiknya juga untuk memastikan produsen motherboard yang Anda gunakan menyediakan update BIOS pada situsnya. Terutama update BIOS untuk kecepatan processor yang terbaru. Update BIOS diperlukan sekiranya BIOS lama motherboard Anda belum mendukung (biasanya) multiplier processor terbaru.', 'hardware-logo.jpg', '2014-08-15', '00:00:00', 'rudi', 12),
(3, 1, 'Membuat Pilihan Tanggal Dengan Combo Box Pada PHP ', 'Biasanya ketika kita membuat suatu web, pastinya terdapat unsur taanggal bukan? Nah, disini saya akan menuliskan bagaimana cara membuatnya dengan bahasa PHP. Salah satu cara untuk memilih tanggal adalah menggunakan ComboBox. Tujuan dengan menggunakan ComboBox adalah untuk mempermudah user dalam memilih pilihan yang sudah disediakan. Hal ini juga menghindari kesalahan user dalam penulisan suatu', 'php-logo.jpg', '2014-08-08', '00:00:00', 'rudi', 21),
(4, 1, 'Membuat Hit Counter Dengan PHP', 'Pada artikel kali ini, aku akan men-share sedikit script PHP untuk membuat counter sederhana seperti yang terdapat di bagian footer website ini. Bagi kamu yang udah ngerasa expert, sebaiknya berhenti membaca sekarang juga, karna dari judulnya, kamu seharusnya tau bahwa kita cuma mo bikin counter simple. Cara kerja counter ini kurang lebih kayak gini: halaman utama dibuka-&gt;input ke ', 'php-logo.jpg', '2014-08-10', '00:00:00', 'yoyon', 24),
(6, 1, 'Membelah Web Dengan PHP Function', 'asanya tidak lengkap mempelajari bahasa pemrograman tanpa mempelajari apa yang di sebut dengan function. pengertian dari function sendiri adalah sub program yang terpisah dan dapat digunakan secara berulang-ulang. ini pengertian saya sendiri kok, karena saya biasa menggunakan function, lebih untuk menyederhanakan pembangunan program.\r\n\r\nDalam PHP juga ada function, terus ada tidak procedure nya? perbedaan antara function dan procedure adalah nilai keluaran dan sub program tersebut. Misalkan jika sub program tersebut di lengkapi dengan return maka subprogram tersebut adalah function, karena mengembalikan sebuah nilai, sedangkan jika tidak mengembalikan apa-apa, artinya tidak ada keyword return maka subprogram tersebut adalah procedure. Ini hanya untuk membedakan kok, pekerjaan dilapangan akan berbeda-beda dan menuntut penggunaan yang bervariasi, contohnya adalah mesin blog paling populer sejagad, yaitu wordpress.\r\n\r\nkita akan membuat sebuah function sederhana dengan menggunakan function, saya hanya memberikan konsep dasar function saja, nanti bisa dikembangkan sesuai kebutuhan.\r\n\r\n function cetak(){\r\n\r\n  $str="Belajar PHP dengan function";\r\n\r\n  return $str;\r\n\r\n }\r\n\r\n ?>\r\n\r\nArtinya function tersebut akan mengembalikan nilai berupa string. Tidak ada paramater yang disertakan. Contoh diatas adalah function yang paling sederhana. Jika dibuat menjadi procedure cukup dihilangkan keyword return, ganti dengan perintah echo untuk mencetak, maka hal itu bisa disebut dengan procedure. Cara menggunakannya bagaimana ?\r\n\r\n cetak();\r\n cetak();\r\n cetak();\r\n\r\nSedangkan function dengan menggunakan parameter adalah sebagai berikut\r\n\r\n function tambah($a,$b){\r\n  return $a+$b;\r\n }\r\n\r\nUntuk menggunakannya bagaimana ? seperti dibawah ini\r\n\r\n echo tambah(10,90); // menghasilkan 100\r\n echo tambah(18,50); // menghasilkan 68\r\n\r\nArtinya penggunaan function akan menjadi lebih fleksibel, banyak kreasi sehingga aplikasi yang dibuat menjadi lebih mudah dan cepat. Function bisa diartikan sebuah proses, anda bisa menyatukan semua proses-proses dalam sistem website anda dalam sebuah file yang berisi semua function, dan munkin anda bisa membuat framework sendiri. Dalam Wordpress juga seperti itu kok. Jadi jika anda sempat, pelajari function, terlebih anda akan mempelajari OOP.\r\nsemoga membantu.', 'php-logo.jpg', '2014-08-02', '10:56:18', 'yoyon', 37),
(7, 1, 'Kenapa Menggunakan Framework PHP Lebih Baik Dari Coding Manual?', '<p>Framework php disini adalah software yang dibuat dengan menggunakan PHP, nah software ini akan mempu membuat aplikasi web lain berbasis software framewrok tadi. Jadi semakin stabil, banyak feature dan mudah dikembangkan maka aplikasi web yang digunakan juga semakin bagus dan berkualitas. Dengan menggunakan framework php, kita bisa menghemat banyak waktu, karena semua fungsi-fungsi untuk pembuatan web sudah tersedia dan kita tinggal menggunakannya saja. <br /><br />Jika ada upgrade versi, kita tinggal mengupdate mesin frameworknya saja tanpa perlu menulis ulang program. Dengan diupgrage, framework menjadi lebih baik, mungkin saja ada fitur baru yang akan membuat aplikasi anda berjalan lebih optimal. Bekerja dengan framework php juga lebih terstruktur karena ada konsep MVC (model, visual, controller) yang membuat aplikasi web bisa dikerjakan banyak orang. Jadi dengan adanya framework php, apa kita ndak perlu belajar web lagi?<br /><br />Wah salah dunk kalau kayak gitu. Framework php itu didesain dengan sangat rumit, didalammnya full OOP, jadi harus paham terlebih dahulu konsep OOP di php, bisa baca OOP PHP bag 1, Membuat Object pada OOP dan Deklarasi hak akses pada OOP juga Inheritance pada OOP. Nah untuk sampai tahap OOP, harus melalui dulu apa yang disebut dengan pemrograman struktural. Disini masih perlu ikut kuliah pemrograman web, ha ha. Tapi untuk kedepannya, lebih baik fokus dengan framework, jauhkan sedikit ego anda sebagai programmer yang harus pure memakai produk sendiri. <br /><br />CMS juga menjadi perhatian tersendiri, karena CMS saat ini banyak digunakan karena mudah dan gratis. Nah, jika bisa mengutak-atik CMS, tahu dalemanya maka anda memiliki barang yang sangat bagus dan menarik. Tidak perlu coding dari awal lagi. SEO (search engine optimization) juga harus diperhatikan, karena ini faktor yang penting (kan nggak lucu kalau web anda sudah dirancang sedemikian baik, tapi sepi pengunjung). Ketiganya itu saya tidak mempelajarinya di kampus, dan sekarang saya sudah lulus, sedihnya. Jadi sebagai wejangan (halah.. sok tuwa he he), jika ingin bersaing di dunia web atau perusahaan besar, lebih baik perhatikan ketika elemen penting diatas, karena saat ini saya baru menyadari betapa pentingnya ketiga tersebut.<br /><br />Nah, framework php yang saya gunakan adalah Codeigniter, karena ini framework pertama yang saya pelajari dan langsung jatuh cinta sama Codeigniter.</p>', 'frame-work.jpg', '2014-08-08', '10:46:00', 'hadiq', 57);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
