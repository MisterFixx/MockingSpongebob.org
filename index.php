<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mocking Spongebob</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="assets/css/main.css">
    </head>
    <body>
        <header class="header">
            <h1>Mocking Spongebob</h1>
        </header>
        <a href="https://github.com/MisterFixx/MockingSpongebob.org" class="github-corner" aria-label="View source on Github" title="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill: #0f242e; color: white; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
        <main class="main">
            <div class="content">
                <section class="image-customizer">
                    <div><img src="http://mockingspongebob.org/Mocking_Spongebob" id="imageSrc"></div>
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
                            <option value="teal">Teal</option>
                            <option value="yellow">Yellow</option>
                            <option value="magenta">Magenta</option>
                            <option value="orange">Orange</option>
                            <option value="pink">Pink</option>
                        </select>
                        <br>
                        Blur background:
                        <input type="checkbox" id="imageBlur"/>
                        <br>
                        Random background:
                        <input type="checkbox" id="imageRandom"/>
                        <br>
                        Capitalize text:
                        <input type="checkbox" id="capitalizeText"/>
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
                    <p>Created by <b>Mister_Fix</b> & <b>LeonFagan71</b></p>
                    <p>Images served so far: <b>2,459</b></p>
                </section>
            </div>
        </main>
        <script type="text/javascript">
            function updateImage(){
                var imageText=document.getElementById("imageText").value.split(' ').join('_');
                var imageColor=document.getElementById("imageColor").value;
                var imageBlur=document.getElementById("imageBlur").checked;
                var imageRandom=document.getElementById("imageRandom").checked;
                var capitalizeText=document.getElementById("capitalizeText").checked;
                var url="https://mockingspongebob.org/";
                url+=imageText;
                if (imageColor!="white")url+="&color="+imageColor;
                if (imageBlur) url+="&blur";
                if (imageRandom) url+="&random";
                if (capitalizeText) url+="&capitalize"; 
                console.log(url);
                var imgSrc=document.getElementById("imageSrc");
                var imgSrcVal=document.getElementById("imageSrcVal");
                imgSrcVal.value=url;
                chageIcon(imgSrc, url);
            }
            function chageIcon(domImg,srcImage){
                var img = new Image();
                img.onload = function(){
                    // Load completed
                    domImg.src = this.src;
                };
                img.src = srcImage;
            }
            document.getElementById("imageText").addEventListener('change', updateImage);
            document.getElementById("imageColor").addEventListener('change', updateImage);
            document.getElementById("imageBlur").addEventListener('change', updateImage);
            document.getElementById("imageRandom").addEventListener('change', updateImage);
            document.getElementById("capitalizeText").addEventListener('change', updateImage);
        </script>
    </body>
</html>
