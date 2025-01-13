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

/* cp-akis/view//plates/common/header.twig */
class __TwigTemplate_d0157cbf53ba78a9dbdd0a422af7c13a extends Template
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
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<head>
  <meta charset=\"UTF-8\"/>
  <title>";
        // line 5
        echo ($context["title"] ?? null);
        echo "</title>
  <base href=\"";
        // line 6
        echo ($context["base"] ?? null);
        echo "\"/>
  ";
        // line 7
        if (($context["description"] ?? null)) {
            // line 8
            echo "    <meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\"/>
  ";
        }
        // line 10
        echo "  ";
        if (($context["keywords"] ?? null)) {
            // line 11
            echo "    <meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\"/>
  ";
        }
        // line 13
        echo "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"/>
  <meta http-equiv=\"cache-control\" content=\"no-cache\">
  <meta http-equiv=\"expires\" content=\"0\">
  <link href=\"";
        // line 16
        echo ($context["bootstrap"] ?? null);
        echo "\" rel=\"stylesheet\" media=\"screen\"/>
  <link href=\"";
        // line 17
        echo ($context["icons"] ?? null);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
  <link href=\"";
        // line 18
        echo ($context["stylesheet"] ?? null);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
  <script src=\"";
        // line 19
        echo ($context["jquery"] ?? null);
        echo "\" ></script>
  <script  src=\"view/javascript/jquery/datetimepicker/moment.min.js\"></script>
  <script  src=\"view/javascript/jquery/datetimepicker/moment-with-locales.min.js\"></script>
  <script  src=\"view/javascript/jquery/datetimepicker/daterangepicker.js\"></script>
  <link href=\"view/javascript/jquery/datetimepicker/daterangepicker.css\" rel=\"stylesheet\" type=\"text/css\"/>
  <script  src=\"view/javascript/common.js\"></script>
  ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 26
            echo "    <link type=\"text/css\" href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 26);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 26);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 26);
            echo "\"/>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "  ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 29
            echo "    <link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 29);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 29);
            echo "\"/>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "  ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 32
            echo "    <script  src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["script"], "href", [], "any", false, false, false, 32);
            echo "\"></script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "</head>
<body>
<div id=\"container\">
  <div id=\"alert\" class=\"toast-container position-fixed top-0 end-0 p-3\"></div>
  <header id=\"header\" class=\"navbar navbar-expand navbar-light bg-light\">
    <div class=\"container-fluid\">
      <a href=\"";
        // line 40
        echo ($context["home"] ?? null);
        echo "\" class=\"navbar-brand d-none d-lg-block\"><img src=\"view/image/logo.png\" alt=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" title=\"";
        echo ($context["heading_title"] ?? null);
        echo "\"/></a>
      ";
        // line 41
        if (($context["logged"] ?? null)) {
            // line 42
            echo "     

    
  
   
        <ul class=\"nav navbar-nav\">
          
          <button type=\"button\" id=\"button-menu\" class=\"btn btn-dark d-inline-block d-lg-none\"><i class=\"fa-solid fa-bars\"></i></button>
          <li id=\"nav-notification\" class=\"nav-item dropdown\">
         
            <a href=\"#\" data-bs-toggle=\"dropdown\" class=\"nav-link dropdown-toggle\">
              

              <i class=\"fa-regular fa-bell\"></i>";
            // line 55
            if (($context["notification_total"] ?? null)) {
                echo " 
              <span class=\"badge bg-danger\">";
                // line 56
                echo ($context["notification_total"] ?? null);
                echo "</span>";
            }
            echo "</a>


            <div class=\"dropdown-menu dropdown-menu-end\">
              ";
            // line 60
            if (($context["notifications"] ?? null)) {
                // line 61
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["notifications"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                    // line 62
                    echo "                  <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["notification"], "href", [], "any", false, false, false, 62);
                    echo "\" data-bs-toggle=\"modal\" class=\"dropdown-item\">";
                    echo twig_get_attribute($this->env, $this->source, $context["notification"], "title", [], "any", false, false, false, 62);
                    echo "</a>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "                <a href=\"";
                echo ($context["notification_all"] ?? null);
                echo "\" class=\"dropdown-item text-center text-primary\">";
                echo ($context["text_notification_all"] ?? null);
                echo "</a>
              ";
            } else {
                // line 66
                echo "                <span class=\"dropdown-item text-center\">";
                echo ($context["text_no_results"] ?? null);
                echo "</span>
              ";
            }
            // line 68
            echo "            </div>
            
          </li>
    
          <li id=\"nav-language\" class=\"nav-item dropdown\">";
            // line 72
            echo ($context["language"] ?? null);
            echo "</li>
          <li id=\"nav-profile\" class=\"nav-item dropdown\">
            <a href=\"#\" data-bs-toggle=\"dropdown\" class=\"nav-link dropdown-toggle\"><img src=\"";
            // line 74
            echo ($context["image"] ?? null);
            echo "\" alt=\"";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo "\" title=\"";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo "\" class=\"rounded-circle\"/><span class=\"d-none d-md-inline d-lg-inline\">&nbsp;&nbsp;&nbsp;";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo " <i class=\"fa-solid fa-caret-down fa-fw\"></i></span></a>
            <ul class=\"dropdown-menu dropdown-menu-end\">
              <li><a href=\"";
            // line 76
            echo ($context["profile"] ?? null);
            echo "\" class=\"dropdown-item\"><i class=\"fa-solid fa-user-circle fa-fw\"></i> ";
            echo ($context["text_profile"] ?? null);
            echo "</a></li>
              <li><hr class=\"dropdown-divider\"></li>
              <li><h6 class=\"dropdown-header\">";
            // line 78
            echo ($context["text_store"] ?? null);
            echo "</h6></li>
              ";
            // line 79
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                // line 80
                echo "                <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "href", [], "any", false, false, false, 80);
                echo "\" target=\"_blank\" class=\"dropdown-item\">";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 80);
                echo " </a>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "              <li><hr class=\"dropdown-divider\"></li>
              <li><h6 class=\"dropdown-header\">";
            // line 83
            echo ($context["text_help"] ?? null);
            echo "</h6></li>
              <li><a href=\"https://www.ventocart.com\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-brands fa-ventocart fa-fw\"></i> ";
            // line 84
            echo ($context["text_homepage"] ?? null);
            echo "</a></li>
              <li><a href=\"http://docs.ventocart.com\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-solid fa-file fa-fw\"></i> ";
            // line 85
            echo ($context["text_documentation"] ?? null);
            echo "</a></li>
              <li><a href=\"https://forum.ventocart.com\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-solid fa-comments fa-fw\"></i> ";
            // line 86
            echo ($context["text_support"] ?? null);
            echo "</a></li>
            </ul>
          </li>        
          <li id=\"nav-logout\" class=\"nav-item\"><a href=\"";
            // line 89
            echo ($context["logout"] ?? null);
            echo "\" class=\"nav-link\"><i class=\"fa-solid fa-sign-out\"></i> <span class=\"d-none d-md-inline\">";
            echo ($context["text_logout"] ?? null);
            echo "</span></a></li>
        </ul>
      ";
        }
        // line 92
        echo "    </div>
  </header>
