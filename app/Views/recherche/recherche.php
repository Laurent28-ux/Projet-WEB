<?php
$pageTitle = 'Rechercher un voyage | Click & Go';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../public/css/recherche.css">
</head>
<body id="top">
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main>
        <section class="search-hero">
            <div class="search-hero__content">
                <p class="eyebrow">LE MONDE À PORTÉE DE CLIC</p>
                <h1>Votre prochaine histoire commence ici.</h1>
                <p>Des idées d’évasion, des prix tout doux et un voyage qui vous ressemble.</p>
            </div>
            <?php include __DIR__ . '/../layouts/barre.php'; ?>
        </section>

        <section class="search-layout page-container" aria-labelledby="results-title">
            <aside class="filter-panel">
                <div class="filter-panel__heading">
                    <div>
                        <p class="eyebrow">AFFINEZ VOTRE SÉJOUR</p>
                        <h2>Filtres</h2>
                    </div>
                    <button class="text-button" type="reset" form="search-filters">Réinitialiser</button>
                </div>
                <form class="filter-form" id="search-filters">
                    <div class="filter-group">
                        <div class="filter-group__top">
                            <label for="filter-price">Budget maximum</label>
                            <output for="filter-price" id="price-output">3 000 €</output>
                        </div>
                        <input id="filter-price" name="price" type="range" min="0" max="3000" step="50" value="3000">
                        <div class="range-ends"><span>0 €</span><span>3 000 €</span></div>
                    </div>

                    <fieldset class="filter-group filter-types">
                        <legend>Type de voyage</legend>
                        <label class="check-row"><input type="checkbox" name="type" value="vol"><span>Vols</span><span class="check-count">24</span></label>
                        <label class="check-row"><input type="checkbox" name="type" value="hotel"><span>Hébergements</span><span class="check-count">18</span></label>
                        <label class="check-row"><input type="checkbox" name="type" value="circuit"><span>Voyages tout prêts</span><span class="check-count">12</span></label>
                        <label class="check-row"><input type="checkbox" name="type" value="activite"><span>Activités</span><span class="check-count">9</span></label>
                    </fieldset>

                    <div class="filter-group">
                        <div class="filter-group__top">
                            <label for="filter-duration">Durée du séjour</label>
                            <output for="filter-duration" id="duration-output">30 jours</output>
                        </div>
                        <input id="filter-duration" name="duration" type="range" min="1" max="30" value="30">
                        <div class="range-ends"><span>1 jour</span><span>30 jours</span></div>
                    </div>

                    <div class="filter-group">
                        <label for="filter-company">Compagnie aérienne</label>
                        <select id="filter-company" name="company">
                            <option value="">Toutes les compagnies</option>
                            <option value="air-france">Air France</option>
                            <option value="ana">ANA</option>
                            <option value="lufthansa">Lufthansa</option>
                        </select>
                    </div>
                    <button class="button button--primary filter-submit" type="submit">Appliquer les filtres</button>
                </form>
            </aside>

            <section class="results-section">
                <div class="results-toolbar">
                    <div>
                        <p class="eyebrow">INSPIRATION VOYAGE</p>
                        <h2 id="results-title">Des voyages qui font rêver <span class="results-count">(3 séjours)</span></h2>
                    </div>
                    <div class="results-actions">
                        <label class="sort-control" for="sort-results"><span>Trier par</span>
                            <select id="sort-results" name="sort">
                                <option value="recommended">Recommandés</option>
                                <option value="ascending">Prix croissant</option>
                                <option value="descending">Prix décroissant</option>
                                <option value="rating">Meilleures notes</option>
                            </select>
                        </label>
                        <div class="view-switch" role="group" aria-label="Présentation des résultats">
                            <button type="button" class="view-switch__button is-active" data-card-view="list" aria-label="Vue en liste" aria-pressed="true">☰</button>
                            <button type="button" class="view-switch__button" data-card-view="grid" aria-label="Vue en grille" aria-pressed="false">▦</button>
                        </div>
                    </div>
                </div>

                <div class="results-list card--list" id="results-list" aria-live="polite">
                    <article class="travel-card" data-price="299" data-rating="4.7" data-duration="1" data-type="vol" data-company="air-france">
                        <a class="travel-card__image" href="resultats.php" aria-label="Découvrir le vol Paris-Tokyo">
                            <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&amp;fit=crop&amp;w=800&amp;q=85" alt="Avion en vol au-dessus des nuages" loading="lazy">
                            <span class="image-badge">MEILLEUR PRIX</span>
                        </a>
                        <div class="travel-card__body">
                            <div class="travel-card__details">
                                <p class="card-category">VOL · ALLER-RETOUR</p>
                                <h3>Vol Paris → Tokyo</h3>
                                <p class="card-rating"><span aria-hidden="true">★</span> 4,7 <span>(1 245 avis)</span></p>
                                <p class="card-meta"><span aria-hidden="true">◷</span> 14 h 30 <span>·</span> Direct</p>
                            </div>
                            <div class="travel-card__purchase">
                                <p class="card-price">299 € <span>/ pers.</span></p>
                                <a class="button button--primary button--small" href="resultats.php">Voir le voyage <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </article>

                    <article class="travel-card" data-price="699" data-rating="4.6" data-duration="5" data-type="hotel">
                        <a class="travel-card__image" href="resultats.php" aria-label="Découvrir l’hôtel The Tokyo Bay">
                            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&amp;fit=crop&amp;w=800&amp;q=85" alt="Hôtel élégant au bord de l’eau à Tokyo" loading="lazy">
                        </a>
                        <div class="travel-card__body">
                            <div class="travel-card__details">
                                <p class="card-category">HÉBERGEMENT · 5 NUITS</p>
                                <h3>Hôtel The Tokyo Bay</h3>
                                <p class="card-rating"><span aria-hidden="true">★</span> 4,6 <span>(856 avis)</span></p>
                                <p class="card-meta"><span aria-hidden="true">⌖</span> Tokyo, Japon</p>
                            </div>
                            <div class="travel-card__purchase">
                                <p class="card-price">699 € <span>/ séjour</span></p>
                                <a class="button button--primary button--small" href="resultats.php">Voir le voyage <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </article>

                    <article class="travel-card" data-price="1099" data-rating="4.8" data-duration="7" data-type="circuit">
                        <a class="travel-card__image" href="resultats.php" aria-label="Découvrir le circuit Japon de 7 jours">
                            <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&amp;fit=crop&amp;w=800&amp;q=85" alt="Rue traditionnelle japonaise et architecture ancienne" loading="lazy">
                        </a>
                        <div class="travel-card__body">
                            <div class="travel-card__details">
                                <p class="card-category">VOYAGE TOUT PRÊT · 7 JOURS</p>
                                <h3>Circuit Japon 7j/6n</h3>
                                <p class="card-rating"><span aria-hidden="true">★</span> 4,8 <span>(732 avis)</span></p>
                                <p class="card-meta"><span aria-hidden="true">⌖</span> Tokyo, Kyoto <span>·</span> Vol inclus</p>
                            </div>
                            <div class="travel-card__purchase">
                                <p class="card-price">1 099 € <span>/ pers.</span></p>
                                <a class="button button--primary button--small" href="resultats.php">Voir le voyage <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </article>
                    <p class="empty-state" id="empty-results" hidden>Aucun séjour ne correspond à ces filtres. Essayez d’élargir votre recherche.</p>
                </div>
            </section>
        </section>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="../../../public/js/recherche.js"></script>
</body>
</html>
