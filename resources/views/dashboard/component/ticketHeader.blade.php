
<div class="card-header">
    <h4 class="card-title">
        <img src="{{  asset('assets/images/'.$ticketInfo->ticket_ico)}}" width="32" height="32">
        <span>{{ $ticketInfo->ticket_name }}</span>
    </h4>
    @can('taskCitizenArchive')
    @if( $ticketInfo->show_archive==1)
    <div class="heading-elements1 onOffArea form-group mt-1 hidemob" style="height: 20px; margin: 0px !important; padding-left: 260px">
        <img src="https://db.expand.ps/images/msg.png" height="30px"
            onclick="ShowCertModal('formData')" style="cursor:pointer">
            {{'الارشيف'}}
        <div class="form-group">
            <a onclick="" style="color:#000000">
                
            </a>
        </div>
    </div>
    @endif
    @endcan
    @can('taskCitizenJob')
    @if( $ticketInfo->joblic_btn==1)
    <div class="heading-elements1 onOffArea form-group mt-1 hidemob" style="height: 20px; margin: 0px !important; padding-left: 145px">
        <img src="https://db.expand.ps/images/ico6.jpg" height="30px"
            onclick="" style="cursor:pointer">
            {{'رخص الحرف'}}
            
        <div class="form-group">
            <a onclick="" style="color:#000000">
                
            </a>
        </div>
    </div>
    @endif
    @endcan
    @if( $ticketInfo->apps_btn==1)
    <div class="heading-elements1 onOffArea form-group mt-1 hidemob" style="height: 20px; margin: 0px !important; padding-left: 50px">
        <img src="https://db.expand.ps/images/rep.png" height="30px"
            onclick="$('#AppModal1').modal('show');$('#repName').html($('#subscriber_name').val());" style="cursor:pointer">
            {{'الطلبات'}}
            
        <div class="form-group">
            <a onclick="$('#AppModal1').modal('show');$('#repName').html($('#subscriber_name').val());" style="color:#000000">
                
            </a>
        </div>
    </div>
    @endif
    @can("ticketCofig")
    <div class="heading-elements1 onOffArea form-group mt-1 hidemob" style="height: 20px; margin: 0px !important" title="الاعدادات">
        <img src="{{ asset('assets/images/ico/config.png') }}" height="30px"
            onclick="ShowConfigModal('formData')" style="cursor:pointer">
            
        <div class="form-group">
            <a onclick="ShowConfigModal('formData')" style="color:#000000">
            </a>
        </div>
    </div>
    @endcan
    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">
    </div>
</div>
@if($ticketInfo->ticket_no==32||$ticketInfo->ticket_no==28)
@include('dashboard.component.employee_archive')
@else
@include('dashboard.component.subscribe_archive')
@endif
<script>
    function ShowCertModal(bindTo) {
            $("#ArchModalName").html($("#subscriber_name").val())
            // $("#CitizenName").html($("#formDataNameAR").val()) 

            $("#msgModal").modal('show')

        }
</script>