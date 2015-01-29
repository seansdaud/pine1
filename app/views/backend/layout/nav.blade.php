<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
        	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
        	  <h5 class="centered">{{ Auth::user()->name }}</h5>

        	<!-- Nav Menu for admin -->
            @if(Auth::user()->usertype == 3)
                <li class="mt">
                    <a class="active" href="{{ URL::route('admin', Auth::user()->username) }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="active" href="{{ URL::route('owners') }}">
                        <i class="fa fa-users"></i>
                        <span>Owners</span>
                    </a>
                </li>
            @endif

            <!-- Nav Menu for owners -->
            @if(Auth::user()->usertype == 2)
                 <li class="sub-menu">
                    <a  href="{{ URL::route('createschedule') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Create Schedular</span>
                    </a>
                </li>
            @endif
               @if(Auth::user()->usertype == 2)
                 <li class="sub-menu">
                    <a  href="{{ URL::route('updatePrice') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Update Price</span>
                    </a>
                </li>
            @endif
              @if(Auth::user()->usertype == 2)
                 <li class="sub-menu">
                    <a  href="{{ URL::route('showSchedule') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>See Schedule</span>
                    </a>
                </li>
            @endif
             @if(Auth::user()->usertype == 2)
                 <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Book Now</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ URL::route('booknow',1) }}">Via Usenamer</a></li>
                    <li><a  href="{{ URL::route('booknow', 2) }}">Via New Name</a></li>
                </ul>
            </li>
            @endif
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a  href="general.html">General</a></li>
                    <li><a  href="buttons.html">Buttons</a></li>
                    <li><a  href="panels.html">Panels</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a  href="general.html">General</a></li>
                    <li><a  href="buttons.html">Buttons</a></li>
                    <li><a  href="panels.html">Panels</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Components</span>
                </a>
                <ul class="sub">
                    <li><a  href="calendar.html">Calendar</a></li>
                    <li><a  href="gallery.html">Gallery</a></li>
                    <li><a  href="todo_list.html">Todo List</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Extra Pages</span>
                </a>
                <ul class="sub">
                    <li><a  href="blank.html">Blank Page</a></li>
                    <li><a  href="login.html">Login</a></li>
                    <li><a  href="lock_screen.html">Lock Screen</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-tasks"></i>
                    <span>Forms</span>
                </a>
                <ul class="sub">
                    <li><a  href="form_component.html">Form Components</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                </a>
                <ul class="sub">
                    <li><a  href="basic_table.html">Basic Table</a></li>
                    <li><a  href="responsive_table.html">Responsive Table</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub">
                    <li><a  href="morris.html">Morris</a></li>
                    <li><a  href="chartjs.html">Chartjs</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>