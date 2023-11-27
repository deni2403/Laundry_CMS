<h1>Create User</h1>

<form action="/user/store" method="POST">
    @csrf
    <input type="text" name="name" placeholder="nama"><br>
    <input type="varchar" name="email" placeholder="email"><br>
    <input type="varchar" name="password" placeholder="password"><br>
    <select name="role" id="">
        <option value="">Role</option>
        <option value="superadmin">Super Admin</option>
        <option value="admin">Admin</option>
        <option value="cashier">Cashier</option>
        <option value="ironer">Ironer</option>
        <option value="packer">Packer</option>
    </select><br>
    <input type="submit" name="submit" value="save">
</form>