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
                @php (array_push($ids,$category->slug))
                @if($category->child()->count())
                
                <li><span><a href="{!! route('page-category',implode('/',$ids)) !!}">{{ $category->title }}</a></span>
                    <ul>
                        @include('category.category',['category' => $category->child()->get()])
                    </ul>
                </li>
                
            @else
                
                <li>
                <a href="{!! route('page-category',implode('/',$ids)) !!}">{!! $category->title !!}</a>
                </li>
            @endif
            @endforeach
        </ul>

        
    </div>
</div>
@stop