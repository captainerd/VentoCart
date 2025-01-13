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

/* cp-akis/view//plates/marketplace/modification_list.twig */
class __TwigTemplate_9cade3dfc72e4cf615bf76ffbd41664b extends Template
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
        echo "<form id=\"form-modification\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#modification\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\">";
        // line 7
        if ((($context["sort"] ?? null) == "name")) {
            // line 8
            echo "              <a href=\"";
            echo ($context["sort_name"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_name"] ?? null);
            echo "</a>
            ";
        } else {
            // line 10
            echo "              <a href=\"";
            echo ($context["sort_name"] ?? null);
            echo "\">";
            echo ($context["column_name"] ?? null);
            echo "</a>
            ";
        }
        // line 11
        echo "</td>
          <td class=\"text-start\">";
        // line 12
        if ((($context["sort"] ?? null) == "author")) {
            // line 13
            echo "              <a href=\"";
            echo ($context["sort_author"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_author"] ?? null);
            echo "</a>
            ";
        } else {
            // line 15
            echo "              <a href=\"";
            echo ($context["sort_author"] ?? null);
            echo "\">";
            echo ($context["column_author"] ?? null);
            echo "</a>
            ";
        }
        // line 16
        echo "</td>
          <td class=\"text-start\">";
        // line 17
        if ((($context["sort"] ?? null) == "version")) {
            // line 18
            echo "              <a href=\"";
            echo ($context["sort_version"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_version"] ?? null);
            echo "</a>
            ";
        } else {
            // line 20
            echo "              <a href=\"";
            echo ($context["sort_version"] ?? null);
            echo "\">";
            echo ($context["column_version"] ?? null);
            echo "</a>
            ";
        }
        // line 21
        echo "</td>
          <td class=\"text-start\">";
        // line 22
        if ((($context["sort"] ?? null) == "date_added")) {
            // line 23
            echo "              <a href=\"";
            echo ($context["sort_date_added"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_date_added"] ?? null);
            echo "</a>
            ";
        } else {
            // line 25
            echo "              <a href=\"";
            echo ($context["sort_date_added"] ?? null);
            echo "\">";
            echo ($context["column_date_added"] ?? null);
            echo "</a>
            ";
        }
        // line 26
        echo "</td>
          <td class=\"text-end\">";
        // line 27
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 31
        if (($context["modifications"] ?? null)) {
            // line 32
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["modifications"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["modification"]) {
                // line 33
                echo "            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 34
                echo twig_get_attribute($this->env, $this->source, $context["modification"], "modification_id", [], "any", false, false, false, 34);
                echo "\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">";
                // line 35
                echo twig_get_attribute($this->env, $this->source, $context["modification"], "name", [], "any", false, false, false, 35);
                echo "</td>
              <td class=\"text-start\">";
                // line 36
                echo twig_get_attribute($this->env, $this->source, $context["modification"], "author", [], "any", false, false, false, 36);
                echo "</td>
              <td class=\"text-start\">";
                // line 37
                echo twig_get_attribute($this->env, $this->source, $context["modification"], "version", [], "any", false, false, false, 37);
                echo "</td>
              <td class=\"text-start\">";
                // line 38
                echo twig_get_attribute($this->env, $this->source, $context["modification"], "date_added", [], "any", false, false, false, 38);
                echo "</td>
              <td class=\"text-end text-nowrap\">
                <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-modification-";
                // line 40
                echo twig_get_attribute($this->env, $this->source, $context["modification"], "modification_id", [], "any", false, false, false, 40);
                echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                ";
                // line 41
                if ( !twig_get_attribute($this->env, $this->source, $context["modification"], "status", [], "any", false, false, false, 41)) {
                    // line 42
                    echo "                  <button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["modification"], "enable", [], "any", false, false, false, 42);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_enable"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                ";
                } else {
                    // line 44
                    echo "                  <button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["modification"], "disable", [], "any", false, false, false, 44);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_disable"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                ";
                }
                // line 45
                echo "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modification'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "        ";
        } else {
            // line 49
            echo "          <tr>
            <td class=\"text-center\" colspan=\"6\">";
            // line 50
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 53
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 57
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 58
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>
";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modifications"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["modification"]) {
            // line 62
            echo "  <div id=\"modal-modification-";
            echo twig_get_attribute($this->env, $this->source, $context["modification"], "modification_id", [], "any", false, false, false, 62);
            echo "\" class=\"modal modal-lg\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
            // line 66
            echo ($context["text_info"] ?? null);
            echo "</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 71
            echo ($context["entry_name"] ?? null);
            echo "</label>
            <input type=\"text\" value=\"";
            // line 72
            echo twig_get_attribute($this->env, $this->source, $context["modification"], "name", [], "any", false, false, false, 72);
            echo "\" class=\"form-control\" readonly/>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 75
            echo ($context["entry_description"] ?? null);
            echo "</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>";
            // line 76
            echo twig_get_attribute($this->env, $this->source, $context["modification"], "description", [], "any", false, false, false, 76);
            echo "</textarea>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 79
            echo ($context["entry_code"] ?? null);
            echo "</label>
            <input type=\"text\" value=\"";
            // line 80
            echo twig_get_attribute($this->env, $this->source, $context["modification"], "code", [], "any", false, false, false, 80);
            echo "\" class=\"form-control\" readonly/>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">";
            // line 83
            echo ($context["entry_xml"] ?? null);
            echo "</label>
            <textarea rows=\"25\" class=\"form-control codemirror overflow-scroll\" readonly>";
            // line 84
            echo twig_get_attribute($this->env, $this->source, $context["modification"], "xml", [], "any", false, false, false, 84);
            echo "</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modification'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "<link href=\"view/javascript/codemirror/lib/codemirror.css\" rel=\"stylesheet\"/>
<link href=\"view/javascript/codemirror/theme/monokai.css\" rel=\"stylesheet\"/>
<script  src=\"view/javascript/codemirror/lib/codemirror.js\"></script>
<script  src=\"view/javascript/codemirror/mode/xml/xml.js\"></script>
<script  src=\"view/javascript/codemirror/mode/htmlmixed/htmlmixed.js\"></script>
<script  src=\"view/javascript/codemirror/addon/edit/matchbrackets.js\"></script>
<script ><!--
// Initialize codemirrror
var codemirror = CodeMirror.fromTextArea(document.querySelector('.codemirror'), {
    mode: 'text/xml',
    lineNumbers: true,
    lineWrapping: true,
    readOnly: true,
    autofocus: false,
    theme: 'monokai'
});

codemirror.setSize('100%', '600px');
//--></script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/marketplace/modification_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  302 => 91,  289 => 84,  285 => 83,  279 => 80,  275 => 79,  269 => 76,  265 => 75,  259 => 72,  255 => 71,  247 => 66,  239 => 62,  235 => 61,  229 => 58,  225 => 57,  219 => 53,  213 => 50,  210 => 49,  207 => 48,  199 => 45,  191 => 44,  183 => 42,  181 => 41,  177 => 40,  172 => 38,  168 => 37,  164 => 36,  160 => 35,  156 => 34,  153 => 33,  148 => 32,  146 => 31,  139 => 27,  136 => 26,  128 => 25,  118 => 23,  116 => 22,  113 => 21,  105 => 20,  95 => 18,  93 => 17,  90 => 16,  82 => 15,  72 => 13,  70 => 12,  67 => 11,  59 => 10,  49 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-modification\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#modification\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\">{% if sort == 'name' %}
              <a href=\"{{ sort_name }}\" class=\"{{ order|lower }}\">{{ column_name }}</a>
            {% else %}
              <a href=\"{{ sort_name }}\">{{ column_name }}</a>
            {% endif %}</td>
          <td class=\"text-start\">{% if sort == 'author' %}
              <a href=\"{{ sort_author }}\" class=\"{{ order|lower }}\">{{ column_author }}</a>
            {% else %}
              <a href=\"{{ sort_author }}\">{{ column_author }}</a>
            {% endif %}</td>
          <td class=\"text-start\">{% if sort == 'version' %}
              <a href=\"{{ sort_version }}\" class=\"{{ order|lower }}\">{{ column_version }}</a>
            {% else %}
              <a href=\"{{ sort_version }}\">{{ column_version }}</a>
            {% endif %}</td>
          <td class=\"text-start\">{% if sort == 'date_added' %}
              <a href=\"{{ sort_date_added }}\" class=\"{{ order|lower }}\">{{ column_date_added }}</a>
            {% else %}
              <a href=\"{{ sort_date_added }}\">{{ column_date_added }}</a>
            {% endif %}</td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if modifications %}
          {% for modification in modifications %}
            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ modification.modification_id }}\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">{{ modification.name }}</td>
              <td class=\"text-start\">{{ modification.author }}</td>
              <td class=\"text-start\">{{ modification.version }}</td>
              <td class=\"text-start\">{{ modification.date_added }}</td>
              <td class=\"text-end text-nowrap\">
                <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-modification-{{ modification.modification_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
                {% if not modification.status %}
                  <button type=\"button\" value=\"{{ modification.enable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_enable }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
                {% else %}
                  <button type=\"button\" value=\"{{ modification.disable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_disable }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                {% endif %}</td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"6\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>
{% for modification in modifications %}
  <div id=\"modal-modification-{{ modification.modification_id }}\" class=\"modal modal-lg\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_name }}</label>
            <input type=\"text\" value=\"{{ modification.name }}\" class=\"form-control\" readonly/>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_description }}</label>
            <textarea rows=\"5\" class=\"form-control\" readonly>{{ modification.description }}</textarea>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_code }}</label>
            <input type=\"text\" value=\"{{ modification.code }}\" class=\"form-control\" readonly/>
          </div>
          <div class=\"mb-3\">
            <label class=\"form-label\">{{ entry_xml }}</label>
            <textarea rows=\"25\" class=\"form-control codemirror overflow-scroll\" readonly>{{ modification.xml }}</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endfor %}
<link href=\"view/javascript/codemirror/lib/codemirror.css\" rel=\"stylesheet\"/>
<link href=\"view/javascript/codemirror/theme/monokai.css\" rel=\"stylesheet\"/>
<script  src=\"view/javascript/codemirror/lib/codemirror.js\"></script>
<script  src=\"view/javascript/codemirror/mode/xml/xml.js\"></script>
<script  src=\"view/javascript/codemirror/mode/htmlmixed/htmlmixed.js\"></script>
<script  src=\"view/javascript/codemirror/addon/edit/matchbrackets.js\"></script>
<script ><!--
// Initialize codemirrror
var codemirror = CodeMirror.fromTextArea(document.querySelector('.codemirror'), {
    mode: 'text/xml',
    lineNumbers: true,
    lineWrapping: true,
    readOnly: true,
    autofocus: false,
    theme: 'monokai'
});

codemirror.setSize('100%', '600px');
//--></script>", "cp-akis/view//plates/marketplace/modification_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/marketplace/modification_list.twig");
    }
}
