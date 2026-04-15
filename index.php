<!DOCTYPE html>
<html>
<head>
    <title>NHL|Desri Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script>
       function showPage(pageId) {
    // 1. Sembunyikan semua halaman
    var pages = document.getElementsByClassName("page");
    for (var i = 0; i < pages.length; i++) {
        pages[i].style.display = "none";
    }

    // 2. Tampilkan halaman yang dipilih
    document.getElementById(pageId).style.display = "block";

    // 3. Atur penanda (Active Link) di menu
    var links = document.querySelectorAll(".menu-links a");
    links.forEach(link => {
        // Hapus kelas 'active' dari semua menu
        link.classList.remove("active");
        
        // Tambahkan kelas 'active' kalau teks menu cocok dengan pageId
        // Contoh: jika pageId 'home', maka menu yang ada onclick showPage('home') jadi aktif
        if (link.getAttribute("onclick").includes("'" + pageId + "'")) {
            link.classList.add("active");
        }
    });
}
        function logout() {
            var forms = document.getElementsByTagName("form");
            for (var i = 0; i < forms.length; i++) {
                forms[i].reset();}
            showPage('login');}
        function hitungKalkulator() {
            var angka1 = document.getElementById("angka1").value;
            var angka2 = document.getElementById("angka2").value;
            var operator = document.getElementById("operator").value;
            var hasil;

            if (operator == "+") {
                hasil = Number(angka1) + Number(angka2);
            } else if (operator == "-") {
                hasil = angka1 - angka2;
            } else if (operator == "*") {
                hasil = angka1 * angka2;
            } else if (operator == "/") {
                hasil = angka1 / angka2;}
            document.getElementById("hasil").innerHTML = "Hasil: " + hasil;}
        function updateCountdown() {
    // Tanggal target: 30 Maret 2026 jam 10 pagi
    var eventDate = new Date("March 30, 2026 10:00:00").getTime();
    var now = new Date().getTime();
    var distance = eventDate - now;

    var element = document.getElementById("timer");
    if (!element) return; // Keamanan jika element tidak ketemu

    if (distance < 0) {
        element.innerHTML = "<b style='color:red;'>Sedang Berlangsung / Sudah Selesai</b>";
    } else {
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        
        element.innerHTML = "Waktu Tersisa: " + days + " Hari " + hours + " Jam " + minutes + " Menit lagi!";
    }
}
// Jalankan fungsi setiap 1 detik
setInterval(updateCountdown, 1000);
        function cariArti() {
    var kata = document.getElementById("inputKata").value.toLowerCase();
    var hasil = document.getElementById("hasilKamus");
    
    // Ini adalah database kata sederhana (Bahasa Nias : Arti)
    var kamus = {
        "ya'ahowu": "Salam khas Nias (Semoga diberkati).",
        "omo hada": "Rumah adat tradisional Nias.",
        "hombo batu": "Tradisi lompat batu (Fahombo).",
        "afo": "Sirih (biasanya disuguhkan untuk tamu kehormatan).",
        "tano niha": "Tanah Nias (sebutan orang Nias untuk pulau mereka).",
        "ono niha": "Anak Nias (sebutan untuk suku bangsa Nias).",
        "malu": "Hormat / Sopan.",
        "saohagolo": "Terima kasih.",
        "hezo": "Mana / Ke mana."
    };

    if (kamus[kata]) {
        hasil.innerHTML = "<b>Arti:</b> " + kamus[kata];
        hasil.style.color = "red";
    } else if (kata == "") {
        hasil.innerHTML = "Silakan ketik satu kata di atas!";
        hasil.style.color = "red";
    } else {
        hasil.innerHTML = "Maaf, kata '" + kata + "' belum ada di kamus kami.";
        hasil.style.color = "red";
    }
}
    </script>
</head>

