<footer class="bg-midnight">
    <div class="p-8 md-2:p-16 grid grid-cols-1 md-2:grid-cols-3 items-center max-w-452 mx-auto gap-8">
        <div class="flex flex-col w-4/5 mb-6 md-2:mb-0">
            <div class="mb-8">
                <a href="/">
                    <?php
                    sp_file_get_contents('main-logo.svg', 'w-32-5');
                    ?>
                </a>
            </div>
            <p class="text-white mb-8 text-lg max-w-90 font-sans font-light">
                Like what you see? Sign-up to get my latest content when it drops!
            </p>

            <div id="mc_embed_signup">
                <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;"></iframe>

                <form id="mc-form" action="https://gmail.us21.list-manage.com/subscribe/post?u=bae692b227827e3c6bd7d0f24&amp;id=5373792b6e&amp;f_id=0062d7e6f0" method="POST" target="hidden_iframe" novalidate class="flex items-center">
                    <input type="email" name="EMAIL" placeholder="Email Address" class="p-4 flex-grow bg-gray-800 text-gray-400 border-none rounded-l-md placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-sky" required style="height: 48px; font-size: 16px; line-height: 1.5; padding: 0 16px;">
                    <button type="submit" class="py-2 px-4 bg-ruby text-white rounded-r-md hover:bg-red-700" style="height: 48px; font-size: 16px;">Submit</button>
                </form>

                <p id="mc-success-message" class="text-sky mt-4 hidden">Thank you for subscribing!</p>
            </div>
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

<script>
    document.getElementById('mc-form').onsubmit = function() {
        document.getElementById('mc-form').style.display = 'none';
        document.getElementById('mc-success-message').classList.remove('hidden');

        return true;
    };
</script>
