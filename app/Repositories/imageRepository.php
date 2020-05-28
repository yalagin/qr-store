<?php

namespace App\Repositories;

use App\Models\image;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;

/**
 * Class imageRepository
 * @package App\Repositories
 * @version May 27, 2020, 5:12 pm UTC
 */
class imageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image_url'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return image::class;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createImage(Request $request)
    {
        $input = $this->saveImageToLocalDiskAndReturnArgsWithAddress($request);

        return $this->create($input);
    }


    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateImage(Request $request, int $id, $image)
    {
        if($request->file('image_url')) {
            $this->deleteImageFromLocalDisk($image);

            $input = $this->saveImageToLocalDiskAndReturnArgsWithAddress($request);
        }

        return $this->update($request->all(), $id);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function saveImageToLocalDiskAndReturnArgsWithAddress(Request $request): array
    {
        $file = $request->file('image_url');
//        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $path = 'upload/' . uniqid() . '.' . $extension;
        $img = InterventionImage::make($file)
//            ->insert(public_path('logo.JPG'))
        ;
        $img->save(public_path($path));

        $input = $request->all();
        $input['image_url'] = $path;
        return $input;
    }


    public function deleteImageFromLocalDisk(Image $image)
    {
        $image_path =  $image->image_url;
        if(File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
    }
}
