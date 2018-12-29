<div class="site-navbar-top">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
				<form action="{{ route('product.search') }}" class="site-block-top-search">
				<span class="icon icon-search2"></span>
				<input type="text" name="produto" class="form-control border-0" placeholder="Search">
				</form>
			</div>

			<div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
				<div class="site-logo">
					<a href="{{ route('home') }}" class="js-logo-clone">{{ setting('site.title') }} | @yield('title', 'Início')</a>
				</div>
			</div>

			<div class="col-6 col-md-4 order-3 order-md-3 text-right">
				<div class="site-top-icons">
					<ul>
						<li>
							<a href="{{ route('admin.home') }}"><span class="icon icon-person"></span></a>
							@auth
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();"><span class="icon icon-remove"></span></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
							@endauth
						</li>
						<li>
							<a href="#"><span class="icon icon-heart-o"></span></a>
						</li>
						<li>
						<a href="{{ route('cart') }}" class="site-cart">
							<span class="icon icon-shopping_cart"></span>
							<span class="count">
								@if (Cookie::has(env('APP_NAME') . '_carrinho'))
									{{ json_decode(Cookie::get(env('APP_NAME') . '_carrinho'))->quantidade }}
								@else
									0
								@endif
							</span>
						</a>
						</li> 
						<li class="d-inline-block d-md-none ml-md-0">
							<a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
						</li>
					</ul>
				</div> 
			</div>
		</div>
	</div>
</div>
<nav class="site-navigation text-right text-md-center" role="navigation">
	<div class="container">
		<ul class="site-menu js-clone-nav d-none d-md-block">
			{!! menu('font-end', 'layouts.custom-menu') !!}
		</ul>
	</div>
</nav>