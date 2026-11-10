const priceFilter = document.querySelector("#filter-price");
const durationFilter = document.querySelector("#filter-duration");
const priceOutput = document.querySelector("#price-output");
const durationOutput = document.querySelector("#duration-output");
const filterForm = document.querySelector("#search-filters");
const resultList = document.querySelector("#results-list");
const resultCards = Array.from(document.querySelectorAll(".travel-card"));
const emptyResults = document.querySelector("#empty-results");
const resultCount = document.querySelector(".results-count");
const numberFormatter = new Intl.NumberFormat("fr-FR");
const currencyFormatter = new Intl.NumberFormat("fr-FR", {
    style: "currency",
    currency: "EUR",
    maximumFractionDigits: 0
});

const updateRangeOutputs = () => {
    if (priceFilter instanceof HTMLInputElement && priceOutput instanceof HTMLOutputElement) {
        priceOutput.value = currencyFormatter.format(Number(priceFilter.value));
    }

    if (durationFilter instanceof HTMLInputElement && durationOutput instanceof HTMLOutputElement) {
        const days = Number(durationFilter.value);
        durationOutput.value = `${numberFormatter.format(days)} ${days === 1 ? "jour" : "jours"}`;
    }
};

const getSelectedTypes = () => Array.from(
    document.querySelectorAll(".filter-types input:checked"),
    (input) => input.value
);

const applyFilters = () => {
    if (!(priceFilter instanceof HTMLInputElement) || !(durationFilter instanceof HTMLInputElement)) {
        return;
    }

    const maxPrice = Number(priceFilter.value);
    const maxDuration = Number(durationFilter.value);
    const selectedTypes = getSelectedTypes();
    const company = document.querySelector("#filter-company")?.value ?? "";
    let visibleCount = 0;

    resultCards.forEach((card) => {
        const matchesPrice = Number(card.dataset.price) <= maxPrice;
        const matchesDuration = Number(card.dataset.duration) <= maxDuration;
        const matchesType = selectedTypes.length === 0 || selectedTypes.includes(card.dataset.type ?? "");
        const matchesCompany = !company || card.dataset.company === company || card.dataset.type !== "vol";
        const isVisible = matchesPrice && matchesDuration && matchesType && matchesCompany;

        card.hidden = !isVisible;
        if (isVisible) {
            visibleCount += 1;
        }
    });

    if (emptyResults instanceof HTMLElement) {
        emptyResults.hidden = visibleCount > 0;
    }

    if (resultCount instanceof HTMLElement) {
        resultCount.textContent = `(${visibleCount} ${visibleCount > 1 ? "séjours" : "séjour"})`;
    }
};

priceFilter?.addEventListener("input", () => {
    updateRangeOutputs();
    applyFilters();
});
durationFilter?.addEventListener("input", () => {
    updateRangeOutputs();
    applyFilters();
});

filterForm?.addEventListener("change", applyFilters);
filterForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    applyFilters();
});
filterForm?.addEventListener("reset", () => {
    window.setTimeout(() => {
        updateRangeOutputs();
        applyFilters();
    });
});

const sortControl = document.querySelector("#sort-results");
sortControl?.addEventListener("change", () => {
    if (!(sortControl instanceof HTMLSelectElement) || !(resultList instanceof HTMLElement)) {
        return;
    }

    const sorters = {
        ascending: (a, b) => Number(a.dataset.price) - Number(b.dataset.price),
        descending: (a, b) => Number(b.dataset.price) - Number(a.dataset.price),
        rating: (a, b) => Number(b.dataset.rating) - Number(a.dataset.rating),
        recommended: () => 0
    };

    const compare = sorters[sortControl.value] ?? sorters.recommended;
    resultCards.sort(compare).forEach((card) => resultList.insertBefore(card, emptyResults));
});

document.querySelectorAll("[data-card-view]").forEach((button) => {
    button.addEventListener("click", () => {
        if (!(button instanceof HTMLButtonElement) || !(resultList instanceof HTMLElement)) {
            return;
        }

        const isGrid = button.dataset.cardView === "grid";
        resultList.classList.toggle("card--grid", isGrid);
        resultList.classList.toggle("card--list", !isGrid);
        document.querySelectorAll("[data-card-view]").forEach((viewButton) => {
            const isActive = viewButton === button;
            viewButton.classList.toggle("is-active", isActive);
            viewButton.setAttribute("aria-pressed", String(isActive));
        });
    });
});

document.querySelectorAll("[data-search-category]").forEach((tab) => {
    tab.addEventListener("click", () => {
        if (!(tab instanceof HTMLButtonElement)) {
            return;
        }

        const categoryInput = document.querySelector("#search-category");
        document.querySelectorAll("[data-search-category]").forEach((item) => {
            const isActive = item === tab;
            item.classList.toggle("is-active", isActive);
            item.setAttribute("aria-selected", String(isActive));
        });

        if (categoryInput instanceof HTMLInputElement) {
            categoryInput.value = tab.dataset.searchCategory ?? "";
        }
    });
});

updateRangeOutputs();
applyFilters();
