/* save data to local storage */
// showData();

$('form').submit(async function (e) {
    e.preventDefault();
    let value = $(this).serializeArray();
    let storeData = {
        kodebrg: '',
        qty: 0
    }
    let datas = new Array();
    datas = await JSON.parse(localStorage.getItem("items")) ?
        JSON.parse(localStorage.getItem("items")) : [];

    storeData.kodebrg = await value[2].value;
    storeData.qty = await parseInt(value[4].value);
    // value.forEach((item,index) => {
    // $("submitted").append(item.name + " " + item.value + "<br>");
    // });

    var exists = 0;

    for (var i = 0; i < datas.length; i++) {
        if (datas[i].kodebrg == storeData.kodebrg) {
            datas[i].qty = storeData.qty;
            exists = 1;
        }
    }

    if (exists === 0)
        datas.push(storeData);

    localStorage.setItem("items", JSON.stringify(datas));
    // showData();
});

/* slect qty */
$(document).on('change', '.select-barang', function () {
    let prod_id = $(this).val();
    var a = $(this).parent();
    // console.log(prod_id);
    var op = "";
    $.ajax({
        type: 'get',
        url: "/findstok",
        data: {
            'id': prod_id
        },
        dataType: 'json',
        success: function (data) {
            // console.log("stok");
            // console.log(data.stok);
            /* stok-ready:classs  */
            // a.find('.stok-ready').val(data.stok);
            document.getElementById("stok-ready").value = data.stok;
            // document.getElementById("input-qty").max = data.stok;

        },
        error: function () {

        }
    });
});
// https://www.youtube.com/watch?v=aAuEKEi3R8Y
// function showData() {
//     document.getElementById("show-items").innerHTML = "";
//     let item_records = new Array();
//     item_records = JSON.parse(localStorage.getItem("items")) ? JSON.parse(localStorage.getItem("items")) : []
//     if (item_records) {
//         for (let i = 0; i < item_records.length; i++) {
//             let addDiv = document.createElement('div');
//             addDiv.className = "row";
//             addDiv.innerHTML = '  <div class="col-sm-4" style="padding: 10px;">' + item_records[i].kodebrg + '</div><div class="col-sm-4" style="padding: 10px;">' + item_records[i].qty + '</div>';
//             document.getElementById("show-items").appendChild(addDiv);

//         }
//     }
// }
