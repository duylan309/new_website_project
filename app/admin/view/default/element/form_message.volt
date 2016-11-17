{% if (form is defined and element|length) %}
    {% set messages = form.getMessagesFor(element) %}

    {% if (messages|length) %}
        <span class="help-block">{{ messages[0] }}</span>
    {% endif %}
{% endif %}
