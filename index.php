<?php echo '<p>Hello World</p>'; ?> 
<iframe style="height:600px;width:600px;" src="https://sfmc.stylelabsdev.com/en-us/sitecore-plugin/approved-assets"></iframe>

<script src="https://apis.google.com/js/api.js"></script>
<script>
  window.addEventListener("message", function(event){
    if(event.data.__type) {
      alert(JSON.stringify(event.data));
      chosen(event.data.public_link);
    }
  }, false);

function chosen(imgId) {

  var sdk = new window.sfdc.BlockSDK(); //initalize SDK
  sdk.setContent(""); //resets content block

  var fit = document.getElementById('scaleFit').checked;
  var acenter = document.getElementById('alignCenter').checked;

  selectedImageId = imgId;

  if(imgId != ""){
    image = document.getElementById(imgId).src;
  }

  if(fit){
    sdk.setContent("<img width='100%' src='" + image + "'/>");

  }else{

    if(acenter){
        sdk.setContent("<center><img src='" + image + "'/></center>");

      }else{
      sdk.setContent("<img src='" + image + "'/>");

    }
  }
}

    </script>
