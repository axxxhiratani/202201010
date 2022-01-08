<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
    <title>Document</title>
</head>
<style>
    .container{
        margin: 40px auto;
        padding: 0 auto;
        text-align: center;
        width: 80%;
    }
    .container--table{
        margin: 0 auto;
    }
    .container--table__title{
        font-weight: bold;
        font-size: 30px;
    }
    .container--table__button{
        padding: 10px 20px;
        background-color: #000;
        width: 150px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        margin-bottom: 10px;
        cursor: pointer;
    }
    .container--table__button:hover{
        background-color: #fff;
        color: #000;
    }
    .container--table__reset{
        display: inline-block;
        margin: 0 auto;
        color: #000;
    }
    .tr{
        width: 100%;
        display: flex;
        margin:50px 5px;
    }
    .th{
        width: 20%;
        text-align: left;
        font-weight: bold;
    }
    .td{
        width: 50%;
        text-align: left;
        margin-left: 20px;
    }

</style>
<body>






    <div class="container">
        <div class="container--table">
            <div class="container--table__title">
                <p>内容確認</p>
            </div>
            <div class="tr">
                <div class="th">お名前</div>
                <div class="td">{{$firstname}}　{{$secondname}}</div>
            </div>
            <div class="tr">
                <div class="th">性別</div>
                <div class="td">
                    @if ($gender == 1)
                        男性
                    @else
                        女性
                    @endif

                </div>
            </div>
            <div class="tr">
                <div class="th">メールアドレス</div>
                <div class="td">{{$email}}</div>
            </div>
            <div class="tr">
                <div class="th">郵便番号</div>
                <div class="td">{{$postcode}}</div>
            </div>
            <div class="tr">
                <div class="th">住所</div>
                <div class="td">{{$address}}</div>
            </div>
            <div class="tr">
                <div class="th">建物名</div>
                <div class="td">{{$building_name}}</div>
            </div>
            <div class="tr">
                <div class="th">ご意見</div>
                <div class="td">{{$opinion}}</div>
            </div>
            <form action="/store" method="post">
                @csrf
                <button class="container--table__button">送信</button>
            </form>
            <a href="/" class="container--table__reset">修正する</a>

        </div>
    </div>


</body>
</html>
