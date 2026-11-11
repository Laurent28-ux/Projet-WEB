const paymentForm = document.querySelector("#payment-form");
const paymentMethods = Array.from(document.querySelectorAll('input[name="payment-method"]'));
const paymentPanels = Array.from(document.querySelectorAll("[data-payment-details]"));
const paymentMessage = document.querySelector("#payment-message");
const cardNumberInput = document.querySelector("#card-number");
const cardExpiryInput = document.querySelector("#card-expiry");
const cardHolderInput = document.querySelector("#card-holder");
const cardCvvInput = document.querySelector("#card-cvv");
const previewNumber = document.querySelector("#preview-number");
const previewName = document.querySelector("#preview-name");
const previewExpiry = document.querySelector("#preview-expiry");
const previewNetwork = document.querySelector("#preview-network");
const cardPreview = document.querySelector(".card-preview");
const clearErrors = () => {
    document.querySelectorAll(".field-error").forEach((error) => {
        error.textContent = "";
    });
    document.querySelectorAll('[aria-invalid="true"]').forEach((field) => {
        field.removeAttribute("aria-invalid");
    });
};

const setFieldError = (field, message) => {
    field.setAttribute("aria-invalid", "true");
    const error = document.querySelector(`[data-error-for="${field.id}"]`);
    if (error instanceof HTMLElement) {
        error.textContent = message;
    }
};

const selectedMethod = () => paymentMethods.find((method) => method.checked)?.value ?? "card";

const updatePaymentMethod = () => {
    const method = selectedMethod();

    paymentMethods.forEach((radio) => {
        const label = radio.closest(".payment-method");
        label?.classList.toggle("is-selected", radio.checked);
    });

    paymentPanels.forEach((panel) => {
        const isActive = panel.dataset.paymentDetails === method;
        panel.hidden = !isActive;
        panel.classList.toggle("is-active", isActive);
        panel.querySelectorAll("input, select").forEach((field) => {
            if (field instanceof HTMLInputElement || field instanceof HTMLSelectElement) {
                field.required = isActive && field.dataset.optional !== "true";
            }
        });
    });

    clearErrors();
    if (paymentMessage instanceof HTMLElement) {
        paymentMessage.hidden = true;
        paymentMessage.textContent = "";
        paymentMessage.classList.remove("is-error");
    }
};

paymentMethods.forEach((radio) => {
    radio.addEventListener("change", updatePaymentMethod);
});

cardNumberInput?.addEventListener("input", () => {
    const digits = cardNumberInput.value.replace(/\D/g, "").slice(0, 19);
    cardNumberInput.value = digits.replace(/(.{4})/g, "$1 ").trim();

    if (previewNumber instanceof HTMLElement) {
        const maskedDigits = digits.length ? `${"•".repeat(Math.max(0, digits.length - 4))}${digits.slice(-4)}` : "";
        previewNumber.textContent = maskedDigits
            ? maskedDigits.replace(/(.{4})/g, "$1 ").trim()
            : "•••• •••• •••• ••••";
    }

    if (previewNetwork instanceof HTMLElement && cardPreview instanceof HTMLElement) {
        const isMastercard = /^5[1-5]/.test(digits) || /^2(?:2[2-9]|[3-6]\d|7[01]|720)/.test(digits);
        const isAmex = /^3[47]/.test(digits);
        const isVisa = /^4/.test(digits);
        previewNetwork.textContent = isMastercard ? "MASTERCARD" : isAmex ? "AMEX" : isVisa ? "VISA" : "CARTE";
        cardPreview.dataset.brand = isMastercard ? "mastercard" : "default";
    }
});

cardHolderInput?.addEventListener("input", () => {
    if (previewName instanceof HTMLElement) {
        previewName.textContent = cardHolderInput.value.trim().toUpperCase() || "NOM DU TITULAIRE";
    }
});

cardExpiryInput?.addEventListener("input", () => {
    const digits = cardExpiryInput.value.replace(/\D/g, "").slice(0, 4);
    const formattedExpiry = digits.length > 2 ? `${digits.slice(0, 2)} / ${digits.slice(2)}` : digits;
    cardExpiryInput.value = formattedExpiry;

    if (previewExpiry instanceof HTMLElement) {
        previewExpiry.textContent = formattedExpiry || "MM/AA";
    }
});

