{{--
  Title: Contact
  Category: design
  Icon: schedule
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
    $verticalSpace = get_field('vertical_space') ?? true ? 'my-8' : '';
    $city = get_field('city');
    $address = get_field('address');
    $phone = get_field('phone');
    $working_hours = get_field('working_hours');
    $maps_link = get_field('maps_link');
	$imageId = get_field('image');
@endphp

<div class="block-contact container {{ $verticalSpace }}">
    <div class="relative bg-white">
        @if(!empty($imageId))
            <div class="lg:absolute lg:inset-0">
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-56 w-full object-cover lg:absolute !m-0 lg:h-full" src="{{ wp_get_attachment_image_url($imageId, 'xlarge') }}" alt="">
                </div>
            </div>
        @endif
        <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:pl-50px lg:max-w-7xl lg:mx-auto">
            <div class="mb-6">
                <div class="text-14px">{{ __('Salonas', 'isto') }}</div>
                <div class="text-22px font-bold font-headings mb-1 leading-none uppercase">{{ $city }}</div>
                <div class="text-14px">{{ $address }}, <a href="tel:{{ $phone }}">{{ $phone }}</a></div>
            </div>
            <div>
                <div class="text-14px">{{ __('Salono darbo laikas', 'isto') }}</div>
                <div class="text-14px">{{ $working_hours }}</div>
            </div>

            @if(!empty($maps_link))
                <div class="flex items-center space-x-3 mt-8">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <a href="{{ $maps_link }}" target="_blank" class="with-arrow flex items-center space-x-1 text-14px">
                        <span>{{ __('Kaip atvykti', 'isto') }}</span>
                        <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
                    </a>
                </div>
            @endif
        </div>
    </div>

</div>
