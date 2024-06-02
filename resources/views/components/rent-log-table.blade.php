<div>
<table class="table table-hover">
        <thead>
            <tr>
                <th>NO.</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlogs as $i)
            <tr class="{{ $i->actual_return_date == null ? '' : ($i->return_date < $i->actual_return_date ? ' table-danger ' : ' table-success ') }}" >
                <td>{{ $loop->iteration }}</td>
                <td>{{ $i->user->username }}</td>
                <td>{{ $i->book->title }}</td>
                <td>{{ $i->rent_date }}</td>
                <td>{{ $i->return_date }}</td>
                <td> {{ $i->actual_return_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>