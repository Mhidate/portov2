<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/image/icons/title-icon.png" type="image/png">
    <title>Muhammad Hidayatullah</title>
    <link rel="stylesheet" href="public/css/index.css">
</head>

<body>
    <!-- Button Scroll to Top -->
    <button id="scrollToTopBtn" class="scroll-to-top" onclick="scrollToTop()">
        ↑
    </button>
    <div class="main-container">
        <!-- Profile Container -->
        <div class="profile-container">
            <img src="uploads/profile-foto.jpg" alt="Profile" class="profile-image">
            <h2>Muhammad Hidayatullah</h2>
            <p>Software Engineer</p>
            <div class="social-icons">
            <a href="#"><img src="public/image/icons/telegram.png" alt="Telegram"></a>
                <a href="#"><img src="public/image/icons/github.png" alt="GitHub"></a>
                <a href="#"><img src="public/image/icons/linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="public/image/icons/email.png" alt="Email"></a>
                <a href="#"><img src="public/image/icons/ig.png" alt="Instagram"></a>
            </div>
        </div>

        <!-- Portfolio Container -->
        <!-- Portfolio Container -->
        <div class="portfolio-container">
            <h1>Portfolio Projects</h1>
            <div id="portfolio-container" class="portfolio-list"></div>
            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <span id="pageNumber">1</span> / <span id="totalPages">1</span>
                <button id="nextBtn">Next</button>
            </div>
        </div>

    </div>

    
</body>

    <!-- <script src="public/script/index.js"></script> -->
    <script src="public/script/data_index.js"></script>
    <!-- <script src="public/script/index_button_up.js"></script> -->
 

</html>
