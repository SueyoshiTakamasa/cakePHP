$('#zipcode').change(function(e) {
    e.preventDefault();

    var zipcode = $(this).val();
    $.ajax({
        url: "/Zipcodes/search",
        type: "POST",
        data: {
　　　　　　　　'zipcode' : zipcode,
　　　　　　},
        success : function(data){
             console.log(data[0].Zipcode);
                },
        error: function(){
            alert('ユーザーの役割の更新が失敗しました');
        }

    });
})