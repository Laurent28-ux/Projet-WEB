<section class="search-panel" aria-label="Rechercher un voyage">
    <div class="search-tabs" role="tablist" aria-label="Type de voyage">
        <button class="search-tab is-active" type="button" role="tab" aria-selected="true" data-search-category="Vols"><span aria-hidden="true">✈</span> Vols</button>
        <button class="search-tab" type="button" role="tab" aria-selected="false" data-search-category="Hébergements"><span aria-hidden="true">▰</span> Hébergements</button>
        <button class="search-tab" type="button" role="tab" aria-selected="false" data-search-category="Voyages tout prêts"><span aria-hidden="true">▣</span> Voyages tout prêts</button>
        <button class="search-tab" type="button" role="tab" aria-selected="false" data-search-category="Activités"><span aria-hidden="true">★</span> Activités</button>
    </div>
    <form class="search-form" action="recherche.php" method="get">
        <label class="search-field" for="departure">
            <span class="search-field__label">Départ</span>
            <span class="search-field__control"><span class="field-icon" aria-hidden="true">⌖</span><input id="departure" name="departure" type="text" value="Paris (PAR)" autocomplete="off"></span>
        </label>
        <span class="route-swap" aria-hidden="true">↔</span>
        <label class="search-field" for="destination">
            <span class="search-field__label">Destination</span>
            <span class="search-field__control"><span class="field-icon" aria-hidden="true">⌖</span><input id="destination" name="destination" type="text" value="Tokyo (TYO)" autocomplete="off"></span>
        </label>
        <label class="search-field" for="travel-dates">
            <span class="search-field__label">Dates</span>
            <span class="search-field__control"><span class="field-icon" aria-hidden="true">▦</span><input id="travel-dates" name="dates" type="text" value="14/12/2026 – 28/12/2026" aria-label="Dates du séjour"></span>
        </label>
        <label class="search-field search-field--travelers" for="travelers">
            <span class="search-field__label">Voyageurs</span>
            <span class="search-field__control"><span class="field-icon" aria-hidden="true">♙</span><select id="travelers" name="travelers"><option>1 voyageur</option><option>2 voyageurs</option><option>3 voyageurs</option><option>4 voyageurs</option></select></span>
        </label>
        <input type="hidden" name="category" id="search-category" value="Vols">
        <button class="button button--primary search-submit" type="submit">Rechercher <span aria-hidden="true">→</span></button>
    </form>
</section>
