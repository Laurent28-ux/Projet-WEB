<?php
// ===== Les guides : pour en ajouter un, copie un bloc et change son identifiant =====
$guides = [

  'premier-voyage' => [
    'titre'     => "Réussir son premier voyage à l'étranger",
    'categorie' => 'Préparer',
    'duree'     => '8 min',
    'image'     => 'https://images.unsplash.com/photo-1791188213460-321332b70cab?w=1200',
    'alt'       => 'Île de Syros',
    'resume'    => "Documents, argent, téléphone, assurance : la liste complète pour partir l'esprit tranquille.",
    'chapeau'   => "Documents, argent, téléphone, assurance : la liste complète pour partir l'esprit tranquille, même si tu n'as jamais voyagé seul.",
    'sections'  => [
      ['titre' => 'Commence par les documents',
       'texte' => ["Vérifie ta pièce d'identité ou ton passeport plusieurs semaines avant le départ : certains pays exigent qu'il soit encore valide plusieurs mois après ton retour. Renseigne-toi aussi sur le visa, selon ta nationalité et ta destination, sur le site officiel du pays ou auprès de son ambassade."],
       'liste' => ["Passeport ou carte d'identité en cours de validité", "Visa ou autorisation de voyage si la destination l'exige", "Billets et confirmations d'hébergement, sur papier et sur ton téléphone", "Copies de tes documents, rangées séparément des originaux"]],
      ['titre' => "Prévoir l'argent",
       'texte' => ["Emporte une carte bancaire acceptée à l'étranger et un peu d'espèces en monnaie locale pour les premières dépenses. Renseigne-toi sur les frais de ta banque pour les paiements hors zone euro, et prévois une seconde carte en cas de perte ou de blocage."]],
      ['titre' => 'Rester joignable',
       'liste' => ["Vérifie les options de ton forfait mobile à l'étranger, ou prends une e-SIM locale", "Télécharge les cartes de ta destination pour les utiliser hors connexion", "Donne ton itinéraire et l'adresse de ton hébergement à un proche"]],
      ['titre' => 'Penser à ta santé',
       'texte' => ["Regarde si des vaccins ou des précautions sont recommandés pour ta destination, et emporte tes médicaments personnels avec leur ordonnance. Une assurance voyage couvrant les frais médicaux et le rapatriement est un vrai filet de sécurité. Dans l'Union européenne, la carte européenne d'assurance maladie peut aussi t'aider, selon ta situation."]],
      ['titre' => 'Le jour du départ',
       'texte' => ["Arrive à l'aéroport en avance, garde tes documents à portée de main et vérifie ta porte d'embarquement sur les écrans : elle peut changer."]],
    ],
    'conseil'   => "Prends en photo chaque document important et envoie-les-toi par e-mail : en cas de perte, tu auras tout sous la main.",
  ],

  'valise' => [
    'titre'     => 'Bien faire sa valise',
    'categorie' => 'Préparer',
    'duree'     => '5 min',
    'image'     => 'https://images.unsplash.com/photo-1596109898239-d8f0b19790a2?w=1200',
    'alt'       => 'Valise',
    'resume'    => "Bagage cabine ou soute : ce qu'il faut emporter, et ce qu'on oublie toujours.",
    'chapeau'   => "Bagage cabine ou soute : ce qu'il faut emporter, et ce qu'on oublie toujours.",
    'sections'  => [
      ['titre' => 'Cabine ou soute ?',
       'texte' => ["Les dimensions et le poids autorisés changent d'une compagnie à l'autre, et même d'un tarif à l'autre. Consulte les conditions de ton billet avant de faire ta valise : un bagage trop lourd ou trop grand peut coûter cher à l'aéroport."]],
      ['titre' => 'Ce qui reste avec toi',
       'liste' => ["Tes documents et tes billets", "Tes médicaments", "Ton chargeur et ta batterie externe : les batteries voyagent en cabine, pas en soute", "Une tenue de rechange, au cas où ta valise arriverait en retard", "Tes objets de valeur"]],
      ['titre' => 'Les liquides',
       'texte' => ["En cabine, les liquides sont limités : en général, des contenants de 100 ml maximum rangés dans un sac transparent refermable. Les règles peuvent évoluer selon l'aéroport, vérifie avant de partir."]],
      ['titre' => 'Organiser sa valise',
       'liste' => ["Roule tes vêtements pour gagner de la place", "Mets les objets lourds du côté des roues", "Range les petites affaires dans des pochettes", "Laisse un peu d'espace pour le retour", "Choisis tes tenues selon la météo de la destination"]],
    ],
    'conseil'   => "Pèse ta valise chez toi avec un pèse-bagage ou un pèse-personne : tu éviteras les mauvaises surprises au comptoir.",
  ],

  'documents' => [
    'titre'     => 'Passeport, visa : les documents',
    'categorie' => 'Préparer',
    'duree'     => '4 min',
    'image'     => 'https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=1200',
    'alt'       => 'Passeport',
    'resume'    => "Vérifier ses papiers à temps pour éviter les mauvaises surprises à l'aéroport.",
    'chapeau'   => "Vérifier ses papiers à temps pour éviter les mauvaises surprises à l'aéroport.",
    'sections'  => [
      ['titre' => "Pièce d'identité ou passeport ?",
       'texte' => ["Selon ta nationalité et ta destination, une carte d'identité peut suffire (par exemple pour certains voyages dans l'Union européenne), ou un passeport peut être obligatoire. Les règles dépendent de ton document et de ton pays d'origine, pas seulement de la destination."]],
      ['titre' => 'La date de validité',
       'texte' => ["Beaucoup de pays demandent que ton passeport soit valide plusieurs mois après la date de retour, avec des pages libres. Un document trop proche de son expiration peut te faire refuser l'embarquement."]],
      ['titre' => 'Visa et autorisations',
       'texte' => ["Certains pays demandent un visa, d'autres une autorisation de voyage électronique à obtenir avant le départ. Les délais vont de quelques minutes à plusieurs semaines : commence tôt."],
       'liste' => ["Le site officiel du pays de destination", "L'ambassade ou le consulat de ce pays", "Les conseils aux voyageurs du ministère des Affaires étrangères de ton pays"]],
      ['titre' => 'Renouveler ses papiers',
       'texte' => ["Le renouvellement d'un passeport peut prendre plusieurs semaines, surtout avant les vacances. Si ton document expire bientôt, fais ta demande sans attendre."]],
    ],
    'conseil'   => "Vérifie que tes papiers sont en règle avant de réserver, ou choisis une offre dont les conditions de modification sont souples.",
  ],

  'cyclades' => [
    'titre'     => 'Les Cyclades : quand partir ?',
    'categorie' => 'Destinations',
    'duree'     => '6 min',
    'image'     => 'https://images.unsplash.com/photo-1791188213460-321332b70cab?w=1200',
    'alt'       => 'Cyclades',
    'resume'    => "Les meilleures périodes selon que tu cherches le calme, la plage ou les prix bas.",
    'chapeau'   => "Les meilleures périodes selon que tu cherches le calme, la plage ou les prix bas.",
    'sections'  => [
      ['titre' => 'Mai et juin : le bon équilibre',
       'texte' => ["Les journées sont déjà chaudes, la mer commence à se réchauffer et les îles sont moins fréquentées qu'en plein été. Hébergements et ferries sont aussi plus abordables."]],
      ['titre' => 'Juillet et août : plein soleil, plein monde',
       'texte' => ["C'est la haute saison : plages animées et soirées vivantes, mais prix plus élevés et réservations à faire tôt. Dans les Cyclades, un vent fort, le meltem, souffle souvent en été : il rafraîchit, mais peut perturber certaines traversées en bateau."]],
      ['titre' => 'Septembre et début octobre : la mer encore chaude',
       'texte' => ["Beaucoup de voyageurs préfèrent cette période : l'eau est chaude après l'été, la foule diminue et la lumière est belle. Certains établissements commencent à fermer en fin de saison."]],
      ['titre' => "L'hiver : pour les curieux",
       'texte' => ["De novembre à mars, les îles sont calmes, parfois trop : beaucoup d'hôtels, de restaurants et de liaisons maritimes sont réduits ou fermés. Une île vivante toute l'année, comme Syros avec sa capitale Ermoupoli, reste plus facile à visiter."]],
      ['titre' => 'Comment choisir',
       'liste' => ["Calme et petit budget : mai, juin ou septembre", "Baignade assurée : de juillet à septembre", "Visites et villages : printemps ou automne"]],
    ],
    'conseil'   => "Vérifie les horaires des ferries avant de réserver tes nuits : ils changent selon la saison.",
  ],

  'menton' => [
    'titre'     => 'Un week-end à Menton',
    'categorie' => 'Destinations',
    'duree'     => '5 min',
    'image'     => 'https://images.unsplash.com/photo-1791802100926-b8aee871c486?w=1200',
    'alt'       => 'Menton',
    'resume'    => "Que visiter, où manger et comment s'y rendre depuis Paris.",
    'chapeau'   => "Que visiter, où manger et comment s'y rendre depuis Paris.",
    'sections'  => [
      ['titre' => "S'y rendre depuis Paris",
       'texte' => ["Le plus rapide est l'avion jusqu'à Nice (environ 1 h 30 de vol), puis le train régional vers Menton, en 35 minutes environ. Le train jusqu'à Nice est plus long (plus de cinq heures) mais évite les aéroports."]],
      ['titre' => 'À voir en deux jours',
       'liste' => ["La vieille ville et ses ruelles colorées, jusqu'à la basilique Saint-Michel-Archange", "La promenade en bord de mer et le port", "Les jardins de la ville, nombreux grâce au climat doux", "Le marché couvert, pour goûter les produits locaux"]],
      ['titre' => 'Le citron, star de la ville',
       'texte' => ["Menton est célèbre pour ses citrons. Chaque année, à la fin de l'hiver, la Fête du citron remplit la ville de sculptures et de défilés. Si tu viens à cette période, réserve tôt."]],
      ['titre' => 'Où manger',
       'texte' => ["Cherche les petites adresses de la vieille ville et les restaurants du port pour une cuisine méditerranéenne : poisson, légumes et desserts au citron. En été, les tables se remplissent vite, pense à réserver le soir."]],
      ['titre' => 'Une frontière à deux pas',
       'texte' => ["Menton est tout près de l'Italie : une escapade d'une demi-journée de l'autre côté de la frontière est facile. Emporte ta pièce d'identité."]],
    ],
    'conseil'   => "Garde un après-midi libre : la ville se découvre surtout à pied, sans programme précis.",
  ],

  'petit-budget' => [
    'titre'     => 'Voyager avec un petit budget',
    'categorie' => 'Budget',
    'duree'     => '7 min',
    'image'     => 'https://images.unsplash.com/photo-1684852711123-53815b5ee4c9?w=1200',
    'alt'       => 'Budget voyage',
    'resume'    => "Dates flexibles, hébergements malins, sur-place : nos astuces pour payer moins.",
    'chapeau'   => "Dates flexibles, hébergements malins, astuces sur place : comment payer moins sans gâcher son voyage.",
    'sections'  => [
      ['titre' => 'Fixe un budget avant de chercher',
       'texte' => ["Décide d'une somme totale, puis répartis-la : transport, hébergement, repas, activités et imprévus. Garde environ 10 % de côté pour les dépenses inattendues."]],
      ['titre' => 'Joue sur les dates',
       'texte' => ["Partir en semaine, éviter les vacances scolaires et choisir l'intersaison fait souvent baisser les prix du billet comme de l'hôtel. Quand c'est possible, compare plusieurs jours de départ."]],
      ['titre' => 'Choisir où dormir',
       'liste' => ["Un logement avec cuisine permet de préparer quelques repas", "Un quartier un peu à l'écart du centre coûte souvent moins cher, si les transports sont bons", "Regarde ce qui est inclus (petit-déjeuner, annulation gratuite) avant de comparer les prix"]],
      ['titre' => 'Sur place',
       'liste' => ["Mange là où mangent les habitants, loin des rues les plus touristiques", "Utilise la marche et les transports en commun", "Profite des visites gratuites : plages, marchés, quartiers, jardins"]],
      ['titre' => 'Attention aux frais cachés',
       'texte' => ["Bagage en soute, choix du siège, frais de carte à l'étranger : ces petits suppléments s'additionnent. Chez Click & Go, le prix affiché est le prix payé. Compare toujours le total, pas seulement le tarif de départ."]],
    ],
    'conseil'   => "Un voyage plus court mais bien préparé coûte souvent moins cher, et se vit mieux, qu'un long séjour improvisé.",
  ],

  'reserver-en-un-clic' => [
    'titre'     => "Réserver en un clic : mode d'emploi",
    'categorie' => 'Pratique',
    'duree'     => '3 min',
    'image'     => 'https://images.unsplash.com/photo-1596109898239-d8f0b19790a2?w=1200',
    'alt'       => 'Réservation',
    'resume'    => "De la recherche à la confirmation par e-mail, étape par étape.",
    'chapeau'   => "De la recherche à la confirmation par e-mail, étape par étape.",
    'sections'  => [
      ['titre' => "1. Choisis ce que tu cherches",
       'texte' => ["Sur la page d'accueil, sélectionne l'onglet qui t'intéresse : Vols, Hébergements, Voyages tout prêts ou Activités."]],
      ['titre' => '2. Renseigne ton voyage',
       'texte' => ["Indique ta destination, tes dates de départ et de retour et le nombre de personnes, puis clique sur Rechercher."]],
      ['titre' => '3. Compare les offres',
       'texte' => ["Les offres s'affichent avec leur prix final. Ouvre celles qui t'intéressent pour voir le détail."]],
      ['titre' => '4. Ajoute au panier',
       'texte' => ["Vols, hôtels et activités vont dans un seul panier : tu règles tout au même endroit."]],
      ['titre' => '5. Confirme',
       'texte' => ["Vérifie ton récapitulatif et valide. Tu reçois ta confirmation par e-mail en quelques secondes. Si tu ne la vois pas, regarde dans tes courriers indésirables."]],
      ['titre' => "Besoin d'aide ?",
       'texte' => ["Un changement de date, une question ? Connecte-toi à ton compte ou écris à un conseiller depuis la page À propos."]],
    ],
    'conseil'   => "Garde ton e-mail de confirmation : il contient tout ce dont tu auras besoin le jour du départ.",
  ],

];

