
function hideShowFieldByRadio(radionName, divOne,divTwo)
{
    radioValue = $("input[name='" + radionName + "']:checked").val();
    if(radioValue == 1){
        // $('#w0').yiiActiveForm('remove', divTwo);
        document.getElementById(divOne).style.display= "block";
        document.getElementById(divTwo).style.display= "none";
    }
    else{
        document.getElementById(divTwo).style.display= "block";
        document.getElementById(divOne).style.display= "none";
        // $('#w0').yiiActiveForm('remove', divOne);
    }
}