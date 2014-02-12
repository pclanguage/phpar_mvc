$(document).ready( function(){


    $(".dropdown dt a").click(function() {
        var id=$(this).attr('class');
        $("#"+id+"d dd ul").toggle();
    });

    $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        var obj=$(this).attr('class');
        $("#"+obj+"d dt a span").html(text);
        $(".dropdown dd ul").hide();
        //alert(getSelectedValue(obj+"d"));
        $("#"+obj).val($("#" + obj+"d").find("dt a span.value").html());
    });

    
    $(document).mouseup(function(e) {
        if($(e.target).parent(".dropdown dd ul").length==0) {
             $('#methodd dd ul').hide()
        }
    });


    var buttons = {
        previous:$('#slider_home .button-previous') ,
        next:$('#slider_home .button-next')
    };
    $('#slider_home').lofJSidernews( {
        interval:5000,
        easing:'easeInOutQuad',
        duration:1200,
        auto:true,
        mainWidth:684,
        mainHeight:404,
        navigatorHeight		: 101,
        navigatorWidth		: 320,
        maxItemDisplay:4,
        buttons:buttons
    }
    );

    var buttons_inner = {
        previous:$('#inner_slider .button-previous') ,
        next:$('#inner_slider .button-next')
    };
    $('#inner_slider').lofJSidernews( {
        interval:5000,
        easing:'easeInOutQuad',
        duration:1200,
        auto:false,
        mainWidth:637,
        navPosition     : 'horizontal', // horizontal
        mainHeight:358,
        navigatorHeight		:110,
        navigatorWidth		: 160,
        maxItemDisplay:4,
        buttons:buttons_inner
    }
    );

});


 
