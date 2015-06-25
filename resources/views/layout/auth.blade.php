<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap core CSS -->
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}

    <!-- Add custom CSS here -->
    {!! HTML::style('css/blog-home.css') !!}
    {!! HTML::style('css/blog-post.css') !!}
    {!! HTML::style('css/validationEngine.jquery.css') !!}
    {!! HTML::style('css/main.css') !!}

    <!-- Add Javascript validation -->
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/jquery.validationEngine.js') !!}
    {!! HTML::script('js/languages/jquery.validationEngine-en.js') !!}
    <script>
        $(document).ready(function(){
            $("#formID").validationEngine();
        });
    </script>

    @yield('head-style')
    </head>

  <body>

    @include('layout.navigation')

    @if(Session::has('global-error'))
        <div class="container">
            <div class="alert alert-danger">
              <p class="lead text-center text-danger">{!! Session::get('global-error') !!}</p>
            </div>
        </div>
    @endif

    @yield('content')

    {!! HTML::script('js/bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $("#search-button").tooltip();
        });
    </script>
  </body>
</html>