@extends('layouts.app')

@section('content')
<div class="container">
    @if(Cart::count()==0)
        <h2 class="order-success">Корзина пуста</h2>
    @else
    <div class="row">
        <h1>Корзина</h1>
        @if (session('status'))
            <h2 class="order-success">{{ session('status') }}</h2>
        @endif

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
                @foreach( $content as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->price }} грн</td>
                        <td><a href="{{ route('deleteFromCart', $product->rowId) }}" class="btn btn-danger">X</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>Общая сумма:</td>
                    <td></td>
                    <td></td>
                    <td>{{ Cart::subtotal() }} грн</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        {{ Form::open(array('url'       => 'acceptOrder',
                            'before'    => 'csrf',
                            'method'    => 'post',
                            ))
        }}
        <div class="form-group">
            <div class="col-xs-4">
                {{ Form::label('Name', 'Имя', array('class' => 'required')) }}
                {{ Form::text('name', '', array('class' => 'form-control'), ['placeholder' => 'Имя']) }}
                <div class="row">
                    @if (count($errors) > 0)
                        <span class="form-error pull-left errors">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                {{ Form::label('number', 'Телефон', array('class' => 'required')) }}
                <div class="input-group">
                    <span class="input-group-addon">+38</span>
                    {{ Form::text('number', '', array('class' => 'form-control')) }}
                </div>
                <div class="row">
                    @if (count($errors) > 0)
                        <span class="form-error pull-left errors">{{ $errors->first('number') }}</span>
                    @endif
                </div>
                {{ Form::label('delivery', 'Cпособ доставки', array('class' => 'required')) }}
                {{ Form::select('delivery', array(   'post'     => 'Новая почта',
                                                     'courier'  => 'Курьер по г. Харьков',
                                                     'pickup'   => 'Самовывоз',), '', array('class' => 'form-control')) }}
                <div class="row">
                    @if (count($errors) > 0)
                        <span class="form-error pull-left errors">{{ $errors->first('delivery') }}</span>
                    @endif
                </div>
                {{ Form::label('city', 'Город', array('class' => 'required')) }}
                {{ Form::text('city', '', array('class' => 'form-control')) }}
                <div class="row">
                    @if (count($errors) > 0)
                        <span class="form-error pull-left errors">{{ $errors->first('city') }}</span>
                    @endif
                </div>
                {{ Form::label('adress', 'Адресс', array('class' => 'required')) }}
                {{ Form::text('adress', '', array('class' => 'form-control')) }}
                <div class="row">
                    @if (count($errors) > 0)
                        <span class="form-error pull-left errors">{{ $errors->first('adress') }}</span>
                    @endif
                </div>
                {{ Form::submit('Заказать',array('class' => 'btn btn-success pull-left confirm-order') ) }}
            </div>
        </div>
        {{ Form::close() }}
        @endif
    </div>
</div>
@endsection
