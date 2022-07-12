@extends('layout.master')

@section('content')

<div class="container panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Basic Information
        </h3>
        <p>Category Id : {!! $category->id !!}</p>
        <p>title : {!! $category->title !!}</p>
        
        <p>Slug : {!! $category->slug !!}</p>
    </div>
</div>

@stop