<body onload="showPage('login')">

    <div id="login" class="page">
        <h2>Login Perpustakaan Desri</h2>
        <form onsubmit="showPage('home'); return false;">
            Last Name:<br>
            <input type="text"><br><br>

            First Name:<br>
            <input type="text"><br><br>

            Email:<br>
            <input type="email"><br><br>

            Password:<br>
            <input type="password"><br><br>

            No Handphone:<br>
            <input type="text"><br><br>

            <input type="submit" value="Login">
        </form>
        <p>Belum punya akun? <a href="#" onclick="showPage('register')">Daftar di sini</a></p>
    </div>

    <div id="register" class="page">
        <h2>Daftar Akun Baru</h2>
        <form onsubmit="showPage('login'); return false;">
            Last Name:<br>
            <input type="text"><br><br>

            First Name:<br>
            <input type="text"><br><br>

            Email:<br>
            <input type="email"><br><br>

            No Handphone:<br>
            <input type="text"><br><br>

            Password:<br>
            <input type="password"><br><br>

            <input type="submit" value="Daftar">
        </form>
    </div>

    <div id="home" class="page">
       <body onload="showPage('login'); updateCountdown();">

  <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
    <div class="welcome-section">
        <h1>Welcome to Nias Heritage Library</h1>
        <p>Selamat datang di Nias Heritage Library, ruang literasi digital yang menghadirkan kekayaan sejarah, budaya, dan pesona Nias dalam satu platform yang mudah diakses. Di sini, Anda dapat menjelajahi berbagai koleksi bacaan, dokumentasi, serta informasi terpercaya yang dirancang untuk memperluas wawasan, mendukung kegiatan belajar dan penelitian, serta menumbuhkan kecintaan terhadap warisan daerah Nias bagi generasi sekarang dan masa depan.</p>
    </div>

    <div class="home-grid">

        <div class="card-item">
            <h2>Kalkulator Perpustakaan</h2>
            <table border="0" cellpadding="5" style="width: 100%;">
                <tr>
                    <td>Angka 1</td>
                    <td><input type="number" id="angka1" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td>Operasi</td>
                    <td>
                        <select id="operator" style="width: 100%; padding: 8px;">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">×</option>
                            <option value="/">÷</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Angka 2</td>
                    <td><input type="number" id="angka2" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="hitungKalkulator()" style="background: #8b0000; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold;">Hitung</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="hasil" style="text-align: center; font-weight: bold; padding-top: 10px; color: #8b0000;">Hasil: -</td>
                </tr>
            </table>
        </div>

        <div class="card-item">
            <h2>Kamus Mini Nias</h2>
            <p style="font-size: 14px;">Pelajari kata dasar kebudayaan Nias:</p>
            <input type="text" id="inputKata" placeholder="Contoh: Ya'ahowu" style="width: 100%; margin-bottom: 10px;">
            <button onclick="cariArti()" style="background: #8b0000; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold;">Cari Arti</button>
            <p id="hasilKamus" style="margin-top: 15px; font-style: italic; color: #8b0000; min-height: 20px;"></p>
        </div>
        </div> </div>

    <div id="collection" class="page">
        <body onload="showPage('login'); updateCountdown();">
 <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
    <div class="welcome-section">
        <h2>Collection NHL</h2>
        <p>Jelajahi berbagai dokumen sejarah, adat, dan penelitian tentang budaya Nias.</p>
    </div>

    <div class="home-grid">
        
        <div class="card-item">
            <h3 style="color: #8b0000;">Asal Usul Orang Nias</h3>
            <p>Pelajari sejarah dan nenek moyang masyarakat Nias dari sumber terpercaya.</p>
            <hr>
            <a href="https://drive.google.com/file/d/1wi7LzKZ824M8pnYInvFmp3dVAtSkxHjF/view?usp=drive_link" target="_blank" style="background-color: #8b0000; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Buka Dokumen</a>
        </div>

        <div class="card-item">
            <h3 style="color: #8b0000;">Adat & Budaya Suku Nias</h3>
            <p>Kumpulan informasi tentang tradisi, hukum adat, dan kebiasaan leluhur.</p>
            <hr>
            <a href="https://drive.google.com/file/d/1UXI4418mhWZkSAnyKd0mccH3XR2uC7tA/view?usp=drive_link" target="_blank" style="background-color: #8b0000; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Buka Dokumen</a>
        </div>

        <div class="card-item">
            <h3 style="color: #8b0000;">Museum Pusaka Nias</h3>
            <p>Akses langsung ke situs resmi Museum Pusaka Nias untuk koleksi artefak.</p>
            <hr>
            <a href="https://museum-nias.org/" target="_blank" style="background-color: #2c3e50; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Kunjungi Situs</a>
        </div>

        <div class="card-item">
            <h3 style="color: #8b0000;">Cerita Rakyat Nias</h3>
            <p>Legenda Laowomaru dan berbagai cerita rakyat menarik lainnya dari Pulau Nias.</p>
            <hr>
            <a href="https://www.scribd.com/document/750395009/Legenda-Laowomaru" target="_blank" style="background-color: #8b0000; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Baca Legenda</a>
        </div>

        <div class="card-item">
            <h3 style="color: #8b0000;">Jurnal Penelitian</h3>
            <p>Arsip ilmiah dan penelitian akademis mengenai warisan budaya Nias.</p>
            <hr>
            <a href="https://drive.google.com/file/d/14dmCk0IRwWuSxMkAgUswqb1CwMhcJyEf/view?usp=sharing" target="_blank" style="background-color: #8b0000; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Buka Jurnal</a>
        </div>

        <div class="card-item" style="grid-column: span 1;">
            <h3 style="color: #8b0000;">Dokumentasi Video</h3>
            <p>Tonton cuplikan dokumenter tentang tradisi dan keindahan alam Nias.</p>
            <hr>
            <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin-top: 10px;">
                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" src="https://www.youtube.com/embed/6mIdhdBSbbo" allowfullscreen></iframe>
            </div>
            <br>
            <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" src="https://www.youtube.com/embed/ge-yg6m2sf8" allowfullscreen></iframe>
            </div>
        </div>

    </div> </div> 

    <div id="service" class="page">
        <body onload="showPage('login'); updateCountdown();">

   <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="logout()">Logout</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
    </div>
