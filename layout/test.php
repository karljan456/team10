<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Color scheme</title>
		<link rel="stylesheet" href="styles.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>



  <body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
		<div class="topnav" style="background-color: <?php echo $background;?>; border-bottom: 6px solid <?php echo $color;?>">
			<a style="color: <?php echo $color;?>" href="#">Home</a>
			<a style="color: <?php echo $color;?>" href="#">About</a>
			<a style="color: <?php echo $color;?>" href="#">Contact</a>
			<a style="color: <?php echo $color;?>" href="#">YouTube</a>
		</div>

		<div style="padding: 0 26px">
			<h2>Color scheme switch using cookies (JavaScript)</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu pellentesque orci. Curabitur vel luctus dolor. Duis eu nisl sed mi pharetra iaculis. Maecenas nec lorem ac felis congue lobortis. Suspendisse imperdiet non ligula in hendrerit. Fusce bibendum mollis leo ut laoreet. Proin iaculis dolor commodo mi interdum auctor. Nam vehicula posuere elementum. Mauris ex lacus, sollicitudin et varius quis, dignissim ut velit.</p>
			<p>In dolor ante, accumsan vitae iaculis a, sollicitudin id lorem. Vestibulum tincidunt, sem eget condimentum pretium, lacus leo rutrum justo, non vestibulum ex justo ac erat. Sed non lacinia lorem. Praesent placerat nisl in orci efficitur venenatis. Donec vel odio vestibulum, fermentum sem vitae, ullamcorper turpis. Vivamus a purus sem. Suspendisse imperdiet lacinia elit, eget semper metus. Curabitur eleifend posuere ipsum eu iaculis. Suspendisse risus tortor, sollicitudin sed sem a, efficitur vulputate leo. Nam rutrum maximus neque, a sagittis libero gravida quis. Fusce sodales lacus ut mauris bibendum, nec blandit diam pulvinar. Aenean interdum nisl urna, eu viverra eros congue vulputate.</p>
			<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi aliquam nulla ut mauris congue, sed vulputate sem volutpat. Donec consectetur quam sit amet interdum pulvinar. Aenean pulvinar egestas massa, non finibus ligula finibus eu. Ut et ante at diam tempus tempus luctus eleifend sapien. Duis vel nibh bibendum, scelerisque odio mattis, lacinia dui. Etiam vel risus cursus, dignissim dui sed, iaculis magna. Integer in nibh tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut quis augue ut nulla pellentesque ultrices. Curabitur scelerisque dui non ante maximus, ut ornare erat suscipit.</p>
			<p>Pellentesque nec enim nec orci volutpat tincidunt egestas et erat. Ut interdum massa sit amet accumsan imperdiet. Quisque neque ante, blandit eget tellus non, molestie porta ipsum. Fusce scelerisque eleifend tellus vitae vehicula. Nam ac mollis ante, nec porta felis. Nunc efficitur, purus ac molestie aliquet, ligula metus tempor lectus, at efficitur eros ligula id nulla. Proin diam odio, vestibulum sit amet varius nec, fermentum eget mi. Sed efficitur, lacus non volutpat elementum, erat eros egestas erat, at suscipit turpis massa id nisl. Fusce rhoncus sapien ac blandit maximus.</p>
			<p>Proin eu commodo eros, pellentesque vulputate magna. Nulla vel leo sem. Nulla maximus, felis nec auctor condimentum, lectus arcu facilisis dui, nec ultricies justo dui eget arcu. Quisque vel facilisis libero. Donec venenatis metus id dui blandit, ut sagittis eros rutrum. Aliquam erat volutpat. Suspendisse ut augue quis erat blandit pellentesque in vel sem. Maecenas eu semper sem, sed laoreet metus. Quisque lacus magna, congue eget ante ac, molestie elementum urna. Integer rhoncus varius lectus vitae pulvinar. Donec non volutpat odio. In sed tempor erat.</p>
			<p>
				<label class="switch">
					<input type="checkbox" id="toggleTheme" <?php if(isset($_COOKIE["theme"]) == "dark") { echo "checked"; }?>>
					<span class="slider round"></span>
				</label>
			</p>
		</div>

		<script>
			$("#toggleTheme").on('change', function() {
				if($(this).is(':checked')) {
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