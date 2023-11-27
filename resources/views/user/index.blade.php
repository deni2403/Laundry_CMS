<a href="/user/create">Add Member</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
    </tr>
    @foreach ($user as $u)
    <tr>
        <td>{{ $u -> id }}</td>
        <td>{{ $u -> name }}</td>
        <td>{{ $u -> email }}</td>
        <td>{{ $u -> password }}</td>
        <td>{{ $u -> role }}</td>
        <td>
            <a href="/user/{{ $u->id }}/edit">EDIT</a>
            <form action="/user/{{ $u->id }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>        
    @endforeach

</table>