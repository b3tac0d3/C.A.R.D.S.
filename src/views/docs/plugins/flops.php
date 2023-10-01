@layout(layouts.documentation)

@section(content)
    <div class = "container">
        <h3>F.L.O.P.S.</h3>
        <p>
            <?php 
                require_once sm::dir("php") . "docs.php";
                $docs = new documentation\docs();
                $docs -> breadcrumb("cards");
            ?>
        </p>
    </div>
@endsection