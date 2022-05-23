<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">
                    The design of our site comes in the context of enhancing readers’ abilities to acquire knowledge, which is the solid basis for social change and development and modernization events. Reading through its multiple means plays a key tool in acquiring knowledge along with the various methods of teaching and learning. Hence, our site provides an appropriate environment to encourage reading and access and production of knowledge through We suggest books that are suitable for all age groups and books similar to the books you want, and know the true opinions about the book from other readers.
                </p>
            </div>

            <div class="col-xs-6 col-md-3"style="text-align: left;">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                    <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                    <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                    <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                    <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                    <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3" style="text-align: left;">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="http://scanfcode.com/about/">About Us</a></li>
                    <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                    <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                    <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                    <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset("assets/js/user/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/user/browser.min.js")}}"></script>
<script src="{{asset("assets/js/user/breakpoints.min.js")}}"></script>
<script src="{{asset("assets/js/user/util.js")}}"></script>
<script src="{{asset("assets/js/user/main.js")}}"></script>

<!-- Page specific javascripts-->

@hasSection("scripts")
    @yield("scripts")
@endif
