function GetInfo() {
    var newName = document.getElementById("cityInput");
    var cityName = document.getElementById("cityName");
    cityName.innerHTML = "--" + newName.value + "--";
    fetch('https://api.openweathermap.org/data/2.5/forecast?q=' + newName.value + '&appid=7eed830b3cec467e2904297641ad0172')
    .then(response => response.json())
    .then(data => {
        for(i=0;i<5;i++) {
            document.getElementById("day" + (i+1) + "Min").innerHTML = "Min:" + Number(data.list[i].main.temp_min - 273.15).toFixed(1) + "C"; 
        }
        for(i=0;i<5;i++) {
            document.getElementById("day" + (i+1) + "max").innerHTML = "Max:" + Number(data.list[i].main.temp_max - 273.15).toFixed(2) + "C"; 
        }
        for(i=0;i<5;i++) {
            document.getElementById("img" + (i+1)).src = 'http://openweathermap.org/img/wn/' + data.list[i].weather[0].icon + '.png'; 
        }
    })
    .catch(err => alert("Lỗi: " + err))
}
function DefaultScreen() {
    document.getElementById("cityInput").defaultValue = "Hanoi";
    GetInfo();
}
var d = new Date();
var weekday = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
function CheckDay(day) {
    if(day + d.getDay() > 4) {
        return day + d.getDay() - 5;
    }
    else {
        return day + d.getDay();
    }
}
for(i=0;i<5;i++) {
    document.getElementById("day" + (i+1)).innerHTML = weekday[CheckDay(i)];
}