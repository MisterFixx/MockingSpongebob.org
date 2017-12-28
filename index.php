<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mocking Spongebob</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body,html{margin:0px;padding:0px;background:#eeeeee;}
            #container{
                position:fixed;
                top:0px;
                left:0px;
                right:0px;
                margin:auto;
                bottom:0px;
                width:80%;
                height:70%;
                min-height:300px;
                
                z-index:100;
            }
            #header{
                position:fixed;
                top:0px;
                left:0px;
                right:0px;
                height:100px;
                width:100%;
                z-index:1000;
                font-size:30px;
                padding:10px;
            }
            #botright{
                position:fixed;
                bottom:10px;
                right:10px;
                width:180px;
                height:10px;
            }
            #botleft{
                position:fixed;
                bottom:10px;
                left:10px;
                height:30px;
                width:300px;
            }
            #cont-top, #cont-bottom{
                width:100%;
                height:50%;
                background:white;
            }
            #cont-bottom div{
                float:left;width:50%;height:100%;
            }
            #cont-bottom img{
                max-height:100%;
            }
            @media (max-width:700px){
                #container{
                    width:95%;
                    height:80%;
                }
            }
        </style>
    </head>
    <body>
    <div id="header">Mocking Spongebob</div>
        <div id="container">
            <div id="cont-top">
                <p>Visit <a href="http://mockingspongebob.org/Fucking_Nigger">mockingspongebob.org/{text}</a> to view your very own mocking Spongebob.
                <br>Additionally, you can replace spaces with "+" or "_" in order to make the URLs compatible with certain forums software or you can append ".jpg" to the end of the URL.</p>
                <p>Add &amp;color=red,black,blue,green,white to change the text color.</p>
                <p>Add &amp;blur to blur the background.</p>
                <p>Add &amp;random to choose a random background image.</p>
                
                <br>
                <small>#bansxtanna</small>
            </div>
            <div id="cont-bottom">
                <div>&nbsp;&nbsp;<img src="/Mocking Spongebob" width="90%" id="imageSrc"></img></div>
                <div>
                    Text: <input type="text" id="imageText">
                    <br>
                    Text Color:
                        <select id="imageColor">
                            <option value="white">White</option>
                            <option value="black">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    <br>
                    Blur background:
                        <input type="checkbox" id="imageBlur"/>
                    <br>
                    Random background:
                        <input type="checkbox" id="imageRandom"/>
                    <br><br><br>
                    <textarea type="text" readonly style="width:90%;height:50px;" id="imageSrcVal"placeholder="Please use the options above"></textarea>
                </div>
            
            </div>
        </div>
        <div id="botleft">
            Created by Mister_Fix<br>More added by LeonFagan71
        </div>
        <div id="botright">
                <i><b>Images served so far: 1688</b></i>
        </div>
        <script type="text/javascript">
        function updateImage(){
            var imageText=document.getElementById("imageText").value.split(' ').join('_');
            var imageColor=document.getElementById("imageColor").value;
            var imageBlur=document.getElementById("imageBlur").checked;
            var imageRandom=document.getElementById("imageRandom").checked;
            var url="https://mockingspongebob.org/";
            url+=imageText;
            if (imageColor!="white")url+="&color="+imageColor;
            if (imageBlur) url+="&blur";
            if (imageRandom) url+="&random";
            console.log(url);
            var imgSrc=document.getElementById("imageSrc");
            var imgSrcVal=document.getElementById("imageSrcVal");
            imgSrcVal.value=url;
            chageIcon(imgSrc, url);
        }
        function chageIcon(domImg,srcImage){
            var img = new Image();
            img.onload = function()
            {
                // Load completed
                domImg.src = this.src;
            };
            img.src = srcImage;
        }
        
        
        
        document.getElementById("imageText").addEventListener('change', updateImage);
        document.getElementById("imageColor").addEventListener('change', updateImage);
        document.getElementById("imageBlur").addEventListener('change', updateImage);
        document.getElementById("imageRandom").addEventListener('change', updateImage);
        
        </script>
    </body>
</html>
