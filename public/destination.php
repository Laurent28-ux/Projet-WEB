<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Click & Go - Les Cyclades en douceur</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/destination.css">
</head>
<body>

  <!-- ===== EN-TÊTE ===== -->
  <header>
    <a href="index.html"><img class="logo-image" src="img/logo.jpg" alt="Click & Go"></a>
    <nav>
      <a href="index.html">Accueil</a>
      <a class="actif" href="offres.html">Explorer</a>
      <a href="destinations.html">Destinations</a>
      <a href="guides.html">Guides</a>
      <a href="a-propos.html">À propos</a>
    </nav>
    <div class="compte">
      <a class="bouton bouton-contour" href="login.html">Se connecter</a>
      <a class="bouton bouton-plein" href="inscription.html">S'inscrire</a>
    </div>
  </header>

  <!-- ===== BANNIÈRE : photo + voile bleu, comme sur l'accueil ===== -->
  <section class="bandeau-voyage">
    <p class="fil"><a href="index.html">Accueil</a> / <a href="offres.html">Explorer</a> / Les Cyclades</p>

    <div class="titre">
      <div>
        <span class="etiquette">Best-seller</span>
        <h1>Les Cyclades en <em>douceur</em></h1>
        <p>Syros & Mykonos, Grèce · 8 jours / 7 nuits</p>
      </div>
      <div class="note">
        <strong>4,9</strong>
        <span>★★★★★<br><small>128 avis voyageurs</small></span>
      </div>
    </div>
  </section>

  <main class="page-voyage">

    <!-- ===== PHOTOS ===== -->
    <div class="photos">
      <img class="photo-grande" src="https://images.unsplash.com/photo-1791188213460-321332b70cab?w=1200" alt="Syros, vue sur la mer">
      <img src="https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=800" alt="La côte et la plage">
      <div class="photo-derniere">
        <img src="https://images.unsplash.com/photo-1791802100926-b8aee871c486?w=800" alt="Le village vu d'en haut">
        <a href="#">+ 12 photos</a>
      </div>
    </div>

    <!-- ===== CONTENU + CARTE DE RÉSERVATION ===== -->
    <div class="colonnes-voyage">

      <!-- Colonne de gauche -->
      <div class="contenu">

        <!-- Menu de la page : chaque lien descend vers sa partie -->
        <div class="menu-voyage">
          <a class="actif" href="#apercu">Aperçu</a>
          <a href="#itineraire">Itinéraire</a>
          <a href="#inclus">Inclus</a>
          <a href="#hebergement">Hébergement</a>
        </div>

        <!-- Aperçu -->
        <section id="apercu">
          <p class="sur-titre">Votre voyage</p>
          <h2>L'élégance grecque, au rythme des îles</h2>
          <p>Découvrez deux visages des Cyclades dans un voyage équilibré entre ruelles blanches,
            criques secrètes et art de vivre méditerranéen. Un séjour pensé pour prendre le temps,
            avec des expériences choisies et des moments libres.</p>

          <div class="chiffres">
            <div><strong>8</strong> jours d'évasion</div>
            <div><strong>2</strong> îles explorées</div>
            <div><strong>4★</strong> hôtels de charme</div>
          </div>
        </section>

        <!-- Itinéraire -->
        <section id="itineraire">
          <div class="itineraire-titre">
            <div>
              <p class="sur-titre">Jour après jour</p>
              <h2>Votre itinéraire</h2>
            </div>
            <a class="bouton bouton-contour" href="#">Télécharger le programme</a>
          </div>

          <div class="etape">
            <span>J1</span>
            <div>
              <p class="pays">Jour 1 · Athènes → Syros</p>
              <h3>Premiers pas dans les Cyclades</h3>
              <p>Accueil à l'aéroport, transfert au port puis traversée vers Syros. Installation et première soirée libre sur le front de mer.</p>
            </div>
          </div>
          <div class="etape">
            <span>J2</span>
            <div>
              <p class="pays">Jours 2 à 4 · Syros</p>
              <h3>Ermoupoli et criques secrètes</h3>
              <p>Visite guidée de la capitale néoclassique, découverte locale puis journées libres pour explorer les plages du sud.</p>
            </div>
          </div>
          <div class="etape">
            <span>J5</span>
            <div>
              <p class="pays">Jours 5 à 8 · Mykonos</p>
              <h3>Cap sur l'île des vents</h3>
              <p>Traversée matinale, installation à l'hôtel, promenade au coucher du soleil dans la Petite Venise.</p>
            </div>
          </div>
        </section>

        <!-- Ce qui est inclus -->
        <section id="inclus">
          <h2>Ce qui est inclus</h2>
          <ul class="inclus">
            <li>Vols aller-retour et bagage cabine</li>
            <li>7 nuits en hôtels 4 étoiles</li>
            <li>Petits-déjeuners quotidiens</li>
            <li>Traversées en ferry</li>
            <li>Transferts privés à l'arrivée</li>
            <li>Visite guidée d'Ermoupoli</li>
          </ul>
        </section>

        <!-- Hébergement -->
        <section id="hebergement">
          <h2>Hébergement</h2>
          <p>3 nuits dans un hôtel 4★ au cœur d'Ermoupoli, puis 4 nuits dans un hôtel 4★
            avec vue sur la mer à Mykonos. Chambres doubles, petit-déjeuner inclus.</p>
        </section>
      </div>

      <!-- Colonne de droite : carte de réservation -->
      <aside class="reservation">
        <p class="petit">À partir de</p>
        <p class="prix-depart">629 € <small>/ personne</small></p>
        <p class="petit">soit 1 258 € pour 2 voyageurs</p>

        <form action="login.html" method="get">
          <label>
            Date de départ
            <select name="depart">
              <option>12 septembre 2026</option>
              <option>19 septembre 2026</option>
              <option>26 septembre 2026</option>
            </select>
          </label>
          <label>
            Voyageurs
            <input type="number" name="voyageurs" value="2" min="1">
          </label>
          <label>
            Niveau d'hôtel
            <select name="hotel">
              <option>Hôtel 4★ - inclus</option>
              <option>Hôtel 5★ - supplément</option>
            </select>
          </label>

          <p class="total">Total estimé <strong>1 258 €</strong></p>
          <button type="submit">Réserver maintenant</button>
          <p class="petit centre">Aucun paiement débité à cette étape</p>
        </form>

        <div class="aide">
          <strong>Besoin d'aide ?</strong>
          <p>Un conseiller vous répond au</p>
          <a href="tel:0144202020">01 44 20 20 20</a>
        </div>
      </aside>
    </div>
  </main>

  <!-- ===== PIED DE PAGE ===== -->
  <footer>
    <div class="colonnes">
      <div>
        <a href="index.html"><img class="logo-image" src="img/logo.jpg" alt="Click & Go"></a>
        <p>Le monde à portée de clic.</p>
      </div>
      <div>
        <h3>Réserver</h3>
        <a href="offres.html">Vols</a>
        <a href="offres.html">Hébergements</a>
        <a href="offres.html">Voyages tout prêts</a>
        <a href="offres.html">Activités</a>
      </div>
      <div>
        <h3>Découvrir</h3>
        <a href="destinations.html">Destinations</a>
        <a href="guides.html">Guides et conseils</a>
        <a href="a-propos.html">À propos et contact</a>
      </div>
    </div>
    <p class="copyright">© 2026 Click & Go</p>
  </footer>

</body>
</html>
