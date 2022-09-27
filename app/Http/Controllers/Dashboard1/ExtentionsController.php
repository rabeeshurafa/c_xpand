<?php



namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\City;

use App\Models\Address;

use App\Models\Admin;

use App\Models\Area;

use App\Models\User;

use App\Models\Department;

use App\Models\Region;

use App\Models\Project;

use App\Models\Orgnization;

use App\Models\JobTitle;

use App\Models\Group;

use App\Models\JobType;

use App\Models\Brand;

use App\Models\EqupmentType;

use App\Models\EqupmentStatus;

use App\Models\VehicleType;

use App\Models\VehicleBrand;

use App\Models\AssetStatus;

use App\Models\ArchiveType;

use App\Models\AttachmentType;

use App\Models\LicenseType;

use App\Models\CraftType;

use App\Models\LicenseRating;

use App\Models\LimitNumber;

use App\Models\LicenseExtention;

use App\Models\AgendaExtention;

use App\Models\Constant;



use App\Http\Requests\ExtentionRequest;



class ExtentionsController extends Controller

{



    public function getConstantChildren(Request $request){

        if($request->pk_i_id == '17'){

            $data['data'] = JobTitle::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '9'){

            $data['data'] = Group::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '6'){

            $data['data'] = JobType::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '12'){

            $data['data'] = Brand::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '24'){

            $data['data'] = EqupmentType::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '50'){

            $data['data'] = EqupmentStatus::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '25'){

            $data['data'] = VehicleBrand::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '26'){

            $data['data'] = VehicleType::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '30'){

            $data['data'] = AssetStatus::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }



        elseif($request->pk_i_id == '10'){

            $data['data'] = City::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '33'){

            $data['data'] = Area::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '77'){

            $data['data'] = Region::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '42'){

            $data['data'] = ArchiveType::where('type','munArchive')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '62'){

            $data['data'] = ArchiveType::where('type','depArchive')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '72'){

            $data['data'] = ArchiveType::where('type','citArchive')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '82'){

            $data['data'] = ArchiveType::where('type','projArchive')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '52'){

            $data['data'] = ArchiveType::where('type','empArchive')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }
        
        elseif($request->pk_i_id == '105'){

            $data['data'] = ArchiveType::where('type','financeArchive')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '16'){

            $data['data'] = LicenseType::where('type','archive_lic')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '46'){

            $data['data'] = AttachmentType::where('type','lic_archieve')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }
        
        elseif($request->pk_i_id == '106'){

            $data['data'] = AttachmentType::where('type','finance_attach')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '64'){

            $data['data'] = AttachmentType::where('type','licFile_archieve')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        

        elseif($request->pk_i_id == '66'){

            $data['data'] = CraftType::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }
        elseif($request->pk_i_id == '103'){

            $data['data'] = CraftType::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '49'){

            $data['data'] = LicenseRating::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '104'){

            $data['data'] = LicenseRating::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '101'){

            $data['data'] = LicenseRating::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }
        elseif($request->pk_i_id == '102'){

            $data['data'] = LicenseRating::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '56'){

            $data['data'] = LimitNumber::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '99'){

            $data['data'] = AgendaExtention::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '100'){

            $data['data'] = LicenseType::where('type','drive_lic')->get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }

        elseif($request->pk_i_id == '999'){

            $data['data'] = LicenseExtention::get();

            $data['pj_i_id'] = $request->pk_i_id;

            return response()->json($data);

        }



    }





    public function deleteSubConstant(Request $request){

        if($request->fk_i_constant_id == '17'){

            $data = JobTitle::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '9'){

            $data = Group::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }


        elseif($request->fk_i_constant_id == '6'){

            $data = JobType::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '12'){

            $data = Brand::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '24'){

            $data = EqupmentType::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '50'){

            $data = EqupmentStatus::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '25'){

            $data = VehicleBrand::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '26'){

            $data = VehicleType::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '30'){

            $data = AssetStatus::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '10'){

            $data = City::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }



        elseif($request->fk_i_constant_id == '33'){

            $data = Area::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '77'){

            $data = Region::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '42'){

            $data = ArchiveType::where('type','munArchive')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '52'){

            $data = ArchiveType::where('type','empArchive')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }
        
        elseif($request->fk_i_constant_id == '105'){

            $data = ArchiveType::where('type','financeArchive')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '62'){

            $data = ArchiveType::where('type','depArchive')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '72'){

            $data = ArchiveType::where('type','citArchive')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '82'){

            $data = ArchiveType::where('type','projArchive')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '16'){

            $data = LicenseType::where('type','archive_lic')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '100'){

            $data = LicenseType::where('type','drive_lic')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '46'){

            $data = AttachmentType::where('type','lic_archieve')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }
        
        elseif($request->fk_i_constant_id == '106'){

            $data = AttachmentType::where('type','finance_attach')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '64'){

            $data = AttachmentType::where('type','licFile_archieve')->findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '66'){

            $data = CraftType::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '103'){

            $data = CraftType::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '49'){

            $data = LicenseRating::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '104'){

            $data = LicenseRating::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }
        elseif($request->fk_i_constant_id == '101'){

            $data = LicenseRating::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '102'){

            $data = LicenseRating::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '56'){

            $data = LimitNumber::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '99'){

            $data = AgendaExtention::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }

        elseif($request->fk_i_constant_id == '999'){

            $data = LicenseExtention::findOrFail($request->pk_i_id)->delete();

            return response()->json($data);

        }





    }





    public function store_model(ExtentionRequest $request){

        if($request->fk_i_constant_id1 == '17'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new JobTitle();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = JobTitle::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }



        elseif($request->fk_i_constant_id1 == '9'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new Group();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = Group::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }
       
        elseif($request->fk_i_constant_id1 == '6'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new JobType();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = JobType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '12'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new Brand();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = Brand::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '24'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new EqupmentType();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = EqupmentType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '50'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new EqupmentStatus();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = EqupmentStatus::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '25'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new VehicleBrand();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = VehicleBrand::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '26'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new VehicleType();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = VehicleType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '30'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new AssetStatus();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = AssetStatus::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '10'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new City();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = City::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '33'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new Area();

                $job->name = $request->s_name_ar1;

                $job->city_id  = $request->ctrlToRefresh;

                $job->save();

            }else{

                $job = Area::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->city_id  = $request->ctrlToRefresh;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '33'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new Area();

                $job->name = $request->s_name_ar1;

                $job->city_id  = $request->ctrlToRefresh;

                $job->save();

            }else{

                $job = Area::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->city_id  = $request->ctrlToRefresh;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '77'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new Region();

                $job->name = $request->s_name_ar1;

                $job->area_id   = $request->ctrlToRefresh;

                $job->save();

            }else{

                $job = Region::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->area_id   = $request->ctrlToRefresh;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }



        elseif($request->fk_i_constant_id1 == '42'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new ArchiveType();

                $job->name = $request->s_name_ar1;

                $job->type = 'munArchive';

                $job->save();

            }else{

                $job = ArchiveType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'munArchive';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }



        elseif($request->fk_i_constant_id1 == '52'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new ArchiveType();

                $job->name = $request->s_name_ar1;

                $job->type = 'empArchive';

                $job->save();

            }else{

                $job = ArchiveType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'empArchive';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }
        
        elseif($request->fk_i_constant_id1 == '105'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new ArchiveType();

                $job->name = $request->s_name_ar1;

                $job->type = 'financeArchive';

                $job->save();

            }else{

                $job = ArchiveType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'financeArchive';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }





        elseif($request->fk_i_constant_id1 == '62'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new ArchiveType();

                $job->name = $request->s_name_ar1;

                $job->type = 'depArchive';

                $job->save();

            }else{

                $job = ArchiveType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'depArchive';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }



        elseif($request->fk_i_constant_id1 == '72'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new ArchiveType();

                $job->name = $request->s_name_ar1;

                $job->type = 'citArchive';

                $job->save();

            }else{

                $job = ArchiveType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'citArchive';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }





        elseif($request->fk_i_constant_id1 == '82'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new ArchiveType();

                $job->name = $request->s_name_ar1;

                $job->type = 'projArchive';

                $job->save();

            }else{

                $job = ArchiveType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'projArchive';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '16'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseType();

                $job->name = $request->s_name_ar1;

                $job->type = 'archive_lic';

                $job->save();

            }else{

                $job = LicenseType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'archive_lic';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '100'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseType();

                $job->name = $request->s_name_ar1;

                $job->type = 'drive_lic';

                $job->save();

            }else{

                $job = LicenseType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'drive_lic';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '46'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new AttachmentType();

                $job->name = $request->s_name_ar1;

                $job->type = 'lic_archieve';

                $job->save();

            }else{

                $job = AttachmentType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'lic_archieve';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);            

        }
        
        elseif($request->fk_i_constant_id1 == '106'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new AttachmentType();

                $job->name = $request->s_name_ar1;

                $job->type = 'finance_attach';

                $job->save();

            }else{

                $job = AttachmentType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'finance_attach';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);            

        }

