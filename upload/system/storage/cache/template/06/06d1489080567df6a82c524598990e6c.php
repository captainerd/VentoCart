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

/* admin/view/template/catalog/product_form.twig */
class __TwigTemplate_7aa397f77e66a0f6a11eb5813bd5f585 extends Template
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
        <button type=\"submit\" form=\"form-product\" data-bs-toggle=\"tooltip\" title=\"";
        // line 8
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 9
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 13
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 13);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 13);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 21
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-product\" action=\"";
        // line 23
        echo ($context["save"] ?? null);
        echo "\" method=\"post\"  >

          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 26
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 27
        echo ($context["tab_data"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-pricing\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 28
        echo ($context["tab_pricing"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-links\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 29
        echo ($context["tab_links"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-image\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 30
        echo ($context["tab_image"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-attribute\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 31
        echo ($context["tab_attribute"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-option\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 32
        echo ($context["tab_option"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-variations\" data-bs-toggle=\"tab\"  id=\"tab-variations-link\" class=\"nav-link\">";
        // line 33
        echo ($context["tab_variations"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-subscription\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 34
        echo ($context["tab_subscription"] ?? null);
        echo "</a></li>
     
    
       
            <li class=\"nav-item\"><a href=\"#tab-reward\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 38
        echo ($context["tab_reward"] ?? null);
        echo "</a></li>
  
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 40
        echo ($context["tab_design"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-report\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 41
        echo ($context["tab_report"] ?? null);
        echo "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <ul class=\"nav nav-tabs\">
                ";
        // line 46
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
            // line 47
            echo "                  <li class=\"nav-item\"><a href=\"#language-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 47);
            echo "\" data-bs-toggle=\"tab\" class=\"nav-link";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 47)) {
                echo " active";
            }
            echo "\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 47);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 47);
            echo "\"/> ";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 47);
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
        // line 49
        echo "              </ul>
              <div class=\"tab-content\">
                ";
        // line 51
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
            // line 52
            echo "                  <div id=\"language-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 52);
            echo "\" class=\"tab-pane";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 52)) {
                echo " active";
            }
            echo "\">
                    <div class=\"row mb-3 required\">
                      <label for=\"input-name-";
            // line 54
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_name"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"product_description[";
            // line 57
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57);
            echo "][name]\" value=\"";
            echo (((($__internal_compile_0 = ($context["product_description"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = ($context["product_description"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57)] ?? null) : null), "name", [], "any", false, false, false, 57)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_name"] ?? null);
            echo "\" id=\"input-name-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57);
            echo "\" class=\"form-control\"/>
                  
                        </div>
                        <div id=\"error-name-";
            // line 60
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 60);
            echo "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-description-";
            // line 64
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 64);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_description"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <div class=\"form-control h-100 p-0 border-0 rounded-0\">
                            <textarea name=\"product_description[";
            // line 68
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 68);
            echo "][description]\" placeholder=\"";
            echo ($context["entry_description"] ?? null);
            echo "\" id=\"input-description-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 68);
            echo "\" data-oc-toggle=\"ckeditor\" data-lang=\"";
            echo ($context["ckeditor"] ?? null);
            echo "\" class=\"w-100 position-relative\">";
            echo (((($__internal_compile_2 = ($context["product_description"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 68)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_3 = ($context["product_description"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 68)] ?? null) : null), "description", [], "any", false, false, false, 68)) : (""));
            echo "</textarea>
                          </div>
                     
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3 required\">
                      <label for=\"input-meta-title-";
            // line 75
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 75);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_meta_title"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"product_description[";
            // line 78
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 78);
            echo "][meta_title]\" value=\"";
            echo (((($__internal_compile_4 = ($context["product_description"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 78)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_5 = ($context["product_description"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 78)] ?? null) : null), "meta_title", [], "any", false, false, false, 78)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_meta_title"] ?? null);
            echo "\" id=\"input-meta-title-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 78);
            echo "\" class=\"form-control\"/>
                   
                        </div>
                        <div id=\"error-meta-title-";
            // line 81
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 81);
            echo "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-description-";
            // line 85
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 85);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_meta_description"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <textarea name=\"product_description[";
            // line 88
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 88);
            echo "][meta_description]\" rows=\"5\" placeholder=\"";
            echo ($context["entry_meta_description"] ?? null);
            echo "\" id=\"input-meta-description-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 88);
            echo "\" class=\"form-control\">";
            echo (((($__internal_compile_6 = ($context["product_description"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 88)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_7 = ($context["product_description"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 88)] ?? null) : null), "meta_description", [], "any", false, false, false, 88)) : (""));
            echo "</textarea>
                
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-keyword-";
            // line 94
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 94);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_meta_keyword"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <textarea name=\"product_description[";
            // line 97
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 97);
            echo "][meta_keyword]\" rows=\"5\" placeholder=\"";
            echo ($context["entry_meta_keyword"] ?? null);
            echo "\" id=\"input-meta-keyword-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 97);
            echo "\" class=\"form-control\">";
            echo (((($__internal_compile_8 = ($context["product_description"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 97)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_9 = ($context["product_description"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 97)] ?? null) : null), "meta_keyword", [], "any", false, false, false, 97)) : (""));
            echo "</textarea>
                       
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-tag-";
            // line 103
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 103);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_tag"] ?? null);
            echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"product_description[";
            // line 106
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 106);
            echo "][tag]\" value=\"";
            echo (((($__internal_compile_10 = ($context["product_description"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 106)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_11 = ($context["product_description"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 106)] ?? null) : null), "tag", [], "any", false, false, false, 106)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_tag"] ?? null);
            echo "\" id=\"input-tag-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 106);
            echo "\" class=\"form-control\"/>
                 
                        </div>
                        <div class=\"form-text\">";
            // line 109
            echo ($context["help_tag"] ?? null);
            echo "</div>
                      </div>
                    </div>

                    <div id=\"product-seo\" class=\"table-responsive\">
                      <table class=\"table table-bordered table-hover\">
                        <thead>
                          <tr>
                            <td class=\"text-start\">";
            // line 117
            echo ($context["entry_store"] ?? null);
            echo "</td>
                            <td class=\"text-start\">";
            // line 118
            echo ($context["entry_keyword"] ?? null);
            echo "</td>
                          </tr>
                        </thead>
                        <tbody>
                          ";
            // line 122
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                // line 123
                echo "                            <tr>
                              <td class=\"text-start\">";
                // line 124
                echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 124);
                echo "</td>
                              <td class=\"text-start\">
               
                                  <div class=\"input-group\">
                                    <div class=\"input-group-text\"><img src=\"";
                // line 128
                echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 128);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 128);
                echo "\"/></div>
                                    <input type=\"text\" name=\"product_seo_url[";
                // line 129
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 129);
                echo "][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 129);
                echo "]\" value=\"";
                if ((($__internal_compile_12 = (($__internal_compile_13 = ($context["product_seo_url"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 129)] ?? null) : null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 129)] ?? null) : null)) {
                    echo (($__internal_compile_14 = (($__internal_compile_15 = ($context["product_seo_url"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 129)] ?? null) : null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 129)] ?? null) : null);
                }
                echo "\" id=\"input-keyword-";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 129);
                echo "-";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 129);
                echo "\" placeholder=\"";
                echo ($context["entry_keyword"] ?? null);
                echo "\" class=\"form-control seoinput\"/>
                                  </div>
                                  <div id=\"error-keyword-";
                // line 131
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 131);
                echo "-";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 131);
                echo "\" class=\"invalid-feedback\"></div>
                      
                            </tr>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
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
        // line 143
        echo "              </div>
            </div>
            <div id=\"tab-data\" class=\"tab-pane\">
              
              <fieldset>
                <legend>";
        // line 148
        echo ($context["text_model"] ?? null);
        echo "</legend>
                <div class=\"row mb-3 required\">
                  <label for=\"input-model\" class=\"col-sm-2 col-form-label\">";
        // line 150
        echo ($context["entry_model"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"model\" value=\"";
        // line 153
        echo ($context["model"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_model"] ?? null);
        echo "\" id=\"input-model\" class=\"form-control\"/>
                
                    </div>
                    <div id=\"error-model\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-sku\" class=\"col-sm-2   col-form-label\">";
        // line 160
        echo ($context["entry_sku"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"sku\" value=\"";
        // line 163
        echo ($context["sku"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sku"] ?? null);
        echo "\" id=\"input-sku\" class=\"form-control\"/>
              
                    </div>
                    <div class=\"form-text\">";
        // line 166
        echo ($context["help_sku"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-upc\" class=\"col-sm-2 col-form-label\">";
        // line 170
        echo ($context["entry_upc"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"upc\" value=\"";
        // line 173
        echo ($context["upc"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_upc"] ?? null);
        echo "\" id=\"input-upc\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">";
        // line 176
        echo ($context["help_upc"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-ean\" class=\"col-sm-2 col-form-label\">";
        // line 180
        echo ($context["entry_ean"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"ean\" value=\"";
        // line 183
        echo ($context["ean"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_ean"] ?? null);
        echo "\" id=\"input-ean\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">";
        // line 186
        echo ($context["help_ean"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-jan\" class=\"col-sm-2 col-form-label\">";
        // line 190
        echo ($context["entry_jan"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"jan\" value=\"";
        // line 193
        echo ($context["jan"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_jan"] ?? null);
        echo "\" id=\"input-jan\" class=\"form-control\"/>
               
                    </div>
                    <div class=\"form-text\">";
        // line 196
        echo ($context["help_jan"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-isbn\" class=\"col-sm-2 col-form-label\">";
        // line 200
        echo ($context["entry_isbn"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"isbn\" value=\"";
        // line 203
        echo ($context["isbn"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_isbn"] ?? null);
        echo "\" id=\"input-isbn\" class=\"form-control\"/>
               
                    </div>
                    <div class=\"form-text\">";
        // line 206
        echo ($context["help_isbn"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mpn\" class=\"col-sm-2 col-form-label\">";
        // line 210
        echo ($context["entry_mpn"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"mpn\" value=\"";
        // line 213
        echo ($context["mpn"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mpn"] ?? null);
        echo "\" id=\"input-mpn\" class=\"form-control\"/>
              
                    </div>
                    <div class=\"form-text\">";
        // line 216
        echo ($context["help_mpn"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-location\" class=\"col-sm-2 col-form-label\">";
        // line 220
        echo ($context["entry_location"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"location\" value=\"";
        // line 223
        echo ($context["location"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_location"] ?? null);
        echo "\" id=\"input-location\" class=\"form-control\"/>
               
                    </div>
                  </div>
                </div>
              </fieldset>
             
                <legend>";
        // line 230
        echo ($context["text_stock"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-quantity\" class=\"col-sm-2 col-form-label\">";
        // line 232
        echo ($context["entry_quantity"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"quantity\" value=\"";
        // line 234
        echo ($context["quantity"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_quantity"] ?? null);
        echo "\" id=\"input-quantity\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-minimum\" class=\"col-sm-2 col-form-label\">";
        // line 238
        echo ($context["entry_minimum"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"minimum\" value=\"";
        // line 241
        echo ($context["minimum"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_minimum"] ?? null);
        echo "\" id=\"input-minimum\" class=\"form-control\"/>
                  
                    </div>
                    <div class=\"form-text\">";
        // line 244
        echo ($context["help_minimum"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 248
        echo ($context["entry_subtract"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">

                    <div class=\"input-group\">

                      <div id=\"input-subtract\" class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"subtract\" value=\"0\"/> <input type=\"checkbox\" name=\"subtract\" value=\"1\" class=\"form-check-input\"";
        // line 254
        if (($context["subtract"] ?? null)) {
            echo " checked";
        }
        echo "/>
                      </div>

                 

                    </div>

                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-stock-status\" class=\"col-sm-2 col-form-label\">";
        // line 264
        echo ($context["entry_stock_status"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"stock_status_id\" id=\"input-stock-status\" class=\"form-select\">
                        ";
        // line 268
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stock_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["stock_status"]) {
            // line 269
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["stock_status"], "stock_status_id", [], "any", false, false, false, 269);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["stock_status"], "stock_status_id", [], "any", false, false, false, 269) == ($context["stock_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["stock_status"], "name", [], "any", false, false, false, 269);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stock_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 271
        echo "                      </select>
                  
                    </div>
                    <div class=\"form-text\">";
        // line 274
        echo ($context["help_stock_status"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-date-available\" class=\"col-sm-2 col-form-label\">";
        // line 278
        echo ($context["entry_date_available"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10 col-md-4\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"date_available\" value=\"";
        // line 281
        echo ($context["date_available"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_date_available"] ?? null);
        echo "\" id=\"input-date-available\" class=\"form-control date\"/>
                      <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 289
        echo ($context["text_specification"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 291
        echo ($context["entry_shipping"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">

                      <div id=\"input-shipping\" class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"shipping\" value=\"0\"/> <input type=\"checkbox\" name=\"shipping\" value=\"1\" class=\"form-check-input\"";
        // line 296
        if (($context["shipping"] ?? null)) {
            echo " checked";
        }
        echo "/>
                      </div>

                  
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-length\" class=\"col-sm-2 col-form-label\">";
        // line 304
        echo ($context["entry_dimension"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"length\" value=\"";
        // line 307
        echo ($context["length"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_length"] ?? null);
        echo "\" id=\"input-length\" class=\"form-control\"/>
                
                      <input type=\"text\" name=\"width\" value=\"";
        // line 309
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-width\" class=\"form-control\"/>
                   
                      <input type=\"text\" name=\"height\" value=\"";
        // line 311
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-height\" class=\"form-control\"/>
                
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">";
        // line 317
        echo ($context["entry_length_class"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"length_class_id\" id=\"input-length-class\" class=\"form-select\">
                        ";
        // line 321
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["length_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["length_class"]) {
            // line 322
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 322);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 322) == ($context["length_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "title", [], "any", false, false, false, 322);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['length_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 324
        echo "                      </select>
                   
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-weight\" class=\"col-sm-2 col-form-label\">";
        // line 330
        echo ($context["entry_weight"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"weight\" value=\"";
        // line 333
        echo ($context["weight"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_weight"] ?? null);
        echo "\" id=\"input-weight\" class=\"form-control\"/>
                   
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">";
        // line 339
        echo ($context["entry_weight_class"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"weight_class_id\" id=\"input-weight-class\" class=\"form-select\">
                        ";
        // line 343
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["weight_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["weight_class"]) {
            // line 344
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 344);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 344) == ($context["weight_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "title", [], "any", false, false, false, 344);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 346
        echo "                      </select>
                  
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-status\" class=\"col-sm-2 col-form-label\">";
        // line 352
        echo ($context["entry_status"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <div class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 356
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                      </div>
               
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">";
        // line 363
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"sort_order\" value=\"";
        // line 366
        echo ($context["sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\"/>
                  
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div id=\"tab-links\" class=\"tab-pane\">
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 375
        echo ($context["entry_manufacturer"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"manufacturer\" value=\"";
        // line 378
        echo ($context["manufacturer"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_manufacturer"] ?? null);
        echo "\" id=\"input-manufacturer\" data-oc-target=\"autocomplete-manufacturer\" class=\"form-control\" autocomplete=\"off\"/>
                  
                  </div>
                  <input type=\"hidden\" name=\"manufacturer_id\" value=\"";
        // line 381
        echo ($context["manufacturer_id"] ?? null);
        echo "\" id=\"input-manufacturer-id\"/>
                  <ul id=\"autocomplete-manufacturer\" class=\"dropdown-menu\"></ul>
                  <div class=\"form-text\">";
        // line 383
        echo ($context["help_manufacturer"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 387
        echo ($context["entry_category"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"category\" value=\"\" placeholder=\"";
        // line 389
        echo ($context["entry_category"] ?? null);
        echo "\" id=\"input-category\" data-oc-target=\"autocomplete-category\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-category\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-category\" class=\"table table-sm m-0\">
                        <tbody>
                          ";
        // line 395
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_category"]) {
            // line 396
            echo "                            <tr id=\"product-category-";
            echo twig_get_attribute($this->env, $this->source, $context["product_category"], "category_id", [], "any", false, false, false, 396);
            echo "\">
                              <td>";
            // line 397
            echo twig_get_attribute($this->env, $this->source, $context["product_category"], "name", [], "any", false, false, false, 397);
            echo "<input type=\"hidden\" name=\"product_category[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_category"], "category_id", [], "any", false, false, false, 397);
            echo "\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 401
        echo "                        </tbody>
                      </table>
                    </div>
    
                  </div>
                  <div class=\"form-text\">";
        // line 406
        echo ($context["help_category"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 410
        echo ($context["entry_filter"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"filter\" value=\"\" placeholder=\"";
        // line 412
        echo ($context["entry_filter"] ?? null);
        echo "\" id=\"input-filter\" data-oc-target=\"autocomplete-filter\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-filter\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-filter\" class=\"table table-sm m-0\">
                        <tbody>
                          ";
        // line 418
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_filters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_filter"]) {
            // line 419
            echo "                            <tr id=\"product-filter-";
            echo twig_get_attribute($this->env, $this->source, $context["product_filter"], "filter_id", [], "any", false, false, false, 419);
            echo "\">
                              <td>";
            // line 420
            echo twig_get_attribute($this->env, $this->source, $context["product_filter"], "name", [], "any", false, false, false, 420);
            echo "<input type=\"hidden\" name=\"product_filter[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_filter"], "filter_id", [], "any", false, false, false, 420);
            echo "\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 424
        echo "                        </tbody>
                      </table>
                    </div>
              
                  </div>
                  <div class=\"form-text\">";
        // line 429
        echo ($context["help_filter"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 433
        echo ($context["entry_store"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"input-group\">
                    <div id=\"product-store\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                      ";
        // line 437
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 438
            echo "                        <div class=\"form-check\">
                          <input type=\"checkbox\" name=\"product_store[]\" value=\"";
            // line 439
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 439);
            echo "\" id=\"input-store-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 439);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 439), ($context["product_store"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-store-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 439);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 439);
            echo "</label>
                        </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 442
        echo "                    </div>
            
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 448
        echo ($context["entry_download"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"download\" value=\"\" placeholder=\"";
        // line 450
        echo ($context["entry_download"] ?? null);
        echo "\" id=\"input-download\" data-oc-target=\"autocomplete-download\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-download\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-download\" class=\"table table-sm m-0\">
                        <tbody>
                          ";
        // line 456
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_downloads"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_download"]) {
            // line 457
            echo "                            <tr id=\"product-download-";
            echo twig_get_attribute($this->env, $this->source, $context["product_download"], "download_id", [], "any", false, false, false, 457);
            echo "\">
                              <td>";
            // line 458
            echo twig_get_attribute($this->env, $this->source, $context["product_download"], "name", [], "any", false, false, false, 458);
            echo "<input type=\"hidden\" name=\"product_download[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_download"], "download_id", [], "any", false, false, false, 458);
            echo "\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_download'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 462
        echo "                        </tbody>
                      </table>
                    </div>
           
                  </div>
                  <div class=\"form-text\">";
        // line 467
        echo ($context["help_download"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 471
        echo ($context["entry_related"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"related\" value=\"\" placeholder=\"";
        // line 473
        echo ($context["entry_related"] ?? null);
        echo "\" id=\"input-related\" data-oc-target=\"autocomplete-related\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-related\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-related\" class=\"table table-sm m-0\">
                        <tbody>
                          ";
        // line 479
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_relateds"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_related"]) {
            // line 480
            echo "                            <tr id=\"product-related-";
            echo twig_get_attribute($this->env, $this->source, $context["product_related"], "product_id", [], "any", false, false, false, 480);
            echo "\">
                              <td>";
            // line 481
            echo twig_get_attribute($this->env, $this->source, $context["product_related"], "name", [], "any", false, false, false, 481);
            echo "<input type=\"hidden\" name=\"product_related[]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_related"], "product_id", [], "any", false, false, false, 481);
            echo "\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_related'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 485
        echo "                        </tbody>
                      </table>
                    </div>
             
                  </div>
                  <div class=\"form-text\">";
        // line 490
        echo ($context["help_related"] ?? null);
        echo "</div>
                </div>
              </div>
            </div>
            <div id=\"tab-attribute\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                
                <table id=\"product-attribute\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 500
        echo ($context["entry_attribute"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 501
        echo ($context["entry_text"] ?? null);
        echo "</td>
                      <td>
                  
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 508
        $context["attribute_row"] = 0;
        // line 509
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_attribute"]) {
            // line 510
            echo "                      <tr id=\"attribute-row-";
            echo ($context["attribute_row"] ?? null);
            echo "\">
                        <td class=\"text-start\">
                          <input type=\"text\" name=\"product_attribute[";
            // line 512
            echo ($context["attribute_row"] ?? null);
            echo "][name]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_attribute"], "name", [], "any", false, false, false, 512);
            echo "\" placeholder=\"";
            echo ($context["entry_attribute"] ?? null);
            echo "\" id=\"input-attribute-";
            echo ($context["attribute_row"] ?? null);
            echo "\" data-oc-target=\"autocomplete-attribute-";
            echo ($context["attribute_row"] ?? null);
            echo "\" class=\"form-control\" autocomplete=\"new-password\"/>
                          <input type=\"hidden\" name=\"product_attribute[";
            // line 513
            echo ($context["attribute_row"] ?? null);
            echo "][attribute_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_attribute"], "attribute_id", [], "any", false, false, false, 513);
            echo "\" id=\"input-attribute-id-";
            echo ($context["attribute_row"] ?? null);
            echo "\"/>
                          <ul id=\"autocomplete-attribute-";
            // line 514
            echo ($context["attribute_row"] ?? null);
            echo "\" class=\"dropdown-menu\"></ul>
                        </td>
                        <td class=\"text-start\">
                          ";
            // line 517
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 518
                echo "                            <div class=\"input-group mb-12\">
                              <div class=\"input-group-text\"><img src=\"";
                // line 519
                echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 519);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 519);
                echo "\"/></div>
                              <textarea name=\"product_attribute[";
                // line 520
                echo ($context["attribute_row"] ?? null);
                echo "][product_attribute_description][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 520);
                echo "][text]\" rows=\"5\" placeholder=\"";
                echo ($context["entry_text"] ?? null);
                echo "\" id=\"input-text-";
                echo ($context["attribute_row"] ?? null);
                echo "-";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 520);
                echo "\" class=\"form-control\">";
                echo (((($__internal_compile_16 = twig_get_attribute($this->env, $this->source, $context["product_attribute"], "product_attribute_description", [], "any", false, false, false, 520)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 520)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_17 = twig_get_attribute($this->env, $this->source, $context["product_attribute"], "product_attribute_description", [], "any", false, false, false, 520)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 520)] ?? null) : null), "text", [], "any", false, false, false, 520)) : (""));
                echo "</textarea>
                            
                            </div>
                            
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 524
            echo "</td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#attribute-row-";
            // line 525
            echo ($context["attribute_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      ";
            // line 527
            $context["attribute_row"] = (($context["attribute_row"] ?? null) + 1);
            // line 528
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_attribute'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 529
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"2\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-attribute\" data-bs-toggle=\"tooltip\" title=\"";
        // line 533
        echo ($context["button_attribute_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class=\"form-text\">


                ";
        // line 541
        echo ($context["text_temporary_attributes"] ?? null);
        echo "
              </div>
                            
            </div>
             
              <div id=\"tab-option\" class=\"tab-pane\">
                <div id=\"option\"></div>

           




                
                

           
              </div>

            

            <div id=\"tab-subscription\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table id=\"product-subscription\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 567
        echo ($context["entry_subscription"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 568
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 569
        echo ($context["entry_trial_price"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 570
        echo ($context["entry_price"] ?? null);
        echo "</td>
                      <td>
                  
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 577
        $context["subscription_row"] = 0;
        // line 578
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_subscriptions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_subscription"]) {
            // line 579
            echo "                      <tr id=\"subscription-row-";
            echo ($context["subscription_row"] ?? null);
            echo "\">
                        <td class=\"text-start\"><select name=\"product_subscription[";
            // line 580
            echo ($context["subscription_row"] ?? null);
            echo "][subscription_plan_id]\" class=\"form-select\">
                            ";
            // line 581
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["subscription_plans"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["subscription_plan"]) {
                // line 582
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 582);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 582) == twig_get_attribute($this->env, $this->source, $context["product_subscription"], "subscription_plan_id", [], "any", false, false, false, 582))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "name", [], "any", false, false, false, 582);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_plan'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 584
            echo "                          </select></td>
                        <td class=\"text-start\"><select name=\"product_subscription[";
            // line 585
            echo ($context["subscription_row"] ?? null);
            echo "][customer_group_id]\" class=\"form-select\">
                            ";
            // line 586
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
                // line 587
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 587);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 587) == twig_get_attribute($this->env, $this->source, $context["product_subscription"], "customer_group_id", [], "any", false, false, false, 587))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 587);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 589
            echo "                          </select></td>
                        <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[";
            // line 590
            echo ($context["subscription_row"] ?? null);
            echo "][trial_price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_subscription"], "trial_price", [], "any", false, false, false, 590);
            echo "\" placeholder=\"";
            echo ($context["entry_trial_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[";
            // line 591
            echo ($context["subscription_row"] ?? null);
            echo "][price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_subscription"], "price", [], "any", false, false, false, 591);
            echo "\" placeholder=\"";
            echo ($context["entry_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#subscription-row-";
            // line 592
            echo ($context["subscription_row"] ?? null);
            echo "').remove()\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      ";
            // line 594
            $context["subscription_row"] = (($context["subscription_row"] ?? null) + 1);
            // line 595
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_subscription'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 596
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"4\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-subscription\" data-bs-toggle=\"tooltip\" title=\"";
        // line 600
        echo ($context["button_subscription_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div id=\"tab-pricing\" class=\"tab-pane\">

              <fieldset>
                <legend>";
        // line 610
        echo ($context["text_price"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-price\" class=\"col-sm-2 col-form-label\">";
        // line 612
        echo ($context["entry_price"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"price\" value=\"";
        // line 615
        echo ($context["price"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_price"] ?? null);
        echo "\" id=\"input-price\" class=\"form-control\"/>
                
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-price\" class=\"col-sm-2 col-form-label\">";
        // line 621
        echo ($context["entry_supply_cost"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"supply_cost\" value=\"";
        // line 624
        echo ($context["supply_cost"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["supply_cost"] ?? null);
        echo "\" id=\"input-supply-cost\" class=\"form-control\"/>
                
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-tax-class\" class=\"col-sm-2 col-form-label\">";
        // line 631
        echo ($context["entry_tax_class"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"tax_class_id\" id=\"input-tax-class\" class=\"form-select\">
                        <option value=\"0\">";
        // line 635
        echo ($context["text_none"] ?? null);
        echo "</option>
                        ";
        // line 636
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tax_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tax_class"]) {
            // line 637
            echo "                          <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["tax_class"], "tax_class_id", [], "any", false, false, false, 637);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["tax_class"], "tax_class_id", [], "any", false, false, false, 637) == ($context["tax_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["tax_class"], "title", [], "any", false, false, false, 637);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tax_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 639
        echo "                      </select>
                
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>

              <h4>";
        // line 647
        echo ($context["text_quantity_discount"] ?? null);
        echo "</h4>
              <div class=\"table-responsive\">
                <table id=\"product-discount\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 652
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
                      <td class=\"text-end\">";
        // line 653
        echo ($context["entry_quantity"] ?? null);
        echo "</td>
                      <td class=\"text-end\">";
        // line 654
        echo ($context["entry_priority"] ?? null);
        echo "</td>
                      <td class=\"text-end\">";
        // line 655
        echo ($context["entry_price"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 656
        echo ($context["entry_date_start"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 657
        echo ($context["entry_date_end"] ?? null);
        echo "</td>
                      <td class=\"text-end\"> </td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 662
        $context["discount_row"] = 0;
        // line 663
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_discounts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_discount"]) {
            // line 664
            echo "                      <tr id=\"discount-row-";
            echo ($context["discount_row"] ?? null);
            echo "\">
                        <td class=\"text-start\"><select name=\"product_discount[";
            // line 665
            echo ($context["discount_row"] ?? null);
            echo "][customer_group_id]\" class=\"form-select\">
                            ";
            // line 666
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
                // line 667
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 667);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 667) == twig_get_attribute($this->env, $this->source, $context["product_discount"], "customer_group_id", [], "any", false, false, false, 667))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 667);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 669
            echo "                          </select></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_discount[";
            // line 670
            echo ($context["discount_row"] ?? null);
            echo "][quantity]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "quantity", [], "any", false, false, false, 670);
            echo "\" placeholder=\"";
            echo ($context["entry_quantity"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_discount[";
            // line 671
            echo ($context["discount_row"] ?? null);
            echo "][priority]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "priority", [], "any", false, false, false, 671);
            echo "\" placeholder=\"";
            echo ($context["entry_priority"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_discount[";
            // line 672
            echo ($context["discount_row"] ?? null);
            echo "][price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "price", [], "any", false, false, false, 672);
            echo "\" placeholder=\"";
            echo ($context["entry_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_discount[";
            // line 675
            echo ($context["discount_row"] ?? null);
            echo "][date_start]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "date_start", [], "any", false, false, false, 675);
            echo "\" placeholder=\"";
            echo ($context["entry_date_start"] ?? null);
            echo "\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_discount[";
            // line 681
            echo ($context["discount_row"] ?? null);
            echo "][date_end]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "date_end", [], "any", false, false, false, 681);
            echo "\" placeholder=\"";
            echo ($context["entry_date_end"] ?? null);
            echo "\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#discount-row-";
            // line 685
            echo ($context["discount_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      ";
            // line 687
            $context["discount_row"] = (($context["discount_row"] ?? null) + 1);
            // line 688
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_discount'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 689
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"6\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-discount\" data-bs-toggle=\"tooltip\" title=\"";
        // line 693
        echo ($context["button_discount_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
<hr/>
<h4>";
        // line 699
        echo ($context["text_discount"] ?? null);
        echo "</h4>
                        <div class=\"table-responsive\">
                <table id=\"product-special\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 704
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
                      <td class=\"text-end\">";
        // line 705
        echo ($context["entry_priority"] ?? null);
        echo "</td>
                      <td class=\"text-end\">";
        // line 706
        echo ($context["entry_value"] ?? null);
        echo "</td>
                      <td class=\"text-end\">";
        // line 707
        echo ($context["entry_applies"] ?? null);
        echo " </td>
                      <td class=\"text-end\">";
        // line 708
        echo ($context["entry_type"] ?? null);
        echo " </td>
                      <td class=\"text-start\">";
        // line 709
        echo ($context["entry_date_start"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 710
        echo ($context["entry_date_end"] ?? null);
        echo "</td>
                      <td class=\"text-center\">
                        
                   
                      
                      
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 720
        $context["special_row"] = 0;
        // line 721
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_specials"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_special"]) {
            // line 722
            echo "                      <tr id=\"special-row-";
            echo ($context["special_row"] ?? null);
            echo "\">
                        <td class=\"text-start\"><select name=\"product_special[";
            // line 723
            echo ($context["special_row"] ?? null);
            echo "][customer_group_id]\" class=\"form-select\">
                            ";
            // line 724
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
                // line 725
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 725);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 725) == twig_get_attribute($this->env, $this->source, $context["product_special"], "customer_group_id", [], "any", false, false, false, 725))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 725);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 727
            echo "                          </select></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_special[";
            // line 728
            echo ($context["special_row"] ?? null);
            echo "][priority]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "priority", [], "any", false, false, false, 728);
            echo "\" placeholder=\"";
            echo ($context["entry_priority"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_special[";
            // line 729
            echo ($context["special_row"] ?? null);
            echo "][price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "price", [], "any", false, false, false, 729);
            echo "\" placeholder=\"";
            echo ($context["entry_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
                        <td class=\"text-end\">
                          
                         
                     <select class=\"form-select\" name=\"product_special[";
            // line 733
            echo ($context["special_row"] ?? null);
            echo "][apply]\">
                      <option value=\"0\" ";
            // line 734
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "apply", [], "any", false, false, false, 734) == 0)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_product_price"] ?? null);
            echo "</option>
                      <option value=\"1\" ";
            // line 735
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "apply", [], "any", false, false, false, 735) == 1)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_end_price"] ?? null);
            echo "</option>
                

                     </select>
                     </td>
                     <td class=\"text-end\">
                      <select class=\"form-select\" name=\"product_special[";
            // line 741
            echo ($context["special_row"] ?? null);
            echo "][type]\">
                        <option value=\"0\" ";
            // line 742
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "type", [], "any", false, false, false, 742) == 0)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_price"] ?? null);
            echo "</option>
                        <option value=\"1\" ";
            // line 743
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "type", [], "any", false, false, false, 743) == 1)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_percentage"] ?? null);
            echo "</option>
  
                       </select>

                      </td>
                     
                     
                          <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_special[";
            // line 752
            echo ($context["special_row"] ?? null);
            echo "][date_start]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "date_start", [], "any", false, false, false, 752);
            echo "\" placeholder=\"";
            echo ($context["entry_date_start"] ?? null);
            echo "\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_special[";
            // line 758
            echo ($context["special_row"] ?? null);
            echo "][date_end]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "date_end", [], "any", false, false, false, 758);
            echo "\" placeholder=\"";
            echo ($context["entry_date_end"] ?? null);
            echo "\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#special-row-";
            // line 762
            echo ($context["special_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      ";
            // line 764
            $context["special_row"] = (($context["special_row"] ?? null) + 1);
            // line 765
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_special'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 766
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"7\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-special\" data-bs-toggle=\"tooltip\" title=\"";
        // line 770
        echo ($context["button_special_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

   

            <div id=\"tab-image\" class=\"tab-pane\"  >



              <div id=\"noticeimage\" ";
        // line 783
        if ((($context["product_id"] ?? null) > 0)) {
            echo " style=\"visibility: hidden;\" ";
        }
        echo " class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
              ";
        // line 784
        echo ($context["text_notice_image"] ?? null);
        echo "
              
            </div>


              <div id=\"tabimage-content\" ";
        // line 789
        if ((($context["product_id"] ?? null) == 0)) {
            echo " style=\"display:none\" ";
        }
        echo "> 
                      <fieldset>
                <legend>";
        // line 791
        echo ($context["text_image"] ?? null);
        echo "</legend>
                <div class=\"row\">
                  <div class=\"col-sm-4 col-md-3 mb-3\">
                    <div id=\"image\" class=\"card image\">

                      ";
        // line 796
        if (twig_in_filter(twig_last($this->env, twig_split_filter($this->env, ($context["thumb"] ?? null), ".")), ["mkv", "avi", "mp4"])) {
            // line 797
            echo "
                      <video  id=\"thumb-image\"   class=\"img-thumbnail thumbnail\" width=\"320\" height=\"240\">
                        <source  class=\"thumbnail\" src=\"";
            // line 799
            echo ($context["thumb"] ?? null);
            echo "\" type=\"video/";
            echo twig_last($this->env, twig_split_filter($this->env, ($context["thumb"] ?? null), "."));
            echo "\">
                        Your browser does not support the video tag.
                      </video>

                      ";
        } else {
            // line 804
            echo "                      <img src=\"";
            echo ($context["thumb"] ?? null);
            echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" class=\"card-img-top\"/> 
                  
                      ";
        }
        // line 807
        echo "                      <input type=\"hidden\" name=\"image\" value=\"";
        echo ($context["image"] ?? null);
        echo "\" id=\"input-image\"/>
                      <div class=\"card-body\">
                        <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 809
        echo ($context["button_edit"] ?? null);
        echo "</button>
                        <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 810
        echo ($context["button_clear"] ?? null);
        echo "</button>

                   

                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>";
        // line 821
        echo ($context["text_image_additional"] ?? null);
        echo "</legend>
                <div class=\"table-responsive\">
                  <table id=\"product-image\" class=\"table table-bordered table-hover\">
                    <thead>
                      <tr>
                        <td class=\"text-start\">";
        // line 826
        echo ($context["entry_image"] ?? null);
        echo "</td>
                        <td class=\"text-start\">";
        // line 827
        echo ($context["entry_sort_order"] ?? null);
        echo "</td>
                        <td class=\"text-end\">

                      

                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 836
        $context["image_row"] = 0;
        // line 837
        echo "                      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_image"]) {
            // line 838
            echo "                        <tr id=\"product-image-row-";
            echo ($context["image_row"] ?? null);
            echo "\">
                          <td>
                            <div class=\"card image\">

                              ";
            // line 842
            if (twig_in_filter(twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 842), ".")), ["mkv", "avi", "mp4"])) {
                // line 843
                echo "
                              <video id=\"product-image-";
                // line 844
                echo ($context["image_row"] ?? null);
                echo "\"  class=\"img-thumbnail thumbnail\" width=\"320\" height=\"240\">
                                <source  class=\"thumbnail\" src=\"";
                // line 845
                echo twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 845);
                echo "\" type=\"video/";
                echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 845), "."));
                echo "\">
                                Your browser does not support the video tag.
                              </video>
                              ";
            } else {
                // line 849
                echo "                              <img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product_image"], "thumb", [], "any", false, false, false, 849);
                echo "\" alt=\"\" title=\"\" id=\"product-image-";
                echo ($context["image_row"] ?? null);
                echo "\" data-oc-placeholder=\"";
                echo ($context["placeholder"] ?? null);
                echo "\" class=\"card-img-top\"/> 

                              
                             ";
            }
            // line 853
            echo "                             <input type=\"hidden\" name=\"product_image[";
            echo ($context["image_row"] ?? null);
            echo "][image]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_image"], "image", [], "any", false, false, false, 853);
            echo "\" id=\"input-product-image-";
            echo ($context["image_row"] ?? null);
            echo "\"/>
                           
                              <div class=\"card-body\">
                                <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-";
            // line 856
            echo ($context["image_row"] ?? null);
            echo "\" data-oc-thumb=\"#product-image-";
            echo ($context["image_row"] ?? null);
            echo "\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
            echo ($context["button_edit"] ?? null);
            echo "</button>
                                <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-product-image-";
            // line 857
            echo ($context["image_row"] ?? null);
            echo "\" data-oc-thumb=\"#product-image-";
            echo ($context["image_row"] ?? null);
            echo "\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
            echo ($context["button_clear"] ?? null);
            echo "</button>
                              </div>
                            </div>
                          </td>
                          <td class=\"text-start\"><input type=\"text\" name=\"product_image[";
            // line 861
            echo ($context["image_row"] ?? null);
            echo "][sort_order]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_image"], "sort_order", [], "any", false, false, false, 861);
            echo "\" placeholder=\"";
            echo ($context["entry_sort_order"] ?? null);
            echo "\" class=\"form-control\"/></td>
                          <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#product-image-row-";
            // line 862
            echo ($context["image_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                        </tr>
                        ";
            // line 864
            $context["image_row"] = (($context["image_row"] ?? null) + 1);
            // line 865
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 866
        echo "                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan=\"2\"></td>
                        <td class=\"text-end\"><button type=\"button\" id=\"button-image\" data-bs-toggle=\"tooltip\" title=\"";
        // line 870
        echo ($context["button_image_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>




            </div>

            <div id=\"tab-reward\" class=\"tab-pane\">
              <fieldset>
                <legend>";
        // line 885
        echo ($context["text_reward"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-points\" class=\"col-sm-2 col-form-label\">";
        // line 887
        echo ($context["entry_points"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"points\" value=\"";
        // line 890
        echo ($context["points"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_points"] ?? null);
        echo "\" id=\"input-points\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">";
        // line 893
        echo ($context["help_points"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 898
        echo ($context["text_points"] ?? null);
        echo "</legend>
                <div class=\"table-responsive\">
                  <table id=\"product-reward\" class=\"table table-bordered table-hover\">
                    <thead>
                      <tr>
                        <td class=\"text-start\">";
        // line 903
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
                        <td class=\"text-end\">";
        // line 904
        echo ($context["entry_reward"] ?? null);
        echo "&nbsp;&nbsp;
              
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 910
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 911
            echo "                        <tr>
                          <td class=\"text-start\">";
            // line 912
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 912);
            echo "</td>
                          <td class=\"text-end\"><input type=\"text\" name=\"product_reward[";
            // line 913
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 913);
            echo "][points]\" value=\"";
            echo (((($__internal_compile_18 = ($context["product_reward"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 913)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_19 = ($context["product_reward"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 913)] ?? null) : null), "points", [], "any", false, false, false, 913)) : (""));
            echo "\" class=\"form-control\"/></td>
                        </tr>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 916
        echo "                    </tbody>
                  </table>
                </div>
              </fieldset>
            </div>

    
            <div id=\"tab-design\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table id=\"product-layout\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">";
        // line 928
        echo ($context["entry_store"] ?? null);
        echo "</td>
                      <td class=\"text-start\">";
        // line 929
        echo ($context["entry_layout"] ?? null);
        echo "
                   
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 935
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 936
            echo "                      <tr>
                        <td class=\"text-start\">";
            // line 937
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 937);
            echo "</td>
                        <td class=\"text-start\"><select name=\"product_layout[";
            // line 938
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 938);
            echo "]\" class=\"form-select\">
                            <option value=\"\"></option>
                            ";
            // line 940
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
                // line 941
                echo "                              <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 941);
                echo "\"";
                if (((($__internal_compile_20 = ($context["product_layout"] ?? null)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 941)] ?? null) : null) && ((($__internal_compile_21 = ($context["product_layout"] ?? null)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 941)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 941)))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 941);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 943
            echo "                          </select></td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 946
        echo "                  </tbody>
                </table>

              </div>
            </div>
            <div id=\"tab-report\" class=\"tab-pane\">
              <fieldset>
                <legend>";
        // line 953
        echo ($context["text_report"] ?? null);
        echo "</legend>
                <div id=\"report\">";
        // line 954
        echo ($context["report"] ?? null);
        echo "</div>
              </fieldset>
            </div>
            <div id=\"tab-variations\" class=\"tab-pane\">
        <div id=\"tab-variations\" class=\"tab-pane\">
         
</div>

              </div>
          </div>
          <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 964
        echo ($context["product_id"] ?? null);
        echo "\" id=\"input-product-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--

  \$(document).ready(function () {
      // Get the tab content div
      var \$tabContent = \$('#tab-variations');
      window.product_id = \$(\"#input-product-id\").val();
      // URL to load content from
 

      // Function to load content
      window.loadVariations  = function () {
         // Show the loading spinner
         \$tabContent.html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');

         // Load content using AJAX
         \$tabContent.load('index.php?route=catalog/variations&user_token=";
        // line 985
        echo ($context["user_token"] ?? null);
        echo "&product_id=";
        echo ($context["product_id"] ?? null);
        echo "', function () {
            // Your loaded content's JavaScript code here
            \$(document).ready(function () {
               // Additional initialization for the loaded content
            });

            // Remove the loading spinner from the tab content
            \$tabContent.find('.fa-spinner').remove();
         });
      }

      // Register click event for the tab link
      \$('#tab-variations-link').on('click', function (e) {
         // Prevent the default behavior of the link
         e.preventDefault();

         // Load content when the tab link is clicked
         window.loadVariations();
      });
   });


\$('textarea[data-oc-toggle=\\'ckeditor\\']').ckeditor({
    language: '";
        // line 1008
        echo ($context["ckeditor"] ?? null);
        echo "'
});

// Manufacturer
\$('#input-manufacturer').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/manufacturer.autocomplete&user_token=";
        // line 1015
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                json.unshift({
                    manufacturer_id: 0,
                    name: '";
        // line 1020
        echo ($context["text_none"] ?? null);
        echo "'
                });

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
        \$('#input-manufacturer').val(item['label']);
        \$('#input-manufacturer-id').val(item['value']);
    }
});

// Category
\$('#input-category').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/category.autocomplete&user_token=";
        // line 1042
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['category_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-category').val('');

        \$('#product-category-' + item['value']).remove();

        html = '<tr id=\"product-category-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_category[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-category tbody').append(html);
    }
});

\$('#product-category').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Filter
\$('#input-filter').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/filter.autocomplete&user_token=";
        // line 1076
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

        \$('#product-filter-' + item['value']).remove();

        html = '<tr id=\"product-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-filter tbody').append(html);
    }
});

\$('#product-filter').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Downloads
\$('#input-download').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/download.autocomplete&user_token=";
        // line 1110
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['download_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-download').val('');

        \$('#product-download-' + item['value']).remove();

        html = '<tr id=\"product-download-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_download[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-download tbody').append(html);
    }
});

\$('#product-download').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Related
\$('#input-related').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token=";
        // line 1144
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-related').val('');

        \$('#product-related-' + item['value']).remove();

        html = '<tr id=\"product-related-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_related[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-related tbody').append(html);
    }
});

\$('#product-related').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

var attributeautocomplete = function (attribute_row) {
    \$('#input-attribute-' + attribute_row).autocomplete({
        'source': function (request, response) {
            \$.ajax({
                url: 'index.php?route=catalog/attribute.autocomplete&user_token=";
        // line 1178
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response(\$.map(json, function (item) {
                        return {
                            category: item.attribute_group,
                            label: item.name,
                            value: item.attribute_id
                        }
                    }));
                }
            });
        },
        'select': function (item) {
            \$('#input-attribute-' + attribute_row).val(item['label']);
            \$('#input-attribute-id-' + attribute_row).val(item['value']);
        }
    });
}

var attribute_row = ";
        // line 1198
        echo ($context["attribute_row"] ?? null);
        echo ";

\$('#product-attribute tr').each(function (index) {
    attributeautocomplete(index);
});

\$('#button-attribute').on('click', function () {
    html = '<tr id=\"attribute-row-' + attribute_row + '\">';
    html += '  <td class=\"text-start\">';
    html += '    <input type=\"text\" name=\"product_attribute[' + attribute_row + '][name]\" value=\"\" placeholder=\"";
        // line 1207
        echo twig_escape_filter($this->env, ($context["entry_attribute"] ?? null), "js");
        echo "\" id=\"input-attribute-' + attribute_row + '\" data-oc-target=\"autocomplete-attribute-' + attribute_row + '\" class=\"form-control\" autocomplete=\"off\"/>';
    html += '    <input type=\"hidden\" name=\"product_attribute[' + attribute_row + '][attribute_id]\" value=\"\" id=\"input-attribute-id-' + attribute_row + '\"/>';
    html += '    <ul id=\"autocomplete-attribute-' + attribute_row + '\" class=\"dropdown-menu\"></ul>';
    html += '  </td>';
    html += '  <td class=\"text-start\">';
  ";
        // line 1212
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 1213
            echo "    html += '<div class=\"input-group\">';
    html += '  <div class=\"input-group-text\"><img src=\"";
            // line 1214
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 1214);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 1214), "js");
            echo "\" /></div>';
    html += '  <textarea name=\"product_attribute[' + attribute_row + '][product_attribute_description][";
            // line 1215
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 1215);
            echo "][text]\" rows=\"5\" placeholder=\"";
            echo twig_escape_filter($this->env, ($context["entry_text"] ?? null), "js");
            echo "\" id=\"input-text-' + attribute_row + '-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 1215);
            echo "\" class=\"form-control\"></textarea>';
    html += '</div>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1218
        echo "    html += '  </td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#attribute-row-' + attribute_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1219
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-attribute').append(html);

    attributeautocomplete(attribute_row);

    attribute_row++;
});

 
 

var discount_row = ";
        // line 1232
        echo ($context["discount_row"] ?? null);
        echo ";

\$('#button-discount').on('click', function () {
    html = '<tr id=\"discount-row-' + discount_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_discount[' + discount_row + '][customer_group_id]\" class=\"form-select\">';
  ";
        // line 1237
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 1238
            echo "    html += '    <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 1238);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 1238), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1240
        echo "    html += '  </select><input type=\"hidden\" name=\"product_discount[' + discount_row + '][product_discount_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][quantity]\" value=\"\" placeholder=\"";
        // line 1241
        echo twig_escape_filter($this->env, ($context["entry_quantity"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][priority]\" value=\"\" placeholder=\"";
        // line 1242
        echo twig_escape_filter($this->env, ($context["entry_priority"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][price]\" value=\"\" placeholder=\"";
        // line 1243
        echo twig_escape_filter($this->env, ($context["entry_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_start]\" value=\"\" placeholder=\"";
        // line 1244
        echo twig_escape_filter($this->env, ($context["entry_date_start"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_end]\" value=\"\" placeholder=\"";
        // line 1245
        echo twig_escape_filter($this->env, ($context["entry_date_end"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#discount-row-' + discount_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1246
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-discount tbody').append(html);

    discount_row++;
});

var special_row = ";
        // line 1254
        echo ($context["special_row"] ?? null);
        echo ";

\$('#button-special').on('click', function () {
    html = '<tr id=\"special-row-' + special_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_special[' + special_row + '][customer_group_id]\" class=\"form-select\">';
  ";
        // line 1259
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 1260
            echo "    html += '      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 1260);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 1260), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1262
        echo "    html += '  </select><input type=\"hidden\" name=\"product_special[' + special_row + '][product_special_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][priority]\" value=\"\" placeholder=\"";
        // line 1263
        echo twig_escape_filter($this->env, ($context["entry_priority"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][price]\" value=\"\" placeholder=\"";
        // line 1264
        echo twig_escape_filter($this->env, ($context["entry_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
  
    html += '  </select></td>';
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][apply]\" class=\"form-select\">';
    html += '      <option value=\"0\">";
        // line 1268
        echo ($context["option_product_price"] ?? null);
        echo "</option>';
    html += '      <option value=\"1\">";
        // line 1269
        echo ($context["option_end_price"] ?? null);
        echo "</option>';
    html += '  </select></td>';

    // New select for \"type\"
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][type]\" class=\"form-select\">';
    html += '      <option value=\"0\">";
        // line 1274
        echo ($context["option_price"] ?? null);
        echo "</option>';
    html += '      <option value=\"1\">";
        // line 1275
        echo ($context["option_percentage"] ?? null);
        echo "</option>';
    html += '  </select></td>';
  
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_start]\" value=\"\" placeholder=\"";
        // line 1278
        echo twig_escape_filter($this->env, ($context["entry_date_start"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_end]\" value=\"\" placeholder=\"";
        // line 1279
        echo twig_escape_filter($this->env, ($context["entry_date_end"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#special-row-' + special_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1280
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-special tbody').append(html);

    special_row++;
});

var image_row = ";
        // line 1288
        echo ($context["image_row"] ?? null);
        echo ";

\$('#button-image').on('click', function () {
    html = '<tr id=\"product-image-row-' + image_row + '\">';
    html += '  <td><div class=\"card image\">';
    html += '    <img src=\"";
        // line 1293
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "js");
        echo "\" alt=\"\" title=\"\" id=\"thumb-image-' + image_row + '\" data-oc-placeholder=\"";
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "js");
        echo "\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"product_image[' + image_row + '][image]\" value=\"\" id=\"input-product-image-' + image_row + '\"/>';
    html += '    <div class=\"card-body\">';
    html += '      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-' + image_row + '\" data-oc-thumb=\"#thumb-image-' + image_row + '\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 1295
        echo twig_escape_filter($this->env, ($context["button_edit"] ?? null), "js");
        echo "</button>';
    html += '      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-product-image-' + image_row + '\" data-oc-thumb=\"#thumb-image-' + image_row + '\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 1296
        echo twig_escape_filter($this->env, ($context["button_clear"] ?? null), "js");
        echo "</button>';
    html += '    </div>';
    html += '  </div></td>';
    html += '  <td class=\"text-start\"><input type=\"text\" name=\"product_image[' + image_row + '][sort_order]\" value=\"0\" placeholder=\"";
        // line 1299
        echo twig_escape_filter($this->env, ($context["entry_sort_order"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#product-image-row-' + image_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1300
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-image tbody').append(html);

    image_row++;
});

var subscription_row = ";
        // line 1308
        echo ($context["subscription_row"] ?? null);
        echo ";

\$('#button-subscription').on('click', function () {
    html = '<tr id=\"subscription-row-' + subscription_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][subscription_plan_id]\" class=\"form-select\">';
  ";
        // line 1313
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_plans"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_plan"]) {
            // line 1314
            echo "    html += '      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 1314);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "name", [], "any", false, false, false, 1314), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_plan'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1316
        echo "    html += '  </select></td>';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][customer_group_id]\" class=\"form-select\">';
  ";
        // line 1318
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 1319
            echo "    html += '      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 1319);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 1319), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1321
        echo "    html += '  <select></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][trial_price]\" value=\"\" placeholder=\"";
        // line 1322
        echo twig_escape_filter($this->env, ($context["entry_trial_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][price]\" value=\"\" placeholder=\"";
        // line 1323
        echo twig_escape_filter($this->env, ($context["entry_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#subscription-row-' + subscription_row + '\\').remove()\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1324
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-subscription tbody').append(html);

    subscription_row++;
});
 
\$('#report').on('click', '.pagination a', function (e) {
    e.preventDefault();

    \$('#report').load(this.href);
});

 

    \$(document).ready(function () {

 var canWriteSeo = false;
    // Attach keypress event listener to the input field
 // Attach keypress event listener to the input field
 \$('input[name^=\"product_description[\"][name\$=\"[name]\"]').on('input', function() {
      // Get the number inside the brackets, i.e., [1], [2], etc.
      var index = \$(this).attr('name').match(/\\[(\\d+)\\]/)[1];
      
      // Get the input value and convert to meta title format
      var inputValue = \$(this).val();
      var metaTitleValue = inputValue;

      // Update the corresponding meta title field
      \$('input[name=\"product_description[' + index + '][meta_title]\"]').val(metaTitleValue);
       metaTitleValue = metaTitleValue.toLowerCase().replace(/\\s+/g, '-');
      // Check if the associated SEO URL field is empty and update it if needed
      \$('input[name\$=\"[1]\"][name^=\"product_seo_url\"]').each(function() {
      if (\$(this).val().length === 0) {
        canWriteSeo = true;
      }
      if (canWriteSeo) {
        \$(this).val(metaTitleValue);
      }
    });
    });
 

    // Intercept form submission
    \$('#form-product').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Perform your custom actions before sending the form data

        // Send the form data using AJAX
        \$.ajax({
            type: 'POST',
            url: \$('#form-product').attr('action'),
            data: \$('#form-product').serialize(), // Serialize the form data
            success: function (response) {
              if (response.product_id) {
                \$(\"#noticeimage\").hide();
                \$(\"#tabimage-content\").show();
                \$(\"#input-product-id\").val(response.product_id);
                window.product_id = response.product_id;
              }
                if (response.success) { 
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + response.success + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                } else {
                  if (typeof response.error !== \"undefined\") {
                    console.log( response.error)
                    Object.entries(response.error).map(([key, value]) => {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + key + ': ' + value + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    });
                  } else {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(response) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }
              }
                setTimeout(() => {
                    \$(\".alert\").alert('close');
                }, 5500);

             
                // Handle the successful response here
                var userToken = encodeURIComponent('";
        // line 1404
        echo ($context["user_token"] ?? null);
        echo "');
    var productId =  \$(\"#input-product-id\").val();
    //submit occurred reload option tab content
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
      

                // You can perform additional actions or update the UI based on the response
            },
            error: function (error) {
                alert(JSON.stringify(error));
         
               
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(error) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                
                setTimeout(() => {
                    \$(\".alert\").alert('close');
                }, 5500);

                var userToken = encodeURIComponent('";
        // line 1423
        echo ($context["user_token"] ?? null);
        echo "');
    var productId =  \$(\"#input-product-id\").val();
    //error occurred, reload option tab content
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
     \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
            }
        });
    });
    var userToken = encodeURIComponent('";
        // line 1431
        echo ($context["user_token"] ?? null);
        echo "');
    var productId =  \$(\"#input-product-id\").val();
   //initial page load, load option tab content
   \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
});

\$(document).ready(function() {
 
    \$(\"select[name^='product_special']\").change(function() {
 
        var selectedValue = \$(this).val();
       if (\$(this).attr('name').endsWith('[apply]') && selectedValue == 0) {
        let selname = \$(this).attr('name').replace('apply','type');
        \$(\"select[name='\" + selname + \"'] option[value='0']\").prop('disabled', false);
     
       }

       if (\$(this).attr('name').endsWith('[apply]') && selectedValue == 1) {
        let selname = \$(this).attr('name').replace('apply','type');
        \$(\"select[name='\" + selname + \"']\").val('1');
        \$(\"select[name='\" + selname + \"'] option[value='0']\").prop('disabled', true);
       }


    });

    
});

 


//--></script>

<!-- options tab -->
<script>
  \$(document).ready(function() {
 
    \$(document).on('click', '.add-or-edit-btn', function () {
var rowId = \$(\"#\" + \$(this).data('option-value-row'));

 
 
var icon = \$(this).find('i');
var tr =  \$(this).closest('table');

opt = tr.find('.option-select :selected:first').text();

 
 rowId.find('.option-title-accordion').text(opt.trim());

if (icon.hasClass('fa-unlock')) {
  // If it's currently unlocked, change icon to lock and remove .read-only class
  icon.removeClass('fa-unlock').addClass('fa-lock');
  tr.find('input, select').removeClass('read-only');
} else {
  // If it's currently locked, change icon to unlock and add .read-only class
  icon.removeClass('fa-lock').addClass('fa-unlock');
  tr.find('input, select').addClass('read-only');
}
});

\$(document).on('click', '.add-q-option', function () {
\$(this).hide();
event.preventDefault();
window.addQuickOption();
});
    
  });

  \$(document).on('click', '.add-opt-button', function () {
  let rowId = \$(this).data('option-row');
 
  let valuerow = \$(\"#option-row-\" + rowId + \" .accordion-item\").length - 1;
  let template = \$('#option-template-div').html();
  valuerow++;
  valuerow++;
 
  \$('#collapse' + rowId).attr('aria-expanded', 'true');
  \$('#collapse' + rowId).removeClass('collapse');
 

template = template.replace(/xxx/g, '' );
template = template.replace(/option-row-placeholder/g, rowId);
template = template.replace(/option-valuerow-placeholder/g, valuerow );
 
 let copySelect = \$(\"#select-default-row-\" + rowId).clone();
 copySelect.removeClass('d-none');
 copySelect.addClass('read-only');
 let selname = \"product_option[\"  + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\"
 copySelect.attr('name', selname);
 copySelect.addClass('option-select');
 let position = \$(\"#option-row-\"  + rowId + \" .accordion-item\").length - 1;
 let selectedOptionValue = copySelect.find('option:eq('+ position + ')').val();
 template = template.replace(/option-name-placeholder/g, copySelect.find('option:eq('+ position + ')').text());

 template = \$(template);
 template.find('.insertselect').append(copySelect);

 

// Set the value attribute of the input
let inputName = \"product_option[\" + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\";
 
template.find('[name=\"' + inputName + '\"]').val(selectedOptionValue);
\$(\"#option-row-body-\" + rowId).append(template);
 
   initializeSortables();
 
 
});
</script>
";
        // line 1544
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "admin/view/template/catalog/product_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3130 => 1544,  3014 => 1431,  3003 => 1423,  2981 => 1404,  2898 => 1324,  2894 => 1323,  2890 => 1322,  2887 => 1321,  2876 => 1319,  2872 => 1318,  2868 => 1316,  2857 => 1314,  2853 => 1313,  2845 => 1308,  2834 => 1300,  2830 => 1299,  2824 => 1296,  2820 => 1295,  2813 => 1293,  2805 => 1288,  2794 => 1280,  2790 => 1279,  2786 => 1278,  2780 => 1275,  2776 => 1274,  2768 => 1269,  2764 => 1268,  2757 => 1264,  2753 => 1263,  2750 => 1262,  2739 => 1260,  2735 => 1259,  2727 => 1254,  2716 => 1246,  2712 => 1245,  2708 => 1244,  2704 => 1243,  2700 => 1242,  2696 => 1241,  2693 => 1240,  2682 => 1238,  2678 => 1237,  2670 => 1232,  2654 => 1219,  2651 => 1218,  2638 => 1215,  2632 => 1214,  2629 => 1213,  2625 => 1212,  2617 => 1207,  2605 => 1198,  2582 => 1178,  2545 => 1144,  2508 => 1110,  2471 => 1076,  2434 => 1042,  2409 => 1020,  2401 => 1015,  2391 => 1008,  2363 => 985,  2339 => 964,  2326 => 954,  2322 => 953,  2313 => 946,  2305 => 943,  2290 => 941,  2286 => 940,  2281 => 938,  2277 => 937,  2274 => 936,  2270 => 935,  2261 => 929,  2257 => 928,  2243 => 916,  2232 => 913,  2228 => 912,  2225 => 911,  2221 => 910,  2212 => 904,  2208 => 903,  2200 => 898,  2192 => 893,  2184 => 890,  2178 => 887,  2173 => 885,  2155 => 870,  2149 => 866,  2143 => 865,  2141 => 864,  2134 => 862,  2126 => 861,  2115 => 857,  2107 => 856,  2096 => 853,  2084 => 849,  2075 => 845,  2071 => 844,  2068 => 843,  2066 => 842,  2058 => 838,  2053 => 837,  2051 => 836,  2039 => 827,  2035 => 826,  2027 => 821,  2013 => 810,  2009 => 809,  2003 => 807,  1994 => 804,  1984 => 799,  1980 => 797,  1978 => 796,  1970 => 791,  1963 => 789,  1955 => 784,  1949 => 783,  1933 => 770,  1927 => 766,  1921 => 765,  1919 => 764,  1912 => 762,  1901 => 758,  1888 => 752,  1872 => 743,  1864 => 742,  1860 => 741,  1847 => 735,  1839 => 734,  1835 => 733,  1824 => 729,  1816 => 728,  1813 => 727,  1798 => 725,  1794 => 724,  1790 => 723,  1785 => 722,  1780 => 721,  1778 => 720,  1765 => 710,  1761 => 709,  1757 => 708,  1753 => 707,  1749 => 706,  1745 => 705,  1741 => 704,  1733 => 699,  1724 => 693,  1718 => 689,  1712 => 688,  1710 => 687,  1703 => 685,  1692 => 681,  1679 => 675,  1669 => 672,  1661 => 671,  1653 => 670,  1650 => 669,  1635 => 667,  1631 => 666,  1627 => 665,  1622 => 664,  1617 => 663,  1615 => 662,  1607 => 657,  1603 => 656,  1599 => 655,  1595 => 654,  1591 => 653,  1587 => 652,  1579 => 647,  1569 => 639,  1554 => 637,  1550 => 636,  1546 => 635,  1539 => 631,  1527 => 624,  1521 => 621,  1510 => 615,  1504 => 612,  1499 => 610,  1486 => 600,  1480 => 596,  1474 => 595,  1472 => 594,  1465 => 592,  1457 => 591,  1449 => 590,  1446 => 589,  1431 => 587,  1427 => 586,  1423 => 585,  1420 => 584,  1405 => 582,  1401 => 581,  1397 => 580,  1392 => 579,  1387 => 578,  1385 => 577,  1375 => 570,  1371 => 569,  1367 => 568,  1363 => 567,  1334 => 541,  1323 => 533,  1317 => 529,  1311 => 528,  1309 => 527,  1302 => 525,  1299 => 524,  1278 => 520,  1272 => 519,  1269 => 518,  1265 => 517,  1259 => 514,  1251 => 513,  1239 => 512,  1233 => 510,  1228 => 509,  1226 => 508,  1216 => 501,  1212 => 500,  1199 => 490,  1192 => 485,  1180 => 481,  1175 => 480,  1171 => 479,  1162 => 473,  1157 => 471,  1150 => 467,  1143 => 462,  1131 => 458,  1126 => 457,  1122 => 456,  1113 => 450,  1108 => 448,  1100 => 442,  1081 => 439,  1078 => 438,  1074 => 437,  1067 => 433,  1060 => 429,  1053 => 424,  1041 => 420,  1036 => 419,  1032 => 418,  1023 => 412,  1018 => 410,  1011 => 406,  1004 => 401,  992 => 397,  987 => 396,  983 => 395,  974 => 389,  969 => 387,  962 => 383,  957 => 381,  949 => 378,  943 => 375,  929 => 366,  923 => 363,  911 => 356,  904 => 352,  896 => 346,  881 => 344,  877 => 343,  870 => 339,  859 => 333,  853 => 330,  845 => 324,  830 => 322,  826 => 321,  819 => 317,  808 => 311,  801 => 309,  794 => 307,  788 => 304,  775 => 296,  767 => 291,  762 => 289,  749 => 281,  743 => 278,  736 => 274,  731 => 271,  716 => 269,  712 => 268,  705 => 264,  690 => 254,  681 => 248,  674 => 244,  666 => 241,  660 => 238,  651 => 234,  646 => 232,  641 => 230,  629 => 223,  623 => 220,  616 => 216,  608 => 213,  602 => 210,  595 => 206,  587 => 203,  581 => 200,  574 => 196,  566 => 193,  560 => 190,  553 => 186,  545 => 183,  539 => 180,  532 => 176,  524 => 173,  518 => 170,  511 => 166,  503 => 163,  497 => 160,  485 => 153,  479 => 150,  474 => 148,  467 => 143,  446 => 135,  434 => 131,  417 => 129,  411 => 128,  404 => 124,  401 => 123,  397 => 122,  390 => 118,  386 => 117,  375 => 109,  363 => 106,  355 => 103,  340 => 97,  332 => 94,  317 => 88,  309 => 85,  302 => 81,  290 => 78,  282 => 75,  264 => 68,  255 => 64,  248 => 60,  236 => 57,  228 => 54,  218 => 52,  201 => 51,  197 => 49,  170 => 47,  153 => 46,  145 => 41,  141 => 40,  136 => 38,  129 => 34,  125 => 33,  121 => 32,  117 => 31,  113 => 30,  109 => 29,  105 => 28,  101 => 27,  97 => 26,  91 => 23,  86 => 21,  78 => 15,  67 => 13,  63 => 12,  58 => 10,  52 => 9,  48 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}

<div id=\"content\">
  
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-product\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
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
    
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-product\" action=\"{{ save }}\" method=\"post\"  >

          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_general }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_data }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-pricing\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_pricing }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-links\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_links }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-image\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_image }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-attribute\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_attribute }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-option\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_option }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-variations\" data-bs-toggle=\"tab\"  id=\"tab-variations-link\" class=\"nav-link\">{{ tab_variations }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-subscription\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_subscription }}</a></li>
     
    
       
            <li class=\"nav-item\"><a href=\"#tab-reward\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_reward }}</a></li>
  
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_design }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-report\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_report }}</a></li>
          </ul>
          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
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
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"product_description[{{ language.language_id }}][name]\" value=\"{{ product_description[language.language_id] ? product_description[language.language_id].name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name-{{ language.language_id }}\" class=\"form-control\"/>
                  
                        </div>
                        <div id=\"error-name-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-description-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_description }}</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <div class=\"form-control h-100 p-0 border-0 rounded-0\">
                            <textarea name=\"product_description[{{ language.language_id }}][description]\" placeholder=\"{{ entry_description }}\" id=\"input-description-{{ language.language_id }}\" data-oc-toggle=\"ckeditor\" data-lang=\"{{ ckeditor }}\" class=\"w-100 position-relative\">{{ product_description[language.language_id] ? product_description[language.language_id].description }}</textarea>
                          </div>
                     
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3 required\">
                      <label for=\"input-meta-title-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_title }}</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"product_description[{{ language.language_id }}][meta_title]\" value=\"{{ product_description[language.language_id] ? product_description[language.language_id].meta_title }}\" placeholder=\"{{ entry_meta_title }}\" id=\"input-meta-title-{{ language.language_id }}\" class=\"form-control\"/>
                   
                        </div>
                        <div id=\"error-meta-title-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-description-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_description }}</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <textarea name=\"product_description[{{ language.language_id }}][meta_description]\" rows=\"5\" placeholder=\"{{ entry_meta_description }}\" id=\"input-meta-description-{{ language.language_id }}\" class=\"form-control\">{{ product_description[language.language_id] ? product_description[language.language_id].meta_description }}</textarea>
                
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-keyword-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_keyword }}</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <textarea name=\"product_description[{{ language.language_id }}][meta_keyword]\" rows=\"5\" placeholder=\"{{ entry_meta_keyword }}\" id=\"input-meta-keyword-{{ language.language_id }}\" class=\"form-control\">{{ product_description[language.language_id] ? product_description[language.language_id].meta_keyword }}</textarea>
                       
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-tag-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_tag }}</label>
                      <div class=\"col-sm-10\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"product_description[{{ language.language_id }}][tag]\" value=\"{{ product_description[language.language_id] ? product_description[language.language_id].tag }}\" placeholder=\"{{ entry_tag }}\" id=\"input-tag-{{ language.language_id }}\" class=\"form-control\"/>
                 
                        </div>
                        <div class=\"form-text\">{{ help_tag }}</div>
                      </div>
                    </div>

                    <div id=\"product-seo\" class=\"table-responsive\">
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
                                    <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/></div>
                                    <input type=\"text\" name=\"product_seo_url[{{ store.store_id }}][{{ language.language_id }}]\" value=\"{% if product_seo_url[store.store_id][language.language_id] %}{{ product_seo_url[store.store_id][language.language_id] }}{% endif %}\" id=\"input-keyword-{{ store.store_id }}-{{ language.language_id }}\" placeholder=\"{{ entry_keyword }}\" class=\"form-control seoinput\"/>
                                  </div>
                                  <div id=\"error-keyword-{{ store.store_id }}-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      
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
              
              <fieldset>
                <legend>{{ text_model }}</legend>
                <div class=\"row mb-3 required\">
                  <label for=\"input-model\" class=\"col-sm-2 col-form-label\">{{ entry_model }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"model\" value=\"{{ model }}\" placeholder=\"{{ entry_model }}\" id=\"input-model\" class=\"form-control\"/>
                
                    </div>
                    <div id=\"error-model\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-sku\" class=\"col-sm-2   col-form-label\">{{ entry_sku }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"sku\" value=\"{{ sku }}\" placeholder=\"{{ entry_sku }}\" id=\"input-sku\" class=\"form-control\"/>
              
                    </div>
                    <div class=\"form-text\">{{ help_sku }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-upc\" class=\"col-sm-2 col-form-label\">{{ entry_upc }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"upc\" value=\"{{ upc }}\" placeholder=\"{{ entry_upc }}\" id=\"input-upc\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">{{ help_upc }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-ean\" class=\"col-sm-2 col-form-label\">{{ entry_ean }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"ean\" value=\"{{ ean }}\" placeholder=\"{{ entry_ean }}\" id=\"input-ean\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">{{ help_ean }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-jan\" class=\"col-sm-2 col-form-label\">{{ entry_jan }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"jan\" value=\"{{ jan }}\" placeholder=\"{{ entry_jan }}\" id=\"input-jan\" class=\"form-control\"/>
               
                    </div>
                    <div class=\"form-text\">{{ help_jan }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-isbn\" class=\"col-sm-2 col-form-label\">{{ entry_isbn }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"isbn\" value=\"{{ isbn }}\" placeholder=\"{{ entry_isbn }}\" id=\"input-isbn\" class=\"form-control\"/>
               
                    </div>
                    <div class=\"form-text\">{{ help_isbn }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mpn\" class=\"col-sm-2 col-form-label\">{{ entry_mpn }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"mpn\" value=\"{{ mpn }}\" placeholder=\"{{ entry_mpn }}\" id=\"input-mpn\" class=\"form-control\"/>
              
                    </div>
                    <div class=\"form-text\">{{ help_mpn }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-location\" class=\"col-sm-2 col-form-label\">{{ entry_location }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"location\" value=\"{{ location }}\" placeholder=\"{{ entry_location }}\" id=\"input-location\" class=\"form-control\"/>
               
                    </div>
                  </div>
                </div>
              </fieldset>
             
                <legend>{{ text_stock }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-quantity\" class=\"col-sm-2 col-form-label\">{{ entry_quantity }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"quantity\" value=\"{{ quantity }}\" placeholder=\"{{ entry_quantity }}\" id=\"input-quantity\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-minimum\" class=\"col-sm-2 col-form-label\">{{ entry_minimum }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"minimum\" value=\"{{ minimum }}\" placeholder=\"{{ entry_minimum }}\" id=\"input-minimum\" class=\"form-control\"/>
                  
                    </div>
                    <div class=\"form-text\">{{ help_minimum }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_subtract }}</label>
                  <div class=\"col-sm-10\">

                    <div class=\"input-group\">

                      <div id=\"input-subtract\" class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"subtract\" value=\"0\"/> <input type=\"checkbox\" name=\"subtract\" value=\"1\" class=\"form-check-input\"{% if subtract %} checked{% endif %}/>
                      </div>

                 

                    </div>

                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-stock-status\" class=\"col-sm-2 col-form-label\">{{ entry_stock_status }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"stock_status_id\" id=\"input-stock-status\" class=\"form-select\">
                        {% for stock_status in stock_statuses %}
                          <option value=\"{{ stock_status.stock_status_id }}\"{% if stock_status.stock_status_id == stock_status_id %} selected{% endif %}>{{ stock_status.name }}</option>
                        {% endfor %}
                      </select>
                  
                    </div>
                    <div class=\"form-text\">{{ help_stock_status }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-date-available\" class=\"col-sm-2 col-form-label\">{{ entry_date_available }}</label>
                  <div class=\"col-sm-10 col-md-4\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"date_available\" value=\"{{ date_available }}\" placeholder=\"{{ entry_date_available }}\" id=\"input-date-available\" class=\"form-control date\"/>
                      <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_specification }}</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_shipping }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">

                      <div id=\"input-shipping\" class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"shipping\" value=\"0\"/> <input type=\"checkbox\" name=\"shipping\" value=\"1\" class=\"form-check-input\"{% if shipping %} checked{% endif %}/>
                      </div>

                  
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-length\" class=\"col-sm-2 col-form-label\">{{ entry_dimension }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"length\" value=\"{{ length }}\" placeholder=\"{{ entry_length }}\" id=\"input-length\" class=\"form-control\"/>
                
                      <input type=\"text\" name=\"width\" value=\"{{ width }}\" placeholder=\"{{ entry_width }}\" id=\"input-width\" class=\"form-control\"/>
                   
                      <input type=\"text\" name=\"height\" value=\"{{ height }}\" placeholder=\"{{ entry_height }}\" id=\"input-height\" class=\"form-control\"/>
                
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">{{ entry_length_class }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"length_class_id\" id=\"input-length-class\" class=\"form-select\">
                        {% for length_class in length_classes %}
                          <option value=\"{{ length_class.length_class_id }}\"{% if length_class.length_class_id == length_class_id %} selected{% endif %}>{{ length_class.title }}</option>
                        {% endfor %}
                      </select>
                   
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-weight\" class=\"col-sm-2 col-form-label\">{{ entry_weight }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"weight\" value=\"{{ weight }}\" placeholder=\"{{ entry_weight }}\" id=\"input-weight\" class=\"form-control\"/>
                   
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">{{ entry_weight_class }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"weight_class_id\" id=\"input-weight-class\" class=\"form-select\">
                        {% for weight_class in weight_classes %}
                          <option value=\"{{ weight_class.weight_class_id }}\"{% if weight_class.weight_class_id == weight_class_id %} selected{% endif %}>{{ weight_class.title }}</option>
                        {% endfor %}
                      </select>
                  
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-status\" class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <div class=\"form-check form-switch form-switch-lg\">
                        <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if status %} checked{% endif %}/>
                      </div>
               
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">{{ entry_sort_order }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"sort_order\" value=\"{{ sort_order }}\" placeholder=\"{{ entry_sort_order }}\" id=\"input-sort-order\" class=\"form-control\"/>
                  
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div id=\"tab-links\" class=\"tab-pane\">
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_manufacturer }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"manufacturer\" value=\"{{ manufacturer }}\" placeholder=\"{{ entry_manufacturer }}\" id=\"input-manufacturer\" data-oc-target=\"autocomplete-manufacturer\" class=\"form-control\" autocomplete=\"off\"/>
                  
                  </div>
                  <input type=\"hidden\" name=\"manufacturer_id\" value=\"{{ manufacturer_id }}\" id=\"input-manufacturer-id\"/>
                  <ul id=\"autocomplete-manufacturer\" class=\"dropdown-menu\"></ul>
                  <div class=\"form-text\">{{ help_manufacturer }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_category }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"category\" value=\"\" placeholder=\"{{ entry_category }}\" id=\"input-category\" data-oc-target=\"autocomplete-category\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-category\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-category\" class=\"table table-sm m-0\">
                        <tbody>
                          {% for product_category in product_categories %}
                            <tr id=\"product-category-{{ product_category.category_id }}\">
                              <td>{{ product_category.name }}<input type=\"hidden\" name=\"product_category[]\" value=\"{{ product_category.category_id }}\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          {% endfor %}
                        </tbody>
                      </table>
                    </div>
    
                  </div>
                  <div class=\"form-text\">{{ help_category }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_filter }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"filter\" value=\"\" placeholder=\"{{ entry_filter }}\" id=\"input-filter\" data-oc-target=\"autocomplete-filter\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-filter\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-filter\" class=\"table table-sm m-0\">
                        <tbody>
                          {% for product_filter in product_filters %}
                            <tr id=\"product-filter-{{ product_filter.filter_id }}\">
                              <td>{{ product_filter.name }}<input type=\"hidden\" name=\"product_filter[]\" value=\"{{ product_filter.filter_id }}\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          {% endfor %}
                        </tbody>
                      </table>
                    </div>
              
                  </div>
                  <div class=\"form-text\">{{ help_filter }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_store }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"input-group\">
                    <div id=\"product-store\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                      {% for store in stores %}
                        <div class=\"form-check\">
                          <input type=\"checkbox\" name=\"product_store[]\" value=\"{{ store.store_id }}\" id=\"input-store-{{ store.store_id }}\" class=\"form-check-input\"{% if store.store_id in product_store %} checked{% endif %}/> <label for=\"input-store-{{ store.store_id }}\" class=\"form-check-label\">{{ store.name }}</label>
                        </div>
                      {% endfor %}
                    </div>
            
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_download }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"download\" value=\"\" placeholder=\"{{ entry_download }}\" id=\"input-download\" data-oc-target=\"autocomplete-download\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-download\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-download\" class=\"table table-sm m-0\">
                        <tbody>
                          {% for product_download in product_downloads %}
                            <tr id=\"product-download-{{ product_download.download_id }}\">
                              <td>{{ product_download.name }}<input type=\"hidden\" name=\"product_download[]\" value=\"{{ product_download.download_id }}\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          {% endfor %}
                        </tbody>
                      </table>
                    </div>
           
                  </div>
                  <div class=\"form-text\">{{ help_download }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_related }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"related\" value=\"\" placeholder=\"{{ entry_related }}\" id=\"input-related\" data-oc-target=\"autocomplete-related\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-related\" class=\"dropdown-menu\"></ul>
                  <div class=\"input-group\">
                    <div class=\"form-control p-0\" style=\"height: 150px; overflow: auto;\">
                      <table id=\"product-related\" class=\"table table-sm m-0\">
                        <tbody>
                          {% for product_related in product_relateds %}
                            <tr id=\"product-related-{{ product_related.product_id }}\">
                              <td>{{ product_related.name }}<input type=\"hidden\" name=\"product_related[]\" value=\"{{ product_related.product_id }}\"/></td>
                              <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                            </tr>
                          {% endfor %}
                        </tbody>
                      </table>
                    </div>
             
                  </div>
                  <div class=\"form-text\">{{ help_related }}</div>
                </div>
              </div>
            </div>
            <div id=\"tab-attribute\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                
                <table id=\"product-attribute\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_attribute }}</td>
                      <td class=\"text-start\">{{ entry_text }}</td>
                      <td>
                  
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    {% set attribute_row = 0 %}
                    {% for product_attribute in product_attributes %}
                      <tr id=\"attribute-row-{{ attribute_row }}\">
                        <td class=\"text-start\">
                          <input type=\"text\" name=\"product_attribute[{{ attribute_row }}][name]\" value=\"{{ product_attribute.name }}\" placeholder=\"{{ entry_attribute }}\" id=\"input-attribute-{{ attribute_row }}\" data-oc-target=\"autocomplete-attribute-{{ attribute_row }}\" class=\"form-control\" autocomplete=\"new-password\"/>
                          <input type=\"hidden\" name=\"product_attribute[{{ attribute_row }}][attribute_id]\" value=\"{{ product_attribute.attribute_id }}\" id=\"input-attribute-id-{{ attribute_row }}\"/>
                          <ul id=\"autocomplete-attribute-{{ attribute_row }}\" class=\"dropdown-menu\"></ul>
                        </td>
                        <td class=\"text-start\">
                          {% for language in languages %}
                            <div class=\"input-group mb-12\">
                              <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/></div>
                              <textarea name=\"product_attribute[{{ attribute_row }}][product_attribute_description][{{ language.language_id }}][text]\" rows=\"5\" placeholder=\"{{ entry_text }}\" id=\"input-text-{{ attribute_row }}-{{ language.language_id }}\" class=\"form-control\">{{ product_attribute.product_attribute_description[language.language_id] ? product_attribute.product_attribute_description[language.language_id].text }}</textarea>
                            
                            </div>
                            
                          {% endfor %}</td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#attribute-row-{{ attribute_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      {% set attribute_row = attribute_row + 1 %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"2\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-attribute\" data-bs-toggle=\"tooltip\" title=\"{{ button_attribute_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class=\"form-text\">


                {{text_temporary_attributes}}
              </div>
                            
            </div>
             
              <div id=\"tab-option\" class=\"tab-pane\">
                <div id=\"option\"></div>

           




                
                

           
              </div>

            

            <div id=\"tab-subscription\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table id=\"product-subscription\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_subscription }}</td>
                      <td class=\"text-start\">{{ entry_customer_group }}</td>
                      <td class=\"text-start\">{{ entry_trial_price }}</td>
                      <td class=\"text-start\">{{ entry_price }}</td>
                      <td>
                  
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    {% set subscription_row = 0 %}
                    {% for product_subscription in product_subscriptions %}
                      <tr id=\"subscription-row-{{ subscription_row }}\">
                        <td class=\"text-start\"><select name=\"product_subscription[{{ subscription_row }}][subscription_plan_id]\" class=\"form-select\">
                            {% for subscription_plan in subscription_plans %}
                              <option value=\"{{ subscription_plan.subscription_plan_id }}\"{% if subscription_plan.subscription_plan_id == product_subscription.subscription_plan_id %} selected{% endif %}>{{ subscription_plan.name }}</option>
                            {% endfor %}
                          </select></td>
                        <td class=\"text-start\"><select name=\"product_subscription[{{ subscription_row }}][customer_group_id]\" class=\"form-select\">
                            {% for customer_group in customer_groups %}
                              <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == product_subscription.customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                            {% endfor %}
                          </select></td>
                        <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[{{ subscription_row }}][trial_price]\" value=\"{{ product_subscription.trial_price }}\" placeholder=\"{{ entry_trial_price }}\" class=\"form-control\"/></td>
                        <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[{{ subscription_row }}][price]\" value=\"{{ product_subscription.price }}\" placeholder=\"{{ entry_price }}\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#subscription-row-{{ subscription_row }}').remove()\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      {% set subscription_row = subscription_row + 1 %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"4\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-subscription\" data-bs-toggle=\"tooltip\" title=\"{{ button_subscription_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div id=\"tab-pricing\" class=\"tab-pane\">

              <fieldset>
                <legend>{{ text_price }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-price\" class=\"col-sm-2 col-form-label\">{{ entry_price }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"price\" value=\"{{ price }}\" placeholder=\"{{ entry_price }}\" id=\"input-price\" class=\"form-control\"/>
                
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-price\" class=\"col-sm-2 col-form-label\">{{entry_supply_cost}}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"supply_cost\" value=\"{{ supply_cost }}\" placeholder=\"{{ supply_cost }}\" id=\"input-supply-cost\" class=\"form-control\"/>
                
                    </div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label for=\"input-tax-class\" class=\"col-sm-2 col-form-label\">{{ entry_tax_class }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <select name=\"tax_class_id\" id=\"input-tax-class\" class=\"form-select\">
                        <option value=\"0\">{{ text_none }}</option>
                        {% for tax_class in tax_classes %}
                          <option value=\"{{ tax_class.tax_class_id }}\"{% if tax_class.tax_class_id == tax_class_id %} selected{% endif %}>{{ tax_class.title }}</option>
                        {% endfor %}
                      </select>
                
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>

              <h4>{{text_quantity_discount}}</h4>
              <div class=\"table-responsive\">
                <table id=\"product-discount\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_customer_group }}</td>
                      <td class=\"text-end\">{{ entry_quantity }}</td>
                      <td class=\"text-end\">{{ entry_priority }}</td>
                      <td class=\"text-end\">{{ entry_price }}</td>
                      <td class=\"text-start\">{{ entry_date_start }}</td>
                      <td class=\"text-start\">{{ entry_date_end }}</td>
                      <td class=\"text-end\"> </td>
                    </tr>
                  </thead>
                  <tbody>
                    {% set discount_row = 0 %}
                    {% for product_discount in product_discounts %}
                      <tr id=\"discount-row-{{ discount_row }}\">
                        <td class=\"text-start\"><select name=\"product_discount[{{ discount_row }}][customer_group_id]\" class=\"form-select\">
                            {% for customer_group in customer_groups %}
                              <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == product_discount.customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                            {% endfor %}
                          </select></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_discount[{{ discount_row }}][quantity]\" value=\"{{ product_discount.quantity }}\" placeholder=\"{{ entry_quantity }}\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_discount[{{ discount_row }}][priority]\" value=\"{{ product_discount.priority }}\" placeholder=\"{{ entry_priority }}\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_discount[{{ discount_row }}][price]\" value=\"{{ product_discount.price }}\" placeholder=\"{{ entry_price }}\" class=\"form-control\"/></td>
                        <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_discount[{{ discount_row }}][date_start]\" value=\"{{ product_discount.date_start }}\" placeholder=\"{{ entry_date_start }}\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_discount[{{ discount_row }}][date_end]\" value=\"{{ product_discount.date_end }}\" placeholder=\"{{ entry_date_end }}\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#discount-row-{{ discount_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      {% set discount_row = discount_row + 1 %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"6\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-discount\" data-bs-toggle=\"tooltip\" title=\"{{ button_discount_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
<hr/>
<h4>{{text_discount}}</h4>
                        <div class=\"table-responsive\">
                <table id=\"product-special\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_customer_group }}</td>
                      <td class=\"text-end\">{{ entry_priority }}</td>
                      <td class=\"text-end\">{{ entry_value }}</td>
                      <td class=\"text-end\">{{entry_applies}} </td>
                      <td class=\"text-end\">{{entry_type}} </td>
                      <td class=\"text-start\">{{ entry_date_start }}</td>
                      <td class=\"text-start\">{{ entry_date_end }}</td>
                      <td class=\"text-center\">
                        
                   
                      
                      
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    {% set special_row = 0 %}
                    {% for product_special in product_specials %}
                      <tr id=\"special-row-{{ special_row }}\">
                        <td class=\"text-start\"><select name=\"product_special[{{ special_row }}][customer_group_id]\" class=\"form-select\">
                            {% for customer_group in customer_groups %}
                              <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == product_special.customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                            {% endfor %}
                          </select></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_special[{{ special_row }}][priority]\" value=\"{{ product_special.priority }}\" placeholder=\"{{ entry_priority }}\" class=\"form-control\"/></td>
                        <td class=\"text-end\"><input type=\"text\" name=\"product_special[{{ special_row }}][price]\" value=\"{{ product_special.price }}\" placeholder=\"{{ entry_price }}\" class=\"form-control\"/></td>
                        <td class=\"text-end\">
                          
                         
                     <select class=\"form-select\" name=\"product_special[{{ special_row }}][apply]\">
                      <option value=\"0\" {% if product_special.apply == 0 %}selected{% endif %}>{{option_product_price}}</option>
                      <option value=\"1\" {% if product_special.apply == 1 %}selected{% endif %}>{{option_end_price}}</option>
                

                     </select>
                     </td>
                     <td class=\"text-end\">
                      <select class=\"form-select\" name=\"product_special[{{ special_row }}][type]\">
                        <option value=\"0\" {% if product_special.type == 0 %}selected{% endif %}>{{option_price}}</option>
                        <option value=\"1\" {% if product_special.type == 1 %}selected{% endif %}>{{option_percentage}}</option>
  
                       </select>

                      </td>
                     
                     
                          <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_special[{{ special_row }}][date_start]\" value=\"{{ product_special.date_start }}\" placeholder=\"{{ entry_date_start }}\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-start\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"product_special[{{ special_row }}][date_end]\" value=\"{{ product_special.date_end }}\" placeholder=\"{{ entry_date_end }}\" class=\"form-control date\"/>
                            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                          </div>
                        </td>
                        <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#special-row-{{ special_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                      </tr>
                      {% set special_row = special_row + 1 %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=\"7\"></td>
                      <td class=\"text-end\"><button type=\"button\" id=\"button-special\" data-bs-toggle=\"tooltip\" title=\"{{ button_special_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

   

            <div id=\"tab-image\" class=\"tab-pane\"  >



              <div id=\"noticeimage\" {% if product_id > 0 %} style=\"visibility: hidden;\" {% endif %} class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
              {{text_notice_image}}
              
            </div>


              <div id=\"tabimage-content\" {% if product_id == 0 %} style=\"display:none\" {% endif %}> 
                      <fieldset>
                <legend>{{ text_image }}</legend>
                <div class=\"row\">
                  <div class=\"col-sm-4 col-md-3 mb-3\">
                    <div id=\"image\" class=\"card image\">

                      {% if  thumb|split('.')|last in ['mkv', 'avi', 'mp4'] %}

                      <video  id=\"thumb-image\"   class=\"img-thumbnail thumbnail\" width=\"320\" height=\"240\">
                        <source  class=\"thumbnail\" src=\"{{  thumb }}\" type=\"video/{{  thumb|split('.')|last }}\">
                        Your browser does not support the video tag.
                      </video>

                      {% else %}
                      <img src=\"{{ thumb }}\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"{{ placeholder }}\" class=\"card-img-top\"/> 
                  
                      {% endif %}
                      <input type=\"hidden\" name=\"image\" value=\"{{ image }}\" id=\"input-image\"/>
                      <div class=\"card-body\">
                        <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                        <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>

                   

                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>{{ text_image_additional }}</legend>
                <div class=\"table-responsive\">
                  <table id=\"product-image\" class=\"table table-bordered table-hover\">
                    <thead>
                      <tr>
                        <td class=\"text-start\">{{ entry_image }}</td>
                        <td class=\"text-start\">{{ entry_sort_order }}</td>
                        <td class=\"text-end\">

                      

                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      {% set image_row = 0 %}
                      {% for product_image in product_images %}
                        <tr id=\"product-image-row-{{ image_row }}\">
                          <td>
                            <div class=\"card image\">

                              {% if  product_image.thumb|split('.')|last in ['mkv', 'avi', 'mp4'] %}

                              <video id=\"product-image-{{ image_row }}\"  class=\"img-thumbnail thumbnail\" width=\"320\" height=\"240\">
                                <source  class=\"thumbnail\" src=\"{{ product_image.thumb }}\" type=\"video/{{ product_image.thumb|split('.')|last }}\">
                                Your browser does not support the video tag.
                              </video>
                              {% else %}
                              <img src=\"{{ product_image.thumb }}\" alt=\"\" title=\"\" id=\"product-image-{{ image_row }}\" data-oc-placeholder=\"{{ placeholder }}\" class=\"card-img-top\"/> 

                              
                             {% endif %}
                             <input type=\"hidden\" name=\"product_image[{{ image_row }}][image]\" value=\"{{ product_image.image }}\" id=\"input-product-image-{{ image_row }}\"/>
                           
                              <div class=\"card-body\">
                                <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-{{ image_row }}\" data-oc-thumb=\"#product-image-{{ image_row }}\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                                <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-product-image-{{ image_row }}\" data-oc-thumb=\"#product-image-{{ image_row }}\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>
                              </div>
                            </div>
                          </td>
                          <td class=\"text-start\"><input type=\"text\" name=\"product_image[{{ image_row }}][sort_order]\" value=\"{{ product_image.sort_order }}\" placeholder=\"{{ entry_sort_order }}\" class=\"form-control\"/></td>
                          <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#product-image-row-{{ image_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                        </tr>
                        {% set image_row = image_row + 1 %}
                      {% endfor %}
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan=\"2\"></td>
                        <td class=\"text-end\"><button type=\"button\" id=\"button-image\" data-bs-toggle=\"tooltip\" title=\"{{ button_image_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>




            </div>

            <div id=\"tab-reward\" class=\"tab-pane\">
              <fieldset>
                <legend>{{ text_reward }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-points\" class=\"col-sm-2 col-form-label\">{{ entry_points }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                      <input type=\"text\" name=\"points\" value=\"{{ points }}\" placeholder=\"{{ entry_points }}\" id=\"input-points\" class=\"form-control\"/>
                 
                    </div>
                    <div class=\"form-text\">{{ help_points }}</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_points }}</legend>
                <div class=\"table-responsive\">
                  <table id=\"product-reward\" class=\"table table-bordered table-hover\">
                    <thead>
                      <tr>
                        <td class=\"text-start\">{{ entry_customer_group }}</td>
                        <td class=\"text-end\">{{ entry_reward }}&nbsp;&nbsp;
              
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      {% for customer_group in customer_groups %}
                        <tr>
                          <td class=\"text-start\">{{ customer_group.name }}</td>
                          <td class=\"text-end\"><input type=\"text\" name=\"product_reward[{{ customer_group.customer_group_id }}][points]\" value=\"{{ product_reward[customer_group.customer_group_id] ? product_reward[customer_group.customer_group_id].points }}\" class=\"form-control\"/></td>
                        </tr>
                      {% endfor %}
                    </tbody>
                  </table>
                </div>
              </fieldset>
            </div>

    
            <div id=\"tab-design\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table id=\"product-layout\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-start\">{{ entry_store }}</td>
                      <td class=\"text-start\">{{ entry_layout }}
                   
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    {% for store in stores %}
                      <tr>
                        <td class=\"text-start\">{{ store.name }}</td>
                        <td class=\"text-start\"><select name=\"product_layout[{{ store.store_id }}]\" class=\"form-select\">
                            <option value=\"\"></option>
                            {% for layout in layouts %}
                              <option value=\"{{ layout.layout_id }}\"{% if product_layout[store.store_id] and product_layout[store.store_id] == layout.layout_id %} selected{% endif %}>{{ layout.name }}</option>
                            {% endfor %}
                          </select></td>
                      </tr>
                    {% endfor %}
                  </tbody>
                </table>

              </div>
            </div>
            <div id=\"tab-report\" class=\"tab-pane\">
              <fieldset>
                <legend>{{ text_report }}</legend>
                <div id=\"report\">{{ report }}</div>
              </fieldset>
            </div>
            <div id=\"tab-variations\" class=\"tab-pane\">
        <div id=\"tab-variations\" class=\"tab-pane\">
         
</div>

              </div>
          </div>
          <input type=\"hidden\" name=\"product_id\" value=\"{{ product_id }}\" id=\"input-product-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--

  \$(document).ready(function () {
      // Get the tab content div
      var \$tabContent = \$('#tab-variations');
      window.product_id = \$(\"#input-product-id\").val();
      // URL to load content from
 

      // Function to load content
      window.loadVariations  = function () {
         // Show the loading spinner
         \$tabContent.html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');

         // Load content using AJAX
         \$tabContent.load('index.php?route=catalog/variations&user_token={{ user_token }}&product_id={{ product_id }}', function () {
            // Your loaded content's JavaScript code here
            \$(document).ready(function () {
               // Additional initialization for the loaded content
            });

            // Remove the loading spinner from the tab content
            \$tabContent.find('.fa-spinner').remove();
         });
      }

      // Register click event for the tab link
      \$('#tab-variations-link').on('click', function (e) {
         // Prevent the default behavior of the link
         e.preventDefault();

         // Load content when the tab link is clicked
         window.loadVariations();
      });
   });


\$('textarea[data-oc-toggle=\\'ckeditor\\']').ckeditor({
    language: '{{ ckeditor }}'
});

// Manufacturer
\$('#input-manufacturer').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/manufacturer.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                json.unshift({
                    manufacturer_id: 0,
                    name: '{{ text_none }}'
                });

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
        \$('#input-manufacturer').val(item['label']);
        \$('#input-manufacturer-id').val(item['value']);
    }
});

// Category
\$('#input-category').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/category.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['category_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-category').val('');

        \$('#product-category-' + item['value']).remove();

        html = '<tr id=\"product-category-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_category[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-category tbody').append(html);
    }
});

\$('#product-category').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Filter
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

        \$('#product-filter-' + item['value']).remove();

        html = '<tr id=\"product-filter-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_filter[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-filter tbody').append(html);
    }
});

\$('#product-filter').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Downloads
\$('#input-download').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/download.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['download_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-download').val('');

        \$('#product-download-' + item['value']).remove();

        html = '<tr id=\"product-download-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_download[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-download tbody').append(html);
    }
});

\$('#product-download').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

// Related
\$('#input-related').autocomplete({
    'source': function (request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function (json) {
                response(\$.map(json, function (item) {
                    return {
                        label: item['name'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function (item) {
        \$('#input-related').val('');

        \$('#product-related-' + item['value']).remove();

        html = '<tr id=\"product-related-' + item['value'] + '\">';
        html += '  <td>' + item['label'] + '<input type=\"hidden\" name=\"product_related[]\" value=\"' + item['value'] + '\"/></td>';
        html += '  <td class=\"text-end\"><button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
        html += '</tr>';

        \$('#product-related tbody').append(html);
    }
});

\$('#product-related').on('click', '.btn', function () {
    \$(this).parent().parent().remove();
});

var attributeautocomplete = function (attribute_row) {
    \$('#input-attribute-' + attribute_row).autocomplete({
        'source': function (request, response) {
            \$.ajax({
                url: 'index.php?route=catalog/attribute.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
                dataType: 'json',
                success: function (json) {
                    response(\$.map(json, function (item) {
                        return {
                            category: item.attribute_group,
                            label: item.name,
                            value: item.attribute_id
                        }
                    }));
                }
            });
        },
        'select': function (item) {
            \$('#input-attribute-' + attribute_row).val(item['label']);
            \$('#input-attribute-id-' + attribute_row).val(item['value']);
        }
    });
}

var attribute_row = {{ attribute_row }};

\$('#product-attribute tr').each(function (index) {
    attributeautocomplete(index);
});

\$('#button-attribute').on('click', function () {
    html = '<tr id=\"attribute-row-' + attribute_row + '\">';
    html += '  <td class=\"text-start\">';
    html += '    <input type=\"text\" name=\"product_attribute[' + attribute_row + '][name]\" value=\"\" placeholder=\"{{ entry_attribute|escape('js') }}\" id=\"input-attribute-' + attribute_row + '\" data-oc-target=\"autocomplete-attribute-' + attribute_row + '\" class=\"form-control\" autocomplete=\"off\"/>';
    html += '    <input type=\"hidden\" name=\"product_attribute[' + attribute_row + '][attribute_id]\" value=\"\" id=\"input-attribute-id-' + attribute_row + '\"/>';
    html += '    <ul id=\"autocomplete-attribute-' + attribute_row + '\" class=\"dropdown-menu\"></ul>';
    html += '  </td>';
    html += '  <td class=\"text-start\">';
  {% for language in languages %}
    html += '<div class=\"input-group\">';
    html += '  <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name|escape('js') }}\" /></div>';
    html += '  <textarea name=\"product_attribute[' + attribute_row + '][product_attribute_description][{{ language.language_id }}][text]\" rows=\"5\" placeholder=\"{{ entry_text|escape('js') }}\" id=\"input-text-' + attribute_row + '-{{ language.language_id }}\" class=\"form-control\"></textarea>';
    html += '</div>';
  {% endfor %}
    html += '  </td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#attribute-row-' + attribute_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-attribute').append(html);

    attributeautocomplete(attribute_row);

    attribute_row++;
});

 
 

var discount_row = {{ discount_row }};

\$('#button-discount').on('click', function () {
    html = '<tr id=\"discount-row-' + discount_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_discount[' + discount_row + '][customer_group_id]\" class=\"form-select\">';
  {% for customer_group in customer_groups %}
    html += '    <option value=\"{{ customer_group.customer_group_id }}\">{{ customer_group.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select><input type=\"hidden\" name=\"product_discount[' + discount_row + '][product_discount_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][quantity]\" value=\"\" placeholder=\"{{ entry_quantity|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][priority]\" value=\"\" placeholder=\"{{ entry_priority|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][price]\" value=\"\" placeholder=\"{{ entry_price|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_start]\" value=\"\" placeholder=\"{{ entry_date_start|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_end]\" value=\"\" placeholder=\"{{ entry_date_end|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#discount-row-' + discount_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-discount tbody').append(html);

    discount_row++;
});

var special_row = {{ special_row }};

\$('#button-special').on('click', function () {
    html = '<tr id=\"special-row-' + special_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_special[' + special_row + '][customer_group_id]\" class=\"form-select\">';
  {% for customer_group in customer_groups %}
    html += '      <option value=\"{{ customer_group.customer_group_id }}\">{{ customer_group.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select><input type=\"hidden\" name=\"product_special[' + special_row + '][product_special_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][priority]\" value=\"\" placeholder=\"{{ entry_priority|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][price]\" value=\"\" placeholder=\"{{ entry_price|escape('js') }}\" class=\"form-control\"/></td>';
  
    html += '  </select></td>';
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][apply]\" class=\"form-select\">';
    html += '      <option value=\"0\">{{option_product_price}}</option>';
    html += '      <option value=\"1\">{{option_end_price}}</option>';
    html += '  </select></td>';

    // New select for \"type\"
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][type]\" class=\"form-select\">';
    html += '      <option value=\"0\">{{option_price}}</option>';
    html += '      <option value=\"1\">{{option_percentage}}</option>';
    html += '  </select></td>';
  
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_start]\" value=\"\" placeholder=\"{{ entry_date_start|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_end]\" value=\"\" placeholder=\"{{ entry_date_end|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#special-row-' + special_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-special tbody').append(html);

    special_row++;
});

var image_row = {{ image_row }};

\$('#button-image').on('click', function () {
    html = '<tr id=\"product-image-row-' + image_row + '\">';
    html += '  <td><div class=\"card image\">';
    html += '    <img src=\"{{ placeholder|escape('js') }}\" alt=\"\" title=\"\" id=\"thumb-image-' + image_row + '\" data-oc-placeholder=\"{{ placeholder|escape('js') }}\" class=\"card-img-top\"/> <input type=\"hidden\" name=\"product_image[' + image_row + '][image]\" value=\"\" id=\"input-product-image-' + image_row + '\"/>';
    html += '    <div class=\"card-body\">';
    html += '      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-product-image-' + image_row + '\" data-oc-thumb=\"#thumb-image-' + image_row + '\" class=\"btn btn-primary btn-sm btn-block\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit|escape('js') }}</button>';
    html += '      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-product-image-' + image_row + '\" data-oc-thumb=\"#thumb-image-' + image_row + '\" class=\"btn btn-warning btn-sm btn-block\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear|escape('js') }}</button>';
    html += '    </div>';
    html += '  </div></td>';
    html += '  <td class=\"text-start\"><input type=\"text\" name=\"product_image[' + image_row + '][sort_order]\" value=\"0\" placeholder=\"{{ entry_sort_order|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#product-image-row-' + image_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-image tbody').append(html);

    image_row++;
});

var subscription_row = {{ subscription_row }};

\$('#button-subscription').on('click', function () {
    html = '<tr id=\"subscription-row-' + subscription_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][subscription_plan_id]\" class=\"form-select\">';
  {% for subscription_plan in subscription_plans %}
    html += '      <option value=\"{{ subscription_plan.subscription_plan_id }}\">{{ subscription_plan.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select></td>';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][customer_group_id]\" class=\"form-select\">';
  {% for customer_group in customer_groups %}
    html += '      <option value=\"{{ customer_group.customer_group_id }}\">{{ customer_group.name|escape('js') }}</option>';
  {% endfor %}
    html += '  <select></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][trial_price]\" value=\"\" placeholder=\"{{ entry_trial_price|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][price]\" value=\"\" placeholder=\"{{ entry_price|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#subscription-row-' + subscription_row + '\\').remove()\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-subscription tbody').append(html);

    subscription_row++;
});
 
\$('#report').on('click', '.pagination a', function (e) {
    e.preventDefault();

    \$('#report').load(this.href);
});

 

    \$(document).ready(function () {

 var canWriteSeo = false;
    // Attach keypress event listener to the input field
 // Attach keypress event listener to the input field
 \$('input[name^=\"product_description[\"][name\$=\"[name]\"]').on('input', function() {
      // Get the number inside the brackets, i.e., [1], [2], etc.
      var index = \$(this).attr('name').match(/\\[(\\d+)\\]/)[1];
      
      // Get the input value and convert to meta title format
      var inputValue = \$(this).val();
      var metaTitleValue = inputValue;

      // Update the corresponding meta title field
      \$('input[name=\"product_description[' + index + '][meta_title]\"]').val(metaTitleValue);
       metaTitleValue = metaTitleValue.toLowerCase().replace(/\\s+/g, '-');
      // Check if the associated SEO URL field is empty and update it if needed
      \$('input[name\$=\"[1]\"][name^=\"product_seo_url\"]').each(function() {
      if (\$(this).val().length === 0) {
        canWriteSeo = true;
      }
      if (canWriteSeo) {
        \$(this).val(metaTitleValue);
      }
    });
    });
 

    // Intercept form submission
    \$('#form-product').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Perform your custom actions before sending the form data

        // Send the form data using AJAX
        \$.ajax({
            type: 'POST',
            url: \$('#form-product').attr('action'),
            data: \$('#form-product').serialize(), // Serialize the form data
            success: function (response) {
              if (response.product_id) {
                \$(\"#noticeimage\").hide();
                \$(\"#tabimage-content\").show();
                \$(\"#input-product-id\").val(response.product_id);
                window.product_id = response.product_id;
              }
                if (response.success) { 
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + response.success + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                } else {
                  if (typeof response.error !== \"undefined\") {
                    console.log( response.error)
                    Object.entries(response.error).map(([key, value]) => {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + key + ': ' + value + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    });
                  } else {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(response) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }
              }
                setTimeout(() => {
                    \$(\".alert\").alert('close');
                }, 5500);

             
                // Handle the successful response here
                var userToken = encodeURIComponent('{{user_token}}');
    var productId =  \$(\"#input-product-id\").val();
    //submit occurred reload option tab content
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
      

                // You can perform additional actions or update the UI based on the response
            },
            error: function (error) {
                alert(JSON.stringify(error));
         
               
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + JSON.stringify(error) + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                
                setTimeout(() => {
                    \$(\".alert\").alert('close');
                }, 5500);

                var userToken = encodeURIComponent('{{user_token}}');
    var productId =  \$(\"#input-product-id\").val();
    //error occurred, reload option tab content
    \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
     \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
            }
        });
    });
    var userToken = encodeURIComponent('{{user_token}}');
    var productId =  \$(\"#input-product-id\").val();
   //initial page load, load option tab content
   \$(\"#option\").html('<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  ');
    \$(\"#option\").load('index.php?route=catalog/product.reloadOptions&user_token=' + userToken + '&product_id=' + productId);
});

\$(document).ready(function() {
 
    \$(\"select[name^='product_special']\").change(function() {
 
        var selectedValue = \$(this).val();
       if (\$(this).attr('name').endsWith('[apply]') && selectedValue == 0) {
        let selname = \$(this).attr('name').replace('apply','type');
        \$(\"select[name='\" + selname + \"'] option[value='0']\").prop('disabled', false);
     
       }

       if (\$(this).attr('name').endsWith('[apply]') && selectedValue == 1) {
        let selname = \$(this).attr('name').replace('apply','type');
        \$(\"select[name='\" + selname + \"']\").val('1');
        \$(\"select[name='\" + selname + \"'] option[value='0']\").prop('disabled', true);
       }


    });

    
});

 


//--></script>

<!-- options tab -->
<script>
  \$(document).ready(function() {
 
    \$(document).on('click', '.add-or-edit-btn', function () {
var rowId = \$(\"#\" + \$(this).data('option-value-row'));

 
 
var icon = \$(this).find('i');
var tr =  \$(this).closest('table');

opt = tr.find('.option-select :selected:first').text();

 
 rowId.find('.option-title-accordion').text(opt.trim());

if (icon.hasClass('fa-unlock')) {
  // If it's currently unlocked, change icon to lock and remove .read-only class
  icon.removeClass('fa-unlock').addClass('fa-lock');
  tr.find('input, select').removeClass('read-only');
} else {
  // If it's currently locked, change icon to unlock and add .read-only class
  icon.removeClass('fa-lock').addClass('fa-unlock');
  tr.find('input, select').addClass('read-only');
}
});

\$(document).on('click', '.add-q-option', function () {
\$(this).hide();
event.preventDefault();
window.addQuickOption();
});
    
  });

  \$(document).on('click', '.add-opt-button', function () {
  let rowId = \$(this).data('option-row');
 
  let valuerow = \$(\"#option-row-\" + rowId + \" .accordion-item\").length - 1;
  let template = \$('#option-template-div').html();
  valuerow++;
  valuerow++;
 
  \$('#collapse' + rowId).attr('aria-expanded', 'true');
  \$('#collapse' + rowId).removeClass('collapse');
 

template = template.replace(/xxx/g, '' );
template = template.replace(/option-row-placeholder/g, rowId);
template = template.replace(/option-valuerow-placeholder/g, valuerow );
 
 let copySelect = \$(\"#select-default-row-\" + rowId).clone();
 copySelect.removeClass('d-none');
 copySelect.addClass('read-only');
 let selname = \"product_option[\"  + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\"
 copySelect.attr('name', selname);
 copySelect.addClass('option-select');
 let position = \$(\"#option-row-\"  + rowId + \" .accordion-item\").length - 1;
 let selectedOptionValue = copySelect.find('option:eq('+ position + ')').val();
 template = template.replace(/option-name-placeholder/g, copySelect.find('option:eq('+ position + ')').text());

 template = \$(template);
 template.find('.insertselect').append(copySelect);

 

// Set the value attribute of the input
let inputName = \"product_option[\" + rowId + \"][product_option_value][\" + valuerow + \"][option_value_id]\";
 
template.find('[name=\"' + inputName + '\"]').val(selectedOptionValue);
\$(\"#option-row-body-\" + rowId).append(template);
 
   initializeSortables();
 
 
});
</script>
{{ footer }}
", "admin/view/template/catalog/product_form.twig", "/var/www/html/admin/view/template/catalog/product_form.twig");
    }
}
