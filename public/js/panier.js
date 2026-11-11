const cartItemList = document.querySelector("#cart-item-list");
const cartItems = () => Array.from(document.querySelectorAll("[data-cart-item]"));
const cartCount = document.querySelector("#cart-count");
const cartEmpty = document.querySelector("#cart-empty");
const subtotalOutput = document.querySelector("#cart-subtotal");
const discountOutput = document.querySelector("#cart-discount");
const feesOutput = document.querySelector("#cart-fees");
const discountRow = document.querySelector("#discount-row");
const totalOutput = document.querySelector("#cart-total");
const promoForm = document.querySelector("#promo-form");
const promoInput = document.querySelector("#promo-code");
const promoMessage = document.querySelector("#promo-message");
const feedback = document.querySelector("#cart-feedback");
const availabilityStatus = document.querySelector("#availability-status");
const refreshButton = document.querySelector("#refresh-prices");
const checkoutButton = document.querySelector("#checkout-button");
const editDialog = document.querySelector("#cart-edit-dialog");
const editForm = document.querySelector("#cart-edit-form");
const editDateInput = document.querySelector("#edit-date");
const editTravelersInput = document.querySelector("#edit-travelers");
const numberFormatter = new Intl.NumberFormat("fr-FR", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
});

const serviceFee = 25;
const promoDiscount = 100;
let activePromo = "VOYAGE10";
let editingItem = null;

const formatPrice = (amount) => `${numberFormatter.format(amount)} €`;

const updateCartSummary = () => {
    const items = cartItems();
    const subtotal = items.reduce((sum, item) => sum + Number(item.dataset.price), 0);
    const discount = activePromo ? Math.min(promoDiscount, subtotal) : 0;
    const fees = items.length ? serviceFee : 0;
    const total = Math.max(0, subtotal - discount + fees);

    if (items.length === 0) {
        activePromo = "";
        if (promoInput instanceof HTMLInputElement) {
            promoInput.value = "";
        }
        if (promoMessage instanceof HTMLElement) {
            promoMessage.textContent = "";
            promoMessage.classList.remove("is-success", "is-error");
        }
        availabilityStatus?.classList.remove("is-checked");
    }

    if (subtotalOutput instanceof HTMLElement) {
        subtotalOutput.textContent = formatPrice(subtotal);
    }
    if (feesOutput instanceof HTMLElement) {
        feesOutput.textContent = formatPrice(fees);
    }
    if (discountOutput instanceof HTMLElement) {
        discountOutput.textContent = `- ${formatPrice(discount)}`;
    }
    if (discountRow instanceof HTMLElement) {
        discountRow.hidden = discount === 0;
    }
    if (totalOutput instanceof HTMLElement) {
        totalOutput.textContent = formatPrice(total);
    }
    if (cartCount instanceof HTMLElement) {
        cartCount.textContent = `(${items.length} ${items.length > 1 ? "prestations" : "prestation"})`;
    }
    if (cartEmpty instanceof HTMLElement) {
        cartEmpty.hidden = items.length > 0;
    }
    if (checkoutButton instanceof HTMLAnchorElement) {
        checkoutButton.setAttribute("aria-disabled", String(items.length === 0));
        checkoutButton.classList.toggle("is-disabled", items.length === 0);
        checkoutButton.tabIndex = items.length === 0 ? -1 : 0;
    }
};

const showFeedback = (message) => {
    if (!(feedback instanceof HTMLElement)) {
        return;
    }

    feedback.hidden = false;
    feedback.textContent = message;
};

const removeItem = (item) => {
    item.classList.add("is-removing");
    window.setTimeout(() => {
        item.remove();
        updateCartSummary();
    }, 220);
};

document.querySelectorAll("[data-remove-item]").forEach((button) => {
    button.addEventListener("click", () => {
        const itemId = button.getAttribute("data-remove-item");
        const item = itemId ? document.querySelector(`[data-item-id="${CSS.escape(itemId)}"]`) : null;
        if (item instanceof HTMLElement) {
            removeItem(item);
        }
    });
});

document.querySelector("#clear-cart")?.addEventListener("click", () => {
    cartItems().forEach(removeItem);
});

