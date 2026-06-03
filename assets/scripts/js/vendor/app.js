jQuery(document).ready(function($) {
    $(document).foundation();
    $(document)
        .on("opened.zf.offCanvas", function() {
            $(".hamburger").addClass("is-active");
        })
        .on("closed.zf.offCanvas", function() {
            $(".hamburger").removeClass("is-active");
        });
});

jQuery(document).ready(function($) {
    $('.hamburger--elastic').on('click', function() {
        const isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
        $('#off-canvas').attr('aria-hidden', isExpanded);
    });
    $('.close-button').on('click', function() {
        $('.hamburger--elastic').attr('aria-expanded', 'false');
        $('#off-canvas').attr('aria-hidden', 'true');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.testimonial-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
        },
    });
});

var theme = {
    /**
     * Theme's components/functions list
     * Comment out or delete the unnecessary component.
     * Some components have dependencies (plugins).
     * Do not forget to remove dependency from src/js/vendor/ and recompile.
     */
    init: function () {
        theme.backgroundImage();
        theme.pageProgress();
    },

    /**
     * Background Image
     * Adds a background image link via data attribute "data-image-src"
     */
    backgroundImage: () => {
        var bg = document.querySelectorAll(".bg-image");
        for(var i = 0; i < bg.length; i++) {
            var url = bg[i].getAttribute('data-image-src');
            bg[i].style.backgroundImage = "url('" + url + "')";
        }
    },

    /**
     * Page Progress
     * Shows page progress on the bottom right corner of pages
     */
    pageProgress: () => {
        var progressWrap = document.querySelector('.progress-wrap');
        if (progressWrap != null) {
            var progressPath = document.querySelector('.progress-wrap path');
            var pathLength = progressPath.getTotalLength();
            var offset = 50;
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
            window.addEventListener("scroll", function (event) {
                var scroll = document.body.scrollTop || document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
                var scrollElementPos = document.body.scrollTop || document.documentElement.scrollTop;
                if (scrollElementPos >= offset) {
                    progressWrap.classList.add("active-progress")
                } else {
                    progressWrap.classList.remove("active-progress")
                }
            });
            progressWrap.addEventListener('click', function (e) {
                e.preventDefault();
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            });
        }
    },
}
theme.init();

// make active page obvious from navigation
document.querySelectorAll('.nav-item a').forEach(link => {
    if(link.href === window.location.href){
        link.setAttribute('aria-current', 'page')
    }
})



//Optimisation - delay form till required
document.addEventListener('DOMContentLoaded', function() {
    // Lazy load Formidable JS
    if (typeof hfxLazyLoad !== 'undefined' && hfxLazyLoad.formidableJsUrl) {
        const contactSection = document.getElementsByClassName('form-content');
        if (contactSection && 'IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const script = document.createElement('script');
                        script.src = hfxLazyLoad.formidableJsUrl;
                        script.async = true;
                        document.body.appendChild(script);
                        observer.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '100px' });
            observer.observe(contactSection);
        } else if (contactSection) {
            const script = document.createElement('script');
            script.src = hfxLazyLoad.formidableJsUrl;
            script.async = true;
            document.body.appendChild(script);
        }
    }
});