@extends('layouts.app')

@section('content')
<div class="container">
    @include('navigation');
    <div class="row">
        <h1>Products</h1>
    </div>
    <div class="row">

        <div class="col-xs-6">
        {{ Form::open(array('url'   => (isset($product) ? route('products.update', $product->id) :  route('products.store')),
                            'action' => array( isset($product) ? 'ProductController@update' : 'ProductController@store'),
                            'files' => true,
                            'before' => 'csrf',
                            )) }}
            {{ method_field(isset($product) ? 'PATCH' : 'POST') }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', isset($product) ? $product->name : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('articul', 'Articul') }}
                {{ Form::text('articul', isset($product) ? $product->articul : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('purchase_price', 'Purchase price') }}
                {{ Form::text('purchase_price', isset($product) ? $product->purchase_price : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('selling_price', 'Selling price') }}
                {{ Form::text('selling_price', isset($product) ? $product->selling_price : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('discount', 'Discount') }}
                {{ Form::number('discount', isset($product) ? $product->discount : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('category_id', 'Category') }}
                {{ Form::select('category_id', $category, isset($product) ? $product->category_id : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('short_description', 'Short description') }}
                {{ Form::text('short_description', isset($product) ? $product->short_description : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', isset($product) ? $product->description : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('site', 'Site') }}
                {{ Form::text('site', isset($product) ? $product->description : '', array('class' => 'form-control')) }}<br>
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image') }}
            </div>
            {{ Form::submit('Save',array('class' => 'btn btn-success pull-right') ) }}
        {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
