<?php

/* register.html.twig */
class __TwigTemplate_c48fdbdce40694e7d473a3c90a9514d8d3923d1ebc26838cb2de466646a693b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("banner.html.twig", "register.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "banner.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <!--  NAVIGATION -->
    <nav>
        <ul class=\"menu\">
            <li><a href=\"index.php\" class=\"active\">Home</a></li>

            <li><a href=\"about.html\">About</a></li>
        </ul>
    </nav>

    <form action=\"index.html\" method=\"get\">
        <button type=\"submit\" id=\"logout\">Logout</button>
        <h3>Hello, Barry!</h3>
        <h4>Select below the messages you would like to view: all messages or your own messages.</h4>
    </form>
    <div class=\"container\">
        <form action=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" method=\"";
        echo twig_escape_filter($this->env, ($context["method"] ?? null), "html", null, true);
        echo "\">
            <p>View messages:</p>
            <button type=\"submit\" class=\"messages\" id=\"allmessage\" autofocus>ALL MESSAGES</button>
            <button type=\"submit\" class=\"messages\" id=\"mymessage\">MY MESSAGES</button>
        </form>

        <input type=\"button\" value=\"Go Back From Whence You Came!\" onclick=\"history.back(-1)\" />
    </div>




    <!--  FOOTER   -->
    <footer class=\"footer\">
        <h5><a href=\"index.html\" class=\"heading\">EE M2M SOAP Server Application</a></h5>
        <h6><a href=\"index.html\" class=\"heading\">CTEC3110 Secure Web Application Development</a></h6>

        <p id=\"footer\"><a href=\"https://github.com/alexm1751/SecureWebApp\">Created by Alex Mason, Dominic Bryan and Alistair Laughland</a></p>

        <a href=\"https://validator.w3.org/\"><img src=\"https://www.w3.org/Icons/valid-html401\" alt=\"w3 HTML 4.01 / HTML DTD Validation\" id=\"validation\"></a>
    </footer>
";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 18,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "register.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/register.html.twig");
    }
}
