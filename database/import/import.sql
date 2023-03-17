

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kategori_agenda` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_agenda` varchar(255) NOT NULL,
  `judul_agenda` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_agenda` varchar(20) NOT NULL,
  `jenis_agenda` varchar(20) NOT NULL,
  `keywords` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL DEFAULT 0,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `tempat` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO agenda (id_agenda, id_user, id_kategori_agenda, bahasa, slug_agenda, judul_agenda, isi, status_agenda, jenis_agenda, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, jam_mulai, jam_selesai, tempat, google_map, tanggal_post, tanggal_publish, tanggal) VALUES ('1','1','6','ID','latihan-agenda','Latihan Agenda','<div>
<h2>Why do we use it?</h2>

<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
</div>','Publish','Agenda','adad','0283beb3fc3eded016cceda7dc0201a2-1678274866.jpg','daad','0','','2022-01-01','2023-09-12','08:00:00','17:00:00','Institution Web Test','<iframe src="https://www.google.com/maps/d/embed?mid=1GUokYCi1RNUL7RfYXjALlBxR7tA&hl=en_US&ehbc=2E312F" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>','2020-09-12 23:46:53','2023-03-09 23:42:16','2023-03-09 19:14:09');

INSERT INTO agenda (id_agenda, id_user, id_kategori_agenda, bahasa, slug_agenda, judul_agenda, isi, status_agenda, jenis_agenda, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, jam_mulai, jam_selesai, tempat, google_map, tanggal_post, tanggal_publish, tanggal) VALUES ('2','1','4','ID','latihan-event','Latihan Event','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>','Publish','Event','adad','0283beb3fc3eded016cceda7dc0201a2-1678364022.jpg','daad','0','','2023-03-08','2023-03-09','08:00:00','17:00:00','Institution Web Test','<iframe src="https://www.google.com/maps/d/embed?mid=1GUokYCi1RNUL7RfYXjALlBxR7tA&hl=en_US&ehbc=2E312F" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>','2023-03-09 12:13:42','2023-03-09 12:12:11','2023-03-09 19:13:42');


CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT 0,
  `bahasa` enum('ID','EN') NOT NULL,
  `updater` varchar(32) DEFAULT '-',
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `jenis_berita` varchar(20) DEFAULT 'Berita',
  `keywords` text DEFAULT '',
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('8','1','0','ID','','kursus-wordpress-mastering-cms','Kursus Wordpress (Mastering CMS)','<h2>Deskripsi ringkas</h2>

<p>Anda akan belajar membangun website pribadi, perusahaan, toko online dengan platform CMS (Content Management System) Wordpress dan database MySQL. Kursus ini tidak memerlukan koding yang berat. Cocok untuk yang ingin membuat website instan dengan cepat.</p>

<hr />
<p>Anda akan belajar membangun website pribadi, perusahaan,&nbsp;<strong>toko online&nbsp;</strong>dengan platform&nbsp;<strong>CMS (<em>Content Management System)&nbsp;</em>Wordpress</strong>&nbsp;dan database MySQL. Kursus ini tidak memerlukan koding yang berat. Cocok untuk yang ingin membuat website instan dengan cepat.</p>

<h2><a name="_Toc32320282"></a>Materi kursus</h2>

<p>Anda akan mempelajari hal-hal berikut ini:</p>

<ul>
	<li>Dasar-dasar HTML5, CSS3 dan Bootstrap</li>
	<li>Pembuatan website profil perusahaan dengan Wordpress</li>
	<li>Pembuatan website&nbsp;<strong><em>online store</em></strong>&nbsp;dengan Wordpress dengan plugin Woocommerce</li>
</ul>

<h2><a name="_Toc32320283"></a>Tujuan Kursus</h2>

<p>Setelah Anda belajar&nbsp;di&nbsp;<strong>Kursus Web Design</strong>, Anda dapat:</p>

<ul>
	<li>Mengelola konten website dengan CMS.</li>
	<li>Membangun website profil perusahaan dan&nbsp;<strong><em>online store</em></strong>&nbsp;dengan CMS Wordpress</li>
	<li>Bekerja sebagai&nbsp;<strong>Content Creator dan Admin Toko Online.</strong></li>
</ul>

<h2><a name="_Toc32320284"></a>Urutan materi</h2>

<ol>
	<li>Installasi Software pendukung</li>
	<li>Dasar-dasar layouting dengan HTML dan CSS</li>
	<li>Installasi CMS Wordpress</li>
	<li>Pembuatan website&nbsp;<strong><em>company profile</em></strong></li>
	<li>Mengelola plugin, widget dan menu</li>
	<li>Memilih, mengelola dan mengubah template Wordpress</li>
	<li>Pembuatan toko online dengan Plugin Woocommerce</li>
	<li>Pengelolaan konten website, produk dan order toko online</li>
	<li>Optimasi website Wordpress</li>
	<li>Security website Wordpress</li>
	<li>Pendaftaran website&nbsp;<em>Google Webmaster, Google Anayltic dan Google Business</em></li>
</ol>

<h2><a name="_Toc32320285"></a>Software yang digunakan</h2>

<p>XAMPP, Sublime Text/Notepad/Visual Studio, Browser, Aplikasi pengolah gambar</p>

<h3>&nbsp;</h3>','Publish','Layanan','Anda akan belajar membangun website pribadi, perusahaan, toko online dengan Wordpress. Kursus ini tidak memerlukan koding yang berat. Cocok untuk membuat website instan dengan cepat.','free-wordpress-courses-1678077067.jpg','fa fa-globe','82','3','','','2020-01-16 08:04:58','2020-01-16 08:01:54','2023-03-06 11:31:07');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('9','1','0','ID','','kursus-advanced-web-programming','Kursus Advanced Web Programming','<h2>Deskripsi ringkas</h2>

<p>Anda akan belajar membangun aplikasi berbasis website (web based application) dengan menggunakan bootstrap, framework JavaScript, PHP framework Codeigniter/Laravel dan database MySQL.</p>

<hr />
<p>Anda akan belajar membangun&nbsp;<strong>aplikasi berbasis website (<em>web based application</em>)</strong>&nbsp;dengan menggunakan bootstrap, framework JavaScript,&nbsp;<strong><em>PHP framework</em></strong><em>&nbsp;<strong>Codeigniter/Laravel&nbsp;</strong></em>dan database MySQL.</p>

<h2><a name="_Toc32320307"></a>Materi kursus</h2>

<p>Anda akan mempelajari hal-hal berikut ini:</p>

<ul>
	<li>Membangun aplikasi berbasis website</li>
	<li>Membuat laporan dengan berbagai format (PDF, Excel, Word dll)</li>
	<li>Membangun web service (API)</li>
	<li>Membangun aplikasi web dengan berbagai database (MySQL, Oracle, SQL Server, PostgreSQL dll)</li>
	<li><strong><em>Data visualization</em></strong>&nbsp;(format grafik dan peta digital)</li>
</ul>

<h2><a name="_Toc32320308"></a>Tujuan Kursus</h2>

<p>Setelah Anda belajar&nbsp;di&nbsp;<strong>Kursus Web Development</strong>, Anda akan dapat:</p>

<ul>
	<li>Membangun aplikasi kompleks berbasis web dengan berbagai database</li>
	<li>Bekerja sebagai&nbsp;<strong>&nbsp;Senior Web Web Developer.</strong></li>
</ul>

<h2><a name="_Toc32320309"></a>Urutan materi</h2>

<ol>
	<li>Installasi Software pendukung</li>
	<li>Merencanakan, membuat &amp; mengelola database MySQL</li>
	<li>Integrasi template&nbsp;<em>front end&nbsp;</em>dan&nbsp;<em>back end&nbsp;</em>dengan framework PHP</li>
	<li>Authentication (Login, Logout &amp; Proteksi Halaman)</li>
	<li>CRUD&nbsp;<em>(Create, Read, Update &amp; Delete)&nbsp;</em>Dasar</li>
	<li>CRUD Kompleks dengan relasi database</li>
	<li>Membuat berbagai jenis laporan (PDF, Excel, Word, Web Service/API, dll)</li>
	<li>Membuat data visualization (Grafik dan Peta Digital)</li>
	<li>Security review atas aplikasi yang telah dibuat</li>
	<li>Version control dengan Git</li>
	<li>Upload web ke hosting atau meng-onlinekan website</li>
</ol>

<h2><a name="_Toc32320310"></a>Software yang digunakan</h2>

<p>XAMPP, Sublime Text/Notepad/Visual Studio, Browser, Aplikasi pengolah gambar, Composer dll.</p>','Publish','Layanan','Anda akan belajar membangun aplikasi berbasis website (web based application) dengan menggunakan bootstrap, framework JavaScript, PHP framework Codeigniter/Laravel dan database MySQL.','why-laravel-1678076925.jpg','fa fa-laptop','69','2','','','2020-01-16 08:08:16','2020-01-16 08:07:46','2023-03-06 11:28:45');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('18','1','0','ID','-','kursus-web-development','Kursus Web Development','<h2>Deskripsi ringkas</h2>

<p>Anda akan belajar membangun website profil perusahaan dengan menggunakan bootstrap, framework JavaScript, PHP framework Codeigniter / Larevel dan database MySQL.</p>

<hr />
<p>Anda akan belajar membangun website&nbsp;<strong>profil perusahaan</strong>&nbsp;dengan menggunakan bootstrap, framework JavaScript,&nbsp;<strong><em>PHP framework</em></strong><em>&nbsp;<strong>Codeigniter / Laravel</strong></em>&nbsp;dan database MySQL.</p>

<h2><a name="_Toc32320297"></a>Materi kursus</h2>

<p>Anda akan mempelajari hal-hal berikut ini:</p>

<ul>
	<li>Dasar-dasar HTML, CSS dan Bootstrap</li>
	<li>Mengembangkan website profil perusahaan dengan framework Codeigniter / Laraveldan database MySQL</li>
	<li>Integrasi framework JavaScript dengan Codeigniter / Laravel</li>
</ul>

<h2><a name="_Toc32320298"></a>Tujuan Kursus</h2>

<p>Setelah Anda belajar&nbsp;di&nbsp;<strong>Kursus Web Development</strong>, Anda akan dapat:</p>

<ul>
	<li>Membuat website profil perusahaan (<em>company profile</em>) dengan framework Codeigniter / Laravel dan database MySQL</li>
	<li>Aplikasi pendaftaran online sederhana</li>
	<li>Bekerja sebagai&nbsp;<strong>&nbsp;Web Programmer&nbsp;</strong>atau&nbsp;<strong>Web Developer dengan keahlian Bootstrap, HTML, CSS, JavaScript dan framework Codeigniter / Larevel.</strong></li>
</ul>

<h2><a name="_Toc32320299"></a>Urutan materi</h2>

<ol>
	<li>Installasi Software pendukung</li>
	<li>Dasar-dasar HTML, CSS dan Bootstrap</li>
	<li>Membuat&nbsp;<em><strong>Brief project ,&nbsp;</strong></em>yaitu merencanakan website yang akan dibuat sehingga nantinya bisa diwujudkan menjadi website sebenarnya</li>
	<li>Merencanakan, membuat dan mengelola database MySQL</li>
	<li>Integrasi template&nbsp;<em>front end&nbsp;</em>dan&nbsp;<em>back end&nbsp;</em>dengan framework Codeigniter / Laravel</li>
	<li>Authentication (Login, Logout &amp; Proteksi Halaman)</li>
	<li>CRUD&nbsp;<em>(Create, Read, Update &amp; Delete)&nbsp;</em>Dasar</li>
	<li>CRUD Kompleks dengan relasi database</li>
	<li>Laporan PDF dengan MPDF</li>
	<li>Security review atas aplikasi yang telah dibuat</li>
	<li>Upload web ke hosting atau meng-onlinekan website</li>
</ol>

<h2><a name="_Toc32320300"></a>Software yang digunakan</h2>

<p>XAMPP, Sublime Text/Notepad/Visual Studio, Browser, Aplikasi pengolah gambar, Composer dll.</p>','Publish','Layanan','Anda akan belajar membangun website profil perusahaan dengan menggunakan bootstrap, framework JavaScript, PHP framework Codeigniter / Larevel dan database MySQL.','laravel-tutorial-1678076799.png','','','1','','','2020-09-15 23:29:49','2020-09-15 23:29:03','2023-03-06 11:26:39');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('19','1','6','ID','-','tips-menerima-proyek-website-untuk-pemula','TIPS MENERIMA PROYEK WEBSITE UNTUK PEMULA','<h2>Kenapa ada Tips ini?</h2>

<p>Banyak teman-teman Programmer pemula yang belum memiliki keberanian untuk mulai menerima proyek website. Mudah-mudahan dengan Tips sederhana ini, teman-teman semua mulai berani&nbsp;<strong>Belajar yang dibayarin&nbsp;</strong>dengan menerima Proyek Web.<br />
Semoga Bermanfaat ya.</p>

<p>Untuk mendapatkan Konsultasi &amp; Contoh dokumen pendukung (Kontrak, Proposal, Catatan Kebutuhan dll), silakan kontak:<br />
<strong>Test (081211111)</strong></p>

<p><img alt="" src="https://krepito.com/wp-content/uploads/2016/07/Manfaat-Website-Company-Profile-dan-Jasa-Pembuatan-Website-720x460.png" /></p>

<p>#1 Catat kebutuhan client</p>

<h2>#1 Catat kebutuhan client</h2>

<p>Diskusikan kebutuhan dari client yang sesungguhnya.</p>

<ul>
	<li><strong>Tanyakan kebutuhannya</strong>&nbsp;apa saja, mulai dari websitenya untuk apa, fiturnya apa dsb. Jika ada yang kurang jelas, tanyakan.</li>
	<li><strong>Buat Catatan</strong>&nbsp;dari hasil diskusi tersebut</li>
	<li><strong>Bagikan Catatan</strong>&nbsp;tersebut kepada calon client, minta respon dan feedbacknya untuk mengkonfirmasi kebutuhan.</li>
</ul>

<p><strong>NOTE</strong>: Hindari memberikan perkiraan biaya pada client di tahap ini. Lihat&nbsp;<strong>#2 Buat estimasi biaya</strong></p>

<p>#2&nbsp;Buat Estimasi Biaya</p>

<h2>#2&nbsp;Buat Estimasi Biaya</h2>

<p>Setelah berhasil memetakan kebutuhannya, buatlah estimasi biaya.</p>

<ul>
	<li>Hitung&nbsp;<strong>waktu pengerjaan</strong>&nbsp;per-fitur dari aplikasi/website tersebut. Konversi dalam jam.</li>
	<li>Hitung kira-kira Anda mau&nbsp;<strong>dibayar berapa perjam</strong>&nbsp;dalam mengerjakan website tersebut</li>
	<li><strong>Buat akumulasi</strong>&nbsp;dari perhitungan biaya tersebut&nbsp;<strong>ditambah minimal 30%</strong>. Misal Anda menghitung totalnya Rp.1.000.000, maka nilai proyeknya minimal adalah Rp.1.300.000</li>
</ul>

<p><strong>NOTE:&nbsp;</strong>Jika client bertanya berapa biayanya. Jawab<strong>&nbsp;&ldquo;Kami akan kirimkan proposal ya pak/bu&rdquo;</strong>.</p>

<p>#3&nbsp;Kirimkan Proposal</p>

<h2>#3&nbsp;Kirimkan Proposal</h2>

<p>Buat penawaran dengan Proposal yang menarik. Isinya minimal adalah:</p>

<ul>
	<li>Halaman&nbsp;<strong>Cover yang bagus</strong></li>
	<li>Surat penawaran.&nbsp;<strong><em>Buat minimal 2 pilihan</em></strong><strong>&nbsp;</strong>harga, misal:&nbsp;<strong>Paket 1 Website Lengkap Rp. 1.300.000</strong>, lalu&nbsp;<strong>Paket 2 Website Lengkap &amp; Hosting Unlimeted Rp. 2.000.000,&nbsp;</strong>dan&nbsp;<strong>Paket 3 Website Lengkap, Hosting Unlimited &amp; Manual Book/Traing Rp. 2.500.000</strong>&nbsp;dst. Ini membuat client memilih dengan bantuan Anda</li>
	<li><strong>Kirimkan proposal</strong>&nbsp;dengan baik dan sopan. Beri tahu calon client jika sudah dikirim.</li>
	<li>Proposal dikirim sebaiknya&nbsp;<strong>tidak lebih dari 3 hari&nbsp;</strong>sejak diskusi kebutuhan dilakukan</li>
</ul>

<p>#4&nbsp;Perjanjian Kerjasama</p>

<h2>#4&nbsp;Perjanjian Kerjasama</h2>

<p>Setelah&nbsp;<strong>Proposal Disetujui</strong>&nbsp;dan&nbsp;<strong>Disepakati&nbsp;</strong>besaran biaya dari proyek, maka buatlah&nbsp;<strong>Kontrak kerja</strong>. Isinya minimal adalah?</p>

<ul>
	<li><strong>Skup pekerjaan</strong>, buat rincian mendetail.</li>
	<li><strong>Durasi Pekerjaan</strong>, misalnya 30 hari</li>
	<li><strong>Termin Pembayaran</strong>, misalnya 2x pembayaran. DP Awal 50% dan 50% setelah serah terima.</li>
	<li>Sepakati jika ada&nbsp;<strong>pekerjaan tambahan&nbsp;</strong>bagaimana? Tambah biayakah?</li>
</ul>

<p>Biasanya kontrak kerja sederhana antara 1-2 halaman A4. Ga banyak kan? Bisa menggunakan materai, bisa juga tidak. Sepakati bersama saja dengan client ya. Buat minimal 2 salinan kontrak kerja, 1 untuk Anda dan 1 untuk client.</p>

<p>#5&nbsp;Buat Invoice yang Baik</p>

<h2>#5&nbsp;Buat Invoice yang Baik</h2>

<p>Hindari menagih client hanya dengan melalui telepon atau pesan chatting (misal via WA).<br />
Maka,&nbsp;<strong>buatlah invoice yang baik</strong>. Sekaligus untuk branding diri Anda. Isinya minimal:</p>

<ul>
	<li><strong>Ditujukan ke siapa?&nbsp;</strong>Tulis nama client dengan benar</li>
	<li><strong>Tagihan Termin keberapa</strong>? Lihat Kontrak Kerja</li>
	<li><strong>Besar tagihan berapa</strong>? Tulisa angka dan terbilangnya. Mis:&nbsp;<strong>Rp. 1.000 (Seribu rupiah)</strong></li>
	<li><strong>Itu Duit Dikirim kemana?</strong>&nbsp;Cantumkan nomor rekening lengkap jika pembayaran diharapkan via transfer</li>
	<li><strong>Tanda tangan dan nama jelas Anda</strong></li>
</ul>

<p>#6&nbsp;Laporkan Perkembangan</p>

<h2>#6&nbsp;Laporkan Perkembangan</h2>

<p>Selalu laporkan perkembangan pekerjaan Anda. Jangan menunggu client menelpon Anda baru membuat laporan.</p>

<ul>
	<li>Buat&nbsp;<strong>Periode Laporan</strong>, misalnya 3 hari sekali</li>
	<li>Tetap&nbsp;<strong>Laporkan Meskipun tidak ada perkembangan</strong>.</li>
	<li><strong>Selalu berkomunikasi</strong>&nbsp;dan diskusikan dengan client jika ada kesulitan yang Anda alami.</li>
	<li><strong>Selesaikan dengan bertanggung jawab</strong>. Selesaikan pekerjaan Anda, bahkan jika terpaksa harus dilimpahkan ke orang lain, selesaikan dengan baik-baik.</li>
</ul>

<p>Mulailah belajar membuat pola atau format laporan yang menjadi ciri khas Anda. Bisa via chat atau bahkan dengan file PDF yang menarik.</p>

<p>#7&nbsp;Training &amp; Manual Book</p>

<h2>#7&nbsp;Training &amp; Manual Book</h2>

<p>nda tentu akan capek jika setelah serah terima Client atau staffnya berkali-kali menelpon Anda menanyakan bagaimana cara mengupdate websitenya. Ga enak kan? Oleh karena itu:</p>

<ul>
	<li>Sediakan&nbsp;<strong>Training Client/Staff</strong>, ini bisa Anda cantumkan dalam estimasi harga. Perhitungkan biaya training staff.</li>
	<li>Buat&nbsp;<strong>Manual Book</strong>&nbsp;atau bahkan&nbsp;<strong>Video Panduan</strong>&nbsp;cara mengoperasikan website yang Anda buat yang bisa diakses langsung di website mereka.</li>
</ul>

<p>Ini akan mempermudah pekerjaan Anda mendatang</p>

<p>#8&nbsp;Serah Terima Pekerjaan</p>

<h2>#8&nbsp;Serah Terima Pekerjaan</h2>

<p>Akhirnya selesai juga proyeknya. Nah saatnya menyerahkan hasil pekerjaan Anda kepada client.<br />
Apa saja yang sebaiknya Anda serahkan?</p>

<ul>
	<li>Data&nbsp;<strong>Akses Username Password&nbsp;</strong>akun Hosting dan website</li>
	<li><strong>Source Code</strong>, semuanya. Berikan kepada client</li>
	<li><strong>Dokumentasi Pekerjaan</strong>, mulai dari foto, kontrak dll</li>
	<li><strong>Manual Book</strong>&nbsp;dan&nbsp;<strong>Video Panduan</strong>&nbsp;(jika ada). Serahkan kepada client. Bila perlu cetak Manual Book tadi.</li>
	<li>Jaga selalu&nbsp;<strong>Hubungan Baik</strong>&nbsp;dengan client</li>
</ul>

<p>#9&nbsp;Berdoa &amp; Bersyukur</p>

<h2>#9&nbsp;Berdoa &amp; Bersyukur</h2>

<p>Selalu berdoa dan bersyukur, telah diperkenalkan pada Client yang baik.<br />
Diberi kesempatan untuk belajar sekaligus bekerja. Maka sudah sepatutnya kita Selalu Berdoa dan Bersyukur pada Tuhan Yang Maha Esa.</p>','Publish','Berita','TIPS MENERIMA PROYEK WEBSITE UNTUK PEMULA','test7-1678191278.jpg','','','2','','','2020-09-15 23:43:00','2020-09-15 23:41:16','2023-03-07 19:14:38');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('21','1','6','ID','-','3-alasan-kenapa-css-js-sebaiknya-di-minify','3 Alasan Kenapa CSS & JS sebaiknya di-Minify?','<p>Minification is the process of minimizing code and markup in your web pages and script files. It&rsquo;s one of the main methods used to reduce load times and bandwidth usage on websites.</p>

<p><img alt="" src="https://krepito.com/wp-content/uploads/2016/07/Manfaat-Website-Company-Profile-dan-Jasa-Pembuatan-Website-720x460.png" /></p>

<p>CSS Minify</p>

<p>Minification dramatically improves site speed and accessibility, directly translating into a better user experience. It&rsquo;s also beneficial to users accessing your website through a limited data plan and who would like to save on their bandwidth usage while surfing the web.</p>

<p>Sumber: https://www.imperva.com/learn/performance/minification</p>

<p>Kode dikompres</p>

<h2>Kenapa &ldquo;.min&rdquo;?</h2>

<p>Nama &ldquo;<strong>.min</strong>&rdquo; sebelum ekstensi file (misal&nbsp;<strong>bootstrap.min.css</strong>&nbsp;atau&nbsp;<strong>bootstrap.min.js</strong>) menunjukkan dia adalah &ldquo;<strong>minify version</strong>&rdquo; yang artinya?</p>

<ul>
	<li><strong>Kode telah dikompres</strong>, bahkan spasi pun dibuang</li>
	<li><strong>Ukuran file jadi lebih kecil</strong>&nbsp;dibanding dengan yang &ldquo;<strong>Non Minify</strong>&ldquo;</li>
</ul>

<h2>Sebaiknya gunakan &ldquo;minify&rdquo;</h2>

<p>Ada banyak alasan kenapa saat Anda membuat web sebaiknya menggunakan CSS &amp; Javascript versi minify.</p>

<p>Postingan berikutnya kita akan bahas bagaimana &ldquo;<strong>Cara membuat minify CSS &amp; Javascript&rdquo;&nbsp;</strong>yaa.</p>

<p>Ukuran File Jadi Kecil</p>

<h2>#1 Ukuran File Jadi Kecil</h2>

<p>File CSS &amp; JavaScript yang di-<strong>minify</strong>&nbsp;pasti ukurannya lebih kecil. Hampir semua spasi, komentar dan dokumentasi akan dibuang saat dilakukan &ldquo;<strong>minification</strong>&ldquo;, sehingga file lebih compact.</p>

<p>Dengan&nbsp;<strong>minification&nbsp;</strong>ukuran&nbsp;<strong>Javascript&nbsp;</strong>bisa&nbsp;<strong>48</strong>% lebih kecil dan&nbsp;<strong>CSS&nbsp;</strong>bisa&nbsp;<strong>60</strong>% dari ukuran asli. Mantap kan?</p>

<p>Lebih cepat diakses</p>

<h2>#2 Website jadi lebih cepat diakses</h2>

<p>Karena ukuran file menjadi kecil, maka loading website menjadi lebih cepat. Ini adalah salah satu teknik&nbsp;<strong>Front End Optimization&nbsp;</strong>(FEO)<strong>.&nbsp;</strong>Dampaknya, ukuran website secara keseluruhan juga akan lebih kecil dan ringan.</p>

<p>Hemat Bandwidth</p>

<h2>#3&nbsp;Hemat Bandwith dan Space Hosting/Server</h2>

<p>Karena ukuran file menjadi kecil, space hosting/server Anda menjadi lebih lega. Bandwidth juga jadi lebih hemat.</p>','Publish','Berita','Minification is the process of minimizing code and markup in your web pages and script files. It’s one of the main methods used to reduce load times and bandwidth usage on websites.','test2-1678088375.png','','','1','','','2020-09-15 23:57:11','2020-09-15 23:56:44','2023-03-06 14:41:03');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('22','1','8','ID','-','7-konten-website-company-profile-yang-harus-anda-minta-ke-client-atau-anda-buat','7  Konten Website Company Profile yang Harus Anda Minta ke Client (atau Anda Buat)','<p><strong>&ldquo;Konten&nbsp;website menjadi salah satu Bagian Paling Lama dalam Pengerjaan Proyek Website.&rdquo; </strong></p>

<p>Di posting sebelumnya Anda sudah belajar bagaimana mempersiapkan Proposal dan Kontrak Kerja.&nbsp;</p>

<p>Nah,&nbsp;pada tahap ini Anda mulai bekerja. Anda akan belajar mempersiapkan konten apa saja yang harus&nbsp;<strong>Anda minta ke client&nbsp;</strong>atau&nbsp;<strong>Anda buat sendiri</strong>&nbsp;untuk membuat sebuah website&nbsp;<strong>Company Profile.</strong></p>

<p>Buatlah list kebutuhan konten ini, kemudian kirimkan ke Client. Tanyakan kapan konten tersebut bisa tersedia.</p>

<p>Nah, agar nyambung silakan membaca ini dulu yah:</p>

<ol>
	<li><a href="javascript:;">Tips Menerima Proyek Website untuk Pemula</a></li>
	<li><a href="javascript:;">#1 Catat Kebutuhan Client: 6 Pertanyaan yang harus diajukan ke Client</a></li>
	<li><a href="javascript:;">#2 Buat Estimasi Biaya: 6 Biaya Proyek Website&nbsp;yang Harus Dihitung oleh Web Programmer Pemula</a></li>
	<li><a href="javascript:;">#3 Kirimkan Proposal: 5 Isi Proposal Website untuk Calon Client</a></li>
	<li><a href="javascript:;">#4 Perjanjian Kerjasama: 4 Isi Kontrak Kerja</a></li>
</ol>

<p><img alt="" src="https://krepito.com/wp-content/uploads/2016/07/Manfaat-Website-Company-Profile-dan-Jasa-Pembuatan-Website-720x460.png" /></p>

<h2><strong>#1 Nama website &amp; Slogannya</strong></h2>

<p>Tanyakan ke client apa nama website dan slogan yang akan digunakan. Contoh:</p>

<ul>
	<li><strong>Nama website:</strong>&nbsp;<strong>Dokter Mobil</strong></li>
	<li><strong>Slogan:</strong>&nbsp;<strong>Bengkel Mobil Terdekat &ndash; Spesialis Upgrade Performance</strong></li>
</ul>

<h2><strong>#2 Logo &amp; Icon Website</strong></h2>

<p>Mintalah ke client&nbsp;<strong>Logo &amp; Icon&nbsp;</strong>yang akan digunakan di dalam website mereka. Mintalah logo dengan resolusi setidaknya&nbsp;<strong>1.080 pixel</strong>, atau bahkan jika memiliki file vectornya, mintalah. Logo &amp; icon dengan format vector tentu lebih mudah untuk Anda olah.</p>

<h2><strong>#3 Data Profil Website</strong></h2>

<p>Profil website atau&nbsp;<strong>About Us</strong>&nbsp;dari website harus ada. Mintalah antara lain:</p>

<ul>
	<li><strong>Sejarah</strong>/profil</li>
	<li><strong>Visi &amp; Misi</strong></li>
	<li><strong>Kontak (</strong>alamat, telepon, HP, email dst)</li>
	<li>Link akun&nbsp;<strong>media sosial</strong></li>
	<li><strong>Team</strong>&nbsp;(Nama, foto, jabatan &amp; deskripsi)</li>
	<li><strong>Value</strong>&nbsp;(nilai lebih) perusahaan</li>
	<li>Data&nbsp;<strong>brand color&nbsp;</strong>(warna resmi) perusahaan. Misal&nbsp;<strong>Indosat&nbsp;</strong>identik dengan warna hijau dan kuning dst</li>
	<li>Dan konten pendukung lainnya</li>
</ul>

<h2><strong>#4 Produk &amp; Layanan</strong></h2>

<p>Minta juga data produk &amp; layanan mereka, yang meliputi:</p>

<ul>
	<li><strong>Nama</strong>&nbsp;produk/layanan</li>
	<li><strong>Harga&nbsp;</strong>produk/layanan</li>
	<li><strong>Deskripsi&nbsp;</strong>ringkas &amp; lengkapnya</li>
	<li><strong>Harga/Biaya&nbsp;</strong>produk &amp; layanan</li>
	<li><strong>Kategori Produk</strong></li>
	<li><strong>Gambar/Video&nbsp;</strong>pendukung produk/layanan yang akan dipasarkan</li>
</ul>

<p>Mintalah mereka untuk menyiapkan konten tersebut sebaik-baiknya.</p>

<h2><strong>#5 Berita &amp; Article</strong></h2>

<p>Minta setidaknya 2 konten berita/article untuk mengisi website yang isinya berkaitan erat dengan website yang akan dibangun:</p>

<ul>
	<li><strong>Judul&nbsp;</strong>artikel/berita</li>
	<li><strong>Deskripsi&nbsp;</strong>artikel/berita</li>
	<li><strong>Kategori&nbsp;</strong>artikel/berita</li>
	<li><strong>Gambar/Video&nbsp;</strong>artikel/berita</li>
</ul>

<p>Panjang artikel ini setidaknya 2 paragraf.</p>

<h2><strong>#6 File Pendukung</strong></h2>

<p>Mintalah file-file pendukung website, antara lain:</p>

<ul>
	<li>Foto-foto&nbsp;aktivitas perusahaan</li>
	<li>Video</li>
	<li>File-file pendukung (Misal: Pricelist, Leaflet, Brosur dsb)</li>
	<li>Gambar-gambar ilustrasi</li>
	<li>Dsb</li>
</ul>

<h2><strong>#7 Portofolio Client</strong></h2>

<p>Client biasanya sudah pernah mengerjakan pekerjaan sesuai produk &amp; layanan yang mereka miliki. Mintalah data-data client &amp; informasi atas portofolio tersebut.</p>

<p>Mintalah nama client mereka, nama pekerjaan, deskripsi ringkasnya jika perlu dan foto-fotonya.</p>','Publish','Berita','7  Konten Website Company Profile yang Harus Anda Minta ke Client (atau Anda Buat)','test1-1678087661.png','','','1','','','2020-09-16 00:01:35','2020-09-15 23:59:58','2023-03-06 14:27:41');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('23','4','0','ID','-','layanan-konsultasi-strategis','Layanan Konsultasi Strategis','<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Layanan Konsultasi kami ideal untuk Anda saat membutuhkan dukungan dalam menyelaraskan tujuan strategis keberlanjutan perusahaan Anda dengan penatalayanan air yang baik dan mengembangkan rencana untuk tindakan tingkat wilayah operasional dan daerah tangkapan air. </span></span></p>

<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Dari menilai kesiapan wilayah operasional Anda terhadap Standar AWS, hingga penilaian risiko air dalam rantai pasokan dan mengembangkan peta jalan menuju tindakan pengelolaan air yang baik di lokasi, rantai pasokan, dan tingkat daerah tangkapan, kami dapat membantu Anda dalam perjalanan. </span></span></p>

<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Kami bekerja sama dengan penyedia layanan terakreditasi, kredensial profesional, dan terlatih AWS, bergantung pada kebutuhan spesifik perusahaan Anda. Ingin tahu lebih banyak? Hubungi kami dan untuk sesi konsultasi terbuka.</span></span></p>','Publish','Terjadi','Layanan Konsultasi Strategis','26-image-section-aws-indonesia-contact-1600218408.jpg','','','1','','','2020-09-16 01:06:48','2020-09-16 01:06:08','2020-09-16 08:06:48');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('24','4','0','ID','-','pelatihan-standar-dan-sistem-aws','Pelatihan Standar dan Sistem AWS','<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Program pelatihan Standar dan Sistem AWS interaktif selama 1, 2, dan 3 hari mencakup presentasi, studi kasus, serta latihan individu dan kelompok. </span></span></p>

<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Berhasil menyelesaikan program pelatihan Spesialis memungkinkan Anda memenuhi syarat untuk menjadi penyedia layanan AWS yang terakreditasi, sebagai auditor, pelatih, dan konsultan. Ini juga mendukung Anda untuk membangun kapasitas internal untuk mengelola dan mengimplementasikan penatalayanan air dan sertifikasi AWS. Kami memberikan pelatihan dalam Bahasa Indonesia dan Bahasa Inggris.</span></span></p>','Publish','Terjadi','Pelatihan Standar dan Sistem AWS','26-image-section-aws-indonesia-contact-1600218481.jpg','','','','','','2020-09-16 01:08:01','2020-09-16 01:07:31','2020-09-16 08:08:01');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('25','4','0','ID','-','studi-kasus','Studi Kasus','<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Jelajahi studi kasus Indonesia dan contoh penerapan penatalayanan air yang baik di seluruh Indonesia dari berbagai sektor.</span></span></p>

<ul>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Natural Rubber 2019 Hevea |</span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Natural Rubber Processing Site Online Survey 2019 Hevea I</span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Hospitality Sector Hotel Indigo Seminyak IHG |</span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">GAA Hevea Connect<strong>&nbsp;|&nbsp;</strong></span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Brantas mapping |&nbsp;</span></span></li>
</ul>','Publish','Materi','Studi Kasus','','','','1','','','2020-09-16 01:26:05','2020-09-16 01:23:28','2020-09-16 08:26:05');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('26','4','0','ID','-','platform-e-tools-untuk-anggota-aws','Platform e-Tools untuk Anggota AWS','<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Cari tahu lebih lanjut tentang e-standar AWS, Panduan juga Modul Pembelajaran Online penatalayanan air di <a href="https://tools.a4ws.org/my-account/subscriptions/" style="color:#0563c1; text-decoration:underline">AWS Tool Hub</a>. Akses gratis untuk semua Anggota AWS dan non-anggota dapat membayar biaya untuk membuat akun.</span></span></p>','Publish','Materi','Platform e-Tools untuk Anggota AWS','','','','','','','2020-09-16 01:28:44','2020-09-16 01:27:50','2020-09-16 08:28:44');

INSERT INTO berita (id_berita, id_user, id_kategori, bahasa, updater, slug_berita, judul_berita, isi, status_berita, jenis_berita, keywords, gambar, icon, hits, urutan, tanggal_mulai, tanggal_selesai, tanggal_post, tanggal_publish, tanggal) VALUES ('27','4','0','ID','-','webinars','Webinars','<p><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Dapatkan wawasan Anda mengenai Standar dan Sistem AWS melalui webinar AWS dan diskusi penting lainnya tentang topik penatalayanan air di Indonesia.</span></span></p>

<ul>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">World Water Development Report 2020 Launch by UNESCO &amp; Climate Tracker </span></span><br />
	<span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Lainnya: <a href="https://unesdoc.unesco.org/ark:/48223/pf0000372985.locale=en" style="color:#0563c1; text-decoration:underline">Laporan</a></span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">GWPSEA Webinar COVID-19 Belajar dari Krisis untuk Pengelolaan Air Terpadu yang Lebih<br />
	Rekaman: <a href="https://www.facebook.com/GlobalWaterPartnershipSoutheastAsia/videos/271658824268924/?_rdc=1&amp;_rdr" style="color:#0563c1; text-decoration:underline">Tersedia</a></span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Air Tanah untuk Tanah Air</span></span><br />
	<span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Rekaman: <a href="bit.ly/youtube-airtanah" style="color:#0563c1; text-decoration:underline">Tersedia</a></span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Online Consultation &ndash; the Principles for Addressing Water-related Disaster Risk Reduction and COVID-19 </span></span><br />
	<span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Lainnya: <a href="https://www.gwp.org/en/GWP-South-East-Asia/WE-ACT/keep-updated/News-and-Activities/2020/help-gwp-pan-asia-consultation-meeting/" style="color:#0563c1; text-decoration:underline">Summary</a></span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">AWS Member Webinars: Spotlight on Indonesia Brantas River Basin, East Java</span></span><br />
	<span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Rekaman: <a href="https://register.gotowebinar.com/recording/4530186227396155147" style="color:#0563c1; text-decoration:underline">Tersedia</a></span></span></li>
	<li><span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">World Water Week #AtHome 2020 &ndash; Water Stewardship in Agriculture</span></span><br />
	<span style="font-size:10pt"><span style="font-family:&quot;Arial Nova Light&quot;,sans-serif">Rekaman: <a href="https://register.gotowebinar.com/recording/8511901561510833158" style="color:#0563c1; text-decoration:underline">Tersedia</a></span></span></li>
</ul>','Publish','Materi','Webinars','','','','','','','2020-09-16 01:31:45','2020-09-16 01:30:55','2020-09-16 08:31:45');


CREATE TABLE `download` (
  `id_download` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_download` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `judul_download` varchar(200) DEFAULT NULL,
  `jenis_download` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_download`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO download (id_download, id_kategori_download, id_user, bahasa, judul_download, jenis_download, isi, gambar, website, hits, tanggal) VALUES ('3','1','4','ID','The AWS Standard 2.0 Bahasa Indonesia','Download','<p>Versi Bahasa Indonesia dari AWS Standar, Panduan dan Skoring Rubrik sudah tersedia online. <a href="https://a4ws.org/download-standard-2/" style="color:#0563c1; text-decoration:underline">Unduh</a> untuk Anda sekarang dan hubungi tim kami di Indonesia untuk mendukung Anda dalam perjalanan penatalayanan air.</p>','aws-standard-20-2019-bahasa-indonesia-1600653859.pdf','','25','2023-03-06 13:48:48');

INSERT INTO download (id_download, id_kategori_download, id_user, bahasa, judul_download, jenis_download, isi, gambar, website, hits, tanggal) VALUES ('4','1','4','ID','The AWS Standard Guidance 2.0 Bahasa Indonesia','Download','<p>The AWS Standard Guidance 2.0 Bahasa Indonesia</p>','aws-standard-20-guidance-final-january-2020-bahasa-indonesia-1600654043.pdf','','4','2023-03-06 13:49:16');

INSERT INTO download (id_download, id_kategori_download, id_user, bahasa, judul_download, jenis_download, isi, gambar, website, hits, tanggal) VALUES ('5','1','4','ID','The AWS Standard Scoring 2.0 Bahasa Indonesia','Download','<p>The AWS Standard Scoring 2.0 Bahasa Indonesia</p>','aws-standard-20-scoring-criteria-revised-june-1-2020-bahasa-indonesia-1600654078.pdf','','6','2023-03-14 22:10:18');


CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `judul_galeri` varchar(200) DEFAULT NULL,
  `jenis_galeri` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `popup_status` enum('Publish','Draft','','') NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `status_text` enum('Ya','Tidak','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO galeri (id_galeri, id_kategori_galeri, id_user, bahasa, judul_galeri, jenis_galeri, isi, gambar, website, hits, popup_status, urutan, status_text, tanggal) VALUES ('15','4','1','ID','Institution Web Test','Homepage','','0-vjoq529ry3o-qgiy-1678086880.jpg','javascript:;','5','Publish','1','Ya','2023-03-14 22:10:47');

INSERT INTO galeri (id_galeri, id_kategori_galeri, id_user, bahasa, judul_galeri, jenis_galeri, isi, gambar, website, hits, popup_status, urutan, status_text, tanggal) VALUES ('17','4','1','ID','test 1','Galeri','test 1 isi galeri','gmasnry6-1678806089.jpg','','2','Publish','2','Ya','2023-03-16 21:10:53');


CREATE TABLE `heading` (
  `id_heading` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT 0,
  `judul_heading` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `halaman` varchar(255) DEFAULT 'NULL',
  `tanggal` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_heading`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('1','0','Berita dan Updates','<p>Berita dan Updates</p>','heading-03-1600256326.jpg','Berita','2020-09-16 18:38:46');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('2','0','Tentang Kami','<p>About US</p>','aws-indonesia-1600259780.jpg','AboutUs','2023-03-16 19:15:45');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('3','0','Halaman Kontak','<p>Halaman Kontak</p>','kontak-1600257025.jpg','Kontak','2020-09-16 18:50:25');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('4','0','Board and Team','<p>Board and Team</p>','board-and-team-300-1600260175.jpg','Team','2020-09-16 19:42:55');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('5','0','Layanan','<p>Layanan</p>','layanan-1600315713.jpg','Layanan','2023-03-16 19:51:02');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('6','0','Dokumen','<p>Dokumen</p>','dokumen-1600317093.jpg','Dokumen','2020-09-17 11:31:33');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('7','0','Agenda dan Events','<p>Agenda dan Events</p>','heading-03-1600256326-1678542178.jpg','Agenda','2023-03-11 20:42:58');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('8','0','Galeri','<p>Galeri</p>','heading-03-1600256326-1678542192.jpg','Galeri','2023-03-11 20:43:12');

