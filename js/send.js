function formsub2() {
    if (document.getElementById("message").value != '') {
        document.getElementById("messageform2").submit();
    } else {
        alert("message cannot be empty");
    }
}
//display character count
let message = document.getElementById("message");
let characterCounter = document.getElementById("char_count");
const maxNumOfChars = 1024;
const countCharacters = () => {
    let numOfEnteredChars = message.value.length;
    let counter = maxNumOfChars - numOfEnteredChars;
    characterCounter.textContent = "*" + counter + " character remaining";
    if (counter < 50) {
        characterCounter.style.color = "red";
    } else if (counter < 200) {
        characterCounter.style.color = "orange";
    } else {
        characterCounter.style.color = "white";
    }
};
message.addEventListener("input", countCharacters);