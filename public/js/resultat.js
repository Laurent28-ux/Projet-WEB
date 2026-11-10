const thumbnails = Array.from(document.querySelectorAll(".thumbnail"));
const heroImage = document.querySelector(".hero-image");
const photoCount = document.querySelector(".photo-count");
const tabs = Array.from(document.querySelectorAll('[role="tab"]'));

if (heroImage && photoCount && thumbnails.length > 0) {
    let activePhoto = 0;

    const showPhoto = (index) => {
        activePhoto = (index + thumbnails.length) % thumbnails.length;
        const thumbnail = thumbnails[activePhoto];
        const imageUrl = thumbnail.dataset.image;
        const imageAlt = thumbnail.dataset.alt;

        if (!imageUrl || !imageAlt) {
            throw new Error("Une photo de la galerie ne possède pas de source ou de description.");
        }

        heroImage.src = imageUrl;
        heroImage.alt = imageAlt;
        heroImage.classList.remove("hero-image");
        void heroImage.offsetWidth;
        heroImage.classList.add("hero-image");
        photoCount.textContent = `${activePhoto + 1} / ${thumbnails.length}`;

        thumbnails.forEach((item, itemIndex) => {
            const isActive = itemIndex === activePhoto;
            item.classList.toggle("is-active", isActive);
            item.setAttribute("aria-pressed", String(isActive));
        });
    };

    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener("click", () => showPhoto(index));
    });

    document.querySelector(".gallery-arrow--previous")?.addEventListener("click", () => {
        showPhoto(activePhoto - 1);
    });
    document.querySelector(".gallery-arrow--next")?.addEventListener("click", () => {
        showPhoto(activePhoto + 1);
    });
}

const activateTab = (tab) => {
    const panelId = tab.getAttribute("aria-controls");
    const panel = panelId ? document.getElementById(panelId) : null;

    if (!panel) {
        throw new Error(`Le panneau associé à l’onglet ${tab.id} est introuvable.`);
    }

    tabs.forEach((item) => {
        const isActive = item === tab;
        item.classList.toggle("is-active", isActive);
        item.setAttribute("aria-selected", String(isActive));
        item.tabIndex = isActive ? 0 : -1;

        const controlledPanel = document.getElementById(item.getAttribute("aria-controls"));
        if (controlledPanel) {
            controlledPanel.hidden = !isActive;
            controlledPanel.classList.toggle("is-active", isActive);
        }
    });
}

tabs.forEach((tab, index) => {
    tab.addEventListener("click", () => activateTab(tab));
    tab.addEventListener("keydown", (event) => {
        let nextIndex;

        if (event.key === "ArrowRight") {
            nextIndex = (index + 1) % tabs.length;
        } else if (event.key === "ArrowLeft") {
            nextIndex = (index - 1 + tabs.length) % tabs.length;
        } else if (event.key === "Home") {
            nextIndex = 0;
        } else if (event.key === "End") {
            nextIndex = tabs.length - 1;
        } else {
            return;
        }

        event.preventDefault();
        tabs[nextIndex].focus();
        activateTab(tabs[nextIndex]);
    });
});
