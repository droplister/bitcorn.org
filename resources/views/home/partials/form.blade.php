<form action="{{ route('contact.store') }}" method="POST" id="volunteer-form" class="xs-volunteer-form">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
        </div>
        <div class="col-lg-6">
            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
        </div>
    </div>
    <textarea name="message" id="message" placeholder="Enter your message" cols="30" class="form-control" rows="10"></textarea>
    <button type="submit" class="btn btn-secondary btn-color-alt">apply now</button>
</form>