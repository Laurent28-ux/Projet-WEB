<?php
$orderItems = [
    [
        'name' => 'Vol Paris → New York',
        'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=320&q=80',
        'alt' => 'Tour Eiffel à Paris',
        'details' => 'Aller simple · Sam. 14 juin 2025',
        'travelers' => '1 voyageur',
        'price' => 499,
    ],
    [
        'name' => 'Hôtel Paradise Beach Resort',
        'image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=320&q=80',
        'alt' => 'Hôtel au bord d’une piscine tropicale',
        'details' => '7 nuits · Du 14 au 21 juin 2025',
        'travelers' => '2 adultes',
        'price' => 1198,
    ],
];
$orderSubtotal = array_sum(array_column($orderItems, 'price'));
$orderDiscount = 100;
$serviceFee = 25;
$orderTotal = $orderSubtotal - $orderDiscount + $serviceFee;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement sécurisé | Click &amp; Go</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../public/css/paiement.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main class="payment-page">
        <section class="payment-hero" aria-label="Paiement sécurisé">
            <div class="payment-hero__content">
                <p class="eyebrow">VOTRE VOYAGE, EN TOUTE SÉRÉNITÉ</p>
                <h1>Paiement sécurisé</h1>
                <p>Voyagez en toute confiance</p>
            </div>
        </section>

        <nav class="checkout-steps" aria-label="Étapes de réservation">
            <ol>
                <li class="checkout-step is-complete"><span class="checkout-step__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span><span>Recherche</span></li>
                <li class="checkout-step is-complete"><span class="checkout-step__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span><span>Détails</span></li>
                <li class="checkout-step is-complete"><span class="checkout-step__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span><span>Panier</span></li>
                <li class="checkout-step is-current" aria-current="step"><span class="checkout-step__icon"><i class="fa-regular fa-credit-card" aria-hidden="true"></i></span><span>Paiement</span></li>
                <li class="checkout-step"><span class="checkout-step__icon"><i class="fa-solid fa-flag-checkered" aria-hidden="true"></i></span><span>Confirmation</span></li>
            </ol>
        </nav>

        <div class="payment-layout">
            <section class="payment-panel" aria-labelledby="payment-title">
                <h2 class="payment-panel__heading" id="payment-title"><i class="fa-regular fa-credit-card" aria-hidden="true"></i> Choisissez votre mode de paiement</h2>
                <form id="payment-form" novalidate>
                    <fieldset class="payment-methods">
                        <legend class="visually-hidden">Mode de paiement</legend>
                        <label class="payment-method is-selected">
                            <input type="radio" name="payment-method" value="card" checked>
                            <span class="payment-method__icon"><i class="fa-solid fa-credit-card" aria-hidden="true"></i></span>
                            <span class="payment-method__name">Carte bancaire</span>
                            <span class="payment-method__note">Visa, Mastercard, etc.</span>
                            <span class="payment-method__check"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                        </label>
                        <label class="payment-method">
                            <input type="radio" name="payment-method" value="paypal">
                            <span class="payment-method__icon payment-method__icon--paypal">P</span>
                            <span class="payment-method__name">PayPal</span>
                            <span class="payment-method__note">Paiement avec PayPal</span>
                            <span class="payment-method__check"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                        </label>
                        <label class="payment-method">
                            <input type="radio" name="payment-method" value="bank">
                            <span class="payment-method__icon"><i class="fa-solid fa-building-columns" aria-hidden="true"></i></span>
                            <span class="payment-method__name">Virement bancaire</span>
                            <span class="payment-method__note">Instructions après validation</span>
                            <span class="payment-method__check"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                        </label>
                        <label class="payment-method">
                            <input type="radio" name="payment-method" value="mobile">
                            <span class="payment-method__icon"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i></span>
                            <span class="payment-method__name">Mobile Money</span>
                            <span class="payment-method__note">Paiement depuis votre mobile</span>
                            <span class="payment-method__check"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                        </label>
                        <label class="payment-method">
                            <input type="radio" name="payment-method" value="wallet">
                            <span class="payment-method__icon"><i class="fa-solid fa-wallet" aria-hidden="true"></i></span>
                            <span class="payment-method__name">Portefeuille électronique</span>
                            <span class="payment-method__note">Paiement numérique sécurisé</span>
                            <span class="payment-method__check"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                        </label>
                    </fieldset>

                    <section class="payment-details is-active" data-payment-details="card" aria-label="Informations de carte bancaire">
                        <div class="card-preview" aria-hidden="true">
                            <div class="card-preview__top"><i class="fa-solid fa-sim-card"></i><span id="preview-brand">CARTE BANCAIRE</span></div>
                            <p class="card-preview__number" id="preview-number">•••• •••• •••• ••••</p>
                            <div class="card-preview__bottom"><span id="preview-name">NOM DU TITULAIRE</span><span id="preview-expiry">MM/AA</span></div>
                            <span class="card-preview__network" id="preview-network">VISA</span>
                        </div>
                        <div class="payment-fields">
                            <label class="payment-field payment-field--full" for="card-number">
                                <span>Numéro de carte <strong>*</strong></span>
                                <span class="payment-input-wrap"><input id="card-number" name="card_number" type="text" inputmode="numeric" autocomplete="cc-number" placeholder="1234 5678 9012 3456" maxlength="23" required><i class="fa-regular fa-credit-card" aria-hidden="true"></i></span>
                                <span class="field-error" data-error-for="card-number"></span>
                            </label>
                            <label class="payment-field" for="card-expiry">
                                <span>Date d’expiration <strong>*</strong></span>
                                <span class="payment-input-wrap"><input id="card-expiry" name="card_expiry" type="text" inputmode="numeric" autocomplete="cc-exp" placeholder="MM / AA" maxlength="7" required><i class="fa-regular fa-calendar" aria-hidden="true"></i></span>
                                <span class="field-error" data-error-for="card-expiry"></span>
                            </label>
                            <label class="payment-field" for="card-cvv">
                                <span>CVV <strong>*</strong></span>
                                <span class="payment-input-wrap"><input id="card-cvv" name="card_cvv" type="password" inputmode="numeric" autocomplete="cc-csc" placeholder="123" maxlength="4" required><i class="fa-solid fa-lock" aria-hidden="true"></i></span>
                                <span class="field-error" data-error-for="card-cvv"></span>
                            </label>
                            <label class="payment-field payment-field--full" for="card-holder">
                                <span>Nom du titulaire <strong>*</strong></span>
                                <span class="payment-input-wrap"><input id="card-holder" name="card_holder" type="text" autocomplete="cc-name" placeholder="Jean Dupont" required><i class="fa-solid fa-user" aria-hidden="true"></i></span>
                                <span class="field-error" data-error-for="card-holder"></span>
                            </label>
                            <label class="save-card" for="save-card"><input id="save-card" name="save_card" type="checkbox"><span>Enregistrer cette carte pour mes prochains voyages</span></label>
                        </div>
                    </section>

                    <section class="payment-details" data-payment-details="paypal" aria-label="Informations PayPal" hidden>
                        <label class="payment-field payment-field--full" for="paypal-email"><span>Adresse e-mail PayPal <strong>*</strong></span><span class="payment-input-wrap"><input id="paypal-email" name="paypal_email" type="email" autocomplete="email" placeholder="vous@exemple.fr"><i class="fa-solid fa-at" aria-hidden="true"></i></span><span class="field-error" data-error-for="paypal-email"></span></label>
                        <p class="method-hint"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Vous serez invité à confirmer le paiement auprès de PayPal.</p>
                    </section>

                    <section class="payment-details payment-details--notice" data-payment-details="bank" aria-label="Virement bancaire" hidden>
                        <span class="method-notice-icon"><i class="fa-solid fa-building-columns" aria-hidden="true"></i></span>
                        <div><h3>Virement bancaire</h3><p>Les coordonnées bancaires et la référence de paiement vous seront communiquées après confirmation de votre commande.</p></div>
                    </section>

                    <section class="payment-details" data-payment-details="mobile" aria-label="Mobile Money" hidden>
                        <label class="payment-field payment-field--full" for="mobile-phone"><span>Numéro de téléphone Mobile Money <strong>*</strong></span><span class="payment-input-wrap"><input id="mobile-phone" name="mobile_phone" type="tel" autocomplete="tel" placeholder="+33 6 00 00 00 00"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i></span><span class="field-error" data-error-for="mobile-phone"></span></label>
                        <label class="payment-field payment-field--full" for="mobile-provider"><span>Opérateur <strong>*</strong></span><select id="mobile-provider" name="mobile_provider"><option value="">Choisir un opérateur</option><option value="orange">Orange Money</option><option value="wave">Wave</option><option value="mtn">MTN Mobile Money</option></select><span class="field-error" data-error-for="mobile-provider"></span></label>
                    </section>

                    <section class="payment-details payment-details--notice" data-payment-details="wallet" aria-label="Portefeuille électronique" hidden>
                        <span class="method-notice-icon"><i class="fa-solid fa-wallet" aria-hidden="true"></i></span>
                        <div><h3>Portefeuille électronique</h3><p>La connexion à votre portefeuille sera proposée lors de la confirmation du paiement.</p></div>
                    </section>

                    <div class="security-banner">
                        <span class="security-banner__icon"><i class="fa-solid fa-lock" aria-hidden="true"></i></span>
                        <div class="security-banner__copy"><strong>Paiement sécurisé</strong><span>Cette maquette ne transmet ni n’enregistre vos informations.</span></div>
                        <div class="security-banner__badges" aria-label="Moyens de paiement sécurisés"><span class="brand-badge brand-badge--visa">VISA</span><span class="brand-badge brand-badge--master"><i></i><i></i></span><span class="brand-badge brand-badge--paypal">PayPal</span><span class="ssl-badge"><i class="fa-solid fa-lock" aria-hidden="true"></i><span>SSL<br>SÉCURISÉ</span></span></div>
                    </div>
                    <p class="payment-message" id="payment-message" role="status" aria-live="polite" hidden></p>
                </form>
            </section>

            <aside class="order-summary" aria-labelledby="order-summary-title">
                <h2 class="order-summary__heading" id="order-summary-title"><i class="fa-regular fa-rectangle-list" aria-hidden="true"></i> Récapitulatif de votre commande</h2>
                <div class="order-summary__body">
                    <div class="order-items">
                        <?php foreach ($orderItems as $item): ?>
                            <article class="order-item">
                                <img src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8') ?>">
                                <div class="order-item__description">
                                    <h3><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                                    <p><?= htmlspecialchars($item['details'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <p><i class="fa-solid fa-user-group" aria-hidden="true"></i> <?= htmlspecialchars($item['travelers'], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <strong class="order-item__price"><?= number_format($item['price'], 2, ',', ' ') ?> €</strong>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <div class="order-totals">
                        <div class="order-total-row"><span>Sous-total</span><strong><?= number_format($orderSubtotal, 2, ',', ' ') ?> €</strong></div>
                        <div class="order-total-row order-total-row--discount"><span>Réduction</span><strong>- <?= number_format($orderDiscount, 2, ',', ' ') ?> €</strong></div>
                        <div class="order-total-row"><span>Frais de service <span class="fee-info" title="Frais de traitement de la réservation"><i class="fa-solid fa-circle-info" aria-hidden="true"></i></span></span><strong><?= number_format($serviceFee, 2, ',', ' ') ?> €</strong></div>
                        <div class="order-grand-total"><span>Total à payer</span><strong><?= number_format($orderTotal, 2, ',', ' ') ?> €</strong></div>
                    </div>
                    <div class="cancellation-note"><span class="cancellation-note__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span><span><strong>Annulation gratuite</strong><br>jusqu’à 48 h avant le départ <i class="fa-solid fa-circle-info" title="Selon les conditions de l’offre." aria-hidden="true"></i></span><i class="fa-solid fa-plane cancellation-note__plane" aria-hidden="true"></i></div>
                </div>
            </aside>

            <div class="payment-actions">
                <a class="button button--outline payment-back" href="../reservation/panier.php"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Retour au panier</a>
                <button class="button button--primary payment-submit" type="submit" form="payment-form"><i class="fa-solid fa-lock" aria-hidden="true"></i> Procéder au paiement <i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="../../../public/js/paiement.js"></script>
</body>
</html>