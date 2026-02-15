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

//Try to get the cookie value.
let value = getCookie("webengineering_cookie");
let result;
if (value == null) {
  result = "Cookie could not be read.";
} else {
  result = "Cookie could be read: " + decodeURIComponent(value);
}

//Update the DOM.
document.getElementById("result").innerText = result;
