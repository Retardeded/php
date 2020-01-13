
function onload2() {
   createStyles();
   checkCookie();
}

function createStyles() {
   var style = document.getElementsByTagName("link");
   var howMany = style.length;
   var styles = document.getElementById("styles");

   for (i = 0 ; i < howMany ; i++) {
      var element = document.createElement('a');
      var styleName = style[i].title;

      element.innerHTML = styleName;
      element.setAttribute("onclick", "chooseStyle(\"" + styleName + "\")");

      styles.appendChild(element);
      styles.appendChild(document.createElement('br'));
   }
}


function chooseStyle(styleName) {
   var styles = document.getElementsByTagName("link");
   var howMany = styles.length;
	for (var i = 0 ; i < howMany ; i++) {
      var style = styles[i];
      if (style.getAttribute("title") == styleName) {
         style.disabled = false;
         console.log(style.getAttribute("title") + " enabled");
      } else {
         style.disabled = true;
         console.log(style.getAttribute("title") + " disabled");
      }
	}

   setCookie("style", styleName, 365);
}

function checkCookie() {
   var cookie = loadCookie("style");
   chooseStyle(cookie);
}

function setCookie(styleName, style, days) {
   var date = new Date();
   date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
   var expires = "expires=" + date.toUTCString();
   document.cookie = styleName + "=" + style + ";" + expires + "; path=/";
 }

function loadCookie(styleName) {
   var style = "";
   var name = styleName + "=";
   var cookie = decodeURIComponent(document.cookie);
   var cookies = cookie.split(';');
   for (var i = 0 ; i < cookies.length ; i++) {
      var part = cookies[i];
      while (part.charAt(0) == ' ') {
         part = part.substring(1);
      }
      if (part.indexOf(name) == 0) {
         style = part.substring(name.length, part.length);
         break;
      }
   }
   return style;
}
