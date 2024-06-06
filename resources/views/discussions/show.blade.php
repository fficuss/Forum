<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $discussion->title }}</title>
    <link rel="stylesheet" href="{{ asset('/discussions.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <div class="discussion-post">
            <h1>{{ $discussion->title }}</h1>
            <p>{{ $discussion->text }}</p>
        </div>
        <h2 class="answer-title" id="answerButton">Answer this discussion</h2>
        <div class="answer-form" id="answerForm">
            <form action="{{ route('answers.store', $discussion) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="text" placeholder="Your answer" required></textarea>
                </div>
                <button type="submit" class="answersubmitbtn">Submit Answer</button>
            </form>
        </div>
        <div class="answers">
            @foreach($discussion->answers->where('parent_id', null) as $answer)
                <div class="answer">
                    <p>{{ $answer->content }}</p>
                    <div class="user-info">
                        Answered by: {{ $answer->user->username }}
                        <button class="replyButton" data-answer-id="{{ $answer->id }}">Reply</button>
                    </div>
                    <div class="reply-form" id="replyForm{{ $answer->id }}">
                        <h3>Reply to this answer</h3>
                        <form action="{{ route('replies.store', ['answer' => $answer->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="text" placeholder="Your reply" required></textarea>
                            </div>
                            <button type="submit" class="replysubmitbtn">Submit Reply</button>
                        </form>
                    </div>
                    <div class="replies-container">
                        @foreach($answer->replies as $reply)
                            <div class="reply">
                                <p>{{ $reply->content }}</p>
                                <div class="user-info">
                                    Replied by: {{ $reply->user->username }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#answerButton").click(function(){
                $("#answerForm").toggle();
            });
            $(".replyButton").click(function(){
                var answerId = $(this).data('answer-id');
                $("#replyForm" + answerId).toggle();
            });
        });
    </script>
</body>
</html>
