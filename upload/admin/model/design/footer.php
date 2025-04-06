<?php
namespace Ventocart\Admin\Model\Design;
/**
 *  Class Footer
 *
 * @package Ventocart\Admin\Model\Design
 */
class Footer extends \Ventocart\System\Engine\Model
{


    public function getFooterLinks()
    {


        $this->load->model('setting/setting');

        $sections = [];
        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();
        $this->load->bridge('Catalog');


        $theme = $this->model_setting_setting->getConfigValue('THEME_NAME');
        $footer_file = DIR_VENTOCART . 'themes/' . $theme . '/plates/common/footer.php';


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
                                        $section['text_key'] = strip_tags($title_match[1]);
                                        $this->load->language('common/footer', '', $language['code']);
                                        $section['text'][$language['language_id']][strip_tags($title_match[1])] = $this->language->get(strip_tags($title_match[1]));
                                        $this->load->language('common/footer');
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
                                            $this->load->language('common/footer', '', $language['code']);
                                            if (isset($language['language_id'])) {
                                                $text[$language['language_id']][strip_tags($link_matches[2][$key])] = $this->language->get(strip_tags($link_matches[2][$key]));
                                            }
                                        }
                                    }

                                    // Now build the main array
                                    $section['links'][] = [
                                        'url' => trim($url),
                                        'text_key' => $link_matches[2][$key],
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


        return $sections;
    }


    public function SaveFooterLinks($sections)
    {


        if (!$this->validateFooterLinksFormat($sections)) {
            return false;
        }
        $this->load->model('setting/setting');
        $theme = $this->model_setting_setting->getConfigValue('THEME_NAME');
        $footer_file = DIR_VENTOCART . 'themes/' . $theme . '/plates/common/footer.php';

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
                $langfiles[$language_code][$section['text_key']] = $text[$section['text_key']];
            }

            foreach ($section['links'] as $link) {
                foreach ($link['text'] as $language_id => $text) {

                    $language_code = $this->model_localisation_language->getLanguage($language_id)['code'];
                    $langfiles[$language_code][$link['text_key']] = $text[$link['text_key']];
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
        sleep(2);
        return $all_successful;
    }


    // Function to validate the structure of the sections array
    private function validateFooterLinksFormat(&$sections)
    {
        // Check if $sections is a non-empty array
        if (empty($sections) || !is_array($sections)) {
            return false; // Return false if sections is not an array or is empty
        }

        // Loop through each section to validate its format
        foreach ($sections as &$section) {
            // Check that the section has a valid 'text_key' field and it's a string
            if (empty($section['text_key']) || !is_string($section['text_key'])) {
                return false; // If 'text_key' is missing or not a string, return false
            }

            // Check if 'text' is an array and contains valid language keys with valid strings
            if (!isset($section['text']) || !is_array($section['text'])) {
                return false; // If 'text' is missing or not an array, return false
            }

            // Validate the structure inside 'text'
            foreach ($section['text'] as $language_id => &$text_array) {
                if (empty($text_array[$section['text_key']])) {
                    $text_array[$section['text_key']] = reset($text_array);
                }
                if (!is_array($text_array) || empty($text_array[$section['text_key']]) || !is_string($text_array[$section['text_key']])) {
                    return false; // If text_array does not contain the expected text_key or it's not a string, return false
                }
            }

            // Check if 'links' is an array and each link has required fields
            if (!isset($section['links']) || !is_array($section['links'])) {
                return false; // If 'links' is missing or not an array, return false
            }

            // Validate each link
            foreach ($section['links'] as &$link) {


                if (empty($link['url']) || !is_string($link['url'])) {
                    return false; // If 'url' is missing or not a string
                }
                if (empty($link['text_key']) || !is_string($link['text_key'])) {
                    return false; // If 'text_key' is missing or not a string
                }
                if (empty($link['text']) || !is_array($link['text'])) {
                    return false; // If 'text' is missing or not an array
                }

                // Validate each language-specific 'text' under the link
                foreach ($link['text'] as $language_id => &$text_array) {
                    if (empty($text_array[$link['text_key']])) {
                        $text_array[$link['text_key']] = reset($text_array);
                    }
                    if (!is_array($text_array) || empty($text_array[$link['text_key']]) || !is_string($text_array[$link['text_key']])) {
                        return false; // If text_array does not contain the expected text_key or it's not a string
                    }
                }
            }
        }

        // If all checks pass, return true
        return true;
    }

    public function autocomplete($name)
    {
        // Fetch the footer links using getFooterLinks
        $sections = $this->getFooterLinks();

        // Get the current language ID from the configuration
        $language_id = $this->config->get('config_language_id');

        // Prepare an array to store the results
        $results = [];

        // Loop through each section
        foreach ($sections as $section) {
            // Check if the 'text' field exists and is an array for the current section
            if (isset($section['text'][$language_id])) {
                // Get the specific language text for the current section
                $text = $section['text'][$language_id];

                // Check if the text matches the search term
                foreach ($text as $key => $value) {
                    if (stripos($value, $name) === 0) { // Case-insensitive match at the start of the string
                        // Add the matching text and text_key to the results array
                        $results[] = [
                            'name' => $value,  // The name of the link (text)
                            'key' => $section['text_key']  // The text_key
                        ];
                    }
                }
            }

            // Optionally, you can check the 'links' array too, but as per the request, we're focusing only on the root 'text' array
        }

        return $results;
    }


    public function updateToKey($key, $element, $linkkey, $url)
    {
        // Fetch the footer links using getFooterLinks
        $sections = $this->getFooterLinks();
        $hasupdate = false;
        // Iterate through each section to find the one with the matching $key
        foreach ($sections as &$section) {
            // If the section contains the matching text_key
            if (isset($section['text_key']) && $section['text_key'] == $key) {

                // Check if the link already exists in this section
                $linkFound = false;
                foreach ($section['links'] as &$link) {
                    // If the link has the matching text_key
                    if (isset($link['text_key']) && $link['text_key'] == $linkkey) {
                        // Update the language translations for this link
                        foreach ($element as $language_id => $text) {
                            if ($link['text'][$language_id][$linkkey] != $text) {
                                $link['text'][$language_id][$linkkey] = $text;
                                $hasupdate = true;
                            }
                        }
                        $linkFound = true;
                        break; // Exit the loop once the link is found and updated
                    }
                }

                // If the linkkey was not found, create a new link
                if (!$linkFound) {
                    $newLink = [
                        'url' => $url, // The URL can be set as needed or passed as part of the element
                        'text_key' => $linkkey,
                        'text' => []
                    ];
                    $hasupdate = true;
                    // Add the translations to the new link
                    foreach ($element as $language_id => $text) {
                        $newLink['text'][$language_id][$linkkey] = $text;
                    }

                    // Append the new link to the section
                    $section['links'][] = $newLink;
                }

            } else {
                // If the section does not match the requested $key, remove the link with the given $linkkey
                foreach ($section['links'] as $linkIndex => &$link) {
                    if (isset($link['text_key']) && $link['text_key'] == $linkkey) {
                        unset($section['links'][$linkIndex]); // Remove the link from the section
                        break; // Exit once the link is removed
                    }
                }
            }
        }

        // Save the updated footer links
        if ($hasupdate) {
            $this->SaveFooterLinks($sections);
        }
        // Return the updated sections
        return $sections;
    }


    public function deleteLinkKey($linkkey)
    {
        // Fetch the footer links using getFooterLinks
        $sections = $this->getFooterLinks();
        $hasupdate = false;
        // Iterate through each section to find the one with the matching linkkey
        foreach ($sections as &$section) {
            // Iterate through the 'links' array in the section
            foreach ($section['links'] as $key => &$link) {
                // If the link has the matching text_key (linkkey)
                if (isset($link['text_key']) && $link['text_key'] == $linkkey) {
                    // Remove the link from the section
                    $hasupdate = true;
                    unset($section['links'][$key]);
                    break; // Exit the loop once the link is found and removed
                }
            }
        }
        if ($hasupdate) {
            // Save the updated footer links
            $this->SaveFooterLinks($sections);
        }
        // Return the updated sections
        return $sections;
    }

    public function getKeyParent($linkkey)
    {
        // Fetch the footer links using getFooterLinks
        $sections = $this->getFooterLinks();

        // Get the current language ID
        $language_id = $this->config->get('config_language_id');

        // Iterate through each section to find the matching linkkey
        foreach ($sections as $section) {
            // If the section contains the matching text_key
            if (isset($section['links'])) {
                foreach ($section['links'] as $link) {
                    // If the link has the matching text_key
                    if (isset($link['text_key']) && $link['text_key'] == $linkkey) {
                        // Check if the language translation exists for the parent key
                        if (isset($section['text'][$language_id][$section['text_key']])) {
                            // Return an array with the parent key and its translated value
                            return [
                                'key' => $section['text_key'],  // Parent key
                                'text' => $section['text'][$language_id][$section['text_key']]  // Translated text for the language
                            ];
                        }
                    }
                }
            }
        }

        // Return null if no matching linkkey is found or if no translation exists
        return null;
    }

}