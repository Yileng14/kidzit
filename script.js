// Button DOM
let btn = document.getElementById("btn");
 
// Adding event listener to button
btn.addEventListener("click", () => {
 
    // Fetching Button value
    let btnValue = btn.value;
 
    // jQuery Ajax Post Request
    $.post('action.php', {
        btnValue: btnValue
    }, (response) => {
        // response from PHP back-end
        console.log(response);
    });
});