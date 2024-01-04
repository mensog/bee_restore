{{--<!DOCTYPE html>--}}
{{--<html lang="ru">--}}
{{--<head>--}}
{{--    <title>BeeClub</title>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{-- <head>--}}
{{--<body>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--           <div class="col-md-12">--}}
{{--                <h1>Заказ <a href="#">№{{ $order->id }}</a> {{ $titleNotification }}</h1>--}}
{{--               <p>--}}
{{--                   @if(isset($firstText))--}}
{{--                       {{$firstText}}--}}
{{--                   @endif--}}
{{--                   @if(isset($secondText))--}}
{{--                       {{$secondText}}--}}
{{--                   @endif--}}
{{--                  @if(isset($thirdText))--}}
{{--                       {{$thirdText}}--}}
{{--                   @endif--}}
{{--                   @if(isset($route) && isset($linkName))--}}
{{--                       <a href="{{ $route }}">{{ $linkName }}</a>--}}
{{--                   @endif--}}
{{--               </p>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--           <div class="col-md-12">--}}
{{--               <p class="text-muted">Статус заказа</p>--}}
{{--               <p class="{{ $style }}">{{ $status }}</p>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--           <div class="col-md-12 text-muted">--}}
{{--               <p>Дата и время доставки:</p>--}}
{{--               <p>{{ $order->delivery_date }}</p>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--           <div class="col-md-12 text-muted">--}}
{{--                <p>Адрес доставки:</p>--}}
{{--               <p>{{ $order->address }}</p>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--           <div class="col-md-12 text-muted">--}}
{{--                <p>Стоимость заказа:</p>--}}
{{--               <p>{{ $order->getSum() / 100 }} руб. (в том числе и доставки {{ $order->delivery_amount / 100 }} руб.)</p>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <h1>Товары:</h1>--}}
{{--            @foreach($order->items as $item)--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-8">--}}
{{--                        {{ $item->product->name }}--}}
{{--                        <small>Арт.{{ $item->product->sku }}</small>--}}
{{--                        <small>--}}
{{--                            @if($item->product->weight)--}}
{{--                                {{$item->product->weight / 1000}} КГ|--}}
{{--                            @endif--}}
{{--                            из {{ $item->product->getStoreName() }}--}}
{{--                        </small>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        {{ $item->price * $item->quantity / 100 }} руб.--}}
{{--                        <small>{{ $item->price / 100 }} руб. х {{ $item->quantity }} шт.</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <h1>Сумма заказа:</h1>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                    Вес товара--}}
{{--                    <br>--}}
{{--                    40 кг--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    Колличество {{ array_sum($quantity) }} шт--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    Сумма с учетом доставки--}}
{{--                    {{ $order->getFinalSum() / 100 }} руб.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>BeeClub</title>

    <style type="text/css">
        body {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td {
            border-collapse: collapse;
        }

        img {
            -ms-interpolation-mode: bicubic;
            display: block;
            outline: none;
            text-decoration: none;
        }

        a img {
            border: none;
        }

        p {
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #000000;
            line-height: 100%;
        }


        body,
        #body_style {
            width: 100% !important;
            min-height: 1000px;
            color: #000000;
            background-color: #ffffff;
            font-family: -apple-system, BlinkMacSystemFont, Arial, Helvetica, sans-serif;
            font-size: 16px;
            line-height: 1.4;
        }

        a {
            color: #1990fe;
            text-decoration: none;
        }

        a:link {
            color: #1990fe;
            text-decoration: none;
        }

        a:visited {
            color: #1990fe;
            text-decoration: none;
        }

        a:focus {
            color: #1990fe !important;
        }

        a:hover {
            color: #000000 !important;
        }

        .gray {
            background-color: #c4c4c4 !important;
        }

        .blue {
            background-color: #1990fe !important;
        }

        .orange {
            background-color: #f78c07 !important;
        }

        .red {
            background-color: #eb5757 !important;
        }

        .green {
            background-color: #00a454 !important;
        }


        @media only screen and (max-width: 639px) {

            .table {
                width: 320px !important;
            }

            .table td {
                text-align: left;
            }

            .innertable {
                width: 300px !important;
            }

            .collapse-cell {
                width: 300px !important;

            }

            .social-media img {
                float: left !important;
                margin: 0 1em 0 0 !important;
            }

            .footer {
                background-color: #ffffff !important;
            }

        }
    </style>
</head>


<body
    style="width:100% !important; min-height:1000px; color:#000000; background-color: #ffffff; font-family:-apple-system,Arial,Helvetica,sans-serif; font-size:16px; line-height:1.4;"
    alink="#1990fe" link="#1990fe" text="#000000">


<!-- PAGE WRAPPER -->
<div id="body_style">


    <!-- Wrapper/Container Table -->
    <table cellpadding="0" cellspacing="0" border="0" align="center"
           style="width:100% !important; margin:0; padding:0;">
        <tr bgcolor="#f4f4f4">
            <td>
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table"
                       bgcolor="#ffffff">

                    <!-- HEADER -->
                    <tr>
                        <td>
                            <table bgcolor="#ffffff" width="500" cellpadding="0" cellspacing="0" border="0"
                                   align="center"
                                   class="innertable">
                                <tr>
                                    <td style="padding-top: 48px; padding-bottom: 48px;">
                                        <a href="{{ route('main') }}" target="_blank">
                                            <img width="160" style="display: block;" src="{{ asset("/img/logo.jpg") }}" alt="BeeClub">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- /HEADER -->


                    <!-- CONTENT -->
                    <tr bgcolor="#ffffff">
                        <td>
                            <table width="500" cellpadding="0" cellspacing="0" border="0" align="center"
                                   class="innertable">
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td>
                                                    <h1
                                                        style="color:#000000; font-size:26px; line-height:1.2; font-weight:normal; margin-top:0; margin-bottom:16px;">
                                                        <b>
                                                            @if(isset($uniqueTitleNotification))
                                                                {{ $uniqueTitleNotification }}
                                                                <a href="{{ route('lk_orders') }}" target="_blank"
                                                                    style="color:#1990fe; text-decoration: none;">№{{ $order->id }}</a>
                                                            @else
                                                                Заказ
                                                                <a href="{{ route('lk_orders') }}" target="_blank"
                                                                    style="color:#1990fe; text-decoration: none;">№{{ $order->id }}</a>
                                                                {{ $titleNotification }}
                                                            @endif
                                                        </b>
                                                    </h1>
                                                    <p style="margin-top:0; margin-bottom:24px;">
                                                        @if(isset($firstText))
                                                            {{$firstText}}
                                                        @endif
                                                        @if(isset($secondText))
                                                            {{$secondText}}
                                                        @endif
                                                        @if(isset($thirdText))
                                                            {{$thirdText}}
                                                        @endif
                                                        @if(isset($route) && isset($linkName))
                                                            <a href="{{ route($route) }}"
                                                               style="color:#1990FE; text-decoration: none;">{{ $linkName }}</a>
                                                        @endif
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 24px;">
                                        <span style="color:#9f9f9f;">Статус заказа</span> <br>
                                        <a href="{{ route('lk_orders') }}" class="{{ $style }}"
                                           style="display: inline-block; margin-top: 5px; margin-bottom: 5px; padding: 8px 16px; background-color: #c4c4c4; border-radius: 6px; color: #ffffff; text-decoration: none;">{{ $status }}</a>
                                        @if(isset($secondStatus))
                                        <a href="{{ route('lk_orders') }}" class="{{ $secondStyle }}"
                                           style="display: inline-block; padding: 8px 16px; background-color: #c4c4c4; border-radius: 6px; color: #ffffff; text-decoration: none;">{{ $secondStatus }}</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 24px;">
                                        <span style="color: #9f9f9f;">Дата и время доставки:</span> <br>
                                        {{ $order->delivery_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 24px;">
                                        <span style="color: #9f9f9f;">Адрес доставки:</span> <br>
                                        {{ $order->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 32px;">
                                        <span style="color: #9f9f9f;">Стоимость заказа:</span> <br>
                                        {{ $order->getSum() / 100 }} руб. (в том числе и
                                        доставки {{ $order->delivery_amount / 100 }} руб.)
                                    </td>
                                </tr>
                            </table>

                            <table width="500" cellpadding="0" cellspacing="0" border="0" align="center"
                                   class="innertable">
                                <tr valign="top">
                                    <td>
                                        <table width="300" cellpadding="0" cellspacing="0" border="0">
                                            <tr valign="top">
                                                <td>
                                                    <h1
                                                        style="color:#000000; font-size:26px; line-height:1.2; font-weight:normal; margin-top:0; margin-bottom:0.5em;">
                                                        <b>Товары:</b>
                                                    </h1>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="innertable" bgcolor="#ffffff" width="500" cellpadding="0" cellspacing="0"
                                   border="0" align="center" style="font-size: 14px;">

                                @foreach($order->items as $item)
                                    <tr style="border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                                        <td style="padding-top: 16px; padding-bottom: 16px;">
                                            <table align="left" width="290" cellpadding="0" cellspacing="0" border="0"
                                                   class="collapse-cell">
                                                <tr>
                                                    <td>
                                                        <p style="margin-top:0; margin-bottom:8px;">
                                                            <a href="{{ route('product', ['name' => $item->product->friendly_url_name, 'storeSlug' => $item->product->store->slug]) }}"
                                                               style="color: #1990fe; text-decoration: none;">{{ $item->product->name }}</a>
                                                        <p style="color:#9f9f9f;">Арт.{{ $item->product->sku }}</p>
                                                        <p style="margin-top:0; margin-bottom:0;color:#9f9f9f;">
                                                            @if($item->product->weight)
                                                                {{$item->product->weight / 1000}} КГ|
                                                            @endif
                                                            из {{ $item->product->getStoreName() }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table align="right" width="210" cellpadding="0" cellspacing="0" border="0"
                                                   class="collapse-cell">
                                                <tr>
                                                    <td align="right">
                                                        <p style="margin-top:0; margin-bottom:8px; color:#000000;">{{ $item->price * $item->quantity / 100 }}
                                                            руб.</p>
                                                        <p style="margin-top:0; margin-bottom:0; color:#9f9f9f;">{{ $item->price / 100 }}
                                                            руб. х {{ $item->quantity }} шт.</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach


                            </table>

                            <table width="500" cellpadding="0" cellspacing="0" border="0" align="center"
                                   class="innertable">
                                <tr valign="top">
                                    <td style="padding-top: 32px;">
                                        <table width="300" cellpadding="0" cellspacing="0" border="0">
                                            <tr valign="top">
                                                <td>
                                                    <h1
                                                        style="color:#000000; font-size:26px; line-height:1.2; font-weight:normal; margin-top:0; margin-bottom:0.5em;">
                                                        <b>Сумма заказа:</b>
                                                    </h1>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="innertable" bgcolor="#ffffff" width="500" cellpadding="0" cellspacing="0"
                                   border="0" align="center" style="font-size: 14px;">
                                <tr>
                                    <td style="padding-bottom: 48px;">
                                        <table align="left" width="150" cellpadding="0" cellspacing="0" border="0"
                                               class="collapse-cell">
                                            <tr>
                                                <td>
                                                    <p style="margin-top:0; margin-bottom:0; color:#9f9f9f;">Вес
                                                        заказа</p>
                                                    <p style="margin-top:0; margin-bottom:8px; color:#000000;">25 кг</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <table align="right" width="200" cellpadding="0" cellspacing="0" border="0"
                                               class="collapse-cell">
                                            <tr>
                                                <td>
                                                    <p style="margin-top:0; margin-bottom:0; color:#9f9f9f;">Сумма с
                                                        учетом доставки</p>
                                                    <p style="margin-top:0; margin-bottom:8px; color:#000000;">{{ $order->getFinalSum() / 100 }}
                                                        руб.</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <table align="right" width="150" cellpadding="0" cellspacing="0" border="0"
                                               class="collapse-cell">
                                            <tr>
                                                <td>
                                                    <p style="margin-top:0; margin-bottom:0; color:#9f9f9f;">
                                                        Количество</p>
                                                    <p style="margin-top:0; margin-bottom:8px; color:#000000;">{{ array_sum($quantity) }}
                                                        шт</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- /CONTENT -->


                    <!-- footer -->
                    <tr>
                        <td>
                            <table class="innertable footer" bgcolor="#f4f4f4" width="600" cellpadding="0"
                                   cellspacing="0"
                                   border="0" align="center" style="font-size: 14px;">
                                <tr>
                                    <td style="padding-top: 32px; padding-bottom: 48px;">
                                        <table align="left" width="270" cellpadding="0" cellspacing="0" border="0"
                                               class="collapse-cell">
                                            <tr>
                                                <td>
                                                    <p style="margin-top:0; margin-bottom:16px; color:#9f9f9f;">
                                                        Загрузите наше мобильное приложение</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" target="_blank" style="display: inline-block;">
                                                        <img src="{{ asset("/img/letters/google-play.jpg") }}" alt="google-play"
                                                             width="135"
                                                             align="right">
                                                    </a>
                                                    <a href="#" target="_blank" style="display: inline-block;">
                                                        <img src="{{ asset("/img/letters/app-store.jpg") }}" alt="app-store"
                                                             width="118"
                                                             align="left">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <table align="right" width="230" cellpadding="0" cellspacing="0" border="0"
                                               class="collapse-cell">
                                            <tr>
                                                <td>
                                                    <p style="margin-top: 32px;"><a href="{{ route('main') }}" target="_blank">Перейти на
                                                            сайт</a></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- /footer -->

                </table>
            </td>
        </tr>
    </table>
    <!-- End of wrapper table -->


</div>
<!-- /PAGE WRAPPER -->

</body>

</html>

