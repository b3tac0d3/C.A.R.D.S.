@layout(layouts.primary)

@section(content)
<div class = "text-center">
    <h2>Register</h2>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
    <h5 class="text-center mb-4">Sign Up</h5>
    <?php forms::print_form("register")?>
        </div>
    </div>
</div>
@endsection