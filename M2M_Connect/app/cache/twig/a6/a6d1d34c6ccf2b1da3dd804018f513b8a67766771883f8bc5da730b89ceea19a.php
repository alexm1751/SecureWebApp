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
      <li><a href=\"about.html\">About</a></li>
    </ul>
  </nav>




  <main class=\"main\" id=\"mainmessage\">
    <!--    INTRO -->
    <h3>Hello, Barry!</h3>
    <h4>Select below the messages you would like to view: all messages or your own messages.</h4>

    <button type=\"button\" id=\"logout\">Logout</button>

    <div class=\"container\">
      <form action=\"message.html\" method=\"get\">

        <p>View Messages:</p>

        <button type=\"button\" class=\"messages\" id=\"allmessage\">All Messages</button>
        <button type=\"button\" class=\"messages\" id=\"mymessage\">My Messages</button>
      </form>
    </div>


    ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["message_array"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 34
            echo "      <!--    MESSAGES  -->
      <div class=\"forms\">
        <!--    REGISTER  -->
        <section class=\"messages\">
          <!--    LOGIN  -->
          <form action=\"registered.html\" method=\"get\">
            <h4>Message</h4>

            <label>Message ID:</label>
            <output>000</output>
            <label>Number:</label>
            <output>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getSender", array(), "method"), "html", null, true);
            echo "</output>
            <label>Receiver:</label>
            <output>";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getReceiver", array(), "method"), "html", null, true);
            echo "</output>
            <label>Time:</label>
            <output>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getDate", array(), "method"), "html", null, true);
            echo "</output>
            <label>Bearer:</label>
            <output>";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getBearer", array(), "method"), "html", null, true);
            echo "</output>
            <label>Ref:</label>
            <output>";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["message"], "getRef", array(), "method"), "html", null, true);
            echo "</output>
            <label>Message:</label>
            <textarea>";
            // line 55
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
        // line 60
        echo "



    ";
        // line 65
        echo "      ";
        // line 66
        echo "      ";
        // line 67
        echo "        ";
        // line 68
        echo "        ";
        // line 69
        echo "          ";
        // line 70
        echo "
          ";
        // line 72
        echo "          ";
        // line 73
        echo "          ";
        // line 74
        echo "          ";
        // line 75
        echo "          ";
        // line 76
        echo "          ";
        // line 77
        echo "          ";
        // line 78
        echo "          ";
        // line 79
        echo "          ";
        // line 80
        echo "          ";
        // line 81
        echo "          ";
        // line 82
        echo "          ";
        // line 83
        echo "          ";
        // line 84
        echo "          ";
        // line 85
        echo "        ";
        // line 86
        echo "      ";
        // line 87
        echo "    ";
        // line 88
        echo "  ";
        // line 89
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
        return array (  169 => 89,  167 => 88,  165 => 87,  163 => 86,  161 => 85,  159 => 84,  157 => 83,  155 => 82,  153 => 81,  151 => 80,  149 => 79,  147 => 78,  145 => 77,  143 => 76,  141 => 75,  139 => 74,  137 => 73,  135 => 72,  132 => 70,  130 => 69,  128 => 68,  126 => 67,  124 => 66,  122 => 65,  116 => 60,  105 => 55,  100 => 53,  95 => 51,  90 => 49,  85 => 47,  80 => 45,  67 => 34,  63 => 33,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display_messages.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/display_messages.html.twig");
    }
}
