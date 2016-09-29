<div class="col-md-3 ">
    <ul class="nav" id="menu">
        <li href="#" class="list-group-item menu1 active">
        	Menu
        </li>
		@foreach($theloai as $item)
		@if(count($item->loaitin)>0)
        <li href="#" class="list-group-item menu1">
        	{{ $item->name }}
        </li>

        <ul>
        	@foreach($item->loaitin as $item_loaitin)
    		<li class="list-group-item">
    			<a href="{{url('loaitin/'.$item_loaitin->id.'/'.$item_loaitin->alias.'.html')}}">{{ $item_loaitin->name }}</a>
    		</li>
    		@endforeach
        </ul>
        @endif
        @endforeach
    </ul>
</div>