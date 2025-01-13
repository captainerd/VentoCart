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

/* cp-akis/view//plates/design/layout_form.twig */
class __TwigTemplate_a1b584f06b520a2a941d66adb06d4e89 extends Template
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
  <style>
\t.my-handle {
\t\tcursor: grab;
\t\tfont-size: 21px;
\t\tcursor: -webkit-grabbing;
\t\tcolor: #595959;
\t}
</style>
<script  src=\"view/javascript/Sortable.min.js\"></script>
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-layout\" data-bs-toggle=\"tooltip\" title=\"";
        // line 16
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 17
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>";
        // line 18
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 21
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 21);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 21);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 28
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-layout\" action=\"";
        // line 30
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
          <fieldset>
            <legend>";
        // line 32
        echo ($context["text_route"] ?? null);
        echo "</legend>
            <div class=\"row mb-3 required\">
              <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 34
        echo ($context["entry_name"] ?? null);
        echo "</label>
              <div class=\"col-sm-10\">
                <input type=\"text\" name=\"name\" value=\"";
        // line 36
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                <div id=\"error-name\" class=\"invalid-feedback\"></div>
              </div>
            </div>
            <br/>
            <table id=\"route\" class=\"table table-bordered table-hover\">
              <thead>
                <tr>
                  <td class=\"text-start\">";
        // line 44
        echo ($context["entry_store"] ?? null);
        echo "</td>
                  <td class=\"text-start\">";
        // line 45
        echo ($context["entry_route"] ?? null);
        echo "</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                ";
        // line 50
        $context["route_row"] = 0;
        // line 51
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layout_routes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout_route"]) {
            // line 52
            echo "                  <tr id=\"route-row-";
            echo ($context["route_row"] ?? null);
            echo "\">
                    <td class=\"text-start\"><select name=\"layout_route[";
            // line 53
            echo ($context["route_row"] ?? null);
            echo "][store_id]\" class=\"form-select\">
                        <option value=\"0\">";
            // line 54
            echo ($context["text_default"] ?? null);
            echo "</option>
                        ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                // line 56
                echo "                          <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 56);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 56) == twig_get_attribute($this->env, $this->source, $context["layout_route"], "store_id", [], "any", false, false, false, 56))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 56);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                      </select></td>
                    <td class=\"text-start\"><input type=\"text\" name=\"layout_route[";
            // line 59
            echo ($context["route_row"] ?? null);
            echo "][route]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["layout_route"], "route", [], "any", false, false, false, 59);
            echo "\" placeholder=\"";
            echo twig_escape_filter($this->env, ($context["entry_route"] ?? null), "js");
            echo "\" class=\"form-control\"/></td>
                    <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#route-row-";
            // line 60
            echo ($context["route_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                  ";
            // line 62
            $context["route_row"] = (($context["route_row"] ?? null) + 1);
            // line 63
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout_route'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "              </tbody>
              <tfoot>
                <tr>
                  <td colspan=\"2\"></td>
                  <td class=\"text-end\"><button type=\"button\" onclick=\"addRoute();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 68
        echo twig_escape_filter($this->env, ($context["button_route_add"] ?? null), "js");
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                </tr>
              </tfoot>
            </table>
          </fieldset>
          <fieldset>
            <legend>";
        // line 74
        echo ($context["text_module"] ?? null);
        echo "</legend>
            ";
        // line 75
        $context["module_row"] = 0;
        // line 76
        echo "            <div class=\"row\">
              <div class=\"col-lg-3 col-md-4 col-sm-12\">
                <table id=\"module-column-left\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">";
        // line 81
        echo ($context["text_column_left"] ?? null);
        echo "</td>
                    </tr>
                  </thead>
                  <tbody  class=\"listWithHandle\">
                    ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layout_modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout_module"]) {
            // line 86
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 86) == "column_left")) {
                // line 87
                echo "                        <tr data-modid=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "layout_module_id", [], "any", false, false, false, 87);
                echo "\"  id=\"module-row-";
                echo ($context["module_row"] ?? null);
                echo "\">
                          <td class=\"text-start\"> 
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[";
                // line 93
                echo ($context["module_row"] ?? null);
                echo "][code]\" class=\"form-select input-sm\">
                                ";
                // line 94
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                    // line 95
                    echo "                                  <optgroup label=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 95);
                    echo "\">
                                    ";
                    // line 96
                    if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 96)) {
                        // line 97
                        echo "                                      <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 97);
                        echo "\"";
                        if ((twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 97) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 97))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 97);
                        echo "</option>
                                    ";
                    } else {
                        // line 99
                        echo "                                      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 99));
                        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                            // line 100
                            echo "                                        <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 100);
                            echo "\"";
                            if ((twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 100) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 100))) {
                                echo " selected";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 100);
                            echo "</option>
                                      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 102
                        echo "                                    ";
                    }
                    // line 103
                    echo "                                  </optgroup>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                echo "                              </select> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][position]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 105);
                echo "\"/> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][sort_order]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "sort_order", [], "any", false, false, false, 105);
                echo "\"/> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "edit", [], "any", false, false, false, 105);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-";
                // line 106
                echo ($context["module_row"] ?? null);
                echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
                echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
                echo "\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        ";
                // line 110
                $context["module_row"] = (($context["module_row"] ?? null) + 1);
                // line 111
                echo "                      ";
            }
            // line 112
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout_module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('column-left');\" data-bs-toggle=\"tooltip\" title=\"";
        // line 116
        echo twig_escape_filter($this->env, ($context["button_module_add"] ?? null), "js");
        echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class=\"col-lg-6 col-md-4 col-sm-12\">
                <table id=\"module-content-top\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">";
        // line 125
        echo ($context["text_content_top"] ?? null);
        echo "</td>
                    </tr>
                  </thead>
                  <tbody   class=\"listWithHandle\">
                    ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layout_modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout_module"]) {
            // line 130
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 130) == "content_top")) {
                // line 131
                echo "                        <tr data-modid=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "layout_module_id", [], "any", false, false, false, 131);
                echo "\"  id=\"module-row-";
                echo ($context["module_row"] ?? null);
                echo "\">
                          <td class=\"text-start\">
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[";
                // line 137
                echo ($context["module_row"] ?? null);
                echo "][code]\" class=\"form-select input-sm\">
                                ";
                // line 138
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                    // line 139
                    echo "                                  <optgroup label=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 139);
                    echo "\">
                                    ";
                    // line 140
                    if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 140)) {
                        // line 141
                        echo "                                      <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 141);
                        echo "\"";
                        if ((twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 141) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 141))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 141);
                        echo "</option>
                                    ";
                    } else {
                        // line 143
                        echo "                                      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 143));
                        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                            // line 144
                            echo "                                        <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 144);
                            echo "\"";
                            if ((twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 144) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 144))) {
                                echo " selected";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 144);
                            echo "</option>
                                      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 146
                        echo "                                    ";
                    }
                    // line 147
                    echo "                                  </optgroup>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 149
                echo "                              </select><input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][position]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 149);
                echo "\"/> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][sort_order]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "sort_order", [], "any", false, false, false, 149);
                echo "\"/> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "edit", [], "any", false, false, false, 149);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-";
                // line 150
                echo ($context["module_row"] ?? null);
                echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_remove"] ?? null);
                echo "\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        ";
                // line 154
                $context["module_row"] = (($context["module_row"] ?? null) + 1);
                // line 155
                echo "                      ";
            }
            // line 156
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout_module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 157
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('content-top');\" data-bs-toggle=\"tooltip\" title=\"";
        // line 160
        echo ($context["button_module_add"] ?? null);
        echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
                <table id=\"module-content-bottom\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">";
        // line 167
        echo ($context["text_content_bottom"] ?? null);
        echo "</td>
                    </tr>
                  </thead>
                  <tbody    class=\"listWithHandle\">
                    ";
        // line 171
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layout_modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout_module"]) {
            // line 172
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 172) == "content_bottom")) {
                // line 173
                echo "                        <tr data-modid=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "layout_module_id", [], "any", false, false, false, 173);
                echo "\" id=\"module-row-";
                echo ($context["module_row"] ?? null);
                echo "\"> 
                          <td class=\"text-start\">\t 
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[";
                // line 179
                echo ($context["module_row"] ?? null);
                echo "][code]\" class=\"form-select input-sm\">
                                ";
                // line 180
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                    // line 181
                    echo "                                  <optgroup label=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 181);
                    echo "\">
                                    ";
                    // line 182
                    if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 182)) {
                        // line 183
                        echo "                                      <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 183);
                        echo "\"";
                        if ((twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 183) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 183))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 183);
                        echo "</option>
                                    ";
                    } else {
                        // line 185
                        echo "                                      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 185));
                        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                            // line 186
                            echo "                                        <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 186);
                            echo "\"";
                            if ((twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 186) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 186))) {
                                echo " selected";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 186);
                            echo "</option>
                                      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 188
                        echo "                                    ";
                    }
                    // line 189
                    echo "                                  </optgroup>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 191
                echo "                              </select> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][position]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 191);
                echo "\"/> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][sort_order]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "sort_order", [], "any", false, false, false, 191);
                echo "\"/> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "edit", [], "any", false, false, false, 191);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-";
                // line 192
                echo ($context["module_row"] ?? null);
                echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_remove"] ?? null);
                echo "\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        ";
                // line 196
                $context["module_row"] = (($context["module_row"] ?? null) + 1);
                // line 197
                echo "                      ";
            }
            // line 198
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout_module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 199
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('content-bottom');\" data-bs-toggle=\"tooltip\" title=\"";
        // line 202
        echo ($context["button_module_add"] ?? null);
        echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class=\"col-lg-3 col-md-4 col-sm-12\">
                <table id=\"module-column-right\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">";
        // line 211
        echo ($context["text_column_right"] ?? null);
        echo "</td>
                    </tr>
                  </thead>
                  <tbody class=\"listWithHandle\">
                    ";
        // line 215
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layout_modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout_module"]) {
            // line 216
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 216) == "column_right")) {
                // line 217
                echo "                        <tr data-modid=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "layout_module_id", [], "any", false, false, false, 217);
                echo "\" id=\"module-row-";
                echo ($context["module_row"] ?? null);
                echo "\">
                          <td class=\"text-end\">
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[";
                // line 223
                echo ($context["module_row"] ?? null);
                echo "][code]\" class=\"form-select input-sm\">
                                ";
                // line 224
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                    // line 225
                    echo "                                  <optgroup label=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 225);
                    echo "\">
                                    ";
                    // line 226
                    if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 226)) {
                        // line 227
                        echo "                                    <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 227);
                        echo "\"";
                        if ((twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 227) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 227))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 227);
                        echo "</option>
                                  ";
                    } else {
                        // line 229
                        echo "                                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 229));
                        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                            // line 230
                            echo "                                      <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 230);
                            echo "\"";
                            if ((twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 230) == twig_get_attribute($this->env, $this->source, $context["layout_module"], "code", [], "any", false, false, false, 230))) {
                                echo " selected";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 230);
                            echo "</option>
                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 232
                        echo "                                    ";
                    }
                    // line 233
                    echo "                                  </optgroup>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 235
                echo "                              </select> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][position]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "position", [], "any", false, false, false, 235);
                echo "\"/> <input type=\"hidden\" name=\"layout_module[";
                echo ($context["module_row"] ?? null);
                echo "][sort_order]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "sort_order", [], "any", false, false, false, 235);
                echo "\"/> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["layout_module"], "edit", [], "any", false, false, false, 235);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-";
                // line 236
                echo ($context["module_row"] ?? null);
                echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_remove"] ?? null);
                echo "\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        ";
                // line 240
                $context["module_row"] = (($context["module_row"] ?? null) + 1);
                // line 241
                echo "                      ";
            }
            // line 242
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout_module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 243
        echo "                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('column-right');\" data-bs-toggle=\"tooltip\" title=\"";
        // line 246
        echo ($context["button_module_add"] ?? null);
        echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </fieldset>
          <input type=\"hidden\" name=\"layout_id\" value=\"";
        // line 253
        echo ($context["layout_id"] ?? null);
        echo "\" id=\"input-layout-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
