<div class="row ">
    <div class="col-md-6" style=" ">
        <div class="form-group paddmob">
            <div class="input-group" style=" ">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'نوع البناء' }}
                    </span>
                </div>
                <select id="buildingType" name="buildingType" type="text"
                    class="form-control valid" aria-invalid="false">
                    <option > {{ '-- نوع البناء --' }} </option>
                    @foreach($buildingTypeList as $buildingType)
                    <option value="{{ $buildingType->id }}">{{ $buildingType->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append hidemob"onclick="ShowConstantModal(6016,'buildingType','نوع البناء')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5" style=" ">
        <div class="form-group paddmob">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">
                        {{ 'مكتب المساحة' }}
                    </span>
                </div>
                <select id="engOffice" name="engOffice" type="text"
                    class="form-control engOffice valid" aria-invalid="false">
                    <option > {{ 'اختر' }} </option>
                    @foreach($officeAreaList as $officeArea)
                    <option value="{{ $officeArea->id }}">{{ $officeArea->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append hidemob" onclick="ShowConstantModal(6084,'engOffice','مكتب المساحة')">
                    <span class="input-group-text input-group-text2">
                        <i class="fa fa-external-link"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>