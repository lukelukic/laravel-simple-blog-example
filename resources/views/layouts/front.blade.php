<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    @include("front.components.common.head")
    <body>
        @include("front.components.common.nav")
        @yield('content')
        @include("front.components.common.footer")
        @include("front.components.common.scripts")
    </body>
</html>