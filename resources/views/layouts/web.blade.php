<!DOCTYPE html>
<html lang="en">

<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/bootstrap4/bootstrap.min.css">
    <link href="/assets/frontEnd/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/frontEnd/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontEnd/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontEnd/plugins/OwlCarousel2-2.2.1/animate.css">
    @yield('link')
</head>

<body>
    <div class="super_container">
        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- Currency / Language / My Account -->

                                    {{-- <li class="currency">
                                        <a href="#">
                                            usd
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="currency_selection">
                                            <li><a href="#">cad</a></li>
                                            <li><a href="#">aud</a></li>
                                            <li><a href="#">eur</a></li>
                                            <li><a href="#">gbp</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li> --}}
                                    <li class="account">
                                        <a href="#">
                                            My Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            @guest
                                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"
                                                        aria-hidden="true"></i>Sign In</a></li>
                                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"
                                                        aria-hidden="true"></i>Register</a></li>
                                            @else
                                            <li>
                                                @if (auth()->user()->isAdmin())
                                                <a href="{{ route('admin.dashboard') }}">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    Dash
                                                </a>
                                                @else
                                                <a href="{{ route('user.dashboard') }}">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    Dash
                                                </a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                        class="fa fa-user-plus" aria-hidden="true"></i>
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                            @endguest
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="#">colo<span>shop</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="/">home</a></li>
                                    <li><a href="#">shop</a></li>
                                    <li><a href="#">promotion</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Dropdown
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    {{-- <li>
                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                    </li> --}}
                                    <li class="checkout">
                                        <a href="{{ route('user.cart.index') }}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            @if (session()->get('cart'))
                                            <span id="checkout_items"
                                                class="checkout_items">{{ session()->get('cart') }}</span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div class="fs_menu_overlay"></div>
        <div class="hamburger_menu">
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    {{-- <li class="menu_item has-children">
					<a href="#">
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li> --}}
                    {{-- <li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li> --}}
                    <li class="menu_item has-children">
                        <a href="#">
                            My Account
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="menu_selection">
                            @guest
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign
                                    In</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"
                                        aria-hidden="true"></i>Register</a></li>
                            @else
                    </li>
                    @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Dash
                    </a>
                    @else
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Dash
                    </a>
                    @endif
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fa fa-user-plus" aria-hidden="true"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">shop</a></li>
                <li class="menu_item"><a href="#">promotion</a></li>
                <li class="menu_item"><a href="#">pages</a></li>
                <li class="menu_item"><a href="#">blog</a></li>
                <li class="menu_item"><a href="#">contact</a></li>
                </ul>
            </div>
        </div>

        {{-- Content --}}
        @yield('content')

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div
                            class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                            <ul class="footer_nav">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div
                            class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_nav_container">
                            <div class="cr">©2018 All Rights Reserverd. This template is made with <i
                                    class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="/assets/frontEnd/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/frontEnd/styles/bootstrap4/popper.js"></script>
    <script src="/assets/frontEnd/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/assets/frontEnd/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/frontEnd/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/assets/frontEnd/plugins/easing/easing.js"></script>
    <script src="/assets/frontEnd/js/custom.js"></script>

    <script src="/assets/frontEnd/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="/assets/frontEnd/js/single_custom.js"></script>
</body>

</html>