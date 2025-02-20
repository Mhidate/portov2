// Pagination variables
const itemsPerPage = 3;
let currentPage = 1;
let totalPages = 0;
let portfolioItems = [];

// Fetch data from the server
function fetchPortfolioData() {
    fetch('app/data/get_data.php') // Pastikan path ke file PHP sesuai
        .then(response => response.json())
        .then(data => {
            console.log("Data yang diterima dari server:", data); // Debug data dari server
            portfolioItems = data; // Simpan data ke dalam array
            totalPages = Math.ceil(portfolioItems.length / itemsPerPage); // Hitung total halaman
            renderPortfolio(); // Render portofolio
            updatePaginationInfo(); // Perbarui informasi pagination
        })
        .catch(error => console.error("Error fetching portfolio data:", error));
}

// Render portfolio items
function renderPortfolio() {
    const container = document.getElementById("portfolio-item");
    container.innerHTML = ""; // Bersihkan kontainer


    // Hitung indeks awal dan akhir
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    // Ambil item untuk halaman saat ini
    const currentItems = portfolioItems.slice(startIndex, endIndex);
    currentItems.forEach(item => {
        const card = `
            <div class="portfolio-item">      
                    <h3>${item.title}</h3>  
                    <p>${item.desk}</p>     
                    <a href="${item.link}" target="_blank">
                        <button>View</button>
                    </a>
            </div>
        `;
        container.innerHTML += card;
    });
}

// Update pagination information
function updatePaginationInfo() {
    document.getElementById("pageNumber").innerText = currentPage;
    document.getElementById("totalPages").innerText = totalPages;

    // Disable/Enable buttons based on current page
    document.getElementById("prevBtn").disabled = currentPage === 1;
    document.getElementById("nextBtn").disabled = currentPage === totalPages;
}

// Event listeners for buttons
document.getElementById("prevBtn").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        renderPortfolio();
        updatePaginationInfo();
    }
});

document.getElementById("nextBtn").addEventListener("click", () => {
    if (currentPage < totalPages) {
        currentPage++;
        renderPortfolio();
        updatePaginationInfo();
    }
});

// Initial fetch and render
fetchPortfolioData();
