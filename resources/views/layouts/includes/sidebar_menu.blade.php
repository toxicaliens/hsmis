<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Dashboard</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                
                <ul class="nav side-menu">
                	<li><a><i class="fa fa-group"></i> Registration<span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/fee-structure') }}">Register</a></li>
                			<li><a href="{{ url('/fee-collection') }}">All</a></li>
                		</ul>                
                </ul>
                
                <ul class="nav side-menu">
                	<li><a><i class="fa fa-graduation-cap"></i> Academics<span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/subjects') }}">Subjects</a></li>
                			<li><a href="{{ url('/subject-grading') }}">Subject Grading</a></li>
                			<li><a href="{{ url('/form-grading') }}">Form Grading</a></li>
                		</ul>                
                </ul>
                
                <ul class="nav side-menu">
                	<li><a><i class="fa fa-money"></i> Fees<span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/fee-structure') }}">Fee Structure</a></li>
                			<li><a href="{{ url('/fee-collection') }}">Fee Collection</a></li>
                		</ul>                
                </ul>
                
                 <ul class="nav side-menu">
                	<li><a><i class="fa fa-book"></i> Library<span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/fee-structure') }}">Inventory</a></li>
                			<li><a href="{{ url('/fee-collection') }}">Book Issuance</a></li>
                		</ul>                
                </ul>
                
                <ul class="nav side-menu">
                	<li><a><i class="fa fa-building"></i> School<span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/forms') }}">Forms</a></li>
                			<li><a href="{{ url('/streams') }}">Streams</a></li>
                			<li><a href="{{ url('/school-profile') }}">Profile</a></li>
                		</ul>                
                </ul>
               
                <ul class="nav side-menu">
                	<li><a><i class="fa fa-user"></i> User Management<span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/users') }}">All Users</a></li>
                			<li><a href="{{ url('/sys-profile') }}">Profile</a></li>
                		</ul>                
                </ul>
                
                <ul class="nav side-menu">
                	<li><a><i class="fa fa-cogs"></i> System Settings <span class="fa fa-chevron-down"></span></a>
                		<ul class="nav child_menu">
                			<li><a href="{{ url('/views') }}">Views</a></li>
                			<li><a href="{{ url('/menu') }}">Menu</a></li>
                			<li><a href="{{ url('/system-info') }}">System Info</a></li>
                		</ul>                
                </ul>
                
              </div>
              

            </div>