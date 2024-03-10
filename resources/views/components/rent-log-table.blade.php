<div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($rentlog as $item)
            <tr class="{{$item->actual_return_date == null? '' : ($item->actual_return_date <= $item->return_date? ' bg-green-300 text-gray-50':
            'bg-red-300 text-gray-50')}}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->users->username }}</td>
                <td>{{ $item->books->title }}</td>
                <td>{{ $item->rent_date }}</td>
                <th>{{ $item->return_date}}</th>
                <th>{{ $item->actual_return_date }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>