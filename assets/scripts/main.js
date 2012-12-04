$(function() {
        $(".datepicker").datepicker();
        $("#first_name").focus();
        $('.non_subscriber').tooltip();
        $('.non_subscriber a').on("click", function(e){
            e.preventDefault();
        });
        $('.active a').on("click", function(e){
            e.preventDefault();
        });

        if (typeof forage_id != 'undefined') {
            var type = 'forages';
        } else{
            var type = 'properties'
        }

        fav();
        unfav();

        function fav(){
            $('span#favorite').on("click", "a#favorite",function(e){
                //prevents 'a' default action
                e.preventDefault();
                //get url
                var href = window.location.href;
                //get last uri
                var uri = href.substr(href.lastIndexOf('/') + 1);
                $.ajax({
                    type: "POST",
                    url: baseurl + type + "/favorite/" + uri,
                    data: { id: uri },
                    success : function () {
                        $("span#favorite").replaceWith('<span id="favorite"><a id="un-favorite" class="btn btn-medium" href="#"  rel="tooltip" data-placement="top" data-original-title="un-favorite"><i class="icon-star"></i></a></span>');
                        unfav();
                    },
                    error : function () {
                    }
                });
            });
        }
        function unfav() {
            $('span#favorite').on("click", "a#un-favorite", function(e){
                //prevents 'a' default action
                e.preventDefault();
                //get url
                var href = window.location.href;
                //get last uri
                var uri = href.substr(href.lastIndexOf('/') + 1);
                console.log(baseurl + type + "/un_favorite/" + uri)
                $.ajax({
                    type: "POST",
                    url: baseurl + type + "/un_favorite/" + uri,
                    data: { id: uri },
                    success : function () {
                        $("span#favorite").replaceWith('<span id="favorite"><a id="favorite" class="btn btn-medium" href="#"  rel="tooltip" data-placement="top" data-original-title="favorite"><i class="icon-star-empty"></i></a></span>');
                        fav();
                    },
                    error : function () {
                    }
                });
            });
        }

});