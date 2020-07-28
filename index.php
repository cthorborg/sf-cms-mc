<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://apis.google.com/js/api.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="blocksdk.js"></script>
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
      <input type="button" id="content_edit" value="Edit Content"></input>
      <input type="button" id="content_set" value="Set with Default Style"></input>
      <input type="button" id="content_set1" value="Set with Style 1"></input>
      <input type="button" id="content_set2" value="Set with Style 2"></input><br />
      <!--<input type="text" id="search_term"><span class="itemlist" style="padding-left: 10px;padding-right: 10px;"></span></input>
      <input type="checkbox" id="scaleFit" onclick="javascript:chosen('')" value="Yes" ><span class="itemlist" style="padding-left: 10px;padding-right: 10px;">Scale to fit</span></input>
      <input type="checkbox" id="alignCenter" onclick="javascript:chosen('')" value="Yes" ><span class="itemlist" style="padding-left: 10px;padding-right: 10px;">Align to Center</span></input>-->
    </p>
    <div class="list-group" id="list-style" role="stylelist">
    </div>
    <div>
      <div class="list-group" id="list-tab" role="tablist">
      </div>
      <!-- <input type="button" id="Next" value="More"><span class="itemlist" style="padding-left: 10px;padding-right: 10px;"></span></input><br /> -->
      </div>

    <div id="div1"></div>
    <script>
      var selectedImageId, image;
      var offset = 0;
      var term = "";
      var originals = {};
  	  var base_url = "https://win19ss-test1-165c68767ee-16-16e60dfeda0.force.com/capricornjuices"
      var fileNames = new Array();

      $(document).ready(function(){

        /*
        	var sdk = new window.sfdc.BlockSDK(); //initalize SDK
          sdk.
          ('<img width="50px" src="https://sfmc-giphy.herokuapp.com/giphy.gif" />'); //resets content block
        */
        // get the trending gifs

        //Get styles from folder
        $.ajax({
          url: "/styles/",
          complete: function(data){
             $(data).find("td > a").each(function(){
                if(openFile($(this).attr("href"))){
                    fileNames.push($(this).attr("href"));
                }
             });
          }
        });
        console.log(fileNames);

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
          	var json_data = JSON.parse(data.responseText);
          	var i;

            originals = json_data;

          	console.log("json data: " + originals);
        	  console.log("test data:" + base_url.concat(originals.items[0].contentNodes.bannerImage.url));

          	for (i in json_data.items) {
          		$("#list-tab").append("<a class=\"list-group-item list-group-item-action ctstyle itemlist\" id=\"list-home-list\" data-toggle=\"list\" href=\"#list-home\" role=\"tab\" aria-controls=\"home\" onclick=\"javascript:edit()\"><image width=\"20%\" id=\"image" + "1" + "\" src=\""+base_url.concat(originals.items[i].contentNodes.bannerImage.url)+"\" /> <span style=\"padding-left: 20px\">"+base_url.concat(originals.items[i].contentNodes.bannerImage.altText)+"</span></a>")
          	}
          }});
        }

        $( "#content_set" ).click(function() {
          chosen();
        });

        $( "#content_set1" ).click(function() {
          chosen(1);
        });

        $( "#content_set2" ).click(function() {
          chosen(2);
        });

      	$( "#content_edit" ).click(function() {
          edit();
          });
        });

        function edit() {
          $("#content_text").val(originals.items[0].contentNodes.bannerImage.fileName);
          $("#content_heading").val(originals.items[0].contentNodes.bannerImage.altText);
        }

        function chosen(style) {
          var sdk = new window.sfdc.BlockSDK(); //initalize SDK
          sdk.setContent(""); //resets content block

          if(style == 1){
    	  	  var content = '<div style="width:100%;"><img style="width:100px;height:auto;" src="img_url">content_text</div>';
        	  content = content.replace("content_heading",$("#content_heading").val());
        	  content = content.replace("content_text",$("#content_text").val());
        	  content = content.replace("img_url",base_url.concat(originals.items[0].contentNodes.bannerImage.url));
            sdk.setContent(content);
          }
          else if(style == 2) {
            var content = '<div style="width:100%;">content_heading<img style="width:100px;height:auto;" src="img_url"></div>';
            content = content.replace("content_heading",$("#content_heading").val());
            content = content.replace("content_text",$("#content_text").val());
            content = content.replace("img_url",base_url.concat(originals.items[0].contentNodes.bannerImage.url));
            sdk.setContent(content);
          }
          else {
            var content = '<div style="width:100%;"><img style="width:100px;height:auto;" src="img_url"></div>';
            content = content.replace("content_heading",$("#content_heading").val());
            content = content.replace("content_text",$("#content_text").val());
            content = content.replace("img_url",base_url.concat(originals.items[0].contentNodes.bannerImage.url));
            sdk.setContent(content);
          }
        }
    </script>
  </body>
</html>
