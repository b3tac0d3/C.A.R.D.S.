@privacy(1)
@layout(layouts.primary)

@section(post-header)
<style>
    .list-group-item button{
        min-width: 75%;
    }
</style>
    <div class = "container text-center">
        <!-- <h1>Welcome to C.A.R.D.S.</h1> -->
        <h3>Logged In to Dashboard</h3>
    </div>
@endsection

@section(content)
   <a href = "logout" class = "spadeScript">Logout</a>
@endsection

@section(footer)
@endsection