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
        <div class = "container" style = "max-width: 400px;">
            <h2>Sorry! You have to be logged in to view that. Please log in <a href = "login">here</a></h2>
        </div>
    </div>
@endsection

@section(footer)
@endsection