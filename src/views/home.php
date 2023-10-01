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
            <ul class = "list-group">
                <li class = "list-group-item list-group-item-info fs-5">C.A.R.D.S.</li>
                <li class = "list-group-item">
                    <a href = "docs">Documentation</a>
                </li>
                <li class = "list-group-item">
                    <a href = "#">Run Setup</a>
                </li>
                <li class = "list-group-item">
                    <a href = "#">Shed Source</a>
                </li>
                <li class = "list-group-item">
                    <a href = "register">Register</a>
                </li>
                <li class = "list-group-item">
                    <a href = "login">Login</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section(footer)
@endsection