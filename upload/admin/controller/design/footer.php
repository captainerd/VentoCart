<?php
namespace Ventocart\Admin\Controller\Design;

/**
 * Class Footer
 *
 * @package Ventocart\Admin\Controller\Design
 */
class Footer extends \Ventocart\System\Engine\Controller
{
    public function index($success = false, $failed = false): void
    {
        $this->load->language('design/footer');

        $this->document->setTitle($this->language->get('heading_title'));
        $data['success'] = $success;
        $data['failed'] = $failed;
        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('design/footer', 'user_token=' . $this->session->data['user_token'])
        ];
        $data['actionUrl'] = $this->url->link('design/footer.save', 'user_token=' . $this->session->data['user_token']);
        $data['user_token'] = $this->session->data['user_token'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        $this->load->model('setting/setting');
        $theme = $this->model_setting_setting->getConfigValue('THEME_NAME');
        $footer_file = DIR_VENTOCART . 'themes/' . $theme . '/plates/common/footer.php';

        $sections = [];
        $this->load->model('localisation/language');
        $language_code = $code = $this->config->get('config_language');

        $languages = $this->model_localisation_language->getLanguages();
        $this->load->bridge('Catalog');

        if (isset($footer_file) && is_file($footer_file)) {

            $footer_content = file_get_contents($footer_file);

            // Match all sections between <!-- link section --> and <!-- end section -->
            if (preg_match_all('/<!-- link section -->(.*?)<!-- end section -->/is', $footer_content, $matches)) {

                if (isset($matches[1]) && is_array($matches[1])) {
                    foreach ($matches[1] as $section_html) {
                        $section = [];



                        // Get the title from the first <h5> in the section
                        if (preg_match('/<h5[^>]*>(.*?)<\/h5>/is', $section_html, $title_match)) {
                            $title_match[1] = trim($title_match[1], '<?= $ ?>');
                            if (isset($languages) && is_array($languages)) {
                                foreach ($languages as $language) {
                                    if (isset($language['code']) && isset($language['language_id'])) {
                                        if (isset($language_code) && $language_code == $language['code']) {
                                            $data['mylangid'] = $language['language_id'];
                                        }
                                        $this->load->language('common/footer', '', $language['code']);
                                        $section['text'][$language['language_id']][strip_tags($title_match[1])] = $this->language->get(strip_tags($title_match[1]));
                                    }
                                }
                            }
                        } else {
                            $section['text'] = '';
                        }

                        $section['links'] = [];

                        // Get all <li> items with <a href="">
                        if (preg_match_all('/<li[^>]*>\s*<a[^>]*href=["\']<\?= \$url->link\([\'"](.*?)[\'"]\) \?>["\'][^>]*>(.*?)<\/a>\s*<\/li>/is', $section_html, $link_matches)) {

                            if (isset($link_matches[1]) && isset($link_matches[2]) && is_array($link_matches[1]) && is_array($link_matches[2])) {
                                foreach ($link_matches[1] as $key => $url) {
                                    $link_matches[2][$key] = trim($link_matches[2][$key], '<?= $ ?>');

                                    // Build the text array for each language
                                    $text = [];
                                    if (isset($languages) && is_array($languages)) {
                                        foreach ($languages as $language) {
                                            if (isset($language['language_id'])) {
                                                $text[$language['language_id']][strip_tags($link_matches[2][$key])] = $this->language->get(strip_tags($link_matches[2][$key]));
                                            }
                                        }
                                    }

                                    // Now build the main array
                                    $section['links'][] = [
                                        'url' => trim($url),
                                        'text' => $text
                                    ];
                                }
                            }
                        }

                        $sections[] = $section;
                    }
                }
            }

            $this->bridge->kill();
        }

        $data['languages'] = $languages;
        $data['sections'] = $sections;

        $this->load->language('design/footer');

        $this->response->setOutput($this->load->view('design/footer', $data));
    }

