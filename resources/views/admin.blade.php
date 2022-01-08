<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .container{
        width: 100%;
        margin: 0 auto;
        padding: 20px 30px;
    }
    .title{
        text-align: center;
        margin: 0 auto;
        font-size: 30px;
        font-weight: bold;
        margin: 20px 0;
    }
    .search{
        width: 100%;
        border: 2px solid #000;
    }
    .input--container{
        margin: 20px 0;
    }
    .input--container__item{
        font-weight: bold;
        margin: 0 20px;
    }
    .input--container__label{
        padding: 0 0 0 32px;	/* ラベルの位置 */
        font-size: 16px;
        line-height: 28px;		/* ボタンのサイズに合わせる */
        display: inline-block;
        cursor:	pointer;
        position: relative;
        margin-right: 15px;
    }
    .input--container__label:before {
        content: '';
        width: 28px;		/* ボタンの横幅 */
        height: 28px;		/* ボタンの縦幅 */
        position: absolute;
        top: 0;
        left: 0;
        background-color: #fff;
        border-radius: 50%;
        border: #e6e6fa 1px solid;
    }
    .input--container__radio[type="radio"] {
	    display: none;
    }
    .input--container__radio[type="radio"]:checked + label:after {
        content: '';
        width: 10px;		/* マークの横幅 */
        height: 10px;		/* マークの縦幅 */
        position: absolute;
        top: 9px;
        left: 9px;
        background-color: #000;
        border-radius: 50%;
    }
    .input--container--container__button{
        display:block;
        width: 15%;
        margin: 10px auto;
        text-align: center;
        color: #fff;
        border-radius: 3px;
        background: #000;
        padding: 10px 25px;
    }
    .input--container--container__button:hover{
        background: #fff;
        color: #000;
    }
    .input--container--container__reset{
        display: block;
        width: 20%;
        margin: 0 auto;
        text-align: center;
        color: #000;
    }
    .input--container__text{
        width: 30%;
        height: 30px;
        border: 1px solid #e6e6fa;
        border-radius: 5px;
    }
    .menu{
        margin: 20px 0;
    }
    .result{
        width: 100%;
    }
    .headline{
        border: #fff solid 3px;
        border-bottom: #000 solid 3px;
    }
    .td__button{
        background: #000;
        color: #fff;
        border-radius: 5px;
    }
    .menu{
        display: flex;
        justify-content: space-between;
    }
    .limit{
        display: block;
    }
    .show{
        display: none;
    }
    .page{
        color: #000;
    }
    .activecustom{
        background: #000;
        color: #fff;
    }
    table{
        margin: 0 auto;
        width: 100%;
    }
    .showopinion{
        width: 400px;
        overflow-wrap: break-word;
        cursor: pointer;
    }
</style>
<body>
    <div class="title">
        <p >
            管理システム
        </p>
    </div>
    <div class="container" id="app">
        <div class="search">
            <form action="/admin" method="post">
                @csrf
                <div class="input--container">
                    <label for="name" class="input--container__item">お名前</label>
                    <input type="text" name="name" value="" id="name" class="input--container__text">
                    <label class="input--container__item">性別</label>
                    <input type="radio" name="gender" value="0" class="input--container__radio" id="radio1" checked>
                    <label for="radio1" class="input--container__label">全て</label>
                    <input type="radio" name="gender" value="1" class="input--container__radio" id="radio2">
                    <label for="radio2" class="input--container__label">男性</label>
                    <input type="radio" name="gender" value="2" class="input--container__radio" id="radio3">
                    <label for="radio3" class="input--container__label">女性</label>
                </div>
                <div class="input--container">
                    <label class="input--container__item">登録日</label>
                    <input type="date" name="create_start" value="" class="input--container__text">　～　
                    <input type="date" name="create_end" value="" class="input--container__text">
                </div>
                <div class="input--container">
                    <label for="mail" class="input--container__item">メールアドレス</label>
                    <input type="text" name="mail" value="" id="mail" class="input--container__text">
                </div>
                <div class="input--container">
                    <button class="input--container--container__button">検索</button>
                    <input type="hidden" name="flg" value="true">
                    <a href="/reset" class="input--container--container__reset">リセット</a>
                </div>
            </form>
        </div>
        <div class="result">
            <div class="menu">
                <div class="">{{$message}}</div>
                <div class="page">
                    {{$contacts->links()}}
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="headline">
                        <th scope="col">
                            id
                        </th>
                        <th scope="col">
                            お名前
                        </th>
                        <th scope="col">
                            性別
                        </th>
                        <th scope="col">
                            メールアドレス
                        </th>
                        <th scope="col">
                            ご意見
                        </th>
                        <th scope="col">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>
                                {{$contact->id}}
                            </td>
                            <td>
                                {{$contact->fullname}}
                            </td>
                            <td>
                                @if ($contact->gender == 1)
                                    男性
                                @else
                                    女性
                                @endif
                            </td>
                            <td>
                                {{$contact->email}}
                            </td>
                            <td class="showopinion" v-on:mouseover="show({{$loop->index}})" v-on:mouseleave="hide({{$loop->index}})">
                                <span class="limit">
                                    {{mb_strimwidth($contact->opinion,0,53,"...","UTF-8")}}
                                </span>
                                <span class="show">
                                    {{$contact->opinion}}
                                </span>
                            </td>
                            <td>
                                <form action="/delete" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$contact->id}}">
                                    <button class="td__button">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        const vm = new Vue({
            el: '#app',
            methods:{
                show:function(index){
                    $(".showopinion").eq(index).find(".limit").css("display","none");
                    $(".showopinion").eq(index).find(".show").css("display","block");
                },
                hide:function(index){
                    $(".showopinion").eq(index).find(".limit").css("display","block");
                    $(".showopinion").eq(index).find(".show").css("display","none");
                },
            },
        })
    </script>
</body>
</html>
