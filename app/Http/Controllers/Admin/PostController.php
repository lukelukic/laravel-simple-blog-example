<?php

namespace App\Http\Controllers\Admin;

use App\Models\PictureModel;
use App\Models\PostModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PostController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.posts',"Blog posts management", "Manage your webiste's blog posts", "posts.create", "posts.index");
        $this->model = new PostModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['posts'] = $this->model->all();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['form'] = "insert";
        return view($this->getView(), $this->data);
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
          'title' => 'required|alpha_num|min:3|max:100|unique:posts',
          'content' => 'required',
          'picture' => 'required|image|mimes:jpeg,png,jpg|max:2000',
          'description' => 'required|max:100|min:10'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $file = $request->file('picture');
            $directory = public_path("images/posts/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);

            $pictureModel = new PictureModel();
            $pictureModel->file = "images/posts/" . $fileName;
            $pictureModel->alt = "blog post";

            $this->model->picture_id = $pictureModel->save();
            $this->model->user_id = session()->get('user')->id;
            $this->model->title = $request->get('title');
            $this->model->content = $request->get('content');
            $this->model->description = $request->get("description");
            $this->model->save();
            return redirect()->back()->with("success", "Post successfully added!");
        } catch (QueryException $e) {
            \Log::error("Greska pri upisu posta u bazu: " . $e->getMessage());
        } catch(FileException $e) {
            \Log::error("Greska pri uploadu slike posta: " . $e->getMessage());
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
        $this->data['form'] = 'edit';
        $this->data['post'] = $this->model->find($id);
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
            'content' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
            'description' => 'required|max:100|min:10'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();
        $oldPictureId = null;
        if ($request->hasFile('picture')) {
            $oldPictureId = $this->model->getPictureId($id);
            try {
                $file = $request->file('picture');
                $directory = public_path("images/posts/");
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                $pictureModel = new PictureModel();
                $pictureModel->file = "images/posts/" . $fileName;
                $pictureModel->alt = "blog post";
                $this->model->picture_id = $pictureModel->save();

            } catch (QueryException $e) {
                \Log::error("Greska pri update-u objave: " . $e->getMessage());
            } catch (FileException $e) {
                \Log::error("Greska pri update-u objave u dodavanju slike: " . $e->getMessage());
            }
        }
            $this->model->title = $request->get('title');
            $this->model->content = $request->get('content');
            $this->model->description = $request->get("description");
            try {
                $this->model->update($id);

                try {
                    if($oldPictureId) {
                        $pictureModel = new PictureModel();
                        $picture = $pictureModel->find($oldPictureId);
                        unlink(public_path($picture->file));
                        $pictureModel->delete($oldPictureId);
                    }
                } catch(\Exception $e) {
                    \Log::error("Greska pri brisanju slike:" . $e->getMessage());
                }

                //Brisanje prethodne slike i fizicki i iz baze, ako dodje do greske, ne treba obavestiti korisnika
                return redirect(route("posts.index"))->with("success", "Post successfully edited!");
            } catch (QueryException $e) {
                \Log::error("Greska pri update-u objave: " . $e->getMessage());
                return redirect()->back()->with("error", "An error occurred, please try again later");
            }



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
            $this->model->delete($id);
            return redirect()->back()->with("success", "Post successfully deleted!");
        } catch (\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
