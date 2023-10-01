<?php
    $frm = new framework\nav();
?>


<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <?php $img = $_SESSION['fnd']['app']['urls']['img'];?><img style = "height:4em; margin-right: .5em;" src = "<?=$img?>framework/joker_logo_clear.png"/>
        <span><h2 class = "m-0 p-0">Cards</h2></span>
      </a>
    
      <ul class="nav nav-pills">
        <?php
            $frm -> build_nav_link("Home", "");
            $frm -> build_nav_link("Documentation", "docs");
            $frm -> build_nav_link("Login", "login");
            $frm -> build_nav_link("Register", "register");
            $frm -> build_nav_link("Todo", "todo");
        ?>
      </ul>
    </header>
  </div>