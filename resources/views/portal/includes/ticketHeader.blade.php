
<div class="card-header">
    <h4 class="card-title">
        <img src="{{  asset('assets/images/'.$ticketInfo->ticket_ico)}}" width="32" height="32">
        <span>{{ $ticketInfo->ticket_name }}</span>
    </h4>

    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">
    </div>
</div>