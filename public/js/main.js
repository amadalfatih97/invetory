/* <script> */
console.log('js has successfuly load');
// function tipeinput(val){
//     if (val == 0) {
//         document.getElementById("barang-baru").style.display="block";
//         document.getElementById("barang-lama").style.display="none";
//     } else {
//         document.getElementById("barang-lama").style.display="block";
//         document.getElementById("barang-baru").style.display="none";
//     };
//     return;
// }
// </script>
$(document).ready(function(){
    /* by default hide all radio_content div elements except first element */
    $(".content .radio_content").hide();
    $(".content .radio_content:first-child").show();

    /* when any radio element is clicked, Get the attribute value of that clicked radio element and show the radio_content div element which matches the attribute value and hide the remaining tab content div elements */
    $(".radio_wrap").click(function(){
      var current_raido = $(this).attr("data-radio");
      $(".content .radio_content").hide();
      $("."+current_raido).show();
    })
});

//datepicker
const inputDate = document.getElementById("input-date");

// event click
inputDate.addEventListener("focus",function (evt) {
  if (this.getAttribute("type")==="date") {
    this.showPicker();
  }
});
// set today
inputDate.value=(new Date()).toISOString().substr(0,10);