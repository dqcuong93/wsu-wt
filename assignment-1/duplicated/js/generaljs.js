function optionChange(selection) {
  var option = selection.options[selection.selectedIndex].text;
  document.getElementById("db_insert_btn").innerHTML = "Insert data into <u>" + option + "</u> database";
}

function getHTML(fileName) {
  window.location.href = '../html/' + fileName + '.html';
}

function formActionChange(id, fileName) {
  document.getElementById(id).action = "../php/" + fileName + ".php";
}

function redirect(fileName) {
  window.setTimeout(function() {
    window.location.href = "../html/" + fileName + ".html";
  }, 5000);
}

function validateEmail() {
  var email = document.getElementById('email').value;
  var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
  if (pattern.test(email)) {
    document.getElementById('email_form').submit();
    return true;
  } else if (!email) {
    alert('Please enter your email first!');
  } else {
    alert('Invalid email address: ' + email);
    return false;
  }
}

function changeTitle(selection) {
  var book_title = selection.options[selection.selectedIndex].text;
  var actions = document.getElementsByName('data_action');
  var action;

  document.getElementById('book_title').value = book_title;
  for (var i = 0; i < actions.length; i++) {
    if (actions[i].checked) {
      action = actions[i].value;
      break;
    }
  }

  if (action == 'review') {
    formActionChange('book_review_form','book_review');
    document.getElementById('book_review_form').submit();
  } else if (action == 'modify') {
    formActionChange('book_review_form','db_modify_form');
    document.getElementById('book_review_form').submit();
  } else {
    alert('Please choose the action!');
  }
}
