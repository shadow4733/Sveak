<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* client/show.html.twig */
class __TwigTemplate_f01fb1c4d211c8404b8f8d7b71145a73 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "client/show.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Карточка клиента";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <h1>Карточка клиента</h1>

    <div class=\"card p-4 mb-4\">
        <h3>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 9, $this->source); })()), "firstName", [], "any", false, false, false, 9), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 9, $this->source); })()), "lastName", [], "any", false, false, false, 9), "html", null, true);
        yield "</h3>
        <p><strong>ID:</strong> ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 10, $this->source); })()), "id", [], "any", false, false, false, 10), "html", null, true);
        yield "</p>
        <p><strong>Телефон:</strong> ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 11, $this->source); })()), "phone", [], "any", false, false, false, 11), "html", null, true);
        yield "</p>
        <p><strong>Email:</strong> ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 12, $this->source); })()), "email", [], "any", false, false, false, 12), "html", null, true);
        yield "</p>
        <p><strong>Образование:</strong> ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 13, $this->source); })()), "education", [], "any", false, false, false, 13), "html", null, true);
        yield "</p>
        <p><strong>Согласие:</strong> ";
        // line 14
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 14, $this->source); })()), "consent", [], "any", false, false, false, 14)) ? ("Да") : ("Нет"));
        yield "</p>
        <p><strong>Скоринг:</strong> ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 15, $this->source); })()), "score", [], "any", false, false, false, 15), "html", null, true);
        yield "</p>

        <a href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17)]), "html", null, true);
        yield "\" class=\"btn btn-primary mt-3\">Редактировать</a>
        <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_list");
        yield "\" class=\"btn btn-secondary mt-3\">Назад к списку</a>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/show.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  140 => 18,  136 => 17,  131 => 15,  127 => 14,  123 => 13,  119 => 12,  115 => 11,  111 => 10,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Карточка клиента{% endblock %}

{% block body %}
    <h1>Карточка клиента</h1>

    <div class=\"card p-4 mb-4\">
        <h3>{{ client.firstName }} {{ client.lastName }}</h3>
        <p><strong>ID:</strong> {{ client.id }}</p>
        <p><strong>Телефон:</strong> {{ client.phone }}</p>
        <p><strong>Email:</strong> {{ client.email }}</p>
        <p><strong>Образование:</strong> {{ client.education }}</p>
        <p><strong>Согласие:</strong> {{ client.consent ? 'Да' : 'Нет' }}</p>
        <p><strong>Скоринг:</strong> {{ client.score }}</p>

        <a href=\"{{ path('client_edit', { id: client.id }) }}\" class=\"btn btn-primary mt-3\">Редактировать</a>
        <a href=\"{{ path('client_list') }}\" class=\"btn btn-secondary mt-3\">Назад к списку</a>
    </div>
{% endblock %}
", "client/show.html.twig", "/var/www/html/templates/client/show.html.twig");
    }
}
