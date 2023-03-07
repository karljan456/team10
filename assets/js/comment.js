//This function prevents leaving empty comments
function commentlen(){
    let comment_text = (document.comform.comment_text.value).trim();
    if (comment_text.value == ""){
        alert("You can't leave an empty comment!");
        return false;
    }
}