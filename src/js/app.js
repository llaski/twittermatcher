// var draggableParent = $('.handles'),
//     tweetParent = $(".tweets"),
//     currentDraggedElem = null,
//     $msg = $("#drop-msg"),
//     numElems = draggableParent.find('.draggable').length,
//     $tries = $("#numTries"),
//     numTries = 5;

// draggableParent.on('dragstart', '.draggable', function(evt){
//     $(this).css('opacity', '0.4');
//     evt.dataTransfer = evt.originalEvent.dataTransfer;
//     evt.dataTransfer.effectAllowed = 'move';
//     evt.dataTransfer.setData('id', $(this).data('id'));
//     evt.dataTransfer.setData('data', $(this).html());
//     currentDraggedElem = this;
// });

// tweetParent.on('dragenter', '.droparea', function(evt){
//     this.classList.add('over');
// });

// tweetParent.on('dragover', '.droparea', function(evt){
//     evt.preventDefault();
//     evt.dataTransfer = evt.originalEvent.dataTransfer;
//     evt.dataTransfer.dropEffect = 'move';
//     return false;
// });

// tweetParent.on('dragleave', '.droparea', function(evt){
//     this.classList.remove('over');
// });

// draggableParent.on('dragend', '.draggable', function(evt){
//     $(this).css('opacity', '1');
//     currentDraggedElem = null;
// });

// tweetParent.on('drop', '.droparea', function(evt){
//     evt.preventDefault();
//     evt.stopPropagation();
//     evt.dataTransfer = evt.originalEvent.dataTransfer;

//     if (evt.dataTransfer.getData('id') == $(this).parent().data('id')){
//         $(this).addClass('correct').html(evt.dataTransfer.getData('data'));
//         currentDraggedElem.remove();
//         currentDraggedElem = null;
//         numElems--;
//         var msg = numElems === 0 ? 'Congrats! You got them all!' : 'You got it right! Only ' + numElems + ' to go!';
//         $msg.removeClass('alert-danger').addClass('alert-success').html(msg);
//     } else {
//         numTries--;
//         var msg = numTries === 0 ? 'Sorry, You Lost :( - <a href="/">Play Again?</a>' : 'Num Tries Remaining: '+numTries;
//         $("#numTries").html(msg);
//         if (numTries === 0)  {
//             draggableParent.off('dragstart dragend', '.draggable')
//                             .find('.draggable').attr('draggable', false);
//             $msg.removeClass('alert-success alert-danger').html('');
//         }
//         else
//             $msg.removeClass('alert-success').addClass('alert-danger').html('Whoops! Try Again!');
//     }

//     this.classList.remove('over');

//     return false;
// });

/*
    Models
        - Game (Game Data)
        - User
    Collections
        - Game
    View
        -
    Views


 */

window.App = {
    Models: {},
    Views: {},
    Collections: {},
    Templates: {},
    currentDraggedElem: null
};
