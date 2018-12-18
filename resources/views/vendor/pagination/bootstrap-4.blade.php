@if ($paginator->hasPages())
<div class="col-md-12 text-center">
	<div class="site-block-27">
		<ul>
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li aria-label="@lang('pagination.previous')">
					<a href="#">&lt;</a>
				</li>
			@else
				<li>
					<a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">&lt;</a>
				</li>
			@endif

			{{-- Pagination Elements --}}
			@foreach ($elements as $element)
				{{-- "Three Dots" Separator --}}
				@if (is_string($element))
					<li><span>{{ $element }}</span></li>
				@endif

				{{-- Array Of Links --}}
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							<li class="active" aria-current="page"><span>{{ $page }}</span></li>
						@else
							<li class=""><a href="{{ $url }}">{{ $page }}</a></li>
						@endif
					@endforeach
				@endif
			@endforeach

			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<li>
					<a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">&gt;</a>
				</li>
			@else
				<li aria-label="@lang('pagination.next')">
					<a href="#">&gt;</a>
				</li>
			@endif
		</ul>
	</div>
</div>
@endif