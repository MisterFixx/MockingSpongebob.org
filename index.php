<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mocking Spongebob</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="css/main.css">
    </head>
    <body>
        <header class="header">
            <h1>
                Mocking Spongebob
            </h1>
        </header>
        <main class="main">
            <div class="content">
                <section class="image-customizer">
                    <div><img src="http://mockingspongebob.org/Mocking_Spongebob" id="imageSrc"></img></div>
                    <div>
                        Text: <input type="text" id="imageText" value="mocking spongebob">
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
                        <br>
                        <br>
                        <textarea type="text" readonly id="imageSrcVal"placeholder="Please use the options above"></textarea>
                    </div>
                </section>
                <hr>
                <section class="instructions">
                    <p>Visit <span class="code"><a href="http://mockingspongebob.org/text">mockingspongebob.org/{text}</a></span> to view your very own mocking Spongebob.</p>
                    <p>Additionally, you can replace spaces with <span class="code">+</span> or <span class="code">_</span> in order to make the URLs compatible with certain forums software or you can append <span class="code">.jpg</span> to the end of the URL.</p>
                    <ul>
                        <li>Add <span class="code">&amp;color=red, black, blue, green or white</span> to change the text color.</li>
                        <li>Add <span class="code">&amp;blur</span> to blur the background.</li>
                        <li>Add <span class="code">&amp;random</span> to choose a random background image.</li>
                    </ul>
                </section>
                <hr>
                <section class="credits">
                    <p>
                        Created by <b>Mister_Fix</b>
                        <br>
                        More added by <b>LeonFagan71</b>
                    </p>
                    <p>
                        Images served so far: <b>1688</b>
                    </p>
                </section>
            </div>
        </main>
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
