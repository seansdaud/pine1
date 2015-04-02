
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
                        <img src="{{ asset('assets/img/profile/thumb/'.Auth::user()->image) }}" class="img-circle" width="60" height="60">
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
                    <a href="javascript:;" >
                        <i class="fa fa-plus"></i>
                        <span>Add</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ URL::route('owners') }}">Owners</a></li>
                        <li><a href="{{ URL::route('admin-arenas') }}">Arenas</a></li>
                    </ul>
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
                    <a  href="javascript:;">
                        <i class="fa fa-dashboard"></i>
                        <span>Schedular</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="{{ URL::route('createschedule') }}">
                                <?php   
                                    $adminid = Auth::id();
                                $schedular=Schedule::where('admin_id', $adminid )->orderBy('booking', 'asc')->get();
                                 ?>
                                @if($schedular->isEmpty())
                                <span>Create</span>
                                @else
                                 <span>Edit</span>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ URL::route('updatePrice') }}">Update</a></li>
                        <li><a href="{{ URL::route('showSchedule') }}">View</a></li>
                    </ul>
                </li>

                 <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-desktop"></i>
                        <span>Book Now</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{{ URL::route('booknow',1) }}">Via Username</a></li>
                        <li><a  href="{{ URL::route('booknow', 2) }}">Via name</a></li>
                    </ul>
                </li>

                 <li class="sub-menu">
                    <a  href="{{ URL::route('add-arena-info') }}">
                        <i class="fa fa-futbol-o"></i>
                        <span>Update Arena</span>
                    </a>
                </li>

                 <li class="sub-menu">
                    <a  href="{{ URL::route('viewLog') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>View Log</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a  href="{{ URL::route('owner-events') }}">
                        <i class="fa fa-calendar-o"></i>
                        <span>Events</span>
                    </a>
                </li>
                   <li class="sub-menu">
                    <a  href="{{ URL::route('marker-update') }}">
                        <i class="fa fa-calendar-o"></i>
                        <span>Maps</span>
                    </a>
                </li>
                

            @endif

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>