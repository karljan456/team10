</div><!--closing content container-->
<!--####################### FOOTER BEGINS HERE########################-->
<div class="footer-wrapper w-100">
    <!-- FOOTER BEGINS HERE-->
    <footer>
        <div class="container text-center mw-100">



            <div class="row footer-row-2 ">
                <div class="col col-md-12">
                    <span class="social-icon">
                        <a href="https://www.facebook.com/LiverpoolFC/">
                            <img src="media/facebook.svg" width="20" alt="facebook"></a>

                    </span>
                    <span class="social-icon">
                        <a href="https://www.instagram.com/liverpoolfc/?hl=en"><img src="media/instagram.svg" width="20"
                                alt="instagram"></a>

                    </span>
                    <span class="social-icon">
                        <a href="https://twitter.com/LFC?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img
                                src="media/twitter.svg" width="20" alt="twitter"></a>

                    </span>
                    <span class="social-icon">
                        <a href="https://uk.linkedin.com/company/liverpool-football-club"><img src="media/linkedin.svg"
                                width="20" alt="linkedin"></a>

                    </span>
                </div>

                <div class="col col-md-12">
                    This is the awesome fan blog of the Liverpool FC
                </div>
            </div>
            <div class="row footer-row-3">
                <div class=" col-md-6 order-2 order-md-1 float-left" id="last-modified">
                    &copy; Copyright 2023 - Liverpool Fan Club - All Rights Reserved.
                </div>
                <div class="col-md-6 order-1 order-md-1 float-right">
                    Sitemap - Privacy Policy - Terms & Conditions - About
                </div>
                <div class="col-12 order-3 mt-3">
                    <?php
                    $filename = basename($_SERVER['PHP_SELF']);
                    echo "The file $filename was last modified: " . date("F d Y H:i:s.", filemtime($filename));
                    ?>
                </div>
            </div>
        </div>


    </footer>
    <!--FOOTER ENDS HERE-->
</div>

</body>

</html>