@layout(layouts.documentation)

@section(content)
    <div class = "container">
        <h3>A.C.E.S.</h3>
        <p>
            <?php 
                require_once sm::dir("php") . "docs.php";
                $docs = new documentation\docs();
                $docs -> breadcrumb("cards");
            ?>
        </p>
    </div>
@endsection