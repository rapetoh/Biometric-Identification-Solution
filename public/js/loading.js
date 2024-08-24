document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loader').style.display = 'none';
});

document.getElementById('uploadForm').addEventListener('submit', function() {
    document.getElementById('loader').style.display = 'flex'; // Affiche le loader
});

window.onload = function() {
    document.getElementById('loader').style.display = 'none';
};

window.addEventListener('beforeunload', function() {
    document.getElementById('loader').style.display = 'flex'; // Affiche le loader
    setTimeout(function() {
        document.getElementById('loader').style.display = 'none'; // Cache le loader après 500ms
    }, 500);
});