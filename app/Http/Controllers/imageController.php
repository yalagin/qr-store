<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateimageRequest;
use App\Http\Requests\UpdateimageRequest;
use App\Repositories\imageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class imageController extends AppBaseController
{
    /** @var  imageRepository */
    private $imageRepository;

    public function __construct(imageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the image.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $images = $this->imageRepository->all();

        return view('images.index')
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new image.
     *
     * @return Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param CreateimageRequest $request
     *
     * @return Response
     */
    public function store(CreateimageRequest $request)
    {
        $image = $this->imageRepository->createImage($request);

        Flash::success('Image saved successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Display the specified image.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified image.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified image in storage.
     *
     * @param int $id
     * @param UpdateimageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateimageRequest $request)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        $image = $this->imageRepository->updateImage($request, $id, $image);

        Flash::success('Image updated successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Remove the specified image from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }
        $this->imageRepository->deleteImageFromLocalDisk($image);

        $image->delete();

        Flash::success('Image deleted successfully.');

        return redirect()->back();
    }
}
