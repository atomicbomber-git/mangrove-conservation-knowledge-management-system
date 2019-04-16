<?php

namespace App\Http\Controllers;

use App\Article;


class ArticleVerificationController extends Controller
{
    public function create(Article $article)
    {
        $article->status = Article::STATUS_APPROVED;
        $article->published_date = now();
        $article->save();

        return back()
            ->with("message_state", "success")
            ->with("message_text", __("messages.update.success"));
    }

    public function delete(Article $article)
    {
        $article->status = Article::STATUS_REJECTED;
        $article->published_date = null;
        $article->save();

        return back()
            ->with("message_state", "success")
            ->with("message_text", __("messages.update.success"));
    }
}
