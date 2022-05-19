/* save data to local storage */
window.onload=()=>{
    let items = JSON.parse(localStorage.getItem("items")) ?
                JSON.parse(localStorage.getItem("items")) : null
    
    if (items) {
        loadTable(items)
    }
};
$('form').submit(async function (e) {
    e.preventDefault();
    let value = $(this).serializeArray();
    let storeData = {
        kodebrg: '',
        nmabarang:'',
        qty: 0,
        satuan:''
    }
    let datas = new Array();
    datas = await JSON.parse(localStorage.getItem("items")) ?
        JSON.parse(localStorage.getItem("items")) : [];

    storeData.kodebrg = await value[2].value;
    storeData.nmabarang = await (value[4].value);
    storeData.satuan = await (value[5].value);
    storeData.qty = await parseInt(value[6].value);
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
    loadTable(datas);
});

/* slect qty */
$(document).on('change', '.select-barang', function () {
    let prod_id = $(this).val();
    var a = $(this).parent();
    var op = "";
    $.ajax({
        type: 'get',
        url: "/findstok",
        data: {
            'id': prod_id
        },
        dataType: 'json',
        success: function (data) {
            /* stok-ready:classs  */
            // a.find('.stok-ready').val(data.stok);
            document.getElementById("stok-ready").value = data.stok;
            document.getElementById("namabarang").value = data.namabarang;
            document.getElementById("satuan").value = data.namasatuan;
            // document.getElementById("input-qty").max = data.stok;

        },
        error: function () {

        }
    });
});

/* load data table */
function loadTable(items){
    const tableBody = document.getElementById('rowitem');
    let dataHtml = '';
    if (items) {
        items.forEach((el,i) => {
            dataHtml += `<tr><td>${i+1}</td><td>${el.nmabarang}</td><td>${el.qty} ${el.satuan}</td><td><i class="btn btn-outline-danger bi bi-trash" onclick="remove(${i})"></i></td></tr>`
        });
    }
        
    tableBody.innerHTML = dataHtml;

}

/* clear item by id */
async function remove(i){
    let items = await JSON.parse(localStorage.getItem("items"));
    await items.splice(i,1);
    localStorage.setItem("items", JSON.stringify(items));
    loadTable(items);
}

//* clear all items */
$(document).on('click','#clear-storage',function(){
    localStorage.removeItem('items');
    loadTable(null)
})