const openEditDialog = (item) => {
    if (!(editDialog instanceof HTMLDialogElement) ||
        !(editDateInput instanceof HTMLInputElement) ||
        !(editTravelersInput instanceof HTMLSelectElement)) {
        throw new Error("Le formulaire de modification du panier est introuvable.");
    }

    const dateDetail = item.querySelector("[data-item-date]");
    const travelersDetail = item.querySelector("[data-item-travelers]");
    if (!(dateDetail instanceof HTMLElement) || !(travelersDetail instanceof HTMLElement)) {
        throw new Error("Les informations du séjour à modifier sont introuvables.");
    }

    const dateText = Array.from(dateDetail.childNodes)
        .filter((node) => node.nodeType === Node.TEXT_NODE)
        .map((node) => node.textContent)
        .join("")
        .trim();
    const travelersText = Array.from(travelersDetail.childNodes)
        .filter((node) => node.nodeType === Node.TEXT_NODE)
        .map((node) => node.textContent)
        .join("")
        .trim();
    const travelerCount = travelersText.match(/\d+/)?.[0] ?? "1";

    editingItem = item;
    editDateInput.value = dateText;
    editTravelersInput.value = travelerCount;
    editDialog.showModal();
    editDateInput.focus();
};

document.querySelectorAll("[data-edit-item]").forEach((button) => {
    button.addEventListener("click", () => {
        const itemId = button.getAttribute("data-edit-item");
        const item = itemId ? document.querySelector(`[data-item-id="${CSS.escape(itemId)}"]`) : null;
        if (item instanceof HTMLElement) {
            openEditDialog(item);
        }
    });
});

document.querySelectorAll("[data-close-edit]").forEach((button) => {
    button.addEventListener("click", () => {
        if (editDialog instanceof HTMLDialogElement) {
            editDialog.close();
        }
    });
});

editForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    if (!(editingItem instanceof HTMLElement) ||
        !(editDialog instanceof HTMLDialogElement) ||
        !(editDateInput instanceof HTMLInputElement) ||
        !(editTravelersInput instanceof HTMLSelectElement)) {
        throw new Error("La prestation à modifier ou ses champs sont introuvables.");
    }

    const dateDetail = editingItem.querySelector("[data-item-date]");
    const travelersDetail = editingItem.querySelector("[data-item-travelers]");
    if (!(dateDetail instanceof HTMLElement) || !(travelersDetail instanceof HTMLElement)) {
        throw new Error("Les informations du séjour à modifier sont introuvables.");
    }

    const dateIcon = dateDetail.querySelector("i");
    const travelersIcon = travelersDetail.querySelector("i");
    const travelers = Number(editTravelersInput.value);
    const isHotel = editingItem.dataset.itemId?.startsWith("hotel-") ?? false;
    dateDetail.replaceChildren(dateIcon ?? document.createElement("i"), document.createTextNode(editDateInput.value.trim()));
    travelersDetail.replaceChildren(
        travelersIcon ?? document.createElement("i"),
        document.createTextNode(`${travelers} ${isHotel ? (travelers === 1 ? "adulte" : "adultes") : (travelers === 1 ? "voyageur" : "voyageurs")}`)
    );

    editDialog.close();
    editingItem = null;
    showFeedback("Les détails de la prestation ont été mis à jour.");
});

promoForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    if (!(promoInput instanceof HTMLInputElement) || !(promoMessage instanceof HTMLElement)) {
        throw new Error("Le champ de code promotionnel est introuvable.");
    }

    const code = promoInput.value.trim().toUpperCase();
    promoMessage.classList.remove("is-success", "is-error");

    if (code === "VOYAGE10") {
        activePromo = code;
        promoMessage.textContent = "Code appliqué : 100 € de réduction.";
        promoMessage.classList.add("is-success");
    } else {
        activePromo = "";
        promoMessage.textContent = code ? "Ce code promotionnel n’est pas valide." : "Saisissez un code promotionnel.";
        promoMessage.classList.add("is-error");
    }

    updateCartSummary();
});

refreshButton?.addEventListener("click", () => {
    if (!(refreshButton instanceof HTMLButtonElement) || !(availabilityStatus instanceof HTMLElement)) {
        throw new Error("Le contrôle de disponibilité du panier est introuvable.");
    }

    refreshButton.disabled = true;
    refreshButton.classList.add("is-checking");
    availabilityStatus.classList.remove("is-checked");
    availabilityStatus.classList.add("is-pending");
    showFeedback("La vérification en temps réel nécessite une connexion au service de réservation.");

    window.setTimeout(() => {
        refreshButton.disabled = false;
        refreshButton.classList.remove("is-checking");
        showFeedback("Les tarifs affichés sont indicatifs jusqu’à la confirmation du service de réservation.");
    }, 900);
});

checkoutButton?.addEventListener("click", (event) => {
    if (cartItems().length === 0) {
        event.preventDefault();
        showFeedback("Ajoutez au moins une prestation avant de continuer vers le paiement.");
    }
});

if (!(cartItemList instanceof HTMLElement)) {
    throw new Error("La liste des prestations du panier est introuvable.");
}

if (promoMessage instanceof HTMLElement) {
    promoMessage.textContent = "Code appliqué : 100 € de réduction.";
    promoMessage.classList.add("is-success");
}

updateCartSummary();
