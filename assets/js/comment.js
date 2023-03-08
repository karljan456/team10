//This function prevents leaving empty comments
function commentlen() {
    let comment_text = document.comform.comment_text.value.trim();
    if (comment_text == "") {
      alert("You can't leave an empty comment!");
      return false;
    }
    return true;
  }