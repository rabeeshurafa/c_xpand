<div class="row">
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">
            <div class="form-group col-10" style="padding-left:0px;">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{trans('admin.city')}}
                    </span>
                </div>  
                <select id="CityID" name="CityID" type="text" class="form-control selectFullCorner">
                    <option value=""> -- {{trans('admin.city')}} --</option>     
                    @foreach($city as $cit)
                        <option  value="{{$cit->id}}" {{$address->city_id==$cit->id?"selected":"" }} >  {{$cit->name}} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(10,'CityID','City')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">
            <div class="form-group col-10" style="padding-left:0px;margin-left: -5px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{trans('admin.state')}}
                        </span>
                    </div>  
                <select id="area_data" name="TownID" type="text" class="form-control selectFullCorner">
                    <option value=""> -- {{trans('admin.state')}} -- </option>
                    @foreach($area as $cit)
                        @if($address->city_id==$cit->city_id)
                            <option  value="{{$cit->id}}"  {{$address->area_id==$cit->id?"selected":"" }}>  {{$cit->name}} </option>
                        @endif;
                    @endforeach
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(33,$('#CityID').find(':selected').val(),'Area')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">  
            <div class="form-group col-10" style="padding-left:0px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{trans('admin.area')}}
                        </span>
                    </div>  
                    <select id="region_data" name="AreaID" type="text" class="form-control selectFullCorner">
                        <option value=""> -- {{trans('admin.area')}} --  </option>                                                                         
                        </select>
                    
                </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(77,$('#area_data').find(':selected').val(),'Resion')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    {{trans('admin.address_details')}}
                    </span>
                </div>
                <textarea type="text" id="AddressDetails" class="form-control" 
                placeholder="{{trans('admin.address_details')}}" name="AddressDetails"
                    style="height: 40px;"></textarea>
                <div class="input-group-append hidden-xs hidden-sm">
                <span class="input-group-text input-group-text2" style="color:#ffffff">
                <i class="fa fa-external-link-alt"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        {{trans('admin.notes')}}
                        </span>
                </div>
                <textarea type="text" id="Note" class="form-control"
                    placeholder="{{trans('admin.notes')}}" name="Note" 
                    style="height: 40px;"></textarea>
                <div class="input-group-append hidden-xs hidden-sm">
                    <span class="input-group-text input-group-text2" style="color:#ffffff">
                    <i class="fa fa-external-link-alt"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
/*
selectedTown=0;
flag=0;
    function changeList(parent){
        $(".allTown").hide();
        $(".Town"+parent).show();
        
        $(".allTown").each(function () {
            if ($(this).css('display') != 'none') {
                if(flag==0){
                    selectedTown=$(this).val();
                    flag=1;
                }
            }
        });
        $("#area_data1").val(selectedTown)
        
        first=$("#area_data1").val();
        console.log(first)
        $(".allArea").hide();
        $(".area"+first).show();
    }
    $(document).ready(function(){
        changeList({{$address->city_id}});
    })*/
</script>