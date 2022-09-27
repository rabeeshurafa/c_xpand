

@if(count($names))
    <ul id="auto-complete-barcode" class="list-group" style="">
        @foreach($names as $barcode)
            <li class="list-group-item select_name emp_{{$loop->index }} custom-emp suggest-item "
                data-id="{{$barcode->id}}"
            ><a>  {{$barcode->name}}</a>
            </li>
        @endforeach
    </ul>
@endif




