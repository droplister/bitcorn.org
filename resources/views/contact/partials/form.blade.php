<form action="{{ route('contact.store') }}" method="POST" id="xs-contact-form" class="xs-contact-form contact-form-v2">
    @csrf
    @captcha
    <div class="input-group">
        <input type="text" name="name" id="xs-name" class="form-control" placeholder="Enter Your Name.....">
        <div class="input-group-append">
            <div class="input-group-text"><i class="fa fa-user"></i></div>
        </div>
    </div>
    <div class="input-group">
        <input type="email" name="email" id="xs-email" class="form-control" placeholder="Enter Your Email.....">
        <div class="input-group-append">
            <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
        </div>
    </div>
    <div class="input-group message-group">
        <textarea name="message" placeholder="Enter Your Message....." id="xs-message" class="form-control" cols="30" rows="10"></textarea>
        <div class="input-group-append">
            <div class="input-group-text"><i class="fa fa-pencil"></i></div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="xs-submit">Submit</button>
</form>