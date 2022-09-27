@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')

    <style>
        /* The Modal (background) */
        .modal1 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            /*   float: right; */
            font-size: 28px;
            font-weight: bold;
            margin-left: auto;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .rate:not(:checked)>label {
            font-size: 30px !important;
        }

        .rate {
            width: auto;
            position: relative;
            float: left;
            height: 40px;
            margin-top: -3px;
        }

        .Priority {
            padding: 0;
            position: relative;
            left: 0;
            line-height: 39px;
            float: left;
        }

        .fa-2x {
            font-size: 24px !important;
        }

        .detailsTB th{
            color:#ffffff;
        }
          .detailsTB th,.detailsTB td{
            text-align:right !important;
            
        }
        .recList>tr>td{
            font-size:12px;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding-bottom: 5px !important;
        }
        .dataTables_filter{
            margin-top:-15px;
        }
        .even{
            background-color:#D7EDF9 !important;
        }
</style>


    <link rel="stylesheet" type="text/css"
        href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css" />

    <script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

                    <style>
                        .avatar .badge-up {
                            left: -15px;
                        }

                        .card-header {
                            padding: 0.5rem;
                            border-bottom: 1px solid #000000;
                        }

                        .badge-up {
                            left: 15px;
                        }


                        .imgAvatar>.avatar {
                            width: 65%;
                        }

                    </style>
                    <form id="deptOrder" onsubmit="return false">
                        <section id="draggable-cards">
                            <div class="row" id="card-drag-area" style="direction: rtl;">
                                @foreach($admins as $admin)
                                <div class="col-xl-4 col-lg-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row rowMargin">
                                               {{-- <div class="col-sm-2 imgAvatar">
                                                    
                                                    <span class="avatar avatar-online"
                                                        style="/*width:90%;padding-top: 5px; padding-right: 15px; padding-bottom: 5px; padding-left: 15px;*/">
                                                        <img src="	https://db.expand.ps/uploads/unknown.jpg" alt="avatar" style="height: 50px;">
                                                    </span>
                                                </div>--}}
                                                <div class="col-sm-1 imagemob">
                                                    <img src="{{$admin->image }}" class="avatar avatar-online avatar-onlineonmob" style="height:30px;margin-left: 15px;">
                                                </div>
                                                <input type="hidden" name="deptOrder[]" value="25">
                                                <div class="col-sm-11 Avataronmob" style="">
                                                    <a style="font-size: 20px !important;"
                                                        href="{{ route('admin.dashboard')}}/employee?id={{$admin['id']}}">
                                                        {{$admin->nick_name}} </a>
                                                    <span class="badge badge-pill badge-danger badge-up badge-glow"
                                                        style="top: 0px;">{{$admin['tiketCount']}}</span>

                                                </div>

                                                
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body" style="    padding: 0.5rem">
                                                <div class="cardSize" style="direction: ltr">
                                                    <table width="100%" style="direction: rtl" class="">
                                                        <tbody>
                                                            @for($i=0 ; $i<$admin['tiketCount'] ; $i++)
                                                            <tr style="@if ($i % 2 ==0)background-color:#FFFFFF; @else  background-color:#D7EDF9; @endif">
                                                                <td align="right"
                                                                    style="color:#000; padding-right: 10px !important;font-size: 17px !important;">
                                                                    {{$admin['ticket'][$i]['customer_name']}}
                                                                </td>
                                
                                                                <td
                                                                    style="    text-align: right;color:#000;font-size: 17px !important;">
                                                                    <a target="_blank" href="{{ route('admin.dashboard')}}/viewTicket/{{$admin['ticket'][$i]['id']}}/{{$admin['ticket'][$i]['Trans']['related']}} ">
                                                                        <?php if($admin['ticket'][$i]->taskName !=null){ ?>
                                                                        {{$admin['ticket'][$i]['taskName']}}
                                                                        <?php }else{ ?>
                                                                        {{$admin['ticket'][$i]['Trans']['ticket_name']}}
                                                                        <?php } ?>
                                                                    <span class="hideMob">({{$admin['ticket'][$i]['app_no']}})</span></a>
                                                                </td>
                                                                <td
                                                                    style="font-size: 15px !important;width: 50px; display:none;">
                                                                </td>
                                                            </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>


                        <div class="ticket-header row " style="    direction: rtl;text-align: center;">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>
                                   {{" حفظ الترتيب"}}
                                </button>
                            </div>
                        </div>

                    </form>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("body").on('drop', function() {
                        $("#deptOrder").trigger('submit')
                    })
                    $("#deptOrder").on('submit', function() {
                        var formData = new FormData($("#deptOrder")[0]);
                        $.ajax({
                            url: realPath + 'c_dept/saveOrder',
                            type: 'POST',
                            data: formData,
                            dataType: "json",
                            async: true,
                            success: function(data) {
                                if (data.status.success) {
                                    $(".alert-danger").addClass("hide");
                                    $(".alert-success").removeClass('hide');
                                    $("#succMsg").text(data.status.msg)

                                    setTimeout(function() {
                                        $(".alert-danger").addClass("hide");
                                        $(".alert-success").addClass("hide");
                                    }, 2000)
                                    $('#areaForm').trigger("reset");
                                    doGetChild($("#TownID1").val(), 9, 'AreaID')
                                } else {
                                    $(".alert-success").addClass("hide");
                                    $(".alert-danger").removeClass('hide');
                                    $("#errMsg").text(data.status.msg)
                                }
                                $(".loader").addClass('hide');
                                $(".form-actions").removeClass('hide');

                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });

                    })
                })

                function filterDept(id) {
                    if (id > 0) {
                        $(".allDept").hide()
                        $(".dept" + id).show()
                    } else {
                        $(".allDept").show()

                    }
                }

                function show() {
                    var RepetedDiv = document.getElementById('Repeted');
                    if (RepetedDiv.style.display == "none") {
                        RepetedDiv.style.display = "block";
                    } else
                        RepetedDiv.style.display = "none";
                }

                function showTable() {
                    var TableDiv = document.getElementById('tableDiv');
                    if (TableDiv.style.display == "none") {
                        TableDiv.style.display = "block";
                    } else
                        TableDiv.style.display = "none";
                }

                var MemberCounter = 1;

                function insertMemeber() {

                    var NewRow = '<tr id="memRow' + MemberCounter + '">' +
                        '<td>' + MemberCounter + '</td>' +
                        ' <td style="width: 400px;">' +
                        $("#SubscribtionNum").val() +
                        '<input type="text" class="form-control form-control1 numFeild hide" name="SubscribtionNumList[]" value="' +
                        $("#SubscribtionNum").val() + '" />' +
                        ' </td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        $("#CounterType").val() +
                        '<input type="text" class="form-control form-control1 alphaFeild hide" name="CounterTypeList[]" value="' +
                        $("#CounterType").val() + '" />' +
                        '</td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        $("#PaymentMethod").val() +
                        '<input type="text" class="form-control form-control1 alphaFeild hide " name="PaymentMethodList[]" value="' +
                        $("#PaymentMethod").val() + '" />' +
                        '</td>'


                        +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        $("#Capacity").val() +
                        '<input type="text" class="form-control form-control1   hide" name="CapacityList[]" value="' + $(
                            "#Capacity").val() + '" />' +
                        '</td>'

                        +
                        '<td>' +
                        '<a class="remove-btn" onclick="$(\'#memRow' + MemberCounter +
                        '\').remove()"><i class="ft-trash"></i></a>' +
                        '</td></tr>';
                    MemberCounter++;
                    $("#recList").append(NewRow)
                    $("#SubscribtionNum").val('')
                    $("#CounterType").val('')
                    $("#PaymentMethod").val('')

                    $("#Capacity").val('')

                    $("#SubscribtionNum").focus()

                }


                function insertSubscribtion(SubscribtionId, subscribtionNum, counterType, paymentMethod, capacity) {

                    var NewRow = '<tr id="memRow' + MemberCounter + '">' +
                        '<td>' + MemberCounter + '</td>' +
                        ' <td style="width: 400px;">' +
                        '<input type="hidden" name="SubscribtionIdList[]" value="' + SubscribtionId + '">' +
                        subscribtionNum +
                        '<input type="text" class="form-control form-control1 numFeild hide" name="SubscribtionNumList[]" value="' +
                        subscribtionNum + '" />' +
                        ' </td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        counterType +
                        '<input type="text" class="form-control form-control1 alphaFeild hide" name="CounterTypeList[]" value="' +
                        counterType + '" />' +
                        '</td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        paymentMethod +
                        '<input type="text" class="form-control form-control1 alphaFeild hide " name="PaymentMethodList[]" value="' +
                        paymentMethod + '" />' +
                        '</td>'


                        +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        capacity +
                        '<input type="text" class="form-control form-control1   hide" name="CapacityList[]" value="' + capacity +
                        '" />' +
                        '</td>'

                        +
                        '<td>' +
                        '<a class="remove-btn" onclick="$(\'#memRow' + MemberCounter +
                        '\').remove()"><i class="ft-trash"></i></a>' +
                        '</td></tr>';
                    MemberCounter++;
                    $("#recList").append(NewRow)
                    $("#SubscribtionNum").val('')
                    $("#CounterType").val('')
                    $("#PaymentMethod").val('')

                    $("#Capacity").val('')

                    $("#SubscribtionNum").focus()

                }

                var RepetCounter = 1;

                function insertRepeated() {

                    var NewRow = '<tr id="repRow' + RepetCounter + '">' +
                        '<td>' + RepetCounter + '</td>' +
                        ' <td style="width: 400px;">' +
                        $("#RepetedDate").val() +
                        '<input type="text" class="form-control eng-sm singledate valid hide" data-mask="00/00/0000" maxlength="10" aria-describedby="basic-addon1" autocomplete="off" aria-invalid="false" name="RepetedDateList[]" value="' +
                        $("#RepetedDate").val() + '">' +
                        ' </td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        $("#Day").val() +
                        ' <input name="DayList[]" value="' + $("#Day").val() +
                        '" style="    text-align: -webkit-center; margin-left: 3%;" type="text" class="hide form-control form-control1 alphaFeild"/>'

                        +
                        '</td>'

                        +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        $("#ClosingTime").val() +
                        '<input style="    text-align: -webkit-center; margin-left: 3%;" type="text"  class=" hide form-control form-control1 numFeild" name="ClosingTimeList[]" value="' +
                        $("#ClosingTime").val() + '" />' +
                        '</td>'

                        +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        $("#status").val() +
                        '<input  style="margin-left: 7%;  text-align: -webkit-center;" type="text"  class=" hide form-control form-control1 alphaFeild"  name="statusList[]" value="' +
                        $("#status").val() + '"   />' +
                        '</td>'

                        +
                        '<td>' +
                        '<a class="remove-btn" onclick="$(\'#repRow' + RepetCounter + '\').remove()"><i class="ft-trash"></i></a>' +
                        '</td></tr>';
                    RepetCounter++;
                    $("#repList").append(NewRow)
                    $("#RepetedDate").val('')
                    $("#Day").val('')
                    $("#ClosingTime").val('')

                    $("#status").val('')

                    $("#RepetedDate").focus()

                }

                var RepetCounterRow = 1;

                function insertRepeatedRow(repetedDate, day, closingTime, status) {

                    var NewRow = '<tr id="repRow' + RepetCounter + '">' +
                        '<td>' + RepetCounter + '</td>' +
                        ' <td style="width: 400px;">' +
                        repetedDate +
                        '<input type="text" class="form-control eng-sm singledate valid hide" data-mask="00/00/0000" maxlength="10" aria-describedby="basic-addon1" autocomplete="off" aria-invalid="false" name="RepetedDateList[]" value="' +
                        repetedDate + '">' +
                        ' </td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        day +
                        ' <input name="DayList[]" value="' + day +
                        '" style="    text-align: -webkit-center; margin-left: 3%;" type="text" class="hide form-control form-control1 alphaFeild"/>' +
                        '</td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        closingTime +
                        '<input style="    text-align: -webkit-center; margin-left: 3%;" type="text"  class=" hide form-control form-control1 numFeild" name="ClosingTimeList[]" value="' +
                        closingTime + '" />' +
                        '</td>' +
                        '<td style="width: 50px !important;text-align: -webkit-center;">' +
                        status +
                        '<input  style="margin-left: 7%;  text-align: -webkit-center;" type="text"  class=" hide form-control form-control1 alphaFeild"  name="statusList[]" value="' +
                        status + '"   />' +
                        '</td>'

                        +
                        '<td>' +
                        '<a class="remove-btn" onclick="$(\'#repRow' + RepetCounter + '\').remove()"><i class="ft-trash"></i></a>' +
                        '</td></tr>';
                    RepetCounter++;
                    $("#repList").append(NewRow)
                    $("#RepetedDate").val('')
                    $("#Day").val('')
                    $("#ClosingTime").val('')

                    $("#status").val('')

                    $("#RepetedDate").focus()

                }
                //    $('#select').multipleSelect();
            </script>

@stop
@section('script')


    {{-- <script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"
        type="text/javascript"></script> --}}
    {{-- <script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript">

    </script> --}}
    <script>

    </script>

@endsection
