<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-inner">
		<div class="container">
			<div class="navbar-header">
				<button
				    type="button"
				    class="navbar-toggle"
				    data-toggle="collapse"
				    data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!! URL::route('home') !!}">
				    <!-- <i class="fa fa-home"></i> -->
				    Home
				</a>
			</div>

			@if (Auth::check())
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="{!! URL::route('account-sign-out') !!}">Logout</a></li>
						<!-- Change password section -->
						<li <?php echo ((URL::current() == URL::route("account-change-password")) ? "class='active'" : ""); ?> >
						    {!! HTML::link(URL::route('account-change-password'), 'Change password') !!}
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <!-- Profile Secion -->
                        <li class=" <?php echo ((URL::current() == URL::route("support")) ? " active" : ""); ?>" >
                            <a href="{!! URL::route('account-show', [Auth::user()->username]) !!}">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </li>
                    </ul>
				</div>
			@else
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
					    <!-- Account Section -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							    <span class="glyphicon glyphicon-user"></span> Account <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
							    <!-- Account Sign In -->
								<li <?php echo((URL::current() == URL::route("account-sign-in")) ? "class='active'" : "");?> >
								    <a href="{!! URL::route('account-sign-in') !!}">
								        <i class="fa fa-share"></i> Sign in
								    </a>
								</li>
								<!-- Account Create -->
								<li <?php echo ((URL::current() == URL::route("account-create")) ? "class='active'" : ""); ?> >
								    <a href="{!! URL::route('account-create') !!}">
								        <i class="fa fa-pencil"></i> Create
								    </a>
								</li>
								<!-- Account Forget Password -->
								<li <?php echo ((URL::current() == URL::route("account-forgot-password")) ? "class='active'" : ""); ?> >
								    <a href="{!! URL::route('account-forgot-password') !!}">
								        <i class="fa fa-exclamation-triangle"></i> Forgot password
								    </a>
								</li>
							</ul>
						</li>
						<!-- Support section -->
						<li <?php echo ((URL::current() == URL::route("support")) ? "class='active'" : ""); ?> >
						    <a href="{!! URL::route('support') !!}">
						        <i class="fa fa-comments"></i> Support
						    </a>
						</li>
					</ul>
					<ul class="nav pull-right visible-lg visible-md">
						<li>
							<button type="button" class="btn btn-success navbar-btn">
							    <span class="glyphicon glyphicon-thumbs-up"></span> Donate
							</button>
						</li>
					</ul>
					<ul class="nav pull-right top-search">
						<form class="navbar-form" role="search" method="POST" action="{!! URL::route('search') !!}">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="search">
								<span class="input-group-btn">
									<button
									    rel="tooltip"
									    type="submit"
									    class="btn btn-default"
									    data-placement="bottom"
									    title="Click to Search">
										    <span class="glyphicon glyphicon-search"></span>&nbsp;
									</button>
								</span>
							</div>
						</form>
					</ul>
				</div>
			@endif
		</div>
	</div>
</nav>