const validatePayment = () => {
    clearErrors();
    const method = selectedMethod();

    if (method === "card") {
        if (!(cardNumberInput instanceof HTMLInputElement) ||
            !(cardExpiryInput instanceof HTMLInputElement) ||
            !(cardHolderInput instanceof HTMLInputElement) ||
            !(cardCvvInput instanceof HTMLInputElement)) {
            throw new Error("Un ou plusieurs champs de carte bancaire sont introuvables.");
        }

        const cardDigits = cardNumberInput.value.replace(/\D/g, "");
        const expiryDigits = cardExpiryInput.value.replace(/\D/g, "");
        const month = Number(expiryDigits.slice(0, 2));
        const year = Number(expiryDigits.slice(2));
        let isValid = true;

        if (cardDigits.length < 15 || cardDigits.length > 19) {
            setFieldError(cardNumberInput, "Saisissez un numéro de carte valide.");
            isValid = false;
        }

        if (expiryDigits.length !== 4 || month < 1 || month > 12) {
            setFieldError(cardExpiryInput, "Saisissez une date au format MM/AA.");
            isValid = false;
        } else {
            const currentDate = new Date();
            const expiryDate = new Date(2000 + year, month);
            if (expiryDate <= new Date(currentDate.getFullYear(), currentDate.getMonth())) {
                setFieldError(cardExpiryInput, "Cette carte est expirée.");
                isValid = false;
            }
        }

        if (!/^\d{3,4}$/.test(cardCvvInput.value)) {
            setFieldError(cardCvvInput, "Le cryptogramme doit contenir 3 ou 4 chiffres.");
            isValid = false;
        }

        if (cardHolderInput.value.trim().length < 2) {
            setFieldError(cardHolderInput, "Saisissez le nom du titulaire.");
            isValid = false;
        }

        return isValid;
    }

    if (method === "paypal") {
        const email = document.querySelector("#paypal-email");
        if (!(email instanceof HTMLInputElement) || !email.validity.valid || email.value.trim() === "") {
            if (email instanceof HTMLInputElement) {
                setFieldError(email, "Saisissez une adresse e-mail valide.");
                email.focus();
            }
            return false;
        }
    }

    if (method === "mobile") {
        const phone = document.querySelector("#mobile-phone");
        const provider = document.querySelector("#mobile-provider");
        let isValid = true;
        if (!(phone instanceof HTMLInputElement) || phone.value.trim().length < 6) {
            if (phone instanceof HTMLInputElement) {
                setFieldError(phone, "Saisissez un numéro de téléphone valide.");
                phone.focus();
            }
            isValid = false;
        }
        if (!(provider instanceof HTMLSelectElement) || provider.value === "") {
            if (provider instanceof HTMLSelectElement) {
                setFieldError(provider, "Choisissez votre opérateur.");
                if (isValid) {
                    provider.focus();
                }
            }
            isValid = false;
        }
        return isValid;
    }

    return true;
};

paymentForm?.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!(paymentMessage instanceof HTMLElement)) {
        throw new Error("La zone de retour du formulaire de paiement est introuvable.");
    }

    paymentMessage.hidden = false;
    if (!validatePayment()) {
        paymentMessage.classList.add("is-error");
        paymentMessage.textContent = "Vérifiez les informations signalées avant de continuer.";
        const firstInvalid = paymentForm.querySelector('[aria-invalid="true"]');
        if (firstInvalid instanceof HTMLElement) {
            firstInvalid.focus();
        }
        return;
    }

    paymentMessage.classList.remove("is-error");
    paymentMessage.textContent = "Le paiement n’est pas encore relié à un prestataire. Aucune transaction n’a été effectuée.";
});

paymentForm?.addEventListener("input", (event) => {
    if (event.target instanceof HTMLElement && event.target.hasAttribute("aria-invalid")) {
        event.target.removeAttribute("aria-invalid");
        const error = document.querySelector(`[data-error-for="${event.target.id}"]`);
        if (error instanceof HTMLElement) {
            error.textContent = "";
        }
    }

    if (paymentMessage instanceof HTMLElement && paymentMessage.classList.contains("is-error")) {
        paymentMessage.hidden = true;
        paymentMessage.classList.remove("is-error");
    }
});

paymentForm?.addEventListener("change", (event) => {
    if (event.target instanceof HTMLElement && event.target.hasAttribute("aria-invalid")) {
        event.target.removeAttribute("aria-invalid");
        const error = document.querySelector(`[data-error-for="${event.target.id}"]`);
        if (error instanceof HTMLElement) {
            error.textContent = "";
        }
    }
});

updatePaymentMethod();
