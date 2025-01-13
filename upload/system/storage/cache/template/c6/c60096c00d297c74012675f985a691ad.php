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

/* cp-akis/view/template/common/footer.twig */
class __TwigTemplate_012a344c7e7817330948cc0e75d7c2f0 extends Template
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
        echo "<script> 
var \$buoop = {required:{e:-4,f:-3,o:-3,s:-1,c:-3},insecure:true,api:2024.01 }; 
function \$buo_f(){ 
 var e = document.createElement(\"script\"); 
 e.src = \"//browser-update.org/update.min.js\"; 
 document.body.appendChild(e);
};
try {document.addEventListener(\"DOMContentLoaded\", \$buo_f,false)}
catch(e){window.attachEvent(\"onload\", \$buo_f)}
</script>

<footer id=\"footer\">";
        // line 12
        echo ($context["text_footer"] ?? null);
        echo "<br/>";
        echo ($context["text_version"] ?? null);
        echo "</footer></div>
<script src=\"";
        // line 13
        echo ($context["bootstrap"] ?? null);
        echo "\" ></script>
</body></html>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 13,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<script> 
var \$buoop = {required:{e:-4,f:-3,o:-3,s:-1,c:-3},insecure:true,api:2024.01 }; 
function \$buo_f(){ 
 var e = document.createElement(\"script\"); 
 e.src = \"//browser-update.org/update.min.js\"; 
 document.body.appendChild(e);
};
try {document.addEventListener(\"DOMContentLoaded\", \$buo_f,false)}
catch(e){window.attachEvent(\"onload\", \$buo_f)}
</script>

<footer id=\"footer\">{{ text_footer }}<br/>{{ text_version }}</footer></div>
<script src=\"{{ bootstrap }}\" ></script>
</body></html>
", "cp-akis/view/template/common/footer.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/template/common/footer.twig");
    }
}