    public function save(): void
    {
        // Ensure that $footer_file exists before trying to modify it
        $this->load->model('setting/setting');
        $theme = $this->model_setting_setting->getConfigValue('THEME_NAME');
        $footer_file = DIR_VENTOCART . 'themes/' . $theme . '/plates/common/footer.php';
        $sections = $this->request->post['sections']; // Get the array of sections
        $all_successful = true;

        if (is_file($footer_file)) {
            $footer_content = file_get_contents($footer_file);
            $parts = explode('<!-- link section -->', $footer_content);
            $new_footer_content = $parts[0];

            foreach ($parts as $index => $part) {
                if ($index === 0) {
                    continue; // Skip the first part
                }

                $end_parts = explode('<!-- end section -->', $part);

                if (isset($end_parts[0])) {
                    $section = isset($sections[$index - 1]) ? $sections[$index - 1] : null;
                    if ($section) {
                        $new_section_content = '<h5><?= $' . $section['text_key'] . ' ?></h5>' . "\r";
                        $new_section_content .= "<ul class='list-unstyled'>";

                        foreach ($section['links'] as $link) {
                            $url = html_entity_decode($link['url']);
                            $text = $link['text_key'];

                            // Add URL conditions
                            if ($url === 'account/affiliate') {
                                $new_section_content .= "\r" . '<?php if ($affiliate): ?>';
                            } elseif ($url === 'guest/order') {
                                $new_section_content .= "\r" . '<?php if ($guestorder): ?>';
                            } elseif ($url === 'information/gdpr') {
                                $new_section_content .= "\r" . '<?php if ($gdpr): ?>';
                            } elseif ($url === 'cms/blog') {
                                $new_section_content .= "\r" . '<?php if ($blog): ?>';
                            } elseif ($url === 'giftcards/giftcard') {
                                $new_section_content .= "\r" . '<?php if ($giftcards): ?>';
                            }

                            // Add list item
                            $new_section_content .= '
                        <li><a href="<?= $url->link(\'' . $url . '\') ?>"><?= $' . $text . ' ?></a></li>';

                            // Close conditions
                            if ($url === 'account/affiliate') {
                                $new_section_content .= "\r" . '<?php endif; ?>';
                            } elseif ($url === 'guest/order') {
                                $new_section_content .= "\r" . '<?php endif; ?>';
                            } elseif ($url === 'information/gdpr') {
                                $new_section_content .= "\r" . '<?php endif; ?>';
                            } elseif ($url === 'cms/blog') {
                                $new_section_content .= "\r" . '<?php endif; ?>';
                            } elseif ($url === 'giftcards/giftcard') {
                                $new_section_content .= "\r" . '<?php endif; ?>';
                            }
                        }

                        $new_section_content .= "</ul>";
                    }

                    $new_footer_content .= '<!-- link section -->' . $new_section_content . '<!-- end section -->';
                }

                if (isset($end_parts[1])) {
                    $new_footer_content .= $end_parts[1];
                }
            }

            // Save the new footer content if changes were made
            if (!empty($new_footer_content)) {
                $all_successful .= file_put_contents($footer_file, $new_footer_content);
            }
        }

        // Language entries processing
        $this->load->model('localisation/language');
        $langfiles = [];
        foreach ($sections as $section) {
            foreach ($section['text'] as $language_id => $text) {
                $language_code = $this->model_localisation_language->getLanguage($language_id)['code'];
                $langfiles[$language_code][$section['text_key']] = reset($text);
            }

            foreach ($section['links'] as $link) {
                foreach ($link['text'] as $language_id => $text) {
                    $language_code = $this->model_localisation_language->getLanguage($language_id)['code'];
                    $langfiles[$language_code][$link['text_key']] = reset($text);
                }
            }
        }

        foreach ($langfiles as $code => $texts) {
            $footer_file = DIR_CATALOG . "language/" . $code . "/common/footer.php";
            $new_content = "<?php\r\n";

            foreach ($texts as $key => $text) {
                $text = str_replace('"', '\"', $text);
                $new_content .= '$_[\'' . $key . '\'] = "' . $text . "\";\r\n";
            }

            if (!empty($new_content)) {
                $all_successful = $all_successful && file_put_contents($footer_file, $new_content);
            }
        }
        $this->load->language('design/footer');

        if ($all_successful) {
            $this->index($this->language->get('text_success'));
        } else {
            $this->index(false, $this->language->get('text_failure'));
        }




    }
}

?>