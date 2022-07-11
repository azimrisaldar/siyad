@extends('layout.master')

@section('content')


<div class="container panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Categories
        </h3>

        <ul>
        @php ($ids = [])
            @foreach($categories as $category)
                @if($category->child()->count())
                @php ($ids[] = 'page'.$category->id)
                <li><span><a href="{!! route('page-category',implode('/',$ids)) !!}">{{ $category->title }}</a></span>
                    <ul>
                        @include('category.category',['category' => $category->child()->get()])
                    </ul>
                </li>
            @else
                
                <li >
                <a href="{!! route('page-category',implode('/',$ids)) !!}">{!! $category->title !!}</a>
                </li>
            @endif
            @endforeach
        </ul>

        
    </div>
</div>
@stop