@layout(layouts.documentation)

@section(content)
    <div class = "container">
        <h3>Routing basics</h3>
        <p>
            <?php 
                require_once sm::dir("php") . "docs.php";
                $docs = new documentation\docs();
                $docs -> breadcrumb("cards");
            ?>
        </p>
    </div>

    <div class="card mb-2">
        <h5 class="card-header card-header-info">Controllers</h5>
        <div class="card-body">
            <h5 class="card-title">Controller routes are called by <span class = "bg-highlight">$route -> parse()</span> from the routes_list.php file.</h5>
            <p class="card-text">
                <span class = "bg-highlight">function parse($file_name, $route_type = "get", $permission_required = 0)</span>
                <li>File and class same name: parse('file_name')</li>
                <li>File and class different names: parse('file_name:class_name')</li>
                <li>File and class same name with function: parse('file_name@function_name')</li>
                <li>File and class different names with function: parse('file_name:class_name@function_name')</li>
            </p>
        </div>
    </div>
    
    <div class="card mb-2">
        <h5 class="card-header card-header-info">Static Views</h5>
        <div class="card-body">
            <h5 class="card-title">Static views are called by <span class = "bg-highlight">$route -> view()</span> from the route_list.php file.</h5>
            <p class="card-text">
                <span class = "bg-highlight">function view($file_name, $route_type = "get", $permission_required = 0)</span>
            </p>
        </div>
    </div>

    <div class = "card">
        <h5 class = "card-header card-header-info">Variables</h5>
        <div class = "card-body">
            <div class = "my-2"><span class = "bg-highlight">$file_name</span> has no default value and is required.</div>
            <div class = "my-2"><span class = "bg-highlight">$route_type = get</span></div>
            <div class = "my-2"><span class = "bg-highlight">$permission_required = 0</span> is not required. 0 = public</div>
        </div>
    </div>
@endsection