<div class="row mobRow">
    <div class="col-md-12">
        <h5 class="sub-head" style="color:#ff9149">
            <b>
                {{ 'بيانات الإشتراك' }}
            </b>
        </h5>

        <table class="detailsTB table" style="margin-left: 15px;">
            <tbody>
                <tr>
                    <th scope="col" class="hidemob" style="color : #ffffff;">
                        {{ '#' }}
                    </th>
                    <th scope="col" style="color : #ffffff;">
                        {{ 'رقم الإشتراك' }}
                    </th>
                    <th class="hidemob" scope="col" class="hideMob"
                        style="text-align: -webkit-center; color : #ffffff;" >
                        {{ 'العداد' }}
                    </th>
                    <th scope="col" style="text-align: -webkit-center; color : #ffffff;">
                        {{ 'وصف مكان العداد' }}
                    </th>
                    <th class="hidemob" scope="col"></th>

                </tr>
            </tbody>
            <tbody id="recList">
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
                            
                            <a class="remove-btn {{ $readonly?"hide":"" }}" onclick="$(this).parent().parent().remove()" >
                                <i class="fa fa-trash" style="color:#1E9FF2;"></i>
                            </a>
                            
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
        </table>

    </div>
</div>