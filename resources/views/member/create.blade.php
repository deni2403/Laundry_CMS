<h1>Add Member</h1>

<form action="{{ route('store.member')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="nama"><br>
    <input type="text" name="email" placeholder="email"><br>
    <input type="text" name="phone_number" placeholder="no tlf"><br>
    <input type="text" name="total_point" placeholder="Total Point"><br>
    <input type="date" name="registration_date" placeholder=""><br>
    <input type="submit" name="submit" value="Save"><br>
</form>