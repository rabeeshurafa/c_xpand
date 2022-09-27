@extends('layouts.admin')

@section('search')

<li class="dropdown dropdown-language nav-item hideMob">

            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">

          </li>

@endsection

@section('content')
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
    padding: 2px 6px !important;
    margin-top: 0 !important;
    background-color: #1E9FF2!important;
    border-color: #1E9FF2 !important;
    color: #FFFFFF;
    margin-left: 8px !important;
    margin-bottom: 2px;
}
.preW{
    width:40%!important;
}
.select2-container--default
{
    width:100%!important;
}
</style>


<section class="horizontal-grid" id="horizontal-grid">

<form id="formData">

    <div class="row white-row">

        <div class="col-sm-12 col-md-6">

            <div class="card rightSide">

                <div class="card-header">

                    <h4 class="card-title"><img src="https://db.expand.ps/images/sponsor.png">
                    {{'زيارة مستشفى'}}
                    </h4>


{{--
                    <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">

                    {{trans('admin.org_status')}}

                    </div>

                    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">

                            <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">

                        </div>--}}

                </div>

                <div class="card-content collapse show">

                    <div class="card-body" style="padding-bottom: 0px;">

                        <div class="form-body">

                            <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group w-s-87">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">

                                                    {{'اسم المسن'}}

                                                </span>

                                            </div>

                                            <input type="text" id="agedName" class="form-control alphaFeild ac ui-autocomplete-input"  placeholder=" {{'اسم المسن'}} " name="agedName">
                                        </div>
                                        <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                        <input type="hidden" id="aged_id" name="aged_id" value="">
                                        <input type="hidden" id="hospital_id" name="hospital_id" value="">
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="form-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'التاريخ'}}
    
                                                </span>

                                            </div>

                                            <input id="visitDate" name="visitDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group w-s-87 ">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">
                                                    {{'اسم المستشفى'}}                             
                                                </span>

                                            </div>

                                            <input type="text" id="hospitalName" class="form-control alphaFeild ac1 ui-autocomplete-input" placeholder=" {{'اسم المستشفى'}}" name="hospitalName" >

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="input-group width106">

                                        <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1">

                                        {{'المرافق'}}

                                        </span>

                                        </div>
                                        <input type="text" id="companion" class="form-control alphaFeild" placeholder=" {{'المرافق'}}" name="companion" >
                                    </div>

                                </div>
                                

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    {{'سبب الزيارة'}}
                                                    </span>
                                            </div>
                                            <textarea type="text" id="cause" class="form-control"
                                                placeholder="{{'سبب الزيارة'}}" name="cause" 
                                                style="height: 40px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-header" style="padding-top:0px;">

                    <h4 class="card-title">

                        {{--<img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32">--}}

                        {{'الوصفة الطبية'}}

                    </h4>

                </div>
                <div class="card-content collapse show">

                    <div class="card-body" style="padding-bottom: 0px;">
                        <div class="med" id="med" name="med">
                            <div class="row">
    
                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">
    
                                    <div class="form-group">
    
                                        <div class="input-group w-s-87">
    
                                            <div class="input-group-prepend">
    
                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'اسم الدواء'}}
    
                                                </span>
    
                                            </div>
    
                                            <input type="text" id="medName[]" class="form-control alphaFeild ac2 ui-autocomplete-input"  placeholder=" {{'اسم الدواء'}} " name="medName">
                                        </div>
                                        <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                        <input type="hidden" id="med_id[]" name="med_id[]" value="">
                                    </div>
                                </div>
    
                                <div class="col-lg-5 col-md-12">
    
                                    <div class="form-group">
    
                                        <div class="input-group">
    
                                            <div class="input-group-prepend">
    
                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'الجرعة'}}
    
                                                </span>
    
                                            </div>
    
                                            <input type="text" id="dos[]" class="form-control alphaFeild" disabled  placeholder=" {{'الجرعة'}} " name="dos[]" autocomplete="off">
                                            <a class="add-btn" onclick="addmed();" style="margin-left: 0px; margin-right: 10px; padding-top: 5px;">
                                                <i class="fa fa-plus" style="color:#1E9FF2;"></i>
                                            </a>
                                        </div>
    
                                    </div>
    
                                </div>
    
                            </div>
                        </div>
                            
                        <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group w-s-87">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">

                                                    {{'مدة اخذ الدواء'}}

                                                </span>

                                            </div>

                                            <input type="text" id="Duration" class="form-control alphaFeild  ui-autocomplete-input"  placeholder=" {{'مدة اخذ الدواء'}}" name="Duration" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-12">

                                    <div class="form-group">

                                        <div class="input-group" style="padding-left: 23px">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'تاريخ انتهاء العلاج'}}
    
                                                </span>

                                            </div>
                                            <input id="endDate" name="endDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                            
                                        </div>

                                    </div>

                                </div>

                            </div>
                            
                        <div class="row">

                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">

                                    <div class="form-group">

                                        <div class="input-group" style="">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'تاريخ المراجعة'}}
    
                                                </span>

                                            </div>
                                            <input id="returnDate" name="returnDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                            
                                        </div>

                                    </div>
                                </div>
                                
                            </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="col-sm-12 col-md-6">

            <div class="card leftSide" style="min-height:532.375px">

                <div class="card-header">
    
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{'تحويل الى مستشفى او طبيب خاص'}}</h4>
    
                </div>

                <div class="card-content collapse show">
    
                    <div class="card-body">
    
                        <div class="form-actions" style="border-top:0px;padding-top: 0px;margin-top: 0px;">
                            
                            <div class="row">
    
                                <div class="col-lg-4 col-md-12">
    
                                    <div class="form-group">
    
                                        <div class="input-group w-s-87">
    
                                            <div class="input-group-prepend">
    
                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'تاريخ المبيت'}}
    
                                                </span>
    
                                            </div>
                                            <input id="overnightDate" name="overnightDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 col-md-12">
    
                                    <div class="form-group">
    
                                        <div class="input-group" style="">
    
                                            <div class="input-group-prepend">
    
                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'تاريخ الخروج'}}
    
                                                </span>
    
                                            </div>
                                            <input id="overnightEndDate" name="overnightEndDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                            
                                        </div>
    
                                    </div>
    
                                </div>
                                <div class="col-lg-4 col-md-12">
    
                                    <div class="form-group">
    
                                        <div class="input-group">
    
                                            <div class="input-group-prepend">
    
                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'المدة الزمنية'}}
    
                                                </span>
    
                                            </div>
    
                                            <input type="text" id="overnightDu" class="form-control alphaFeild"  placeholder=" {{'المدة الزمنية'}} " name="overnightDu" autocomplete="off">
                                            
                                        </div>
    
                                    </div>
    
                                </div>
    
                            </div>
                            
                            <div class="row">
    
                                <div class="col-lg-4 col-md-12">
    
                                    <div class="form-group">
    
                                        <div class="input-group w-s-87">
    
                                            <div class="input-group-prepend">
    
                                                <span class="input-group-text" id="basic-addon1">
    
                                                    {{'بحاجة إلى عملية'}}
    
                                                </span>
    
                                            </div>
                                            <select type="text" id="needOp" name="needOp" class="form-control needOp">
                                                <option> اختر </option>
                                            </select>
                                            <div class="input-group-append" onclick="/*ShowConstantModal(107,'needOp','الجهة الممولة')*/">
                                                <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link"></i>
                                                </span>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-8 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98% !important;">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    {{'الفحوصات الطبية التى تم اجرائها'}}
                                                    </span>
                                            </div>
                                            <textarea type="text" id="scan" class="form-control"
                                                placeholder="{{"الفحوصات الطبية التى تم إجرائها"}}" name="scan" 
                                                style="height: 40px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width: 98.6% !important;">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    {{'ملاحظات وتوصيا المستشفى'}}
                                                    </span>
                                            </div>
                                            <textarea type="text" id="notes" class="form-control"
                                                placeholder="{{"ملاحظات وتوصيات المستشفى"}}" name="notes" 
                                                style="height: 40px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row hideMob" style="">
                                
                                <div class="form-group col-md-12 offset-md-3 mb-2 text-center1" style="text-align: center; margin-right: 0px;">
                                    <span title="Tag Employee" style="margin: 3px; color:#1e9ff2">
                                        <a>
                                            <img src="{{asset('assets/images/add-user.png')}}" onclick="showtag();" style="margin-bottom: 13px; width: 26px;height: 26px;" />
                                        </a>
                                    </span>
                                    
                                </div>
                                
                            </div>
                            <div class="row hideMob tag_id" id="tag_id"
                                style="display: none; margin-right: 10px; margin-left: 5px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group" style="width:99% !important;">
                                            <div class="input-group-prepend">
                                                <span class="input-grojkup-text" id="basic-addon1">
                                                    نسخة إلى
                                                </span>
                                            </div>
                                            <select id="tags" name="tags[]"
                                                class="select2 form-control select2-hidden-accessible" multiple=""
                                                data-toggle="select" style="width:100%;height: 35px;"
                                                data-select2-id="select2-data-tags" tabindex="-1" aria-hidden="true">
                                                {{--@foreach ($employees as $emp)
                                                    <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                @endforeach--}}
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            @include('dashboard.includes.visitAttachment')
    
                            <div class="text-right">
                                <button id="editBtn" style="display:none" class="btn btn-primary save-data">تعديل<i class="ft-thumbs-up position-right"></i></button>
                                
                                <button id="saveBtn" class="btn btn-primary save-data">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>
    
                                <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning  reset-data"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>

        </div>

    </div>

