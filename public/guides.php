<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Click & Go - Guides et conseils</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/guides.css">
</head>
<body>

  <!-- ===== EN-TÊTE ===== -->
  <header>
    <a href="index.php"><img class="logo-image" src="img/logo.jpg" alt="Click & Go"></a>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="offres.php">Explorer</a>
      <a href="destinations.php">Destinations</a>
      <a class="actif" href="guides.php">Guides</a>
      <a href="a-propos.php">À propos</a>
    </nav>
    <div class="compte">
      <a class="bouton bouton-contour" href="login.php">Se connecter</a>
      <a class="bouton bouton-plein" href="inscription.php">S'inscrire</a>
    </div>
  </header>

  <!-- ===== TITRE + RECHERCHE ===== -->
  <section class="intro-guides">
    <h1>Guides et conseils</h1>
    <p>Tout ce qu'il faut savoir avant de partir.</p>
    <input type="search" id="recherche-guide" placeholder="Rechercher un guide (ex. bagages, Grèce, budget)">
  </section>

  <!-- ===== GUIDE À LA UNE ===== -->
  <section class="section">
    <div class="vedette">
      <img src="https://images.unsplash.com/photo-1791188213460-321332b70cab?w=800" alt="Île de Syros">
      <div>
        <span class="etiquette">À la une</span>
        <h2>Réussir son premier voyage à l'étranger</h2>
        <p>Documents, argent, téléphone, assurance : la liste complète pour partir l'esprit tranquille, même si tu n'as jamais voyagé seul.</p>
        <a class="bouton bouton-plein" href="guide.php?id=premier-voyage">Lire le guide</a>
      </div>
    </div>
  </section>

  <!-- ===== TOUS LES GUIDES ===== -->
  <section class="section fond-clair">
    <h2>Tous nos guides</h2>

    <div class="filtres">
      <button class="actif" data-filtre="tous">Tous</button>
      <button data-filtre="preparer">Préparer</button>
      <button data-filtre="destinations">Destinations</button>
      <button data-filtre="budget">Budget</button>
      <button data-filtre="pratique">Pratique</button>
    </div>

    <div class="grille" id="liste-guides">
      <a class="carte" data-categorie="preparer" href="guide.php?id=valise">
        <img src="https://images.unsplash.com/photo-1596109898239-d8f0b19790a2?w=800" alt="Valise">
        <span class="etiquette">Préparer</span>
        <h3>Bien faire sa valise</h3>
        <p>Bagage cabine ou soute : ce qu'il faut emporter, et ce qu'on oublie toujours.</p>
        <p class="duree">5 min de lecture</p>
      </a>
      <a class="carte" data-categorie="preparer" href="guide.php?id=documents">
        <img src="https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=800" alt="Passeport">
        <span class="etiquette">Préparer</span>
        <h3>Passeport, visa : les documents</h3>
        <p>Vérifier ses papiers à temps pour éviter les mauvaises surprises à l'aéroport.</p>
        <p class="duree">4 min de lecture</p>
      </a>
      <a class="carte" data-categorie="destinations" href="guide.php?id=cyclades">
        <img src="https://images.unsplash.com/photo-1791188213460-321332b70cab?w=800" alt="Cyclades">
        <span class="etiquette">Destinations</span>
        <h3>Les Cyclades : quand partir ?</h3>
        <p>Les meilleures périodes selon que tu cherches le calme, la plage ou les prix bas.</p>
        <p class="duree">6 min de lecture</p>
      </a>
      <a class="carte" data-categorie="destinations" href="guide.php?id=menton">
        <img src="https://images.unsplash.com/photo-1791802100926-b8aee871c486?w=800" alt="Menton">
        <span class="etiquette">Destinations</span>
        <h3>Un week-end à Menton</h3>
        <p>Que visiter, où manger et comment s'y rendre depuis Paris.</p>
        <p class="duree">5 min de lecture</p>
      </a>
      <a class="carte" data-categorie="budget" href="guide.php?id=petit-budget">
        <img src="https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=800" alt="Budget voyage">
        <span class="etiquette">Budget</span>
        <h3>Voyager avec un petit budget</h3>
        <p>Dates flexibles, hébergements malins, sur-place : nos astuces pour payer moins.</p>
        <p class="duree">7 min de lecture</p>
      </a>
      <a class="carte" data-categorie="pratique" href="guide.php?id=reserver-en-un-clic">
        <img src="https://images.unsplash.com/photo-1596109898239-d8f0b19790a2?w=800" alt="Réservation">
        <span class="etiquette">Pratique</span>
        <h3>Réserver en un clic : mode d'emploi</h3>
        <p>De la recherche à la confirmation par e-mail, étape par étape.</p>
        <p class="duree">3 min de lecture</p>
      </a>
    </div>

    <p class="aucun" id="aucun-guide">Aucun guide ne correspond à ta recherche. Essaie un autre mot ou choisis « Tous ».</p>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section faq">
    <h2>Questions fréquentes</h2>
    <details>
      <summary>Comment modifier ou annuler ma réservation ?</summary>
      <p>Connecte-toi à ton compte, ouvre ta réservation et choisis la modification souhaitée. Les conditions dépendent de l'offre réservée.</p>
    </details>
    <details>
      <summary>Quand reçois-je ma confirmation ?</summary>
      <p>Elle est envoyée par e-mail en quelques secondes après la réservation. Pense à vérifier tes courriers indésirables.</p>
    </details>
    <details>
      <summary>Puis-je réserver un vol et un hôtel ensemble ?</summary>
      <p>Oui, vols, hébergements et activités se placent dans un seul panier.</p>
    </details>
    <details>
      <summary>Comment contacter un conseiller ?</summary>
      <p>Rends-toi sur la page « À propos et contact » : un conseiller te répond rapidement.</p>
    </details>
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

  <!-- ===== JAVASCRIPT : filtres + recherche ===== -->
  <script>
    (function () {
      var boutons = document.querySelectorAll('.filtres button');
      var cartes = document.querySelectorAll('#liste-guides .carte');
      var champ = document.getElementById('recherche-guide');
      var message = document.getElementById('aucun-guide');
      var categorie = 'tous';

      function afficher() {
        var mot = champ.value.trim().toLowerCase();
        var visibles = 0;

        cartes.forEach(function (carte) {
          var bonneCategorie = categorie === 'tous' || carte.dataset.categorie === categorie;
          var bonTexte = carte.textContent.toLowerCase().indexOf(mot) !== -1;
          var montrer = bonneCategorie && bonTexte;

          if (montrer && carte.classList.contains('cache')) {
            carte.classList.remove('cache');
            carte.classList.remove('entre');
            void carte.offsetWidth; // relance l'animation
            carte.classList.add('entre');
          } else if (!montrer) {
            carte.classList.add('cache');
          }
          if (montrer) visibles++;
        });

        message.style.display = visibles === 0 ? 'block' : 'none';
      }

      boutons.forEach(function (bouton) {
        bouton.addEventListener('click', function () {
          boutons.forEach(function (b) { b.classList.remove('actif'); });
          bouton.classList.add('actif');
          categorie = bouton.dataset.filtre;
          afficher();
        });
      });

      champ.addEventListener('input', afficher);
    })();
  </script>

</body>
</html>