<form action="{{ route('user.logout') }}" method="post">
    @method("delete")
    @csrf

    <button class="nav-link border btn btn-danger"> Deconnexion</button>
</form>
