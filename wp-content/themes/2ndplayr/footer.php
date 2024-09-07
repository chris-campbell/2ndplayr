<footer class="bg-midnight">
    <div class="p-8 md-2:p-16 grid grid-cols-1 md-2:grid-cols-3 items-center max-w-452 mx-auto gap-8">

        <div class="flex flex-col w-4/5 mb-6 md-2:mb-0">
            <div class="mb-8">
                <a href="/">
                    <?php
                    sp_file_get_contents('main-logo.svg');
                    ?>
                </a>
            </div>
            <p class="text-white mb-8 text-lg max-w-90 font-sans font-light">Lad Jack Ketch Chain Shot hands hempen halter parrel careen gaff belay rope's end.</p>
            <form class="flex">
                <input type="email" placeholder="Email Address" class="p-4 flex-grow bg-gray-800 text-gray-400 border-none rounded-l-md placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-sky">
                <button type="submit" class="py-2 px-4 bg-ruby text-white rounded-r-md hover:bg-red-700">Submit</button>
            </form>
        </div>

        <div class="flex flex-col w-full md-2:w-4/5 mx-auto mb-6 md-2:mb-0">
            <h3 class="text-2xl font-bold text-white mb-4">Quick Nav</h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer-menu',
                'menu_class' => 'text-white list-none p-0 w-full',
            ]);
            ?>
        </div>

        <div class="flex flex-col w-full md-2:w-4/5 mx-auto">
            <h3 class="text-2xl font-bold text-white mb-4">Recent Posts</h3>

            <?php 
            get_template_part('partials/footer/recent-post', null); 
            ?>
        </div>


    </div>

    <div class="text-center font-sans font-light text-gray-500 py-8 border-t border-night">
        <p>2ndplayer © Copyright 2023. All rights reserved.</p>
    </div>
</footer>

<?php
wp_footer();
?>