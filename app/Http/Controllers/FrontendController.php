<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use App\Models\GalleryModel;
use App\Models\NavigationModel;
use App\Models\PostModel;
use App\Models\SocialNetworksModel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private $data;
    public function __construct()
    {
        $navigationModel = new NavigationModel();
        $socialNetworkModel = new SocialNetworksModel();
        $this->data['socialNetworks'] = $socialNetworkModel->all();
        $this->data['nav'] = $navigationModel->all();
    }

    public function index()
    {
        $postModel = new PostModel();
        $this->data['lastPost'] = $postModel->last();
        $this->data['posts'] = $postModel->all();
        $this->data['latestPosts'] = $postModel->latest();

        return view("front.pages.index", $this->data);
    }

    public function single(Request $request, $id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);
        if (!$post) {
            abort(404);
        }

        $commentsModel = new CommentsModel();
        $post->comments = $commentsModel->getPostComments($id);
        $this->data['post'] = $post;
        $postModel->addVisit($id, $request->ip());
        return view("front.pages.post", $this->data);
    }

    public function about()
    {
        $galleryModel = new GalleryModel();
        $this->data['galleryPictures'] = $galleryModel->all();
        return view("front.pages.about", $this->data);
    }

    public function gallery()
    {
        $galleryModel = new GalleryModel();
        $this->data['galleries'] = $galleryModel->all();
        return view("front.pages.gallery", $this->data);
    }

    public function showLoginForm()
    {
        return view("front.pages.login", $this->data);
    }

    public function showRegisterForm()
    {
        return view("front.pages.register", $this->data);
    }

}
