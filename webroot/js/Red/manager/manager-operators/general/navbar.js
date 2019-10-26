$(document).ready(function(){
        $("#search-general-patients").on("keyup",function(){
            if($(this).val().length>1)
            {   
                var $value = $(this).val().trim().toLowerCase();
                $(".patients-item-search-result").each(function(){
                    var $item = $(this).attr("tags").toLowerCase().trim();
                    var regExp = new RegExp($value);
                    if(regExp.test($item))
                        $(this).removeClass("hidden");
                    else
                        $(this).addClass("hidden");
                });
            }
            else
            {
                $(".patients-item-search-result").removeClass("hidden");
            }
            return false;
        });

        $('.navbar-top-menu li').hover(function(){
            $('span',this).removeClass('white-text').addClass('dmp-main-color');
        },function(){
            $('span',this).removeClass('dmp-main-color').addClass('white-text');
        });

        $('.navbar-top-menu li').on('click',function(e){
            e.stopPropagation();
        });

});

