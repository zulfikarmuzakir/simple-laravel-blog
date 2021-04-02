<div class="mt-5 pt-5 pb-5 footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-xs-12 about-company">
        <h2>{{ $settings->site_name }}</h2>
        <p class="pr-5 text-white-50">{{ $settings->about_us }}</p>
      </div>
      <div class="col-lg-3 col-xs-12">
        <h4 class="mt-lg-0 mt-sm-3">Contact</h4>
        <ul class="m-0 p-0">
          <li style="list-style: none" class="mb-3"><i class="fas fa-envelope mr-2"></i>{{ $settings->contact_email }}</li>
          <li style="list-style: none"><i class="fas fa-phone mr-2"></i>{{ $settings->contact_number }}</li>
        </ul>
      </div>
      <div class="col-lg-4 col-xs-12 location">
        <h4 class="mt-lg-0 mt-sm-4">Location</h4>
        <p>{{ $settings->address }}</p>
      </div>
    </div>
    <div class="made text-center mt-5">
      <small class="text-center">Made with &hearts; by Zulfikar</small>
    </div>
  </div>
</div>  