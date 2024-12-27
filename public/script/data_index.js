// Pagination variables
const itemsPerPage = 3;
let currentPage = 1;
let totalPages = 0;
let portfolioItems = [];

// Fungsi untuk mengambil data dari server
function fetchPortfolioData() {
    fetch('app/data/get_data.php')  // Pastikan path file PHP sesuai dengan lokasi Anda
        .then(response => response.json())
        .then(data => {
            console.log("Data yang diterima:", data);  // Melihat data yang diterima di console
            portfolioItems = data;  // Menyimpan data ke dalam portfolioItems
            totalPages = Math.ceil(portfolioItems.length / itemsPerPage);  // Hitung total halaman
            currentPage = 1; // Reset ke halaman pertama
            renderPortfolio();      // Render data setelah diambil
            renderPagination();     // Render pagination setelah data diambil
        })
        .catch(error => {
            console.error("Error fetching portfolio data:", error);
        });
}

// Render portfolio items
function renderPortfolio() {
    const container = document.getElementById("portfolio-container");
    container.innerHTML = ""; // Clear container

    // Calculate start and end index
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    // Generate portfolio items for current page
    const currentItems = portfolioItems.slice(startIndex, endIndex);
    currentItems.forEach(item => {
        const card = `
            <div class="portfolio-item">
               
                <div class="portfolio-content">
                    <h3>${item.title}</h3>  <!-- Menggunakan title -->
                    <p>${item.desk}</p>     <!-- Menggunakan desk -->
                    <a href="${item.link}" target="_blank">
                        <button>View</button>
                    </a>
                </div>
            </div>
        `;
        container.innerHTML += card;
    });

    // Update page number and page info
    document.getElementById("pageNumber").innerText = currentPage;
    document.getElementById("pageInfo").innerText = `Page ${currentPage} of ${totalPages}`;
}

// Render pagination buttons and info
function renderPagination() {
    const pageInfo = document.getElementById("pageInfo");
    pageInfo.innerHTML = `Page ${currentPage} of ${totalPages}`;  // Menampilkan informasi halaman

    // Disable prevBtn if on the first page
    document.getElementById("prevBtn").disabled = currentPage === 1;

    // Disable nextBtn if on the last page
    document.getElementById("nextBtn").disabled = currentPage === totalPages;


}
// Fungsi untuk scroll ke atas saat tombol Next/Prev ditekan
function scrollToTopIfMobile() {
    // Periksa jika lebar layar <= 768px
    if (window.matchMedia("(max-width: 768px)").matches) {
        window.scrollTo({
            top: 400,
            behavior: "smooth"
        });


    }
}

// Event listeners for buttons
document.getElementById("prevBtn").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        renderPortfolio();
        renderPagination();
        scrollToTopIfMobile();

    }

});

document.getElementById("nextBtn").addEventListener("click", () => {
    if (currentPage < totalPages) {
        currentPage++;
        renderPortfolio();
        renderPagination();
        scrollToTopIfMobile();

    }
});



// Initial fetch and render
fetchPortfolioData();
