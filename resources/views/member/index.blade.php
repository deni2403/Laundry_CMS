<a href="{{ route('create.member') }}">Add Member</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>NO TLF</th>
        <th>TOTAL_POINT</th>
        <th>INPUT</th>
    </tr>
    @foreach ($member as $m)
    <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->name }}</td>
        <td>{{ $m->email }}</td>
        <td>{{ $m->phone_number }}</td>
        <td>{{ $m->total_Point }}</td>
        <td>{{ $m->registration_date }}</td>
        <td>
            <a href="{{ route('edit.member',$m->id) }}">EDIT</a>
            <form action="{{ route('destroy.member',$m->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </td>        
        @endforeach
    </tr>
</table>