<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <title><?php wp_title(); ?></title>
    <meta charset='<?php bloginfo('charset'); ?>' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="bg-night border-b-2 border-midnight">
        <div class="flex justify-between items-center p-8 relative">
            <a href="/">
                <?php sp_file_get_contents('main-logo.svg'); ?>
            </a>

            <button id="menu-toggle" type="button" class="text-white md:hidden focus:outline-none">
                <svg id="hamburger" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close" class="hidden w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <nav id="mobile-menu" class="hidden md:flex md:items-center flex-col md:flex-row gap-6 text-white font-sans absolute md:relative top-full left-0 w-full md:w-auto bg-night md:bg-transparent p-8 md:p-0 border-b-4 border-midnight md:border-b-0 z-50">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'flex flex-col md:flex-row gap-8 text-center md:text-left',
                    )
                );
                ?>
            </nav>
        </div>
    </header>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('hamburger');
            const close = document.getElementById('close');
            menu.classList.toggle('hidden');
            hamburger.classList.toggle('hidden');
            close.classList.toggle('hidden');
            menu.classList.toggle('border-b-2');
        });
    </script>
