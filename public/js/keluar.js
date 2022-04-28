$('form').submit(function (e) {
    e.preventDefault();
    let value= $(this).serializeArray();
    value.forEach((item,index) => {
        $("submitted").append(item.name + " " + item.value + "<br>");
    });
    let datas = localStorage.getItem("data");
    datas.push(value);
    console.log(datas);
    localStorage.setItem("data",JSON.stringify(value));
    console.log('input success');
})