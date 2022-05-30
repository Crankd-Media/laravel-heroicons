document.addEventListener("alpine:init", () => {
    Alpine.data("helper", (initIcons = null) => ({
        open: false,
        search: "",
        icons: JSON.parse(initIcons),
        filteredIcons() {
            if (this.search == "") {
                return this.icons;
            }
            return this.icons.filter((icon) =>
                icon.name.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        copyIcon(icon, type) {
            let copyText =
                '<x-heroicon::icon type="' +
                type +
                '" icon="' +
                icon.name +
                '" class="w-6 h-6" />';

            navigator.clipboard.writeText(copyText).then(() => {
                // Alert the user that the action took place.
                // Nobody likes hidden stuff being done under the hood!
                // alert("Copied to clipboard");
            });
            this.open = false;
        },
    }));
});