</form>

</section>

{{--@include('dashboard.component.fetch_table')--}}




<script>
$(document).ready(function () {
    $( ".ac" ).autocomplete({
		source:'aged_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#aged_id").val(ui.item.id)
		}
	});
	
    $( ".ac1" ).autocomplete({
		source:'aged_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#hospital_id").val(ui.item.id)
		}
	});
	
    $( ".ac1" ).autocomplete({
		source:'hospital_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            $("#hospital_id").val(ui.item.id)
		}
	});
	
    $( ".ac2" ).autocomplete({
		source:'medicine_auto_complete',
		minLength: 1,
        select: function( event, ui ) {
            getMedData(ui.item.id)
		}
	});
});	
	function getMedData(id){
    
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}',//$('meta[name="csrf-token"]').attr('content')

            }

        });
        formData={'med_id':id}
            $.ajax({
            type:'get',
            url: "medicine_info",
            data: formData,
            /*contentType: false,
            processData: false,*/
            success: (response) => {
                 var currentIndex=$("input[name^=medName]").length -1;
                if(response.info.dos!=null)
                $('input[name="dos[]"]').eq(currentIndex).val(response.info.dos.name);
                $('input[name="med_id[]"]').eq(currentIndex).val(response.info.id);
                $('input[name="medName[]"]').eq(currentIndex).val(response.info.name);
                
                $(".loader").addClass('hide');
           
           },
           error: function(response){
            $(".loader").addClass('hide');

			Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: '{{trans('admin.error_save')}}',
				showConfirmButton: false,
				timer: 1500
				})
           }
       });
}

    var tag_idDisplayed = false;

    function showtag() {
        if (tag_idDisplayed == false) {
            $('.tag_id').show();
            tag_idDisplayed = true;
        } else {
            $('.tag_id').hide();
            tag_idDisplayed = false;
        }
    }
    
    function addmed(){
        newmed='';
        newmed+='<div class="row">'
    
                +'<div class="col-lg-7 col-md-12 pr-0 pr-s-12">'

                +    '<div class="form-group">'

                +        '<div class="input-group w-s-87">'

                +            '<div class="input-group-prepend">'

                +                '<span class="input-group-text" id="basic-addon1">'

                +                    "{{'اسم الدواء'}}"

                +                '</span>'

                +            '</div>'

                +            '<input type="text" id="medName[]" class="form-control alphaFeild ac2 ui-autocomplete-input"  placeholder=" {{"اسم الدواء"}} " name="medName[]">'
                +        '</div>'
                +        '<div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>'
                +        '<input type="hidden" id="med_id[]" name="med_id[]" value="">'
                +    '</div>'
                +'</div>'

                +'<div class="col-lg-5 col-md-12">'

                +    '<div class="form-group">'

                +        '<div class="input-group">'

                +            '<div class="input-group-prepend">'

                +                '<span class="input-group-text" id="basic-addon1">'

                +                    "{{'الجرعة'}}"

                +                '</span>'

                +            '</div>'

                +            '<input type="text" id="dos[]" class="form-control alphaFeild" disabled  placeholder=" {{"الجرعة"}} " name="dos[]" autocomplete="off">'
                +            '<a class="add-btn" onclick="$(this).parent().parent().parent().parent().remove()" style="margin-left: 0px; margin-right: 10px; padding-top: 5px;">'
                +                '<i class="fa fa-trash" style="color:#1E9FF2;"></i>'
                +            '</a>'
                +        '</div>'

                +    '</div>'

                +'</div>'

            +'</div>'
        $(".med").append(newmed);
        
        $( ".ac2" ).autocomplete({
                    source: 'medicine_auto_complete',
                    minLength: 1,
                    select: function( event, ui ) {
                        // console.log(ui.item);
                       getMedData(ui.item.id);
                    }
                });
    }
</script>
@stop

