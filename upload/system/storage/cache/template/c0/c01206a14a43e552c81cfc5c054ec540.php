<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* cp-akis/view/template/design/banner_form.twig */
class __TwigTemplate_8b5f8abbcc668749c0c23cf3457387fe extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-banner\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
         <input type=\"hidden\" id=\"input-directory\" value=\"banners\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 19
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-banner\" action=\"";
        // line 21
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3 required\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 23
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 25
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
              <div id=\"error-name\" class=\"invalid-feedback\"></div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 30
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 33
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo "/>
              </div>
            </div>
          </div>
          <br/>
          <ul class=\"nav nav-tabs\">
            ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 40
            echo "              <li class=\"nav-item\"><a href=\"#language-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 40);
            echo "\" data-bs-toggle=\"tab\" class=\"nav-link";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 40)) {
                echo " active";
            }
            echo "\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 40);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 40);
            echo "\"/> ";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 40);
            echo "</a></li>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "          </ul>
          <div class=\"tab-content\">
            ";
        // line 44
        $context["image_row"] = 0;
        // line 45
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 46
            echo "              <div id=\"language-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 46);
            echo "\" class=\"tab-pane";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 46)) {
                echo " active";
            }
            echo "\">
                <table id=\"image-";
            // line 47
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 47);
            echo "\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start required\">";
            // line 50
            echo ($context["entry_title"] ?? null);
            echo "</td>
                      <td class=\"text-start\">";
            // line 51
            echo ($context["entry_link"] ?? null);
            echo "</td>
                      <td class=\"text-center\">";
            // line 52
            echo ($context["entry_image"] ?? null);
            echo "</td>
                      <td class=\"text-end\">";
            // line 53
            echo ($context["entry_sort_order"] ?? null);
            echo "</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
            // line 58
            if ((($__internal_compile_0 = ($context["banner_images"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 58)] ?? null) : null)) {
                // line 59
                echo "                      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_compile_1 = ($context["banner_images"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 59)] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["banner_image"]) {
                    // line 60
                    echo "
                        <tr id=\"image-row-";
                    // line 61
                    echo ($context["image_row"] ?? null);
                    echo "\">

                          <td class=\"text-start\">
                            <input type=\"text\" name=\"banner_image[";
                    // line 64
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 64);
                    echo "][";
                    echo ($context["image_row"] ?? null);
                    echo "][title]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner_image"], "title", [], "any", false, false, false, 64);
                    echo "\" placeholder=\"";
                    echo ($context["entry_title"] ?? null);
                    echo "\" id=\"input-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 64);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-title\" class=\"form-control\"/>
                            <div id=\"error-image-";
                    // line 65
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 65);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-title\" class=\"invalid-feedback\"></div>
                         

                                
                            <input placeholder=\"";
                    // line 69
                    echo ($context["entry_description"] ?? null);
                    echo "\" type=\"text\" name=\"banner_image[";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 69);
                    echo "][";
                    echo ($context["image_row"] ?? null);
                    echo "][description]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner_image"], "description", [], "any", false, false, false, 69);
                    echo "\" placeholder=\"";
                    echo ($context["entry_description"] ?? null);
                    echo "\" id=\"input-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 69);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-title\" class=\"form-control\"/>
                            <div id=\"error-image-";
                    // line 70
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 70);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-description\" class=\"invalid-feedback\"></div>
                      
  </td>


                          <td class=\"text-start\" style=\"width: 20%;\"><input type=\"text\" name=\"banner_image[";
                    // line 75
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 75);
                    echo "][";
                    echo ($context["image_row"] ?? null);
                    echo "][link]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner_image"], "link", [], "any", false, false, false, 75);
                    echo "\" placeholder=\"";
                    echo ($context["entry_link"] ?? null);
                    echo "\" id=\"input-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 75);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-link\" class=\"form-control\"/></td>
                          <td class=\"text-center\">
                            <div class=\"border rounded d-block\" style=\"max-width: 200px;\">
                              <img src=\"";
                    // line 78
                    echo twig_get_attribute($this->env, $this->source, $context["banner_image"], "thumb", [], "any", false, false, false, 78);
                    echo "\" alt=\"\" title=\"\" id=\"thumb-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 78);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "\" data-oc-placeholder=\"";
                    echo ($context["placeholder"] ?? null);
                    echo "\" class=\"img-fluid\">
                              <input type=\"hidden\" name=\"banner_image[";
                    // line 79
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 79);
                    echo "][";
                    echo ($context["image_row"] ?? null);
                    echo "][image]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner_image"], "image", [], "any", false, false, false, 79);
                    echo "\" id=\"input-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 79);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-image\"/>
                              <div class=\"d-grid\">
                                <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-";
                    // line 81
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 81);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-image\" data-oc-thumb=\"#thumb-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 81);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> ";
                    echo ($context["button_edit"] ?? null);
                    echo "</button>
                                <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image-";
                    // line 82
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 82);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-image\" data-oc-thumb=\"#thumb-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 82);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> ";
                    echo ($context["button_clear"] ?? null);
                    echo "</button>
                              </div>
                            </div>
                          </td>
                          <td class=\"text-end\" style=\"width: 10%;\"><input type=\"text\" name=\"banner_image[";
                    // line 86
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 86);
                    echo "][";
                    echo ($context["image_row"] ?? null);
                    echo "][sort_order]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner_image"], "sort_order", [], "any", false, false, false, 86);
                    echo "\" placeholder=\"";
                    echo ($context["entry_sort_order"] ?? null);
                    echo "\" id=\"input-image-";
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 86);
                    echo "-";
                    echo ($context["image_row"] ?? null);
                    echo "-sort-order\" class=\"form-control\"/></td>
                          <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#image-row-";
                    // line 87
                    echo ($context["image_row"] ?? null);
                    echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
                    echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                        </tr>
                        ";
                    // line 89
                    $context["image_row"] = (($context["image_row"] ?? null) + 1);
                    // line 90
                    echo "                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner_image'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 91
                echo "                    ";
            }
            // line 92
            echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"4\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-banner-";
            // line 96
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 96);
            echo "\" data-language=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 96);
            echo "\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_banner_add"] ?? null);
            echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "          </div>
          <input type=\"hidden\" name=\"banner_id\" value=\"";
        // line 103
        echo ($context["banner_id"] ?? null);
        echo "\" id=\"input-banner-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
