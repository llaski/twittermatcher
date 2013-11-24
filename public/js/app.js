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

$('.each_account').droppable({
    greedy: true,
    tolerance: 'touch',
    drop: function(event,ui){
        //test to detect overlap
        alert('touched');
    }
});
}