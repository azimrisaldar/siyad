@extends('layout.master')

@section('content')

<div class="container panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Categories
        </h3>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <a class="btn btn-default" href="{{ action('CategoryController@create') }}">ADD Category</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Parent</th>
                    <th>Slug</th>
                    <th>action</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id  }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ is_null($category->parent) ? 'parent' : $category->parent->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <th>
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="{{ action('CategoryController@edit', $category->id) }}" class="btn btn-default">Edit</a>
                        </div>
                        </th>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop