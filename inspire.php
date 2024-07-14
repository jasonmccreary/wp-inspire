<?php
/*
 * Plugin Name: Inspiring Quotes
 * Plugin URI: http://wordpress.org/plugins/inspiring-quotes/
 * Description: A port of the Inspire command from Laravel to add an inspirational quote in the upper right of your admin screen.
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Author: Jason McCreary
 * Version: 0.1.0
*/

function wppm_inspire_get_quote()
{
    $quotes = [
        'Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant',
        'An unexamined life is not worth living. - Socrates',
        'Be present above all else. - Naval Ravikant',
        'Happiness is not something readymade. It comes from your own actions. - Dalai Lama',
        'He who is contented is rich. - Laozi',
        'I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger',
        'If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius',
        'It is not the man who has too little, but the man who craves more, that is poor. - Seneca',
        'It is quality rather than quantity that matters. - Lucius Annaeus Seneca',
        'Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci',
        'Let all your things have their places; let each part of your business have its time. - Benjamin Franklin',
        'No surplus words or unnecessary actions. - Marcus Aurelius',
        'Order your soul. Reduce your wants. - Augustine',
        'People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius',
        'Simplicity is an acquired taste. - Katharine Gerould',
        'Simplicity is the consequence of refined emotions. - Jean D\'Alembert',
        'Simplicity is the essence of happiness. - Cedric Bledsoe',
        'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
        'Smile, breathe, and go slowly. - Thich Nhat Hanh',
        'The only way to do great work is to love what you do. - Steve Jobs',
        'The whole future lies in uncertainty: live immediately. - Seneca',
        'Very little is needed to make a happy life. - Marcus Antoninus',
        'Waste no more time arguing what a good man should be, be one. - Marcus Aurelius',
        'Well begun is half done. - Aristotle',
        'When there is no desire, all things are at peace. - Laozi',
    ];

    return wptexturize($quotes[wp_rand(0, count($quotes) - 1)]);
}

function wppm_inspire()
{
    $chosen = wppm_inspire_get_quote();
    $lang = '';
    if (substr(get_user_locale(), 0, 3) !== 'en_') {
        $lang = ' lang="en"';
    }

    printf(
        '<p id="inspire-quote"><span dir="ltr"%s>%s</span></p>',
        esc_attr($lang),
        esc_html($chosen)
    );
}

add_action('admin_notices', 'wppm_inspire');

function wppm_inspire_css()
{
    echo '
	<style>
	#inspire-quote {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #inspire-quote {
		float: left;
	}
	.block-editor-page #inspire-quote {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#inspire-quote,
		.rtl #inspire-quote {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	';
}

add_action('admin_head', 'wppm_inspire_css');
