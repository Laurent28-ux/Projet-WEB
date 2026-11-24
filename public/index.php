<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Click & Go - Accueil</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <!-- ===== STYLES DES ANIMATIONS (intégrés) ===== -->
  <style>
    /* ---------- 1. Entrée du bandeau ---------- */
    .js .recherche {
      opacity: 0;
      transform: translateY(24px);
    }
    .js .scene p {
      opacity: 0;
      transform: translateY(10px);
    }
    .js.page-chargee .recherche {
      opacity: 1;
      transform: none;
      transition: opacity 0.7s ease 0.3s, transform 0.7s ease 0.3s;
    }
    .js.page-chargee .scene p {
      opacity: 1;
      transform: none;
      transition: opacity 0.6s ease 0.7s, transform 0.6s ease 0.7s;
    }

    /* ---------- 2. En-tête ---------- */
    header {
      position: sticky;
      top: 0;
      z-index: 10;
      transition: box-shadow 0.3s ease;
    }
    header.entete-scroll {
      box-shadow: 0 2px 14px rgba(0, 0, 0, 0.12);
    }

    /* ---------- 3. Apparition au défilement ---------- */
    .js .a-reveler {
      opacity: 0;
      transform: translateY(18px);
      transition: opacity 0.5s ease var(--delai, 0ms),
                  transform 0.5s ease var(--delai, 0ms);
    }
    .js .a-reveler.visible {
      opacity: 1;
      transform: none;
    }

    /* Une fois apparue, la carte réagit tout de suite au survol */
    .js .a-reveler.revele-fini {
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .destination.revele-fini:hover,
    .carte.revele-fini:hover {
      transform: translateY(-4px);
    }
    .destination.revele-fini:hover {
      box-shadow: 0 10px 30px rgba(24, 0, 173, 0.25);
    }

    /* ---------- 4. Champ de date mis à jour ---------- */
    .champ-flash {
      animation: flash 0.8s ease;
    }
    @keyframes flash {
      0%   { background-color: rgba(255, 200, 0, 0.45); }
      100% { background-color: transparent; }
    }

    /* ---------- 5. Bouton Rechercher ---------- */
    .recherche button.en-cours {
      opacity: 0.75;
      pointer-events: none;
    }

    /* ---------- 6. Newsletter ---------- */
    .newsletter button {
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .newsletter button.succes {
      background-color: #2e9e5b;
      color: #ffffff;
      transform: scale(1.04);
    }

    /* ---------- Accessibilité : moins de mouvement ---------- */
    @media (prefers-reduced-motion: reduce) {
      .newsletter button,
      header {
        transition: none !important;
      }
      .champ-flash {
        animation: none !important;
      }
    }
  </style>
</head>
<body>

  <!-- ===== EN-TÊTE ===== -->
  <header>
    <a href="index.php"><img class="logo-image" src="img/logo.jpg" alt="Click & Go"></a>
    <nav>
      <a class="actif" href="index.php">Accueil</a>
      <a href="offres.php">Explorer</a>
      <a href="destinations.php">Destinations</a>
      <a href="guides.php">Guides</a>
      <a href="a-propos.php">À propos</a>
    </nav>
    <div class="compte">
      <a class="bouton bouton-contour" href="login.php">Se connecter</a>
      <a class="bouton bouton-plein" href="inscription.php">S'inscrire</a>
    </div>
  </header>

  <!-- ===== BANDEAU ===== -->
  <section class="bandeau">

    <!-- 5 vidéos qui s'enchaînent (5 secondes chacune) grâce à une animation CSS :
         l'agence -> la réservation -> l'aéroport -> le vol -> l'arrivée -->
    <div class="scene">
      <video autoplay muted loop playsinline>
        <source src="video/1-agence.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/16106/16106-720.mp4" type="video/mp4">
      </video>
      <p>1. On vous conseille en agence</p>
    </div>
    <div class="scene">
      <video autoplay muted loop playsinline>
        <source src="video/2-reservation.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/8909/8909-720.mp4" type="video/mp4">
      </video>
      <p>2. Vous réservez en un clic</p>
    </div>
    <div class="scene">
      <video autoplay muted loop playsinline>
        <source src="video/3-aeroport.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/23976/23976-720.mp4" type="video/mp4">
      </video>
      <p>3. Direction l'aéroport</p>
    </div>
    <div class="scene">
      <video autoplay muted loop playsinline>
        <source src="video/4-vol.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/3298/3298-720.mp4" type="video/mp4">
      </video>
      <p>4. Décollage !</p>
    </div>
    <div class="scene">
      <video autoplay muted loop playsinline>
        <source src="video/5-arrivee.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/5371/5371-720.mp4" type="video/mp4">
      </video>
      <p>5. Bienvenue à destination</p>
    </div>

    <div class="voile"></div>

    <!-- Carte de recherche -->
    <form class="recherche" action="offres.php" method="get">

      <!-- Onglets : ce sont des boutons radio, le choix est envoyé avec la recherche -->
      <div class="onglets">
        <input type="radio" name="categorie" value="vols" id="vols">
        <label for="vols">Vols</label>

        <input type="radio" name="categorie" value="hebergements" id="hebergements" checked>
        <label for="hebergements">Hébergements</label>

        <input type="radio" name="categorie" value="voyages" id="voyages">
        <label for="voyages">Voyages tout prêts</label>

        <input type="radio" name="categorie" value="activites" id="activites">
        <label for="activites">Activités</label>
      </div>

      <div class="champs">
        <label class="champ">
          Destination
          <input type="text" name="destination" placeholder="Pays, région ou ville">
        </label>
        <label class="champ">
          Départ
          <input type="date" name="depart">
        </label>
        <label class="champ">
          Retour
          <input type="date" name="retour">
        </label>
        <label class="champ">
          Personnes
          <input type="number" name="personnes" value="1" min="1">
        </label>
        <button type="submit">Rechercher</button>
      </div>
    </form>
  </section>

  <!-- ===== DESTINATIONS POPULAIRES ===== -->
  <section class="section">
    <h2>Destinations populaires</h2>
    <div class="grille">
      <a class="destination" href="destination.php">
        <img src="https://images.unsplash.com/photo-1791802100926-b8aee871c486?w=800" alt="Menton">
        <div>
          <h3>Menton</h3>
          <p>France · dès 459 €</p>
        </div>
      </a>
      <a class="destination" href="destination.php">
        <img src="https://images.unsplash.com/photo-1791188213460-321332b70cab?w=800" alt="Syros">
        <div>
          <h3>Syros</h3>
          <p>Grèce · dès 629 €</p>
        </div>
      </a>
      <a class="destination" href="destination.php">
        <img src="https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=800" alt="Côte Amalfitaine">
        <div>
          <h3>Côte Amalfitaine</h3>
          <p>Italie · dès 549 €</p>
        </div>
      </a>
    </div>
    <a class="lien" href="destinations.php">Voir toutes les destinations →</a>
  </section>

  <!-- ===== OFFRES PROMOTIONNELLES ===== -->
  <section class="section fond-clair">
    <h2>Offres du moment</h2>
    <div class="grille">
      <a class="carte" href="offres.php">
        <img src="https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=800" alt="Côte Amalfitaine">
        <span class="promo">-15 %</span>
        <h3>La dolce vita amalfitaine</h3>
        <p>Italie · 7 jours · Vol + hôtel</p>
        <p class="prix"><s>645 €</s> 549 € / pers.</p>
      </a>
      <a class="carte" href="offres.php">
        <img src="https://images.unsplash.com/photo-1596109898239-d8f0b19790a2?w=800" alt="Barcelone">
        <span class="promo">-20 %</span>
        <h3>Paris → Barcelone</h3>
        <p>Vol aller-retour direct</p>
        <p class="prix"><s>112 €</s> 89 €</p>
      </a>
      <a class="carte" href="offres.php">
        <img src="https://images.unsplash.com/photo-1791802100926-b8aee871c486?w=800" alt="Hôtel à Menton">
        <span class="promo">-10 %</span>
        <h3>Villa Azur, Menton</h3>
        <p>Hôtel 4★ · petit-déjeuner inclus</p>
        <p class="prix"><s>132 €</s> 119 € / nuit</p>
      </a>
    </div>
  </section>

  <!-- ===== VOYAGES RECOMMANDÉS ===== -->
  <section class="section">
    <h2>Nos voyages recommandés</h2>
    <div class="grille">
      <a class="carte" href="destination.php">
        <img src="https://images.unsplash.com/photo-1791188213460-321332b70cab?w=800" alt="Syros">
        <h3>Les Cyclades en douceur</h3>
        <p>Grèce · 8 jours · ★ 4,9</p>
        <p class="prix">629 € / pers.</p>
      </a>
      <a class="carte" href="destination.php">
        <img src="https://images.unsplash.com/photo-1791802100926-b8aee871c486?w=800" alt="Menton">
        <h3>Escapade sur la Riviera</h3>
        <p>France · 5 jours · ★ 4,8</p>
        <p class="prix">459 € / pers.</p>
      </a>
      <a class="carte" href="destination.php">
        <img src="https://images.unsplash.com/photo-1596109898239-d8f0b19790a2?w=800" alt="Barcelone">
        <h3>Barcelone côté mer</h3>
        <p>Espagne · 6 jours · ★ 4,6</p>
        <p class="prix">489 € / pers.</p>
      </a>
    </div>
  </section>

  <!-- ===== AVANTAGES ===== -->
  <section class="section fond-clair">
    <h2>Pourquoi Click & Go ?</h2>
    <div class="grille">
      <div class="bloc">
        <h3>Réservation immédiate</h3>
        <p>Confirmation par e-mail en quelques secondes.</p>
      </div>
      <div class="bloc">
        <h3>Prix transparents</h3>
        <p>Le prix affiché est le prix payé.</p>
      </div>
      <div class="bloc">
        <h3>Tout au même endroit</h3>
        <p>Vols, hôtels et activités dans un seul panier.</p>
      </div>
    </div>
  </section>

  <!-- ===== AVIS CLIENTS ===== -->
  <section class="section">
    <h2>L'avis de nos voyageurs</h2>
    <div class="grille">
      <div class="bloc">
        <p class="etoiles">★★★★★</p>
        <p>« Réservation faite en dix minutes, tout était clair. »</p>
        <p><strong>Amélie M.</strong></p>
      </div>
      <div class="bloc">
        <p class="etoiles">★★★★★</p>
        <p>« Le prix affiché était bien le prix payé. Très simple. »</p>
        <p><strong>Julien L.</strong></p>
      </div>
      <div class="bloc">
        <p class="etoiles">★★★★☆</p>
        <p>« Le conseiller a répondu vite quand j'ai changé de date. »</p>
        <p><strong>Nadia K.</strong></p>
      </div>
    </div>
  </section>

  <!-- ===== NEWSLETTER ===== -->
  <section class="newsletter">
    <h2>Recevez nos idées d'évasion</h2>
    <p>Une fois par mois, nos plus belles offres.</p>
    <form action="#">
      <input type="email" placeholder="Votre adresse e-mail" required>
      <button type="submit">Je m'inscris</button>
    </form>
  </section>

  <!-- ===== PIED DE PAGE ===== -->
  <footer>
    <div class="colonnes">
      <div>
        <a href="index.php"><img class="logo-image" src="img/logo.jpg" alt="Click & Go"></a>
        <p>Le monde à portée de clic.</p>
      </div>
      <div>
        <h3>Réserver</h3>
        <a href="offres.php">Vols</a>
        <a href="offres.php">Hébergements</a>
        <a href="offres.php">Voyages tout prêts</a>
        <a href="offres.php">Activités</a>
      </div>
      <div>
        <h3>Découvrir</h3>
        <a href="destinations.php">Destinations</a>
        <a href="guides.php">Guides et conseils</a>
        <a href="a-propos.php">À propos et contact</a>
      </div>
    </div>
    <p class="copyright">© 2026 Click & Go</p>
  </footer>

  <!-- ===== JAVASCRIPT DES ANIMATIONS (intégré) ===== -->
  <script>
    (function () {
      var racine = document.documentElement;
      var reduireMouvement = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      // Si le visiteur préfère moins d'animations, on ne fait rien
      if (reduireMouvement) return;

      // La classe "js" permet au CSS de cacher les éléments à révéler
      racine.classList.add('js');

      // ---------- 1. Entrée du bandeau ----------
      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          racine.classList.add('page-chargee');
        });
      });

      // ---------- 2. En-tête : ombre au défilement ----------
      var entete = document.querySelector('header');
      function majEntete() {
        entete.classList.toggle('entete-scroll', window.scrollY > 10);
      }
      window.addEventListener('scroll', majEntete, { passive: true });
      majEntete();

      // ---------- 3. Apparition des cartes au défilement ----------
      var cibles = document.querySelectorAll('.destination, .carte, .bloc, .newsletter');

      // Décalage progressif dans chaque grille
      document.querySelectorAll('.grille').forEach(function (grille) {
        grille.querySelectorAll('.destination, .carte, .bloc').forEach(function (el, i) {
          el.style.setProperty('--delai', (i * 90) + 'ms');
        });
      });

      cibles.forEach(function (el) { el.classList.add('a-reveler'); });

      var observateur = new IntersectionObserver(function (entrees) {
        entrees.forEach(function (entree) {
          if (entree.isIntersecting) {
            var carte = entree.target;
            carte.classList.add('visible');
            carte.addEventListener('transitionend', function fin(ev) {
              if (ev.target === carte && ev.propertyName === 'opacity') {
                carte.classList.add('revele-fini');
                carte.removeEventListener('transitionend', fin);
              }
            });
            observateur.unobserve(carte);
          }
        });
      }, { threshold: 0.15 });

      cibles.forEach(function (el) { observateur.observe(el); });

      // ---------- 4. Recherche : retour ≥ départ ----------
      var depart = document.querySelector('input[name="depart"]');
      var retour = document.querySelector('input[name="retour"]');
      if (depart && retour) {
        var aujourdhui = new Date().toISOString().split('T')[0];
        depart.min = aujourdhui;
        retour.min = aujourdhui;

        depart.addEventListener('change', function () {
          retour.min = depart.value || aujourdhui;
          if (retour.value && retour.value < depart.value) retour.value = depart.value;
          retour.classList.remove('champ-flash');
          void retour.offsetWidth; // relance l'animation
          retour.classList.add('champ-flash');
        });
      }

      // ---------- 5. Bouton « Rechercher » ----------
      var formRecherche = document.querySelector('.recherche');
      if (formRecherche) {
        formRecherche.addEventListener('submit', function () {
          var bouton = formRecherche.querySelector('button[type="submit"]');
          bouton.classList.add('en-cours');
          bouton.textContent = 'Recherche…';
        });
      }

      // ---------- 6. Newsletter ----------
      var formNews = document.querySelector('.newsletter form');
      if (formNews) {
        formNews.addEventListener('submit', function (e) {
          e.preventDefault();
          var bouton = formNews.querySelector('button');
          var champ = formNews.querySelector('input[type="email"]');
          bouton.textContent = 'Merci, c\u2019est noté';
          bouton.classList.add('succes');
          champ.value = '';
          setTimeout(function () {
            bouton.textContent = 'Je m\u2019inscris';
            bouton.classList.remove('succes');
          }, 3000);
        });
      }
    })();
  </script>

</body>
</html>