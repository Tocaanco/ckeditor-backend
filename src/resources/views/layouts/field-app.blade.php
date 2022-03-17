@php
    $config_container = SewidanGetTagConfig('container' , $config);
    $config_label = SewidanGetTagConfig('label' , $config);
    $config_field_div = SewidanGetTagConfig('field_div' , $config);
    $config_field_error = SewidanGetTagConfig('field_error' , $config);
@endphp

@if($config_container)
    <div class="{{isset($config_container['class']) ? $config_container['class'] :'' }} {{$errors->has($name) ? 'has-error':'' }}"
         id="{{$name}}_wrap">
        @endif

        @if($config_label)
            <label for="{{$name}}" {!! isset($config_label['options']) ? sewidanOptionsToStr($config_label['options']) : '' !!}>
                {{$label}}
                @if(isset($field_attributes['required']) && $field_attributes['required'])
                    <span style="color: #f83333;">*</span>
                @endif
            </label>
        @endif

        @if($config_field_div)
            <div {!! isset($config_field_div['options']) ? sewidanOptionsToStr($config_field_div['options']) : '' !!}>
                @endif

                @include('ckeditor5::'. $field_type)


                @if($config_field_error)

                    <span {!! isset($config_field_error['options']) ? sewidanOptionsToStr($config_field_error['options']) : '' !!}>
                        {{$errors->first($name)}}
                    </span>
                @endif

                @if($config_field_div)
            </div>
        @endif

        @if($config_container)
    </div>
@endif