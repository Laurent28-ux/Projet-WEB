<?php
require_once __DIR__ . '/../../Controllers/AuthController.php';
$tripName = 'Circuit Japon 7j/6n';
$tripPrice = 1099;
$tripImage = 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&w=900&q=85';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre réservation | Click &amp; Go</title>
    <link rel="preconnect" href="https://
fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../public/css/reservation.css">
</head>

<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main class="booking-page page-container">
        <a class="back-link" href="../recherche/resultats.php"><span aria-hidden="true">←</span> Retour aux détails du voyage</a>
        <div class="booking-heading">
            <p class="eyebrow">PLUS QU’UNE ÉTAPE AVANT LE DÉPART</p>
            <h1>Préparez votre réservation</h1>
            <p>Renseignez les informations des voyageurs pour organiser votre séjour en toute simplicité.</p>
        </div>

        <div class="booking-layout">
            <form action="../../Controllers/AuthController.php" method="POST" class="booking-form">
                <section class="booking-section">
                    <div class="section-title">
                        <span class="step-number">1</span>
                        <div>
                            <h2>Votre séjour</h2>
                            <p>Choisissez vos dates et le nombre de voyageurs.</p>
                        </div>
                    </div>
                    <div class="form-grid">
                        <label class="form-field" for="booking-departure">
                            <span>Date de départ</span>
                            <input id="booking-departure" name="departure_date" type="date" value="2026-12-14" required>
                        </label>
                        <label class="form-field" for="booking-return">
                            <span>Date de retour</span>
                            <input id="booking-return" name="return_date" type="date" value="2026-12-20" required>
                        </label>
                        <label class="form-field" for="booking-guests">
                            <span>Nombre de voyageurs</span>
                            <select id="booking-guests" name="travelers">
                                <option value="1">1 voyageur</option>
                                <option value="2">2 voyageurs</option>
                                <option value="3">3 voyageurs</option>
                                <option value="4">4 voyageurs</option>
                            </select>
                        </label>
                        <label class="form-field" for="booking-room">
                            <span>Hébergement</span>
                            <select id="booking-room" name="room">
                                <option value="double">Chambre double</option>
                                <option value="single">Chambre simple</option>
                                <option value="family">Chambre familiale</option>
                            </select>
                        </label>
                    </div>
                </section>

                <section class="booking-section">
                    <div class="section-title">
                        <span class="step-number">2</span>
                        <div>
                            <h2>Informations du voyageur principal</h2>
                            <p>Ces coordonnées serviront au suivi de votre demande.</p>
                        </div>
                    </div>
                    <div class="form-grid">
                        <label class="form-field" for="booking-firstname"><span>Prénom</span><input  name="prenom" type="text" autocomplete="given-name" placeholder="Ex. Camille" required></label>
                        <label class="form-field" for="booking-lastname"><span>Nom</span><input  name="nom" type="text" autocomplete="family-name" placeholder="Ex. Martin" required></label>
                        <label class="form-field" for="booking-email"><span>Adresse e-mail</span><input  name="email" type="email" autocomplete="email" placeholder="camille@exemple.fr" required></label>
                        <label class="form-field" for="booking-phone"><span>Téléphone</span><input  name="numero" type="tel" autocomplete="tel" placeholder="+33 6 00 00 00 00" required></label>
                    </div>
                </section>

                <section class="booking-section">
                    <div class="section-title">
                        <span class="step-number">3</span>
                        <div>
                            <h2>Une demande particulière ?</h2>
                            <p>Faites-nous part de vos préférences ou besoins spécifiques.</p>
                        </div>
                    </div>
                    <label class="form-field" for="booking-notes"><span>Message <span class="optional">(facultatif)</span></span><textarea id="booking-notes" name="notes" rows="4" placeholder="Régime alimentaire, accessibilité, occasion spéciale…"></textarea></label>
                </section>
                <label class="consent-row" for="booking-terms"><input id="booking-terms" name="terms" type="checkbox" required><span>J’accepte que mes informations soient utilisées pour traiter ma demande de réservation.</span></label>
                <button class="button button--primary booking-submit" type="submit">Continuer ma réservation <span aria-hidden="true">→</span></button>
                <p class="booking-notice" id="booking-notice" role="status" hidden></p>
            </form>

            <aside class="booking-summary" aria-label="Récapitulatif du voyage">
                <p class="eyebrow">VOTRE VOYAGE</p>
                <img class="booking-summary__image" src="<?= htmlspecialchars($tripImage, ENT_QUOTES, 'UTF-8') ?>" alt="Rue traditionnelle à Kyoto, au Japon">
                <div class="booking-summary__body">
                    <p class="card-category">JAPON · CIRCUIT ORGANISÉ</p>
                    <h2><?= htmlspecialchars($tripName, ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="summary-rating"><span aria-hidden="true"><i class="fa-solid fa-star"></i></span> 4,8 <span>(732 avis)</span></p>
                    <ul class="summary-features">
                        <li><span aria-hidden="true"><i class="fa-solid fa-plane"></i></span> Vol aller-retour inclus</li>
                        <li><span aria-hidden="true"><i class="fa-solid fa-hotel"></i></span> Hôtel 4 étoiles, 6 nuits</li>
                        <li><span aria-hidden="true"><i class="fa-solid fa-globe"></i></span> Tokyo et Kyoto</li>
                    </ul>
                    <div class="summary-line"><span>Prix par voyageur</span><strong><?= number_format($tripPrice, 0, ',', ' ') ?> €</strong></div>
                    <div class="summary-line"><span>Voyageurs</span><strong id="summary-travelers">1</strong></div>
                    <div class="summary-total"><span>Total estimé</span><strong id="summary-total"><?= number_format($tripPrice, 0, ',', ' ') ?> €</strong></div>
                    <p class="summary-footnote">Le montant définitif sera confirmé à l’étape de paiement.</p>
                </div>
            </aside>
        </div>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="../../../public/js/reservation.js"></script>
</body>

</html>