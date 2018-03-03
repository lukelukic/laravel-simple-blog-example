<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
@include("admin.components.common.user_info")
<!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route("home") }}">
                    <i class="material-icons">home</i>
                    <span>Back to website</span>
                </a>
            </li>
            <li class="active">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <span>Users</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route("users.create") }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route("users.index") }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">menu</i>
                    <span>Navigation</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route("navigation.create") }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route("navigation.index") }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">border_color</i>
                    <span>Posts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route("posts.create") }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route("posts.index") }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">photo_library</i>
                    <span>Gallery</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route("gallery.create") }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route("gallery.index") }}">Show</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">share</i>
                    <span>Social networks</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route("social.create") }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route("social.index") }}">Show</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->