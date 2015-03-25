<aside id="{{ $id }}">
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
        	<p class="centered">
            @if(Auth::user()->usertype == 3)
                <?php $route = "admin-profile"; ?>
            @endif
            @if(Auth::user()->usertype == 2)
                <?php $route = "owner-profile"; ?>
            @endif
                <a href="{{ URL::route($route, Auth::user()->username) }}">
                    @if(Auth::user()->image != ""):
                        <img src="{{ asset('assets/img/profile/'.head(explode('.', Auth::user()->image)).'_thumb.'.last(explode('.', Auth::user()->image))) }}" class="img-circle" width="60" height="60">
                    @else
                        <img src="{{ asset('assets/img/friends/fr-05.jpg') }}" class="img-circle" width="60" height="60">
                    @endif
                </a>
            </p>
        	<h5 class="centered">{{ Auth::user()->name }}</h5>

        	<!-- Nav Menu for admin -->
            @if(Auth::user()->usertype == 3)
                <li class="mt">
                    <a href="{{ URL::route('admin-dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{ URL::route('owners') }}">
                        <i class="fa fa-users"></i>
                        <span>Owners</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{ URL::route('admin-arenas') }}">
                        <i class="fa fa-flag"></i>
                        <span>Arenas</span>
                    </a>
                </li>
            @endif

            <!-- Nav Menu for owners -->
            @if(Auth::user()->usertype == 2)
                <li class="mt">
                    <a href="{{ URL::route('owner-dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a  href="{{ URL::route('createschedule') }}">
                        <i class="fa fa-dashboard"></i>
                        <?php   
                            $adminid = Auth::id();
                        $schedular=Schedule::where('admin_id', $adminid )->orderBy('booking', 'asc')->get();
                         ?>
                        @if($schedular->isEmpty())
                        <span>Create Schedular</span>
                        @else
                         <span>Edit Schedular</span>
                        @endif
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

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>