<script>
  \$(document).ready(function () {
\$(\"#security_modal\").on('click', function() {

   
  \$(\"#modal-security\").modal('show')
});
  });
 
  \$(document).ready(function() {
    \$('#toggleButton').click(function() {
        \$('#column-left').toggleClass('active');
    });
});

</script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  307 => 92,  299 => 89,  293 => 86,  289 => 85,  285 => 84,  281 => 83,  278 => 82,  267 => 80,  263 => 79,  259 => 78,  252 => 76,  235 => 74,  230 => 72,  224 => 68,  218 => 66,  210 => 64,  199 => 62,  194 => 61,  192 => 60,  183 => 56,  179 => 55,  164 => 42,  162 => 41,  154 => 40,  146 => 34,  137 => 32,  132 => 31,  121 => 29,  116 => 28,  103 => 26,  99 => 25,  90 => 19,  86 => 18,  82 => 17,  78 => 16,  73 => 13,  67 => 11,  64 => 10,  58 => 8,  56 => 7,  52 => 6,  48 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html dir=\"{{ direction }}\" lang=\"{{ lang }}\">
<head>
  <meta charset=\"UTF-8\"/>
  <title>{{ title }}</title>
  <base href=\"{{ base }}\"/>
  {% if description %}
    <meta name=\"description\" content=\"{{ description }}\"/>
  {% endif %}
  {% if keywords %}
    <meta name=\"keywords\" content=\"{{ keywords }}\"/>
  {% endif %}
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"/>
  <meta http-equiv=\"cache-control\" content=\"no-cache\">
  <meta http-equiv=\"expires\" content=\"0\">
  <link href=\"{{ bootstrap }}\" rel=\"stylesheet\" media=\"screen\"/>
  <link href=\"{{ icons }}\" rel=\"stylesheet\" type=\"text/css\"/>
  <link href=\"{{ stylesheet }}\" rel=\"stylesheet\" type=\"text/css\"/>
  <script src=\"{{ jquery }}\" ></script>
  <script  src=\"view/javascript/jquery/datetimepicker/moment.min.js\"></script>
  <script  src=\"view/javascript/jquery/datetimepicker/moment-with-locales.min.js\"></script>
  <script  src=\"view/javascript/jquery/datetimepicker/daterangepicker.js\"></script>
  <link href=\"view/javascript/jquery/datetimepicker/daterangepicker.css\" rel=\"stylesheet\" type=\"text/css\"/>
  <script  src=\"view/javascript/common.js\"></script>
  {% for style in styles %}
    <link type=\"text/css\" href=\"{{ style.href }}\" rel=\"{{ style.rel }}\" media=\"{{ style.media }}\"/>
  {% endfor %}
  {% for link in links %}
    <link href=\"{{ link.href }}\" rel=\"{{ link.rel }}\"/>
  {% endfor %}
  {% for script in scripts %}
    <script  src=\"{{ script.href }}\"></script>
  {% endfor %}
