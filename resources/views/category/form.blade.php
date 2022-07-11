@extends('layout.master')

@section('content')


{!! Form::model($category, [
    'method' => $category->exists ? 'PUT' : 'POST',
    'action' => $category->exists ?
        ['CategoryController@update', $category->id] : 'CategoryController@store',
    'class' => 'form-horizontal bordered-row',
    'autocomplete' => 'off',
    'id' => 'moduleForm',
    'data-parsley-validate' => "",
    'files' => true,
]) !!}

<div class="container panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Basic Information
        </h3>
        <div class="example-box-wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group">
                        <div class="fm-label">
                            <label>Title</label>
                        </div>

                        <div class="fm-control">
                            {!! Form::text('title', null, [
                                'class' => "form-control",
                                'placeholder' => "Title",
                                'required' => true,
                            ]) !!}
                        </div>
                    </div>   


                    <div class="form-group">
                        <div class="fm-label">
                            <label>Category</label>
                        </div>

                        <div class="fm-control">
                        {!! Form::select('category_id', ['0' => 'Self'] + $categorySelect,
                            null, [
                                'class' => "form-control chosen-select",
                                'required' => true,
                                'data-parsley-required-message' => "Please select Category.",
                                'data-parsley-errors-container'=> "#product_category_err",
                                'id' => "product_category",
                            ]) !!}
                        </div>
                    </div> 


                    <div class="form-group">
                        <div class="fm-label">
                            <label>Slug</label>
                        </div>

                        <div class="fm-control">
                            {!! Form::text('slug', null, [
                                'class' => "form-control",
                                'placeholder' => "Slug",
                                'required' => true,
                            ]) !!}
                        </div>
                    </div> 


                </div>    
            </div>
        </div>        

    </div>
</div>  
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-6 fm-submit">
                <button type="submit" class="btn loading-button btn-primary">Submit</button>
            </div>
            <div class="col-xs-6 fm-cancel text-right">
                <a href="{{ action('CategoryController@index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@stop