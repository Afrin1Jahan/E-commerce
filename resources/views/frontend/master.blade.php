
<!DOCTYPE html>
<html>
<head>
<title>
    @yield('page_title')
</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
@notifyCss

  @include('frontend.includes.style')
</head>

<body>
<!-- header -->
@include('frontend.includes.header')
@include('notify::components.notify')

<!-- //header -->
<!-- banner -->
@yield('content')
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			 <!-- <div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>  -->
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
	@include('frontend.includes.footer')
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->

      @include('frontend.includes.script')
	  @notifyJs
</body>
</html>
