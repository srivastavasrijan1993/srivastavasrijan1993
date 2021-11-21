<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container mt-3">
  <h2>Record {{count($total)}}</h2>
 
  <table class="table table-striped">
    <thead class="text-uppercase">
      <tr>
        <th>officename</th>
        <th>pincode</th>
        <th>officetype</th>
            <th>deliverystatus</th>
                <th>divisionname</th>
                    <th>regionname</th>
                        <th>circlename</th>
                            <th>taluk</th>
                                <th>districtname</th>
                                  <th>statename</th>
      </tr>
    </thead>
    @foreach($data as $row)
    <tbody>
      <tr>
        <td>{{$row->officename}}</td>
           <td>{{$row->pincode}}</td>
              <td>{{$row->officeType}}</td>
                 <td>{{$row->deliverystatus}}</td>

                    <td>{{$row->divisionname}}</td>
                       <td>{{$row->regionname}}</td>
                          <td>{{$row->circlename}}</td>
                              <td>{{$row->taluk}}</td>
                                  <td>{{$row->districtname}}</td>
                                      <td>{{$row->statename}}</td>

        
      </tr>
   
    </tbody>
    @endforeach
  </table>
@if ($data->hasPages())
    <ul class="pagination pagination">
        {{-- Previous Page Link --}}
        @if ($data->onFirstPage())
            <li class="disabled"><span>Prev</span></li>
        @else
            <li><a href="{{ $data->previousPageUrl() }}" rel="prev">Prev</a></li>
        @endif

        @if($data->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $data->url(1) }}">1</a></li>
        @endif
        @if($data->currentPage() > 4)
            <li><span>...</span></li>
        @endif
        @foreach(range(1, $data->lastPage()) as $i)
            @if($i >= $data->currentPage() - 2 && $i <= $data->currentPage() + 2)
                @if ($i == $data->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $data->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($data->currentPage() < $data->lastPage() - 3)
            <li><span>...</span></li>
        @endif
        @if($data->currentPage() < $data->lastPage() - 2)
            <li class="hidden-xs"><a href="{{ $data->url($data->lastPage()) }}">{{ $data->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($data->hasMorePages())
            <li><a href="{{ $data->nextPageUrl() }}" rel="next">NEXT</a></li>
        @else
            <li class="disabled"><span>»</span></li>
        @endif
    </ul>
@endif
 
</div>
 <style type="text/css">
  
 .pagination{
    display: flex;
    list-style: none;
}
 
.pagination .active{
    background: #17a2b8;
    color: #f8f9fa;
  padding: 10px 15px;
}
  
.pagination li{
 
    border: 1px solid #f8f9fa;
  
}
.pagination li a{
	    display: block;
   padding: 5px 15px;
   margin: 5px;
}
 
  </style>
</body>
</html>
