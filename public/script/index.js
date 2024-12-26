// Data card portfolio
const portfolioItems = [
    { title: "Project 1", body: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." },
    { title: "Project 2", body: "Description for project 2" },
    { title: "Project 3", body: "Description for project 3" },
    { title: "Project 4", body: "Description for project 4" },
    { title: "Project 5", body: "Description for project 5" },
    { title: "Project 6", body: "Description for project 6" },
    { title: "Project 7", body: "Description for project 7" },
];

// Pagination variables
const itemsPerPage = 3;
let currentPage = 1;

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
                <div class="image-placeholder"></div>
                <div class="portfolio-content">
                    <h3>${item.title}</h3>
                    <p>${item.body}</p>
                    <button>View</button>
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

// Ambil elemen button
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// Fungsi untuk mendeteksi scroll
window.onscroll = function () {
    // Jika user scroll lebih dari 100px, tampilkan button
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.style.display = "block";
    } else {
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
// Initial render
renderPortfolio();