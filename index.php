<script src="https://apis.google.com/js/api.js"></script>
<script src="blocksdk.js"></script>

<script>
  	var sdk = new window.sfdc.BlockSDK(); //initalize SDK
  
  sdk.setBlockEditorWidth('600px');
  sdk.setContent('<center><img width="100%" src="https://sfmc-giphy.herokuapp.com/giphy.gif" /></center>'); //resets content block
  
  window.addEventListener("message", function(event){
    if(event.data.__type) {
      //alert(JSON.stringify(event.data));
      chosen(event.data.public_link);
    }
  }, false);

function chosen(imgId) {

  var sdk = new window.sfdc.BlockSDK(); //initalize SDK
  sdk.setBlockEditorWidth('600px');
  sdk.setContent(""); //resets content block

  /*var fit = document.getElementById('scaleFit').checked;
  var acenter = document.getElementById('alignCenter').checked;*/

  /*selectedImageId = imgId;

  if(imgId != ""){
    image = document.getElementById(imgId).src;
  }*/


    sdk.setContent("<img width='100%' src='" + imgId + "'/>");
/*
  }else{

    if(acenter){
        sdk.setContent("<center><img src='" + image + "'/></center>");

      }else{
      sdk.setContent("<img src='" + image + "'/>");

    }
  }**/
}

</script>
<iframe style="height:100%;width:600px;" src="https://sfmc.stylelabsdev.com/en-us/sitecore-plugin/approved-assets"></iframe>
