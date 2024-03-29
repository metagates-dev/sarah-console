<script type="text/javascript">
    /*左侧菜单选中状态*/
    function actionNav(params){
        $("[data-status='"+params+"']").addClass("menu-li-active");
        animateNav();
    }
    //菜单动画
    function animateNav(){
        $(".menu-li").on("mouseenter",function(){
            var moveH = $(this).position().top;
            $(".menu-animate").stop(true,true).animate({"top":moveH+"px","height":"50px"},"fast");
        });
        $(".menu").on("mouseleave",function(){
            $(".menu-animate").stop(true,true).animate({"height":"0"},"fast");
        });
        $(".menu-li:last").on("mouseleave",function(){
            $(".menu-animate").stop(true,true).animate({"height":"0"},"fast");
        });
    }
    /*展开子菜单*/
    function openSubMenu(params){
        var openStatus = $(params).attr("data-open");
        var obj = $(params).parent().find(".menu-li-sub-link");
        if(openStatus == '0'){
            $(obj).css("display","inline-block");
            $(params).attr("data-open","1");
            $(params).find(".menu-li-img1").attr("src","/static/image/dark/icon-menu-close.png");
        }else{
            $(obj).css("display","none");
            $(params).attr("data-open","0");
            $(params).find(".menu-li-img1").attr("src","/static/image/dark/icon-menu-open.png");
        }
    }
</script>
