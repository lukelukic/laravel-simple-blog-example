<script>
    const BASE_URL = '{{ url("/") }}';
    const TOKEN = '{{ csrf_token() }}';
</script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="{{ asset("js/move-top.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/easing.js") }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!--start-smoth-scrolling-->
<!--script-->
<script src="{{ asset("js/modernizr.custom.97074.js") }}"></script>
<script src="{{ asset("js/jquery.chocolat.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/jquery.flexisel.js") }}"></script>
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('.gallery a').Chocolat();
    });
</script>
<script type="text/javascript" src="{{ asset("js/jquery.hoverdir.js") }}"></script>
<script>
    $("span.menu").click(function(){
        $(" ul.navig").slideToggle("slow" , function(){
        });
    });
</script>
<!-- script-for-menu -->

<script type="text/javascript">
    $(window).load(function() {

        $("#flexiselDemo3").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 2
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

    });
</script>



<script type="text/javascript">
    $(window).load(function() {

        $("#flexiselDemo3").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 2
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
@yield("appendScripts")