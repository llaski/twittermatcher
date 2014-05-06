_.templateSettings = {
  interpolate: /\{\{(.+?)\}\}/g
};

App.Templates.GameItemAccount = [
    '<li class="draggable" draggable="true" data-id="{{ id }}">',
        '<img draggable="false" src="{{ profile_img }}" alt="">',
        '<p>{{ name }}</p>',
    "</li>"
].join("");

App.Templates.GameItemTweet = [
    '<li data-id="{{ id }}">',
    '<div class="droparea"></div>',
    '<p>{{ tweet }}</p>',
    "</li>"
].join("");

for (var temp in App.Templates) {
    if (App.Templates.hasOwnProperty(temp))
        App.Templates[temp] = _.template(App.Templates[temp]);
}
