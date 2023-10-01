@layout(layouts.primary)

@section(content)
<div class = "text-center">
    <h2>Login</h2>
</div>
<div class = "d-flex justify-content-center px-3 py-5 my-6">
    <?php forms::print_form("login")?>
</div>

<!-- 
<a href = "#" class = "spadeIt">Spade me</a>
<li href = "#" class = "spadeIt">Spade me List</li>
<button type = "button" href = "#" class = "spadeIt">Spade me Button</button>

<a href = "#" class = "spadeItNot">Spade me</a>
<li href = "#" class = "spadeItNot">Spade me List</li>
<button type = "button" href = "#" class = "spadeItNot">Spade me Button</button> 
-->
@endsection