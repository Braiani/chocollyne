@foreach($items as $item)
@php
	$listItemClass = [];
	$linkAttributes = null;
	$href = $item->link();
	if(url($href) == url()->current()) {
		array_push($listItemClass, 'active');
	}
	$permission = '';
	$hasChildren = false;
	// With Children Attributes
	if(!$item->children->isEmpty())
	{
		foreach($item->children as $child)
		{
			$hasChildren = true;
			if(url($child->link()) == url()->current())
			{
				array_push($listItemClass, 'active');
			}
		}
		$linkAttributes =  'href="' . url($href) .'"';
		array_push($listItemClass, 'has-children');
	}
	else
	{
		$linkAttributes =  'href="' . url($href) .'"';
	}
@endphp
<li class="{{ implode(" ", $listItemClass) }}">
	<a {!! $linkAttributes !!} target="{{ $item->target }}">{{ $item->title }}</a>
	@if ($hasChildren)
	<ul class="dropdown">
		@include('layouts.custom-menu', ['items' => $item->children, 'innerLoop' => true])
	</ul>
	@endif
</li>
@endforeach