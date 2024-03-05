<!-- Vendor JS Files -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/easing/easing.min.js')}}"></script>
<script src="{{asset('vendor/superfish/superfish.min.js')}}"></script>
<script src="{{asset('vendor/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('vendor/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
<script src="{{asset('vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('vendor/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/lightbox/js/lightbox.min.js')}}"></script>

{{--Main JavaScript file--}}
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/scrolls.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script>
    AOS.init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.nav-menu li a');

        function setActiveLink() {
            const scrollPosition = window.scrollY;

            // Iterate through each section and check if it's in view
            links.forEach((link) => {
                const section = link.getAttribute('href').replace('#', '');
                const targetElement = document.querySelector('.' + section);

                if (targetElement) {
                    const sectionTop = targetElement.offsetTop;
                    const sectionBottom = sectionTop + targetElement.offsetHeight;

                    if(scrollPosition >= sectionTop && scrollPosition < sectionBottom - window.innerHeight / 2){
                        // Remove 'menu-active' class from all links
                        links.forEach((otherLink) => {
                            otherLink.parentElement.classList.remove('menu-active');
                        });

                        // Add 'menu-active' class to the link corresponding to the active section
                        link.parentElement.classList.add('menu-active');
                    }
                }
            });
        }

        links.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Scroll to the section using scrolls.js or your preferred method
                const section = link.getAttribute('href').replace('#', '');
                scrolls('.' + section);
            });
        });

        // Add 'menu-active' class to the first link on page load
        links[0].parentElement.classList.add('menu-active');

        // Add event listener for scrolling
        window.addEventListener('scroll', setActiveLink);
    });
</script>
{{--<script>--}}
{{--    const observer = new IntersectionObserver((entries)=>{--}}
{{--        entries.forEach((entry)=>{--}}
{{--            if(entry.isIntersecting){--}}
{{--                entry.target.classList.add('show');--}}
{{--            }else{--}}
{{--                entry.target.classList.remove('show');--}}
{{--            }--}}
{{--        })--}}
{{--    })--}}
{{--    const hiddenElements = document.querySelectorAll('.hidden');--}}
{{--    hiddenElements.forEach((el) => observer.observe(el));--}}
{{--</script>--}}

</body>
</html>
