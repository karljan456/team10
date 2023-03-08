//This function prevents leaving empty comments
function commentlen() {
    let comment_text = tinymce.activeEditor.getContent().replace(/^\s+|\s+$/g, '');
    if (comment_text == "") {
      alert("You can't leave an empty comment!");
      return false;
    }
    return true;
  }