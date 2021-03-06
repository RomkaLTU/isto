<?php
$gap = isset($product) || isset($favorites) ? 'lg:gap-8' : 'lg:gap-[125px]';
$referer = $_SERVER['HTTP_REFERER'];
$isFavorites = is_page_template('template-favorites.blade.php');
$contactType = $isFavorites ? 'favorites' : 'contacts';
$products = $isFavorites ? $_COOKIE['favs'] : '';
$productId = isset($product) ? $product->get_id() : false;
?>

<form
    action=""
    method="post"
    @submit.prevent="submitForm()"
    x-data="contactUs"
    x-init="setProps('{{ $productId }}', '{{ $products }}', '{{ $referer }}', '{{ $contactType }}' )">
    <div class="text-14px uppercase mb-5">{{ __('Užklausos forma', 'isto') }}</div>
    <div class="grid lg:grid-cols-2 gap-4 {{ $gap }}">
        <div class="flex flex-col space-y-4">
            <label class="block border-b border-black pb-1">
                <input
                    x-model="data.name"
                    type="text"
                    class="bg-transparent border-none text-14px p-0 outline-none focus:ring-0 placeholder-gray-2"
                    placeholder="{{ __('VARDAS PAVARDĖ*', 'isto') }}">
            </label>
            <label class="block border-b border-black pb-1">
                <input
                    x-model="data.email"
                    type="email"
                    class="bg-transparent border-none text-14px p-0 outline-none focus:ring-0 placeholder-gray-2"
                    placeholder="{{ __('EL. PAŠTAS*', 'isto') }}">
            </label>
            <label class="block border-b border-black pb-1">
                <input
                    x-model="data.phone"
                    name="phone"
                    type="text"
                    class="bg-transparent border-none text-14px p-0 outline-none focus:ring-0 placeholder-gray-2"
                    placeholder="{{ __('TEL*', 'isto') }}">
            </label>
            <div class="text-14px uppercase text-gray-2">
                {{ __('Pasirinkti miestą*', 'isto') }}
            </div>
            <div>
                <fieldset>
                    <legend class="sr-only">{{ __('Miestai', 'isto') }}</legend>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-5">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input
                                        id="city_vilnius"
                                        aria-describedby="city-vilnius"
                                        name="city"
                                        x-model="data.city"
                                        value="Vilnius"
                                        type="radio"
                                        class="focus:ring-gray-2 h-4 w-4 text-black border-gray-2 rounded-none">
                                </div>
                                <div class="ml-3 text-14px">
                                    <label for="city_vilnius" class="font-medium text-gray-2 cursor-pointer uppercase">{{ __('Vilnius', 'isto') }}</label>
                                    <span id="comments-description" class="text-gray-2"><span class="sr-only">{{ __('Vilnius', 'isto') }}</span></span>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input
                                        id="city_klaipeda"
                                        aria-describedby="city-klaipeda"
                                        name="city"
                                        x-model="data.city"
                                        value="Klaipėda"
                                        type="radio"
                                        class="focus:ring-gray-2 h-4 w-4 text-black border-gray-2 rounded-none">
                                </div>
                                <div class="ml-3 text-14px">
                                    <label for="city_klaipeda" class="font-medium text-gray-2 cursor-pointer uppercase">{{ __('Klaipėda', 'isto') }}</label>
                                    <span id="comments-description" class="text-gray-2"><span class="sr-only">{{ __('Klaipėda', 'isto') }}</span></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input
                                        id="privacy_policy"
                                        aria-describedby="city-vilnius"
                                        name="privacy_policy"
                                        x-model="data.privacy_policy"
                                        type="checkbox"
                                        class="focus:ring-gray-2 h-4 w-4 text-black border-gray-2 rounded-none">
                                </div>
                                <div class="ml-3 text-14px">
                                    <a href="{{ get_privacy_policy_url() }}" target="_blank" class="font-medium text-gray-2 cursor-pointer uppercase">{{ __('Sutinku su privatumo politika*', 'isto') }}</a>
                                    <span id="comments-description" class="text-gray-2"><span class="sr-only">{{ __('Sutinku su privatumo politika', 'isto') }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="space-y-8">
            <div>
                <label class="text-14px text-gray-2">
                    <span class="uppercase mb-1 block">{{ __('Žinutė*', 'isto') }}</span>
                    <textarea
                        name="message"
                        x-model="data.message"
                        id="message"
                        class="bg-transparent block w-full text-black outline-none focus:ring-0 sm:text-sm border border-gray-2 h-[95px] p-4"></textarea>
                </label>
            </div>
            <div>
                <button type="submit" class="black-btn relative block h-60px border-none w-full bg-black text-white uppercase text-14px py-5 flex items-center justify-center space-x-4 w-full">
                    <span class="absolute left-0 right-0 mx-auto">{{ __('Siųsti', 'isto') }}</span>
                    <span class="no-scale" x-cloak="data.loading" x-show="data.loading">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
                <div x-show="data.errors" class="text-red-500 text-14px my-2">
                    {{ __('Klaida. Pasitikrinkite ar gerai užpildėte visus laukus.', 'isto') }}
                </div>
                <div x-show="data.sent" class="text-black text-14px my-2">
                    {{ __('Laiškas išsiųstas, netrukus susisieksime.', 'isto') }}
                </div>
            </div>
        </div>
    </div>
</form>
