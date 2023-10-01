@layout(layouts.documentation)

@section(content)
    <div class = "container">
        <h3>Global PHP functions</h3>
        <p>
            <?php
                require_once sm::dir("php") . "docs.php";
                $docs = new documentation\docs();
                $docs -> breadcrumb("cards");
            ?>
        </p>
    </div>

    <div class="card mb-2">
        <h5 class="card-header card-header-info">Breadcrumbs</h5>
        <div class="card-body">
            <h5 class="card-title">Breadcrumb trails can be called from the globals\global_functions class.</h5>
            <p class="card-text">
                <span class = "bg-highlight">function breadcrumbs($separator = ' &raquo; ', $home = "Home", $home_path = null)</span>
            </p>
            <p>
                <div class = "my-2"><span class = "bg-highlight">$home</span> is the name of your starting directory.</div>
                <div class = "my-2"><span class = "bg-highlight">$home_path</span> is the first file or directory you want to start the list at.</div>
            </p>
        </div>
    </div>
@endsection