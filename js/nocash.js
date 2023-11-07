function cutText(text, lengthToCut) {
    if (text.length <= lengthToCut) {
        return text;
    } else {
        return text.substring(0, lengthToCut) + "...";
    }
}

let scriptUrls = [
    "https://widget.nokash.app/assets/plugins/dls/js/dl.min.js",
    "https://widget.nokash.app/assets/plugins/jbox/jBox.min.js"
];



let scriptJQ = ["https://widget.nokash.app/assets/admin/js/jquery.min.js"];
let scriptwg = ["https://widget.nokash.app/app/views/Widget/js/wg.min.js"];
const cssUrls = [
    // "https://widget.nokash.app/app/views/Widget/css/style.min.css",
    "https://widget.nokash.app/assets/plugins/jbox/jBox.min.css",
    "https://widget.nokash.app/assets/plugins/dls/css/dl.css",
    "https://widget.nokash.app/assets/css/styles/gradual.min.css",
];
function isjQueryLoaded() {
    return (typeof jQuery !== "undefined");
}

function loadScriptAsync(url) {
    return new Promise((resolve, reject) => {
        let script = document.createElement("script");
        script.src = url;
        script.async = true;
        script.onload = resolve;
        script.onerror = reject;
        document.body.appendChild(script);
    });
}

function loadCSSAsync(urls) {
    return Promise.all(
        urls.map(url => {
            return new Promise((resolve, reject) => {
                const link = document.createElement("link");
                link.rel = "stylesheet";
                link.href = url;
                link.onload = resolve;
                link.onerror = reject;
                document.head.appendChild(link);
            });
        })
    );
}

window.addEventListener("load", function() {
    // Votre code ici qui utilise document.body
    if (isjQueryLoaded()){
        console.log("datas",jQuery)
    }
    Promise.all(scriptJQ.map(loadScriptAsync))
        .then(() => {
            // Code Ã  exÃ©cuter une fois que tous les scripts sont chargÃ©s
            console.log("Chargement jquery 01 ok !");
            Promise.all(scriptUrls.map(loadScriptAsync))
                .then(() => {
                    // Code Ã  exÃ©cuter une fois que tous les scripts sont chargÃ©s
                    console.log("Chargement de script 01 ok !");
                    Promise.all(scriptwg.map(loadScriptAsync))
                        .then(() => {
                            // Code Ã  exÃ©cuter une fois que tous les scripts sont chargÃ©s
                            console.log("Chargement de script 02 ok !");
                        })
                        .catch(error => {
                            // Gestion des erreurs
                            console.log("Erreur lors du chargement des scripts :", error);
                        });
                    console.log("Tous les scripts sont chargÃ©s !");
                })
                .catch(error => {
                    // Gestion des erreurs
                    console.log("Erreur lors du chargement des scripts :", error);
                });
        })
        .catch(error => {
            // Gestion des erreurs
            console.log("Erreur lors du chargement des scripts :", error);
        });

    loadCSSAsync(cssUrls)
        .then(() => {
            console.log("Les fichiers CSS ont Ã©tÃ© chargÃ©s avec succÃ¨s !");
        })
        .catch(error => {
            console.error("Erreur lors du chargement des fichiers CSS :", error);
        });
});