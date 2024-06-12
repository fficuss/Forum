<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Models\Discussion;

class AdminController extends Controller
{
    public function view()
    {
        return view('admin');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function showdoUsers()
    {
        return view('admin.dousers');
    }

    public function showPosts()
    {
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function showdoPosts()
    {
        return view('admin.doposts');
    }

    public function showThemes()
    {
        $themes = Theme::all();
        return view('admin.themes', compact('themes'));
    }

    public function showdoTheme()
    {
        return view('admin.dothemes');
    }

    public function showAddTheme()
    {
        return view('admin.addtheme');
    }

    

    public function storeTheme(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:themes,name',
        ]);

        Theme::create(['name' => $request->name]);

        return redirect()->route('adminthemes')->with('success', 'Theme added successfully');
    }

    public function showDeleteTheme()
    {
        $themes = Theme::all();
        return view('admin.deletetheme', compact('themes'));
    }

    public function deleteTheme($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->posts()->detach();
        $theme->delete();

        return redirect()->route('adminthemesdelete')->with('success', 'Theme deleted successfully');
    }

    public function showChangeTheme()
    {
        $themes = Theme::all();
        return view('admin.changetheme', compact('themes'));
    }

    public function showAddUser()
    {
        return view('admin.adduser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('adminusers')->with('success', 'User added successfully');
    }

    public function showDeleteUser()
    {
        $users = User::all();
        return view('admin.deleteuser', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('adminusersdelete')->with('success', 'User deleted successfully');
    }

    public function showChangeUser()
    {
        $users = User::all();
        return view('admin.changeuser', compact('users'));
    }

    public function showChangeContent()
    {
        $posts = Post::all();
        $discussions = Discussion::all();
        return view('admin.changecontent', compact('posts', 'discussions'));
    }

    public function showDeletePost()
    {
        $posts = Post::all();
        $discussions = Discussion::all(); // Assuming you have a Discussion model
        return view('admin.deletepost', compact('posts', 'discussions'));
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('adminpostsdelete')->with('success', 'Post deleted successfully');
    }

    public function deleteDiscussion($id)
    {
        $discussion = Discussion::findOrFail($id);
        $discussion->delete();

        return redirect()->route('adminpostsdelete')->with('success', 'Discussion deleted successfully');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('adminuserschange')->with('success', 'User updated successfully');
    }

    public function editTheme($id)
    {
        $theme = Theme::findOrFail($id);
        return view('admin.edittheme', compact('theme'));
    }

    public function updateTheme(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);
        $theme->update($request->all());

        return redirect()->route('adminthemeschange')->with('success', 'Theme updated successfully');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.editpost', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->save();

        return redirect()->route('admincontentschange')->with('success', 'Post updated successfully');
    }

    public function editDiscussion($id)
    {
        $discussion = Discussion::findOrFail($id);
        return view('admin.editdiscussion', compact('discussion'));
    }

    public function updateDiscussion(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);
    
        $discussion = Discussion::findOrFail($id);
        $discussion->title = $request->input('title');
        $discussion->text = $request->input('text');
        $discussion->save();
    
        return redirect()->route('admincontentschange')->with('success', 'Discussion updated successfully');
    }
}
