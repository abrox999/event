document.getElementById("frm").addEventListener("submit", function (event) {
  event.preventDefault();

  var inputs = document.querySelectorAll(
    "#frm input[required], #frm textarea[required]"
  );
  var allFieldsFilled = true;

  inputs.forEach(function (input) {
    if (input.value.trim() === "") {
      allFieldsFilled = false;
      return;
    }
  });

  if (allFieldsFilled) {
    send();
  } else {
    alert("Please fill out all required fields.");
  }
});

function send() {
  emailjs
    .send("service_k5dk2th", "template_rydtvgh", {
      name: document.querySelector("#name").value,
      contact: document.querySelector("#contact-number").value,
      email: document.querySelector("#contact-email").value,
      type: document.querySelector("#event-type").value,
      date: document.querySelector("#date").value,
      venue: document.querySelector("#venue").value,
      guest: document.querySelector("#num-guests").value,
      time: document.querySelector("#timing").value,
      message: document.querySelector("#message").value,
    })
    .then(
      (response) => {
        document.getElementById("popupopen").style.display = "flex";
      },
      (error) => {
        document.getElementById("popupfail").style.display = "flex";
      }
    );
}
