@extends("layout.main")

@section("content")
    Edit
    <div class="container">
	    <div class="row">
            <div class="col-lg-4">
                <h1 class="page_header">
                    {!! isset($user->first_name) ? $user->first_name : env('FIRST_NAME'); !!}
                    {!! isset($user->last_name) ? $user->last_name : env('LAST_NAME'); !!}
                </h1>
                <div class="thumbnail profile-thumbnail">
                    <img id="profile-image" src="{{ $user->profile_picture }}" alt="{{ $user->username }}" class="img-thumbnail profile-picture">
                    <div id="profile-edit-image" class="profile-edit-image">
                        <img id="edit-image" src="{{ $user->profile_picture }}" class="edit-image">
                        {{-- <form action="">
                            File: <input type="file" name="myfile">
                        </form> --}}
                    </div>
                    <div class="caption">
                        <h3> {!! ucfirst($user->username) !!} </h3>
                        <span class="" rel="tooltip" data-placement="bottom" title="Edit User name"><i class="fa-pencil-square-o fa-2x"></i></span>
                        <!-- fa-pencil-square-o -->
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.
                            Bre minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                        </p>
                        @if (!empty($user->social_links))
                            <div class="profile-social-icons">
                                @foreach ($user->social_links as $s_link_key => $s_link_value)
                                    @if (array_key_exists($s_link_key, $s_config))
                                        <a href="#" alt="{{ $s_link_key }}" id="social-icon-{{ $s_link_key }}">
                                            <span
                                                class=""
                                                rel="tooltip"
                                                data-placement="bottom"
                                                title="{{ ucfirst($s_link_key) }}">
                                                    <i class="fa {{ $s_config[$s_link_key] }} fa-3x"></i>
                                            </span>
                                        </a>
                                        <div id="social-edit-{{ $s_link_key }}" class="social-edit">
                                            <input type="text" name="social-{{ $s_link_key }}" value="{{ $s_link_value }}" />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
            TEST
            </div>
        </div>
	</div>
@stop

@section('head-script')
<script type="text/javascript">
    $(document).ready(function() { 
        $('#profile-image').click(function() { 
            $.blockUI({ 
                onOverlayClick: $.unblockUI,
                message: $('#profile-edit-image'),
                css: { 
                    top:  ($(window).height() - 400) /2 + 'px', 
                    left: ($(window).width() - 400) /2 + 'px', 
                    width: '400px' 
                } 
            }); 
        });
        <?php
            foreach ($user->social_links as $s_link_key => $s_link_value)
            {
                echo "$('#social-icon-$s_link_key').click(function() {
                    $.blockUI({ 
                        onOverlayClick: $.unblockUI,
                        message: $('#social-edit-$s_link_key'),
                        css: { 
                            top:  ($(window).height() - 400) /2 + 'px', 
                            left: ($(window).width() - 400) /2 + 'px', 
                            width: '400px' 
                        } 
                    });
                });";
            }
        ?>
    }); 
</script>
@stop

@section('head-style')
    {!! HTML::style('css/profile.css') !!}
@stop