var route_row = ";
        // line 260
        echo ($context["route_row"] ?? null);
        echo ";

function addRoute() {
    html = '<tr id=\"route-row-' + route_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"layout_route[' + route_row + '][store_id]\" class=\"form-select\">';
    html += '  <option value=\"0\">";
        // line 265
        echo twig_escape_filter($this->env, ($context["text_default"] ?? null), "js");
        echo "</option>';
  ";
        // line 266
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 267
            echo "    html += '<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 267);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 267), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 269
        echo "    html += '  </select></td>';
    html += '  <td class=\"text-start\"><input type=\"text\" name=\"layout_route[' + route_row + '][route]\" value=\"\" placeholder=\"";
        // line 270
        echo twig_escape_filter($this->env, ($context["entry_route"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#route-row-' + route_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 271
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#route tbody').append(html);

    route_row++;
}

var module_row = ";
        // line 279
        echo ($context["module_row"] ?? null);
        echo ";

function addModule(type) {
    html = '<tr id=\"module-row-' + module_row + '\">';
    html += '  <td class=\"text-start\"><div class=\"input-group input-group-sm\">    <span class=\"my-handle\" aria-hidden=\"true\"> <i class=\"fa-solid mx-2 fa-grip-vertical\"></i> </span>';
    html += '    <select name=\"layout_module[' + module_row + '][code]\" class=\"form-select input-sm\">';
  ";
        // line 285
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
            // line 286
            echo "    html += '    <optgroup label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 286), "js");
            echo "\">';
  ";
            // line 287
            if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 287)) {
                // line 288
                echo "    html += '      <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 288), "js");
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 288), "js");
                echo "</option>';
  ";
            } else {
                // line 290
                echo "  ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "module", [], "any", false, false, false, 290));
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    // line 291
                    echo "    html += '      <option value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 291), "js");
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 291), "js");
                    echo "</option>';
  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 293
                echo "  ";
            }
            // line 294
            echo "    html += '    </optgroup>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 296
        echo "    html += '  </select>';
    html += '  <input type=\"hidden\" name=\"layout_module[' + module_row + '][position]\" value=\"' + type.replaceAll('-', '_') + '\" />';
    html += '  <input type=\"hidden\" name=\"layout_module[' + module_row + '][sort_order]\" value=\"\" />';
    html += '  <a href=\" data-bs-toggle=\"tooltip\" title=\"";
        // line 299
        echo twig_escape_filter($this->env, ($context["button_edit"] ?? null), "js");
        echo "\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a><button type=\"button\" onclick=\"\$(\\'#module-row-' + module_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>';
    html += '  </div></td>';
    html += '</tr>';

    \$('#module-' + type + ' tbody').append(html);

    \$('#module-' + type + ' tbody input[name*=\\'sort_order\\']').each(function (i, element) {
        \$(element).val(i);
    });

    \$('#module-' + type + ' select:last').trigger('change');

    module_row++;
    initializeSortables();
}

