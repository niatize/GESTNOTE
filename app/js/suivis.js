document.addEventListener("DOMContentLoaded", () => {
    // 1. Accordéon : ouverture / fermeture
    const accordions = document.querySelectorAll(".card_matiere_accordion");

    accordions.forEach((card) => {
        const header = card.querySelector(".accordion_header");
        header.addEventListener("click", () => {
            accordions.forEach((item) => {
                if (item !== card) item.classList.remove("open");
            });
            card.classList.toggle("open");
        });
    });

    // 2. Recherche globale par nom d'élève
    const globalSearchInput = document.getElementById("input_recherche");
    if (globalSearchInput) {
        globalSearchInput.addEventListener("input", (e) => {
            const query = e.target.value.toLowerCase().trim();
            const rows = document.querySelectorAll(".table_block tbody tr");

            rows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? "" : "none";
            });
        });
    }

    // 3. Mini-filtre par tableau
    const miniSearches = document.querySelectorAll(".mini_search");
    miniSearches.forEach((input) => {
        input.addEventListener("input", (e) => {
            const query = e.target.value.toLowerCase().trim();
            const table = input.closest(".table_block").querySelector("tbody");
            const rows = table.querySelectorAll("tr");

            rows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? "" : "none";
            });
        });
    });

    // 4. Sélection rapide de matière depuis le filtre
    const matiereSelect = document.getElementById("matiere_select");
    if (matiereSelect) {
        matiereSelect.addEventListener("change", (e) => {
            const selectedMatiere = e.target.value.toLowerCase();

            accordions.forEach((card) => {
                const cardMatiere = card.getAttribute("data-matiere").toLowerCase();
                if (selectedMatiere === "" || cardMatiere === selectedMatiere) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    }
});