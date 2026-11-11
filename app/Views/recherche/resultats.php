<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circuit Japon 7j/6n | Click &amp; Go</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../public/css/resultats.css">
</head>

<body id="top">
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <main class="page-shell">
        <a class="back-link" href="recherche.php">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m15 18-6-6 6-6M9 12h12" />
            </svg>
            Retour aux résultats
        </a>
        <section class="gallery" aria-label="Photos du circuit au Japon">
            <div class="gallery-main">
                <img
                    class="hero-image"
                    src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&amp;fit=crop&amp;w=1600&amp;q=85"
                    alt="Rue traditionnelle japonaise au pied des montagnes">
                <span class="photo-count" aria-live="polite">1 / 5</span>
                <button class="gallery-arrow gallery-arrow--previous" type="button" aria-label="Photo précédente">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>
                <button class="gallery-arrow gallery-arrow--next" type="button" aria-label="Photo suivante">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
            <div class="gallery-thumbnails" role="group" aria-label="Choisir une photo">
                <button class="thumbnail is-active" type="button" aria-label="Afficher la photo 1" aria-pressed="true"
                    data-image="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&amp;fit=crop&amp;w=1600&amp;q=85"
                    data-alt="Rue traditionnelle japonaise au pied des montagnes">
                    <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&amp;fit=crop&amp;w=200&amp;h=130&amp;q=75" alt="">
                </button>
                <button class="thumbnail" type="button" aria-label="Afficher la photo 2" aria-pressed="false"
                    data-image="https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&amp;fit=crop&amp;w=1600&amp;q=85"
                    data-alt="Temple japonais entouré de cerisiers">
                    <img src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&amp;fit=crop&amp;w=200&amp;h=130&amp;q=75" alt="">
                </button>
                <button class="thumbnail" type="button" aria-label="Afficher la photo 3" aria-pressed="false"
                    data-image="https://images.unsplash.com/photo-1513407030348-c983a97b98d8?auto=format&amp;fit=crop&amp;w=1600&amp;q=85"
                    data-alt="Pagode japonaise au milieu d'un paysage verdoyant">
                    <img src="https://images.unsplash.com/photo-1513407030348-c983a97b98d8?auto=format&amp;fit=crop&amp;w=200&amp;h=130&amp;q=75" alt="">
                </button>
                <button class="thumbnail" type="button" aria-label="Afficher la photo 4" aria-pressed="false"
                    data-image="https://images.unsplash.com/photo-1503899036084-c55cdd92da26?auto=format&amp;fit=crop&amp;w=1600&amp;q=85"
                    data-alt="Quartier animé de Tokyo à la tombée du jour">
                    <img src="https://images.unsplash.com/photo-1503899036084-c55cdd92da26?auto=format&amp;fit=crop&amp;w=200&amp;h=130&amp;q=75" alt="">
                </button>
                <button class="thumbnail" type="button" aria-label="Afficher la photo 5" aria-pressed="false"
                    data-image="https://images.unsplash.com/photo-1492571350019-22de08371fd3?auto=format&amp;fit=crop&amp;w=1600&amp;q=85"
                    data-alt="Paysage de montagne au Japon">
                    <img src="https://images.unsplash.com/photo-1492571350019-22de08371fd3?auto=format&amp;fit=crop&amp;w=200&amp;h=130&amp;q=75" alt="">
                </button>
            </div>
        </section>
        <article class="trip-card">
            <div class="trip-heading">
                <div>
                    <p class="eyebrow">JAPON <span>·</span> CIRCUIT ORGANISÉ</p>
                    <h1>Circuit Japon <span>7j/6n</span></h1>
                    <div class="rating" aria-label="Note de 4,8 sur 5, basée sur 732 avis">
                        <span class="rating-star" aria-hidden="true">★</span>
                        <strong>4,8</strong>
                        <a href="#avis">(732 avis)</a>
                    </div>
                </div>
                <p class="price"><strong>1&nbsp;099&nbsp;€</strong><span>par personne</span></p>
            </div>
            <p class="trip-intro">Découvrez le Japon entre traditions et modernité !</p>
            <ul class="trip-includes" aria-label="Prestations incluses">
                <li><span aria-hidden="true"><i class="fa-solid fa-plane"></i></span> Vol inclus</li>
                <li><span aria-hidden="true"><i class="fa-solid fa-hotel"></i></span> Hôtel 4<i class="fa-solid fa-star"></i></li>
                <li><span aria-hidden="true"><i class="fa-solid fa-heart"></i></span> Pension complète</li>
                <li><span aria-hidden="true"><i class="fa-solid fa-globe"></i></span> Tokyo, Kyoto</li>
            </ul>
            <nav class="tabs" aria-label="Informations sur le voyage" role="tablist">
                <button class="tab is-active" id="tab-description" type="button" role="tab" aria-selected="true" aria-controls="panel-description">Description</button>
                <button class="tab" id="tab-programme" type="button" role="tab" aria-selected="false" aria-controls="panel-programme" tabindex="-1">Programme</button>
                <button class="tab" id="tab-pension" type="button" role="tab" aria-selected="false" aria-controls="panel-pension" tabindex="-1">Pension</button>
                <button class="tab" id="tab-avis" type="button" role="tab" aria-selected="false" aria-controls="panel-avis" tabindex="-1">Avis clients</button>
                <button class="tab" id="tab-conditions" type="button" role="tab" aria-selected="false" aria-controls="panel-conditions" tabindex="-1">Conditions</button>
            </nav>
            <div class="tab-content">
                <section class="tab-panel is-active" id="panel-description" role="tabpanel" aria-labelledby="tab-description">
                    <p>Un voyage inoubliable au cœur du Japon, entre temples, paysages ancestraux, villes effervescentes et paysages à couper le souffle.</p>
                </section>
                <section class="tab-panel" id="panel-programme" role="tabpanel" aria-labelledby="tab-programme" hidden>
                    <p><strong>Jour 1–2</strong> · Arrivée à Tokyo et découverte de ses quartiers emblématiques.</p>
                    <p><strong>Jour 3–4</strong> · Temples de Kyoto, jardins zen et cérémonie du thé.</p>
                    <p><strong>Jour 5–7</strong> · Excursion au mont Fuji, temps libre et retour.</p>
                </section>
                <section class="tab-panel" id="panel-pension" role="tabpanel" aria-labelledby="tab-pension" hidden>
                    <p>Pension complète incluse : petits-déjeuners, déjeuners et dîners, avec plusieurs spécialités locales à découvrir.</p>
                </section>
                <section class="tab-panel" id="panel-avis" role="tabpanel" aria-labelledby="tab-avis" hidden>
                    <p><strong>4,8/5</strong> · « Un circuit magnifique, très bien organisé et un guide passionnant. »</p>
                </section>
                <section class="tab-panel" id="panel-conditions" role="tabpanel" aria-labelledby="tab-conditions" hidden>
                    <p>Durée : 7 jours et 6 nuits. Vols, hébergements et pension complète inclus. Le prix indiqué est par personne.</p>
                </section>
            </div>
            <a class="book-button" href="../reservation/reservation.php">
                Réserver maintenant
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h14m-6-6 6 6-6 6" />
                </svg>
            </a>
        </article>
    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="../../../public/js/resultat.js"></script>
</body>

</html>