<table border="2">
    <thead>
        <tr>
            <th>SL#</th>
            <th>Title</th>
            <th>Category Id</th>
            <th>Category Name </th>
            <th>Product Price</th>
            <th>Active Status</th>
            <th>Description</th>


        </tr>
    </thead>
    <tbody>


        @foreach($Products as $Product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Product->title }}</td>
            <td>{{ $Product->category_id }}</td>
            <td>
                @foreach($Allcates as $Allca)
                @if($Product->category_id==$Allca->id)

                {{$Allca->title}}

                @endif

                @endforeach
            </td>
            <td>{{ $Product->price }}</td>
            <td>{{ $Product->is_active? 'Yes' : 'No' }}

            </td>
            <td>{{ $Product->description}}</td>



        </tr>
        @endforeach
    </tbody>
</table>