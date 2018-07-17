<form action="{{URL('test')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<select class="form-control" name="sub">
                             @foreach($main as $maincate)
                          
                             @if(!$maincate->subcat->isEmpty())
                             @foreach ($maincate->subcat as $sub1)
                                            @if(!empty($sub1->cat_trans('ar')))
                                            @if(!$maincate->subcat->isEmpty())
                                                @foreach($sub1->subcat as $sub2)
                            <option value="{{$sub2->id}}">
                                @if(!empty($sub2->cat_trans('ar')))
                                {{$sub2->cat_trans('ar')->name}} 
                                @endif</option>
                             @endforeach
                             @endif
                            @endif
                            @endforeach
                             @endif
                            
                            @endforeach
                        </select>
    <button type="post">submit</button>
</form>