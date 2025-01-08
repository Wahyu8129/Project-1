document.addEventListener("DOMContentLoaded", function() {
    // Define the handleSearch function
    function handleSearch() {
        const searchInput = document.getElementById('search-input').value.toLowerCase();
        const recipes = document.querySelectorAll('.recipe');

        recipes.forEach(recipe => {
            const title = recipe.querySelector('.recipe-info h2').textContent.toLowerCase();
            if (title.includes(searchInput)) {
                recipe.style.display = 'block';  // Tampilkan resep yang sesuai
            } else {
                recipe.style.display = 'none';  // Sembunyikan resep yang tidak sesuai
            }
        });

        // Cek apakah ada hasil yang ditemukan
        const results = document.querySelectorAll('.recipe[style="display: block;"]');
        if (results.length === 0) {
            alert('Resep tidak ditemukan.');
        }
    }

    // Search functionality on button click
    document.getElementById('search-button').addEventListener('click', handleSearch);

    // Search functionality on ENTER key press
    document.getElementById('search-input').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            handleSearch();
        }
    });

    // View Recipe functionality
    document.querySelectorAll('.view-recipe').forEach(button => {
        button.addEventListener('click', function() {
            alert('Resep ini belum tersedia.');
        });
    });

    // Home navigation functionality
    document.getElementById('home-link').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.reload();
    });

    // Other navigation functionality
    document.querySelectorAll('nav ul li a').forEach(navItem => {
        if (navItem.id !== 'home-link') {
            navItem.addEventListener('click', function(event) {
                event.preventDefault();
                alert('Halaman ini belum tersedia.');
            });
        }
    });
});
