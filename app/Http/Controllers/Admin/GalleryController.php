<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryModel;
use App\Models\PictureModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class GalleryController extends BackendController
{

    public function __construct()
    {
        parent::construct('admin.pages.gallery',"Gallery management", "Manage your webiste's gallery pictures", "gallery.create", "gallery.index");
        $this->model = new GalleryModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['galleries'] = $this->model->all();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['form'] = 'insert';
        return view('admin.pages.gallery', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|alpha_num|min:3|max:100|unique:gallery',
            'description' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2000'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $file = $request->file('picture');
            $directory = public_path("images/gallery/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);

            $pictureModel = new PictureModel();
            $pictureModel->file = "images/gallery/" . $fileName;
            $pictureModel->alt = "blog gallery";

            $this->model->picture_id = $pictureModel->save();
            $this->model->title = $request->get('title');
            $this->model->description = $request->get('description');
            $this->model->save();
            return redirect()->back()->with("success", "Picture successfully added!");
        } catch (FileException $e) {
            \Log::error("An error occured while uploading gallery picture " . $e->getMessage());
        } catch (QueryException $e) {
            \Log::error("An error occured while inserting gallery picture into database " . $e->getMessage());
        }
        return redirect()->back()->with("error", "An error occured, please try again later");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['gallery'] = $this->model->find($id);
        $this->data['form'] = 'edit';
        return view($this->getView(), $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|alpha_num|min:3|max:100',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2000'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();
        $oldPictureId = null;
        try {

            if ($request->hasFile("picture")) {
                $oldPictureId = $this->model->find($id)->picture_id;

                $file = $request->file('picture');
                $directory = public_path("images/gallery/");
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                $pictureModel = new PictureModel();
                $pictureModel->file = "images/gallery/" . $fileName;
                $pictureModel->alt = "blog gallery";

                $this->model->picture_id = $pictureModel->save();
            }

            $this->model->title = $request->get('title');
            $this->model->description = $request->get('description');
            $this->model->update($id);

            try {
                if($oldPictureId) {
                    $pictureModel = new PictureModel();
                    $picture = $pictureModel->find($oldPictureId);
                    unlink(public_path($picture->file));
                    $pictureModel->delete($oldPictureId);
                }
            } catch (\Exception $e) {
                \Log::error("Greska pri brisanju slike navigacije: " . $e->getMessage());
            }

            return redirect()->back()->with("success", "Picture successfully updated!");
        } catch (FileException $e) {
            \Log::error("An error occured while uploading gallery picture " . $e->getMessage());
        } catch (QueryException $e) {
            \Log::error("An error occured while inserting gallery picture into database " . $e->getMessage());
        }
        return redirect()->back()->with("error", "An error occured, please try again later");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pictureId = $this->model->find($id)->picture_id;
            $this->model->delete($id);
            try {
                $pictureModel = new PictureModel();
                $picture = $pictureModel->find($pictureId);
                unlink(public_path($picture->file));
                $pictureModel->delete($pictureId);
            } catch(\Exception $e) {
                \Log::error("Greska pri brisanju slike galerije " . $e->getMessage());
            }
            return redirect()->back()->with("success", "Picture successfully deleted!");
        } catch (QueryException $e) {
            return redirect()->back()->with("error", "An error occured, please try again later");
        }
    }
}
