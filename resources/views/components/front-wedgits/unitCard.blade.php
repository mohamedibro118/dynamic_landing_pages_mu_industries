@props(['unit', 'class' => '','mobile'=>'','whats'=>'','color'=>'black'])
@php
    $name = 'name_' . App::getLocale();
@endphp
<div class="rhea_property_card_ele_stylish" style="width: 100%">
    <div class="project-single rhea_property_card_ele_stylish_inner">
        <div class="rhea_thumbnail_wrapper">
            {{-- logo  --}}
            <a class="rhea_permalink rhea_scale_animation" href="#">
                <img width="488" height="250" src="{{ $unit->img_url }}"
                    class="attachment-property-thumb-image size-property-thumb-image wp-post-image" alt="Villa"
                    decoding="async" loading="lazy"></a>
        </div>
        <div class="rhea_detail_wrapper rh_detail_wrapper_2">
            {{-- name --}}
            <h3 class="rhea_heading_stylish"
                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-transform: capitalize">
             {!! $unit->description !!}
            </h3>
            {{-- desc --}}
            {{-- <div class="rh_prop_card_meta_wrap_stylish">
                
            </div> --}}
            {{-- price and call --}}
            <div class="rhea_price_fav_box">

                <div class="rhea_price_box">
                    <div class="rh_prop_card__priceLabel_sty">
                        <p class="rh_prop_card__price_sty">{!! $unit->price !!}
                            {{-- {{ __('LE') }}{{ number_format(, 0, '', ',') }} --}}
                        </p>
                    </div>
                </div>

                <div class="rhea_fav_icon_box rhea_parent_fav_button">
                    {{-- cta --}}
                    <x-front-wedgits.ctaUnit :phone="$mobile" :whats="$whats" color="{{$color}}"
                        url=""
                        style="display: flex;flex-wrap:nowrap;justify-content: end;" />

                </div>
            </div>

        </div>
    </div>
</div>
{{-- ------------------------------------------------------------- --}}
