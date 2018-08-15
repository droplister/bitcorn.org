<div class="xs-blog-post-comment xs-padding-40 xs-border">
<!--     <h4 class="comments-title"> Comment</h4>
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
    </ul> -->
    
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
                <button type="submit" class="btn btn-primary" name="submit" disabled>Post Comment</button>
            </div>
        </form>
    </div>
</div>