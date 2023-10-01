<?php 
    $frm = new folds\builder();

    $inp_username = [
        $frm -> label("Email", ["for|username"]),
        $frm -> input("text", ["nm|username", "id|username", "cl|form-control", "ph| Enter email"]),
        $frm -> elem("small", ["id|usernameHelp", "cl|form-text text-muted"],["We'll never share your information with anyone else."])
    ];

    $inp_pass = [
        $frm -> label("Password", ["for|password"]),
        $frm -> input("password", ["nm|password", "id|password", "cl|form-control", "ph|Password"])
    ];

    $inp_rem = [
        $frm -> input("checkbox", ["nm|rememberMe", "id|exChk1", "cl|form-check-input"]),
        $frm -> label("Remember Me", ["for|exChk1", "cl|form-check-label"])
    ];
    
    return $frm -> form(["ac|user_login", "style|width:50%;", "cl|spadeMe spadeScript", "id|login_form"],[
            $frm -> elem("div",["cl|form_message text-danger fw-bold"]),
            $frm -> div(["cl|form-group"], $inp_username),
            $frm -> div(["cl|form-group"], $inp_pass),
            $frm -> div(["cl|form-group form-check"], $inp_rem),
            $frm -> button("submit", ["cl|btn btn-primary"])
            ]
        );
 
?>