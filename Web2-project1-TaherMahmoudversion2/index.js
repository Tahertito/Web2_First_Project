var counter = 1;

//a class of the letter and their path 
function AlphabetObject(letter, path) {
    this.letter = letter;
    this.path = path;
}
//a dictionary of all the letters and their paths
var alphabets =
    [new AlphabetObject('A', "pictures\\A.jpg"), new AlphabetObject('B', "pictures\\B.jpg"),
    new AlphabetObject('C', "pictures\\C.jpg"), new AlphabetObject('D', "pictures\\D.jpg"),
    new AlphabetObject('E', "pictures\\E.jpg"), new AlphabetObject('F', "pictures\\F.jpg"),
    new AlphabetObject('G', "pictures\\G.jpg"), new AlphabetObject('H', "pictures\\H.jpg"),
    new AlphabetObject('I', "pictures\\I.jpg"), new AlphabetObject('J', "pictures\\J.jpg"),
    new AlphabetObject('K', "pictures\\K.jpg"), new AlphabetObject('L', "pictures\\L.jpg"),
    new AlphabetObject('M', "pictures\\M.jpg"), new AlphabetObject('N', "pictures\\N.jpg"),
    new AlphabetObject('O', "pictures\\O.jpg"), new AlphabetObject('P', "pictures\\P.jpg"),
    new AlphabetObject('Q', "pictures\\Q.jpg"), new AlphabetObject('R', "pictures\\R.jpg"),
    new AlphabetObject('S', "pictures\\S.jpg"), new AlphabetObject('T', "pictures\\T.jpg"),
    new AlphabetObject('U', "pictures\\U.jpg"), new AlphabetObject('V', "pictures\\V.jpg"),
    new AlphabetObject('W', "pictures\\W.jpg"), new AlphabetObject('X', "pictures\\X.jpg"),
    new AlphabetObject('Y', "pictures\\Y.jpg"), new AlphabetObject('Z', "pictures\\Z.jpg")];
//a class object for the interactoins
function InteractionDataObj(eventType, eventTarget, eventTime) {
    this.eventType = eventType;
    this.eventTarget = eventTarget;
    this.eventTime = eventTime;

}

///get the generat Button then add its click event
var generatorButton = document.getElementById("generator");
generatorButton.addEventListener("click", function (e) {
    //adding events to the local storag
    var eventdata = new InteractionDataObj(e.type, e.target.id, new Date());

    localStorage.setItem(counter, JSON.stringify(eventdata));
    counter++;
    ///////////////
    var errorMessage = document.getElementById("errorMessage");
    var numberOfLetters = document.getElementById("input");
    document.getElementById("showImg").style.display = "none";
    if ((!numberOfLetters.value || numberOfLetters.value > 26)) {
        numberOfLetters.style.borderColor = "red";
        errorMessage.textContent = "Error!, Not a Valid Input";
    }
    else {
        console.log("fired");
        numberOfLetters.style.borderColor = "green";
        errorMessage.textContent = "";
        var buttonsContainer = document.getElementById("buttonsContainer");
        //function to remove all the old child elements of "buttonsContainer" div.            
        RemoveChildElements(buttonsContainer);
        //adding the buttons and their eventListeners
        for (var i = 0; i < numberOfLetters.value; i++) {
            var newButton = document.createElement("button");
            var random = GetRandomNumber();

            newButton.setAttribute("class", "btn-danger");
            newButton.setAttribute("id", random);
            newButton.setAttribute("value", alphabets[random].letter);//GetRandomNumber() from 1 to 26                    
            var newtext = document.createTextNode(alphabets[random].letter);

            newButton.appendChild(newtext);
            buttonsContainer.appendChild(newButton);

            newButton.addEventListener("click", function (e) {

                this.setAttribute("class", "btn-success");
                console.log(e.target.id);
                console.log(alphabets[e.target.id].path);
                document.getElementById("showImg").setAttribute("src", alphabets[e.target.id].path);
                document.getElementById("showImg").style.display = ("block");
                //adding events to the local storag
                var eventdata = new InteractionDataObj(e.type, e.target.value, new Date());
                localStorage.setItem(counter, JSON.stringify(eventdata));
                counter++;
                ///////////////
            });

        }
    }
});

// events
window.addEventListener("load", function (e) {


    var eventdata = new InteractionDataObj(e.type, e.target, new Date());
    //this.console.log("load"+e.target);

    localStorage.setItem(counter, JSON.stringify(eventdata));
    counter++;
  // setInterval(SendToServer, 5000);


});
window.addEventListener("unload", function (e) {
    var eventdata = new InteractionDataObj(e.type, e.target, new Date());
   // this.console.log("unload"+e.target );
    localStorage.setItem(counter, JSON.stringify(eventdata));
    counter++;

});

function RemoveChildElements(e) {
    while (e.firstChild) {
        e.removeChild(e.firstChild);
    }


}
function GetRandomNumber() {
    return Math.floor(Math.random() * (26 - 2) + 1);
}


// clear local storage after 5 seconds
// function ClearLocaStorage() {
//     console.log("cleared1");
//     localStorage.clear();
// }
function SendToServer() {

    $.ajax({
        "type": "post",
        "url": "http://localhost:8080/dashboard/Web2-project1-TaherMahmoud/index.php",
        "data": { "Data": JSON.stringify(localStorage) },
        "success": function (response) {
            console.log(response);
            console.log(typeof(response));
            // localStorage.clear();
            // console.log("cleared");
        }


    });


}