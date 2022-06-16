<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100vw;
  height: 100vh;
  padding: 0;
  margin: 0;
}

.player {
  width: 60%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.player .seek_slider {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  height: 5px;
  background: black;
  opacity: 0.7;
  -webkit-transition: .2s;
  -webkit-transition: opacity .2s;
  transition: opacity .2s;
}

.player .seek_slider {
  width: 60%;
  margin-left: 10px;
  margin-right: 10px;
  cursor: pointer;
}

.player .slider_container {
  width: 50%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.player .seek_slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  background: white;
  cursor: pointer;
  border-radius: 50%;
}

.player .seek_slider:hover {
  opacity: 1.0;
}

.player #image {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  border-radius: 10%;
  width: 400px;
  height: 300px;
  background-size: cover;
}

.player .controll {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.player .controll img {
  margin-left: 20px;
  cursor: pointer;
}
/*# sourceMappingURL=style.css.map */
    </style>
</head>
<body>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="player">
        <p id="count" class="count"></p>
        <div class="image" id="image"></div>
        <div class="detail">
            <h1 class="name"></h1>
            <h3 class="artist">
            </h3>

        </div>
        <div class="slider_container">
            <div class="current-time">00:00</div>
            <input type="range" min="1" max="100"
              value="0" class="seek_slider" onchange="seekTo()">
            <div class="total-duration">00:00</div>
          </div>

        <div class="controll">
<div class="pre">
    <img src={{asset("assets/ico/previous.png")}} alt="" srcset="" onclick="playPrevious()">
</div>
<div class="play" id="playbtn" >
    <img src={{asset("assets/ico/play.png")}} onclick="playAudio()" alt="" srcset="">
</div>
<div class="next" >
    <img src={{asset("assets/ico/next.png")}} alt="" srcset="" onclick="playNext()">
</div>
        </div>


    </div>

    <script >
        
 let id=1;
 let count=0;
 let seek_slider = document.querySelector(".seek_slider");
 const image=document.getElementById("image");
const currenttime=document.querySelector(".current-time");
 let songs=[{"name":"Awathan hade","img":"awathanhade.jpg","audio":"Awathan hade-Harsha Withanage-www.song.lk.mp3"},{"name":"Dilko Karaar Aya","img":"Dil-Ko-Karaar-Aaya-From-Sukoon.jpg","audio":"Dil Ko Karaar Aaya Yasser Desai 320 Kbps.mp3"},{ "name":"Datha dara","img":"dethadara.jpg","audio":"Datha_Dara_Dhanith_Sri_Sarigama_lk.mp3"}]
 var music = new Audio({{asset("assets/audio")}}+songs[0].audio);
 image.style.backgroundImage='url("'+{{asset("assets/audioimage")}}+songs[0].img+'")'
 seek_slider.value = 0;
 document.querySelector(".total-duration").innerHTML=(music.duration/60).toFixed(2);

 changeBg();
 function seekTo() {
  
    
   let seekto = music.duration * (seek_slider.value / 100);
       music.currentTime = seekto;
  }
 function playAudio(){
  
if(id==1){  
    seekUpdate();
music.play();

setInterval(seekUpdate, 1000); 
document.getElementById("playbtn").innerHTML=' <img src="assets/image/pause.png" alt="" onclick="playAudio()" srcset="">'
document.querySelector(".total-duration").innerHTML=(music.duration/60).toFixed(2);

id=0;
}

else{
    music.pause();   
    document.getElementById("playbtn").innerHTML=' <img src="assets/image/play.png" onclick="playAudio()" alt="" srcset="">'
id=1;
}

}
function playNext(){
    if(count!=songs.length-1){

    count++;
    changeBg();
    music.pause();
    image.style.backgroundImage=' url("assets/audioimage/'+songs[count].img+'")'
     music = new Audio("assets/audio/"+songs[count].audio);
    id=1;
    playAudio();
    document.querySelector(".total-duration").innerHTML=(music.duration/60).toFixed(2);
}
}
function playPrevious(){
 if(count!=0){

        count--;
        changeBg();
        music.pause();
        image.style.backgroundImage=' url("assets/audioimage/'+songs[count].img+'")'    
        music = new Audio("assets/audio/"+songs[count].audio);
       id=1;
       playAudio();
       document.querySelector(".total-duration").innerHTML=(music.duration/60).toFixed(2);

    }

}
document.body.onkeyup = function(e) {
    if (e.key == " " ||
        e.code == "Space" ||      
        e.keyCode == 32      
    ) {
       playAudio();
     
    }
  }

  music.onended = function() {
    playNext();
  
}; 

 
function seekUpdate() {
    document.querySelector(".total-duration").innerHTML=(music.duration/60).toFixed(2);

    let seekPosition = 0;
var minute=0;
      seekPosition = (music.currentTime/music.duration)* (100 );
      seek_slider.value = seekPosition;
      if(music.currentTime>=60){
          minute=music.currentTime/60;
          if(minute<10)  currenttime.innerHTML="0"+minute.toFixed(2);
          currenttime.innerHTML=minute.toFixed(2);
      }
      else{      currenttime.innerHTML="00:"+ music.currentTime.toFixed(0);
    }

    
  }

  function changeBg(){
      var colors=["#d03161","#ee8080","#deeff1","#bfd8d1","#178a94","#2b374b","#00a4c0"];
        var color=Math.floor(Math.random() * (7 - 0 + 1) ) + 0;
        document.body.style.backgroundColor = colors[color];
  }
    </script>
</body>
</html>