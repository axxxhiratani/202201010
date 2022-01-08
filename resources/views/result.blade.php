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
        width: 60%;
        margin: 400px auto;
        text-align: center;
    }
    .container__message{
        display: block;
        margin: 25px auto;
        font-weight: bold;
    }
    .container__link{
        display: block;
        margin: 50px auto;
        width: 150px;
        padding: 10px 20px;
        border-radius: 5px;
        background: #000;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        border: #000 1px solid;
    }
    .container__link:hover{
        background: #fff;
        color: #000;
    }
</style>
<body>
    <div class="container">
        <p class="container__message">ご意見いただきありがとうございました。</p>
        <a href="/" class="container__link">トップページへ</a>
    </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validate-config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
    <script>
        const vm = new Vue({
            el: '#app',
            data: {
            },
            watch:{
            },
            mounted: function(){
            },
            methods:{
                reset:function(){
                    data = ""
                    localStorage.setItem("firstname",JSON.stringify(data));
                    localStorage.setItem("secondname",JSON.stringify(data));
                    localStorage.setItem("gender",JSON.stringify(1));
                    localStorage.setItem("email",JSON.stringify(data));
                    localStorage.setItem("postcode",JSON.stringify(data));
                    localStorage.setItem("address",JSON.stringify(data));
                    localStorage.setItem("building_name",JSON.stringify(data));
                    localStorage.setItem("opinion",JSON.stringify(data));

                }
            },
            computed:{
            },
            created:function(){
                this.reset();
            }
        })
  </script>

</html>
