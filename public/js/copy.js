function toClipboard() {
    $('#tokenId').removeAttr('disabled');  
    $('#tokenId').select();
    document.execCommand("copy");
    $('#tokenId').attr('disabled','disabled');
  } 