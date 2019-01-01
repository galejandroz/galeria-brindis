<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Brindis 2018</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assets/natural-gallery-js/natural-gallery.full.css">
        <link rel="stylesheet" href="assets/natural-gallery-js/themes/natural.css">
        <script src="assets/natural-gallery-js/natural-gallery.full.js" defer></script>

        <link rel="stylesheet" href="assets/main.css">
    
    </head>
    <body class="layout-column" style="background-image:url(assets/bg.jpg)">

        <div id="loadingBar"></div>

        <div class="flex layout-row stretch">
            
            <main aria-label="Content" class="flex" id="body">
                <script>
                    var options = {
                        columnWidth: 300,
                        gap: 5,
                        lightbox: true,
                    };
                    var optionsNatural = {
                        rowHeight: 300,
                        lightbox: true,
                    };
                    function getGallery(galleryElement, photoswipeElement, scrollableElement) {
                        return new NaturalGallery.Natural(galleryElement, optionsNatural, photoswipeElement, scrollableElement)
                    }
                </script>

                <script src="assets/main.js" defer></script>

                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="pswp__bg"></div>
                    <div class="pswp__scroll-wrap">
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>
                        <div class="pswp__ui pswp__ui--hidden">
                            <div class="pswp__top-bar">
                                <div class="pswp__counter"></div>
                                <button class="pswp__button pswp__button--close" title="Cerrar (Esc)"></button>
                                <button class="pswp__button pswp__button--fs" title="Cambiar a pantalla completa"></button>
                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                            </div>
                            <button class="pswp__button pswp__button--arrow--left" title="Anterior (flecha izq)"></button>
                            <button class="pswp__button pswp__button--arrow--right" title="Próxima (flecha der)"></button>
                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" xml:space="preserve" style="display:none;">
                    <g id="natural-gallery-icon-select"><path d="M50,0C22.4,0,0,22.4,0,50c0,27.6,22.4,50,50,50c27.6,0,50-22.4,50-50C100,22.4,77.6,0,50,0z M40,75L15,50l7.1-7.1L40,60.8l37.9-37.9L85,30L40,75z"/></g>
                    <g id="natural-gallery-icon-next"><polygon points="88.126,24.216 50.036,62.306 11.947,24.216 0.355,35.809 50.036,85.49 99.718,35.809 		"/></g>
                </svg>


                <div class="row margin-v" id="header">
                    <div class="container-1000px small-gap layout-column">
                        <div class="layout-row align-start">
                            <div class="big-logo">
                                <img src="assets/logo.png" class="logo" >
                            </div>
                        </div>
                        <div id="rateExpired" class="hide">
                            <h4>La consulta ha caducado</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container-90perc">
                        <div id="gallery"></div>
                    </div>
                </div>

            </main>
        </div>

    </body>

</html>
