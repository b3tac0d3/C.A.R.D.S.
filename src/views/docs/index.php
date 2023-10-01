@layout(layouts.documentation)

@section(content)
    <div class = "container">
        <h3>Documentation</h3>
        <p>
            <?php
                require_once sm::dir("php") . "docs.php";
                $docs = new documentation\docs();
                $docs -> breadcrumb("cards");
            ?>
        </p>
    </div>
    <div style = "max-width: 400px;">
        <ul class = "list-group">
            <li class = "list-group-item list-group-item-info fs-5">Functionality</li>
        <!-- <button type = "button" class = "btn btn-success">+ Add New</button> -->
            <?php
                require_once sm::dir("php") . "docs.php";
                $docs = new documentation\docs();
                $docs -> load_doc_list(dirname(__FILE__));
            ?>
        </ul>
    </div>
@endsection