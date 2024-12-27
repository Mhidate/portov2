// Ambil elemen button
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// Periksa apakah tampilan dalam mode smartphone (max-width: 768px)
function isMobileView() {
    return window.matchMedia("(max-width: 768px)").matches;
}

// Fungsi untuk mendeteksi scroll
window.onscroll = function () {
    // Aktifkan script hanya jika dalam tampilan smartphone
    if (isMobileView()) {
        // Jika user scroll lebih dari 100px, tampilkan button
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    } else {
        // Sembunyikan button jika bukan tampilan smartphone
        scrollToTopBtn.style.display = "none";
    }
};

// Fungsi untuk scroll ke atas saat button diklik
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Efek smooth scroll
    });
}