</nav>
        <hr>
       <div class="welcome-section">
        <h2>Service</h2>
        <p>Informasi jam operasional layanan Nias Heritage Library.</p>
    </div>

    <div class="home-grid">
        <div class="card-item" style="max-width: 500px; margin: 0 auto; grid-column: 1 / -1;">
            <h3 style="color: #8b0000; text-align: center;">📅 Opening Time</h3>
            <hr>
            <table border="0" cellpadding="10" style="width: 100%; font-size: 16px;">
                <tr style="border-bottom: 1px solid #eee;">
                    <td><b>Senin - Jumat</b></td>
                    <td align="right">08.00 - 16.00</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td><b>Sabtu</b></td>
                    <td align="right">09.00 - 14.00</td>
                </tr>
                <tr>
                    <td><b style="color: #8b0000;">Minggu</b></td>
                    <td align="right" style="color: #8b0000; font-weight: bold;">Tutup</td>
                </tr>
            </table>
        </div>
    </div>
</div>
    <div id="profil" class="page">
        <body onload="showPage('login'); updateCountdown();">

 <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
        <hr>
        <div class="welcome-section">
            <h2>About Libraries</h2>
            <p>Mengenal lebih dekat Nias Heritage Library (NHL).</p>
        </div>

        <div class="home-grid">
            <div class="card-item">
                <h3 style="color: #8b0000;">🏛️ Profil & Visi</h3>
                <hr>
                <p style="text-align: justify; font-size: 14px;">
                   Nias Heritage Library berdiri sejak tahun 2026 yang merupakan perpustakaan umum berbasis digital berfungsi sebagai pusat informasi tentang sejarah, budaya, wisata NIAS. Perpustakaan ini dapat diakses oleh semua kalangan dari pelajar, mahasiswa, peneliti hingga wisatawan yang ingin mengenal Nias lebih dalam. Melalui pemanfaatan teknologi digital, NHL bertujuan untuk melestarikan warisan budaya Nias sekaligus menjadi sumber referensi yang mudah diakses, edukatif, dan bermanfaat bagi generasi sekarang maupun yang akan datang.
                </p>
                <p style="background-color: #f9f9f9; padding: 10px; border-left: 4px solid #8b0000;">
                    <b>Visi:</b><br>
                    Menjadi pusat informasi dan referensi digital terpercaya yang melestarikan serta memperkenalkan sejarah, budaya, dan kekayaan daerah Nias kepada masyarakat luas.
                </p>
            </div>

            <div class="card-item">
                <h3 style="color: #8b0000;">🎯 Misi Kami</h3>
                <hr>
                <ul style="text-align: left; padding-left: 15px; font-size: 14px; line-height: 1.8;">
                    <li>Menghimpun dan menyediakan koleksi informasi tentang sejarah, budaya, wisata, dan perkembangan Nias secara lengkap dan terstruktur.</li>
                    <li>Memanfaatkan teknologi digital untuk mempermudah akses informasi bagi semua kalangan.</li>
                    <li>Mendukung kegiatan pendidikan, penelitian, dan pelestarian warisan budaya Nias.</li>
                    <li>Menjadi media edukasi yang membantu masyarakat mengenal dan mencintai identitas daerah Nias.</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="contact" class="page">
      <body onload="showPage('login'); updateCountdown();">

  <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
        <hr>
    <div class="welcome-section">
        <h2>Contact Us</h2>
        <p>Hubungi kami untuk informasi lebih lanjut atau bantuan layanan perpustakaan.</p>
    </div>

    <div class="home-grid">
        <div class="card-item">
            <h3 style="color: #8b0000;">📱 Info Kontak</h3>
            <hr>
            <div style="text-align: left; padding: 15px;">
                <div style="margin-bottom: 20px;">
                    <p><b>📧 Alamat Email:</b><br>
                    <span style="color: #555;">desmor830@gmail.com</span></p>
                </div>

                <div style="margin-bottom: 20px;">
                    <p><b>💬 WhatsApp Admin:</b><br>
                    <a href="https://wa.me/6281360758627" target="_blank" style="color: #27ae60; font-weight: bold; text-decoration: none;">
                        Chat Sekarang ➔
                    </a></p>
                </div>

                <div style="margin-bottom: 10px;">
                    <p><b>🌐 Ikuti Media Sosial:</b></p>
                    <div style="display: flex; gap: 12px; margin-top: 10px;">
                        <a href="https://www.instagram.com/desri_hia" target="_blank" style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color: white; padding: 8px 15px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: bold;">
                           📸 Instagram
                        </a>
                        <a href="https://www.facebook.com/share/1GPpua2KP3/" target="_blank" style="background: #3b5998; color: white; padding: 8px 15px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: bold;">
                           👥 Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-item">
            <h3 style="color: #8b0000;">✍️ Kirim Pesan</h3>
            <hr>
            <form style="text-align: left; padding: 10px;">
                <div style="margin-bottom: 15px;">
                    <label>👤 Nama Lengkap:</label>
                    <input type="text" placeholder="Masukkan nama Anda..." style="width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>📩 Alamat Email:</label>
                    <input type="email" placeholder="Contoh: nama@gmail.com" style="width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>📝 Pesan Anda:</label>
                    <textarea rows="4" placeholder="Tulis pesan atau pertanyaan di sini..." style="width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                </div>
                
                <input type="submit" value="🚀 Kirim Pesan" style="background: #8b0000; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold; font-size: 15px; transition: 0.3s;">
            </form>
        </div>
    </div>
