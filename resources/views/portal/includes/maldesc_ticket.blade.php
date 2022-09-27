<div class="row mobRow">
    <div class="col-md-12 paddzeromob">
        <div class="form-group">
            <div class="input-group" style="padding-left: 0px; width: 100% !important;">
                <h5 class="sub-head" style="color:#ff9149">
                    <b>
                       @if(isset($name_maldesc))
                        {{$name_maldesc}}
                        @else
                        {{ 'وصف العطل' }}
                        @endif
                    </b>
                </h5>
                <br>
                <textarea type="text" id="malDesc" class="form-control"
                    placeholder="{{isset($name_maldesc)?$name_maldesc:'وصف العطل'}}"name="malDesc"
                    style="width:100% ; border-radius:5px !important;height: 35px;"
                    aria-invalid="false"></textarea>

            </div>
        </div>
    </div>
</div>