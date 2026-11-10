const reservationForm = document.querySelector("#reservation-form");
const guestSelect = document.querySelector("#booking-guests");
const travelerSummary = document.querySelector("#summary-travelers");
const totalSummary = document.querySelector("#summary-total");
const reservationNotice = document.querySelector("#booking-notice");
const departureDate = document.querySelector("#booking-departure");
const returnDate = document.querySelector("#booking-return");
const pricePerTraveler = 1099;
const currencyFormatter = new Intl.NumberFormat("fr-FR", {
    style: "currency",
    currency: "EUR",
    maximumFractionDigits: 0
});

const updateBookingSummary = () => {
    if (!(guestSelect instanceof HTMLSelectElement)) {
        return;
    }

    const guests = Number(guestSelect.value);
    if (travelerSummary instanceof HTMLElement) {
        travelerSummary.textContent = String(guests);
    }
    if (totalSummary instanceof HTMLElement) {
        totalSummary.textContent = currencyFormatter.format(pricePerTraveler * guests);
    }
};

guestSelect?.addEventListener("change", updateBookingSummary);

reservationForm?.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!(departureDate instanceof HTMLInputElement) || !(returnDate instanceof HTMLInputElement)) {
        throw new Error("Les dates du séjour sont introuvables dans le formulaire.");
    }

    if (new Date(returnDate.value) <= new Date(departureDate.value)) {
        returnDate.setCustomValidity("La date de retour doit être postérieure à la date de départ.");
        returnDate.reportValidity();
        returnDate.addEventListener("input", () => returnDate.setCustomValidity(""), { once: true });
        return;
    }

    if (reservationNotice instanceof HTMLElement) {
        reservationNotice.hidden = false;
        reservationNotice.textContent = "Votre formulaire est prêt. L’envoi et le paiement seront disponibles lorsque la réservation sera reliée au service de réservation.";
        reservationNotice.scrollIntoView({ behavior: "smooth", block: "nearest" });
    }
});

updateBookingSummary();