INSERT INTO heading (id_heading, id_user, judul_heading, keterangan, gambar, halaman, tanggal) VALUES ('9','0','Statistik','<p>Statistik</p>','statistic-data-1678971152.jpg','Statistic','2023-03-16 19:52:32');


CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_kategori`),
  UNIQUE KEY `nama_kategori` (`nama_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO kategori (id_kategori, id_user, bahasa, slug_kategori, nama_kategori, urutan, hits, tanggal) VALUES ('6','4','ID','berita','Berita','3','0','2020-09-13 04:36:42');

INSERT INTO kategori (id_kategori, id_user, bahasa, slug_kategori, nama_kategori, urutan, hits, tanggal) VALUES ('8','4','ID','updates','Updates','2','','2020-09-13 04:36:35');


CREATE TABLE `kategori_agenda` (
  `id_kategori_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_agenda` varchar(255) NOT NULL,
  `nama_kategori_agenda` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO kategori_agenda (id_kategori_agenda, bahasa, slug_kategori_agenda, nama_kategori_agenda, keterangan, urutan) VALUES ('4','ID','kegiatan-eksternal','Kegiatan Eksternal','','2');

INSERT INTO kategori_agenda (id_kategori_agenda, bahasa, slug_kategori_agenda, nama_kategori_agenda, keterangan, urutan) VALUES ('6','ID','kegiatan-internal','Kegiatan Internal','','1');


CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_download` varchar(255) NOT NULL,
  `nama_kategori_download` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_download`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO kategori_download (id_kategori_download, bahasa, slug_kategori_download, nama_kategori_download, keterangan, urutan) VALUES ('1','ID','dokumen','Dokumen','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','1');

INSERT INTO kategori_download (id_kategori_download, bahasa, slug_kategori_download, nama_kategori_download, keterangan, urutan) VALUES ('4','ID','download-pricelist','Download Pricelist','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','0');

INSERT INTO kategori_download (id_kategori_download, bahasa, slug_kategori_download, nama_kategori_download, keterangan, urutan) VALUES ('5','ID','studi-kasus','Studi Kasus','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','2');

INSERT INTO kategori_download (id_kategori_download, bahasa, slug_kategori_download, nama_kategori_download, keterangan, urutan) VALUES ('6','ID','webinar','Webinar','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','3');


CREATE TABLE `kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_galeri` varchar(255) NOT NULL,
  `nama_kategori_galeri` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO kategori_galeri (id_kategori_galeri, bahasa, slug_kategori_galeri, nama_kategori_galeri, urutan) VALUES ('4','ID','kegiatan','Kegiatan','2');

INSERT INTO kategori_galeri (id_kategori_galeri, bahasa, slug_kategori_galeri, nama_kategori_galeri, urutan) VALUES ('6','ID','kegiatan-kampus','Kegiatan Kampus','1');


CREATE TABLE `kategori_staff` (
  `id_kategori_staff` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `slug_kategori_staff` varchar(255) NOT NULL,
  `nama_kategori_staff` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO kategori_staff (id_kategori_staff, bahasa, slug_kategori_staff, nama_kategori_staff, keterangan, urutan) VALUES ('4','ID','senyum-programmer','Senyum Programmer','Yeay... selain tim tutor kita juga ada tim programmer yang bekerja full time maupun part time','2');

INSERT INTO kategori_staff (id_kategori_staff, bahasa, slug_kategori_staff, nama_kategori_staff, keterangan, urutan) VALUES ('6','ID','happy-tutor','Happy Tutor','Institution Web Test didampingi oleh tutor-tutor dan instruktur yang berpengalaman di bidangnya.','1');


CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` enum('ID','EN') NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `nama_singkat` varchar(200) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tagline2` varchar(255) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_cadangan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) NOT NULL,
  `nama_twitter` varchar(255) NOT NULL,
  `nama_instagram` varchar(255) NOT NULL,
  `nama_google_plus` varchar(255) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `google_map` text DEFAULT NULL,
  `judul_1` varchar(200) DEFAULT NULL,
  `pesan_1` varchar(200) DEFAULT NULL,
  `judul_2` varchar(200) DEFAULT NULL,
  `pesan_2` varchar(200) DEFAULT NULL,
  `judul_3` varchar(200) DEFAULT NULL,
  `pesan_3` varchar(200) DEFAULT NULL,
  `judul_4` varchar(200) DEFAULT NULL,
  `pesan_4` varchar(200) DEFAULT NULL,
  `judul_5` varchar(200) DEFAULT NULL,
  `pesan_5` varchar(200) NOT NULL,
  `judul_6` varchar(200) DEFAULT NULL,
  `pesan_6` varchar(200) NOT NULL,
  `isi_1` varchar(500) DEFAULT NULL,
  `isi_2` varchar(500) DEFAULT NULL,
  `isi_3` varchar(500) DEFAULT NULL,
  `isi_4` varchar(500) DEFAULT NULL,
  `isi_5` varchar(500) DEFAULT NULL,
  `isi_6` varchar(500) DEFAULT NULL,
  `link_1` varchar(255) DEFAULT NULL,
  `link_2` varchar(255) DEFAULT NULL,
  `link_3` varchar(255) DEFAULT NULL,
  `link_4` varchar(255) DEFAULT NULL,
  `link_5` varchar(255) DEFAULT NULL,
  `link_6` varchar(255) DEFAULT NULL,
  `javawebmedia` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `rekening` text DEFAULT NULL,
  `prolog_topik` text DEFAULT NULL,
  `prolog_program` text DEFAULT NULL,
  `prolog_sekretariat` text DEFAULT NULL,
  `prolog_aksi` text DEFAULT NULL,
  `prolog_kolaborasi` text DEFAULT NULL,
  `prolog_sebaran` text DEFAULT NULL,
  `gambar_berita` varchar(255) DEFAULT NULL,
  `prolog_agenda` text DEFAULT NULL,
  `prolog_wawasan` text DEFAULT NULL,
  `smtp_protocol` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_timeout` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_encryption` varchar(255) DEFAULT NULL,
  `smtp_sender_email` varchar(255) NOT NULL,
  `smtp_sender_name` varchar(255) NOT NULL,
  `judul_pembayaran` varchar(255) DEFAULT NULL,
  `isi_pembayaran` text DEFAULT NULL,
  `gambar_pembayaran` varchar(255) DEFAULT NULL,
  `link_bawah_peta` varchar(255) DEFAULT NULL,
  `text_bawah_peta` varchar(255) DEFAULT NULL,
  `cara_pesan` enum('Keranjang Belanja','Formulir Pemesanan') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO konfigurasi (id_konfigurasi, bahasa, namaweb, nama_singkat, tagline, tagline2, tentang, deskripsi, website, email, email_cadangan, alamat, telepon, hp, fax, logo, icon, keywords, metatext, facebook, twitter, instagram, google_plus, nama_facebook, nama_twitter, nama_instagram, nama_google_plus, singkatan, google_map, judul_1, pesan_1, judul_2, pesan_2, judul_3, pesan_3, judul_4, pesan_4, judul_5, pesan_5, judul_6, pesan_6, isi_1, isi_2, isi_3, isi_4, isi_5, isi_6, link_1, link_2, link_3, link_4, link_5, link_6, javawebmedia, gambar, video, rekening, prolog_topik, prolog_program, prolog_sekretariat, prolog_aksi, prolog_kolaborasi, prolog_sebaran, gambar_berita, prolog_agenda, prolog_wawasan, smtp_protocol, smtp_host, smtp_port, smtp_timeout, smtp_user, smtp_pass, smtp_encryption, smtp_sender_email, smtp_sender_name, judul_pembayaran, isi_pembayaran, gambar_pembayaran, link_bawah_peta, text_bawah_peta, cara_pesan, id_user, tanggal) VALUES ('1','ID','Institution Web Test','InstitutionWeb','Pusat Kursus Private &  Kelas Web, Mobile Apps, Desain Grafis dan Statistik','Pusat Kursus Private &  Kelas Web, Mobile Apps, Desain Grafis dan Statistik','<p>Institution Web Test adalah Pusat Kursus Private dan Reguler bidang Desain Grafis, Web Programming, Mobile Application dan Statistik</p>

<p>Institution Web Test berdiri pada tanggal 26 April 2010. Institution Web Test awalnya hanya bergerak di bidang pembuatan dan pengembangan website serta agensi desain grafis. Awal tahun 2011, perusahaan ini kemudian mulai bergerak di bidang pengembangan sumber daya manusia, khususnya di bidang keahlian computer Graphic Design, Web Design dan Web Development.</p>

<p>Institution Web Test adalah lembaga kursus yang bergerak di bidang pendidikan khususnya kursus website, digital marketing, desain grafis dan statistik. Sampai saat ini Institution Web Test sudah memiliki lulusan lebih dari 1200 orang dari berbagai status dan profesi mulai dari pelajar sekolah, mahasiswa, guru, dosen, staff profesional, freelancer, dll. Lulusan tidak hanya dari Indonesia tapi juga dari beberapa negara tetangga seperti New Zealand, Timor Leste dan Malaysia.</p>

<p>Institution Web Test membuka cabang pertamanya pada tahun 2014. Hingga tahun 2020 ini, Institution Web Test telah memiliki 2 cabang yang berlokasi di kota Depok.</p>

<p>Selain bergerak di bidang pendidikan Institution Web Test juga memiliki layanan di bidang perencanaan strategis sistem informasi, pengembangan aplikasi berbasis web dan berbasis mobile (Android dan IOS/Apple).</p>','Grow And Strengthen Leadership On Good Water Stewardship For Water Secure In Indonesia, Now And The Feature.','https://institutionwebtest.com','contact@institutionwebtest.com','institutionwebtest@gmail.com','SILICON VALLEY LINES 
1743 PARK AVE NO 131 
SAN JOSE 
CA - California','081211111111','+6281255555555','081233333333','logo-institution1.png','icon-institution.png','educamedia, online course, kursus online, institution web test','','https://www.facebook.com/institutionwebtest','http://twitter.com/institutionwebtest','https://instagram.com/institutionwebtest','https://www.youtube.com/channel/UCmm6mFZXYQ3ZylUMa0Tmc2Q','Educamedia','Educamedia','Educamedia','','IWT','<iframe src="https://www.google.com/maps/d/embed?mid=1GUokYCi1RNUL7RfYXjALlBxR7tA&hl=en_US&ehbc=2E312F" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>','Tempat belajar nyaman','fa fa-home','Materi Kursus Selalu Update','fa fa-laptop','Jadwal Flexibel','fa fa-thumbs-up','Menjaga Amanah','fa-check-square-o','Tempat belajar nyaman','fa-home','Online service','fa-laptop','Kami menyediakan tempat belajar yang nyaman dan menyenangkan serasa di rumah sendiri','Materi kursus kamu selalu uptodate, Anda bisa mengunduh apa yang dipelajari','Bagi Anda siswa yang ingin belajar, kami menerapkan jadwal flexibel','Kami senantiasa menjaga amanah yang diberikan kepada donatur agar sampai di tangan yang berhak.','Kami menyediakan tempat belajar yang nyaman dan menyenangkan','Website kamu selalu uptodate, Anda bisa mengunduh apa yang dipelajari','','','','','','','<p>Berawal dari keinginan ibunda Hj.Masah Muhari diakhir hidupnya untuk mewakaan sebagian hartanya dijalan Allah, gayungpun bersambut pada bulan Mei 2011 saat kami akan melaksanakan ibadah umrah, Seorang rekan kami sesama Jamaah bernama ustadzah Hj. Zainur Fahmid memberikan informasi Tentang Anggota yang hendak mewakaan sebidang tanahnya di wilayah Beji Timur. Kami pun memanjatkan doa di kota suci dengan penuh rasa harap pertolongan Allah untuk menunjukan jalan terbaik-Nya, maka sepulang umroh kami mengadakan pertemuan di kediaman Ibu Dra Hj Ratna Mardjanah untuk membicarakan visi misi kami dalam wakaf tersebut dan sepakat untuk mendirikan Istana Yatim Riyadhul Jannah ini.</p>
<p>Nama Riyadhul Jannah Sendiri diambil dari nama pengelola wakaf (H. Ahmad Riyadh Muchtar, Lc) dan pemberi wakaf (Dra Hj Ratna Mardjanah). Istana Yatim Riyadhul Jannah hadir untuk melayani dan memfasilitasi segala kebutuhan anak yatim, terutama pendidikan agama, akhlak dan kehidupan yang layak untuk bekal masa depan mereka yang cerah agar bisa memberi manfaat bagi umat. Harapan kami semoga dengan membangunkan istana untuk anak yatim, maka Allah akan berikan istana-Nya di surga kelak dan kita termasuk manusia yang bisa memberika manfaat bagi sesama sebagaimana sabda Rasulullah SAW yang artinya:&nbsp;</p>
<p>&ldquo;Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya&rdquo;&nbsp;</p>
<p>erimakasih atas segala bentuk bantuan yang dipercayakan kepada kami baik secara materi, tenaga dan kiran serta doa para muhsinin dan muhsinat Istana Yatim Riyadhul Jannah selama ini, mulai dari rencana pendirian hingga berkembang seperti saat ini. Semoga segala amal menjadi shadaqah jariyah disisi-Nya.&nbsp;</p>
<p>&nbsp;</p>','test5.jpg','fsH_KhUWfho','<table id="dataTables-example" class="table table-bordered" width="100%">
<thead>
<tr>
<th tabindex="0" colspan="1" rowspan="1" width="19%">Nama Bank</th>
<th tabindex="0" colspan="1" rowspan="1" width="21%">Nomor Rekening</th>
<th tabindex="0" colspan="1" rowspan="1" width="7%">Atas nama</th>
</tr>
</thead>
<tbody>
<tr>
<td>BCA KCP Margo City</td>
<td>4212548204</td>
<td>Andoyo</td>
</tr>
<tr>
<td>Bank Mandiri KCP Universitas Indonesia</td>
<td>1570001807768</td>
<td>Eflita Meiyetriani</td>
</tr>
<tr>
<td>Bank BNI Syariah Kantor Cabang Jakarta Selatan</td>
<td>0105301001</td>
<td>Eflita Meiyetriani</td>
</tr>
</tbody>
</table>','<p>Dalam mewujudkan pembangunan berkelanjutan, pemerintah kabupaten anggota LTKL telah mengidentifikasi dan memilih topik yang sesuai dengan kondisi di daerahnya. Ada 5 topik prioritas yang dipilih dengan penerapan yang disesuaikan kembali di masing-masing kabupaten.</p>','','<p>Setelah Lingkar Temu Kabupaten Lestari (LTKL) diinisiasi, kesekretariatan dibentuk untuk membantu para pemerintah kabupaten anggota bekerja dan berkolaborasi. Walaupun tidak memiliki mandat implementasi, Sekretariat LTKL menjadi vital dalam melancarkan koordinasi, pengumpulan basis data, hingga pelaporan perkembangan. Sekretariat LTKL juga diperkuat dengan kehadiran personil yang telah berpengalaman di bidang management pengetahuan, program pembangunan berkelanjutan hingga kebijakan.</p>','','<p>Lingkar Temu Kabupaten Lestari (LTKL) mengedepankan kolaborasi dalam mewududkan pembangunan berkelanjutan. Ada 10 kabupaten yang tersebar di 6 provinsi di Indonesia telah menjadi anggota LTKL.</p>
<p>Hingga kini, berbagai pihak telah ikut berkolaborasi, mulai dari pemerintah kabupaten, sekeretariat LTKL, mitra pembangunan hingga pihak swasta.</p>','','balairung-budiutomo-01.jpg','<p>Acara yang ditampilkan merupakan kumpulan acara LTKL, mitra, maupun pemerintah kabupaten anggota LTKL, mulai dari acara seminar hingga festival.</p>','<p>LTKL bukan satu-satunya yang bergerak dalam mewujudkan pembangunan berkelanjutan, serta upaya penanggulangan perubahan iklim. Ikuti terus perkembangan usaha LTKL serta rekan-rekan lain menuju bumi dan Indonesia yang lestari.</p>','smtp','sandbox.smtp.mailtrap.io','2525','12','b731d3b713ba79','ef070ca71c5034','tls','institutionwebtest@gmail.com','Institution Web Test','Metode Pembayaran Produk','<p>Anda dapat melakukan pembayaran dengan beberapa cara, yaitu:</p>
<ol>
<li><strong>Pembayaran Tunai</strong>, dapat Anda serahkan secara langsung ke salah satu staff Java Web Media</li>
<li><strong>Pembayar Via Transfer Rekening</strong></li>
</ol>
<p>Lakukan transfer biaya atas layanan dan produk&nbsp;<strong>Java Web Media</strong>&nbsp;ke salah satu rekening di bawah ini.</p>
<h3>Konfirmasi Pembayaran</h3>
<p>Anda dapat melakukan konfirmasi pembayaran melalui:</p>
<ul>
<li><strong>Melalui Email</strong>, silakan kirim bukti pembayaran ke:&nbsp;<strong><a href="mailto:contact@javawebmedia.co.id?subject=Konfirmasi%20Pembayaran">contact@javawebmedia.co.id</a></strong></li>
<li><strong>Melalui Whatsapp</strong>, kirimkan bukti pembayaran Anda ke&nbsp;<strong>+6281210697841</strong></li>
<li><strong>Melalui Formulir Konfirmasi Pembayaran</strong>, Anda dapat mengunggah bukti pembayaran Anda melalui form&nbsp;<strong><a title="Konfirmasi Pembayaran" href="https://javawebmedia.com/konfirmasi">&nbsp;Konfirmasi Pembayaran</a></strong></li>
</ul>','payment.jpg','','','Formulir Pemesanan','1','2023-03-16 22:42:10');


CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO rekening (id_rekening, nama_bank, nomor_rekening, atas_nama, gambar, urutan, tanggal) VALUES ('2','BNI SYARIAH JAKARTA','0611-9927-06','PT INSTITUTION WEB TEST','Logo_BNI_Syariah.png','1','2023-03-06 11:12:33');


CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_staff` int(11) NOT NULL,
  `slug_staff` varchar(255) NOT NULL,
  `nama_staff` varchar(255) NOT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `status_staff` varchar(20) NOT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO staff (id_staff, id_user, id_kategori_staff, slug_staff, nama_staff, jabatan, pendidikan, expertise, email, telepon, isi, gambar, status_staff, keywords, urutan, tanggal) VALUES ('2','1','4','pevita-p-knowledge-and-learning-officer','Pevita P','Knowledge and Learning Officer','','','','','','pevita-team-1678076446.jpg','Ya','','3','2023-03-06 13:42:01');

INSERT INTO staff (id_staff, id_user, id_kategori_staff, slug_staff, nama_staff, jabatan, pendidikan, expertise, email, telepon, isi, gambar, status_staff, keywords, urutan, tanggal) VALUES ('7','1','6','ennik-somi-douma-sekretaris-dewan-pengurus','Ennik Somi Douma','Sekretaris Dewan Pengurus','','','','','','somi-team-1678076468.jpg','Ya','','2','2023-03-06 11:21:08');

INSERT INTO staff (id_staff, id_user, id_kategori_staff, slug_staff, nama_staff, jabatan, pendidikan, expertise, email, telepon, isi, gambar, status_staff, keywords, urutan, tanggal) VALUES ('10','1','4','keanu-reeves-knowledge-and-learning-officer','Keanu Reeves','Knowledge and Learning Officer','STM','','','','','zdtk9kpturbxy81ywuzntewyzu3nda5njc5odbjywm1ngvknzg1ota2zi5qcgeslqpnaufnavnnc0-nblytbc0esm0cdikhmaghmqe-1678805898.jpg','Ya','','4','2023-03-14 21:58:43');


CREATE TABLE `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `video` text NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `bahasa` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hits` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO video (id_video, judul, posisi, keterangan, video, urutan, bahasa, gambar, id_user, tanggal, hits) VALUES ('66','LARAVEL 9.x UNTUK PEMULA, LAYAK?','Homepage','Apakah framework PHP yang satu ini #laravel layak untuk pemula di tahun 2022?
Buat kalian yang mau belajar laravel 9 mulai dari setup sampai bermain dengan model view controller dan koneksi database, wajib banget nonton ini dulu!

notes: ini bukan tutorial laravel 9 bahasa indonesia seperti yang biasa kalian search, ini hanya simulasi programmer profesional menjadi seorang pemula dan mencoba menggunakan laravel framework php yang punya konsep mvc.','LVueE0wTuv8','1','Indonesia','new-project-1678255257.jpg','1','2023-03-13 15:17:45','14');

INSERT INTO video (id_video, judul, posisi, keterangan, video, urutan, bahasa, gambar, id_user, tanggal, hits) VALUES ('68','How To Build A Website with Wordpress in 2023 (Full Tutorial)','Video','In this video, I go over how to build a simple WordPress Website in less than 15 minutes. WordPress is one of the easiest CMS platforms for websites, and with their drag and drop format, you can create amazing websites without any coding knowledge. This is a full step by step tutorial for beginners that want to create an affordable, fast, and good looking website.','AABmCvjd_iU','2','Indonesia','test6-1678179478.jpg','1','2023-03-14 22:10:34','3');


CREATE TABLE `kontak_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('1','test@gmail.com','tets is','fuullname1','081245678912','testsubject','2023-03-17 07:33:10');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('2','a@gmail.com','test issssiiiiiiii','fuullname1','081245678912','subject2','2023-03-17 07:37:55');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('3','test@gmail.com','asd','fuullname1','081245678912','testsubject','2023-03-17 07:38:39');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('4','test@gmail.com','asdasd','fuullname1','081245678912','asd','2023-03-17 07:40:58');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('5','test@gmail.com','tsss','fuullname1','081245678912','testsubject1','2023-03-17 07:41:59');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('6','test@gmail.com','sad','fuullname1','081245678912','subject21','2023-03-17 07:45:48');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('7','test@gmail.com','test','fuullname1','081245678912','testsubject','2023-03-17 07:47:17');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('8','test@gmail.com','asd','fuullname1','081245678912','testsubject','2023-03-17 07:47:54');

INSERT INTO kontak_email (id, email, content, full_name, contact, subject, created_date) VALUES ('9','bakrisea@gmail.com','asd','fuullname1','081245678912','asd','2023-03-17 07:48:23');


CREATE TABLE `statistik_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `subtitle` varchar(150) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO statistik_data (id, title, subtitle, value, urutan, created_by, updated_by, created_date, updated_date) VALUES ('1','Anggota','Orang','210654','1','0','','2023-03-12 11:36:06','');

INSERT INTO statistik_data (id, title, subtitle, value, urutan, created_by, updated_by, created_date, updated_date) VALUES ('2','Non Saham','Orang','142147','2','1','','2023-03-12 11:36:06','');

INSERT INTO statistik_data (id, title, subtitle, value, urutan, created_by, updated_by, created_date, updated_date) VALUES ('3','Aktivis','Orang','651','3','1','','2023-03-12 11:36:06','');

INSERT INTO statistik_data (id, title, subtitle, value, urutan, created_by, updated_by, created_date, updated_date) VALUES ('4','Tempat Pelayanan','Tempat','67','4','1','','2023-03-12 11:36:06','');


CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hit` int(11) NOT NULL DEFAULT 0,
  `sent` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO subscribers (id, name, email, hit, sent, created_by, updated_by, created_date, updated_date) VALUES ('1','name1','name1@gmail.com','1','0','0','','2023-03-15 19:59:31','');

INSERT INTO subscribers (id, name, email, hit, sent, created_by, updated_by, created_date, updated_date) VALUES ('2','a','a@gmail.com','1','0','0','','2023-03-15 20:04:17','');

INSERT INTO subscribers (id, name, email, hit, sent, created_by, updated_by, created_date, updated_date) VALUES ('3','bakri ah','bakrisea@gmail.com','1','0','1','1','2023-03-16 21:33:23','2023-03-16 14:33:33');


CREATE TABLE `subscribers_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `to_email` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO subscribers_email (id, content, to_email, created_by, created_date) VALUES ('1','<p>test</p>','all','1','2023-03-17 06:09:17');

INSERT INTO subscribers_email (id, content, to_email, created_by, created_date) VALUES ('2','<p>test baru</p>','all','1','2023-03-17 06:29:31');
