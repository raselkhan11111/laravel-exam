<table border="1">
    <thead>
        <tr>
            <th>SL#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Type</th>
            <th>Technology </th>
            <th>Duration</th>
            <th>Start Date</th>
           
            
        </tr>
    </thead>
    <tbody>
        @foreach($Courses as $Course)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Course->title }}</td>
            <td>{{ $Course->category }}</td>
            <td>{{ $Course->type }}</td>
            <td> @php $techs =json_decode($Course->technology)

                @endphp
                @foreach($techs as $tech)
                {{$tech}},

                @endforeach

            </td>
            <td>{{ $Course->duration}}</td>
            <td>{{ $Course->startdate}}</td>
           
          
        </tr>
        @endforeach
    </tbody>
</table>