 $("a.smoothLink").click( function(e){
        $("body").addClass("fadeOut"); // anything with the "fadeOut" class will become transparent in 1s in our CSS

        setTimeout( function(){ // wait 1s, then change URL
            window.location = e.currentTarget.attributes['data-url'].value;
        }, 1000)
 }