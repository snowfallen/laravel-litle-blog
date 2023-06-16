<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::paginate(5);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('posts.create');
    }

    /**
     * @param PostRequest $request
     * @return Redirector|RedirectResponse|Application
     */
    public function store(PostRequest $request): Redirector|RedirectResponse|Application
    {
        Post::create($request->all());

        return redirect('post')->with('success', 'Success! Your post has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Factory|View|Application
     */
    public function edit(Post $post): Factory|View|Application
    {
        return view('posts.edit',['post' => $post]);
    }

    /**
     * @param PostRequest $request
     * @param Post $post
     * @return Application|RedirectResponse|Redirector
     */
    public function update(PostRequest $request,Post $post): Redirector|RedirectResponse|Application
    {
        $post->update($request->all());

        return redirect('post')->with('success', 'Success! Your post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Redirector|Application|RedirectResponse
     */
    public function destroy(Post $post): Redirector|Application|RedirectResponse
    {
        $post->delete();

        return redirect('post')->with('success', 'Success! Your post has been deleted.');
    }
}
