@php ($ids = [])
  @foreach($category as $child)
    @php (array_push($ids,$child->slug))
    @if($child->child()->count())
      <li>
        <span><a href="{!! route('page-category',implode('/',$ids)) !!}">{{$child->title}}</a></span>
        <ul>
            @include('category.category',['category' => $child->child()->get()])
        </ul>
      </li>
    @else
       <li >
         <a href="{!! route('page-category',implode('/',$ids)) !!}">{{$child->title}}</a>
       </li>
    @endif
  @endforeach
