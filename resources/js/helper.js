document.addEventListener("alpine:init", () => {
    Alpine.data("helper", (initIcons = null) => ({
        open: false,
        search: "",
        icons: JSON.parse(initIcons),
        filteredIcons() {
            return this.icons.filter((icon) =>
                icon.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        copyIcon(icon, type) {
            let copyText =
                '<x-heroicon::icon type="' +
                type +
                '" icon="' +
                icon +
                '" class="w-6 h-6" />';

            navigator.clipboard.writeText(copyText).then(() => {
                // Alert the user that the action took place.
                // Nobody likes hidden stuff being done under the hood!
                // alert("Copied to clipboard");
            });
            this.open = false;
        },
        init() {
            console.log("Helper");
            console.log(this.icons);
        },
    }));
});
