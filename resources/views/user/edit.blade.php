<h1>Edit User</h1>

<form action="/user/{{ $user->id }}" method="POST">
    @method('put')
    @csrf
    <input type="text" name="name" placeholder="nama" value="{{ $user->name }}"><br>
    <input type="varchar" name="email" placeholder="email" value="{{ $user->email}}"><br>
    <input type="varchar" name="password" placeholder="password" value="{{ $user->password }}"><br>
    <select name="role" id="">
        <option value="">Role</option>
        <option value="superadmin" @if($user->superadmin=="Super Admin")selected @endif>Super Admin</option>
        <option value="admin" @if($user->admin=="Admin")selected @endif>Admin</option>
        <option value="cashier" @if($user->cashier=="Cashier")selected @endif>Cashier</option>
        <option value="ironer" @if($user->ironer=="Ironer")selected @endif>Ironer</option>
        <option value="packer" @if($user->packer=="Packer")selected @endif>Packer</option>
    </select><br>
    <input type="submit" name="submit" value="save">
</form>