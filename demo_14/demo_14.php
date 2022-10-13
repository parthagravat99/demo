<!DOCTYPE html>
<html>
    <head>
        <script src="demo_14.js"></script>
        <style>
           .grid-container {
                width: 100%;
                display: grid;
                grid-template-columns: auto auto auto auto;
                background-color: white;
            }
            .grid-item {
                position:relative;
                background-color: #ffffff;
                margin: 15px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 10px;
                cursor: pointer;

            }
            .grid-item:active{
                box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2), 0 6px 20px 0 rgba(255, 255, 255, 0.19);
                transform: translateY(4px);
            }
            .grid-item img{
               float:left;
               width:35%;
               height:100%;
               border-top-left-radius: 10px;
               border-bottom-left-radius: 10px;
            }

            .grid-item h3{
                margin:1px 1px 1px 37%;
            }

            .grid-item p{
                font-size:14px;
                margin:1px 4px 1px 37%;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 6; 
                -webkit-box-orient: vertical;
                text-align: justify;
                text-justify: inter-word;

                
            }
            .rating {
                position: absolute;
                bottom: 0px;
                right: 65%;
                background-color: black;
                color: white;
                font-weight: bold;
                padding:2px;
                
            }       
        </style>
    </head>
    <body onload="onLoadFunction()">
    <div class="grid-container">
        <!-- <div class="grid-item">
            <img src="download.png">
            <div class="rating">4.4</div>
            <h3>name of the movie</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat voluptate iusto nam, in optio animi, voluptatem necessitatibus alias maiores modi rerum dolores aut numquam laborum facere? Harum nulla vel cupiditate.</p>
        </div> -->
       
        
    </div>
    <!-- <button type="button" onclick="onLoadFunction()">Load more...</button>   -->
    </body>
</html>