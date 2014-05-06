App.Views.GameItemAccount = Backbone.View.extend({

    template: App.Templates.GameItemAccount,

    render: function() {
        this.setElement( this.template( this.model.toJSON() ));

        return this;
    }
});

App.Views.GameItemAccounts = Backbone.View.extend({
    tagName: "ul",
    className: "accounts",

    events: {
        "dragStart .draggable" : "dragStart"
    },

    render: function() {
        this.collection.each(this.addOne, this);
        return this;
    },

    addOne: function(account) {
        var accountView = new App.Views.GameItemAccount({ model : account });
        this.$el.append(accountView.render().el);
    },

    dragStart: function(evt) {
        console.log('start');
        $(this).css('opacity', '0.4');
        evt.dataTransfer = evt.originalEvent.dataTransfer;
        evt.dataTransfer.effectAllowed = 'move';
        evt.dataTransfer.setData('id', $(this).data('id'));
        evt.dataTransfer.setData('data', $(this).html());
        App.currentDraggedElem = this;
    }
});

App.Views.GameItemTweet = Backbone.View.extend({

    template: App.Templates.GameItemTweet,

    render: function() {
        this.setElement( this.template( this.model.toJSON() ));

        return this;
    }
});

App.Views.GameItemTweets = Backbone.View.extend({
    tagName: "ul",
    className: "tweets",

    render: function() {
        this.collection.each(this.addOne, this);
        return this;
    },

    addOne: function(account) {
        var tweetView = new App.Views.GameItemTweet({ model : account });
        this.$el.append(tweetView.render().el);
    }

});
