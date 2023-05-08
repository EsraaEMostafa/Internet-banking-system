/*
function showUserBalance(str) {
  if (str == '') {
    document.querySelector('.balance__value').innerHTML = '';

    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector('.balance__value').innerHTML = this.responseText;
    }
  };
  xmlhttp.open('GET', 'viewClient.php?q=' + str, true);

  xmlhttp.send();
}*/
