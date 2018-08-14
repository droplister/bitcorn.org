@extends('layouts.app')

@section('title', $cause->name)

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/volunteer_bg.jpg'),
        'title' => $cause->title,
        'subtitle' => $cause->subtitle,
        'breadcrumb' => 'Causes',
    ])
    <main class="xs-main">
        <section class="xs-content-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-8 xs-event-wraper">
                                <div class="xs-event-content">
                                    <h1>{{ $cause->name }}</h1>
                                    <p>By: {{ $cause->user->name }} - Seeking {{ $cause->target }} {{ $cause->asset->name }} by {{ $cause->ended_at->format('F jS, 4') }}.</p>
                                    <img src="{{ $cause->image_url }}" class="float-left mb-4 mr-4 d-none d-sm-none" />
                                    <img src="{{ $cause->image_url }}" class="mb-4 d-block d-sm-none" />
                                    @markdown($cause->content)
                                    <h3>{{ $cause->progress }}% Pledged</h3>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $cause->progress === 0 ? 1 : $cause->progress }}%" aria-valuenow="{{ $cause->progress === 0 ? 1 : $cause->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                
                                <div class="xs-blog-post-comment xs-padding-40 xs-border">
                                    <h4 class="comments-title">1 Comment</h4>
                                    <ul class="comment-list">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="comment-meta">
                                                    <div class="comment-author">
                                                        <img alt="avatar" src="{{ asset('assets/images/avatar/avatar_9.jpg') }}" class="avatar">
                                                        <b>Jhony WIlliamson</b>
                                                    </div>
                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <time datetime="2018-08-17T04:24:26+00:00">17th August 2018</time>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <p>On the evening of November 10th, the audience at New Yorkâ€™s Metry opolitiona era was treated to the briefest of delights.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                    <div class="comment-respond">
                                        <h3 class="comment-reply-title">Leave a comment</h3>
                                                    
                                        <form action="POST" method="post" class="comment-form">
                                            <input placeholder="Enter Name *" name="author" type="text">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input placeholder="Enter Email *" name="email" type="email">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input placeholder="Enter Website" name="url" type="url">
                                                </div>
                                            </div>

                                            <textarea placeholder="Enter Comments *" name="comment" cols="45" rows="8"></textarea>
                                            
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary" name="submit">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                @include('causes.partials.sidebar')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection