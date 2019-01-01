var gallery;
var lastSearch;
var loadingBar;

window.addEventListener('load', function() {
    var galleryElement = document.getElementById('gallery');
    var photoswipeElement = document.getElementsByClassName('pswp')[0];
    var scrollableElement = document.getElementById('body');
    loadingBar = document.getElementById('loadingBar');

    // Create gallery
    gallery = getGallery(galleryElement, photoswipeElement, scrollableElement);

    gallery.addEventListener('activate', function(ev) {
        console.log('activate', ev.detail);
    });

    gallery.addEventListener('item-displayed', function(ev) {
        console.log('item-displayed', ev.detail);
    });

    gallery.addEventListener('item-added-to-dom', function(ev) {
        console.log('item-added-to-dom', ev.detail);
    });

    gallery.addEventListener('zoom', function(ev) {
        console.log('zoom', ev.detail);
    });

    gallery.addEventListener('select', function(ev) {
        console.log('select', ev.detail);
    });

    getImages();
});


function getImages(url) {

    if (!url) {
        url = 'images.php';
    }

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);

    loadingBar.classList.add('loading');
    xhr.addEventListener('readystatechange', function() {

        var limit = xhr.getResponseHeader('x-ratelimit-remaining');
        if (xhr.readyState === 4) {
            loadingBar.classList.remove('loading');
        }

        if (xhr.readyState === 4 && xhr.status === 200) {

            var results = JSON.parse(xhr.responseText).results;

            var items = results.map(function(i) {
                return {
                    thumbnailSrc: i.urls.small,
                    enlargedSrc: i.urls.regular,
                    enlargedWidth: i.width,
                    enlargedHeight: i.height,
                    title: i.description ? i.description : i.user.name,
                    color: i.color
                };
            });

            gallery.addItems(items);
        }
    });

    xhr.send(null);
}
