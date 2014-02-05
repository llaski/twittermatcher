function init() {
$('.each_account').droppable({
    tolerance: 'fit'
});

//makes tweets draggable
$('.each_tweet').draggable({
	snap: '.each_account',
	snapMode: 'inner',
	opacity: 0.50

});

//makes accounts droppable
$('.each_account').droppable({
    greedy: true,
    tolerance: 'touch',
    drop: function(event,ui){
        //test to detect overlap
        //alert(event.target.id);
	//alert($(ui.draggable).attr("id"));
	var lastAcct = event.target.id.substr(event.target.id.length - 1);
	var lastTwt = $(ui.draggable).attr("id").substr($(ui.draggable).attr("id").length  - 1);

	if(lastAcct == lastTwt)
		alert("Correct!");
	else
		alert("Try again.");
	
    }
});
}

//body onload, shuffles the list items
function shuffle(){
	var olA = document.getElementById("accounts");
	var olT = document.getElementById("tweets");

	for (var i = olA.children.length; i >= 0; i--){
    		olA.appendChild(olA.children[Math.random() * i | 0]);
		olT.appendChild(olT.children[Math.random() * i | 0]);
	}
}