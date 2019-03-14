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
            var dataParse = JSON.parse(data);
            var address   = dataParse[0].Zipcode;
            var pref      = address.pref;
            var city      = address.city + address.street;

            $('#pref').val(pref);
            $('#city').val(city);
        },
        error: function(){
            alert('ユーザーの役割の更新が失敗しました');
        }

    });
})