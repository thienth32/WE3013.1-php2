<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Join date</th>
        <th>Avatar</th>
        <th>Department</th>
        <th>Salary</th>
    </thead>
    <tbody>
        @foreach($employees as $em)
        <tr>
            <td>{{$em->id}}</td>
            <td>{{$em->name}}</td>
            <td>{{$em->address}}</td>
            <td>{{$em->join_date}}</td>
            <td>{{$em->avatar}}</td>
            <td>{{$em->department_id}}</td>
            <td>{{$em->salary}}</td>
        </tr>
        @endforeach
    </tbody>
</table>