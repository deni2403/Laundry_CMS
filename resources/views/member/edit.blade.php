<h1>Add Member</h1>

<form action="{{ route('update.member',$member->id) }}" method="post">
    @method('put')
    @csrf
    <input type="text" name="name" placeholder="nama" value="{{ $member -> name }}"><br>
    <input type="text" name="email" placeholder="email" value="{{ $member -> email }}"><br>
    <input type="text" name="phone_number" placeholder="no tlf" value="{{ $member -> phone_number}}"><br>
    <input type="text" name="nama" placeholder="Total Point" value="{{ $member -> total_Point}}"><br>
    <input type="date" name="registration_date"  value="{{ $member -> registration_date}}"><br>
    <input type="submit" name="submit" value="Save"><br>
</form>