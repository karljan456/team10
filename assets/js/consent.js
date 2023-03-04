// Function to get the value of a cookie
function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
  }
  
  // Function to set a cookie with an expiration date
  function setCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // days in milliseconds
    var expires = "; expires=" + date.toGMTString();
    document.cookie = name + "=" + value + expires + "; path=/";
  }
  
  // Check if the user has already given consent
  if (getCookie("privacy_policy_consent") == "true") {
    // User has already given consent
    // You can perform any necessary actions here
  } else {
    // User has not given consent, display the consent message as a sticky bar alert in the footer
    var consentBar = document.createElement("div");
    consentBar.classList.add("consent-bar");
    consentBar.innerHTML = "<p>We care about your privacy. Do you accept our <a href='/privacy-policy'>privacy policy</a>?</p><button class='consent-accept'>Accept</button><button class='consent-reject'>Reject</button>";
    document.body.appendChild(consentBar);
  
    // Disable the consent bar for 30 days if the user accepts the privacy policy
    consentBar.querySelector(".consent-accept").addEventListener("click", function() {
      setCookie("privacy_policy_consent", "true", 30);
      consentBar.style.display = "none";
    });
  
    // Block access to the site if the user rejects the privacy policy
    consentBar.querySelector(".consent-reject").addEventListener("click", function() {
      window.location.href = "/privacy-policy";
    });
  }
  