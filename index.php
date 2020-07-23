<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://apis.google.com/js/api.js"></script>
<style>
 .ctstyle{
  font-family: Verdana;
  font-size: 14px;

 }

.itemlist{
 font-size: 12px;
}
);
</style>

</head>

<body>


<p class="ctstyle" align="center">
<img style="width:200px;height:auto;" src="icon.png" />
<br />

Select an image to from Salesforce CMS
<br />
<input type="text" id="content_heading"></input><br />
<textarea id="content_text" name="content_text" rows="4" cols="50"></textarea><br />
<input type="button" id="content_set" value="Set Content"></input><br />
<!--<input type="text" id="search_term"><span class="itemlist" style="padding-left: 10px;padding-right: 10px;"></span></input>
<input type="checkbox" id="scaleFit" onclick="javascript:chosen('')" value="Yes" ><span class="itemlist" style="padding-left: 10px;padding-right: 10px;">Scale to fit</span></input>
<input type="checkbox" id="alignCenter" onclick="javascript:chosen('')" value="Yes" ><span class="itemlist" style="padding-left: 10px;padding-right: 10px;">Align to Center</span></input>-->
</p>




  <div >
    <div class="list-group" id="list-tab" role="tablist">
    </div>

    <!-- <input type="button" id="Next" value="More"><span class="itemlist" style="padding-left: 10px;padding-right: 10px;"></span></input><br /> -->



  </div>

</div>
<div id="div1"></div>




 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



	<script src="blocksdk.js"></script>

  <script>
	
    var selectedImageId, image;
    var offset = 0;
    var term = "";
    var originals = {};
	  var base_url = "https://win19ss-test1-165c68767ee-16-16e60dfeda0.force.com/capricornjuices"

$(document).ready(function(){

/*
	var sdk = new window.sfdc.BlockSDK(); //initalize SDK
  sdk.
  ('<img width="50px" src="https://sfmc-giphy.herokuapp.com/giphy.gif" />'); //resets content block
*/



// get the trending gifs

fetchGifs();

function fetchGifs() {

  /*var apiurl = "";

  apiurl = "https://api.giphy.com/v1/gifs/trending?api_key=zY2jNXB6UERsJOv9QweHDlhwn7dU32bO&limit=10&offset="+offset+"&rating=G";
  $.ajax({url: apiurl, success: function(result){
    for (i = 0; i < result.data.length; i++) { 
    if (result.data[i].images.preview_gif['url'] && result.data[i].images.original['webp'] ) {
        $("#list-tab").append("<a class=\"list-group-item list-group-item-action ctstyle itemlist\" id=\"list-home-list\" data-toggle=\"list\" href=\"#list-home\" role=\"tab\" aria-controls=\"home\" onclick=\"javascript:chosen('image" + result.data[i].id + "')\"><image width=\"20%\" id=\"image" + result.data[i].id + "\" src=\""+result.data[i].images.preview_gif['url']+"\" /> <span style=\"padding-left: 20px\">"+result.data[i].title+"</span></a>")
        originals["image"+result.data[i].id] = result.data[i].images.original['webp'];
      }
    }
  }});*/
	  
$.ajax({url: "example.js", complete: function(data) {
	
	originals = JSON.parse(data.responseText);
	
	console.log(data);
	console.log(originals);
	  console.log(base_url.concat(originals.items[0].contentNodes.bannerImage.url));	

   }});
}
								   
$( "#content_set" ).click(function() {
  chosen();
});

});
	  
	  function chosen() {

  var sdk = new window.sfdc.BlockSDK(); //initalize SDK
  sdk.setContent(""); //resets content block


  if(true){
	 		  
																				  
										 
	  	  var content = '<div style="width:100%;background-color:red;">text_string<img style="width:100px;height:auto;" src="img_url"></div>';
	  content = content.replace("text_string",originals.items[0].contentNodes.bannerImage.altText);
	  content = content.replace("img_url",base_url.concat(originals.items[0].contentNodes.bannerImage.url));
    sdk.setContent(content);
	
//sdk.setContent("<div>This is a test to input text as well as an image <br><img width='100%' src='" + image + "'/></div>");

  }else{

    if(acenter){
        sdk.setContent("<div>This is a test to input text as well as an image <br><center><img src='" + image + "'/></center></div>");

      }else{
      sdk.setContent("<div>This is a test to input text as well as an image <br><img src='" + image + "'/></div>");

    }
  }
}
    </script>
</body>
</html>
