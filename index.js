
  function triggerNav() {
      if (document.getElementById("sidebar-form").classList.contains('open')) {
        document.getElementById("sidebar-form").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.getElementById('sidebar-form').classList.remove('open')
      } else {
        document.getElementById("sidebar-form").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("sidebar-form").classList.add('open')
      }
  }

function Enableddl (services) {
  var ddl=document.getElementById("DDL");
  ddl.disabled=services.checked ? false : true;
  if(!ddl.disabled) {
    ddl.focus();
  }
}

var entry = document.getElementById("entry");
entry.addEventListener("click", displayDetails);

var row = 1;
function displayDetails() {
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;

if(!username || !email) {
  alert("Please fill all the boxes");
  return;
}

}