</div>
    
    <div id="event" class="page">
         <body onload="showPage('login'); updateCountdown();">

  <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
    <div class="welcome-section">
        <h2>Event & Kegiatan</h2>
        <p>Ikuti berbagai kegiatan literasi dan pelestarian budaya Nias bersama kami.</p>
    </div>

    <div class="home-grid">
        <div class="card-item">
            <h2>LENTERA NIAS</h2>
            <p id="timer" style="font-weight:bold; color:#d35400; font-size: 14px; margin-bottom: 10px;"></p> 
            <p style="font-size: 14px; color: #555;"><i>(Literasi Digital untuk Pelestarian Budaya Nias)</i></p>
            <hr>
            <p>📅 Senin, 30 Maret 2026</p>
            <p>🕒 10.00 WIB – Selesai</p>
            <p>📍 Zoom Meeting</p>
            <br>
            <a href="https://wa.me/6281360758627" target="_blank" style="background-color: #8b0000; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Daftar Disini</a>
        </div>
    
    <div class="card-item">
    <h2>NIAS STORYTELLING</h2>
    <p style="font-weight:bold; color:#27ae60; font-size: 14px; margin-bottom: 10px;">Status: Pendaftaran Dibuka</p> 
    <p style="font-size: 14px; color: #555;"><i>(Lomba Bercerita Legenda Nias untuk Pelajar)</i></p>
    <hr>
    <p>📅 Sabtu, 18 April 2026</p>
    <p>🕒 09.00 WIB – Selesai</p>
    <p>📍 Aula Perpustakaan & Live YouTube</p>
    <br>
    <a href="https://wa.me/6281360758627" target="_blank" style="background-color: #27ae60; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Daftar Sekarang</a>
