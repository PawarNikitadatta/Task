let outputscreen = document.getElementById('outputscreen');
butttons = document.querySelectorAll('button');
let screenvalue = ''; //screen value is the value inside the input box
//after the button is clicked the text on button will be returned by this function
for (item of butttons) {
    item.addEventListener('click', (e) => {
        butttonText = e.target.innerText;
        if (butttonText == '*') {
            screenvalue += butttonText; //we are using + because with this we can add multiple * on output screen
            outputscreen.value = screenvalue;
        } else if (butttonText == 'C') {
            screenvalue="";
            outputscreen.value =screenvalue; //clearing output screen
        }else if(butttonText=='='){
            outputscreen.value=eval(screenvalue);//evaluate value 
        }else if(butttonText=='D'){
            outputscreen.innerText = outputscreen.innerText.slice(0, -1);       
        }
        else{
            screenvalue += butttonText; 
            outputscreen.value = screenvalue;
        }
    })
}
/*buttons.map( button => {
    button.addEventListener('click', (e) => {
        switch(e.target.innerText){
            case 'C':
                outputscreen.innerText = '';
                break;
            case '=':
                try{
                    outputscreen.innerText = eval(outputscreen.innerText);
                } catch {
                    outputscreen.innerText = "Error"
                }
                break;
            case '←':
                if (outputscreen.innerText){
                   outputscreen.innerText = display.innerText.slice(0, -1);
                }
                break;
            default:
                display.innerText += e.target.innerText;
        }
    });
});*/