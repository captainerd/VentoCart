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

/* cp-akis/view//plates/catalog/category_form.twig */
class __TwigTemplate_6d03d85f5d822cd2f79af024fc32415d extends Template
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
      <div class=\"float-end\"><button type=\"submit\" form=\"form-category\" data-bs-toggle=\"tooltip\" title=\"";
        // line 5
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 6
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
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
         <input type=\"hidden\" id=\"input-directory\" value=\"categories\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 19
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-category\" action=\"";
        // line 21
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 23
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 24
        echo ($context["tab_data"] ?? null);
        echo "</a></li>
     
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 26
        echo ($context["tab_design"] ?? null);
        echo "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <ul class=\"nav nav-tabs\">
                ";
        // line 31
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
            // line 32
            echo "                  <li class=\"nav-item\"><a href=\"#language-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 32);
            echo "\" data-bs-toggle=\"tab\" class=\"nav-link";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 32)) {
                echo " active";
            }
            echo "\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 32);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 32);
            echo "\"/> ";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 32);
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
        // line 34
        echo "              </ul>
              <div class=\"tab-content\">
                ";
        // line 36
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
            // line 37
            echo "                  <div id=\"language-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 37);
            echo "\" class=\"tab-pane";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 37)) {
                echo " active";
            }
            echo "\">
                    <div class=\"row mb-3 required\">
                      <label for=\"input-name-";
            // line 39
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 39);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_name"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"category_description[";
            // line 41
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 41);
            echo "][name]\" value=\"";
            echo (((($__internal_compile_0 = ($context["category_description"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 41)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = ($context["category_description"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 41)] ?? null) : null), "name", [], "any", false, false, false, 41)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_name"] ?? null);
            echo "\" id=\"input-name-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 41);
            echo "\" class=\"form-control\"/>
                        <div id=\"error-name-";
            // line 42
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 42);
            echo "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-description-";
            // line 46
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 46);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_description"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"category_description[";
            // line 48
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 48);
            echo "][description]\" placeholder=\"";
            echo ($context["entry_description"] ?? null);
            echo "\" id=\"input-description-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 48);
            echo "\" data-oc-toggle=\"ckeditor\" data-lang=\"";
            echo ($context["ckeditor"] ?? null);
            echo "\" class=\"form-control\">";
            echo (((($__internal_compile_2 = ($context["category_description"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 48)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_3 = ($context["category_description"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 48)] ?? null) : null), "description", [], "any", false, false, false, 48)) : (""));
            echo "</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3 required\">
                      <label for=\"input-meta-title-";
            // line 52
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 52);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_meta_title"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"category_description[";
            // line 54
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54);
            echo "][meta_title]\" value=\"";
            echo (((($__internal_compile_4 = ($context["category_description"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_5 = ($context["category_description"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54)] ?? null) : null), "meta_title", [], "any", false, false, false, 54)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_meta_title"] ?? null);
            echo "\" id=\"input-meta-title-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54);
            echo "\" class=\"form-control\"/>
                        <div id=\"error-meta-title-";
            // line 55
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 55);
            echo "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-description-";
            // line 59
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 59);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_meta_description"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"category_description[";
            // line 61
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 61);
            echo "][meta_description]\" rows=\"5\" placeholder=\"";
            echo ($context["entry_meta_description"] ?? null);
            echo "\" id=\"input-meta-description-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 61);
            echo "\" class=\"form-control\">";
            echo (((($__internal_compile_6 = ($context["category_description"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 61)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_7 = ($context["category_description"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 61)] ?? null) : null), "meta_description", [], "any", false, false, false, 61)) : (""));
            echo "</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-keyword-";
            // line 65
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 65);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_meta_keyword"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"category_description[";
            // line 67
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 67);
            echo "][meta_keyword]\" rows=\"5\" placeholder=\"";
            echo ($context["entry_meta_keyword"] ?? null);
            echo "\" id=\"input-meta-keyword-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 67);
            echo "\" class=\"form-control\">";
            echo (((($__internal_compile_8 = ($context["category_description"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 67)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_9 = ($context["category_description"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 67)] ?? null) : null), "meta_keyword", [], "any", false, false, false, 67)) : (""));
            echo "</textarea>
                      </div>
                    </div>
                    <div class=\"col-sm-10\">
         
                      <table class=\"table table-bordered table-hover\">
                        <thead>
                          <tr>
                            <td class=\"text-start\">";
            // line 75
            echo ($context["entry_store"] ?? null);
            echo "</td>
                            <td class=\"text-start\">";
            // line 76
            echo ($context["entry_keyword"] ?? null);
            echo "</td>
                          </tr>
                        </thead>
                        <tbody>
                          ";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                // line 81
                echo "                            <tr>
                              <td class=\"text-start\">";
                // line 82
                echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 82);
                echo "</td>
                              <td class=\"text-start\">
                               
                                  <div class=\"input-group\">
                                    <div class=\"input-group-text\"><img src=\"";
                // line 86
                echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 86);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 86);
                echo "\" /></div>
                                    <input type=\"text\" name=\"category_seo_url[";
                // line 87
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 87);
                echo "][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 87);
                echo "]\" value=\"";
                if ((($__internal_compile_10 = (($__internal_compile_11 = ($context["category_seo_url"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 87)] ?? null) : null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 87)] ?? null) : null)) {
                    echo (($__internal_compile_12 = (($__internal_compile_13 = ($context["category_seo_url"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 87)] ?? null) : null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 87)] ?? null) : null);
                }
                echo "\" placeholder=\"";
                echo ($context["entry_keyword"] ?? null);
                echo "\" id=\"input-keyword-";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 87);
                echo "-";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 87);
                echo "\" class=\"form-control seoinput\" />
                                  </div>
                                  <div id=\"error-keyword-";
                // line 89
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 89);
                echo "-";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 89);
                echo "\" class=\"invalid-feedback\"></div>
                              
                              </td>
                            </tr>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "                        </tbody>
                      </table>
                    </div>

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
        // line 100
        echo "              </div>
            </div>
            <div id=\"tab-data\" class=\"tab-pane\">

 
              <div class=\"row mb-3\">
                <label for=\"input-parent\" class=\"col-sm-2 col-form-label\">";
        // line 106
        echo ($context["entry_parent"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"path\" value=\"";
        // line 108
        echo ($context["path"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_parent"] ?? null);
        echo "\" id=\"input-parent\" data-oc-target=\"autocomplete-parent\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-parent\" class=\"dropdown-menu\"></ul>
                  <input type=\"hidden\" name=\"parent_id\" value=\"";
        // line 110
        echo ($context["parent_id"] ?? null);
        echo "\" id=\"input-parent-id\"/>
                  <div class=\"form-text\">";
        // line 111
        echo ($context["help_parent"] ?? null);
        echo "</div>
                  <div id=\"error-parent\" class=\"invalid-feedback\"></div>
                </div>
              </div>
   

 <div class=\"row mb-3\">
  <div class=\"col-sm-2\">
     
  </div>
 
</div>










<div class=\"row mb-3\">
  <label class=\"col-sm-2 col-form-label\">";
        // line 134
        echo ($context["entry_option_filter"] ?? null);
        echo "</label>
  <div class=\"col-sm-10\">
    <input type=\"text\" name=\"option_filter\" value=\"\" placeholder=\"";
        // line 136
        echo ($context["entry_option_filter"] ?? null);
        echo "\" id=\"input-option-filter\" data-oc-target=\"autocomplete-option-filter\" class=\"form-control\" autocomplete=\"off\"/>
    <ul id=\"autocomplete-option-filter\" class=\"dropdown-menu\"></ul>
    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
      <table id=\"category-option-filter\" class=\"table table-sm m-0\">
        <tbody>
          ";
        // line 141
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["category_option_filters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category_option_filter"]) {
            // line 142
            echo "            <tr id=\"category-filter-";
            echo twig_get_attribute($this->env, $this->source, ($context["category_filter"] ?? null), "option_id", [], "any", false, false, false, 142);
            echo "\">
              <td>";
            // line 143
            echo twig_get_attribute($this->env, $this->source, $context["category_option_filter"], "name", [], "any", false, false, false, 143);
            echo "<input type=\"hidden\" name=\"category_option_filter[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category_option_filter"], "option_id", [], "any", false, false, false, 143);
            echo "\"/></td>
              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_option_filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        echo "        </tbody>
      </table>
    </div>
    <div class=\"form-text\">";
        // line 150
        echo ($context["help_filter"] ?? null);
        echo "</div>
  </div>
</div>





<div class=\"row mb-3\">
  <label class=\"col-sm-2 col-form-label\">";
        // line 159
        echo ($context["entry_attribute_filter"] ?? null);
        echo "</label>
  <div class=\"col-sm-10\">
    <input type=\"text\" name=\"attribute_filter\" value=\"\" placeholder=\"";
        // line 161
        echo ($context["entry_attribute_filter"] ?? null);
        echo "\" id=\"input-attribute-filter\" data-oc-target=\"autocomplete-attribute-filter\" class=\"form-control\" autocomplete=\"off\"/>
    <ul id=\"autocomplete-attribute-filter\" class=\"dropdown-menu\"></ul>
    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
      <table id=\"category-attribute-filter\" class=\"table table-sm m-0\">
        <tbody>
          ";
        // line 166
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["category_attribute_filters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category_attribute_filter"]) {
            // line 167
            echo "            <tr id=\"category-filter-";
            echo twig_get_attribute($this->env, $this->source, $context["category_attribute_filter"], "attribute_id", [], "any", false, false, false, 167);
            echo "\">
              <td>";
            // line 168
            echo twig_get_attribute($this->env, $this->source, $context["category_attribute_filter"], "name", [], "any", false, false, false, 168);
            echo "<input type=\"hidden\" name=\"category_attribute_filter[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category_attribute_filter"], "attribute_id", [], "any", false, false, false, 168);
            echo "\"/></td>
              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_attribute_filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 172
        echo "        </tbody>
      </table>
    </div>
    <div class=\"form-text\">";
        // line 175
        echo ($context["help_attribute_filter"] ?? null);
        echo "</div>
  </div>
