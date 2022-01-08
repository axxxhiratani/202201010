$(function(){
  //フォーム指定
  $('form').validate({

    //検証ルール設定
    rules: {
      //ここに検証ルールを設定
        firstname: {
            required: true,
            },
        secondname: {
            required: true,
            },
        email: {
            required: true,
            email:true,
            },
        postcode: {
            required: true,
            rangelength: [8, 8],
            },
        address: {
            required: true,
            },
        opinion: {
            required: true,
            maxlength: 120,
            },

    },

    //エラーメッセージ設定
    messages: {
      //ここにエラーメッセージを設定
        firstname: {
            required: '入力必須です',
          },
        secondname: {
            required: '入力必須です',
          },
        email: {
            required: '入力必須です',
            email:'形式に誤りがあります',
          },
        postcode: {
            required: '入力必須です',
            rangelength: '形式に誤りがあります',
          },
        address: {
            required: '入力必須です',
          },
        opinion: {
            required: '入力必須です',
            maxlength: '120文字以下で入力してください',
          },
      },

    //エラーメッセージ出力箇所設定
    errorPlacement: function(error, element){
      //ここにエラーメッセージの出力箇所を設定
        console.log(`element${element}`);
        error.insertAfter(element);
    }

  });
});