// ===== Choix de l'article demandé dans l'adresse (?id=...) =====
function e($texte) {
  return htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$trouve = isset($guides[$id]);

if (!$trouve) {
  http_response_code(404);
} else {
  $guide = $guides[$id];

  // « À lire aussi » : d'abord la même catégorie, puis les autres
  $memes = [];
  $autres = [];
  foreach ($guides as $cle => $g) {
    if ($cle === $id) continue;
    if ($g['categorie'] === $guide['categorie']) { $memes[] = $cle; } else { $autres[] = $cle; }
  }
  $suggestions = array_slice(array_merge($memes, $autres), 0, 3);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $trouve ? e($guide['titre']) . ' - Click & Go' : 'Guide introuvable - Click & Go' ?></title>
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

<?php if (!$trouve): ?>

  <!-- ===== GUIDE INTROUVABLE ===== -->
  <section class="section introuvable">
    <h1>Ce guide n'existe pas</h1>
    <p>Le lien est peut-être incorrect ou le guide a été déplacé.</p>
    <a class="bouton bouton-plein" href="guides.php">Voir tous les guides</a>
  </section>

<?php else: ?>

  <div class="progression" aria-hidden="true"><span id="barre"></span></div>

  <!-- ===== TITRE DE L'ARTICLE ===== -->
  <section class="entete-article">
    <a class="retour" href="guides.php">← Tous les guides</a>
    <span class="etiquette"><?= e($guide['categorie']) ?></span>
    <h1><?= e($guide['titre']) ?></h1>
    <p class="chapeau"><?= e($guide['chapeau']) ?></p>
    <p class="infos-lecture"><?= e($guide['duree']) ?> de lecture</p>
  </section>

  <div class="couverture">
    <img src="<?= e($guide['image']) ?>" alt="<?= e($guide['alt']) ?>">
  </div>

  <!-- ===== CONTENU ===== -->
  <article class="article" id="article">
<?php foreach ($guide['sections'] as $section): ?>
    <h2><?= e($section['titre']) ?></h2>
<?php if (!empty($section['texte'])): foreach ($section['texte'] as $paragraphe): ?>
    <p><?= e($paragraphe) ?></p>
<?php endforeach; endif; ?>
<?php if (!empty($section['liste'])): ?>
    <ul>
<?php foreach ($section['liste'] as $point): ?>
      <li><?= e($point) ?></li>
<?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php endforeach; ?>

    <div class="conseil">
      <strong>Le conseil Click & Go</strong>
      <p><?= e($guide['conseil']) ?></p>
    </div>
  </article>

  <!-- ===== À LIRE AUSSI ===== -->
  <section class="section fond-clair">
    <h2>À lire aussi</h2>
    <div class="grille">
<?php foreach ($suggestions as $cle): $g = $guides[$cle]; ?>
      <a class="carte" href="guide.php?id=<?= e($cle) ?>">
        <img src="<?= e($g['image']) ?>" alt="<?= e($g['alt']) ?>">
        <span class="etiquette"><?= e($g['categorie']) ?></span>
        <h3><?= e($g['titre']) ?></h3>
        <p><?= e($g['resume']) ?></p>
        <p class="duree"><?= e($g['duree']) ?> de lecture</p>
      </a>
<?php endforeach; ?>
    </div>
  </section>

  <!-- ===== APPEL À L'ACTION ===== -->
  <section class="section appel">
    <h2>Prêt à partir ?</h2>
    <p>Trouve ton vol, ton hébergement ou ton voyage tout prêt en quelques clics.</p>
    <a class="bouton bouton-plein" href="offres.php">Explorer les offres</a>
  </section>

<?php endif; ?>

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

<?php if ($trouve): ?>
  <!-- ===== JAVASCRIPT : barre de progression de lecture ===== -->
  <script>
    (function () {
      var article = document.getElementById('article');
      var barre = document.getElementById('barre');
      var attente = false;

      function mettreAJour() {
        attente = false;
        var haut = article.getBoundingClientRect().top + window.scrollY;
        var hauteur = article.offsetHeight - window.innerHeight * 0.5;
        var avance = (window.scrollY + window.innerHeight * 0.5 - haut) / hauteur;
        barre.style.width = Math.min(Math.max(avance, 0), 1) * 100 + '%';
      }

      window.addEventListener('scroll', function () {
        if (!attente) { attente = true; requestAnimationFrame(mettreAJour); }
      }, { passive: true });
      window.addEventListener('resize', mettreAJour);
      mettreAJour();
    })();
  </script>
<?php endif; ?>

</body>
</html>