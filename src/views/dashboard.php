@perm(1)
@layout(layouts.primary)

@section(post-header)
<style>
    .list-group-item button{
        min-width: 75%;
    }
</style>
    <div class = "container">
        <!-- <h1>Welcome to C.A.R.D.S.</h1> -->
        <h3>User Dashboard</h3>
    </div>
@endsection

@section(content)
<div class = "container">
        <div class = "container" style = "max-width: 400px;">
            <ul class = "list-group">
                <li class = "list-group-item list-group-item-info fs-5">C.A.R.D.S.</li>
                <li class = "list-group-item">
                    <a href = "docs">Documentation</a>
                </li>
                <li class = "list-group-item">
                    <a href = "todo">Tasks</a>
                </li>
                <li class = "list-group-item">
                    <a href = "logout" class = "spadeScript">Logout</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section(footer)
@endsection