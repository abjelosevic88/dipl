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
                    <a href="http://www.linkedin.com/profile/view?id=261506890&trk=spm_pic" target="_blank">
                        <img
                            src="{{ $user->profile_picture }}"
                            alt="{{ $user->username }}"
                            class="img-thumbnail profile-picture">
                    </a>
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
                                        <a href="{{ $s_link_value }}" alt="{{ $s_link_key }}">
                                            <span
                                                class=""
                                                rel="tooltip"
                                                data-placement="bottom"
                                                title="{{ ucfirst($s_link_key) }}">
                                                    <i class="fa {{ $s_config[$s_link_key] }} fa-3x"></i>
                                            </span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                .col-lg-8
            </div>
        </div>
	</div>
@stop

@section('head-style')
    {!! HTML::style('css/profile.css') !!}
@stop