<div class="row mobRow">
    <div class="col-md-12 subsmob">
        <h5 class="sub-head" style="color:#ff9149">
            <b>
                {{ 'بيانات الإشتراك' }}
            </b>
        </h5>

        <table class="detailsTB table" style="margin-left: 15px;">
            <tbody>
                <tr>
                    <th scope="col">
                        {{ '#' }}
                    </th>
                    <th scope="col">
                        {{ 'رقم الإشتراك' }}
                    </th>
                    <th scope="col" class="hideMob"
                        style="text-align: -webkit-center;">
                        {{ 'العداد' }}
                    </th>
                    <th scope="col" style="text-align: -webkit-center;">
                        {{ 'وصف مكان العداد' }}
                    </th>
                    <th scope="col"></th>

                </tr>
            </tbody>
            <tbody id="recList">
            @if(isset($ticket))
                <?php $count = 1;?>
                @foreach($ticket->subscription as $subs)
                    <tr>
                        <td class="hidemob">
                            {{$count++}}
                        </td>
                        <td>   
                            {{($subs->licNo??'')}}
                            <input type="hidden" name="SubscribtionIdList[]" value="{{$subs->id}}">
                            <input type="text" class="form-control form-control1 numFeild hide" name="SubscribtionNumList[]" value="{{($subs->licNo??'')}}">
                        </td>
                        <td class="hidemob" style="text-align: -webkit-center;">   
                            {{($subs->counter_Type_name??'')}}
                            <input type="text" class="form-control form-control1 alphaFeild hide" name="CounterTypeList[]" value="{{($subs->counter_Type_name??'')}}">
                        </td>
                        <td style="text-align: -webkit-center;">   
                            {{($subs->placeDesc??'')}}
                            <input type="text" class="form-control form-control1   hide" name="CapacityList[]" value="{{($subs->placeDesc??'')}}">
                        </td>
                        
                        <td class="hidemob">
                            
                            <a class="remove-btn" onclick="$(this).parent().parent().remove()" >
                                <i class="fa fa-trash" style="color:#1E9FF2;"></i>
                            </a>
                            
                        </td>
                    </tr>
                
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
</div>