<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Hidayatullah</title>
    <link rel="stylesheet" href="public/css/index.css">
</head>
<style>
  

</style>
<body>
    <!-- Button Scroll to Top -->
<button id="scrollToTopBtn" class="scroll-to-top" onclick="scrollToTop()">
    ↑
</button>
    <!-- Container utama -->
    <div class="container">
        <!-- Kiri: Profile -->
        <div class="profile">
            <img src="public/image/U2.png" alt="Profile Image" class="profile-img">
            <h1>Muhammad Hidayatullah</h1>
            <div class="social-icons">
                <a href="#"><img src="public/image/icons/telegram.png" alt="Telegram"></a>
                <a href="#"><img src="public/image/icons/github.png" alt="GitHub"></a>
                <a href="#"><img src="public/image/icons/linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="public/image/icons/email.png" alt="Email"></a>
                <a href="#"><img src="public/image/icons/ig.png" alt="Instagram"></a>
            </div>
        </div>

        <!-- Kanan: Portfolio -->
        <div class="portfolio">
            <h2>Portfolio</h2>
            <div id="portfolio-container">
                <!-- Card portfolio akan di-generate di sini -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button id="prevBtn">Prev</button>
                <span>Jumlah page</span>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>

    <!-- <script src="public/script/index.js"></script> -->
    <script src="public/script/data_index.js"></script>
 
</body>
</html>
