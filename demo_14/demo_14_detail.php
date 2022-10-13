<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: rgba(255, 255, 255, 0.7);
                background-blend-mode: overlay;
            }
            .container{
                width:70%;
                padding: 25px;
                
            }
            .container h1{
                font-size:50px;
                margin-top: 0;
                margin-bottom: 0px;

            }
            .container p{
                margin-top: 0;
                text-align: justify;
                text-justify: inter-word;
            } 
            .container img{
                float:left;
                width:33%;
                margin:0px 4% 2% 0px;
            }
            .container h2{
                margin-top: 0;
                margin-bottom: 0px;
                
            }
            .crew{
                display:grid;
                grid-template-columns: auto auto auto;
                
            }
            .crew h2{
                grid-column: 1 / span 3;
            }
            .cast{
                display:grid;
                grid-template-columns: auto auto auto auto auto auto auto auto;
                padding:3px;
            }
            .cast h2{
                grid-column: 1 / span 8;
            }
            .pics{
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;

                margin:3px;
                min-width:96px;
                min-height:146px;

            }
            .pics img{
                object-fit:cover;
                width:100%;
                height:80%;
                border-radius:10px;
            }
            .pics p{
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                font-size:12px;
            
        

            }
        </style>
        <script src="demo_14.js"></script>
    </head>
    <body onload="onLoadFunction2()">
    
    
        <div class="container">
            <!-- <img src="download.png">
            <h1>name of movie</h1>
            <h2>overview:</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptatem facilis sequi! Possimus ipsa, aut optio ab velit soluta minus! Laudantium architecto repudiandae tenetur tempore ratione ea amet facilis error?Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt reprehenderit maiores libero, qui dolorem tempore aspernatur iste beatae fuga quisquam sunt nostrum soluta placeat consectetur iure quod. Incidunt, tempore voluptas!Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt reprehenderit maiores libero, qui dolorem tempore aspernatur iste beatae fuga quisquam sunt nostrum soluta placeat consectetur iure quod. Incidunt, tempore voluptas!Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt reprehenderit maiores libero, qui dolorem tempore aspernatur iste beatae fuga quisquam sunt nostrum soluta placeat consectetur iure quod. Incidunt, tempore voluptas!Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptatem facilis sequi! Possimus ipsa, aut optio ab velit soluta minus! Laudantium architecto repudiandae tenetur tempore ratione ea amet facilis error?</p>
            <div class="person">
                <h2>persons:</h2>
                <p>erfgegb:<br>kjfgsdj dkfgldkj</p>
                <p>gergerge:<br>sdgdkgj lkdglsk</p>
                <p>bfbvfbfdb:<br>gdnsjhj sdfkgv</p>
                <p>dfbdfsb:<br>gdnsjhj sdfkgv</p>
                <p>fdbsdfs:<br>gdnsjhj sdfkgv</p>
                <p>fdbsdfs:<br>gdnsjhj sdfkgv</p>
            </div>
            <div class="cast">
                <h2>cast:</h2>
                <div class="pics"><img src="download.png"><p>kjgldj jdfgkldl</p></div>
                <div class="pics"><img src="download.png"><p>kjgldj jdfgkldl</p></div>
                <div class="pics"><img src="download.png"><p>kjgldj jdfgkldl</p></div>
                <div class="pics"><img src="download.png"><p>kjgldj jdfgkldl</p></div>
                <div class="pics"><img src="download.png"><p>kjgldj jdfgkldl</p></div>
                <div class="pics"><img src="download.png"><p>kjgldj jdfgkldl</p></div>
                </div> -->
        </div>
    </body>
</html>