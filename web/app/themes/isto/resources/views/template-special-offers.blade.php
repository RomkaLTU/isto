{{--
  Template Name: Special offers
--}}

@extends('layouts.shop')

@section('content')
    @while(have_posts()) @php(the_post())
        <div class="container py-40px">
            <h1 class="text-35px mb-6">{{ __('Ypatingi pasiūlymai', 'isto') }}</h1>
            <?php the_content(); ?>
            <?php echo do_shortcode('[featured_products per_page="6" columns="3"]'); ?>
        </div>
    @endwhile
@endsection