</div>


<div class=\"row mb-3\">
  <label class=\"col-sm-2 col-form-label\">";
        // line 181
        echo ($context["entry_manufacturer_filter"] ?? null);
        echo "</label>
  <div class=\"col-sm-10\">
    <input type=\"text\" name=\"manufacturer_filter\" value=\"\" placeholder=\"";
        // line 183
        echo ($context["entry_manufacturer_filter"] ?? null);
        echo "\" id=\"input-manufacturer-filter\" data-oc-target=\"autocomplete-manufacturer-filter\" class=\"form-control\" autocomplete=\"off\"/>
    <ul id=\"autocomplete-manufacturer-filter\" class=\"dropdown-menu\"></ul>
    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
      <table id=\"category-manufacturer-filter\" class=\"table table-sm m-0\">
        <tbody>
          ";
        // line 188
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["category_manufacturer_filters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category_manufacturer_filter"]) {
            // line 189
            echo "            <tr id=\"category-filter-";
            echo twig_get_attribute($this->env, $this->source, $context["category_manufacturer_filter"], "manufacturer_id", [], "any", false, false, false, 189);
            echo "\">
              <td>";
            // line 190
            echo twig_get_attribute($this->env, $this->source, $context["category_manufacturer_filter"], "name", [], "any", false, false, false, 190);
            echo "<input type=\"hidden\" name=\"category_manufacturer_filter[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category_manufacturer_filter"], "manufacturer_id", [], "any", false, false, false, 190);
            echo "\"/></td>
              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_manufacturer_filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 194
        echo "        </tbody>
      </table>
    </div>
    <div class=\"form-text\">";
        // line 197
        echo ($context["help_attribute_filter"] ?? null);
        echo "</div>
  </div>
