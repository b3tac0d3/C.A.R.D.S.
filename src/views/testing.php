@layout(layouts.primary)

@section(post-header)
<div class = "container text-center">
    <h3>Testing Grounds</h3>
</div>
@endsection

@section(content)
<?php 
    $frm = new folds\builder();

    $inp_username = [
        $frm -> label("Email", ["for|username"]),
        $frm -> input("text", ["nm|username", "id|username", "cl|form-control", "ph| Enter email"])
    ];
  
    echo $frm -> form(["ac|user_delete", "style|width:50%;", "cl|spadeMe spadeScript", "id|login_form"],[
            // $frm -> elem("div",["cl|form_message text-danger fw-bold"]),
            $frm -> div(["cl|form-group"], $inp_username),
            $frm -> button("submit", ["cl|btn btn-primary"])
            ]
        );
 
?>
@endsection

@section(footer)
@endsection