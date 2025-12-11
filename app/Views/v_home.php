<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEBSITE E-LEARNING SMK PERMATA BANGSA</title>
  <link rel="stylesheet" href="<?= base_url('css/home.css') ?>?v=<?= time() ?>">
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header id="main-header" class="fade-in-header">
    <div class="logo">
      <h2>LEARNHUB</h2>
    </div>

    <nav>
      <ul>
        <li><a href="#" class="fade-in-nav">About</a></li>
        <li><a href="#" class="fade-in-nav">Contact</a></li>
        <li class="dropdown fade-in-nav">
          <button class="dropdown-toggle">More ▾</button>
          <ul class="dropdown-content">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
          </ul>
        </li>
      </ul>
    </nav>

    <div class="header-buttons fade-in-buttons">
      <a class="btn-header" href="<?= base_url('login_guru')?>">Login Guru</a>
      <a class="btn-header" href="<?= base_url('login_siswa')?>">Login Siswa</a>
      <a class="btn-header" href="<?= base_url('login_admin')?>">Login Admin</a>
    </div>
  </header>

  <!-- ===== MAIN CONTENT ===== -->
  <main class="container fade-in-content">
    <h1><span>WEBSITE E-LEARNING</span><br>SMK PERMATA BANGSA</h1>
    <p>
      Platform pembelajaran digital yang memudahkan guru dan siswa untuk berinteraksi, 
      berbagi materi, serta mengelola proses belajar mengajar secara efisien dan modern.
    </p>
  </main>

  <!-- ===== FOOTER ===== -->
  <footer>
    <p>copyright @learnhub</p>
  </footer>

  <!-- ===== SCRIPT ===== -->
  <script>
    // Efek header saat scroll
    window.addEventListener("scroll", function() {
      const header = document.getElementById("main-header");
      header.classList.toggle("scrolled", window.scrollY > 30);
    });

    // Dropdown "More" toggle click
    document.querySelectorAll(".dropdown-toggle").forEach(btn => {
      btn.addEventListener("click", function(e) {
        e.stopPropagation();
        const dropdown = this.nextElementSibling;
        dropdown.classList.toggle("show");
      });
    });

    // Klik di luar dropdown -> tutup
    document.addEventListener("click", () => {
      document.querySelectorAll(".dropdown-content.show").forEach(menu => {
        menu.classList.remove("show");
      });
    });
  </script>

</body>
</html>
