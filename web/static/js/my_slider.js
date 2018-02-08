var slide_now = 1;
var slide_count = $('#slidewrapper').children().length;
var nav_btn_id = 0;
var translate_width = 0;
var slide_interval = 8000;

function next_slide() {
    if (slide_now <= 0 || slide_now > slide_count || slide_now == slide_count) {
        slide_now = 1;
        $('#slidewrapper').css('transform', 'translate(0, 0)');
    }
    else {
        translate_width = -$('#viewport').width() * (slide_now);
        $('#slidewrapper').css({
            '-webkit-transform': 'translate(' + translate_width + 'px, 0)',
            '-ms-transform': 'translate(' + translate_width + 'px, 0)',
            'transform': 'translate(' + translate_width + 'px, 0)',
        });
        slide_now++;
    }
}


$(document).ready(function() {

    $('#slidewrapper').css('width', 'calc(100% * '+$('.slide').length+')');

    $('.slide').css('width','calc(100%/'+$('.slide').length+')');

    var switch_interval = setInterval(next_slide, slide_interval);

    $('#nav-btns').hover(
    function() {
        clearInterval(switch_interval);
    },
    function() {
        switch_interval = setInterval(next_slide, slide_interval);
    });


    $('#viewport').hover(
    function() {
        clearInterval(switch_interval);
    },
    function() {
        switch_interval = setInterval(next_slide, slide_interval);
    });



    $('.slide-nav-btn').click(function() {
        nav_btn_id = $(this).index();

        if (nav_btn_id + 1 != slide_now) {
            translate_width = -$('#viewport').width() * (nav_btn_id);
            $('#slidewrapper').css({
                '-webkit-transform': 'translate(' + translate_width + 'px, 0)',
                '-ms-transform': 'translate(' + translate_width + 'px, 0)',
                'transform': 'translate(' + translate_width + 'px, 0)',
            });
            slide_now = nav_btn_id + 1;
        }
    });
});


