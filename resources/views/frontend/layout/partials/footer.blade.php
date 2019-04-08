<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-5 -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
    <div class="c-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="c-container c-first">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">
                                KURS<span class="c-theme-font">EVI</span>
                            </h3>
                            <div class="c-line-left hide"></div>
                        </div>
                        <ul class="c-links">
                            
                            @if( count($kurseviFooter) >0 ) 
                              @foreach($kurseviFooter as $kurs)
                                 @if(count($kurs->pages) >0)
                                    @foreach($kurs->pages as $kurs2)
                                    <li>
                                        <a href="{{ route( 'pages.show', ['page' => $kurs2->id, 'slug' => Str::slug($kurs2->title, '-') ] ) }}">{{ $kurs2->title }}</a>
                                    </li>
                                    @endforeach
                                 @endif()
                                 
                              @endforeach
                            @endif
                            
                           
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Latest Posts</h3>
                            <div class="c-line-left hide"></div>
                        </div>
                        <div class="c-blog">
                            <div class="c-post">
                                <div class="c-post-img">
                                    <img src="/frontend/assets/base/img/content/stock/9.jpg" alt="" class="img-responsive" />
                                </div>
                                <div class="c-post-content">
                                    <h4 class="c-post-title">
                                        <a href="#">Ready to Launch</a>
                                    </h4>
                                    <p class="c-text">Lorem ipsum dolor sit amet ipsum sit, consectetuer adipiscing elit sit amet</p>
                                </div>
                            </div>
                            <div class="c-post c-last">
                                <div class="c-post-img">
                                    <img src="/frontend/assets/base/img/content/stock/14.jpg" alt="" class="img-responsive" />
                                </div>
                                <div class="c-post-content">
                                    <h4 class="c-post-title">
                                        <a href="#">Dedicated Support</a>
                                    </h4>
                                    <p class="c-text">Lorem ipsum dolor ipsum sit ipsum amet, consectetuer sit adipiscing elit ipsum elit elit ipsum elit</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-md c-btn-border-1x c-theme-btn c-btn-uppercase c-btn-square c-btn-bold c-read-more hide">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Latest Works</h3>
                            <div class="c-line-left hide"></div>
                        </div>
                        <ul class="c-works">
                            <li class="c-first">
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/015.jpg" alt="" class="img-responsive" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/012.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                            <li class="c-last">
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/12.jpg" alt="" class="img-responsive" />
                                </a>
                            </li>
                        </ul>
                        <ul class="c-works">
                            <li class="c-first">
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/014.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/011.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                            <li class="c-last">
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/15.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                        </ul>
                        <ul class="c-works">
                            <li class="c-first">
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/015.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/013.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                            <li class="c-last">
                                <a href="#">
                                    <img src="/frontend/assets/base/img/content/stock/13.jpg" class="img-responsive" alt="" />
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-md c-btn-border-1x c-theme-btn c-btn-uppercase c-btn-square c-btn-bold c-read-more hide">View More</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container c-last">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Find us</h3>
                            <div class="c-line-left hide"></div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed elit diam nonummy ad minim.</p>
                        </div>
                        <ul class="c-socials">
                            <li>
                                <a href="#">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-social-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-social-tumblr"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="c-address">
                            <li>
                                <i class="icon-pointer c-theme-font"></i> One Boulevard, Beverly Hills</li>
                            <li>
                                <i class="icon-call-end c-theme-font"></i> +1800 1234 5678</li>
                            <li>
                                <i class="icon-envelope c-theme-font"></i> email@example.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-postfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 c-col">
                    <p class="c-copyright c-font-grey">2015 &copy; JANGO
                        <span class="c-font-grey-3">All Rights Reserved.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
<!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END: LAYOUT/FOOTERS/GO2TOP -->
<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/frontend/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/jquery.easing.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/reveal-animate/wow.js" type="text/javascript"></script>
<script src="/frontend/assets/base/js/scripts/reveal-animate/reveal-animate.js" type="text/javascript"></script>
<!-- END: CORE PLUGINS -->
<!-- BEGIN: LAYOUT PLUGINS -->
<script src="/frontend/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/smooth-scroll/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="/frontend/assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="/frontend/assets/base/js/components.js" type="text/javascript"></script>
<script src="/frontend/assets/base/js/components-shop.js" type="text/javascript"></script>
<script src="/frontend/assets/base/js/app.js" type="text/javascript"></script>
<script>
   $(document).ready(function ()
   {
       App.init(); // init core    
   });
</script>
<!-- END: THEME SCRIPTS -->
<!-- END: LAYOUT/BASE/BOTTOM -->