</head>
<body>
<div id=\"container\">
  <div id=\"alert\" class=\"toast-container position-fixed top-0 end-0 p-3\"></div>
  <header id=\"header\" class=\"navbar navbar-expand navbar-light bg-light\">
    <div class=\"container-fluid\">
      <a href=\"{{ home }}\" class=\"navbar-brand d-none d-lg-block\"><img src=\"view/image/logo.png\" alt=\"{{ heading_title }}\" title=\"{{ heading_title }}\"/></a>
      {% if logged %}
     

    
  
   
        <ul class=\"nav navbar-nav\">
          
          <button type=\"button\" id=\"button-menu\" class=\"btn btn-dark d-inline-block d-lg-none\"><i class=\"fa-solid fa-bars\"></i></button>
          <li id=\"nav-notification\" class=\"nav-item dropdown\">
         
            <a href=\"#\" data-bs-toggle=\"dropdown\" class=\"nav-link dropdown-toggle\">
              

              <i class=\"fa-regular fa-bell\"></i>{% if notification_total %} 
              <span class=\"badge bg-danger\">{{ notification_total }}</span>{% endif %}</a>


            <div class=\"dropdown-menu dropdown-menu-end\">
              {% if notifications %}
                {% for notification in notifications %}
                  <a href=\"{{ notification.href }}\" data-bs-toggle=\"modal\" class=\"dropdown-item\">{{ notification.title }}</a>
                {% endfor %}
                <a href=\"{{ notification_all }}\" class=\"dropdown-item text-center text-primary\">{{ text_notification_all }}</a>
              {% else %}
                <span class=\"dropdown-item text-center\">{{ text_no_results }}</span>
              {% endif %}
            </div>
            
          </li>
    
          <li id=\"nav-language\" class=\"nav-item dropdown\">{{ language }}</li>
          <li id=\"nav-profile\" class=\"nav-item dropdown\">
            <a href=\"#\" data-bs-toggle=\"dropdown\" class=\"nav-link dropdown-toggle\"><img src=\"{{ image }}\" alt=\"{{ firstname }} {{ lastname }}\" title=\"{{ firstname }} {{ lastname }}\" class=\"rounded-circle\"/><span class=\"d-none d-md-inline d-lg-inline\">&nbsp;&nbsp;&nbsp;{{ firstname }} {{ lastname }} <i class=\"fa-solid fa-caret-down fa-fw\"></i></span></a>
            <ul class=\"dropdown-menu dropdown-menu-end\">
              <li><a href=\"{{ profile }}\" class=\"dropdown-item\"><i class=\"fa-solid fa-user-circle fa-fw\"></i> {{ text_profile }}</a></li>
              <li><hr class=\"dropdown-divider\"></li>
              <li><h6 class=\"dropdown-header\">{{ text_store }}</h6></li>
              {% for store in stores %}
                <a href=\"{{ store.href }}\" target=\"_blank\" class=\"dropdown-item\">{{ store.name }} </a>
              {% endfor %}
              <li><hr class=\"dropdown-divider\"></li>
              <li><h6 class=\"dropdown-header\">{{ text_help }}</h6></li>
              <li><a href=\"https://www.ventocart.com\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-brands fa-ventocart fa-fw\"></i> {{ text_homepage }}</a></li>
              <li><a href=\"http://docs.ventocart.com\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-solid fa-file fa-fw\"></i> {{ text_documentation }}</a></li>
              <li><a href=\"https://forum.ventocart.com\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-solid fa-comments fa-fw\"></i> {{ text_support }}</a></li>
            </ul>
          </li>        
          <li id=\"nav-logout\" class=\"nav-item\"><a href=\"{{ logout }}\" class=\"nav-link\"><i class=\"fa-solid fa-sign-out\"></i> <span class=\"d-none d-md-inline\">{{ text_logout }}</span></a></li>
        </ul>
      {% endif %}
    </div>
  </header>
<script>
  \$(document).ready(function () {
\$(\"#security_modal\").on('click', function() {

   
  \$(\"#modal-security\").modal('show')
});
  });
 
  \$(document).ready(function() {
    \$('#toggleButton').click(function() {
        \$('#column-left').toggleClass('active');
    });
});

</script>", "cp-akis/view//plates/common/header.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/common/header.twig");
    }
}
