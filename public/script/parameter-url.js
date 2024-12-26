// Mendapatkan URL saat ini
var currentUrl = window.location.href;

// Menghapus parameter URL
function removeUrlParameter(parameter) {
    var url = new URL(currentUrl);
    url.searchParams.delete(parameter);
    window.history.replaceState({}, '', url);
}

// Contoh penggunaan: Menghapus parameter 'page'
removeUrlParameter('status');