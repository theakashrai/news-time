//javascript :P
//setimeout
var error = false;
var i = 0;
var APIkey = '8f1069411a354d1d87b42ce55c3c4d69';
var sourceURL = 'https://newsapi.org/v1/sources?language=en';
var articleBaseURL = 'https://newsapi.org/v1/articles';

//GetJSON(urlGenerator('the-times-of-india'));	
//GetJSONi(sourceURL);
function urlGenerator(source) {
    return articleBaseURL + '?source=' + source + '&apikey=' + APIkey;
}
 
function requestNewsJSON(url)
{
	 $.when( $.getJSON(url)).then(function(data){
		 window.newsObj=data;
		 //console.log(data);
		 changer();
	  });
}
function requestSourceJSON(url)
{
	 $.when( $.getJSON(url)).then(function(data){
		 window.sourceOBJ=data;
	  });
}

requestNewsJSON(urlGenerator('the-times-of-india'));
requestSourceJSON(sourceURL);
var nav = document.getElementById("mySidenavcat").innerHTML;
var menuCat = '<a href ="#" onclick="inter(\'general\');">General</a><a href ="#" onclick="inter(\'technology\');">Technology</a><a href ="#" onclick="inter(\'sport\');">Sport</a><a href ="#" onclick="inter(\'business\');">Business</a><a href ="#" onclick="inter(\'politics\');">Politics</a><a href ="#" onclick="inter(\'entertainment\');">Entertainment</a><a href ="#" onclick="inter(\'science-and-nature\');">Science-and-nature</a><a href ="#" onclick="inter(\'music\');">Music</a><a href ="#" onclick="inter(\'gaming\');">Gaming</a>';

function backnav() {
    document.getElementById("mySidenavcat").innerHTML = nav;
}

function inter(data) {
    document.getElementById("mySidenavcat").innerHTML = "";
    for (var j in sourceOBJ.sources) {
        var source_name = sourceOBJ.sources[j].name;
        //var source_id=sourceOBJ.sources[j].id;
        var source_cat = sourceOBJ.sources[j].category;
        if (data == source_cat) {
            document.getElementById("mySidenavcat")
                .innerHTML += '<a href="#about" class="awsome" onclick="xender(\'' + source_name + '\');" >' + source_name + '</a>';
        }
    }
}

function fudu() {
    document.getElementById("sourceCat")
        .innerHTML = menuCat;
}
function next_change() {
    console.log(i);
    i++;
    if (i > newsObj.articles.length - 1)
        i = 0;
    console.log(i);
    changer();
}

function prev_change() {
    console.log(i);
	i--;
	if(i<0){
		i=newsObj.articles.length - 1;
    }
    console.log(i);
    changer();
	}


function changer() {
    console.log(i);
    window.location.href = "#about"
    console.log("contents overwritten");
    window.title = newsObj.articles[i].title;
    var background = newsObj.articles[i].urlToImage;
    window.description = newsObj.articles[i].description;
	window.con_url=newsObj.articles[i].url;
        if (background != null)
        document.getElementById("image").innerHTML = '<img src= "' + background + '"alt="" class="img-responsive">';
        document.getElementById("title").innerHTML = '<a href='+con_url+'>'+title+'</a>';
        document.getElementById("des").innerHTML = description;
		document.getElementById("des").innerHTML+='<div class="bookmarks_btn"><input type="button" class="btnnn" id="hello_btn" value="bookmark it" style="margin-top:20px"></div>';
}

function xender(val) {
    for (var k in sourceOBJ.sources) {
        if (val == sourceOBJ.sources[k].name) {
            requestNewsJSON(urlGenerator(sourceOBJ.sources[k].id));
			backnav();
			closeNav();
            error = true;
        }
    }
}
$(document).ready(function() {
	console.log("loaded");
	$("body").on('click','.btnnn',function() {
	console.log("hello");
	$.ajax({    
    type: "POST",
    url: "bookmark.php",             
    data:{tit:window.title,des:window.description,co_url:window.con_url} 
   });
    });

 });