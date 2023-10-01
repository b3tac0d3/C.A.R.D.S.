<html lang="en" class="h-100">
    <head>
        <?php require_once "_head.php"?>
        @yield(post-head)
        <link href="<?=sm::url("css")?>docs.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
        <header>
            @yield(pre-header)
            <?php require_once "_header.php"?>
            @yield(post-header)
        </header>
        <!-- Begin page content -->
        <main class="flex-shrink-0">
            <div class="container w-75">
                @yield(content)
            </div>
        </main>

        <footer class="footer mt-auto py-3">
            <div class="container">
                @yield(pre-footer)
                <?php require_once "_footer.php"?>
                @yield(post-footer)
            </div>
        </footer>
    </body>
    @yield(post-body)
    <?php require_once "_foot.php"?>
</html>