var image_row = ";
        // line 110
        echo ($context["image_row"] ?? null);
        echo ";

\$('button[id^=\\'button-banner\\']').on('click', function() {
    var element = this;

    html = '<tr id=\"image-row-' + image_row + '\">';
    html += '  <td class=\"text-start\">';
    html += '    <input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][title]\" value=\"\" placeholder=\"";
        // line 117
        echo twig_escape_filter($this->env, ($context["entry_title"] ?? null), "js");
        echo "\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-title\" class=\"form-control\"/>';
    html += '    <input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][description]\" value=\"\" placeholder=\"";
        // line 118
        echo twig_escape_filter($this->env, ($context["entry_description"] ?? null), "js");
        echo "\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-title\" class=\"form-control\"/>';
    html += '    <div id=\"error-image-' + \$(element).attr('data-language') + '-' + image_row + '-title\" class=\"invalid-feedback\"></div>';
    html += '  </td>';
    html += '  <td class=\"text-start\"><input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][link]\" value=\"\" placeholder=\"";
        // line 121
        echo twig_escape_filter($this->env, ($context["entry_link"] ?? null), "js");
        echo "\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-link\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-center\">';
    html += '    <div class=\"border rounded d-block\" style=\"max-width: 300px;\">';
    html += '      <img src=\"";
        // line 124
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "js");
        echo "\" alt=\"\" title=\"\" id=\"thumb-image-' + \$(element).attr('data-language') + '-' + image_row + '\" data-oc-placeholder=\"";
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "js");
        echo "\" class=\"img-fluid\">';
    html += '      <input type=\"hidden\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][image]\" value=\"\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-image\"/>';
    html += '      <div class=\"d-grid\">';
    html += '        <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-' + \$(element).attr('data-language') + '-' + image_row + '-image\" data-oc-thumb=\"#thumb-image-' + \$(element).attr('data-language') + '-' + image_row + '\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 127
        echo twig_escape_filter($this->env, ($context["button_edit"] ?? null), "js");
        echo "</button>';
    html += '        <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image-' + \$(element).attr('data-language') + '-' + image_row + '-image\" data-oc-thumb=\"#thumb-image-' + \$(element).attr('data-language') + '-' + image_row + '\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 128
        echo twig_escape_filter($this->env, ($context["button_clear"] ?? null), "js");
        echo "</button>';
    html += '      </div>';
    html += '    </div>';
    html += '  </td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][sort_order]\" value=\"\" placeholder=\"";
        // line 132
        echo twig_escape_filter($this->env, ($context["entry_sort_order"] ?? null), "js");
        echo "\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-sort-order\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#image-row-' + image_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 133
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#image-' + \$(element).attr('data-language') + ' tbody').append(html);

    image_row++;
});
//--></script>
";
        // line 141
        echo ($context["footer"] ?? null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/template/design/banner_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  495 => 141,  484 => 133,  480 => 132,  473 => 128,  469 => 127,  461 => 124,  455 => 121,  449 => 118,  445 => 117,  435 => 110,  425 => 103,  422 => 102,  398 => 96,  392 => 92,  389 => 91,  383 => 90,  381 => 89,  374 => 87,  360 => 86,  345 => 82,  333 => 81,  320 => 79,  310 => 78,  294 => 75,  284 => 70,  268 => 69,  259 => 65,  245 => 64,  239 => 61,  236 => 60,  231 => 59,  229 => 58,  221 => 53,  217 => 52,  213 => 51,  209 => 50,  203 => 47,  194 => 46,  176 => 45,  174 => 44,  170 => 42,  143 => 40,  126 => 39,  115 => 33,  109 => 30,  99 => 25,  94 => 23,  89 => 21,  84 => 19,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-banner\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
         <input type=\"hidden\" id=\"input-directory\" value=\"banners\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-banner\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3 required\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"{{ name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name\" class=\"form-control\"/>
              <div id=\"error-name\" class=\"invalid-feedback\"></div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if status %} checked{% endif %}/>
              </div>
            </div>
          </div>
          <br/>
          <ul class=\"nav nav-tabs\">
            {% for language in languages %}
              <li class=\"nav-item\"><a href=\"#language-{{ language.language_id }}\" data-bs-toggle=\"tab\" class=\"nav-link{% if loop.first %} active{% endif %}\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/> {{ language.name }}</a></li>
            {% endfor %}
          </ul>
          <div class=\"tab-content\">
            {% set image_row = 0 %}
            {% for language in languages %}
              <div id=\"language-{{ language.language_id }}\" class=\"tab-pane{% if loop.first %} active{% endif %}\">
                <table id=\"image-{{ language.language_id }}\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start required\">{{ entry_title }}</td>
                      <td class=\"text-start\">{{ entry_link }}</td>
                      <td class=\"text-center\">{{ entry_image }}</td>
                      <td class=\"text-end\">{{ entry_sort_order }}</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    {% if banner_images[language.language_id] %}
                      {% for banner_image in banner_images[language.language_id] %}

                        <tr id=\"image-row-{{ image_row }}\">

                          <td class=\"text-start\">
                            <input type=\"text\" name=\"banner_image[{{ language.language_id }}][{{ image_row }}][title]\" value=\"{{ banner_image.title }}\" placeholder=\"{{ entry_title }}\" id=\"input-image-{{ language.language_id }}-{{ image_row }}-title\" class=\"form-control\"/>
                            <div id=\"error-image-{{ language.language_id }}-{{ image_row }}-title\" class=\"invalid-feedback\"></div>
                         

                                
                            <input placeholder=\"{{entry_description}}\" type=\"text\" name=\"banner_image[{{ language.language_id }}][{{ image_row }}][description]\" value=\"{{ banner_image.description }}\" placeholder=\"{{ entry_description }}\" id=\"input-image-{{ language.language_id }}-{{ image_row }}-title\" class=\"form-control\"/>
                            <div id=\"error-image-{{ language.language_id }}-{{ image_row }}-description\" class=\"invalid-feedback\"></div>
                      
  </td>


                          <td class=\"text-start\" style=\"width: 20%;\"><input type=\"text\" name=\"banner_image[{{ language.language_id }}][{{ image_row }}][link]\" value=\"{{ banner_image.link }}\" placeholder=\"{{ entry_link }}\" id=\"input-image-{{ language.language_id }}-{{ image_row }}-link\" class=\"form-control\"/></td>
                          <td class=\"text-center\">
                            <div class=\"border rounded d-block\" style=\"max-width: 200px;\">
                              <img src=\"{{ banner_image.thumb }}\" alt=\"\" title=\"\" id=\"thumb-image-{{ language.language_id }}-{{ image_row }}\" data-oc-placeholder=\"{{ placeholder }}\" class=\"img-fluid\">
                              <input type=\"hidden\" name=\"banner_image[{{ language.language_id }}][{{ image_row }}][image]\" value=\"{{ banner_image.image }}\" id=\"input-image-{{ language.language_id }}-{{ image_row }}-image\"/>
                              <div class=\"d-grid\">
                                <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-{{ language.language_id }}-{{ image_row }}-image\" data-oc-thumb=\"#thumb-image-{{ language.language_id }}-{{ image_row }}\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                                <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image-{{ language.language_id }}-{{ image_row }}-image\" data-oc-thumb=\"#thumb-image-{{ language.language_id }}-{{ image_row }}\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>
                              </div>
                            </div>
                          </td>
                          <td class=\"text-end\" style=\"width: 10%;\"><input type=\"text\" name=\"banner_image[{{ language.language_id }}][{{ image_row }}][sort_order]\" value=\"{{ banner_image.sort_order }}\" placeholder=\"{{ entry_sort_order }}\" id=\"input-image-{{ language.language_id }}-{{ image_row }}-sort-order\" class=\"form-control\"/></td>
                          <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#image-row-{{ image_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                        </tr>
                        {% set image_row = image_row + 1 %}
                      {% endfor %}
                    {% endif %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"4\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-banner-{{ language.language_id }}\" data-language=\"{{ language.language_id }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_banner_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            {% endfor %}
          </div>
          <input type=\"hidden\" name=\"banner_id\" value=\"{{ banner_id }}\" id=\"input-banner-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
var image_row = {{ image_row }};

\$('button[id^=\\'button-banner\\']').on('click', function() {
    var element = this;

    html = '<tr id=\"image-row-' + image_row + '\">';
    html += '  <td class=\"text-start\">';
    html += '    <input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][title]\" value=\"\" placeholder=\"{{ entry_title|escape('js') }}\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-title\" class=\"form-control\"/>';
    html += '    <input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][description]\" value=\"\" placeholder=\"{{ entry_description|escape('js') }}\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-title\" class=\"form-control\"/>';
    html += '    <div id=\"error-image-' + \$(element).attr('data-language') + '-' + image_row + '-title\" class=\"invalid-feedback\"></div>';
    html += '  </td>';
    html += '  <td class=\"text-start\"><input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][link]\" value=\"\" placeholder=\"{{ entry_link|escape('js') }}\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-link\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-center\">';
    html += '    <div class=\"border rounded d-block\" style=\"max-width: 300px;\">';
    html += '      <img src=\"{{ placeholder|escape('js') }}\" alt=\"\" title=\"\" id=\"thumb-image-' + \$(element).attr('data-language') + '-' + image_row + '\" data-oc-placeholder=\"{{ placeholder|escape('js') }}\" class=\"img-fluid\">';
    html += '      <input type=\"hidden\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][image]\" value=\"\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-image\"/>';
    html += '      <div class=\"d-grid\">';
    html += '        <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-' + \$(element).attr('data-language') + '-' + image_row + '-image\" data-oc-thumb=\"#thumb-image-' + \$(element).attr('data-language') + '-' + image_row + '\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit|escape('js') }}</button>';
    html += '        <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image-' + \$(element).attr('data-language') + '-' + image_row + '-image\" data-oc-thumb=\"#thumb-image-' + \$(element).attr('data-language') + '-' + image_row + '\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear|escape('js') }}</button>';
    html += '      </div>';
    html += '    </div>';
    html += '  </td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"banner_image[' + \$(element).attr('data-language') + '][' + image_row + '][sort_order]\" value=\"\" placeholder=\"{{ entry_sort_order|escape('js') }}\" id=\"input-image-' + \$(element).attr('data-language') + '-' + image_row + '-sort-order\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#image-row-' + image_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#image-' + \$(element).attr('data-language') + ' tbody').append(html);

    image_row++;
});
//--></script>
{{ footer }} ", "cp-akis/view/template/design/banner_form.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/template/design/banner_form.twig");
    }
}
