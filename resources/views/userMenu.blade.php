<nav>
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="logo col-xs-2 pull-left hidden-xs">
                    <a href="/">
                        <img src="img/bear-top.png" alt="">
                    </a>
                </div>
                <div class="navbar-collapse collapse col-xs-12 col-md-7 ">
                    <ul class="nav navbar-nav">
                        <li class="hidden-xs"><a href="{{ route('main') }}">Главная</a></li>
                        <li class="hidden-xs catalog">
                            <a href="{{ route('catalog') }}">Каталог</a>
                            <ul class="nav navbar-nav drop-list">
                                @foreach($categoriesOfProducts as $item)
                                    <li class="dropdown-item"><a href="{{ route('showCategory',$item['name']) }}">{{ $item['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="hidden-xs"><a href="{{ route('news') }}">Новости</a></li>
                        <li class="hidden-xs dropdown list-cart">
                            <a href="{{ route('cart') }}">
                                <img src="img/cart.png" alt="">
                                Корзина (<span id="count">{{ Cart::count() }}</span>)
                                <span class="caret"></span>
                            </a>
                            <ul class="order hidden">
                            </ul>
                        </li>
                        <!-- Меню когда экран телефона -->
                        <li class="visible-xs text-center"><a href="{{ route('main') }}">Главная</a></li>
                        <li class="visible-xs text-center"><a href="{{ route('catalog') }}">Каталог</a></li>
                        <li class="visible-xs text-center"><a href="{{ route('news') }}">Новости</a></li>
                        <li class="visible-xs text-center"><a href="{{ route('cart') }}">Корзина</a></li>

                        {{--<li class="dropdown open visible-xs text-center">--}}
                            {{--<img src="img/cart.png" alt="">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                {{--<img src="img/cart.png" alt="">--}}
                                {{--Корзина--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li>в корзине:  шт.</li>--}}
                                {{--<li>на сумму: </li>--}}

                                {{--<li>--}}
                                     {{--грн.--}}
                                    {{--<a class="delete-item" href="">x</a>--}}
                                {{--</li>--}}
                                {{--<li class="visible-xs text-center"><a href="#">Оформить заказ</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<ul class="nav navbar-nav hidden-xs">--}}
                            {{--<li>--}}
                                {{--<div class="basket-container">--}}
                                    {{--<a href=""><img src="" /> Корзина <span id="basket_total_amount"></span>--}}
                                        {{--<span id="basket_total_nmb">--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                    {{--<div class="basket-items hidden">--}}
                                        {{--<ul class="">--}}
                                            {{--<li>в корзине: шт.</li>--}}
                                            {{--<li>на сумму:</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="delete-item" href="" data-product_id="">x</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a href="">--}}
                                                    {{--Оформить заказ--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </ul>
                </div><!--/.nav-collapse -->
                <div class="numbers col-xs-3  pull-right hidden-xs">
                    <p style="color: black;">Для заказа звоните:</p>
                    <p><img src="" />+38(050)-026-25-87</p>
                    <p><img src="" />+38(096)-554-14-49</p>
                </div>
            </div>
        </div>
    </div>
</nav>