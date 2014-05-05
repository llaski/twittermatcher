
var draggableParent = $('.handles'),
    tweetParent = $(".tweets"),
    currentDraggedElem = null;

draggableParent.on('dragstart', '.draggable', function(evt){
    $(this).css('opacity', '0.4');
    evt.dataTransfer = evt.originalEvent.dataTransfer;
    evt.dataTransfer.effectAllowed = 'move';
    evt.dataTransfer.setData('id', $(this).data('id'));
    evt.dataTransfer.setData('text', $(this).find('p').html());
    currentDraggedElem = this;
});

tweetParent.on('dragenter', '.droparea', function(evt){
    this.classList.add('over');
});

tweetParent.on('dragover', '.droparea', function(evt){
    evt.preventDefault();
    evt.dataTransfer = evt.originalEvent.dataTransfer;
    evt.dataTransfer.dropEffect = 'move';
    return false;
});

tweetParent.on('dragleave', '.droparea', function(evt){
    this.classList.remove('over');
});

draggableParent.on('dragend', '.draggable', function(evt){
    $(this).css('opacity', '1');
    currentDraggedElem = null;
});

tweetParent.on('drop', '.droparea', function(evt){
    evt.preventDefault();
    evt.stopPropagation();
    evt.dataTransfer = evt.originalEvent.dataTransfer;

    if (evt.dataTransfer.getData('id') == $(this).parent().data('id')){
        $(this).addClass('correct').html(evt.dataTransfer.getData('text'));
        currentDraggedElem.remove();
        currentDraggedElem = null;
    }

    this.classList.remove('over');

    return false;
});
