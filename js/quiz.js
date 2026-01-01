// Mapping identique à votre logique PHP originale
const moodMap = {
    "q1": { "realiste": "focus", "symbolique": "curious", "chaotique": "tense" },
    "q2": { "drame": "sad", "thriller": "tense", "epopee": "adventurous" },
    "q3": { "mystere": "mystery", "histoire": "reflective", "emotion": "emotional" }
};

async function runSmartQuiz() {
    const q1Val = document.getElementById('q1').value;
    const q2Val = document.getElementById('q2').value;
    const q3Val = document.getElementById('q3').value;
    const lang = document.getElementById('language').value;
    const len = document.getElementById('length').value;

    // Traduction des réponses en moods
    const searchMoods = [moodMap.q1[q1Val], moodMap.q2[q2Val], moodMap.q3[q3Val]];

    const response = await fetch('data/books.json');
    const books = await response.json();

    const results = books.filter(b => {
        const moodMatch = searchMoods.some(m => b.moods.includes(m));
        const langMatch = b.language === lang;
        const lenMatch = b.length === len;
        return moodMatch && langMatch && lenMatch;
    });

    // Animation de sortie du quiz
    const form = document.getElementById('quizForm');
    form.style.opacity = "0";
    
    setTimeout(() => {
        document.getElementById('quiz-container').style.display = 'none';
        displayQuizResults(results.slice(0, 6));
    }, 500);
}

function displayQuizResults(list) {
    const grid = document.getElementById('results-grid');
    const resultsStep = document.getElementById('results-step');
    
    resultsStep.style.display = 'block';
    
    if (list.length === 0) {
        grid.innerHTML = "<p style='text-align:center; width:100%;'>Aucun livre ne correspond exactement, mais n'arrêtez pas de chercher !</p>";
    } else {
        grid.innerHTML = list.map(b => `
            <div class="book" onclick="openBookModal('${b.title}')">
                <img src="${b.cover}" alt="${b.title}">
                <h4>${b.title}</h4>
                <p>${b.author}</p>
                <span class="btn-small">Voir détails</span>
            </div>
        `).join('');
    }
}

// Fonction pour ouvrir la Modal (Infos du livre)
async function openBookModal(bookTitle) {
    const response = await fetch('data/books.json');
    const books = await response.json();
    const book = books.find(b => b.title === bookTitle);

    const modal = document.getElementById('bookModal');
    const body = document.getElementById('modalBody');

    body.innerHTML = `
        <div class="modal-flex">
            <img src="${book.cover}" style="width: 200px; border-radius: 10px;">
            <div>
                <h2 style="border:none; text-align:left;">${book.title}</h2>
                <p><strong>Auteur :</strong> ${book.author}</p>
                <p><strong>Langue :</strong> ${book.language === 'fr' ? 'Français' : 'Anglais'}</p>
                <p><strong>Moods :</strong> ${book.moods.join(', ')}</p>
                <p style="margin-top:20px;">Souhaitez-vous lire ce chef-d'œuvre ?</p>
                <a href="${book.url}" target="_blank" class="login-button" style="text-decoration:none;">Lire le livre</a>
            </div>
        </div>
    `;
    modal.style.display = "block";
}

function closeModal() {
    document.getElementById('bookModal').style.display = "none";
}