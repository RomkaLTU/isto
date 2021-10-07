<div @php(post_class())>
    <div class="container relative mt-70px mb-100px">
        <div class="">
            <div class="text-14px mb-1">{{ get_the_date('Y.m.d') }}</div>
            <div class="flex flex-col lg:flex-row justify-between">
                <h1 class="uppercase text-22px mb-2 lg:mb-0">{{ get_the_title() }}</h1>
                <div class="">
                    @include('partials.share', ['post_id' => get_the_ID()])
                </div>
            </div>
        </div>
        <?php the_content(); ?>
    </div>
</div>
