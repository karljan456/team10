// Function for checking if the user answered all questions 
function checkForm() {

    // Selecting all buttons with a name starting with "answer"
    let buttons = document.querySelectorAll('input[type="radio"][name^="answer"]');

    // Looping through each group of  buttons
    for (let i = 0; i < buttons.length; i++) {

        // Storing the current button name
        let name = buttons[i].getAttribute('name');

        // Storing the value if the button is checked  
        let checked = document.querySelector(`input[type="radio"][name="${name}"]:checked`);

        // Message if the button was not selected 
        if (!checked) {

            alert("Answer all the questions!");

            return false;

        }
    }

    return true;
}