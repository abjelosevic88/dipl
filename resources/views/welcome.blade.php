@extends('layout.main')

@section('content')
    <!-- Auth content -->
    @if(Auth::check())
        <div class="container">
            <div class="container">
                <div class="alert alert-info">
                  <p class="lead text-center text-info">Hello {{ ucwords(Auth::user()->username) }}</p>
                </div>
            </div>
        </div>
  	@else
        <!-- <div class="container">
            <div class="alert alert-danger">
              <p class="lead text-center text-danger">You are not signed in!</p>
            </div>
        </div> -->
  	@endif

    <!-- Main content -->
    <div class="container">
        <div class="col-lg-8">
            <h1 class="page_header">
                <span class="glyphicon glyphicon-check" style="font-size: 30px;"></span> Overview
            </h1>
            <hr>
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <hr>
            <!-- Glyphs -->
            <div class="row">
                <div class="col-lg-6">
                    <ul class="features">
                        <li>
                            <h3 class="h3-list">
                                <span class="glyphicon glyphicon-resize-horizontal" style="font-size: 25px; vertical-align: -10%;"></span>
                                Responsive
                            </h3>
                            <p>Create dynamic content that adapt to any screen.</p>
                        </li>
                        <li>
                            <h3>
                                <span class="glyphicon glyphicon-flash" style="font-size: 25px; vertical-align: -10%;"></span>
                                CSS3 transitions
                            </h3>
                            <p>Animations that run smoothly on modern devices.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features">
                        <li>
                            <h3>
                                <span class="glyphicon glyphicon-phone" style="font-size: 25px; vertical-align: -10%;"></span>
                                Touch
                            </h3>
                            <p>Swipe support that tracks touch movements.</p>
                        </li>
                        <li>
                            <h3>
                                <span class="glyphicon glyphicon-flash" style="font-size: 25px; vertical-align: -10%;"></span>
                                CSS3 transitions
                            </h3>
                            <p>Animations that run smoothly on modern devices.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>

            <!-- Donwload and Donate buttons -->
            <div class="btns">
                <button class="btn btn-inverse btn-lg" style="margin-right: 15px;">
                    <span class="glyphicon glyphicon-download"></span> Download
                </button>

                <button class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Donate
                </button>
            </div>
            <hr>
            <h1 class="page_header">
            <i class="fa fa-book"></i> Documentation
            </h1>
            <hr>
            <dl>
                <dt>Lorem 1</dt>
                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</dd>
                <br>

                <dt>Lorem 2</dt>
                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</dd>
                <br>

                <dt>Lorem 3</dt>
                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</dd>
                <br>

                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</dd>
            </dl>

            <hr>

        </div>
        <div class="col-lg-4">
            <!-- Alex -->

            <div id="admin-alex" style="position: absolute; top:435px; z-index: 1; right: 220px; color: green;">
                <i class="fa fa-thumbs-up fa-2x"></i>
            </div>

            <h1 class="page_header">
                <i class="fa fa-users"></i> Admins
            </h1>
            <div class="thumbnail" style="width: 300px;">
                <a href="http://www.linkedin.com/profile/view?id=261506890&trk=spm_pic" target="_blank"><img src="{{ asset('img/Admin1.jpg') }}" alt="Alex" style="width: 300px; height: auto;" class="img-thumbnail"></a>
                <div class="caption">
                    <h3><i class="fa fa-beer"></i> Alex <span class="pull-right"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i></span></h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bre minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <a id="profile-img1" style="z-index: 2; position: relative;" href="http://www.linkedin.com/profile/view?id=261506890&trk=spm_pic" class="btn btn-primary" role="button" target="_blank">Profile</a>
                    <div class="pull-right">
                        <span class="label label-info" rel="tooltip" data-placement="bottom" title="Headphones"><i class="fa fa-headphones"></i></span>
                        <span class="label label-info" rel="tooltip" data-placement="bottom" title="Phone"><i class="fa fa-mobile"></i></span>
                        <span class="label label-info" rel="tooltip" data-placement="bottom" title="Laptop"><i class="fa fa-laptop"></i></span>
                        <span class="label label-warning" rel="tooltip" data-placement="bottom" title="Developer"><i class="fa fa-wrench"></i></span>
                    </div>
                </div>
            </div>

            <!-- Aco -->

            <div id="admin-aco" style="position: absolute; z-index: 1; top:955px; right: 220px; color: red;">
                <i class="fa fa-thumbs-down fa-2x"></i>
            </div>

            <div class="thumbnail" style="width: 300px;">
                <a href="http://www.linkedin.com/profile/view?id=221229778&authType=name&authToken=0DUz&ref=NUS&trk=liker-prf"   target="_blank"><img src="{{ asset('img/Admin2.jpg') }}" alt="Aco"  style="width: 300px; height: auto;" class="img-thumbnail"></a>
                <div class="caption">
                    <h3><i class="fa fa-money"></i> <i class="fa fa-pagelines"></i> Aco   <span class="pull-right"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></h3>

                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bre minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

                    <a id="profile-img2" style="z-index: 2; position: relative;" href="http://www.linkedin.com/profile/view?id=221229778&authType=name&authToken=0DUz&ref=NUS&trk=liker-prf" class="btn btn-primary" role="button" target="_blank">Profile</a>

                    <div class="pull-right">
                        <span class="label label-info" rel="tooltip" data-placement="bottom" title="Headphones"> <i class="fa fa-headphones" ></i></span>
                        <span class="label label-info" rel="tooltip" data-placement="bottom" title="Laptop"> <i class="fa fa-laptop"></i></span>
                        <span class="label label-info" rel="tooltip" data-placement="bottom" title="Credit Card"> <i class="fa fa-credit-card"></i></span>
                        <span class="label label-danger" rel="tooltip" data-placement="bottom" title="BOSS"> <i class="fa fa-eye"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('head-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#profile-img1").mouseover(function(){
                $("#admin-alex").animate({
                    right:'+=-60px'
                },"slow");
            });
            $("#profile-img1").mouseout(function(){
                $("#admin-alex").animate({
                    right:'+=+60px'
                },"slow");
            });

            $("#profile-img2").mouseover(function(){
                $("#admin-aco").animate({
                    right:'+=-60px'
                },"slow");
            });
            $("#profile-img2").mouseout(function(){
                $("#admin-aco").animate({
                    right:'+=+60px'
                },"slow");
            });

            $(function()
            {
                $(".fa-money-test").each(function()
                {
                    var $elie = $(this);
                    var degree = 0;
                    var timer;
                    rotate();

                    function rotate()
                    {
                        // For webkit browsers: e.g. Chrome
                        $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)'});
                        // For Mozilla browser: e.g. Firefox
                        $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)'});

                        // Animate rotation with a recursive call
                        timer = setTimeout(function() {
                            ++degree; rotate();
                        },5);
                    }
                });
            });
        });
    </script>
@stop

@section('head-style')
    <style type="text/css">
        p
        {
        color: #777777;
        }

        .features
        {
            color: #111111;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4, h5
        {
            color: #111111;
            font-weight: 400;
        }

        h3
        {
            margin: 0px !important;
        }

        .features p
        {
            margin-top: 10px !important;
        }

        .h3-list
        {
            margin-top: 20px;
        }

        .btn-inverse
        {
            background-color: #363636;
            background-image: linear-gradient(to bottom, #444444, #222222);
            background-repeat: repeat-x;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            color: #FFFFFF;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }

        .btn-inverse:hover
        {
            color: #8A7171;
        }

        .label-info, .label-danger, .label-warning
        {
            cursor: default;
        }
    </style>
@stop