</div>





              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 206
        echo ($context["entry_filter"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"filter\" value=\"\" placeholder=\"";
        // line 208
        echo ($context["entry_filter"] ?? null);
        echo "\" id=\"input-filter\" data-oc-target=\"autocomplete-filter\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-filter\" class=\"dropdown-menu\"></ul>
                  <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                    <table id=\"category-filter\" class=\"table table-sm m-0\">
                      <tbody>
                        ";
        // line 213
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["category_filters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category_filter"]) {
            // line 214
            echo "                          <tr id=\"category-filter-";
            echo twig_get_attribute($this->env, $this->source, $context["category_filter"], "filter_id", [], "any", false, false, false, 214);
            echo "\">
                            <td>";
            // line 215
            echo twig_get_attribute($this->env, $this->source, $context["category_filter"], "name", [], "any", false, false, false, 215);
            echo "<input type=\"hidden\" name=\"category_filter[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category_filter"], "filter_id", [], "any", false, false, false, 215);
            echo "\"/></td>
                            <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                          </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 219
        echo "                      </tbody>
                    </table>
                  </div>
                  <div class=\"form-text\">";
        // line 222
        echo ($context["help_filter"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 226
        echo ($context["entry_store"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 229
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 230
            echo "                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"category_store[]\" value=\"";
            // line 231
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 231);
            echo "\" id=\"input-store-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 231);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 231), ($context["category_store"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-store-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 231);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 231);
            echo "</label>
                      </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 234
        echo "                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 238
        echo ($context["entry_image"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"card image\">
                    <img src=\"";
        // line 241
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"image\" value=\"";
        echo ($context["image"] ?? null);
        echo "\" id=\"input-image\"/>
                    <div class=\"card-body\">
                      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 243
        echo ($context["button_edit"] ?? null);
        echo "</button>
                      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 244
        echo ($context["button_clear"] ?? null);
        echo "</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-top\" class=\"col-sm-2 col-form-label\">";
        // line 250
        echo ($context["entry_top"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"top\" value=\"0\"/> <input type=\"checkbox\" name=\"top\" value=\"1\" id=\"input-top\" class=\"form-check-input\"";
        // line 253
        if (($context["top"] ?? null)) {
            echo " checked";
        }
        echo "/>
                  </div>
                  <div class=\"form-text\">";
        // line 255
        echo ($context["help_top"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-column\" class=\"col-sm-2 col-form-label\">";
        // line 259
        echo ($context["entry_column"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"column\" value=\"";
        // line 261
        echo ($context["column"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_column"] ?? null);
        echo "\" id=\"input-column\" class=\"form-control\"/>
                  <div class=\"form-text\">";
        // line 262
        echo ($context["help_column"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">";
        // line 266
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"sort_order\" value=\"";
        // line 268
        echo ($context["sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\"/>
                </div>
              </div>

              <div class=\"row mb-3\">
                <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">";
        // line 273
        echo ($context["entry_url"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"redirect_url\" value=\"";
        // line 275
        echo ($context["redirect_url"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_url"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\"/>
                  <div class=\"form-text\">";
        // line 276
        echo ($context["help_redirect"] ?? null);
        echo "</div>
                </div>
                
              </div>


              <div class=\"row mb-3\">
                <label for=\"input-status\" class=\"col-sm-2 col-form-label\">";
        // line 283
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 286
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                  </div>
                </div>
              </div>

     
 
             


            </div>
 
            <div id=\"tab-design\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 303
        echo ($context["entry_store"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 304
        echo ($context["entry_layout"] ?? null);
        echo "</td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 308
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 309
            echo "                      <tr>
                        <td class=\"text-start\">";
            // line 310
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 310);
            echo "</td>
                        <td class=\"text-start\"><select name=\"category_layout[";
            // line 311
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 311);
            echo "]\" class=\"form-select\">
                            <option value=\"\"></option>
                            ";
            // line 313
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
                // line 314
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 314);
                echo "\"";
                if (((($__internal_compile_14 = ($context["category_layout"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 314)] ?? null) : null) && ((($__internal_compile_15 = ($context["category_layout"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 314)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 314)))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 314);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 316
            echo "                          </select></td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 319
        echo "                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <input type=\"hidden\" name=\"category_id\" value=\"";
        // line 324
        echo ($context["category_id"] ?? null);
        echo "\" id=\"input-category-id\"/></form>
      </div>
    </div>
  </div>
</div>
<script ><!--
  initTinyMCE();

\$('input[name^=\"category_description[\"][name\$=\"[name]\"]').on('input', function() {
      // Get the number inside the brackets, i.e., [1], [2], etc.
      var index = \$(this).attr('name').match(/\\[(\\d+)\\]/)[1];
      
      // Get the input value and convert to meta title format
      var inputValue = \$(this).val();
      var metaTitleValue = inputValue;

      // Update the corresponding meta title field
      \$('input[name=\"category_description[' + index + '][meta_title]\"]').val(metaTitleValue);
       metaTitleValue = metaTitleValue.toLowerCase().replace(/\\s+/g, '-');
      // Check if the associated SEO URL field is empty and update it if needed
      \$('input[name\$=\"[' + index + ']\"][name^=\"category_seo_url\"]').each(function() {
      if (\$(this).val().length === 0) {
        canWriteSeo = true;
      }
      if (canWriteSeo) {
        \$(this).val(metaTitleValue);
      }
    });
    });


\$('#input-parent').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/category.autocomplete&user_token=";
        // line 358
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                json.unshift({
                    'name': '";
        // line 362
        echo ($context["text_none"] ?? null);
        echo "',
                    'category_id': '0'
                });

                response(\$.map(json, function (item) {
                    return {
                        value: item['category_id'],
                        label: item['name']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-parent').val(item['label']);
        \$('#input-parent-id').val(item['value']);
    }
});

\$('#input-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/filter.autocomplete&user_token=";
        // line 384
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['filter_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-filter').val('');

        \$('#category-filter-' + item['value']).remove();

        html = '<tr id=\"category-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-filter tbody').append(html);
    }
});


\$('#input-option-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/option.autocomplete&filter=1&user_token=";
        // line 414
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['option_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
     // console.log(item)
        \$('#input-option-filter').val('');

        \$('#category-option-filter-' + item['value']).remove();

        html = '<tr id=\"category-option-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_option_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-option-filter tbody').append(html);
    }
});

\$('#input-attribute-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/attribute.autocomplete&filter=1&user_token=";
        // line 444
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['attribute_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-attribute-filter').val('');

        \$('#category-attribute-filter-' + item['value']).remove();

        html = '<tr id=\"category-attribute-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_attribute_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-attribute-filter tbody').append(html);
    }
});
\$('#input-manufacturer-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/manufacturer.autocomplete&filter=1&user_token=";
        // line 472
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['manufacturer_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-manufacturer-filter').val('');

        \$('#category-manufacturer-filter-' + item['value']).remove();

        html = '<tr id=\"category-manufacturer-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_manufacturer_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-manufacturer-filter tbody').append(html);
    }
});



\$('#category-filter,  #category-manufacturer-filter, #category-option-filter, #category-attribute-filter').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

//--></script>
";
        // line 505
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/category_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1057 => 505,  1021 => 472,  990 => 444,  957 => 414,  924 => 384,  899 => 362,  892 => 358,  855 => 324,  848 => 319,  840 => 316,  825 => 314,  821 => 313,  816 => 311,  812 => 310,  809 => 309,  805 => 308,  798 => 304,  794 => 303,  772 => 286,  766 => 283,  756 => 276,  750 => 275,  745 => 273,  735 => 268,  730 => 266,  723 => 262,  717 => 261,  712 => 259,  705 => 255,  698 => 253,  692 => 250,  683 => 244,  679 => 243,  670 => 241,  664 => 238,  658 => 234,  639 => 231,  636 => 230,  632 => 229,  626 => 226,  619 => 222,  614 => 219,  602 => 215,  597 => 214,  593 => 213,  585 => 208,  580 => 206,  568 => 197,  563 => 194,  551 => 190,  546 => 189,  542 => 188,  534 => 183,  529 => 181,  520 => 175,  515 => 172,  503 => 168,  498 => 167,  494 => 166,  486 => 161,  481 => 159,  469 => 150,  464 => 147,  452 => 143,  447 => 142,  443 => 141,  435 => 136,  430 => 134,  404 => 111,  400 => 110,  393 => 108,  388 => 106,  380 => 100,  361 => 94,  348 => 89,  331 => 87,  325 => 86,  318 => 82,  315 => 81,  311 => 80,  304 => 76,  300 => 75,  283 => 67,  276 => 65,  263 => 61,  256 => 59,  249 => 55,  239 => 54,  232 => 52,  217 => 48,  210 => 46,  203 => 42,  193 => 41,  186 => 39,  176 => 37,  159 => 36,  155 => 34,  128 => 32,  111 => 31,  103 => 26,  98 => 24,  94 => 23,  89 => 21,  84 => 19,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  49 => 6,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\"><button type=\"submit\" form=\"form-category\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
         <input type=\"hidden\" id=\"input-directory\" value=\"categories\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-category\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_general }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_data }}</a></li>
     
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_design }}</a></li>
          </ul>
          <div class=\"tab-content\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <ul class=\"nav nav-tabs\">
                {% for language in languages %}
                  <li class=\"nav-item\"><a href=\"#language-{{ language.language_id }}\" data-bs-toggle=\"tab\" class=\"nav-link{% if loop.first %} active{% endif %}\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/> {{ language.name }}</a></li>
                {% endfor %}
              </ul>
              <div class=\"tab-content\">
                {% for language in languages %}
                  <div id=\"language-{{ language.language_id }}\" class=\"tab-pane{% if loop.first %} active{% endif %}\">
                    <div class=\"row mb-3 required\">
                      <label for=\"input-name-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"category_description[{{ language.language_id }}][name]\" value=\"{{ category_description[language.language_id] ? category_description[language.language_id].name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name-{{ language.language_id }}\" class=\"form-control\"/>
                        <div id=\"error-name-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-description-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_description }}</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"category_description[{{ language.language_id }}][description]\" placeholder=\"{{ entry_description }}\" id=\"input-description-{{ language.language_id }}\" data-oc-toggle=\"ckeditor\" data-lang=\"{{ ckeditor }}\" class=\"form-control\">{{ category_description[language.language_id] ? category_description[language.language_id].description }}</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3 required\">
                      <label for=\"input-meta-title-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_title }}</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"category_description[{{ language.language_id }}][meta_title]\" value=\"{{ category_description[language.language_id] ? category_description[language.language_id].meta_title }}\" placeholder=\"{{ entry_meta_title }}\" id=\"input-meta-title-{{ language.language_id }}\" class=\"form-control\"/>
                        <div id=\"error-meta-title-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-description-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_description }}</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"category_description[{{ language.language_id }}][meta_description]\" rows=\"5\" placeholder=\"{{ entry_meta_description }}\" id=\"input-meta-description-{{ language.language_id }}\" class=\"form-control\">{{ category_description[language.language_id] ? category_description[language.language_id].meta_description }}</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-keyword-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_keyword }}</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"category_description[{{ language.language_id }}][meta_keyword]\" rows=\"5\" placeholder=\"{{ entry_meta_keyword }}\" id=\"input-meta-keyword-{{ language.language_id }}\" class=\"form-control\">{{ category_description[language.language_id] ? category_description[language.language_id].meta_keyword }}</textarea>
                      </div>
                    </div>
                    <div class=\"col-sm-10\">
         
                      <table class=\"table table-bordered table-hover\">
                        <thead>
                          <tr>
                            <td class=\"text-start\">{{ entry_store }}</td>
                            <td class=\"text-start\">{{ entry_keyword }}</td>
                          </tr>
                        </thead>
                        <tbody>
                          {% for store in stores %}
                            <tr>
                              <td class=\"text-start\">{{ store.name }}</td>
                              <td class=\"text-start\">
                               
                                  <div class=\"input-group\">
                                    <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\" /></div>
                                    <input type=\"text\" name=\"category_seo_url[{{ store.store_id }}][{{ language.language_id }}]\" value=\"{% if category_seo_url[store.store_id][language.language_id] %}{{ category_seo_url[store.store_id][language.language_id] }}{% endif %}\" placeholder=\"{{ entry_keyword }}\" id=\"input-keyword-{{ store.store_id }}-{{ language.language_id }}\" class=\"form-control seoinput\" />
                                  </div>
                                  <div id=\"error-keyword-{{ store.store_id }}-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                              
                              </td>
                            </tr>
                          {% endfor %}
                        </tbody>
                      </table>
                    </div>

                  </div>
                {% endfor %}
              </div>
            </div>
            <div id=\"tab-data\" class=\"tab-pane\">

 
              <div class=\"row mb-3\">
                <label for=\"input-parent\" class=\"col-sm-2 col-form-label\">{{ entry_parent }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"path\" value=\"{{ path }}\" placeholder=\"{{ entry_parent }}\" id=\"input-parent\" data-oc-target=\"autocomplete-parent\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-parent\" class=\"dropdown-menu\"></ul>
                  <input type=\"hidden\" name=\"parent_id\" value=\"{{ parent_id }}\" id=\"input-parent-id\"/>
                  <div class=\"form-text\">{{ help_parent }}</div>
                  <div id=\"error-parent\" class=\"invalid-feedback\"></div>
                </div>
              </div>
   

 <div class=\"row mb-3\">
  <div class=\"col-sm-2\">
     
  </div>
 
</div>










<div class=\"row mb-3\">
  <label class=\"col-sm-2 col-form-label\">{{ entry_option_filter }}</label>
  <div class=\"col-sm-10\">
    <input type=\"text\" name=\"option_filter\" value=\"\" placeholder=\"{{ entry_option_filter }}\" id=\"input-option-filter\" data-oc-target=\"autocomplete-option-filter\" class=\"form-control\" autocomplete=\"off\"/>
    <ul id=\"autocomplete-option-filter\" class=\"dropdown-menu\"></ul>
    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
      <table id=\"category-option-filter\" class=\"table table-sm m-0\">
        <tbody>
          {% for category_option_filter in category_option_filters %}
            <tr id=\"category-filter-{{ category_filter.option_id }}\">
              <td>{{ category_option_filter.name }}<input type=\"hidden\" name=\"category_option_filter[]\" value=\"{{ category_option_filter.option_id }}\"/></td>
              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
          {% endfor %}
        </tbody>
      </table>
    </div>
    <div class=\"form-text\">{{ help_filter }}</div>
  </div>
</div>





<div class=\"row mb-3\">
  <label class=\"col-sm-2 col-form-label\">{{ entry_attribute_filter }}</label>
  <div class=\"col-sm-10\">
    <input type=\"text\" name=\"attribute_filter\" value=\"\" placeholder=\"{{ entry_attribute_filter }}\" id=\"input-attribute-filter\" data-oc-target=\"autocomplete-attribute-filter\" class=\"form-control\" autocomplete=\"off\"/>
    <ul id=\"autocomplete-attribute-filter\" class=\"dropdown-menu\"></ul>
    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
      <table id=\"category-attribute-filter\" class=\"table table-sm m-0\">
        <tbody>
          {% for category_attribute_filter in category_attribute_filters %}
            <tr id=\"category-filter-{{ category_attribute_filter.attribute_id }}\">
              <td>{{ category_attribute_filter.name }}<input type=\"hidden\" name=\"category_attribute_filter[]\" value=\"{{ category_attribute_filter.attribute_id }}\"/></td>
              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
          {% endfor %}
        </tbody>
      </table>
    </div>
    <div class=\"form-text\">{{ help_attribute_filter }}</div>
  </div>
</div>


<div class=\"row mb-3\">
  <label class=\"col-sm-2 col-form-label\">{{ entry_manufacturer_filter }}</label>
  <div class=\"col-sm-10\">
    <input type=\"text\" name=\"manufacturer_filter\" value=\"\" placeholder=\"{{ entry_manufacturer_filter }}\" id=\"input-manufacturer-filter\" data-oc-target=\"autocomplete-manufacturer-filter\" class=\"form-control\" autocomplete=\"off\"/>
    <ul id=\"autocomplete-manufacturer-filter\" class=\"dropdown-menu\"></ul>
    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
      <table id=\"category-manufacturer-filter\" class=\"table table-sm m-0\">
        <tbody>
          {% for category_manufacturer_filter in category_manufacturer_filters %}
            <tr id=\"category-filter-{{ category_manufacturer_filter.manufacturer_id }}\">
              <td>{{ category_manufacturer_filter.name }}<input type=\"hidden\" name=\"category_manufacturer_filter[]\" value=\"{{ category_manufacturer_filter.manufacturer_id }}\"/></td>
              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
          {% endfor %}
        </tbody>
      </table>
    </div>
    <div class=\"form-text\">{{ help_attribute_filter }}</div>
  </div>
</div>





              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_filter }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"filter\" value=\"\" placeholder=\"{{ entry_filter }}\" id=\"input-filter\" data-oc-target=\"autocomplete-filter\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-filter\" class=\"dropdown-menu\"></ul>
                  <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                    <table id=\"category-filter\" class=\"table table-sm m-0\">
                      <tbody>
                        {% for category_filter in category_filters %}
                          <tr id=\"category-filter-{{ category_filter.filter_id }}\">
                            <td>{{ category_filter.name }}<input type=\"hidden\" name=\"category_filter[]\" value=\"{{ category_filter.filter_id }}\"/></td>
                            <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                          </tr>
                        {% endfor %}
                      </tbody>
                    </table>
                  </div>
                  <div class=\"form-text\">{{ help_filter }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_store }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for store in stores %}
                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"category_store[]\" value=\"{{ store.store_id }}\" id=\"input-store-{{ store.store_id }}\" class=\"form-check-input\"{% if store.store_id in category_store %} checked{% endif %}/> <label for=\"input-store-{{ store.store_id }}\" class=\"form-check-label\">{{ store.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_image }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"card image\">
                    <img src=\"{{ thumb }}\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"{{ placeholder }}\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"image\" value=\"{{ image }}\" id=\"input-image\"/>
                    <div class=\"card-body\">
                      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-top\" class=\"col-sm-2 col-form-label\">{{ entry_top }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"top\" value=\"0\"/> <input type=\"checkbox\" name=\"top\" value=\"1\" id=\"input-top\" class=\"form-check-input\"{% if top %} checked{% endif %}/>
                  </div>
                  <div class=\"form-text\">{{ help_top }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-column\" class=\"col-sm-2 col-form-label\">{{ entry_column }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"column\" value=\"{{ column }}\" placeholder=\"{{ entry_column }}\" id=\"input-column\" class=\"form-control\"/>
                  <div class=\"form-text\">{{ help_column }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">{{ entry_sort_order }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"sort_order\" value=\"{{ sort_order }}\" placeholder=\"{{ entry_sort_order }}\" id=\"input-sort-order\" class=\"form-control\"/>
                </div>
              </div>

              <div class=\"row mb-3\">
                <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">{{ entry_url }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"redirect_url\" value=\"{{ redirect_url }}\" placeholder=\"{{ entry_url }}\" id=\"input-sort-order\" class=\"form-control\"/>
                  <div class=\"form-text\">{{ help_redirect }}</div>
                </div>
                
              </div>


              <div class=\"row mb-3\">
                <label for=\"input-status\" class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if status %} checked{% endif %}/>
                  </div>
                </div>
              </div>

     
 
             


            </div>
 
            <div id=\"tab-design\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_store }}</td>
                      <td class=\"text-start\">{{ entry_layout }}</td>
                    </tr>
                  </thead>
                  <tbody>
                    {% for store in stores %}
                      <tr>
                        <td class=\"text-start\">{{ store.name }}</td>
                        <td class=\"text-start\"><select name=\"category_layout[{{ store.store_id }}]\" class=\"form-select\">
                            <option value=\"\"></option>
                            {% for layout in layouts %}
                              <option value=\"{{ layout.layout_id }}\"{% if category_layout[store.store_id] and category_layout[store.store_id] == layout.layout_id %} selected{% endif %}>{{ layout.name }}</option>
                            {% endfor %}
                          </select></td>
                      </tr>
                    {% endfor %}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <input type=\"hidden\" name=\"category_id\" value=\"{{ category_id }}\" id=\"input-category-id\"/></form>
      </div>
    </div>
  </div>
</div>
<script ><!--
  initTinyMCE();

\$('input[name^=\"category_description[\"][name\$=\"[name]\"]').on('input', function() {
      // Get the number inside the brackets, i.e., [1], [2], etc.
      var index = \$(this).attr('name').match(/\\[(\\d+)\\]/)[1];
      
      // Get the input value and convert to meta title format
      var inputValue = \$(this).val();
      var metaTitleValue = inputValue;

      // Update the corresponding meta title field
      \$('input[name=\"category_description[' + index + '][meta_title]\"]').val(metaTitleValue);
       metaTitleValue = metaTitleValue.toLowerCase().replace(/\\s+/g, '-');
      // Check if the associated SEO URL field is empty and update it if needed
      \$('input[name\$=\"[' + index + ']\"][name^=\"category_seo_url\"]').each(function() {
      if (\$(this).val().length === 0) {
        canWriteSeo = true;
      }
      if (canWriteSeo) {
        \$(this).val(metaTitleValue);
      }
    });
    });


\$('#input-parent').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/category.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                json.unshift({
                    'name': '{{ text_none }}',
                    'category_id': '0'
                });

                response(\$.map(json, function (item) {
                    return {
                        value: item['category_id'],
                        label: item['name']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-parent').val(item['label']);
        \$('#input-parent-id').val(item['value']);
    }
});

\$('#input-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/filter.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['filter_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-filter').val('');

        \$('#category-filter-' + item['value']).remove();

        html = '<tr id=\"category-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-filter tbody').append(html);
    }
});


\$('#input-option-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/option.autocomplete&filter=1&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['option_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
     // console.log(item)
        \$('#input-option-filter').val('');

        \$('#category-option-filter-' + item['value']).remove();

        html = '<tr id=\"category-option-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_option_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-option-filter tbody').append(html);
    }
});

\$('#input-attribute-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/attribute.autocomplete&filter=1&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['attribute_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-attribute-filter').val('');

        \$('#category-attribute-filter-' + item['value']).remove();

        html = '<tr id=\"category-attribute-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_attribute_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-attribute-filter tbody').append(html);
    }
});
\$('#input-manufacturer-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/manufacturer.autocomplete&filter=1&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['manufacturer_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-manufacturer-filter').val('');

        \$('#category-manufacturer-filter-' + item['value']).remove();

        html = '<tr id=\"category-manufacturer-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"category_manufacturer_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#category-manufacturer-filter tbody').append(html);
    }
});



\$('#category-filter,  #category-manufacturer-filter, #category-option-filter, #category-attribute-filter').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

//--></script>
{{ footer }}
", "cp-akis/view//plates/catalog/category_form.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/category_form.twig");
    }
}
