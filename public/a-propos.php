<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Click & Go - À propos</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/a-propos.css">
</head>
<body>

  <!-- ===== EN-TÊTE ===== -->
  <header>
    <a href="index.php"><img class="logo-image" src="img/logo.jpg" alt="Click & Go"></a>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="offres.php">Explorer</a>
      <a href="destinations.php">Destinations</a>
      <a href="guides.php">Guides</a>
      <a class="actif" href="a-propos.php">À propos</a>
    </nav>
    <div class="compte">
      <a class="bouton bouton-contour" href="login.php">Se connecter</a>
      <a class="bouton bouton-plein" href="inscription.php">S'inscrire</a>
    </div>
  </header>

  <main>

    <!-- ===== BANDEAU ===== -->
    <section class="hero">
      <div>
        <h1>
          <span>Partir prend un clic.</span>
          <span>Le reste, c'est notre métier.</span>
        </h1>
        <p class="chapeau">Click & Go réunit les conseils d'une vraie agence et la simplicité de la réservation en ligne.</p>
      </div>

      <div class="billet" aria-hidden="true">
        <div class="billet-corps">
          <p class="billet-titre">Carte d'embarquement</p>
          <div class="trajet">
            <div><span>De</span><strong>Votre salon</strong></div>
            <svg viewBox="0 0 90 24">
              <line x1="0" y1="12" x2="68" y2="12" stroke="#80b1f2" stroke-width="2" stroke-dasharray="2 6" stroke-linecap="round"/>
              <path d="M90 12 L68 2 L73 12 L68 22 Z" fill="#1800ad"/>
            </svg>
            <div><span>Vers</span><strong>Partout</strong></div>
          </div>
          <dl class="infos">
            <div><dt>Passager</dt><dd>Vous</dd></div>
            <div><dt>Porte</dt><dd>1 clic</dd></div>
            <div><dt>Départ</dt><dd>Maintenant</dd></div>
          </dl>
        </div>
        <div class="billet-souche">
          <span>CG 2026</span>
          <div class="code-barres"></div>
        </div>
      </div>
    </section>

    <!-- ===== PARCOURS : le tracé de vol est dessiné par le JavaScript ===== -->
    <section class="parcours" aria-label="Notre parcours">

      <svg class="trace" aria-hidden="true">
        <path class="fond"></path>
        <path class="fait"></path>
        <g class="avion"><path d="M14 0 L-9 -10 L-5 0 L-9 10 Z"></path></g>
      </svg>

      <article class="escale">
        <span class="repere"></span>
        <div class="texte">
          <h2>Une agence qui a gardé ses conseillers</h2>
          <p>Réserver en ligne est rapide, mais on se retrouve vite seul face à des centaines d'offres. Click & Go est née de l'envie de garder le meilleur des deux mondes : un conseiller qui vous écoute, et une réservation qui se fait en un clic.</p>
        </div>
      </article>

      <article class="escale">
        <span class="repere"></span>
        <div class="texte">
          <h2>Le prix affiché est le prix payé</h2>
          <p>Pas de frais cachés à la dernière étape : ce que vous voyez en choisissant votre voyage est ce que vous réglez.</p>
        </div>
      </article>

      <article class="escale">
        <span class="repere"></span>
        <div class="texte">
          <h2>Une confirmation en quelques secondes</h2>
          <p>Votre réservation arrive par e-mail dès qu'elle est validée, avec tout ce qu'il faut pour partir.</p>
        </div>
      </article>

      <article class="escale">
        <span class="repere"></span>
        <div class="texte">
          <h2>Un conseiller qui répond vite</h2>
          <p>Un changement de date, une question de dernière minute : quelqu'un vous répond, pas un robot.</p>
        </div>
      </article>

      <article class="escale">
        <span class="repere"></span>
        <div class="texte">
          <h2>L'équipage</h2>
          <p>Une équipe d'étudiants qui construit Click & Go, de la page d'accueil à la réservation.</p>
          <ul class="equipage">
            <li>
              <span class="initiales">MM</span>
              <div>
                <strong>Mr MBECK Mael</strong>
                <span>Actionnaire</span>
              </div>
            </li>
            <li>
              <span class="initiales">LD</span>
              <div>
                <strong>Mr DJEMGOUA Laurent</strong>
                <span>Actionnaire</span>
              </div>
            </li>
            <li>
              <span class="initiales">IA</span>
              <div>
                <strong>Mr IMADE AYIVI</strong>
                <span>Actionnaire</span>
              </div>
            </li>
          </ul>
        </div>
      </article>

      <article class="escale arrivee">
        <span class="repere"></span>
        <div class="texte">
          <h2>Vous êtes arrivé</h2>
          <p>Il ne reste qu'à choisir votre destination.</p>
          <a class="bouton bouton-plein" href="#contact">Écrire à un conseiller</a>
        </div>
      </article>

    </section>

    <!-- ===== CONTACT ===== -->
    <section class="contact" id="contact">
      <div class="contact-infos">
        <h2>Parlons de votre prochain voyage</h2>
        <p>Une question sur une offre, une réservation ou une destination ? Écrivez-nous, un conseiller vous répond rapidement.</p>
        <ul class="coordonnees">
          <li><span>E-mail</span><strong>contact@click-and-go.fr</strong></li>
          <li><span>Téléphone</span><strong>01 23 45 67 89</strong></li>
          <li><span>Horaires</span><strong>Du lundi au vendredi, de 9 h à 18 h</strong></li>
          <li><span>Adresse</span><strong>10 rue du Voyage, 75000 Paris</strong></li>
        </ul>
      </div>

      <div class="carte-contact">
        <form id="form-contact" action="#">
          <label>
            Votre nom
            <input type="text" name="nom" required>
          </label>
          <label>
            Votre e-mail
            <input type="email" name="email" required>
          </label>
          <label>
            Sujet
            <select name="sujet">
              <option>Question sur une réservation</option>
              <option>Conseil pour choisir un voyage</option>
              <option>Autre demande</option>
            </select>
          </label>
          <label>
            Votre message
            <textarea name="message" required></textarea>
          </label>
          <button type="submit">Envoyer le message</button>
        </form>

        <div class="merci" id="contact-ok" tabindex="-1" hidden>
          <svg viewBox="0 0 70 70" aria-hidden="true">
            <circle cx="35" cy="35" r="31"></circle>
            <path d="M21 36 L31 46 L50 25"></path>
          </svg>
          <h3>Merci <span id="prenom"></span>, c'est parti</h3>
          <p>Votre message est bien envoyé. Un conseiller vous répond rapidement.</p>
        </div>
      </div>
    </section>

  </main>

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

  <!-- ===== JAVASCRIPT : tracé de vol + formulaire ===== -->
  <script>
    (function () {
      var parcours = document.querySelector('.parcours');
      var svg = parcours.querySelector('.trace');
      var fond = svg.querySelector('.fond');
      var fait = svg.querySelector('.fait');
      var avion = svg.querySelector('.avion');
      var reperes = [].slice.call(parcours.querySelectorAll('.repere'));
      var escales = [].slice.call(parcours.querySelectorAll('.escale'));
      var points = [];
      var longueur = 0;
      var attente = false;

      // 1. Dessine la route à partir de la position réelle des repères
      function construire() {
        var base = parcours.getBoundingClientRect();

        points = reperes.map(function (r) {
          var b = r.getBoundingClientRect();
          return { x: b.left - base.left + b.width / 2, y: b.top - base.top + b.height / 2 };
        });

        var amplitude = window.innerWidth <= 800 ? 14 : 50;
        var etapes = [{ x: points[0].x, y: 0 }].concat(points);
        var d = 'M' + etapes[0].x + ' ' + etapes[0].y;

        for (var i = 1; i < etapes.length; i++) {
          var a = etapes[i - 1];
          var b = etapes[i];
          var sens = (i % 2) ? 1 : -1;
          var dy = b.y - a.y;
          d += ' C' + (a.x + sens * amplitude) + ' ' + (a.y + dy * 0.35) +
               ' ' + (b.x + sens * amplitude) + ' ' + (b.y - dy * 0.35) +
               ' ' + b.x + ' ' + b.y;
        }

        svg.setAttribute('viewBox', '0 0 ' + base.width + ' ' + base.height);
        fond.setAttribute('d', d);
        fait.setAttribute('d', d);
        longueur = fait.getTotalLength();
        fait.style.strokeDasharray = longueur + ' ' + longueur;
        mettreAJour();
      }

      // 2. Place l'avion selon le défilement et allume les étapes passées
      function mettreAJour() {
        attente = false;
        if (!longueur) return;

        var base = parcours.getBoundingClientRect();
        var ligne = window.innerHeight * 0.5 - base.top; // milieu de l'écran, dans le parcours

        // Cherche la distance sur la route où l'on se trouve à cette hauteur
        var bas = 0;
        var haut = longueur;
        for (var i = 0; i < 18; i++) {
          var milieu = (bas + haut) / 2;
          if (fait.getPointAtLength(milieu).y < ligne) { bas = milieu; } else { haut = milieu; }
        }
        var distance = ligne <= 0 ? 0 : (ligne >= base.height ? longueur : bas);

        var p = fait.getPointAtLength(distance);
        var avant = fait.getPointAtLength(Math.max(distance - 1, 0));
        var apres = fait.getPointAtLength(Math.min(distance + 1, longueur));
        var angle = Math.atan2(apres.y - avant.y, apres.x - avant.x) * 180 / Math.PI;

        avion.setAttribute('transform', 'translate(' + p.x + ' ' + p.y + ') rotate(' + angle + ') scale(1.3)');
        fait.style.strokeDashoffset = longueur - distance;

        escales.forEach(function (escale, i) {
          escale.classList.toggle('passe', points[i].y <= p.y + 1);
        });
      }

      function demander() {
        if (!attente) {
          attente = true;
          requestAnimationFrame(mettreAJour);
        }
      }

      window.addEventListener('scroll', demander, { passive: true });
      window.addEventListener('resize', construire);
      window.addEventListener('load', construire);
      if (document.fonts && document.fonts.ready) document.fonts.ready.then(construire);
      construire();

      // 3. Formulaire de contact : message de confirmation
      var form = document.getElementById('form-contact');
      var merci = document.getElementById('contact-ok');
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var prenom = form.elements['nom'].value.trim().split(' ')[0];
        document.getElementById('prenom').textContent = prenom;
        form.hidden = true;
        merci.hidden = false;
        merci.focus();
        // Le tracé peut changer de hauteur : on le recalcule
        construire();
      });
    })();
  </script>

</body>
</html>