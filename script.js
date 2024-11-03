document.addEventListener('DOMContentLoaded', function() {
    // Function to handle search
    function handleSearch() {
        var searchInput = document.getElementById('search-input').value.toLowerCase();
        var recipes = document.querySelectorAll('.recipe');
        
        recipes.forEach(function(recipe) {
            var title = recipe.querySelector('h2').innerText.toLowerCase();
            var description = recipe.querySelector('p').innerText.toLowerCase();
            
            if (title.includes(searchInput) || description.includes(searchInput)) {
                recipe.style.display = '';
                recipe.querySelector('img').style.display = '';
            } else {
                recipe.style.display = 'none';
                recipe.querySelector('img').style.display = 'none';
            }
        });
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
