{{ form(router.getRewriteUri(), 'method': 'post') }}
{% for element in form %}
{{ element }}

{% endfor %}
	{{ submit_button('Login') }}