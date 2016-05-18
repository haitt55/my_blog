var perPage = 3;
var totalPosts = $('.post-preview').length;

$(function(){
    if ($('#start-position').val() == '') {
        $('#start-position').val(totalPosts);
    }
    loadPage();
});

function loadPage() {
    var startPosition = parseInt($('#start-position').val());
    setEndPosition(startPosition);
    var endPosition = parseInt($('#end-position').val());
    $('.post-preview').each(function() {
        if (this.id <= startPosition && this.id > startPosition - perPage){
            $(this).removeClass('hidden');
            $('#hr-' + this.id).removeClass('hidden');
        } else {
            if (!$(this).hasClass('hidden')) {
                $(this).addClass('hidden');
                $('#hr-' + this.id).addClass('hidden');
            }
        }
    });
    showHideBackButton(startPosition);
    showHideNextButton(startPosition);
}

function setEndPosition(startPosition) {
    if (startPosition - perPage > 0) {
        $('#end-position').val(startPosition - perPage + 1);
    } else {
        $('#end-position').val(1);
    }
}

function nextPage() {
    var currentStartPosition = parseInt($('#start-position').val());
    // set start position
    if (currentStartPosition - perPage > 0) {
        $('#start-position').val(currentStartPosition - perPage);
        loadPage();
    }
}

function showHideNextButton(startPosition) {
    if (startPosition - perPage < 0) {
        if (!$('#next-page').hasClass('hidden')) {
            $('#next-page').addClass('hidden');
        }
    } else {
        $('#next-page').removeClass('hidden');
    }
}

function previousPage() {
    var currentStartPosition = parseInt($('#start-position').val());
    // set start position
    if (currentStartPosition + perPage <= totalPosts) {
        $('#start-position').val(currentStartPosition + perPage);
        loadPage();
    }
}

function showHideBackButton(startPosition) {
    if (startPosition >= totalPosts) {
        if (!$('#previous-page').hasClass('hidden')) {
            $('#previous-page').addClass('hidden');
        }
    } else {
        $('#previous-page').removeClass('hidden');
    }
}