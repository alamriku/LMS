<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Gate::allows('librarian'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.create')}}">Add</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.index')}}">List</a></li>

                </ul>
            </div>
        </li>
        @endif
        @if(Gate::allows('librarian'))
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#author" aria-expanded="false" aria-controls="ui-basic">
                    <i class="ti-palette menu-icon"></i>
                    <span class="menu-title">Author</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="author">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('author.create')}}">Add</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('author.index')}}">List</a></li>

                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>
