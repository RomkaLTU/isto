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
        <div>
            <?php the_content(); ?>
        </div>

        @if(!empty($related_post_ids))
            <div class="border-t border-black pt-50px">
                <h3 class="mb-3 text-22px uppercase">
                    {{ __('Daugiau įkvėpimo', 'isto') }}
                </h3>
                <div class="grid lg:grid-cols-3 gap-4 lg:gap-50px">
                    @foreach($related_post_ids as $postId)
                        <?php
                        $post = get_post($postId);
                        setup_postdata($GLOBALS['post'] =& $post);
                        ?>
                        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
                    @endforeach
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        @endif
    </div>
</div>
