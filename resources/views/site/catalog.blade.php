@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{ Form::open(array('url'       => '/sort',
                            'before'    => 'csrf',
                            'method'    => 'post',
                            ))
        }}
        <div class="form-group row sort-form">
        <p>{{ Form::label('price', 'Сортировка', ['class' => 'sort-label']) }}</p>
        <div class="col-xs-4">
            {{ Form::select('price', array('Big' => 'По возрастанию', 'Low' => 'По убыванию'), null, ['class' => 'form-control col-xs-4']) }}
        </div>
        <div class="col-xs-1">
            {{ Form::submit('Сортировать',array('class' => 'btn btn-success pull-right') ) }}
        </div>
        </div>
        {{ Form::close() }}
    </div>
    <div class="row">
        <div id="tooltip"></div>
        @foreach($products as $product)
            <div class="col-xs-4 container-product ">
                <div class="product-item">
                    <img src="{{ $product->image }}" class="img-product">
                    <p>{{ $product->short_description }}</p>
                    <p>{{ $product->selling_price }} грн</p>
                    <a class="btn btn-success add-to-cart"
                       data_name = "{{ $product->name }}"
                       data_id="{{ $product->id }}"
                       data_price="{{ $product->selling_price }}"
                       data_s_description="{{ $product->short_description }}">
                        Добавить в корзину
                    </a>
                    @if($product->discount!=0)
                        <div class="discount">
                            {{ $product->discount }}%
                        </div>
                    @endif
                    <div class="container-message">
                        <div class="success-message"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
