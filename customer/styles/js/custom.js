var url = window.location;


$('ul.nav a').filter(function() {
    return this.href == URL;
}).parent().addclass('active'); 