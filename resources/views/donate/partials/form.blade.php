<form action="https://thewaterproject.org/give-water" id="xs-donation-form" class="xs-donation-form">
    <div class="xs-input-group">
        <label for="xs-donate-name">Donation Amount <span class="color-light-red">*</span></label>
        <input type="text" name="name" id="xs-donate-name" class="form-control" placeholder="Minimum of $5">
    </div>
    
    <div class="xs-input-group">
        <label for="xs-donate-charity">List of Evaluated Charities <span class="color-light-red" >*</span></label>
        <select name="charity-name" id="xs-donate-charity" class="form-control" onchange="javascript:location.href = this.value;">
            <option value="">Select</option>
            <option value="http://cherchofblerk.com/donate">Cherch of Blerk</option>
            <option value="https://coincenter.org/donate">Coin Center</option>
            <option value="https://archive.org/donate/">Internet Archive</option>
            <option value="http://www.seansoutpost.com/">Sean's Outpost</option>
            <option value="https://donate.torproject.org/pdr">Tor Project</option>
            <option value="https://thewaterproject.org/give-water">Water Project</option>
        </select>
    </div>

    <button type="submit" class="btn btn-warning">
        <span class="badge"><i class="fa fa-heart"></i></span> Donate now
    </button>
</form>