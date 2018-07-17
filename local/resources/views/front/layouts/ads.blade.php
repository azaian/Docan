<div class="ads">
      @foreach($ads as $ad)
      <img src="{{URL("uploads/".$ad->image."")}}" class="img-responsive pro-ads">
      @endforeach
</div>
