<div class="row mobRow">
    <div class="col-md-12 paddzeromob">
        <div class="form-group">
            <div class="input-group"
                style="padding-left: 0px; width: 100% !important;">
                <h5 class="sub-head" style="color:#ff9149">
                    <b>
                        @if($config[0]->ticket_no==6)
                        سبب الفصل
                        @elseif($config[0]->ticket_no==7)
                        سبب الوصل
                        @elseif(isset($name_maldesc))
                        {{$name_maldesc}}
                        @else
                        {{ 'وصف العطل' }}
                        @endif
                    </b>
                </h5>
                <br>
                <textarea required="" type="text" id="malDesc" class="form-control" {{ $readonly?"readonly":"" }}
                    placeholder="{{isset($name_maldesc)?$name_maldesc:'وصف العطل'}}" name="malDesc"
                    style="width:100% ; border-radius:5px !important;height: 35px;"
                    aria-invalid="false">{{ $ticket->malDesc }}
                        </textarea>

            </div>
        </div>
    </div>
</div>