</div>
    <div class="card-item">
    <h2>LOMBA MENULIS CERPEN</h2>
    <p style="font-weight:bold; color:#27ae60; font-size: 14px; margin-bottom: 10px;">Status: Pendaftaran Dibuka!</p> 
    <p style="font-size: 14px; color: #555;"><i>"Melestarikan Legenda Nias Lewat Tulisan"</i></p>
    <hr>
    <p>📅 Deadline: 20 Mei 2026</p>
    <p>🏆 Total Hadiah: Rp 2.000.000</p>
    <p>📧 Kirim ke: desmor830@gmail.com</p>
    <br>
   <a href="https://wa.me/6281360758627" target="_blank" style="background-color: #27ae60; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block;">Daftar Sekarang</a>
</div>
        </div>
             </div>
    
    <div id="maps" class="page" style="display:none;">
         <body onload="showPage('login'); updateCountdown();">

  <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
    <div class="welcome-section">
        <h2>Peta Navigasi & Panduan NHL</h2>
        <p>Klik pada kotak menu di bawah ini untuk langsung menuju halaman yang Anda cari.</p>
    </div>

    <div class="home-grid">
        <div class="card-item" onclick="showPage('home')" style="cursor: pointer; border: 2px solid #8b0000;">
            <h3 style="color: #8b0000;">🏠 HOME (Beranda)</h3>
            <p>Halaman utama yang berisi sambutan hangat, sedikit penjelasan tentang web NHL, dan ada nya kolom kalkulator dan kamus kecil bahasa Nias.</p>
        </div>

        <div class="card-item" onclick="showPage('collection')" style="cursor: pointer; border: 2px solid #8b0000;">
            <h3 style="color: #8b0000;">📚 COLLECTION (Koleksi)</h3>
            <p>Gudang ilmu kami. Di sini Anda bisa mencari Buku Digital, Jurnal Penelitian, Koleksi Sejarah Budaya Nias, serta Vidio tentang Nias yang sudah didigitalkan.</p>
        </div>

        <div class="card-item" onclick="showPage('service')" style="cursor: pointer; border: 2px solid #8b0000;">
            <h3 style="color: #8b0000;">🛠️ SERVICE (Layanan)</h3>
            <p>Berisi layanan informasi perpustakaan .</p>
        </div>

        <div class="card-item" onclick="showPage('profil')" style="cursor: pointer; border: 2px solid #8b0000;">
            <h3 style="color: #8b0000;">🏛️ PROFIL (Tentang Kami)</h3>
            <p>Penjelasan mendalam mengenai sejarah berdirinya NHL, dan Visi Misi dari web NHL.</p>
        </div>

        <div class="card-item" onclick="showPage('event')" style="cursor: pointer; border: 2px solid #8b0000;">
            <h3 style="color: #8b0000;">📅 EVENT (Kegiatan)</h3>
            <p>Pusat update kegiatan terbaru. Cari jadwal Lomba Menulis, Nias Storytelling, Webinar Kebudayaan, dan pendaftaran event literasi di sini.</p>
        </div>

        <div class="card-item" onclick="showPage('contact')" style="cursor: pointer; border: 2px solid #8b0000;">
            <h3 style="color: #8b0000;">📞 CONTACT US (Hubungi Kami)</h3>
            <p>Butuh bantuan admin? Halaman ini menyediakan nomor WhatsApp, alamat email, dan formulir pesan singkat.</p>
        </div>

        <div class="card-item" onclick="showPage('admin')" style="cursor: pointer; border: 2px solid #2c3e50; background-color: #f9f9f9;">
            <h3 style="color: #8b0000;">🔑 ADMIN (Tentang Admin)</h3>
            <p>Berisi tentang contact admin yang bisa diakses oleh pengguna.</p>
        </div>
    </div>
