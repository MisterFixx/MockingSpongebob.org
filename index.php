<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mocking Spongebob</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css"  href="css/main.css">
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
