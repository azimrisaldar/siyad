@php ($ids = [])
  @foreach($category as $child)
    @if($child->child()->count())
      @php ($ids[] = 'page'.$child->id)
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