</div>
    <div id="admin" class="page">
        <body onload="showPage('login'); updateCountdown();">

 <nav class="navbar">
    <div class="logo-nhl">NHL</div>
    <div class="menu-links">
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('collection')">Collection</a>
        <a href="#" onclick="showPage('service')">Service</a>
        <a href="#" onclick="showPage('profil')">Profil</a>
        <a href="#" onclick="showPage('contact')">Contact Us</a>
        <a href="#" onclick="showPage('event')">Event</a> 
        <a href="#" onclick="showPage('admin')">Admin</a>
        <a href="#" onclick="showPage('maps')">Maps</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>
</nav>
        <hr>
    <div class="welcome-section">
        <h2>Administrator Profil</h2>
        <p>Halaman informasi pengelola Nias Heritage Library (NHL).</p>
    </div>

    <div class="home-grid">
        <div class="card-item">
            <h3 style="color: #8b0000;">👤 Tentang Admin</h3>
            <hr>
            <div style="text-align: left; padding: 15px;">
                
                <div style="margin-bottom: 25px;">
                    <p><b>👋 Halo, Saya Admin NHL!</b><br>
                    <span style="color: #555;">Silakan hubungi saya melalui saluran di bawah ini untuk bantuan teknis atau kerjasama:</span></p>
                </div>

                <div style="margin-bottom: 20px;">
                    <p><b>💬 WhatsApp:</b><br>
                    <a href="https://wa.me/6281360758627" target="_blank" style="color: #27ae60; font-weight: bold; text-decoration: none;">
                        📱 Chat Via WhatsApp ➔
                    </a></p>
                </div>

                <div style="margin-bottom: 20px;">
                    <p><b>📸 Instagram:</b><br>
                    <a href="https://www.instagram.com/desri_hia" target="_blank" style="color: #bc1888; font-weight: bold; text-decoration: none;">
                        📷 @desri_hia ➔
                    </a></p>
                </div>

                <div style="margin-bottom: 20px;">
                    <p><b>📄 Curriculum Vitae:</b><br>
                    <a href="https://drive.google.com/file/d/1wZL1pqHDX50uAKH0aYgl5e1xYB8LVlVf/view?usp=drivesdk" target="_blank" style="background: #8b0000; color: white; padding: 5px 12px; border-radius: 5px; text-decoration: none; font-size: 13px;">
                        📂 Lihat CV Admin
                    </a></p>
                </div>

                <div style="margin-bottom: 10px;">
                    <p><b>👥 Facebook:</b><br>
                    <a href="https://www.facebook.com/share/1GPpua2KP3/" target="_blank" style="color: #3b5998; font-weight: bold; text-decoration: none;">
                        🔵 Desri Moralina Hia ➔
                    </a></p>
                </div>

            </div>
        </div>

        <div class="card-item">
            <h3 style="color: #8b0000;">🏝️ Destinasi Nias</h3>
            <hr>
            <div style="padding: 10px;">
                <p style="text-align: left; margin-bottom: 15px;"><b>🎬 Pantai Sorake Nias Selatan:</b></p>
                <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" 
                        src="https://www.youtube.com/embed/JfZl9T-YJ5E" allowfullscreen>
                    </iframe>
                </div>
                <p style="font-size: 12px; margin-top: 15px; color: #777; font-style: italic;">
                    "Indahnya ombak Nias, warisan dunia yang harus kita jaga bersama." ✨
                </p>
            </div>
        </div>
    </div>
</div>

    <div class="whatsapp">
        <a href="https://wa.me/6281360758627" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/220/220236.png" style="width:50px;">
        </a>
    </div>
<footer>
        <p>NHL 2026 | Rancangan Desri Moralina Hia</p>
    </footer>
</body>
</html>
