@section('imprint-add-color-btn-section')
<style type="text/css">
    select.select-max-colors{
        margin-top: 5px !important;
    }
    button.mfp-close, button.mfp-arrow {
        color: black !important;
    }

   
</style>

<div class="col-md-12 cancel-color pl-0 cancel-color-row-1">
<select class="select-max-colors select-max-colors-1 imp_color_{{$imprint_id}}" name="imp_color_{{$imprint_id}}">
	
	       <?php  $count=0;?>
                @foreach($imprint_colors as $imprint_color)
                      <?php $count++;?>
                        @if($count==1)
                                <option selected="true" value="{{$imprint_color->colors->id}}">{{$imprint_color->colors->name}}</option>
                        @else
                                <option value="{{$imprint_color->colors->id}}">{{$imprint_color->colors->name}}</option>
                        @endif
                @endforeach
</select>
<button title="Close(Esc)" type="button" class="mfp-close close_imprint_color_select" imprint_id="{{$imprint_id}}" max_colors="{{$max_colors}}">×</button>

<!-- <i class="fa fa-close close_imprint_color_select" imprint_id="{{$imprint_id}}"></i> -->
</div>

@php 
        $max_colors = $max_colors-1;
@endphp
@if($max_colors>0)
<button class="add_imprint_color add_imprint_color_{{$imprint_id}} cart-status-button mt-2 mb-2" id="add-color-btn-{{$imprint_id}}" imprint_id="{{$imprint_id}}" max_colors="{{$max_colors}}">Add color +</button>
@endif



@endsection