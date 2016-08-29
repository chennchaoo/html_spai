var publicUrl='http://share.spai.me/';
function music_div_1() { 
    var music = document.getElementById('music_1');  
    if (music.paused){ 
        music.play();
		$("#music_div_1").hide(); 
		$("#music_div_h_1").show(); 
    } 
    else{ 
        music.pause(); 
		$("#music_div_1").show(); 
		$("#music_div_h_1").hide();  
    } 
} 
function music_div_2() { 
    var music = document.getElementById('music_2');  
    if (music.paused){ 
        music.play();
		$("#music_div_2").hide(); 
		$("#music_div_h_2").show(); 
    } 
    else{ 
        music.pause(); 
		$("#music_div_2").show(); 
		$("#music_div_h_2").hide();  
    } 
} 
function music_div(e) { 
    var music = document.getElementById('music_'+e);  
    if (music.paused){
		closeMusic();	 
        music.play();
		$("#music_div_"+e).hide(); 
		$("#music_div_h_"+e).show(); 
    } 
    else{ 
        music.pause(); 
		$("#music_div_"+e).show(); 
		$("#music_div_h_"+e).hide();  
    } 
} 
function closeMusic(){
	for(var i=1; i<=8; i++){
		var music = 'music_'+i;
		music = document.getElementById('music_'+i);
		music.pause();
		$("#music_div_h_"+i).hide();
		$("#music_div_"+i).show();
	}	
}