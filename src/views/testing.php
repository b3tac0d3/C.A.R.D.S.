@layout(layouts.primary)

@section(post-header)
<div class = "container text-center">
    <h3>Testing Grounds</h3>
</div>
@endsection

@section(content)
   <?php 
        // echo rand(1000, 9999);
        // echo date("Y-m-d h:i:s");
        session_start();
        var_dump($_SESSION["user_session"]);
   ?>
@endsection

@section(footer)
@endsection