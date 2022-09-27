<?php

namespace App\Imports;

use App\Models\User;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToCollection, WithValidation, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            $data = $item;
            // $data['social_media_id'] = SocialMedia::query()->where('key', $item['social_media'])->first()->id ?? 1;
            // $data['company_id'] = $company->id;
            // $data['image'] = 'avatar.png';

            // $data['name'] = $item['name']??0;
            // $data['followers_count'] = $item['followers_count']??0;
            // $data['mobile'] = $item['mobile']??'-';
            // $data['link'] = $item['link']??'#';
            // $data['general'] = $item['general']??'-';
            // $data['free'] = $item['free']??'-';
            // $data['store'] = $item['store']??'-';
            // $data['visitors'] = $item['visitors']??'-';
            
            $data['name'] = $item['name']??'-';
            User::updateOrCreate(['id' => 0], $data->toArray());
        }
    }

    public function rules(): array
    {
        return [
//            'name' => ['required', 'string'],
//            'followers_count' => ['required'],
//            'mobile' => ['required'],
//            'link' => ['required'],
//            'general' => ['required'],
//            'free' => ['required'],
//            'store' => ['required'],
//            'visitors' => ['required'],
//            'category' => ['required'],
//            'social_media' => ['required'],
        ];
    }
}
