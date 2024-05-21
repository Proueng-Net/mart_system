<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    @foreach($slideshows as $key => $slide)
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key+1}}" aria-label="Slide {{$key+2}}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://static.vecteezy.com/system/resources/previews/005/048/106/original/black-and-yellow-grunge-modern-thumbnail-background-free-vector.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>The Mini Mart</h5>
        <p>Thanks for visit our site.</p>
      </div>
    </div>
    @foreach($slideshows as $slide)
    <div class="carousel-item">
      <img src="{{asset($slide->thumbnail)}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{$slide->title}}</h5>
        <p>{{$slide->content}}</p>
      </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>