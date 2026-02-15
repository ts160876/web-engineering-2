//Variables to store number of visits and text to print
let visits = 0;
let visitsText = "Number of visits: ";

//Function to get value of a cookie
function getCookie(name) {
  let cookies = document.cookie.split("; ");

  for (let cookie of cookies) {
    let [key, value] = cookie.split("=");
    if (key === name) {
      return value;
    }
  }
  return null;
}

//Increase the number of visits.
visits = getCookie("visits");
if (visits == null) {
  visits = 1;
} else {
  visits = parseInt(visits) + 1;
}

//Set the cookie.
document.cookie = "visits=" + visits;

//Adjust the text.
visitsText = visitsText + visits;

//Update the DOM.
document.getElementById("visits").innerText = visitsText;