\$('#module-column-left, #module-column-right, #module-content-top, #module-content-bottom').on('change', 'select[name*=\\'code\\']', function () {
    var part = this.value.split('.');

    if (typeof part[2] == 'undefined') {
        \$(this).parent().find('a').attr('href', 'index.php?route=extension/' + part[0] + '/module/' + part[1] + '&user_token=";
        // line 319
        echo ($context["user_token"] ?? null);
        echo "');
    } else {
        \$(this).parent().find('a').attr('href', 'index.php?route=extension/' + part[0] + '/module/' + part[1] + '&user_token=";
        // line 321
        echo ($context["user_token"] ?? null);
        echo "&module_id=' + part[2]);
    }
});

function initializeSortables() {
\t\t\$('.listWithHandle').each(function () {
\t\t\t// Check if Sortable instance already exists
\t\t\tif (!\$(this).data('sortable')) {
\t\t\t\t// Create Sortable instance
\t\t\t\tSortable.create(this, {
\t\t\t\t\thandle: '.my-handle',
\t\t\t\t\tanimation: 150,
\t\t\t\t\tonEnd: function (event) {
\t\t\t\t\t\t// Update the values after sorting is complete
\t\t\t\t\t\thandleSortEnd(event.item);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t});
\t}
  initializeSortables();

\tfunction handleSortEnd(sortedItem) {
 
\t\tlet categoryPositions = {};
  
    \$(sortedItem).closest('tbody').find('tr').each(function (index) {
      \$(this).find('input[name^=\"layout_module\"][name\$=\"[sort_order]\"]').val(index);
\t\t\tlet catId = \$(this).data('modid');
      if (!catId) return;
     
\t\t\tcategoryPositions[catId] = index;
\t\t});
 
\t}
 
 
 
//--></script>
";
        // line 360
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/design/layout_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  953 => 360,  911 => 321,  906 => 319,  881 => 299,  876 => 296,  869 => 294,  866 => 293,  855 => 291,  850 => 290,  842 => 288,  840 => 287,  835 => 286,  831 => 285,  822 => 279,  811 => 271,  807 => 270,  804 => 269,  793 => 267,  789 => 266,  785 => 265,  777 => 260,  767 => 253,  757 => 246,  752 => 243,  746 => 242,  743 => 241,  741 => 240,  732 => 236,  717 => 235,  710 => 233,  707 => 232,  692 => 230,  687 => 229,  675 => 227,  673 => 226,  668 => 225,  664 => 224,  660 => 223,  648 => 217,  645 => 216,  641 => 215,  634 => 211,  622 => 202,  617 => 199,  611 => 198,  608 => 197,  606 => 196,  597 => 192,  582 => 191,  575 => 189,  572 => 188,  557 => 186,  552 => 185,  540 => 183,  538 => 182,  533 => 181,  529 => 180,  525 => 179,  513 => 173,  510 => 172,  506 => 171,  499 => 167,  489 => 160,  484 => 157,  478 => 156,  475 => 155,  473 => 154,  464 => 150,  449 => 149,  442 => 147,  439 => 146,  424 => 144,  419 => 143,  407 => 141,  405 => 140,  400 => 139,  396 => 138,  392 => 137,  380 => 131,  377 => 130,  373 => 129,  366 => 125,  354 => 116,  349 => 113,  343 => 112,  340 => 111,  338 => 110,  329 => 106,  314 => 105,  307 => 103,  304 => 102,  289 => 100,  284 => 99,  272 => 97,  270 => 96,  265 => 95,  261 => 94,  257 => 93,  245 => 87,  242 => 86,  238 => 85,  231 => 81,  224 => 76,  222 => 75,  218 => 74,  209 => 68,  203 => 64,  197 => 63,  195 => 62,  188 => 60,  180 => 59,  177 => 58,  162 => 56,  158 => 55,  154 => 54,  150 => 53,  145 => 52,  140 => 51,  138 => 50,  130 => 45,  126 => 44,  113 => 36,  108 => 34,  103 => 32,  98 => 30,  93 => 28,  86 => 23,  75 => 21,  71 => 20,  66 => 18,  60 => 17,  56 => 16,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}

<div id=\"content\">
  <style>
\t.my-handle {
\t\tcursor: grab;
\t\tfont-size: 21px;
\t\tcursor: -webkit-grabbing;
\t\tcolor: #595959;
\t}
</style>
<script  src=\"view/javascript/Sortable.min.js\"></script>
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-layout\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
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
        <form id=\"form-layout\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <fieldset>
            <legend>{{ text_route }}</legend>
            <div class=\"row mb-3 required\">
              <label for=\"input-name\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
              <div class=\"col-sm-10\">
                <input type=\"text\" name=\"name\" value=\"{{ name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name\" class=\"form-control\"/>
                <div id=\"error-name\" class=\"invalid-feedback\"></div>
              </div>
            </div>
            <br/>
            <table id=\"route\" class=\"table table-bordered table-hover\">
              <thead>
                <tr>
                  <td class=\"text-start\">{{ entry_store }}</td>
                  <td class=\"text-start\">{{ entry_route }}</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                {% set route_row = 0 %}
                {% for layout_route in layout_routes %}
                  <tr id=\"route-row-{{ route_row }}\">
                    <td class=\"text-start\"><select name=\"layout_route[{{ route_row }}][store_id]\" class=\"form-select\">
                        <option value=\"0\">{{ text_default }}</option>
                        {% for store in stores %}
                          <option value=\"{{ store.store_id }}\"{% if store.store_id == layout_route.store_id %} selected{% endif %}>{{ store.name }}</option>
                        {% endfor %}
                      </select></td>
                    <td class=\"text-start\"><input type=\"text\" name=\"layout_route[{{ route_row }}][route]\" value=\"{{ layout_route.route }}\" placeholder=\"{{ entry_route|escape('js') }}\" class=\"form-control\"/></td>
                    <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#route-row-{{ route_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
                  </tr>
                  {% set route_row = route_row + 1 %}
                {% endfor %}
              </tbody>
              <tfoot>
                <tr>
                  <td colspan=\"2\"></td>
                  <td class=\"text-end\"><button type=\"button\" onclick=\"addRoute();\" data-bs-toggle=\"tooltip\" title=\"{{ button_route_add|escape('js') }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
                </tr>
              </tfoot>
            </table>
          </fieldset>
          <fieldset>
            <legend>{{ text_module }}</legend>
            {% set module_row = 0 %}
            <div class=\"row\">
              <div class=\"col-lg-3 col-md-4 col-sm-12\">
                <table id=\"module-column-left\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">{{ text_column_left }}</td>
                    </tr>
                  </thead>
                  <tbody  class=\"listWithHandle\">
                    {% for layout_module in layout_modules %}
                      {% if layout_module.position == 'column_left' %}
                        <tr data-modid=\"{{layout_module.layout_module_id}}\"  id=\"module-row-{{ module_row }}\">
                          <td class=\"text-start\"> 
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[{{ module_row }}][code]\" class=\"form-select input-sm\">
                                {% for extension in extensions %}
                                  <optgroup label=\"{{ extension.name }}\">
                                    {% if not extension.module %}
                                      <option value=\"{{ extension.code }}\"{% if extension.code == layout_module.code %} selected{% endif %}>{{ extension.name }}</option>
                                    {% else %}
                                      {% for module in extension.module %}
                                        <option value=\"{{ module.code }}\"{% if module.code == layout_module.code %} selected{% endif %}>{{ module.name }}</option>
                                      {% endfor %}
                                    {% endif %}
                                  </optgroup>
                                {% endfor %}
                              </select> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][position]\" value=\"{{ layout_module.position }}\"/> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][sort_order]\" value=\"{{ layout_module.sort_order }}\"/> <a href=\"{{ layout_module.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-{{ module_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        {% set module_row = module_row + 1 %}
                      {% endif %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('column-left');\" data-bs-toggle=\"tooltip\" title=\"{{ button_module_add|escape('js') }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class=\"col-lg-6 col-md-4 col-sm-12\">
                <table id=\"module-content-top\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">{{ text_content_top }}</td>
                    </tr>
                  </thead>
                  <tbody   class=\"listWithHandle\">
                    {% for layout_module in layout_modules %}
                      {% if layout_module.position == 'content_top' %}
                        <tr data-modid=\"{{layout_module.layout_module_id}}\"  id=\"module-row-{{ module_row }}\">
                          <td class=\"text-start\">
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[{{ module_row }}][code]\" class=\"form-select input-sm\">
                                {% for extension in extensions %}
                                  <optgroup label=\"{{ extension.name }}\">
                                    {% if not extension.module %}
                                      <option value=\"{{ extension.code }}\"{% if extension.code == layout_module.code %} selected{% endif %}>{{ extension.name }}</option>
                                    {% else %}
                                      {% for module in extension.module %}
                                        <option value=\"{{ module.code }}\"{% if module.code == layout_module.code %} selected{% endif %}>{{ module.name }}</option>
                                      {% endfor %}
                                    {% endif %}
                                  </optgroup>
                                {% endfor %}
                              </select><input type=\"hidden\" name=\"layout_module[{{ module_row }}][position]\" value=\"{{ layout_module.position }}\"/> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][sort_order]\" value=\"{{ layout_module.sort_order }}\"/> <a href=\"{{ layout_module.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-{{ module_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        {% set module_row = module_row + 1 %}
                      {% endif %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('content-top');\" data-bs-toggle=\"tooltip\" title=\"{{ button_module_add }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
                <table id=\"module-content-bottom\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">{{ text_content_bottom }}</td>
                    </tr>
                  </thead>
                  <tbody    class=\"listWithHandle\">
                    {% for layout_module in layout_modules %}
                      {% if layout_module.position == 'content_bottom' %}
                        <tr data-modid=\"{{layout_module.layout_module_id}}\" id=\"module-row-{{ module_row }}\"> 
                          <td class=\"text-start\">\t 
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[{{ module_row }}][code]\" class=\"form-select input-sm\">
                                {% for extension in extensions %}
                                  <optgroup label=\"{{ extension.name }}\">
                                    {% if not extension.module %}
                                      <option value=\"{{ extension.code }}\"{% if extension.code == layout_module.code %} selected{% endif %}>{{ extension.name }}</option>
                                    {% else %}
                                      {% for module in extension.module %}
                                        <option value=\"{{ module.code }}\"{% if module.code == layout_module.code %} selected{% endif %}>{{ module.name }}</option>
                                      {% endfor %}
                                    {% endif %}
                                  </optgroup>
                                {% endfor %}
                              </select> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][position]\" value=\"{{ layout_module.position }}\"/> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][sort_order]\" value=\"{{ layout_module.sort_order }}\"/> <a href=\"{{ layout_module.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-{{ module_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        {% set module_row = module_row + 1 %}
                      {% endif %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('content-bottom');\" data-bs-toggle=\"tooltip\" title=\"{{ button_module_add }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class=\"col-lg-3 col-md-4 col-sm-12\">
                <table id=\"module-column-right\" class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-center\">{{ text_column_right }}</td>
                    </tr>
                  </thead>
                  <tbody class=\"listWithHandle\">
                    {% for layout_module in layout_modules %}
                      {% if layout_module.position == 'column_right' %}
                        <tr data-modid=\"{{layout_module.layout_module_id}}\" id=\"module-row-{{ module_row }}\">
                          <td class=\"text-end\">
                            <div class=\"input-group input-group-sm\">
                              <span class=\"my-handle\" aria-hidden=\"true\">
                                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                              </span>
                              <select name=\"layout_module[{{ module_row }}][code]\" class=\"form-select input-sm\">
                                {% for extension in extensions %}
                                  <optgroup label=\"{{ extension.name }}\">
                                    {% if not extension.module %}
                                    <option value=\"{{ extension.code }}\"{% if extension.code == layout_module.code %} selected{% endif %}>{{ extension.name }}</option>
                                  {% else %}
                                    {% for module in extension.module %}
                                      <option value=\"{{ module.code }}\"{% if module.code == layout_module.code %} selected{% endif %}>{{ module.name }}</option>
                                    {% endfor %}
                                    {% endif %}
                                  </optgroup>
                                {% endfor %}
                              </select> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][position]\" value=\"{{ layout_module.position }}\"/> <input type=\"hidden\" name=\"layout_module[{{ module_row }}][sort_order]\" value=\"{{ layout_module.sort_order }}\"/> <a href=\"{{ layout_module.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a>
                              <button type=\"button\" onclick=\"\$('#module-row-{{ module_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>
                            </div>
                          </td>
                        </tr>
                        {% set module_row = module_row + 1 %}
                      {% endif %}
                    {% endfor %}
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class=\"text-end\"><button type=\"button\" onclick=\"addModule('column-right');\" data-bs-toggle=\"tooltip\" title=\"{{ button_module_add }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </fieldset>
          <input type=\"hidden\" name=\"layout_id\" value=\"{{ layout_id }}\" id=\"input-layout-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
var route_row = {{ route_row }};

function addRoute() {
    html = '<tr id=\"route-row-' + route_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"layout_route[' + route_row + '][store_id]\" class=\"form-select\">';
    html += '  <option value=\"0\">{{ text_default|escape('js') }}</option>';
  {% for store in stores %}
    html += '<option value=\"{{ store.store_id }}\">{{ store.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select></td>';
    html += '  <td class=\"text-start\"><input type=\"text\" name=\"layout_route[' + route_row + '][route]\" value=\"\" placeholder=\"{{ entry_route|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#route-row-' + route_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#route tbody').append(html);

    route_row++;
}

var module_row = {{ module_row }};

function addModule(type) {
    html = '<tr id=\"module-row-' + module_row + '\">';
    html += '  <td class=\"text-start\"><div class=\"input-group input-group-sm\">    <span class=\"my-handle\" aria-hidden=\"true\"> <i class=\"fa-solid mx-2 fa-grip-vertical\"></i> </span>';
    html += '    <select name=\"layout_module[' + module_row + '][code]\" class=\"form-select input-sm\">';
  {% for extension in extensions %}
    html += '    <optgroup label=\"{{ extension.name|escape('js') }}\">';
  {% if not extension.module %}
    html += '      <option value=\"{{ extension.code|escape('js') }}\">{{ extension.name|escape('js') }}</option>';
  {% else %}
  {% for module in extension.module %}
    html += '      <option value=\"{{ module.code|escape('js') }}\">{{ module.name|escape('js') }}</option>';
  {% endfor %}
  {% endif %}
    html += '    </optgroup>';
  {% endfor %}
    html += '  </select>';
    html += '  <input type=\"hidden\" name=\"layout_module[' + module_row + '][position]\" value=\"' + type.replaceAll('-', '_') + '\" />';
    html += '  <input type=\"hidden\" name=\"layout_module[' + module_row + '][sort_order]\" value=\"\" />';
    html += '  <a href=\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit|escape('js') }}\" class=\"btn btn-primary btn-sm\"><i class=\"fa-solid fa-pencil fa-fw\"></i></a><button type=\"button\" onclick=\"\$(\\'#module-row-' + module_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger btn-sm\"><i class=\"fa-solid fa-minus-circle fa-fw\"></i></button>';
    html += '  </div></td>';
    html += '</tr>';

    \$('#module-' + type + ' tbody').append(html);

    \$('#module-' + type + ' tbody input[name*=\\'sort_order\\']').each(function (i, element) {
        \$(element).val(i);
    });

    \$('#module-' + type + ' select:last').trigger('change');

    module_row++;
    initializeSortables();
}

\$('#module-column-left, #module-column-right, #module-content-top, #module-content-bottom').on('change', 'select[name*=\\'code\\']', function () {
    var part = this.value.split('.');

    if (typeof part[2] == 'undefined') {
        \$(this).parent().find('a').attr('href', 'index.php?route=extension/' + part[0] + '/module/' + part[1] + '&user_token={{ user_token }}');
    } else {
        \$(this).parent().find('a').attr('href', 'index.php?route=extension/' + part[0] + '/module/' + part[1] + '&user_token={{ user_token }}&module_id=' + part[2]);
    }
});

function initializeSortables() {
\t\t\$('.listWithHandle').each(function () {
\t\t\t// Check if Sortable instance already exists
\t\t\tif (!\$(this).data('sortable')) {
\t\t\t\t// Create Sortable instance
\t\t\t\tSortable.create(this, {
\t\t\t\t\thandle: '.my-handle',
\t\t\t\t\tanimation: 150,
\t\t\t\t\tonEnd: function (event) {
\t\t\t\t\t\t// Update the values after sorting is complete
\t\t\t\t\t\thandleSortEnd(event.item);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t});
\t}
  initializeSortables();

\tfunction handleSortEnd(sortedItem) {
 
\t\tlet categoryPositions = {};
  
    \$(sortedItem).closest('tbody').find('tr').each(function (index) {
      \$(this).find('input[name^=\"layout_module\"][name\$=\"[sort_order]\"]').val(index);
\t\t\tlet catId = \$(this).data('modid');
      if (!catId) return;
     
\t\t\tcategoryPositions[catId] = index;
\t\t});
 
\t}
 
 
 
//--></script>
{{ footer }}
", "cp-akis/view//plates/design/layout_form.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/design/layout_form.twig");
    }
}
