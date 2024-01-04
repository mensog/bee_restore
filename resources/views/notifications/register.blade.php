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
            min-height: 400px;
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
    style="width:100% !important; min-height:400px; color:#000000; background-color: #ffffff; font-family:-apple-system,Arial,Helvetica,sans-serif; font-size:16px; line-height:1.4;"
    alink="#1990fe" link="#1990fe" text="#000000">


<!-- PAGE WRAPPER -->
<div id="body_style">


    <!-- Wrapper/Container Table -->
    <table cellpadding="0" cellspacing="0" border="0" align="center"
           style="width:100% !important; margin:0; padding:0;">
        <tr bgcolor="#f4f4f4">
            <td style="padding-top: 50px;">
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
                                            <img width="160" style="display: block;" src="{{ asset("/img/letters/logo.png") }}" alt="BeeClub">
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
                                                    <h1 style="color:#000000; font-size:26px; line-height:1.2; font-weight:normal; margin-top:0; margin-bottom:16px;"><b>Спасибо за доверие к BeeClub</b></h1>
                                                    @if(env('REGISTER_BONUS_ENABLED', 0) && env('REGISTER_BONUS_AMOUNT', 0) > 0)
                                                    <p style="margin-top:0; margin-bottom:50px;">Ура! Мы начислили
                                                        Вам {{ env('REGISTER_BONUS_AMOUNT', 0) }} {{ Lang::choice('бонусный балл|бонусных балла|бонусных баллов', env('REGISTER_BONUS_AMOUNT', 0), [], 'ru') }}
                                                        . Вы можете потратить их на первую покупку. 1 балл = 1 ₽
                                                    </p>
                                                    @endif
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

