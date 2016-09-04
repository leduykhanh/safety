var contentBox = $('#container');
var words = contentBox.text().split(' ');
function paginate() {
    var newPage = $('<div class="page" />');
    contentBox.empty().append(newPage);
    var pageText = null;
    for(var i = 0; i < words.length; i++) {
        var betterPageText;
        if(pageText) {
            betterPageText = pageText + ' ' + words[i];
        } else {
            betterPageText = words[i];
        }
        newPage.text(betterPageText);
        if(newPage.height() > $(window).height()) {
            newPage.text(pageText);
            newPage.clone().insertBefore(newPage)
            pageText = null;
        } else {
            pageText = betterPageText;             
        }
    }    
}

$(window).resize(paginate).resize();