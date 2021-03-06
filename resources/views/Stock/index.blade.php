<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('/weui/dist/lib/weui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/weui/dist/css/jquery-weui.min.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript"
            src="{{ URL::asset('/weui/dist/lib/jquery-2.1.4.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/weui/dist/js/jquery-weui.min.js') }}"></script>
    <title>库存管理</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<style>
    .background{
        background-color: #999;
    }
    .weui-media-box__thumb{
        border-radius: 50%;
        overflow: hidden;
    }
    .avatar{
        display: inline-block;
    }
    .top img{
        /*display: inline-block;*/
        width: 100px;
    }
    .weui-cell__hd img{
        width: 40px;
        margin-right: 10px;
    }
    .name{
        display: inline-block;
    }
</style>
<body class="background">
<div class="weui-cells">
<div class="top">
    {{--<a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">--}}
        <div class="weui-media-box__hd avatar" style="padding: 10px">
            <a href="{{ url('/stock/userCenter') }}">
                <img class="weui-media-box__thumb" src="images/avatar.jpg">
            </a>

        </div>
        <div class="weui-media-box__bd name">
            <h4 class="weui-media-box__title">名字</h4>
            <h4 class="weui-media-box__title">用户组别名称</h4>
        </div>
    {{--</a>--}}
</div>

</div>
<div class="weui-cells">
    <a class="weui-cell weui-cell_access" href="{{ url('/categories') }}">
        <div class="weui-cell__hd"><img src="images/category.png"></div>
        <div class="weui-cell__bd">
            <p>类别管理</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__hd"><img src="images/seller.png"></div>
        <div class="weui-cell__bd">
            <p>供应商管理</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__hd"><img src="images/order_depot.png"></div>
        <div class="weui-cell__bd">
            <p>仓库管理</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
</div>




</body>
</html>
