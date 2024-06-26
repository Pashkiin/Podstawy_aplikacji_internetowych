function isWhiteSpaceOrEmpty(str) {
  return /^[\s\t\r\n]*$/.test(str);
}

function isEmailInvalid(str) {
  let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
  return !email.test(str);
}

function checkStringAndFocus(obj, msg, validate = null) {
  let str = obj.value;
  let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
  if (validate(str)) {
    document.getElementById(errorFieldName).innerHTML = msg;
    showElement(errorFieldName);
    obj.focus();
    return false;
  }
  return true;
}

function showElement(e) {
  document.getElementById(e).style.visibility = "visible";
}

function hideElement(e) {
  document.getElementById(e).style.visibility = "hidden";
}

function alterRows(i, e) {
  if (e) {
    if (i % 2 == 1) {
      e.setAttribute("style", "background-color: Aqua;");
    }
    e = e.nextSibling;
    while (e && e.nodeType != 1) {
      e = e.nextSibling;
    }
    alterRows(++i, e);
  }
}

function nextNode(e) {
  while (e && e.nodeType != 1) {
    e = e.nextSibling;
  }
  return e;
}
function prevNode(e) {
  while (e && e.nodeType != 1) {
    e = e.previousSibling;
  }
  return e;
}
function swapRows(b) {
  let tab = prevNode(b.previousSibling);
  let tBody = nextNode(tab.firstChild);
  let lastNode = prevNode(tBody.lastChild);
  tBody.removeChild(lastNode);
  let firstNode = nextNode(tBody.firstChild);
  tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
  if (form.value.length > maxSize)
    form.value = form.value.substring(0, maxSize);
  else msg.innerHTML = maxSize - form.value.length;
}

function validate(form) {
  var result = true;
  if (
    !checkStringAndFocus(
      form.elements["f_imie"],
      "Wprowadź imię.",
      isWhiteSpaceOrEmpty
    )
  ) {
    result = false;
  }
  if (
    !checkStringAndFocus(
      form.elements["f_nazwisko"],
      "Wprowadź nazwisko.",
      isWhiteSpaceOrEmpty
    )
  ) {
    result = false;
  }
  if (
    !checkStringAndFocus(
      form.elements["f_email"],
      "Podaj właściwy e-mail",
      isEmailInvalid
    )
  ) {
    result = false;
  }
  if (
    !checkStringAndFocus(
      form.elements["f_kod"],
      "Wprowadź kod.",
      isWhiteSpaceOrEmpty
    )
  ) {
    result = false;
  }
  if (
    !checkStringAndFocus(
      form.elements["f_ulica"],
      "Wprowadź ulicę.",
      isWhiteSpaceOrEmpty
    )
  ) {
    result = false;
  }
  if (
    !checkStringAndFocus(
      form.elements["f_miasto"],
      "Wprowadź miasto.",
      isWhiteSpaceOrEmpty
    )
  ) {
    result = false;
  }
  return result;
}
