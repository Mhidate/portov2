// Pagination variables
const itemsPerPage = 3;
let currentPage = 1;
let portfolioItems = [];  // Data portfolio akan disimpan di sini

// Fungsi untuk mengambil data dari server
function fetchPortfolioData() {
    fetch('http://localhost/portov2/app/data/get_data.php')
        .then(response => response.json())
        .then(data => {
            portfolioItems = data;  // Menyimpan data ke dalam portfolioItems
            renderPortfolio();      // Render data setelah diambil
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
                    <h3>${item.title}</h3>
                    <p>${item.desk}</p>
                    <a href="${item.link}" target="_blank">
                        <button>View</button>
                    </a>
                </div>
            </div>
        `;
        container.innerHTML += card;
    });

    // Update page number
    document.getElementById("pageNumber").innerText = currentPage;
}

// Event listeners for buttons
document.getElementById("prevBtn").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        renderPortfolio();
    }
});

document.getElementById("nextBtn").addEventListener("click", () => {
    if (currentPage < Math.ceil(portfolioItems.length / itemsPerPage)) {
        currentPage++;
        renderPortfolio();
    }
});

// Initial fetch and render
fetchPortfolioData();
