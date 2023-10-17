@layout(layouts.primary)

@section(post-header)
<style>
    .list-group-item button{
        min-width: 75%;
    }
</style>
    <div class = "container text-center">
        <!-- <h1>Welcome to C.A.R.D.S.</h1> -->
        <h3>Comprehensive Application for Rapid Development Simplisticly</h3>
    </div>
@endsection

@section(content)
    <div class = "d-flex justify-content-start">
        <div class = "container">
            <h2>Looks like your session expired! Please log back in <a href = "login">here</a></h2>
        </div>
    </div>
@endsection

@section(footer)
<?php
    if(empty($_SESSION)) session_start();
    $_SESSION["user_session"] = null;
?>
@endsection