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
        margin: 50px auto;
        padding: 20px auto;
        text-align: center;
        width: 80%;
    }
    .container--title{
        font-weight: bold;
        font-size: 20px;
    }
    .input--text{
        border: solid 1.5px #c0c0c0;
        height: 40px;
        width: 100%;
        border-radius: 5px;
    }
    .container--table{
        margin: 0 auto;
    }
    .td--input--name{
        width: 100%;
    }
    .td--input--name:last-child{
        margin-left:30px;
    }
    .input--textarea{
        border: solid 1px #c0c0c0;
        width: 100%;
    }
    .tr{
        width: 100%;
        display: flex;
        margin:50px 5px;
        text-align: left;
    }
    .th{
        width: 20%;
        text-align: left;
        font-weight: bold;
    }
    .td{
        width: 80%;
        margin-left: 5%;
    }
    .td--name{
        display: flex;
    }
    .td__postcode{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }
    .input--text--postcode{
        width: 95%;
    }

    .td__postcode__icon{
        width: 4%;
        display: inline-block;
        font-weight: bold;
    }

    button {
        padding: 10px 20px;
        background-color: #000;
        width: 150px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }
    button:hover{
        background: #fff;
        color: #000;
    }
    span{
        color: red;
    }


    .td--radio__label{
        padding: 0 0 0 32px;	/* ラベルの位置 */
        font-size: 16px;
        line-height: 28px;		/* ボタンのサイズに合わせる */
        display: inline-block;
        cursor:	pointer;
        position: relative;
    }
    .td--radio__label:before {
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
    .td--radio__button[type="radio"] {
	    display: none;
    }
    .td--radio__button[type="radio"]:checked + label:after {
        content: '';
        width: 10px;		/* マークの横幅 */
        height: 10px;		/* マークの縦幅 */
        position: absolute;
        top: 10.5px;
        left: 10.5px;
        background-color: #000;
        border-radius: 50%;
    }
    .error{
        color: red;
    }
    .example{
        color: #d3d3d3;
    }

</style>
<body>
    <div class="container" id="app">
        <div class="container--title">
            <p>お問い合わせ</p>
        </div>
        <form action="/add" method="post">
            @csrf
            <div class="container--table">
                <div class="tr">
                    <div class="th">
                        <label for="name">
                            お名前<span>※</span>
                        </label>
                    </div>
                    <div class="td td--name">
                        <div class="td--input--name">
                            <input type="text" name="firstname" class="input--text" v-model:value="firstname" id="name">
                            <p class="example">例) 山田</p>
                        </div>
                        <div class="td--input--name">
                            <input type="text" name="secondname" class="input--text" v-model:value="secondname">
                            <p class="example">例) 太郎</p>
                        </div>



                    </div>
                </div>

                <div class="tr">
                    <div class="th">
                        性別<span>※</span>
                    </div>
                    <div class="td td--radio">
                        <input type="radio" name="gender" value="1" class="td--radio__button" id="gender1" v-model="gender">
                        <label for="gender1" class="td--radio__label">男性</label>

                        <input type="radio" name="gender" value="2" class="td--radio__button" id="gender2" v-model="gender">
                        <label for="gender2" class="td--radio__label">女性
                        </label>
                    </div>
                </div>

                <div class="tr">
                    <div class="th">
                        <label for="email">
                            メールアドレス<span>※</span>
                        </label>
                    </div>
                    <div class="td">
                        <input type="email" name="email" class="input--text" v-model:value="email" id="email">
                        <p class="example">例) test@example.com</p>

                    </div>
                </div>

                <div class="tr">
                    <div class="th">
                        <label for="postcode">
                            郵便番号<span>※</span>
                        </label>
                    </div>
                    <div class="td">
                        <div class="td__postcode">
                            <p class="td__postcode__icon">〒</p>
                            <input type="text" name="postcode" class="input--text input--text--postcode" v-model:value="postcode" id="postcode">
                        </div>
                        <p class="example">例) 123-4567</p>
                        <p id="error"></p>
                    </div>
                </div>

                <div class="tr">
                    <div class="th">
                        <label for="address">
                            住所<span>※</span>
                        </label>
                    </div>
                    <div class="td">
                        <input type="text" name="address" class="input--text" v-model:value="address" id="address">
                        <p class="example">例) 東京都渋谷区千駄ヶ谷1-2-3</p>
                    </div>
                </div>


                <div class="tr">
                    <div class="th">
                        <label for="building_name">
                            建物名
                        </label>
                    </div>
                    <div class="td">
                        <input type="text" name="building_name" class="input--text" v-model:value="building_name" id="building_name">
                        <p class="example">例) 千駄ヶ谷マンション101</p>
                    </div>
                </div>


                <div class="tr">
                    <div class="th">
                        <label for="opinion">
                            ご意見<span>※</span>
                        </label>
                    </div>
                    <div class="td">
                        <textarea name="opinion" id="opinion" cols="30" rows="10" class="input--textarea" v-model:value="opinion"></textarea>
                    </div>
                </div>

                <div>
                    <div>
                        <button>確認</button>
                    </div>
                </div>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validate-config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
    <script>
        const vm = new Vue({
            el: '#app',
            data: {
                firstname:"",
                secondname:"",
                gender:1,
                email:"",
                postcode:"",
                address:"",
                building_name:"",
                opinion:"",
            },
            watch:{
                firstname: function(){
                    localStorage.setItem("firstname",JSON.stringify(this.firstname));
                },
                secondname: function(){
                    localStorage.setItem("secondname",JSON.stringify(this.secondname));
                },
                gender: function(){
                    localStorage.setItem("gender",JSON.stringify(this.gender));
                },
                email: function(){
                    localStorage.setItem("email",JSON.stringify(this.email));
                },
                postcode: function(){

                    this.postcode = this.changeFormat(this.postcode);
                    // this.search();
                    localStorage.setItem("postcode",JSON.stringify(this.postcode));
                },
                address: function(){
                    localStorage.setItem("address",JSON.stringify(this.address));
                },
                building_name: function(){
                    localStorage.setItem("building_name",JSON.stringify(this.building_name));
                },
                opinion: function(){
                    localStorage.setItem("opinion",JSON.stringify(this.opinion));
                },

            },
            mounted: function(){
                this.firstname = JSON.parse(localStorage.getItem("firstname")) || "";
                this.secondname = JSON.parse(localStorage.getItem("secondname")) || "";
                this.gender = JSON.parse(localStorage.getItem("gender")) || "";
                this.email = JSON.parse(localStorage.getItem("email")) || "";
                this.postcode = JSON.parse(localStorage.getItem("postcode")) || "";
                this.address = JSON.parse(localStorage.getItem("address")) || "";
                this.building_name = JSON.parse(localStorage.getItem("building_name")) || "";
                this.opinion = JSON.parse(localStorage.getItem("opinion")) || "";
            },
            methods:{
                changeFormat:function(str){
                    var value = str.replace(/[Ａ-Ｚａ-ｚ０-９]|\－|\＋/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
                    var result = new String( value ).match(/\d|\-|\+/g);
                    result = result.join("");
                    return result;
                },
                search:function(){
                    let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
                    let input = this.postcode;
                    let param = input.replace("-","");
                    let url = api + param;
                    fetchJsonp(url, {
                        timeout: 10000, //タイムアウト時間
                    })
                    .then((response)=>{
                        error.textContent = ''; //HTML側のエラーメッセージ初期化
                        return response.json();
                    })
                    .then((data)=>{
                        if(data.status === 400){ //エラー時
                            this.address = "";
                        }else if(data.results === null){
                            this.address = "";
                        } else {
                            this.address = data.results[0].address1 + data.results[0].address2 + data.results[0].address3;
                        }
                    })
                    .catch((ex)=>{ //例外処理
                        this.address = "";
                        console.log(ex);
                    });
                },
            },
            computed:{
                searchAddress:function(){
                    console.log("update");
                }
            },
            filters:{
            }
        })
  </script>
</body>
</html>
