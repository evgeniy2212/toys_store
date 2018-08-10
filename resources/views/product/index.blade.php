@extends('layouts.app')

@section('content')
<div class="container">
    @include('navigation')
    <div class="row">
        <p>
            <a href="{{ route('products.create') }}" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Add
            </a>
        </p>
        <h1>Products</h1>
    </div>
    {{ Form::open(array('url'    => 'sort_by_category',
                        'before' => 'csrf')) }}
        <div class="form-group row">
            <div class="col-xs-4">
            {{ Form::select('category', $category, '', array('class' => 'form-control')) }}
            </div>
            <div class="col-xs-4">
            {{ Form::submit('Find',array('class' => 'btn btn-success pull-left') ) }}
            </div>
        </div>
    {{ Form::close() }}
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>articul</th>
                <th>purchase_price</th>
                <th>selling_price</th>
                <th>discount</th>
                <th>category</th>
                <th>short_description</th>
                <th>description</th>
                <th>image</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><a href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a></td>
                    <td>{{ $product->articul }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->cat_name }}</td>
                    <td>{{ $product->short_description }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->image }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{ $products->links() }}--}}
    </div>
</div>
@endsection
