<?php

// This tools will help you convert twig templates to plates
// Command line usage: php converter.php file (without .twig)
// The result .php will be with escaped variables for enhanced security.
// Usage example: php converter.php template_name (where template_name.twig exists in the current directory).
// Remember to remove any $this-e(); where escaping isn't needed (eg, language values with HTML or any admin generated data)

// Main script: Convert the input file and save the output as a .php file
if (isset($argv[1])) {
    // Sanitize input (for example, to avoid directory traversal)
    $filePath = realpath($argv[1] . ".php");

    // Ensure it's a file and not a directory
    if ($filePath && is_file($filePath)) {
        // Try to delete the file
        if (unlink($filePath)) {
            echo "Previous file deleted: $filePath\n";
        } else {
            echo "Error: Unable to delete the file.\n";
            exit;
        }
    } else {
        echo "Error: Invalid file path or file does not exist.\n";
        exit;
    }
} else {
    echo "Error: No file specified.\n";
    exit;
}
deTwigfy($argv[1]);

/**
 * Converts a .twig file to a .php file with added escaping for variables to mitigate XSS risks.
 *
 * @param string $filename The base filename (without the .twig extension) of the template to be converted.
 * @return string|null The name of the converted file, or null if no conversion was performed.
 */
function deTwigfy($filename)
{
    /* Conversion:

                                     - No form post/action= or button/back submit, should be escaping, having $this->e($var)
                                     - No links that perform actions and hold get values should have $this->e()
                                     - Everything other MUST have $this->e() to improve secuirty against XSS attacks
                                     - language entries that hold html may ignore $this->e() 
                                        this function ignores the above rules, inspection and debuging must be done manually.
                                     */

    if (file_exists($filename . '.php')) {
        return;
    }

    if (!file_exists($filename . '.twig')) {
        return;
    }
    $deTwigfy = file_get_contents($filename . '.twig');

    $deTwigfy = preg_replace('/\{\{\s*\(\s*([^|\s]+)\s*\/\s*([^|\s]+)\s*\)\|round\s*\}\}/', '<?= $this->e(round($1 / $$2)) ?>', $deTwigfy);

    // Replace {% if x and x|batch(items)|length > x %}
    $deTwigfy = preg_replace('/\{%\s*if\s+(\w+)\s+and\s+(\w+)\|batch\((\w+)\)\|length\s*>\s*1\s*%\}/', '<?php if (!empty($$1) && count(array_chunk($$2, $$3)) > 1): ?>', $deTwigfy);

    $deTwigfy = preg_replace('/if \(\$([a-zA-Z_][a-zA-Z0-9_]*)\.([a-zA-Z_][a-zA-Z0-9_]*)\):/', 'if ($$1[\'$2\']):', $deTwigfy);
    $deTwigfy = preg_replace('/\$([a-zA-Z_][a-zA-Z0-9_]*)\.([a-zA-Z_][a-zA-Z0-9_]*)/', '$$1[\'$2\']', $deTwigfy);
    $deTwigfy = preg_replace('/\{%\s*if\s*([^\s]+)\s*or\s*([^\s]+)\s*%\}/', '<?php if ($1 || $2): ?>', $deTwigfy);
    $deTwigfy = preg_replace('/\{%\s*elseif\s*([^\s]+)\.([^\s]+)\s*and\s*([^\s]+)\.([^\s]+)\s*==\s*([^\s]+)\s*%\}/', '<?php elseif ($1[\'$2\'] && $3[\'$4\'] == $5): ?>', $deTwigfy);

    $deTwigfy = preg_replace('/\{%\s*for\s*([^\s]+)\s*in\s*([^\s]+)\.([^\s]+)\s*%\}/', '<?php foreach ($2[\'$3\'] as $1): ?>', $deTwigfy);
    $deTwigfy = preg_replace('/\{%\s*elseif\s*([^%]+)\s*%\}/', '<?php elseif ($1): ?>', $deTwigfy);

    // Replace {% if ... %}
    $deTwigfy = preg_replace('/\{%\s*if\s+([^\s]+)\s*%\}/', '<?php if ($$1): ?>', $deTwigfy);
    $deTwigfy = preg_replace('/\{%\s*if\s+(\w+)\s*==\s*0\s*%\}/', '<?php if ($$1 == 0): ?>', $deTwigfy);

    // Replace {% if not ... %}
    $deTwigfy = preg_replace('/\{%\s*if\s+not\s+([^\s]+)\s*%\}/', '<?php if (!$$1): ?>', $deTwigfy);

    // Replace {% else %}
    $deTwigfy = preg_replace('/\{%\s*else\s*%\}/', '<?php else: ?>', $deTwigfy);

    // Replace {% endif %}
    $deTwigfy = preg_replace('/\{%\s*endif\s*%\}/', '<?php endif; ?>', $deTwigfy);

    // Replace {% for ... %}
    $deTwigfy = preg_replace('/\{%\s*for\s+(\w+)\s+in\s+(\w+)\s*%\}/', '<?php foreach ($$2 as $$1): ?>', $deTwigfy);

    // Replace {% endfor %}
    $deTwigfy = preg_replace('/\{%\s*endfor\s*%\}/', '<?php endforeach; ?>', $deTwigfy);

    // Replace {{ variable|json }}
    $deTwigfy = preg_replace('/{{\s*([^|}]+)\s*\|\s*json\s*}}/', '<?= json_encode($1) ?>', $deTwigfy);

    // Replace {{ variable|js }}
    $deTwigfy = preg_replace('/{{\s*([^|}]+)\s*\|\s*js\s*}}/', '<?= json_encode($1, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>', $deTwigfy);

    // Replace {% set ... %}
    $deTwigfy = preg_replace('/\{%\s*set\s+(\w+)\s*=\s*(.+?)\s*%\}/', '<?php $$1 = $$2; ?>', $deTwigfy);

    // Replace {% for ... in ...|batch(...) %}
    $deTwigfy = preg_replace('/\{%\s*for\s+(\w+)\s+in\s+(\w+)\s*\|\s*batch\((\w+)\)\s*%\}/', '<?php foreach (array_chunk($$2, $$3) as $$1): ?>', $deTwigfy);

    $deTwigfy = preg_replace('/{{\s*([^}]+)\s*}}/', '<?= $this->e($$1) ?>', $deTwigfy);
    $deTwigfy = preg_replace('/\$this->e\((\$\w+)\.(\w+)\s*\)/', '$this->e($1[\'$2\'])', $deTwigfy);

    $deTwigfy = preg_replace('/<\?=\s+\$this->e\((\$[\w]+)\s*\|\s*escape\(\'js\'\)\s*\)\s+\?>/', '<?= $this->e($this->escapeJs($1)) ?>', $deTwigfy);

    $deTwigfy = preg_replace('/\{%\s*if\s*(.*?)\s*==\s*(.*?)\s*%\}/', '<?php if ($$1 == $$2): ?>', $deTwigfy);

    $deTwigfy = preg_replace('/\$([0-9]+)/', '$1', $deTwigfy);
    $deTwigfy = preg_replace('/<\?php\s+if\s+\((\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*(?:\[[\'a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\])*)\.([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*==\s*([^\s\)]+)\)\s*:\s*\?>/s', "<?php if (\$1['$2'] == $$3): ?>", $deTwigfy);

    $deTwigfy = preg_replace('/<\?php\s+if\s+\(([^;]+)\s+\|\|\s+([^;]+)\):\s*\?>/s', '<?php if ($$1 || $$2): ?>', $deTwigfy);

    //rebuild known blocks that do not need html escaping

    $deTwigfy = str_replace('$this->e($header )', ' $header   ', $deTwigfy);
    $deTwigfy = str_replace('$this->e($column_left )', ' $column_left ', $deTwigfy);
    $deTwigfy = str_replace('$this->e($content_top )', ' $content_top ', $deTwigfy);

    $deTwigfy = str_replace('$this->e($breadcrumb)', ' $breadcrumb ', $deTwigfy);

    $deTwigfy = str_replace('$this->e($content_bottom )', ' $content_bottom ', $deTwigfy);
    $deTwigfy = str_replace('$this->e($column_right )', ' $column_right ', $deTwigfy);
    $deTwigfy = str_replace('$this->e($footer )', ' $footer ', $deTwigfy);

    //artifacts - corrections
    $deTwigfy = preg_replace('/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\.([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', '$1[\'$2\']', $deTwigfy);

    $deTwigfy = str_replace("$$'", "'", $deTwigfy);
    $deTwigfy = str_replace("$'", "'", $deTwigfy);
    $deTwigfy = str_replace("$$", "$", $deTwigfy);

    //foreach x as x
    $deTwigfy = preg_replace('/foreach\s*\(\s*(\w+)\s*\[\s*(\'[^\']+\')\s*\]\s*as\s*(\w+)\s*\)/', 'foreach ($$1[$2] as $$3)', $deTwigfy);
    file_put_contents($filename . '.php', $deTwigfy, LOCK_EX);

    return $filename;
}

?>