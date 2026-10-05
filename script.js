// function to copy the link + the value to the clipboard
function copy(value) {
    //format the link
    value = window.location + value
    //copy it to el clipboard
    navigator.clipboard.writeText(value)
}


// function to style the msgbox
function style(msg, side) {
    //default styling
    msg.style.color = "black";
    msg.style.fontSize = "22px";
    msg.style.padding = "10px";
    msg.style.margin = "10px";
    msg.style.borderRadius = "10px";
    msg.style.width = "200px";
    //left side specific styling
    if (side==="left") {
        msg.style.background = "white";
    } else { //right side
        msg.style.background = "deepskyblue";
        msg.style.marginLeft = "auto";
    }
    //return final styled msg box
    return msg;
}

//variable to store open state
let chatOpen = false;

//set up the chat box so that it pops up when the user clicks it
//get the chat boxes
let a = document.getElementsByClassName("chattop");
let b = document.getElementsByClassName("chat");
if (a.length >0 && b.length >0) {
    //get the first element in each
    a = a[0];
    b = b[0];
    //get the input box
    let c = document.getElementById("chatbox");

    //listen for title being clicked to close/open chat box
    a.addEventListener("click", function() {
        chatOpen = !chatOpen;
        //if open, open it
        if (chatOpen) {
            b.style.visibility = "visible";
            b.style.height = "460px";
        } else { //if closed, close it
            b.style.visibility = "hidden";
            b.style.height = "0";
        }
    });

    //add listener to the chatbox input
    c.addEventListener("keypress", function(e) {
        //when user enters and msg box not empty
        if (e.key === "Enter" && c.value !== "") {
            //save users msg and reset box
            let msg = c.value;

            c.value = "";
            //create a message
            let msgBox = document.createElement('div');
            msgBox.textContent = msg;
            msgBox = style(msgBox, "left");

            //find the most recent msg
            let secondChild = b.firstElementChild.nextElementSibling;

            //append the new message after that one
            b.insertBefore(msgBox, secondChild);


            // create a response
            let responses = [
                "Sorry, I cannot fulfil that request.",
                "Yeah I agree.",
                "Hmmm...",
                "I don't know how to answer that.",
                "Could you try asking that differently?",
                "That's a good question!",
                "Thinking...",
                "It could be, yeah.",
                "I dont understand what you're saying.",
                "Other languages are being developed.",
                "No.",
                "Google is free.",
                "Hello",
                "Goodbye",
                "That's not a good question!",
                "I'm sorry.",
                "Its not true.",
                "Please can you repeat that again?",
                "Adios"
            ];


            // pick a random response
            let randomResponse = responses[Math.floor(Math.random() * responses.length)];

            msgBox = document.createElement('div');
            msgBox.textContent = randomResponse;
            msgBox = style(msgBox, "right");

            // find the most recent msg
            secondChild = b.firstElementChild.nextElementSibling;

            // append the new message after that one
            b.insertBefore(msgBox, secondChild);

            //find the most recent msg
            secondChild = b.firstElementChild.nextElementSibling;

            //append the new message after that one
            b.insertBefore(msgBox, secondChild);
        }
    })
}