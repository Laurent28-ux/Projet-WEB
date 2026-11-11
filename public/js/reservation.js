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

updateBookingSummary();
