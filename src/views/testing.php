@layout(layouts.primary)

@section(post-header)
<div class = "container text-center">
    <h3>Testing Grounds</h3>
</div>
@endsection

@section(content)
<?php 
    // $frm = new folds\builder();

    // $inp_username = [
    //     $frm -> label("Email", ["for|username"]),
    //     $frm -> input("text", ["nm|username", "id|username", "cl|form-control", "ph| Enter email"])
    // ];
  
    // echo $frm -> form(["ac|user_delete", "style|width:50%;", "cl|spadeMe spadeScript", "id|login_form"],[
    //         // $frm -> elem("div",["cl|form_message text-danger fw-bold"]),
    //         $frm -> div(["cl|form-group"], $inp_username),
    //         $frm -> button("submit", ["cl|btn btn-primary"])
    //         ]
    //     );
 

    $query = new aces\query();

    var_dump($query -> set_select_array(["u.id as user_id", "u.username", "c.fname", "c.lname"]) 
                    -> set_join("contacts", "c", ["c.id" => "u.id"]) 
                    -> set_where("u.id", 1) 
                    -> select("users", "u"));

    // SELECT u.id as user_id, u.username, c.fname, c.lname FROM users u INNER JOIN contacts c ON c.id = u.id WHERE u.id = 1 
?>
@endsection

@section(footer)
@endsection