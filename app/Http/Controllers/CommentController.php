<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\CommentValidator;
use App\Requests as RequestsDb;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * IMA Permissions - Add a comment on a request
     *
     * @url    POST: /comment/add
     * @param  CommentValidator $input
     * @param  int $rid the id for the permission request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentValidator $input, $rid)
    {
        $db['user_id'] = auth()->user()->id;
        $db['comment'] = $input->comment;

        $comment  = Comments::create($db);
        $relation = RequestsDb::find($rid)->comments()->attach($comment->id);

        if ($comment && $relation) {
            session()->flash('', '');
            session()->flash('', '');
        }

        return redirect()->back();
    }

    /**
     * IMA Permissions - Change a comment.
     *
     * @url
     * @param  CommentValidator $input
     * @param  int $cid the comment id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommentValidator $input, $cid)
    {
        if (RequestsDb::find($cid)->update($input->except('_token'))) {
            session()->flash('class', '');
            session()->flash('message', '');
        }

        return redirect()->back();
    }

    /**
     * IMA Permissions - Delete A comment.
     *
     * @url    GET|HEAD: /comments/destroy/{rid}/{cid}
     * @param  int $rid The id for the permission request
     * @param  int $cid The id for the comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($rid, $cid)
    {
        $relationDestroy = RequestsDb::find($rid)->comments()->detach($cid);
        $commentDestroy  = Comments::destroy($cid);

        if ($relationDestroy && $commentDestroy) {
            session()->flash('class', 'alert alert-danger');
            session()->flash('message', 'Your comment has been destroyed');
        }

        return redirect()->back();
    }

    /**
     * IMA Permissions - Report a comment.
     *
     * @param  int $cid The comment id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function report($cid)
    {
        return redirect()->back();
    }
}
