<?php

/* display_messages.html.twig */
class __TwigTemplate_f6af0f2639e2e3ed711deed3511f72906ee71a9dd78ca85b0cfe44480c0d7042 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("banner.html.twig", "display_messages.html.twig", 1);
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
        echo "  <!--  NAVIGATION -->
  <nav>
    <ul class=\"menu\">
      <li><a href=\"index.html\">Home</a></li>
      <li><a href=\"message.html\" class=\"active\">Account</a></li>
    </ul>
  </nav>

  <main class=\"main\" id=\"mainmessage\">
  <!--    INTRO -->


    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["message_array"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 16
            echo "      <!--    MESSAGES  -->
      <div class=\"forms\">
        <!--    REGISTER  -->
        <section class=\"messages\">
          <!--    LOGIN  -->
          <form action=\"registered.html\" method=\"get\">
            <h4>Message</h4>

            <label>Number:</label>
            <output>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getSender", array(), "method"), "html", null, true);
            echo "</output>
            <label>Receiver:</label>
            <output>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getReceiver", array(), "method"), "html", null, true);
            echo "</output>
            <label>Time:</label>
            <output>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getDate", array(), "method"), "html", null, true);
            echo "</output>
            <label>Bearer:</label>
            <output>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getBearer", array(), "method"), "html", null, true);
            echo "</output>
            <label>Message:</label>
            <textarea>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getMessage", array(), "method"), "html", null, true);
            echo "</textarea>
          </form>
        </section>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "
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
        return "display_messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 38,  80 => 33,  75 => 31,  70 => 29,  65 => 27,  60 => 25,  49 => 16,  45 => 15,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display_messages.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/display_messages.html.twig");
    }
}
