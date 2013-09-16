var element = new Array();
		var scores = new Array();
		scores[0] = 0;
		scores[1] = 0;
		scores[2] = 0;
		scores[3] = 0;
		scores[4] = 0;

function allowDrop(ev)
{
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("Text");

if(ev.target.innerHTML.length>5 || ev.target.innerHTML.length==0){
	if(ev.target.id.length<10){
	alert("You have already selected that place, to change your decision drag it back to the dock");
	}else{
		ev.target.appendChild(document.getElementById(data));
	}
	}else{


ev.target.appendChild(document.getElementById(data));

}

}

function submit(){
	//alert(document.getElementById("divmakeitreallylongtest").innerHTML.length);
	
	if(document.getElementById("divmakeitreallylongtest").innerHTML.length>87){
		alert("You haven't ranked all the choices. the scores are still: "+ scores);
		
		
	}else{
		
		element[0] = document.getElementById("drag1");
		element[1] = document.getElementById("drag2");
		element[2] = document.getElementById("drag3");
		element[3] = document.getElementById("drag4");
		element[4] = document.getElementById("drag5");
		div2 = document.getElementById("div2");
		div3 = document.getElementById("div3");
		div4 = document.getElementById("div4");
		div5 = document.getElementById("div5");
		div6 = document.getElementById("div6");
		
		
		for(x=0;x<element.length;x++){
			switch(element[x].parentNode.id){
			case div2.id:
				scores[x] = 5;
				break;
			
			case div3.id:
				scores[x] = 4;
				break;
				
			case div4.id:
				scores[x] = 3;
				break;
				
			case div5.id:
				scores[x] = 2;
				break;
				
			case div6.id:
				scores[x] = 1;
				break;
			default:
				
				break;
			}
		}
		
		
		
		
		
		$.post('submitvotes.php', {scores:scores}, 
				function(results){
				
				}
			);
			
		document.write('<p>Your rankings have been taken in to consideration. Thankyou.\n The page will reload.<p>\r<iframe id="table" src="http://www.jumpingbeans.webege.com/ye/vtest/getvotes.php" scrolling="no" frameborder="0" height="500px" width="300px"></iframe>');
		setTimeout(function(){document.location.reload(true);},5000);
		
		
	}
	
}