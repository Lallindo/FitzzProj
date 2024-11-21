// Lista de imagens para alternância
const images = [
    "./imagens/camisetas/deidara-branca-c-1.webp",
    "./imagens/index/camiseta2.webp",
];
let currentIndex = 0;

// Elemento da imagem principal
const mainImage = document.getElementById("main-image");

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length; // Alterna para a próxima imagem
    mainImage.src = images[currentIndex];
}

function previousImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length; // Alterna para a imagem anterior
    mainImage.src = images[currentIndex];
}