        elseif($request->fk_i_constant_id1 == '64'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new AttachmentType();

                $job->name = $request->s_name_ar1;

                $job->type = 'licFile_archieve';

                $job->save();

            }else{

                $job = AttachmentType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->type = 'licFile_archieve';

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);            

        }



        elseif($request->fk_i_constant_id1 == '66'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new CraftType();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = CraftType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '103'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new CraftType();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = CraftType::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '101'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseRating();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = LicenseRating::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }
        elseif($request->fk_i_constant_id1 == '102'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseRating();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = LicenseRating::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '49'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseRating();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = LicenseRating::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }
        elseif($request->fk_i_constant_id1 == '104'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseRating();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = LicenseRating::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '56'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LimitNumber();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = LimitNumber::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '99'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new AgendaExtention();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = AgendaExtention::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }

        elseif($request->fk_i_constant_id1 == '999'){

            if($request->fk_i_constantdet_id1 == null){

                $job = new LicenseExtention();

                $job->name = $request->s_name_ar1;

                $job->save();

            }else{

                $job = LicenseExtention::find($request->fk_i_constantdet_id1);

                $job->name = $request->s_name_ar1;

                $job->save();

            }

            if ($job) {

                return response()->json($job);

            }

            return response()->json(['error'=>$validator->errors()->all()]);

        }





    }

    

    public function getConstantByID(Request $request)

    {

        $res=Constant::where('parent',$request->id)->where('status',1)->get();

        return response()->json($res);



    }

    public function SaveConstant(Request $request)

    {

        if(!$request->constantID){

            $obj=new Constant();

            $obj->name=$request->constantName;

            $obj->parent=$request->constantParentID;

            $obj->save();

        }

        else{

            $obj=Constant::find($request->constantID);

            $obj->name=$request->constantName;

            $obj->save();

            

        }

        $res=Constant::where('parent',$request->constantParentID)->where('status',1)->get();

        return response()->json($res);

    }

    public function deleteConstant(Request $request)

    {

            $obj=Constant::find($request->constantID);

            $obj->status=0;

            $obj->save();

        $res=Constant::where('parent',$request->constantParentID)->where('status',1)->get();

        return response()->json($res);



    }



}

