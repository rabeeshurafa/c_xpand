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
</style>
@if($ticketInfo->ticket_no==34||$ticketInfo->ticket_no==31)
<div class="col-sm-12 col-md-5">
@else
<div class="col-sm-12 col-md-6">
@endif
    <div class="card rightSide" style="min-height:485px">
        <div class="card-header">
            <h4 class="card-title" style="padding-bottom: 10px;">
                <img src="{{ asset('assets/images/ico/forwerd.png') }}" height="25px">
                {{ 'تحويل الى' }}
            </h4>
        </div>
        <div class="card-content collapse show">
            <div class="card-body" style="margin-bottom: 0px; padding-bottom: 0px;">

                <div class="row mobRow">
                    <div class="col-lg-6 col-md-5 ">
                        <div class="form-group paddmob">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">اختر القسم</span>
                                </div>
                                <select type="text" id="AssDeptID" name="AssDeptID"
                                    class="form-control myselect2" aria-invalid="false"
                                    onchange="ShowDeptEmp()">
                                    <option disabled="" selected=""> -- اختيار القسم -- </option>
                                    @foreach ($department as $dept)
                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 " style="padding-bottom: 0px">
                        <div class="form-group paddmob">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">اختر الموظف</span>
                                </div>
                                @if($ticketInfo->emp_to_receive>0 && $ticketInfo->single_receive==2)
                                    @foreach ($employees as $emp)
                                    @if($ticketInfo->emp_to_receive== $emp->id )
                                    <input class="form-control" readonly value="{{$emp->nick_name}}">
                                    <input class="form-control" type="hidden" id="Assigned2ID" dept="{{$emp->department_id}}" name="AssignedToID" value="{{$emp->id}}">
                                    @endif
                                    @endforeach
                                @else
                                <select type="text" id="Assigned2ID" name="AssignedToID"
                                    class="form-control myselect2" aria-invalid="false" >
                                    <option disabled="" selected=""> -- اختيار الموظف -- </option>
                                    @foreach ($employees as $emp)
                                    <option class="allDept hide dept{{$emp->department_id}}" value="{{$emp->id}}" dept="{{$emp->department_id}}" {{($ticketInfo->emp_to_receive==$emp->id?"selected":"")}}>{{$emp->nick_name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row hideMob " style="margin-top: 0;">
                    <div class="form-group col-md-3 mb-2"> </div>
                    <div id="static24Clock" style="display:block;"
                        class="form-group image-responsive col-md-6 mb-2">
                        <img src="https://db.expand.ps/images/24-hours-active-1-766936.png"
                            style="margin-right:60px" alt="24 hours">

                        <input
                            style="border:0px solid #fff;position: relative;bottom: -43px;width: 59px;right: -34px;text-align: right;font-size: 32px !important;color: #347ABD;padding: 0px;font-weight: bold;"
                            placeholder="00" id="restHrs" name="restHrs" onchange="changeHrs()" value="{{ $ticketInfo->time_to_close>0? $ticketInfo->time_to_close :'0'}}">
                    </div>

                </div>

                <div class="row hideMob" >
                    <div class="form-group col-md-3 mb-2"></div>
                    <div class="form-group col-md-6 mb-2 text-center" style="margin-bottom: 0px !important">
                        <div style="display: inline-block;">
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5">
                                <label for="star5" title="5">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4">
                                <label for="star4" title="4">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3">
                                <label for="star3" title="3">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2">
                                <label for="star2" title="2">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1">
                                <label for="star1" title="1">1 star</label>
                            </div>
                            <span class="Priority">الأهمية:</span>
                        </div>
                    </div>
                </div>

                <div class="row hideMob" style="margin-right: 8px;">

                    <div class="form-group col-md-8 offset-md-3 mb-2 text-center1">
                        <span style="margin: 3px;color:#1e9ff2">&nbsp;</span>
                        <span title="Tag Employee" style="margin: 3px; color:#1e9ff2">
                            <a>
                                {{-- <i class="fa fa-user-plus fa-2x" onclick="showtag();"></i> --}}
                                <img src="{{asset('assets/images/add-user.png')}}" onclick="showtag();" style="margin-bottom: 13px; width: 26px;height: 26px;" />
                            </a></span>
                        <span title="Force an image" style="margin-right: 3px;color:#1e9ff2"
                            onclick="ChangeState1($(this))">
                            <input type="hidden" name="enablePhoto" value="0" id="enablePhoto">
                            <img src="https://db.expand.ps/images/c1.png" id="enablePhotoImg"
                                style=" margin-bottom: 13px;">
                        </span>
                        <span style="color:#1e9ff2">&nbsp;</span>
                        <span title="Recive Notification" style="margin: 3px;color:#1e9ff2"
                            onclick="ChangeState($(this))">
                            <input type="hidden" id="hasNotify" name="hasNotify" value="0">
                            <i class="fa fa-bell fa-2x"></i>
                        </span>
                        <span title="Select vehicle" style="margin-left: 3px; color:#1e9ff2">
                            <a alt="Choose Your Vehicle" title="Choose Your Vehicle">
                                <img src="{{asset('assets/images/car.png')}}"  style="margin-bottom: 8px; width: 30px;height: 30px;" />

                            </a>
                        </span>
                        <span title="Pick tools" style="     margin: 3px;color:#1e9ff2">
                            <a onclick="showCart();">
                                <i class="fa fa-shopping-cart fa-2x"></i></a>
                        </span>

                        <span title="Returned tools after" style="margin: 3px;color:#1e9ff2">
                            <a onclick="showReturn();">
                                <img style="  height: 34px; margin-bottom: 13px; width: 34px;"
                                    src="https://db.expand.ps/images/icon/icons8-return-48.png">
                            </a> </span>

                    </div>



                </div>

                <div class="row hideMob tag_id" id="tag_id"
                    style=" <?php echo sizeof(json_decode($ticketInfo->emp_to_tag_ticket))>0?"":"display:none"?> ; margin-right: 10px; margin-left: 5px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group" style="width:99% !important;">
                                <div class="input-group-prepend" style="padding-left: 10px;">
                                    <span class="input-grojkup-text" id="basic-addon1">
                                        نسخة إلى
                                    </span>
                                </div>
                                <select id="tags" name="tags[]"
                                    class="select2 form-control select2-hidden-accessible" multiple=""
                                    data-toggle="select" style="width:100%;height: 35px;"
                                    data-select2-id="select2-data-tags" tabindex="-1" aria-hidden="true">
                                    
                                    <?php foreach ($employees as $key => $value){ ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($ticketInfo->emp_to_tag_ticket))?"selected":""?>><?php echo $value->nick_name; ?></option>
                                    <?php } ?>
                                    {{--@foreach ($employees as $emp)
                                    <option value="{{$emp->id}}">{{$emp->nick_name}}</option>
                                    @endforeach--}}
                                </select>
                                {{-- <span class="select2 select2-container select2-container--default"
                                    dir="ltr" data-select2-id="select2-data-2-spte"
                                    style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--multiple"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="-1" aria-disabled="false">
                                            <ul class="select2-selection__rendered"
                                                id="select2-tags-container"></ul><span
                                                class="select2-search select2-search--inline"><textarea
                                                    class="select2-search__field" type="search"
                                                    tabindex="0" autocorrect="off" autocapitalize="none"
                                                    spellcheck="false" role="searchbox"
                                                    aria-autocomplete="list" autocomplete="off"
                                                    aria-label="Search"
                                                    aria-describedby="select2-tags-container" placeholder=""
                                                    style="width: 0.75em;"></textarea></span>
                                        </span></span><span class="dropdown-wrapper"
                                        aria-hidden="true"></span></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mobRow">
                    <div class="col-md-12">
                        <div class="form-group paddmob">
                            <div class="input-group" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        {{ 'ملاحظات' }}
                                    </span>
                                </div>
                                <textarea type="text" id="note" class="form-control"
                                    placeholder="أدخل ملاحظاتك" name="note"
                                    style="height: 35px;"></textarea>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-actions" style="border-top:0px; padding-bottom:0px; padding-top: 0px; margin-top: 0px;">
                <div class="text-right btnArea">
                    <button type="submit" class="btn btn-primary" id="saveBtn">
                        <i class="la la-check-square-o"></i>{{ 'ارسال' }}</button>
                        <a class="btn btn-warning la la-check-square-o hidemob" id="saveBtnSend" style="color: #fff;"
                        onclick="printFunction();">{{ 'إرسال وطباعة' }}</a>
                </div>
                
                <div class="col-sm-12 col-md-12 col-lg-12 errArea hide">
                    <div class="btn bg-danger alert-icon-left alert-dismissible mb-2" role="alert" style="width: 100%;text-align: right;color:#ffffff;">
						<span class="alert-icon">
						    <i class="la la-thumbs-o-up"></i>
						    </span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong style="color:#ffffff">
						    سجل الأخطاء
						</strong> 
						<ul id="errList">
						</ul>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


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
    
    
    
    function ShowDeptEmp(){
        dept=$("#AssDeptID").val()
        $(".allDept").addClass("hide");
        $(".dept"+dept).removeClass("hide");
        
    }
    
    
    @if($ticketInfo->emp_to_receive>0 && $ticketInfo->single_receive==1)
        $(document).ready(function(){
            $("#AssDeptID").val($("#Assigned2ID option:selected").attr("dept"))
            ShowDeptEmp()
        })
    @elseif($ticketInfo->emp_to_receive>0 && $ticketInfo->single_receive==2)
        $(document).ready(function(){
            $("#AssDeptID").val($("#Assigned2ID").attr("dept"))
        })
    @endif;
    
    

</script>
