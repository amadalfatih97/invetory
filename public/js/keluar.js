/* save data to local storage */
$('form').submit(function (e) {
    e.preventDefault();
    let value= $(this).serializeArray();
    let storeData ={
        kodebrg :'',
        qty: 0
    }
    let datas = JSON.parse(localStorage.getItem("data"));
    // if (!datas) {
    //     datas = storeData;
    // }
    storeData.kodebrg = value[2].value;
    storeData.qty = parseInt(value[4].value);
    // value.forEach((item,index) => {
        // $("submitted").append(item.name + " " + item.value + "<br>");
    // });
    // datas.push(storeData)
    console.log(datas);
    
    // localStorage.setItem("data",JSON.stringify(value));
    console.log('input success');
});

/* slect qty */
$(document).on('change','.select-barang',function() {
    let prod_id=$(this).val();
    var a = $(this).parent();
    // console.log(prod_id);
    var op="";
    $.ajax({
        type:'get',
        url:"/findstok",
        data:{'id':prod_id},
        dataType:'json',
        success:function (data) {
            // console.log("stok");
            // console.log(data.stok);
            /* stok-ready:classs  */
            // a.find('.stok-ready').val(data.stok);
            document.getElementById("stok-ready").value = data.stok;
            document.getElementById("input-qty").max = data.stok;

        },
        error:function () {
            
        }
    });
});

