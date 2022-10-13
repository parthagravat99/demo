// const baseLink = https://api.themoviedb.org/3/configuration?api_key=b307cf9e515843556509251dafacbdcf;
// credits = https://api.themoviedb.org/3/movie/634649/credits?api_key=b307cf9e515843556509251dafacbdcf;
// individual movie = https://api.themoviedb.org/3/movie/616037?api_key=b307cf9e515843556509251dafacbdcf;
var page=1;
function onLoadFunction(){
    mainDiv = document.getElementsByClassName("grid-container");
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response=JSON.parse (this.responseText);
            var results = response.results;

            results.forEach(movie => {

                const division = document.createElement("div");
                division.className = "grid-item";
        

                const image = document.createElement("img");
                image.src="https://image.tmdb.org/t/p/w500"+movie.poster_path;
                division.appendChild(image);
                
                const smallDiv = document.createElement("div");
                smallDiv.className = "rating";
                smallDiv.innerHTML= movie.vote_average;
                division.appendChild(smallDiv);
                
                const heading = document.createElement("h3");
                heading.innerHTML=movie.title;
                division.appendChild(heading);

                const review=document.createElement("p");
                review.innerHTML=movie.overview;
                division.appendChild(review);
                
                division.onclick = function(){
                       window.location.href="demo_14_detail.php?movieId="+movie.id;                                  
 
                };

                mainDiv[0].appendChild(division);
                
                
            });

            window.addEventListener('scroll',()=>{
               
                if(window.scrollY + window.innerHeight >= 
                document.documentElement.scrollHeight){
                    onLoadFunction();
                }
            })

            };
        }
    
    xmlhttp.open("GET","https://api.themoviedb.org/3/movie/popular?api_key=b307cf9e515843556509251dafacbdcf&language=en-US&page="+page,true);
    xmlhttp.send();
    page++;
}

const urlParams = new URLSearchParams(window.location.search);
const movieId = urlParams.get('movieId');

function onLoadFunction2(){
    mainDiv = document.getElementsByClassName("container");

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var response=JSON.parse (this.responseText);

            document.body.style.backgroundImage = "url('https://image.tmdb.org/t/p/w500"+response.backdrop_path+"')";

            const image=document.createElement("img");
            image.src="https://image.tmdb.org/t/p/w500"+response.poster_path;
            mainDiv[0].appendChild(image);

            const movieName=document.createElement("h1");
            movieName.innerHTML=response.title+"<hr>";
            mainDiv[0].appendChild(movieName);

            const overview=document.createElement("h2");
            overview.innerHTML="Overview:";
            mainDiv[0].appendChild(overview);

            const overviewText=document.createElement("p");
            overviewText.innerHTML=response.overview;
            mainDiv[0].appendChild(overviewText);

            const release=document.createElement("h2");
            release.innerHTML="Release date:";
            mainDiv[0].appendChild(release);

            const releaseDate=document.createElement("p");
            releaseDate.innerHTML=response.release_date;
            mainDiv[0].appendChild(releaseDate);

            const language=document.createElement("h2");
            language.innerHTML="Language:";
            mainDiv[0].appendChild(language);

            const languageText=document.createElement("p");
            languageText.innerHTML=response.original_language;
            mainDiv[0].appendChild(languageText);

            const genres=document.createElement("h2");
            genres.innerHTML="Genres:";
            mainDiv[0].appendChild(genres);

            const genreTypes=document.createElement("p");
            movieGenre=response.genres;
            var genreString="";
            movieGenre.forEach(genre=>{
                genreString=genreString+genre.name+", "
            });
            genreTypes.innerHTML=genreString;
            mainDiv[0].appendChild(genreTypes);

            const rating=document.createElement("h2");
            rating.innerHTML="Rating:";
            mainDiv[0].appendChild(rating);

            const ratingValue=document.createElement("p");
            ratingValue.innerHTML=response.vote_average+"/10";
            mainDiv[0].appendChild(ratingValue);

            onLoadFunction3();

        };
    }
    xmlhttp.open("GET","https://api.themoviedb.org/3/movie/"+movieId+"?api_key=b307cf9e515843556509251dafacbdcf",true);
    xmlhttp.send();

    
    
}

function onLoadFunction3(){
    const xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                var response=JSON.parse (this.responseText);
                var cast=response.cast;
                var crew=response.crew;

                const crewMember=document.createElement("div");
                crewMember.className="crew";

                const crewName=document.createElement("h2");
                crewName.innerHTML="<hr>Crew:";
                crewMember.appendChild(crewName);

                
                
                crew.forEach(member=>{

                    const memberName=document.createElement("p");
                    memberName.innerHTML=member.job+":<br><b>"+member.name+"<b>";
                    crewMember.appendChild(memberName);

                });
                mainDiv[0].appendChild(crewMember);

                castMember=document.createElement("div");
                castMember.className="cast";

                castHeader=document.createElement("h2");
                castHeader.innerHTML="Cast:"
                castMember.appendChild(castHeader);


                cast.forEach(person=>{
                    console.log(person);

                picDiv=document.createElement("div");
                picDiv.className="pics";
                
                castImage=document.createElement("img");
                castImage.src="https://image.tmdb.org/t/p/w500"+person.profile_path;
                picDiv.appendChild(castImage);
                
                castName=document.createElement("p");
                castName.innerHTML=person.name;
                picDiv.appendChild(castName);
                
                castMember.appendChild(picDiv);
            });


                mainDiv[0].appendChild(castMember);

            };
        }
    
    xmlhttp2.open("GET","https://api.themoviedb.org/3/movie/"+movieId+"/credits?api_key=b307cf9e515843556509251dafacbdcf",true);
    xmlhttp2.send();
}