<?php
$cartItems = [
    [
        'id' => 'flight-paris-new-york',
        'type' => 'Vol aller simple',
        'name' => 'Vol Paris → New York',
        'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=600&q=85',
        'alt' => 'Vue de la tour Eiffel à Paris au coucher du soleil',
        'date' => 'Sam. 14 juin 2025',
        'travelers' => '1 voyageur',
        'detail' => 'Classe économique',
        'price' => 499,
    ],
    [
        'id' => 'hotel-paradise-beach',
        'type' => 'Hébergement · 7 nuits',
        'name' => 'Hôtel Paradise Beach Resort',
        'image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=600&q=85',
        'alt' => 'Piscine et plage tropicale du Paradise Beach Resort',
        'date' => 'Du 14 au 21 juin 2025',
        'travelers' => '2 adultes',
        'detail' => 'Petit-déjeuner inclus',
        'price' => 1198,
    ],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre panier | Click &amp; Go</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../public/css/panier.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main class="cart-page">
        <section class="cart-hero" aria-label="Voyagez avec Click & Go">
            <div class="cart-hero__content">
                <p class="eyebrow">LE MONDE VOUS ATTEND</p>
                <h1>Le plus beau voyage commence par une réservation.</h1>
                <p>Vérifiez votre sélection avant de vous envoler.</p>
            </div>
        </section>

        <nav class="checkout-steps" aria-label="Étapes de réservation">
            <ol>
                <li class="checkout-step is-complete"><span class="checkout-step__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span><span>Recherche</span></li>
                <li class="checkout-step is-complete"><span class="checkout-step__icon"><i class="fa-solid fa-check" aria-hidden="true"></i></span><span>Détails</span></li>
                <li class="checkout-step is-current" aria-current="step"><span class="checkout-step__icon"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></span><span>Panier</span></li>
                <li class="checkout-step"><span class="checkout-step__icon"><i class="fa-regular fa-credit-card" aria-hidden="true"></i></span><span>Paiement</span></li>
                <li class="checkout-step"><span class="checkout-step__icon"><i class="fa-solid fa-flag-checkered" aria-hidden="true"></i></span><span>Confirmation</span></li>
            </ol>
        </nav>

        <div class="cart-layout">
            <div class="cart-main">
                <section class="cart-items" aria-labelledby="cart-title">
                    <div class="cart-items__heading">
                        <div class="cart-items__title">
                            <span class="cart-heading-icon"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></span>
                            <h2 id="cart-title">Votre panier <span id="cart-count">(<?= count($cartItems) ?> prestations)</span></h2>
                        </div>
                        <button class="cart-clear" id="clear-cart" type="button">Vider le panier</button>
                    </div>

                    <div class="cart-item-list" id="cart-item-list">
                        <?php foreach ($cartItems as $item): ?>
                            <article class="cart-item" data-cart-item data-item-id="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>" data-price="<?= (int) $item['price'] ?>">
                                <img class="cart-item__image" src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8') ?>">
                                <div class="cart-item__content">
                                    <div class="cart-item__top">
                                        <div>
                                            <p class="cart-item__type"><?= htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8') ?></p>
                                            <h3><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                                        </div>
                                        <p class="cart-item__price"><?= number_format($item['price'], 2, ',', ' ') ?> €</p>
                                    </div>
                                    <div class="cart-item__details">
                                            <span data-item-date><i class="fa-regular fa-calendar" aria-hidden="true"></i><?= htmlspecialchars($item['date'], ENT_QUOTES, 'UTF-8') ?></span>
                                            <span data-item-travelers><i class="fa-solid fa-user-group" aria-hidden="true"></i><?= htmlspecialchars($item['travelers'], ENT_QUOTES, 'UTF-8') ?></span>
                                        <span><i class="fa-solid fa-circle-info" aria-hidden="true"></i><?= htmlspecialchars($item['detail'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                    <div class="cart-item__actions">
                                        <button class="item-action item-action--edit" type="button" data-edit-item="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"><i class="fa-solid fa-pen" aria-hidden="true"></i> Modifier</button>
                                        <button class="item-action item-action--remove" type="button" data-remove-item="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"><i class="fa-regular fa-trash-can" aria-hidden="true"></i> Supprimer</button>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                        <div class="cart-empty" id="cart-empty" hidden>
                            <span class="cart-empty__icon"><i class="fa-solid fa-suitcase-rolling" aria-hidden="true"></i></span>
                            <h3>Votre panier est vide</h3>
                            <p>Il est temps de trouver votre prochaine destination.</p>
                            <a class="button button--primary" href="../recherche/recherche.php">Découvrir les voyages</a>
                        </div>
                    </div>
                </section>

                <form class="promo-card" id="promo-form">
                    <span class="promo-card__icon"><i class="fa-solid fa-gift" aria-hidden="true"></i></span>
                    <div class="promo-card__copy">
                        <h2>Code promotionnel</h2>
                        <p>Vous avez un code promo ? Entrez-le ici.</p>
                    </div>
                    <label class="visually-hidden" for="promo-code">Votre code promotionnel</label>
                    <input id="promo-code" name="promo" type="text" value="VOYAGE10" placeholder="Ex. VOYAGE10" autocomplete="off">
                    <button class="button button--primary promo-submit" type="submit">Appliquer</button>
                    <p class="promo-message" id="promo-message" role="status" aria-live="polite"></p>
                </form>

                <div class="cart-bottom-actions">
                    <a class="button button--outline cart-back" href="../recherche/recherche.php"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Continuer mes achats</a>
                    <div class="cart-bottom-actions__right">
                        <button class="button button--primary cart-refresh" id="refresh-prices" type="button"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> Vérifier les prix et disponibilités <i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
                        <a class="button button--payment" id="checkout-button" href="../paiement/paiement.php"><i class="fa-regular fa-credit-card" aria-hidden="true"></i> Procéder au paiement <i class="fa-solid fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <p class="cart-feedback" id="cart-feedback" role="status" aria-live="polite" hidden></p>
            </div>

            <aside class="cart-summary" aria-labelledby="summary-title">
                <h2 class="cart-summary__heading" id="summary-title"><i class="fa-regular fa-rectangle-list" aria-hidden="true"></i> Récapitulatif de votre réservation</h2>
                <div class="cart-summary__body">
                    <div class="summary-row"><span>Sous-total</span><strong id="cart-subtotal">1 697,00 €</strong></div>
                    <div class="summary-row summary-row--discount" id="discount-row"><span>Réduction</span><strong id="cart-discount">- 100,00 €</strong></div>
                    <div class="summary-row"><span>Frais de service <button class="info-button" type="button" aria-label="Les frais de service couvrent le traitement sécurisé de la réservation." title="Les frais de service couvrent le traitement sécurisé de la réservation."><i class="fa-solid fa-circle-info" aria-hidden="true"></i></button></span><strong id="cart-fees">25,00 €</strong></div>
                    <div class="summary-total"><span>Total</span><strong id="cart-total">1 622,00 €</strong></div>
                    <div class="availability-status is-pending" id="availability-status" role="status">
                        <span class="availability-status__icon"><i class="fa-regular fa-clock" aria-hidden="true"></i></span>
                        <span>Prix affichés<br>disponibilités à confirmer</span>
                        <i class="fa-solid fa-arrows-rotate availability-status__refresh" aria-hidden="true"></i>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <dialog class="cart-edit-dialog" id="cart-edit-dialog" aria-labelledby="edit-dialog-title">
        <form class="cart-edit-form" id="cart-edit-form">
            <button class="cart-edit-dialog__close" type="button" aria-label="Fermer" data-close-edit><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
            <p class="eyebrow">METTEZ À JOUR VOTRE SÉJOUR</p>
            <h2 id="edit-dialog-title">Modifier la prestation</h2>
            <label class="cart-edit-field" for="edit-date">Date ou période<input id="edit-date" name="date" type="text" required></label>
            <label class="cart-edit-field" for="edit-travelers">Voyageurs<select id="edit-travelers" name="travelers"><option value="1">1 voyageur / adulte</option><option value="2">2 voyageurs / adultes</option><option value="3">3 voyageurs / adultes</option><option value="4">4 voyageurs / adultes</option></select></label>
            <div class="cart-edit-dialog__actions">
                <button class="button button--outline" type="button" data-close-edit>Annuler</button>
                <button class="button button--primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </dialog>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="../../../public/js/panier.js"></script>
</body>
</html>
