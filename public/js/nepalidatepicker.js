window.onload = function () {
    year = NepaliFunctions.GetCurrentBsYear();
    month = NepaliFunctions.GetCurrentBsMonth();
    day = NepaliFunctions.GetCurrentBsDay();
    var currentdate = year + "-" + month + "-" + day;
    console.log(currentdate);
};
// setInterval(() => {
//     getDate();
// }, 10);
function getDate() {
    var nepali = document.getElementById("nepali-datepicker").value;
    converted = NepaliFunctions.BS2AD(nepali);

    var english = document.getElementById("english_date");
    english.value = converted;
}
