<link rel="stylesheet" href="styles.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>





    <div style="padding: 0 26px">
        <h2>Color scheme switch using cookies (JavaScript)</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu pellentesque orci. Curabitur vel luctus
            dolor. Duis eu nisl sed mi pharetra iaculis. Maecenas nec lorem ac felis congue lobortis. Suspendisse
            imperdiet non ligula in hendrerit. Fusce bibendum mollis leo ut laoreet. Proin iaculis dolor commodo mi
            interdum auctor. Nam vehicula posuere elementum. Mauris ex lacus, sollicitudin et varius quis, dignissim ut
            velit.</p>
        <p>In dolor ante, accumsan vitae iaculis a, sollicitudin id lorem. Vestibulum tincidunt, sem eget condimentum
            pretium, lacus leo rutrum justo, non vestibulum ex justo ac erat. Sed non lacinia lorem. Praesent placerat
            nisl in orci efficitur venenatis. Donec vel odio vestibulum, fermentum sem vitae, ullamcorper turpis.
            Vivamus a purus sem. Suspendisse imperdiet lacinia elit, eget semper metus. Curabitur eleifend posuere ipsum
            eu iaculis. Suspendisse risus tortor, sollicitudin sed sem a, efficitur vulputate leo. Nam rutrum maximus
            neque, a sagittis libero gravida quis. Fusce sodales lacus ut mauris bibendum, nec blandit diam pulvinar.
            Aenean interdum nisl urna, eu viverra eros congue vulputate.</p>

            <label class="switch">
                <input type="checkbox" id="toggleTheme" <?php if ($_COOKIE["theme"] == "dark") {
                    echo "checked";
                } ?>>
                <span class="slider round"></span>
            </label>
        </p>
    </div>

    <script>
        $("#toggleTheme").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                document.cookie = "theme=dark";
                location.reload();
            } else {
                $(this).attr('value', 'false');
                document.cookie = 'theme=; Max-Age=0';
                location.reload();
            }
        });
    </script>
</body>

</html>