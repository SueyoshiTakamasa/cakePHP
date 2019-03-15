$('#zipcode').change(function(e) {
    e.preventDefault();

    var zipcode        = $(this).val();


    if(zipcode.match(/[Ａ-Ｚａ-ｚ０-９]/g)){
        var hankakuZipcode = zipcode.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
        zipcode = hankakuZipcode;
    }

    $.ajax({
        url: "/Zipcodes/search",
        type: "POST",
        data: {
　　　　　　　　'zipcode' : zipcode,
　　　　　　},
        success : function(data){
            //帰って来たjsonデータをオブジェクトとして取り扱う
            var dataParse = JSON.parse(data);

            //郵便番号に該当する住所データが複数の可能性を考慮
            if(dataParse.length == 1){

                var address   = dataParse[0].Zipcode;
                var pref      = address.pref;

                if(address.street == '以下に掲載がない場合'){
                    address.street = '';
                }
                var city      = address.city + address.street;

                $('#pref').val(pref);
                $('#city').val(city);

            } else if(dataParse.length > 1){

                var addressTotal = [];
                var prefArray    = [];
                var cityArray    = [];

                for(var i = 0; i < dataParse.length; i++){
                    var address   = dataParse[i].Zipcode;
                    var pref      = address.pref;

                    if(address.street == '以下に掲載がない場合'){
                        address.street = '';
                    }
                    var city      = address.city + address.street;

                    var prefAndCity  = pref + city;

                    prefArray.push(pref);
                    cityArray.push(city);

                    addressTotal.push(prefAndCity);

                }

                //リストを表示
                $('#idList').removeClass('d-none');

                //件数を表示
                $('#idList span').text(addressTotal.length + '件あります。いずれか選択された住所が以下に自動入力されます');

                //あるだけリストに住所を追加
                addressTotal.forEach(function(value, index){
                    $('#idList').append('<li class="list-group-item list-group-item-action cur-po" id="Item' + index + '">' + value + '</li>');
                });

                $('body').on('click', '#idList .list-group-item', function(){
                    var num = $(this).attr('id').substr(-1);
                    $('#pref').val(prefArray[num]);
                    $('#city').val(cityArray[num]);
                    $('#idList').addClass('d-none');
                    $('#idList .list-group-item').remove();
                });

                $('body').not('#idList').not('#idList list-group-item').click(function(){
                    $('#idList').addClass('d-none');
                    $('#idList .list-group-item').remove();
                 });
            }


        },
        error: function(){
            alert('ユーザーの役割の更新が失敗しました');
        }

    });
})