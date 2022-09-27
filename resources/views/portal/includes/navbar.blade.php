<?php 
$lang=app()->getLocale();

$currList=array();
foreach($allPer as $row){
    if($row->fk_i_type==1){
        $temp=array();
        $child=array();
        $temp[]=$row;
        $temp[0]->children=array();
        foreach($userPer as $row1)
            if($row1->fk_i_parent_id==$row->pk_i_id)
            $child[]=$row1;
        $row->setAttribute('children', $child);
        $currList[]=$temp;
    }
}

?>
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-dark navbar-without-dd-arrow navbar-shadow hide" id="nav_expanded_nav" 

  style="background-color:#232f3e!important;" role="navigation" data-menu="menu-wrapper">

    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <?php foreach($currList as $row){
    if(sizeof($row[0]->children)>0&&$row[0]->show_in_menu==1){
    ?>
        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <span>{{$lang=='en'?$row[0]->s_function_title_en:$row[0]->s_function_title}}</span>
            </a>
          <ul class="dropdown-menu">
            <?php foreach($row[0]->children as $row1){
            if($row1->show_in_menu==1){?>
          <li data-menu="">

              <a class="dropdown-item" href="{{asset("$lang/admin/$row1->s_function_url")}}" data-toggle="dropdown">{{$lang=='en'?$row1->s_function_title_en:$row1->s_function_title}}</a>

            </li>
            <?php }}?>
          </ul>

        </li>
    <?php } 
    }?>
      </ul>
    
 

    </div>

  </div>