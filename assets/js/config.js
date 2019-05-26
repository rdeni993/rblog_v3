/**
*
*	Settings
*
*/
var basePath = {

	"base_url" : "https://www.rblog.me/"

}

/*
*
*	Javascript time converter
*
*/
function Unix_timestamp_date(t){
var dt = new Date(t*1000);
var yr = dt.getFullYear();
var dy = dt.getDate();
var mn = dt.getMonth();
var hr = dt.getHours();
var m = "0" + dt.getMinutes();
var s = "0" + dt.getSeconds();

var mnt = [

"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"

];

return (yr + "-" + mnt[mn] + "-" + dy);

}