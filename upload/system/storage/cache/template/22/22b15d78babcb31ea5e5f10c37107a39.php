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

/* cp-akis/view/template/common/language.twig */
class __TwigTemplate_e6b91cddef55fc8f7ebf4aeb7a00e19d extends Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 2
            echo "  ";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 2) == ($context["code"] ?? null))) {
                // line 3
                echo "    <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 3);
                echo "\" class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 3);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 3);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 3);
                echo "\"/></a>
  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "<ul class=\"dropdown-menu\">
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 8
            echo "    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 8);
            echo "\" class=\"dropdown-item\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 8);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 8);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 8);
            echo "\"/> ";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 8);
            echo "</a></li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</ul>
<input type=\"hidden\" name=\"redirect\" value=\"";
        // line 11
        echo ($context["redirect"] ?? null);
        echo "\" id=\"input-redirect\"/>
<script ><!--
\$('#nav-language .dropdown-item').on('click', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=common/language.save&user_token=";
        // line 19
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: 'code=' + \$(element).attr('href') + '&redirect=' + encodeURIComponent(\$('#input-redirect').val()),
        dataType: 'json',
        success: function (json) {
            //x console.log(\$(element).attr('href'));
            //x console.log(\$('input-redirect').val());

            if (json['redirect']) {
                location = json['redirect'];
            }

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/template/common/language.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 19,  87 => 11,  84 => 10,  67 => 8,  63 => 7,  60 => 6,  44 => 3,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for language in languages %}
  {% if language.code == code %}
    <a href=\"{{ language.code }}\" class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\"><img src=\"{{ language.image }}\" alt=\"{{ language.name }}\" title=\"{{ language.name }}\"/></a>
  {% endif %}
{% endfor %}
<ul class=\"dropdown-menu\">
  {% for language in languages %}
    <li><a href=\"{{ language.code }}\" class=\"dropdown-item\"><img src=\"{{ language.image }}\" alt=\"{{ language.name }}\" title=\"{{ language.name }}\"/> {{ language.name }}</a></li>
  {% endfor %}
</ul>
<input type=\"hidden\" name=\"redirect\" value=\"{{ redirect }}\" id=\"input-redirect\"/>
<script ><!--
\$('#nav-language .dropdown-item').on('click', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=common/language.save&user_token={{ user_token }}',
        type: 'post',
        data: 'code=' + \$(element).attr('href') + '&redirect=' + encodeURIComponent(\$('#input-redirect').val()),
        dataType: 'json',
        success: function (json) {
            //x console.log(\$(element).attr('href'));
            //x console.log(\$('input-redirect').val());

            if (json['redirect']) {
                location = json['redirect'];
            }

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>", "cp-akis/view/template/common/language.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/template/common/language.twig");
    }
}
