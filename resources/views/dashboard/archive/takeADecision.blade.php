
<div id="takeADecision" style="display:none">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" style="padding-top: 10px;">
                    <div>
                        <div class="text-info text-center font-weight-bold">
                            القرار
                        </div>
                        <textarea class="form-control" rows="1" id="descisiontxt" name="descisiontxt" placeholder="أدخل نص القرار" style="margin-right: 10px;text-align:center; border:0px solid #000000;"></textarea>
                        <input type="hidden" id="subjectid" name="subjectid" value="0">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                        <div class="text-info text-center font-weight-bold">
                            الأعضاء الموافقون على القرار
                        </div>
                        <div class="row">
                    <!-- <?php if(isset($meetingMembers) && !empty($meetingMembers) && count($meetingMembers) > 0){ ?>
                            <?php foreach ($meetingMembers as $key => $value){ ?>
                            <div class="col-sm-12 col-md-6 allmember meeting<?php echo $value->meeting_id; ?> hide">
                                <input type="checkbox" name="agreedMember[]" class="agreedMember" value="<?php echo $value->memberID; ?>"> <?php echo $value->memername; ?>
                            </div>
                            <?php } ?>
                        <?php } ?> -->
                        </div>
                </div>
            </div>
            <div class="col-md-1">
                <img src="{{ asset('assets/images/ico/Printer.png') }}" style="height: 32px;" />
            </div>
        </div>
        <div class="row hide">
                                        
            <div class="col-xl-6 col-lg-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <ul class="nav nav-tabs nav-topline">
                      <li class="nav-item">
                        <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21"
                        href="#tab21" aria-expanded="true">تحويل إلى المتابعة</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"
                        aria-expanded="false">مناقشة في الجلسة التالية</a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                      <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">
                            <div class="row">
                                <div class="col-md-6"  >
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
										        <span class="input-group-text" id="basic-addon1">
                                                اختر القسم 
										        </span>
                                            </div>
                                            <select type="text" id="AssDeptID" name="AssignedToID1" class="form-control myselect2"  aria-invalid="false" onChange="ShowDeptEmp()">
                                                <option disabled selected> -- اختيار القسم --  </option>
                                                <!-- <?php if(isset($deptArr) && !empty($deptArr) && count($deptArr) > 0){ ?>
                                                    <?php foreach ($deptArr as $key => $value){ ?>
                                                        <option value="<?php echo $value->pk_i_id; ?>" <?php echo $value->pk_i_id==7?"selected":""; ?>><?php echo $value->s_name_ar; ?></option>
                                                    <?php } ?>
                                                <?php } ?> -->
                                            </select>
                                            <!--                                                            <input type="text" id="SubscriberName" class="form-control  alphaFeild" placeholder="Subscriber Name " name="SubscriberName">-->
                                            <script>
                                                function ShowDeptEmp(){
                                                    dept=$("#AssDeptID").val()
                                                    $(".allDept").addClass("hide");
                                                    $(".dept"+dept).removeClass("hide");
                                                    
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                اختر الموظف
										        </span>
                                            </div>
                                            <select  id="" name="AssignedToID" class="form-control" >
                                                <option > -- اختيار الموظف --  </option>
                                                <!-- <?php if(isset($empArr) && !empty($empArr) && count($empArr) > 0){ ?>
                                                    <?php foreach ($empArr as $key => $value){ ?>
                                                        <option class="allDept dept<?php echo $value->DepartmentID?> <?php echo $value->DepartmentID!=7?"hide":""; ?>" value="<?php echo $value->pk_i_id; ?>" ><?php echo $value->nickname; ?></option>
                                                    <?php } ?>
                                                <?php } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
										        <span class="input-group-text" id="basic-addon1">
                                                اختر القسم 
										        </span>
                                            </div>
                                            <textarea class="form-control" rows="1" id="notes" name="notes0"></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="tab-pane " id="tab22" aria-labelledby="base-tab22">
                          <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group validate">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="width: 81px;">
                                                تاريخ الجلسة 
										        </span>
										        <input type="text" id="agendaDate" name="agendaDate" class="form-control eng-sm singledatewithDay" data-mask="00/00/0000 - EEEE" autocomplete="off" placeholder="" aria-describedby="basic-addon1" aria-invalid="false" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12" style="text-align:center">
            <button type="button" class="btn btn-primary" style="padding-top:5px;padding-bottom:5px" onclick="saveDesicion()">
                    إعتماد القرار
            </button>
        </div>
    </div>
</div>

