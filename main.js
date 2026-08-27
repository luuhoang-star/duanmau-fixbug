var album = [];
for (var i = 0; i < 5; i++) {
    album[i] = new Image();
    album[i].src = "./img/anh" + i + ".jpg";
}

var index = 0;
var interval = setInterval(slideshow, 3000);

function slideshow() {
    index++;
    if (index >= 5) {
        index = 0;
    }
    updateBanner();
}

function next() {
    index++;
    if (index >= 5) {
        index = 0;
    }
    updateBanner();
}

function pre() {
    index--;
    if (index < 0) {
        index = 4;
    }
    updateBanner();
}

function updateBanner() {
    var bannerEl = document.getElementById("banner");
    if (bannerEl && album[index]) {
        bannerEl.src = album[index].src;
    }
}