fetch("data/books.json")
  .then(res => res.json())
  .then(books => {
    const container = document.getElementById("books");
    const search = document.getElementById("search");

    function afficher(liste, max = 5) {
      container.innerHTML = "";
      liste.slice(0, max).forEach(b => {
        container.innerHTML += `
          <div class="book">
            <img src="${b.cover}" alt="${b.title}">
            <h4>${b.title}</h4>
            <p>${b.author}</p>
            <a href="${b.url}" target="_blank">Lire</a>
          </div>`;
      });
    }

    // afficher tous les livres au chargement (limité à 5)
    afficher(books);

    // filtrage en temps réel
    search.addEventListener("input", () => {
      let txt = search.value.toLowerCase();
      let filtres = books.filter(b => b.title.toLowerCase().includes(txt));
      afficher(filtres);
    });
});
